<?php
    
    Kirki::add_section( 'cl_styling', array(
    	    'title'          => esc_html__( 'Styling', 'june' ),
    	    'tooltip'    => esc_html__( 'All theme styling options', 'june' ),
    	    'type'			 => '',
    	    'capability'     => 'edit_theme_options'
    	) );
		
		
		
		Kirki::add_field( 'cl_june', array(
		    
		    'settings' => 'general_style_title',
		    'label'    => esc_html__( 'General', 'june' ),
		    'section'  => 'cl_styling',
		    'type'     => 'grouptitle',
		 
		));
		
	
	    Kirki::add_field( 'cl_june', array(
		    'type' => 'color',
		    'settings' => 'primary_color',
			'label' => 'Primary Accent Color',
			'default' => '#eb5a46',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'primary_color', 'color' ),
					'property' => 'color',
					'suffix' => '!important'
				),
				array(
				    'element' => codeless_dynamic_css_register_tags( 'primary_color', 'background_color' ),
				    'property' => 'background-color',
				),
				array(
				    'element' => codeless_dynamic_css_register_tags( 'primary_color', 'border-color' ),
				    'property' => 'border-color' 
				)
			),
		    'transport' => 'auto'
    	));

    	Kirki::add_field( 'cl_june', array(
		    'type' => 'color',
		    'settings' => 'secondary_color',
			'label' => 'Secondary Accent Color',
			'tooltip' => 'Will be shown on color palette for use over the page. Please Refresh the builder, it can\'t display directly.',
			'default' => '#a8db51',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
		    'output' => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'secondary_color', 'color' ),
					'property' => 'color',
					'suffix' => '!important'
				),
				array(
				    'element' => codeless_dynamic_css_register_tags( 'secondary_color', 'background_color' ),
				    'property' => 'background-color' 
				),
				array(
				    'element' => codeless_dynamic_css_register_tags( 'secondary_color', 'border-color' ),
				    'property' => 'border-color'
				)
			),
		    'transport' => 'auto'
    	));
    	
    	Kirki::add_field( 'cl_june', array(
		    'type' => 'color',
		    'settings' => 'border_accent_color',
			'label' => 'Border Accent Color',
			'default' => '#dbe1e6',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'border_accent_color', 'border-color' ),
					'property' => 'border-color',
					'suffix' => '!important'
				),
				array(
					'element' => codeless_dynamic_css_register_tags( 'border_accent_color', 'background-color' ),
					'property' => 'background-color',
					'suffix' => '!important'
				)
			),
		    'transport' => 'auto'
    	));
    	
    	Kirki::add_field( 'cl_june', array(
		    'type' => 'color',
		    'settings' => 'labels_accent_color',
			'label' => 'Labels, Span accent color',
			'tooltip' => 'Used for prepended text (In, By, etc..), counter ("3" categories for example), quote icon, current pagination and more.',
			'default' => '#c1cad1',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'labels_accent_color' ),
					'property' => 'color'
				)
			),
		    'transport' => 'auto' 
    	));
    	
    	Kirki::add_field( 'cl_june', array(
		    'type' => 'color',
		    'settings' => 'highlight_light_color',
			'label' => 'Highlighted area light',
			'tooltip' => 'Areas like pagination buttons and other areas with light color highlight',
			'default' => '#f2f4f6',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'highlight_light_color', 'background-color' ),
					'property' => 'background-color'
				)
			),
		    'transport' => 'auto'
    	));

    	Kirki::add_field( 'cl_june', array(
		    'type' => 'color',
		    'settings' => 'highlight_light_color_hover',
			'label' => 'Highlighted area light Hover',
			'tooltip' => 'Hover Background Color on some highlighted areas',
			'default' => '#dbe1e6',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'highlight_light_color_hover', 'background-color' ),
					'property' => 'background-color'
				)
			),
		    'transport' => 'auto'
    	));

    	
    	
    	Kirki::add_field( 'cl_june', array(
		    'type' => 'color',
		    'settings' => 'highlight_dark_color',
			'label' => 'Highlighted area dark',
			'tooltip' => 'Areas like loadmore button or small links like categories, widgets links, quote text and more.',
			'default' => '#262a2c',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'highlight_dark_color', 'color' ),
					'property' => 'color',
					'suffix' => ' !important'
				),
				array(
					'element' => codeless_dynamic_css_register_tags( 'highlight_dark_color', 'background-color' ),
					'property' => 'background-color'

				)
			),
		    'transport' => 'auto'
    	));
    	
    	Kirki::add_field( 'cl_june', array(
		    'type' => 'color',
		    'settings' => 'other_area_links',
			'label' => 'Links Color',
			'tooltip' => 'Other links that dont have the primary accent color, like sidebar links, cetegories links or date link',
			'default' => '#262a2c',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'other_area_links', 'color' ),
					'property' => 'color'
				)
			),
		    'transport' => 'auto'
    	));
    	
    	Kirki::add_field( 'cl_june', array(
		    'type' => 'color',
		    'settings' => 'layout_modern_bg_color',
			'label' => 'Modern Layout Sidebar BG Color',
			'tooltip' => 'Used only on modern layout with full sidebar.',
			'default' => '#f7f9fb',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.cl-layout-modern-bg',
					'property' => 'background-color'
				)
			),
		    'transport' => 'auto'
    	));

    	
			
		Kirki::add_field( 'cl_june', array(
		    
		    'settings' => 'general_style_div',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		
		));

		Kirki::add_field( 'cl_june', array(
		    
		    'settings' => 'body_background_title',
		    'label'    => esc_html__( 'Body Background', 'june' ),
		    'section'  => 'cl_styling',
		    'type'     => 'grouptitle',
		 
		));

		Kirki::add_field( 'cl_june', array(
		    'type' => 'color',
		    'settings' => 'body_bg_color',
			'label' => 'Body Overall Background Color',
			'default' => '',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => 'body',
					'property' => 'background-color',
					'suffix' => ''
				),
			),
		    'transport' => 'auto'
    	));

    	Kirki::add_field('cl_june', array(
			'type' => 'image',
			'label' => 'Background Image',
			'settings' => 'body_bg_image',
			'default' => '',
			'inline_control' => true,
			'section' => 'cl_styling',
			'transport' => 'auto',
			'output' => array(
				array(
					'element' => 'body',
					'property' => 'background-image'
				)
			),
		));

		Kirki::add_field('cl_june', array(
			'type' => 'select',
			'settings' => 'body_bg_pos',
			'label' => 'Background Position',
			'default' => 'left top',
			'choices' => array(
				'left top' => 'left top',
				'left center' => 'left center',
				'left bottom' => 'left bottom',
				'right top' => 'right top',
				'right center' => 'right center',
				'right bottom' => 'right bottom',
				'center top' => 'center top',
				'center center' => 'center center',
				'center bottom' => 'center bottom',
			) ,
			'inline_control' => true,
			'section' => 'cl_styling',
			'output' => array(
				array(
					'element' => 'body',
					'property' => 'background-position'
				)
			) ,
			'transport' => 'auto'
		));

		Kirki::add_field('cl_june', array(
			'type' => 'select',
			'settings' => 'body_bg_repeat',
			'label' => 'Background Repeat',
			'default' => 'no-repeat',
			'choices' => array(
				'repeat' => 'repeat',
				'repeat-x' => 'repeat-x',
				'repeat-y' => 'repeat-y',
				'no-repeat' => 'no-repeat'
			) ,
			'inline_control' => true,
			'section' => 'cl_styling',
			'output' => array(
				array(
					'element' => 'body',
					'property' => 'background-repeat'
				)
			) ,
			'transport' => 'auto'
		));

		Kirki::add_field('cl_june', array(
			'type' => 'select',
			'settings' => 'body_bg_attachment',
			'label' => 'Background Attachment',
			'default' => 'scroll',
			'choices' => array(
				'scroll' => 'scroll',
				'fixed' => 'fixed'
			) ,
			'inline_control' => true,
			'section' => 'cl_styling',
			'output' => array(
				array(
					'element' => 'body',
					'property' => 'background-attachment'
				)
			) ,
			'transport' => 'auto'
		));

		Kirki::add_field('cl_june', array(
			'type' => 'select',
			'settings' => 'body_bg_size',
			'label' => 'Background Size',
			'default' => 'auto',
			'choices' => array(
				'auto' => 'auto',
				'cover' => 'cover'
			) ,
			'inline_control' => true,
			'section' => 'cl_styling',
			'output' => array(
				array(
					'element' => 'body',
					'property' => 'background-size'
				)
			) ,
			'transport' => 'auto'
		));

		Kirki::add_field('cl_june', array(
			'type' => 'select',
			'settings' => 'body_bg_blend',
			'label' => 'Background Blend Mode',
			'default' => 'normal',
			'choices' => array(
				'normal' => 'normal',
				'multiply' => 'multiply',
				'screen' => 'screen',
				'overlay' => 'overlay',
				'darken' => 'darken',
				'lighten' => 'lighten',
				'color-dodge' => 'color-dodg',
				'color-burn' => 'color-burn',
				'hard-light' => 'hard-light',
				'soft-light' => 'soft-light',
				'difference' => 'difference',
				'exclusion' => 'exclusion',
				'hue' => 'hue',
				'saturation' => 'saturation',
				'color' => 'color',
				'luminosity' => 'luminosity',
			) ,
			'inline_control' => true,
			'section' => 'cl_styling',
			'output' => array(
				array(
					'element' => 'body',
					'property' => 'background-blend-mode'
				)
			) ,
			'transport' => 'auto'
		));

		Kirki::add_field( 'cl_june', array(
		    
		    'settings' => 'body_background_end_divider',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		
		));
		
		Kirki::add_field( 'cl_june', array(
		    
		    'settings' => 'typography_headings_style_title',
		    'label'    => esc_html__( 'Headings', 'june' ),
		    'section'  => 'cl_styling',
		    'type'     => 'grouptitle',
		 
		));
		
		Kirki::add_field( 'cl_june', array(
			'type'        => 'typography',
			'settings'    => 'headings_typo',
			'label'       => esc_attr__( 'General Headings Typography', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => array(
				'font-family'    => 'Montserrat',
			),
			'priority'    => 10,
			'show_subsets' => false,
			'show_variants' => false,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'headings_typo' ),
				),

			)
		));
		
		Kirki::add_field( 'cl_june', array(
			'type'        => 'number',
			'settings'    => 'h1_font_size',
			'label'       => esc_attr__( 'H1 Font Size', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '96',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h1:not(.custom_font), .h1',
					'units'  => 'px',
					'property' => 'font-size'
				),

			)
		));
		
		Kirki::add_field( 'cl_june', array(
			'type'        => 'number',
			'settings'    => 'h1_line_height',
			'label'       => esc_attr__( 'H1 Line-height', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '92',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h1:not(.custom_font), .h1',
					'units'  => 'px',
					'property' => 'line-height'
				),

			)
		));

		Kirki::add_field( 'cl_june', array(
			'type'        => 'select',
			'settings'    => 'h1_text_transform',
			'label'       => esc_attr__( 'H1 Text Transform', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => 'none',
			'priority'    => 10,
			'choices' => array(
				'none' => 'None',
				'uppercase' => 'Uppercase'
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h1:not(.custom_font), .h1',
					'units'  => '',
					'property' => 'text-transform'
				),

			)
		));

		Kirki::add_field( 'cl_june', array(
			'type'        => 'select',
			'settings'    => 'h1_font_weight',
			'label'       => esc_attr__( 'H1 Font Weight', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '700',
			'priority'    => 10,
			'choices' => array(
				'100' => '100',
				'200' => '200',
				'300' => '300',
				'400' => '400',
				'500' => '500',
				'600' => '600',
				'700' => '700',
				'800' => '800',
				'900' => '900',
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h1:not(.custom_font), .h1',
					'units'  => '',
					'property' => 'font-weight'
				),

			)
		));

		Kirki::add_field( 'cl_june', array(
			'type'        => 'number',
			'settings'    => 'h1_letter_space',
			'label'       => esc_attr__( 'H1 Letter Spacing', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h1:not(.custom_font), .h1',
					'units'  => 'px',
					'property' => 'letter-spacing'
				),

			),
			'choices'     => array(
				'min'  => 0,
				'max'  => 5,
				'step' => 0.05,
			),
		));
		
		
		Kirki::add_field( 'cl_june', array(
		    'type' => 'color',
		    'settings' => 'h1_dark_color',
			'label' => 'H1 Color (Dark)',
			'default' => '#262a2c',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => 'h1:not(.custom_font), .h1',
					'property' => 'color',
					'suffix' => ''
				),
				
			),
		    'transport' => 'auto'
    	));


    	
    	
    	Kirki::add_field( 'cl_june', array(
		    'type' => 'color',
		    'settings' => 'h1_light_color',
			'label' => 'H1 Color (Light)',
			'default' => '#ffffff',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.light-text h1:not(.custom_font), .light-text .h1',
					'property' => 'color',
					'suffix' => ' !important'
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	
    	Kirki::add_field( 'cl_june', array(
		    
		    'settings' => 'general_style_div_h2',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		    'choices'  => array('small' => 'true')
		
		));
    	
    	
    	
    	
    	Kirki::add_field( 'cl_june', array(
			'type'        => 'number',
			'settings'    => 'h2_font_size',
			'label'       => esc_attr__( 'H2 Font Size', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '60',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h2:not(.custom_font), .h2',
					'units'  => 'px',
					'property' => 'font-size'
				),

			)
		));
		
		Kirki::add_field( 'cl_june', array(
			'type'        => 'number',
			'settings'    => 'h2_line_height',
			'label'       => esc_attr__( 'H2 Line-height', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '56',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h2:not(.custom_font), .h2',
					'units'  => 'px',
					'property' => 'line-height'
				),

			)
		));

		Kirki::add_field( 'cl_june', array(
			'type'        => 'select',
			'settings'    => 'h2_text_transform',
			'label'       => esc_attr__( 'H2 Text Transform', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => 'none',
			'priority'    => 10,
			'choices' => array(
				'none' => 'None',
				'uppercase' => 'Uppercase'
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h2:not(.custom_font), .h2',
					'units'  => '',
					'property' => 'text-transform'
				),

			)
		));

		Kirki::add_field( 'cl_june', array(
			'type'        => 'select',
			'settings'    => 'h2_font_weight',
			'label'       => esc_attr__( 'H2 Font Weight', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '600',
			'priority'    => 10,
			'choices' => array(
				'100' => '100',
				'200' => '200',
				'300' => '300',
				'400' => '400',
				'500' => '500',
				'600' => '600',
				'700' => '700',
				'800' => '800',
				'900' => '900',
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h2:not(.custom_font), .h2',
					'units'  => '',
					'property' => 'font-weight'
				),

			)
		));

		Kirki::add_field( 'cl_june', array(
			'type'        => 'number',
			'settings'    => 'h2_letter_space',
			'label'       => esc_attr__( 'H2 Letter Spacing', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '-0.02',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h2:not(.custom_font), .h2',
					'units'  => 'px',
					'property' => 'letter-spacing'
				),

			),
			'choices'     => array(
				'min'  => 0,
				'max'  => 5,
				'step' => 0.05,
			),
		));
		
		
		Kirki::add_field( 'cl_june', array(
		    'type' => 'color',
		    'settings' => 'h2_dark_color',
			'label' => 'H2 Color (Dark)',
			'default' => '#262a2c',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => 'h2:not(.custom_font), .h2',
					'property' => 'color',
					'suffix' => ''
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	
    	Kirki::add_field( 'cl_june', array(
		    'type' => 'color',
		    'settings' => 'h2_light_color',
			'label' => 'H2 Color (Light)',
			'default' => '#ffffff',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.light-text h2:not(.custom_font), .light-text .h2',
					'property' => 'color',
					'suffix' => ' !important'
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	
    	Kirki::add_field( 'cl_june', array(
		    
		    'settings' => 'general_style_div_h3',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		    'choices'  => array('small' => 'true')
		
		));
    	
    	
    	Kirki::add_field( 'cl_june', array(
			'type'        => 'number',
			'settings'    => 'h3_font_size',
			'label'       => esc_attr__( 'H3 Font Size', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '36',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h3:not(.custom_font), .h3',
					'units'  => 'px',
					'property' => 'font-size'
				),

			)
		));
		
		Kirki::add_field( 'cl_june', array(
			'type'        => 'number',
			'settings'    => 'h3_line_height',
			'label'       => esc_attr__( 'H3 Line-height', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '47',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h3:not(.custom_font), .h3',
					'units'  => 'px',
					'property' => 'line-height'
				),

			)
		));

		Kirki::add_field( 'cl_june', array(
			'type'        => 'select',
			'settings'    => 'h3_text_transform',
			'label'       => esc_attr__( 'H3 Text Transform', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => 'none',
			'priority'    => 10,
			'choices' => array(
				'none' => 'None',
				'uppercase' => 'Uppercase'
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h3:not(.custom_font), .h3',
					'units'  => '',
					'property' => 'text-transform'
				),

			)
		));

		Kirki::add_field( 'cl_june', array(
			'type'        => 'select',
			'settings'    => 'h3_font_weight',
			'label'       => esc_attr__( 'H3 Font Weight', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '600',
			'priority'    => 10,
			'choices' => array(
				'100' => '100',
				'200' => '200',
				'300' => '300',
				'400' => '400',
				'500' => '500',
				'600' => '600',
				'700' => '700',
				'800' => '800',
				'900' => '900',
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h3:not(.custom_font), .h3',
					'units'  => '',
					'property' => 'font-weight'
				),

			)
		));

		Kirki::add_field( 'cl_june', array(
			'type'        => 'number',
			'settings'    => 'h3_letter_space',
			'label'       => esc_attr__( 'H3 Letter Spacing', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '0',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h3:not(.custom_font), .h3',
					'units'  => 'px',
					'property' => 'letter-spacing'
				),

			),
			'choices'     => array(
				'min'  => 0,
				'max'  => 5,
				'step' => 0.05,
			),
		));
		
		
		Kirki::add_field( 'cl_june', array(
		    'type' => 'color',
		    'settings' => 'h3_dark_color',
			'label' => 'H3 Color (Dark)',
			'default' => '#262a2c',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => 'h3:not(.custom_font), .h3',
					'property' => 'color',
					'suffix' => ''
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	
    	Kirki::add_field( 'cl_june', array(
		    'type' => 'color',
		    'settings' => 'h3_light_color',
			'label' => 'H3 Color (Light)',
			'default' => '#ffffff',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.light-text h3:not(.custom_font), .light-text .h3',
					'property' => 'color',
					'suffix' => ' !important'
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	Kirki::add_field( 'cl_june', array(
		    
		    'settings' => 'general_style_div_h4',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		    'choices'  => array('small' => 'true')
		
		));
    	
    	
    	Kirki::add_field( 'cl_june', array(
			'type'        => 'number',
			'settings'    => 'h4_font_size',
			'label'       => esc_attr__( 'H4 Font Size', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '24',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h4:not(.custom_font), .h4',
					'units'  => 'px',
					'property' => 'font-size'
				),

			)
		));
		
		Kirki::add_field( 'cl_june', array(
			'type'        => 'number',
			'settings'    => 'h4_line_height',
			'label'       => esc_attr__( 'H4 Line-height', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '38',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h4:not(.custom_font), .h4',
					'units'  => 'px',
					'property' => 'line-height'
				),

			)
		));

		Kirki::add_field( 'cl_june', array(
			'type'        => 'select',
			'settings'    => 'h4_text_transform',
			'label'       => esc_attr__( 'H4 Text Transform', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => 'none',
			'priority'    => 10,
			'choices' => array(
				'none' => 'None',
				'uppercase' => 'Uppercase'
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h4:not(.custom_font), .h4',
					'units'  => '',
					'property' => 'text-transform'
				),

			)
		));

		Kirki::add_field( 'cl_june', array(
			'type'        => 'select',
			'settings'    => 'h4_font_weight',
			'label'       => esc_attr__( 'H4 Font Weight', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '700',
			'priority'    => 10,
			'choices' => array(
				'100' => '100',
				'200' => '200',
				'300' => '300',
				'400' => '400',
				'500' => '500',
				'600' => '600',
				'700' => '700',
				'800' => '800',
				'900' => '900',
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h4:not(.custom_font), .h4',
					'units'  => '',
					'property' => 'font-weight'
				),

			)
		));

		Kirki::add_field( 'cl_june', array(
			'type'        => 'number',
			'settings'    => 'h4_letter_space',
			'label'       => esc_attr__( 'H4 Letter Spacing', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '0',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h4:not(.custom_font), .h4',
					'units'  => 'px',
					'property' => 'letter-spacing'
				),

			),
			'choices'     => array(
				'min'  => 0,
				'max'  => 5,
				'step' => 0.05,
			),
		));
		
		
		Kirki::add_field( 'cl_june', array(
		    'type' => 'color',
		    'settings' => 'h4_dark_color',
			'label' => 'H4 Color (Dark)',
			'default' => '#262a2c',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => 'h4:not(.custom_font), .h4',
					'property' => 'color',
					'suffix' => ''
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	
    	Kirki::add_field( 'cl_june', array(
		    'type' => 'color',
		    'settings' => 'h4_light_color',
			'label' => 'H4 Color (Light)',
			'default' => '#ffffff',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.light-text h4:not(.custom_font), .light-text .h4',
					'property' => 'color',
					'suffix' => ' !important'
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	
    	Kirki::add_field( 'cl_june', array(
		    
		    'settings' => 'general_style_div_h5',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		    'choices'  => array('small' => 'true')
		
		));
    	
    	
    	Kirki::add_field( 'cl_june', array(
			'type'        => 'number',
			'settings'    => 'h5_font_size',
			'label'       => esc_attr__( 'H5 Font Size', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '18',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h5:not(.custom_font), .h5',
					'units'  => 'px',
					'property' => 'font-size'
				),

			)
		));
		
		Kirki::add_field( 'cl_june', array(
			'type'        => 'number',
			'settings'    => 'h5_line_height',
			'label'       => esc_attr__( 'H5 Line-height', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '28',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h5:not(.custom_font), .h5',
					'units'  => 'px',
					'property' => 'line-height'
				),

			)
		));

		Kirki::add_field( 'cl_june', array(
			'type'        => 'select',
			'settings'    => 'h5_text_transform',
			'label'       => esc_attr__( 'H5 Text Transform', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => 'none',
			'priority'    => 10,
			'choices' => array(
				'none' => 'None',
				'uppercase' => 'Uppercase'
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h5:not(.custom_font), .h5',
					'units'  => '',
					'property' => 'text-transform'
				),

			)
		));

		Kirki::add_field( 'cl_june', array(
			'type'        => 'select',
			'settings'    => 'h5_font_weight',
			'label'       => esc_attr__( 'H5 Font Weight', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '600',
			'priority'    => 10,
			'choices' => array(
				'100' => '100',
				'200' => '200',
				'300' => '300',
				'400' => '400',
				'500' => '500',
				'600' => '600',
				'700' => '700',
				'800' => '800',
				'900' => '900',
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h5:not(.custom_font), .h5',
					'units'  => '',
					'property' => 'font-weight'
				),

			)
		));

		Kirki::add_field( 'cl_june', array(
			'type'        => 'number',
			'settings'    => 'h5_letter_space',
			'label'       => esc_attr__( 'H5 Letter Spacing', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '0.4',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h5:not(.custom_font), .h5',
					'units'  => 'px',
					'property' => 'letter-spacing'
				),

			),
			'choices'     => array(
				'min'  => 0,
				'max'  => 5,
				'step' => 0.05,
			),
		));
		
		
		Kirki::add_field( 'cl_june', array(
		    'type' => 'color',
		    'settings' => 'h5_dark_color',
			'label' => 'H5 Color (Dark)',
			'default' => '#262a2c',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => 'h5:not(.custom_font), .h5',
					'property' => 'color',
					'suffix' => ''
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	
    	Kirki::add_field( 'cl_june', array(
		    'type' => 'color',
		    'settings' => 'h5_light_color',
			'label' => 'H5 Color (Light)',
			'default' => '#ffffff',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.light-text h5:not(.custom_font), .light-text .h5',
					'property' => 'color',
					'suffix' => ' !important'
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	Kirki::add_field( 'cl_june', array(
		    
		    'settings' => 'general_style_div_h6',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		    'choices'  => array('small' => 'true')
		
		));
    	
    	
    	Kirki::add_field( 'cl_june', array(
			'type'        => 'number',
			'settings'    => 'h6_font_size',
			'label'       => esc_attr__( 'H6 Font Size', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '14',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h6:not(.custom_font), .h6',
					'units'  => 'px',
					'property' => 'font-size'
				),

			)
		));
		
		Kirki::add_field( 'cl_june', array(
			'type'        => 'number',
			'settings'    => 'h6_line_height',
			'label'       => esc_attr__( 'H6 Line-height', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '22',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h6:not(.custom_font), .h6',
					'units'  => 'px',
					'property' => 'line-height'
				),

			)
		));

		Kirki::add_field( 'cl_june', array(
			'type'        => 'select',
			'settings'    => 'h6_text_transform',
			'label'       => esc_attr__( 'H6 Text Transform', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => 'uppercase',
			'priority'    => 10,
			'choices' => array(
				'none' => 'None',
				'uppercase' => 'Uppercase'
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h6:not(.custom_font), .h6',
					'units'  => '',
					'property' => 'text-transform'
				),

			)
		));

		Kirki::add_field( 'cl_june', array(
			'type'        => 'select',
			'settings'    => 'h6_font_weight',
			'label'       => esc_attr__( 'H6 Font Weight', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '600',
			'priority'    => 10,
			'choices' => array(
				'100' => '100',
				'200' => '200',
				'300' => '300',
				'400' => '400',
				'500' => '500',
				'600' => '600',
				'700' => '700',
				'800' => '800',
				'900' => '900',
			),
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h6:not(.custom_font), .h6',
					'units'  => '',
					'property' => 'font-weight'
				),

			)
		));

		Kirki::add_field( 'cl_june', array(
			'type'        => 'number',
			'settings'    => 'h6_letter_space',
			'label'       => esc_attr__( 'H6 Letter Spacing', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '0.4',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'h6:not(.custom_font), .h6',
					'units'  => 'px',
					'property' => 'letter-spacing'
				),

			),
			'choices'     => array(
				'min'  => 0,
				'max'  => 5,
				'step' => 0.05,
			),
		));
		
		
		Kirki::add_field( 'cl_june', array(
		    'type' => 'color',
		    'settings' => 'h6_dark_color',
			'label' => 'H6 Color (Dark)',
			'default' => '#262a2c',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => 'h6:not(.custom_font), .h6',
					'property' => 'color',
					'suffix' => ''
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	
    	Kirki::add_field( 'cl_june', array(
		    'type' => 'color',
		    'settings' => 'h6_light_color',
			'label' => 'H6 Color (Light)',
			'default' => '#ffffff',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.light-text h6:not(.custom_font), .light-text .h6',
					'property' => 'color',
					'suffix' => ' !important'
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	
    	Kirki::add_field( 'cl_june', array(
		    
		    'settings' => 'general_style_div_h',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		    'choices'  => array('small' => 'true')
		
		));
    	
		
		
		
		
		
		
		
		
		Kirki::add_field( 'cl_june', array(
			'type'        => 'typography',
			'settings'    => 'body_typo',
			'label'       => esc_attr__( 'Body Typography', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'show_subsets' => false,
			'default'     => array(
				'font-family'    => 'Karla',
				'letter-spacing' => '0',
				'font-weight' => '400',
				'text-transform' => 'none',
				'font-size' => '16px',
				'line-height' => '30px',
				'color' => '#8b99a3'
			),
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'body_typo' )
				),

			)
		));
		
		
		Kirki::add_field( 'cl_june', array(
		    
		    'settings' => 'blog_style_div',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		
		));
		
		Kirki::add_field( 'cl_june', array(
		    
		    'settings' => 'blog_style_title',
		    'label'    => esc_html__( 'Blog', 'june' ),
		    'section'  => 'cl_styling',
		    'type'     => 'grouptitle',
		 
		));
		
		Kirki::add_field( 'cl_june', array(
			'type'        => 'typography',
			'settings'    => 'blog_entry_title',
			'label'       => esc_attr__( 'Blog Entry Title', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'show_subsets' => false,
			'show_variants' => true,
			'default'     => array(
				'letter-spacing' => '0.00em',
				'font-weight' => '400',
				'text-transform' => 'none',
				'font-size' => '24px',
				'line-height' => '38px',
				'color' => '#262a2c',
				'font-family' => 'Playfair Display'
			),
			'priority'    => 10, 
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'blog_entry_title' )
				),

			)
		));

		Kirki::add_field( 'cl_june', array(
			'type'        => 'typography',
			'settings'    => 'blog_meta_style',
			'label'       => esc_attr__( 'Blog Meta Style', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'show_subsets' => false,
			'show_variants' => true,
			'default'     => array(
				'letter-spacing' => '0.00em',
				'font-weight' => '400',
				'variant' => '400italic',
				'text-transform' => 'none',
				'font-size' => '14px',
				'line-height' => '28px',
				'color' => '#727f88',
			),
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'blog_meta_style' )
				),

			)
		));
		
		Kirki::add_field( 'cl_june', array(
			'type'        => 'typography',
			'settings'    => 'single_blog_title',
			'label'       => esc_attr__( 'Single Blog Title', 'june' ),
			'section'     => 'cl_styling',
			'show_variants' => true,
			'into_group' => true,
			'show_subsets' => false,
			'default'     => array(
				'font-family' => 'Playfair Display',
				'letter-spacing' => '0',
				'font-weight' => '400',
				'text-transform' => 'none',
				'font-size' => '36px',
				'line-height' => '47px',
				'color' => '#262a2c'
			),
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'single_blog_title' )
				),

			)
		));



		Kirki::add_field( 'cl_june', array(
		    'type' => 'color',
		    'settings' => 'blog_overlay_color',
			'label' => 'Blog Overlay Color',
			'default' => 'rgba(40,64,109,0.92)',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'blog_overlay_color' ) ,
					'property' => 'background-color'
				),
				
			),
		    'transport' => 'auto'
    	));


    	Kirki::add_field( 'cl_june', array(
		    
		    'settings' => 'portfolio_style_div',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		
		));
		
		Kirki::add_field( 'cl_june', array(
		    
		    'settings' => 'portfolio_style_title',
		    'label'    => esc_html__( 'Portfolio', 'june' ),
		    'section'  => 'cl_styling',
		    'type'     => 'grouptitle',
		 
		));

		Kirki::add_field( 'cl_june', array(
			'type'        => 'typography',
			'settings'    => 'portfolio_item_categories',
			'label'       => esc_attr__( 'Portfolio Item Categories', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'show_subsets' => false,
			'default'     => array(
				'letter-spacing' => '0.00em',
				'font-weight' => '400',
				'text-transform' => 'none',
				'font-size' => '13px',
				'line-height' => '20px',
				'color' => '#999'
			),
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => '.portfolio_item .portfolio-categories a, .portfolio_item .portfolio-categories'
				),

			)
		));



		
		
		Kirki::add_field( 'cl_june', array(
		    
		    'settings' => 'style_buttons_div',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		
		));
		
		Kirki::add_field( 'cl_june', array(
		    
		    'settings' => 'buttons_title',
		    'label'    => esc_html__( 'Buttons', 'june' ),
		    'section'  => 'cl_styling',
		    'type'     => 'grouptitle',
		 
		));
		
		Kirki::add_field( 'cl_june', array(
		    'type' => 'select',
		    'settings' => 'button_style',
			'label' => 'Button Style',
			'default'     => 'square',
			'choices' => array(
				'square' => 'Square',
				'rounded' => 'Rounded',
				'simple_text' => 'Simple Text',
				'sqaure_small' => 'Sqaure Small'
			),
			'inline_control' => true,
			'section'  => 'cl_styling',
			'transport' => 'postMessage'
    	));


    	Kirki::add_field( 'cl_june', array(
		    'type' => 'switch',
		    'settings' => 'custom_button_font',
			'label' => 'Button Font',
			'default'     => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'june' ),
				0 => esc_attr__( 'Off', 'june' ),
			),
			'inline_control' => true,
			'section'  => 'cl_styling',
			'transport' => 'postMessage'
    	));


    	Kirki::add_field( 'cl_june', array(
			'type'        => 'typography',
			'settings'    => 'button_font_custom',
			'label'       => esc_attr__( 'Button Typography', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => array(
				'letter-spacing' => '0.05em',
				'font-weight' => '600',
				'text-transform' => 'uppercase',
				'font-size' => '12px'
			),
			'priority'    => 10,
			'show_subsets' => false,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => '.cl-btn.btn-font-custom'
				),

			),
			'required'    => array(
				array(
					'setting'  => 'custom_button_font',
					'operator' => '==',
					'value'    => true,
				),
								
			),
		));

    	
    	Kirki::add_field( 'cl_june', array(
		    'type' => 'color',
		    'settings' => 'button_bg_color',
			'label' => 'Button BG Color',
			'default' => codeless_get_mod('primary_color'),
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.cl-btn:not(.btn-priority_secondary):not(.wpcf7-submit):not(.entry-readmore):not([name="apply_coupon"]):not(.single_add_to_cart_button):not(.update_item_submit):not(.checkout-button):not(#place_order)',
					'property' => 'background-color'
				),
				
			),
		    'transport' => 'auto'
    	));
    	
    	Kirki::add_field( 'cl_june', array(
		    'type' => 'color',
		    'settings' => 'button_font_color',
			'label' => 'Button Font Color',
			'default' => '#fff',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.cl-btn:not(.btn-priority_secondary)',
					'property' => 'color'
				),
				
			),
		    'transport' => 'auto'
    	));

    	Kirki::add_field( 'cl_june', array(
		    'type' => 'color',
		    'settings' => 'button_border_color',
			'label' => 'Button Border Color',
			'tooltip' => 'Works only on button styles that support border color',
			'default' => 'transparent',
			'inline_control' => true,
			'choices' => array(
				'alpha' => true,
				'palettes' => codeless_generate_palettes()
			),
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.cl-btn:not(.btn-priority_secondary)',
					'property' => 'border-color'
				),
				
			),
		    'transport' => 'auto',
    	));

    	Kirki::add_field( 'cl_june', array(
		    'type' => 'number',
		    'settings' => 'button_border_width',
			'label' => 'Button Border Width',
			'tooltip' => 'Works only on button styles that support border color',
			'default' => '1',
			'inline_control' => true,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.cl-btn:not(.btn-priority_secondary)',
					'property' => 'border-width',
					'suffix' => 'px'
				),
				
			),
			'choices'     => array(
				'min'  => 0,
				'max'  => 10,
				'step' => 1,
				'alpha' => true,
			),
		    'transport' => 'auto'
    	));


    	Kirki::add_field( 'cl_june', array(
		    'type' => 'select',
		    'settings' => 'button_hover_effect',
			'label' => 'Button Hover Effect',
			'default'     => 'darker',
			'choices' => array(
				'darker' => 'Darker',
				'shadow' => 'Shadow'
			),
			'inline_control' => true,
			'section'  => 'cl_styling',
			'transport' => 'postMessage'
    	));
    	
    	/*Kirki::add_field( 'cl_june', array(
		    'type' => 'color',
		    'settings' => 'button_bg_color_hover',
			'label' => 'Button Hover BG Color',
			'default' => '#fff',
			'inline_control' => true,
			'alpha' => true,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.cl-btn:not(.btn-priority_secondary):hover',
					'property' => 'background-color'
				),
			),
		    'transport' => 'auto'
    	));
    	
    	Kirki::add_field( 'cl_june', array(
		    'type' => 'color',
		    'settings' => 'button_font_color_hover',
			'label' => 'Button Hover Font Color',
			'default' => codeless_get_mod( 'highlight_dark_color' ),
			'inline_control' => true,
			'alpha' => true,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.cl-btn:not(.btn-priority_secondary):hover',
					'property' => 'color'
				),
				
			),
		    'transport' => 'auto'
    	));

    	Kirki::add_field( 'cl_june', array(
		    'type' => 'color',
		    'settings' => 'button_border_color_hover',
			'label' => 'Button Hover Border Color',
			'tooltip' => 'Works only on button styles that support border color',
			'default' => 'transparent',
			'inline_control' => true,
			'alpha' => true,
			'section'  => 'cl_styling',
			'output' => array(
				array(
					'element' => '.cl-btn:not(.btn-priority_secondary):hover',
					'property' => 'border-color'
				),
				
			),
		    'transport' => 'auto',
    	));*/
    	
    	Kirki::add_field( 'cl_june', array(
		    
		    'settings' => 'widget_typo',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		
		));
		
		Kirki::add_field( 'cl_june', array(
		    
		    'settings' => 'widget_title',
		    'label'    => esc_html__( 'Widgets', 'june' ),
		    'section'  => 'cl_styling',
		    'type'     => 'grouptitle',
		 
		));
		
		
		Kirki::add_field( 'cl_june', array(
			'type'        => 'typography',
			'settings'    => 'widgets_title_typography',
			'label'       => esc_attr__( 'Sidebar Widgets Typography', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => array(
				'font-family'    => 'Montserrat',
				'letter-spacing' => '0.00em',
				'font-weight' => '700',
				'text-transform' => 'uppercase',
				'font-size' => '18px',
				'line-height' => '28px',
				'color' => '#c1cad1'
			),
			'priority'    => 10,
			'show_subsets' => false,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'widgets_title_typography' )
				),

			)
		));
	
		
		Kirki::add_field( 'cl_june', array(
			'type'        => 'number',
			'settings'    => 'aside_widget_distance',
			'label'       => esc_attr__( 'Distance between widgets', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => '34',
			'priority'    => 10,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => 'aside .widget',
					'units'  => 'px',
					'property' => 'padding-top'
				),
				array(
					'element' => 'aside .widget',
					'units'  => 'px',
					'property' => 'padding-bottom'
				),

			)
		));
    	
    	
    	Kirki::add_field( 'cl_june', array(
		    
		    'settings' => 'style_elements',
		    'label'    => '',
		    'section'  => 'cl_styling',
		    'type'     => 'groupdivider',
		
		));
		
		Kirki::add_field( 'cl_june', array(
		    
		    'settings' => 'style_footer_title',
		    'label'    => esc_html__( 'Elements', 'june' ),
		    'section'  => 'cl_styling',
		    'type'     => 'grouptitle',
		 
		));


		Kirki::add_field( 'cl_june', array(
			'type'        => 'typography',
			'settings'    => 'counter_typography',
			'label'       => esc_attr__( 'Counter Typography', 'june' ),
			'section'     => 'cl_styling',
			'into_group' => true,
			'default'     => array(
				'letter-spacing' => '-3px',
				'line-height' => '64px',
				'font-weight' => '600',
				'font-size' => '60px'
			),
			'priority'    => 10,
			'show_subsets' => false,
			'transport' => 'auto',
			'output'      => array(
				array(
					'element' => codeless_dynamic_css_register_tags( 'counter_typography' )
				),

			)
		));



		
		
		
		

?>