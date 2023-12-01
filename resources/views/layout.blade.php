<!DOCTYPE html>
<html lang="en">

<head>
    <meta property="og:title" content="Miranda Hotel" />
    <meta property="og:image" content="https://assets/images/miranda_h_logo.png" />
    <meta property="og:description" content="Discover Miranda Hotel – where luxury meets freedom. Explore our accommodations, amenities, and the essence of unparalleled hospitality." />
    <meta property="og:url" content="http://hotelmiranda.s3-website.eu-west-2.amazonaws.com/" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="627" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="shortcut icon" href="../favicon.ico" type="image/ico" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <title>@yield('title')</title>
</head>

<body>
    <div class="lock">
        <h3>We Make Your Feel Comfortable</h3>
    </div>
    <header class="header">
        <div class="header__mobile-left-items">
            <div class="header__mobile-icons-left">
                <div class="material-symbols-outlined header__mobile-burger-icon">
                    menu
                </div>
                <div class="material-symbols-outlined header__mobile-close-icon">
                    close
                </div>
            </div>
            <div class="header__logo-image">
                <div>
                    <a href="/index.php">
                        <img class="header__logo-image-h" src="../assets/images/miranda_h_logo.png" alt="an image of the logo" />
                    </a>
                </div>
                <div>
                    <a href="/index.php">
                        <img class="header__logo-image-words" src="../assets/images/miranda_words_logo.png" alt="an image of the logo" />
                    </a>
                </div>
            </div>
        </div>
        <div class="header__desktop-menu">
            <ul class="header__desktop-menu-list">
                <li class="header__desktop-menu-list-item">
                    <a class="item-link-about" href="/about-us.php">About Us</a>
                </li>
                <li class="header__desktop-menu-list-item">
                    <a class="item-link-rooms" href="/rooms.php">Rooms</a>
                </li>
                <li class="header__desktop-menu-list-item">
                    <a class="item-link-offers" href="/offers.php">Offers</a>
                </li>
                <li class="header__desktop-menu-list-item">
                    <a class="item-link-contact" href="/contact.php">Contact</a>
                </li>
            </ul>
        </div>
        <div class="header__mobile-icons-right">
            <div class="header__person-icon material-symbols-outlined">
                person
            </div>
        </div>
    </header>
    <section id="dropDown" class="mobile__drop-down-menu">
        <ul class="mobile__menu-list">
            <li class="mobile__menu-list-item">
                <a href="/about-us.php">About Us</a>
            </li>
            <li class="mobile__menu-list-item">
                <a href="/rooms.php">Rooms</a>
            </li>
            <li class="mobile__menu-list-item">
                <a href="/offers.php">Offers</a>
            </li>
            <li class="mobile__menu-list-item">
                <a href="/contact.php">Contact</a>
            </li>
        </ul>
    </section>


    <main>
        @yield('content')
    </main>

    <main class="footer">
        <div class="footer__external-container">
            <div class="footer__inner-container">
                <img class="footer__logo" src="../assets/images/miranda_logo_golden.png" alt="a golden miranda hotel logo" />
                <p class="footer__info-text">
                    Discover comfort and luxury at Miranda Hotel. Experience
                    impeccable service, stunning accommodations, and
                    unforgettable moments. Your perfect stay awaits. Book
                    now for an extraordinary experience.
                </p>
                <div class="footer__social-links">
                    <a href="https://www.facebook.com/"><img id="social-fb" src="../assets/images/social_btn/fb_social_white.png" alt="" /></a>
                    <a href="https://twitter.com/"><img id="social-tw" src="../assets/images/social_btn/tw_social_white.png" alt="" /></a>
                    <a href="https://www.behance.net/"><img id="social-be" src="../assets/images/social_btn/be_social_white.png" alt="" /></a>
                    <a href="https://www.linkedin.com/"><img id="social-in" src="../assets/images/social_btn/in_social_white.png" alt="" /></a>
                    <a href="https://www.youtube.com/"><img id="social-yt" src="../assets/images/social_btn/yt_social_white.png" alt="" /></a>
                </div>
            </div>
            <div>
                <h4 class="footer__services-title small-title">
                    Services.
                </h4>
                <div class="footer__services">
                    <div class="footer__services-colum-left">
                        <span class="footer__services-element">+ Restaurant & Bar</span>
                        <span class="footer__services-element">+ Swimming Pool</span>
                        <span class="footer__services-element">+ Wellness & Spa</span>
                        <span class="footer__services-element">+ Restaurant</span>
                        <span class="footer__services-element">+ Conference Room</span>
                        <span class="footer__services-element">+ Coctail Party House</span>
                    </div>
                    <div class="footer__services-colum-right">
                        <span class="footer__services-element">+ Gaming Zone</span>
                        <span class="footer__services-element">+ Marrige Party</span>
                        <span class="footer__services-element">+ Party Planning</span>
                        <span class="footer__services-element">+ Tour Consultancy</span>
                    </div>
                </div>
            </div>
            <div>
                <h4 class="footer__contact-us-title small-title">
                    Contact Us.
                </h4>
                <div class="footer__contact-us">
                    <div class="footer__contact-us-element">
                        <img src="../assets/images/contact_icons/call_icon.png" alt="" />
                        <div class="footer__contact-us-text-element">
                            <h4>Phone Number</h4>
                            <p>+34 934 764 263</p>
                        </div>
                    </div>
                    <div class="footer__contact-us-element">
                        <img src="../assets/images/contact_icons/email_icon.png" alt="" />
                        <div class="footer__contact-us-text-element">
                            <h4>Email Address</h4>
                            <p>miranda@hotels.luxury</p>
                        </div>
                    </div>
                    <div class="footer__contact-us-element">
                        <img src="../assets/images/contact_icons/address_icon.png" alt="" />
                        <div class="footer__contact-us-text-element">
                            <h4>Current Location</h4>
                            <p>C/ Sinfiol 146, CP: OX1-1AA</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="copyright">
        <div class="copyright__inner-content">
            <p>© 2023 Miranda Hotels</p>
            <span>Terms of use | Privacy Environmental Policy</span>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script type="module" src="../index.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

@if (isset($confirmation) && $confirmation !== '')
<script>
    Toastify({
        text: "{{$confirmation}}",
        duration: 3000,
        gravity: "bottom",
        position: "left",
        style: {
            background: "{{$error}}" ? "#de5777" : "#bead8e",
            padding: "30px 50px 30px 50px",
            fontSize: "1.5rem",
            fontWeight: "bold",
        }
    }).showToast();
</script>
@endif

</html>