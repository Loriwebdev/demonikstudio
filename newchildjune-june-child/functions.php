<?php add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',get_stylesheet_directory_uri() . '/style.css',array('parent-style') );

}

if( function_exists( 'yith_wishlist_install' ) ){

    if( ! function_exists( 'yith_ywar_enqueue_scripts' ) ) {

        function yith_ywar_enqueue_scripts() {

            if( is_product() ) {
                wp_enqueue_script( 'prettyphoto' );
                wp_enqueue_style( 'prettyphoto' );
            }

        }

        add_action( 'wp_enqueue_scripts', 'yith_ywar_enqueue_scripts', 99999 );

    }

}