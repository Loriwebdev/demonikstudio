<?php
/**
 * Checkout login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( is_user_logged_in() || 'no' === get_option( 'woocommerce_enable_checkout_login_reminder' ) ) {
	return;
}

$info_message  = apply_filters( 'woocommerce_checkout_login_message', esc_html__( 'Returning customer?', 'june' ) );
$info_message .= ' <a href="#" class="showlogin">' . esc_html__( 'Click here to login', 'june' ) . '</a>';

echo '<div class="cl-info-checkout">';
echo '<i class="cl-icon-account-outline"></i>';
echo codeless_complex_esc( $info_message );
echo '</div>';

woocommerce_login_form(
	array(
		'message'  => esc_html__( 'If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing &amp; Shipping section.', 'june' ),
		'redirect' => wc_get_page_permalink( 'checkout' ),
		'hidden'   => true,
	)
);

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */