<?php
get_header();

$post_id = get_the_ID();
$title = get_the_title();

$permalink = get_the_permalink();
$title = get_the_title();
$content = get_the_content();
$post_thumb_url = get_the_post_thumbnail_url();
$starting_price = get_post_meta($post_id, '_prop_starting_price', true);
$address = get_post_meta($post_id, '_prop_address', true);
$city = get_post_meta($post_id, '_prop_city', true);
$bedrooms = get_post_meta($post_id, '_prop_bedrooms', true);
$built_up_area = get_post_meta($post_id, '_prop_built_up_area', true);
$parking = get_post_meta($post_id, '_prop_parking', true);
$availability = get_post_meta($post_id, '_prop_availability', true);


$land = get_post_meta($post_id, '_prop_land', true);
$water = get_post_meta($post_id, '_prop_water', true);
$vastu = get_post_meta($post_id, '_prop_vastu', true);
$bank_approval = get_post_meta($post_id, '_prop_bank_approval', true);
$nearby_places = get_post_meta($post_id, '_prop_nearby_places', true);
$amentities = get_post_meta($post_id, '_prop_amenities', true);
$google_map_url = get_post_meta($post_id, '_prop_google_map', true);


$gallery = get_post_meta($post_id, '_prop_gallery', true);

// echo $gallery[0]['title'] . '<br>';
// echo wp_get_attachment_image_url($gallery[0]['id'], 'large');

?>

