<?php

Kirki::add_section( 'cl_shop', array(
	    'priority'    => 10,
	    'type' => '',
	    'title'       => esc_html__( 'Shop', 'june' ),
	    'tooltip' => esc_html__( 'All Shop Options', 'june' ),
	) );

		    	
		Kirki::add_field( 'cl_june', array(
				    		
				   'settings' => 'title_shop_page',
				   'label'    => esc_html__( 'Shop Page Archive', 'june' ),
				   'section'  => 'cl_shop',
				   'type'     => 'grouptitle',
				   'into_group' => true,
				
		) );
			
			Kirki::add_field( 'cl_june', array(
				'settings' => 'shop_catalog_mode',
				'label'    => esc_html__( 'Catalog Mode', 'june' ),
				'tooltip' => esc_html__( 'Switch on to make shop only catalog mode. Hide add to cart', 'june' ),
				'section'  => 'cl_shop',
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
				'settings' => 'shop_product_style',
				'label'    => esc_html__( 'Shop Items Style', 'june' ),
				'section'  => 'cl_shop',
				'type'     => 'select',
				'priority' => 10,
				'default'  => 'normal',
				'choices'     => array(
					'normal'  => esc_attr__( 'Normal', 'june' ),
					'small'  => esc_attr__( 'Small', 'june' ),
					'large'  => esc_attr__( 'Large', 'june' ),
					'masonry'  => esc_attr__( 'Masonry', 'june' ),
					'list'  => esc_attr__( 'List', 'june' ),
					'dark_controllers'  => esc_attr__( 'With Dark Controllers', 'june' )
				),
			) );

			Kirki::add_field( 'cl_june', array(
				'settings' => 'shop_advanced_list',
				'label'    => esc_html__( 'Advanced List', 'june' ),
				'tooltip' => esc_html__( 'Switch on to make List Style more Advanced', 'june' ),
				'section'  => 'cl_shop',
				'type'     => 'switch',
				'priority' => 10,
				'default'  => 0,
				'choices'     => array(
					1  => esc_attr__( 'On', 'june' ),
					0 => esc_attr__( 'Off', 'june' ),
				),
				'transport' => 'refresh',
				'required'    => array(
					array(
						'setting'  => 'shop_product_style',
						'operator' => '==',
						'value'    => 'list',
					),
									
				),
			) );

			Kirki::add_field( 'cl_june', array(
				'settings' => 'shop_columns',
				'label'    => esc_html__( 'Shop Columns', 'june' ),
				'tooltip' => esc_html__( 'Select number of items to display per Row on SHOP Page', 'june' ),
				'section'  => 'cl_shop',
				'type'     => 'select',
				'priority' => 10,
				'default'  => '3',
				'choices'     => array(
					'2'  => esc_attr__( '2 Columns', 'june' ),
					'3'  => esc_attr__( '3 Columns', 'june' ),
					'4'  => esc_attr__( '4 Columns', 'june' ),
					'5'  => esc_attr__( '5 Columns', 'june' ),
					'6'  => esc_attr__( '6 Columns', 'june' ),
				),
			) );

			Kirki::add_field( 'cl_june', array(
				'settings' => 'shop_columns_mobile',
				'label'    => esc_html__( 'Shop Columns in Mobile', 'june' ),
				'tooltip' => esc_html__( 'Select number of items to display per Row on SHOP Page in mobile', 'june' ),
				'section'  => 'cl_shop',
				'type'     => 'select',
				'priority' => 10,
				'default'  => '1',
				'choices'     => array(
					'1'  => esc_attr__( '1 Columns', 'june' ),
					'2'  => esc_attr__( '2 Columns', 'june' )
				),
			) );

			Kirki::add_field('cl_june', array(
				'settings' => 'shop_item_per_page',
				'label' => esc_html__('Shop Items Per Page', 'june') ,
				'tooltip' => esc_html__('', 'june') ,
				'section' => 'cl_shop',
				'type' => 'number',
				'priority' => 10,
				'default' => 8,
				'choices' => array(
					'min' => 1,
					'max' => 50,
					'step' => 1,
				) ,
				
				'transport' => 'postMessage',
				
			));

			Kirki::add_field( 'cl_june', array(
				'settings' => 'shop_top_content',
				'label'    => esc_html__( 'Shop Top Content', 'june' ),
				'tooltip' => esc_html__( 'Select a page, use the content of that page as elements in the top of Shop Page', 'june' ),
				'section'  => 'cl_shop',
				'type'     => 'select',
				'priority' => 10,
				'default'  => 'none',
				'transport' => 'postMessage',
				'choices'  =>   codeless_get_pages()
			) );

			Kirki::add_field( 'cl_june', array(
				'settings' => 'shop_bottom_content',
				'label'    => esc_html__( 'Shop Bottom Content', 'june' ),
				'tooltip' => esc_html__( 'Select a page, use the content of that page as elements in the end of Shop Page', 'june' ),
				'section'  => 'cl_shop',
				'type'     => 'select',
				'priority' => 10,
				'default'  => 'none',
				'transport' => 'postMessage',
				'choices'  =>   codeless_get_pages()
			) );



		Kirki::add_field( 'cl_june', array(
		    		
		   'settings' => 'divider_shop_category',
		   'label'    => '',
		   'section'  => 'cl_shop',
		   'type'     => 'groupdivider',
		   'into_group' => true,
		    			
		) );
		    	
		Kirki::add_field( 'cl_june', array(
				    		
				   'settings' => 'title_shop_category',
				   'label'    => esc_html__( 'Shop Categories', 'june' ),
				   'section'  => 'cl_shop',
				   'type'     => 'grouptitle',
				   'into_group' => true,
				
		) );




		Kirki::add_field( 'cl_june', array(
			'settings' => 'shop_category_style',
			'label'    => esc_html__( 'Shop Category Items Style', 'june' ),
			'section'  => 'cl_shop',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'normal',
			'choices'     => array(
				'normal'  => esc_attr__( 'Normal', 'june' ),
				'small'  => esc_attr__( 'Small', 'june' ),
				'large'  => esc_attr__( 'Large', 'june' ),
				'masonry'  => esc_attr__( 'Masonry', 'june' ),
				'list'  => esc_attr__( 'List', 'june' ),
				'dark_controllers'  => esc_attr__( 'With Dark Controllers', 'june' )
			),
		) );


		Kirki::add_field( 'cl_june', array(
			'settings' => 'shop_advanced_list_category',
			'label'    => esc_html__( 'Advanced List', 'june' ),
			'tooltip' => esc_html__( 'Switch on to make List Style more Advanced', 'june' ),
			'section'  => 'cl_shop',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'june' ),
				0 => esc_attr__( 'Off', 'june' ),
			),
			'transport' => 'refresh',
			'required'    => array(
				array(
					'setting'  => 'shop_category_style',
					'operator' => '==',
					'value'    => 'list',
				),
								
			),
		) );


		Kirki::add_field('cl_june', array(
			'settings' => 'shop_item_per_category',
			'label' => esc_html__('Shop Items Per Category', 'june') ,
			'tooltip' => esc_html__('', 'june') ,
			'section' => 'cl_shop',
			'type' => 'number',
			'priority' => 10,
			'default' => 8,
			'choices' => array(
				'min' => 1,
				'max' => 50,
				'step' => 1,
			) ,
			
			'transport' => 'postMessage',
			
		));

		Kirki::add_field( 'cl_june', array(
				'settings' => 'shop_categories_columns',
				'label'    => esc_html__( 'Shop Categories Columns', 'june' ),
				'tooltip' => esc_html__( 'Select number of items to display per Row on Categories', 'june' ),
				'section'  => 'cl_shop',
				'type'     => 'select',
				'priority' => 10,
				'default'  => '3',
				'choices'     => array(
					'2'  => esc_attr__( '2 Columns', 'june' ),
					'3'  => esc_attr__( '3 Columns', 'june' ),
					'4'  => esc_attr__( '4 Columns', 'june' ),
					'5'  => esc_attr__( '5 Columns', 'june' ),
					'6'  => esc_attr__( '6 Columns', 'june' ),
				),
			) );

		Kirki::add_field( 'cl_june', array(
			'settings' => 'shop_category_layout',
			'label'    => esc_html__( 'Shop Categories Layout', 'june' ),
			'tooltip' => esc_html__( 'Select shop Product Categories page layout.', 'june' ),
			'section'  => 'cl_shop',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'fullwidth',
			'choices'     => array(
				'fullwidth'  => esc_attr__( 'Fullwidth', 'june' ),
				'left_sidebar'  => esc_attr__( 'Left Sidebar', 'june' ),
				'right_sidebar'  => esc_attr__( 'Right Sidebar', 'june' )
			),
		) );








		Kirki::add_field( 'cl_june', array(
		    		
		   'settings' => 'divider_shop_extra',
		   'label'    => '',
		   'section'  => 'cl_shop',
		   'type'     => 'groupdivider',
		   'into_group' => true,
		    			
		) );
		    	
		Kirki::add_field( 'cl_june', array(
				    		
				   'settings' => 'title_shop_extra',
				   'label'    => esc_html__( 'Shop Extra', 'june' ),
				   'section'  => 'cl_shop',
				   'type'     => 'grouptitle',
				   'into_group' => true,
				
		) );

		Kirki::add_field( 'cl_june', array(
				'settings' => 'shop_related_style',
				'label'    => esc_html__( 'Related Items Style', 'june' ),
				'section'  => 'cl_shop',
				'type'     => 'select',
				'priority' => 10,
				'default'  => 'normal',
				'choices'     => array(
					'normal'  => esc_attr__( 'Normal', 'june' ),
					'small'  => esc_attr__( 'Small', 'june' ),
					'large'  => esc_attr__( 'Large', 'june' ),
					'masonry'  => esc_attr__( 'Masonry', 'june' ),
					'list'  => esc_attr__( 'List', 'june' ),
					'dark_controllers'  => esc_attr__( 'With Dark Controllers', 'june' )
				),
			) );

		Kirki::add_field( 'cl_june', array(
			'settings' => 'shop_search_page_layout',
			'label'    => esc_html__( 'Search Page Layout', 'june' ),
			'section'  => 'cl_shop',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'left_sidebar',
			'choices'     => array(
				'fullwidth'  => esc_attr__( 'Fullwidth', 'june' ),
				'left_sidebar'  => esc_attr__( 'Left Sidebar', 'june' ),
				'right_sidebar'  => esc_attr__( 'Right Sidebar', 'june' ),
				'dual_sidebar'  => esc_attr__( 'Dual Sidebar', 'june' )
			),
		) );



		Kirki::add_field( 'cl_june', array(
		    'type' => 'slider',
		    'settings' => 'shop_item_distance',
			'label' => 'Distance between items',
			'default' => '15',
			'choices'     => array(
			'min'  => '0',
			'max'  => '30',
			'step' => '1',
							),
			'inline_control' => true,
			'section'  => 'cl_shop',
			'transport' => 'postMessage'
    	));

    	Kirki::add_field( 'cl_june', array(
				'settings' => 'shop_animation',
				'label'    => esc_html__( 'Animation Type', 'june' ),
				
				'section'  => 'cl_shop',
				'type'     => 'select',
				'priority' => 10,
				'default'  => 'bottom-t-top',
				'choices' => array(
					'none'	=> 'None',
					'top-t-bottom' =>	'Top-Bottom',
					'bottom-t-top' =>	'Bottom-Top',
					'right-t-left' => 'Right-Left',
					'left-t-right' => 'Left-Right',
					'alpha-anim' => 'Fade-In',	
					'zoom-in' => 'Zoom-In',	
					'zoom-out' => 'Zoom-Out',
					'zoom-reverse' => 'Zoom-Reverse',
				),
				'transport' => 'postMessage'
	) );

    	Kirki::add_field( 'cl_june', array(
			'settings' => 'shop_item_heading',
			'label'    => esc_html__( 'Shop Item Heading', 'june' ),
			'section'  => 'cl_shop',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'custom_font',
			'choices'     => array(
				'h1'  => esc_attr__( 'H1', 'june' ),
				'h2'  => esc_attr__( 'H2', 'june' ),
				'h3'  => esc_attr__( 'H3', 'june' ),
				'h4'  => esc_attr__( 'H4', 'june' ),
				'h5'  => esc_attr__( 'H5', 'june' ),
				'h6'  => esc_attr__( 'H6', 'june' ),
				'custom_font'  => esc_attr__( 'Custom Font', 'june' ),
			),
			'transport' => 'postMessage'
		) );


		Kirki::add_field( 'cl_june', array(
			'type'        => 'typography',
			'settings'    => 'shop_custom_typography',
			'label'       => esc_attr__( 'Shop Custom Title Font', 'june' ),
			'section'     => 'cl_shop',
			'into_group' => true,
			'show_subsets' => false,
			'show_variants' => true,
			'default'     => array(
				'letter-spacing' => '0.4px',
				'font-weight' => '600',
				'text-transform' => 'none',
				'font-size' => '14px',
				'line-height' => '26px',
				'color' => '#262a2c',
				'font-family' => 'Montserrat'
			),
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'shop_custom_typography' )
				),

			),
			'required'    => array(
				array(
					'setting'  => 'shop_item_heading',
					'operator' => '==',
					'value'    => 'custom_font',
				),
								
			),
		));


    	Kirki::add_field( 'cl_june', array(
			'settings' => 'shop_pagination_style',
			'label'    => esc_html__( 'Shop Pagination Style', 'june' ),
			'section'  => 'cl_shop',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'load_more',
			'choices'     => array(
				'numbers'  => esc_attr__( 'With Page Numbers', 'june' ),
				'next_prev'  => esc_attr__( 'Next/Prev', 'june' ),
				'load_more'  => esc_attr__( 'Load More Button', 'june' ),
				'infinite_scroll'  => esc_attr__( 'Infinite Scroll', 'june' ),
			),
			'transport' => 'refresh'
		) );

		

		Kirki::add_field( 'cl_june', array(
			'settings' => 'shop_inpage_filters',
			'label'    => esc_html__( 'Inpage Filters', 'june' ),
			'tooltip' => esc_html__( 'Filters on top of page will be shown. Please fill the Widgetized Area "Shop InPage Filters at Widgets." ', 'june' ),
			'section'  => 'cl_shop',
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
			'settings' => 'shop_variable_price_from',
			'label'    => esc_html__( 'Variable Price Format "From:"', 'june' ),
			'section'  => 'cl_shop',
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
			'type'        => 'repeater',
			'label'       => esc_attr__( 'Custom Quick Search Terms', 'june' ),
			'tooltip'	  => esc_attr__( 'Leave empty to use product tags as quick search', 'june' ),
			'section'     => 'cl_shop',
			'priority'    => 10,
			'row_label' => array(
				'type' => 'text',
				'value' => esc_attr__('Search Term', 'june' ),
			),
			'settings'    => 'shop_quick_search',
			'default'     => array(
				
			),
			'fields' => array(
				'term' => array(
					'type'        => 'text',
					'label'       => esc_attr__( 'Quick Search Term', 'june' ),
					'default'     => 'Dresses',
				),
			),
			'transport' => 'postMessage'
		) );


		Kirki::add_field( 'cl_june', array(
			'settings' => 'shop_open_toggles',
			'label'    => esc_html__( 'Filter Toogles Open by default', 'june' ),
			'tooltip' => esc_html__( 'Switch On to open all filter toggles by default" ', 'june' ),
			'section'  => 'cl_shop',
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
		    		
		   'settings' => 'divider_shop_product',
		   'label'    => '',
		   'section'  => 'cl_shop',
		   'type'     => 'groupdivider',
		   'into_group' => true,
		    			
		) );
		    	
		Kirki::add_field( 'cl_june', array(
				    		
				   'settings' => 'title_shop_product',
				   'label'    => esc_html__( 'Shop Single Product', 'june' ),
				   'section'  => 'cl_shop',
				   'type'     => 'grouptitle',
				   'into_group' => true,
				
		) );


		Kirki::add_field( 'cl_june', array(
			'settings' => 'shop_global_product_style',
			'label'    => esc_html__( 'Shop Global Single Product Style', 'june' ),
			'tooltip' => esc_html__( 'Select a global product style for woocommerce products. Can be override from each product page.', 'june' ),
			'section'  => 'cl_shop',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'default',
			'transport' => 'postMessage',
			'choices'  =>   array(
				  'default'  => esc_attr__( 'Default', 'june' ),
			      'wide' => esc_attr__( 'Wide & Vertical Thumbs', 'june' ),
			      'fixed_recommanded' => esc_attr__( 'Fixed recommanded products', 'june' ),
			      'center' => esc_attr__( 'All Centered', 'june' ),
			      'wide_horizontal' => esc_attr__( 'Wide & Horizontal Thumbs', 'june' ),
			      'long_gallery' => esc_attr__( 'Long Gallery Images', 'june' ),
			      'wide_full_image' => esc_attr__( 'Wide Full Image', 'june' ),
			      'boxed' => esc_attr__( 'Boxed Content', 'june' ),
			)
		) );

		Kirki::add_field( 'cl_june', array(
			'settings' => 'shop_product_lightbox',
			'label'    => esc_html__( 'Product Lightbox', 'june' ),
			'tooltip' => esc_html__( 'Active lightbox on products" ', 'june' ),
			'section'  => 'cl_shop',
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
			'settings' => 'shop_quick_view',
			'label'    => esc_html__( 'Quick View', 'june' ),
			'tooltip' => esc_html__( 'Active quickview on products" ', 'june' ),
			'section'  => 'cl_shop',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'june' ),
				0 => esc_attr__( 'Off', 'june' ),
			),
			'transport' => 'postMessage',
		) );


		Kirki::add_field( 'cl_june', array(
			'settings' => 'shop_share_buttons',
			'label'    => esc_html__( 'Shop Share Buttons', 'june' ),
			'tooltip' => esc_html__( '" ', 'june' ),
			'section'  => 'cl_shop',
			'type'     => 'sortable',
			'priority' => 10,
			'default'     => array(
				'facebook',
				'twitter',
				'google',
				'pinterest'
			),
			'choices'     => array(
				'facebook' => 'Facebook',
				'twitter' => 'Twitter',
				'google' => 'Google',
				'whatsapp' => 'Whatsapp',
				'linkedin' => 'Linkedin',
				'pinterest' => 'Pinterest'
			),
			'transport' => 'postMessage',
		) );




		
?>