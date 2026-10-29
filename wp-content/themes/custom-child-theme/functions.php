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
