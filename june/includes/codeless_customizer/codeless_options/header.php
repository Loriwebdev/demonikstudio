<?php

/* Header Options ---------------------------------------- */


Kirki::add_panel('cl_header', array(
	'priority' => 10,
	'type' => '',
	'title' => esc_html__('Header', 'june') ,
	'tooltip' => esc_html__('All Header Options', 'june') ,
));



/* -------------------- Layout --------------------- */

Kirki::add_section('cl_header_general', array(
	'title' => esc_html__('Layout', 'june') ,
	'tooltip' => esc_html__('General Header Layout, global header options', 'june') ,
	'panel' => 'cl_header',
	'type' => '',
	'priority' => 160,
	'capability' => 'edit_theme_options'
));

Kirki::add_field('cl_june', array(
	'settings' => 'header_container',
	'label' => esc_html__('Header Stretch', 'june') ,
	'section' => 'cl_header_general',
	'type' => 'select',
	'default' => 'container',
	'priority' => 10,
	'choices' => array(
		'container' => esc_attr__('Into Container', 'june') ,
		'container-fluid' => esc_attr__('Fullwidth', 'june') ,
	) ,
	'transport' => 'postMessage',
));



Kirki::add_field('cl_june', array(
	'settings' => 'header_layout_advanced',
	'label' => esc_html__('', 'june') ,
	'section' => 'cl_header_general',
	'type' => 'groupdivider',
));
Kirki::add_field('cl_june', array(
	'settings' => 'header_layout_advanced_title',
	'label' => esc_html__('Advanced (Use header wizard)', 'june') ,
	'section' => 'cl_header_general',
	'type' => 'grouptitle',
));

Kirki::add_field('cl_june', array(
	'settings' => 'header_layout',
	'label' => esc_html__('Header Layout', 'june') ,
	'tooltip' => esc_html__('Select type of header to use', 'june') ,
	'section' => 'cl_header_general',
	'tooltip' => esc_html__('Please use the Header Wizard for changing the header Layout', 'june') ,
	'type' => 'select',
	'default' => 'top',
	'priority' => 10,
	'choices' => array(
		'top' => esc_attr__('Top', 'june') ,
		'left' => esc_attr__('Left', 'june') ,
		'right' => esc_attr__('Right', 'june') ,
		'bottom' => esc_attr__('Bottom', 'june') ,
	) ,
	'transport' => 'postMessage',
));

Kirki::add_field('cl_june', array(
	'settings' => 'logo_position_left',
	'label' => esc_html__('Logo Position', 'june') ,
	'tooltip' => esc_html__('Select the position (alignment) of logo', 'june') ,
	'section' => 'cl_header_general',
	'type' => 'select',
	'default' => 'center',
	'priority' => 10,
	'choices' => array(
		'flex-start' => 'Left',
		'center' => 'Center',
		'flex-end' => 'Right',
	) ,
	'required' => array(
		array(
			'setting' => 'header_layout',
			'operator' => 'in',
			'value' => array(
				'left',
				'right'
			)
		) ,
	) ,
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => '.cl-h-cl_header_logo',
			'property' => 'justify-content'
		)
	)
));

Kirki::add_field('cl_june', array(
	'settings' => 'header_forced_center',
	'label' => esc_html__('Force Center, Middle Column', 'june') ,
	'tooltip' => esc_html__('Switch On to force the middle column of the main Header Row to be centered.', 'june') ,
	'section' => 'cl_header_general',
	'type' => 'switch',
	'priority' => 10,
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'june') ,
		0 => esc_attr__('Off', 'june') ,
	) ,
	'transport' => 'postMessage',
));

Kirki::add_field('cl_june', array(
	'settings' => 'header_boxed',
	'label' => esc_html__('Boxed (Outter) Header', 'june') ,
	'section' => 'cl_header_general',
	'type' => 'switch',
	'priority' => 10,
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'june') ,
		0 => esc_attr__('Off', 'june') ,
	) ,
	'transport' => 'postMessage'
));




/* -------------------------- Logo ----------------------------- */

Kirki::add_section('cl_header_logo', array(
	'title' => esc_html__('Logo', 'june') ,
	'tooltip' => esc_html__('Logo Options', 'june') ,
	'panel' => 'cl_header',
	'type' => '',
	'priority' => 160,
	'capability' => 'edit_theme_options'
));

Kirki::add_field('cl_june', array(
	'settings' => 'logo_type',
	'label' => esc_html__('Logo Type', 'june') ,
	'tooltip' => esc_html__('Select font or image logo type', 'june') ,
	'section' => 'cl_header_logo',
	'type' => 'select',
	'default' => 'image',
	'priority' => 10,
	'into_group' => true,
	'choices' => array(
		'font' => esc_attr__('Font Logo', 'june') ,
		'image' => esc_attr__('Image Logo', 'june')
	) ,
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'logo_refresh_type' => array(
			'selector' => '#logo',
			'container_inclusive' => true,
			'render_callback' =>
			function ()
				{
				echo codeless_load_header_element('cl_header_logo');
				}

			,
		)
	)
));

Kirki::add_field('cl_june', array(
	'settings' => 'logo',
	'label' => esc_html__('Default Logo', 'june') ,
	'tooltip' => esc_html__('Upload here the logo that is placed in top of the page', 'june') ,
	'section' => 'cl_header_logo',
	'type' => 'image',
	'priority' => 10,
	'default' => get_template_directory_uri() . '/img/logo.png',
	'required' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'image',
		) ,
	) ,
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'logo_refresh_default' => array(
			'selector' => '#logo',
			'container_inclusive' => true,
			'render_callback' =>
			function ()
				{
				echo codeless_load_header_element('cl_header_logo');
				}

			,
		)
	)
));

Kirki::add_field('cl_june', array(
	'settings' => 'logo_light',
	'label' => esc_html__('Logo Light', 'june') ,
	'tooltip' => esc_html__('Upload logo that will be shown on dark baackground or header', 'june') ,
	'section' => 'cl_header_logo',
	'type' => 'image',
	'priority' => 10,
	'default' => get_template_directory_uri() . '/img/logo_light.png',
	'required' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'image',
		) ,
	) ,
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'logo_refresh_light' => array(
			'selector' => '#logo',
			'container_inclusive' => true,
			'render_callback' =>
			function ()
				{
				echo codeless_load_header_element('cl_header_logo');
				}

			,
		)
	)
));

Kirki::add_field('cl_june', array(
	'settings' => 'logo_height',
	'label' => esc_html__('Logo Height', 'june') ,
	'tooltip' => esc_html__('Define the Height of your logo', 'june') ,
	'section' => 'cl_header_logo',
	'type' => 'number',
	'priority' => 10,
	'default' => 62,
	'choices' => array(
		'min' => 10,
		'max' => 300,
		'step' => 1,
	) ,
	'required' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'image',
		) ,
	) ,
	'transport' => 'postMessage',
	'output' => array(
		array(
			'element' => '#logo img',
			'units' => 'px',
			'property' => 'height'
		)
	) ,
	'js_vars' => array(
		array(
			'suffix' => '!important'
		)
	)
));

