<?php
    $article = "DocCrosshairs FFL Gunsmithing";
    require_once("./inc/php/fringes/header.inc.php");
?>

</head>

<body class="d-flex flex-column min-vh-100">

    <?php
        require_once("$metadata[Path]inc/php/fringes/navbar.inc.php");
    ?>
<div class="container-fluid" style="padding-top: 62px; background-color: black; color: white;">
    <p class="text-center" style="font-size: 1.3rem;">There is no formal payment method at the moment. Cart will be for information only and shall be working soon.</p>
</div>
    <div class="container-fluid">
        <div class="row main-bkgnd-img" style="margin-top: 0">
            <div class="col-12 col-md-5 align-self-center">
                <img id="logo-img" src="<?php echo $metadata["Path"]; ?>inc/img/Logos/mainLogo.png" class="img-fluid d-block mx-auto" alt="DocCrosshairs">
            </div>
            <div class="col-12 col-md-7 ps-1 mt-2 mt-md-0 align-self-md-center">
                <p id="ffl-notice" class="p-3">
                    ALL FFL TRANSFERS $20
                    <br>
                    <br>
                    For transfers we will need a valid government picture ID with your current address.
                    All transfers of purchases must be picked up by the person buying the firearm.
                    No Exceptions.
                    <br>
                    <br>
                    We offer gunsmithing at minimum bench charge $35.00 per hour.
                    Please inquire in the <a href="#contact-form-main">form</a> below.
                </p>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="gun-stock">
        <button id="scrollToTopBtn" class="btn">
            <i class="fas fa-arrow-up"></i>
        </button>
        <div class="row justify-content-end justify-content-md-center">
            <div class="col-12 text-center black-text-bkgnd">
                <h1 class="header-size p-3 mx-auto">
                    BATTLEARMS
                </h1>
                <p class="mt-2">
                    Henry Firearms PDF:
                    <br>
                    <a href="./inc/img/PDFs/HenryFirearms.pdf">
                        HenryFirearms.pdf
                    </a>
                </p>

            </div>
        </div>

        <div class="row pb-5">
            <?php
                require_once("$metadata[Path]inc/php/gunCatalog.inc.php");
            ?>
        </div>
    </div>

    <div id="contact-form-main" class="container-fluid">
        <div class="row justify-content-center pt-3 pb-3">
            <div class="col-12 col-sm-9 col-md-10 col-lg-8 col-xl-7">
                <form id="contact-form" class="contact-form mx-auto p-3 needs-validation" action="" method="POST" novalidate>
                    <div class="row">
                        <div id="commentSubmitMessage" class="col-12 col-lg-11">
                            <p id="contact-header">
                                Contact Us:
                            </p>
                            <hr id="contactHR">
                        </div>
                    </div>

                    <div class="row">
                        <label for="Name" class="col-12 col-md-4 col-form-label contact-label">
                            Full Name
                            <i class="fas fa-asterisk asterisk"></i>
                        </label>
                        <div class="col-12 col-md-8 col-lg-7">
                            <input type="text" name="Name" id="Name" class="form-control" placeholder="Enter your full name" pattern=".{2,64}" required>
                            <div class="text-center valid-feedback grnLnk">
                                Valid
                            </div>
                            <div class="text-center invalid-feedback redLnk">
                                Example: Mike Scarbrough
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2 mt-md-3">
                        <label for="Email" class="col-12 col-md-4 col-form-label contact-label">
                            Email
                            <i class="fas fa-asterisk asterisk"></i>
                        </label>
                        <div class="col-12 col-md-8 col-lg-7">
                            <input type="email" name="Email" id="Email" class="form-control" placeholder="Enter your full email" pattern="[A-Za-z0-9\._%+-]+@[A-Za-z0-9\._%+\-]+\.[A-Za-z0-9\._%+\-]+" required>
                            <div class="text-center valid-feedback grnLnk">
                                Valid
                            </div>
                            <div class="text-center invalid-feedback redLnk">
                                Example: username@gmail.com
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2 mt-md-3">
                        <label for="Telephone" class="col-12 col-md-4 col-form-label contact-label">
                            Telephone
                        </label>
                        <div class="col-12 col-md-8 col-lg-7">
                            <input type="tel" name="Telephone" id="Telephone" class="form-control" placeholder="+1 (___) ___-____" data-slots="_" pattern="\+1 \([0-9]{3}\) [0-9]{3}-[0-9]{4}">
                            <div class="text-center valid-feedback grnLnk">
                                Valid
                            </div>
                            <div class="text-center invalid-feedback redLnk">
                                Example: +1 (330) 555-0000
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2 mt-md-3">
                        <label for="Comment" class="col-12 col-md-4 col-form-label contact-label align-self-center">
                            Inquiry
                            <i class="fas fa-asterisk asterisk"></i>
                        </label>
                        <div class="col-12 col-md-8 col-lg-7">
                            <textarea id="Comment" name="Comment" data-limit="4095" placeholder="Enter Comment... 4095 max characters" maxlength='4095' class="form-control" required></textarea>
                            <div class="text-center valid-feedback grnLnk">
                                Valid
                            </div>
                            <div class="text-center invalid-feedback redLnk">
                                Include at least 1 character
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2 mt-md-3">
                        <div class="col-12 col-lg-11">
                            <button type="submit" class="btn btn-contact">Submit</button>
                            <span class="ps-3 text-white required"><i class="fas fa-asterisk red"></i>
                            required</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="business-card" class="container-fluid pt-3 pb-3">
        <div class="row">
            <div class="col-12 col-md-6">
                <img data-src="<?php echo $metadata["Path"]; ?>inc/img/Logos/cardFront.png" src="#" class="img-fluid business-card-front lazy" alt="Business Card Front">
            </div>
            <div class="col-12 col-md-6 mt-3 mt-md-0">
                <img data-src="<?php echo $metadata["Path"]; ?>inc/img/Logos/cardBack.png" src="#" class="img-fluid business-card-back lazy" alt="Business Card Back">
            </div>
        </div>
    </div>

    <?php
        require_once("$metadata[Path]inc/php/fringes/footer.inc.php");
    ?>

    <script defer src="<?php echo $metadata["Path"]; ?>inc/js/indexFunctions.js"></script>
    <script defer src="<?php echo $metadata["Path"]; ?>inc/js/formValidation.js"></script>

    <?php
        ob_end_flush();
    ?>
</body>

</html>
