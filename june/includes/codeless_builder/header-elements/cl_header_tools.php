<?php 
    
    extract( $element['params'] ); 


    global $cl_from_element;
    $cl_from_element['search_type'] = $search_type;

?>


<div class="extra_tools_wrapper <?php echo esc_attr( $this->generateClasses( '.extra_tools_wrapper' ) ) ?>">
    

    <?php if( ( int ) $search_button && $tools_style != 'default'  ): ?>
       
        <div class="search tool search-style-<?php echo esc_attr($search_type) ?>">

            <a href="#" id="header_search_btn" class="tool-link">
                <i class="cl-icon-magnify"></i>
                <span class="show-side-header"><?php esc_html_e('Search', 'june' ) ?></span>
            </a>
            <div class="search-wrapper">
                <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">

                    <div class="search-input">
                        <input type="search" id="<?php echo esc_attr( $unique_id ); ?>" class="search-field input-search-field" <?php $this->generateStyle( '.search-element .input-search-field', true ); ?> placeholder="<?php echo esc_attr__( 'Search Your Style', 'june' ); ?>" autocomplete="off" value="<?php echo get_search_query(); ?>" name="s" />
                        <div class="ajax-results"></div>
                    </div>

                    <input type="hidden" name="post_type" value="product" />
                   
                </form>
            </div>

        </div><!-- .search.tool -->

    <?php endif; ?>


    <?php if( ( int ) $account ): ?>

        <div class="account tool">
            <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="tool-link">
                <i class="cl-icon-account-outline"></i>
                <span class="show-side-header"><?php esc_html_e('Account', 'june' ) ?></span>
            </a>
            <?php if( ! is_user_logged_in() ): ?>

                <div id="site-login-box" class="cl-submenu cl-hide-on-mobile">

                    <?php get_template_part('woocommerce/header-login-box') ?>
                    
                </div><!-- #site-login-box -->

            <?php endif; ?>
        </div>

    <?php endif; ?>
    
    <?php if( (int) $wishlist && function_exists( 'is_woocommerce' ) && function_exists( 'yith_wishlist_constructor' )): ?>

        <div class="wishlist tool">
            
            <?php 
                $wishlist_page_url = !is_customize_preview() ? get_page_link( get_option('yith_wcwl_wishlist_page_id') ) : '#';
            ?>

            <a href="<?php echo esc_url($wishlist_page_url) ?>" class="tool-link">
                <i class="cl-icon-heart-outline"></i>
                <span class="show-side-header"><?php esc_html_e('Wishlist', 'june' ) ?></span>
                <span class="description"><?php esc_attr_e('Wishlist', 'june'); ?></span>
            </a>

        </div><!-- .wishlist.tool -->

    <?php endif; ?>

    <?php if( (int) $cart_button && function_exists( 'is_woocommerce' ) ): ?>

        <div class="shop tool">
            
            <?php 
                
                $cart_url = wc_get_cart_url();

                if( isset( $_GET['cl_cart_change'] ) && $_GET['cl_cart_change'] == 'side' )
                    $cart_style = 'side';

            ?>

            <a href="<?php echo esc_url($cart_url) ?>" class="tool-link">
                <div class="wrapper">
                    <div class="cart-icon">
                        <i class="cl-icon-cart-outline"></i>
                        <span class="show-side-header"><?php esc_html_e('Cart', 'june' ) ?></span>
                        <span class="cart-total cl-cart-total-fragment"><?php echo WC()->cart->get_cart_contents_count() ?></span>
                    </div>
                    <div class="cart-details">
                        <span class="cart-label"><?php esc_attr_e( 'Cart', 'june' ) ?></span>
                        <span class="cart-total-sum"><?php echo WC()->cart->get_cart_total() ?></span>
                    </div>
                </div>
            </a>

            <?php if( ! is_cart() && ! is_checkout() ): ?>

                <div id="site-header-cart" class="<?php if( $cart_style == 'default' ) echo 'cl-submenu'; ?> cl-hide-on-mobile cart-style-<?php echo esc_attr( $cart_style ) ?>">

                    <?php if( $cart_style == 'side' ): ?>
                        <div class="side-cart-header">
                            <h5><?php esc_attr_e( 'Shopping Cart', 'june' ); ?></h5>
                            <a href="#" class="close"></a>
                        </div>
                    <?php endif; ?>
                        <?php the_widget( 'WC_Widget_Cart', 'title=', array('before_widget' => '<div class="header_cart">', 'after_widget' => '</div>' ) ); ?>
                </div><!-- #site-header-cart -->

            <?php endif; ?>

        </div><!-- .shop.tool -->

    <?php endif; ?>


    <div class="cl-mobile-menu-button cl-color-<?php echo esc_attr( codeless_get_mod('header_mobile_menu_hamburger_color', 'dark') ) ?>">
        <span></span>
        <span></span>
        <span></span>
    </div> 

</div>