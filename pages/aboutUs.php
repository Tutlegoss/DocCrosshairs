<?php
    $article = "DocCrosshairs About Us";
    require_once("../inc/php/fringes/header.inc.php");
?>

</head>

<body class="d-flex flex-column min-vh-100">

    <?php
        require_once("$metadata[Path]inc/php/fringes/navbar.inc.php");
    ?>

    <div class="container-fluid g-0">
        <div id="who-we-are" class="about-us-section">
            <div class="about-us">
                <h1 class="text-center about-us-title pt-4 pt-sm-0">
                    Who We Are
                </h1>
                <h2 class="text-center about-us-subtitle">
                    About Our Company
                </h2>
                <p class="about-us-text px-3">
                    <span style="color: var(--grnLnk);">The staff</span> at Doc Crosshairs believes it is every American’s right to defend our communities, our families, and ourselves through the use of safe and responsible firearm ownership. Our goal is to support our customers by providing them with exceptional service and education on weapon safety.
                    <br>
                    <br>
                    With over 50 years of firearms training, our staff is friendly and knowledgeable. We offer high-quality firearms, ammunition, and FFL transfers.
                </p>
            </div>
            <p class="photo-credits">
                Photo by <a href="https://unsplash.com/@jplenio?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Johannes Plenio</a> on <a href="https://unsplash.com/s/photos/autumn?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>
            </p>
        </div>

        <div id="owner" class="about-us-section">
            <div class="about-us">
                <h1 class="text-center about-us-title pt-4 pt-sm-0">
                    The Owner
                </h1>
                <p class="about-us-text px-3">
                    <span style="color: var(--grnLnk);">Mike Scarbrough</span> has been handling, training with, and educating others about firearms and safety for over four decades. Having served in the U.S. Army as a Combat Engineer, Mike is an expert with rifles, small arms, and explosives. His extensive training with firearms led to his participation in several competitive shooting disciplines including United States Practical Shooting Association (USPSA), International Defensive Pistol Association, Benchrest Shooting, and match shooting, among others. Mike is currently in the process of obtaining NRA certifications to instruct CCW classes.
                </p>
            </div>
            <p class="photo-credits">
                Photo by <a href="https://unsplash.com/@kantea?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Ak Ka</a> on <a href="https://unsplash.com/s/photos/camo?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>
            </p>
        </div>

        <div id="purchase-ins" class="about-us-section">
            <div class="title about-us about-us-owner-text">
                <h1 class="text-center about-us-title pt-4 pt-sm-0">
                    Purchase Instructions
                </h1>
                <p class="about-us-text px-3">
                    <span style="color: var(--grnLnk);">Doc Crosshairs</span> strictly adheres to state and federal laws and regulations surrounding firearm ownership. This means we will not provide, distribute, sell, or otherwise obtain any firearm for individuals who are under age or have a criminal background.
                    <br>
                    <br>
                    <span style="color: var(--redLnk);">
                        *Must be 18 years or older to purchase a firearm.
                        <br>
                        *All orders must be placed with a background check as per federal and state laws.
                    </span>
                </p>
            </div>
            <p class="photo-credits">
                Photo by <a href="https://unsplash.com/@adrientutinphoto?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Adrien Tutin</a> on <a href="https://unsplash.com/s/photos/leaves?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>
            </p>
        </div>

    </div>

    <?php
        require_once("$metadata[Path]inc/php/fringes/footer.inc.php");
        ob_end_flush();
    ?>
</body>

</html>
