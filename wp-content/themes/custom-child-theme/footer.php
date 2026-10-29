
<!-- =========================================================
     ARUN BHANDARY - FOOTER OPTION 7
========================================================= -->
<footer class="abb-footer-v7">

    <!-- Architectural background -->
    <div class="abb-footer-v7-grid"></div>
    <div class="abb-footer-v7-corner abb-footer-v7-corner-left"></div>
    <div class="abb-footer-v7-corner abb-footer-v7-corner-right"></div>

    <div class="container">

        <!-- ================= MAIN FOOTER ================= -->
        <div class="abb-footer-v7-main">

            <!-- BRAND -->
            <div class="abb-footer-v7-brand">

                <a href="index.html" class="abb-footer-v7-logo">

                    <!-- <span class="abb-footer-v7-logo-box">
                        AB
                    </span>

                    <span class="abb-footer-v7-logo-text">
                        <strong>ARUN BHANDARY</strong>
                        <small>BUILDERS & DEVELOPERS</small>
                    </span> -->
                    <figure class="cr-figure">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/arun-bhandary-builders-logo1.png" class="img-fluid"
                        alt="Arun Bhandary Builders & Developers logo for Mangaluru, Udupi and Moodabidire"
                        title="Arun Bhandary Builders & Developers logo for Mangaluru, Udupi and Moodabidire"
                    >
                        <figcaption class="cr-only">Arun Bhandary Builders & Developers – Mangaluru, Udupi and Moodabidire</figcaption>
                    </figure>
                </a>

                <p>
                    Creating thoughtfully designed homes with
                    quality craftsmanship and lasting value.
                </p>

                <div class="abb-footer-v7-social">

                    <a href="#" aria-label="Facebook">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>

                    <a href="#" aria-label="Instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    <a href="#" aria-label="LinkedIn">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>

                </div>

            </div>


            <!-- LINKS -->
            <div class="abb-footer-v7-links">

                <div class="abb-footer-v7-heading">
                    <span></span>
                    QUICK LINKS
                </div>

                <div class="abb-footer-v7-link-list">

                    <a href="index.html">
                        <i class="fa-solid fa-arrow-right"></i>
                        <span>Home</span>
                    </a>

                    <a href="arun-bhandary-builders-about-us.html">
                        <i class="fa-solid fa-arrow-right"></i>
                        <span>About Us</span>
                    </a>

                    <a href="arun-bhandary-builders-residential-construction-services.html">
                        <i class="fa-solid fa-arrow-right"></i>
                        <span>Services</span>
                    </a>


                    <a href="arun-bhandary-builders-testimonials.html">
                        <i class="fa-solid fa-arrow-right"></i>
                        <span>Testimonials</span>
                    </a>

                    <a href="arun-bhandary-builders-contact-us.html">
                        <i class="fa-solid fa-arrow-right"></i>
                        <span>Contact</span>
                    </a>

                </div>

            </div>


            <!-- PROJECTS -->
            <div class="abb-footer-v7-links">

                <div class="abb-footer-v7-heading">
                    <span></span>
                    PROJECTS
                </div>

                <div class="abb-footer-v7-link-list">
                    <?php
// 1. Get the menu items array based on your theme location
$locations = get_nav_menu_locations();
$menu_id   = $locations['primary']; // Change 'primary' if your menu location has a different name
$menu_items = wp_get_nav_menu_items( $menu_id );

