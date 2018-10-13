<?php

if( function_exists( 'register_sidebar' ) ) {
    
    function codeless_register_sidebars_init() {
        global $cl_redata;
        
        register_sidebar( array(
             'name' => esc_html__( 'Sidebar Blog', 'june' ),
            'id' => 'sidebar-blog',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>' 
        ) );
        
        register_sidebar( array(
             'name' => esc_html__( 'Sidebar Pages', 'june' ),
            'id' => 'sidebar-pages',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>' 
        ) );
        
       

        register_sidebar( array(
            'name' => esc_html__( 'Top Footer Left', 'june' ),
            'id' => 'top_footer-left',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>' 
        ) );

        register_sidebar( array(
            'name' => esc_html__( 'Top Footer Right', 'june' ),
            'id' => 'top_footer-right',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>' 
        ) );


        
        $cols = codeless_layoutToArray( codeless_get_mod( 'footer_layout', '14_14_14_14' ) );
        
        for( $i = 1; $i <= count( $cols ); $i++ ) {
            register_sidebar( array(
                 'name' => esc_html__( 'Footer Column ' . $i, 'june' ),
                'id' => 'footer-column-' . $i,
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widget-title">',
                'after_title' => '</h3>' 
            ) );
        }
        
        
        register_sidebar( array(
             'name' => esc_html__( 'Copyright Left', 'june' ),
            'id' => 'copyright-left',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>' 
        ) );
        
        register_sidebar( array(
             'name' => esc_html__( 'Copyright Right', 'june' ),
            'id' => 'copyright-right',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>' 
        ) );
        
        
        $custom_pages_sidebars = codeless_get_custom_sidebar_pages();


        if( ! empty( $custom_pages_sidebars ) ):
                foreach( $custom_pages_sidebars as $page_id => $page_name ) {
                    
                    if( $page_id != "" )
                        register_sidebar( array(
                             'name' => esc_html__( 'Page', 'june' ) . ': ' . get_the_title( $page_id ) . '',
                            'id' => 'sidebar-custom-page-' . $page_id,
                            'before_widget' => '<div id="%1$s" class="widget %2$s">',
                            'after_widget' => '</div>',
                            'before_title' => '<h3 class="widget-title">',
                            'after_title' => '</h3>' 
                        ) );
                    
                    
                }
        endif;
        
        
        
        $custom_categories_sidebars = codeless_get_custom_sidebar_categories();


        if( ! empty( $custom_categories_sidebars ) ):
                foreach( $custom_categories_sidebars as $category_id => $category_name ) {
                    
                    if( $category_id != "" )
                        register_sidebar( array(
                             'name' => esc_html__( 'Category', 'june' ) . ': ' . $category_name . '',
                            'id' => 'sidebar-custom-category-' . $category_id,
                            'before_widget' => '<div id="%1$s" class="widget %2$s">',
                            'after_widget' => '</div>',
                            'before_title' => '<h3 class="widget-title">',
                            'after_title' => '</h3>' 
                        ) );
                    
                    
                }
        endif;


        if( class_exists( 'Woocommerce' ) ) {
            $custom_product_categories_sidebars = codeless_get_custom_sidebar_product_categories();


            if( ! empty( $custom_product_categories_sidebars ) ):
                    foreach( $custom_product_categories_sidebars as $category_id => $category_name ) {
                        
                        if( $category_id != "" )
                            register_sidebar( array(
                                 'name' => esc_html__( 'Product Category', 'june' ) . ': ' . $category_name . '',
                                'id' => 'sidebar-custom-product-category-' . $category_id,
                                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                                'after_widget' => '</div>',
                                'before_title' => '<h3 class="widget-title">',
                                'after_title' => '</h3>' 
                            ) );
                        
                        
                    }
            endif;
        }
        
        
        
        if( class_exists( 'Woocommerce' ) ) {
            register_sidebar( array(
                 'name' => esc_html__( 'Sidebar Woocommerce', 'june' ),
                'id' => 'woocommerce',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widget-title">',
                'after_title' => '</h3>' 
            ) );
        }
        
        
        register_sidebar( array(
             'name' => esc_html__( 'Search Page', 'june' ),
            'id' => 'search-dynamic',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>' 
        ) );

        register_sidebar( array(
             'name' => esc_html__( 'Custom Sidebar1', 'june' ),
            'id' => 'custom-sidebar1',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>' 
        ) );

        register_sidebar( array(
             'name' => esc_html__( 'Custom Sidebar2', 'june' ),
            'id' => 'custom-sidebar2',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>' 
        ) ); 

        register_sidebar( array(
             'name' => esc_html__( 'Custom Sidebar3', 'june' ),
            'id' => 'custom-sidebar3',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>' 
        ) ); 

        register_sidebar( array(
             'name' => esc_html__( 'Shop InPage Filters', 'june' ),
            'id' => 'shop-inpage-filters',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>' 
        ) );
        
        
    }
    add_action( 'widgets_init', 'codeless_register_sidebars_init', 999 );
    
}

?>