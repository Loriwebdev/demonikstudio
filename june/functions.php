<?php

/**
 * june functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package june
 * @subpackage Functions
 * @since 1.0
 */
 
if ( ! isset( $content_width ) )
	$content_width = 1070;

// Load Codeless Framework Constants
require_once( get_template_directory() . '/includes/core/codeless_constants.php' );

// Load Customizer Control Types
include_once( get_template_directory() . '/includes/codeless_customizer/kirki/kirki.php' );

// Load Required Plugins Tool
require_once( get_template_directory().'/includes/core/codeless_required_plugins.php' );
//Demo Importer
require_once( get_template_directory().'/includes/codeless_theme_panel/importer/codeless_importer.php' );
/**
 * All Start here...
 * 
 * @since 1.0.0
 */
function codeless_setup(){

    // Register Nav Menus Locations to use
    codeless_navigation_menus();
    // Load Codeless Customizer files and Options
    codeless_load_customizer();
    // Load All Codeless Framework Files
    codeless_load_framework();
    // Load Codeless Modules
    codeless_load_modules();

    // Language and text-domain setup
    add_action('init', 'codeless_language_setup');

    // Register Scripts and Styles
    add_action('wp_enqueue_scripts', 'codeless_register_global_styles');
    add_action('wp_enqueue_scripts', 'codeless_register_global_scripts');

    // Https filters
    add_filter( 'https_ssl_verify', '__return_false' );
    add_filter( 'https_local_ssl_verify', '__return_false' );

    // WP features that this theme supports
    codeless_theme_support();
    // Create Custom Image Sizes
    codeless_images_sizes(); 
    

    // Widgets
    codeless_load_widgets();
    codeless_register_widgets();  

    // Megamenu Create
    new codeless_custom_menu();
}

add_action( 'after_setup_theme', 'codeless_setup' );


/**
 * After theme activation
 * 
 * @since 1.0.0
 */
function codeless_after_switch_theme(){
    wp_redirect('admin.php?page=codeless-panel');
}

add_action( 'after_switch_theme', 'codeless_after_switch_theme' );


/**
 * Load Customizer Related Options and Customizer Cotrols Classes
 * 
 * @since 1.0.0
 */
function codeless_load_customizer() {

    // Load and Initialize Codeless Customizer
    include_once( get_template_directory() . '/includes/codeless_customizer/codeless_customizer_config.php' );
}


/**
 * Load all Codeless Framework Files
 * 
 * @since 1.0.0
 */
function codeless_load_framework() {

    // Register all Theme Hooks (add_action, add_filter)
    require_once( get_template_directory() . '/includes/codeless_hooks.php' );

    // Codeless Routing Templates and Custom Type Queries
    require_once( get_template_directory().'/includes/core/codeless_routing.php' );
    

    // Register all theme related sidebars
    require_once( get_template_directory().'/includes/register/register_sidebars.php' );

    // Register Custom Post Types
    // Works with Codeless Builder activated
    // Plugin Territory
    require_once( get_template_directory().'/includes/register/register_custom_types.php' );

    // Load Codeless Post Like
    require_once( get_template_directory().'/includes/core/codeless_post_like.php' );

    // Load Codeless Share Counts
    require_once( get_template_directory().'/includes/core/codeless_share_counts.php' );

    // Load Megamenu
    require_once( get_template_directory().'/includes/core/codeless_megamenu.php' );

    // Load all functions that are responsable for Extra Classes and Extra Attrs
    require_once( get_template_directory().'/includes/codeless_html_attrs.php' );

    // Load all blog related functions
    require_once( get_template_directory().'/includes/codeless_functions_blog.php' );

    // Load all portfolio related functions
    require_once( get_template_directory().'/includes/codeless_functions_portfolio.php' );

    // Load Theme Panels
    require_once( get_template_directory().'/includes/codeless_theme_panel/codeless_backpanel.php' );
    require_once( get_template_directory().'/includes/codeless_theme_panel/codeless_theme_panel.php' );
    require_once( get_template_directory().'/includes/codeless_theme_panel/codeless_image_sizes.php' );
    require_once( get_template_directory().'/includes/codeless_theme_panel/codeless_modules.php' ); 
    require_once( get_template_directory().'/includes/codeless_theme_panel/codeless_custom_sidebars.php' ); 
    require_once( get_template_directory().'/includes/codeless_theme_panel/codeless_system_status.php' );
    
    // Image Resize - Module - Resize image only when needed
    require_once( get_template_directory().'/includes/core/codeless_image_resize.php' );

    // Load Comment Walker
    require_once( get_template_directory().'/includes/core/codeless_comment_walker.php' );
    
    // Codeless Icons List
    require_once( get_template_directory().'/includes/core/codeless_icons.php' );

    // Fallback Class for Header when Codeless Builder Plugin is not active
    require_once( get_template_directory().'/includes/core/codeless_header_fallback.php' );

    // Load Woocommerce Functions
    if( class_exists( 'Woocommerce' ) )
        require_once( get_template_directory().'/includes/codeless_functions_woocommerce.php' );
}



function codeless_load_builder_configs(){
    if( class_exists( 'Cl_Post_Meta' ) )
        require_once locate_template( 'includes/codeless_builder/config/cl-post-meta.php' );
}

add_action( 'init', 'codeless_load_builder_configs', 9 );


/**
 * Load All Modules
 * 
 * @since 1.0.0
 */
function codeless_load_modules(){
   require_once( get_template_directory().'/includes/codeless_modules/custom_portfolio_overlay_color.php' );
   require_once( get_template_directory().'/includes/codeless_modules/header_boxed_per_page.php' );
   require_once( get_template_directory().'/includes/codeless_modules/custom_primary_color_page.php' );
   require_once( get_template_directory().'/includes/codeless_modules/custom_header_background_per_page.php' );    
}


/**
 * Load Codeless Custom Widgets
 * 
 * @since 1.0.0
 */
function codeless_load_widgets() {
    require_once get_template_directory().'/includes/widgets/codeless_flickr.php';
    require_once get_template_directory().'/includes/widgets/codeless_mostpopular.php';
    require_once get_template_directory().'/includes/widgets/codeless_shortcodewidget.php';
    require_once get_template_directory().'/includes/widgets/codeless_socialwidget.php';
    require_once get_template_directory().'/includes/widgets/codeless_ads.php';
    require_once get_template_directory().'/includes/widgets/codeless_service.php';
    require_once get_template_directory().'/includes/widgets/codeless_contactinfo.php';
    require_once get_template_directory().'/includes/widgets/codeless_button.php';
    require_once get_template_directory().'/includes/widgets/codeless_instagram.php';

    if( class_exists( 'Woocommerce' ) ){
        require_once get_template_directory().'/includes/widgets/codeless_product_collection_feature.php';
        require_once get_template_directory().'/includes/widgets/codeless_myaccount.php';
    }
}


/**
 * Setup Language Directory and theme text domain
 * 
 * @since 1.0.0
 */
function codeless_language_setup() {
    $lang_dir = get_template_directory() . '/lang';
    load_theme_textdomain('june', $lang_dir);
} 


/**
 * Add Theme Supports
 * 
 * @since 1.0.0
 */
function codeless_theme_support(){
    add_theme_support( 'post-thumbnails' );
    
    add_theme_support('woocommerce');
    if( codeless_get_mod( 'shop_product_lightbox', false ) ){
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
    }
    add_theme_support( 'wc-product-gallery-slider' );



    add_theme_support( 'automatic-feed-links' );
    add_theme_support('nav_menus');
    add_theme_support( 'post-formats', array( 'quote', 'gallery','video', 'audio', 'link' ) ); 
    add_theme_support( "title-tag" );
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

    // Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
    add_editor_style();
}


/**
 * Regster Theme Related Image Sizes
 * 
 * @since 1.0.0
 */
function codeless_images_sizes(){
    // Empty
}


/**
 * Register Navigation Menus
 * 
 * @since 1.0.0
 */
function codeless_navigation_menus(){
    $navigations = array('main' => 'Main Navigation');

    foreach($navigations as $id => $name){ 
    	register_nav_menu($id, THEMETITLE.' '.$name); 
    }
}


/**
 * Regster Loaded Widgets
 * 
 * @since 1.0.0
 */
function codeless_register_widgets(){
    register_widget( 'CodelessSocialWidget' );
    register_widget( 'CodelessFlickrWidget' );
    register_widget( 'CodelessShortcodeWidget' );
    register_widget( 'CodelessMostPopularWidget');
    register_widget( 'CodelessAdsWidget');
    register_widget( 'CodelessService');
    register_widget( 'CodelessContactInfo');
    register_widget( 'CodelessButton' );
    register_widget( 'CodelessInstagram' );

    if( class_exists( 'Woocommerce' ) ){
        register_widget( 'CodelessMyAccount' );
        register_widget( 'CodelessProductCollectionFeature' );
    }
}


/**
 * Enqueue all needed styles
 * 
 * @since 1.0.0
 */
function codeless_register_global_styles(){ 

    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
    wp_enqueue_style('codeless-style', get_stylesheet_uri());
    
    wp_enqueue_style('codeless-front-elements', get_template_directory_uri() . '/css/codeless-front-elements.css');

    wp_enqueue_style('swiper-slider', get_template_directory_uri() . '/css/swiper.min.css');
    
    if( codeless_get_mod( 'codeless_page_transition' )) 
        wp_enqueue_style('animsition', get_template_directory_uri(). '/css/animsition.min.css'); 
    
    if( codeless_get_mod( 'blog_entry_overlay_icon' ) == 'lightbox' )
        wp_enqueue_style('ilightbox', get_template_directory_uri() . '/css/ilightbox/css/ilightbox.css' );
    
    wp_enqueue_style('cl-select2', get_template_directory_uri() . '/css/select2.min.css');

    if( function_exists('is_woocommerce') && ( is_woocommerce() || is_cart() || is_checkout() || is_account_page() || get_option( 'yith_wcwl_wishlist_page_id' ) == codeless_get_post_id() ) ){ 
        
        wp_enqueue_style('codeless-woocommerce', get_template_directory_uri() . '/css/codeless-woocommerce.css');  
    }
    wp_enqueue_style('owl-carousel', get_template_directory_uri() .'/css/owl.carousel.min.css' ); 
    // Create Dynamic Styles
    wp_enqueue_style( 'codeless-dynamic', get_template_directory_uri() . '/css/codeless-dynamic.css');
    
    /* Load Custom Dynamic Style and enqueue them with wp_add_inline_style */
    ob_start();
    codeless_custom_dynamic_style();
    $styles = ob_get_clean();

    wp_add_inline_style( 'codeless-dynamic', apply_filters( 'codeless_register_styles', $styles ) );    
}


/**
 * Enqueue all global scripts
 * 
 * @since 1.0.0
 */
function codeless_register_global_scripts(){
    
    wp_enqueue_script( 'codeless-main', get_template_directory_uri() . '/js/codeless-main.js', array( 'jquery', 'imagesloaded' ) );
    wp_enqueue_script( 'imagesloaded' );
    wp_enqueue_script( 'bowser', get_template_directory_uri() . '/js/bowser.min.js' );

   if( codeless_get_mod( 'codeless_page_transition', false )) 
        wp_enqueue_script('animation', get_template_directory_uri(). '/js/animsition.min.js'); 

    if( codeless_get_mod( 'nicescroll' ) )
        wp_enqueue_script( 'smoothscroll', get_template_directory_uri() . '/js/smoothscroll.js' ); 

    if( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1) ) {
        // Load comment-reply.js
        wp_enqueue_script( 'comment-reply' );
    }

    wp_localize_script(
        'codeless-main',
        'codeless_global',
        array(
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'FRONT_LIB_JS' => get_template_directory_uri() . '/js/',
            'FRONT_LIB_CSS' => get_template_directory_uri() . '/css/',
            'postSwiperOptions' => codeless_get_post_slider_options(),
            'cl_btn_classes' => codeless_button_classes(),
            'wc_placeholder_img_src' => ( function_exists('wc_placeholder_img_src') ? wc_placeholder_img_src() : '' ),
            'shop_columns_mobile' => codeless_get_mod( 'shop_columns_mobile', 1 ),
            'shop_open_toggles' => codeless_get_mod( 'shop_open_toggles', 0 ),
            'language' => array(
                'added' => esc_attr__('Added', 'june'),
                'add_to_cart' => esc_attr__('Add to Cart', 'june')
            )
        )
    );
}

/**
 * Load all styles from register_styles.php
 * Added with wp_add_inline_style on codeless_register_global_styles, action wp_enqueue_scripts
 * @since 1.0.0
 */
function codeless_custom_dynamic_style(){
    include get_template_directory().'/includes/register/register_styles.php';
}


/**
 * Apply Filters for given tag.
 * Use: add_filter('codeless_extra_classes_wrapper') for ex,
 * will add a custom class at wrapper html tag
 * 
 * @since 1.0.0
 * @version 1.0.3
 */
 
function codeless_extra_classes($tag){
    
    if( empty($tag) )
        return '';
      
    $classes = apply_filters('codeless_extra_classes_'.$tag, array()); 
    return (!empty($classes) ? implode(" ", $classes) : '');
}


/**
 * Apply Filters for given tag.
 * Use: add_filter('codeless_extra_attr_viewport') for ex,
 * will add a custom attr at viewport html tag
 * 
 * @since 1.0.0
 * @version 1.0.3
 */
 
function codeless_extra_attr($tag){
    
    if( empty($tag) )
        return '';
      
    $attrs = apply_filters('codeless_extra_attr_'.$tag, array()); 
    return (!empty($attrs) ? implode(" ", $attrs) : '');
}


/**
 * Core Function: Return the value of a specific Mod
 * 
 * @since 1.0.0
 */