if ( $menu_items ) {
    $parent_id = 0;
    $sub_items = array();

    // 2. Find the Parent Item (e.g., "Sample Page")
    foreach ( $menu_items as $item ) {
        // You can match by title, or by the object_id (the page ID)
        if ( $item->title === 'Projects' ||  ) { 
            $parent_id = $item->ID;
            break;
        }
    }

    // 3. Find and display the sub-items if the parent exists
    if ( $parent_id ) {
        // echo '<ul class="custom-sub-menu-list">';
        
        foreach ( $menu_items as $item ) {
            if ( $item->menu_item_parent == $parent_id ) {
                // echo '<li class="custom-sub-item">';
                // echo '<a href="' . esc_url( $item->url ) . '">' . esc_html( $item->title ) . '</a>';
                // echo '</li>';
                ?>
                    <a href="<?php echo esc_url( $item->url ); ?>">
                        <i class="fa-solid fa-arrow-right"></i>
                        <span><?php echo esc_html( $item->title ); ?></span>
                    </a>
                <?php
            }
        }
        
        // echo '</ul>';
    }
}
?>

                    <!-- <a href="arun-bhandary-builders-all-projects.html">
                        <i class="fa-solid fa-arrow-right"></i>
                        <span>Ongoing Projects</span>
                    </a>

                    <a href="arun-bhandary-builders-all-projects.html">
                        <i class="fa-solid fa-arrow-right"></i>
                        <span>Completed Projects</span>
                    </a>

                    <a href="arun-bhandary-builders-all-projects.html">
                        <i class="fa-solid fa-arrow-right"></i>
                        <span>Upcoming Projects</span>
                    </a> -->

                    

                </div>

            </div>


            <!-- CONTACT -->
            <div class="abb-footer-v7-contact">

                <div class="abb-footer-v7-heading">
                    <span></span>
                    GET IN TOUCH
                </div>


                <div class="abb-footer-v7-contact-row">

                    <div class="abb-footer-v7-contact-icon">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>

                    <p>
                        Dejama Complex,<br>
                        Swamila Padavu Bajpe,<br>
                        Mangalore - 574142
                    </p>

                </div>


                <div class="abb-footer-v7-contact-row">

                    <div class="abb-footer-v7-contact-icon">
                        <i class="fa-solid fa-phone"></i>
                    </div>

                    <div class="abb-footer-v7-contact-text">

                        <a href="tel:+918904819565">
                            +91 8904 819 565
                        </a>

                        <a href="tel:+918277261222">
                            +91 8277 261 222
                        </a>

                    </div>

                </div>


                <div class="abb-footer-v7-contact-row">

                    <div class="abb-footer-v7-contact-icon">
                        <i class="fa-solid fa-envelope"></i>
                    </div>

                    <a
                        class="abb-footer-v7-email"
                        href="mailto:connect@arunbhandarybuilder.com">
                        connect@arunbhandarybuilder.com
                    </a>

                </div>

            </div>

        </div>


<!-- ================= SISTER CONCERN ================= -->

<div class="abb-footer-v7-sister-row">

    <div class="abb-footer-v7-sister-label">
        SISTER CONCERN
    </div>

    <a href="https://arunbhandaryglobal.com/"
       target="_blank"
       rel="noopener"
       class="abb-footer-v7-sister-link">

        <figure class="cr-figure">
            <img
            src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ABGT_horizontal.png"
            class="abb-footer-v7-sister-logo"
            alt="Arun Bhandary Global – sister concern of Arun Bhandary Builders & Developers in Mangaluru, Udupi and Moodabidire"
            title="Arun Bhandary Global – sister concern of Arun Bhandary Builders & Developers in Mangaluru, Udupi and Moodabidire"
        >
            <figcaption class="cr-only">Arun Bhandary Global – Sister concern of Arun Bhandary Builders & Developers serving Mangaluru, Udupi and Moodabidire</figcaption>
        </figure>

        <i class="fa-solid fa-arrow-up-right-from-square"></i>

    </a>

</div>


        <!-- ================= BOTTOM FOOTER ================= -->

        <div class="abb-footer-v7-bottom">

            <!-- COPYRIGHT -->
            <div class="abb-footer-v7-copyright">

                © 2026 Arun Bhandary Builders & Developers Pvt Ltd.

            </div>


            <!-- CENTER LEGAL LINKS -->
            <div class="abb-footer-v7-legal">

                <a href="#">
                    Privacy Policy
                </a>

                <span></span>

                <a href="#">
                    Terms & Conditions
                </a>

            </div>


            <!-- POWERED BY -->
            <div class="abb-footer-v7-powered">

                Powered by
                <a href="https://bluelinecomputers.com/" target="_blank">
                    Blueline Computers
                </a>

            </div>

        </div>

    </div>

</footer>

