<?php
	
	Kirki::add_section( 'cl_codeless_header_builder', array(
	    'title'          => esc_html__( 'Header Builder', 'june' ),
	    'description'    => esc_html__( 'Options for adding an additional element on header', 'june' ),
	    'panel'          => '',
	    'type'			 => '',
	    'priority'       => 160,
	    'capability'     => 'edit_theme_options'
	) );
	
	
		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Menu', 'june' ),
			'section'     => 'cl_codeless_header_builder',
			'priority'    => 10,
			'icon'		  => 'icon-basic-todo-txt',
			'transport'   => 'postMessage',
			'settings'    => 'cl_header_menu',
			'fields'	  => array(

				'general' => array(
						'type' => 'group_start',
						'label' => 'General',
						'groupid' => 'general'
				),

					'menu_id' => array(
						'type'     => 'inline_select',
						'priority' => 10,
						'label'       => esc_attr__( 'Select Menu to display', 'june' ),
						'default'     => 'default',
						'choices' => codeless_get_all_wordpress_menus(),
						'reloadTemplate' => true,
					),

					'vertical_menu' => array( 
						'type'        => 'switch',
						'label'       => esc_html__( 'Vertical Menu', 'june' ),
						'tooltip' => 'Works only on fullscreen overlay menu or other vertical header type.',
						'default'     => 0,
						'priority'    => 10,
						'choices'     => array(
							'on'  => esc_attr__( 'On', 'june' ),
							'off' => esc_attr__( 'Off', 'june' ),
						),
						'selector' => '#navigation',
						'addClass' => 'vertical-menu',
					),

					'use_for_responsive' => array(
								'type'        => 'switch',
								'label'       => esc_html__( 'Use For Responsive', 'june' ),
								'description' => 'Switch On to use this Navigation for responsive',
								'default'     => 1,
								'priority'    => 10,
								'selector' => '.cl-primary-navigation',
								'addClass' => 'use-for-responsive',
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'june' ),
									'off' => esc_attr__( 'Off', 'june' ),
								),
								'reloadTemplate' => true
					),

					'open_menu_button' => array(
								'type'        => 'switch',
								'label'       => esc_html__( 'Show Open Menu Button in-place.', 'june' ),
								'tooltip' => 'Switch On to show the Open Menu Button in-place, if you leave off, the menu button will be shown in Tools elements instead. Use this when Tools Element is not actived.',
								'default'     => 0,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'june' ),
									'off' => esc_attr__( 'Off', 'june' ),
								),
								'reloadTemplate' => true,
								'cl_required'    => array(
									array(
										'setting'  => 'use_for_responsive',
										'operator' => '==',
										'value'    => 1,
									),
								),
					),

					'responsive_menu' => array(
								'type'        => 'switch',
								'label'       => esc_html__( 'Show other menu in responsive', 'june' ),
								'description' => 'Switch on to show another menu in Responsive Header',
								'default'     => 0,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'june' ),
									'off' => esc_attr__( 'Off', 'june' ),
								),
								'reloadTemplate' => true,
								'cl_required'    => array(
									array(
										'setting'  => 'use_for_responsive',
										'operator' => '==',
										'value'    => 1,
									),
								),

					),

					'responsive_menu_id' => array(
						'type'     => 'inline_select',
						'priority' => 10,
						'label'       => esc_attr__( 'Select Responsive Menu to display', 'june' ),
						'default'     => 'default',
						'choices' => codeless_get_all_wordpress_menus(),
						'reloadTemplate' => true,
						'cl_required'    => array(
							array(
								'setting'  => 'responsive_menu',
								'operator' => '==',
								'value'    => 1,
							),
						),
					), 

				'general_end' => array(
						'type' => 'group_end',
						'label' => 'General',
						'groupid' => 'general'
				),

				'hamburger_start' => array(
						'type' => 'group_start',
						'label' => 'Hamburger Menu',
						'groupid' => 'hamburger'
				),
					'hamburger' => array(
						'type'        => 'switch',
						'label'       => esc_html__( 'Hamburger Menu', 'june' ),
						'description' => 'Switch On to make this menu appear as Hamburger menu. Select one of styles below.',
						'default'     => 0,
						'priority'    => 10,
						'choices'     => array(
							'on'  => esc_attr__( 'On', 'june' ),
							'off' => esc_attr__( 'Off', 'june' ),
						),
						'reloadTemplate' => true
					),

					'hamburger_style' => array(
						'type'     => 'inline_select',
						'priority' => 10,
						'label'       => esc_attr__( 'Hamburger Menu Style', 'june' ),
						'default'     => 'overlay',
						'choices' => array(
							'overlay' => 'Fullscreen Overlay',
							'half_overlay' => 'Half Overlay'
						),
						'reloadTemplate' => true,
						'cl_required'    => array(
							array(
								'setting'  => 'hamburger',
								'operator' => '==',
								'value'    => 1,
							),
						),
					),

					'hamburger_half_overlay_width' => array(
	
							'type' => 'slider',
							'label' => 'Overlay Width',
							'default' => '40',
							'selector' => '.cl-half-overlay-menu',
							'css_property' => 'width',
							'choices'     => array(
								'min'  => '10',
								'max'  => '100',
								'step' => '1',
								'suffix' => '%'
							),
							'suffix' => '%',
							'cl_required'    => array(
								array(
									'setting'  => 'hamburger_style',
									'operator' => '==',
									'value'    => 'half_overlay',
								),
							),
						),

					'hamburger_overlay_text' => array(
						'type'     => 'inline_select',
						'priority' => 10,
						'label'       => esc_attr__( 'Hamburger Overlay Text', 'june' ),
						'default' => 'light-text',
						'choices' => array(
							'dark-text' => 'Dark',
							'light-text' => 'Light'
						),
						'selector' => '.cl-fullscreen-overlay-menu',
						'selectClass' => ' ',

						'cl_required'    => array(
							array(
								'setting'  => 'hamburger',
								'operator' => '==',
								'value'    => 1,
							),
						),
					),

					'hamburger_overlay_bg' => array(
						'type' => 'color',
						'label' => 'Background Color',
						'default' => 'rgba(0,0,0,0.9)',
						'selector' => '.cl-fullscreen-overlay-menu',
								
						'css_property' => 'background-color',
						'alpha' => true,
						'cl_required'    => array(
							array(
								'setting'  => 'hamburger',
								'operator' => '==',
								'value'    => 1,
							),
						),
					),

				'hamburger_end' => array(
						'type' => 'group_end',
						'label' => 'Hamburger',
						'groupid' => 'hamburger'
				),


				'typography_start' => array(
						'type' => 'group_start',
						'label' => 'Typography',
						'groupid' => 'typography'
					),

					'custom_color' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Custom Items Color', 'june' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
						),

					'text_color' => array(
							'type' => 'color',
							'label' => 'Color',
							'default' => '',
							'selector' => 'nav ul li a',
							'css_property' => 'color',
							'alpha' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'custom_color',
									'operator' => '==',
									'value'    => 1,
								),
							),
					),
					
						
				

				'typography_end' => array(
						'type' => 'group_end',
						'label' => 'Typography',
						'groupid' => 'typography'
				),

				'Animation_start' => array(
						'type' => 'group_start',
						'label' => 'Animation',
						'groupid' => 'animation'
				),

					'item_animation' => array(
						'type'     => 'inline_select',
						'priority' => 10,
					    'label'       => esc_attr__( 'Items Animation Effect', 'june' ),
						'default'     => 'none',
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
						'selector' => '#navigation nav > ul > li'
					),

					'animation_delay' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Delay between items', 'june' ),
							'default'     => '100',
							'choices' => array(
								'none'	=> 'None',
								'100' =>	'ms 100',
								'200' =>	'ms 200',
								'300' =>	'ms 300',
								'400' =>	'ms 400',
								'500' =>	'ms 500',
								'600' =>	'ms 600',
								'700' =>	'ms 700',
								'800' =>	'ms 800',
								'900' =>	'ms 900',
								'1000' =>	'ms 1000',
								'1100' =>	'ms 1100',
								'1200' =>	'ms 1200',
								'1300' =>	'ms 1300',
								'1400' =>	'ms 1400',
								'1500' =>	'ms 1500',
								'1600' =>	'ms 1600',
								'1700' =>	'ms 1700',
								'1800' =>	'ms 1800',
								'1900' =>	'ms 1900',
								'2000' =>	'ms 2000',
							
							),
							
							'cl_required'    => array(
								array(
									'setting'  => 'item_animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
						),
						
						'animation_speed' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Animation Speed', 'june' ),
							'default'     => '500',
							'choices' => array(
								'none'	=> 'None',
								'100' =>	'ms 100',
								'200' =>	'ms 200',
								'300' =>	'ms 300',
								'400' =>	'ms 400',
								'500' =>	'ms 500',
								'600' =>	'ms 600',
								'700' =>	'ms 700',
								'800' =>	'ms 800',
								'900' =>	'ms 900',
								'1000' =>	'ms 1000'
								
							
							),
							'selector' => '#navigation nav > ul > li',
							'htmldata' => 'speed',
							'cl_required'    => array(
								array(
									'setting'  => 'item_animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
						),

				'animation_end' => array(
						'type' => 'group_end',
						'label' => 'Animation',
						'groupid' => 'animation'
				),

			)
			
		));
		
		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Logo', 'june' ),
			'section'     => 'cl_codeless_header_builder',
			'priority'    => 10,
			'transport'   => 'postMessage',
			'icon'		  => 'icon-basic-star',
			'settings'    => 'cl_header_logo',
			'open_section' => 'logo_type'
			
		));
		
		
		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Tools', 'june' ),
			'section'     => 'cl_codeless_header_builder',
			'priority'    => 10,
			'transport'   => 'postMessage',
			'icon'		  => 'icon-basic-settings',
			'settings'    => 'cl_header_tools',
			'fields'	  => array(
					
						'search_group' => array(
							'type' => 'group_start',
							'label' => 'Search',
							'groupid' => 'search'
						), 
						
							'search_button' => array(
								'type'        => 'switch',
								'label'       => esc_html__( 'Search button', 'june' ),
								'tooltip' 	  => 'Activate to show search button. Works better with ',
								'default'     => 1,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'june' ),
									'off' => esc_attr__( 'Off', 'june' ),
								),
								'reloadTemplate' => true,
								'cl_required'    => array(
									array(
										'setting'  => 'tools_style',
										'operator' => '==',
										'value'    => 'small',
									),
								),
							),

						'search_group_end' => array(
							'type' => 'group_end',
							'label' => 'Search Tool',
							'groupid' => 'search'
						),
						
						'shop_group' => array(
							'type' => 'group_start',
							'label' => 'Shop',
							'groupid' => 'shop'
						),
							
							'wishlist' => array(
								'type'        => 'switch',
								'label'       => esc_html__( 'Show Wishlist', 'june' ),
								'description' => 'Show Wishlist if Woocommerce and Wishlist Plugin is actived',
								'default'     => 0,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'june' ),
									'off' => esc_attr__( 'Off', 'june' ),
								),
								'reloadTemplate' => true
							),

							'cart_button' => array(
								'type'        => 'switch',
								'label'       => esc_html__( 'Show Cart', 'june' ),
								'description' => 'Show Cart if WooCommerce installed',
								'default'     => 0,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'june' ),
									'off' => esc_attr__( 'Off', 'june' ),
								),
								'reloadTemplate' => true
							),

							'cart_style' => array(
								'type'        => 'inline_select',
								'label'       => esc_html__( 'Cart Style', 'june' ),
								'description' => '',
								'default'     => 'default',
								'priority'    => 10,
								'choices'     => array(
									'default' => 'Default (Dropdown)',
									'side' => 'Open from side'
									
								),
								'reloadTemplate' => true
							),
							
						'shop_group_end' => array(
							'type' => 'group_end',
							'label' => 'Shop Tools',
							'groupid' => 'shop'
						),
						

						'account_group_start' => array(
							'type' => 'group_start',
							'label' => 'Account Login',
							'groupid' => 'account_group'
						),
						
							'account' => array(
								'type'        => 'switch',
								'label'       => esc_html__( 'Account Login / Register', 'june' ),
								'description' => 'Activate to add an login / account tool',
								'default'     => 0,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'june' ),
									'off' => esc_attr__( 'Off', 'june' ),
								),
								'reloadTemplate' => true,
								'cl_required'    => array(
									array(
										'setting'  => 'tools_style',
										'operator' => '==',
										'value'    => 'small',
									),
								),
							), 
							
						'account_group_end' => array(
							'type' => 'group_end',
							'label' => 'Account Login',
							'groupid' => 'account_group'
						),

						'style' => array(
							'type' => 'group_start',
							'label' => 'Style',
							'groupid' => 'style'
						),
						
							'tools_style' => array(
	
								'type' => 'inline_select',
								'label' => 'Tools Style',
								'default' => 'default',
								'selector' => '.extra_tools_wrapper',
								'selectClass' => 'style-',
								'choices'     => array(
									'default' => 'Large with Desc',
									'small' => 'Small Circles'
									
								),
							),

							'dividers' => array(
								'type'        => 'switch',
								'label'       => esc_html__( 'Dividers between tools', 'june' ),
								'description' => '',
								'default'     => 1,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'june' ),
									'off' => esc_attr__( 'Off', 'june' ),
								),
								'selector' => '.extra_tools_wrapper',
								'addClass' => 'with-dividers',
							), 
							
						'side_nav_group_end' => array(
							'type' => 'group_end',
							'label' => 'Side Navigation',
							'groupid' => 'side_nav'
						),
			),
			
		));


		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Button', 'june' ),
			'section'     => 'cl_codeless_header_builder',
			'priority'    => 10,
			'transport'   => 'postMessage',
			'icon'		  => 'icon-basic-signs',
			'settings'    => 'cl_header_button',
			'fields'	  => array(
					
					'btn_title' => array(
						'type'     => 'text',
						'priority' => 10,
						'selector' => '.cl-btn span',
						'label'       => esc_attr__( 'Text', 'june' ),
						'description' => esc_attr__( 'This will be the label for your link', 'june' ),
						'default'     => 'View More',
						'reloadTemplate' => true
					),

					'link' => array(
						'type'     => 'text',
						'priority' => 10,
						'label'       => esc_attr__( 'Link', 'june' ),
						'default'     => '#'
					),

					'css_style' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'default' => array('padding-top' => '', 'padding-bottom' => ''),
							'selector' => '.cl-btn-div',
							'css_property' => '',
					),
			),
			
		)); 

		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Icon Text', 'june' ),
			'section'     => 'cl_codeless_header_builder',
			'priority'    => 10,
			'transport'   => 'postMessage',
			'icon'		  => 'icon-basic-signs',
			'settings'    => 'cl_header_icon_text',
			'fields'	  => array(
					
					'hide_responsive' => array(
								'type'        => 'switch',
								'label'       => esc_html__( 'Hide on Responsive', 'june' ),
								'description' => 'Switch On to hide from responsive Header',
								'default'     => 0,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'june' ),
									'off' => esc_attr__( 'Off', 'june' ),
								),
								'reloadTemplate' => true
					), 

					'text_title' => array(
						'type'     => 'inline_text',
						'priority' => 10,
						'selector' => '.cl-icon-text .title',
						'label'       => esc_attr__( 'Text', 'june' ),
						'description' => esc_attr__( 'This will be the label for your link', 'june' ),
						'default'     => 'Text for this element. Click to Edit.'
					),

					'link' => array(
						'type'     => 'text',
						'priority' => 10,
						'label'       => esc_attr__( 'Link', 'june' ),
						'default'     => ''
					),

					'icon' => array(
						'type'     => 'select_icon',
						'priority' => 10,
						'label'       => esc_attr__( 'Select Icon', 'june' ),
						'default'     => 'cl-icon-phone',
						'selector' => '.cl-icon-text i',
						'selectClass' => ' ',
					),

					'icon_size' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Icon Size', 'june' ),
							'description' => esc_attr__( '', 'june' ),
							'default'     => '16',
							
							'selector' => '.cl-icon-text i',
							'css_property' => 'font-size',
							'choices'     => array(
									'min'  => '10',
									'max'  => '72',
									'step' => '1',
									'suffix' => 'px'
								),
							'suffix' => 'px',
						),

					'space_title' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Space between title and icon', 'june' ),
							'description' => esc_attr__( '', 'june' ),
							'default'     => '35',
							
							'selector' => '.cl-icon-text .title',
							'css_property' => 'padding-left',
							'choices'     => array(
									'min'  => '0',
									'max'  => '120',
									'step' => '1',
									'suffix' => 'px'
								),
							'suffix' => 'px',
						),

					'text_color' => array(
							'type' => 'color',
							'label' => 'Text Color',
							'default' => '',
							'selector' => '.cl-icon-text',
							'css_property' => 'color',
							'alpha' => true,
					),

					'icon_color' => array(
							'type' => 'color',
							'label' => 'Icon Color',
							'default' => codeless_get_mod( 'primary_color' ),
							'selector' => '.cl-icon-text i',
							'css_property' => 'color',
							'alpha' => true,
					),

			),
			
		));

		/* Text */
		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Text', 'june' ),
			'section'     => 'cl_codeless_header_builder',
			//'priority'    => 10,
			'icon'		  => 'icon-software-font-smallcaps',
			'transport'   => 'postMessage',
			'settings'    => 'cl_header_text',

			'fields' => array(
				'content' => array(
					'type'     => 'text',
					'priority' => 10,
					'selector' => '.cl-text',
					'label'       => esc_attr__( 'Text', 'june' ),
					'description' => esc_attr__( 'This will be the label for your link', 'june' ),
					'default'     => 'Text El',
					'reloadTemplate' => true
				),

				'link' => array(
					'type'     => 'text',
					'priority' => 10,
					'label'       => esc_attr__( 'Link', 'june' ),
				),

				'hide_responsive' => array(
								'type'        => 'switch',
								'label'       => esc_html__( 'Hide on Responsive', 'june' ),
								'description' => 'Switch On to hide from responsive Header',
								'default'     => 0,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'june' ),
									'off' => esc_attr__( 'Off', 'june' ),
								),
								'reloadTemplate' => true
				), 

				'margin_paragraphs' => array(
	
							'type' => 'slider',
							'label' => 'Distance between paragraphs',
							'default' => '10',
							'selector' => '.cl-text p',
							'css_property' => array('margin-top', 'margin-bottom'),
							'choices'     => array(
								'min'  => '0',
								'max'  => '40',
								'step' => '1',
								'suffix' => 'px'
							),
							'suffix' => 'px',
						),

				'typography_start' => array(
						'type' => 'group_start',
						'label' => 'Typography',
						'groupid' => 'typography'
					),

					'custom_typography' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Custom Typography', 'june' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
						),

					
					'text_font_family' => array(
	
							'type' => 'inline_select',
							'label' => 'Font Family',
							'default' => 'theme_default',
							'selector' => '.cl-text',
							'css_property' => 'font-family',
							'choices'     => codeless_get_google_fonts(),
							'cl_required'    => array(
								array(
									'setting'  => 'custom_typography',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),

					'text_font_size' => array(
	
							'type' => 'slider',
							'label' => 'Text Font Size',
							'default' => '14',
							'selector' => '.cl-text',
							'css_property' => 'font-size',
							'choices'     => array(
								'min'  => '12',
								'max'  => '72',
								'step' => '1',
								'suffix' => 'px'
							),
							'suffix' => 'px',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_typography',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),

					'text_font_weight' => array(
	
							'type' => 'inline_select',
							'label' => 'Title Font Weight',
							'default' => '400',
							'selector' => '.cl-text',
							'css_property' => 'font-weight',
							'choices'     => array(
								'100' => '100',
								'200' => '200',
								'300' => '300',
								'400' => '400',
								'500' => '500',
								'600' => '600',
								'700' => '700',
								'800' => '800'
							),
							'cl_required'    => array(
								array(
									'setting'  => 'custom_typography',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),
						
					'text_line_height' => array(
	
							'type' => 'slider',
							'label' => 'Line Height',
							'default' => '20',
							'selector' => '.cl-text',
							'css_property' => 'line-height',
							'choices'     => array(
								'min'  => '20',
								'max'  => '100',
								'step' => '1',
								'suffix' => 'px'
							),
							'suffix' => 'px',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_typography',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),
					
					'text_transform' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Text Transform', 'june' ),
							'default'     => 'none',
							'selector' => '.cl-text',
							'css_property' => 'text-transform',
							'choices' => array(
								'none' => 'None',
								'uppercase' => 'Uppercase'
							),
							'cl_required'    => array(
								array(
									'setting'  => 'custom_typography',
									'operator' => '==',
									'value'    => 1,
								),
							),
							
						),

						'text_letterspace' => array(
		
								'type' => 'slider',
								'label' => 'Letter-Spacing',
								'default' => '0',
								'selector' => '.cl-text',
								'css_property' => 'letter-spacing',
								'choices'     => array(
									'min'  => '0',
									'max'  => '4',
									'step' => '0.05',
									'suffix' => 'px'
								),
								'suffix' => 'px',
								'cl_required'    => array(
									array(
										'setting'  => 'custom_typography',
										'operator' => '==',
										'value'    => 1,
									),
								),
							),
						

						'text_color' => array(
							'type' => 'color',
							'label' => 'Color',
							'default' => '',
							'selector' => '.cl-text',
							'css_property' => 'color',
							'alpha' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'custom_typography',
									'operator' => '==',
									'value'    => 1,
								),
							),
					),
					
						
				

				'typography_end' => array(
						'type' => 'group_end',
						'label' => 'Typography',
						'groupid' => 'typography'
				),


					'animation_start' => array(
						'type' => 'group_start',
						'label' => 'Animation',
						'groupid' => 'animation'
					),
					
						'animation' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Animation Effect', 'june' ),
							'default'     => 'none',
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
							'selector' => '.cl-text'
						),
						
						'animation_delay' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Animation Delay', 'june' ),
							'default'     => 'none',
							'choices' => array(
								'none'	=> 'None',
								'100' =>	'ms 100',
								'200' =>	'ms 200',
								'300' =>	'ms 300',
								'400' =>	'ms 400',
								'500' =>	'ms 500',
								'600' =>	'ms 600',
								'700' =>	'ms 700',
								'800' =>	'ms 800',
								'900' =>	'ms 900',
								'1000' =>	'ms 1000',
								'1100' =>	'ms 1100',
								'1200' =>	'ms 1200',
								'1300' =>	'ms 1300',
								'1400' =>	'ms 1400',
								'1500' =>	'ms 1500',
								'1600' =>	'ms 1600',
								'1700' =>	'ms 1700',
								'1800' =>	'ms 1800',
								'1900' =>	'ms 1900',
								'2000' =>	'ms 2000',
							
							),
							'selector' => '.cl-text',
							'htmldata' => 'delay',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
						),
						
						'animation_speed' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Animation Speed', 'june' ),
							'default'     => '400',
							'choices' => array(
								'none'	=> 'None',
								'100' =>	'ms 100',
								'200' =>	'ms 200',
								'300' =>	'ms 300',
								'400' =>	'ms 400',
								'500' =>	'ms 500',
								'600' =>	'ms 600',
								'700' =>	'ms 700',
								'800' =>	'ms 800',
								'900' =>	'ms 900',
								'1000' =>	'ms 1000'
								
							
							),
							'selector' => '.cl-text',
							'htmldata' => 'speed',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
						),
					
					'animation_end' => array(
						'type' => 'group_end',
						'label' => 'Animation',
						'groupid' => 'animation'
					),
			),
			
		) );


		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Widget Sidebar', 'june' ),
			'section'     => 'cl_codeless_header_builder',
			'priority'    => 10,
			'transport'   => 'postMessage',
			'icon'		  => 'icon-basic-gear',
			'settings'    => 'cl_header_widget',
			'fields'	  => array(
					
					'widget_sidebar' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Widgetized Area', 'june' ),
							'description' => esc_attr__( 'Select the widgetized area that you want to add', 'june' ),
							'default'     => '',
							'choices' => codeless_get_registered_sidebars(),
							'reloadTemplate' => true,
						),

				
					'text_color' => array(
							'type' => 'color',
							'label' => 'Color',
							'default' => '#ffffff',
							'selector' => '.widgetized',
							'css_property' => 'color',
							'alpha' => true,
					),

			),
			
		));

		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Search', 'june' ),
			'section'     => 'cl_codeless_header_builder',
			'priority'    => 10,
			'transport'   => 'postMessage',
			'icon'		  => 'icon-basic-gear',
			'settings'    => 'cl_header_search',
			'fields'	  => array(

				'style' => array( 
						'type'        => 'inline_select',
						'label'       => esc_html__( 'Style', 'june' ),
						'description' => '',
						'default'     => 'with_categories',
						'priority'    => 10,
						'choices'     => array(
							'with_categories'  => esc_attr__( 'With Categories', 'june' ),
							'simple_white' => esc_attr__( 'Simple White', 'june' ),
							'simple_transparent' => esc_attr__( 'Simple Transparent', 'june' ),
						),
						'selector' => '.search-element',
						'selectClass' => 'style-',
						'reloadTemplate' => true,
				),


				

				'quick_search' => array( 
						'type'        => 'switch',
						'label'       => esc_html__( 'With Quick Search', 'june' ),
						'description' => '',
						'default'     => 0,
						'priority'    => 10,
						'choices'     => array(
							'on'  => esc_attr__( 'On', 'june' ),
							'off' => esc_attr__( 'Off', 'june' ),
						),
						'reloadTemplate' => true,
						'cl_required'    => array(
								array(
									'setting'  => 'style',
									'operator' => '==',
									'value'    => 'with_categories',
								),
						),
				),

				'search_input_width' => array(
	
							'type' => 'slider',
							'label' => 'Search Input Width',
							'default' => '380',
							'selector' => '.search-element .input-search-field',
							'css_property' => 'width',
							'choices'     => array(
								'min'  => '120',
								'max'  => '1200',
								'step' => '1',
								'suffix' => 'px'
							),
							'suffix' => 'px',
							
				),


				'hide_mobile' => array(
								'type'        => 'switch',
								'label'       => esc_html__( 'Hide on Mobile', 'june' ),
								'description' => 'Switch On to hide from mobile header',
								'default'     => 0,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'june' ),
									'off' => esc_attr__( 'Off', 'june' ),
								),
								'reloadTemplate' => true,
								'selector' => '.search-element',
								'addClass' => 'hide-mobile'
					), 




			),
			
		));
?>