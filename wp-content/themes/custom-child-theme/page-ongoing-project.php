<?php
    /*Template Name: Ongoing Projects Template */
    get_header();
?>
<article>
    <div class="abb6-project-page">



    <!-- =====================================================
         HERO
    ====================================================== -->

    <section class="abb6-project-hero">


        <div class="abb6-project-hero-grid"></div>

        <div class="abb6-project-hero-line-left"></div>

        <div class="abb6-project-hero-line-right"></div>

        <div class="abb6-project-hero-square"></div>


        <div class="container">

            <div class="abb6-project-hero-content">


                <!-- BREADCRUMB -->

                <div class="abb6-project-breadcrumb">

                    <a href="<?php echo home_url(); ?>">
                        Home
                    </a>

                    <i class="fa-solid fa-chevron-right"></i>

                    <span>
                        Projects
                    </span>

                </div>


                <!-- LABEL -->

                <div class="abb6-project-hero-label">

                    <span></span>

                    OUR PROJECTS

                </div>


                <!-- HEADING -->

                <h1>

                    Find a place

                    <span>
                        to build your home.
                    </span>

                </h1>


                <p class="abb6-project-hero-description">

                    Explore thoughtfully planned layouts,
                    plots and residential opportunities across
                    Mangaluru and Udupi, with customized homes
                    designed around the way you want to live.

                </p>


                <div class="abb6-project-hero-bottom">

                    <div class="abb6-project-hero-bottom-line"></div>

                    <div class="abb6-project-hero-bottom-text">

                        MANGALURU · UDUPI · MOODABIDIRE

                    </div>

                </div>


            </div>

        </div>

    </section>



    <!-- =====================================================
         INTRO
    ====================================================== -->

    <section class="abb6-project-intro">

        <div class="container">


            <div class="row align-items-end">


                <div class="col-lg-6">

                    <div class="abb6-project-intro-label">

                        FIND YOUR DREAM HOME

                    </div>


                    <h2>

                        A place to begin.

                        <span>
                            A home to create.
                        </span>

                    </h2>

                </div>


                <div class="col-lg-6">

                    <p class="abb6-project-intro-text">

                        Your dream home begins with the right
                        choice of location, layout and design.
                        Explore our residential projects and
                        discover a place where your ideas can
                        take shape.

                    </p>

                </div>

            </div>


            <div class="abb6-project-intro-bottom">

                <span>
                    QUALITY CONSTRUCTION
                </span>

                <span>
                    THOUGHTFUL PLANNING
                </span>

                <span>
                    CUSTOMIZED HOMES
                </span>

                <span>
                    LASTING VALUE
                </span>

            </div>


        </div>

    </section>



    <!-- =====================================================
         PROJECT LIST
    ====================================================== -->

    <section class="abb6-project-list">

        <div class="container">


        <div
                class="abb6-project-grid"
                id="abb6ProjectGrid">

                <?php
// 1. Fetch the dynamic data for the current post
$project = get_project_details();

// 2. Format the price (Optional: Standard Indian Numbering System)
// If you prefer to just print the raw number they entered, you can use: ₹<?php echo esc_html($project['starting_price']); ?>
$formatted_price = !empty($project['starting_price']) ? '₹' . number_format((float)$project['starting_price']) : '';
?>