function codeless_get_mod( $id, $default = '', $sub_array = '', $pass_meta = false ){

    //For Online

    global $codeless_online_mods, $cl_from_element;

    if( isset($cl_from_element[$id]) && !empty($cl_from_element[$id]) ){
        return $cl_from_element[$id];
    }

    if( isset($codeless_online_mods[$id])  && ! is_customize_preview() )
            return $codeless_online_mods[$id];

    if( !$pass_meta ){
        if( function_exists( 'codeless_get_post_id()' ) )
            $page_id_ = codeless_get_post_id();
        else
            $page_id_ = get_the_ID();

        $post_meta = get_post_meta( $page_id_, 'page_'.$id );

        if( $post_meta !== false && $post_meta != '' && !empty( $post_meta ) ){
            $return = '';

            if( is_array( $post_meta ) && ( count( $post_meta ) == 1 || ( count($post_meta) == 2 && $post_meta[0] == $post_meta[1] )  ) )
                $return = $post_meta[0];
            else
                $return = $post_meta;

            if( is_array( $post_meta ) && empty( $post_meta ) )
                $return = '';

            return $return;
                
        }
    }


    if($default == '')
        $default = codeless_theme_mod_default($id);


    if ( is_customize_preview() ) {
        
        if($sub_array == '')
            return get_theme_mod( $id, $default );
        else if(isset($var[$sub_array])){
            $var = get_theme_mod( $id, $default );
            return $var[$sub_array];
        }
    }
    
    global $cl_theme_mods;
    
    if ( ! empty( $cl_theme_mods ) ) {

        if ( isset( $cl_theme_mods[$id] ) ) {

            if($sub_array == '')
                return $cl_theme_mods[$id];
            else
                return $cl_theme_mods[$id][$sub_array];
        }

        else {
            return $default;
        }

    }

    else {

        if($sub_array == '')
            return get_theme_mod( $id, $default );
        else if(isset($var[$sub_array])){
            $var = get_theme_mod( $id, $default );
            return $var[$sub_array];
        }
    }

}


/**
 * Generic Read Function
 * 
 * @since 1.0.0
 */
function codeless_generic_read_file($file){
    if( ! function_exists('codeless_builder_generic_read_file') )
        return false;

    return codeless_builder_generic_read_file( $file );
}


/**
 * Generic Read Function
 * 
 * @since 1.0.0
 */
function codeless_generic_get_content( $file ) {
    if( ! function_exists('codeless_builder_generic_get_content') )
        return false;

    return codeless_builder_generic_get_content( $file );
}


/**
 * Get the Default Value of a theme mod from Codeless Options
 * 
 * @since 1.0.0
 */
function codeless_theme_mod_default($id){
    if( isset( Kirki::$fields[$id] ) && isset( Kirki::$fields[$id]['default'] ) && ! empty( Kirki::$fields[$id]['default'] ) )
        return Kirki::$fields[$id]['default'];
    else 
        return '';
}


/**
 * Check if is neccesary to add extra HTML for container and inner row (make an inner container)
 * @since 1.0.0
 */
function codeless_is_inner_content(){
    $condition = false;

    // Condition to test if query is a blog
    if( ! codeless_is_blog_query() )
        $condition = true;


    if( (! codeless_page_from_builder() || 
            ( codeless_get_page_layout() != 'fullwidth' 
                && codeless_get_page_layout() != '' 
                && codeless_get_page_layout() != 'default' ) || 
            ( is_single() 
                && get_post_type() == 'post' 
                && codeless_get_post_style() != 'custom'  ) ||
            is_page_template( 'template-sidenav.php' )
        )
        && $condition )

        return true;

    return false;
}


/**
 * Check if is modern layout
 * @since 1.0.0
 */
function codeless_is_layout_modern(){
    $layout_modern = codeless_get_mod( 'layout_modern' );

    if( codeless_get_meta( 'layout_modern' ) != 'default' &&  codeless_get_meta( 'layout_modern' ) != '' ){
        $layout_modern = codeless_get_meta( 'layout_modern' );
    }

    return $layout_modern;
}


/**
 * Loop Counter
 * @since 1.0.0
 */
function codeless_loop_counter( $i = false ){
    global $codeless_loop_counter;
    
    if( $i !== false )
        $codeless_loop_counter = $i;
    
    return $codeless_loop_counter;
}


/**
 * Select and output sidebar for current page
 * @since 1.0.0
 */
function codeless_get_sidebar(){
    
    // Get current page layout
    $layout = codeless_get_page_layout();
  
    // No sidebar if fullwidth layout
    if( $layout == 'fullwidth' )
        return;
    
    // Load custom sidebar template for dual
    if( $layout == 'dual_sidebar' ){
        get_sidebar( 'dual' );
        return;
    }
    
    // For left/right sidebar layouts get default sidebar template
    get_sidebar();
    
}


/**
 * Two functions used for creating a wrapper for sticky sidebar
 * @since 1.0.0
 */
function codeless_sticky_sidebar_wrapper(){
    echo '<div class="cl-sticky-wrapper">';
}
function codeless_sticky_sidebar_wrapper_end(){
    echo '</div><!-- .cl-sticky-wrapper -->';
}


/**
 * Determine if page uses a left/right sidebar or a fullwidth layout
 * @since 1.0.0 
 */
function codeless_get_page_layout(){
    
    global $codeless_page_layout;

    // Make a test and save at the global variable to make the function works faster
    if(!isset($codeless_page_layout) || empty($codeless_page_layout) || (isset($codeless_page_layout) && !$codeless_page_layout) || is_customize_preview() ){
    
        // Default 
        $codeless_page_layout = codeless_get_mod( 'layout', 'fullwidth', '', true );
        
        // Check if query is a blog query
        if( codeless_is_blog_query() && codeless_get_mod( 'blog_layout' ) != 'none' )
            $codeless_page_layout = codeless_get_mod( 'blog_layout' );
        
        // Blog Post layout
        if( is_single() && get_post_type( codeless_get_post_id() ) == 'post' )
            $codeless_page_layout = codeless_get_mod( 'blog_post_layout', 'right_sidebar' );       
       
        // Add single page layout check here
        if( codeless_get_meta( 'page_layout', 'default' ) != "default" )
            $codeless_page_layout = codeless_get_meta( 'page_layout', 'default');

        if( is_archive() && ( !function_exists('is_shop') || ( function_exists('is_shop') && !is_shop() ) ) )
            $codeless_page_layout = codeless_get_mod( 'blog_archive_layout', 'fullwidth' );

        if( function_exists('is_product_category') && is_product_category() )
            $codeless_page_layout = codeless_get_mod( 'shop_category_layout', 'fullwidth' ); 

        if( is_search() )
            $codeless_page_layout = codeless_get_mod( 'search_page_layout', 'fullwidth' );

        if( function_exists('is_shop') && is_shop() && is_search() )
            $codeless_page_layout = codeless_get_mod( 'shop_search_page_layout', 'left_sidebar' );

        // if no sidebar is active return 'fullwidth'
        if( ! codeless_is_active_sidebar() )
            $codeless_page_layout = 'fullwidth';

        // Apply filter and return
        $codeless_page_layout = apply_filters( 'codeless_page_layout', $codeless_page_layout );
    }
    return $codeless_page_layout;
}



/**
 * Generate Content Column HTML class based on layout type
 * @since 1.0.0
 */
function codeless_content_column_class(){
    
    // Get page layout
    $layout = codeless_get_page_layout();
    
    // First part of class "col-sm-"
    $col_class = codeless_cols_prepend();
    
    if( $layout == 'fullwidth' )
        $col_class_n = '12';
    elseif( $layout == 'dual_sidebar' )
        $col_class_n = '6';
    else{
        $col_class_n = '9';

        if( codeless_sidebar_column_size() == '4' )
            $col_class_n = '8';
    }

    if( is_page_template('template-sidenav.php') )
        $col_class_n = '8';

    $col_class .= $col_class_n;
    
    return $col_class;
    
}


/**
 * Generate Bootstrap Column Size for the sidebar
 * @since 1.0.0
 */
function codeless_sidebar_column_size(){
    $size = '3';

    if( codeless_get_meta( 'sidebar_column_width', '3' ) == '4' || ( is_single() && get_post_type() == 'post' ) )
        $size = '4';

    return $size;
}


/**
 * HTML / CSS Column Class Prepend
 * @since 1.0.0
 */
function codeless_cols_prepend(){
    return apply_filters( 'codeless_cols_prepend', 'col-sm-' );
}


/**
 * Buttons Style (Classes)
 * @since 1.0.0
 * @version 1.0.3
 */
function codeless_button_classes( $classes = array(), $overwrite = false, $postID = false ){
    
    if( !is_array( $classes ) )
        $classes = array();

    if( ! $overwrite ){
        $classes[] = 'cl-btn';

        $btn_style = codeless_get_mod( 'button_style', 'square' );

        if( codeless_is_blog_entry() )
            $btn_style = codeless_get_mod( 'blog_button_style', 'square' );

        $classes[] = 'btn-style-' . $btn_style;

        $classes[] = 'btn-hover-' . codeless_get_mod( 'button_hover_effect', 'darker' );
    }

    $classes = apply_filters( 'codeless_button_classes', $classes );
    
    return (!empty($classes) ? implode(" ", $classes) : '');
}


/**
 * Check if page it's generated from Codeless Builder or VC
 * @since 1.0.0
 */
function codeless_page_from_builder(){
    
    global $codeless_page_from_builder;
    
    if( ! isset( $codeless_page_from_builder ) || is_null( $codeless_page_from_builder ) ){
        
        $codeless_page_from_builder = false;
        $page = get_page( codeless_get_post_id() );
        
        if( is_object($page) ){
            $content = $page->post_content;
            preg_match_all('/\[vc_row(.*?)\]/', $content, $matches_vc );
            preg_match_all('/\[cl_page_header(.*?)\]/', $content, $matches_cl_page_header );
            preg_match_all('/\[cl_row(.*?)\]/', $content, $matches_cl_row );
            
            if ( isset($matches_vc[0]) && !empty($matches_vc[0]) )
                $codeless_page_from_builder = true;
            
            if ( isset($matches_cl_page_header[0]) && !empty($matches_cl_page_header[0]) ) 
                $codeless_page_from_builder = true;
            if ( isset($matches_cl_row[0]) && !empty($matches_cl_row[0]) )
                $codeless_page_from_builder = true;
        }else{
            $codeless_page_from_builder = false;
        }

    }

    if( is_customize_preview() && class_exists( 'Cl_Builder_Manager' ) )
        return true;
        
    return $codeless_page_from_builder;
}


/**
 * Convert Width (1/2 or 1/3 etc) to col-sm-6... 
 * @since 1.0.0
 */
function codeless_widthToSpan( $width ) {
    preg_match( '/(\d+)\/(\d+)/', $width, $matches );

    if ( ! empty( $matches ) ) {
        $part_x = (int) $matches[1];
        $part_y = (int) $matches[2];
        if ( $part_x > 0 && $part_y > 0 ) {
            $value = ceil( $part_x / $part_y * 12 );
            if ( $value > 0 && $value <= 12 ) {
                $width = codeless_cols_prepend() . $value;
            }
        }
    }

    return $width;
}

/**
 * Convert layout string (14_14_14_14) to an array of
 * 1/4, 1/4, 1/4, 1/4
 * @since 1.0.0
 */
function codeless_layoutToArray( $layout ){
    $layout_arr = explode( "_", $layout );
    $layout_ = array();

    foreach($layout_arr as $layout_col){
        $layout_col_arr = array();
        for ($i = 0, $l = strlen($layout_col); $i < $l; $i++) {
            $layout_col_arr[] = $layout_col{$i};
        }
        array_splice( $layout_col_arr, strlen($layout_col) / 2 , 0, '/' );
        $layout_[] = implode( '', $layout_col_arr );
    }
    
    return $layout_;
}


/**
 * Conditionals for showing footer and copyright
 * @since 1.0.0
 */
function codeless_show_footer(){  

    if( codeless_get_meta( 'page_show_footer', 'yes') == 'no' )
        return;

    $cols = codeless_layoutToArray( codeless_get_mod( 'footer_layout', '14_14_14_14' ) );
    $main_footer_bool = $top_footer_bool = $copyright_bool = false;

    for( $i = 1; $i <= count( $cols ); $i++ ) {

        if( is_active_sidebar('footer-column-' . $i) ){
            $main_footer_bool = true;
            break;
        }

    }

    if( is_active_sidebar('top_footer-left') || is_active_sidebar('top_footer-right') ){
        $top_footer_bool = true;
    }


    if( is_active_sidebar('copyright-left') || is_active_sidebar('copyright-right') ){
        $copyright_bool = true;
    }


    if( ! $main_footer_bool && !$top_footer_bool && !$copyright_bool )
        return;

    ?>

    <div id="footer-wrapper" class="<?php echo esc_attr( codeless_extra_classes( 'footer_wrapper' ) ) ?>">  
        <?php

            if( codeless_get_mod('show_instagram_feed', false) )
                get_template_part( 'template-parts/footer/instafeed' ); 

            if( $top_footer_bool )
                get_template_part( 'template-parts/footer/top_footer' );

            if( codeless_get_mod( 'show_footer', true ) && $main_footer_bool )
                get_template_part( 'template-parts/footer/main' );

            if( codeless_get_mod( 'show_quicksearches', false ) )
                get_template_part( 'template-parts/footer/quick-searches' );

            if( codeless_get_mod( 'show_copyright', true ) && $copyright_bool )
                get_template_part( 'template-parts/footer/copyright' );
        ?>
    </div><!-- #footer-wrapper -->

    <?php
}



/**
 * Build Footer Layout and call dynamic sidebar
 * 
 * @since 1.0.0
 */
function codeless_build_footer_layout(){
    // Get Layout string
    $layout = codeless_get_mod( 'footer_layout', '14_14_14_14' );
    
    // Create array of columns
    $cols = codeless_layoutToArray($layout);
    
    // Center column if layout single column layout and option is set TRUE
    $centered_column = '';
    if( $layout == '11' && codeless_get_mod( 'footer_centered_content', 0 ) )
        $centered_column = 'center-column';


    // Generate Footer Output
    $i = 0;
    foreach( $cols as $col ){
        $i++;
        
        ?>
        
        <div class="footer-widget <?php echo esc_attr( codeless_widthToSpan( $col ) ) ?> <?php echo esc_attr( $centered_column ) ?>">
        
            <?php
                if( is_active_sidebar( 'footer-column-'.$i ) )
                    dynamic_sidebar( 'footer-column-'.$i );
            ?>
        
        </div><!-- Footer Widget -->
        
        <?php
    }
    
}

/**
 * Build Copyright
 * 
 * @since 1.0.0
 */
function codeless_build_copyright(){
    ?>

    <div class="copyright-widget <?php echo esc_attr( codeless_cols_prepend().'6' ) ?>">
        
            <?php
                if( is_active_sidebar( 'copyright-left' ) )
                    dynamic_sidebar( 'copyright-left' );
            ?>
        
    </div><!-- Copyright Widget -->

    <div class="copyright-widget <?php echo esc_attr( codeless_cols_prepend().'6' ) ?>">
        
            <?php

                 if( is_active_sidebar( 'copyright-right' ) )
                    dynamic_sidebar( 'copyright-right' );
            ?>
        
    </div><!-- Copyright Widget -->

    <?php
    
}


/**
 * Build Top Footer
 * 
 * @since 1.0.0
 */
function codeless_build_top_footer(){
    ?>

    <div class="top_footer-widget <?php echo esc_attr( codeless_cols_prepend().'5' ) ?>">
        
            <?php
                if( is_active_sidebar( 'top_footer-left' ) )
                    dynamic_sidebar( 'top_footer-left' );
            ?>
        
    </div><!-- Top Footer Widget -->

    <?php if( !codeless_get_mod( 'topfooter_unique_style', 0 ) ): ?>
    <div class="top_footer-widget col-sm-offset-2 <?php echo esc_attr( codeless_cols_prepend().'5' ) ?>">
        
            <?php

                 if( is_active_sidebar( 'top_footer-right' ) )
                    dynamic_sidebar( 'top_footer-right' );
            ?>
        
    </div><!-- Top Footer Widget -->
    <?php endif; ?>


    <?php
    
}


/**
 * Return Quick Searches
 * @since 1.0.0
 */

function codeless_get_quick_searches($number = 4){

    ?>

    <div class="quick-searches">

        <span><?php esc_attr_e('Quick Searches', 'june') ?>: </span>

        <div class="tags">
            <?php
                $custom_quick_search = codeless_get_mod( 'shop_quick_search', array() );
                if(  is_array($custom_quick_search) && !empty( $custom_quick_search ) ){
                    $tag_string = '';
                    foreach( $custom_quick_search as $quick ){
                        $tag_string .= '<a href="'.home_url().'/?s='.$quick['term'].'&post_type=product">'.$quick['term'].'</a>';
                    }

                    echo codeless_complex_esc( $tag_string );
                }else{

                    $tags = get_terms( 'product_tag', array( 'orderby' => 'count', 'order' => 'desc', 'number' => $number ) );
                    
                    $tag_string = '';

                    if( count($tags) > 0 ){
                        foreach($tags as $tag){
                            $tag_string .= '<a href="'.home_url().'/?s='.$tag->name.'&post_type=product">'.$tag->name.'</a>';
                        }
                    }

                    echo codeless_complex_esc( $tag_string );
                }

            ?>
        </div>

    </div>  

    <?php
}


/**
 * Extract Page Header Shortcode from Content
 * @since 1.0.0
 */
function codeless_extract_page_header($content){
    $pattern = get_shortcode_regex(array('cl_page_header'));
    preg_match('/'.$pattern.'/s', $content, $matches);
    if (is_array($matches) && isset($matches[2]) ) {
       $shortcode = $matches[0];
       return $shortcode;
    }
}


/**
 * Add Default page title for core WordPress pages.
 * @since 1.0.0
 */
function codeless_add_default_page_title(){ 
    if( !codeless_page_from_builder() && is_page() && ! codeless_is_shop_page() && ( ( function_exists( 'is_wc_endpoint_url' ) && !is_wc_endpoint_url( 'order-received' )  ) || !function_exists('is_wc_endpoint_url') ) && get_page_template_slug() != 'template-sidenav.php' ){
        get_template_part( 'template-parts/default-page-header' );
        return;
    }
}


function codeless_leftnav_page_title(){ 
    if( get_page_template_slug() == 'template-sidenav.php' ){
        get_template_part( 'template-parts/default-page-header' );
        return;
    }
}


/**
 * Add content of Blog Page at the top of page before the loop
 * @since 1.0.0
 */
function codeless_add_page_header(){
     
        
    if( ( codeless_get_page_layout() == 'fullwidth' && ! codeless_is_blog_query() && ! is_single() ) || codeless_is_shop_page() )
        return false;

    if( is_single() && ( (codeless_get_post_style() != 'custom' && get_post_type() == 'post')  ||  (get_post_type() == 'portfolio')) )
        return;



    $post = get_post( codeless_get_post_id() ); 
    setup_postdata($post);
    if( ! is_object( $post ) )
        return;
    
    $content    = $post->post_content;
    $page_header    = codeless_extract_page_header($content);

    $page_header    = str_replace(']]>', ']]&gt;', apply_filters( 'codeless_the_page_header' , $page_header ));

    echo apply_filters('the_content', $page_header ); 

        
    wp_reset_postdata();
}


/**
 * Displays the generated output from header builder
 * or output the default header layout
 * 
 * @since 1.0.0
 */
function codeless_show_header(){
    echo '<div class="header_container ' . esc_attr( codeless_extra_classes( 'header' ) ) . '" ' . codeless_extra_attr( 'header' ) . '>';

    // If Codeless-Builder is installed load from plugin, if not load the default class
    if( function_exists( 'cl_output_header' ) )
        cl_output_header(); 
    else{
        $cl_header = new CodelessHeaderOutput();
        $cl_header->output();
    }
    echo '</div>';    
  
}


/**
 * Default Header Data
 * 
 * @since 1.0.0
 */
function codeless_get_default_header(){
    $data = array(
        'main' => array ( 
            
            'left' => array ( 
                0 => array ( 
                    'id' => '8ead0c8d-2536', 
                    'type' => 'cl_header_logo', 
                    'order' => 0, 
                    'params' => array ( ), 
                    'row' => 'main', 
                    'col' => 'left', 
                    'from_content' => true, 
                ), 
                
            ), 

            'right' => array ( 
                0 => array ( 
                    'id' => '688ebeea-7803', 
                    'type' => 'cl_header_menu', 
                    'order' => 2, 
                    'params' => array ( 'hamburger' => false, 'use_for_responsive' => 1, 'open_menu_button' => 1, 'responsive_menu' => 1 ), 
                    'row' => 'main', 
                    'col' => 'right', 
                    'from_content' => true
                ), 
            ), 
        )
    );

    return apply_filters( 'codeless_default_header', $data );
}


function codeless_is_header_boxed(){
    return apply_filters( 'codeless_is_header_boxed', codeless_get_mod( 'header_boxed', false ) );
}


/**
 * Return true if have widget on given page sidebar
 * 
 * @since 1.0.0
 */
function codeless_is_active_sidebar(){

    return is_active_sidebar( codeless_get_sidebar_name() );
}


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 * 
 * @global int $content_width
 * @since 1.0.0
 */
function codeless_content_width() {
    
	global $content_width;
	
	if( codeless_get_page_layout() != 'fullwidth' ){
	    $content_width = 795;

        if( codeless_get_mod( 'layout_modern' ) )
            $content_width = 770;
	    
	    if( codeless_get_page_layout() == 'dual_sidebar' )
	        $content_width = 520;
	}

	// Blog Alternate
	if( codeless_is_blog_query() && codeless_blog_style() == 'alternate' && ! is_single() ){
	    $content_width = 500;
	}
	
	// Blog Grid
	if( codeless_is_blog_query() && codeless_blog_style() == 'grid' && ! is_single() ){
	    $content_width = 500;
	}

}
add_action( 'template_redirect', 'codeless_content_width' );


/**
 * Return the exact thumbnail size to use for portfolio
 *
 * @since 1.0.0
 */
function codeless_get_portfolio_thumbnail_size(){

    $portfolio = codeless_get_mod( 'portfolio_image_size', 'portfolio_entry' );

    if( ( codeless_get_meta( 'portfolio_masonry_layout', 'default', get_the_ID() ) == 'large' || codeless_get_meta( 'portfolio_masonry_layout', 'default', get_the_ID() ) == 'wide' || (codeless_get_mod( 'portfolio_masonry_extra_layout', 'default' ) == 'all_long' && codeless_get_meta( 'portfolio_masonry_layout', 'default', get_the_ID() ) != 'default' ) ) && codeless_get_mod( 'portfolio_layout' ) == 'masonry' )
        $portfolio = 'portfolio_entry';

    return $portfolio;
}  

/**
 * Return the exact thumbnail size to use for team
 *
 * @since 1.0.0
 */
function codeless_get_team_thumbnail_size(){
    $team = codeless_get_mod( 'team_image_size', 'team_entry' );
    return $team;
}  


/**
 * Array of Custom Image Sizes
 * Can be modified by user in Theme Panel
 *
 * @since 1.0.0
 */
add_filter( 'codeless_image_sizes', 'codeless_image_sizes' );
function codeless_image_sizes(){
    
    $default = array(
        'blog_entry'  => array(
			'label'   => esc_html__( 'Blog Entry', 'june' ),
			'width'   => 'blog_entry_image_width',
			'height'  => 'blog_entry_image_height',
			'crop'    => 'blog_entry_image_crop',
			'section' => 'blog',
            'description' => esc_html__('Used as default for all blog images.', 'june' ),
		),
		
		'blog_entry_small'  => array(
			'label'   => esc_html__( 'Blog Entry Small', 'june' ),
			'width'   => 'blog_entry_small_image_width',
			'height'  => 'blog_entry_small_image_height',
			'crop'    => 'blog_entry_small_image_crop',
			'section' => 'blog',
            'description' => esc_html__('Used for Blog Grid and Carousels, News, Media, Alternate', 'june'),
			'defaults' => array( '1100', '880', 'center-center' )
		),	

        'blog_entry_wide'  => array(
            'label'   => esc_html__( 'Blog Entry Wide', 'june' ),
            'width'   => 'blog_entry_wide_image_width',
            'height'  => 'blog_entry_wide_image_height',
            'crop'    => 'blog_entry_wide_image_crop',
            'section' => 'blog',
            'description' => esc_html__('Used for wide blog posts on masonry', 'june'),
            'defaults' => array( '370', '480', 'center-center' )
        ),
		
		'blog_post'  => array(
			'label'   => esc_html__( 'Blog Post', 'june' ),
			'width'   => 'blog_post_image_width',
			'height'  => 'blog_post_image_height',
			'crop'    => 'blog_post_image_crop',
			'section' => 'blog',
		),

        'portfolio_entry'  => array(
            'label'   => esc_html__( 'Portfolio Entry', 'june' ),
            'width'   => 'portfolio_entry_image_width',
            'height'  => 'portfolio_entry_image_height',
            'crop'    => 'portfolio_entry_image_crop',
            'section' => 'portfolio',
            'description' => esc_html__('Used as default for all portfolio grid.', 'june' ),
        ),

        'team_entry'  => array(
            'label'   => esc_html__( 'Team Entry', 'june' ),
            'width'   => 'team_entry_image_width',
            'height'  => 'team_entry_image_height',
            'crop'    => 'team_entry_image_crop',
            'section' => 'team',
            'description' => esc_html__('Used as default for all team members', 'june' ),
        ),

        'cross_sells_thumb'  => array(
            'label'   => esc_html__( 'Cross Sells Thumbnail', 'june' ),
            'width'   => 'cross_sells_thumb_image_width',
            'height'  => 'cross_sells_thumb_image_height',
            'crop'    => 'cross_sells_thumb_image_crop',
            'section' => 'other',
            'description' => esc_html__('Used as default for all cross sells thumb', 'june' ),
            'defaults' => array( '120', '140', 'center-center' )
        ),

        'shop_masonry_small_thumb'  => array(
            'label'   => esc_html__( 'Shop Masonry Small Thumbnail', 'june' ),
            'width'   => 'shop_masonry_small_thumb_image_width',
            'height'  => 'shop_masonry_small_thumb_image_height',
            'crop'    => 'shop_masonry_small_thumb_image_crop',
            'section' => 'other',
            'description' => esc_html__('Used as default for all small shop masonry items', 'june' ),
            'defaults' => array( '270', '270', 'center-center' )
        ),

        'shop_masonry_vertical_large_thumb'  => array(
            'label'   => esc_html__( 'Shop Masonry Vertical Large Thumbnail', 'june' ),
            'width'   => 'shop_masonry_vertical_large_thumb_image_width',
            'height'  => 'shop_masonry_vertical_large_thumb_image_height',
            'crop'    => 'shop_masonry_vertical_large_thumb_image_crop',
            'section' => 'other',
            'description' => esc_html__('Used as default for all vertical large shop masonry items', 'june' ),
            'defaults' => array( '270', '570', 'center-center' )
        ),

        'shop_masonry_horizontal_large_thumb'  => array(
            'label'   => esc_html__( 'Shop Masonry horizontal large Thumbnail', 'june' ),
            'width'   => 'shop_masonry_horizontal_large_thumb_image_width',
            'height'  => 'shop_masonry_horizontal_large_thumb_image_height',
            'crop'    => 'shop_masonry_horizontal_large_thumb_image_crop',
            'section' => 'other',
            'description' => esc_html__('Used as default for all horizontal large shop masonry items', 'june' ),
            'defaults' => array( '570', '270', 'center-center' )
        ),

	);

    $custom = codeless_get_mod('cl_custom_img_sizes', array());
    if( empty( $custom ) )
        return $default;

    foreach( $custom as $new ){
        $default[$new] = array(
            'label'   => esc_html__( 'Custom', 'june' ) . ': ' . $new,
            'width'   => $new . '_image_width',
            'height'  => $new . '_image_height',
            'crop'    => $new . '_image_crop',
            'section' => 'other',
            'description' => '',
        );
    }

    return $default;
}