<article>

    <!-- BREADCRUMB -->
    <section class="ab-breadcrumb">
        <div class="container ab-container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo home_url(); ?>">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?php echo home_url(); ?>">Projects</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo $title; ?>
                    </li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- HERO: DARK NAVY -->
    <section class="ab-hero">
        <div class="container ab-container">
            <div class="row align-items-center g-lg-5">

                <div class="col-lg-6">
                    <div class="ab-kicker">Featured Residential Property</div>

                    <h1 class="ab-hero-title">
                        <?php
                        $title = trim(get_the_title());

                        // 2. Split the title into an array of words based on spaces
                        $words = explode(' ', $title);
                        $last_word = '';

                        // 3. Separate the last word from the rest
                        if (count($words) > 1) {
                            $last_word = array_pop($words); // Grabs the last word and removes it from the array
                            $rest_of_title = implode(' ', $words); // Puts the remaining words back together
                            echo $rest_of_title;
                        ?>

                            <span>
                                <?php echo $last_word; ?>
                            </span>
                        <?php
                        } else {
                            // Fallback if the title is only one word
                            $rest_of_title = $words[0];
                            $last_word = '';
                        }
                        echo ',', $address;
                        ?>
                    </h1>

                    <div class="ab-location">
                        <i class="bi bi-geo-alt-fill"></i>
                        <?php echo $address; ?>
                    </div>

                    <p class="ab-hero-copy">
                        Discover a residential destination offering
                        peaceful surroundings, everyday convenience
                        and connectivity to the wider Mangaluru region.
                    </p>

                    <div class="ab-price">
                        <small>Land + Construction Cost</small>
                        <strong>
                            <?php

                            if ($starting_price[0] >= 0 && $starting_price[0] <= 9) {
                                echo '₹';
                            };
                            echo trim($starting_price);
                            ?>
                        </strong>
                    </div>

                    <div class="ab-hero-actions">
                        <a href="tel:+918277261222" class="ab-btn">
                            <i class="bi bi-telephone"></i> Enquire Now
                        </a>
                        <a href="#project-details" class="ab-btn ab-btn-outline">
                            View Property
                        </a>
                    </div>

                    <div class="ab-hero-meta">
                        <span><i class="bi bi-check-circle-fill"></i>
                            <?php
                            if ($bedrooms > 1) {
                                echo $bedrooms . ' Bedrooms';
                            } else {
                                echo $bedrooms . ' Bedroom';
                            }
                            ?>
                        </span>
                        <span><i class="bi bi-check-circle-fill"></i><?php echo $land; ?></span>
                        <?php
                        echo ($parking === 'Yes') ? '<span><i class="bi bi-check-circle-fill"></i>Parking</span>' : '';
                        ?>

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="ab-hero-photo">
                        <img
                            src="<?php echo $post_thumb_url; ?>"
                            alt="Contemporary residential house"
                            data-gallery="Kana Katla"
                            data-caption="Residential Property Exterior"
                            fetchpriority="high">

                        <div class="ab-image-tag">
                            <i class="bi bi-geo-alt-fill me-2"></i>
                            <?php echo $address; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- PROPERTY FACTS -->
    <section class="ab-facts">
        <div class="container ab-container">
            <div class="row g-3">



                <div class="col-6 col-lg">
                    <div class="ab-stat">
                        <i class="bi bi-aspect-ratio"></i>
                        <?php
                        // Your variable

                        // This regex looks for numbers and commas at the start of the string, and captures the rest as the unit.
                        if (preg_match('/^([0-9,]+)(.*)$/', trim($built_up_area), $matches)) {
                            $number = $matches[1]; // "1,300"
                            $unit   = $matches[2]; // " sq. ft"
                        } else {
                            // Fallback if no numbers are found
                            $number = '';
                            $unit   = $built_up_area;
                        }

                        echo '<strong>' . esc_html($number) . '</strong>';
                        echo '<span>' . esc_html($unit) . '</span>';
                        ?>
                        <!-- <strong>1,200</strong>
                        <span>Sq. Ft. Area</span> -->
                    </div>
                </div>

                <?php
                if (!empty($bedrooms)) {
                ?>
                    <div class="col-6 col-lg">
                        <div class="ab-stat">
                            <i class="bi bi-house-door"></i>
                            <strong><?php echo $bedrooms; ?></strong>
                            <span>Bedrooms</span>
                        </div>
                    </div>
                <?php
                }
                ?>


                <?php
                if (!empty($bedrooms)) {
                ?>
                    <div class="col-6 col-lg">
                        <div class="ab-stat">
                            <i class="bi bi-bounding-box"></i>

                            <strong><?php echo $land; ?></strong>
                            <span>Land Area</span>
                        </div>
                    </div>
                <?php
                }
                ?>

                <?php
                if ($parking == 'Yes') {
                ?>
                    <div class="col-6 col-lg">
                        <div class="ab-stat">
                            <i class="bi bi-car-front"></i>
                            <strong>Available</strong>
                            <span>Parking</span>
                        </div>
                    </div>
                <?php
                }
                ?>

                <div class="col-12 col-lg">
                    <div class="ab-stat">
                        <i class="bi bi-currency-rupee"></i>
                        <?php
                        // Remove everything except numbers and decimal points
                        $clean_string = preg_replace('/[^0-9.]/', '', $starting_price);

                        // Convert to an integer (or use floatval() if you have decimals)
                        $number = (int) $clean_string;
                        echo '<strong>' . format_indian_price($starting_price) . '</strong>';
                        ?>

                        <!-- <strong>65 Lakhs</strong> -->
                        <span>Listed Cost</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ABOUT: COMPLETE DESCRIPTION -->
    <section class="ab-section ab-soft">
        <div class="container ab-container">
            <div class="row align-items-center g-5">

                <div class="col-lg-6">
                    <img
                        class="ab-about-image"
                        src="<?php echo $post_thumb_url; ?>"
                        alt="<?php echo $title; ?>"
                        data-gallery="<?php echo $title; ?>"
                        data-caption="<?php echo $title; ?>"
                        loading="lazy">
                </div>

                <div class="col-lg-6">
                    <div class="ab-about-content">

                        <div class="ab-kicker">About the Property</div>

                        <h2 class="ab-title">
                            A Place to Call
                            <span>Home</span>
                        </h2>

                        <?php
                        the_content();
                        ?>

                        <!-- <p>
                            Kana Katla, Hosabettu, Surathkal, is emerging as an attractive residential and real estate destination, offering a perfect blend of peaceful surroundings and urban convenience.
                        </p>

                        <p>
                            The location provides easy access to essential amenities, educational institutions, healthcare facilities, shopping areas, and major roads, making it an ideal choice for families and professionals.
                        </p>

                        <p>
                            With growing development in and around Surathkal and Mangaluru, properties in Kana Katla, Hosabettu offer excellent potential for long-term value appreciation. The peaceful neighbourhood, convenient connectivity, and proximity to prominent landmarks make it a desirable location for both homebuyers and investors.
                        </p>

                        <p>
                            Whether you are looking for a comfortable home or a smart real estate investment, Kana Katla, Hosabettu, Surathkal offers an opportunity to enjoy a well-connected and quality lifestyle. Don’t miss the opportunity to make Kana Katla, Hosabettu your next home.
                        </p> -->

                        <div class="ab-quote">
                            <i class="bi bi-geo-alt-fill"></i>
                            A peaceful neighbourhood with access to
                            the conveniences of Mangaluru.
                        </div>

                        <a href="tel:+918277261222" class="ab-btn mt-4">
                            Enquire About This Property
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- LOCATION ADVANTAGES -->
    <section class="ab-section">
        <div class="container ab-container">

            <div class="text-center mb-5">
                <div class="ab-kicker">Location Advantages</div>
                <h2 class="ab-title">
                    Everything Within
                    <span>Reach</span>
                </h2>
                <p class="ab-muted">
                    Explore the everyday benefits of the Hosabettu location.
                </p>
            </div>

            <div class="row g-3">

                <div class="col-sm-6 col-lg-3">
                    <div class="ab-benefit">
                        <div class="ab-benefit-icon">
                            <i class="bi bi-mortarboard"></i>
                        </div>
                        <h3>Education</h3>
                        <p>Access to schools, colleges and educational institutions in the surrounding area.</p>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="ab-benefit">
                        <div class="ab-benefit-icon">
                            <i class="bi bi-hospital"></i>
                        </div>
                        <h3>Healthcare</h3>
                        <p>Healthcare facilities and essential services around Surathkal.</p>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="ab-benefit">
                        <div class="ab-benefit-icon">
                            <i class="bi bi-signpost-2"></i>
                        </div>
                        <h3>Connectivity</h3>
                        <p>Road connections to Surathkal and other parts of Mangaluru.</p>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="ab-benefit">
                        <div class="ab-benefit-icon">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                        <h3>Investment Potential</h3>
                        <p>Consider the area's development when evaluating long-term property opportunities.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- PROJECT DETAILS -->
    <section class="ab-section border-section" id="project-details">
        <div class="container ab-container">

            <div class="text-center mb-5">
                <div class="ab-kicker">Property Information</div>
                <h2 class="ab-title">Project <span>Details</span></h2>
                <p class="ab-muted">
                    Explore the listed specifications and enquiry information.
                </p>
            </div>

            <div class="row g-4">

                <div class="col-lg-7">
                    <div class="ab-details-card">

                        <h3 class="ab-card-title">
                            <i class="bi bi-building"></i>
                            Property Specifications
                        </h3>

                        <div class="ab-detail-row">
                            <span>Project Name</span>
                            <strong><?php echo $title; ?></strong>
                        </div>

                        <div class="ab-detail-row">
                            <span>Location</span>
                            <strong><?php echo $address; ?></strong>
                        </div>

                        <div class="ab-detail-row">
                            <span>Listed Area</span>
                            <strong><?php echo $built_up_area; ?></strong>
                        </div>

                        <?php
                        if (!empty($bedrooms)) {
                        ?>
                            <div class="ab-detail-row">
                                <span>Bedrooms</span>
                                <strong><?php echo $bedrooms; ?></strong>
                            </div>
                        <?php
                        }
                        ?>

                        <?php
                        if (!empty($land)) {
                        ?>
                            <div class="ab-detail-row">
                                <span>Land Area</span>
                                <strong><?php echo $land; ?></strong>
                            </div>
                        <?php
                        }
                        ?>

                        <?php
                        if ($parking === 'Yes') {
                        ?>
                            <div class="ab-detail-row">
                                <span>Parking</span>
                                <strong>Yes</strong>
                            </div>
                        <?php
                        }
                        ?>

                        <?php
                        if ($vastu === 'Yes') {
                        ?>
                            <div class="ab-detail-row">
                                <span>Vastu</span>
                                <strong>Yes</strong>
                            </div>
                        <?php
                        }
                        ?>

                        <?php
                        if (!empty($water)) {
                        ?>
                            <div class="ab-detail-row">
                                <span>Water Supply</span>
                                <strong><?php echo $water; ?></strong>
                            </div>
                        <?php
                        }
                        ?>

                        <?php
                        if (!empty($bank_approval)) {
                        ?>
                            <div class="ab-detail-row">
                                <span>Bank Approval</span>
                                <strong><?php echo $bank_approval; ?></strong>
                            </div>
                        <?php
                        }
                        ?>


                        <div class="ab-detail-row">
                            <span>Land + Construction Cost</span>
                            <strong class="ab-red-value"><?php echo $starting_price; ?></strong>
                        </div>

                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="ab-contact-card">

                        <i class="bi bi-house-heart-fill"></i>

                        <h3>Interested in This Property?</h3>

                        <p class="mt-3">
                            Contact our team to enquire about Kana Katla,
                            Hosabettu and arrange a site visit.
                        </p>

                        <div class="ab-contact-line">
                            <i class="bi bi-telephone"></i>
                            <div>
                                <small>Call Us</small>
                                <a href="tel:+918277261222">+91 82772 61222</a>
                            </div>
                        </div>

                        <div class="ab-contact-line">
                            <i class="bi bi-envelope"></i>
                            <div>
                                <small>Email Us</small>
                                <a href="mailto:connect@arunbhandarybuilder.com">
                                    connect@arunbhandarybuilder.com
                                </a>
                            </div>
                        </div>

                        <a href="tel:+918277261222" class="ab-btn mt-3">
                            Contact Our Team
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- NEARBY PLACES -->
    <section class="ab-section border-section">
        <div class="container ab-container">

            <div class="mb-4">
                <div class="ab-kicker">Explore the Neighbourhood</div>
                <h2 class="ab-title">Nearby <span>Places</span></h2>
                <p class="ab-muted">
                    Nearby destinations listed for the Hosabettu area.
                </p>
            </div>



            <div class="ab-table-wrap">
                <div class="table-responsive">
                    <table class="table ab-table">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Distance</th>
                                <th>Nearby Place</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($nearby_places)) {
                                foreach ($nearby_places as $nearby_place):
                            ?>
                                    <tr>
                                        <td class="ab-type"><?php echo $nearby_place['type']; ?></td>
                                        <td><span class="ab-distance"><?php echo $nearby_place['distance']; ?></span></td>
                                        <td><?php echo $nearby_place['name']; ?></td>
                                    </tr>
                                <?php
                                endforeach;
                            } else {
                                ?>
                                <tr>
                                    <td colspan="3" class="text-center">No Records Found!</td>
                                </tr>
                            <?php
                            }
                            ?>

                            <!-- <tr>
                                <td class="ab-type"><i class="bi bi-bus-front"></i>Bus Stop</td>
                                <td><span class="ab-distance">500 m</span></td>
                                <td>Ganesh Beedi Bus Stand</td>
                            </tr>
                            <tr>
                                <td class="ab-type"><i class="bi bi-train-front"></i>Railway Station</td>
                                <td><span class="ab-distance">1.5 km</span></td>
                                <td>Surathkal Railway Station</td>
                            </tr>
                            <tr>
                                <td class="ab-type"><i class="bi bi-airplane"></i>Airport</td>
                                <td><span class="ab-distance">18 km</span></td>
                                <td>Mangaluru International Airport</td>
                            </tr>
                            <tr>
                                <td class="ab-type"><i class="bi bi-shop"></i>Market</td>
                                <td><span class="ab-distance">1 km</span></td>
                                <td>Hosabettu Market</td>
                            </tr>
                            <tr>
                                <td class="ab-type"><i class="bi bi-mortarboard"></i>School</td>
                                <td><span class="ab-distance">1.5 km</span></td>
                                <td>Vidyadayinee English Medium School</td>
                            </tr>
                            <tr>
                                <td class="ab-type"><i class="bi bi-building"></i>College</td>
                                <td><span class="ab-distance">2 km</span></td>
                                <td>Govinda Dasa College</td>
                            </tr>
                            <tr>
                                <td class="ab-type"><i class="bi bi-bank"></i>Bank</td>
                                <td><span class="ab-distance">2 km</span></td>
                                <td>ICICI Bank, Surathkal</td>
                            </tr>
                            <tr>
                                <td class="ab-type"><i class="bi bi-fuel-pump"></i>Petrol Pump</td>
                                <td><span class="ab-distance">2 km</span></td>
                                <td>Bharat Petroleum – Kalyani Fuels & Services</td>
                            </tr>
                            <tr>
                                <td class="ab-type"><i class="bi bi-hospital"></i>Hospital</td>
                                <td><span class="ab-distance">2 km</span></td>
                                <td>Venus Hospital</td>
                            </tr>
                            <tr>
                                <td class="ab-type"><i class="bi bi-water"></i>Beach</td>
                                <td><span class="ab-distance">2 km</span></td>
                                <td>Hosabettu Beach</td>
                            </tr>
                            <tr>
                                <td class="ab-type"><i class="bi bi-bag"></i>Shopping</td>
                                <td><span class="ab-distance">2 km</span></td>
                                <td>Reliance SMART Bazaar, Surathkal</td>
                            </tr>
                            <tr>
                                <td class="ab-type"><i class="bi bi-geo-alt"></i>Religious Place</td>
                                <td><span class="ab-distance">1 km</span></td>
                                <td>Gopala Krishna Bhajana Mandira, Hosabettu</td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>

            <p class="ab-muted mt-3">
                Distances and nearby listings are indicative; verify them before publishing.
            </p>

        </div>
    </section>


    <?php
    $google_map_url = trim($google_map_url);
    if (!empty($google_map_url) || strpos($google_map_url, '<iframe') === 0) {
    ?>
        <!-- GOOGLE MAP LOCATION -->
        <section class="ab-section ab-map-section" id="location-map">
            <div class="container ab-container">
                <div class="row align-items-end g-3 mb-4">
                    <div class="col-lg-8">
                        <div class="ab-kicker">Find the Property</div>
                        <h2 class="ab-title mb-2">Location <span>Map</span></h2>
                        <p class="ab-muted mb-0">
                            Explore the Kana Katla area in Hosabettu, Surathkal, Mangaluru.
                        </p>
                    </div>
                    <!-- <div class="col-lg-4 text-lg-end">
                    <a 
                        class="ab-btn"
                        href="https://www.google.com/maps/search/?api=1&query=Kana%20Katla%2C%20Hosabettu%2C%20Surathkal%2C%20Mangaluru"
                        target="_blank"
                        rel="noopener noreferrer">
                        <i class="bi bi-geo-alt-fill"></i>
                        Open in Google Maps
                    </a>
                </div> -->
                </div>

                <div class="ab-map-card">
                    <?php echo $google_map_url; ?>
                    <!-- <iframe
                    class="ab-map-frame"
                    title="Google Map showing Kana Katla, Hosabettu, Surathkal, Mangaluru"
                    src="https://www.google.com/maps?q=Kana%20Katla%2C%20Hosabettu%2C%20Surathkal%2C%20Mangaluru&output=embed"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    allowfullscreen>
                </iframe> -->

                    <div class="ab-map-info">
                        <p>
                            <i class="bi bi-geo-alt-fill me-2" style="color:var(--ab-red)"></i>
                            <?php echo $address; ?>
                        </p>
                        <!-- <a
                        href="https://www.google.com/maps/dir/?api=1&destination=Kana%20Katla%2C%20Hosabettu%2C%20Surathkal%2C%20Mangaluru"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="ab-btn ab-btn-outline">
                        <i class="bi bi-sign-turn-right"></i>
                        Get Directions
                    </a> -->
                    </div>
                </div>


            </div>
        </section>
    <?php
    }
    ?>

    <?php
    if (!empty($amentities)) {
    ?>
        <!-- AMENITIES -->
        <section class="ab-section border-section">
            <div class="container ab-container">

                <div class="text-center mb-5">
                    <div class="ab-kicker">Property Features</div>
                    <h2 class="ab-title">Amenities & <span>Facilities</span></h2>
                    <p class="ab-muted">
                        Review the listed property amenities and provisions.
                    </p>
                </div>

                <div class="row g-3">
                    <?php
                    foreach ($amentities as $amenity):

                        if (empty($amenity['cost'])) {
                            continue;
                        }
                    ?>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="ab-amenity">
                                <i class="<?php echo $amenity['icon']; ?>"></i>
                                <h3><?php echo $amenity['name']; ?></h3>
                                <p><?php echo $amenity['cost']; ?></p>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                    <!-- 
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="ab-amenity">
                        <i class="bi bi-flower1"></i>
                        <h3>Garden Space</h3>
                        <p>Provided</p>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="ab-amenity">
                        <i class="bi bi-sun"></i>
                        <h3>Solar Energy</h3>
                        <p>If required</p>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="ab-amenity">
                        <i class="bi bi-droplet-half"></i>
                        <h3>Water Harvesting</h3>
                        <p>If required</p>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="ab-amenity">
                        <i class="bi bi-shield-check"></i>
                        <h3>Compound Wall</h3>
                        <p>Provided</p>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="ab-amenity">
                        <i class="bi bi-house-check"></i>
                        <h3>Water Proofing</h3>
                        <p>Provided</p>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="ab-amenity">
                        <i class="bi bi-grid-3x3"></i>
                        <h3>Interlock</h3>
                        <p>Provided</p>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="ab-amenity">
                        <i class="bi bi-water"></i>
                        <h3>Sump Tank</h3>
                        <p>Provided</p>
                    </div>
                </div>

                <div class="col-6 col-md-4 col-lg-3">
                    <div class="ab-amenity">
                        <i class="bi bi-heart-pulse"></i>
                        <h3>Immunity Booster</h3>
                        <p>Provided</p>
                    </div>
                </div>
 -->


                </div>
            </div>
        </section>
    <?php
    }
    ?>

                <?php
                if (!empty($gallery) && is_array($gallery)) {
                ?>
    <!-- GALLERY -->

    <!-- GALLERY -->

    <!-- PROPERTY GALLERY -->
    <section class="ab-section ab-gallery-section"
        id="gallery">

        <div class="container ab-container">

            <div class="text-center mb-5">
                <div class="ab-kicker">Visual Tour</div>
                <h2 class="ab-title">Property <span>Gallery</span></h2>

                <p class="ab-gallery-intro">
                    Explore contemporary architecture, elegant living spaces
                    and thoughtfully designed interiors. Click any image
                    to view the full-size photograph.
                </p>
            </div>

            <div class="row g-4">
<?php
                    foreach ($gallery as $image) {
                        // Get large image for the lightbox
                        $image_large = wp_get_attachment_image_url($image['id'], 'large');
                        // Get medium image for the grid (loads faster)
                        $image_thumb = wp_get_attachment_image_url($image['id'], 'medium');

                        // Fallback title if user left it blank
                        $img_title = !empty($image['title']) ? $image['title'] : 'Property Image';

                        if (!$image_large) continue; // Skip if image is missing
                ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="ab-gallery-card">
                                <button class="ab-gallery-button"
                                    type="button"
                                    data-gallery="property-gallery"
                                    data-caption="<?php echo esc_attr($img_title); ?>"
                                    data-large="<?php echo esc_url($image_large); ?>"
                                    aria-label="View <?php echo esc_attr($img_title); ?>">

                                    <img src="<?php echo esc_url($image_thumb); ?>"
                                        alt="<?php echo esc_attr($img_title); ?>"
                                        loading="lazy">

                                    <span class="ab-gallery-zoom">
                                        <i class="bi bi-zoom-in"></i>
                                    </span>
                                </button>
                                <div class="ab-gallery-caption"><?php echo esc_html($img_title); ?></div>
                            </div>
                        </div>
                <?php
                    }
                    ?>
                

                <!-- 1. House Exterior -->
                <!-- <div class="col-md-6 col-lg-4">
                    <div class="ab-gallery-card">
                        <button class="ab-gallery-button"
                            type="button"
                            data-gallery="Kana Katla"
                            data-caption="House Exterior"
                            data-large="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/kana-katla/arun-bhandary-builders-house-exterior-large.jpg"
                            aria-label="View house exterior">

                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/kana-katla/arun-bhandary-builders-house-exterior-thumb.jpg"
                                alt="Contemporary house exterior"
                                loading="lazy">

                            <span class="ab-gallery-zoom">
                                <i class="bi bi-zoom-in"></i>
                            </span>
                        </button>
                        <div class="ab-gallery-caption">House Exterior</div>
                    </div>
                </div> -->

                <!-- 2. Modern Architecture -->
                <!-- <div class="col-md-6 col-lg-4">
                    <div class="ab-gallery-card">
                        <button class="ab-gallery-button"
                            type="button"
                            data-gallery="Kana Katla"
                            data-caption="Modern Architecture"
                            data-large="images/kana-katla/arun-bhandary-builders-modern-architecture-large.jpg"
                            aria-label="View modern architecture">

                            <img src="images/kana-katla/arun-bhandary-builders-modern-architecture-thumb.jpg"
                                alt="Modern residential architecture"
                                loading="lazy">

                            <span class="ab-gallery-zoom">
                                <i class="bi bi-zoom-in"></i>
                            </span>
                        </button>
                        <div class="ab-gallery-caption">Modern Architecture</div>
                    </div>
                </div> -->

                <!-- 3. Living Room -->
                <!-- <div class="col-md-6 col-lg-4">
                    <div class="ab-gallery-card">
                        <button class="ab-gallery-button"
                            type="button"
                            data-gallery="Kana Katla"
                            data-caption="Contemporary Living Room"
                            data-large="images/kana-katla/arun-bhandary-builders-living-room-large.jpg"
                            aria-label="View living room">

                            <img src="images/kana-katla/arun-bhandary-builders-living-room-thumb.jpg"
                                alt="Contemporary living room interior"
                                loading="lazy">

                            <span class="ab-gallery-zoom">
                                <i class="bi bi-zoom-in"></i>
                            </span>
                        </button>
                        <div class="ab-gallery-caption">Living Room</div>
                    </div>
                </div> -->

                <!-- 4. Dining Area -->
                <!-- <div class="col-md-6 col-lg-4">
                    <div class="ab-gallery-card">
                        <button class="ab-gallery-button"
                            type="button"
                            data-gallery="Kana Katla"
                            data-caption="Modern Dining Area"
                            data-large="images/kana-katla/arun-bhandary-builders-dining-area-large.jpg"
                            aria-label="View dining area">

                            <img src="images/kana-katla/arun-bhandary-builders-dining-area-thumb.jpg"
                                alt="Modern dining area"
                                loading="lazy">

                            <span class="ab-gallery-zoom">
                                <i class="bi bi-zoom-in"></i>
                            </span>
                        </button>
                        <div class="ab-gallery-caption">Dining Area</div>
                    </div>
                </div> -->

                <!-- 5. Bedroom Design -->
                <!-- <div class="col-md-6 col-lg-4">
                    <div class="ab-gallery-card">
                        <button class="ab-gallery-button"
                            type="button"
                            data-gallery="Kana Katla"
                            data-caption="Contemporary Bedroom"
                            data-large="images/kana-katla/arun-bhandary-builders-bedroom-design-large.jpg"
                            aria-label="View bedroom design">

                            <img src="images/kana-katla/arun-bhandary-builders-bedroom-design-thumb.jpg"
                                alt="Contemporary bedroom design"
                                loading="lazy">

                            <span class="ab-gallery-zoom">
                                <i class="bi bi-zoom-in"></i>
                            </span>
                        </button>
                        <div class="ab-gallery-caption">Bedroom Design</div>
                    </div>
                </div> -->

                <!-- 6. Bedroom Interior -->
                <!-- <div class="col-md-6 col-lg-4">
                    <div class="ab-gallery-card">
                        <button class="ab-gallery-button"
                            type="button"
                            data-gallery="Kana Katla"
                            data-caption="Elegant Bedroom Interior"
                            data-large="images/kana-katla/arun-bhandary-builders-bedroom-interior-large.jpg"
                            aria-label="View bedroom interior">

                            <img src="images/kana-katla/arun-bhandary-builders-bedroom-interior-thumb.jpg"
                                alt="Elegant bedroom with natural lighting"
                                loading="lazy">

                            <span class="ab-gallery-zoom">
                                <i class="bi bi-zoom-in"></i>
                            </span>
                        </button>
                        <div class="ab-gallery-caption">Bedroom Interior</div>
                    </div>
                </div> -->

                <!-- 7. Staircase -->
                <!-- <div class="col-md-6 col-lg-4">
                    <div class="ab-gallery-card">
                        <button class="ab-gallery-button"
                            type="button"
                            data-gallery="Kana Katla"
                            data-caption="Modern Staircase"
                            data-large="images/kana-katla/arun-bhandary-builders-staircase-design-large.jpg"
                            aria-label="View staircase">

                            <img src="images/kana-katla/arun-bhandary-builders-staircase-design-thumb.jpg"
                                alt="Modern staircase design"
                                loading="lazy">

                            <span class="ab-gallery-zoom">
                                <i class="bi bi-zoom-in"></i>
                            </span>
                        </button>
                        <div class="ab-gallery-caption">Staircase Design</div>
                    </div>
                </div> -->

                <!-- 8. Interior Finishes -->
                <!-- <div class="col-md-6 col-lg-4">
                    <div class="ab-gallery-card">
                        <button class="ab-gallery-button"
                            type="button"
                            data-gallery="Kana Katla"
                            data-caption="Contemporary Interior Finishes"
                            data-large="images/kana-katla/arun-bhandary-builders-interior-finishes-large.jpg"
                            aria-label="View interior finishes">

                            <img src="images/kana-katla/arun-bhandary-builders-interior-finishes-thumb.jpg"
                                alt="Contemporary interior finishes"
                                loading="lazy">

                            <span class="ab-gallery-zoom">
                                <i class="bi bi-zoom-in"></i>
                            </span>
                        </button>
                        <div class="ab-gallery-caption">Interior Finishes</div>
                    </div>
                </div> -->

                <!-- 9. Residential Design -->
                <!-- <div class="col-md-6 col-lg-4">
                    <div class="ab-gallery-card">
                        <button class="ab-gallery-button"
                            type="button"
                            data-gallery="Kana Katla"
                            data-caption="Contemporary Residential Design"
                            data-large="images/kana-katla/arun-bhandary-builders-residential-design-large.jpg"
                            aria-label="View residential design">

                            <img src="images/kana-katla/arun-bhandary-builders-residential-design-thumb.jpg"
                                alt="Contemporary residential design"
                                loading="lazy">

                            <span class="ab-gallery-zoom">
                                <i class="bi bi-zoom-in"></i>
                            </span>
                        </button>
                        <div class="ab-gallery-caption">Residential Design</div>
                    </div>
                </div> -->

            </div>
        </div>
    </section>
    <?php
                } 
                ?>


    <!-- LARGE IMAGE VIEWER -->
    <div class="modal fade ab-lightbox"
        id="abLightbox"
        tabindex="-1"
        aria-hidden="true"
        aria-label="Property image viewer">

        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">



                <button type="button"
                    class="ab-lightbox-nav ab-lightbox-prev"
                    id="abPrev"
                    aria-label="Previous image">
                    <i class="bi bi-chevron-left"></i>
                </button>

                <button type="button"
                    class="ab-lightbox-nav ab-lightbox-next"
                    id="abNext"
                    aria-label="Next image">
                    <i class="bi bi-chevron-right"></i>
                </button>

                <div class="modal-body">
                    <img id="abLightboxImage"
                        class="ab-lightbox-image"
                        src=""
                        alt="Enlarged property photograph">

                    <div id="abLightboxCaption"
                        class="ab-lightbox-caption"></div>

                    <div id="abLightboxCount"
                        class="ab-lightbox-count"></div>
                </div>

            </div>
        </div>
    </div>



    <!-- FINAL ENQUIRY: WHITE BACKGROUND -->
    <section class="ab-final-cta">
        <div class="container ab-container">
            <div class="row align-items-center g-4">

                <div class="col-lg-8">
                    <div class="ab-final-icon">
                        <i class="bi bi-house-heart"></i>
                    </div>

                    <div class="ab-kicker">Your Next Step</div>

                    <h2>Make Kana Katla Your Next Home</h2>

                    <p>
                        Discover the location, explore the property and
                        contact our team to discuss your requirements.
                    </p>
                </div>

                <div class="col-lg-4 text-lg-end">
                    <a href="tel:+918277261222" class="ab-btn">
                        <i class="bi bi-telephone"></i>
                        Enquire Today
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- LARGE IMAGE VIEWER -->

    <!-- LIGHTBOX CLOSE BUTTON: Keep outside the modal -->
    <button
        type="button"
        id="abLightboxClose"
        class="ab-lightbox-close"
        aria-label="Close image viewer">
        <i class="bi bi-x-lg"></i>
    </button>

    <!-- PROPERTY IMAGE LIGHTBOX -->
    <div
        class="modal fade ab-lightbox"
        id="abLightbox"
        tabindex="-1"
        aria-hidden="true"
        aria-label="Property image viewer">

        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">

                <!-- Previous Image -->
                <button
                    type="button"
                    class="ab-lightbox-nav ab-lightbox-prev"
                    id="abPrev"
                    aria-label="Previous image">
                    <i class="bi bi-chevron-left"></i>
                </button>

                <!-- Next Image -->
                <button
                    type="button"
                    class="ab-lightbox-nav ab-lightbox-next"
                    id="abNext"
                    aria-label="Next image">
                    <i class="bi bi-chevron-right"></i>
                </button>

                <div class="modal-body">
                    <img
                        id="abLightboxImage"
                        class="ab-lightbox-image"
                        src=""
                        alt="Enlarged property photograph">

                    <div
                        id="abLightboxCaption"
                        class="ab-lightbox-caption">
                    </div>

                    <div
                        id="abLightboxCount"
                        class="ab-lightbox-count">
                    </div>
                </div>

            </div>
        </div>
    </div>

