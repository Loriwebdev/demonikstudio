<?php

// Register Portfolio

$argsPortfolio = array(

	'post_type' => 'portfolio',

	'taxonomy' => 'portfolio_entries',

	'labels' => array( 

		'name' => _x('Portfolio Items', 'post type general name', 'june' ),

		'singular_name' => _x('Portfolio Entry', 'post type singular name', 'june' ),

		'add_new' => _x('Add New', 'portfolio', 'june' ),

		'add_new_item' => esc_html__('Add New Portfolio Entry', 'june' ),

		'edit_item' => esc_html__('Edit Portfolio Entry', 'june' ),

		'new_item' => esc_html__('New Portfolio Entry', 'june' ),

		'view_item' => esc_html__('View Portfolio Entry', 'june' ),

		'search_items' => esc_html__('Search Portfolio Entries', 'june' ),

		'not_found' =>  esc_html__('No Portfolio Entries found', 'june' ),

		'not_found_in_trash' => esc_html__('No Portfolio Entries found in Trash', 'june' ), 

		'parent_item_colon' => ''

	),

	'taxonomy_label' => esc_html__( 'Portfolio Categories', 'june' ),

	'slugRule' => codeless_get_mod( 'portfolio_slug', 'portfolio' ),

	'show_in_customizer' => true

);



codeless_register_post_type( $argsPortfolio );



// Register Staff

$argsStaff = array(

	'post_type' => 'staff',

	'taxonomy' => 'staff_entries',

	'labels' => array(

		'name' => _x('Team', 'post type general name', 'june' ),

		'singular_name' => _x('Staff Entry', 'post type singular name', 'june' ),

		'add_new' => _x('Add New', 'staff', 'june' ),

		'add_new_item' => esc_html__('Add New Staff Entry', 'june' ),

		'edit_item' => esc_html__('Edit Staff Entry', 'june' ),

		'new_item' => esc_html__('New Staff Entry', 'june' ),

		'view_item' => esc_html__('View Staff Entry', 'june' ),

		'search_items' => esc_html__('Search Staff Entries', 'june' ),

		'not_found' =>  esc_html__('No Staff Entries found', 'june' ),

		'not_found_in_trash' => esc_html__('No Staff Entries found in Trash', 'june' ), 

		'parent_item_colon' => ''
	),

	'taxonomy_label' => esc_html__( 'Staff Categories', 'june' ),

	'slugRule' => codeless_get_mod( 'staff_slug', 'staff' ),

	'show_in_customizer' => true

);


codeless_register_post_type( $argsStaff );



// Register Testimonial

$argsTestimonial = array(

	'post_type' => 'testimonial',

	'taxonomy' => 'testimonial_entries',

	'labels' => array(

		'name' => _x('Testimonials', 'post type general name', 'june' ),

		'singular_name' => _x('Testimonial Entry', 'post type singular name', 'june' ),

		'add_new' => _x('Add New', 'testimonial', 'june' ),

		'add_new_item' => esc_html__('Add New Testimonial Entry', 'june' ),

		'edit_item' => esc_html__('Edit Testimonial Entry', 'june' ),

		'new_item' => esc_html__('New Testimonial Entry', 'june' ),

		'view_item' => esc_html__('View Testimonial Entry', 'june' ),

		'search_items' => esc_html__('Search Testimonial Entries', 'june' ),

		'not_found' =>  esc_html__('No Testimonial Entries found', 'june' ),

		'not_found_in_trash' => esc_html__('No Testimonial Entries found in Trash', 'june' ), 

		'parent_item_colon' => ''

	),

	'taxonomy_label' => esc_html__( 'Testimonial Categories', 'june' ),

	'slugRule' => codeless_get_mod( 'testimonial_slug', 'testimonial' ),

	'show_in_customizer' => true


);


codeless_register_post_type( $argsTestimonial );



// Register Content Blocks

$argsContentBlocks = array(

	'post_type' => 'content_block',

	'taxonomy' => 'content_blocks',

	'labels' => array(

		'name' => _x('Content Blocks', 'post type general name', 'june' ),

		'singular_name' => _x('Content Block', 'post type singular name', 'june' ),

		'add_new' => _x('Add New', 'content_block', 'june' ),

		'add_new_item' => esc_html__('Add New Content Block', 'june' ),

		'edit_item' => esc_html__('Edit Content Block', 'june' ),

		'new_item' => esc_html__('New Content Block', 'june' ),

		'view_item' => esc_html__('View Content Block', 'june' ),

		'search_items' => esc_html__('Search Content Blocks', 'june' ),

		'not_found' =>  esc_html__('No Content Blocks found', 'june' ),

		'not_found_in_trash' => esc_html__('No Content Blocks found in Trash', 'june' ), 

		'parent_item_colon' => ''

	),

	'taxonomy_label' => esc_html__( 'Content Blocks Categories', 'june' ),

	'slugRule' => codeless_get_mod( 'content_block_slug', 'content_block' ),

	'show_in_customizer' => false


);


codeless_register_post_type( $argsContentBlocks );



// Register Careers

$argsCareers = array(

	'post_type' => 'career',

	'taxonomy' => 'career_entries',

	'labels' => array(

		'name' => _x('Careers', 'post type general name', 'june' ),

		'singular_name' => _x('Career Entry', 'post type singular name', 'june' ),

		'add_new' => _x('Add New', 'career', 'june' ),

		'add_new_item' => esc_html__('Add New Career Entry', 'june' ),

		'edit_item' => esc_html__('Edit Career Entry', 'june' ),

		'new_item' => esc_html__('New Career Entry', 'june' ),

		'view_item' => esc_html__('View Career Entry', 'june' ),

		'search_items' => esc_html__('Search Career Entries', 'june' ),

		'not_found' =>  esc_html__('No Career Entries found', 'june' ),

		'not_found_in_trash' => esc_html__('No Career Entries found in Trash', 'june' ), 

		'parent_item_colon' => ''

	),

	'taxonomy_label' => esc_html__( 'Career Categories', 'june' ),

	'slugRule' => codeless_get_mod( 'career_slug', 'career_items' ),

	'show_in_customizer' => true


);


codeless_register_post_type( $argsCareers );



/* Multiscroll Slider */

$argsMultiscroll = array(

	'post_type' => 'multiscroll',

	'taxonomy' => 'multiscroll_slider',

	'labels' => array( 

		'name' => _x('Multiscroll Slides', 'post type general name', 'june' ),

		'singular_name' => _x('Multiscroll Slide', 'post type singular name', 'june' ),

		'add_new' => _x('Add New', 'multiscroll', 'june' ),

		'add_new_item' => esc_html__('Add New Multiscroll Slide', 'june' ),

		'edit_item' => esc_html__('Edit Multiscroll Slide', 'june' ),

		'new_item' => esc_html__('New Multiscroll Slide', 'june' ),

		'view_item' => esc_html__('View Multiscroll Slide', 'june' ),

		'search_items' => esc_html__('Search Multiscroll Slides', 'june' ),

		'not_found' =>  esc_html__('No Multiscroll Slides found', 'june' ),

		'not_found_in_trash' => esc_html__('No Multiscroll Slides found in Trash', 'june' ), 

		'parent_item_colon' => ''

	),

	'taxonomy_label' => esc_html__( 'Multiscroll Slider', 'june' ),

	'slugRule' => 'multiscroll',

	'show_in_customizer' => false

);



codeless_register_post_type( $argsMultiscroll );

?>