Kirki::add_field('cl_june', array(
	'settings' => 'logo_responsive_div',
	'label' => esc_html__('Logo Responsive', 'june') ,
	'section' => 'cl_header_logo',
	'type' => 'groupdivider',
	'required' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'image',
		) ,
	) ,
));

Kirki::add_field('cl_june', array(
	'settings' => 'logo_responsive',
	'label' => esc_html__('Logo Responsive', 'june') ,
	'section' => 'cl_header_logo',
	'type' => 'grouptitle',
	'required' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'image',
		) ,
	) ,
));

Kirki::add_field('cl_june', array(
	'settings' => 'logo_iphone',
	'label' => esc_html__('Logo Additional in iPhone', 'june') ,
	'tooltip' => esc_html__('Upload logo that will be shown only on iPhone', 'june') ,
	'section' => 'cl_header_logo',
	'into_group' => true,
	'type' => 'image',
	'priority' => 10,
	'default' => '',
	'required' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'image',
		) ,
	) ,
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'logo_iphone_refresh' => array(
			'selector' => '#logo',
			'container_inclusive' => true,
			'render_callback' =>
			function ()
				{
				echo codeless_load_header_element('cl_header_logo');
				}

			,
		)
	)
));

Kirki::add_field('cl_june', array(
	'settings' => 'logo_ipad',
	'label' => esc_html__('Logo Additional in iPad', 'june') ,
	'tooltip' => esc_html__('Upload logo that will be shown only on iPad', 'june') ,
	'section' => 'cl_header_logo',
	'into_group' => true,
	'type' => 'image',
	'priority' => 10,
	'default' => '',
	'required' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'image',
		) ,
	) ,
	'transport' => 'postMessage',
	'partial_refresh' => array(
		'logo_ipad_refresh' => array(
			'selector' => '#logo',
			'container_inclusive' => true,
			'render_callback' =>
			function ()
				{
				echo codeless_load_header_element('cl_header_logo');
				}

			,
		)
	)
));

Kirki::add_field('cl_june', array(
	'settings' => 'logo_height_ipad',
	'label' => esc_html__('Logo Height (iPad)', 'june') ,
	'tooltip' => esc_html__('Define the Height of your logo in iPad', 'june') ,
	'section' => 'cl_header_logo',
	'into_group' => true,
	'type' => 'number',
	'priority' => 10,
	'default' => 37,
	'choices' => array(
		'min' => 1,
		'max' => 100,
		'step' => 1,
	) ,
	'required' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'image',
		) ,
	) ,
	'transport' => 'postMessage',
	'output' => array(
		array(
			'element' => '#logo img',
			'units' => 'px',
			'property' => 'height',
			'media_query' => '@media (max-width: 991px)'
		)
	)
));

Kirki::add_field('cl_june', array(
	'settings' => 'logo_height_iphone',
	'label' => esc_html__('Logo Height (iPhone)', 'june') ,
	'tooltip' => esc_html__('Define the Height of your logo in iPhone', 'june') ,
	'section' => 'cl_header_logo',
	'into_group' => true,
	'type' => 'number',
	'priority' => 10,
	'default' => 37,
	'choices' => array(
		'min' => 1,
		'max' => 100,
		'step' => 1,
	) ,
	'required' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'image',
		) ,
	) ,
	'output' => array(
		array(
			'element' => '#logo img',
			'units' => 'px',
			'property' => 'height',
			'media_query' => '@media (max-width: 480px)'
		)
	)
));

Kirki::add_field('cl_june', array(
	'type' => 'text',
	'settings' => 'logo_font_text',
	'label' => esc_attr__('Logo Font', 'june') ,
	'section' => 'cl_header_logo',
	'default' => 'june',
	'priority' => 10,
	'into_group' => true,
	'required' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'font',
		) ,
	) ,
	'transport' => 'postMessage',
));

Kirki::add_field('cl_june', array(
	'type' => 'typography',
	'settings' => 'logo_font',
	'label' => esc_attr__('Logo Font Typography', 'june') ,
	'section' => 'cl_header_logo',
	'into_group' => true,
	'default' => array(
		'font-family' => 'Poppins',
		'variant' => '600',
		'font-size' => '28px',
		'line-height' => '',
		'letter-spacing' => '-1',
		'subsets' => array(
			'latin-ext'
		) ,
		'color' => '#222',
		'text-transform' => 'lowercase',
		'text-align' => 'left'
	) ,
	'priority' => 10,
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => codeless_dynamic_css_register_tags('logo_font')
		) ,
	) ,
	'required' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'font',
		) ,
	) ,
));


Kirki::add_field('cl_june', array(
	'settings' => 'logo_font_responsive_color',
	'label' => esc_html__('Logo Font Responsive Color', 'june') ,
	'section' => 'cl_header_logo',
	'type' => 'select',
	'default' => 'dark',
	'priority' => 10,
	'choices' => array(
		'light' => esc_attr__('Light', 'june') ,
		'dark' => esc_attr__('Dark', 'june') ,
	) ,
	'transport' => 'postMessage',
	'required' => array(
		array(
			'setting' => 'logo_type',
			'operator' => '==',
			'value' => 'font',
		) ,
	) ,
));



/* --------------------- MENU ------------------------------*/

Kirki::add_section('cl_header_menu', array(
	'title' => esc_html__('Menu Style', 'june') ,
	'tooltip' => '',
	'panel' => 'cl_header',
	'type' => '',
	'priority' => 160,
	'capability' => 'edit_theme_options'
));

Kirki::add_field('cl_june', array(
	'type' => 'select',
	'settings' => 'header_menu_style',
	'label' => 'Main Menu Style',
	'tooltip' => 'Select the Main Navigation Items Style',
	'default' => 'simple',
	'choices' => array(
		'simple' => 'Simple',
		'border_top' => 'Border Top',
		'border_bottom' => 'Border Bottom',
		'border_left' => 'Border Left',
		'border_right' => 'Border Right',
		'border_effect' => 'Border Effect',
		'border_effect_two' => 'Border Effect 2',
		'background_color' => 'Background Color'
	) ,
	'inline_control' => true,
	'section' => 'cl_header_menu',
	'transport' => 'postMessage'
));


Kirki::add_field('cl_june', array(
	'type' => 'slider',
	'settings' => 'header_space_menu',
	'label' => 'Space between Menu Items',
	'default' => 23,
	'choices' => array(
		'min' => '0',
		'max' => '40',
		'step' => '1',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_menu',
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => '.header_container.header-top nav > ul > li, .header_container.header-bottom nav > ul > li',
			'units' => 'px',
			'property' => 'padding-left',
			'media_query' => '@media (min-width: 992px)'
		) ,
		array(
			'element' => '.header_container.header-top nav > ul > li, .header_container.header-bottom nav > ul > li',
			'units' => 'px',
			'property' => 'padding-right',
			'media_query' => '@media (min-width: 992px)'
		) ,
		array(
			'element' => '.header_container.header-left nav > ul > li, .header_container.header-right nav > ul > li, .vertical-menu nav > ul > li',
			'units' => 'px',
			'property' => 'padding-top',
			'media_query' => '@media (min-width: 992px)'
		) ,
		array(
			'element' => '.header_container.header-left nav > ul > li, .header_container.header-right nav > ul > li, .vertical-menu nav > ul > li',
			'units' => 'px',
			'property' => 'padding-bottom',
			'media_query' => '@media (min-width: 992px)'
		)
	) ,
));



