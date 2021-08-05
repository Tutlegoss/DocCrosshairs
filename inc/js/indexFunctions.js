$(document).ready(function() {

    $(window).scroll(function() {
        if($(this).scrollTop() > 200) {
            $('#scrollToTopBtn').fadeIn();
        } else {
            $('#scrollToTopBtn').fadeOut();
        }
    });

    $('#scrollToTopBtn').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 400, 'swing');
        return false;
    });

    document.getElementById("Comment").addEventListener('input', function() {
        this.style.height = "76px";
        this.style.height = this.scrollHeight + "px";
    }, false);

    (function() {
        let gunsForSale = document.querySelectorAll('[id^="gunID"]');
        gunsForSale.forEach(function(node) {
            node.addEventListener('click', function() {
                const gunNum = this.id.substring(5);
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "./inc/php/ajax/addToCart.php",
                    data: {"gunNum" : gunNum}
                })

                .done(function(cartCount) {
                    $('#cart-count').text(cartCount);
                })

                .fail(function(xhr, status, errorThrown) {
                    alert("An error occurred on the server. Please fill out the contact form below or call (330) 238-8801. Thank you.");
                });

                this.innerText = "Added to Cart";
                this.disabled = true;

                setTimeout(() => {
                    this.innerText = "Add to Cart";
                    this.disabled = false;
                }, 1500);

            });
        });
    })();

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
                    $.ajax({
                        /* $.ajax is an Object Literal */
                        type: "POST",
                        dataType: "json",
                        url: "./inc/php/ajax/validateContact.php",
                        data: {
                               "Name"      : document.getElementById('Name').value,
                               "Email"     : document.getElementById('Email').value,
                               "Telephone" : document.getElementById('Telephone').value,
                               "Comment"   : document.getElementById('Comment').value
                           }
                    })
                    /* JSON is parsed by jQuery */
                    .done(function(inquirySent) {
                        let elem = document.getElementById('commentSubmitMessage');
                        if(elem.children.length > 2)
                            elem.removeChild(elem.lastChild);

                        let p = document.createElement('p');

                        if(inquirySent.length === 1) {
                            $(p).html(inquirySent);
                            $(p).css({'color' : 'var(--grnLnk)'});
                            let contactElem = document.getElementById('contact-form');
                            while(contactElem.children.length > 1)
                                contactElem.removeChild(contactElem.lastChild);
                        } else {
                            $(p).html(Object.values(inquirySent).join('<br>'));
                            $(p).css({'color' : 'var(--redLnk)'});

                            if(inquirySent.Email !== undefined)
                                $('input#Email').val("");
                            if(inquirySent.Name !== undefined)
                                $('input#Name').val("");
                            if(inquirySent.Telephone !== undefined)
                                $('input#Telephone').val("");
                        }

                        $('#commentSubmitMessage').append(p);

                        elem.scrollIntoView({block: "center"});
                    })

                    .fail(function(xhr, status, errorThrown) {
                        /* TODO: See what should go here */
                        alert("Server error. Please try again later or call (330) 238-8801");
                    });
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
});