<article class="abb6-project-item">

    <div class="abb6-project-card">

        <!-- OVERLAY LINK -->
        <a class="abb6-project-card-overlay" href="<?php the_permalink(); ?>" aria-label="Open <?php the_title_attribute(); ?> project"></a>

        <div class="abb6-project-image">

            <!-- FEATURED IMAGE -->
            <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail('large'); ?>
            <?php else : ?>
                <!-- Fallback image if no featured image is set -->
                <img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/images/placeholder.jpg' ); ?>" alt="<?php the_title_attribute(); ?>">
            <?php endif; ?>

            <div class="abb6-project-image-frame"></div>

            <!-- STATUS -->
            <div class="abb6-project-status">
                <i class="fa-solid fa-circle"></i>
                Available
            </div>

            <!-- IMAGE LOCATION -->
            <?php if ( ! empty( $project['area_location'] ) ) : ?>
                <div class="abb6-project-image-location">
                    <i class="fa-solid fa-location-dot"></i>
                    <?php echo esc_html( $project['area_location'] ); ?>
                </div>
            <?php endif; ?>

        </div>

        <div class="abb6-project-body">

            <div class="abb6-project-body-top">

                <div>
                    <!-- TAGLINE (e.g., Residential Project) -->
                    <?php if ( ! empty( $project['tagline'] ) ) : ?>
                        <div class="abb6-project-category">
                            <?php echo esc_html( $project['tagline'] ); ?>
                        </div>
                    <?php endif; ?>

                    <!-- TITLE -->
                    <h2 class="abb6-project-title">
                        <?php the_title(); ?>
                        <?php if ( ! empty( $project['area_location'] ) ) : ?>
                            <span><?php echo esc_html( $project['area_location'] ); ?></span>
                        <?php endif; ?>
                    </h2>
                </div>

                <!-- STARTING PRICE -->
                <?php if ( ! empty( $formatted_price ) ) : ?>
                    <div class="abb6-project-price-block">
                        <div class="abb6-project-price-label">
                            Starting Price
                        </div>
                        <div class="abb6-project-price">
                            <?php echo esc_html( $formatted_price ); ?>
                        </div>
                    </div>
                <?php endif; ?>

            </div>

            <!-- ADDRESS -->
            <?php if ( ! empty( $project['address'] ) ) : ?>
                <div class="abb6-project-location">
                    <i class="fa-solid fa-location-dot"></i>
                    <span><?php echo esc_html( $project['address'] ); ?></span>
                </div>
            <?php endif; ?>

            <!-- SPECIFICATIONS -->
            <div class="abb6-project-specifications">

                <!-- BEDROOMS -->
                <?php if ( ! empty( $project['bedrooms'] ) ) : ?>
                    <div class="abb6-project-spec">
                        <div class="abb6-project-spec-icon">
                            <i class="fa-solid fa-bed"></i>
                        </div>
                        <span class="abb6-project-spec-label">Bedrooms</span>
                        <span class="abb6-project-spec-value"><?php echo esc_html( $project['bedrooms'] ); ?> Bedrooms</span>
                    </div>
                <?php endif; ?>

                <!-- BUILT-UP AREA -->
                <?php if ( ! empty( $project['built_up_area'] ) ) : ?>
                    <div class="abb6-project-spec">
                        <div class="abb6-project-spec-icon">
                            <i class="fa-solid fa-ruler-combined"></i>
                        </div>
                        <span class="abb6-project-spec-label">Built-up Area</span>
                        <span class="abb6-project-spec-value"><?php echo esc_html( $project['built_up_area'] ); ?></span>
                    </div>
                <?php endif; ?>

                <!-- PLOT AREA OR BEACH DISTANCE (Only shows one) -->
                <?php if ( ! empty( $project['plot_area'] ) ) : ?>
                    <div class="abb6-project-spec">
                        <div class="abb6-project-spec-icon">
                            <i class="fa-solid fa-vector-square"></i> <!-- Icon for Plot Area -->
                        </div>
                        <span class="abb6-project-spec-label">Plot Area</span>
                        <span class="abb6-project-spec-value"><?php echo esc_html( $project['plot_area'] ); ?></span>
                    </div>
                <?php elseif ( ! empty( $project['beach_distance'] ) ) : ?>
                    <div class="abb6-project-spec">
                        <div class="abb6-project-spec-icon">
                            <i class="fa-solid fa-umbrella-beach"></i> <!-- Icon for Beach Distance -->
                        </div>
                        <span class="abb6-project-spec-label">Beach Distance</span>
                        <span class="abb6-project-spec-value"><?php echo esc_html( $project['beach_distance'] ); ?></span>
                    </div>
                <?php endif; ?>

            </div>

            <!-- INFO ROW -->
            <div class="abb6-project-info-row">

                <!-- HOUSE TYPE -->
                <?php if ( ! empty( $project['house_type'] ) ) : ?>
                    <div class="abb6-project-info-item">
                        <i class="fa-solid fa-house"></i>
                        <?php echo esc_html( $project['house_type'] ); ?>
                    </div>
                    <div class="abb6-project-info-divider"></div>
                <?php endif; ?>

                <!-- AREA LOCATION -->
                <?php if ( ! empty( $project['area_location'] ) ) : ?>
                    <div class="abb6-project-info-item">
                        <i class="fa-solid fa-location-dot"></i>
                        <?php echo esc_html( $project['area_location'] ); ?>
                    </div>
                    <div class="abb6-project-info-divider"></div>
                <?php endif; ?>

                <!-- STATUS -->
                <div class="abb6-project-info-item">
                    <i class="fa-solid fa-check"></i>
                    Available
                </div>

            </div>

            <!-- ACTIONS -->
            <div class="abb6-project-actions">

                <a href="<?php the_permalink(); ?>" class="abb6-project-view">
                    View Project
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

                <!-- Update the contact link to your actual Contact page URL -->
                <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="abb6-project-enquire">
                    Enquire Now
                </a>

            </div>

        </div>

    </div>

</article>



                <!-- =================================================
                     PROJECT 1
                ================================================== -->

                <article class="abb6-project-item">

                    <div class="abb6-project-card">


                        

                        <a class="abb6-project-card-overlay" href="arun-bhandary-builders-kana-katla-hosabettu.html" aria-label="Open Kana Katla Hosabettu project"></a>

                        <div class="abb6-project-image">


                            <img
                                src="http://localhost/arun-bhandary-builders/wp-content/themes/custom-child-theme/assets/images/arun-bhandary-builders-kana-katla-65-lakh.jpg"
                                alt="Kana Katla Hosabettu Surathkal Mangaluru">


                            <div class="abb6-project-image-frame"></div>


                            <div class="abb6-project-status">

                                <i class="fa-solid fa-circle"></i>

                                Available

                            </div>


                            <div class="abb6-project-image-location">

                                <i class="fa-solid fa-location-dot"></i>

                                Hosabettu · Surathkal · Mangaluru

                            </div>


                        </div>



                        <div class="abb6-project-body">


                            <div class="abb6-project-body-top">


                                <div>

                                    <div class="abb6-project-category">

                                        Residential Project

                                    </div>


                                    <h2 class="abb6-project-title">

                                        Kana Katla

                                        <span>
                                            Hosabettu
                                        </span>

                                    </h2>

                                </div>


                                <div class="abb6-project-price-block">

                                    <div class="abb6-project-price-label">

                                        Starting Price

                                    </div>

                                    <div class="abb6-project-price">

                                        ₹65,00,000

                                    </div>

                                </div>


                            </div>


                            <div class="abb6-project-location">

                                <i class="fa-solid fa-location-dot"></i>

                                <span>
                                    Hosabettu, Surathkal,
                                    Mangaluru
                                </span>

                            </div>



                            <div class="abb6-project-specifications">


                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-bed"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Bedrooms
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        3 Bedrooms
                                    </span>

                                </div>


                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-ruler-combined"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Built-up Area
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        1200 Sq.Ft.
                                    </span>

                                </div>


                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-vector-square"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Plot Area
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        4 Cents
                                    </span>

                                </div>


                            </div>



                            <div class="abb6-project-info-row">


                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-house"></i>

                                    Villa

                                </div>


                                <div class="abb6-project-info-divider"></div>


                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-location-dot"></i>

                                    Mangaluru

                                </div>


                                <div class="abb6-project-info-divider"></div>


                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-check"></i>

                                    Available

                                </div>


                            </div>



                            <div class="abb6-project-actions">


                                <a
                                    href="arun-bhandary-builders-kana-katla-hosabettu.html"
                                    class="abb6-project-view">

                                    View Project

                                    <i class="fa-solid fa-arrow-right"></i>

                                </a>


                                <a
                                    href="arun-bhandary-builders-contact-us.html"
                                    class="abb6-project-enquire">

                                    Enquire Now

                                </a>


                            </div>


                        </div>

                    </div>

                </article>



                <!-- =================================================
                     PROJECT 2
                ================================================== -->

                <article class="abb6-project-item">

                    <div class="abb6-project-card">


                        

                        <a class="abb6-project-card-overlay" href="https://arunbhandarybuilder.com/project_gallery/kana-katla-hosabettu-surathkal-mangaluru-2/" aria-label="Open Kana Katla Hosabettu project"></a>