Kirki::add_field('cl_june', array(
	'type' => 'select',
	'settings' => 'header_menu_border_style',
	'label' => 'Border Style',
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
	'inline_control' => true,
	'section' => 'cl_header_menu',
	'output' => array(
		array(
			'element' => codeless_dynamic_css_register_tags('header_menu_border_style') ,
			'property' => 'border-style'
		)
	) ,
	'required' => array(
		array(
			'setting' => 'header_menu_style',
			'operator' => 'in',
			'value' => array(
				'border_top',
				'border_bottom',
				'border_left',
				'border_right'
			) ,
		) ,
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_june', array(
	'type' => 'slider',
	'settings' => 'header_menu_border_width',
	'label' => 'Border Width',
	'default' => 1,
	'choices' => array(
		'min' => '0',
		'max' => '10',
		'step' => '1',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_menu',
	'transport' => 'postMessage',
	'required' => array(
		array(
			'setting' => 'header_menu_style',
			'operator' => 'in',
			'value' => array(
				'border_top',
				'border_bottom',
				'border_left',
				'border_right'
			) ,
		) ,
	) ,
));

Kirki::add_field('cl_june', array(
	'settings' => 'header_menu_style_full',
	'label' => esc_html__('Style over full item', 'june') ,
	'tooltip' => esc_html__('Switch on if you want to apply the style over full menu item or switch off if you want only text to take the style.', 'june') ,
	'section' => 'cl_header_menu',
	'type' => 'switch',
	'priority' => 10,
	'default' => 1,
	'choices' => array(
		1 => esc_attr__('On', 'june') ,
		0 => esc_attr__('Off', 'june') ,
	) ,
	'transport' => 'postMessage',
	'required' => array(
		array(
			'setting' => 'header_menu_style',
			'operator' => 'in',
			'value' => array(
				'border_top',
				'border_bottom',
				'border_left',
				'border_right',
				'background_color'
			)
		) ,
	) ,
));

Kirki::add_field('cl_june', array(
	'settings' => 'header_menu_vertical_dividers',
	'label' => esc_html__('Small dividers between menu items', 'june') ,
	'tooltip' => esc_html__('Switch on if you want to add small dividers between menu items.', 'june') ,
	'section' => 'cl_header_menu',
	'type' => 'switch',
	'priority' => 10,
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'june') ,
		0 => esc_attr__('Off', 'june') ,
	) ,
	'transport' => 'postMessage',
));


Kirki::add_field('cl_june', array(
	'type' => 'color',
	'settings' => 'header_menu_vertical_dividers_color',
	'label' => 'Dividers Color',
	'tooltip' => '',
	'default' => '#ebebeb',
	'inline_control' => true,
	'section' => 'cl_header_menu',
	'choices' => array(
		'alpha' => true,
		'palettes' => codeless_generate_palettes()
	),
	'output' => array(
		array(
			'element' => '.header_container.header-top.vertical-dividers #navigation nav > ul > li:before, .header_container.header-top.vertical-dividers #navigation nav > ul > li:last-child:after',
			'property' => 'background-color'
		)
	) ,

	'required' => array(
		array(
			'setting' => 'header_menu_vertical_dividers',
			'operator' => '==',
			'value' => true
		) ,
	) ,
	'transport' => 'auto'
));

Kirki::add_field( 'cl_june', array(
		    		
		   'settings' => 'divider_menu_active',
		   'label'    => '',
		   'section'  => 'cl_header_menu',
		   'type'     => 'groupdivider',
		   'into_group' => true,
		    			
		) );
		    	
Kirki::add_field( 'cl_june', array(
		    		
		   'settings' => 'title_menu_active',
		   'label'    => esc_html__( 'Hover & Active Item Styles', 'june' ),
		   'section'  => 'cl_header_menu',
		   'type'     => 'grouptitle',
		   'into_group' => true,
		
) );

Kirki::add_field('cl_june', array(
	'type' => 'color',
	'settings' => 'header_menu_border_color',
	'label' => 'Menu Item Active Border Color',
	'tooltip' => 'Border color on menu item hover. Used on menu styles with borders only.',
	'default' => 'rgba(0,0,0,0.1)',
	'inline_control' => true,
	'section' => 'cl_header_menu',
	'choices' => array(
		'alpha' => true,
		'palettes' => codeless_generate_palettes()
	),

	'output' => array(
		array(
			'element' => codeless_dynamic_css_register_tags('header_menu_border_color'),
			'property' => 'border-color'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_june', array(
	'type' => 'color',
	'settings' => 'header_menu_background_color',
	'label' => 'Menu Item Active BG Color',
	'tooltip' => 'BG color on menu item hover. Used on menu styles with background only.',
	'default' => '#222',
	'inline_control' => true,
	'section' => 'cl_header_menu',
	'choices' => array(
		'alpha' => true,
		'palettes' => codeless_generate_palettes()
	),
	'output' => array(
		array(
			'element' => codeless_dynamic_css_register_tags('header_menu_background_color'),
			'property' => 'background-color'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_june', array(
	'type' => 'color',
	'settings' => 'header_menu_font_color',
	'label' => 'Menu Item Active Font Color',
	'tooltip' => 'Font color on menu item hover. Used on menu styles with background only.',
	'default' => '#fff',
	'inline_control' => true,
	'section' => 'cl_header_menu',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element' => codeless_dynamic_css_register_tags('header_menu_font_color'),
			'property' => 'color',
			'suffix' => '!important'
		)
	) ,
	'transport' => 'auto'
));






Kirki::add_field( 'cl_june', array(
		    		
		   'settings' => 'divider_menu_main',
		   'label'    => '',
		   'section'  => 'cl_header_menu',
		   'type'     => 'groupdivider',
		   'into_group' => true,
		    			
		) );
		    	
Kirki::add_field( 'cl_june', array(
		    		
		   'settings' => 'title_menu_main',
		   'label'    => esc_html__( 'Main Menu Typography', 'june' ),
		   'section'  => 'cl_header_menu',
		   'type'     => 'grouptitle',
		   'into_group' => true,
		
) );



Kirki::add_field('cl_june', array(
	'type' => 'typography',
	'settings' => 'menu_font',
	'label' => esc_attr__('Menu Typography', 'june') ,
	'section' => 'cl_header_menu',
	'into_group' => true,
	'default' => array(
		'font-family' => 'Karla',
		'variant' => '400',
		'font-size' => '16px',
		'line-height' => '20px',
		'letter-spacing' => '0.0px',
		'color' => '#262A2C',
		'text-align' => 'center',
		'text-transform' => 'none',
	) ,
	'priority' => 10,
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => codeless_dynamic_css_register_tags('menu_font')
		) ,
	) ,
));


