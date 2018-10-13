<?php

Kirki::add_panel( 'cl_footer', array(
		'priority' => 10,
	    'type' => '',
	    'title'       => esc_html__( 'Footer', 'june' ),
	    'tooltip' => esc_html__( 'Footer Options and Layout', 'june' ),
	) );


Kirki::add_section('cl_footer_general', array(
	'title' => esc_html__('General', 'june') ,
	'tooltip' => esc_html__('General Footer Options', 'june') ,
	'panel' => 'cl_footer',
	'type' => '',
	'priority' => 160,
	'capability' => 'edit_theme_options'
));


		Kirki::add_field( 'cl_june', array(
			'settings' => 'show_footer',
			'label'    => esc_html__( 'Show Footer', 'june' ),
			'tooltip' => esc_html__( 'Switch On/Off Footer on website', 'june' ),
			'section'  => 'cl_footer_general',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'june' ),
				0 => esc_attr__( 'Off', 'june' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'footer_show' => array(
		            'selector'            => '#footer-wrapper',
		            'container_inclusive' => true,
		            'render_callback'     => 'codeless_show_footer'
		        ),
		    ),
		
		) );
		
		Kirki::add_field( 'cl_june', array(
			'settings' => 'footer_fullwidth',
			'label'    => esc_html__( 'Footer Fullwidth', 'june' ),
			'tooltip' => esc_html__( 'Switch On if you want footer content without container', 'june' ),
			'section'  => 'cl_footer_general',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'june' ),
				0 => esc_attr__( 'Off', 'june' ),
			),
			'transport' => 'postMessage',
		    'required'    => array(
				array(
					'setting'  => 'show_footer',
					'operator' => '==',
					'value'    => true,
				),
							
			),
		));
		
		Kirki::add_field( 'cl_june', array(
			'settings' => 'footer_layout',
			'label'    => esc_html__( 'Footer Layout', 'june' ),
			'tooltip' => esc_html__( 'Use this option to change layout of footer. You can use the UI on the page too.', 'june' ),
			'section'  => 'cl_footer_general',
			'type'     => 'select',
			'priority' => 10,
			'default'  => '14_16_16_16_14',
			'choices'     => array(
			    '16_16_16_16_16_16'  => esc_attr__( '6 Columns', 'june' ),
			    '16_16_16_16_13'  => esc_attr__( '4 cols (1/6) and 1 col (1/3)', 'june' ),
			    '14_16_16_16_14'  => esc_attr__( '1 col (1/4), 3 col (1/6) and 1 col (1/4)', 'june' ),
			    '13_16_16_13'  => esc_attr__( '1 col (1/3), 2 col (1/6) and 1 col (1/3)', 'june' ),
				'14_14_14_14'  => esc_attr__( '4 Columns', 'june' ),
				'13_13_13'  => esc_attr__( '3 Columns', 'june' ),
				'12_12'  => esc_attr__( '2 Columns', 'june' ),
				'11'  => esc_attr__( '1 Column', 'june' ),
				'14_34'  => esc_attr__( '1/4 3/4', 'june' ),
				'34_14'  => esc_attr__( '3/4 1/4', 'june' ),
				'13_23'  => esc_attr__( '1/3 2/3', 'june' ),
				'23_13'  => esc_attr__( '2/3 1/3', 'june' ),
			),
			'transport' => 'postMessage',
			'required'    => array(
				array(
					'setting'  => 'show_footer',
					'operator' => '==',
					'value'    => true,
				),
							
			),
			'partial_refresh' => array(
		        'footer_layout' => array(
		            'selector'            => 'footer#colophon .footer-content-row',
		            'render_callback'     => 'codeless_build_footer_layout'
		        ),
		    ),
		) );


		Kirki::add_field( 'cl_june', array(
			'settings' => 'footer_centered_content',
			'label'    => esc_html__( 'Footer Centered Content', 'june' ),
			'tooltip' => esc_html__( 'Switch to center content of column', 'june' ),
			'section'  => 'cl_footer_general',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'june' ),
				0 => esc_attr__( 'Off', 'june' ),
			),
			'transport' => 'required',
			'required'    => array(
				array(
					'setting'  => 'footer_layout',
					'operator' => '==',
					'value'    => '11',
				),
							
			),
		
		) );


		Kirki::add_field( 'cl_june', array(
			'settings' => 'show_quicksearches',
			'label'    => esc_html__( 'Show Quick Searches', 'june' ),
			'tooltip' => esc_html__( 'Show quick searches in footer', 'june' ),
			'section'  => 'cl_footer_general',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'june' ),
				0 => esc_attr__( 'Off', 'june' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'quicksearches_show' => array(
		            'selector'            => '#footer-wrapper',
		            'container_inclusive' => true,
		            'render_callback'     => 'codeless_show_footer'
		        ),
		    ),
		
		) );

		Kirki::add_field( 'cl_june', array(
			'settings' => 'show_instagram_feed',
			'label'    => esc_html__( 'Show Instagram Feed', 'june' ),
			'tooltip' => esc_html__( 'Configure Access Token and User Id', 'june' ),
			'section'  => 'cl_footer_general',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'june' ),
				0 => esc_attr__( 'Off', 'june' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'copyright_show' => array(
		            'selector'            => '#footer-wrapper',
		            'container_inclusive' => true,
		            'render_callback'     => 'codeless_show_footer'
		        ),
		    ),
		
		) );



		Kirki::add_field( 'cl_june', array(
			'settings' => 'show_instagram_feed_token',
			'label'    => esc_html__( 'Instagram Feed Token', 'june' ),
			'tooltip' => esc_html__( '', 'june' ),
			'section'  => 'cl_footer_general',
			'type'     => 'text',
			'priority' => 10,
			'default'  => '',
			'choices'     => array(
				1  => esc_attr__( 'On', 'june' ),
				0 => esc_attr__( 'Off', 'june' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'copyright_show' => array(
		            'selector'            => '#footer-wrapper',
		            'container_inclusive' => true,
		            'render_callback'     => 'codeless_show_footer'
		        ),
		    ),

		
		) );

		Kirki::add_field( 'cl_june', array(
			'settings' => 'show_instagram_feed_userid',
			'label'    => esc_html__( 'Instagram Feed User Id', 'june' ),
			'tooltip' => esc_html__( '', 'june' ),
			'section'  => 'cl_footer_general',
			'type'     => 'text',
			'priority' => 10,
			'default'  => '',
			'choices'     => array(
				1  => esc_attr__( 'On', 'june' ),
				0 => esc_attr__( 'Off', 'june' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'copyright_show' => array(
		            'selector'            => '#footer-wrapper',
		            'container_inclusive' => true,
		            'render_callback'     => 'codeless_show_footer'
		        ),
		    ),

		
		) );


		Kirki::add_field( 'cl_june', array(
			'settings' => 'show_copyright',
			'label'    => esc_html__( 'Show Copyright', 'june' ),
			'tooltip' => esc_html__( 'Switch On/Off Copyright on website', 'june' ),
			'section'  => 'cl_footer_general',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'june' ),
				0 => esc_attr__( 'Off', 'june' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'copyright_show' => array(
		            'selector'            => '#footer-wrapper',
		            'container_inclusive' => true,
		            'render_callback'     => 'codeless_show_footer'
		        ),
		    ),
		
		) );

		Kirki::add_field( 'cl_june', array(
			'settings' => 'footer_reveal_effect',
			'label'    => esc_html__( 'Footer Reveal Effect', 'june' ),
			'tooltip' => esc_html__( 'Switch On/Off to activate reveal footer effect', 'june' ),
			'section'  => 'cl_footer_general',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'june' ),
				0 => esc_attr__( 'Off', 'june' ),
			),
			'transport' => 'postMessage'
		
		) );

		Kirki::add_field( 'cl_june', array(
			'type'        => 'number',
			'settings'    => 'footer_widget_distance',
			'label'       => esc_attr__( 'Distance between widgets', 'june' ),
			'section'     => 'cl_footer_general',
			'into_group' => true,
			'default'     => '12',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'footer#colophon .widget',
					'units'  => 'px',
					'property' => 'padding-top'
				),
				array(
					'element' => 'footer#colophon .widget',
					'units'  => 'px',
					'property' => 'padding-bottom'
				),

			)
		));

		Kirki::add_field( 'cl_june', array(
			'settings' => 'footer_dark',
			'label'    => esc_html__( 'Footer Dark Style', 'june' ),
			'tooltip' => esc_html__( 'Switch On/Off Footer Dark Style Elements', 'june' ),
			'section'  => 'cl_footer_general',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'june' ),
				0 => esc_attr__( 'Off', 'june' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'copyright_show' => array(
		            'selector'            => '#footer-wrapper',
		            'container_inclusive' => true,
		            'render_callback'     => 'codeless_show_footer'
		        ),
		    ),
		
		) );