/**
 * Array of image crop positions
 *
 * @since 1.0.0
 */
function codeless_image_crop_positions() {
	return array(
		''              => esc_html__( 'Default', 'june' ),
		'left-top'      => esc_html__( 'Top Left', 'june' ),
		'right-top'     => esc_html__( 'Top Right', 'june' ),
		'center-top'    => esc_html__( 'Top Center', 'june' ),
		'left-center'   => esc_html__( 'Center Left', 'june' ),
		'right-center'  => esc_html__( 'Center Right', 'june' ),
		'center-center' => esc_html__( 'Center Center', 'june' ),
		'left-bottom'   => esc_html__( 'Bottom Left', 'june' ),
		'right-bottom'  => esc_html__( 'Bottom Right', 'june' ),
		'center-bottom' => esc_html__( 'Bottom Center', 'june' ),
	);
}


/**
 * Resize the Image (first time only)
 * Replace SRC attr with the new url created
 * 
 * @since 1.0.0
 */
function codeless_post_thumbnail_attr( $attr, $attachment, $size){
    
    if( is_admin() )
        return $attr;
    
    $size_attr = array();
    $additional_sizes = codeless_wp_get_additional_image_sizes();
    
    if( get_post_type( get_the_ID() ) == 'post' && codeless_get_mod( 'blog_lazyload', false ) ){
        $attr['class'] .= ' lazyload ';
        $attr['data-original'] = codeless_get_attachment_image_src($attachment->ID, $size);
    }

    if( is_string( $size ) && ! isset($additional_sizes[ $size ] ) )
        return $attr;
    
    if( ! codeless_get_mod( 'optimize_image_resizing', false ) )
        return $attr;
        
    if( is_string( $size ) )
        $size_attr = $additional_sizes[ $size ];

    $image = codeless_image_resize( array(
		'image'  => $attachment->guid,
		'width'  => isset($size_attr['width']) ? $size_attr['width'] : '',
		'height' => isset($size_attr['height']) ? $size_attr['height'] : '',
		'crop'   => isset($size_attr['crop']) ? $size_attr['crop'] : ''
	));
	
	
	$image_meta = wp_get_attachment_metadata($attachment->ID);

    if( isset( $image['url'] ) && !empty( $image['url'] ) )
        $attr['src'] = $image['url'];
    
    // Replace old url and width with new cropped url and width
    if( isset( $attr['srcset'] ) && ! empty( $attr['srcset'] ) ){
        $attr['srcset'] = str_replace($attachment->guid, $image['url'], $attr['srcset']);

        if( ! empty( $image['width'] ) )
            $attr['srcset'] = str_replace($image_meta['width'], $image['width'], $attr['srcset']);
    }

    $attr['sizes'] = '(max-width: '.$image['width'].'px) 100vw, '.$image['width'].'px';

	return $attr;
} 

add_filter('wp_get_attachment_image_attributes', 'codeless_post_thumbnail_attr', 10, 3);


/**
 * Resize the Image (first time only)
 * Return the resized image url
 * 
 * @since 1.0.0
 */
function codeless_get_attachment_image_src( $attachment_id, $size = false ){
    
    if( $size === false )
        $size = 'full';
    
    $src = wp_get_attachment_image_src( $attachment_id, 'full' );
    
    $size_attr = array();
    $additional_sizes = codeless_wp_get_additional_image_sizes();
    
    if( is_array( $size ) || ! isset( $additional_sizes[ $size ] ) )
        return $src[0];
    
    $size_attr = $additional_sizes[ $size ];

    if( is_array( $size_attr ) && ! empty( $src ) ){
        
        $image = codeless_image_resize( array(
    		'image'  => $src[0],
    		'width'  => isset($size_attr['width']) ? $size_attr['width'] : '',
    		'height' => isset($size_attr['height']) ? $size_attr['height'] : '',
    		'crop'   => isset($size_attr['crop']) ? $size_attr['crop'] : ''
    	));
    	
    	return $image['url'];
    	
    }
	
	return $src[0];
	
}


/**
 * Removes width and height attributes from image tags
 *
 * @param string $html
 *
 * @return string
 * @since 1.0.0
 */
function codeless_remove_image_size_attributes( $html, $post_id ) {
    if( get_post_type($post_id) == 'product' && codeless_get_mod( 'shop_product_lightbox', false ) )
        return $html;

    return preg_replace( '/(width|height)="\d*"/', '', $html );
}
 
// Remove image size attributes from post thumbnails
add_filter( 'post_thumbnail_html', 'codeless_remove_image_size_attributes', 9, 2 );


/**
 * List of share buttons and links
 * 
 * @since 1.0.0
 */
function codeless_share_buttons( $for_element = false ){
    
    // Get current page URL 
    $url = urlencode(get_permalink());
 
    // Get current page title
    $title = str_replace( ' ', '%20', get_the_title());
        
    // Get Post Thumbnail for pinterest
    $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
    
    $shares = array();

    
    $share_option = codeless_get_mod( 'blog_share_buttons', array( 'twitter', 'facebook' ) );

    if( function_exists( 'is_product' ) && is_product() )
        $share_option = codeless_get_mod( 'shop_share_buttons', array( 'facebook', 'twitter', 'google', 'pinterest' ) );
    
    if( $for_element )
        $share_option = array( 'twitter', 'facebook', 'google', 'whatsapp', 'linkedin', 'pinterest' );
    

    foreach( $share_option as $share_b ):

        // Construct sharing URL without using any script
        if( $share_b == 'twitter' ){
            $shares['twitter']['link'] = 'https://twitter.com/intent/tweet?text='.$title.'&amp;url='.$url;
            $shares['twitter']['icon'] = 'cl-icon-twitter';
        }
        
        if( $share_b == 'facebook' ){
            $shares['facebook']['link'] = 'https://www.facebook.com/sharer/sharer.php?u='.$url;
            $shares['facebook']['icon'] = 'cl-icon-facebook';
        }
        
        if( $share_b == 'google' ){
            $shares['google']['link'] = 'https://plus.google.com/share?url='.$url;
            $shares['google']['icon'] = 'cl-icon-google';
        }
        
        if( $share_b == 'whatsapp' ){
            $shares['whatsapp']['link'] = 'whatsapp://send?text='.$title . ' ' . $url;
            $shares['whatsapp']['icon'] = 'cl-icon-whatsapp';
        }
        
        if( $share_b == 'linkedin' ){
            $shares['linkedin']['link'] = 'https://www.linkedin.com/shareArticle?mini=true&url='.$url.'&amp;title='.$title;
            $shares['linkedin']['icon'] = 'cl-icon-linkedin';
        }
        
        if( $share_b == 'pinterest' ){
            $shares['pinterest']['link'] = 'https://pinterest.com/pin/create/button/?url='.$url.'&amp;media='.$thumbnail[0].'&amp;description='.$title;
            $shares['pinterest']['icon'] = 'cl-icon-pinterest';
        }

    endforeach;
    
    
    return apply_filters( 'codeless_share_buttons', $shares, $title, $url, $thumbnail );
}


/**
 * Change default excerpt length
 *
 * @since 1.0.0
 */
function codeless_custom_excerpt_length( $length ) {
    if( codeless_get_from_element('blog_style') == 'fullimage' )
        return 12;
    else if( codeless_get_from_element('blog_style') == 'grid' )
        return 16;
    else

	   return codeless_get_mod( 'blog_excerpt_length', 20 );
}
add_filter( 'excerpt_length', 'codeless_custom_excerpt_length', 990 );


/**
 * Get first url on content if post format is LINK
 *
 * @since 1.0.0
 */
function codeless_get_permalink( $id ){
    
    $link = get_permalink( $id );
    
    if( get_post_format() == 'link' )
        $link = get_url_in_content( get_the_content() );

    return $link;
    
}


/**
 * Returns fallback for Menu.
 * 
 * @since 1.0.0
 */

if(!function_exists('codeless_default_menu')){
  
    function codeless_default_menu($args){
        
      $current = "";
      if (is_front_page())
        $current = "class='current-menu-item'";
      
      echo "<ul class='menu'>";

        echo "<li $current><a href='".esc_url(home_url())."'>Home</a></li>";
        wp_list_pages('title_li=&sort_column=menu_order&number=2&depth=0');

      echo "</ul>";

    }
}


/**
 * Returns Header Element, used on codeless-customizer-options
 * 
 * @since 1.0.0
 */
if(!function_exists('codeless_load_header_element'))
{

    function codeless_load_header_element($element)
    {
        $output = '';      
        $template = locate_template('includes/codeless_builder/header-elements/'.$element.'.php');
        if(is_file($template)){
          ob_start();
            include( $template );
            $output = ob_get_contents();
            ob_end_clean();
        }
        return $output;
    }
}


/**
 * Basic Pagination Output of theme
 * 
 * @since 1.0.0
 */
function codeless_number_pagination( $query = false, $echo = true ) {
		
	// Get global $query
	if ( ! $query ) {
		global $wp_query;
		$query = $wp_query;
	}

	// Set vars
	$total  = $query->max_num_pages;
	$max    = 999999999;

	// Display pagination
	if ( $total > 1 ) {

		// Get current page
		if ( $current_page = get_query_var( 'paged' ) ) {
			$current_page = $current_page;
		} elseif ( $current_page = get_query_var( 'page' ) ) {
			$current_page = $current_page;
		} else {
			$current_page = 1;
		}

		// Get permalink structure
		if ( get_option( 'permalink_structure' ) ) {
			if ( is_page() ) {
				$format = 'page/%#%/';
			} else {
				$format = '/%#%/';
			}
		} else {
			$format = '&paged=%#%';
		}

		$args = apply_filters( 'codeless_pagination_args', array(
			'base'      => str_replace( $max, '%#%', html_entity_decode( get_pagenum_link( $max ) ) ),
			'format'    => $format,
			'current'   => max( 1, $current_page ),
			'total'     => $total,
			'mid_size'  => 3,
			'type'      => 'list',
			'prev_text' => '<span class="cl-pagination-prev"><i class="cl-icon-arrow-left"></i></span>',
			'next_text' => '<span class="cl-pagination-next"><i class="cl-icon-arrow-right"></i></span>'
		) );

		$align = codeless_get_mod( 'blog_pagination_align', 'center' );

        if( $echo )
            echo '<div class="cl-pagination cl-pagination-align-'. esc_attr( $align ) .'">'. paginate_links( $args ) .'</div>';
        else
            return '<div class="cl-pagination cl-pagination-align-'. esc_attr( $align ) .'">'. paginate_links( $args ) .'</div>';

	}

}


/**
 * Next/Prev Pagination
 *
 * @since 1.0.0
 */
function codeless_nextprev_pagination( $pages = '', $range = 4, $query = false ) {
	$output     = '';
	$showitems  = ($range * 2)+1; 
	global $paged;
	if ( empty( $paged ) ) $paged = 1;
		
	if ( $pages == '' ) {

        if( ! $query ){
		  global $wp_query;
          $query = $wp_query;
        }

		$pages = $query->max_num_pages;
		if ( ! $pages) {
			$pages = 1;
		}
	}

	if ( 1 != $pages ) {

		$output .= '<div class="cl-pagination-jump">';
			$output .= '<div class="newer-posts">';
				$output .= get_previous_posts_link( '&larr; '. esc_html__( 'Newer Posts', 'june' ), $query->max_num_pages );
			$output .= '</div>';
			$output .= '<div class="older-posts">';
				$output .= get_next_posts_link( esc_html__( 'Older Posts', 'june' ) .' &rarr;', $query->max_num_pages );
			$output .= '</div>';
		$output .= '</div>';

		
		return $output;
	}
}

/**
 * Load More Button Pagination Style
 * 
 * @since 1.0.0
 */
function codeless_infinite_scroll( $type = '', $query = false ) {
	$max_num_pages = 0;
    if( $query )
        $max_num_pages = $query->max_num_pages;

	// Output pagination HTML
	$output = '';
	$output .= '<div class="cl-pagination-infinite '. $type .'" data-type="' . esc_attr( $type ) . '" data-end-text="' . esc_html__( 'No more posts to load', 'june' ) . '" data-msg-text="' . esc_html__( 'Loading Content', 'june' ) . '">';
		$output .= '<div class="older-posts">';
			$output .= get_next_posts_link( esc_html__( 'Older Posts', 'june' ) .' &rarr;', $max_num_pages);
		$output .= '</div>';

        $output .= '<div class="cl-infinite-loader hidden"><span class="dot dot1"></span><span class="dot dot2"></span><span class="dot dot3"></span><span class="dot dot4"></span></div>';

		if( $type == 'loadmore' )
		    $output .= '<button id="cl_load_more_btn" class="' . codeless_button_classes(array('cl-btn btn-hover-shadow btn-style-square'), true) . '">' . esc_html__( 'Load More', 'june' ) . '</button>';
	$output .= '</div>';

	return $output;

}


/**
 * Add Action for layout Modern on Content
 * 
 * @since 1.0.0
 */
function codeless_layout_modern(){
    if( (int) codeless_is_layout_modern() ){
        echo '<div class="cl-layout-modern-bg"></div>';
    }
}


/**
 * Get Sidebar Name to load for current page
 * 
 * @since 1.0.0
 */