<div class="abb6-project-image">


                            <img
                                src="http://localhost/arun-bhandary-builders/wp-content/themes/custom-child-theme/assets/images/arun-bhandary-builders-kana-katla-60-lakh.jpg"
                                alt="Kana Katla Hosabettu Surathkal Mangaluru">


                            <div class="abb6-project-image-frame"></div>


                            <div class="abb6-project-status">

                                <i class="fa-solid fa-circle"></i>

                                Available

                            </div>


                            <div class="abb6-project-image-location">

                                <i class="fa-solid fa-location-dot"></i>

                                Hosabettu · Surathkal · Mangaluru

                            </div>


                        </div>



                        <div class="abb6-project-body">


                            <div class="abb6-project-body-top">


                                <div>

                                    <div class="abb6-project-category">
                                        Residential Project
                                    </div>

                                    <h2 class="abb6-project-title">

                                        Kana Katla

                                        <span>
                                            Hosabettu
                                        </span>

                                    </h2>

                                </div>


                                <div class="abb6-project-price-block">

                                    <div class="abb6-project-price-label">
                                        Starting Price
                                    </div>

                                    <div class="abb6-project-price">
                                        ₹60,00,000
                                    </div>

                                </div>


                            </div>


                            <div class="abb6-project-location">

                                <i class="fa-solid fa-location-dot"></i>

                                <span>
                                    Hosabettu, Surathkal,
                                    Mangaluru
                                </span>

                            </div>


                            <div class="abb6-project-specifications">


                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-bed"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Bedrooms
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        3 Bedrooms
                                    </span>

                                </div>


                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-ruler-combined"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Built-up Area
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        1200 Sq.Ft.
                                    </span>

                                </div>


                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-vector-square"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Plot Area
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        3.42 Cents
                                    </span>

                                </div>


                            </div>


                            <div class="abb6-project-info-row">


                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-house"></i>

                                    Villa

                                </div>


                                <div class="abb6-project-info-divider"></div>


                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-location-dot"></i>

                                    Mangaluru

                                </div>


                                <div class="abb6-project-info-divider"></div>


                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-check"></i>

                                    Available

                                </div>


                            </div>


                            <div class="abb6-project-actions">


                                <a
                                    href="https://arunbhandarybuilder.com/project_gallery/kana-katla-hosabettu-surathkal-mangaluru-2/"
                                    class="abb6-project-view">

                                    View Project

                                    <i class="fa-solid fa-arrow-right"></i>

                                </a>


                                <a
                                    href="arun-bhandary-builders-contact-us.html"
                                    class="abb6-project-enquire">

                                    Enquire Now

                                </a>


                            </div>


                        </div>

                    </div>

                </article>



                <!-- =================================================
                     PROJECT 3
                ================================================== -->

                <article class="abb6-project-item">

                    <div class="abb6-project-card">


                        

                        <a class="abb6-project-card-overlay" href="https://arunbhandarybuilder.com/project_gallery/kana-katla-hosabettu-surathkal-mangaluru/" aria-label="Open Kana Katla Hosabettu project"></a>