<!-- WhatsApp Floating Button -->
<a href="https://wa.me/918904819565?text=Hello%20Arun%20Bhandary%20Builders%20%26%20Developers%2C%20I%20would%20like%20to%20know%20more%20about%20your%20services."
   class="abb-whatsapp"
   target="_blank"
   rel="noopener"
   aria-label="Chat with Arun Bhandary Builders & Developers on WhatsApp">

    <i class="fa-brands fa-whatsapp"></i>

    <span class="abb-whatsapp-tooltip">
        Chat with us
    </span>

</a>










<!-- =========================================================
     HOMEPAGE ENQUIRY POPUP
========================================================= -->

<div class="abb-enquiry-overlay" id="abbEnquiryPopup">

    <div class="abb-enquiry-modal">

        <!-- CLOSE -->
        <button
            type="button"
            class="abb-enquiry-close"
            id="abbEnquiryClose"
            aria-label="Close enquiry form">
            &times;
        </button>


        <div class="row g-0 align-items-stretch">

            <!-- LEFT -->
            <div class="col-lg-5">

                <div class="abb-enquiry-info">

                    <span class="abb-enquiry-label">
                        LET'S BUILD YOUR DREAM
                    </span>

                    <h2>
                        Your Dream Home<br>
                        <span>Starts Here.</span>
                    </h2>

                    <p>
                        Tell us what you're looking for and our team
                        will get in touch with you.
                    </p>

                    <div class="abb-enquiry-location">
                        <i class="fa-solid fa-location-dot"></i>
                        Mangaluru · Udupi · Moodabidire
                    </div>

                </div>

            </div>


            <!-- RIGHT FORM -->
            <div class="col-lg-7">

                <div class="abb-enquiry-form-wrap">

                    <div class="abb-enquiry-form-heading">
                        <span>ENQUIRY</span>
                        <h3>How can we help?</h3>
                    </div>


                    <form id="abbEnquiryForm">

                        <div class="row g-3">

                            <div class="col-md-6">

                                <label for="abbName">
                                    Name
                                </label>

                                <input
                                    type="text"
                                    id="abbName"
                                    name="name"
                                    class="form-control"
                                    placeholder="Your name"
                                    required>

                            </div>


                            <div class="col-md-6">

                                <label for="abbPhone">
                                    Phone Number
                                </label>

                                <input
                                    type="tel"
                                    id="abbPhone"
                                    name="phone"
                                    class="form-control"
                                    placeholder="Your phone number"
                                    required>

                            </div>


                            <div class="col-12">

                                <label for="abbRequirement">
                                    I'm Interested In
                                </label>

                                <select
                                    id="abbRequirement"
                                    name="requirement"
                                    class="form-select"
                                    required>

                                    <option value="">
                                        Select your requirement
                                    </option>

                                    <option value="Layout / Plot">
                                        Layout / Plot
                                    </option>

                                    <option value="Custom Home Construction">
                                        Custom Home Construction
                                    </option>

                                    <option value="House / Villa">
                                        House / Villa
                                    </option>

                                    <option value="Loan Assistance">
                                        Loan Assistance
                                    </option>

                                    <option value="Joint Venture">
                                        Joint Venture
                                    </option>

                                    <option value="Other">
                                        Other
                                    </option>

                                </select>

                            </div>


                            <div class="col-12">

                                <label for="abbMessage">
                                    Message
                                </label>

                                <textarea
                                    id="abbMessage"
                                    name="message"
                                    class="form-control"
                                    rows="3"
                                    placeholder="Tell us about your requirement"></textarea>

                            </div>


                            <div class="col-12">

                                <button
                                    type="submit"
                                    class="abb-enquiry-submit">

                                    SEND ENQUIRY

                                    <i class="fa-solid fa-arrow-right"></i>

                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>








