<?php
function twentytwentyfive_child_enqueue_assets() {

    // Load child theme's style.css (required by WordPress for theme metadata or overrides)
    wp_enqueue_style(
        'twentytwentyfive-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array(),
        wp_get_theme()->get('Version')
    );

    // Enqueue your static site's CSS files
    wp_enqueue_style('bhi-bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css', array(), '5.0');
    // wp_enqueue_style('bhi-animate', get_stylesheet_directory_uri() . '/assets/css/animate.css', array(), '1.0');
    // wp_enqueue_style('bhi-owl-carousel', get_stylesheet_directory_uri() . '/assets/css/owl.carousel.min.css', array(), '2.3.4');
    wp_enqueue_style('bhi-style', get_stylesheet_directory_uri() . '/assets/css/style.css', array(), '1.0');

    // Use WordPress's built-in jQuery
    wp_enqueue_script('jquery');

    // Enqueue JavaScript libraries
    wp_enqueue_script(
        'bhi-bootstrap-bundle',
        get_stylesheet_directory_uri() . '/assets/js/bootstrap.bundle.min.js',
        array('jquery'),
        '5.0',
        true
    );

    // wp_enqueue_script(
    //     'bhi-owl-carousel',
    //     get_stylesheet_directory_uri() . '/assets/js/owl.carousel.min.js',
    //     array('jquery'),
    //     '2.3.4',
    //     true
    // );

    // wp_enqueue_script(
    //     'bhi-wow',
    //     get_stylesheet_directory_uri() . '/assets/js/wow.min.js',
    //     array('jquery'),
    //     '1.1.3',
    //     true
    // );
    wp_enqueue_script( 
        'jquery-custom', 
        get_stylesheet_directory_uri() . '/jquery-3.7.1.min.js', 
        array(), 
        '3.7.1', 
        true // Load in footer
    );
    wp_enqueue_script( 
        'bootstrap-bundle', 
        get_stylesheet_directory_uri() . '/bootstrap.bundle.min.js', 
        array( 'jquery-custom' ), 
        '5.3.0', // Change this to your actual Bootstrap version
        true // Load in footer
    );
    

    // Optional: enqueue custom.js only if it exists
    if (file_exists(get_stylesheet_directory() . '/assets/js/custom.js')) {
        wp_enqueue_script(
            'bhi-custom-script',
            get_stylesheet_directory_uri() . '/assets/js/custom.js',
            array('jquery'),
            '1.0',
            true
        );
    }
 }
add_action('wp_enqueue_scripts', 'twentytwentyfive_child_enqueue_assets');

/**
 * Register navigation menus for the theme.
 */
function mytheme_register_menus() {
    register_nav_menus( array(
        'primary'   => __( 'Primary Menu', 'mytheme' ),
        'footer'    => __( 'Footer Menu', 'mytheme' ),
        'mobile'    => __( 'Mobile Menu', 'mytheme' ),
    ) );
}
add_action( 'after_setup_theme', 'mytheme_register_menus' );





// Dynamic navbar 
// Bootstrap 5 Nav Walker
class Bootstrap_5_WP_Nav_Menu_Walker extends Walker_Nav_Menu {
    // Start the sub-menu (Dropdown)
    public function start_lvl( &$output, $depth = 0, $args = null ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat( $t, $depth );
        $classes = array( 'dropdown-menu' );
        
        $class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $output .= "{$n}{$indent}<ul$class_names>{$n}";
    }

    // Start the list item (Nav Item or Dropdown)
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        // Add Bootstrap classes based on depth
        if ( $depth === 0 ) {
            $classes[] = 'nav-item';
            if ( $args->walker->has_children ) {
                $classes[] = 'dropdown';
            }
        } else {
            // Optional: You can add custom classes to the <li> of dropdown items here if needed
        }

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $output .= $indent . '<li' . $class_names .'>';

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