<div class="abb6-project-image">


                            <img
                                src="http://localhost/arun-bhandary-builders/wp-content/themes/custom-child-theme/assets/images/arun-bhandary-builders-kana-katla-55-lakh.jpg"
                                alt="Kana Katla Hosabettu Surathkal Mangaluru">


                            <div class="abb6-project-image-frame"></div>


                            <div class="abb6-project-status">

                                <i class="fa-solid fa-circle"></i>

                                Available

                            </div>


                            <div class="abb6-project-image-location">

                                <i class="fa-solid fa-location-dot"></i>

                                Hosabettu · Surathkal · Mangaluru

                            </div>


                        </div>



                        <div class="abb6-project-body">


                            <div class="abb6-project-body-top">


                                <div>

                                    <div class="abb6-project-category">
                                        Residential Project
                                    </div>

                                    <h2 class="abb6-project-title">

                                        Kana Katla

                                        <span>
                                            Hosabettu
                                        </span>

                                    </h2>

                                </div>


                                <div class="abb6-project-price-block">

                                    <div class="abb6-project-price-label">
                                        Starting Price
                                    </div>

                                    <div class="abb6-project-price">
                                        ₹55,00,000
                                    </div>

                                </div>


                            </div>


                            <div class="abb6-project-location">

                                <i class="fa-solid fa-location-dot"></i>

                                <span>
                                    Hosabettu, Surathkal,
                                    Mangaluru
                                </span>

                            </div>


                            <div class="abb6-project-specifications">


                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-bed"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Bedrooms
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        3 Bedrooms
                                    </span>

                                </div>


                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-ruler-combined"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Built-up Area
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        1200 Sq.Ft.
                                    </span>

                                </div>


                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-vector-square"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Plot Area
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        2.42 Cents
                                    </span>

                                </div>


                            </div>


                            <div class="abb6-project-info-row">


                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-house"></i>

                                    Villa

                                </div>


                                <div class="abb6-project-info-divider"></div>


                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-location-dot"></i>

                                    Mangaluru

                                </div>


                                <div class="abb6-project-info-divider"></div>


                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-check"></i>

                                    Available

                                </div>


                            </div>


                            <div class="abb6-project-actions">


                                <a
                                    href="https://arunbhandarybuilder.com/project_gallery/kana-katla-hosabettu-surathkal-mangaluru/"
                                    class="abb6-project-view">

                                    View Project

                                    <i class="fa-solid fa-arrow-right"></i>

                                </a>


                                <a
                                    href="arun-bhandary-builders-contact-us.html"
                                    class="abb6-project-enquire">

                                    Enquire Now

                                </a>


                            </div>


                        </div>

                    </div>

                </article>



                <!-- =================================================
                     PROJECT 4
                ================================================== -->

                <article class="abb6-project-item">

                    <div class="abb6-project-card">


                        

                        <a class="abb6-project-card-overlay" href="https://arunbhandarybuilder.com/project_gallery/surathkal-near-beach-mangaluru/" aria-label="Open Surathkal Near Beach project"></a>

<div class="abb6-project-image">


                            <img
                                src="http://localhost/arun-bhandary-builders/wp-content/themes/custom-child-theme/assets/images/arun-bhandary-builders-surathkal-near-beach.jpg"
                                alt="Surathkal Near Beach Mangaluru">


                            <div class="abb6-project-image-frame"></div>


                            <div class="abb6-project-status">

                                <i class="fa-solid fa-circle"></i>

                                Available

                            </div>


                            <div class="abb6-project-image-location">

                                <i class="fa-solid fa-location-dot"></i>

                                Surathkal · Mangaluru

                            </div>


                        </div>



                        <div class="abb6-project-body">


                            <div class="abb6-project-body-top">


                                <div>

                                    <div class="abb6-project-category">
                                        Residential Project
                                    </div>

                                    <h2 class="abb6-project-title">

                                        Surathkal

                                        <span>
                                            Near Beach
                                        </span>

                                    </h2>

                                </div>


                                <div class="abb6-project-price-block">

                                    <div class="abb6-project-price-label">
                                        Starting Price
                                    </div>

                                    <div class="abb6-project-price">
                                        ₹85,00,000
                                    </div>

                                </div>


                            </div>


                            <div class="abb6-project-location">

                                <i class="fa-solid fa-location-dot"></i>

                                <span>
                                    Surathkal, Mangaluru
                                </span>

                            </div>


                            <div class="abb6-project-specifications">


                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-bed"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Bedrooms
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        3 Bedrooms
                                    </span>

                                </div>


                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-ruler-combined"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Built-up Area
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        1200 Sq.Ft.
                                    </span>

                                </div>


                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-water"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Beach Distance
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        300m

                                    </span>

                                </div>


                            </div>


                            <div class="abb6-project-info-row">


                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-house"></i>

                                    Villa

                                </div>


                                <div class="abb6-project-info-divider"></div>


                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-location-dot"></i>

                                    Mangaluru

                                </div>


                                <div class="abb6-project-info-divider"></div>


                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-check"></i>

                                    Available

                                </div>


                            </div>


                            <div class="abb6-project-actions">


                                <a
                                    href="https://arunbhandarybuilder.com/project_gallery/surathkal-near-beach-mangaluru/"
                                    class="abb6-project-view">

                                    View Project

                                    <i class="fa-solid fa-arrow-right"></i>

                                </a>


                                <a
                                    href="arun-bhandary-builders-contact-us.html"
                                    class="abb6-project-enquire">

                                    Enquire Now

                                </a>


                            </div>


                        </div>

                    </div>

                </article>



                <!-- =================================================
                     PROJECT 5
                ================================================== -->

                <article class="abb6-project-item">

                    <div class="abb6-project-card">


                        

                        <a class="abb6-project-card-overlay" href="https://arunbhandarybuilder.com/project_gallery/madhya-nmpt-colony-surathkal/" aria-label="Open Madhya NMPT Colony project"></a>