Kirki::add_section('cl_footer_design', array(
	'title' => esc_html__('Main Footer Style', 'june') ,
	'tooltip' => esc_html__('Main Footer Design Options', 'june') ,
	'panel' => 'cl_footer',
	'type' => '',
	'priority' => 160,
	'capability' => 'edit_theme_options'
));

		Kirki::add_field('cl_june', array(
			'settings' => 'footer_design',
			'label' => esc_html__('Footer Box Design', 'june') ,
			'section' => 'cl_footer_design',
			'type' => 'css_tool',
			'priority' => 1,
			'default' => array(
				'padding-top' => '50px',
				'padding-bottom' => '35px'
			) ,
			'into_group' => true,
			'transport' => 'postMessage',
		));


		Kirki::add_field('cl_june', array(
			'type' => 'select',
			'settings' => 'footer_border_style',
			'label' => 'Outer Border Style',
			'default' => 'solid',
			'choices' => array(
				'solid' => 'solid',
				'dotted' => 'dotted',
				'dashed' => 'dashed',
				'double' => 'double',
				'groove' => 'groove',
				'ridge' => 'ridge',
				'inset' => 'inset',
				'outset' => 'outset',
			) ,
			'priority' => 1,
			'inline_control' => true,
			'section' => 'cl_footer_design',
			'priority' => 1,
			'output' => array(
				array(
					'element' => 'footer#colophon',
					'property' => 'border-style'
				)
			) ,
			'transport' => 'auto'
		));

		Kirki::add_field('cl_june', array(
			'type' => 'color',
			'settings' => 'footer_outer_border_color',
			'label' => 'Outer Border Color',
			'default' => '#dbe1e6',
			'inline_control' => true,
			'section' => 'cl_footer_design',
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'priority' => 1,
			'output' => array(
				array(
					'element' => 'footer#colophon, .footer-quick-searches-content-row .inner',
					'property' => 'border-color'
				)
			) ,
			'transport' => 'auto'
		));


		Kirki::add_field( 'cl_june', array(
		    'type' => 'color',
		    'settings' => 'footer_bg_color',
			'label' => 'BG Color',
			'default' => '#fff',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'priority' => 2,
			'section'  => 'cl_footer_design',
			'output' => array(
				array(
					'element' => 'footer#colophon, #copyright input, #copyright select, #copyright textarea ',
					'property' => 'background-color'
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	Kirki::add_field( 'cl_june', array(
		    'type' => 'color',
		    'settings' => 'footer_dark_bg_color',
			'label' => 'Second Color',
			'tooltip' => 'Used for inputs, textarea and other more darken area',
			'default' => '#fff',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'priority' => 2,
			'section'  => 'cl_footer_design',
			'output' => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'footer_dark_bg_color' ),
					'property' => 'background-color'
				),
				
			),
		    'transport' => 'auto'
    	));

    	Kirki::add_field( 'cl_june', array(
		    'type' => 'color',
		    'settings' => 'footer_button_bg_color',
			'label' => 'Button BG Color',
			'tooltip' => 'Used for buttons',
			'default' => '#fff',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'priority' => 2,
			'section'  => 'cl_footer_design',
			'output' => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'footer_button_bg_color' ),
					'property' => 'background-color'
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	
    	Kirki::add_field( 'cl_june', array(
			'type'        => 'typography',
			'settings'    => 'main_footer_title_typography',
			'label'       => esc_attr__( 'Main Footer Title Typography', 'june' ),
			'section'     => 'cl_footer_design',
			'into_group' => true,
			'default'     => array(
				'font-family'    => 'Montserrat',
				'letter-spacing' => '0.04em',
				'font-weight' => '600',
				'text-transform' => 'uppercase',
				'font-size' => '14px',
				'line-height' => '28px',
				'color' => '#262a2c'
			),
			'priority'    => 10,
			'show_subsets' => false,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'main_footer_title_typography' )
				),

			)
		));
		
		Kirki::add_field( 'cl_june', array(
			'type'        => 'color',
			'settings'    => 'footer_font_color',
			'label'       => esc_attr__( 'Body Font Color', 'june' ),
			'section'     => 'cl_footer_design',
			'into_group' => true,
			'inline_control' => true,
			'default'     => '#8b99a3',
			'priority' => 2,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'footer#colophon, footer#colophon.widget_most_popular li .content .date',
					'property' => 'color'
				),

			)
		));
		
		Kirki::add_field( 'cl_june', array(
			'type'        => 'color',
			'settings'    => 'footer_link_color',
			'label'       => esc_attr__( 'Link Color', 'june' ),
			'section'     => 'cl_footer_design',
			'into_group' => true,
			'inline_control' => true,
			'default'     => '#8b99a3',
			'priority' => 2,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'footer#colophon a:not(.cl-btn), footer#colophon .widget_rss cite,  footer#colophon .widget_calendar thead th',
					'property' => 'color',
					'suffix' => ' !important'
				),

			)
		));
		
		Kirki::add_field( 'cl_june', array(
			'type'        => 'color',
			'settings'    => 'footer_link_color_hover',
			'label'       => esc_attr__( 'Link Hover Color', 'june' ),
			'section'     => 'cl_footer_design',
			'into_group' => true,
			'inline_control' => true,
			'default'     => '#262a2c',
			'priority' => 2,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'footer#colophon a:hover',
					'property' => 'color',
					'suffix' => ' !important'
				),

			)
		));
		
		Kirki::add_field( 'cl_june', array(
			'type'        => 'color',
			'settings'    => 'footer_border_color',
			'label'       => esc_attr__( 'Inner Borders Color', 'june' ),
			'section'     => 'cl_footer_design',
			'into_group' => true,
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'default'     => '#dbe1e6',
			'priority' => 2,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'footer_border_color' ),
					'property' => 'border-color'
				),

			)
		));
		

		Kirki::add_section('cl_footer_copyright', array(
			'title' => esc_html__('Copyright Style', 'june') ,
			'tooltip' => esc_html__('Copyright Design Options', 'june') ,
			'panel' => 'cl_footer',
			'type' => '',
			'priority' => 160,
			'capability' => 'edit_theme_options'
		));
		
		Kirki::add_field( 'cl_june', array(
		    'type' => 'color',
		    'settings' => 'copyright_bg_color',
			'label' => 'BG Color',
			'default' => '#fff',
			'inline_control' => true,
			'alpha' => false,
			'section'  => 'cl_footer_copyright',
			'output' => array(
				array(
					'element' => '#copyright',
					'property' => 'background-color'
				),
				
			),
		    'transport' => 'auto'
    	));
    	

		Kirki::add_field( 'cl_june', array(
			'type'        => 'typography',
			'settings'    => 'copyright_title_typography',
			'label'       => esc_attr__( 'Copyright Title Typography', 'june' ),
			'section'     => 'cl_footer_copyright',
			'into_group' => true,
			'default'     => array(
				'font-family'    => 'Montserrat',
				'letter-spacing' => '0.04em',
				'font-weight' => '400',
				'text-transform' => 'uppercase',
				'font-size' => '14px',
				'line-height' => '18px',
				'color' => '#262a2c'
			),
			'priority'    => 10,
			'show_subsets' => false,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'copyright_title_typography' )
				),

			)
		));
		
		Kirki::add_field( 'cl_june', array(
			'type'        => 'color',
			'settings'    => 'copyright_link_color',
			'label'       => esc_attr__( 'Link Color', 'june' ),
			'section'     => 'cl_footer_copyright',
			'into_group' => true,
			'inline_control' => true,
			'default'     => '#262a2c',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => '#copyright a',
					'property' => 'color',
					'suffix' => ' !important'
				),

			)
		));
		
		Kirki::add_field( 'cl_june', array(
			'type'        => 'color',
			'settings'    => 'copyright_link_color_hover',
			'label'       => esc_attr__( 'Link Hover Color', 'june' ),
			'section'     => 'cl_footer_copyright',
			'into_group' => true,
			'inline_control' => true,
			'default'     => '#262a2c',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => '#copyright a:hover',
					'property' => 'color',
					'suffix' => ' !important'
				),

			)
		));

		Kirki::add_field( 'cl_june', array(
			'type'        => 'color',
			'settings'    => 'copyright_border_color',
			'label'       => esc_attr__( 'Borders Color', 'june' ),
			'section'     => 'cl_footer_copyright',
			'into_group' => true,
			'inline_control' => true,
			'default'     => '#fff',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'copyright_border_color' ),
					'property' => 'border-color'
				),

			)
		));

		
		Kirki::add_field( 'cl_june', array(
			'type'        => 'number',
			'settings'    => 'copyright_padding_top',
			'label'       => esc_attr__( 'Content Distance From Top', 'june' ),
			'section'     => 'cl_footer_copyright',
			'into_group' => true,
			'default'     => '25',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => '#copyright',
					'units'  => 'px',
					'property' => 'padding-top'
				),

			)
		));
		
		Kirki::add_field( 'cl_june', array(
			'type'        => 'number',
			'settings'    => 'copyright_padding_bottom',
			'label'       => esc_attr__( 'Content Distance From Bottom', 'june' ),
			'section'     => 'cl_footer_copyright',
			'into_group' => true,
			'default'     => '25',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => '#copyright',
					'units'  => 'px',
					'property' => 'padding-bottom'
				),

			)
		));


		Kirki::add_field( 'cl_june', array(
			'settings' => 'copyright_border_top',
			'label'    => esc_html__( 'Add Inner Border Top', 'june' ),
			'tooltip' => esc_html__( 'Switch on to add inner border top', 'june' ),
			'section'  => 'cl_footer_copyright',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'june' ),
				0 => esc_attr__( 'Off', 'june' ),
			),
			'transport' => 'postMessage'
		
		) );




		Kirki::add_section('cl_top_footer_style', array(
			'title' => esc_html__('Top Footer Style', 'june') ,
			'tooltip' => esc_html__('Top Footer Style Options', 'june') ,
			'panel' => 'cl_footer',
			'type' => '',
			'priority' => 160,
			'capability' => 'edit_theme_options'
		));
		
		Kirki::add_field( 'cl_june', array(
		    'type' => 'color',
		    'settings' => 'topfooter_bg_color',
			'label' => 'BG Color',
			'default' => '#262a2c',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_top_footer_style',
			'output' => array(
				array(
					'element' => '#top_footer',
					'property' => 'background-color'
				),
				
			),
		    'transport' => 'auto'
    	));
    	

		Kirki::add_field( 'cl_june', array(
			'type'        => 'typography',
			'settings'    => 'topfooter_title_typography',
			'label'       => esc_attr__( 'Top Footer Title Typography', 'june' ),
			'section'     => 'cl_top_footer_style',
			'into_group' => true,
			'default'     => array(
				'font-family'    => 'Karla',
				'letter-spacing' => '0.04em',
				'font-weight' => '400',
				'text-transform' => 'none',
				'font-size' => '16px',
				'line-height' => '30px',
				'color' => '#fff'
			),
			'priority'    => 10,
			'show_subsets' => false,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'top_footer_title_typography' )
				),

			)
		));
		
		Kirki::add_field( 'cl_june', array(
			'type'        => 'color',
			'settings'    => 'topfooter_link_color',
			'label'       => esc_attr__( 'Link Color', 'june' ),
			'section'     => 'cl_top_footer_style',
			'into_group' => true,
			'inline_control' => true,
			'default'     => '#F2F4F6',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => '#top_footer a:not(.tag-cloud-link)',
					'property' => 'color',
					'suffix' => ' !important'
				),

			)
		));
		
		Kirki::add_field( 'cl_june', array(
			'type'        => 'color',
			'settings'    => 'topfooter_link_color_hover',
			'label'       => esc_attr__( 'Link Hover Color', 'june' ),
			'section'     => 'cl_top_footer_style',
			'into_group' => true,
			'inline_control' => true,
			'default'     => '#55ACEE',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => '#top_footer a:hover',
					'property' => 'color',
					'suffix' => ' !important'
				),

			)
		));

		Kirki::add_field( 'cl_june', array(
			'type'        => 'color',
			'settings'    => 'topfooter_border_color',
			'label'       => esc_attr__( 'Borders Color', 'june' ),
			'section'     => 'cl_top_footer_style',
			'into_group' => true,
			'inline_control' => true,
			'default'     => '#dbe1e6',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'topfooter_border_color' ),
					'property' => 'border-color'
				),

			)
		));

		
		Kirki::add_field( 'cl_june', array(
			'type'        => 'number',
			'settings'    => 'topfooter_padding_top',
			'label'       => esc_attr__( 'Content Distance From Top', 'june' ),
			'section'     => 'cl_top_footer_style',
			'into_group' => true,
			'default'     => '38',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => '#top_footer',
					'units'  => 'px',
					'property' => 'padding-top'
				),

			)
		));
		
		Kirki::add_field( 'cl_june', array(
			'type'        => 'number',
			'settings'    => 'topfooter_padding_bottom',
			'label'       => esc_attr__( 'Content Distance From Bottom', 'june' ),
			'section'     => 'cl_top_footer_style',
			'into_group' => true,
			'default'     => '37',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => '#top_footer',
					'units'  => 'px',
					'property' => 'padding-bottom'
				),

			)
		));


		Kirki::add_field( 'cl_june', array(
			'settings' => 'topfooter_border_top',
			'label'    => esc_html__( 'Add Border Top', 'june' ),
			'tooltip' => esc_html__( 'Switch on to add border top', 'june' ),
			'section'  => 'cl_top_footer_style',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'june' ),
				0 => esc_attr__( 'Off', 'june' ),
			),
			'transport' => 'postMessage'
		
		) );


		Kirki::add_field( 'cl_june', array(
			'settings' => 'topfooter_unique_style',
			'label'    => esc_html__( 'Unique Centered Style Widget', 'june' ),
			'tooltip' => esc_html__( 'By activate this option, the top footer area will be shown centered with a background image. You can change the Content of this area on Widgets -> Top Footer Left.', 'june' ),
			'section'  => 'cl_top_footer_style',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'june' ),
				0 => esc_attr__( 'Off', 'june' ),
			),
			'transport' => 'postMessage'
		
		) );


		Kirki::add_field('cl_june', array(
			'settings' => 'topfooter_unique_style_bg',
			'label' => esc_html__('Background of highlighted section', 'june') ,
			'tooltip' => esc_html__('', 'june') ,
			'section' => 'cl_top_footer_style',
			'type' => 'image',
			'priority' => 10,
			'default' => '',
			'required' => array(
				array(
					'setting' => 'topfooter_unique_style',
					'operator' => '==',
					'value' => 1,
				) ,
			) ,
			'transport' => 'auto',
			'output' => array(
				array(
					'element' => '.topfooter-unique-style',
					'property' => 'background-image'
				)
			),
		));

?>