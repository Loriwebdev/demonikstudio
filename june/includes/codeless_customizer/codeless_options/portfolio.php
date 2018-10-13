<?php

    Kirki::add_panel( 'cl_custom_types', array(
	    'priority'    => 10,
	    'type' => '',
	    'title'       => esc_html__( 'Custom Types', 'june' ),
	    'tooltip' => esc_html__( 'All Custom Types Options', 'june' ),
	) );
	    
	    
	    Kirki::add_section( 'cl_custom_portfolio', array(
    	    'title'          => esc_html__( 'Portfolio', 'june' ),
    	    'tooltip'    => esc_html__( 'All Portfolio Page and single options', 'june' ),
    	    'panel'          => 'cl_custom_types',
    	    'type'			 => '',
    	    'priority'       => 160,
    	    'capability'     => 'edit_theme_options'
    	) );

    	Kirki::add_section( 'cl_custom_staff', array(
    	    'title'          => esc_html__( 'Staff', 'june' ),
    	    'tooltip'    => esc_html__( 'All Staff (Members) options', 'june' ),
    	    'panel'          => 'cl_custom_types',
    	    'type'			 => '',
    	    'priority'       => 160,
    	    'capability'     => 'edit_theme_options'
    	) );

    	Kirki::add_section( 'cl_custom_testimonial', array(
    	    'title'          => esc_html__( 'Testimonial', 'june' ),
    	    'tooltip'    => esc_html__( 'All Testimonial options', 'june' ),
    	    'panel'          => 'cl_custom_types',
    	    'type'			 => '',
    	    'priority'       => 160,
    	    'capability'     => 'edit_theme_options'
    	) );
    	

			        Kirki::add_field( 'cl_june', array(
		    			'settings' => 'portfolio_style',
		    			'label'    => esc_html__( 'Portfolio Style', 'june' ),
		    			'tooltip' => esc_html__( 'Select style of portfolio pages', 'june' ),
		    			'section'  => 'cl_custom_portfolio',
		    			'type'     => 'select',
						'priority' => 10,
						'default'  => 'default',
						'choices'     => array(
							'default'  => esc_attr__( 'Default', 'june' ),
							'alternate'  => esc_attr__( 'Alternate', 'june' ),
							'minimal'  => esc_attr__( 'Minimal', 'june' ),
							'timeline'  => esc_attr__( 'Timeline', 'june' ),
							'grid'  => esc_attr__( 'Grid', 'june' ),
							'masonry' => esc_attr__( 'Masonry', 'june' ),
						),
		    			'transport' => 'postMessage',
		
		    		) );

?>