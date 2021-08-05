<?php
    $article = "DocCrosshairs Checkout";
    require_once("../inc/php/fringes/header.inc.php");
?>

</head>

<body class="d-flex flex-column min-vh-100">

    <?php
        require_once("$metadata[Path]inc/php/fringes/navbar.inc.php");
    ?>

    <div class="container-fluid checkoutFormat">
        <div class="row p-0 p-md-4">
            <div class="col-12 col-md-6">
                <form id="contact-form" class="contact-form needs-validation mx-auto mx-md-0" action="" method="POST" novalidate>
                    <div class="row">
                        <div id="submitPurchaseRequest" class="col-12">
                            <p class="text-center" style="font-size: 2rem;">Primary Information</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="Name" class="form-label"><i class="fa fa-user"></i> Full Name <i class="fas fa-asterisk asterisk"></i></label>
                            <input type="text" class="form-control" id="Name" name="Name" pattern=".{2,64}" required>
                            <div class="text-center valid-feedback green">
                                Valid
                            </div>
                            <div class="text-center invalid-feedback red">
                                Example: Mike Scarbrough
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="Email" class="form-label"><i class="fas fa-envelope"></i> Email<i class="fas fa-asterisk asterisk"></i></label>
                            <input type="email" class="form-control" id="Email" name="Email" pattern="[A-Za-z0-9\._%+-]+@[A-Za-z0-9\._%+\-]+" required>
                            <div class="text-center valid-feedback green">
                                Valid
                            </div>
                            <div class="text-center invalid-feedback red">
                                Example: username@gmail.com
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="Address" class="form-label"><i class="fas fa-address-card"></i> Address<i class="fas fa-asterisk asterisk"></i></label>
                            <input type="text" class="form-control" id="Address" name="Address" pattern=".{2,64}" placeholder="1234 Main St" required>
                            <div class="text-center valid-feedback green">
                                Valid
                            </div>
                            <div class="text-center invalid-feedback red">
                                Example: 1234 Main St
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="Address2" class="form-label"><i class="far fa-address-card"></i> Address 2</label>
                            <input type="text" class="form-control" id="Address2" name="Address2" pattern=".{2,64}" placeholder="Apt, Ste (Optional)">
                        </div>
                        <div class="col-12 col-sm-6 col-md-12 mb-3">
                            <label for="City" class="form-label"><i class="fas fa-city"></i> City<i class="fas fa-asterisk asterisk"></i></label>
                            <input type="text" class="form-control" id="City" name="City" pattern=".{2,64}" required>
                            <div class="text-center valid-feedback green">
                                Valid
                            </div>
                            <div class="text-center invalid-feedback red">
                                Example: Alliance
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-12 col-lg-6 mb-3">
                            <label for="State" class="form-label"><i class="fas fa-map-marker-alt"></i> State<i class="fas fa-asterisk asterisk"></i></label>
                            <select id="State" name="State" class="form-select" required>
                                <option disabled>Choose...</option>
                                <option value="AL">Alabama</option>
                            	<option value="AK">Alaska</option>
                            	<option value="AZ">Arizona</option>
                            	<option value="AR">Arkansas</option>
                            	<option value="CA">California</option>
                            	<option value="CO">Colorado</option>
                            	<option value="CT">Connecticut</option>
                            	<option value="DE">Delaware</option>
                            	<option value="DC">District Of Columbia</option>
                            	<option value="FL">Florida</option>
                            	<option value="GA">Georgia</option>
                            	<option value="HI">Hawaii</option>
                            	<option value="ID">Idaho</option>
                            	<option value="IL">Illinois</option>
                            	<option value="IN">Indiana</option>
                            	<option value="IA">Iowa</option>
                            	<option value="KS">Kansas</option>
                            	<option value="KY">Kentucky</option>
                            	<option value="LA">Louisiana</option>
                            	<option value="ME">Maine</option>
                            	<option value="MD">Maryland</option>
                            	<option value="MA">Massachusetts</option>
                            	<option value="MI">Michigan</option>
                            	<option value="MN">Minnesota</option>
                            	<option value="MS">Mississippi</option>
                            	<option value="MO">Missouri</option>
                            	<option value="MT">Montana</option>
                            	<option value="NE">Nebraska</option>
                            	<option value="NV">Nevada</option>
                            	<option value="NH">New Hampshire</option>
                            	<option value="NJ">New Jersey</option>
                            	<option value="NM">New Mexico</option>
                            	<option value="NY">New York</option>
                            	<option value="NC">North Carolina</option>
                            	<option value="ND">North Dakota</option>
                            	<option selected value="OH">Ohio</option>
                            	<option value="OK">Oklahoma</option>
                            	<option value="OR">Oregon</option>
                            	<option value="PA">Pennsylvania</option>
                            	<option value="RI">Rhode Island</option>
                            	<option value="SC">South Carolina</option>
                            	<option value="SD">South Dakota</option>
                            	<option value="TN">Tennessee</option>
                            	<option value="TX">Texas</option>
                            	<option value="UT">Utah</option>
                            	<option value="VT">Vermont</option>
                            	<option value="VA">Virginia</option>
                            	<option value="WA">Washington</option>
                            	<option value="WV">West Virginia</option>
                            	<option value="WI">Wisconsin</option>
                            	<option value="WY">Wyoming</option>
                            </select>
                            <div class="text-center valid-feedback green">
                                Valid
                            </div>
                            <div class="text-center invalid-feedback red">
                                Example: Ohio
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-8 col-lg-6 mb-3">
                            <label for="Zip" class="form-label"><i class="fas fa-crosshairs"></i> Zip<i class="fas fa-asterisk asterisk"></i></label>
                            <input type="text" class="form-control" id="Zip" name="Zip" pattern="\d{5}" required>
                            <div class="text-center valid-feedback green">
                                Valid
                            </div>
                            <div class="text-center invalid-feedback red">
                                Example: 12345
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-8 col-lg-7">
                            <label for"Telephone" class="form-label"><i class="fas fa-phone"></i> Telephone<i class="fas fa-asterisk asterisk"></i></label>
                            <input type="tel" name="Telephone" id="Telephone" class="form-control" placeholder="+1 (___) ___-____" data-slots="_" pattern="\+1 \([0-9]{3}\) [0-9]{3}-[0-9]{4}" required>
                            <div class="text-center valid-feedback green">
                                Valid
                            </div>
                            <div class="text-center invalid-feedback red">
                                Example: +1 (330) 555-0000
                            </div>
                        </div>
                        <div class="row mt-4 mt-md-3">
                            <div class="col-12">
                                <button type="submit" class="btn btn-contact">Submit</button>
                                <span class="ps-3 required"><i class="fas fa-asterisk red"></i>
                                required</span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="col-12 col-md-6 mt-3 mt-md-0 p-0">
                <p class="text-center pt-2" style="font-size: 2rem;">Products</p>
                <div class="row g-0 m-2" id="products">
                    <?php
                        /* Also used in id="pricing" section below */
                        require_once("$metadata[Path]inc/php/CartGuns.php");
                        $gunsInCart = array_filter($_SESSION,fn($key) => preg_match('/^gun./',$key),ARRAY_FILTER_USE_KEY);

                        foreach($gunsInCart as $key => $value) {
                            $object = unserialize($value);
                            echo <<<EOT
                            <div id="$key" class="gun-card mb-3">
                                <div class="row g-0">
                                    <div class="col-12 col-lg-7 my-auto">
                                        <img src="$metadata[Path]inc/img/Guns/{$object->image}.png" class="img-fluid d-block mx-auto checkout-img-width" alt="Product Image">
                                    </div>
                                    <div class="col-12 col-lg-5">
                                        <div class="card-body" style="text-align: center">
                                            <p id="gp$key"><strong>{$object->name} &emsp; <span class="green">{$object->msrp}</span></strong></p>
                                            <button id="minus$key"><i class="fas fa-minus"></i></button>&nbsp;
                                            Quantity: <span id="qty$key">{$object->quantity}</span>&nbsp;
                                            <button id="plus$key"><i class="fas fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
EOT;
                        }
                    ?>

                </div>
                <div id="pricing" class="row g-0 mt-3 pricing justify-content-center">
                    <div class="col-md-6">
                        <?php
                            if(isset($_SESSION["cartTotal"]))
                                $object = unserialize($_SESSION["cartTotal"]);
                            else
                                $object = new CartTotal(0);
                        ?>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">Subtotal</th>
                                    <td id="subtotal" class="green">$<?php echo $object->subtotal; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Tax (7.25%)</th>
                                    <td id="tax" class="green">$<?php echo $object->totalTax; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Total</th>
                                    <td id="total" class="green">$<?php echo $object->total; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        require_once("$metadata[Path]inc/php/fringes/footer.inc.php");
        ob_end_flush();
    ?>

    <script defer src="<?php echo $metadata["Path"]; ?>inc/js/changeCart.js"></script>
    <script defer src="<?php echo $metadata["Path"]; ?>inc/js/formValidation.js"></script>

</body>

</html>