<div class="abb6-project-image">


                            <img
                                src="http://localhost/arun-bhandary-builders/wp-content/themes/custom-child-theme/assets/images/arun-bhandary-builders-madhya-nmpt-colony.jpg"
                                alt="Madhya NMPT Colony Surathkal">


                            <div class="abb6-project-image-frame"></div>


                            <div class="abb6-project-status">

                                <i class="fa-solid fa-circle"></i>

                                Available

                            </div>


                            <div class="abb6-project-image-location">

                                <i class="fa-solid fa-location-dot"></i>

                                Madhya · Surathkal · Mangaluru

                            </div>


                        </div>



                        <div class="abb6-project-body">


                            <div class="abb6-project-body-top">


                                <div>

                                    <div class="abb6-project-category">
                                        Residential Project
                                    </div>

                                    <h2 class="abb6-project-title">

                                        Madhya NMPT

                                        <span>
                                            Colony
                                        </span>

                                    </h2>

                                </div>


                                <div class="abb6-project-price-block">

                                    <div class="abb6-project-price-label">
                                        Starting Price
                                    </div>

                                    <div class="abb6-project-price">
                                        ₹68,00,000
                                    </div>

                                </div>


                            </div>


                            <div class="abb6-project-location">

                                <i class="fa-solid fa-location-dot"></i>

                                <span>
                                    Madhya NMPT Colony,
                                    Surathkal, Mangaluru
                                </span>

                            </div>


                            <div class="abb6-project-specifications">


                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-bed"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Bedrooms
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        3 Bedrooms
                                    </span>

                                </div>


                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-ruler-combined"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Built-up Area
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        1200 Sq.Ft.
                                    </span>

                                </div>


                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-vector-square"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Plot Area
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        6 Cents
                                    </span>

                                </div>


                            </div>


                            <div class="abb6-project-info-row">


                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-house"></i>

                                    Villa

                                </div>


                                <div class="abb6-project-info-divider"></div>


                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-location-dot"></i>

                                    Mangaluru

                                </div>


                                <div class="abb6-project-info-divider"></div>


                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-check"></i>

                                    Available

                                </div>


                            </div>


                            <div class="abb6-project-actions">


                                <a
                                    href="https://arunbhandarybuilder.com/project_gallery/madhya-nmpt-colony-surathkal/"
                                    class="abb6-project-view">

                                    View Project

                                    <i class="fa-solid fa-arrow-right"></i>

                                </a>


                                <a
                                    href="arun-bhandary-builders-contact-us.html"
                                    class="abb6-project-enquire">

                                    Enquire Now

                                </a>


                            </div>


                        </div>

                    </div>

                </article>



                <!-- =================================================
                     PROJECT 6
                ================================================== -->

                <article class="abb6-project-item">

                    <div class="abb6-project-card">


                        

                        <a class="abb6-project-card-overlay" href="https://arunbhandarybuilder.com/project_gallery/kukkikatte-udupi/" aria-label="Open Kukkikatte Udupi project"></a>

<div class="abb6-project-image">


                            <img
                                src="http://localhost/arun-bhandary-builders/wp-content/themes/custom-child-theme/assets/images/arun-bhandary-builders-kukkikatte.jpg"
                                alt="Kukkikatte Udupi">


                            <div class="abb6-project-image-frame"></div>


                            <div class="abb6-project-status">

                                <i class="fa-solid fa-circle"></i>

                                Available

                            </div>


                            <div class="abb6-project-image-location">

                                <i class="fa-solid fa-location-dot"></i>

                                Kukkikatte · Udupi

                            </div>


                        </div>



                        <div class="abb6-project-body">


                            <div class="abb6-project-body-top">


                                <div>

                                    <div class="abb6-project-category">
                                        Residential Project
                                    </div>

                                    <h2 class="abb6-project-title">

                                        Kukkikatte

                                        <span>
                                            Udupi
                                        </span>

                                    </h2>

                                </div>


                                <div class="abb6-project-price-block">

                                    <div class="abb6-project-price-label">
                                        Starting Price
                                    </div>

                                    <div class="abb6-project-price">
                                        ₹75,00,000
                                    </div>

                                </div>


                            </div>


                            <div class="abb6-project-location">

                                <i class="fa-solid fa-location-dot"></i>

                                <span>
                                    Kukkikatte, Udupi
                                </span>

                            </div>


                            <div class="abb6-project-specifications">


                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-bed"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Bedrooms
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        3 Bedrooms
                                    </span>

                                </div>


                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-ruler-combined"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Built-up Area
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        1200 Sq.Ft.
                                    </span>

                                </div>


                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-vector-square"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Plot Area
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        6 Cents
                                    </span>

                                </div>


                            </div>


                            <div class="abb6-project-info-row">


                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-house"></i>

                                    Villa

                                </div>


                                <div class="abb6-project-info-divider"></div>


                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-location-dot"></i>

                                    Udupi

                                </div>


                                <div class="abb6-project-info-divider"></div>


                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-check"></i>

                                    Available

                                </div>


                            </div>


                            <div class="abb6-project-actions">


                                <a
                                    href="https://arunbhandarybuilder.com/project_gallery/kukkikatte-udupi/"
                                    class="abb6-project-view">

                                    View Project

                                    <i class="fa-solid fa-arrow-right"></i>

                                </a>


                                <a
                                    href="arun-bhandary-builders-contact-us.html"
                                    class="abb6-project-enquire">

                                    Enquire Now

                                </a>


                            </div>


                        </div>

                    </div>

                </article>



                <!-- =================================================
                     PROJECT 7 - DUMMY
                ================================================== -->

                <article class="abb6-project-item">

                    <div class="abb6-project-card">


                        

                        <a class="abb6-project-card-overlay" href="#" aria-label="Open Swamila Padavu project"></a>