        // Add Bootstrap link classes based on depth
        if ( $depth === 0 ) {
            $atts['class'] = 'nav-link';
            if ( $args->walker->has_children ) {
                $atts['class'] .= ' dropdown-toggle';
            }
            // Check if it's the active page
            if ( in_array( 'current-menu-item', $classes ) || in_array( 'current-menu-parent', $classes ) ) {
                $atts['class'] .= ' ab-active'; // Your custom active class
            }
        } else {
            $atts['class'] = 'dropdown-item';
        }

        // Add data-bs-toggle for dropdown parents
        if ( $args->walker->has_children && $depth === 0 ) {
            $atts['data-bs-toggle'] = 'dropdown';
            $atts['aria-expanded']  = 'false';
            $atts['role']           = 'button';
            $atts['id']             = 'menu-item-dropdown-' . $item->ID; // Unique ID to prevent HTML validation errors
        }

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters( 'the_title', $item->title, $item->ID );

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}



/* Metabox registration code for the post for adding new projects */
/**
 * =========================================================================
 * 1. REGISTER & RENDER META BOX (Single Form Layout, No Icons)
 * =========================================================================
 */
function custom_project_details_meta_box() {
    add_meta_box(
        'project_details_meta_box',
        'Project Details',
        'render_project_details_meta_box',
        'post',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'custom_project_details_meta_box' );

function render_project_details_meta_box( $post ) {
    wp_nonce_field( 'save_project_details_meta', 'project_details_nonce' );

    // Retrieve existing values
    $tagline             = get_post_meta( $post->ID, '_project_tagline', true );
    $starting_price      = get_post_meta( $post->ID, '_project_starting_price', true );
    $address             = get_post_meta( $post->ID, '_project_address', true );
    $bedrooms            = get_post_meta( $post->ID, '_project_bedrooms', true );
    $built_up_area       = get_post_meta( $post->ID, '_project_built_up_area', true );
    $plot_area           = get_post_meta( $post->ID, '_project_plot_area', true );
    $beach_distance      = get_post_meta( $post->ID, '_project_beach_distance', true );
    $house_type          = get_post_meta( $post->ID, '_project_house_type', true );
    $area_location       = get_post_meta( $post->ID, '_project_area_location', true );
    ?>

    <style>
        .ab-single-form { display: flex; flex-direction: column; gap: 15px; padding: 10px 0; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; }
        .ab-form-row { display: flex; flex-direction: column; }
        .ab-form-row label { font-weight: 600; margin-bottom: 6px; color: #1d2327; font-size: 13px; }
        .ab-form-row input { 
            width: 100%; 
            padding: 8px 12px; 
            border: 1px solid #c3c4c7; 
            border-radius: 4px; 
            font-size: 14px;
            box-shadow: inset 0 1px 2px rgba(0,0,0,.07);
            box-sizing: border-box;
        }
        .ab-form-row input:focus { border-color: #2271b1; box-shadow: 0 0 0 1px #2271b1; outline: none; }
    </style>

    <div class="ab-single-form">
        
        <div class="ab-form-row">
            <label for="project_tagline">Tagline (e.g., Residential Project)</label>
            <input type="text" id="project_tagline" name="project_tagline" value="<?php echo esc_attr( $tagline ); ?>" placeholder="Enter tagline">
        </div>

        <div class="ab-form-row">
            <label for="project_starting_price">Starting Price</label>
            <input type="number" step="any" id="project_starting_price" name="project_starting_price" value="<?php echo esc_attr( $starting_price ); ?>" placeholder="e.g., 5000000">
        </div>

        <div class="ab-form-row">
            <label for="project_house_type">House Type (e.g., Home, Villa)</label>
            <input type="text" id="project_house_type" name="project_house_type" value="<?php echo esc_attr( $house_type ); ?>" placeholder="e.g., Villa">
        </div>

        <div class="ab-form-row">
            <label for="project_address">Address</label>
            <input type="text" id="project_address" name="project_address" value="<?php echo esc_attr( $address ); ?>" placeholder="Enter full address">
        </div>

        <div class="ab-form-row">
            <label for="project_area_location">Area Location (e.g., Mangaluru)</label>
            <input type="text" id="project_area_location" name="project_area_location" value="<?php echo esc_attr( $area_location ); ?>" placeholder="Enter area location">
        </div>

        <div class="ab-form-row">
            <label for="project_bedrooms">Bedrooms</label>
            <input type="number" id="project_bedrooms" name="project_bedrooms" value="<?php echo esc_attr( $bedrooms ); ?>" placeholder="e.g., 3">
        </div>

        <div class="ab-form-row">
            <label for="project_built_up_area">Built-up Area</label>
            <input type="text" id="project_built_up_area" name="project_built_up_area" value="<?php echo esc_attr( $built_up_area ); ?>" placeholder="e.g., 1500 sq.ft">
        </div>

        <div class="ab-form-row">
            <label for="project_plot_area">Plot Area (Optional - will override Beach Distance on frontend)</label>
            <input type="text" id="project_plot_area" name="project_plot_area" value="<?php echo esc_attr( $plot_area ); ?>" placeholder="e.g., 2000 sq.ft">
        </div>

        <div class="ab-form-row">
            <label for="project_beach_distance">Beach Distance (Optional - shown only if Plot Area is empty)</label>
            <input type="text" id="project_beach_distance" name="project_beach_distance" value="<?php echo esc_attr( $beach_distance ); ?>" placeholder="e.g., 2 km">
        </div>

    </div>
    <?php
}

/**
 * =========================================================================
 * 2. SAVE META BOX DATA
 * =========================================================================
 */
function save_project_details_meta( $post_id ) {
    if ( ! isset( $_POST['project_details_nonce'] ) || ! wp_verify_nonce( $_POST['project_details_nonce'], 'save_project_details_meta' ) ) {
        return $post_id;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
    if ( 'post' === $_POST['post_type'] && ! current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
    }

    $fields = array(
        'project_tagline'        => '_project_tagline',
        'project_starting_price' => '_project_starting_price',
        'project_address'        => '_project_address',
        'project_bedrooms'       => '_project_bedrooms',
        'project_built_up_area'  => '_project_built_up_area',
        'project_plot_area'      => '_project_plot_area',
        'project_beach_distance' => '_project_beach_distance',
        'project_house_type'     => '_project_house_type',
        'project_area_location'  => '_project_area_location',
    );

    foreach ( $fields as $post_key => $meta_key ) {
        if ( isset( $_POST[ $post_key ] ) ) {
            update_post_meta( $post_id, $meta_key, sanitize_text_field( $_POST[ $post_key ] ) );
        }
    }
}
add_action( 'save_post', 'save_project_details_meta' );

/**
 * =========================================================================
 * 3. FRONTEND HELPER FUNCTION
 * =========================================================================
 */
function get_project_details( $post_id = null ) {
    if ( null === $post_id ) {
        $post_id = get_the_ID();
    }
    if ( ! $post_id ) {
        return array();
    }

    return array(
        'tagline'        => get_post_meta( $post_id, '_project_tagline', true ),
        'starting_price' => get_post_meta( $post_id, '_project_starting_price', true ),
        'address'        => get_post_meta( $post_id, '_project_address', true ),
        'bedrooms'       => get_post_meta( $post_id, '_project_bedrooms', true ),
        'built_up_area'  => get_post_meta( $post_id, '_project_built_up_area', true ),
        'plot_area'      => get_post_meta( $post_id, '_project_plot_area', true ),
        'beach_distance' => get_post_meta( $post_id, '_project_beach_distance', true ),
        'house_type'     => get_post_meta( $post_id, '_project_house_type', true ),
        'area_location'  => get_post_meta( $post_id, '_project_area_location', true ),
    );
}