function codeless_get_sidebar_name(){

    $sidebar = 'sidebar-pages';
    if( codeless_is_blog_query() || ( is_single() && get_post_type( codeless_get_post_id() ) == 'post' ) )
        $sidebar = 'sidebar-blog';

    if( is_search() )
        $sidebar = 'search-dynamic';

    if( codeless_is_shop_page() || ( function_exists('is_product_category') && is_product_category() ) || ( function_exists('is_product') && is_product() ) )
        $sidebar = 'woocommerce';

    if( is_page() && is_registered_sidebar( 'sidebar-custom-page-' . codeless_get_post_id() ) )
        $sidebar = 'sidebar-custom-page-' . codeless_get_post_id();

    if( is_archive() ){
        $obj = get_queried_object();
        if( is_object($obj) && isset($obj->term_id) && is_registered_sidebar( 'sidebar-custom-category-' . $obj->term_id ) ){
            $sidebar = 'sidebar-custom-category-' . $obj->term_id;
        }
    }

    if( function_exists('is_product_category') && is_product_category() ){
        $obj = get_queried_object();

        if( is_object($obj) && isset($obj->term_id) && is_registered_sidebar( 'sidebar-custom-product-category-' . $obj->term_id ) ){
            $sidebar = 'sidebar-custom-product-category-' . $obj->term_id;
        }
    }

    if( is_page() && codeless_get_meta( 'page_custom_sidebar', 'default' ) != 'default' )
        $sidebar = codeless_get_meta( 'page_custom_sidebar', 'default' );

    return $sidebar;
}


/**
 * Convert hexdec color string to rgb(a) string
 * 
 * @since 1.0.0
 */
function codeless_hex2rgba($color, $opacity = false) {
 
	$default = 'rgb(0,0,0)';
 
	//Return default if no color provided
	if(empty($color))
          return $default; 
    
	//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }
 
        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }
 
        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);
 
        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }
 
        //Return rgb(a) color string
        return $output;
}


/**
 * Get Meta by ID
 * 
 * @since 1.0.0
 * @version 1.0.5
 */
function codeless_get_meta( $meta, $default = '', $postID = '' ){
    /* for online */
    global $codeless_online_mods;
    if( isset($codeless_online_mods[$meta])  && ! is_customize_preview() ){
        return $codeless_online_mods[$meta];
    }

    if( function_exists('codeless_get_post_id') )
    $id = codeless_get_post_id();
   
    if( $postID != '' )
        $id =  $postID;

    $value = get_post_meta( $id, $meta );
    
    $return = '';
    $nr = count($value);
    if( is_array( $value ) && ( count( $value ) == 1 || ( count($value) >= 2 && $value[0] == $value[1] )  ) )
        $return = $value[$nr-1];
    else
        $return = $value;

    if( is_array( $value ) && empty( $value ) )
        $return = '';
 

    if( $default != '' && ( $return == '' || ! $return ) )
        return $default;
    
    return $return;
}


function codeless_page_background_color( $attr ){

    if( is_archive() )
        return;
    
    $bg_color = codeless_get_meta( 'page_bg_color', '', get_the_ID() );
    if( $bg_color != '' )
        $attr[] = 'style="background-color:'.$bg_color.';"';

    return $attr;
}


/**
 * Core function that register a new post type
 * Codeless Builder plugin should be activated to work
 * 
 * @since 1.0.0
 */
function codeless_register_post_type( $args = array() ){

    if( ! is_array( $args ) || empty( $args ) || ! class_exists( 'Cl_Register_Post_Type' ) )
        return false;

    new Cl_Register_Post_Type( $args );

}



 /**
  * Core function for retrieve all terms for a custom taxonomy
  *
  * @since 1.0.0
  */
function codeless_get_terms( $term, $default_choice = false, $key_type = 'slug' ){ 
    $return = array();
    if( $term == 'post' ){
        $categories = get_categories( array(
            'orderby' => 'name',
            'parent'  => 0
        ) );
 
        foreach ( $categories as $category ) {
            $return[ $category->term_id ] = $category->name;
        }
    }
    $terms = get_terms( $term );

    if( $default_choice )
        $return['all'] = esc_attr__( 'All', 'june' );

    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
        foreach ( $terms as $term ) {
            $return[ $term->{$key_type} ] = $term->name; 
        }
    }

    return $return;
}


 /**
  * Get all posts, custom posts, pages in one array
  *
  * @since 1.0.0
  */
function codeless_get_all_site_links(){
    $posts_array = get_posts(
        array(
            'posts_per_page' => -1,
            'post_type' => array( 'post', 'page', 'portfolio' ),
        )
    );

    $return = array();

    if( ! empty( $posts_array ) && ! is_wp_error( $posts_array )  ){
        foreach ( $posts_array as $post ) {
            $return[ $post->ID ] = $post->post_title; 
        }
    }

    return $return;
}


/* Get default font-family Headings */

function codeless_get_headings_font_family(){
    $headings = codeless_get_mod( 'headings_typo' );

    return $headings['font-family'];
}


 /**
  * Core function for retrieve all posts for a custom taxonomy
  *
  * @since 1.0.0
  */
function codeless_get_items_by_term( $term ){ 
    $return = array();
    
    $posts_array = get_posts(
        array(
            'posts_per_page' => -1,
            'post_type' => $term,
        )
    );
    if( ! empty( $posts_array ) && ! is_wp_error( $posts_array )  ){
        $return[ 'none' ] = 'None';
        foreach ( $posts_array as $post ) {
            $return[ $post->ID ] = $post->post_title; 
        }
    }

    return $return; 
}


 /**
  * Core function for retrieve get option value from element
  *
  * @since 1.0.0
  */
function codeless_get_from_element( $id, $default = '' ){
    global $cl_from_element;
    if( isset($cl_from_element[$id]) )
        return $cl_from_element[$id];
    else
        return $default;
}


/**
 * List of socials to use on Team
 * @since 1.0.0
 */
function codeless_get_team_social_list(){
    $list = array(
        array( 'id' => 'twitter', 'icon' => 'cl-icon-twitter' ),
        array( 'id' => 'facebook', 'icon' => 'cl-icon-facebook' ),
        array( 'id' => 'linkedin', 'icon' => 'cl-icon-linkedin' ),
        array( 'id' => 'whatsapp', 'icon' => 'cl-icon-whatsapp' ),
        array( 'id' => 'pinterest', 'icon' => 'cl-icon-pinterest' ),
        array( 'id' => 'google', 'icon' => 'cl-icon-google' ),
    );

    return apply_filters( 'codeless_team_social_list', $list );
}


/**
 * Strip Gallery Shortcode from Content
 * @since 1.0.0
 */
function codeless_strip_shortcode_gallery( $content ) {
    preg_match_all( '/' . get_shortcode_regex() . '/s', $content, $matches, PREG_SET_ORDER );

    if ( ! empty( $matches ) ) {
        foreach ( $matches as $shortcode ) {
            if ( 'gallery' === $shortcode[2] ) {
                $pos = strpos( $content, $shortcode[0] );
                if( false !== $pos ) {
                    return substr_replace( $content, '', $pos, strlen( $shortcode[0] ) );
                }
            }
        }
    }

    return $content;
}


/**
 * Print list of Social for Team ID
 * @since 1.0.0
 */
function codeless_team_socials( ){
    $list = codeless_get_team_social_list();
    $output = '';
    if( empty($list) )
        return;
 
    foreach($list as $social){
        $link = codeless_get_meta( $social['id'] . '_link', '', get_the_ID());

        if( $link != '' ){
            $output .= '<a href="'.esc_url( $link ).'"><i class="'.esc_attr( $social['icon'] ).'"></i></a>';
        }
    }

    
    return $output;
}


/**
 * Return HTMl of all tags with appropiate link
 * @since 1.0.0
 */
function codeless_all_tags_html(){
    $tags = get_tags();
    $html = '<div class="post_tags">';
    foreach ( $tags as $tag ) {
        $tag_link = get_tag_link( $tag->term_id );
                
        $html .= " <a href='". esc_url($tag_link). "' title='". esc_attr( $tag->name )." Tag' class='".esc_attr( $tag->slug )."'>";
        $html .= "#". esc_attr( $tag->name )."</a>";
    }
    $html .= '</div>';
    return $html;
}


/**
 * Generate an image HTML tag from thumnail ID, size, lazyload
 * If no thumbnail id, a placeholder will return
 * @since 1.0.0
 */
function codeless_generate_image( $id, $size, $lazyload = false ){
    $attr = array();

    if( $lazyload ){
        $attr['class'] = 'lazyload';
        $attr['data-original'] = codeless_get_attachment_image_src( $id, $size );
    }



    if( $id != 0 )
        return wp_get_attachment_image($id, $size, false, $attr );
}


/**
 * Replace post thumbnail empty html with a placeholder image
 *
 * @since 1.0.0
 */
function codeless_the_post_thumbnail_placeholder($html, $post_id, $post_thumbnail_id){
    if( $html == '' && ! $post_thumbnail_id )
        $html  = '<img class="placeholder-img" src="' . CODELESS_BASE_URL.'img/placeholder-img.png' . '" alt="" />';

    return $html;
}
add_filter( 'post_thumbnail_html', 'codeless_the_post_thumbnail_placeholder', 9, 3 );



/**
 * Return a list of all image sizes
 *
 * @since 1.0.0
 */
function codeless_get_additional_image_sizes(){
    $add = codeless_wp_get_additional_image_sizes();
    $array = array('theme_default' => 'default', 'full' => 'full');

    foreach($add as $size => $val){
        $array[$size] = $size . ' - ' . $val['width'] . 'x' . $val['height'];
    }

    return $array;
}


/**
 * Check function for WP versions lower than WP 4.7
 *
 * @since 1.0.0
 */
function codeless_wp_get_additional_image_sizes(){
    if( function_exists( 'wp_get_additional_image_sizes' ) )
        return wp_get_additional_image_sizes();
    
    return array();
}


/**
 * Check if is a shop page
 * @since 1.0.0
 */
function codeless_is_shop_page(){
    if( class_exists( 'woocommerce' ) && is_shop() )
        return true;
    return false;
}


/**
 * return Page Parents
 * @since 1.0.0
 */
function codeless_page_parents() {
    global $post, $wp_query, $wpdb;
    
    if( (int) codeless_get_post_id() != 0 ){
      
        $post = $wp_query->post;

        if( is_object( $post ) ){

            $parent_array = array();
            $current_page = $post->ID;
            $parent = 1;

            while( $parent ) {

                $sql = $wpdb->prepare("SELECT ID, post_parent FROM $wpdb->posts WHERE ID = %d; ", array($current_page) );
                $page_query = $wpdb->get_row($sql);
                $parent = $current_page = $page_query->post_parent;
                if( $parent )
                    $parent_array[] = $page_query->post_parent;
                
            }

            return $parent_array;

        }
      
    }
    
}

/**
 * List Revolution Slides
 * @since 1.0.0
 */
function codeless_get_rev_slides(){

    if ( class_exists( 'RevSlider' ) ) {
        $slider = new RevSlider();
            $arrSliders = $slider->getArrSliders();

            $revsliders = array();
            if ( $arrSliders ) {
                $revsliders[ 0 ] = 'none';
                foreach ( $arrSliders as $slider ) {
                    /** @var $slider RevSlider */
                    $revsliders[ $slider->getAlias() ] = $slider->getTitle() ;
                }
            } else {
                $revsliders[ 0 ] = 'none';
            }
        return (array) $revsliders;    
    }        
}


/**
 * List LayerSlider Slides
 * @since 1.0.0
 */
function codeless_get_layer_slides(){

    if( class_exists( 'LS_Sliders' )){
            $ls = LS_Sliders::find( array(
                'limit' => 999,
                'order' => 'ASC',
            ) );
            $layer_sliders = array();
            if ( ! empty( $ls ) ) {
                foreach ( $ls as $slider ) {
                    $layer_sliders[  $slider['id'] ] =  $slider['name'];
                }
            } else {
                $layer_sliders[ 0 ] = 'none';
            }
         return (array) $layer_sliders;   
    }

}

/**
 * Visualizer Charts
 * @since 1.0.0
 */
function codeless_get_visualizer_charts(){

    if( ! function_exists( 'visualizer_launch' ) )
        return;
    
    $query_args = array(
        'post_type'      => Visualizer_Plugin::CPT_VISUALIZER,
        'posts_per_page' => 50,
        'paged'          => 1,
    );

    $data = array(
        'none' => 'None'
    );

    $query  = new WP_Query( $query_args );
    while ( $query->have_posts() ) {
        $chart = $query->next_post();
        $data[$chart->ID] = $chart->ID;
    }

    return $data;
}


/**
 * TablePress
 * @since 1.0.0
 */
function codeless_get_tablepress(){

    if( ! class_exists('TablePress') )
        return;

    $m = TablePress::load_model( 'table' );
    $table_ids = $m->load_all( true, false  );

    $tables = array();
    foreach ( $table_ids as $table_id ) {
        // Load table, without table data, options, and visibility settings.
        $table = $m->load( $table_id );
        $tables[ $table['id'] ] = $table['name'];
    }

    return $tables;
}


/**
 * List Google Fonts
 * @since 1.0.0
 */
function codeless_get_google_fonts(){
    $return = array('theme_default' => 'Theme Default', 'Helvetica Black' => 'Helvetica Black');

    $google_fonts   = Kirki_Fonts::get_google_fonts();
    $standard_fonts = Kirki_Fonts::get_standard_fonts();

    $google_fonts = array_combine(array_keys($google_fonts), array_keys($google_fonts));
    $standard_fonts = array_combine(array_keys($standard_fonts), array_keys($standard_fonts));
    $return = array_merge($return, $google_fonts, $standard_fonts);

    return $return;
}  


/**
 * Add bordered style layout
 * @since 1.0.0
 */
function codeless_layout_bordered(){
    if( ! codeless_get_mod( 'layout_bordered', false ) )
        return;
    ?>
    <div class="cl-layout-border-container">
        <div class="top"></div>
        <div class="bottom"></div>
        <div class="left"></div>
        <div class="right"></div>
    </div><!-- .cl-layout-border-container -->
    <?php
}  


/**
 * in Future to update
 * @since 1.0.0
 */
function codeless_complex_esc( $data ){
    return $data;
}


/**
 * Generate Palettes for Colorpicker
 * @since 1.0.0
 */