<div class="abb6-project-image">

                            <img
                                src="http://localhost/arun-bhandary-builders/wp-content/themes/custom-child-theme/assets/images/arun-bhandary-builders-swamilapadavu-bajpe.jpg"
                                alt="Swamila Padavu Mangaluru">


                            <div class="abb6-project-image-frame"></div>


                            <div class="abb6-project-status">

                                <i class="fa-solid fa-circle"></i>

                                Available

                            </div>


                            <div class="abb6-project-image-location">

                                <i class="fa-solid fa-location-dot"></i>

                                Swamila Padavu · Mangaluru

                            </div>


                        </div>



                        <div class="abb6-project-body">


                            <div class="abb6-project-body-top">


                                <div>

                                    <div class="abb6-project-category">
                                        Residential Project
                                    </div>

                                    <h2 class="abb6-project-title">

                                        Swamila

                                        <span>
                                            Padavu
                                        </span>

                                    </h2>

                                </div>


                                <div class="abb6-project-price-block">

                                    <div class="abb6-project-price-label">
                                        Starting Price
                                    </div>

                                    <div class="abb6-project-price">
                                        ₹00,00,000
                                    </div>

                                </div>


                            </div>


                            <div class="abb6-project-location">

                                <i class="fa-solid fa-location-dot"></i>

                                <span>
                                    Swamila Padavu,
                                    Mangaluru
                                </span>

                            </div>


                            <div class="abb6-project-specifications">

                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-bed"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Bedrooms
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        3 Bedrooms
                                    </span>

                                </div>


                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-ruler-combined"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Built-up Area
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        1200 Sq.Ft.
                                    </span>

                                </div>


                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-vector-square"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Plot Area
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        4 Cents
                                    </span>

                                </div>

                            </div>


                            <div class="abb6-project-info-row">

                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-house"></i>

                                    Villa

                                </div>

                                <div class="abb6-project-info-divider"></div>

                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-location-dot"></i>

                                    Mangaluru

                                </div>

                                <div class="abb6-project-info-divider"></div>

                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-check"></i>

                                    Available

                                </div>

                            </div>


                            <div class="abb6-project-actions">

                                <a
                                    href="#"
                                    class="abb6-project-view">

                                    View Project

                                    <i class="fa-solid fa-arrow-right"></i>

                                </a>

                                <a
                                    href="arun-bhandary-builders-contact-us.html"
                                    class="abb6-project-enquire">

                                    Enquire Now

                                </a>

                            </div>


                        </div>

                    </div>

                </article>



                <!-- =================================================
                     PROJECT 8 - DUMMY
                ================================================== -->

                <article class="abb6-project-item">

                    <div class="abb6-project-card">

                        

                        <a class="abb6-project-card-overlay" href="#" aria-label="Open Kulai Mangaluru project"></a>

<div class="abb6-project-image">

                            <img
                                src="http://localhost/arun-bhandary-builders/wp-content/themes/custom-child-theme/assets/images/arun-bhandary-builders-kulai.jpg"
                                alt="Kulai Mangaluru">

                            <div class="abb6-project-image-frame"></div>

                            <div class="abb6-project-status">

                                <i class="fa-solid fa-circle"></i>

                                Available

                            </div>

                            <div class="abb6-project-image-location">

                                <i class="fa-solid fa-location-dot"></i>

                                Kulai · Mangaluru

                            </div>

                        </div>


                        <div class="abb6-project-body">

                            <div class="abb6-project-body-top">

                                <div>

                                    <div class="abb6-project-category">
                                        Residential Project
                                    </div>

                                    <h2 class="abb6-project-title">

                                        Kulai

                                        <span>
                                            Mangaluru
                                        </span>

                                    </h2>

                                </div>

                                <div class="abb6-project-price-block">

                                    <div class="abb6-project-price-label">
                                        Starting Price
                                    </div>

                                    <div class="abb6-project-price">
                                        ₹00,00,000
                                    </div>

                                </div>

                            </div>


                            <div class="abb6-project-location">

                                <i class="fa-solid fa-location-dot"></i>

                                <span>
                                    Kulai, Mangaluru
                                </span>

                            </div>


                            <div class="abb6-project-specifications">

                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-bed"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Bedrooms
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        3 Bedrooms
                                    </span>

                                </div>

                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-ruler-combined"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Built-up Area
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        1200 Sq.Ft.
                                    </span>

                                </div>

                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-vector-square"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Plot Area
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        4 Cents
                                    </span>

                                </div>

                            </div>


                            <div class="abb6-project-info-row">

                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-house"></i>

                                    Villa

                                </div>

                                <div class="abb6-project-info-divider"></div>

                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-location-dot"></i>

                                    Mangaluru

                                </div>

                                <div class="abb6-project-info-divider"></div>

                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-check"></i>

                                    Available

                                </div>

                            </div>


                            <div class="abb6-project-actions">

                                <a
                                    href="#"
                                    class="abb6-project-view">

                                    View Project

                                    <i class="fa-solid fa-arrow-right"></i>

                                </a>

                                <a
                                    href="arun-bhandary-builders-contact-us.html"
                                    class="abb6-project-enquire">

                                    Enquire Now

                                </a>

                            </div>

                        </div>

                    </div>

                </article>



                <!-- =================================================
                     PROJECT 9 - DUMMY
                ================================================== -->

                <article class="abb6-project-item">

                    <div class="abb6-project-card">

                        

                        <a class="abb6-project-card-overlay" href="#" aria-label="Open Kavoor Mangaluru project"></a>

<div class="abb6-project-image">

                            <img
                                src="http://localhost/arun-bhandary-builders/wp-content/themes/custom-child-theme/assets/images/arun-bhandary-builders-kavoor-mangaluru.jpg"
                                alt="Kavoor Mangaluru">

                            <div class="abb6-project-image-frame"></div>

                            <div class="abb6-project-status">

                                <i class="fa-solid fa-circle"></i>

                                Available

                            </div>

                            <div class="abb6-project-image-location">

                                <i class="fa-solid fa-location-dot"></i>

                                Kavoor · Mangaluru

                            </div>

                        </div>


                        <div class="abb6-project-body">

                            <div class="abb6-project-body-top">

                                <div>

                                    <div class="abb6-project-category">
                                        Residential Project
                                    </div>

                                    <h2 class="abb6-project-title">

                                        Kavoor

                                        <span>
                                            Mangaluru
                                        </span>

                                    </h2>

                                </div>

                                <div class="abb6-project-price-block">

                                    <div class="abb6-project-price-label">
                                        Starting Price
                                    </div>

                                    <div class="abb6-project-price">
                                        ₹00,00,000
                                    </div>

                                </div>

                            </div>


                            <div class="abb6-project-location">

                                <i class="fa-solid fa-location-dot"></i>

                                <span>
                                    Kavoor, Mangaluru
                                </span>

                            </div>


                            <div class="abb6-project-specifications">

                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-bed"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Bedrooms
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        3 Bedrooms
                                    </span>

                                </div>

                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-ruler-combined"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Built-up Area
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        1200 Sq.Ft.
                                    </span>

                                </div>

                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-vector-square"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Plot Area
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        4 Cents
                                    </span>

                                </div>

                            </div>


                            <div class="abb6-project-info-row">

                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-house"></i>

                                    Villa

                                </div>

                                <div class="abb6-project-info-divider"></div>

                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-location-dot"></i>

                                    Mangaluru

                                </div>

                                <div class="abb6-project-info-divider"></div>

                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-check"></i>

                                    Available

                                </div>

                            </div>


                            <div class="abb6-project-actions">

                                <a
                                    href="#"
                                    class="abb6-project-view">

                                    View Project

                                    <i class="fa-solid fa-arrow-right"></i>

                                </a>

                                <a
                                    href="arun-bhandary-builders-contact-us.html"
                                    class="abb6-project-enquire">

                                    Enquire Now

                                </a>

                            </div>

                        </div>

                    </div>

                </article>



                <!-- =================================================
                     PROJECT 10 - DUMMY
                ================================================== -->

                <article class="abb6-project-item">

                    <div class="abb6-project-card">

                        

                        <a class="abb6-project-card-overlay" href="#" aria-label="Open Bondel Mangaluru project"></a>

<div class="abb6-project-image">

                            <img
                                src="http://localhost/arun-bhandary-builders/wp-content/themes/custom-child-theme/assets/images/project-bondel.jpg"
                                alt="Bondel Mangaluru">

                            <div class="abb6-project-image-frame"></div>

                            <div class="abb6-project-status">

                                <i class="fa-solid fa-circle"></i>

                                Available

                            </div>

                            <div class="abb6-project-image-location">

                                <i class="fa-solid fa-location-dot"></i>

                                Bondel · Mangaluru

                            </div>

                        </div>


                        <div class="abb6-project-body">

                            <div class="abb6-project-body-top">

                                <div>

                                    <div class="abb6-project-category">
                                        Residential Project
                                    </div>

                                    <h2 class="abb6-project-title">

                                        Bondel

                                        <span>
                                            Mangaluru
                                        </span>

                                    </h2>

                                </div>

                                <div class="abb6-project-price-block">

                                    <div class="abb6-project-price-label">
                                        Starting Price
                                    </div>

                                    <div class="abb6-project-price">
                                        ₹00,00,000
                                    </div>

                                </div>

                            </div>


                            <div class="abb6-project-location">

                                <i class="fa-solid fa-location-dot"></i>

                                <span>
                                    Bondel, Mangaluru
                                </span>

                            </div>


                            <div class="abb6-project-specifications">

                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-bed"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Bedrooms
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        3 Bedrooms
                                    </span>

                                </div>

                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-ruler-combined"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Built-up Area
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        1200 Sq.Ft.
                                    </span>

                                </div>

                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-vector-square"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Plot Area
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        4 Cents
                                    </span>

                                </div>

                            </div>


                            <div class="abb6-project-info-row">

                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-house"></i>

                                    Villa

                                </div>

                                <div class="abb6-project-info-divider"></div>

                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-location-dot"></i>

                                    Mangaluru

                                </div>

                                <div class="abb6-project-info-divider"></div>

                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-check"></i>

                                    Available

                                </div>

                            </div>


                            <div class="abb6-project-actions">

                                <a
                                    href="#"
                                    class="abb6-project-view">

                                    View Project

                                    <i class="fa-solid fa-arrow-right"></i>

                                </a>

                                <a
                                    href="arun-bhandary-builders-contact-us.html"
                                    class="abb6-project-enquire">

                                    Enquire Now

                                </a>

                            </div>

                        </div>

                    </div>

                </article>



                <!-- =================================================
                     PROJECT 11 - DUMMY
                ================================================== -->

                <article class="abb6-project-item">

                    <div class="abb6-project-card">

                        

                        <a class="abb6-project-card-overlay" href="#" aria-label="Open Kodical Mangaluru project"></a>

