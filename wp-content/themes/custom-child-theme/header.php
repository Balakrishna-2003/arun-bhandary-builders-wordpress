<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <title><?php echo get_the_title(); ?> | Arun Bhandary Builders & Developers</title>
     <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.png">
    <meta name="theme-color" content="#27872e" >
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">
     <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>


    <!-- =========================================================
         GOOGLE FONTS
    ========================================================== -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

 




  <link
    href="https://fonts.googleapis.com/css2?family=Allura&display=swap"
    rel="stylesheet"
> 
    
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">




      <link rel="stylesheet" href="css/style.css">
      <?php wp_head();?>
</head>
<body>
<!-- =========================================================
     HEADER
========================================================= -->

<header
    class="ab-main-header"
    id="abMainHeader"
>


    <div class="container-fluid px-xl-5 px-lg-4 px-3">


        <div class="ab-header-inner">


            <!-- =================================================
                 LOGO
            ================================================== -->

            <a
                href="index.html"
                class="ab-brand"
                aria-label="Arun Bhandary Builders and Developers"
            >

                <figure class="cr-figure">
                    <img
                    src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/arun-bhandary-builders-logo.png"
                    alt="Arun Bhandary Builders & Developers – Mangaluru, Udupi and Moodabidire"
                    title="Arun Bhandary Builders & Developers – Mangaluru, Udupi and Moodabidire"
                >
                    <figcaption class="cr-only">Arun Bhandary Builders & Developers – Mangaluru, Udupi and Moodabidire</figcaption>
                </figure>

            </a>


            <!-- =================================================
                 ONE SINGLE BOOTSTRAP NAVBAR

                 IMPORTANT:
                 This is the ONLY menu.

                 Desktop:
                 normal horizontal navbar

                 Mobile:
                 same navbar becomes offcanvas
            ================================================== -->

            <nav class="navbar navbar-expand-lg ab-navbar">

    <!-- MOBILE TOGGLE -->
    <button class="ab-mobile-toggle d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#abMainOffcanvas" aria-controls="abMainOffcanvas" aria-label="Open navigation menu">
        <span class="ab-toggle-lines">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </button>

    <!-- SINGLE OFFCANVAS -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="abMainOffcanvas" aria-labelledby="abMainOffcanvasLabel">

        <!-- MOBILE OFFCANVAS HEADER -->
        <div class="offcanvas-header ab-offcanvas-header d-lg-none">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="ab-brand">
                <figure class="cr-figure">
                    <!-- Using WordPress dynamic image path -->
                    <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/arun-bhandary-builders-logo.png' ); ?>" class="ab-offcanvas-logo" alt="Arun Bhandary Builders &amp; Developers">
                    <figcaption class="cr-only">Arun Bhandary Builders &amp; Developers – Mangaluru, Udupi and Moodabidire</figcaption>
                </figure>
            </a>

            <button type="button" class="ab-offcanvas-close" data-bs-dismiss="offcanvas" aria-label="Close menu">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>

        <!-- OFFCANVAS BODY -->
        <div class="offcanvas-body">

            <?php
            // THIS REPLACES YOUR HARDCODED MENU
            wp_nav_menu( array(
                'theme_location' => 'primary', // Make sure this matches your register_nav_menus
                'depth'          => 2,         // 1 = no dropdowns, 2 = with dropdowns
                'container'      => false,     // Prevents wrapping <div> around <ul>
                'menu_class'     => 'navbar-nav', // Bootstrap class for the <ul>
                'fallback_cb'    => false,
                'walker'         => new Bootstrap_5_WP_Nav_Menu_Walker(),
            ) );
            ?>

            <!-- ENQUIRE NOW -->
            <div class="ab-enquiry-wrap">
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="ab-enquiry-btn">
                    <span>Enquire Now</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>

        </div>
    </div>
</nav>


        </div>

    </div>

</header>