Kirki::add_field( 'cl_june', array(
		    		
		   'settings' => 'divider_menu_dropdown',
		   'label'    => '',
		   'section'  => 'cl_header_menu',
		   'type'     => 'groupdivider',
		   'into_group' => true,
		    			
		) );
		    	
Kirki::add_field( 'cl_june', array(
		    		
		   'settings' => 'title_menu_dropdown',
		   'label'    => esc_html__( 'Dropdown Typography', 'june' ),
		   'section'  => 'cl_header_menu',
		   'type'     => 'grouptitle',
		   'into_group' => true,
		
) );


Kirki::add_field('cl_june', array(
	'type' => 'typography',
	'settings' => 'dropdown_hassubmenu_item',
	'label' => esc_attr__('Dropdown Items with submenu typography', 'june'),
	'tooltip' => esc_attr__('Except Main Navigation Items', 'june'),
	'section' => 'cl_header_menu',
	'into_group' => true,
	'default' => array(
		'variant' => '',
		'font-size' => '14px',
		'line-height' => '26px',
		'letter-spacing' => '0.04em',
		'color' => '#262A2C',
		'text-transform' => 'uppercase',
	) ,
	'priority' => 10,
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => codeless_dynamic_css_register_tags('dropdown_hassubmenu_item')
		) ,
	) ,
));
Kirki::add_field('cl_june', array(
	'type' => 'typography',
	'settings' => 'dropdown_item_typography',
	'label' => esc_attr__('Dropdown Items typography', 'june') ,
	'tooltip' => esc_attr( 'All other items without Submenu, Except Main Navigation Items.', 'june' ),
	'section' => 'cl_header_menu',
	'into_group' => true,
	'default' => array(
		'font-size' => '16px',
		'line-height' => '30px',
		'variant' => '',
		'letter-spacing' => '0px',
		'color' => '#727F88',
		'text-transform' => 'none',
	) ,
	'priority' => 10,
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => codeless_dynamic_css_register_tags('dropdown_item_typography')
		) ,
	) ,
));

Kirki::add_field('cl_june', array(
	'settings' => 'header_mobile_menu_hamburger_color',
	'label' => esc_html__('Mobile Menu Hamburger Color', 'june') ,
	'section' => 'cl_header_menu',
	'type' => 'select',
	'default' => 'dark',
	'priority' => 10,
	'choices' => array(
		'light' => esc_attr__('Light', 'june') ,
		'dark' => esc_attr__('Dark', 'june') ,
	) ,
	'transport' => 'postMessage',
));


/* ---------------------- MAIN ROW ----------------------------- */

Kirki::add_section('cl_header_main', array(
	'title' => esc_html__('Main Header Row', 'june') ,
	'tooltip' => '',
	'panel' => 'cl_header',
	'type' => '',
	'priority' => 160,
	'capability' => 'edit_theme_options'
));

Kirki::add_field('cl_june', array(
	'settings' => 'header_design',
	'label' => esc_html__('Header Box Design', 'june') ,
	'section' => 'cl_header_main',
	'type' => 'css_tool',
	'default' => array(
		'border-bottom-width' => '1px',
	) ,
	'into_group' => true,
	'transport' => 'postMessage',
));