function codeless_generate_palettes(){
    return array(
        codeless_get_mod( 'primary_color' ),
        codeless_get_mod( 'secondary_color' ),
        codeless_get_mod( 'border_accent_color' ),
        codeless_get_mod( 'labels_accent_color' ),
        codeless_get_mod( 'highlight_light_color' ),
        codeless_get_mod( 'other_area_links' ),
        codeless_get_mod( 'h1_dark_color' ),
        codeless_get_mod( 'h1_light_color' )
    );
}


/**
 * Load extra template parts for codeless-builder
 * @since 1.0.0
 */
function codeless_get_extra_template($template){
    include( get_template_directory() . '/template-parts/extra/' . $template . '.php' );
}


/**
 * Get a list of all registered sidebars
 * @since 1.0.0
 */
function codeless_get_registered_sidebars($add_default = false){
    global $wp_registered_sidebars;
    $array = get_option( 'sidebars_widgets' );
    if( empty($array) )
        return array();

    $sidebars = array();

    if( $add_default )
        $sidebars['default'] = 'Default';

    foreach($array as $key => $val){
        if( $key == 'wp_inactive_widgets' )
            continue;
        if( isset( $wp_registered_sidebars[$key] ) ){

            $sidebars[$key] = $wp_registered_sidebars[$key]['name'];
        }
    }

    return $sidebars;
}


/**
 * Get a list of all custom sidebars per page
 * @since 1.0.0
 */
function codeless_get_custom_sidebar_pages(){
    $pages = codeless_get_mod( 'codeless_custom_sidebars_pages' );
    $return = array();

    if( ! empty( $pages ) ){

            foreach($pages as $page)
                $return[(int)$page] = get_the_title( (int)$page );
        
        return $return;
    }

    return array();

}


/**
 * Get a list of all custom sidebars per categories
 * @since 1.0.0
 */
function codeless_get_custom_sidebar_categories(){
    $categories = codeless_get_mod( 'codeless_custom_sidebars_categories' );
    $return = array();

    if( ! empty( $categories ) ){

            foreach($categories as $category){

                $category_name = get_the_category_by_ID( (int)$category );
                $return[(int)$category] = $category_name;
            }
        
        return $return;
    }

    return array();

}

/**
 * Get a list of all custom sidebars per categories
 * @since 1.0.0
 */
function codeless_get_custom_sidebar_product_categories(){
    $categories = codeless_get_mod( 'codeless_custom_sidebars_product_categories' );

    $return = array();
    
    if( $categories ){

            foreach($categories as $category){
                $category_name = get_term( (int)$category, 'product' );
               
                $return[(int)$category] = (! is_wp_error( $category_name ) ? $category_name->name : (int)$category);
            }
        
        return $return;
    }

    return array();

}

/**
 * Top Ancestor
 * @since 1.0.0
 */
if(!function_exists('codeless_get_post_top_ancestor_id')){

    function codeless_get_post_top_ancestor_id(){
        global $post;
        
        if($post->post_parent){
            $ancestors = array_reverse(get_post_ancestors($post->ID));
            return $ancestors[0];
        }
        
        return $post->ID;
    }
}


/**
 * List of registered nav menus
 * @since 1.0.0
 */
function codeless_get_all_wordpress_menus(){
    $terms = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
    $menus = array(
        'default' => 'Default (Main Theme Location)'
    );

    if( count( $terms ) == 0 )
        return $menus;

    foreach($terms as $term){
        $menus[$term->term_id] = $term->name;
    } 

    return $menus;
}


/**
 * Generate Tool Share Output
 * 
 * @since 1.0.0
 */
function codeless_get_entry_tool_share(){
    
    $output = '<div class="share-buttons">';
    
    $shares = codeless_share_buttons();
    
    if( !empty( $shares ) ){
        foreach( $shares as $social_id => $data ){
            $output .= '<a data-postid="'.get_the_ID().'" class="share" href="javascript:window.open(\'' . $data['link'] . '\', \'Share Window\', \'width=400,height=500\')" title="Social Share ' . $social_id . '" target="_blank"><i class="' . $data['icon'] .'"></i></a>';
        }
    }
    $output .= '</div>';
    
    return $output;
}


/**
 * Get header menu color (light/dark)
 * @since 1.0.0
 */
function codeless_get_header_color(){
    $header_color = codeless_get_mod( 'header_color', 'dark' );

    $page_specific = codeless_get_meta( 'header_color', 'default' );

    if( $page_specific != 'default' && ! empty( $page_specific ) ){
        $header_color = $page_specific;
    }

    return $header_color;
}


/**
 * Check if page header is transparent or normal colored (white default)
 * @since 1.0.0
 */
function codeless_is_transparent_header(){
    $header_transparent = (int) codeless_get_mod( 'transparent_header', false );

    $page_specific = codeless_get_meta( 'transparent_header', 'default' );

    if( $page_specific != 'default' && ! empty( $page_specific ) ){

        if( $page_specific == 'transparent' )
            $header_transparent = true;
        else
            $header_transparent = false;
    }

    return $header_transparent;
}


/**
 * Get list of pages
 * @since 1.0.0
 */
function codeless_get_pages(){
    $pages = get_pages();
    $return = array('none' => 'None');

    foreach( $pages as $page ){
        $return[$page->ID] = $page->post_title;
    }

    return $return;
} 


