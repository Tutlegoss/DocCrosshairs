<nav class="navbar navbar-expand-md nav-properties">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo $metadata["Path"]; ?>index.php">Doc Crosshairs</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-dropdown-style" aria-controls="navbar-dropdown-style" aria-expanded="false" aria-label="Toggle navigation">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#5BB477" class="bi bi-menu-button-wide-fill" viewBox="0 0 16 16">
                <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v2A1.5 1.5 0 0 0 1.5 5h13A1.5 1.5 0 0 0 16 3.5v-2A1.5 1.5 0 0 0 14.5 0h-13zm1 2h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1zm9.927.427A.25.25 0 0 1 12.604 2h.792a.25.25 0 0 1 .177.427l-.396.396a.25.25 0 0 1-.354 0l-.396-.396zM0 8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V8zm1 3v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2H1zm14-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2h14zM2 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
            </svg>
        </button>
        <div class="collapse navbar-collapse" id="navbar-dropdown-style">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $metadata["Path"]; ?>pages/aboutUs.php">About Us</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Contact Info
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            Mike Scarbrough
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            (330) 238-8801
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            doccrosshairs@gmail.com
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#!" tabindex="-1" style="color: var(--grnLnk);">
                        <span class="redLnk">Call for Appointment</span>:
                        (330) 238-8801
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $metadata["Path"]; ?>pages/checkout.php">
                        <i class="fas fa-shopping-cart" style="color: var(--grnLnk); font-size: 1.8rem;"></i><span class="badge badge-warning" id="cart-count">
                            <?php echo (isset($_SESSION["cartCount"])) ? $_SESSION["cartCount"] : "0"; ?>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div id="appointment-banner" class="container-fluid">
    <div class="row">
        <div class="col-12">
            <p class="text-center" style="font-weight: bold;">
                <span>Call for an Appointment</span>:
                (330) 238-8801
            </p>
        </div>
    </div>
</div>
