<?php
/**
 * Custom Primary Color per Page
 * 
 * @package june WordPress Theme
 * @subpackage Modules
 * @version 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Start Class
if ( ! class_exists( 'CodelessCustomPrimaryColorModule' ) ) {

	class CodelessCustomPrimaryColorModule {


		function __construct(){
			
			$this->add_custom_post_meta();

		}

		function add_custom_post_meta(){
			if( class_exists('Cl_Post_Meta') ){
				Cl_Post_Meta::map(array(
	   
				   'post_type' => array( 'page', 'post', 'product', 'portfolio' ),
				   'feature' => 'page_primary_color',
				   'meta_key' => 'page_primary_color',
				   'control_type' => 'kirki-color',
				   'label' => 'Custom Primary Accent Color Module',
				   'priority' => 4,
				   'inline_control' => true,
				   'id' => 'page_primary_color',
				   'transport' => 'postMessage', 
				   'default' => '', 
				   'description' => '',
				   'group_in' => 'general',
				   
				));

			}
		}

		function register_preview_scripts(){
		}


	}	

	if( codeless_get_mod( 'cl_custom_primary_color_per_page', false ) )
		new CodelessCustomPrimaryColorModule();

}