</article>


<!-- Bootstrap JS (Required for the Lightbox Modal to work) -->
<!-- <script src="js/bootstrap.bundle.min.js"></script> -->

<script>
    /* =========================================
   ARUN BHANDARY BUILDERS
   PROPERTY GALLERY LIGHTBOX
========================================= */

    document.addEventListener("DOMContentLoaded", function() {
        const modalElement = document.getElementById("abLightbox");
        const closeButton = document.getElementById("abLightboxClose");
        const largeImage = document.getElementById("abLightboxImage");
        const caption = document.getElementById("abLightboxCaption");
        const counter = document.getElementById("abLightboxCount");
        const prevButton = document.getElementById("abPrev");
        const nextButton = document.getElementById("abNext");

        /* Check required elements */
        if (
            !modalElement ||
            !closeButton ||
            !largeImage ||
            !caption ||
            !counter ||
            !prevButton ||
            !nextButton
        ) {
            console.error(
                "Lightbox initialization failed: one or more required HTML elements are missing."
            );
            return;
        }

        /* Check Bootstrap 5 */
        if (typeof bootstrap === "undefined" || !bootstrap.Modal) {
            console.error(
                "Bootstrap 5 JavaScript is required for the gallery lightbox."
            );
            return;
        }

        const lightbox = bootstrap.Modal.getOrCreateInstance(modalElement);

        let activeImages = [];
        let currentIndex = 0;

        /* =====================================
           GET IMAGE SOURCE
        ===================================== */

        function getLargeSource(element) {
            return element.dataset.large || "";
        }

        /* =====================================
           GET IMAGE ALT TEXT
        ===================================== */

        function getAlt(element) {
            const thumbnail = element.querySelector("img");

            return thumbnail ?
                thumbnail.alt :
                "Property photograph";
        }

        /* =====================================
           RENDER CURRENT IMAGE
        ===================================== */

        function renderImage() {
            if (
                !activeImages.length ||
                currentIndex < 0 ||
                currentIndex >= activeImages.length
            ) {
                return;
            }

            const item = activeImages[currentIndex];
            const imageSource = getLargeSource(item);

            if (!imageSource) {
                console.error("Large image source is missing.");
                return;
            }

            largeImage.src = imageSource;
            largeImage.alt = getAlt(item);

            caption.textContent =
                item.dataset.caption || getAlt(item);

            counter.textContent =
                (currentIndex + 1) + " / " + activeImages.length;

            const hasMultipleImages = activeImages.length > 1;

            prevButton.style.display =
                hasMultipleImages ? "flex" : "none";

            nextButton.style.display =
                hasMultipleImages ? "flex" : "none";
        }

        /* =====================================
           OPEN GALLERY
        ===================================== */

        function openGallery(element) {
            const group = element.dataset.gallery || "Kana Katla";

            activeImages = Array.from(
                document.querySelectorAll(
                    ".ab-gallery-button[data-gallery]"
                )
            ).filter(function(item) {
                return (
                    item.dataset.gallery === group &&
                    getLargeSource(item)
                );
            });

            currentIndex = activeImages.indexOf(element);

            /* Fallback if the clicked image isn't in the group */
            if (currentIndex === -1) {
                activeImages = getLargeSource(element) ?
                    [element] :
                    [];

                currentIndex = 0;
            }

            if (!activeImages.length) {
                console.error("No gallery images were found.");
                return;
            }

            renderImage();
            lightbox.show();
        }

        /* =====================================
           GALLERY THUMBNAIL CLICK EVENTS
        ===================================== */

        document
            .querySelectorAll(".ab-gallery-button[data-gallery]")
            .forEach(function(element) {
                element.addEventListener("click", function() {
                    openGallery(element);
                });
            });

        /* =====================================
           KEEP CLOSE BUTTON FIXED
        ===================================== */

        modalElement.addEventListener(
            "show.bs.modal",
            function() {
                document.body.classList.add("ab-lightbox-open");
            }
        );

        modalElement.addEventListener(
            "shown.bs.modal",
            function() {
                document.body.classList.add("ab-lightbox-open");
            }
        );

        modalElement.addEventListener(
            "hidden.bs.modal",
            function() {
                document.body.classList.remove("ab-lightbox-open");

                largeImage.removeAttribute("src");
                largeImage.alt = "Enlarged property photograph";

                caption.textContent = "";
                counter.textContent = "";

                activeImages = [];
                currentIndex = 0;
            }
        );

        /* =====================================
           CLOSE BUTTON CLICK
        ===================================== */

        closeButton.addEventListener("click", function() {
            lightbox.hide();
        });

        /* =====================================
           NEXT IMAGE
        ===================================== */

        function nextImage() {
            if (activeImages.length <= 1) {
                return;
            }

            currentIndex =
                (currentIndex + 1) % activeImages.length;

            renderImage();
        }

        /* =====================================
           PREVIOUS IMAGE
        ===================================== */

        function previousImage() {
            if (activeImages.length <= 1) {
                return;
            }

            currentIndex =
                (currentIndex - 1 + activeImages.length) %
                activeImages.length;

            renderImage();
        }

        nextButton.addEventListener("click", nextImage);
        prevButton.addEventListener("click", previousImage);

        /* =====================================
           KEYBOARD CONTROLS
        ===================================== */

        document.addEventListener("keydown", function(event) {
            if (!modalElement.classList.contains("show")) {
                return;
            }

            if (event.key === "ArrowRight") {
                event.preventDefault();
                nextImage();
            }

            if (event.key === "ArrowLeft") {
                event.preventDefault();
                previousImage();
            }

            if (event.key === "Escape") {
                event.preventDefault();
                lightbox.hide();
            }
        });
    });
</script>

<?php
get_footer();
?>