<!-- <script src="js/bootstrap.bundle.min.js"></script>
 <script src="js/jquery-3.7.1.min.js"></script>  -->

 <script>

    /* =========================================================
       HEADER SHRINK ON SCROLL
    ========================================================== */

    document.addEventListener(
        "DOMContentLoaded",
        function () {

            const abHeader =
                document.getElementById(
                    "abMainHeader"
                );


            function abHeaderScroll() {

                if (window.scrollY > 60) {

                    abHeader.classList.add(
                        "ab-header-scrolled"
                    );

                } else {

                    abHeader.classList.remove(
                        "ab-header-scrolled"
                    );

                }

            }


            window.addEventListener(
                "scroll",
                abHeaderScroll,
                {
                    passive: true
                }
            );


            abHeaderScroll();

        }
    );


    /* =========================================================
       DESKTOP DROPDOWN
       
       BOTH HOVER + CLICK

       MOBILE:
       CLICK ONLY
    ========================================================== */

    document.addEventListener(
        "DOMContentLoaded",
        function () {


            const abDropdowns =
                document.querySelectorAll(
                    ".ab-navbar .dropdown"
                );


            abDropdowns.forEach(
                function (abDropdown) {


                    const abToggle =
                        abDropdown.querySelector(
                            ".dropdown-toggle"
                        );


                    const abMenu =
                        abDropdown.querySelector(
                            ".dropdown-menu"
                        );


                    const abDropdownInstance =
                        bootstrap.Dropdown
                        .getOrCreateInstance(
                            abToggle
                        );


                    let abClickedOpen =
                        false;


                    /* =============================================
                       DESKTOP HOVER
                    ============================================== */

                    abDropdown.addEventListener(
                        "mouseenter",
                        function () {


                            if (
                                window.innerWidth >= 992
                            ) {

                                abDropdownInstance.show();

                            }

                        }
                    );


                    /* =============================================
                       DESKTOP MOUSE LEAVE
                       
                       If it wasn't deliberately clicked open,
                       close it.
                    ============================================== */

                    abDropdown.addEventListener(
                        "mouseleave",
                        function () {


                            if (
                                window.innerWidth >= 992
                            ) {


                                if (
                                    !abClickedOpen
                                ) {

                                    abDropdownInstance.hide();

                                }

                            }

                        }
                    );


                    /* =============================================
                       CLICK

                       Bootstrap's own click functionality remains
                       active.

                       We only track the state.
                    ============================================== */

                    abToggle.addEventListener(
                        "click",
                        function () {


                            if (
                                window.innerWidth >= 992
                            ) {


                                setTimeout(
                                    function () {

                                        abClickedOpen =
                                            abMenu.classList
                                            .contains(
                                                "show"
                                            );

                                    },
                                    10
                                );

                            }

                        }
                    );


                }
            );


            /* =====================================================
               CLICK OUTSIDE

               Desktop clicked dropdown closes when user clicks
               somewhere else.
            ====================================================== */

            document.addEventListener(
                "click",
                function (event) {


                    if (
                        window.innerWidth < 992
                    ) {

                        return;

                    }


                    abDropdowns.forEach(
                        function (abDropdown) {


                            if (
                                !abDropdown.contains(
                                    event.target
                                )
                            ) {


                                const abToggle =
                                    abDropdown.querySelector(
                                        ".dropdown-toggle"
                                    );


                                const abInstance =
                                    bootstrap.Dropdown
                                    .getOrCreateInstance(
                                        abToggle
                                    );


                                abInstance.hide();

                            }

                        }
                    );

                }
            );


        }
    );


    /* =========================================================
       CLOSE MOBILE OFFCANVAS WHEN A NORMAL LINK IS CLICKED
    ========================================================== */

    document.addEventListener(
        "DOMContentLoaded",
        function () {


            const abOffcanvasElement =
                document.getElementById(
                    "abMainOffcanvas"
                );


            const abOffcanvas =
                bootstrap.Offcanvas
                .getOrCreateInstance(
                    abOffcanvasElement
                );


            const abNormalLinks =
                abOffcanvasElement.querySelectorAll(
                    ".nav-link:not(.dropdown-toggle)"
                );


            abNormalLinks.forEach(
                function (abLink) {

                    abLink.addEventListener(
                        "click",
                        function () {

                            if (
                                window.innerWidth < 992
                            ) {

                                abOffcanvas.hide();

                            }

                        }
                    );

                }
            );


            /* =============================================
               MOBILE DROPDOWN ITEM CLICK
            ============================================== */

            const abDropdownItems =
                abOffcanvasElement.querySelectorAll(
                    ".dropdown-item"
                );


            abDropdownItems.forEach(
                function (abItem) {

                    abItem.addEventListener(
                        "click",
                        function () {

                            if (
                                window.innerWidth < 992
                            ) {

                                abOffcanvas.hide();

                            }

                        }
                    );

                }
            );

        }
    );

