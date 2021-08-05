$(document).ready(function() {
    let minusQty = document.querySelectorAll('[id^="minus"]');
    let plusQty = document.querySelectorAll('[id^="plus"]');

    function ajaxQuantity(key, currentQty, decrement, increment) {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "../inc/php/ajax/updateCart.php",
            data: {"key" : key,
                   "decrement" : decrement,
                   "increment" : increment}
        })

        .done(function(cartCount) {
            $('#cart-count').text(cartCount.cartTotal);
            document.getElementById('subtotal').innerHTML = "$" + cartCount.subtotal;
            document.getElementById('tax').innerHTML = "$" + cartCount.tax;
            document.getElementById('total').innerHTML = "$" + cartCount.total;
            if(cartCount.delete === "true")
                document.getElementById('gun' + key).remove();
            else
                document.getElementById("qtygun" + key).innerHTML = currentQty.toString();
        })

        .fail(function(xhr, status, errorThrown) {
            alert("An error occurred on the server. Please fill out the contact form below or try again soon. Thank you.");
        });
    }

    minusQty.forEach(function(node) {
        node.addEventListener('click', function() {
            let key = (node.id).substr(8);
            let currentQty = document.getElementById("qtygun" + key).innerHTML;
            currentQty = parseInt(currentQty);
            if(currentQty > 0) {
                --currentQty;
                ajaxQuantity(key, currentQty, "true", "false");
            }
        });
    });

    plusQty.forEach(function(node) {
        node.addEventListener('click', function() {
            let key = (node.id).substr(7);
            let currentQty = document.getElementById("qtygun" + key).innerHTML;
            currentQty = parseInt(currentQty);
            if(currentQty >= 0) {
                ++currentQty;
                ajaxQuantity(key, currentQty, "false", "true");
            }
        });
    });

    (function () {
        'use strict'

        // https://getbootstrap.com/docs/5.0/forms/validation/
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation()
                } else {
                    if($('#cart-count').text().trim() !== "0") {
                        $.ajax({
                            /* $.ajax is an Object Literal */
                            type: "POST",
                            dataType: "json",
                            url: "../inc/php/ajax/validatePurchaseRequest.php",
                            data: {
                                   "Name"      : document.getElementById('Name').value,
                                   "Email"     : document.getElementById('Email').value,
                                   "Address"   : document.getElementById('Address').value,
                                   "Address2"  : document.getElementById('Address2').value,
                                   "City"      : document.getElementById('City').value,
                                   "State"     : document.getElementById('State').value,
                                   "Zip"       : document.getElementById('Zip').value,
                                   "Telephone" : document.getElementById('Telephone').value
                               }
                        })
                        /* JSON is parsed by jQuery */
                        .done(function(inquirySent) {
                            let elem = document.getElementById('submitPurchaseRequest');
                            if(elem.children.length > 1)
                                elem.removeChild(elem.lastChild);

                            let p = document.createElement('p');
                            if(inquirySent.length === 1) {
                                let contactElem = document.getElementsByClassName('checkoutFormat')[0];
                                while(contactElem.children.length > 0)
                                    contactElem.removeChild(contactElem.lastChild);
                                let inquiryProcessed = document.getElementsByClassName('checkoutFormat')[0];
                                inquiryProcessed.classList.add('d-flex', 'justify-content-center', 'flex-grow-1', 'align-items-center');
                                inquiryProcessed.style.overflow = 'hidden';
                                $(p).html(inquirySent);
                                $(p).css({'color' : 'green', 'font-size' : '2rem', 'font-weight' : 'bold'});
                                inquiryProcessed.appendChild(p);
                                $('#cart-count').text('0');
                            } else {
                                $(p).html(Object.values(inquirySent).join('<br>'));
                                $(p).css({'color' : 'var(--red)'});
                                $('#submitPurchaseRequest').append(p);
                                elem.scrollIntoView({block: "center"});
                                if(inquirySent.Name !== undefined)
                                    $('input#Name').val("");
                                if(inquirySent.Email !== undefined)
                                    $('input#Email').val("");
                                if(inquirySent.Address !== undefined)
                                    $('input#Address').val("");
                                if(inquirySent.City !== undefined)
                                    $('input#City').val("");
                                if(inquirySent.Zip !== undefined)
                                    $('input#Zip').val("");
                                if(inquirySent.Telephone !== undefined)
                                    $('input#Telephone').val("");
                            }
                        })

                        .fail(function(xhr, status, errorThrown) {
                            alert("Server error. Please try again later or call (330) 238-8801");
                        });
                    } else
                        alert("Cart is empty. Please add an item before submitting the request.");
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
});