<div class="abb6-project-image">

                            <img
                                src="http://localhost/arun-bhandary-builders/wp-content/themes/custom-child-theme/assets/images/project-kodical.jpg"
                                alt="Kodical Mangaluru">

                            <div class="abb6-project-image-frame"></div>

                            <div class="abb6-project-status">

                                <i class="fa-solid fa-circle"></i>

                                Available

                            </div>

                            <div class="abb6-project-image-location">

                                <i class="fa-solid fa-location-dot"></i>

                                Kodical · Mangaluru

                            </div>

                        </div>


                        <div class="abb6-project-body">

                            <div class="abb6-project-body-top">

                                <div>

                                    <div class="abb6-project-category">
                                        Residential Project
                                    </div>

                                    <h2 class="abb6-project-title">

                                        Kodical

                                        <span>
                                            Mangaluru
                                        </span>

                                    </h2>

                                </div>

                                <div class="abb6-project-price-block">

                                    <div class="abb6-project-price-label">
                                        Starting Price
                                    </div>

                                    <div class="abb6-project-price">
                                        ₹00,00,000
                                    </div>

                                </div>

                            </div>


                            <div class="abb6-project-location">

                                <i class="fa-solid fa-location-dot"></i>

                                <span>
                                    Kodical, Mangaluru
                                </span>

                            </div>


                            <div class="abb6-project-specifications">

                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-bed"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Bedrooms
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        3 Bedrooms
                                    </span>

                                </div>

                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-ruler-combined"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Built-up Area
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        1200 Sq.Ft.
                                    </span>

                                </div>

                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-vector-square"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Plot Area
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        4 Cents
                                    </span>

                                </div>

                            </div>


                            <div class="abb6-project-info-row">

                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-house"></i>

                                    Villa

                                </div>

                                <div class="abb6-project-info-divider"></div>

                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-location-dot"></i>

                                    Mangaluru

                                </div>

                                <div class="abb6-project-info-divider"></div>

                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-check"></i>

                                    Available

                                </div>

                            </div>


                            <div class="abb6-project-actions">

                                <a
                                    href="#"
                                    class="abb6-project-view">

                                    View Project

                                    <i class="fa-solid fa-arrow-right"></i>

                                </a>

                                <a
                                    href="arun-bhandary-builders-contact-us.html"
                                    class="abb6-project-enquire">

                                    Enquire Now

                                </a>

                            </div>

                        </div>

                    </div>

                </article>



                <!-- =================================================
                     PROJECT 12 - DUMMY
                ================================================== -->

                <article class="abb6-project-item">

                    <div class="abb6-project-card">

                        

                        <a class="abb6-project-card-overlay" href="#" aria-label="Open Ahom Garden Bajpe project"></a>

<div class="abb6-project-image">

                            <img
                                src="http://localhost/arun-bhandary-builders/wp-content/themes/custom-child-theme/assets/images/project-ahom-garden.jpg"
                                alt="Ahom Garden Bajpe Mangaluru">

                            <div class="abb6-project-image-frame"></div>

                            <div class="abb6-project-status">

                                <i class="fa-solid fa-circle"></i>

                                Available

                            </div>

                            <div class="abb6-project-image-location">

                                <i class="fa-solid fa-location-dot"></i>

                                Bajpe · Mangaluru

                            </div>

                        </div>


                        <div class="abb6-project-body">

                            <div class="abb6-project-body-top">

                                <div>

                                    <div class="abb6-project-category">
                                        Residential Project
                                    </div>

                                    <h2 class="abb6-project-title">

                                        Ahom Garden

                                        <span>
                                            Bajpe
                                        </span>

                                    </h2>

                                </div>

                                <div class="abb6-project-price-block">

                                    <div class="abb6-project-price-label">
                                        Starting Price
                                    </div>

                                    <div class="abb6-project-price">
                                        ₹00,00,000
                                    </div>

                                </div>

                            </div>


                            <div class="abb6-project-location">

                                <i class="fa-solid fa-location-dot"></i>

                                <span>
                                    Bajpe, Mangaluru
                                </span>

                            </div>


                            <div class="abb6-project-specifications">

                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-bed"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Bedrooms
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        3 Bedrooms
                                    </span>

                                </div>

                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-ruler-combined"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Built-up Area
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        1200 Sq.Ft.
                                    </span>

                                </div>

                                <div class="abb6-project-spec">

                                    <div class="abb6-project-spec-icon">
                                        <i class="fa-solid fa-vector-square"></i>
                                    </div>

                                    <span class="abb6-project-spec-label">
                                        Plot Area
                                    </span>

                                    <span class="abb6-project-spec-value">
                                        4 Cents
                                    </span>

                                </div>

                            </div>


                            <div class="abb6-project-info-row">

                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-house"></i>

                                    Villa

                                </div>

                                <div class="abb6-project-info-divider"></div>

                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-location-dot"></i>

                                    Mangaluru

                                </div>

                                <div class="abb6-project-info-divider"></div>

                                <div class="abb6-project-info-item">

                                    <i class="fa-solid fa-check"></i>

                                    Available

                                </div>

                            </div>


                            <div class="abb6-project-actions">

                                <a
                                    href="#"
                                    class="abb6-project-view">

                                    View Project

                                    <i class="fa-solid fa-arrow-right"></i>

                                </a>

                                <a
                                    href="arun-bhandary-builders-contact-us.html"
                                    class="abb6-project-enquire">

                                    Enquire Now

                                </a>

                            </div>

                        </div>

                    </div>

                </article>


            </div>

        </div>

    </section>



    <!-- =====================================================
         PAGINATION
    ====================================================== -->

    <section class="abb6-project-pagination-section">

        <div class="container">


            <div class="abb6-project-pagination-line"></div>


            <div class="abb6-project-pagination">


                <div
                    class="abb6-project-pagination-info"
                    id="abb6PaginationInfo">

                    Showing
                    <strong>1–6</strong>
                    of
                    <strong>12</strong>
                    projects

                </div>


                <div
                    class="abb6-project-pagination-controls"
                    id="abb6PaginationControls">

                </div>


            </div>

        </div>

    </section>



    <!-- =====================================================
         CTA
    ====================================================== -->



</div>
</article>
<?php
    get_footer();
?>