</script>


<!-- =====================================================
         SLIDER JAVASCRIPT
    ====================================================== -->

    <script>

        document.addEventListener(
            "DOMContentLoaded",
            function () {


                const abSlider =
                    document.getElementById(
                        "arunBhandarySlider"
                    );


                const abSliderNumber =
                    document.getElementById(
                        "abSliderNumber"
                    );


                const abSliderProgress =
                    document.getElementById(
                        "abSliderProgress"
                    );


                const abSliderItems =
                    document.querySelectorAll(
                        "#arunBhandarySlider .carousel-item"
                    );


                /* =================================================
                   UPDATE NUMBER + PROGRESS
                ================================================== */

                abSlider.addEventListener(
                    "slid.bs.carousel",
                    function (event) {


                        const abCurrentSlide =
                            event.relatedTarget;


                        const abCurrentNumber =
                            abCurrentSlide
                            .getAttribute(
                                "data-slide-number"
                            );


                        abSliderNumber.innerHTML =

                            abCurrentNumber +

                            ' <small>/ 03</small>';


                        const abSlideIndex =
                            Array
                            .from(abSliderItems)
                            .indexOf(
                                abCurrentSlide
                            );


                        const abProgress =
                            (
                                (abSlideIndex + 1)
                                /
                                abSliderItems.length
                            ) * 100;


                        abSliderProgress.style.width =
                            abProgress + "%";

                    }
                );


                /* =================================================
                   INITIAL PROGRESS
                ================================================== */

                abSliderProgress.style.width =
                    "33.333%";


            }
        );

    </script>

<!-- =========================================================
     COUNT-UP SCRIPT
========================================================= -->

<script>

document.addEventListener("DOMContentLoaded", function () {

    const abb2StatsSection =
        document.querySelector(".abb2-stats-section");

    const abb2StatNumbers =
        document.querySelectorAll(".abb2-stat-count");


    if (!abb2StatsSection || !abb2StatNumbers.length) {
        return;
    }


    let abb2HasAnimated = false;


    function abb2AnimateCounter(element, target) {

        const duration = 1800;

        const startTime = performance.now();


        function abb2UpdateCounter(currentTime) {

            const elapsed =
                currentTime - startTime;


            const progress =
                Math.min(elapsed / duration, 1);


            /*
             * Smooth ease-out effect
             */
            const easeOut =
                1 - Math.pow(1 - progress, 3);


            const currentValue =
                Math.floor(target * easeOut);


            element.textContent =
                currentValue;


            if (progress < 1) {

                requestAnimationFrame(
                    abb2UpdateCounter
                );

            } else {

                element.textContent =
                    target;

            }

        }


        requestAnimationFrame(
            abb2UpdateCounter
        );

    }


    const abb2Observer =
        new IntersectionObserver(

            function (entries) {

                entries.forEach(function (entry) {

                    if (
                        entry.isIntersecting &&
                        !abb2HasAnimated
                    ) {

                        abb2HasAnimated = true;


                        abb2StatNumbers.forEach(
                            function (element, index) {

                                const target =
                                    parseInt(
                                        element.dataset.count,
                                        10
                                    );


                                /*
                                 * Small stagger between
                                 * each number
                                 */
                                setTimeout(
                                    function () {

                                        abb2AnimateCounter(
                                            element,
                                            target
                                        );

                                    },
                                    index * 150
                                );

                            }
                        );


                        abb2Observer.unobserve(
                            abb2StatsSection
                        );

                    }

                });

            },

            {
                threshold: 0.25
            }

        );


    abb2Observer.observe(
        abb2StatsSection
    );

});

</script>

<!-- Owl Carousel JS -->
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
</script>


<script>

