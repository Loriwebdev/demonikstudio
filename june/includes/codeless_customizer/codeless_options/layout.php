<?php

Kirki::add_section( 'cl_layout', array(
	    'priority'    => 10,
	    'type' => '',
	    'title'       => esc_html__( 'Layout', 'june' ),
	    'tooltip' => esc_html__( 'Overall site layout options', 'june' ),
	) );


		Kirki::add_field( 'cl_june', array(
			'settings' => 'layout',
			'label'    => esc_html__( 'All Pages Layout', 'june' ),
			'tooltip' => esc_html__( 'The general website layout. This can be overwrite from Blog Layout and from single page/post layouts', 'june' ),
			'section'  => 'cl_layout',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'fullwidth',
			'choices'     => array(
				'fullwidth'  => esc_attr__( 'Fullwidth', 'june' ),
				'left_sidebar'  => esc_attr__( 'Left Sidebar', 'june' ),
				'right_sidebar'  => esc_attr__( 'Right Sidebar', 'june' ),
				'dual_sidebar'  => esc_attr__( 'Dual Sidebar', 'june' )
			),
		) );

		Kirki::add_field( 'cl_june', array(
			'settings' => 'search_page_layout',
			'label'    => esc_html__( 'Search Page Layout', 'june' ),
			'tooltip' => esc_html__( '', 'june' ),
			'section'  => 'cl_layout',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'fullwidth',
			'choices'     => array(
				'fullwidth'  => esc_attr__( 'Fullwidth', 'june' ),
				'left_sidebar'  => esc_attr__( 'Left Sidebar', 'june' ),
				'right_sidebar'  => esc_attr__( 'Right Sidebar', 'june' ),
				'dual_sidebar'  => esc_attr__( 'Dual Sidebar', 'june' )
			),
		) );


		Kirki::add_field( 'cl_june', array(
			'settings' => 'boxed_layout',
			'label'    => esc_html__( 'Boxed Layout', 'june' ),
			'tooltip' => esc_html__( 'Switch on if you want to make all page boxed', 'june' ),
			'section'  => 'cl_layout',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'june' ),
				0 => esc_attr__( 'Off', 'june' ),
			),
			'transport' => 'postMessage',
		) );


		Kirki::add_field( 'cl_june', array(
			'settings' => 'boxed_layout_width',
			'label'    => esc_html__( 'Boxed Wrapper Width', 'june' ),
			'tooltip' => esc_html__( 'Define boxed wrapper width in pixel.', 'june' ),
			'section'  => 'cl_layout',
			'type'     => 'slider',
			'priority' => 10,
			'default'  => '1200',
			'choices'     => array(
				'min'  => '970',
				'max'  => '1600',
				'step' => '10',
			),
			'inline_control' => true,
			'transport' => 'auto',
			'output' => array(
				array(
					'element' => '.cl-boxed-layout',
					'units' => 'px',
					'property' => 'width',
					'media_query' => '@media (min-width: 992px)'
				),
			)
		) );


		Kirki::add_field( 'cl_june', array(
			'settings' => 'layout_container_width',
			'label'    => esc_html__( 'Site Container Width', 'june' ),
			'tooltip' => esc_html__( 'Define site container width in pixel. A max-width:100% is set to not destroy the layout on smaller screens. It\'s applied on min-width media screens: 1200px', 'june' ),
			'section'  => 'cl_layout',
			'type'     => 'slider',
			'priority' => 10,
			'default'  => '1180',
			'choices'     => array(
				'min'  => '970',
				'max'  => '1600',
				'step' => '10',
			),
			'inline_control' => true,
			'transport' => 'auto',
			'output' => array(
				array(
					'element' => '.container',
					'units' => 'px',
					'property' => 'width',
					'media_query' => '@media (min-width: 1200px)'
				),
			)
		) );

		Kirki::add_field( 'cl_june', array(
			'settings' => 'sidebar_sticky',
			'label'    => esc_html__( 'Sticky Sidebar', 'june' ),
			'tooltip' => esc_html__( 'Switch on if you want to make sidebar sticky on page scroll', 'june' ),
			'section'  => 'cl_layout',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'june' ),
				0 => esc_attr__( 'Off', 'june' ),
			),
			'transport' => 'postMessage',
		) );

		Kirki::add_field( 'cl_june', array(
			'settings' => 'sidebar_sticky_offset',
			'label'    => esc_html__( 'Sidebar Sticky Offset', 'june' ),
			'tooltip' => esc_html__( 'If you leave 0, sidebar will be sticky from top. If you select 2 for example, sidebar will be sticky only for the last 2 widgets of sidebar not for the all sidebar.', 'june' ),
			'section'  => 'cl_layout',
			'type'     => 'slider',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				'min'  => 0,
				'max'  => 15,
				'step' => 1,
			),
			'inline_control' => true,
			'transport' => 'postMessage',
			'required'    => array(
				array(
					'setting'  => 'sidebar_sticky',
					'operator' => '==',
					'value'    => true,
				),
								
			),
		) );
		
		Kirki::add_field( 'cl_june', array(
			'settings' => 'layout_modern',
			'label'    => esc_html__( 'Layout Modern', 'june' ),
			'tooltip' => esc_html__( 'Switch if you want to make web layout with sidebar background color. You can change color on Styling ', 'june' ),
			'section'  => 'cl_layout',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'june' ),
				0 => esc_attr__( 'Off', 'june' ),
			),
			'transport' => 'postMessage',
		) );

		Kirki::add_field( 'cl_june', array(
			'settings' => 'layout_bordered',
			'label'    => esc_html__( 'Layout Bordered', 'june' ),
			'tooltip' => esc_html__( 'Add a transparent border of 20px around webpages (all pages).', 'june' ),
			'section'  => 'cl_layout',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'june' ),
				0 => esc_attr__( 'Off', 'june' ),
			),
			'transport' => 'refresh',
		) );
		
		
		Kirki::add_field( 'cl_june', array(
			'settings' => 'inner_content_padding_top',
			'label'    => esc_html__( 'Inner Content Distance from Top', 'june' ),
			'tooltip' => esc_html__( 'Define the default distance of Inner Content ( Content / Sidebar ) from Header ( Header / Page Header / Other inserted elements ). Usable with: Pages without page builder, blog, defined page templates, posts.', 'june' ),
			'section'  => 'cl_layout',
			'type'     => 'slider',
			'priority' => 10,
			'default'  => '75',
			'choices'     => array(
				'min'  => '0',
				'max'  => '200',
				'step' => '1',
			),
			'inline_control' => true,
			'transport' => 'auto',
			'output' => array(
				array(
					'element' => '.inner-content-row',
					'units' => 'px',
					'property' => 'padding-top'
				),
			)
		) );
		
		Kirki::add_field( 'cl_june', array(
			'settings' => 'inner_content_padding_bottom',
			'label'    => esc_html__( 'Inner Content Distance from Bottom', 'june' ),
			'tooltip' => esc_html__( 'Define the default distance of Inner Content ( Content / Sidebar ) from Footer. Usable with: Pages without page builder, blog, defined page templates, posts.', 'june' ),
			'section'  => 'cl_layout',
			'type'     => 'slider',
			'priority' => 10,
			'default'  => '75',
			'choices'     => array(
				'min'  => '0',
				'max'  => '200',
				'step' => '1',
			),
			'inline_control' => true,
			'transport' => 'auto',
			'output' => array(
				array(
					'element' => '.inner-content-row',
					'units' => 'px',
					'property' => 'padding-bottom'
				),
			)
		) );

		Kirki::add_field( 'cl_june', array(
			'settings' => 'row_default_padding',
			'label'    => esc_html__( 'Row Elements Default Padding', 'june' ),
			'tooltip' => esc_html__( 'Define a default padding-top and padding-bottom for each new row when added with Codeless Builder. Need save and refresh for apply.', 'june' ),
			'section'  => 'cl_layout',
			'type'     => 'slider',
			'priority' => 10,
			'default'  => '45',
			'choices'     => array(
				'min'  => '0',
				'max'  => '200',
				'step' => '1',
			),
			'inline_control' => true,
			'transport' => 'postMessage',
		) );


		Kirki::add_field( 'cl_june', array(
			'settings' => 'column_default_padding',
			'label'    => esc_html__( 'Column Elements Default Padding', 'june' ),
			'tooltip' => esc_html__( 'Define a default padding-top and padding-bottom for each new column when added with Codeless Builder. Need save and refresh for apply. in px', 'june' ),
			'section'  => 'cl_layout',
			'type'     => 'slider',
			'priority' => 10,
			'default'  => '10',
			'choices'     => array(
				'min'  => '0',
				'max'  => '200',
				'step' => '1',
			),
			'inline_control' => true,
			'transport' => 'postMessage',
		) );

		Kirki::add_field( 'cl_june', array(
			'settings' => 'elements_default_margin',
			'label'    => esc_html__( 'Elements Default Margin Top', 'june' ),
			'tooltip' => esc_html__( 'Define a default margin-top for each new element when added with Codeless Builder. Need save and refresh for apply. in px', 'june' ),
			'section'  => 'cl_layout',
			'type'     => 'slider',
			'priority' => 10,
			'default'  => '20',
			'choices'     => array(
				'min'  => '0',
				'max'  => '200',
				'step' => '1',
			),
			'inline_control' => true,
			'transport' => 'postMessage',
		) );
		
		Kirki::add_field( 'cl_june', array(
			'settings' => 'blog_article_distance',
			'label'    => esc_html__( 'Distance between blog entries', 'june' ),
			'tooltip' => esc_html__( 'Define distance in pixel between Blog Entries in Blog Page', 'june' ),
			'section'  => 'cl_layout',
			'type'     => 'slider',
			'priority' => 10,
			'default'  => '80',
			'choices'     => array(
				'min'  => '0',
				'max'  => '160',
				'step' => '1',
			),
			'inline_control' => true,
			'transport' => 'auto',
			'output' => array(
				array(
					'element' => '.blog-entries article',
					'units' => 'px',
					'property' => 'margin-bottom'
				),
			)
		) );

		Kirki::add_field( 'cl_june', array(
			'settings' => 'portfolio_distance',
			'label'    => esc_html__( 'Distance between portfolio items', 'june' ),
			'tooltip' => esc_html__( 'Define distance in pixel between Portfolio Items', 'june' ),
			'section'  => 'cl_layout',
			'type'     => 'slider',
			'priority' => 10,
			'default'  => '15',
			'choices'     => array(
				'min'  => '0',
				'max'  => '100',
				'step' => '1',
			),
			'inline_control' => true,
			'transport' => 'postMessage',
			'output' => array(
				array(
					'element' => '#portfolio-entries .portfolio_item',
					'units' => 'px',
					'property' => 'padding'
				),
			)
		) );


?>