add_filter( 'rwmb_meta_boxes', 'codeless_register_meta_boxes_inpage' );
function codeless_register_meta_boxes_inpage( $meta_boxes ) {
    if( ! class_exists('Cl_Post_Meta') )
        return array();
    // all meta
    $meta = codeless_transform_meta_inpage( Cl_Post_Meta::$meta );

    $meta_boxes[] = array(
        'id'         => 'general',
        'title'      => esc_html__( 'General', 'june' ),
        'post_types' => array('page', 'post', 'portfolio', 'product' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => $meta['general']
    );

    $meta_boxes[] = array(
        'id'         => 'post_data',
        'title'      => esc_html__( 'Post Data', 'june' ),
        'post_types' => array( 'post' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => $meta['post_data']
    );

    $meta_boxes[] = array(
        'id'         => 'portfolio_data',
        'title'      => esc_html__( 'Portfolio Data', 'june' ),
        'post_types' => array( 'portfolio' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => $meta['portfolio_data']
    );

    $meta_boxes[] = array(
        'id'         => 'staff_data',
        'title'      => esc_html__( 'Staff Data', 'june' ),
        'post_types' => array( 'staff' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => $meta['staff_data']
    );

    $meta_boxes[] = array(
        'id'         => 'staff_social',
        'title'      => esc_html__( 'Staff Social', 'june' ),
        'post_types' => array( 'staff' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => $meta['staff_social']
    );

    $meta_boxes[] = array(
        'id'         => 'product_data',
        'title'      => esc_html__( 'Product Data', 'june' ),
        'post_types' => array( 'product' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => $meta['product_data']
    );

    $meta_boxes[] = array(
        'id'         => 'multiscroll_section',
        'title'      => esc_html__( 'General', 'june' ),
        'post_types' => array( 'multiscroll' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => $meta['multiscroll_section']
    );

    return $meta_boxes;
}


function codeless_transform_meta_inpage($post_metas){

    $organized_metas = array();

    foreach( $post_metas as $meta ){
        $new_meta = array();
        foreach($meta as $key => $value){
            
            if( $key == 'label' )
                $new_meta['name'] = $value;

            if( $key == 'choices' )
                $new_meta['options'] = $value;

            

            if( $key == 'meta_key' )
                $new_meta['id '] = $value;

            if( $key == 'default' )
                $new_meta['std'] = $value;

            if( $key == 'tooltip' )
                $new_meta['desc'] = $value;

            if( $key == 'multiple' )
                $new_meta['multiple'] = true;

        }

        $new_meta['id'] = $meta['meta_key'];

        if( $meta['control_type'] == 'kirki-switch' ){
            $new_meta['options'] = array(
                0 => 'Off',
                1 => 'On'
            );
        }
        
        if( $meta['control_type'] == 'kirki-select' || $meta['control_type']== 'kirki-switch'  )
            $new_meta['type'] = 'select';
        else if( $meta['control_type'] == 'kirki-color'  )
            $new_meta['type'] = 'color';
        else if( $meta['control_type'] == 'textarea' )
            $new_meta['type'] = 'wysiwyg';
        else if( $meta['control_type'] == 'select_advanced' ){
            $new_meta['type'] = 'select_advanced';
        }
        else{
            $new_meta['type'] = $meta['control_type'];
        }


        if( isset( $meta['group_in'] ) )
            $organized_metas[ $meta['group_in'] ][ $new_meta['id'] ] = $new_meta;
    }

    return $organized_metas;
}


function codeless_placeholder_img(){
    echo '<img src="' . get_template_directory_uri() . '/img/placeholder-img.png" alt="" />';
}


function codeless_back_to_top_button(){
    if( codeless_get_mod( 'back_to_top', false ) )
        echo '<a href="#" class="scrollToTop"><i class="cl-icon-chevron-up"></i></a>';
}


function codeless_image_link_attr( $form_fields, $post ) {
    $form_fields['cl-image-url'] = array(
        'label' => 'Link',
        'input' => 'text',
        'value' => get_post_meta( $post->ID, 'cl_image_url', true ),
        'helps' => 'Add link to this image',
    );
 
    return $form_fields;
}
 
add_filter( 'attachment_fields_to_edit', 'codeless_image_link_attr', 10, 2 );
 

function codeless_image_link_attr_save( $post, $attachment ) {
    if( isset( $attachment['cl-image-url'] ) )
        update_post_meta( $post['ID'], 'cl_image_url', $attachment['cl-image-url'] );
 
    return $post;
}
 
add_filter( 'attachment_fields_to_save', 'codeless_image_link_attr_save', 10, 2 );



/**
 * Returns the list of css html tags for each option
 * 
 * @since 1.0.0
 * @version 1.0.7
 */
function codeless_dynamic_css_register_tags( $option = false, $suboption = false ){
    $data = array();
    $tag_list = '';
    
    // Primary Color
    $data['primary_color'] = array();
    // Font Color
    $data['primary_color']['color'] = array(
        '.header_container:not(.cl-header-light) .header-row:not(.extra_row) nav > ul > li a:hover',
        '#testimonial-entries .testimonial_item .title',
        'footer#colophon .widget ul.social-icons-widget li a',
        'aside .widget_categories ul li:hover',
        //'body:not(.cl-one-page) .header_container:not(.cl-header-light) nav > ul > li.current-menu-item > a',
        'body.cl-one-page .header_container:not(.cl-header-light) nav > ul > li.current-menu-item-onepage > a',

        'aside .widget ul li a:hover',
        'aside .widget_rss cite',
        'h1 > a:hover, h2 > a:hover, h3 > a:hover, h4 > a:hover, h5 > a:hover, h6 > a:hover',
        '.cl-pagination a:hover',
        'mark.highlight',
        '.cl_team.style-simple .team-item .team-position',
        '.cl_team.style-photo .team-item .team-position',
        '.cl_toggles.style-simple .cl_toggle .title[aria-expanded="true"]',
        '.cl_counter',
        '.single-post .nav-links > div a .nav-title:hover',
        '.shop-products .product_item .cl-price-button-switch a',
        '.woocommerce div.product p.price, .woocommerce div.product span.price',
        '.single-post article .entry-content > a',
        '.header-el .widgetized form i',
        '.cl_toggles.style-square_plus .cl_toggle .title > a:before',
        '.cl_tabs.style-simple .cl-nav-tabs li.active a',
        'aside .widget_nav_menu ul li:hover > a',
        '.cl_list.style-circle li > i',
        '.cl_pricelist .price .integer-part, .cl_pricelist .price .decimal-part',
        '.cl_pricelist .header.panel',
        '.cl-filters.cl-filter-fullwidth.cl-filter-color-dark button.selected',
        '.calculated_result, .wpcf7-calculated',
        '.cl-header-side .header_container .extra_tools_wrapper .tool:hover i',
        '.cl-header-side .header_container.header-left nav > ul > li > a:hover:after',
        '.entry-meta-tools .entry-meta-single a',
        'article .entry-tools i',
        '.cl-price-rating .price, body[class*=" currency-"] .cl-price-rating .price',
        '.shop-products .product_item .cl-actions a:hover i',
        '.shop-products .product_item .cl-actions .add_to_cart_button:hover:after, .shop-products .product_item .cl-actions .add_to_cart_button:hover:after, .shop-products .product_item .cl-actions .add_to_wishlist:hover:after',
        '.single-product .cl-info.gift .tooltip a',
        '.single-product .cl-wishlist-share-wrapper .wishlist i, .add_to_wishlist_button i',
        '.cl-default-page-header .page_parents li.active a',
        'table.shop_table .cart_item .product-data .in-stock i',
        'table.cart td.actions .coupon label i',
        '.cart-collaterals .shipping-calculator-button, .cart-collaterals #shipping_method li input[type=radio]:checked ~ .check:before',
        '.cl-info-checkout a, .cl-info-checkout i',
        '.payment_method_paypal a',
        '.cl_woocommerce a.show-all',
        '.cl-contact-info i',
        '.product_item.style_large .add_to_cart_button:before, .product_item.style_large .cl-action.add_to_wishlist i',
        '.cl-product-collection-feature .data a:hover',
        '.cl_team.style-photo .team-item .team-position',
        '#portfolio-entries.portfolio-style-presentation .portfolio_item .entry-wrapper-content .entry-content a.preview',
        '.cl-closed-section .close_section_button .icon',
        '.cl-sidenav ul li.current_page_item a',
        '.single-product-style-center .summary .inline-wishlist',
        '.summary .group_table tr td.label .price *',
        '.single-product-style-wide_full_image .summary .inline-wishlist',
        '.product_item.style_large .cl-price-rating .price ins span, .product_item.style_large .cl-price-rating .price > span, .product_item.style_large .cl-price-rating .woocs_price_code > span',
        '.woocommerce-loop-category__title mark',
        '.content-col a:hover'


    );
    // Background Color
    $data['primary_color']['background_color'] = array(
        '.header_container.menu_style-border_effect #navigation nav > ul > li > a:hover:after', 
        '.header_container.menu_style-border_effect #navigation nav > ul > li.current-menu-item > a:after', 
        'article.format-gallery .swiper-pagination-bullet-active',
        '.cl-pagination-jump > div a:hover',
        '.shop-products .product_item .onsale, .cl-product-info .onsale',
        '.widget_product_categories ul li.current-cat > a:before',
        '.cl-header-light .tool .tool-link .cart-total',
        '.search__inner--down',
        '.cl_blog .news-entries article:hover .post-categories li',
        '.header_container.menu_style-border_effect_two #navigation nav > ul > li > a:hover:after, .header_container.menu_style-border_effect_two #navigation nav > ul > li.current-menu-item > a:after',
        '.cl_tabs.style-large .cl-nav-tabs li a',
        'aside .widget_nav_menu ul li.current-menu-item',
        '.w3eden .label-default',
        '.tablepress .sorting:hover, .tablepress .sorting_asc, .tablepress .sorting_desc',
        '.cl_column.with_shadow > .cl_col_wrapper > .col-content .cl_pricelist .header',
        '.cl-filters.cl-filter-fullwidth.cl-filter-color-dark',
        '.cl-filters.cl-filter-small.cl-filter-color-light .selected',
        '.shop-products .product_item .cl-learnmore',
        '.light-text .cl-filters.cl-filter-small .selected',
        '.tool .tool-link .cart-total',
        '.cl-header-side .header_container .extra_tools_wrapper .tool:hover a span.cart-total',
        'article .entry-media-wrapper .entry-tag-list a:hover',
        '.cl-pagination span.current',
        'aside .widget-title:after',
        'aside .widget_calendar td#today a',
        '.blog-entries .fullimage_transparent-style h2:after',
        '.cl_blog .blog-filters .title h2:after',
        '#respond.comment-respond .form-submit input[type="submit"]',
        '.cl-default-page-header h2:after',
        '.cl_mailchimp.style_large_button input[type="submit"]',
        '.wpcf7-submit.cl-btn',
        'aside .widget_custom_html .boxed-style .mc4wp-form-fields input[type="submit"]',
        '.all-centered article h2:after',
        '.cl_blog .news-entries h2:after',
        '.cl-filters.cl-filter-small .selected:after',
        '.single-product-style-center div.product form.cart .button',
        '.single-product-style-wide_full_image div.product form.cart .button, .single-product-style-wide_full_image .summary .single_add_to_cart_button'
    );


    $data['primary_color']['border-color'] = array(
        '.tablepress thead',
        '.wpcf7-radio_custom [type="radio"]:checked:before',
        '.cl-info-checkout a',
        '.payment_method_paypal a',
        '.cl_woocommerce a.show-all',
        '.single-product-style-center .summary .inline-wishlist',
        '.single-product-style-wide_full_image .summary .inline-wishlist'
       
    );


    $data['secondary_color']['background_color'] = array(
        '.cl_toggles.style-square_plus .cl_toggle .title > a:before',
        '.cl_pricelist .header.panel',
        '.cl-filters.cl-filter-fullwidth.cl-filter-color-dark button.selected',
        '.wpcf7-radio_custom [type="radio"]::before'
    );

    $data['secondary_color']['color'] = array(
        '.light-text #testimonial-entries .testimonial_item .title'
    );

    $data['secondary_color']['border-color'] = array(
        'aside .widget_nav_menu ul li.current-menu-item',
    );
    
    
    // Border Accent Color
    $data['border_accent_color']['border-color'] = array(
        'article.sticky',
        'aside .widget_categories select',
        'aside .widget_archive select',
        'aside .widget_search input[type="search"]',
        'input:focus,textarea:focus,select:focus, button:focus:not(.selected)',
        '.grid-entries article .grid-holder .grid-holder-inner',
        '.masonry-entries article .grid-holder .grid-holder-inner',
        '.portfolio-style-classic .portfolio_item .entry-wrapper-content',
        '.portfolio-style-classic_excerpt .portfolio_item .entry-wrapper-content',
        '.cl_contact_form7.style-simple input:not(.cl-btn), .cl_contact_form7.style-simple  textarea , .cl_contact_form7.style-simple  select',
        '.cl_toggles.style-simple .cl_toggle > .title',
        '.single-post .entry-single-tags a',
        '.single-post .post-navigation',
        'article.comment',
        '#respond.comment-respond textarea',
        '#respond.comment-respond .comment-form-author input, #respond.comment-respond .comment-form-email input, #respond.comment-respond .comment-form-url input',
        'aside .widget_product_search input,[type="search"]',
        '.cl-product-info .product_meta',
        '.post-password-form input[type="password"]',
        '.tablepress tbody td, .tablepress tfoot th',
        '.search-element input[type="search"]',
        '.search-element .select2-container:not(.select2-container--open), .sort-options .select2-container:not(.select2-container--open), .variations_select:not(.select2-container--open)',
        '.select2-dropdown',
        'article .entry-tools .entry-tool-share .share-buttons',
        'aside .widget_calendar thead th',
        '.single_blog_style-classic.cl-layout-fullwidth article.single-article .entry-meta-tools .entry-tools',
        '.single_blog_style-classic.cl-layout-fullwidth',
        '.single-product .summary h1',
        '.single-product .summary .cl-info.instock',
        '.tawcvs-swatches .swatch-label',
        '.woocommerce-product-details__short-description', 
        '.woocommerce .quantity .qty, .woocommerce .quantity:before, .woocommerce .quantity:after',
        '.single-product .cl-wishlist-share-wrapper .share',
        '.woocommerce div.product .woocommerce-tabs ul.tabs',
        '.single-product .cl-complete-look h6',
        '.cl-review-info .average',
        '.cl-review-info .leave-review',
        '.woocommerce #reviews #comments ol.commentlist li .comment-text .description',
        '.single-product .related.products .owl-nav > div',
        '.woocommerce table.shop_attributes th, .woocommerce table.shop_attributes td, .woocommerce table.shop_attributes th, .woocommerce table.shop_attributes',
        '.woocommerce table.shop_table thead th, .woocommerce table.shop_table td',
        'table.shop_table .cart_item .product-data .meta',
        'table.cart td.actions .coupon #coupon_code',
        '.cart-collaterals',
        '.cart-collaterals .order-total td,.cart-collaterals .order-total th',
        '.shipping-calculator-form .select2-container, .woocommerce form .form-row input.input-text, .woocommerce form .form-row textarea, .shipping-calculator-form button[type="submit"], .woocommerce .form-row .select2-container',
        '.woocommerce-checkout-review-order-table tfoot th',
        '.woocommerce-order .cl-thankyou-data .woocommerce-order-details table tfoot tr:last-child th, .woocommerce-order .cl-thankyou-data .woocommerce-order-details table tfoot tr:last-child td',
        '#customer_login.u-columns .login_div .or',
        '.woocommerce-MyAccount-navigation ul',
        '.woocommerce input',
        '#site-header-cart ul li',
        '#site-header-cart',
        '#site-login-box',
        'footer .cl-btn',
        '#top_footer.add-topfooter-border-top',
        '.cl_table_row',
        '.single_blog_style-classic, .single_blog_style-classic article.single-article .entry-meta-tools .entry-tools',
        '.advanced-list-entries .product_item .inner-wrapper .advanced-list, .advanced-list-entries .product_item .inner-wrapper, .list-entries .product_item .inner-wrapper',
        '.blog-entries article .entry-readmore',
        '.all-centered article .entry-meta',
        '.portfolio-navigation.simple',
        '.single-product .cl-style-wide .cl-product-info .summary',
        '#content > .fixed-up-sells .up-sells h5',
        '.single-product .cl-style-long_gallery .summary',
        '.single-product .cl-style-long_gallery .cl-tabs-wrapper',
        '.single-product .cl-style-boxed table.variations, .single-product .cl-style-boxed .summary .variations tr'


    );

    $data['border_accent_color']['background-color'] = array(
        '.header_container.cl-header-dark .extra_tools_wrapper .tool:after',
        '#copyright .add-copyright-inner-border-top:before',
        '.parallel-divider.wrapper-heading .divider'
    );
    
    // Labels accent color
    $data['labels_accent_color'] = array(
        '.entry-meta-single .entry-meta-prepend',
        'article.format-quote .entry-content i',
        'article.format-quote .entry-content .quote-entry-author',
        'aside .widget_categories ul li',
        'aside .widget_archive ul li',
        'aside .widget_recent_entries .post-date',
        //'aside .widget_recent_comments .recentcomments',
        'aside .widget_rss .rss-date',
        '.cl_contact_form7.style-simple label',
        '#respond.comment-respond .comment-form-author input, #respond.comment-respond .comment-form-email input, #respond.comment-respond .comment-form-url input, #respond.comment-respond .comment-form-comment textarea',
        '#respond.comment-respond p > label',
        'article.comment .comment-reply-link, article.comment .comment-edit-link',
        '.woocommerce-result-count',
        '.widget_product_categories ul li .count',
        '.woocommerce div.product .woocommerce-tabs ul.tabs li a',
        '.widget_twitter li .content .date',
        '.search-element input[type="search"]',
        '.mc4wp-form p input[type="email"]',
        '.cl-header-side .header_container:not(.cl-responsive-header) .extra_tools_wrapper .tool a i',
        '.cl-header-side .header_container.header-left nav > ul > li > a:after',
        '.entry-meta-single:after',
        '.shop-products .product_item .tags',
        '.woocommerce ul.products li.product .price del .amount',
        '.single-product .summary.entry-summary .price del',
        '.single-product .cl-style-default .cl-info',
        'select',
        'aside .widget.woocommerce .widget-title',
        '.cl-shop-filter button',
        '.portfolio-navigation.simple a.main_portfolio'

    );
    
    
    // Highligh color light
    $data['highlight_light_color']['background-color'] = array(
        '.cl-pagination-jump > div > a',
        '.cl_progress_bar .progress',
        '.single-post .entry-single-tools .single-share-buttons a',
        '.btn-priority_secondary',
        '.cl-filters.cl-filter-fullwidth.cl-filter-color-light',
        'aside .widget_nav_menu ul li',
        '.cl_team.style-simple .team-item .team-content',
        '.quick-searches .tags a,  .widget .tagcloud a',
        '.single_blog_style-classic.cl-layout-fullwidth article.single-article .entry-tag-list a',
        '.select2-container--default .select2-results__option--highlighted[aria-selected], .variations_select .select2-results__option--highlighted[aria-selected]',
        '.select2-container--default .select2-results__option[aria-selected=true], .variations_select .select2-results__option[aria-selected=true]',
        '.grid-options a.active',
        '.cl-product-info .product_meta .tagged_as a',
        '.single_blog_style-classic article.single-article .entry-tag-list a',
        '.blog-entries.grid-minimal-style article .entry-tag-list a:not(:hover), .single-modern-header .entry-tag-list a'


    );
    
    // Highlight color dark
    $data['highlight_dark_color']['background-color'] = array(
        '#cl_load_more_btn',
        '.cl-pagination-jump > div > a:hover',
        '.cl-mobile-menu-button span, .cl-hamburger-menu span',
        '.single-post .entry-single-tags a:hover',
        '.single-post .entry-single-tools .single-share-buttons a:hover',
        '.woocommerce:not(.single-product-style-center):not(.single-product-style-wide_full_image) div.product form.cart .button',
        '.return-to-shop a'
        
        
        
    );

    $data['highlight_dark_color']['color'] = array(
        '.btn-priority_secondary',
        '.extra_tools_wrapper .tool.shop .cart-details .cart-total-sum',
        '.extra_tools_wrapper .tool.wishlist span',
        '.search-element .search-input i',
        '.search-element .select2-container, .sort-options .select2-container, .variations_select',
        '.search-element .select2-container .select2-selection--single, .sort-options .select2-container .select2-selection--single, .select2-container--default .select2-selection--single .select2-selection__rendered, .variations_select .select2-selection--single',
        '.quick-searches .tags a:hover,  .widget .tagcloud a:hover',
        '.cl-product-info .product_meta .tagged_as a:hover',
        '.single_blog_style-classic.cl-layout-fullwidth article.single-article .entry-tag-list a:hover',
        '.select2-results__option',
        '.select2-container--default .select2-results__option[aria-selected=true]',
        '.header_container.cl-header-light .extra_tools_wrapper.style-small .tool:hover i',
        '.extra_tools_wrapper .show-side-header',
        '.blog-entries .default-style .entry-tool-single span',
        'article:not(.single-modern-header) .entry-tools .entry-tool-share .share-buttons i',
        'article .entry-media-wrapper .entry-tag-list a',
        '.cl-pagination a',
        'aside .widget_archive ul li a',
        '.cl-carousel .owl-nav .owl-prev:after, .cl-carousel .owl-nav .owl-next:after',
        'article.format-gallery .cl-post-swiper-slider .swiper-button-prev:after, article.format-gallery .cl-post-swiper-slider .swiper-button-next:after',
        '.grid-options label',
        '.grid-options a.active',
        '.single_blog_style-classic article.single-article blockquote',
        '.single-post .single-author .author_wrapper .author_content .author_links a',
        '.single-blog-extra-heading',
        '.single-product .summary.entry-summary .price ins .amount',
        '.single-product .product:not(.cl-style-fixed_recommanded) .summary form.cart .variations label, .product:not(.cl-style-fixed_recommanded) .qty_container label',
        '.woocommerce .quantity .qty',
        '.single-product .cl-wishlist-share-wrapper',
        '.woocommerce div.product .woocommerce-tabs ul.tabs li a',
        '.cl-review-info .average span.star',
        '.woocommerce #reviews #comments .cl-user-info .woocommerce-review__author',
        'table.shop_table .cart_item .product-data > a',
        'table.shop_table .cart_item .product-data .meta dd',
        'table.shop_table .cart_item .product-data > .wishlist',
        'table.shop_table .product-price ins .amount',
        'table.shop_table .woocs_special_price_code,table.shop_table .cart-subtotal td, table.shop_table .product-subtotal, .entry-summary .woocs_price_code > .woocommerce-Price-amount, .entry-summary .price > .woocommerce-Price-amount',
        '.woocommerce-checkout-review-order-table td.product-total span, .woocommerce-checkout-review-order-table tfoot td span',
        'table.cart td.actions .coupon input[type="submit"]',
        '.cart-collaterals #shipping_method li input[type=radio]:checked ~ label',
        '.shipping-calculator-form button[type="submit"]',
        '.cl-info-checkout',
        '.woocommerce-checkout .form-row label',
        '.woocommerce .order_details li strong',
        '.woocommerce-order .cl-thankyou-data .woocommerce-order-details table th',
        '.woocommerce-order .cl-thankyou-data .woocommerce-order-details table td.woocommerce-table__product-total',
        '.woocommerce-order .cl-thankyou-data .woocommerce-order-details table tfoot td',
        '.woocommerce .track_order .form-row label',
        '#customer_login.u-columns .col-2 form label',
        '.woocommerce-MyAccount-navigation ul li a',
        '.woocommerce-MyAccount-content label',
        'aside .widget.woocommerce .product-categories li',
        'aside .widget.woocommerce .product-categories li a:after',
        '.cl-closed-section .close_section_button .anchor',
        '.open-filters',
        'aside.style-sidebar-blog .widget-title, aside .social_widget .social-icons-widget li a i',
        '.blog-entries article .entry-readmore',
        '.single-modern-header .entry-tag-list a',
        '#portfolio-entries .portfolio_item .entry-overlay.light-text .categories a',
        '.portfolio-navigation.simple',
        '.cl-sidenav ul li a',
        '.single-product .cl-style-center .product_meta .shares',
        '.single-product .cl-style-wide_full_image .product_meta i',
        'input:not(.cl-btn):not([type="submit"]):not(.medium-editor-toolbar-input), textarea',
    );

    $data['other_area_links']['color'] = array(
        'article.format-quote .entry-content .quote-entry-content p, article.format-quote .entry-content .quote-entry-content a',
        '.cl-pagination a',
        '.cl-pagination span.current',
        '.cl-pagination-jump a',
        '.cl_progress_bar .labels'
    );
    
    
    //Logo Font
    $data['logo_font'] = array(
        '.cl-h-cl_header_logo .logo_font'    
    );
    
    // Headings Typography
    $data['headings_typo'] = array(
        'h1,h2,h3,h4,h5,h6',
        '#testimonial-entries .testimonial_item .title',
        'article.default-style.format-quote .entry-content',
        'aside .widget_calendar caption',
        '.cl_page_header .title_part .subtitle',
        '.cl_team.style-simple .team-item .team-position',
        '.cl_team.style-photo .team-item .team-position',
        '.woocommerce-result-count',
        '.woocommerce div.product .woocommerce-tabs ul.tabs li a',
        '.woocommerce ul.products li.product:not(.style_large) .button',
        '.extra_tools_wrapper .show-side-header',
        'nav .codeless_custom_menu_mega_menu h6, .cl-mobile-menu nav > ul > li > a',
        '.cl-btn:not(.btn-font-custom):not(.btn-style-simple_square)',
        '.blog-entries .fullimage_transparent-style h2',
        '.grid-options label',
        '.widget_service a',
        '.shop-products .product_item .tags',
        '.cl-price-rating .price, .woocommerce ul.products li.product .price del',
        '.single-product .summary.entry-summary .price',
        '.woocommerce .quantity .qty',
        '.woocommerce div.product form.cart .button',
        '.cl-review-info .average span.star',
        '.woocommerce #reviews #comments .cl-user-info .woocommerce-review__author',
        'table.shop_table .product-price .price, table.shop_table .woocs_special_price_code, table.shop_table .cart-subtotal td, table.shop_table .product-subtotal, .woocs_price_code > .woocommerce-Price-amount, .price > .woocommerce-Price-amount, .product-price > .woocommerce-Price-amount',
        '.woocommerce-checkout-review-order-table tfoot td span',
        'table.cart td.actions .coupon input[type="submit"]',
        '.cart-collaterals .order-total th',
        '.shipping-calculator-form button[type="submit"]',
        '.woocommerce-order .cl-thankyou-data .woocommerce-order-details table th, .woocommerce-order .cl-thankyou-data .woocommerce-order-details table td.woocommerce-table__product-total',
        '.woocommerce-order .cl-thankyou-data .woocommerce-order-details table tfoot th',
        '.woocommerce-order .woocommerce-thankyou-order-received',
        '.woocommerce table.wishlist_table .product-add-to-cart a',
        '.woocommerce .track_order .form-row input[type="submit"]',
        '#customer_login.u-columns .login_div .or',
        '.woocommerce-MyAccount-navigation ul li a',
        '.woocommerce-MyAccount-content input[type="submit"]',
        'aside .widget.woocommerce .product-categories li',
        '#site-header-cart .woocommerce-mini-cart__total',
        '.cl_shop_tabbed .tabbed-tabs li a',
        '.cl-btn span',
        '.cl-shop-filter button',
        '.cl-closed-section .close_section_button .anchor',
        '.open-filters',
        '.cl-portfolio-filter button',
        '.portfolio-navigation.simple span',
        '.cl-sidenav ul li a',
        '.single-product-style-center .summary .inline-wishlist',
        '#customer_login.u-columns form input[type="submit"]'
    );

    $data['shop_custom_typography'] = array(
        '.shop-products .product_item h3'
    );
    
    // Body Typography
    $data['body_typo'] = array(
        'html',
        'body',
        '.light-text .breadcrumbss .page_parents',
        'aside .widget_categories ul li a, aside .widget_archive ul li a, aside .widget_pages ul li a',
        '#ship-to-different-address span',
        '.summary .group_table tr td.label .price *'
    ); 
    
    // Heading Menu Typography
    $data['menu_font'] = array(
        '.header_container nav ul li a'  
    );
    
    // Widgets Typography
    $data['widgets_title_typography'] = array(
        'aside .widget-title',
    );

    $data['main_footer_title_typography'] = array(
        'footer#colophon .widget:not(.widget_mc4wp_form_widget):not(.social_widget) .widget-title',
        '#footer-wrapper .quick-searches span',
        '.mc4wp-form p input[type="submit"]'
    );

    $data['top_footer_title_typography'] = array(
        '#top_footer .widget-title'
    );

    $data['copyright_title_typography'] = array(
        '#copyright .widget-title'
    );
    
    // Blog Entry Typography
    $data['blog_entry_title'] = array(
        '.hentry:not(.fullimage_transparent-style):not(.news-style) h2.entry-title',
        '.entry-single-related .fullimage_transparent-style .entry-title',
        '.single-blog-extra-heading'
    );

    $data['blog_meta_style'] = array(
        'article.hentry .entry-meta'
    );
    
    // Single Blog Typography
    $data['single_blog_title'] = array(
        'article.post h1.entry-title'
    );
    
    
    // Header Menu Border Style
    $data['header_menu_border_style'] = array(
        '.header_container.menu_style-border_top.menu-full-style nav > ul > li', 
        '.header_container.menu_style-border_bottom.menu-full-style nav > ul > li', 
        '.header_container.menu_style-border_left.menu-full-style nav > ul > li', 
        '.header_container.menu_style-border_right.menu-text-style nav > ul > li > a', 
        '.header_container.menu_style-border_top.menu-text-style nav > ul > li > a', 
        '.header_container.menu_style-border_bottom.menu-text-style nav > ul > li > a', 
        '.header_container.menu_style-border_left.menu-text-style nav > ul > li > a', 
        '.header_container.menu_style-border_right.menu-text-style nav > ul > li > a'
    );

    // Blog Image Overlay Color
    $data['blog_overlay_color'] = array(

    );
    
    
    // Footer Border Color
    $data['footer_border_color'] = array(
        'footer#colophon .widget',
        'footer#colophon input:not([type="email"]), footer#colophon select, footer#colophon textarea'
    );

    $data['copyright_border_color'] = array(
        '#copyright .widget',
        '#copyright input, #copyright select, #copyright textarea'
    );

    $data['topfooter_border_color'] = array(
        '#top_footer .widget',
        '#top_footer input, #top_footer select, #top_footer textarea',
        '.mc4wp-form p input[type="email"]',
        '.mc4wp-form p input[type="submit"]',

    );
    
    // Footer Dark BG Color
    $data['footer_dark_bg_color'] = array(
        'footer#colophon input[type="text"], footer#colophon select, footer#colophon textarea, footer#colophon input[type="email"]',
        'footer#colophon .social_widget .social-icons-widget.circle li',
        'footer#colophon table tbody td'
        
    );

    $data['footer_button_bg_color'] = array(
        'footer#colophon input[type="submit"]'
    );



    // Header menu styles
    $data['header_menu_border_color'] = array(
        '.header_container.menu_style-border_top.menu-full-style #navigation nav > ul > li:hover',
         '.header_container.menu_style-border_top.menu-full-style #navigation nav > ul > li.current-menu-item',
         '.header_container.menu_style-border_bottom.menu-full-style #navigation nav > ul > li:hover',
         '.header_container.menu_style-border_bottom.menu-full-style #navigation nav > ul > li.current-menu-item',
         '.header_container.menu_style-border_left.menu-full-style #navigation nav > ul > li:hover',
         '.header_container.menu_style-border_left.menu-full-style #navigation nav > ul > li.current-menu-item',
         '.header_container.menu_style-border_right.menu-full-style #navigation nav > ul > li:hover',
         '.header_container.menu_style-border_right.menu-full-style #navigation nav > ul > li.current-menu-item',

        '.header_container.menu_style-border_top.menu-text-style #navigation nav > ul > li > a:hover',
         '.header_container.menu_style-border_top.menu-text-style #navigation nav > ul > li.current-menu-item > a',
         '.header_container.menu_style-border_bottom.menu-text-style #navigation nav > ul > li > a:hover',
         '.header_container.menu_style-border_bottom.menu-text-style #navigation nav > ul > li.current-menu-item > a',
         '.header_container.menu_style-border_left.menu-text-style #navigation nav > ul > li > a:hover',
         '.header_container.menu_style-border_left.menu-text-style #navigation nav > ul > li.current-menu-item > a',
         '.header_container.menu_style-border_right.menu-text-style #navigation nav > ul > li > a:hover',
         '.header_container.menu_style-border_right.menu-text-style #navigation nav > ul > li.current-menu-item > a',
    );

    $data['header_menu_background_color'] = array(
        '.header_container.menu_style-background_color.menu-full-style #navigation nav > ul > li:hover', 
         '.header_container.menu_style-background_color.menu-full-style #navigation nav > ul > li.current-menu-item', 
         '.header_container.menu_style-background_color.menu-text-style #navigation nav > ul > li > a:hover',
         '.header_container.menu_style-background_color.menu-text-style #navigation nav > ul > li.current-menu-item > a',
    );

    $data['header_menu_font_color'] = array(
        '.header_container.menu_style-background_color.menu-full-style #navigation nav > ul > li:hover',
         '.header_container.menu_style-background_color.menu-full-style #navigation nav > ul > li.current-menu-item',
         '.header_container.menu_style-background_color.menu-text-style #navigation nav > ul > li > a:hover', 
         '.header_container.menu_style-background_color.menu-text-style #navigation nav > ul > li.current-menu-item > a',

        '.header_container.menu_style-background_color.menu-full-style #navigation nav > ul > li:hover > a',
        '.header_container.menu_style-background_color.menu-full-style #navigation nav > ul > li.current-menu-item > a',
    );


    $data['header_top_typography'] = array(
        '.header_container .top_nav.header-row'
    );

    $data['dropdown_hassubmenu_item'] = array(
        'nav .codeless_custom_menu_mega_menu h6, .cl-mobile-menu nav > ul > li > a'
    );

    $data['dropdown_item_typography'] = array(
        'nav .menu li ul.sub-menu li a, .cl-submenu a, .cl-submenu .empty, .tool .header_cart .total'
    );
    
    $data['counter_typography'] = array(
        '.cl_counter'
    );

    $data['highlight_light_color_hover']['background-color'] = array(
        '.quick-searches .tags a:hover, .widget .tagcloud a:hover, .cl-product-info .product_meta .tagged_as a:hover ',
        '.single_blog_style-classic.cl-layout-fullwidth article.single-article .entry-tag-list a:hover'
    );

    
    $data = apply_filters( 'codeless_dynamic_css_register_tags', $data );
    
    if( ! $option ){
        return $data;
    }
        
    
    if( ! $suboption && isset( $data[ $option ] ) && isset( $data[ $option ][0] ) && ! is_array( $data[ $option ][0] ) )
        return ( ! empty( $data[ $option ] ) ? implode( ", ", $data[ $option ] ) : ' ' );
    
    if( isset( $data[ $option ][ $suboption ] ) )
        return ( ! empty( $data[ $option ][ $suboption ] ) ? implode( ", ", $data[ $option ][ $suboption ] ) : ' ' );
}


// Before VC Init
add_action( 'vc_before_init', 'vc_before_init_actions' );
 
function vc_before_init_actions() {
     
    // Link your VC elements's folder
    if( function_exists('vc_set_shortcodes_templates_dir') ){ 
     
        vc_set_shortcodes_templates_dir( get_template_directory() . '/includes/codeless_builder/shortcodes' );
         
    }
     
}


if(function_exists('vc_set_as_theme')) 
  vc_set_as_theme();

if ( class_exists('WPBakeryVisualComposerAbstract') && class_exists( 'Cl_Builder_Manager' ) ) {
    
    remove_action( 'vc_activation_hook', 'vc_page_welcome_set_redirect' );
    remove_action( 'admin_init', 'vc_page_welcome_redirect' );

    function codeless_active_vc(){
        require_once locate_template('includes/codeless_functions_backend_editor.php');
    }

    add_action('init','codeless_active_vc', 999 );
}


set_time_limit(0);
?>