Kirki::add_field('cl_june', array(
	'type' => 'select',
	'settings' => 'header_main_left',
	'label' => 'Left Column Align',
	'default' => 'center',
	'choices' => array(
		'center' => 'Center',
		'flex-start' => 'Top',
		'flex-end' => 'Bottom',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_main',
	'output' => array(
		array(
			'element' => '.header_container > .main .c-left.header-col',
			'property' => 'align-items'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_june', array(
	'type' => 'select',
	'settings' => 'header_main_middle',
	'label' => 'Middle Column Align',
	'default' => 'center',
	'choices' => array(
		'center' => 'Center',
		'flex-start' => 'Top',
		'flex-end' => 'Bottom',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_main',
	'output' => array(
		array(
			'element' => '.header_container > .main .c-middle.header-col',
			'property' => 'align-items'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_june', array(
	'type' => 'select',
	'settings' => 'header_main_right',
	'label' => 'Right Column Align',
	'default' => 'center',
	'choices' => array(
		'center' => 'Center',
		'flex-start' => 'Top',
		'flex-end' => 'Bottom',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_main',
	'output' => array(
		array(
			'element' => '.header_container > .main .c-right.header-col',
			'property' => 'align-items'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_june', array(
	'type' => 'slider',
	'settings' => 'header_space_el',
	'label' => 'Space between elements',
	'default' => 60,
	'choices' => array(
		'min' => '0',
		'max' => '80',
		'step' => '1',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_main',
	'output' => array(
		array(
			'element' => '.header_container.header-left > .main .header-el, .header_container.header-right > .main .header-el',
			'units' => 'px',
			'property' => 'margin-bottom',
			'media_query' => '@media (min-width: 992px)'
		) ,
		array(
			'element' => '.header_container.header-top > .main .header-el, .header_container.header-bottom > .main .header-el',
			'units' => 'px',
			'property' => 'margin-right',
			'media_query' => '@media (min-width: 992px)'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_june', array(
	'type' => 'slider',
	'settings' => 'header_width',
	'label' => 'Header Width',
	'default' => 260,
	'choices' => array(
		'min' => '100',
		'max' => '700',
		'step' => '5',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_main',
	'required' => array(
		array(
			'setting' => 'header_layout',
			'operator' => 'in',
			'value' => array(
				'left',
				'right'
			) ,
		) ,
	) ,
	'transport' => 'postMessage'
));

Kirki::add_field('cl_june', array(
	'type' => 'slider',
	'settings' => 'header_height',
	'label' => 'Header Height',
	'tooltip' => 'Works on Top, Bottom Layouts or when outter boxed header is actived',
	'default' => 130,
	'choices' => array(
		'min' => '30',
		'max' => '600',
		'step' => '1',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_main',
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => '.header_container.header-top > .main, .header_container.header-bottom > .main',
			'units' => 'px',
			'property' => 'height',
			'media_query' => '@media (min-width: 992px)'
		) ,
		array(
			'element' => '.header_container.header-top > .main, .header_container.header-bottom > .main',
			'units' => 'px',
			'property' => 'line-height',
			'media_query' => '@media (min-width: 992px)'
		)
	) ,
));

Kirki::add_field('cl_june', array(
	'settings' => 'header_custom_divider',
	'label' => esc_html__('Design Options', 'june') ,
	'section' => 'cl_header_main',
	'type' => 'groupdivider',
	'into_group' => true,
));


Kirki::add_field('cl_june', array(
	'settings' => 'header_custom_ti',
	'label' => esc_html__('Background', 'june') ,
	'section' => 'cl_header_main',
	'type' => 'grouptitle',
	'into_group' => true,
));

Kirki::add_field('cl_june', array(
	'type' => 'color',
	'settings' => 'header_bg_color',
	'label' => 'Background Color',
	'default' => '',
	'inline_control' => true,
	'section' => 'cl_header_main',
	'choices' => array(
		'alpha' => true,
		'palettes' => codeless_generate_palettes()
	),
	'output' => array(
		array(
			'element' => '.header_container > .main, .header_container.header-left, .heaer_container.header-right',
			'property' => 'background-color'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_june', array(
	'type' => 'image',
	'label' => 'Background Image',
	'settings' => 'header_bg_image',
	'default' => '',
	'inline_control' => true,
	'section' => 'cl_header_main',
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => '.header_container > .main',
			'property' => 'background-image'
		)
	),
));

Kirki::add_field('cl_june', array(
	'type' => 'select',
	'settings' => 'header_bg_pos',
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
	'section' => 'cl_header_main',
	'output' => array(
		array(
			'element' => '.header_container > .main',
			'property' => 'background-position'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_june', array(
	'type' => 'select',
	'settings' => 'header_bg_repeat',
	'label' => 'Background Repeat',
	'default' => 'no-repeat',
	'choices' => array(
		'repeat' => 'repeat',
		'repeat-x' => 'repeat-x',
		'repeat-y' => 'repeat-y',
		'no-repeat' => 'no-repeat'
	) ,
	'inline_control' => true,
	'section' => 'cl_header_main',
	'output' => array(
		array(
			'element' => '.header_container > .main',
			'property' => 'background-repeat'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_june', array(
	'settings' => 'header_border_divider',
	'label' => esc_html__('Design Options', 'june') ,
	'section' => 'cl_header_main',
	'type' => 'groupdivider',
	'into_group' => true,
));

Kirki::add_field('cl_june', array(
	'settings' => 'header_border_ti',
	'label' => esc_html__('Border', 'june') ,
	'section' => 'cl_header_main',
	'type' => 'grouptitle',
	'into_group' => true,
));

Kirki::add_field('cl_june', array(
	'type' => 'select',
	'settings' => 'header_border_style',
	'label' => 'Border Style',
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
	'inline_control' => true,
	'choices' => array(
		'alpha' => true,
		'palettes' => codeless_generate_palettes()
	),
	'section' => 'cl_header_main',
	'output' => array(
		array(
			'element' => '.header_container > .main',
			'property' => 'border-style'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_june', array(
	'type' => 'color',
	'settings' => 'header_border_color',
	'label' => 'Border Color',
	'default' => '#dbe1e6',
	'inline_control' => true,
	'section' => 'cl_header_main',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element' => '.header_container > .main',
			'property' => 'border-color'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_june', array(
	'settings' => 'header_shadow',
	'label' => esc_html__('Add Shadow', 'june') ,
	'tooltip' => esc_html__('Not only border, but add a light shadow that will look awesome on white pages', 'june') ,
	'section' => 'cl_header_main',
	'type' => 'switch',
	'priority' => 10,
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'june') ,
		0 => esc_attr__('Off', 'june') ,
	) ,
	'transport' => 'postMessage'
));



/* ----------------------------- Top Nav --------------------------------------- */
Kirki::add_section('cl_header_top_row', array(
	'title' => esc_html__('Top Navigation Row', 'june') ,
	'tooltip' => '',
	'panel' => 'cl_header',
	'type' => '',
	'priority' => 160,
	'capability' => 'edit_theme_options'
));

Kirki::add_field('cl_june', array(
	'settings' => 'header_top_nav',
	'label' => esc_html__('Top Header Row', 'june') ,
	'tooltip' => esc_html__('Switch on to active Top Header Navigation Row, than you can add elements.', 'june') ,
	'section' => 'cl_header_top_row',
	'type' => 'switch',
	'priority' => 10,
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'june') ,
		0 => esc_attr__('Off', 'june') ,
	) ,
	'transport' => 'refresh'
));

Kirki::add_field('cl_june', array(
	'settings' => 'header_top_nav_sticky',
	'label' => esc_html__('Show on sticky', 'june') ,
	'tooltip' => esc_html__('Switch on to active Top Header Navigation Row on sticky', 'june') ,
	'section' => 'cl_header_top_row',
	'type' => 'switch',
	'priority' => 10,
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'june') ,
		0 => esc_attr__('Off', 'june') ,
	) ,
	'required' => array(
		array(
			'setting' => 'header_sticky',
			'operator' => '==',
			'value' => true,
		) ,
	) ,
	'transport' => 'refresh'
));

Kirki::add_field('cl_june', array(
	'settings' => 'header_top_nav_mobile',
	'label' => esc_html__('Show on Mobile', 'june') ,
	'tooltip' => esc_html__('Switch on to active Top Header Navigation Row on mobile', 'june') ,
	'section' => 'cl_header_top_row',
	'type' => 'switch',
	'priority' => 10,
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'june') ,
		0 => esc_attr__('Off', 'june') ,
	) ,
	'transport' => 'postMessage'
));

Kirki::add_field('cl_june', array(
	'settings' => 'header_design_top',
	'label' => esc_html__('Header Box Design', 'june') ,
	'section' => 'cl_header_top_row',
	'type' => 'css_tool',
	'default' => array(
		'border-bottom-width' => '0px'
	) ,
	'into_group' => true,
	'transport' => 'postMessage',
));

Kirki::add_field('cl_june', array(
	'type' => 'slider',
	'settings' => 'header_space_el_top',
	'label' => 'Space between elements',
	'default' => 24,
	'choices' => array(
		'min' => '0',
		'max' => '80',
		'step' => '1',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_top_row',
	'output' => array(
		array(
			'element' => '.header_container.header-left > .top_nav .header-el, .header_container.header-right > .top_nav .header-el',
			'units' => 'px',
			'property' => 'margin-bottom',
			'media_query' => '@media (min-width: 992px)'
		) ,
		array(
			'element' => 'body:not(.rtl) .header_container.header-top > .top_nav .header-el, body:not(.rtl) .header_container.header-bottom > .top_nav .header-el',
			'units' => 'px',
			'property' => 'margin-right',
			'media_query' => '@media (min-width: 992px)'
		),
		array(
			'element' => 'body.rtl .header_container.header-top > .top_nav .header-el, body.rtl .header_container.header-bottom > .top_nav .header-el',
			'units' => 'px',
			'property' => 'margin-left',
			'media_query' => '@media (min-width: 992px)'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_june', array(
	'type' => 'slider',
	'settings' => 'header_height_top',
	'label' => 'Height',
	'tooltip' => 'Works on Top, Bottom Layouts or when outter boxed header is actived',
	'default' => 30,
	'choices' => array(
		'min' => '30',
		'max' => '600',
		'step' => '1',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_top_row',
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => '.header_container.header-top > .top_nav, .header_container.header-bottom > .top_nav',
			'units' => 'px',
			'property' => 'height',
			'media_query' => '@media (min-width: 992px)'
		) ,
		array(
			'element' => '.header_container.header-top > .top_nav, .header_container.header-bottom > .top_nav',
			'units' => 'px',
			'property' => 'line-height',
			'media_query' => '@media (min-width: 992px)'
		)
	) ,
));


Kirki::add_field('cl_june', array(
	'settings' => 'header_typography_divider_top',
	'label' => esc_html__('Typography', 'june') ,
	'section' => 'cl_header_top_row',
	'type' => 'groupdivider',
	'into_group' => true,
));

Kirki::add_field('cl_june', array(
	'settings' => 'header_custom_typography_top',
	'label' => esc_html__('Typography', 'june') ,
	'section' => 'cl_header_top_row',
	'type' => 'grouptitle',
	'into_group' => true,
));

Kirki::add_field('cl_june', array(
	'settings' => 'header_overwrite_typography',
	'label' => esc_html__('Overwrite Default Typography', 'june') ,
	'tooltip' => esc_html__('Switch on to active custom typography for top navigation', 'june') ,
	'section' => 'cl_header_top_row',
	'type' => 'switch',
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'june') ,
		0 => esc_attr__('Off', 'june') ,
	) ,
	'transport' => 'postMessage'
));

Kirki::add_field('cl_june', array(
	'type' => 'typography',
	'settings' => 'header_top_typography',
	'label' => 'Typography Style',
	'inline_control' => true,
	'section' => 'cl_header_top_row',
	'default'     => array(
		'font-family'    => 'Source Sans Pro',
		'letter-spacing' => '0',
		'font-weight' => '400',
		'text-transform' => 'none',
		'font-size' => '14px',
		'color' => '#6a6a6a'
	),
	'priority'    => 10,
	'transport' => 'auto',
	'output'      => array(
		array(
			'element' => codeless_dynamic_css_register_tags('header_top_typography'),
		),

	),
	'required' => array(
		array(
			'setting' => 'header_overwrite_typography',
			'operator' => '==',
			'value' => true,
		) ,
	)
));

Kirki::add_field('cl_june', array(
	'settings' => 'header_custom_divider_top',
	'label' => esc_html__('Design Options', 'june') ,
	'section' => 'cl_header_top_row',
	'type' => 'groupdivider',
	'into_group' => true,
));

Kirki::add_field('cl_june', array(
	'settings' => 'header_custom_ti_top',
	'label' => esc_html__('Background', 'june') ,
	'section' => 'cl_header_top_row',
	'type' => 'grouptitle',
	'into_group' => true,
));

Kirki::add_field('cl_june', array(
	'type' => 'color',
	'settings' => 'header_bg_color_top',
	'label' => 'Background Color',
	'default' => '#262A2C',
	'inline_control' => true,
	'section' => 'cl_header_top_row',
	'choices' => array(
		'alpha' => true,
		'palettes' => codeless_generate_palettes()
	),
	'output' => array(
		array(
			'element' => '.header_container > .top_nav',
			'property' => 'background-color'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_june', array(
	'type' => 'image',
	'label' => 'Background Image',
	'settings' => 'header_bg_image_top',
	'default' => '',
	'inline_control' => true,
	'section' => 'cl_header_top_row',
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => '.header_container > .top_nav',
			'property' => 'background-image'
		)
	) ,
));

Kirki::add_field('cl_june', array(
	'type' => 'select',
	'settings' => 'header_bg_pos_top',
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
	'section' => 'cl_header_top_row',
	'output' => array(
		array(
			'element' => '.header_container > .top_nav',
			'property' => 'background-position'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_june', array(
	'type' => 'select',
	'settings' => 'header_bg_repeat_top',
	'label' => 'Background Repeat',
	'default' => 'no-repeat',
	'choices' => array(
		'repeat' => 'repeat',
		'repeat-x' => 'repeat-x',
		'repeat-y' => 'repeat-y',
		'no-repeat' => 'no-repeat'
	) ,
	'inline_control' => true,
	'section' => 'cl_header_top_row',
	'output' => array(
		array(
			'element' => '.header_container > .top_nav',
			'property' => 'background-repeat'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_june', array(
	'settings' => 'header_border_divider_top',
	'label' => esc_html__('Design Options', 'june') ,
	'section' => 'cl_header_top_row',
	'type' => 'groupdivider',
	'into_group' => true,
));

Kirki::add_field('cl_june', array(
	'settings' => 'header_border_ti_top',
	'label' => esc_html__('Border', 'june') ,
	'section' => 'cl_header_top_row',
	'type' => 'grouptitle',
	'into_group' => true,
));

Kirki::add_field('cl_june', array(
	'type' => 'select',
	'settings' => 'header_border_style_top',
	'label' => 'Border Style',
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
	'inline_control' => true,
	'section' => 'cl_header_top_row',
	'output' => array(
		array(
			'element' => '.header_container > .top_nav',
			'property' => 'border-style'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_june', array(
	'type' => 'color',
	'settings' => 'header_border_color_top',
	'label' => 'Border Color',
	'default' => 'rgba(235,235,235,0.17)',
	'inline_control' => true,
	'section' => 'cl_header_top_row',
	'choices' => array(
		'alpha' => true,
		'palettes' => codeless_generate_palettes()
	),
	'output' => array(
		array(
			'element' => '.header_container > .top_nav',
			'property' => 'border-color'
		)
	) ,
	'transport' => 'auto'
));






/* ----------------------------- Extra Row --------------------------------------- */

Kirki::add_section('cl_header_extra_row', array(
	'title' => esc_html__('Extra (Bottom) Row', 'june') ,
	'tooltip' => '',
	'panel' => 'cl_header',
	'type' => '',
	'priority' => 160,
	'capability' => 'edit_theme_options'
));

Kirki::add_field('cl_june', array(
	'settings' => 'header_extra',
	'label' => esc_html__('Extra Header Row', 'june') ,
	'tooltip' => esc_html__('Switch on to active Extra Header Navigation Row, than you can add elements.', 'june') ,
	'section' => 'cl_header_extra_row',
	'type' => 'switch',
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'june') ,
		0 => esc_attr__('Off', 'june') ,
	) ,
	'transport' => 'refresh'
));


Kirki::add_field('cl_june', array(
	'settings' => 'header_extra_boxed',
	'label' => esc_html__('Outer Boxed Row', 'june') ,
	'tooltip' => esc_html__('Switch on to make this row boxed and to overlap some pixel the content', 'june') ,
	'section' => 'cl_header_extra_row',
	'type' => 'switch',
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'june') ,
		0 => esc_attr__('Off', 'june') ,
	) ,
	'transport' => 'refresh'
));

Kirki::add_field('cl_june', array(
	'settings' => 'header_extra_boxed_shadow',
	'label' => esc_html__('Outer Box Shadow', 'june'),
	'section' => 'cl_header_extra_row',
	'type' => 'switch',
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'june') ,
		0 => esc_attr__('Off', 'june') ,
	) ,
	'required' => array(
		array(
			'setting' => 'header_extra_boxed',
			'operator' => '==',
			'value' => true,
		) ,
	) ,
	'transport' => 'refresh'
));

Kirki::add_field('cl_june', array(
	'settings' => 'header_extra_forced_center',
	'label' => esc_html__('Force Center, Middle Column', 'june') ,
	'tooltip' => esc_html__('Switch On to force the middle column of the extra Header Row to be centered.', 'june') ,
	'section' => 'cl_header_extra_row',
	'type' => 'switch',
	'priority' => 10,
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'june') ,
		0 => esc_attr__('Off', 'june') ,
	) ,
	'transport' => 'refresh',
));

Kirki::add_field('cl_june', array(
	'settings' => 'header_design_extra',
	'label' => esc_html__('Box Design', 'june') ,
	'section' => 'cl_header_extra_row',
	'type' => 'css_tool',
	'default' => array(
		'border-bottom-width' => '0px'
	) ,
	'into_group' => true,
	'transport' => 'postMessage',
));

Kirki::add_field('cl_june', array(
	'type' => 'slider',
	'settings' => 'header_space_el_extra',
	'label' => 'Space between elements',
	'default' => 60,
	'choices' => array(
		'min' => '0',
		'max' => '80',
		'step' => '1',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_extra_row',
	'output' => array(
		array(
			'element' => '.header_container.header-left > .extra_row .header-el, .header_container.header-right > .extra_row .header-el',
			'units' => 'px',
			'property' => 'margin-bottom',
			'media_query' => '@media (min-width: 992px)'
		) ,
		array(
			'element' => '.header_container.header-top > .extra_row .header-el, .header_container.header-bottom > .extra_row .header-el',
			'units' => 'px',
			'property' => 'margin-right',
			'media_query' => '@media (min-width: 992px)'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_june', array(
	'type' => 'slider',
	'settings' => 'header_height_extra',
	'label' => 'Height',
	'tooltip' => 'Works on Top, Bottom Layouts or when outter boxed header is actived',
	'default' => 40,
	'choices' => array(
		'min' => '30',
		'max' => '600',
		'step' => '1',
	) ,
	'inline_control' => true,
	'section' => 'cl_header_extra_row',
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => '.header_container.header-top > .extra_row, .header_container.header-bottom > .extra_row',
			'units' => 'px',
			'property' => 'height'
		) ,
		array(
			'element' => '.header_container.header-top > .extra_row, .header_container.header-bottom > .extra_row',
			'units' => 'px',
			'property' => 'line-height'
		)
	) ,
));

Kirki::add_field('cl_june', array(
	'settings' => 'header_custom_divider_extra',
	'label' => esc_html__('Design Options', 'june') ,
	'section' => 'cl_header_extra_row',
	'type' => 'groupdivider',
	'into_group' => true,
));

Kirki::add_field('cl_june', array(
	'settings' => 'header_custom_ti_extra',
	'label' => esc_html__('Background', 'june') ,
	'section' => 'cl_header_extra_row',
	'type' => 'grouptitle',
	'into_group' => true,
));

Kirki::add_field('cl_june', array(
	'type' => 'color',
	'settings' => 'header_bg_color_extra',
	'label' => 'Background Color',
	'default' => '',
	'inline_control' => true,
	'section' => 'cl_header_extra_row',
	'choices' => array(
		'alpha' => true,
		'palettes' => codeless_generate_palettes()
	),
	'output' => array(
		array(
			'element' => '.header_container > .extra_row',
			'property' => 'background-color'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_june', array(
	'type' => 'image',
	'label' => 'Background Image',
	'settings' => 'header_bg_image_extra',
	'default' => '',
	'inline_control' => true,
	'section' => 'cl_header_extra_row',
	'transport' => 'auto',
	'output' => array(
		array(
			'element' => '.header_container > .extra_row',
			'property' => 'background-image'
		)
	) ,
));

Kirki::add_field('cl_june', array(
	'type' => 'select',
	'settings' => 'header_bg_pos_extra',
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
	'section' => 'cl_header_extra_row',
	'output' => array(
		array(
			'element' => '.header_container > .extra_row',
			'property' => 'background-position'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_june', array(
	'type' => 'select',
	'settings' => 'header_bg_repeat_extra',
	'label' => 'Background Repeat',
	'default' => 'no-repeat',
	'choices' => array(
		'repeat' => 'repeat',
		'repeat-x' => 'repeat-x',
		'repeat-y' => 'repeat-y',
		'no-repeat' => 'no-repeat'
	) ,
	'inline_control' => true,
	'section' => 'cl_header_extra_row',
	'output' => array(
		array(
			'element' => '.header_container > .extra_row',
			'property' => 'background-repeat'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_june', array(
	'settings' => 'header_border_divider_extra',
	'label' => esc_html__('Design Options', 'june') ,
	'section' => 'cl_header_extra_row',
	'type' => 'groupdivider',
	'into_group' => true,
));

Kirki::add_field('cl_june', array(
	'settings' => 'header_border_ti_extra',
	'label' => esc_html__('Border', 'june') ,
	'section' => 'cl_header_extra_row',
	'type' => 'grouptitle',
	'into_group' => true,
));

Kirki::add_field('cl_june', array(
	'type' => 'select',
	'settings' => 'header_border_style_extra',
	'label' => 'Border Style',
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
	'inline_control' => true,
	'section' => 'cl_header_extra_row',
	'output' => array(
		array(
			'element' => '.header_container > .extra_row',
			'property' => 'border-style'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_june', array(
	'type' => 'color',
	'settings' => 'header_border_color_extra',
	'label' => 'Border Color',
	'default' => 'rgba(235,235,235,0.17)',
	'inline_control' => true,
	'section' => 'cl_header_extra_row',
	'choices' => array(
		'alpha' => true,
		'palettes' => codeless_generate_palettes()
	),
	'output' => array(
		array(
			'element' => '.header_container > .extra_row',
			'property' => 'border-color'
		)
	) ,
	'transport' => 'auto'
));



Kirki::add_field('cl_june', array(
	'settings' => 'header_extra_nav_sticky',
	'label' => esc_html__('Show on sticky', 'june') ,
	'tooltip' => esc_html__('Switch on to active Top Header Navigation Row on sticky', 'june') ,
	'section' => 'cl_header_extra_row',
	'type' => 'switch',
	'priority' => 10,
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'june') ,
		0 => esc_attr__('Off', 'june') ,
	) ,
	'required' => array(
		array(
			'setting' => 'header_sticky',
			'operator' => '==',
			'value' => true,
			'transport' => 'postMessage'
		) ,
	) ,
	'transport' => 'refresh'
));

Kirki::add_field('cl_june', array(
	'settings' => 'header_extra_row_sticky',
	'label' => esc_html__('Show on sticky', 'june') ,
	'tooltip' => esc_html__('Switch on to active Extra Header Row Row on sticky', 'june') ,
	'section' => 'cl_header_extra_row',
	'type' => 'switch',
	'priority' => 10,
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'june') ,
		0 => esc_attr__('Off', 'june') ,
	) ,
	'required' => array(
		array(
			'setting' => 'header_sticky',
			'operator' => '==',
			'value' => true,
		) ,
	) ,
	'transport' => 'refresh'
));



/* ---------------------------- Dropdown & Mobile -------------------------------- */

Kirki::add_section('cl_header_dropdown', array(
	'title' => esc_html__('Dropdown & Mobile Styles', 'june') ,
	'tooltip' => esc_html__('All styles of dropdown, megamenu and mobile', 'june') ,
	'panel' => 'cl_header',
	'type' => '',
	'priority' => 160,
	'capability' => 'edit_theme_options'
));
Kirki::add_field('cl_june', array(
	'type' => 'color',
	'settings' => 'dropdown_bg_color',
	'label' => 'Background Color',
	'default' => '#fff',
	'inline_control' => true,
	'section' => 'cl_header_dropdown',
	'choices' => array(
		'alpha' => true,
		'palettes' => codeless_generate_palettes()
	),
	'output' => array(
		array(
			'element' => 'nav .codeless_custom_menu_mega_menu, nav .menu > li > ul.sub-menu, nav .menu > li > ul.sub-menu ul, .cl-mobile-menu, .cl-submenu',
			'property' => 'background-color'
		)
	) ,
	'transport' => 'auto'
));

Kirki::add_field('cl_june', array(
	'type' => 'color',
	'settings' => 'dropdown_item_hover_bg',
	'label' => 'Item Hover BG Color',
	'default' => 'rgba(255,255,255,0)',
	'inline_control' => true,
	'section' => 'cl_header_dropdown',
	'choices' => array(
		'alpha' => true,
		'palettes' => codeless_generate_palettes()
	),
	'output' => array(
		array(
			'element' => 'nav .menu li > ul.sub-menu li:hover, #site-header-cart .cart_list li:hover, #site-header-search input[type="search"]',
			'property' => 'background-color'
		)
	) ,
	'transport' => 'auto'
));
Kirki::add_field('cl_june', array(
	'type' => 'color',
	'settings' => 'dropdown_item_hover_color',
	'label' => 'Item Hover Font Color',
	'default' => '#EB5A46',
	'inline_control' => true,
	'section' => 'cl_header_dropdown',
	'choices' => array(
		'alpha' => true,
		'palettes' => codeless_generate_palettes()
	),
	'output' => array(
		array(
			'element' => 'nav .menu li ul.sub-menu li a:hover, #site-header-search input[type="search"], nav .menu li ul.sub-menu li.hasSubMenu.showDropdown > a',
			'property' => 'color',
			'suffix' => '!important'
		)
	) ,
	'transport' => 'auto'
));
Kirki::add_field('cl_june', array(
	'type' => 'color',
	'settings' => 'dropdown_borders_color',
	'label' => 'Separators Color',
	'default' => 'rgba(58,58,58,0)',
	'inline_control' => true,
	'section' => 'cl_header_dropdown',
	'choices' => array(
		'alpha' => true,
		'palettes' => codeless_generate_palettes()
	),
	'output' => array(
		array(
			'element' => 'nav .codeless_custom_menu_mega_menu > ul > li, #site-header-search input[type="search"]',
			'property' => 'border-color'
		)
	) ,
	'transport' => 'auto'
));


/* ----------------- Sticky -------------  */

Kirki::add_section('cl_header_sticky', array(
	'title' => esc_html__('Sticky', 'june') ,
	'tooltip' => esc_html__('Make header sticky', 'june') ,
	'panel' => 'cl_header',
	'type' => '',
	'priority' => 160,
	'capability' => 'edit_theme_options'
));
Kirki::add_field('cl_june', array(
	'settings' => 'header_sticky',
	'label' => esc_html__('Sticky', 'june') ,
	'tooltip' => esc_html__('By switch this option, your header will be sticky', 'june') ,
	'section' => 'cl_header_sticky',
	'type' => 'switch',
	'priority' => 10,
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'june') ,
		0 => esc_attr__('Off', 'june') ,
	) ,
	'transport' => 'postMessage'
));
Kirki::add_field('cl_june', array(
	'type' => 'color',
	'settings' => 'header_sticky_bg',
	'label' => 'Sticky BG Color',
	'default' => '#ffffff',
	'inline_control' => true,
	'section' => 'cl_header_sticky',
	'choices' => array(
		'alpha' => true,
	),
	'output' => array(
		array(
			'element' => '.header_container.cl-header-sticky-ready',
			'property' => 'background-color'
		)
	) ,
	'transport' => 'auto'
));
Kirki::add_field('cl_june', array(
	'settings' => 'header_sticky_content',
	'label' => esc_html__('Sticky Content Color', 'june') ,
	'section' => 'cl_header_sticky',
	'type' => 'select',
	'default' => 'dark',
	'priority' => 10,
	'choices' => array(
		'light' => esc_attr__('Light', 'june') ,
		'dark' => esc_attr__('Dark', 'june') ,
	) ,
	'transport' => 'postMessage',
));
Kirki::add_field('cl_june', array(
	'settings' => 'header_sticky_shadow',
	'label' => esc_html__('Add Shadow', 'june') ,
	'section' => 'cl_header_sticky',
	'type' => 'switch',
	'priority' => 10,
	'default' => 1,
	'choices' => array(
		1 => esc_attr__('On', 'june') ,
		0 => esc_attr__('Off', 'june') ,
	) ,
	'transport' => 'postMessage'
));


Kirki::add_section('cl_header_page_defaults', array(
	'title' => esc_html__('Default Header Options', 'june') ,
	'tooltip' => esc_html__('', 'june') ,
	'panel' => 'cl_header',
	'type' => '',
	'priority' => 160,
	'capability' => 'edit_theme_options'
));

Kirki::add_field('cl_june', array(
	'settings' => 'transparent_header',
	'label' => esc_html__('Header Transparent', 'june') ,
	'section' => 'cl_header_page_defaults',
	'type' => 'switch',
	'priority' => 10,
	'default' => 0,
	'choices' => array(
		1 => esc_attr__('On', 'june') ,
		0 => esc_attr__('Off', 'june') ,
	) ,
	'transport' => 'postMessage'
));

Kirki::add_field('cl_june', array(
	'settings' => 'header_color',
	'label' => esc_html__('Header Color', 'june') ,
	'section' => 'cl_header_page_defaults',
	'type' => 'select',
	'default' => 'dark',
	'priority' => 10,
	'choices'     => array(
      'dark' => esc_attr__( 'Dark', 'june' ),
      'light' => esc_attr__( 'Light', 'june' ),
   ),
	'transport' => 'postMessage',
));


Kirki::add_field('cl_june', array(
	'settings' => 'archives_page_header_image',
	'label' => esc_html__('Archives Page Header Image', 'june') ,
	'tooltip' => esc_html__('For each page you can set a new Page Header Element, but some pages for example archives, you can\'t set a page header. You need to add a default Image here if you use a Transparent Header Style.' , 'june') ,
	'section' => 'cl_header_page_defaults',
	'type' => 'image',
	'priority' => 10,
	'default' => '',
	
	'transport' => 'postMessage',
	'required' => array(
		array(
			'setting' => 'transparent_header',
			'operator' => '==',
			'value' => true,
		) ,
	)
));



?>