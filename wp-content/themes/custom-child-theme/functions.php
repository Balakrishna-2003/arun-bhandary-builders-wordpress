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
 * ENQUEUE FONT AWESOME & WP MEDIA IN ADMIN
 * =========================================================================
 */
function ab_admin_enqueue_scripts() {
    wp_enqueue_style( 'font-awesome-admin', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css' );
    wp_enqueue_media(); // Required for the Gallery Uploader
}
add_action( 'admin_enqueue_scripts', 'ab_admin_enqueue_scripts' );

/**
 * =========================================================================
 * HELPER FUNCTIONS TO RENDER REPEATER ROWS
 * =========================================================================
 */
function render_nearby_row( $index, $data ) {
    $type = isset( $data['type'] ) ? esc_attr( $data['type'] ) : '';
    $name = isset( $data['name'] ) ? esc_attr( $data['name'] ) : '';
    $distance = isset( $data['distance'] ) ? esc_attr( $data['distance'] ) : '';
    ?>
    <div class="ab-repeater-row nearby-row">
        <div class="ab-field">
            <label>Nearby Place (Type)</label>
            <div class="ab-input-icon">
                <i class="fa-solid fa-location-dot"></i>
                <input type="text" name="prop_nearby[<?php echo $index; ?>][type]" value="<?php echo $type; ?>" placeholder="e.g., Airport">
            </div>
        </div>
        <div class="ab-field">
            <label>Name of Place</label>
            <div class="ab-input-icon">
                <i class="fa-solid fa-signature"></i>
                <input type="text" name="prop_nearby[<?php echo $index; ?>][name]" value="<?php echo $name; ?>" placeholder="e.g., Mangalore Airport">
            </div>
        </div>
        <div class="ab-field">
            <label>Distance</label>
            <div class="ab-input-icon">
                <i class="fa-solid fa-route"></i>
                <input type="text" name="prop_nearby[<?php echo $index; ?>][distance]" value="<?php echo $distance; ?>" placeholder="e.g., 10 km">
            </div>
        </div>
        <div>
            <button type="button" class="ab-repeater-remove" title="Remove"><i class="fa-solid fa-trash"></i></button>
        </div>
    </div>
    <?php
}

function render_amenity_row( $index, $data ) {
    $name = isset( $data['name'] ) ? esc_attr( $data['name'] ) : '';
    $availability = isset( $data['availability'] ) ? esc_attr( $data['availability'] ) : 'Yes';
    $cost = isset( $data['cost'] ) ? esc_attr( $data['cost'] ) : '';
    // Default icon if not set
    $icon = isset( $data['icon'] ) && ! empty( $data['icon'] ) ? esc_attr( $data['icon'] ) : 'fa-solid fa-star';
    ?>
    <div class="ab-repeater-row amenity-row">
        <div class="ab-field">
            <label>Amenity Name</label>
            <div class="ab-input-icon">
                <!-- Icon Picker Button -->
                <button type="button" class="ab-icon-select-btn">
                    <i class="<?php echo $icon; ?>"></i>
                    <i class="fa-solid fa-caret-down" style="font-size: 10px; margin-left: 4px;"></i>
                </button>
                <!-- Hidden input to store the class -->
                <input type="hidden" name="prop_amenity[<?php echo $index; ?>][icon]" class="ab-icon-value" value="<?php echo $icon; ?>">
                
                <input type="text" name="prop_amenity[<?php echo $index; ?>][name]" value="<?php echo $name; ?>" placeholder="e.g., Swimming Pool" style="padding-left: 55px;">
            </div>
        </div>
        <div class="ab-field">
            <label>Availability</label>
            <select name="prop_amenity[<?php echo $index; ?>][availability]" class="ab-select">
                <option value="Yes" <?php selected( $availability, 'Yes' ); ?>>Yes</option>
                <option value="No" <?php selected( $availability, 'No' ); ?>>No</option>
            </select>
        </div>
        <div class="ab-field">
            <label>Cost of Construction</label>
            <div class="ab-input-icon">
                <i class="fa-solid fa-indian-rupee-sign"></i>
                <input type="text" name="prop_amenity[<?php echo $index; ?>][cost]" value="<?php echo $cost; ?>" placeholder="e.g., Included or Yes, if Required">
            </div>
        </div>
        <div>
            <button type="button" class="ab-repeater-remove" title="Remove"><i class="fa-solid fa-trash"></i></button>
        </div>
    </div>
    <?php
}

/**
 * =========================================================================
 * 1. REGISTER & RENDER META BOX
 * =========================================================================
 */
function custom_property_details_meta_box() {
    add_meta_box(
        'property_details_meta_box',
        'Property Details',
        'render_property_details_meta_box',
        'post',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'custom_property_details_meta_box' );

function render_property_details_meta_box( $post ) {
    wp_nonce_field( 'save_property_details_meta', 'property_details_nonce' );

    // Retrieve existing values
    $starting_price = get_post_meta( $post->ID, '_prop_starting_price', true );
    $address        = get_post_meta( $post->ID, '_prop_address', true );
    $city           = get_post_meta( $post->ID, '_prop_city', true );
    $bedrooms       = get_post_meta( $post->ID, '_prop_bedrooms', true );
    $built_up_area  = get_post_meta( $post->ID, '_prop_built_up_area', true );
    $parking        = get_post_meta( $post->ID, '_prop_parking', true );
    $availability   = get_post_meta( $post->ID, '_prop_availability', true );
    $land           = get_post_meta( $post->ID, '_prop_land', true );
    $water          = get_post_meta( $post->ID, '_prop_water', true );
    $vastu          = get_post_meta( $post->ID, '_prop_vastu', true );
    $bank_approval  = get_post_meta( $post->ID, '_prop_bank_approval', true );
    $google_map     = get_post_meta( $post->ID, '_prop_google_map', true );
    
    // Retrieve Gallery Array
    $gallery_data   = get_post_meta( $post->ID, '_prop_gallery', true );

    // Backward compatibility: Convert old comma-separated string to array
    if ( ! empty( $gallery_data ) && ! is_array( $gallery_data ) ) {
        $ids = explode( ',', $gallery_data );
        $gallery_data = array();
        foreach ( $ids as $id ) {
            if ( ! empty( $id ) ) {
                $gallery_data[] = array( 'id' => $id, 'title' => '' );
            }
        }
    }
    if ( ! is_array( $gallery_data ) ) { $gallery_data = array(); }

    // Arrays for Repeater Fields
    $nearby_places  = get_post_meta( $post->ID, '_prop_nearby_places', true );
    $amenities      = get_post_meta( $post->ID, '_prop_amenities', true );

    // Set Defaults
    if ( empty( $parking ) ) { $parking = 'Yes'; }
    if ( empty( $availability ) ) { $availability = 'Available'; }
    if ( empty( $vastu ) ) { $vastu = 'Yes'; }
    if ( ! is_array( $nearby_places ) ) { $nearby_places = array(); }
    if ( ! is_array( $amenities ) ) { $amenities = array(); }
    ?>

    <style>
        .ab-form-wrapper { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; color: #3c434a; padding: 10px 0; box-sizing: border-box; }
        .ab-card { background: #fff; border: 1px solid #c3c4c7; border-radius: 8px; padding: 20px; margin-bottom: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02); box-sizing: border-box; }
        .ab-card-title { margin: 0 0 20px 0; font-size: 15px; font-weight: 600; color: #1d2327; border-bottom: 1px solid #f0f0f1; padding-bottom: 10px; display: flex; justify-content: space-between; align-items: center; }
        
        .ab-grid { display: grid; gap: 20px; margin-bottom: 20px; }
        .ab-grid:last-child { margin-bottom: 0; }
        .ab-grid-2 { grid-template-columns: 1fr 1fr; }
        
        .ab-field { display: flex; flex-direction: column; }
        .ab-field label { font-weight: 600; margin-bottom: 8px; font-size: 13px; color: #3c434a; }
        .ab-field label span.req { color: #d63638; margin-left: 3px; }
        
        /* Input with Icon Inside */
        .ab-input-icon { position: relative; display: flex; align-items: center; width: 100%; }
        .ab-input-icon > i { position: absolute; left: 12px; font-size: 14px; color: #2271b1; pointer-events: none; }
        
        .ab-input-icon input[type="text"], .ab-input-icon input[type="number"] {
            width: 100%; padding: 8px 12px 8px 36px; border: 1px solid #8c8f94; border-radius: 4px; font-size: 14px; height: 36px; box-shadow: inset 0 1px 2px rgba(0,0,0,.07); box-sizing: border-box;
        }
        
        .ab-select { width: 100%; padding: 8px 12px; border: 1px solid #8c8f94; border-radius: 4px; font-size: 14px; height: 36px; box-shadow: inset 0 1px 2px rgba(0,0,0,.07); background-color: #fff; box-sizing: border-box; }
        .ab-input-icon input:focus, .ab-select:focus { border-color: #2271b1; box-shadow: 0 0 0 1px #2271b1; outline: none; }

        /* Textarea for Google Map */
        .ab-textarea { width: 100%; padding: 10px; border: 1px solid #8c8f94; border-radius: 4px; font-size: 14px; height: 80px; box-shadow: inset 0 1px 2px rgba(0,0,0,.07); box-sizing: border-box; font-family: monospace; }
        .ab-textarea:focus { border-color: #2271b1; box-shadow: 0 0 0 1px #2271b1; outline: none; }

        /* Repeater Styles */
        .ab-repeater-row { display: grid; gap: 15px; margin-bottom: 15px; padding: 15px; background: #f9f9f9; border: 1px solid #e2e4e7; border-radius: 6px; position: relative; align-items: end; box-sizing: border-box; }
        .ab-repeater-row.nearby-row { grid-template-columns: 2fr 2fr 1.5fr 40px; }
        .ab-repeater-row.amenity-row { grid-template-columns: 2fr 1fr 2fr 40px; }
        .ab-repeater-remove { background: #ffebe8; color: #d63638; border: 1px solid #d63638; border-radius: 4px; height: 36px; cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 16px; transition: 0.2s; }
        .ab-repeater-remove:hover { background: #d63638; color: #fff; }
        .ab-add-btn { background: #2271b1; color: #fff; border: none; padding: 8px 16px; border-radius: 4px; cursor: pointer; font-size: 13px; font-weight: 600; display: inline-flex; align-items: center; gap: 8px; transition: 0.2s; }
        .ab-add-btn:hover { background: #135e96; }

        /* --- BUTTON-LIKE ICON PICKER --- */
        .ab-icon-select-btn {
            position: absolute; left: 0; top: 0; bottom: 0; width: 46px;
            background: #f0f0f1; border: 1px solid #8c8f94; border-right: none;
            border-radius: 4px 0 0 4px; cursor: pointer; display: flex; align-items: center; justify-content: center;
            z-index: 2; transition: background 0.2s; color: #3c434a;
        }
        .ab-icon-select-btn:hover { background: #dcdcde; }
        .ab-icon-select-btn i { position: static; font-size: 14px; color: #3c434a; pointer-events: none; }

        #ab-icon-picker-popup {
            display: none; position: absolute; z-index: 999999; background: #fff;
            border: 1px solid #c3c4c7; box-shadow: 0 4px 15px rgba(0,0,0,0.15);
            width: 320px; padding: 15px; border-radius: 8px;
        }
        #ab-icon-picker-popup h4 { margin: 0 0 10px 0; font-size: 14px; border-bottom: 1px solid #f0f0f1; padding-bottom: 8px; }
        .ab-icon-grid {
            display: grid; grid-template-columns: repeat(6, 1fr); gap: 8px;
            max-height: 200px; overflow-y: auto; padding-right: 5px;
        }
        .ab-icon-grid button {
            background: #f9f9f9; border: 1px solid #e2e4e7; border-radius: 4px;
            padding: 8px 0; cursor: pointer; text-align: center; font-size: 16px; color: #3c434a;
            transition: 0.2s;
        }
        .ab-icon-grid button:hover { background: #2271b1; color: #fff; border-color: #2271b1; }

        /* --- GALLERY STYLES --- */
        .ab-gallery-preview { display: flex; flex-direction: column; gap: 10px; margin-bottom: 20px; }
        .ab-gallery-item { 
            display: flex; flex-direction: row; align-items: center; gap: 15px; padding: 10px 15px; 
            background: #f9f9f9; border: 1px solid #e2e4e7; border-radius: 6px; box-shadow: 0 1px 2px rgba(0,0,0,0.02);
            width: 100%; box-sizing: border-box; transition: background-color 0.2s, border-color 0.2s;
        }
        .ab-gallery-item:hover { background: #f0f6fc; border-color: #c3c4c7; }
        .ab-gallery-title-input { 
            flex: 1 1 auto; min-width: 0; padding: 8px 12px; border: 1px solid #c3c4c7; font-size: 14px; 
            background: #fff; outline: none; border-radius: 4px; height: 38px; box-shadow: inset 0 1px 2px rgba(0,0,0,.05); box-sizing: border-box;
        }
        .ab-gallery-title-input:focus { border-color: #2271b1; box-shadow: 0 0 0 1px #2271b1; }
        .ab-gallery-thumb { 
            width: 120px; height: 75px; max-width: 120px; object-fit: cover; border-radius: 4px; 
            border: 1px solid #c3c4c7; flex-shrink: 0; box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .ab-gallery-remove { 
            flex-shrink: 0; width: 38px; height: 38px; background: #fff; color: #d63638; 
            border: 1px solid #d63638; border-radius: 4px; cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 16px; transition: 0.2s; 
        }
        .ab-gallery-remove:hover { background: #d63638; color: #fff; }

        /* --- RESPONSIVENESS --- */
        @media (max-width: 782px) {
            .ab-grid-2 { grid-template-columns: 1fr; }
            .ab-repeater-row.nearby-row { grid-template-columns: 1fr; gap: 10px; }
            .ab-repeater-row.amenity-row { grid-template-columns: 1fr; gap: 10px; }
            .ab-repeater-remove { width: 100%; margin-top: 10px; }
            .ab-gallery-thumb { width: 90px; height: 60px; }
            .ab-gallery-item { gap: 10px; padding: 10px; }
        }
    </style>

    <div class="ab-form-wrapper">
        
        <!-- CARD 1: PROPERTY DETAILS -->
        <div class="ab-card">
            <h3 class="ab-card-title">Property Details</h3>
            
            <div class="ab-grid ab-grid-2">
                <div class="ab-field">
                    <label>Starting Price <span class="req">*</span></label>
                    <div class="ab-input-icon">
                        <i class="fa-solid fa-tag" style="color: #d63638;"></i>
                        <input type="text" name="prop_starting_price" value="<?php echo esc_attr( $starting_price ); ?>" placeholder="e.g., ₹65,00,000" required>
                    </div>
                </div>
                <div class="ab-field">
                    <label>Address <span class="req">*</span></label>
                    <div class="ab-input-icon">
                        <i class="fa-solid fa-map" style="color: #d63638;"></i>
                        <input type="text" name="prop_address" value="<?php echo esc_attr( $address ); ?>" placeholder="e.g., Hosabettu, Surathkal" required>
                    </div>
                </div>
            </div>

            <div class="ab-grid ab-grid-2">
                <div class="ab-field">
                    <label>City <span class="req">*</span></label>
                    <div class="ab-input-icon">
                        <i class="fa-solid fa-city" style="color: #d63638;"></i>
                        <input type="text" name="prop_city" value="<?php echo esc_attr( $city ); ?>" placeholder="e.g., Mangaluru" required>
                    </div>
                </div>
                <div class="ab-field">
                    <label>Bedrooms</label>
                    <div class="ab-input-icon">
                        <i class="fa-solid fa-bed"></i>
                        <input type="number" name="prop_bedrooms" value="<?php echo esc_attr( $bedrooms ); ?>" placeholder="e.g., 3">
                    </div>
                </div>
            </div>

            <div class="ab-grid ab-grid-2">
                <div class="ab-field">
                    <label>Built-up Area <span class="req">*</span></label>
                    <div class="ab-input-icon">
                        <i class="fa-solid fa-ruler-combined" style="color: #d63638;"></i>
                        <input type="text" name="prop_built_up_area" value="<?php echo esc_attr( $built_up_area ); ?>" placeholder="e.g., 1200 Sq.Ft." required>
                    </div>
                </div>
                <div class="ab-field">
                    <label>Parking</label>
                    <select name="prop_parking" class="ab-select">
                        <option value="Yes" <?php selected( $parking, 'Yes' ); ?>>Yes</option>
                        <option value="No" <?php selected( $parking, 'No' ); ?>>No</option>
                    </select>
                </div>
            </div>

            <div class="ab-grid ab-grid-2">
                <div class="ab-field">
                    <label>Availability</label>
                    <select name="prop_availability" class="ab-select">
                        <option value="Available" <?php selected( $availability, 'Available' ); ?>>Available</option>
                        <option value="Sold" <?php selected( $availability, 'Sold' ); ?>>Sold</option>
                    </select>
                </div>
                <div class="ab-field">
                    <label>Land</label>
                    <div class="ab-input-icon">
                        <i class="fa-solid fa-mountain-sun"></i>
                        <input type="text" name="prop_land" value="<?php echo esc_attr( $land ); ?>" placeholder="e.g., 4 Cents">
                    </div>
                </div>
            </div>

            <div class="ab-grid ab-grid-2">
                <div class="ab-field">
                    <label>Water</label>
                    <div class="ab-input-icon">
                        <i class="fa-solid fa-droplet"></i>
                        <input type="text" name="prop_water" value="<?php echo esc_attr( $water ); ?>" placeholder="e.g., Borewell / Corporation">
                    </div>
                </div>
                <div class="ab-field">
                    <label>Vastu</label>
                    <select name="prop_vastu" class="ab-select">
                        <option value="Yes" <?php selected( $vastu, 'Yes' ); ?>>Yes</option>
                        <option value="No" <?php selected( $vastu, 'No' ); ?>>No</option>
                    </select>
                </div>
            </div>

            <div class="ab-grid ab-grid-2">
                <div class="ab-field">
                    <label>Bank Approval</label>
                    <div class="ab-input-icon">
                        <i class="fa-solid fa-building-columns"></i>
                        <input type="text" name="prop_bank_approval" value="<?php echo esc_attr( $bank_approval ); ?>" placeholder="e.g., SBI, HDFC Approved">
                    </div>
                </div>
            </div>
        </div>

        <!-- CARD 2: GOOGLE MAP -->
        <div class="ab-card">
            <h3 class="ab-card-title">Google Map</h3>
            <div class="ab-grid">
                <div class="ab-field">
                    <label>Google Map Embed Code / URL</label>
                    <textarea name="prop_google_map" class="ab-textarea" placeholder="Paste Google Maps iframe code here..."><?php echo esc_textarea( $google_map ); ?></textarea>
                </div>
            </div>
        </div>

        <!-- CARD 3: NEARBY PLACES (Repeater) -->
        <div class="ab-card">
            <h3 class="ab-card-title">Nearby Places</h3>
            <div id="nearby-places-container">
                <?php 
                if ( ! empty( $nearby_places ) ) {
                    foreach ( $nearby_places as $index => $place ) {
                        render_nearby_row( $index, $place );
                    }
                } else {
                    render_nearby_row( 0, array() ); 
                }
                ?>
            </div>
            <button type="button" class="ab-add-btn" id="add-nearby-btn"><i class="fa-solid fa-plus"></i> Add Nearby Place</button>
        </div>

        <!-- CARD 4: AMENITIES (Repeater) -->
        <div class="ab-card">
            <h3 class="ab-card-title">Amenities</h3>
            <div id="amenities-container">
                <?php 
                if ( ! empty( $amenities ) ) {
                    foreach ( $amenities as $index => $amenity ) {
                        render_amenity_row( $index, $amenity );
                    }
                } else {
                    render_amenity_row( 0, array() ); 
                }
                ?>
            </div>
            <button type="button" class="ab-add-btn" id="add-amenity-btn"><i class="fa-solid fa-plus"></i> Add Amenity</button>
        </div>

        <!-- CARD 5: GALLERY -->
        <div class="ab-card">
            <h3 class="ab-card-title">Project Gallery</h3>
            
            <div id="ab-gallery-preview" class="ab-gallery-preview">
                <?php
                if ( ! empty( $gallery_data ) ) {
                    foreach ( $gallery_data as $item ) {
                        $img_url = wp_get_attachment_image_url( $item['id'], 'thumbnail' );
                        if ( $img_url ) {
                            echo '<div class="ab-gallery-item" data-id="' . esc_attr( $item['id'] ) . '">';
                            echo '<button type="button" class="ab-gallery-remove"><i class="fa-solid fa-xmark"></i></button>';
                            echo '<input type="text" class="ab-gallery-title-input" value="' . esc_attr( $item['title'] ) . '" placeholder="Image Title">';
                            echo '<img src="' . esc_url( $img_url ) . '" class="ab-gallery-thumb">';
                            echo '</div>';
                        }
                    }
                }
                ?>
            </div>
            
            <input type="hidden" name="prop_gallery" id="prop_gallery" value="<?php echo esc_attr( wp_json_encode( $gallery_data ) ); ?>">
            <button type="button" class="ab-add-btn" id="ab-add-gallery-btn"><i class="fa-solid fa-images"></i> Add / Manage Photos</button>
        </div>

    </div>

    <!-- ICON PICKER POPUP (Global) -->
    <div id="ab-icon-picker-popup">
        <h4>Select an Icon</h4>
        <div class="ab-icon-grid">
            <!-- Populated by JS -->
        </div>
    </div>

    <!-- Templates for JS Repeaters -->
    <script type="text/template" id="tmpl-nearby-row">
        <?php render_nearby_row( 'INDEX', array() ); ?>
    </script>
    <script type="text/template" id="tmpl-amenity-row">
        <?php render_amenity_row( 'INDEX', array() ); ?>
    </script>

    <!-- Javascript for Repeaters, Gallery & Icon Picker -->
    <script>
        // --- ICON PICKER LOGIC ---
        const iconList = [
            'fa-solid fa-star', 'fa-solid fa-swimming-pool', 'fa-solid fa-dumbbell', 'fa-solid fa-spa', 'fa-solid fa-hot-tub-person',
            'fa-solid fa-tree', 'fa-solid fa-water', 'fa-solid fa-bolt', 'fa-solid fa-snowflake', 'fa-solid fa-wifi',
            'fa-solid fa-tv', 'fa-solid fa-kitchen-set', 'fa-solid fa-bed', 'fa-solid fa-car', 'fa-solid fa-motorcycle',
            'fa-solid fa-bicycle', 'fa-solid fa-charging-station', 'fa-solid fa-basketball', 'fa-solid fa-table-tennis-paddle-ball',
            'fa-solid fa-gamepad', 'fa-solid fa-film', 'fa-solid fa-child', 'fa-solid fa-paw', 'fa-solid fa-shield-halved',
            'fa-solid fa-video', 'fa-solid fa-fire-extinguisher', 'fa-solid fa-elevator', 'fa-solid fa-stairs',
            'fa-solid fa-wheelchair', 'fa-solid fa-sun', 'fa-solid fa-moon', 'fa-solid fa-check', 'fa-solid fa-house',
            'fa-solid fa-building', 'fa-solid fa-city', 'fa-solid fa-location-dot', 'fa-solid fa-map', 'fa-solid fa-camera',
            'fa-solid fa-tv', 'fa-solid fa-music', 'fa-solid fa-utensils', 'fa-solid fa-mug-hot', 'fa-solid fa-bell'
        ];

        document.addEventListener('DOMContentLoaded', function() {
            const popup = document.getElementById('ab-icon-picker-popup');
            // Move popup to body to prevent clipping issues in WP admin
            document.body.appendChild(popup);

            // Populate icon grid
            const grid = popup.querySelector('.ab-icon-grid');
            iconList.forEach(icon => {
                let btn = document.createElement('button');
                btn.type = 'button';
                btn.innerHTML = `<i class="${icon}"></i>`;
                btn.dataset.icon = icon;
                grid.appendChild(btn);
            });

            let activeIconBtn = null;
            let activeHiddenInput = null;

            // Open Picker
            document.body.addEventListener('click', function(e) {
                const btn = e.target.closest('.ab-icon-select-btn');
                if (btn) {
                    e.preventDefault();
                    activeIconBtn = btn;
                    activeHiddenInput = btn.parentElement.querySelector('.ab-icon-value');
                    
                    // Position popup perfectly under the button
                    const rect = btn.getBoundingClientRect();
                    popup.style.top = (rect.bottom + window.scrollY + 5) + 'px';
                    popup.style.left = (rect.left + window.scrollX) + 'px';
                    popup.style.display = 'block';
                } else if (!popup.contains(e.target)) {
                    // Close if clicking outside popup and outside button
                    popup.style.display = 'none';
                }
            });

            // Select Icon
            grid.addEventListener('click', function(e) {
                const btn = e.target.closest('button');
                if (btn && activeIconBtn && activeHiddenInput) {
                    const selectedIcon = btn.dataset.icon;
                    
                    // Update Button HTML (keep the caret)
                    activeIconBtn.innerHTML = `<i class="${selectedIcon}"></i> <i class="fa-solid fa-caret-down" style="font-size: 10px; margin-left: 4px;"></i>`;
                    
                    // Update Hidden Input
                    activeHiddenInput.value = selectedIcon;
                    
                    // Close Popup
                    popup.style.display = 'none';
                }
            });

            // --- REPEATER LOGIC ---
            let nearbyIndex = <?php echo max( 1, count( $nearby_places ) ); ?>;
            document.getElementById('add-nearby-btn').addEventListener('click', function() {
                let template = document.getElementById('tmpl-nearby-row').innerHTML;
                template = template.replace(/INDEX/g, nearbyIndex);
                document.getElementById('nearby-places-container').insertAdjacentHTML('beforeend', template);
                nearbyIndex++;
            });

            let amenityIndex = <?php echo max( 1, count( $amenities ) ); ?>;
            document.getElementById('add-amenity-btn').addEventListener('click', function() {
                let template = document.getElementById('tmpl-amenity-row').innerHTML;
                template = template.replace(/INDEX/g, amenityIndex);
                document.getElementById('amenities-container').insertAdjacentHTML('beforeend', template);
                amenityIndex++;
            });

            document.querySelector('.ab-form-wrapper').addEventListener('click', function(e) {
                if (e.target.closest('.ab-repeater-remove')) {
                    e.target.closest('.ab-repeater-row').remove();
                }
            });
        });

        // --- GALLERY LOGIC ---
        jQuery(document).ready(function($) {
            let mediaUploader;

            function syncGalleryData() {
                let galleryData = [];
                $('#ab-gallery-preview .ab-gallery-item').each(function() {
                    let id = $(this).data('id');
                    let title = $(this).find('.ab-gallery-title-input').val();
                    galleryData.push({ id: id, title: title });
                });
                $('#prop_gallery').val(JSON.stringify(galleryData));
            }

            $('#ab-add-gallery-btn').click(function(e) {
                e.preventDefault();
                if (mediaUploader) {
                    mediaUploader.open();
                    return;
                }
                mediaUploader = wp.media.frames.file_frame = wp.media({
                    title: 'Select Project Photos',
                    button: { text: 'Add to Gallery' },
                    multiple: true 
                });
                
                mediaUploader.on('select', function() {
                    let selection = mediaUploader.state().get('selection');
                    let previewContainer = $('#ab-gallery-preview');
                    let existingIds = [];
                    
                    $('#ab-gallery-preview .ab-gallery-item').each(function() {
                        existingIds.push($(this).data('id').toString());
                    });

                    selection.map( function( attachment ) {
                        attachment = attachment.toJSON();
                        
                        if ( ! existingIds.includes(attachment.id.toString()) ) {
                            let imgUrl = attachment.sizes && attachment.sizes.thumbnail ? attachment.sizes.thumbnail.url : attachment.url;
                            let defaultTitle = attachment.title || '';
                            
                            let html = '<div class="ab-gallery-item" data-id="' + attachment.id + '">';
                            html += '<button type="button" class="ab-gallery-remove"><i class="fa-solid fa-xmark"></i></button>';
                            html += '<input type="text" class="ab-gallery-title-input" value="' + defaultTitle + '" placeholder="Image Title">';
                            html += '<img src="' + imgUrl + '" class="ab-gallery-thumb">';
                            html += '</div>';
                            
                            previewContainer.append(html);
                        }
                    });
                    
                    syncGalleryData();
                });
                
                mediaUploader.open();
            });

            $(document).on('click', '.ab-gallery-remove', function(e) {
                e.preventDefault();
                $(this).closest('.ab-gallery-item').remove();
                syncGalleryData();
            });

            $(document).on('input', '.ab-gallery-title-input', function() {
                syncGalleryData();
            });
        });
    </script>
    <?php
}

/**
 * =========================================================================
 * 2. SAVE META BOX DATA
 * =========================================================================
 */
function save_property_details_meta( $post_id ) {
    if ( ! isset( $_POST['property_details_nonce'] ) || ! wp_verify_nonce( $_POST['property_details_nonce'], 'save_property_details_meta' ) ) {
        return $post_id;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
    if ( 'post' === $_POST['post_type'] && ! current_user_can( 'edit_post', $post_id ) ) {
        return $post_id;
    }

    // Save Basic Fields
    $fields = array(
        'prop_starting_price' => '_prop_starting_price',
        'prop_address'        => '_prop_address',
        'prop_city'           => '_prop_city',
        'prop_bedrooms'       => '_prop_bedrooms',
        'prop_built_up_area'  => '_prop_built_up_area',
        'prop_parking'        => '_prop_parking',
        'prop_availability'   => '_prop_availability',
        'prop_land'           => '_prop_land',
        'prop_water'          => '_prop_water',
        'prop_vastu'          => '_prop_vastu',
        'prop_bank_approval'  => '_prop_bank_approval',
    );

    foreach ( $fields as $post_key => $meta_key ) {
        if ( isset( $_POST[ $post_key ] ) ) {
            update_post_meta( $post_id, $meta_key, sanitize_text_field( $_POST[ $post_key ] ) );
        }
    }

    // Save Google Map (Safely allowing iframes)
    if ( isset( $_POST['prop_google_map'] ) ) {
        $map_data = trim( $_POST['prop_google_map'] );
        
        if ( strpos( $map_data, '<iframe' ) === 0 ) {
            $allowed_html = array(
                'iframe' => array(
                    'src'             => true,
                    'width'           => true,
                    'height'          => true,
                    'frameborder'     => true,
                    'style'           => true,
                    'allowfullscreen' => true,
                    'loading'         => true,
                    'referrerpolicy'  => true,
                )
            );
            update_post_meta( $post_id, '_prop_google_map', wp_kses( $map_data, $allowed_html ) );
        } else {
            update_post_meta( $post_id, '_prop_google_map', sanitize_text_field( $map_data ) );
        }
    }

    // Save Gallery (JSON Decode & Sanitize)
    if ( isset( $_POST['prop_gallery'] ) ) {
        $gallery_json = stripslashes( $_POST['prop_gallery'] );
        $gallery_arr = json_decode( $gallery_json, true );
        
        if ( is_array( $gallery_arr ) ) {
            $sanitized_gallery = array();
            foreach ( $gallery_arr as $item ) {
                if ( ! empty( $item['id'] ) ) {
                    $sanitized_gallery[] = array(
                        'id'    => intval( $item['id'] ),
                        'title' => sanitize_text_field( $item['title'] )
                    );
                }
            }
            update_post_meta( $post_id, '_prop_gallery', $sanitized_gallery );
        } else {
            delete_post_meta( $post_id, '_prop_gallery' );
        }
    }

    // Save Nearby Places (Array)
    if ( isset( $_POST['prop_nearby'] ) && is_array( $_POST['prop_nearby'] ) ) {
        $nearby_data = array();
        foreach ( $_POST['prop_nearby'] as $nearby ) {
            if ( ! empty( $nearby['type'] ) || ! empty( $nearby['name'] ) || ! empty( $nearby['distance'] ) ) {
                $nearby_data[] = array(
                    'type'     => sanitize_text_field( $nearby['type'] ),
                    'name'     => sanitize_text_field( $nearby['name'] ),
                    'distance' => sanitize_text_field( $nearby['distance'] )
                );
            }
        }
        update_post_meta( $post_id, '_prop_nearby_places', $nearby_data );
    } else {
        delete_post_meta( $post_id, '_prop_nearby_places' );
    }

    // Save Amenities (Array) - INCLUDES NEW ICON FIELD
    if ( isset( $_POST['prop_amenity'] ) && is_array( $_POST['prop_amenity'] ) ) {
        $amenity_data = array();
        foreach ( $_POST['prop_amenity'] as $amenity ) {
            if ( ! empty( $amenity['name'] ) || ! empty( $amenity['cost'] ) ) {
                $amenity_data[] = array(
                    'name'         => sanitize_text_field( $amenity['name'] ),
                    'availability' => sanitize_text_field( $amenity['availability'] ),
                    'cost'         => sanitize_text_field( $amenity['cost'] ),
                    'icon'         => sanitize_text_field( $amenity['icon'] )
                );
            }
        }
        update_post_meta( $post_id, '_prop_amenities', $amenity_data );
    } else {
        delete_post_meta( $post_id, '_prop_amenities' );
    }
}
add_action( 'save_post', 'save_property_details_meta' );

/**
 * =========================================================================
 * 3. FRONTEND HELPER FUNCTION
 * =========================================================================
 */
function get_property_details( $post_id = null ) {
    if ( null === $post_id ) {
        $post_id = get_the_ID();
    }
    if ( ! $post_id ) {
        return array();
    }

    // Backward compatibility for the gallery data
    $gallery = get_post_meta( $post_id, '_prop_gallery', true );
    if ( ! empty( $gallery ) && ! is_array( $gallery ) ) {
        $ids = explode( ',', $gallery );
        
        $gallery = array();
        foreach ( $ids as $id ) {
            if(!empty($id)) $gallery[] = array( 'id' => $id, 'title' => '' );
        }
    }

    return array(
        'starting_price' => get_post_meta( $post_id, '_prop_starting_price', true ),
        'address'        => get_post_meta( $post_id, '_prop_address', true ),
        'city'           => get_post_meta( $post_id, '_prop_city', true ),
        'bedrooms'       => get_post_meta( $post_id, '_prop_bedrooms', true ),
        'built_up_area'  => get_post_meta( $post_id, '_prop_built_up_area', true ),
        'parking'        => get_post_meta( $post_id, '_prop_parking', true ),
        'availability'   => get_post_meta( $post_id, '_prop_availability', true ),
        'land'           => get_post_meta( $post_id, '_prop_land', true ),
        'water'          => get_post_meta( $post_id, '_prop_water', true ),
        'vastu'          => get_post_meta( $post_id, '_prop_vastu', true ),
        'bank_approval'  => get_post_meta( $post_id, '_prop_bank_approval', true ),
        'google_map'     => get_post_meta( $post_id, '_prop_google_map', true ),
        'gallery'        => $gallery, 
        'nearby_places'  => get_post_meta( $post_id, '_prop_nearby_places', true ), 
        'amenities'      => get_post_meta( $post_id, '_prop_amenities', true ),     
    );
}





/**
 * Format price into Lakhs or Crores (No Thousands)
 */
function format_indian_price( $price_string ) {
    // 1. Clean the string to remove currency symbols and commas
    $clean_string = preg_replace('/[^0-9.]/', '', $price_string);
    $amount = (float) $clean_string;

    if ( empty($amount) ) {
        return 'Price on request';
    }

    // 2. Calculate Crores or Lakhs
    if ( $amount >= 10000000 ) {
        $val = round( $amount / 10000000, 2 );
        $suffix = ' Cr';
    } elseif ( $amount >= 100000 ) {
        $val = round( $amount / 100000, 2 );
        $suffix = ' Lakhs';
    } else {
        // If it is less than 1 Lakh, just keep the raw number
        $val = $amount;
        $suffix = '';
    }

    // 3. Remove trailing .00 or trailing zeros (e.g., 65.00 becomes 65, 2.50 becomes 2.5)
    $val = rtrim( rtrim( number_format($val, 2, '.', ''), '0' ), '.' );

    return '₹' . $val . $suffix;
}




/*Contact form custom email instead of the wordpress@doman.com */
add_filter('wp_mail_from', function ($email) {
    return 'yourname@yourdomain.com';
});

add_filter('wp_mail_from_name', function ($name) {
    return get_bloginfo('name');
});