$(document).ready(function () {

    const abbcpCarousel =
        $('.abbcp-project-carousel');


    abbcpCarousel.owlCarousel({

        loop: true,

        margin: 18,

        nav: false,

        dots: false,

        autoplay: true,

        autoplayTimeout: 5000,

        autoplayHoverPause: true,

        smartSpeed: 800,

        responsive: {

            0: {
                items: 1
            },

            576: {
                items: 1
            },

            768: {
                items: 2
            },

            992: {
                items: 3
            }

        }

    });


    /* =========================================
       CUSTOM PREVIOUS BUTTON
    ========================================= */

    $('.abbcp-owl-prev').on('click', function () {

        abbcpCarousel.trigger(
            'prev.owl.carousel'
        );

    });


    /* =========================================
       CUSTOM NEXT BUTTON
    ========================================= */

    $('.abbcp-owl-next').on('click', function () {

        abbcpCarousel.trigger(
            'next.owl.carousel'
        );

    });


    /* =========================================
       UPDATE CUSTOM DOT
    ========================================= */

    abbcpCarousel.on(
        'changed.owl.carousel',
        function (event) {

            if (!event.item) {
                return;
            }

            const current =
                event.item.index;

            const count =
                event.item.count;

            const dots =
                $('.abbcp-dot');


            dots.removeClass('active');


            /*
             * Calculate active indicator
             */
            const position =
                current % dots.length;


            dots.eq(position)
                .addClass('active');

        }
    );

});

</script>

<script>

/* =========================================================
   TESTIMONIAL CAROUSEL
========================================================= */

$(document).ready(function () {


    const abbtTestimonials =
        $('.abbt-testimonial-carousel');


    abbtTestimonials.owlCarousel({

        loop: true,

        margin: 18,

        nav: false,

        dots: false,

        autoplay: true,

        autoplayTimeout: 5000,

        autoplayHoverPause: true,

        smartSpeed: 750,

        responsive: {

            0: {
                items: 1
            },

            768: {
                items: 2
            },

            992: {
                items: 2
            },
             1100: {
                items: 3
            }

        }

    });


    /* =====================================================
       PREVIOUS
    ====================================================== */

    $('.abbt-testimonial-prev').on(
        'click',
        function () {

            abbtTestimonials.trigger(
                'prev.owl.carousel',
                [750]
            );

        }
    );


    /* =====================================================
       NEXT
    ====================================================== */

    $('.abbt-testimonial-next').on(
        'click',
        function () {

            abbtTestimonials.trigger(
                'next.owl.carousel',
                [750]
            );

        }
    );


    /* =====================================================
       PAGINATION
    ====================================================== */

    $('.abbt-testimonial-pagination button').on(
        'click',
        function () {

            const slide =
                $(this).data('slide');


            abbtTestimonials.trigger(
                'to.owl.carousel',
                [slide * 3, 750]
            );


            $('.abbt-testimonial-pagination button')
                .removeClass('active');


            $(this).addClass('active');

        }
    );


    /* =====================================================
       UPDATE PAGINATION
    ====================================================== */

    abbtTestimonials.on(
        'changed.owl.carousel',
        function (event) {

            if (!event.namespace) {
                return;
            }


            let current =
                event.item.index -
                event.relatedTarget._clones.length / 2;


            const count =
                event.item.count;


            current =
                ((current % count) + count) % count;


            const group =
                Math.floor(current / 3);


            $('.abbt-testimonial-pagination button')
                .removeClass('active')
                .eq(group)
                .addClass('active');

        }
    );

});

</script>


 <script>
document.addEventListener("DOMContentLoaded", function () {

    const popup = document.getElementById("abbEnquiryPopup");
    const closeBtn = document.getElementById("abbEnquiryClose");

    /* Show popup after 2.5 seconds */
    setTimeout(function () {

        popup.classList.add("abb-enquiry-show");

        document.body.style.overflow = "hidden";

    }, 7500);


    /* Close popup */
    closeBtn.addEventListener("click", function () {

        popup.classList.remove("abb-enquiry-show");

        document.body.style.overflow = "";

    });


    /* Close when clicking outside modal */
    popup.addEventListener("click", function (e) {

        if (e.target === popup) {

            popup.classList.remove("abb-enquiry-show");

            document.body.style.overflow = "";

        }

    });

});
</script>
<?php wp_footer(); ?>
</body>
</htm