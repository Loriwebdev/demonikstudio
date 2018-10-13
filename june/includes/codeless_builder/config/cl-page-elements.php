<?php
	
	Kirki::add_section( 'cl_codeless_page_builder', array(
	    'title'          => esc_html__( 'Page Builder', 'june' ),
	    'description'    => esc_html__( 'Options for adding an additional element on header', 'june' ),
	    'panel'          => '',
	    'type'			 => '',
	    'priority'       => 160,
	    'capability'     => 'edit_theme_options'
	) );
	
	/* Row */
	
	cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Row', 'june' ),
			'section'     => 'cl_codeless_page_builder',
			'tooltip' => 'Manage all options of the selected Row',
			//'priority'    => 10,
			'icon'		  => 'icon-software-layout',
			'transport'   => 'postMessage',
			'paddingPositions' => array('top', 'bottom'),
			'settings'    => 'cl_row',
			'is_container' => true,
			'is_root'	  => true,
			'fields' => array(
				
				
				'element_tabs' => array(
					'type' => 'show_tabs',
					'default' => 'general',
					'tabs' => array(
						'general' => array( 'General', 'cl-icon-settings' ),
						'design' => array( 'Design', 'cl-icon-tune' ),
						'animation' => array( 'Animation', 'cl-icon-animation' ),
						'responsive' => array( 'Responsive', 'cl-icon-responsive' )
					)
				),
				
				'general_tab_start' => array(
					'type' => 'tab_start',
					'label' => 'General',
					'tabid' => 'general'
				),
				
					/* ----------------------------------------------- */
					
					'row_layout_start' => array(
						'type' => 'group_start',
						'label' => 'Layout',
						'groupid' => 'layout'
					),
						
						
				
						'row_type' => array(
							'type'     => 'select',
							'priority' => 10,
							'label'       => esc_attr__( 'Type', 'june' ),
							'default'     => 'container',
							'choices' => array(
								'container' => 'Into Container',
								'container-fluid' => 'Stretch Content'
							),
							'selector' => '.cl-row > .container, .cl-row > .container-fluid',
							'selectClass' => ' ',
							'group_vc' => 'Layout'
						),
						
						/*'row_vertical_stretch' => array(
							'type'     => 'select',
							'priority' => 10,
							'label'       => esc_attr__( 'Vertical Stretch', 'june' ),
							'tooltip' => esc_attr__( 'Select the type of row to use, this option can be overrided by Design Tool', 'june' ),
							'default'     => 'with_padd',
							'choices' => array(
								'with_padd' => 'With Padding',
								'no_padd' => 'No Padding (Fullheigt Stretch)'
							),
							'selector' => '.cl-row > div > .row',
							'selectClass' => ' '
						),*/
						
						'fullheight' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Full Height Row', 'june' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl-row > div > .row',
							'addClass' => 'cl_row-fullheight cl_row-flex',
							'group_vc' => 'Layout'
						),
						
						
						
						'content_pos' => array(
							'type'     => 'select',
							'priority' => 10,
							'label'       => esc_attr__( 'Content Position', 'june' ),
							'tooltip' => esc_attr__( 'Change position of columns and elements into the fullheight Row', 'june' ),
							'default'     => 'middle',
							'choices' => array(
								'middle' => 'Middle',
								'top' => 'Top',
								'bottom' => 'Bottom',
								'stretch' => 'Stretch'
							),
							'selector' => '.cl-row > div > .row',
							'selectClass' => 'cl_row-cp-',
							
							'cl_required'    => array(
								array(
									'setting'  => 'fullheight',
									'operator' => '==',
									'value'    => 1,
								),
							),
							'group_vc' => 'Layout'
						),

						'custom_width_bool' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Custom Container Width', 'june' ),
							'tooltip' => 'Switch on to add a custom width for container only for this row. Switch Off to leave the default container width.',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'group_vc' => 'Layout'
						),

						'custom_width' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Container Width', 'june' ),
							'tooltip' => esc_attr__( 'Is applied only for media screen (min-width: 1200px), value in pixel', 'june' ),
							'default'     => codeless_get_mod('layout_container_width', 1100),
							'choices'     => array(
								'min'  => '0',
								'max'  => '1600',
								'step' => '10',
							),
							'suffix' => 'px',
							'selector' => '.cl-row > .container-content',
							'css_property' => 'width',
							'media_query' => '(min-width: 1200px)',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_width_bool',
									'operator' => '==',
									'value'    => 1,
								),
							),
							'group_vc' => 'Layout'
						),

						
					
					'row_layout_end' => array(
						'type' => 'group_end',
						'label' => 'Row Layout',
						'groupid' => 'layout'
					),
					
					/* ----------------------------------------------------- */
					
					'columns_start' => array(
						'type' => 'group_start',
						'label' => 'Columns',
						'groupid' => 'columns'
					),
						
						
						'columns_gap' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Columns Gap', 'june' ),
							'tooltip'     => 'Distance between columns. Value in px',
							'default'     => '15',
							'choices'     => array(
								'min'  => '0',
								'max'  => '35',
								'step' => '1',
							),
							'suffix' => 'px',
							'selector' => '.row > .cl_cl_column > .cl_column, .row > .cl_column',
							'css_property' => array('padding-left', 'padding-right'),
							'group_vc' => 'Columns'
						),
						
						
						'equal_height' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Equal Columns Height', 'june' ),
							'default'     => '0',
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl-row > div > .row',
							'addClass' => 'cl_row-equal_height cl_row-flex',
							'group_vc' => 'Columns'
						), 

						
						
					'columns_end' => array(
						'type' => 'group_end',
						'label' => 'Columns',
						'groupid' => 'columns'
					),
					


					'video_start' => array(
						'type' => 'group_start',
						'label' => 'Video',
						'groupid' => 'video'
					),
					
					
						'video' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Video Background', 'june' ),
							'default'     => 'none',
							'choices' => array(
								'none'	=> 'None',
								'self' =>	'Self-Hosted',
								'youtube' =>	'Youtube',
								'vimeo' => 'Vimeo'
							),
							'customJS' => 'inlineEdit_videoSection',
							'group_vc' => 'Video'
						),
						
						'video_mp4' => array(
							
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Video Mp4', 'june' ),
							'default'     => '',
							'cl_required'    => array(
								array(
									'setting'  => 'video',
									'operator' => '==',
									'value'    => 'self',
								),
							),
							'customJS' => 'inlineEdit_videoSection',
							'group_vc' => 'Video'
						),
						'video_webm' => array(
							
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Video Webm', 'june' ),
							'default'     => '',
							'cl_required'    => array(
								array(
									'setting'  => 'video',
									'operator' => '==',
									'value'    => 'self',
								),
							),
							'customJS' => 'inlineEdit_videoSection',
							'group_vc' => 'Video'
						),
						'video_ogv' => array(
							
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Video Ogv', 'june' ),
							'default'     => '',
							'cl_required'    => array(
								array(
									'setting'  => 'video',
									'operator' => '==',
									'value'    => 'self',
								),
							),
							'customJS' => 'inlineEdit_videoSection',
							'group_vc' => 'Video'
						),

						
						'video_youtube' => array(
							
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Youtube ID', 'june' ),
							'default'     => '',
							'cl_required'    => array(
								array(
									'setting'  => 'video',
									'operator' => '==',
									'value'    => 'youtube',
								),
							
							),
							'customJS' => 'inlineEdit_videoSection',
							'group_vc' => 'Video'
						),
						
						'video_vimeo' => array(
							
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Vimeo ID', 'june' ),
							'default'     => '',
							'cl_required'    => array(
								array(
									'setting'  => 'video',
									'operator' => '==',
									'value'    => 'vimeo',
								),
							
							),
							'customJS' => 'inlineEdit_videoSection',
							'group_vc' => 'Video'
						),
						
						'video_loop' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Video Loop', 'june' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'cl_required'    => array(
								array(
									'setting'  => 'video',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
							'customJS' => 'inlineEdit_videoSection',
							'group_vc' => 'Video'
						),

					'video_end' => array(
						'type' => 'group_end',
						'label' => 'Video',
						'groupid' => 'video'
					),


					/* --------------------------------------------- */
					
					'row_info_start' => array(
						'type' => 'group_start',
						'label' => 'Attributes',
						'groupid' => 'attr'
					),
					
						'row_disabled' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Disable Row', 'june' ),
							'default'     => '0',
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl-row',
							'addClass' => 'disabled_row',
							'group_vc' => 'Attributes'
						),
						
						'row_id' => array(
							
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Row Id', 'june' ),
							'tooltip' => esc_attr__( 'This is useful when you want to add unique identifier to row.', 'june' ),
							'default'     => '',
							'group_vc' => 'Attributes'
						),
						
						'extra_class' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Extra Class', 'june' ),
							'tooltip' => esc_attr__( 'Add extra class identifiers to this row, that can be used for various custom styles.', 'june' ),
							'default'     => '',
							'group_vc' => 'Attributes'
						),

						'anchor_label' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Anchor Label', 'june' ),
							'tooltip' => esc_attr__( 'Used on Vertical Codeless Slider', 'june' ),
							'default'     => '',
							'selector' => '.cl-row',
							'htmldata' => 'anchor',
							'group_vc' => 'Attributes'
						),
						
			
					'row_info_end' => array(
						'type' => 'group_end',
						'label' => 'Attributes',
						'groupid' => 'attr'
					),
					
				
					
					
					
					/* ----------------------------------------------- */
					
					
				
				
				
				'general_tab_end' => array(
					'type' => 'tab_end',
					'label' => '',
					'tabid' => 'general'
				),
				
				
				/*-------------------------------------------------------*/
				
				
				'design_tab_start' => array(
					'type' => 'tab_start',
					'label' => 'Design',
					'tabid' => 'design'
				),
					
					/* ------------------------------------------ */
					
					'panel' => array(
						'type' => 'group_start',
						'label' => 'Box',
						'groupid' => 'design_panel'
					),
				
						'css_style' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl-row',
							'css_property' => '',
							'default' => array('padding-top' => codeless_get_mod( 'row_default_padding', '45' ).'px', 'padding-bottom' => codeless_get_mod( 'row_default_padding', '45' ).'px' ),
							'group_vc' => 'Design'
						),
						
						'text_color' => array(
							'type' => 'inline_select',
							'label' => 'Text Color',
							'default' => 'dark-text',
							'choices' => array(
								'dark-text' => 'Dark',
								'light-text' => 'Light'
							),
							'selector' => '.cl-row',
							'selectClass' => '',
							'group_vc' => 'Design'
						),
					
						
					'design_panel_end' => array(
						'type' => 'group_end',
						'label' => 'Animation',
						'groupid' => 'design_panel'
					),
					
					/* ------------------------------------------ */
				
					'background_color_group' => array(
						'type' => 'group_start',
						'label' => 'Background Color',
						'groupid' => 'background_color_group'
					),
					
						'background_color' => array(
							'type' => 'color',
							'label' => 'Background Color',
							'default' => '',
							'selector' => '.cl-row > .bg-layer',
							
							'css_property' => 'background-color',
							'alpha' => true,
							'group_vc' => 'Design'
						),
					
					'background_color_group_end' => array(
						'type' => 'group_end',
						'label' => 'Background Color',
						'groupid' => 'background_color_group',
						'group_vc' => 'Design'
					),
					
					/* ------------------------------------------- */
					
					'background_image_group' => array(
						'type' => 'group_start',
						'label' => 'Background Image',
						'groupid' => 'background_image_group'
					),
					
						'background_image' => array(
							'type'        => 'image',
							'label'       => esc_html__( '', 'june' ),
							'default'     => '',
							'priority'    => 10,
							'selector' => '.cl-row > .bg-layer',
							'css_property' => 'background-image',
							'group_vc' => 'Design'
						),
						
						'background_position' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Background Position', 'june' ),
							'default'     => 'left top',
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
							),
							'selector' => '.cl-row > .bg-layer',
							'css_property' => 'background-position',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
							'group_vc' => 'Design'
						),

						'background_size' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Background Position', 'june' ),
							'default'     => 'cover',
							'choices' => array(
								'cover' => 'Cover',
								'auto' => 'auto',
							),
							'selector' => '.cl-row > .bg-layer',
							'css_property' => 'background-size',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
							'group_vc' => 'Design'
						),
						
						'background_repeat' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Background Repeat', 'june' ),
							'default'     => 'no-repeat',
							'choices' => array(
								'repeat' => 'repeat',
								'repeat-x' => 'repeat-x',
								'repeat-y' => 'repeat-y',
								'no-repeat' => 'no-repeat'
							),
							'selector' => '.cl-row > .bg-layer',
							'css_property' => array('background-repeat'),
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
							'group_vc' => 'Design'
						),
						
						'background_attachment' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Bg. Attachment', 'june' ),
							'default'     => 'scroll',
							'choices' => array(
								'scroll' => 'scroll',
								'fixed' => 'fixed',
							),
							'selector' => '.cl-row > .bg-layer',
							'css_property' => 'background-attachment',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
							'group_vc' => 'Design'
						),
						
						'background_blend' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Bg. Blend', 'june' ),
							'default'     => 'normal',
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
							),
							'selector' => '.cl-row > .bg-layer',
							'css_property' => 'background-blend-mode',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
							'group_vc' => 'Design'
						),
						
						'parallax' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Parallax', 'june' ),
							'tooltip'       => esc_html__( 'Works with smoothscroll active only.', 'june' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl-row',
							'addClass' => 'cl-parallax',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
							'group_vc' => 'Design'
						),
					
					'background_image_group_end' => array(
						'type' => 'group_end',
						'label' => 'Background Image',
						'groupid' => 'background_image_group'
					),
				
					/* ---------------------------------------------------- */
					
					'overlay_group' => array(
						'type' => 'group_start',
						'label' => 'Overlay',
						'groupid' => 'overlay'
					),
				
						'overlay' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Overlay Backgrund', 'june' ),
							'default'     => 'none',
							'choices' => array(
								'none' => 'None',
								'color' => 'Color',
								'gradient' => 'Gradient'
							),
							'group_vc' => 'Design'
							
						),
						
						'overlay_color' => array(
							'type' => 'color',
							'label' => 'Overlay Color',
							'default' => '',
							'selector' => '.cl-row > .overlay',
							'css_property' => 'background-color',
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '==',
									'value'    => 'color',
								),
							),
							'alpha' => false,
							'group_vc' => 'Design'
						),
						
						'overlay_gradient' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Overlay Gradient', 'june' ),
							'default'     => 'none',
							'choices' => array(
								'none'	=> 'None',
								'azure_pop' =>	'Azure Pop',
								'love_couple' => 'Love Couple',
								'disco' => 'Disco',
								'limeade' => 'Limeade',
								'dania' => 'Dania',
								'shades_of_grey' =>	'Shades of Grey',
								'dusk' => 'dusk',
								'delhi' => 'delhi',
								'sun_horizon' => 'Sun Horizon',
								'blood_red' => 'Blood Red',
								'sherbert' => 'Sherbert',
								'firewatch' => 'Firewatch',
								'frost' => 'Frost',
								'mauve' => 'Mauve',
								'deep_sea' => 'Deep Sea',
								'solid_vault' => 'Solid Vault',
								'deep_space' =>	'Deep Space',
								'suzy' => 'Suzy'
								
								
							),
							'selector' => '.cl-row > .overlay',
							'selectClass' => 'cl-gradient-',
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '==',
									'value'    => 'gradient',
								),
							),
							'group_vc' => 'Design'
						),
						
						'overlay_opacity' => array(
							'type' => 'slider',
							'label' => 'Overlay Opacity',
							'default' => '0.8',
							'selector' => '.cl-row > .overlay',
							'css_property' => 'opacity',
							'choices'     => array(
								'min'  => '0',
								'max'  => '1',
								'step' => '0.05',
							),
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
							'group_vc' => 'Design'
						),
				
					'overlay_group_end' => array(
						'type' => 'group_end',
						'label' => 'Overlay',
						'groupid' => 'overlay'
					),
				
					/* ------------------------------------------ */
					
					
					'border_style_start' => array(
						'type' => 'group_start',
						'label' => 'Border Style',
						'groupid' => 'border'
					),
					
						'border_style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Border Style', 'june' ),
							'default'     => 'solid',
							'choices' => array(
								'solid'	=> 'solid',
								'dotted' =>	'dotted',
								'dashed' =>	'dashed',
								'double' => 'double',
								'groove' => 'groove',
								'ridge' => 'ridge',	
								'inset' => 'inset',	
								'outset' => 'outset',
							),
							'selector' => '.cl-row',
							'css_property' => 'border-style',
							'group_vc' => 'Design'
						),
						
						'border_color' => array(
							'type' => 'color',
							'label' => 'Border Color',
							'default' => '',
							'selector' => '.cl-row',
							'css_property' => 'border-color',
							'alpha' => true,
							'group_vc' => 'Design'
						),
					
					'border_style_end' => array(
						'type' => 'group_end',
						'label' => 'Border Style',
						'groupid' => 'border',
						'group_vc' => 'Design'
					),
					
					/* --------------------------------------------------- */


					/* ------------------------------------------ */
					
					
					'extra_styles_start' => array(
						'type' => 'group_start',
						'label' => 'Extra Style',
						'groupid' => 'extra_style'
					),
					
						'arrow_top' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Arrow Triangle Top', 'june' ),
							'tooltip'       => esc_html__( 'Add an triangle arrow at top of section', 'june' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl-row',
							'addClass' => 'cl-arrow-top',
							'group_vc' => 'Design'
						),

						'arrow_bottom' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Arrow Triangle Bottom', 'june' ),
							'tooltip'       => esc_html__( 'Add an triangle arrow at bottom of section', 'june' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl-row',
							'addClass' => 'cl-arrow-bottom',
							'group_vc' => 'Design'
						),

						'close_section' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Show Section on Button Click', 'june' ),
							'tooltip'       => esc_html__( 'Hide by default the section and show it only when the "Show Section Button" was clicked. You can set the label for the button on General -> Anchor Label', 'june' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl-row',
							'addClass' => 'cl-closed-section',
							'group_vc' => 'Design'
						),
					
					
					'extra_styles_end' => array(
						'type' => 'group_end',
						'label' => 'Extra Style',
						'groupid' => 'extra_style'
					),
					
					/* --------------------------------------------------- */

				'design_tab_end' => array(
					'type' => 'tab_end',
					'label' => '',
					'tabid' => 'design'
				),





				'animation_tab_start' => array(
					'type' => 'tab_start',
					'label' => 'Animation',
					'tabid' => 'animation'
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
							'selector' => '.cl-row > .bg-layer',
							'group_vc' => 'Animations'
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
							'selector' => '.cl-row > .bg-layer',
							'htmldata' => 'delay',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
							'group_vc' => 'Animations'
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
							'selector' => '.cl-row > .bg-layer',
							'htmldata' => 'speed',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
							'group_vc' => 'Animations'
						),

				'animation_tab_end' => array(
					'type' => 'tab_end',
					'label' => 'Animation',
					'tabid' => 'animation'
				),




				'responsive_tab_start' => array(
					'type' => 'tab_start',
					'label' => 'Responsive',
					'tabid' => 'responsive'
				),
					
					
						'device_visibility' => array(
							'type'     => 'multicheck',
							'priority' => 10,
							'label'       => esc_attr__( 'Devices Visibility', 'june' ),
							'default'     => '',
							'choices' => array(
								'hidden-xs' => esc_attr__( 'Hide on Phones (smaller-than-768px)', 'june' ),
								'hidden-sm' => esc_attr__('Hide on Tables (larger-then-768px)', 'june' ),
								'hidden-md' => esc_attr__('Hide on Medium Desktops (larger-then-992px) ', 'june' ),
								'hidden-lg' => esc_attr__('Hide on Large Desktops (larger-then1200px)', 'june' ),
							),
							'selector' => '.cl-row',
							'selectClass' => '',
							'group_vc' => 'Responsive',

						),

						'col_responsive' => array(
							'type'        => 'inline_select',
							'label'       => esc_html__( 'Responsive Columns', 'june' ),
							'tooltip' => 'This option will change the width of columns on tablets sizes from (768px to 992px). Important option to build responsive perfect layouts.',
							'default'     => 'none',
							'priority'    => 10,
							'choices'     => array(
								'none' => 'None',
								'full'  => esc_attr__( 'Fullwidth Columns', 'june' ),
								'half' => esc_attr__( 'Half Width Columns', 'june' ),
								'one_third' => esc_attr__( 'One / Third Width Columns', 'june' ),
							),
							'selector' => '.cl-row > div > .row',
							'selectClass' => 'cl-col-tablet-',
							'group_vc' => 'Responsive'
						),

						'css_style_991_row_bool' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Custom Box Design on max-width:991px', 'june' ),
							'tooltip'       => esc_html__( 'Add custom box design (padding etc) on screen sizes max-width:991px', 'june' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'group_vc' => 'Responsive'
						),

						'css_style_991' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl-row',
							'css_property' => '',
							'default' => array('padding-top' => '', 'padding-bottom' => ''),
							'media_query' => '(max-width: 991px)',
							'cl_required'    => array(
								array(
									'setting'  => 'css_style_991_row_bool',
									'operator' => '==',
									'value'    => true,
								),
							),
							'group_vc' => 'Responsive'
						),



						'css_style_767_row_bool' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Custom Box Design on max-width:767px', 'june' ),
							'tooltip'       => esc_html__( 'Add custom box design (padding etc) on screen sizes max-width:767px', 'june' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'group_vc' => 'Responsive'
							
						),

						'css_style_767' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl-row',
							'css_property' => '',
							'default' => array('padding-top' => '', 'padding-bottom' => ''),
							'media_query' => '(max-width: 767px)',
							'cl_required'    => array(
								array(
									'setting'  => 'css_style_767_row_bool',
									'operator' => '==',
									'value'    => true,
								),
							),
							'group_vc' => 'Responsive'
						),
					

				'responsive_tab_end' => array(
					'type' => 'tab_end',
					'label' => 'Responsive',
					'tabid' => 'responsive'
				),
			),
			
		) );
		

		
		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Row', 'june' ),
			'section'     => 'cl_codeless_page_builder',
			'tooltip' => 'Manage all options of the selected Row',
			//'priority'    => 10,
			
			'transport'   => 'postMessage',
			'settings'    => 'cl_row_inner',
			'is_container' => true,
			'marginPositions' => array('top'),
			'fields' => array(
				'inner_columns_gap' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Inner Columns Gap', 'june' ),
							'default'     => '15',
							'choices'     => array(
								'min'  => '0',
								'max'  => '35',
								'step' => '1',
							),
							'suffix' => 'px',
							'selector' => '.row > .cl_cl_column_inner',
							'css_property' => array('padding-left', 'padding-right'),
							'customJS' => 'inlineEdit_InnerColumns'
						),
				'css_style' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl-row_inner',
							'css_property' => '',
							'default' => array('margin-top' => '35px'),
				),
			)
		));
		
		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Column', 'june' ),
			'section'     => 'cl_codeless_page_builder',
			//'priority'    => 10,
			
			'transport'   => 'postMessage',
			'settings'    => 'cl_column',
			'paddingPositions' => array('top', 'bottom', 'left', 'right'),
			'is_container' => true,
			'fields' => array(


				'width' => array(
					'type'     => 'select',
					'priority' => 10,
					'label'       => esc_attr__( 'Link Text', 'june' ),
					'tooltip' => esc_attr__( 'This will be the label for your link', 'june' ),
					'default'     => '1/1',
					'show' => false,
					'choices'     => array(
						'1/12' => '1 Column',
						'1/6' => '2 Columns',
						'1/4' => '3 Columns',
						'1/3' => '4 Columns',
						'5/12' => '5 Columns',
						'1/2' => '6 Columns',
						'7/12' => '7 Columns',
						'2/3' => '8 Columns',
						'3/4' => '9 Columns',
						'5/6' => '10 Columns',
						'11/12' => '11 Columns',
						'1/1' => '12 Columns',
					),
				),
				
				'element_tabs' => array(
					'type' => 'show_tabs',
					'default' => 'general',
					'tabs' => array(
						'general' => array( 'General', 'cl-icon-settings' ),
						'design' => array( 'Design', 'cl-icon-tune' ),
						'animation' => array( 'Animation', 'cl-icon-animation' ),
						'responsive' => array( 'Responsive', 'cl-icon-responsive' )
					)
				),
				
				'general_tab_start' => array(
					'type' => 'tab_start',
					'label' => 'General',
					'tabid' => 'general'
				),
				
					'column_info_start' => array(
						'type' => 'group_start',
						'label' => 'Content Align',
						'groupid' => 'align'
					),
							

						'horizontal_align' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Horizontal Align', 'june' ),
							'tooltip' => esc_attr__( 'Horizontal Alignment of elements into this column(container)', 'june' ),
							'default'     => 'left',
							'choices' => array(
								'left' => 'Left',
								'middle' => 'Middle',
								'right' => 'Right'
							),
							'selector' => '.cl_column',
							'selectClass' => 'align-h-',
							'group_vc' => 'Content Align'
							
						),

						'vertical_align' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Vertical Align', 'june' ),
							'tooltip' => esc_attr__( 'Vertical Alignment of elements into this column(container)', 'june' ),
							'default'     => 'top',
							'choices' => array(
								'top' => 'Top',
								'middle' => 'Middle',
								'bottom' => 'Bottom'
							),
							'selector' => '.cl_column',
							'selectClass' => 'align-v-',
							'group_vc' => 'Content Align'
							
						),

						'fullheight_col' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Full Height Column', 'june' ),
							'tooltip'	  => esc_html__( 'This option works only if the parent Row is Fullheight too', 'june' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl_column',
							'addClass' => 'cl_column-fullheight',
							'group_vc' => 'Content Align'
						),

						'inline_elements' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Inline Elements', 'june' ),
							'tooltip' => 'By activating this, elements of this column will be shown inline.',
							'default'     => '0',
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl_column',
							'addClass' => 'cl-inline-column',
							'group_vc' => 'Content Align'
						),

						'flex_elements' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Flex Elements', 'june' ),
							'tooltip' => 'By activating this, elements of this column will be shown as flex box, all inline in a flex box style.',
							'default'     => '0',
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl_column',
							'addClass' => 'cl-flex-elements',
							'group_vc' => 'Content Align'
						),

					'column_info_end' => array(
						'type' => 'group_end',
						'label' => 'Content Align',
						'groupid' => 'align'
					),

					'general_group_start' => array(
						'type' => 'group_start',
						'label' => 'General',
						'groupid' => 'gen'
					),

						'col_sticky' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Sticky Column', 'june' ),
							'tooltip' => 'Make this Column sticky on this page',
							'default'     => '0',
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl_column',
							'addClass' => 'cl-sticky',
							'group_vc' => 'General'
						),

						'custom_link' => array(

							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Column Link', 'june' ),
							'default'     => '#',
							'reloadTemplate' => true,
							'group_vc' => 'General'
						),

						'column_effect' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Effect on hover', 'june' ),
							
							'default'     => 'none',
							'choices' => array(
								'none' => 'None',
								'image_zoom' => 'Image Zoom',
								'anim_elements' => 'Animate Inner Elements on Hover',
								'background_hover' => 'Background Color on hover'
							),
							'tooltip' => 'Please save and refresh the front page to see changes.',
							'selector' => '.cl_column',
							'selectClass' => 'effect-',
							'group_vc' => 'General'
							
						),

						'services_list' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Connect Services', 'june' ),
							'tooltip'       => esc_html__( 'Connect Services with lines. Works only with Services into this column. Only with Media Aside Service Style', 'june' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl_column',
							'addClass' => 'services_list',
							'group_vc' => 'General'
						),

						'col_disabled' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Disable Column', 'june' ),
							'tooltip' => 'Make this Column invisible in this Page',
							'default'     => '0',
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl_column',
							'addClass' => 'disabled_col',
							'group_vc' => 'General'
						),

					'general_group_end' => array(
						'type' => 'group_end',
						'label' => 'General',
						'groupid' => 'gen'
					),

					'attr_group_start' => array(
						'type' => 'group_start',
						'label' => 'Attributes',
						'groupid' => 'attr'
					),

						'col_id' => array(
							
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Column Id', 'june' ),
							'tooltip' => esc_attr__( 'This is useful when you want to add unique identifier to columns.', 'june' ),
							'default'     => '',
							'group_vc' => 'Attributes'
						),
						
						'extra_class' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Extra Class', 'june' ),
							'tooltip' => esc_attr__( 'Add extra class identifiers to this column, that can be used for various custom styles.', 'june' ),
							'default'     => '',
							'group_vc' => 'Attributes'
						),

					'attr_group_end' => array(
						'type' => 'group_end',
						'label' => 'Attributes',
						'groupid' => 'attr'
					),

					
				'general_tab_end' => array(
					'type' => 'tab_end',
					'label' => 'General',
					'tabid' => 'general'
				),
					
					
				'design_tab_start' => array(
					'type' => 'tab_start',
					'label' => 'Design',
					'tabid' => 'design'
				),
					
					/* ------------------------------------------ */
					
					'panel' => array(
						'type' => 'group_start',
						'label' => 'Box',
						'groupid' => 'design_panel'
					),
				
						'css_style' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_column > .cl_col_wrapper',
							'css_property' => '',
							'default' => array('padding-top' => codeless_get_mod( 'column_default_padding', '10' ).'px', 'padding-bottom' => codeless_get_mod( 'column_default_padding', '10' ).'px'),
							'group_vc' => 'Design'
						),
						
						'text_color' => array(
							'type' => 'inline_select',
							'label' => 'Text Color',
							'default' => 'dark-text',
							'choices' => array(
								'dark-text' => 'Dark',
								'light-text' => 'Light'
							),
							'selector' => '.cl_column',
							'selectClass' => '',
							'group_vc' => 'Design'
						),
					
						
					'design_panel_end' => array(
						'type' => 'group_end',
						'label' => 'Animation',
						'groupid' => 'design_panel'
					),
					
					/* ------------------------------------------ */
				
					'background_color_group' => array(
						'type' => 'group_start',
						'label' => 'Background Color',
						'groupid' => 'background_color_group'
					),
					
						'background_color' => array(
							'type' => 'color',
							'label' => 'Background Color',
							'default' => '',
							'selector' => '.cl_column > .cl_col_wrapper > .bg-layer',
							'css_property' => 'background-color',
							'alpha' => true,
							'group_vc' => 'Design'
						),
					
					'background_color_group_end' => array(
						'type' => 'group_end',
						'label' => 'Background Color',
						'groupid' => 'background_color_group'
					),
					
					/* ------------------------------------------- */
					
					'background_image_group' => array(
						'type' => 'group_start',
						'label' => 'Background Image',
						'groupid' => 'background_image_group'
					),
					
						'background_image' => array(
							'type'        => 'image',
							'label'       => esc_html__( '', 'june' ),
							'default'     => '',
							'priority'    => 10,
							'selector' => '.cl_column > .cl_col_wrapper > .bg-layer',
							'css_property' => 'background-image',
							'group_vc' => 'Design'
						),
						
						'background_position' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Background Position', 'june' ),
							
							'default'     => 'left top',
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
							),
							'selector' => '.cl_column > .cl_col_wrapper > .bg-layer',
							'css_property' => 'background-position',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
							'group_vc' => 'Design'
						),
						
						'background_repeat' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Background Repeat', 'june' ),
							
							'default'     => 'no-repeat',
							'choices' => array(
								'repeat' => 'repeat',
								'repeat-x' => 'repeat-x',
								'repeat-y' => 'repeat-y',
								'no-repeat' => 'no-repeat'
							),
							'selector' => '.cl_column > .cl_col_wrapper > .bg-layer',
							'css_property' => array('background-repeat', array('background-size', array('no-repeat' => 'cover', 'other' => 'auto') ) ),
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
							'group_vc' => 'Design'
						),
						
						'background_attachment' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Bg. Attachment', 'june' ),
							
							'default'     => 'scroll',
							'choices' => array(
								'scroll' => 'scroll',
								'fixed' => 'fixed',
							),
							'selector' => '.cl_column > .cl_col_wrapper > .bg-layer',
							'css_property' => 'background-attachment',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
							'group_vc' => 'Design'
						),
						
						'background_blend' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Bg. Blend', 'june' ),
							
							'default'     => 'normal',
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
							),
							'selector' => '.cl_column > .cl_col_wrapper > .bg-layer',
							'css_property' => 'background-blend-mode',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
							'group_vc' => 'Design'
						),
						
						
					
					'background_image_group_end' => array(
						'type' => 'group_end',
						'label' => 'Background Image',
						'groupid' => 'background_image_group'
					),
				
					/* ---------------------------------------------------- */
					
					'overlay_group' => array(
						'type' => 'group_start',
						'label' => 'Overlay',
						'groupid' => 'overlay'
					),
				
						'overlay' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Overlay Backgrund', 'june' ),
							
							'default'     => 'none',
							'choices' => array(
								'none' => 'None',
								'color' => 'Color',
								'gradient' => 'Gradient'
							),
							'group_vc' => 'Design'
							
						),
						
						'overlay_color' => array(
							'type' => 'color',
							'label' => 'Overlay Color',
							'default' => '',
							'selector' => '.cl_column > .cl_col_wrapper > .overlay',
							'css_property' => 'background-color',
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '==',
									'value'    => 'color',
								),
							),
							'alpha' => false,
							'group_vc' => 'Design'
						),
						
						'overlay_gradient' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Overlay Gradient', 'june' ),
							
							'default'     => 'none',
							'choices' => array(
								'none'	=> 'None',
								'azure_pop' =>	'Azure Pop',
								'love_couple' => 'Love Couple',
								'disco' => 'Disco',
								'limeade' => 'Limeade',
								'dania' => 'Dania',
								'shades_of_grey' =>	'Shades of Grey',
								'dusk' => 'dusk',
								'delhi' => 'delhi',
								'sun_horizon' => 'Sun Horizon',
								'blood_red' => 'Blood Red',
								'sherbert' => 'Sherbert',
								'firewatch' => 'Firewatch',
								'frost' => 'Frost',
								'mauve' => 'Mauve',
								'deep_sea' => 'Deep Sea',
								'solid_vault' => 'Solid Vault',
								'deep_space' =>	'Deep Space',
								'suzy' => 'Suzy'
								
								
							),
							'selector' => '.cl_column > .cl_col_wrapper > .overlay',
							'selectClass' => 'cl-gradient-',
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '==',
									'value'    => 'gradient',
								),
							),
							'group_vc' => 'Design'
						),
						
						'overlay_opacity' => array(
							'type' => 'slider',
							'label' => 'Overlay Opacity',
							'default' => '0.8',
							'selector' => '.cl_column > .cl_col_wrapper > .overlay',
							'css_property' => 'opacity',
							'choices'     => array(
								'min'  => '0',
								'max'  => '1',
								'step' => '0.05',
							),
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
							'group_vc' => 'Design'
						),

						'hover_effect' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Overlay Hover', 'june' ),
							
							'default'     => 'none',
							'choices' => array(
								'none'	=> 'None',
								'dark' =>	'Dark',
								'light' => 'Light',
								'soft_dark' => 'Soft Dark'
							),
							'selector' => '.cl_column',
							'selectClass' => 'hover_',
							'group_vc' => 'Design'
						),
				
					'overlay_group_end' => array(
						'type' => 'group_end',
						'label' => 'Overlay',
						'groupid' => 'overlay'
					),
				
					/* ------------------------------------------ */
					
					
					'border_style_start' => array(
						'type' => 'group_start',
						'label' => 'Border Style',
						'groupid' => 'border'
					),
					
						'border_style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Border Style', 'june' ),
							
							'default'     => 'solid',
							'choices' => array(
								'solid'	=> 'solid',
								'dotted' =>	'dotted',
								'dashed' =>	'dashed',
								'double' => 'double',
								'groove' => 'groove',
								'ridge' => 'ridge',	
								'inset' => 'inset',	
								'outset' => 'outset',
							),
							'selector' => '.cl_column > .cl_col_wrapper',
							'css_property' => 'border-style',
							'group_vc' => 'Design'
						),
						
						'border_color' => array(
							'type' => 'color',
							'label' => 'Border Color',
							'default' => '',
							'selector' => '.cl_column > .cl_col_wrapper',
							'css_property' => 'border-color',
							'alpha' => true,
							'group_vc' => 'Design'
						),

						'border_rounded' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Border Rounded', 'june' ),
							
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl_column',
							'addClass' => 'cl-border-rounded',
							'group_vc' => 'Design'
						),

						'column_shadow' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Shadow', 'june' ),
							
							'default'     => 'none',
							'choices' => array(
								'none' => 'None',
								'extra_small-shadow' => 'Extra Small',
								'small-shadow' => 'Small',
								'medium-shadow' => 'Medium',
								'large-shadow' => 'Large',
								'extra_large-shadow' => 'Extra Large'
							),
							'selector' => '.cl_column',
							'selectClass' => '',
							'group_vc' => 'Design'

						),
					
					'border_style_end' => array(
						'type' => 'group_end',
						'label' => 'Border Style',
						'groupid' => 'border'
					),
					
					/* --------------------------------------------------- */

				'design_tab_end' => array(
					'type' => 'tab_end',
					'label' => '',
					'tabid' => 'design'
				),


				'animation_tab_start' => array(
					'type' => 'tab_start',
					'label' => 'Animation',
					'tabid' => 'animation'
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
								'flip-in' => 'Flip In',
								'reveal-right' => 'Reveal Right',
								'reveal-left' => 'Reveal Left',
								'reveal-top' => 'Reveal Top',
								'reveal-bottom' => 'Reveal Bottom',
							),
							'selector' => '.cl_column',
							'group_vc' => 'Animations'
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
							'selector' => '.cl_column',
							'htmldata' => 'delay',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
							'group_vc' => 'Animations'
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
							'selector' => '.cl_column',
							'htmldata' => 'speed',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
							'group_vc' => 'Animations'
						),
				'animation_tab_end' => array(
					'type' => 'tab_end',
					'label' => 'Animation',
					'tabid' => 'animation'
				),





				'responsive_tab_start' => array(
					'type' => 'tab_start',
					'label' => 'Responsive',
					'tabid' => 'responsive'
				),

					'device_visibility' => array(
							'type'     => 'multicheck',
							'priority' => 10,
							'label'       => esc_attr__( 'Devices Visibility', 'june' ),
							'default'     => '',
							'choices' => array(
								'hidden-xs' => esc_attr__( 'Hide on Phones (smaller-than-768px)', 'june' ),
								'hidden-sm' => esc_attr__('Hide on Tables (larger-then-768px)', 'june' ),
								'hidden-md' => esc_attr__('Hide on Medium Desktops (larger-then-992px) ', 'june' ),
								'hidden-lg' => esc_attr__('Hide on Large Desktops (larger-then1200px)', 'june' ),
							),
							'selector' => '.cl_column',
							'selectClass' => '',
							'group_vc' => 'Responsive'
						),

					'css_style_991_col_bool' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Custom Box Design on max-width:991px', 'june' ),
							'tooltip'       => esc_html__( 'Add custom box design (padding etc) on screen sizes max-width:991px', 'june' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'group_vc' => 'Responsive'
						),

						'css_style_991' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_column > .cl_col_wrapper',
							'css_property' => '',
							'default' => array('padding-top' => '', 'padding-bottom' => ''),
							'media_query' => '(max-width: 991px)',
							'cl_required'    => array(
								array(
									'setting'  => 'css_style_991_col_bool',
									'operator' => '==',
									'value'    => true,
								),
							),
							'group_vc' => 'Responsive'
						),



						'css_style_767_col_bool' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Custom Box Design on max-width:767px', 'june' ),
							'tooltip'       => esc_html__( 'Add custom box design (padding etc) on screen sizes max-width:767px', 'june' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'group_vc' => 'Responsive'
							
						),

						'css_style_767' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_column > .cl_col_wrapper',
							'css_property' => '',
							'default' => array('padding-top' => '', 'padding-bottom' => ''),
							'media_query' => '(max-width: 767px)',
							'cl_required'    => array(
								array(
									'setting'  => 'css_style_767_col_bool',
									'operator' => '==',
									'value'    => true,
								),
							),
							'group_vc' => 'Responsive'
						),

				'responsive_tab_end' => array(
					'type' => 'tab_end',
					'label' => 'Responsive',
					'tabid' => 'responsive'
				),
					
			),
			
		) );
		
		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Column', 'june' ),
			'section'     => 'cl_codeless_page_builder',
			//'priority'    => 10,
			
			'transport'   => 'postMessage',
			'settings'    => 'cl_column_inner',
			'paddingPositions' => array('top', 'bottom', 'left', 'right'),
			'is_container' => true,
			'fields' => array(



				'width' => array(
					'type'     => 'select',
					'priority' => 10,
					'label'       => esc_attr__( 'Link Text', 'june' ),
					'tooltip' => esc_attr__( 'This will be the label for your link', 'june' ),
					'default'     => '1/1',
					'show' => false,
					'choices'     => array(
						'1/12' => '1 Column',
						'1/6' => '2 Columns',
						'1/4' => '3 Columns',
						'1/3' => '4 Columns',
						'5/12' => '5 Columns',
						'1/2' => '6 Columns',
						'7/12' => '7 Columns',
						'2/3' => '8 Columns',
						'3/4' => '9 Columns',
						'5/6' => '10 Columns',
						'11/12' => '11 Columns',
						'1/1' => '12 Columns',
					),
				),

				'element_tabs' => array(
					'type' => 'show_tabs',
					'default' => 'general',
					'tabs' => array(
						'general' => array( 'General', 'cl-icon-settings' ),
						'design' => array( 'Design', 'cl-icon-tune' ),
						'responsive' => array( 'Responsive', 'cl-icon-responsive' )
					)
				),
				
				'gen_tab_start' => array(
						'type' => 'tab_start',
						'label' => 'General',
						'tabid' => 'general'
					),

				'horizontal_align' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Horizontal Align', 'june' ),
							'tooltip' => esc_attr__( 'Horizontal Alignment of elements into this column(container)', 'june' ),
							'default'     => 'left',
							'choices' => array(
								'left' => 'Left',
								'middle' => 'Middle',
								'right' => 'Right'
							),
							'selector' => '.cl_column_inner',
							'selectClass' => 'align-h-',
							
						),

						'vertical_align' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Vertical Align', 'june' ),
							'tooltip' => esc_attr__( 'Vertical Alignment of elements into this column(container)', 'june' ),
							'default'     => 'top',
							'choices' => array(
								'top' => 'Top',
								'middle' => 'Middle',
								'bottom' => 'Bottom'
							),
							'selector' => '.cl_column_inner',
							'selectClass' => 'align-v-',
							
						),

				'inline_elements' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Inline Elements', 'june' ),
							'tooltip' => 'By activating this, elements of this column will be shown inline.',
							'default'     => '0',
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl_column_inner',
							'addClass' => 'cl-inline-column'
					),

					'hover_effect' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Hover Effect', 'june' ),
							
							'default'     => 'none',
							'choices' => array(
								'none'	=> 'None',
								'dark' =>	'Dark',
								'light' => 'Light',
								'soft_dark' => 'Soft Dark'
							),
							'selector' => '.cl_column_inner',
							'selectClass' => 'hover_',
						),

					'col_disabled' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Disable Column', 'june' ),
							'default'     => '0',
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl_column_inner',
							'addClass' => 'disabled_col'
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
							'selector' => '.cl_column_inner',
							'customJS' => array('front' => 'animations')
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
							'selector' => '.cl_column_inner',
							'htmldata' => 'delay',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
							'customJS' => array('front' => 'animations')
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
							'selector' => '.cl_column_inner',
							'htmldata' => 'speed',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
							'customJS' => array('front' => 'animations')
						),
					
					'animation_end' => array(
						'type' => 'group_end',
						'label' => 'Animation',
						'groupid' => 'animation'
					),

					'gen_tab_end' => array(
						'type' => 'tab_end',
						'label' => 'General',
						'tabid' => 'general'
					),

					'design_tab_start' => array(
						'type' => 'tab_start',
						'label' => 'Design',
						'tabid' => 'design'
					),
				
					/* ------------------------------------------ */
					
					'panel' => array(
						'type' => 'group_start',
						'label' => 'Box',
						'groupid' => 'design_panel'
					),
				
						'css_style' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_column_inner > .wrapper',
							'css_property' => '',
							'default' => array('padding-top' => '10px', 'padding-bottom' => '10px'),
						),
						
						'text_color' => array(
							'type' => 'inline_select',
							'label' => 'Text Color',
							'default' => 'dark-text',
							'choices' => array(
								'dark-text' => 'Dark',
								'light-text' => 'Light'
							),
							'selector' => '.cl_column_inner',
							'selectClass' => ''
						),
					
						
					'design_panel_end' => array(
						'type' => 'group_end',
						'label' => 'Animation',
						'groupid' => 'design_panel'
					),
					
					/* ------------------------------------------ */
				
					'background_color_group' => array(
						'type' => 'group_start',
						'label' => 'Background Color',
						'groupid' => 'background_color_group'
					),
					
						'background_color' => array(
							'type' => 'color',
							'label' => 'Background Color',
							'default' => '',
							'selector' => '.cl_column_inner > .wrapper > .bg-layer',
							'css_property' => 'background-color',
							'alpha' => true
						),
					
					'background_color_group_end' => array(
						'type' => 'group_end',
						'label' => 'Background Color',
						'groupid' => 'background_color_group'
					),
					
					/* ------------------------------------------- */
					
					'background_image_group' => array(
						'type' => 'group_start',
						'label' => 'Background Image',
						'groupid' => 'background_image_group'
					),
					
						'background_image' => array(
							'type'        => 'image',
							'label'       => esc_html__( 'Background Image', 'june' ),
							'default'     => '',
							'priority'    => 10,
							'selector' => '.cl_column_inner > .wrapper > .bg-layer',
							'css_property' => 'background-image'
						),
						
						'background_position' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Background Position', 'june' ),
							
							'default'     => 'left top',
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
							),
							'selector' => '.cl_column_inner > .wrapper > .bg-layer',
							'css_property' => 'background-position',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
						
						'background_repeat' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Background Repeat', 'june' ),
							
							'default'     => 'no-repeat',
							'choices' => array(
								'repeat' => 'repeat',
								'repeat-x' => 'repeat-x',
								'repeat-y' => 'repeat-y',
								'no-repeat' => 'no-repeat'
							),
							'selector' => '.cl_column_inner > .wrapper > .bg-layer',
							'css_property' => array('background-repeat', array('background-size', array('no-repeat' => 'cover', 'other' => 'auto') ) ),
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
						
						'background_attachment' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Bg. Attachment', 'june' ),
							
							'default'     => 'scroll',
							'choices' => array(
								'scroll' => 'scroll',
								'fixed' => 'fixed',
							),
							'selector' => '.cl_column_inner > .wrapper > .bg-layer',
							'css_property' => 'background-attachment',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
						
						'background_blend' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Bg. Blend', 'june' ),
							
							'default'     => 'normal',
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
							),
							'selector' => '.cl_column_inner > .wrapper > .bg-layer',
							'css_property' => 'background-blend-mode',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
						
						
					
					'background_image_group_end' => array(
						'type' => 'group_end',
						'label' => 'Background Image',
						'groupid' => 'background_image_group'
					),
				
					/* ---------------------------------------------------- */
					
					'overlay_group' => array(
						'type' => 'group_start',
						'label' => 'Overlay',
						'groupid' => 'overlay'
					),
				
						'overlay' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Overlay Backgrund', 'june' ),
							
							'default'     => 'none',
							'choices' => array(
								'none' => 'None',
								'color' => 'Color',
								'gradient' => 'Gradient'
							)
							
						),
						
						'overlay_color' => array(
							'type' => 'color',
							'label' => 'Overlay Color',
							'default' => '',
							'selector' => '.cl_column_inner > .wrapper > .overlay',
							'css_property' => 'background-color',
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '==',
									'value'    => 'color',
								),
							),
							'alpha' => true
						),
						
						'overlay_gradient' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Overlay Gradient', 'june' ),
							
							'default'     => 'none',
							'choices' => array(
								'none'	=> 'None',
								'azure_pop' =>	'Azure Pop',
								'love_couple' => 'Love Couple',
								'disco' => 'Disco',
								'limeade' => 'Limeade',
								'dania' => 'Dania',
								'shades_of_grey' =>	'Shades of Grey',
								'dusk' => 'dusk',
								'delhi' => 'delhi',
								'sun_horizon' => 'Sun Horizon',
								'blood_red' => 'Blood Red',
								'sherbert' => 'Sherbert',
								'firewatch' => 'Firewatch',
								'frost' => 'Frost',
								'mauve' => 'Mauve',
								'deep_sea' => 'Deep Sea',
								'solid_vault' => 'Solid Vault',
								'deep_space' =>	'Deep Space',
								'suzy' => 'Suzy'
								
								
							),
							'selector' => '.cl_column_inner > .wrapper > .overlay',
							'selectClass' => 'cl-gradient-',
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '==',
									'value'    => 'gradient',
								),
							),
						),
						
						'overlay_opacity' => array(
							'type' => 'slider',
							'label' => 'Overlay Opacity',
							'default' => '0.8',
							'selector' => '.cl_column_inner > .wrapper > .overlay',
							'css_property' => 'opacity',
							'choices'     => array(
								'min'  => '0',
								'max'  => '1',
								'step' => '0.05',
							),
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
						),
				
					'overlay_group_end' => array(
						'type' => 'group_end',
						'label' => 'Overlay',
						'groupid' => 'overlay'
					),
				
					/* ------------------------------------------ */
					
					
					'border_style_start' => array(
						'type' => 'group_start',
						'label' => 'Border Style',
						'groupid' => 'border'
					),
					
						'border_style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Border Style', 'june' ),
							
							'default'     => 'solid',
							'choices' => array(
								'solid'	=> 'solid',
								'dotted' =>	'dotted',
								'dashed' =>	'dashed',
								'double' => 'double',
								'groove' => 'groove',
								'ridge' => 'ridge',	
								'inset' => 'inset',	
								'outset' => 'outset',
							),
							'selector' => '.cl_column_inner > .wrapper',
							'css_property' => 'border-style'
						),
						
						'border_color' => array(
							'type' => 'color',
							'label' => 'Border Color',
							'default' => '',
							'selector' => '.cl_column_inner > .wrapper',
							'css_property' => 'border-color',
							'alpha' => true
						),

						'column_shadow' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Shadow', 'june' ),
							
							'default'     => 'none',
							'choices' => array(
								'none' => 'None',
								'extra_small-shadow' => 'Extra Small',
								'small-shadow' => 'Small',
								'medium-shadow' => 'Medium',
								'large-shadow' => 'Large',
								'extra_large-shadow' => 'Extra Large'
							),
							'selector' => '.cl_column_inner > .wrapper',
							'selectClass' => '',

						),
					
					'border_style_end' => array(
						'type' => 'group_end',
						'label' => 'Border Style',
						'groupid' => 'border'
					),
					
					/* --------------------------------------------------- */

				'design_tab_end' => array(
					'type' => 'tab_end',
					'label' => '',
					'tabid' => 'design'
				),


				'responsive_tab_start' => array(
					'type' => 'tab_start',
					'label' => 'Responsive',
					'tabid' => 'responsive'
				),

					'css_style_991_colinner_bool' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Custom Box Design on max-width:991px', 'june' ),
							'tooltip'       => esc_html__( 'Add custom box design (padding etc) on screen sizes max-width:991px', 'june' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
						),

						'css_style_991' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_column_inner > .wrapper',
							'css_property' => '',
							'default' => array(),
							'media_query' => '(max-width: 991px)',
							'cl_required'    => array(
								array(
									'setting'  => 'css_style_991_colinner_bool',
									'operator' => '==',
									'value'    => true,
								),
							),
						),



						'css_style_767_colinner_bool' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Custom Box Design on max-width:767px', 'june' ),
							'tooltip'       => esc_html__( 'Add custom box design (padding etc) on screen sizes max-width:767px', 'june' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							
						),

						'css_style_767' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_column_inner > .wrapper',
							'css_property' => '',
							'default' => array(),
							'media_query' => '(max-width: 767px)',
							'cl_required'    => array(
								array(
									'setting'  => 'css_style_767_colinner_bool',
									'operator' => '==',
									'value'    => true,
								),
							),
						),

				'responsive_tab_end' => array(
					'type' => 'tab_end',
					'label' => 'Responsive',
					'tabid' => 'responsive'
				),
				
				
			),
			
		) );


		/* Page Header */
		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Page Header', 'june' ),
			'section'     => 'cl_codeless_page_builder',
			'icon'		  => 'icon-software-layout-header',
			//'priority'    => 10,
			'transport'   => 'postMessage',
			'settings'    => 'cl_page_header',
			'shiftClick'  => 'h1_dark_color',
			'marginPositions' => array('top'),
			'is_container' => false,
			'is_root'	  => true,
			'fields' => array(
				'element_tabs' => array(
					'type' => 'show_tabs',
					'default' => 'general',
					'tabs' => array(
						'general' => array( 'General', 'cl-icon-settings' ),
						'design' => array( 'Design', 'cl-icon-tune' )
					)
				),
				
				'general_tab_start' => array(
					'type' => 'tab_start',
					'label' => 'General',
					'tabid' => 'general'
				),
					
					'title' => array(
						'type'     => 'inline_text',
						'only_text' => true,
						'priority' => 10,
						'selector' => '.cl_page_header h1',
						'label'       => esc_attr__( 'Title', 'june' ),
						'default'     => '',
					),
					
					
					'type' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Page Header Style', 'june' ),
							
							'default'     => 'simple',
							'choices' => array(
								'simple'	=> 'Simple',
								'modern' =>	'Modern'
								
							),

							'selector' => '.cl_page_header',
							'selectClass' => '',
							'reloadTemplate' => true
							
					),



					
					'modern_style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Modern Title Position', 'june' ),
							
							'default'     => 'center',
							'choices' => array(
								'left_center'	=> 'Left Center',
								'center' =>	'Center',
								'right_center' => 'Right Center',
								'left_bottom' => 'Left Bottom',
								'center_bottom' => 'Center Bottom',
								'right_bottom' => 'Right Bottom',
								
							),
							'cl_required'    => array(
								array(
									'setting'  => 'type',
									'operator' => '==',
									'value'    => 'modern',
								),
							),
							
							'selector' => '.cl_page_header',
							'selectClass' => 'modern-'
							
					),
					
					
					
						
					'add_description' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Description or second title', 'june' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'type',
									'operator' => '==',
									'value'    => 'modern',
								),
							),
							
					),
					
					'tooltip' => array(
						'type'     => 'inline_text',
						'only_text' => true,
						'priority' => 10,
						'selector' => '.cl_page_header span.subtitle',
						'label'       => esc_attr__( 'tooltip', 'june' ),
						'default'     => esc_html__('click to edit description', 'june' ),
					),
					

					'modern_effect' => array(
							'type'        => 'inline_select',
							'label'       => esc_html__( 'Effect', 'june' ),
							'default'     => 'none',
							'priority'    => 10,
							'choices'     => array(
								'none' => esc_attr__( 'None', 'june' ),
								'gradient_shadow'  => esc_attr__( 'Gradient Shadow', 'june' )
							),
							'selector' => '.cl_page_header',
							'selectClass' => 'modern-effect-',
							'cl_required'    => array(
								array(
									'setting'  => 'type',
									'operator' => '==',
									'value'    => 'modern',
								),
							),
						),
					
					
				
				
				
				'general_tab_end' => array(
					'type' => 'tab_end',
					'label' => 'General',
					'tabid' => 'general'
				),
				
				
				'design_tab_start' => array(
					'type' => 'tab_start',
					'label' => 'Design',
					'tabid' => 'design'
				),
					
					/* ------------------------------------------ */
					
					'panel' => array(
						'type' => 'group_start',
						'label' => 'Box',
						'groupid' => 'design_panel'
					),

						'css_style' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_page_header',
							'css_property' => '',
							'default' => array()
						),
				
						'height' => array(
	
							'type' => 'slider',
							'label' => 'Height',
							'default' => '300',
							'selector' => '.cl_page_header',
							'css_property' => 'height',
							'suffix' => 'px',
							'choices'     => array(
								'min'  => '40',
								'max'  => '600',
								'step' => '5',
								'suffix' => 'px'
							),
						),
						
						'text_color' => array(
							'type' => 'inline_select',
							'label' => 'Text Color',
							'default' => 'dark-text',
							'choices' => array(
								'dark-text' => 'Dark',
								'light-text' => 'Light'
							),
							'selector' => '.cl_page_header',
							'selectClass' => ''
						),


					
						
					'design_panel_end' => array(
						'type' => 'group_end',
						'label' => 'Animation',
						'groupid' => 'design_panel'
					),
					
					/* ------------------------------------------ */
				
					'background_color_group' => array(
						'type' => 'group_start',
						'label' => 'Background Color',
						'groupid' => 'background_color_group'
					),
					
						'background_color' => array(
							'type' => 'color',
							'label' => 'Background Color',
							'default' => '',
							'selector' => '.cl_page_header .bg-layer',
							'css_property' => 'background-color',
							'alpha' => true,
							'choices' => array(
								'alpha' => true
							)
						),
					
					'background_color_group_end' => array(
						'type' => 'group_end',
						'label' => 'Background Color',
						'groupid' => 'background_color_group'
					),
					
					/* ------------------------------------------- */
					
					'background_image_group' => array(
						'type' => 'group_start',
						'label' => 'Background Image',
						'groupid' => 'background_image_group'
					),
					
						'background_image' => array(
							'type'        => 'image',
							'label'       => esc_html__( 'Background image', 'june' ),
							'default'     => '',
							'priority'    => 10,
							'selector' => '.cl_page_header .bg-layer',
							'css_property' => 'background-image'
						),
						
						'background_position' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Background Position', 'june' ),
							
							'default'     => 'left top',
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
							),
							'selector' => '.cl_page_header .bg-layer',
							'css_property' => 'background-position',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
						
						'background_repeat' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Background Repeat', 'june' ),
							
							'default'     => 'no-repeat',
							'choices' => array(
								'repeat' => 'repeat',
								'repeat-x' => 'repeat-x',
								'repeat-y' => 'repeat-y',
								'no-repeat' => 'no-repeat'
							),
							'selector' => '.cl_page_header .bg-layer',
							'css_property' => array('background-repeat', array('background-size', array('no-repeat' => 'cover', 'other' => 'auto') ) ),
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
						
						'background_attachment' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Bg. Attachment', 'june' ),
							
							'default'     => 'scroll',
							'choices' => array(
								'scroll' => 'scroll',
								'fixed' => 'fixed',
							),
							'selector' => '.cl_page_header .bg-layer',
							'css_property' => 'background-attachment',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
						
						'background_blend' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Bg. Blend', 'june' ),
							
							'default'     => 'normal',
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
							),
							'selector' => '.cl_page_header .bg-layer',
							'css_property' => 'background-blend-mode',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
						
						'parallax' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Parallax', 'june' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl_page_header',
							'addClass' => 'cl-parallax',
							'cl_required'    => array(
								array(
									'setting'  => 'background_image',
									'operator' => '!=',
									'value'    => '',
								),
							),
						),
					
					'background_image_group_end' => array(
						'type' => 'group_end',
						'label' => 'Background Image',
						'groupid' => 'background_image_group'
					),
				
					/* ---------------------------------------------------- */
					
					'overlay_group' => array(
						'type' => 'group_start',
						'label' => 'Overlay & Border',
						'groupid' => 'overlay'
					),
				
						'overlay' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Overlay Backgrund', 'june' ),
							
							'default'     => 'none',
							'choices' => array(
								'none' => 'None',
								'color' => 'Color',
								'gradient' => 'Gradient'
							)
							
						),
						
						'overlay_color' => array(
							'type' => 'color',
							'label' => 'Overlay Color',
							'default' => '',
							'selector' => '.cl_page_header .overlay',
							'css_property' => 'background-color',
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '==',
									'value'    => 'color',
								),
							),
							'alpha' => false
						),
						
						'overlay_gradient' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Overlay Gradient', 'june' ),
							
							'default'     => 'none',
							'choices' => array(
								'none'	=> 'None',
								'azure_pop' =>	'Azure Pop',
								'love_couple' => 'Love Couple',
								'disco' => 'Disco',
								'limeade' => 'Limeade',
								'dania' => 'Dania',
								'shades_of_grey' =>	'Shades of Grey',
								'dusk' => 'dusk',
								'delhi' => 'delhi',
								'sun_horizon' => 'Sun Horizon',
								'blood_red' => 'Blood Red',
								'sherbert' => 'Sherbert',
								'firewatch' => 'Firewatch',
								'frost' => 'Frost',
								'mauve' => 'Mauve',
								'deep_sea' => 'Deep Sea',
								'solid_vault' => 'Solid Vault',
								'deep_space' =>	'Deep Space',
								'suzy' => 'Suzy'
								
								
							),
							'selector' => '.cl_page_header .overlay',
							'selectClass' => 'cl-gradient-',
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '==',
									'value'    => 'gradient',
								),
							),
						),
						
						'overlay_opacity' => array(
							'type' => 'slider',
							'label' => 'Overlay Opacity',
							'default' => '0.8',
							'selector' => '.cl_page_header .overlay',
							'css_property' => 'opacity',
							'choices'     => array(
								'min'  => '0',
								'max'  => '1',
								'step' => '0.05',
							),
							'cl_required'    => array(
								array(
									'setting'  => 'overlay',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
						),
						
						'border_color' => array(
							'type' => 'color',
							'label' => 'Border Color',
							'default' => '#ebebeb',
							'selector' => '.cl_page_header',
							'css_property' => 'border-color',
							'alpha' => true
						),

						'add_border_top' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Border Top', 'june' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl_page_header',
							'addClass' => 'border_top',
							'cl_required'    => array(
								array(
									'setting'  => 'type',
									'operator' => '==',
									'value'    => 'simple',
								),
							),
						),
					
					'add_border_bottom' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Border Bottom', 'june' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl_page_header',
							'addClass' => 'border_bottom',
							'cl_required'    => array(
								array(
									'setting'  => 'type',
									'operator' => '==',
									'value'    => 'simple',
								),
							),
						),
				
					'overlay_group_end' => array(
						'type' => 'group_end',
						'label' => 'Overlay',
						'groupid' => 'overlay'
					),
					
					'typography_start' => array(
						'type' => 'group_start',
						'label' => 'Typography',
						'groupid' => 'typography'
					),


					'typography' => array(
							'type'        => 'inline_select',
							'label'       => esc_html__( 'Title Typography', 'june' ),
							'tooltip' => 'Select one of the predefined title typography styles on Styling Section or select "Custom Font" if you want to edit the typography of Title. SHIFT-CLICK on Element if you want to modify one of the predefined Style',
							'default'     => 'h1',
							'priority'    => 10,
							'selector' => '.cl_page_header .title_part h1',
							'selectClass' => 'custom_font ',
							'choices'     => array(
								'h1'  => esc_attr__( 'H1', 'june' ),
								'h2' => esc_attr__( 'H2', 'june' ),
								'h3' => esc_attr__( 'H3', 'june' ),
								'h4' => esc_attr__( 'H4', 'june' ),
								'h5' => esc_attr__( 'H5', 'june' ),
								'h6' => esc_attr__( 'H6', 'june' ),
								'custom_font' => esc_attr__( 'Custom Font', 'june' ),
							),
						),

					
					'title_font_size' => array(
	
							'type' => 'slider',
							'label' => 'Title Font Size',
							'default' => '18',
							'selector' => '.cl_page_header .title_part h1',
							'css_property' => 'font-size',
							'choices'     => array(
								'min'  => '14',
								'max'  => '72',
								'step' => '1',
								'suffix' => 'px'
							),
							'suffix' => 'px',
							'cl_required'    => array(
								array(
									'setting'  => 'typography',
									'operator' => '==',
									'value'    => 'custom_font',
								),
							),
						),

					'title_font_weight' => array(
	
							'type' => 'inline_select',
							'label' => 'Title Font Weight',
							'default' => '600',
							'selector' => '.cl_page_header .title_part h1',
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
									'setting'  => 'typography',
									'operator' => '==',
									'value'    => 'custom_font',
								),
							),
						),
						
					'title_line_height' => array(
	
							'type' => 'slider',
							'label' => 'Title Line Height',
							'default' => '22',
							'selector' => '.cl_page_header .title_part h1',
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
									'setting'  => 'typography',
									'operator' => '==',
									'value'    => 'custom_font',
								),
							),
						),
					
					'title_transform' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Title Text Transform', 'june' ),
							
							'default'     => 'none',
							'selector' => '.cl_page_header .title_part h1',
							'css_property' => 'text-transform',
							'choices' => array(
								'none' => 'None',
								'uppercase' => 'Uppercase'
							),
							'cl_required'    => array(
								array(
									'setting'  => 'typography',
									'operator' => '==',
									'value'    => 'custom_font',
								),
							),
							
						),

						'title_color' => array(
							'type'     => 'color',
							'priority' => 10,
							'label'       => esc_attr__( 'Title Color', 'june' ),
							
							'default'     => '',
							'selector' => '.cl_page_header .title_part h1',
							'css_property' => 'color',
							
							'cl_required'    => array(
								array(
									'setting'  => 'typography',
									'operator' => '==',
									'value'    => 'custom_font',
								),
							),
							
						),
						
					
						
					
					'desc_color' => array(
							'type' => 'color',
							'label' => 'Subtitle Color',
							'default' => '',
							'selector' => '.cl_page_header .title_part .subtitle',
							'css_property' => 'color',
							'alpha' => true
					),
					
					'desc_font_size' => array(
	
							'type' => 'slider',
							'label' => 'Subtitle Font Size',
							'default' => '14',
							'selector' => '.cl_page_header .title_part .subtitle',
							'css_property' => 'font-size',
							'choices'     => array(
								'min'  => '14',
								'max'  => '60',
								'step' => '1',
								'suffix' => 'px'
							),
							'suffix' => 'px'
						),

					'desc_font_weight' => array(
	
							'type' => 'inline_select',
							'label' => 'Subtitle Font Weight',
							'default' => '300',
							'selector' => '.cl_page_header .title_part .subtitle',
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
							)
						),
						
					'desc_line_height' => array(
	
							'type' => 'slider',
							'label' => 'Subtitle Line Height',
							'default' => '18',
							'selector' => '.cl_page_header .title_part .subtitle',
							'css_property' => 'line-height',
							'choices'     => array(
								'min'  => '20',
								'max'  => '80',
								'step' => '1',
								'suffix' => 'px'
							),
							'suffix' => 'px'
						),
						
					'desc_transform' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Subtitle Text Transform', 'june' ),
							
							'default'     => 'none',
							'selector' => '.cl_page_header .title_part .subtitle',
							'css_property' => 'text-transform',
							'choices' => array(
								'none' => 'None',
								'uppercase' => 'Uppercase'
							)
							
						),
						
					
					
					'typography_end' => array(
						'type' => 'group_end',
						'label' => 'Typography',
						'groupid' => 'typography'
					),
					
					
				
					/* ------------------------------------------ */
	
					/* --------------------------------------------------- */

				'design_tab_end' => array(
					'type' => 'tab_end',
					'label' => '',
					'tabid' => 'design'
				),
				
				
			),
			
		) );

 		/* Text */
		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Text', 'june' ),
			'section'     => 'cl_codeless_page_builder',
			//'priority'    => 10,
			'icon'		  => 'icon-software-font-smallcaps',
			'transport'   => 'postMessage',
			'settings'    => 'cl_text',
			'is_container' => false,
			'marginPositions' => array('top'),
			'fields' => array(
				'content' => array(
					'type'     => 'inline_text',
					'priority' => 10,
					'selector' => '.cl-text',
					'label'       => esc_attr__( 'Text', 'june' ),
					'tooltip' => esc_attr__( 'This will be the label for your link', 'june' ),
					'default'     => 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores ',
					'group_vc' => 'General'
				),

				'element_tabs' => array(
					'type' => 'show_tabs',
					'default' => 'general',
					'tabs' => array(
						'general' => array( 'General', 'cl-icon-settings' ),
						'design' => array( 'Design', 'cl-icon-tune' ),
						'animation' => array( 'Animation', 'cl-icon-animation' ),
						'responsive' => array( 'Responsive', 'cl-icon-responsive' )
					)
				),
				
					'general_tab_start' => array(
						'type' => 'tab_start',
						'label' => 'General',
						'tabid' => 'general'
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
									'group_vc' => 'General'
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
									'group_vc' => 'General'
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
											'value'    => true,
										),
									),
									'group_vc' => 'General'
								),

							'text_font_size' => array(
			
									'type' => 'slider',
									'label' => 'Text Font Size',
									'default' => '14',
									'selector' => '.cl-text',
									'css_property' => 'font-size',
									'choices'     => array(
										'min'  => '14',
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
									'group_vc' => 'General'
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
									'group_vc' => 'General'
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
									'group_vc' => 'General'
								),

							'text_letterspace' => array(
			
									'type' => 'slider',
									'label' => 'Letter Spacing',
									'default' => '0',
									'selector' => '.cl-text',
									'css_property' => 'letter-spacing',
									'choices'     => array(
										'min'  => '-10',
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
									'group_vc' => 'General'
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
									'group_vc' => 'General'
									
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
									'group_vc' => 'General'
							),

						'typography_end' => array(
								'type' => 'group_end',
								'label' => 'Typography',
								'groupid' => 'typography'
						),

					'general_tab_end' => array(
						'type' => 'tab_end',
						'label' => 'General',
						'tabid' => 'general'
					),

				'design_start' => array(
					'type' => 'tab_start',
					'label' => 'Design',
					'tabid' => 'design'
				),
					

					'css_style' => array(
						'type' => 'css_tool',
						'label' => 'Tool',
						'selector' => '.cl-text',
						'css_property' => '',
						'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px' ),
						'group_vc' => 'Design'
					),

				'design_end' => array(
					'type' => 'tab_end',
					'label' => 'Design',
					'tabid' => 'design'
				),

				'animation_start' => array(
						'type' => 'tab_start',
						'label' => 'Animation',
						'tabid' => 'animation'
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
							'selector' => '.cl-text',
							'group_vc' => 'Animation'
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
							'group_vc' => 'Animation'
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
							'group_vc' => 'Animation'
						),
					
					'animation_end' => array(
						'type' => 'tab_end',
						'label' => 'Animation',
						'tabid' => 'animation'
					),

				'responsive_start' => array(
					'type' => 'tab_start',
					'label' => 'Responsive',
					'tabid' => 'responsive' 
				),

					'custom_responsive_992_bool' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Custom Max-width:992px', 'june' ),
							'tooltip' => 'Add a custom size for this heading for screens smaller than 992px',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'cl_required'    => array(
								array(
									'setting'  => 'typography',
									'operator' => '==',
									'value'    => 'custom_font',
								)
							),
							'group_vc' => 'Responsive'
							
						),

						'custom_responsive_992_size' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Font size Max-width:992px', 'june' ),
							'tooltip' => esc_attr__( 'Add a custom size for this heading for screens smaller than 992px', 'june' ),
							'default'     => '24px',
							'selector' => '.cl-text',
							'css_property' => 'font-size',
							'media_query' => '(max-width: 992px)',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_responsive_992_bool',
									'operator' => '==',
									'value'    => 1,
								),
							),
							'group_vc' => 'Responsive'
						),

						'custom_responsive_992_line_height' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Line Height Max-width:992px', 'june' ),
							'tooltip' => esc_attr__( 'Add a custom line height for this heading for screens smaller than 992px', 'june' ),
							'default'     => '30px',
							'selector' => '.cl-text',
							'css_property' => 'line-height',
							'media_query' => '(max-width: 992px)',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_responsive_992_bool',
									'operator' => '==',
									'value'    => 1,
								),
							),
							'group_vc' => 'Responsive'
						),

					'custom_responsive_768_bool' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Custom Max-width:768px', 'june' ),
							'tooltip' => 'Add a custom size for this heading for screens smaller than 768px',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'cl_required'    => array(
								array(
									'setting'  => 'typography',
									'operator' => '==',
									'value'    => 'custom_font',
								),
							),
							'group_vc' => 'Responsive'
							
						),

						'custom_responsive_768_size' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Font size Max-width:768px', 'june' ),
							'tooltip' => esc_attr__( 'Add a custom size for this heading for screens smaller than 768px', 'june' ),
							'default'     => '18px',
							'selector' => '.cl-text',
							'css_property' => 'font-size',
							'media_query' => '(max-width: 768px)',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_responsive_768_bool',
									'operator' => '==',
									'value'    => 1,
								),
							),
							'group_vc' => 'Responsive'
						),

						'custom_responsive_768_line_height' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Line Height Max-width:768px', 'june' ),
							'tooltip' => esc_attr__( 'Add a custom line height for this heading for screens smaller than 768px', 'june' ),
							'default'     => '26px',
							'selector' => '.cl-text',
							'css_property' => 'line-height',
							'media_query' => '(max-width: 768px)',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_responsive_768_bool',
									'operator' => '==',
									'value'    => 1,
								),
							),
							'group_vc' => 'Responsive'
						),


				'responsive_end' => array(
					'type' => 'tab_end',
					'label' => 'Responsive',
					'tabid' => 'responsive'
				),


				
			),
			
		) );

 		/* Custom Heading */
 		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Heading', 'june' ),
			'section'     => 'cl_codeless_page_builder',
			//'priority'    => 10,
			'icon'		  => 'icon-software-character',
			'transport'   => 'postMessage',
			'settings'    => 'cl_custom_heading',
			'marginPositions' => array('top'),
			'is_container' => false,
			'fields' => array(
				'content' => array(
					'type'     => 'inline_text',
					'priority' => 10,
					'selector' => '.cl-custom-heading',
					'label'       => esc_attr__( 'Text', 'june' ),
					'tooltip' => esc_attr__( 'This will be the label for your link', 'june' ),
					'default'     => 'Custom Heading',
					'group_vc' => 'General'
				),

				'element_tabs' => array(
					'type' => 'show_tabs',
					'default' => 'general',
					'tabs' => array(
						'general' => array( 'General', 'cl-icon-settings' ),
						'design' => array( 'Design', 'cl-icon-tune' ),
						'animation' => array( 'Animation', 'cl-icon-animation' ),
						'responsive' => array( 'Responsive', 'cl-icon-responsive' )
					)
				),
				
					'general_tab_start' => array(
						'type' => 'tab_start',
						'label' => 'General',
						'tabid' => 'general'
					),

						'option_start' => array(
								'type' => 'group_start',
								'label' => 'Options',
								'groupid' => 'options'
							),

							'tag' => array(
										'type'        => 'inline_select',
										'label'       => esc_html__( 'Heading Tag', 'june' ),
										'tooltip' => 'Useful for SEO',
										'default'     => 'h2',
										'priority'    => 10,
										'selector' => '.cl-custom-heading',
										'choices'     => array(
											'h1'  => esc_attr__( 'H1', 'june' ),
											'h2' => esc_attr__( 'H2', 'june' ),
											'h3' => esc_attr__( 'H3', 'june' ),
											'h4' => esc_attr__( 'H4', 'june' ),
											'h5' => esc_attr__( 'H5', 'june' ),
											'h6' => esc_attr__( 'H6', 'june' ),
										),
										'group_vc' => 'General'
							),

						'option_end' => array(
								'type' => 'group_end',
								'label' => 'Options',
								'groupid' => 'options'
							),

						'typography_start' => array(
								'type' => 'group_start',
								'label' => 'Typography',
								'groupid' => 'typography'
							),
 
							'typography' => array(
										'type'        => 'inline_select',
										'label'       => esc_html__( 'Title Typography', 'june' ),
										'tooltip' => 'Select one of the predefined title typography styles on Styling Section or select "Custom Font" if you want to edit the typography of Title. SHIFT-CLICK on Element if you want to modify one of the predefined Style',
										'default'     => 'h2',
										'priority'    => 10,
										'selector' => '.cl-custom-heading',
										'selectClass' => 'custom_font ',
										'choices'     => array(
											'h1'  => esc_attr__( 'H1', 'june' ),
											'h2' => esc_attr__( 'H2', 'june' ),
											'h3' => esc_attr__( 'H3', 'june' ),
											'h4' => esc_attr__( 'H4', 'june' ),
											'h5' => esc_attr__( 'H5', 'june' ),
											'h6' => esc_attr__( 'H6', 'june' ),
											'custom_font' => esc_attr__( 'Custom Font', 'june' ),
										),
										'group_vc' => 'General'
									),

					
								'text_font_family' => array(
				
										'type' => 'inline_select',
										'label' => 'Font Family',
										'default' => 'theme_default',
										'selector' => '.cl-custom-heading',
										'css_property' => 'font-family',
										'choices'     => codeless_get_google_fonts(),
										'cl_required'    => array(
											array(
												'setting'  => 'typography',
												'operator' => '==',
												'value'    => 'custom_font',
											),
										),
										'group_vc' => 'General'
									),

								'text_font_size' => array(
				
										'type' => 'slider',
										'label' => 'Font Size',
										'default' => '22',
										'selector' => '.cl-custom-heading',
										'css_property' => 'font-size',
										'choices'     => array(
											'min'  => '14',
											'max'  => '160',
											'step' => '1',
											'suffix' => 'px'
										),
										'suffix' => 'px',
										'cl_required'    => array(
											array(
												'setting'  => 'typography',
												'operator' => '==',
												'value'    => 'custom_font',
											),
										),
										'group_vc' => 'General'
									),

								'text_font_weight' => array(
				
										'type' => 'inline_select',
										'label' => 'Font Weight',
										'default' => '700',
										'selector' => '.cl-custom-heading',
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
												'setting'  => 'typography',
												'operator' => '==',
												'value'    => 'custom_font',
											),
										),
										'group_vc' => 'General'
									),
									
								'text_line_height' => array(
				
										'type' => 'slider',
										'label' => 'Line Height',
										'default' => '34',
										'selector' => '.cl-custom-heading',
										'css_property' => 'line-height',
										'choices'     => array(
											'min'  => '20',
											'max'  => '200',
											'step' => '1',
											'suffix' => 'px'
										),
										'suffix' => 'px',
										'cl_required'    => array(
											array(
												'setting'  => 'typography',
												'operator' => '==',
												'value'    => 'custom_font',
											),
										),
										'group_vc' => 'General'
									),

								'text_letterspace' => array(
					
											'type' => 'slider',
											'label' => 'Letter-Spacing',
											'default' => '0',
											'selector' => '.cl-custom-heading',
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
													'setting'  => 'typography',
													'operator' => '==',
													'value'    => 'custom_font',
												),
											),
											'group_vc' => 'General'
										),
								
								'text_transform' => array(
										'type'     => 'inline_select',
										'priority' => 10,
										'label'       => esc_attr__( 'Text Transform', 'june' ),
										
										'default'     => 'uppercase',
										'selector' => '.cl-custom-heading',
										'css_property' => 'text-transform',
										'choices' => array(
											'none' => 'None',
											'uppercase' => 'Uppercase'
										),
										'cl_required'    => array(
											array(
												'setting'  => 'typography',
												'operator' => '==',
												'value'    => 'custom_font',
											),
										),
										'group_vc' => 'General'
										
									),
									
								
									
								
								'text_color' => array(
										'type' => 'color',
										'label' => 'Color',
										'default' => '',
										'selector' => '.cl-custom-heading',
										'css_property' => 'color',
										'alpha' => true,
										'cl_required'    => array(
											array(
												'setting'  => 'typography',
												'operator' => '==',
												'value'    => 'custom_font',
											),
										),
										'group_vc' => 'General'
								),

								
							'typography_end' => array(
								'type' => 'group_end',
								'label' => 'Typography',
								'groupid' => 'typography'
							),

							'parallel_divider' => array(
										'type'        => 'switch',
										'label'       => esc_html__( 'Parallel Divider Style', 'june' ),
										'tooltip' => 'Add a paralell divider (style) to this heading.',
										'default'     => 0,
										'priority'    => 10,
										'choices'     => array(
											'on'  => esc_attr__( 'On', 'june' ),
											'off' => esc_attr__( 'Off', 'june' ),
										),
										'selector' => '.wrapper-heading',
										'addClass' => 'parallel-divider',
										'reloadTemplate' => true,
										'group_vc' => 'General'			
									),

							'heading_with_icon' => array(
										'type'        => 'switch',
										'label'       => esc_html__( 'Add Icon', 'june' ),
										'default'     => 0,
										'priority'    => 10,
										'choices'     => array(
											'on'  => esc_attr__( 'On', 'june' ),
											'off' => esc_attr__( 'Off', 'june' ),
										),
										'selector' => '.wrapper-heading',
										'addClass' => 'with-icon',
										'reloadTemplate' => true,
										'group_vc' => 'General'			
									),

							'icon' => array(
										'type'     => 'select_icon',
										'priority' => 10,
										'label'       => esc_attr__( '', 'june' ),
										'default'     => 'cl-icon-apps',
										'selector' => '.wrapper-heading i[class]',
										'selectClass' => ' ',
										'cl_required'    => array(
											array(
												'setting'  => 'heading_with_icon',
												'operator' => '==',
												'value'    => true,
											),
										),
										'group_vc' => 'General'
									),

							'color_icon' => array(
										'type'     => 'color',
										'priority' => 10,
										'label'       => esc_attr__( 'Icon Color', 'june' ),
										'default'     => '#222',
										'selector' => '.wrapper-heading i[class]',
										'css_property' => 'color',
										'alpha' => true,
										'cl_required'    => array(
											array(
												'setting'  => 'heading_with_icon',
												'operator' => '==',
												'value'    => true,
											),
										),
										'group_vc' => 'General'
									),

				'general_tab_end' => array(
						'type' => 'tab_end',
						'label' => 'General',
						'tabid' => 'general'
					),
					

				'box_tab_start' => array(
						'type' => 'tab_start',
						'label' => 'Design',
						'tabid' => 'design'
				),
					'css_style' => array(
						'type' => 'css_tool',
						'label' => 'Tool',
						'selector' => '.wrapper-heading',
						'css_property' => '',
						'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px'),
						'group_vc' => 'Design'
					),

					'add_background_color' => array(
						'type'        => 'switch',
						'label'       => esc_html__( 'Add Background Color', 'june' ),
						'tooltip' => 'Add a paralell divider (style) to this heading.',
						'default'     => 0,
						'priority'    => 10,
						'choices'     => array(
							'on'  => esc_attr__( 'On', 'june' ),
							'off' => esc_attr__( 'Off', 'june' ),
						),
						'selector' => '.cl-custom-heading',
						'addClass' => 'display-inline',
						'group_vc' => 'Design'	
					),

					'background_color' => array(
							'type' => 'color',
							'label' => 'Background Color',
							'default' => '',
							'selector' => '.cl-custom-heading',
							
							'css_property' => 'background-color',
							'alpha' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'add_background_color',
									'operator' => '==',
									'value'    => true,
								),
							),
							'group_vc' => 'Design'
					),

					'border_style' => array(
								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Border Style', 'june' ),
								
								'default'     => 'solid',
								'choices' => array(
									'solid'	=> 'solid',
									'dotted' =>	'dotted',
									'dashed' =>	'dashed',
									'double' => 'double',
									'groove' => 'groove',
									'ridge' => 'ridge',	
									'inset' => 'inset',	
									'outset' => 'outset',
								),
								'selector' => '.cl-custom-heading',
								'css_property' => 'border-style',
								'group_vc' => 'Design'
							),
							
					'border_color' => array(
						'type' => 'color',
						'label' => 'Border Color',
						'default' => '',
						'selector' => '.cl-custom-heading',
						'css_property' => 'border-color',
						'alpha' => true,
						'group_vc' => 'Design'
					),
				'box_end' => array(
						'type' => 'tab_end',
						'label' => 'Design',
						'tabid' => 'design'
				),


				'animation_start' => array(
						'type' => 'tab_start',
						'label' => 'Animation',
						'tabid' => 'animation'
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
							'selector' => '.cl-custom-heading',
							'group_vc' => 'Animation'
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
							'selector' => '.cl-custom-heading',
							'htmldata' => 'delay',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
							'group_vc' => 'Animation'
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
							'selector' => '.cl-custom-heading',
							'htmldata' => 'speed',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
							'group_vc' => 'Animation'
						),
					
					'animation_end' => array(
						'type' => 'tab_end',
						'label' => 'Animation',
						'tabid' => 'animation'
					),

				'responsive_tab_start' => array(
						'type' => 'tab_start',
						'label' => 'Responsive',
						'tabid' => 'responsive'
				),


						'custom_responsive_992_bool' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Custom Max-width:992px', 'june' ),
							'tooltip' => 'Add a custom size for this heading for screens smaller than 992px',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'cl_required'    => array(
								array(
									'setting'  => 'typography',
									'operator' => '==',
									'value'    => 'custom_font',
								)
							),
							'group_vc' => 'Responsive'
							
						),

						'custom_responsive_992_size' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Font size Max-width:992px', 'june' ),
							'tooltip' => esc_attr__( 'Add a custom size for this heading for screens smaller than 992px', 'june' ),
							'default'     => '24px',
							'selector' => '.cl-custom-heading',
							'css_property' => 'font-size',
							'media_query' => '(max-width: 992px)',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_responsive_992_bool',
									'operator' => '==',
									'value'    => 1,
								),
							),
							'group_vc' => 'Responsive'
						),

						'custom_responsive_992_line_height' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Line Height Max-width:992px', 'june' ),
							'tooltip' => esc_attr__( 'Add a custom line height for this heading for screens smaller than 992px', 'june' ),
							'default'     => '30px',
							'selector' => '.cl-custom-heading',
							'css_property' => 'line-height',
							'media_query' => '(max-width: 992px)',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_responsive_992_bool',
									'operator' => '==',
									'value'    => 1,
								),
							),
							'group_vc' => 'Responsive'
						),

					'custom_responsive_768_bool' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Custom Max-width:768px', 'june' ),
							'tooltip' => 'Add a custom size for this heading for screens smaller than 768px',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'cl_required'    => array(
								array(
									'setting'  => 'typography',
									'operator' => '==',
									'value'    => 'custom_font',
								)
							),
							'group_vc' => 'Responsive'
							
						),

						'custom_responsive_768_size' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Font size Max-width:768px', 'june' ),
							'tooltip' => esc_attr__( 'Add a custom size for this heading for screens smaller than 768px', 'june' ),
							'default'     => '18px',
							'selector' => '.cl-custom-heading',
							'css_property' => 'font-size',
							'media_query' => '(max-width: 768px)',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_responsive_768_bool',
									'operator' => '==',
									'value'    => 1,
								),
							),
							'group_vc' => 'Responsive'
						),

						'custom_responsive_768_line_height' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Line Height Max-width:768px', 'june' ),
							'tooltip' => esc_attr__( 'Add a custom line height for this heading for screens smaller than 768px', 'june' ),
							'default'     => '26px',
							'selector' => '.cl-custom-heading',
							'css_property' => 'line-height',
							'media_query' => '(max-width: 768px)',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_responsive_768_bool',
									'operator' => '==',
									'value'    => 1,
								),
							),
							'group_vc' => 'Responsive'
						),
				'responsive_tab_end' => array(
						'type' => 'tab_end',
						'label' => 'Responsive',
						'tabid' => 'responsive'
				),
			),
			
		) );

 		/* Button */
 		cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Button', 'june' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-signs',
				'transport'   => 'postMessage',
				'settings'    => 'cl_button',
				'is_container' => false,
				'marginPositions' => array('top'),
				'fields' => array(
					'btn_title' => array(
						'type'     => 'inline_text',
						'priority' => 10,
						'selector' => '.cl-btn span',
						'label'       => esc_attr__( 'Text', 'june' ),
						'tooltip' => esc_attr__( 'This will be the label for your link', 'june' ),
						'default'     => 'View More',
						'only_text' => true
					),

					'overwrite_style' => array (

							'type' => 'switch',
							'priority' => 10,
							'default'=> 0,
							'label' => esc_attr__( 'Overwrite the default button style', 'june' ),
						    'choices' => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							
							),		

				     ),

					

					'button_style' => array(

						'type' => 'inline_select',
						'priority' => 10,
						'label' => 'Button Style',
						'default'=> 'square',
						'choices' => array(

							'square' => 'Square',
							'rounded' => 'Rounded',
							'simple_text' => 'Simple Text',
							'square_small' => 'Square Small'
		
						),

						'selector' => '.cl-btn',
						'selectClass' => 'btn-style-',
						'cl_required' => array(

							array(

								'setting'  => 'overwrite_style',
								'operator' => '!=',
								'value'    => 0,

							),	
							
						),
					),

					'with_icon' => array (

							'type' => 'switch',
							'priority' => 10,
							'default'=> 0,
							'label' => esc_attr__( 'With Icon', 'june' ),
						    'choices' => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							
							),
							'selector' => '.cl-btn',
							'addClass' => 'with_icon',
							'cl_required' => array(

								array(

									'setting'  => 'overwrite_style',
									'operator' => '!=',
									'value'    => 0,

								),	
								
							),		

				     ),

					

					'button_bg_color'=> array(

						'type' => 'color',
						'priority'=> 10,
						'label' => 'Button Background Color',
						'default' => codeless_get_mod( 'primary_color' ),
						'selector' => '.cl-btn',
						'css_property' => 'background-color',
						'alpha' => true,
						'cl_required' => array(

							array(

								'setting'  => 'overwrite_style',
								'operator' => '!=',
								'value'    => 0,

							),	
							
						),
					),

					/*'button_bg_color_hover'=> array(

						'type' => 'color',
						'priority'=> 10,
						'label' => 'Button Background Color on Hover',
						'default' => '#ffffff',
						'selector' => '.cl-btn',
						'alpha' => true,
						'cl_required' => array(

							array(

								'setting'  => 'overwrite_style',
								'operator' => '!=',
								'value'    => 0,

							),	
							
						),

					),*/

					'button_font_color' => array(

						'type' => 'color',
				        'priority'=> 10,
						'label' => 'Button Font Color', 
						'default'=> '#ffffff',
						'selector'=> '.cl-btn',
						'css_property'=> 'color',
						'alpha' => true,
						'cl_required' => array(

							array(

								'setting'  => 'overwrite_style',
								'operator' => '!=',
								'value'    => 0,

							),	
							
						),
					),

					/*'button_font_color_hover' => array(

						'type' => 'color',
				        'priority'=> 10,
						'label' => 'Button Font Color on Hover', 
						'default'=> codeless_get_mod( 'highlight_dark_color' ),
						'alpha' => true,
						'cl_required' => array(

							array(

								'setting'  => 'overwrite_style',
								'operator' => '!=',
								'value'    => 0,

							),	
							
						),

					),*/



					'button_border_color' => array(
						
						'type'=> 'color',
						'priority'=> 10,
						'label'=> 'Button Border Color',
						'default' => 'transparent',
						'selector' => '.cl-btn',
						'css_property' => 'border-color',
						'alpha' => true,
						'cl_required' => array(

							array(

								'setting'  => 'overwrite_style',
								'operator' => '!=',
								'value'    => 0,

							),	
							
						),

					),	

					'button_hover_effect' => array(

						'type' => 'inline_select',
						'priority' => 10,
						'label' => 'Button Hover Effect',
						'default'=> 'darker',
						'choices' => array(

							'darker' => 'Darker',
							'shadow' => 'shadow'
		
						),

						'selector' => '.cl-btn',
						'selectClass' => 'btn-hover-',
						'cl_required' => array(

							array(

								'setting'  => 'overwrite_style',
								'operator' => '!=',
								'value'    => 0,

							),	
							
						),
					),


					/*'button_border_color_hover' => array(
						
						'type'=> 'color',
						'priority'=> 10,
						'label'=> 'Button Border Color Hover',
						'default' => 'transparent',
						'alpha' => true,
						'cl_required' => array(

							array(

								'setting'  => 'overwrite_style',
								'operator' => '!=',
								'value'    => 0,

							),	
							
						),

					),	*/


					'link' => array(
						'type'     => 'text',
						'priority' => 10,
						'label'       => esc_attr__( 'Link', 'june' ),
						'default'     => '#'
					),

					'target' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Link Target', 'june' ),
							'default'     => '_self',

							'choices'     => array(
								'_self' => esc_html__('_self', 'june'),
								'_blank' => esc_html__('_blank', 'june'),				
							),
							'reloadTemplate' => true
					),

					'css_style' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl-btn-div',
							'css_property' => '',
							'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px' )
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
							'selector' => '.cl-btn-div'
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
							'selector' => '.cl-btn-div',
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
							'selector' => '.cl-btn-div',
							'htmldata' => 'speed',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							)
						),
				)
			));

 		/* Divider */
		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Divider', 'june' ),
			'section'     => 'cl_codeless_page_builder',
			//'priority'    => 10,
			'icon'		  => 'icon-arrows-minus',
			'transport'   => 'postMessage',
			'settings'    => 'cl_divider',
			'use_on_header' => true,
			'is_container' => false,
			'marginPositions' => array('top'),
			'fields' => array(
				'height' => array(
					'type'     => 'slider',
					'label' => 'Divider height',
					'default' => '1',
					'selector' => '.cl_divider .inner',
					'css_property' => 'border-top-width',
					'choices'     => array(
								'min'  => '0',
								'max'  => '30',
								'step' => '1',
								'suffix' => 'px'
							),
				    'suffix' => 'px',

					'label'       => esc_attr__( 'Divider Height', 'june' ),
					'tooltip' => esc_attr__( 'Set the divider height', 'june' )
					
				),

				'width_full' => array(
	
							'type'        => 'switch',
							'label'       => esc_html__( 'Set divider fullwidth', 'june' ),
							'default'     => 1,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
						),
					
					
				'width' => array(
	
							'type' => 'slider',
							'label' => 'Set the divider width',
							'default' => '300',
							'selector' => '.cl_divider .wrapper',
							'css_property' => 'width',
							'choices'     => array(
								'min'  => '1',
								'max'  => '1070',
								'step' => '1',
								'suffix' => 'px'
							),
							'suffix' => 'px',

							'cl_required'    => array(
								array(
									'setting'  => 'width_full',
									'operator' => '==',
									'value'    => 0,
								),
							),
						),


				'color' => array(
							'type' => 'color',
							'label' => 'Set Color',
							'default' => '#222',
							'selector' => '.cl_divider .inner',
							'css_property' => 'border-color',
							'alpha' => true
							
					),

				'border_style' => array(
							'type' => 'inline_select',
							'label' => 'Set the border style',
							'default' => 'solid',
							'selector' => '.cl_divider .inner',
							'css_property' => 'border-style',
							'choices'     => array(
								'solid'	=> 'solid',
								'dotted' =>	'dotted',
								'dashed' =>	'dashed',
								'double' => 'double',
								'groove' => 'groove',
								'ridge' => 'ridge',	
								'inset' => 'inset',	
								'outset' => 'outset'
							
							),
							
							
					),

				'align' => array( 

						    'type' => 'inline_select',
							'label' => 'Set the border align',
							'default' => '',
							'selector' => '.cl_divider .wrapper',
							'choices'     => array(
								'left_divider'	=> 'left',
								'center_divider' =>	'center',
								'right_divider' =>	'right',
								
															
							),
							'selectClass' => '',
							'cl_required'    => array(
								array(
									'setting'  => 'width_full',
									'operator' => '==',
									'value'    => 0,
								),
							),


					),


				'divider_style' => array(
	
							'type' => 'inline_select',
							'label' => 'Select the style of the divider',
							'default' => 'simple',
							'selector' => '.cl_divider .wrapper',
							'choices'     => array(
								'simple' => 'Simple',
								'two' => 'Two Borders',
								'icon' => 'With Centred Icon'
							
							),
							'reloadTemplate' => true
							
						),
						
				'icon' => array(
							'type'     => 'select_icon',
							'priority' => 10,
							'label'       => esc_attr__( 'Select Icon', 'june' ),
							'default'     => 'cl-icon-apps',
							'selector' => '.cl_divider i',
							'selectClass' => ' ',
							'cl_required'    => array(
								array(
									'setting'  => 'divider_style',
									'operator' => '==',
									'value'    => 'icon',
								),
							),
						),

				'color_icon' => array(
							'type'     => 'color',
							'priority' => 10,
							'label'       => esc_attr__( 'Icon Color', 'june' ),
							'default'     => '#222',
							'selector' => '.cl_divider .wrapper > i',
							'css_property' => 'color',
							'alpha' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'divider_style',
									'operator' => '==',
									'value'    => 'icon',
								),
							),
						),

				'size_icon' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Icon size', 'june' ),
							'default'     => '10',
							'selector' => '.cl_divider .wrapper > i',
							'css_property'=> 'font-size',
							'choices'     => array(
								'min'  => '0',
								'max'  => '30',
								'step' => '1'
								
							),
				            'suffix' => 'px',
							'cl_required'    => array(
								array(
									'setting'  => 'divider_style',
									'operator' => '==',
									'value'    => 'icon',
								),
							),
						),

				'css_style' => array(
						'type' => 'css_tool',
						'label' => 'Tool',
						'selector' => '.cl_divider',
						'css_property' => '',
						'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px' )
					),
					
					
	
				),
	
			
		));


 		
		
		
		
		
 		/* Media */
 		cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Media', 'june' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-photo',
				'transport'   => 'postMessage',
				'settings'    => 'cl_media',
				'is_container' => false,
				'css_dependency' => array(CODELESS_BASE_URL.'css/ilightbox/css/ilightbox.css'),
				'marginPositions' => array('top'),
				'fields' => array(
						'media_type' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Media Type', 'june' ),
							
							'default'     => 'image',
							'choices' => array(
								'image'	=> 'Image / Embed',
								'video' =>	'Video with Placeholder',
								'live' => 'Live Photo'
							),
							'selector' => '.cl_media',
							'selectClass' => 'type-', 
							'reloadTemplate' => true 
						),

						'position' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Position', 'june' ),
							
							'default'     => 'stretch',
							'choices' => array(
								'left'	=> 'Left',
								'center' =>	'Center',
								'right' => 'Right',
								'stretch' => 'stretch' 
							),
							'selector' => '.cl_media',
							'selectClass' => 'position_'
						),

						'image' => array(
							'type'        => 'image',
							'label'       => esc_html__( 'Upload Image', 'june' ),
							'default'     => '',
							'priority'    => 10,
							'image_get' => 'id',
							'reloadTemplate' => true,
						),

						'video_mov' => array(
								
								'type'     => 'text',
								'priority' => 10,
								'label'       => esc_attr__( 'Video Mov', 'june' ),
								'tooltip' => esc_attr__( 'Add this video if you want to use it for live photo', 'june' ),
								'default'     => '',
								'cl_required'    => array(
									array(
										'setting'  => 'media_type',
										'operator' => '==',
										'value'    => 'live',
									),
								),
								'reloadTemplate' => true
							),

						'lightbox' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Lightbox on hover', 'june' ),
							'tooltip' => esc_attr__( 'Show lightbox icon on image hover', 'june' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),

							'reloadTemplate' => true,
						),

						'lazyload' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Lazyload Image', 'june' ),
							'tooltip' => esc_attr__( 'Image will be loaded only when it\'s on viewport', 'june' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),

							'reloadTemplate' => true,
						),

						'shadow' => array(
								'type'        => 'switch',
								'label'       => esc_html__( 'Shadow', 'june' ),
								'tooltip' => 'Switch on/off shadow',
								'default'     => 0,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'june' ),
									'off' => esc_attr__( 'Off', 'june' ),
								),

								'selector' => '.cl_media',
								'addClass' => 'add-shadow'
							),

						'image_size' => array(
								'type'        => 'inline_select',
								'label'       => esc_html__( 'Image Size', 'june' ),
								'tooltip' => "You can change image sizes on Theme Panel -> <a target=\"_blank\" href=\"".admin_url('admin.php?page=codeless-panel-image-sizes')."\">Image Sizes Section</a>",
								'default'     => 'full',
								'priority'    => 10,
								'choices'     => codeless_get_additional_image_sizes(),
								'reloadTemplate' => true
							),

						

						'custom_width_bool' => array(
								'type'        => 'switch',
								'label'       => esc_html__( 'Custom Width?', 'june' ),
								'tooltip' => 'Add a custom width for this media',
								'default'     => 0,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'june' ),
									'off' => esc_attr__( 'Off', 'june' ),
								),
								'selector' => '.cl_media',
								'addClass' => 'cl-custom-width'
							),

						'custom_width' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Set Custom Width', 'june' ),
							
							'default'     => '400px',
						
							'selector' => '.cl_media .inner',
							'css_property' => 'width',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_width_bool',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),

						'custom_link' => array(

							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Link', 'june' ),
							'default'     => '#',
							'reloadTemplate' => true
						),

						'hover_effect' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Hover Effect', 'june' ),
							
							'default'     => 'none',
							'choices' => array(
								'none'	=> 'None',
								'dark' =>	'Dark',
								'light' => 'Light'
							),
							'selector' => '.cl_media',
							'selectClass' => 'hover_',
							'cl_required'    => array(
									array(
										'setting'  => 'custom_link',
										'operator' => '!=',
										'value'    => '#',
									),
								),
						),

						'video_start' => array(
							'type' => 'group_start',
							'label' => 'Video',
							'groupid' => 'video'
						),
						
						
							'video' => array(
								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Video Background', 'june' ),
								
								'default'     => 'none',
								'choices' => array(
									'none'	=> 'None',
									'self' =>	'Self-Hosted',
									'youtube' =>	'Youtube',
									'vimeo' => 'Vimeo'
								),
								'reloadTemplate' => true
								//'customJS' => 'inlineEdit_videoSection'
							),
							
							'video_mp4' => array(
								
								'type'     => 'text',
								'priority' => 10,
								'label'       => esc_attr__( 'Video Mp4', 'june' ),
								
								'default'     => '',
								'cl_required'    => array(
									array(
										'setting'  => 'video',
										'operator' => '==',
										'value'    => 'self',
									),
								),
								'reloadTemplate' => true
							),
							'video_webm' => array(
								
								'type'     => 'text',
								'priority' => 10,
								'label'       => esc_attr__( 'Video Webm', 'june' ),
								
								'default'     => '',
								'cl_required'    => array(
									array(
										'setting'  => 'video',
										'operator' => '==',
										'value'    => 'self',
									),
								),
								'reloadTemplate' => true
							),
							'video_ogv' => array(
								
								'type'     => 'text',
								'priority' => 10,
								'label'       => esc_attr__( 'Video Ogv', 'june' ),
								
								'default'     => '',
								'cl_required'    => array(
									array(
										'setting'  => 'video',
										'operator' => '==',
										'value'    => 'self',
									),
								),
								'reloadTemplate' => true
							),

							
							
							'video_youtube' => array(
								
								'type'     => 'text',
								'priority' => 10,
								'label'       => esc_attr__( 'Youtube ID', 'june' ),
								
								'default'     => '',
								'cl_required'    => array(
									array(
										'setting'  => 'video',
										'operator' => '==',
										'value'    => 'youtube',
									),
								
								),
								'reloadTemplate' => true
							),
							
							'video_vimeo' => array(
								
								'type'     => 'text',
								'priority' => 10,
								'label'       => esc_attr__( 'Vimeo ID', 'june' ),
								
								'default'     => '',
								'cl_required'    => array(
									array(
										'setting'  => 'video',
										'operator' => '==',
										'value'    => 'vimeo',
									),
								
								),
								'reloadTemplate' => true
							),
							
							'video_loop' => array(
								'type'        => 'switch',
								'label'       => esc_html__( 'Video Loop', 'june' ),
								'tooltip' => 'Switch on/off video loop',
								'default'     => 0,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'june' ),
									'off' => esc_attr__( 'Off', 'june' ),
								),
								'cl_required'    => array(
									array(
										'setting'  => 'video',
										'operator' => '!=',
										'value'    => 'none',
									),
								),
								'reloadTemplate' => true
							),

							'autoplay' => array(
								'type'        => 'switch',
								'label'       => esc_html__( 'Autoplay', 'june' ),
								'tooltip' => 'Switch on when video is used with Image Placeholder',
								'default'     => 1,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'june' ),
									'off' => esc_attr__( 'Off', 'june' ),
								),

								'reloadTemplate' => true
							),

							'height' => array(
								'type'     => 'slider',
								'priority' => 10,
								'label'       => esc_attr__( 'Video / Embed Height', 'june' ),
								'tooltip' => esc_attr__( 'Use this only for embed links and for video with image placeholder.', 'june' ),
								'default'     => '400',
								'choices'     => array(
									'min'  => '0',
									'max'  => '1000',
									'step' => '10',
								),
								'suffix' => 'px',
								'selector' => '.cl_media iframe, .cl_media video',
								'css_property' => 'height',
								
								
							),

						'video_end' => array(
							'type' => 'group_end',
							'label' => 'Video',
							'groupid' => 'video'
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
							'selector' => '.cl_media'
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
							'selector' => '.cl_media',
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
							'selector' => '.cl_media',
							'htmldata' => 'speed',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							)
						),

						'css_style' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_media',
							'css_property' => '',
							'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px' )
						),
				)
			));

 		/* Gallery */
 		cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Gallery', 'june' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-picture-multiple',
				'transport'   => 'postMessage',
				'settings'    => 'cl_gallery',
				'is_container' => false,
				'css_dependency' => array( CODELESS_BASE_URL.'css/owl.carousel.min.css' ),
				'marginPositions' => array('top'),
				'fields' => array(

					'carousel' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Carousel', 'june' ),
							'tooltip' => '',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl_gallery',
							'addClass' => 'cl-carousel owl-carousel owl-theme',
							'reloadTemplate' => true
					),

					'carousel_view_items' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Items', 'june' ),
							
							'default'     => '6',
							'choices' => array(
								'1' =>	'1 items',
								'2' =>	'2 items',
								'3' =>	'3 items',
								'4' => '4 items',
								'5' => '5 items',
								'6' => '6 items',
								'7' => '7 items',
							),
							'selector' => '.cl_gallery',
							'htmldata' => 'items',
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => 1,
								),
							),
							'reloadTemplate' => true
					),

					'carousel_nav' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Nav', 'june' ),
							'tooltip' => esc_attr__( 'Switch On if you want carousel navigation', 'june' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '.cl_gallery',
							'htmldata' => 'carousel-nav',
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => 1,
								),
							),

						),	



						'carousel_dots' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Dots', 'june' ),
							'tooltip' => esc_attr__( 'Switch On if you want carousel dots ( pagination )', 'june' ),
							'default'     => 1,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '.cl_gallery',
							'htmldata' => 'carousel-dots',
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => 1,
								),
							),

						),

					'images' => array(
						'type'     => 'image_gallery',
						'priority' => 10,
						'selector' => '',
						'label'       => esc_attr__( 'Images', 'june' ),
						
						'reloadTemplate' => true,
					),

					'items_per_row' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Items per Row', 'june' ),
							
							'default'     => 'all',
							'choices' => array(
								'all'	=> 'All',
								'2' =>	'2 items',
								'3' =>	'3 items',
								'4' => '4 items',
								'5' => '5 items',
								'6' => '6 items',
								'7' => '7 items',
							),
							'selector' => '.cl_gallery',
							'selectClass' => 'items_',
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => 0,
								),
							),
					),

					'distance' => array(
	
							'type' => 'slider',
							'label' => 'Distance between items',
							'default' => '10',
							'selector' => '.cl_gallery .gallery-item',
							'css_property' => 'padding',
							'choices'     => array(
								'min'  => '0',
								'max'  => '60',
								'step' => '1',
								'suffix' => 'px'
							),
							'suffix' => 'px',
						),


					'lightbox' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Lightbox on hover', 'june' ),
							'tooltip' => esc_attr__( 'Show lightbox icon on image hover', 'june' ),
							'default'     => 1,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '.cl_gallery',
							'addClass' => 'with-lightbox',
							'reloadTemplate' => true,
							

						),

						'image_size' => array(
								'type'        => 'inline_select',
								'label'       => esc_html__( 'Image Size', 'june' ),
								'tooltip' => "You can change image sizes on Theme Panel -> <a target=\"_blank\" href=\"".admin_url('admin.php?page=codeless-panel-image-sizes')."\">Image Sizes Section</a>",
								'default'     => 'full',
								'priority'    => 10,
								'choices'     => codeless_get_additional_image_sizes(),
								'reloadTemplate' => true
							),


					'css_style' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_gallery',
							'css_property' => '',
							'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px' )
					),
				)
			));

 		/* Service */
 		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Service', 'june' ),
			'section'     => 'cl_codeless_page_builder',
			'tooltip' => 'Manage all options of the selected Row',
			//'priority'    => 10,
			'icon'		  => 'icon-arrows-circle-check',
			'transport'   => 'postMessage',
			'settings'    => 'cl_service',
			'marginPositions' => array('top'),

			'predefined'  => array(
				'simple_left_icon' => array(
					'photo' => get_template_directory_uri().'/img/predefined_elements/cl_service/simple_left_icon.png',
					'label' => 'Simple Left Icon',
					'content' => '[cl_service media="type_icon" title="Better Performance" icon="cl-icon-laptop2" css_style="{\'margin-top\':\'55px\'}_-_json" icon_font_size="34" wrapper_size="40" wrapper_distance="34" title_content_distance="5" animation="bottom-t-top" animation_delay="0"]A technology that renders via GPU, power saver, dependency manager, faster load. Load only scripts that needed for page.[/cl_service]'
				),
				'simple_top_icon' => array(
					'photo' => get_template_directory_uri().'/img/predefined_elements/cl_service/simple_top_icon.png',
					'label' => 'Simple Top Icon',
					'content' => '[cl_service media="type_icon" layout_type="media_top" title="Experienced Support Team" icon="cl-icon-profile-male" css_style="{\'margin-top\':\'50px\'}_-_json" icon_font_size="42" wrapper_size="30" animation="bottom-t-top" animation_delay="100"]On the other hand, we denounce with righteous indignation and dislike men who are so beguiled[/cl_service]'
				),
			),


			'is_container' => false,
			'shiftClick' => array( 
					array( 'option' => 'h5_font_size', 'selector' => '.box-content h3' ) 
			),
			'fields' => array(

				'element_tabs' => array(
					'type' => 'show_tabs',
					'default' => 'general',
					'tabs' => array(
						'general' => array( 'General', 'cl-icon-settings' ),
						'design' => array( 'Design', 'cl-icon-tune' )
					)
				),
				
				'general_tab_start' => array(
					'type' => 'tab_start',
					'label' => 'General',
					'tabid' => 'general'
				),
				
					/* ----------------------------------------------- */
					
					'options_start' => array(
						'type' => 'group_start',
						'label' => 'Layout',
						'groupid' => 'layout'
					),
						
						'media' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Media Type', 'june' ),
							
							'default'     => 'type_text',
							'choices' => array(
								'type_text' => 'Only Text',
								'type_icon' => 'Icon',
								'type_svg' => 'SVG',
								'type_custom' => 'Custom IMG'
							),
							'selector' => '.cl_service',
							'reloadTemplate' => true,
							'selectClass' => ''
						),

						'image' => array(
							'type'        => 'image',
							'label'       => esc_html__( 'Upload Image', 'june' ),
							'default'     => '',
							'priority'    => 10,
							'image_get' => 'id',
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'media',
									'operator' => '==',
									'value'    => 'type_custom',
								),
							),
						),

						'image_size' => array(
								'type'        => 'inline_select',
								'label'       => esc_html__( 'Image Size', 'june' ),
								'tooltip' => "You can change image sizes on Theme Panel -> <a target=\"_blank\" href=\"".admin_url('admin.php?page=codeless-panel-image-sizes')."\">Image Sizes Section</a>",
								'default'     => 'full',
								'priority'    => 10,
								'choices'     => codeless_get_additional_image_sizes(),
								'reloadTemplate' => true
						),

						'animation_icon' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'SVG Animation', 'june' ),
							'tooltip' => 'Switch to animate SVG on load',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'cl_required'    => array(
								array(
									'setting'  => 'media',
									'operator' => '==',
									'value'    => 'type_svg',
								),
							),
						),	
				
						'layout_type' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Layout Type', 'june' ),
							'tooltip' => esc_attr__( 'Select layout type of service element', 'june' ),
							'default'     => 'media_aside',
							'choices' => array(
								'media_aside' => 'Media Aside',
								'media_top' => 'Media Top'
							),
							'selector' => '.cl_service',
							'selectClass' => '',
							'cl_required'    => array(
								array(
									'setting'  => 'media',
									'operator' => '!=',
									'value'    => 'type_text',
								),
							),
						),

						'layout_align' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Align Content and Icon', 'june' ),
							'tooltip' => esc_attr__( 'Select the align of content and layout of service element', 'june' ),
							'default'     => 'align_left',
							'choices' => array(
								'align_left' => 'Align Left',
								'align_center' => 'Align Center',
								'align_right' => 'Align Right'
							),
							'selector' => '.cl_service',
							'selectClass' => ''
						),

						'title' => array(
							'type'     => 'inline_text',
							'priority' => 10,
							'only_text' => true,
							'selector' => '.cl_service .box-content > h3',
							'label'       => esc_attr__( 'Title', 'june' ),
							'default'     => 'Custom Service Title',
							'replace_type_vc' => 'textfield'
						),

						'subtitle' => array(
							'type'     => 'inline_text',
							'priority' => 10,
							'only_text' => true,
							'selector' => '.cl_service .box-content > .subtitle',
							'label'       => esc_attr__( 'Subtitle', 'june' ),
							'default'     => 'Custom Subtitle for service',
							'replace_type_vc' => 'textfield'
						),

						'content' => array(
							'type'     => 'inline_text',
							'priority' => 10,
							'selector' => '.cl_service .box-content > .content',
							'label'       => esc_attr__( 'Content', 'june' ),
							'default'     => 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled',
						),

						'icon' => array(
							'type'     => 'select_icon',
							'priority' => 10,
							'label'       => esc_attr__( 'Select Icon', 'june' ),
							'default'     => 'cl-icon-apps',
							'selector' => '.cl_service > .icon_wrapper i',
							'selectClass' => ' ',
							'cl_required'    => array(
								array(
									'setting'  => 'media',
									'operator' => '==',
									'value'    => 'type_icon',
								),
							),
						),

						'wrapper' => array(
							
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Icon Wrapper', 'june' ),
							'tooltip' => esc_attr__( 'Select the type of wrapper around Icon if you want one', 'june' ),
							'default'     => 'wrapper_none',
							'choices' => array(
								'wrapper_none' => 'None',
								'wrapper_circle' => 'Circle',
								'wrapper_square' => 'Square',
								//'wrapper_hexagon' => 'Hexagon'
							),
							'selector' => '.cl_service > .icon_wrapper',
							'selectClass' => '',
							'cl_required'    => array(
								array(
									'setting'  => 'media',
									'operator' => '!=',
									'value'    => 'type_text',
								),
							),
						),

						'hover_effect' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Hover Effect', 'june' ),
							
							'default'     => 'none',
							'choices' => array(
								'none' => 'None',
								'wrapper_accent_color' => 'Wrapper Accent Color'
							),
							'selector' => '.cl_service',
							'selectClass' => 'cl-hover-'
						),

						'service_link' => array(
							'type'     => 'text',
							'priority' => 10,
							'selector' => '',
							'label'       => esc_attr__( 'Service Link', 'june' ),
							'default'     => ''
						),

					'options_end' => array(
						'type' => 'group_end',
						'label' => 'Layout',
						'groupid' => 'layout'
					),

					
					'extra_start' => array(
						'type' => 'group_start',
						'label' => 'Extra',
						'groupid' => 'extra'
					),

						'subtitle_bool' => array(

							'type'        => 'switch',
							'label'       => esc_html__( 'Add subtitle', 'june' ),
							'tooltip' => 'Switch On if you want a custom subtitle after Primary Title',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'reloadTemplate' => true
						),

						


					'extra_end' => array(
						'type' => 'group_end',
						'label' => 'Extra',
						'groupid' => 'extra'
					),

				'general_tab_end' => array(
					'type' => 'tab_end',
					'label' => 'General',
					'tabid' => 'general'
				),
				'design_tab_begin' => array(
					'type' => 'tab_start',
					'label' => 'Design',
					'tabid' => 'design'
				),

					'panel' => array(
						'type' => 'group_start',
						'label' => 'Box',
						'groupid' => 'design_panel'
					),
				
						'css_style' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_service',
							'css_property' => '',
							'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px' )
						),

						'box_border_color' => array(
							'type' => 'color',
							'label' => 'Box Border Color',
							'default' => 'rgba(0,0,0,0.0)',
							'selector' => '.cl_service',
							'css_property' => 'border-color',
							'alpha' => true,
						),
						
						'text_color' => array(
							'type' => 'inline_select',
							'label' => 'Text Color',
							'default' => 'dark-text',
							'choices' => array(
								'dark-text' => 'Dark',
								'light-text' => 'Light'
							),
							'selector' => '.cl_service',
							'selectClass' => ''
						),
					
						
					'design_panel_end' => array(
						'type' => 'group_end',
						'label' => 'Animation',
						'groupid' => 'design_panel'
					),

					'icon_start' => array(
						'type' => 'group_start',
						'label' => 'Style and Distances',
						'groupid' => 'icon'
					),

						'icon_font_size' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Icon Size', 'june' ),
							'tooltip' => esc_attr__( 'Change Icon size by moving the slider', 'june' ),
							'default'     => '36',
							'choices'     => array(
								'min'  => '14',
								'max'  => '120',
								'step' => '1',
							),
							'suffix' => 'px', 
							'selector' => '.cl_service > .icon_wrapper i',
							'css_property' => 'font-size',
							'cl_required'    => array(
								array(
									'setting'  => 'media',
									'operator' => '==',
									'value'    => 'type_icon',
								),
							),
						),

						'icon_color' => array(
							'type' => 'color',
							'label' => 'Icon Color',
							'default' => codeless_get_mod('primary_color'),
							'selector' => '.cl_service > .icon_wrapper i',
							'css_property' => 'color',
							'alpha' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'media',
									'operator' => '==',
									'value'    => 'type_icon',
								),
							),
						),
						'svg_color' => array(
							'type' => 'color',
							'label' => 'SVG Color',
							'default' => codeless_get_mod('primary_color'),
							'selector' => '.cl_service > .icon_wrapper svg',
							'css_property' => 'stroke',
							'alpha' => false,
							'cl_required'    => array(
								array(
									'setting'  => 'media',
									'operator' => '==',
									'value'    => 'type_svg',
								),
							),
						),

						'wrapper_bg_color' => array(
							'type' => 'color',
							'label' => 'Wrapper BG Color',
							'default' => 'rgba(0,0,0,0)',
							'selector' => '.cl_service > .icon_wrapper .wrapper-form',
							'css_property' => 'background-color',
							'alpha' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'wrapper',
									'operator' => '!=',
									'value'    => 'wrapper_none',
								),
							),
						),

						'wrapper_border_color' => array(
							'type' => 'color',
							'label' => 'Wrapper Border Color',
							'default' => 'rgba(0,0,0,0.5)',
							'selector' => '.cl_service > .icon_wrapper .wrapper-form',
							'css_property' => 'border-color',
							'alpha' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'wrapper',
									'operator' => '!=',
									'value'    => 'wrapper_none',
								),
							),
						),

						'wrapper_box_shadow' => array(

							'type'        => 'switch',
							'label'       => esc_html__( 'Add Shadow', 'june' ),
							'tooltip' => 'Switch On to add shadow to icon wrapper',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl_service > .icon_wrapper',
							'addClass' => 'with-shadow'
						),


						'wrapper_size' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Wrapper and SVG Size', 'june' ),
							'tooltip' => esc_attr__( 'Change Wrapper size by moving the slider. Can be used for SVG size too.', 'june' ),
							'default'     => '72',
							'choices'     => array(
								'min'  => '30',
								'max'  => '240',
								'step' => '1',
							),
							'suffix' => 'px',
							'selector' => '.cl_service > .icon_wrapper .wrapper-form',
							'css_property' => array('width', 'height'),
							'cl_required'    => array(
								array(
									'setting'  => 'media',
									'operator' => '!=',
									'value'    => 'type_text',
								)
							),
						),

						'wrapper_distance' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Icon and Wrapper Distance', 'june' ),
							'tooltip' => esc_attr__( 'Icon and Wrapper distance from content', 'june' ),
							'default'     => '20',
							'choices'     => array(
								'min'  => '0',
								'max'  => '140',
								'step' => '1',
							),
							'suffix' => 'px',
							'selector' => '.cl_service > .icon_wrapper',
							'css_property' => array('padding-right', 'padding-bottom', 'padding-left'),
						),

						'title_distance_top' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Distance Title From Top', 'june' ),
							'tooltip' => esc_attr__( 'Drag to change the distance of the title from top of element', 'june' ),
							'default'     => '0',
							'choices'     => array(
								'min'  => '0',
								'max'  => '30',
								'step' => '1',
							),
							'suffix' => 'px',
							'selector' => '.cl_service .box-content > h3',
							'css_property' => 'margin-top',

						),

						'title_content_distance' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Distance beetween Title and Content', 'june' ),
							'tooltip' => esc_attr__( 'Drag to change the distance of the content from Title', 'june' ),
							'default'     => '0',
							'choices'     => array(
								'min'  => '0',
								'max'  => '140',
								'step' => '1',
							),
							'suffix' => 'px',
							'selector' => '.cl_service .box-content > .content',
							'css_property' => 'margin-top',
							
						),
						'title_subtitle_distance' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Distance beetween Title and Subtitle', 'june' ),
							'tooltip' => esc_attr__( 'Drag to change the distance of the title from subtitle', 'june' ),
							'default'     => '0',
							'choices'     => array(
								'min'  => '0',
								'max'  => '140',
								'step' => '1',
							),
							'suffix' => 'px',
							'selector' => '.cl_service .box-content > .subtitle',
							'css_property' => 'margin-top',
							'cl_required'    => array(
								array(
									'setting'  => 'subtitle_bool',
									'operator' => '==',
									'value'    => true,
								),
							),
							
						),


					'icon_end' => array(
						'type' => 'group_end',
						'label' => 'Icon',
						'groupid' => 'icon'
					),



					'typography_start' => array(
						'type' => 'group_start',
						'label' => 'Typography',
						'groupid' => 'typography',
					),

						'title_typography' => array(
							'type'        => 'inline_select',
							'label'       => esc_html__( 'Title Typography', 'june' ),
							'tooltip' => 'Select one of the predefined title typography styles on Styling Section or select "Custom Font" if you want to edit the typography of Title. SHIFT-CLICK on Element if you want to modify one of the predefined Style',
							'default'     => 'h5',
							'priority'    => 10,
							'selector' => '.cl_service .box-content > h3',
							'selectClass' => 'custom_font ',
							'choices'     => array(
								'h1'  => esc_attr__( 'H1', 'june' ),
								'h2' => esc_attr__( 'H2', 'june' ),
								'h3' => esc_attr__( 'H3', 'june' ),
								'h4' => esc_attr__( 'H4', 'june' ),
								'h5' => esc_attr__( 'H5', 'june' ),
								'h6' => esc_attr__( 'H6', 'june' ),
								'custom_font' => esc_attr__( 'Custom Font', 'june' ),
							),
						),	


						'title_font_size' => array(
		
								'type' => 'slider',
								'label' => 'Title Font Size',
								'default' => '16',
								'selector' => '.cl_service .box-content > h3',
								'css_property' => 'font-size',
								'choices'     => array(
									'min'  => '14',
									'max'  => '72',
									'step' => '1',
									'suffix' => 'px'
								),
								'suffix' => 'px',
								'cl_required'    => array(
									array(
										'setting'  => 'title_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
							),

						'title_font_weight' => array(
		
								'type' => 'inline_select',
								'label' => 'Title Font Weight',
								'default' => '600',
								'selector' => '.cl_service .box-content > h3',
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
										'setting'  => 'title_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
							),
							
						'title_line_height' => array(
		
								'type' => 'slider',
								'label' => 'Title Line Height',
								'default' => '22',
								'selector' => '.cl_service .box-content > h3',
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
										'setting'  => 'title_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
							),

						'title_letterspace' => array(
		
								'type' => 'slider',
								'label' => 'Title Letter-space',
								'default' => '1',
								'selector' => '.cl_service .box-content > h3',
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
										'setting'  => 'title_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
							),
						
						'title_transform' => array(
								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Title Text Transform', 'june' ),
								
								'default'     => 'uppercase',
								'selector' => '.cl_service .box-content > h3',
								'css_property' => 'text-transform',
								'choices' => array(
									'none' => 'None',
									'uppercase' => 'Uppercase'
								),
								'cl_required'    => array(
									array(
										'setting'  => 'title_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
								
							),

						'title_color' => array(
								'type' => 'color',
								'label' => 'Title Color',
								'default' => '#444444',
								'selector' => '.cl_service .box-content > h3',
								'css_property' => 'color',
								'alpha' => true,
								'cl_required'    => array(
									array(
										'setting'  => 'title_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
						),
							
						
						
						'custom_desc_typography' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Content Typography', 'june' ),
							'tooltip' => 'Switch On if you want to modify default typography of content',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
						),	
						
						
						
						'desc_font_size' => array(
		
								'type' => 'slider',
								'label' => 'Content Font Size',
								'default' => '14',
								'selector' => '.cl_service .box-content > .content',
								'css_property' => 'font-size',
								'choices'     => array(
									'min'  => '14',
									'max'  => '60',
									'step' => '1',
									'suffix' => 'px'
								),
								'suffix' => 'px',
								'cl_required'    => array(
									array(
										'setting'  => 'custom_desc_typography',
										'operator' => '==',
										'value'    => true,
									),
								),
							),

						'desc_font_weight' => array(
		
								'type' => 'inline_select',
								'label' => 'Content Font Weight',
								'default' => '400',
								'selector' => '.cl_service .box-content > .content',
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
										'setting'  => 'custom_desc_typography',
										'operator' => '==',
										'value'    => true,
									),
								),
							),
							
						'desc_line_height' => array(
		
								'type' => 'slider',
								'label' => 'Content Line Height',
								'default' => '22',
								'selector' => '.cl_service .box-content > .content',
								'css_property' => 'line-height',
								'choices'     => array(
									'min'  => '20',
									'max'  => '80',
									'step' => '1',
									'suffix' => 'px'
								),
								'suffix' => 'px',
								'cl_required'    => array(
									array(
										'setting'  => 'custom_desc_typography',
										'operator' => '==',
										'value'    => true,
									),
								),
							),
							
						'desc_transform' => array(
								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Content Text Transform', 'june' ),
								
								'default'     => 'none',
								'selector' => '.cl_service .box-content > .content',
								'css_property' => 'text-transform',
								'choices' => array(
									'none' => 'None',
									'uppercase' => 'Uppercase'
								),
								'cl_required'    => array(
									array(
										'setting'  => 'custom_desc_typography',
										'operator' => '==',
										'value'    => true,
									),
								),
								
							),
						'desc_color' => array(
								'type' => 'color',
								'label' => 'Content Color',
								'default' => '#6a6a6a',
								'selector' => '.cl_service .box-content > .content',
								'css_property' => 'color',
								'alpha' => true,
								'cl_required'    => array(
									array(
										'setting'  => 'custom_desc_typography',
										'operator' => '==',
										'value'    => true,
									),
								),
						),


						'subtitle_typography' => array(
							'type'        => 'inline_select',
							'label'       => esc_html__( 'Subtitle Typography', 'june' ),
							'tooltip' => 'Select typography style of Subtitle',
							'default'     => 'default',
							'priority'    => 10,
							'selector' => '.cl_service .box-content > .subtitle',
							'selectClass' => '',
							'choices'     => array(
								'default'  => esc_attr__( 'Default', 'june' ),
								'custom_font' => esc_attr__( 'Custom Font', 'june' ),
							),
							'cl_required'    => array(
									array(
										'setting'  => 'subtitle_bool',
										'operator' => '==',
										'value'    => true,
									),
							),
						),	


						'subtitle_font_size' => array(
		
								'type' => 'slider',
								'label' => 'Subtitle Font Size',
								'default' => '14',
								'selector' => '.cl_service .box-content > .subtitle',
								'css_property' => 'font-size',
								'choices'     => array(
									'min'  => '14',
									'max'  => '72',
									'step' => '1',
									'suffix' => 'px'
								),
								'suffix' => 'px',
								'cl_required'    => array(
									array(
										'setting'  => 'subtitle_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
							),

						'subtitle_font_weight' => array(
		
								'type' => 'inline_select',
								'label' => 'Subtitle Font Weight',
								'default' => '400',
								'selector' => '.cl_service .box-content > .subtitle',
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
										'setting'  => 'subtitle_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
							),
							
						'subtitle_line_height' => array(
		
								'type' => 'slider',
								'label' => 'Subtitle Line Height',
								'default' => '18',
								'selector' => '.cl_service .box-content > .subtitle',
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
										'setting'  => 'subtitle_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
							),

						'subtitle_letterspace' => array(
		
								'type' => 'slider',
								'label' => 'Subtitle Letter-space',
								'default' => '0',
								'selector' => '.cl_service .box-content > .subtitle',
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
										'setting'  => 'subtitle_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
							),
						
						'subtitle_transform' => array(
								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Subtitle Text Transform', 'june' ),
								
								'default'     => 'none',
								'selector' => '.cl_service .box-content > .subtitle',
								'css_property' => 'text-transform',
								'choices' => array(
									'none' => 'None',
									'uppercase' => 'Uppercase'
								),
								'cl_required'    => array(
									array(
										'setting'  => 'subtitle_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
								
							),

						'subtitle_color' => array(
								'type' => 'color',
								'label' => 'Subtitle Color',
								'default' => '#a7a7a7',
								'selector' => '.cl_service .box-content > .subtitle',
								'css_property' => 'color',
								'alpha' => true,
								'cl_required'    => array(
									array(
										'setting'  => 'subtitle_typography',
										'operator' => '==',
										'value'    => 'custom_font',
									),
								),
						),




					'typography_end' => array(
						'type' => 'group_end',
						'label' => 'Typography',
						'groupid' => 'typography',
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
							'selector' => '.cl_service'
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
							'selector' => '.cl_service',
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
							'selector' => '.cl_service',
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


				'design_tab_end' => array(
					'type' => 'tab_end',
					'label' => 'Design',
					'tabid' => 'design'
				),
			)
		));

 		

		/* Portfolio */



 		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Portfolio', 'june' ),
			'section'     => 'cl_codeless_page_builder',
			'tooltip' => 'Create Portfolio Element',
			//'priority'    => 10,
			'icon'		  => 'icon-arrows-squares',
			'transport'   => 'postMessage',
			'settings'    => 'cl_portfolio',
			'css_dependency' => array( CODELESS_BASE_URL.'css/codeless-portfolio.css', CODELESS_BASE_URL.'css/ilightbox/css/ilightbox.css', CODELESS_BASE_URL.'css/owl.carousel.min.css', CODELESS_BASE_URL.'css/codeless-image-filters.css'),
			'marginPositions' => array('top'),
			'is_container' => false,
			'fields' => array(

				'element_tabs' => array(
					'type' => 'show_tabs',
					'default' => 'general',
					'tabs' => array(
						'general' => array( 'General', 'cl-icon-settings' ),
						'overlay' => array( 'Overlay', 'cl-icon-tune' )
					)
				),
				
				'general_tab_start' => array(
					'type' => 'tab_start',
					'label' => 'General',
					'tabid' => 'general'
				),
				
					/* ----------------------------------------------- */
					
					'options_start' => array(
						'type' => 'group_start',
						'label' => 'Layout',
						'groupid' => 'layout'
					),

						


						'layout' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Layout', 'june' ),
							'default'     => 'grid',
							'choices' => array(
								'grid' => 'Grid',
								'masonry' => 'Masonry',
								'inline' => 'Inline'
							),
							'selector' => '#portfolio-entries',
							'selectClass' => 'portfolio-layout-',
							'reloadTemplate' => true,
							
						),

						'masonry_extra_layout' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Masonry Extra Layout', 'june' ),
							'tooltip' => esc_attr__( 'If you leave default, all portfolio layouts in masonry will get the masonry layout from post meta(you can find in each portfolio post).', 'june' ),
							'default'     => 'default',
							'choices' => array(
								'default' => 'Default',
								'all_long' => 'Only Long Layout',
								
							),
							'reloadTemplate' => true,
							'cl_required'    => array(
									array(
										'setting'  => 'layout',
										'operator' => '==',
										'value'    => 'masonry',
									),
								),
							
						),

						'style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'june' ),
							'default'     => 'only_media',
							'choices' => array(
								'classic' => 'Classic',
								'classic_excerpt' => 'Classic Excerpt',
								'media_title' => 'Media and Title',
								'only_media' => 'Only Media',
								'furniture' => 'Furniture Style',
								'presentation' => 'Demo Presentation Style'
							),
							'selector' => '#portfolio-entries',
							'selectClass' => 'portfolio-style-',
							'reloadTemplate' => true
							
						),

						'columns' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Columns', 'june' ),
							'default'     => '3',
							'choices'     => array(
							  '1'  => esc_attr__( '1 Column', 'june' ),
						      '2'  => esc_attr__( '2 Columns', 'june' ),
						      '3' => esc_attr__( '3 Columns', 'june' ),
						      '4' => esc_attr__( '4 Columns', 'june' ),
						      '5' => esc_attr__( '5 Columns', 'june' ),
						   ),
							'selector' => '#portfolio-entries', 
							'htmldata' => 'grid-cols',
							'customJS' => array('front' => 'init_cl_portfolio'),
							'reloadTemplate' => true
							
						),

						'distance' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Columns (Items) Gap', 'june' ),
							'default'     => '15',
							'choices'     => array(
								'min'  => '0',
								'max'  => '35',
								'step' => '1',
							),
							'suffix' => 'px',
							'selector' => '#portfolio-entries .portfolio_item',
							'css_property' => 'padding',
							'customJS' => array('front' => 'init_cl_portfolio')
						),

						'image_size' => array(
								'type'        => 'inline_select',
								'label'       => esc_html__( 'Image Size', 'june' ),
								'tooltip' => "You can change image sizes on Theme Panel -> <a target=\"_blank\" href=\"".admin_url('admin.php?page=codeless-panel-image-sizes')."\">Image Sizes Section</a>",
								'default'     => 'portfolio_entry',
								'priority'    => 10,
								'choices'     => codeless_get_additional_image_sizes(),
								'reloadTemplate' => true
							),

						'portfolio_justify' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Justify Gallery', 'june' ),
							'default'     => 0,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off'  => esc_attr__( 'Off', 'june' )
							),
							'reloadTemplate' => true,
							'addClass' => 'cl-justify-gallery',
							'selector' => '#portfolio-entries',
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => false,
								),
							),
							
						),

						'portfolio_justify_rowheight' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Justify Row Height', 'june' ),
							'default'     => '200',
							'choices'     => array(
								'min'  => '120',
								'max'  => '1100',
								'step' => '5',
							),
							'suffix' => '',
							'selector' => '#portfolio-entries',
							'htmldata' => 'rowheight',
							'customJS' => array('front' => 'init_cl_portfolio'),
							array(
									'setting'  => 'portfolio_justify',
									'operator' => '==',
									'value'    => true,
							),
						),

						'portfolio_justify_margins' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Justify Item Margins', 'june' ),
							'default'     => '15',
							'choices'     => array(
								'min'  => '0',
								'max'  => '100',
								'step' => '1',
							),
							'suffix' => 'px',
							'selector' => '#portfolio-entries',
							'htmldata' => 'margins',
							'customJS' => array('front' => 'init_cl_portfolio'),
							array(
									'setting'  => 'portfolio_justify',
									'operator' => '==',
									'value'    => true,
							),
						),


					'options_end' => array(
						'type' => 'group_end',
						'label' => 'Layout',
						'groupid' => 'layout'
					),


					'carousel_start' => array(
						'type' => 'group_start',
						'label' => 'Carousel',
						'groupid' => 'carousel'
					),
						'carousel' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel', 'june' ),
							'tooltip' => esc_attr__( 'Switch On if you want carousel', 'june' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '#portfolio-entries',
							'addClass' => 'owl-carousel cl-carousel owl-theme',
							'reloadTemplate' => true,
							'customJS' => array('front' => 'init_cl_portfolio')
						),	


						'carousel_nav' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Nav', 'june' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '#portfolio-entries',
							'htmldata' => 'carousel-nav',
							'reloadTemplate' => true,
							'customJS' => array('front' => 'init_cl_portfolio'),
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => true,
								),
							),
						),	



						'carousel_dots' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Dots', 'june' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '#portfolio-entries',
							'htmldata' => 'carousel-dots',
							'reloadTemplate' => true,
							'customJS' => array('front' => 'init_cl_portfolio'), 
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => true,
								),
							),
						),	

					'carousel_end' => array(
						'type' => 'group_end',
						'label' => 'Carousel',
						'groupid' => 'carousel'
					),

					'extra_style' => array(
						'type' => 'group_start',
						'label' => 'Extra Style',
						'groupid' => 'extra'
					),

						'portfolio_item_title_style' => array(
							'type'        => 'inline_select',
							'label'       => esc_html__( 'Title Style', 'june' ),
							'tooltip' => '',
							'default'     => 'h4',
							'priority'    => 10,
							'choices'     => array(
								'h1'  => esc_attr__( 'H1', 'june' ),
								'h2' => esc_attr__( 'H2', 'june' ),
								'h3' => esc_attr__( 'H3', 'june' ),
								'h4' => esc_attr__( 'H4', 'june' ),
								'h5' => esc_attr__( 'H5', 'june' ),
								'h6' => esc_attr__( 'H6', 'june' ),
							),
							'cl_required'    => array(
								array(
									'setting'  => 'style',
									'operator' => '!=',
									'value'    => 'only_media',
								),
							),
							'reloadTemplate' => true
						),


						'portfolio_item_title_font_family' => array(
			
									'type' => 'inline_select',
									'label' => 'Font Family',
									'default' => 'theme_default',
									'selector' => '#portfolio-entries h3, #portfolio-entries .subtitle',
									'css_property' => 'font-family',
									'choices'     => codeless_get_google_fonts(),
									'cl_required'    => array(
										array(
											'setting'  => 'style',
											'operator' => '==',
											'value'    => 'furniture',
										),
									),
									
						),

						'portfolio_pagination_style' => array( 
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Pagination', 'june' ),
							'default'     => 'numbers',
							'choices'     => array(
								'none'  => esc_attr__( 'None', 'june' ),
								'numbers'  => esc_attr__( 'Page Numbers', 'june' ),
								'next_prev'  => esc_attr__( 'Next/Prev', 'june' ),
								'load_more'  => esc_attr__( 'Load More', 'june' ),
								'infinite_scroll'  => esc_attr__( 'Infinite', 'june' ),
								
							),
							'reloadTemplate' => true,
							'customJS' => array('front' => 'init_cl_portfolio'),
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => false,
								),
							),

						),

						'portfolio_filters' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Filters', 'june' ),
							'default'     => 'disabled',
							'choices'     => array(
								'disabled'  => esc_attr__( 'Disabled', 'june' ),
								'small'  => esc_attr__( 'Small Square', 'june' ),
								'fullwidth'  => esc_attr__( 'Fullwidth', 'june' )
							),
							'reloadTemplate' => true,
							'customJS' => array('front' => 'init_cl_portfolio'),
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => false,
								),
							),
							
						),

						'portfolio_filters_align' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Filter Align', 'june' ),
							'default'     => 'center',
							'choices'     => array(
								'left'  => esc_attr__( 'Left', 'june' ),
								'center'  => esc_attr__( 'Center', 'june' ),
								'right'  => esc_attr__( 'Right', 'june' ),
							),
							'reloadTemplate' => true,
							'customJS' => array('front' => 'init_cl_portfolio'),
							'cl_required'    => array(
								array(
									'setting'  => 'portfolio_filters',
									'operator' => '!=',
									'value'    => 'disabled',
								),
							),
							
						),

						'portfolio_filters_color' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Filter Color Type', 'june' ),
							'default'     => 'dark',
							'choices'     => array(
								'dark'  => esc_attr__( 'Dark', 'june' ),
								'light'  => esc_attr__( 'Light', 'june' )
							),
							'reloadTemplate' => true,
							'customJS' => array('front' => 'init_cl_portfolio'),
							'cl_required'    => array(
								array(
									'setting'  => 'portfolio_filters',
									'operator' => '==',
									'value'    => 'fullwidth',
								),
							),
							
						),



						'filter_fullwidth_shadow' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Fullwidth Filter with Shadow', 'june' ),
							'default'     => 0,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off'  => esc_attr__( 'Off', 'june' )
							),
							'reloadTemplate' => true,
							'customJS' => array('front' => 'init_cl_portfolio'),
							'cl_required'    => array(
								array(
									'setting'  => 'portfolio_filters',
									'operator' => '==',
									'value'    => 'fullwidth',
								),
							),
							
						),

						'filter_fullwidth_sticky' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Fullwidth Filter Sticky', 'june' ),
							'default'     => 0,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off'  => esc_attr__( 'Off', 'june' )
							),
							'reloadTemplate' => true,
							'customJS' => array('front' => 'init_cl_portfolio'),
							'cl_required'    => array(
								array(
									'setting'  => 'portfolio_filters',
									'operator' => '==',
									'value'    => 'fullwidth',
								),
							),
							
						),



						'image_filter' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Images Filter', 'june' ),
							'tooltip' => esc_attr__( 'Applied on portfolio images', 'june' ),
							'default'     => 'normal',
							'choices' => array(
								'normal' => 'normal',
								'darken' => 'darken',
								'_1977' => '1977',
								'aden' => 'aden',
								'brannan' => 'brannan',
								'brooklyn' => 'brooklyn',
								'clarendon' => 'clarendon',
								'earlybird' => 'earlybird',
								'gingham' => 'gingham',
								'hudson' => 'hudson',
								'inkwell' => 'inkwell',
								'kelvin' => 'kelvin',
								'lark' => 'lark',
								'lofi' => 'lo-Fi',
								'maven' => 'maven',
								'mayfair' => 'mayfair',
								'moon' => 'moon',
								'nashville' => 'nashville',
								'perpetua' => 'perpetua',
								'reyes' => 'reyes',
								'rise' => 'rise',
								'slumber' => 'slumber',
								'stinson' => 'stinson',
								'toaster' => 'toaster',
								'valencia' => 'valencia',
								'walden' => 'walden',
								'willow' => 'willow',
								'xpro2' => 'x-pro II'
							),
							'reloadTemplate' => true
						),

						

						'boxed' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Boxed Style', 'june' ),
							'tooltip' => esc_attr__( 'Switch On if you want to add a boxed shadow. Works only on Classic and Classic with Excerpt', 'june' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '#portfolio-entries',
							'addClass' => 'portfolio_boxed',
						),	

						'portfolio_animation' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'    => esc_html__( 'Animation', 'june' ),
							'default'     => 'bottom-t-top',
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

							'reloadTemplate' => true,
						),




					'extra_style_end' => array(
						'type' => 'group_end',
						'label' => 'Extra Style',
						'groupid' => 'extra'
					),


					'query_start' => array(
						'type' => 'group_start',
						'label' => 'Query',
						'groupid' => 'query'
					),	

						'categories' => array(
							'type'     => 'select',
							'multiple' => 100,
							'priority' => 10,
							'label'       => esc_attr__( 'Categories', 'june' ),
							'default'     => '',
							'choices' => codeless_get_terms( 'portfolio_entries' ),
							'reloadTemplate' => true,
						),

						'posts_per_page' => array(
							'type' => 'text',
							'label'    => esc_html__( 'Items per page', 'june' ),
							'tooltip' => esc_html__( 'Maximal number of items that will show in one portfolio page', 'june' ),
							'default'  => 12,
							'reloadTemplate' => true
						),

						'orderby' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Order By', 'june' ),
							'default'     => 'date',

							'choices'     => array(
								'none' => esc_html__('No order', 'june'),
								'ID' => esc_html__('Post ID', 'june'),
								'author' => esc_html__('Author', 'june'),
								'title' => esc_html__('Title', 'june'),
								'name' => esc_html__('Name (slug)', 'june'),
								'date' => esc_html__('Date', 'june'),
								'modified' => esc_html__('Modified', 'june'),
							),

							'reloadTemplate' => true,
						),


						'order' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Order', 'june' ),
							'default'     => 'DESC',

							'choices'     => array(
								'DESC' => esc_html__('Descending', 'june'),
								'ASC' => esc_html__('Ascending', 'june'),				
							),
							'reloadTemplate' => true
						),

						'portfolio_custom_link_target' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Link Target', 'june' ),
							'default'     => '_self',

							'choices'     => array(
								'_self' => esc_html__('_self', 'june'),
								'_blank' => esc_html__('_blank', 'june'),				
							),
							'reloadTemplate' => true
						),



					'query_end' => array(
						'type' => 'group_end',
						'label' => 'Query',
						'groupid' => 'query'
					),

				'general_tab_end' => array(
						'type' => 'tab_end',
						'label' => 'General',
						'tabid' => 'general'
				),	

				'overlay_start' => array(
						'type' => 'tab_start',
						'label' => 'Overlay',
						'tabid' => 'overlay'
				),

					'overlay_layout' => array(
						'type' => 'group_start',
						'label' => 'Overlay Layout',
						'groupid' => 'overlay_layout'
					),
						'portfolio_overlay' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'june' ),
							
							'default'     => 'color',

							'choices'     => array(
								'none'  => esc_attr__( 'None', 'june' ),
								'color'  => esc_attr__( 'Color Overlay', 'june' ),
								'zoom_color'  => esc_attr__( 'Zoom and Color', 'june' ),
								'grayscale'  => esc_attr__( 'Grayscale Hover', 'june' ),
								'two_icons' => esc_attr__( 'Two Icons', 'june' )
							),
							'reloadTemplate' => true
						),

						

						'portfolio_overlay_layout' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Layout', 'june' ),
							'tooltip' => esc_attr__( 'Position of content into the overlay ( icons, title, tags )', 'june' ),
							'default'     => 'center',

							'choices'     => array(
								'center'  => esc_attr__( 'Center', 'june' ),
								'icon_top_content_bottom'  => esc_attr__( 'Icon Top / Content Bottom', 'june' ),
								'content_top'  => esc_attr__( 'Content Top / Icon Bottom', 'june' )
							),
							'selector' => '#portfolio-entries',
							'selectClass' => 'overlay-layout-'
						),

						'portfolio_overlay_title_bool' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Show Title', 'june' ),
							'tooltip' => '',
							'default'     => 1,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'reloadTemplate' => true
						),

						'portfolio_overlay_title_style' => array(
							'type'        => 'inline_select',
							'label'       => esc_html__( 'Title Style', 'june' ),
							'tooltip' => '',
							'default'     => 'h5',
							'priority'    => 10,
							'choices'     => array(
								'h1'  => esc_attr__( 'H1', 'june' ),
								'h2' => esc_attr__( 'H2', 'june' ),
								'h3' => esc_attr__( 'H3', 'june' ),
								'h4' => esc_attr__( 'H4', 'june' ),
								'h5' => esc_attr__( 'H5', 'june' ),
								'h6' => esc_attr__( 'H6', 'june' ),
							),
							'cl_required'    => array(
								array(
									'setting'  => 'portfolio_overlay_title_bool',
									'operator' => '==',
									'value'    => true,
								),
							),
							'reloadTemplate' => true
						),

						'portfolio_overlay_categories_bool' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Show Categories', 'june' ),
							'default'     => 1,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'reloadTemplate' => true
						),

						'portfolio_overlay_icon_bool' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Show Icon', 'june' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'reloadTemplate' => true
						),

						'portfolio_overlay_icon' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Icon', 'june' ),
							
							'default'     => 'plus2',

							'choices'     => array(
								'plus2'  => esc_attr__( 'Plus', 'june' ),
								'arrow-right'  => esc_attr__( 'Arrow Right', 'june' ),
								'expand2'  => esc_attr__( 'Expand', 'june' ),
								'lightbox' => esc_attr__( 'Lightbox', 'june' ),
								'lightbox_link' => esc_attr__( 'Lightbox & Link', 'june' ),
							),
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'portfolio_overlay_icon_bool',
									'operator' => '==',
									'value'    => true,
								),
							),
						),


						'portfolio_overlay_distance' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Distance', 'june' ),
							'tooltip' => esc_attr__( 'Distance between portfolio overlay and photo corners', 'june' ),
							'default'     => '0',
							'choices'     => array(
								'min'  => '0',
								'max'  => '100',
								'step' => '5',
							),
							'suffix' => 'px',
							'selector' => '#portfolio-entries .entry-overlay',
							'css_property' => 'padding'
						),

					'overlay_layout_end' => array(
						'type' => 'group_end',
						'label' => 'Overlay Layout',
						'groupid' => 'overlay_layout'
					),


					'overlay_design' => array(
						'type' => 'group_start',
						'label' => 'Overlay Design',
						'groupid' => 'overlay_design'
					),

						'portfolio_overlay_color' => array(

							'type' => 'color',
							'label' => 'BG Color',
							'default' => 'rgba(31, 180, 204, 0.86)',
							'selector' => '#portfolio-entries .portfolio_item .entry-overlay .overlay-wrapper',
							'css_property' => 'background-color',
							'alpha' => true
							
						),

						'overlay_gradient' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Overlay Bg Color', 'june' ),
							
							'default'     => 'none',
							'choices' => array(
								'none'	=> 'None',
								'azure_pop' =>	'Azure Pop',
								'love_couple' => 'Love Couple',
								'disco' => 'Disco',
								'limeade' => 'Limeade',
								'dania' => 'Dania',
								'shades_of_grey' =>	'Shades of Grey',
								'dusk' => 'dusk',
								'delhi' => 'delhi',
								'sun_horizon' => 'Sun Horizon',
								'blood_red' => 'Blood Red',
								'sherbert' => 'Sherbert',
								'firewatch' => 'Firewatch',
								'frost' => 'Frost',
								'mauve' => 'Mauve',
								'deep_sea' => 'Deep Sea',
								'solid_vault' => 'Solid Vault',
								'deep_space' =>	'Deep Space',
								'suzy' => 'Suzy'
								
								
							),
							'selector' => '#portfolio-entries .portfolio_item .entry-overlay .overlay-wrapper',
							'selectClass' => 'cl-gradient-',
						
						),

						'portfolio_overlay_content_color' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Content Color', 'june' ),
							'default'     => 'light-text',

							'choices'     => array(
								'light-text'  => esc_attr__( 'Light', 'june' ),
								'dark-text'  => esc_attr__( 'Dark', 'june' )
							),

							'reloadTemplate' => true,
							'selector' => '#portfolio-entries .entry-overlay',
							'selectClass' => ''
						),
						

						'portfolio_overlay_content_animation' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Content Animation', 'june' ),
							'default'     => 'alpha-anim',
							'choices' => array(
								'none'	=> 'None',
								'top-t-bottom' =>	'Top-Bottom',
								'bottom-t-top' =>	'Bottom-Top',
								'left-t-right' => 'Left-Right',
								'alpha-anim' => 'Fade-In',	
							
							),
							'selector' => '#portfolio-entries',
							'selectClass' => 'overlay-anim_'
						),

					'overlay_design_end' => array(
						'type' => 'group_end',
						'label' => 'Overlay Design',
						'groupid' => 'overlay_design'
					),

				'overlay_end' => array(
						'type' => 'tab_end',
						'label' => 'Overlay',
						'tabid' => 'overlay'
				),


				

			)
 		));
		
			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Portfolio Nav', 'june' ),
				'section'     => 'cl_codeless_page_builder',
				'tooltip' => '',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-webpage-multiple',
				'transport'   => 'postMessage',
				'settings'    => 'cl_portfolio_nav',
				'marginPositions' => array('top'),
				'is_container' => false,
				'show_only_on' => 'portfolio',
				'fields' => array(

					'style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'june' ),
							'default'     => 'simple',
							'choices' => array(
								'simple'	=> 'Simple',
								'modern' =>	'Modern & Images',
							),
							'reloadTemplate' => true,
					),

					'css_style' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.portfolio-navigation',
							'css_property' => '',
							'default' => array('margin-top' => '80px'),
					),
				)
			));
		


 		/* Codeless Slider */
 		cl_builder_map(array(
			'type'        => 'clelement',
			'label'       => esc_attr__( 'Codeless Slider', 'june' ),
			'section'     => 'cl_codeless_page_builder',
			'tooltip' => 'Codeless Slider',
			//'priority'    => 10,
			'icon'		  => 'icon-basic-webpage-multiple',
			'transport'   => 'postMessage',
			'settings'    => 'cl_slider',
			'is_root'	  => true,
			'marginPositions' => array('top'),
			'is_container' => true,
			'fields' => array(

				

				'slider_height' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Slider Height', 'june' ),
							'tooltip' => esc_attr__( 'This is used as slider height. All slides inherit this value', 'june' ),
							'default'     => '400',
							'choices'     => array(
								'min'  => '200',
								'max'  => '2000',
								'step' => '5',
							),
							'suffix' => 'px', 
							'selector' => '.cl_slider',
							'css_property' => 'height'
				),



				'centered_carousel' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Use as centered carousel', 'june' ),
							'tooltip' => '',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl_slider',
							'addClass' => 'cl_slider-centered_carousel',
							'customJS' => array('front' => 'codelessSlider')
				),

				'max_width_slide' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Max Width for slide', 'june' ),
							'tooltip' => esc_attr__( 'Set a max width for slide, useful to create a carousel style', 'june' ),
							'default'     => '',
							'choices'     => array(
								'min'  => '400',
								'max'  => '1800',
								'step' => '10',
							),
							'suffix' => 'px', 
							'selector' => '.cl_slider .swiper-slide',
							'css_property' => 'max-width',
							'cl_reuired'    => array(
								array(
									'setting'  => 'centered_carousel',
									'operator' => '==',
									'value'    => 1,
								),
							),
							'customJS' => array('front' => 'codelessSlider')
				),

				'fullheight_slider' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Full Height Slider', 'june' ),
							'tooltip' => 'Stretch Slider in a fullscreen style.',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl_slider',
							'addClass' => 'cl_slider-fullheight',
							'customJS' => array('front' => 'fullHeightSlider'),
				),

				

				'fullheight_responsive' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Force Fullheight on responsive', 'june' ),
							'tooltip' => 'Active to force fullheight slider on responsive devices',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl_slider',
							'addClass' => 'cl_slider-force-fullheight',
							'customJS' => array('front' => 'fullHeightSlider'),
				),

				'navigation' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Prev / Next Buttons', 'june' ),
							'tooltip' => 'Switch on/off navigation buttons',
							'default'     => 1,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl_slider',
							'htmldata' => 'navigation',
						),

				'navigation_style' => array(
							'type'        => 'inline_select',
							'label'       => esc_html__( 'Navigation Style', 'june' ),
							'tooltip' => 'Switch on/off navigation buttons',
							'default'     => 'lateral',
							'priority'    => 10,
							'choices'     => array(
								'lateral' => 'Lateral',
								'rounded_left_bottom' => 'Rounded Left Bottom'
							),
							'selector' => '.cl_slider',
							'htmldata' => 'navigation-style',
						),

				'pagination' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Pagination Buttons', 'june' ),
							'tooltip' => 'Switch on/off pagination buttons',
							'default'     => 1,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl_slider',
							'htmldata' => 'pagination',
						),

				'pagination_style' => array(
							'type'        => 'inline_select',
							'label'       => esc_html__( 'Pagination Style', 'june' ),
							'tooltip' => 'Switch on/off pagination buttons',
							'default'     => 'round',
							'priority'    => 10,
							'choices'     => array(
								'round' => 'Rounded',
								'lines' => 'Lines'
							),
							'selector' => '.cl_slider',
							'htmldata' => 'pagination-style',
						),
				'effect' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Effect', 'june' ),
							'tooltip' => esc_attr__( 'Need reload to function properly. Test it in website frontpage or make a reload here.', 'june' ),
							'default'     => 'fade',
							'choices' => array(
								'fade' => 'Fade',
								'slide' => 'Slide',
								'cube' => 'Cube',
								'coverflow' => 'Coverflow',
								'flip' => 'Flip',
								'interleave' => 'Interleave',
								'softscale' => 'SoftScale'
							),
							'selector' => '.cl_slider',
							'htmldata' => 'effect',
							'customJS' => array('front' => 'codelessSlider')
						),
				'direction' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Direction', 'june' ),
							'tooltip' => esc_attr__( 'Need reload to function properly. Test it in website frontpage or make a reload here.', 'june' ),
							'default'     => 'horizontal',
							'choices' => array(
								'horizontal' => 'Horizontal',
								'vertical' => 'Vertical',
								
							),
							'selector' => '.cl_slider',
							'htmldata' => 'direction'
						),
				'responsive_plain_slider' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Slider as Plain in responsive', 'june' ),
							'tooltip' => 'By switch this on slider will show as plain sections not as slider in responsive devices. Works only with Vetical Slider',
							'default'     => 1,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl_slider',
							'qcl_reuired'    => array(
								array(
									'setting'  => 'direction',
									'operator' => '==',
									'value'    => 'vertical',
								),
							),
							'addClass' => 'cl_slider-responsive-plain',
				),
				'speed' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Transition Speed', 'june' ),
							'tooltip' => esc_attr__( 'Need reload to function properly. Test it in website frontpage or make a reload here.', 'june' ),
							'default'     => '300',
							'selector' => '.cl_slider',
							'htmldata' => 'speed'
						),
				'autoplay' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Autoplay, delay between slides in ms', 'june' ),
							'tooltip' => esc_attr__( 'Leave 0 if you dont want an autoplay slider', 'june' ),
							'default'     => '6500',
							'selector' => '.cl_slider',
							'htmldata' => 'autoplay'
						),
				'loop' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Loop', 'june' ),
							'tooltip' => '',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl_slider',
							'htmldata' => 'loop',
						),

				'anchor_labels' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Show Anchor Labels', 'june' ),
							'tooltip' => '',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl_slider',
							'htmldata' => 'anchors',
						),
				'mousewheel' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Mousewheel', 'june' ),
							'tooltip' => 'Useful in vertical sliders',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl_slider',
							'htmldata' => 'mousewheel',
						),

				'css_style' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_slider',
							'css_property' => '',
							'default' => array('margin-top' => '0px' )
					),

				
			)
		));

			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Codeless Slide', 'june' ),
				'section'     => 'cl_codeless_page_builder',
				'tooltip' => 'Add new slide for codeless slider',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-elaboration-browser-star',
				'transport'   => 'postMessage',
				'settings'    => 'cl_slide',
				'hide_from_list' => true,
				'is_container' => true,
				'fields' => array(
					'animation_slide' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Animation', 'june' ),
							
							'default'     => 'none',
							'choices' => array(
								'none' => 'None',
								'cinemagraphs_first' => 'Cinemagraphs 1',
								'cinemagraphs_two' => 'Cinemagraphs 2'
								
							),
							'selector' => '.cl-slide',
							'selectClass' => 'cl-slide-animation animation--'
					),

					'add_scroll_svg' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Scroll SVG Bottom', 'june' ),
							'tooltip' => esc_html__( 'By activate this a new SVG Mouse Scroll indication will show on this slide.', 'june' ),
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							)
							
					),
				)
			));


			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Multiscroll Slider', 'june' ),
				'section'     => 'cl_codeless_page_builder',
				'tooltip' => 'Multiscroll Slider',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-elaboration-browser-star',
				'transport'   => 'postMessage',
				'settings'    => 'cl_multiscroll',
				'is_container' => false,
				'fields' => array(
					'slider' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Slider', 'june' ),
							'default'     => '',
							'choices' => codeless_get_terms( 'multiscroll_slider', false, 'term_id' ),
							'reloadTemplate' => true,
					),

					'text_font_family' => array(
			
						'type' => 'inline_select',
						'label' => 'Font Family',
						'default' => 'theme_default',
						'selector' => '.multiscroll',
						'css_property' => 'font-family',
						'choices' => codeless_get_google_fonts(),
								
					),

					'height' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Slider Height', 'june' ),
							'tooltip' => esc_attr__( 'This is used as slider height. All slides inherit this value', 'june' ),
							'default'     => '900',
							'choices'     => array(
								'min'  => '200',
								'max'  => '2000',
								'step' => '5',
							),
							'suffix' => 'px', 
							'selector' => '.multiscroll',
							'css_property' => 'height'
					),
				)
			));



			

			/* Testimonial */
			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Testimonial', 'june' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-message-multiple',
				'transport'   => 'postMessage',
				'settings'    => 'cl_testimonial',
				'is_container' => false,
				'css_dependency' => array( CODELESS_BASE_URL.'css/owl.carousel.min.css'),
				'marginPositions' => array('top'),
				'fields' => array(
					'main_start' => array(
						'type' => 'group_start',
						'label' => 'Main',
						'groupid' => 'main'
					),	
						'style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'june' ),
							'tooltip' => esc_attr__( 'In all styles with Photo use the featured Image Field to add an image.', 'june' ),
							'default' => 'simple',
							'choices' => array(
								'simple' => 'Simple',
								'simple_photo_circle' => 'Simple With Circle Photo',
								'boxed_small' => 'Boxed Small'
							),
							'selector' => '.testimonial-entries',
							'selectClass' => 'style-',
							'reloadTemplate' => true
						),

						'is_single' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Single Testimonial', 'june' ),
							'tooltip' => 'Switch On to show only one Testimonial.',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl_testimonial',
							'addClass' => 'is_single',
							'reloadTemplate' => true
						),

						'testimonial_id' => array(
							'type'     => 'select',
							'priority' => 10,
							'label'       => esc_attr__( 'Single Item', 'june' ),
							
							'default'     => '',
							'choices' => codeless_get_items_by_term( 'testimonial' ),
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'is_single',
									'operator' => '==',
									'value'    => 1,
								),
							)
						),

					'main_end' => array(
						'type' => 'group_end',
						'label' => 'Main',
						'groupid' => 'main'
					),	

					'carousel_start' => array(
						'type' => 'group_start',
						'label' => 'Carousel',
						'groupid' => 'carousel'
					),	
						'carousel_nav' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Nav', 'june' ),
							'tooltip' => esc_attr__( 'Switch On if you want carousel navigation', 'june' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '.testimonial-entries',
							'htmldata' => 'carousel-nav',
							'reloadTemplate' => true

						),	



						'carousel_dots' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Dots', 'june' ),
							'tooltip' => esc_attr__( 'Switch On if you want carousel dots ( pagination )', 'june' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '.testimonial-entries',
							'htmldata' => 'carousel-dots',
							'reloadTemplate' => true,

						),	

					'carousel_end' => array(
						'type' => 'group_end',
						'label' => 'Carousel',
						'groupid' => 'carousel'
					),

					'query_start' => array(
						'type' => 'group_start',
						'label' => 'Query',
						'groupid' => 'query'
					),	

						'categories' => array(
							'type'     => 'select',
							'multiple' => 100,
							'priority' => 10,
							'label'       => esc_attr__( 'Categories', 'june' ),
							
							'default'     => '',
							'choices' => codeless_get_terms( 'testimonial_entries' ),
							'reloadTemplate' => true,
						),

						'posts_per_page' => array(
							'type' => 'text',
							'label'    => esc_html__( 'Items per page', 'june' ),
							'tooltip' => esc_html__( 'Maximal number of items that will show', 'june' ),
							'default'  => 12,
							'reloadTemplate' => true
						),

						'orderby' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Order By', 'june' ),
							
							'default'     => 'date',
							'multiple' => false,
							'choices'     => array(
								'none' => esc_html__('No order', 'june'),
								'ID' => esc_html__('Post ID', 'june'),
								'author' => esc_html__('Author', 'june'),
								'title' => esc_html__('Title', 'june'),
								'name' => esc_html__('Name (slug)', 'june'),
								'date' => esc_html__('Date', 'june'),
								'modified' => esc_html__('Modified', 'june'),
							),

							'reloadTemplate' => true,
						),


						'order' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Order By', 'june' ),
							
							'default'     => 'DESC',
							'multiple' => false,
							'choices'     => array(
								'DESC' => esc_html__('Descending', 'june'),
								'ASC' => esc_html__('Ascending', 'june'),				
							),
							'reloadTemplate' => true
						),



					'query_end' => array(
						'type' => 'group_end',
						'label' => 'Query',
						'groupid' => 'query'
					),

					'css_style' => array(
						'type' => 'css_tool',
						'label' => 'Tool',
						'selector' => '.testimonial-entries',
						'css_property' => '',
						'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px')
					),

				)

			));

			/* Blog */
			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Blog', 'june' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-archive-full',
				'transport'   => 'postMessage',
				'settings'    => 'cl_blog',
				'is_container' => false,
				'marginPositions' => array('top'),
				'css_dependency' => array( CODELESS_BASE_URL.'css/ilightbox/css/ilightbox.css', CODELESS_BASE_URL.'css/owl.carousel.min.css', CODELESS_BASE_URL.'css/codeless-image-filters.css'),
				'fields' => array(
					'general_group_start' => array(
						'type' => 'group_start',
						'label' => 'General',
						'groupid' => 'general'
					),	

						'blog_style' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'    => esc_html__( 'Blog Style', 'june' ),
							'tooltip' => esc_html__( 'Select one of the blog styles that you want to use as a default template', 'june' ),
							'default'     => 'grid',
							'choices'     => array(
								'default'  => esc_attr__( 'Default', 'june' ),
								'grid'  => esc_attr__( 'Grid', 'june' ),
								'fullimage'  => esc_attr__( 'Full Image with White Overlay', 'june' ),
								'fullimage_transparent'  => esc_attr__( 'Full Image Transparent', 'june' ),
								'masonry' => esc_attr__( 'Masonry', 'june' ),
								'news' => esc_attr__( 'News', 'june' ),

								'media' => esc_attr__( 'Only Media', 'june' )
							),

							'reloadTemplate' => true,
						),

						'blog_all_centered' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'All Centered Style', 'june' ),
							'tooltip'       => esc_attr__( '', 'june' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '.cl_blog > .blog-entries',
							'addClass' => 'all-centered',
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'blog_style',
									'operator' => '==',
									'value'    => 'default',
								),
							),

						),

						'blog_grid_minimal' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Grid Minimal Style', 'june' ),
							'tooltip'       => esc_attr__( 'Remove Images and make more minimal style', 'june' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '.cl_blog > .blog-entries',
							'addClass' => 'grid-minimal-style',
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'blog_style',
									'operator' => '==',
									'value'    => 'grid',
								),
							),

						),


						'blog_news' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'    => esc_html__( 'News Grid Layout', 'june' ),
							'tooltip' => esc_html__( 'Select one of the blog news grid layouts.', 'june' ),
							'default'     => 'grid_1',
							'choices' => array(
								'grid_1' => 'Layout 1',
								'grid_2' => 'Layout 2',
								'grid_3' => 'Layout 3',
							),
							'selector' => '.cl_blog > .blog-entries',
							'selectClass' => 'news-layout-',
							'cl_required'    => array(
								array(
									'setting'  => 'blog_style',
									'operator' => '==',
									'value'    => 'news',
								),
							),
							'reloadTemplate' => true,
						),


						'blog_grid_layout' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'    => esc_html__( 'Grid Layout', 'june' ),
							'default'     => '3',
							'choices' => array(
								'2'	=> '2 Columns',
								'3'	=> '3 Columns',
								'4'	=> '4 Columns',
								'5'	=> '5 Columns',
							),
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => false,
								),
							),

							'reloadTemplate' => true,
						),

						'distance' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Columns (Items) Gap', 'june' ),
							'default'     => '15',
							'choices'     => array(
								'min'  => '0',
								'max'  => '35',
								'step' => '1',
							),
							'suffix' => 'px',
							'selector' => '.cl_blog > .blog-entries article',
							'css_property' => 'padding',
							'customJS' => array('front' => 'init_cl_portfolio')
						),

						'blog_pagination' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Blog Pagination', 'june' ),
							
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'reloadTemplate' => true

						),	


						'blog_animation' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'    => esc_html__( 'Animation Type', 'june' ),
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

							'reloadTemplate' => true,
						),

						'image_filter' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Images Filter', 'june' ),
							'tooltip' => esc_attr__( 'Applied on blog images', 'june' ),
							'default'     => 'normal',
							'choices' => array(
								'normal' => 'normal',
								'darken' => 'darken',
								'_1977' => '1977',
								'aden' => 'aden',
								'brannan' => 'brannan',
								'brooklyn' => 'brooklyn',
								'clarendon' => 'clarendon',
								'earlybird' => 'earlybird',
								'gingham' => 'gingham',
								'hudson' => 'hudson',
								'inkwell' => 'inkwell',
								'kelvin' => 'kelvin',
								'lark' => 'lark',
								'lofi' => 'lo-Fi',
								'maven' => 'maven',
								'mayfair' => 'mayfair',
								'moon' => 'moon',
								'nashville' => 'nashville',
								'perpetua' => 'perpetua',
								'reyes' => 'reyes',
								'rise' => 'rise',
								'slumber' => 'slumber',
								'stinson' => 'stinson',
								'toaster' => 'toaster',
								'valencia' => 'valencia',
								'walden' => 'walden',
								'willow' => 'willow',
								'xpro2' => 'x-pro II'
							),
							'reloadTemplate' => true
						),

						'blog_image_lazyload' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Lazyload Image', 'june' ),
							'tooltip' => esc_attr__( 'Image will be loaded only when it\'s on viewport', 'june' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),

							'reloadTemplate' => true,
						),

						'image_size' => array(
								'type'        => 'inline_select',
								'label'       => esc_html__( 'Image Size', 'june' ),
								'tooltip' => "You can change image sizes on Theme Panel -> <a target=\"_blank\" href=\"".admin_url('admin.php?page=codeless-panel-image-sizes')."\">Image Sizes Section</a>. When leaved default, for grid, alternate, news, media styles will be use the 'blog_entry_small' for other styles the 'blog_entry' ",
								'default'     => 'theme_default',
								'priority'    => 10,
								'choices'     => codeless_get_additional_image_sizes(),
								'reloadTemplate' => true
							),

						'blog_filters' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Blog Filters', 'june' ),
							
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'reloadTemplate' => true

						),

						'blog_title' => array(
							'type' => 'text',
							'label'    => esc_html__( 'Title of Blog Element', 'june' ),
							'tooltip' => esc_html__( '', 'june' ),
							'default'  => 'Blog Title',
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'blog_filters',
									'operator' => '==',
									'value'    => true,
								),
							),
						),

						'blog_button' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Remove Read More Button', 'june' ),
							'tooltip' => esc_attr__( '', 'june' ),
							'default'     => 1,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '.cl_blog > .blog-entries',
							'addClass' => 'remove-read-more',
							'reloadTemplate' => true,

						),


					'general_group_end' => array(
						'type' => 'group_end',
						'label' => 'General',
						'groupid' => 'general'
					),


					'carousel_start' => array(
						'type' => 'group_start',
						'label' => 'Carousel',
						'groupid' => 'carousel'
					),	

						'carousel' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel', 'june' ),
							'tooltip' => esc_attr__( 'Switch On if you want carousel', 'june' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '.cl_blog > .blog-entries',
							'addClass' => 'owl-carousel cl-carousel owl-theme',
							'reloadTemplate' => true,
						),	

						'carousel_nav' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Nav', 'june' ),
							'tooltip' => esc_attr__( 'Switch On if you want carousel navigation', 'june' ),
							'default'     => 1,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '.cl_blog > .blog-entries',
							'htmldata' => 'carousel-nav',
							'reloadTemplate' => true

						),	

						'carousel_dots' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Dots', 'june' ),
							'tooltip' => esc_attr__( 'Switch On if you want carousel dots ( pagination )', 'june' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '.cl_blog > .blog-entries',
							'htmldata' => 'carousel-dots',
							'reloadTemplate' => true,

						),	

						'carousel_layout' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'    => esc_html__( 'Carousel Layout', 'june' ),
							'default'     => '3',
							'choices' => array(
								'1'	=> '1 Column',
								'2'	=> '2 Columns',
								'3'	=> '3 Columns',
								'4'	=> '4 Columns',
								'5'	=> '5 Columns',
							),
							'selector' => '.cl_blog > .blog-entries',
							'htmldata' => 'carousel-layout',
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => true,
								),
							),

							'reloadTemplate' => true,
						),

						'carousel_effect' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'    => esc_html__( 'Carousel Effect', 'june' ),
							'default'     => '3',
							'choices' => array(
								'default'	=> 'Slide',
								'fade'	=> 'Fade',
							),
							'selector' => '.cl_blog > .blog-entries',
							'htmldata' => 'carousel-effect',
							'cl_required'    => array(
								array(
									'setting'  => 'carousel_layout',
									'operator' => '==',
									'value'    => "1",
								),
							),

							'reloadTemplate' => true,
						),

						'carousel_stagepadding' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Stage Padding', 'june' ),
							'tooltip' => esc_attr__( 'Add Stage padding to the right', 'june' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '.cl_blog > .blog-entries',
							'htmldata' => 'carousel-stagepadding',
							'reloadTemplate' => true,

						),	

					'carousel_end' => array(
						'type' => 'group_end',
						'label' => 'Carousel',
						'groupid' => 'carousel'
					),

					'query_start' => array(
						'type' => 'group_start',
						'label' => 'Query',
						'groupid' => 'query'
					),	

						'categories' => array(
							'type'     => 'select',
							'multiple' => 100,
							'priority' => 10,
							'label'       => esc_attr__( 'Categories', 'june' ),
							
							'default'     => '',
							'choices' => codeless_get_terms( 'post' ),
							'reloadTemplate' => true,
						),

						'posts_per_page' => array(
							'type' => 'text',
							'label'    => esc_html__( 'Items per page', 'june' ),
							'tooltip' => esc_html__( 'Maximal number of items that will show', 'june' ),
							'default'  => 6,
							'reloadTemplate' => true
						),

						'orderby' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Order By', 'june' ),
							
							'default'     => 'date',
							'multiple' => false,
							'choices'     => array(
								'none' => esc_html__('No order', 'june'),
								'ID' => esc_html__('Post ID', 'june'),
								'author' => esc_html__('Author', 'june'),
								'title' => esc_html__('Title', 'june'),
								'name' => esc_html__('Name (slug)', 'june'),
								'date' => esc_html__('Date', 'june'),
								'modified' => esc_html__('Modified', 'june'),
							),

							'reloadTemplate' => true,
						),


						'order' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Order By', 'june' ),
							
							'default'     => 'DESC',
							'multiple' => false,
							'choices'     => array(
								'DESC' => esc_html__('Descending', 'june'),
								'ASC' => esc_html__('Ascending', 'june'),				
							),
							'reloadTemplate' => true
						),

						'related' => array(
							'type' => 'text',
							'label'    => esc_html__( 'Related', 'june' ),
							'tooltip' => esc_html__( 'used for related posts on single blog', 'june' ),
							'default'  => 0,
							'show' => false
						),



					'query_end' => array(
						'type' => 'group_end',
						'label' => 'Query',
						'groupid' => 'query'
					),

					'css_style' => array(
						'type' => 'css_tool',
						'label' => 'Tool',
						'selector' => '.cl_blog',
						'css_property' => '',
						'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px')
					),

				)
			));

 			/* Team */
 			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Team', 'june' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-postcard-multiple',
				'transport'   => 'postMessage',
				'settings'    => 'cl_team',
				'is_container' => false,
				'css_dependency' => array( CODELESS_BASE_URL.'css/owl.carousel.min.css'),
				'marginPositions' => array('top'),
				'fields' => array(

					'general_start' => array(
						'type' => 'group_start',
						'label' => 'General',
						'groupid' => 'general'
					),	

						'is_single' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Single Team', 'june' ),
							'tooltip' => 'Switch On to show only one Team Member.',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl_team',
							'addClass' => 'is_single',
							'reloadTemplate' => true
						),

						'style' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'june' ),
							
							'default'     => 'simple',

							'choices'     => array(
								'simple' => esc_html__('Simple', 'june'),
								'photo' => esc_html__('Only Photo', 'june')
							),
							'selector' => '.cl_team',
							'selectClass' => 'style-',

							'reloadTemplate' => true,
							
						),

						'hide_content' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Hide Content', 'june' ),
							'tooltip' => 'Switch On to hide content',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl_team',
							'addClass' => 'hide_content',
							'cl_required'    => array(
								array(
									'setting'  => 'style',
									'operator' => '==',
									'value'    => 'photo',
								),
							)
						),

						'grid_layout' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'    => esc_html__( 'Layout', 'june' ),
							'default'     => '3',
							'choices' => array(
								'2'	=> '2 Columns',
								'3'	=> '3 Columns',
								'4'	=> '4 Columns',
								'5'	=> '5 Columns',
								'6'	=> '6 Columns',
							),
							'selector' => '.cl_team',
							'htmldata' => 'columns',
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'is_single',
									'operator' => '==',
									'value'    => 0,
								),
							)
						),

						'team_items_distance' => array(
								'type'     => 'slider',
								'priority' => 10,
								'label'       => esc_attr__( 'Distance between Team Members', 'june' ),
								
								'default'     => '15',
								'choices'     => array(
									'min'  => '0',
									'max'  => '100',
									'step' => '5',
								),
								'suffix' => 'px',
								'selector' => '.cl_team .team-item',
								'css_property' => 'padding'
							),

						'carousel' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel', 'june' ),
							'tooltip' => esc_attr__( 'Switch On if you want carousel', 'june' ),
							'default'     => 0,
							'choices' => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							
							),
							'selector' => '.cl_team',
							'addClass' => 'owl-carousel cl-carousel owl-theme',
							'reloadTemplate' => true,
							'customJS' => array('front' => 'teamCarousel')
						),	


						'carousel_nav' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Nav', 'june' ),
							'tooltip' => esc_attr__( 'Switch On if you want carousel navigation', 'june' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '.cl_team',
							'htmldata' => 'carousel-nav',
							'reloadTemplate' => true,
							'customJS' => array('front' => 'teamCarousel'),
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),	



						'carousel_dots' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Dots', 'june' ),
							'tooltip' => esc_attr__( 'Switch On if you want carousel dots ( pagination )', 'june' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '.cl_team',
							'htmldata' => 'carousel-dots',
							'reloadTemplate' => true,
							'customJS' => array('front' => 'teamCarousel'), 
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),	

						'carousel_center' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Center', 'june' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '.cl_team',
							'htmldata' => 'center',
							'reloadTemplate' => true,
							'customJS' => array('front' => 'teamCarousel'), 
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),	

						'carousel_loop' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Loop', 'june' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '.cl_team',
							'htmldata' => 'loop',
							'reloadTemplate' => true,
							'customJS' => array('front' => 'teamCarousel'), 
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),	


						'title_typography' => array(
							'type'        => 'inline_select',
							'label'       => esc_html__( 'Title Typography', 'june' ),
							'tooltip' => 'Select one of the predefined title typography styles on Styling Section',
							'default'     => 'h3',
							'priority'    => 10,
							'selector' => '.cl_team .team-name',
							'selectClass' => 'custom_font ',
							'choices'     => array(
								'h1'  => esc_attr__( 'H1', 'june' ),
								'h2' => esc_attr__( 'H2', 'june' ),
								'h3' => esc_attr__( 'H3', 'june' ),
								'h4' => esc_attr__( 'H4', 'june' ),
								'h5' => esc_attr__( 'H5', 'june' ),
								'h6' => esc_attr__( 'H6', 'june' ),
							),
						),


						'team_animation' => array(
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
							'reloadTemplate' => true
						),

						'image_size' => array(
								'type'        => 'inline_select',
								'label'       => esc_html__( 'Image Size', 'june' ),
								'tooltip' => "You can change image sizes on Theme Panel -> <a target=\"_blank\" href=\"".admin_url('admin.php?page=codeless-panel-image-sizes')."\">Image Sizes Section</a>",
								'default'     => 'team_entry',
								'priority'    => 10,
								'choices'     => codeless_get_additional_image_sizes(),
								'reloadTemplate' => true
							),


					'general_end' => array(
						'type' => 'group_end',
						'label' => 'General',
						'groupid' => 'general'
					),	


 					'query_start' => array(
						'type' => 'group_start',
						'label' => 'Query',
						'groupid' => 'query'
					),	

						'team_id' => array(
							'type'     => 'select',
							'priority' => 10,
							'label'       => esc_attr__( 'Items', 'june' ),
							
							'default'     => '',
							'choices' => codeless_get_items_by_term( 'staff' ),
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'is_single',
									'operator' => '==',
									'value'    => 1,
								),
							)
						),

						'categories' => array(
							'type'     => 'select',
							'multiple' => 100,
							'priority' => 10,
							'label'       => esc_attr__( 'Categories', 'june' ),
							
							'default'     => '',
							'choices' => codeless_get_terms( 'staff_entries' ),
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'is_single',
									'operator' => '==',
									'value'    => 0,
								),
							)
						),

						'posts_per_page' => array(
							'type' => 'text',
							'label'    => esc_html__( 'Items per page', 'june' ),
							'tooltip' => esc_html__( 'Maximal number of items that will show in one portfolio page', 'june' ),
							'default'  => 12,
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'is_single',
									'operator' => '==',
									'value'    => 0,
								),
							)
						),

						'orderby' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Order By', 'june' ),
							
							'default'     => 'date',

							'choices'     => array(
								'none' => esc_html__('No order', 'june'),
								'ID' => esc_html__('Post ID', 'june'),
								'author' => esc_html__('Author', 'june'),
								'title' => esc_html__('Title', 'june'),
								'name' => esc_html__('Name (slug)', 'june'),
								'date' => esc_html__('Date', 'june'),
								'modified' => esc_html__('Modified', 'june'),
							),

							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'is_single',
									'operator' => '==',
									'value'    => 0,
								),
							)
						),


						'order' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Order By', 'june' ),
							
							'default'     => 'DESC',

							'choices'     => array(
								'DESC' => esc_html__('Descending', 'june'),
								'ASC' => esc_html__('Ascending', 'june'),				
							),
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'is_single',
									'operator' => '==',
									'value'    => 0,
								),
							)
						),



					'query_end' => array(
						'type' => 'group_end',
						'label' => 'Query',
						'groupid' => 'query'
					),


					'css_style' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_team',
							'css_property' => '',
							'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px')
						),



				)
			));
			
 			/* Shop */
			if( class_exists('woocommerce') ){
			
				cl_builder_map(array(
					'type'        => 'clelement',
					'label'       => esc_attr__( 'Shop', 'june' ),
					'section'     => 'cl_codeless_page_builder',
					//'priority'    => 10,
					'icon'		  => 'icon-ecommerce-cart',
					'transport'   => 'postMessage',
					'settings'    => 'cl_woocommerce',
					'marginPositions' => array('top'),
					'css_dependency' => array( CODELESS_BASE_URL.'css/codeless-woocommerce.css', CODELESS_BASE_URL.'css/owl.carousel.min.css'),
					'is_container' => false,
					'fields' => array(

						'shortcode' => array(
								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Select Action', 'june' ),
								'tooltip' => esc_attr__( 'Select one of Woocommerce elements that you want to add', 'june' ),
								'default'     => 'recent_products',
								'choices' => array(
									'archive' => 'Archive with pagination',
									'recent_products' => 'Recent Products',
									'featured_products' => 'Featured Products',
									'product_category' => 'Product Category',
									'sale_products' => 'Sale Products',
									'best_selling_products' => 'Best Selling Products',
									'top_rated_products' => 'Top Rated Products',
								
								),
								'selector' => '.cl_woocommerce',
								'selectClass' => 'action-',
								'reloadTemplate' => true
							),

						'columns' => array(
								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Columns', 'june' ),
								'default'     => '3',
								'choices'     => array(
								  '1'  => esc_attr__( '1 Column', 'june' ),
							      '2'  => esc_attr__( '2 Columns', 'june' ),
							      '3' => esc_attr__( '3 Columns', 'june' ),
							      '4' => esc_attr__( '4 Columns', 'june' ),
							      '5' => esc_attr__( '5 Columns', 'june' ),
							      '6' => esc_attr__( '6 Columns', 'june' ),
							   ),
								'reloadTemplate' => true
								
							),

						'product_style' => array(
								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Style', 'june' ),
								'default'     => 'normal',
								'choices'     => array(
								  'normal'  => esc_attr__( 'Normal', 'june' ),
							      'small'  => esc_attr__( 'Small', 'june' ),
							      'large'  => esc_attr__( 'Large', 'june' ),
							      'masonry'  => esc_attr__( 'Masonry', 'june' ),
							      'list'  => esc_attr__( 'List', 'june' ),
							      'dark_controllers'  => esc_attr__( 'With Dark Controllers', 'june' )
							   ),
								'reloadTemplate' => true
								
							),

						'small_list' => array(
								'type'        => 'switch',
								'label'       => esc_html__( 'Small Style as List', 'june' ),
								'tooltip' => '',
								'default'     => 0,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'june' ),
									'off' => esc_attr__( 'Off', 'june' ),
								),
								'reloadTemplate' => true,
								'selector' => '.cl_woocommerce',
								'addClass' => 'small_list',
								'cl_required'    => array(
									array(
										'setting'  => 'product_style',
										'operator' => '==',
										'value'    => 'small',
									),
								),
						    ),

							'category' => array(
								'type'     => 'inline_select', 
								'priority' => 10,
								'label'       => esc_attr__( 'Category', 'june' ),
								'default'     => '',
								'choices' => codeless_get_terms( 'product_cat', true ),
								'reloadTemplate' => true,
							),

							'per_page' => array(
								'type' => 'text',
								'label'    => esc_html__( 'Items per page', 'june' ),
								'tooltip' => esc_html__( 'Maximal number of items that will show', 'june' ),
								'default'  => 12,
								'reloadTemplate' => true
							),

							'orderby' => array(

								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Order By', 'june' ),
								'default'     => 'date',

								'choices'     => array(
									'none' => esc_html__('No order', 'june'),
									'ID' => esc_html__('Post ID', 'june'),
									'author' => esc_html__('Author', 'june'),
									'title' => esc_html__('Title', 'june'),
									'name' => esc_html__('Name (slug)', 'june'),
									'date' => esc_html__('Date', 'june'),
									'modified' => esc_html__('Modified', 'june'),
								),

								'reloadTemplate' => true,
							),


							'order' => array(

								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Order', 'june' ),
								'default'     => 'DESC',

								'choices'     => array(
									'DESC' => esc_html__('Descending', 'june'),
									'ASC' => esc_html__('Ascending', 'june'),				
								),
								'reloadTemplate' => true
							),

							'carousel' => array(
								'type'        => 'switch',
								'label'       => esc_html__( 'Carousel', 'june' ),
								'tooltip' => '',
								'default'     => 0,
								'priority'    => 10,
								'choices'     => array(
									'on'  => esc_attr__( 'On', 'june' ),
									'off' => esc_attr__( 'Off', 'june' ),
								),
								'reloadTemplate' => true
						    ),

						    'carousel_nav' => array(
								'type'     => 'switch',
								'priority' => 10,
								'label'       => esc_attr__( 'Carousel Nav', 'june' ),
								'default'     => 0,
								'choices' => array(
									'on' => 'On',
									'off' => 'Off'
								
								),
								
								'reloadTemplate' => true,
								
								'cl_required'    => array(
									array(
										'setting'  => 'carousel',
										'operator' => '==',
										'value'    => true,
									),
								),
							),	



							'carousel_dots' => array(
								'type'     => 'switch',
								'priority' => 10,
								'label'       => esc_attr__( 'Carousel Dots', 'june' ),
								'default'     => 0,
								'choices' => array(
									'on' => 'On',
									'off' => 'Off'
								
								),
								
								'reloadTemplate' => true,
								
								'cl_required'    => array(
									array(
										'setting'  => 'carousel',
										'operator' => '==',
										'value'    => true,
									),
								),
							),

							'filters' => array(
								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Filters', 'june' ),
								'default'     => 'disabled',
								'choices'     => array(
									'disabled'  => esc_attr__( 'Disable', 'june' ),
									'enable'  => esc_attr__( 'Enable', 'june' )
								),
								'reloadTemplate' => true,
								
								'cl_required'    => array(
									array(
										'setting'  => 'carousel',
										'operator' => '==',
										'value'    => false,
									),
								),
								
							),	

							'distance' => array(
								'type'     => 'slider',
								'priority' => 10,
								'label'       => esc_attr__( 'Columns (Items) Gap', 'june' ),
								'default'     => '15',
								'choices'     => array(
									'min'  => '0',
									'max'  => '35',
									'step' => '1',
								),
								'suffix' => 'px',
								'selector' => '#shop-entries .product_item .inner-wrapper',
								'css_property' => 'padding',
								'customJS' => array('front' => 'init_cl_woocommerce')
							),

							'animation' => array(

								'type'     => 'inline_select',
								'priority' => 10,
								'label'    => esc_html__( 'Animation', 'june' ),
								'default'     => 'bottom-t-top',
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

								'reloadTemplate' => true,
							),

							'product_title' => array(
								'type'        => 'inline_select',
								'label'       => esc_html__( 'Product Title Style', 'june' ),
								'tooltip' => '',
								'default'     => 'h5',
								'priority'    => 10,
								'choices'     => array(
											'h1'  => esc_attr__( 'H1', 'june' ),
											'h2' => esc_attr__( 'H2', 'june' ),
											'h3' => esc_attr__( 'H3', 'june' ),
											'h4' => esc_attr__( 'H4', 'june' ),
											'h5' => esc_attr__( 'H5', 'june' ),
											'h6' => esc_attr__( 'H6', 'june' ),
								),
								'reloadTemplate' => true
							),

							'pagination_style' => array( 
								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Pagination', 'june' ),
								'default'     => 'numbers',
								'choices'     => array(
									'none'  => esc_attr__( 'None', 'june' ),
									'numbers'  => esc_attr__( 'Page Numbers', 'june' ),
									'next_prev'  => esc_attr__( 'Next/Prev', 'june' ),
									'load_more'  => esc_attr__( 'Load More', 'june' ),
									'infinite_scroll'  => esc_attr__( 'Infinite', 'june' ),
									
								),
								'reloadTemplate' => true,
								'cl_required'    => array(
									array(
										'setting'  => 'shortcode',
										'operator' => '==',
										'value'    => 'archive',
									),
									array(
										'setting'  => 'carousel',
										'operator' => '==',
										'value'    => false,
									),
								),

							),

							'css_style' => array(
								'type' => 'css_tool',
								'label' => 'Tool',
								'selector' => '.cl_woocommerce',
								'css_property' => '',
								'default' => array( 'margin-top' => '0px' ),
							),

					)
				));

				cl_builder_map(array(
					'type'        => 'clelement',
					'label'       => esc_attr__( 'Shop Tabbed', 'june' ),
					'section'     => 'cl_codeless_page_builder',
					//'priority'    => 10,
					'icon'		  => 'icon-ecommerce-cart',
					'transport'   => 'postMessage',
					'settings'    => 'cl_shop_tabbed',
					'css_dependency' => array( CODELESS_BASE_URL.'css/codeless-woocommerce.css', CODELESS_BASE_URL.'css/owl.carousel.min.css'),
					'is_container' => false,
					'fields' => array(

						'product_style' => array(
								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Product Style', 'june' ), 
								'default'     => 'normal',
								'choices'     => array(
								  'normal'  => esc_attr__( 'Default', 'june' ),
							      'large'  => esc_attr__( 'Large Info', 'june' ),
							      'small'  => esc_attr__( 'Small', 'june' ),
							      'dark_controllers'  => esc_attr__( 'With Dark Controllers', 'june' )
							   ),
								'reloadTemplate' => true
								
						),

						'per_page' => array(
								'type' => 'text',
								'label'    => esc_html__( 'Items for each tab', 'june' ),
								'tooltip' => esc_html__( 'Maximal number of items that will show for each tab', 'june' ),
								'default'  => 8,
								'reloadTemplate' => true
						),

						'columns' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Columns', 'june' ),
							
							'default'     => '4',
							'choices' => array(
								'1' =>	'1 items',
								'2' =>	'2 items',
								'3' =>	'3 items',
								'4' => '4 items',
								'5' => '5 items',
								'6' => '6 items',
								'7' => '7 items',
							),
							
							'reloadTemplate' => true
					),

						'carousel' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Carousel', 'june' ),
							'tooltip' => 'Show Tab items as carousel',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'reloadTemplate' => true
					),

					

						'sort' => array(
							'type'        => 'sortable',
							'label'       => esc_html__( 'Sort', 'june' ),
							'default'     => array(
								'featured',
								'top_sellers',
								'recent'
							),
							'choices'     => array(
								'featured' => esc_attr__( 'Featured', 'june' ),
								'top_sellers' => esc_attr__( 'Top Sellers', 'june' ),
								'recent' => esc_attr__( 'Recent', 'june' )
							),
							'reloadTemplate' => true
						),


					)
				));


				cl_builder_map(array(
					'type'        => 'clelement',
					'label'       => esc_attr__( 'Shop Trending', 'june' ),
					'section'     => 'cl_codeless_page_builder',
					//'priority'    => 10,
					'icon'		  => 'icon-ecommerce-cart',
					'transport'   => 'postMessage',
					'settings'    => 'cl_shop_trending',
					'css_dependency' => array( CODELESS_BASE_URL.'css/codeless-woocommerce.css', CODELESS_BASE_URL.'css/owl.carousel.min.css'),
					'is_container' => false,
					'fields' => array(

				
						'columns' => array(
								'type'     => 'inline_select',
								'priority' => 10,
								'label'       => esc_attr__( 'Columns', 'june' ),
								'default'     => '8',
								'choices'     => array(
								  '2'  => esc_attr__( '2 Column', 'june' ),
							      '3'  => esc_attr__( '3 Columns', 'june' ),
							      '4' => esc_attr__( '4 Columns', 'june' ),
							      '6' => esc_attr__( '6 Columns', 'june' ),
							      '8' => esc_attr__( '8 Columns', 'june' ),
							   ),
								'reloadTemplate' => true
								
							),

							'categories' => array(
								'type'     => 'select',
								'multiple' => 100,
								'priority' => 10,
								'label'       => esc_attr__( 'Categories', 'june' ),
								
								'default'     => '',
								'choices' => codeless_get_terms( 'product_cat', false, 'term_id' ),
								'reloadTemplate' => true,
								'replace_type_vc' => 'dropdown_multi'
							),


					)
				));

				
				
			}

 			/* Clients */
 			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Clients', 'june' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-cards-hearts',
				'transport'   => 'postMessage',
				'settings'    => 'cl_clients',
				'is_container' => false,
				'marginPositions' => array('top'),
				'fields' => array(

					'carousel' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Carousel', 'june' ),
							'tooltip' => '',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl_clients',
							'addClass' => 'cl-carousel owl-carousel owl-theme',
							'reloadTemplate' => true
					),

					'carousel_view_items' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Items', 'june' ),
							
							'default'     => '6',
							'choices' => array(
								'2' =>	'2 items',
								'3' =>	'3 items',
								'4' => '4 items',
								'5' => '5 items',
								'6' => '6 items',
								'7' => '7 items',
							),
							'selector' => '.cl_clients',
							'htmldata' => 'items',
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => 1,
								),
							),
							'reloadTemplate' => true,
					),

					'carousel_nav' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Nav', 'june' ),
							'tooltip' => esc_attr__( 'Switch On if you want carousel navigation', 'june' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '.cl_clients',
							'htmldata' => 'carousel-nav',
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => 1,
								),
							),

						),	



						'carousel_dots' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Carousel Dots', 'june' ),
							'tooltip' => esc_attr__( 'Switch On if you want carousel dots ( pagination )', 'june' ),
							'default'     => 1,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '.cl_clients',
							'htmldata' => 'carousel-dots',
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => 1,
								),
							),

						),

					'images' => array(
						'type'     => 'image_gallery',
						'priority' => 10,
						'selector' => '',
						'label'       => esc_attr__( 'Clients Images', 'june' ),
						
						'reloadTemplate' => true,
					),

					'items_per_row' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Items per Row', 'june' ),
							
							'default'     => 'all',
							'choices' => array(
								'all'	=> 'All',
								'2' =>	'2 items',
								'3' =>	'3 items',
								'4' => '4 items',
								'5' => '5 items',
								'6' => '6 items',
								'7' => '7 items',
							),
							'selector' => '.cl_clients',
							'selectClass' => 'items_',
							'cl_required'    => array(
								array(
									'setting'  => 'carousel',
									'operator' => '==',
									'value'    => 0,
								),
							),
					),

					'clients_style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'june' ),
							
							'default'     => 'none',
							'choices' => array(
								'none'	=> 'Only Image',
								'opacity_shadow' => 'Shadow on hover'
							),
							'selector' => '.cl_clients',
							'selectClass' => 'style_'
					),

					'overlay_color' => array(
							'type' => 'color',
							'label' => 'Overlay BG Color',
							'default' => 'rgba(255,255,255,0.85)',
							'selector' => '.cl_clients .client-item .overlay-bg',
							
							'css_property' => 'background-color',
							'alpha' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'clients_style',
									'operator' => '==',
									'value'    => 'overlay_title',
								),
							),
					),

					'autoplay_timeout' => array(
						'type'     => 'text',
						'priority' => 10,
						'selector' => '',
						'label'       => esc_attr__( 'Autoplay Timeout', 'june' ),
						
						'default'     => '5000',
						'htmldata' => 'autoplay-timeout',
						'selector' => '.cl_clients',
						'reloadTemplate' => true
					),

					'show_title' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Show Title in overlay', 'june' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'reloadTemplate' => true,
							'cl_required'    => array(
								array(
									'setting'  => 'clients_style',
									'operator' => '==',
									'value'    => 'overlay_title',
								),
							),

						),

					'css_style' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_clients',
							'css_property' => '',
							'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px')
					),
				)
			));

 			/* Empty Space */
 			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Empty Space', 'june' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-arrows-expand-vertical1',
				'transport'   => 'postMessage',
				'settings'    => 'cl_empty',
				'marginPositions' => array('top'),
				'is_container' => false,
				'fields' => array(
					'space' => array(
						'type'     => 'text',
						'priority' => 10,
						'selector' => '',
						'label'       => esc_attr__( 'Space in Pixels', 'june' ),
						
						'selector' => '.cl_empty',
						'css_property' => 'height',
						'default'     => '60px'
					),

					'responsive' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Custom Responsive', 'june' ),
							'tooltip' => 'Stretch Row in a fullscreen style.',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
					),

					'custom_767' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Space Max-Width:767px (Phones)', 'june' ),
							'tooltip' => esc_attr__( 'Is applied only for media screen (max-width:767px)', 'june' ),
							'default'     => '60',
							
							'suffix' => 'px',
							'selector' => '.cl_empty',
							'css_property' => 'height',
							'media_query' => '(max-width: 767px)',
							'cl_required'    => array(
								array(
									'setting'  => 'responsive',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),

					'custom_1024' => array(
							'type'     => 'text',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Space Max-Width:1024px ( Tablet )', 'june' ),
							'tooltip' => esc_attr__( 'Is applied only for media screen (max-width:1024px)', 'june' ),
							'default'     => '60',
							
							'suffix' => 'px',
							'selector' => '.cl_empty',
							'css_property' => 'height',
							'media_query' => '(max-width: 1024px)',
							'cl_required'    => array(
								array(
									'setting'  => 'responsive',
									'operator' => '==',
									'value'    => 1,
								),
							),
						),
				)
			));

			/* Counter */
			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Counter', 'june' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-clessidre',
				'transport'   => 'postMessage',
				'settings'    => 'cl_counter',
				'css_dependency' => array(CODELESS_BASE_URL.'css/odometer.css'),
				'is_container' => false,
				'marginPositions' => array('top'),
				'fields' => array(
					'number' => array(
						'type'     => 'text',
						'priority' => 10,
						'selector' => '',
						'label'       => esc_attr__( 'Number Counter', 'june' ),
						
						'default'     => '124',
						'reloadTemplate' => true,
						'customJS' => array('front' => 'animations')
					),

					'duration' => array(
						'type'     => 'text',
						'priority' => 10,
						'selector' => '',
						'label'       => esc_attr__( 'Animation Duration', 'june' ),
						
						'default'     => '2000',
						'reloadTemplate' => true,
						'customJS' => array('front' => 'animations')
					),

					'suffix' => array(
						'type'     => 'text',
						'priority' => 10,
						'selector' => '',
						'label'       => esc_attr__( 'Suffix', 'june' ),
						
						'default'     => '',
						'reloadTemplate' => true,
						'customJS' => array('front' => 'animations')
					),

					'align' => array(

							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Align', 'june' ),
							
							'default'     => 'center',
							'multiple' => false,
							'choices'     => array(
								'left' => esc_html__('Left', 'june'),
								'center' => esc_html__('Center', 'june'),	
								'right' => esc_html__('Right', 'june'),			
							),
							'selector' => '.cl_counter',
							'selectClass' => 'align-'
						),

					'custom_color' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Custom Color', 'june' ),
							'tooltip' => 'Custom Color',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
					),

					'color' => array(
							'type' => 'color',
							'label' => 'Color',
							'default' => '#222222',
							'selector' => '.cl_counter',
							'css_property' => 'color',
							'alpha' => true,
							'suffix' => '!important',
							'cl_required'    => array(
								array(
									'setting'  => 'custom_color',
									'operator' => '==',
									'value'    => true,
								),
							),
					),

					'css_style' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_counter',
							'css_property' => '',
							'default' => array('margin-top' => '0px')
					),
				)
			));

			/* Countdown */
			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Countdown', 'june' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-clessidre',
				'transport'   => 'postMessage',
				'settings'    => 'cl_countdown',
				'is_container' => false,
				'marginPositions' => array('top'),
				'fields' => array(
					'dt' => array(
						'type'     => 'text',
						'priority' => 10,
						'selector' => '.cl_countdown',
						'label'       => esc_attr__( 'Date Countdown', 'june' ),
						
						'default'     => '2021/01/01',
						'reloadTemplate' => true,
						'htmldata' => 'dt'

					),

					'style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'june' ),
							
							'default'     => 'none',
							'choices' => array(
								'none'	=> 'None',
								'large' =>	'Large'
							),
							'selector' => '.cl_countdown',
							'selectClass' => ''
						),

					'css_style' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_countdown',
							'css_property' => '',
							'default' => array('margin-top' => '0px')
					),
				)
			));

 			/* Progress Bar */
			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Progress Bar', 'june' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-battery-half',
				'transport'   => 'postMessage',
				'settings'    => 'cl_progress_bar',
				'is_container' => false,
				'marginPositions' => array('top'),
				'fields' => array(
					'title' => array(
						'type'     => 'inline_text',
						'priority' => 10,
						'selector' => '',
						'label'       => esc_attr__( 'Space in Pixels', 'june' ),
						
						'selector' => '.cl_progress_bar .title',
						'default' => 'Development'
					),

					'percentage' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Percentage', 'june' ),
							
							'default'     => '50',
							'choices'     => array(
								'min'  => '0',
								'max'  => '100',
								'step' => '1',
							),
							'suffix' => '', 
							'selector' => '.cl_progress_bar',
							'htmldata' => 'percentage',
							'customJS' => 'inlineEdit_progress_percentage'
					),

					'color' => array(
							'type' => 'color',
							'label' => 'Progress Bar Color',
							'default' => codeless_get_mod('primary_color'),
							'selector' => '.cl_progress_bar .bar',
							
							'css_property' => 'background-color',
							'alpha' => true
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
							'selector' => '.cl_progress_bar'
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
							'selector' => '.cl_progress_bar',
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
							'selector' => '.cl_progress_bar',
							'htmldata' => 'speed',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							)
						),

						'css_style' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_progress_bar',
							'css_property' => '',
							'default' => array('margin-top' => '15px')
						),
				)
			));

 			/* Google Map */
 			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Google Map', 'june' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-geolocalize-05',
				'transport'   => 'postMessage',
				'settings'    => 'cl_map',
				'marginPositions' => array('top'),
				'is_container' => false,
				'fields' => array(
					'api_key' => array(
						'type' => 'text',
						'label' => 'Api Key',
						'tooltip' => "Generate an API key <a target=\"_blank\" href=\"https://developers.google.com/maps/documentation/javascript/get-api-key\">here</a>, if you don't have one.",
						'selector' => '.cl_map',
						'customJS' => 'inlineEdit_loadGoogleApi',				

					),
					'lat_lon' => array(
						'type' => 'text',
						'label' => 'Latitude & Longitude',
						'tooltip' => "1. On your computer, visit Google Maps.<br />
2. Right-click a location on the map.<br />
3. Select What's here?.<br />
4. A card appears at the bottom of the screen with more info.<br />",
						'selector' => '.cl_map',
						'reloadTemplate' => true,

					),

					'height' => array(
	
							'type' => 'slider',
							'label' => 'Map Height',
							'default' => '400',
							'selector' => '.cl-map-element',
							'css_property' => 'height',
							'choices'     => array(
								'min'  => '40',
								'max'  => '1000',
								'step' => '5',
								'suffix' => 'px'
							),
							'suffix' => 'px'
						),

					'fullheight_map' => array(
							'type'        => 'switch',
							'label'       => esc_html__( 'Full Height Map', 'june' ),
							'tooltip' => 'Stretch Map height 100%',
							'default'     => 0,
							'priority'    => 10,
							'choices'     => array(
								'on'  => esc_attr__( 'On', 'june' ),
								'off' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl_map',
							'addClass' => 'cl-map-fullheight',
							'customJS' => 'inlineEdit_mapFullHeight'
					),

					'zoom' => array(
								'type'     => 'slider',
								'priority' => 10,
								'label'       => esc_attr__( 'Map Zoom', 'june' ),
								
								'default'     => '14',
								'choices'     => array(
									'min'  => '0',
									'max'  => '19',
									'step' => '1',
								),
								'suffix' => '',
								'selector' => '.cl_map',
								'htmldata' => 'zoom',
								'customJS' => array('front' => 'codelessGMap')
							),

					'style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'june' ),
							'tooltip' => esc_attr__( 'Map Style, leave normal for the default style.', 'june' ),
							'default'     => 'normal',
							'choices' => array(
								'normal' => 'Normal',
								'ultra_light_labels' => 'Ultra Light Labels',
								'shades_grey' => 'Shades Of Grey',
								'subtle_grayscale' => 'Subtle Grayscale',
								'blue_water' => 'Blue Water',
								'apple_style' => 'Apple Maps Style'
							),
							'selector' => '.cl_map',
							'htmldata' => 'style',
							'customJS' => array('front' => 'codelessGMap')
							
							
							
						),


					'css_style' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_map',
							'css_property' => '',
							'default' => array('margin-top' => '15px')
						),
				)
			));


 			/* Contact Form 7 */
			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Contact Form 7', 'june' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-mail',
				'transport'   => 'postMessage',
				'settings'    => 'cl_contact_form7',
				'marginPositions' => array('top'),
				'is_container' => false,
				'fields' => array(
					
					'id' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Select Form', 'june' ),
							'tooltip' => 'Select one of the created contact forms. Or create a new form <a href="'.admin_url('admin.php?page=wpcf7-new').'" target="_blank">here</a>',
							'default'     => 'none',
							'choices' => codeless_get_items_by_term('wpcf7_contact_form'),
							'reloadTemplate' => true
					),


					'style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'june' ),
							'tooltip' => 'Select one of the predefined styles or leave "none" and add your custom style in css.',
							'default'     => 'simple',
							'choices' => array(
								'none' => 'None',
								'simple' => 'Simple Vertical',
								'dark' => 'Simple Dark',
								'grey' => 'Grey'							
							),
							'selector' => '.cl_contact_form7',
							'selectClass' => 'style-'
					),



					

					'css_style' => array( 
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_contact_form7',
							'css_property' => '',
							'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px')
						),
				)
			));


			
			/* Toggles */

 			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Toggles', 'june' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-software-paragraph-space-before',
				'transport'   => 'postMessage',
				'settings'    => 'cl_toggles',
				'marginPositions' => array('top'),
				'is_container' => true,
				'fields' => array(

					'style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'june' ),
							'tooltip' => 'Select one of the predefined styles or leave "none" and add your custom style in css.',
							'default'     => 'simple',
							'choices' => array(
								'none' => 'None',
								'simple' => 'Simple',
								'square_plus' => 'Square Plus'
							),
							'selector' => '.cl_toggles',
							'selectClass' => 'style-'
					),

					'accordion' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Accordion', 'june' ),
							'tooltip' => esc_attr__( 'Make this togggles element function as a accordion', 'june' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '.cl_toggles',
							'htmldata' => 'accordion',
							'customJS' => array('front' => 'codelessToggles')
						),

					'css_style' => array( 
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_toggles',
							'css_property' => '',
							'default' => array('margin-top' => '15px')
						),
				)
			));


			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Toggle', 'june' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-software-paragraph-space-before',
				'transport'   => 'postMessage',
				'settings'    => 'cl_toggle',
				'hide_from_list' => true,
				'marginPositions' => array('top'),
				'is_container' => true,
				'fields' => array(

					'is_active' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Active by default', 'june' ),
							'tooltip' => esc_attr__( 'Make active this toggle by default by switch this option ON', 'june' ),
							'default'     => 0,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '.cl_toggle .title',
							'addClass' => 'open'
						),

					'title' => array(
						'type'     => 'inline_text',
						'priority' => 10,
						'only_text' => true,
						'selector' => '.cl_toggle > .title > a',
						'label'       => esc_attr__( 'Text', 'june' ),
						'tooltip' => esc_attr__( 'This will be the label for your link', 'june' ),
						'default'     => 'Toggle Title',
					),
				)
			));



			/* Tabs */

 			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Tabs', 'june' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-software-paragraph-space-before',
				'transport'   => 'postMessage',
				'settings'    => 'cl_tabs',
				'marginPositions' => array('top'),
				'is_container' => true,
				'fields' => array(

					'style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'june' ),
							'tooltip' => 'Select one of the predefined styles or leave "none" and add your custom style in css.',
							'default'     => 'simple',
							'choices' => array(
								'none' => 'None',
								'simple' => 'Simple',
								'large' => 'Large'
							),
							'selector' => '.cl_tabs',
							'selectClass' => 'style-'
					),

		
					'css_style' => array( 
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_tabs',
							'css_property' => '',
							'default' => array('margin-top' => '15px')
						),
				)
			));

 			
			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Tab', 'june' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-software-paragraph-space-before',
				'transport'   => 'postMessage',
				'settings'    => 'cl_tab',
				'hide_from_list' => true,
				'marginPositions' => array('top'),
				'is_container' => true,
				'fields' => array(

					'title' => array(
						'type'     => 'inline_text',
						'priority' => 10,
						'selector' => '.tab-pane',
						'for_tab_title' => true,
						'label'       => esc_attr__( 'Tab Title', 'june' ),
						'default'     => '',
						'only_text'  => true
					),

					'tab_id' => array(
						'type'     => 'text',
						'priority' => 10,
						'label'       => esc_attr__( 'Tab ID', 'june' ),
						'tooltip' => esc_attr__( 'Use an unique ID', 'june' ),
						'default'     => 'tab',
					),

					
				)
			));



			/* List */
			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'List', 'june' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-todo-txt',
				'transport'   => 'postMessage',
				'settings'    => 'cl_list',
				'marginPositions' => array('top'),
				'is_container' => true,
				'fields' => array(

					'type' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Type', 'june' ),
							'tooltip' => 'Select type of list',
							'default'     => 'ul',
							'choices' => array(
								'ul' => 'Unordered List',
								'ol' => 'Ordered List',
								'table' => 'As table'
							),
							'customJS' => 'inlineEdit_listType'
					),

					'style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'june' ),
							'tooltip' => 'Select one of the predefined styles or leave "none" and add your custom style in css.',
							'default'     => 'simple',
							'choices' => array(
								'none' => 'None',
								'simple' => 'Simple',
								'circle' => 'Circle'

							),
							'selector' => '.cl_list',
							'selectClass' => 'style-',
							'cl_required'    => array(
								array(
									'setting'  => 'type',
									'operator' => '!=',
									'value'    => 'table',
								),
							)
					),

					'icon_size' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Icon Size', 'june' ),
							
							'default'     => '14',
							
							'selector' => '.cl_list_item > i',
							'css_property' => 'font-size',
							'choices'     => array(
									'min'  => '10',
									'max'  => '72',
									'step' => '1',
									'suffix' => 'px'
								),
							'suffix' => 'px',
							'cl_required'    => array(
								array(
									'setting'  => 'style',
									'operator' => '==',
									'value'    => 'simple',
								),
								array(
									'setting'  => 'type',
									'operator' => '!=',
									'value'    => 'table',
								),
							)
						),
					

					'distance' => array(
							'type'     => 'slider',
							'priority' => 10,
							'label'       => esc_attr__( 'Distance between items', 'june' ),
							'tooltip' => esc_attr__( 'Distance between list items in pixel', 'june' ),
							'default'     => '0',
							'choices'     => array(
								'min'  => '0',
								'max'  => '20',
								'step' => '1',
							),
							'suffix' => 'px',
							'selector' => '.cl_list .cl_list_item',
							'css_property' => array('padding-top','padding-bottom'),
							'cl_required'    => array(
								array(
									'setting'  => 'type',
									'operator' => '!=',
									'value'    => 'table',
								),
							)
						),



					'css_style' => array( 
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_list',
							'css_property' => '',
							'default' => array('margin-top' => '15px')
						),
				)
			));


			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'List Item', 'june' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-todo-txt',
				'transport'   => 'postMessage',
				'settings'    => 'cl_list_item',
				'hide_from_list' => true,
				'is_container' => false,
				'fields' => array(

					'custom_icon' => array(
							'type'     => 'switch',
							'priority' => 10,
							'label'       => esc_attr__( 'Custom Icon', 'june' ),
							'tooltip' => esc_attr__( 'Switch to add a custom icon to list items', 'june' ),
							'default'     => 1,
							'choices' => array(
								'on' => 'On',
								'off' => 'Off'
							
							),
							'selector' => '.cl_list_item',
							'addClass' => 'with_icon',
							'reloadTemplate' => true
						),

					'icon' => array(
							'type'     => 'select_icon',
							'priority' => 10,
							'label'       => esc_attr__( 'Select Icon', 'june' ),
							'default'     => 'cl-icon-apps',
							'selector' => '.cl_list_item > i',
							'selectClass' => ' ',
							
					),

					'content' => array(
						'type'     => 'inline_text',
						'priority' => 10,
						'only_text' => true,
						'selector' => '.cl_list_item > .text',
						'label'       => esc_attr__( 'Text', 'june' ),
						'tooltip' => esc_attr__( 'This will be the label for your link', 'june' ),
						'default'     => 'Sample. Click to modify',
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
							'selector' => '.cl_list_item',
							'customJS' => array('front' => 'animations')
						),
						
						'animation_delay' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Delay between items', 'june' ),
							
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
							'selector' => '.cl_list_item',
							'htmldata' => 'delay',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),

							'customJS' => array('front' => 'animations')
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
							'selector' => '.cl_list_item',
							'htmldata' => 'speed',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
							'customJS' => array('front' => 'animations')
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
				'label'       => esc_attr__( 'Table Row', 'june' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-todo-txt',
				'transport'   => 'postMessage',
				'settings'    => 'cl_table_row',
				'hide_from_list' => true,
				'is_container' => false,
				'fields' => array(

					'content' => array(
						'type'     => 'inline_text',
						'priority' => 10,
						'only_text' => false,
						'selector' => '.cl_table_row > .text',
						'label'       => esc_attr__( 'Text', 'june' ),
						'tooltip' => esc_attr__( 'Content', 'june' ),
						'default'     => 'Sample. Click to modify',
					),

					'title' => array(
						'type'     => 'inline_text',
						'priority' => 10,
						'only_text' => true,
						'selector' => '.cl_table_row > .title',
						'label'       => esc_attr__( 'Title', 'june' ),
						'tooltip' => esc_attr__( 'Title of table row, table row heading', 'june' ),
						'default'     => 'Title',
					),
				)
			));


			/* Icon */
			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Icon', 'june' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-clubs',
				'transport'   => 'postMessage',
				'settings'    => 'cl_icon',
				'is_container' => false,
				'marginPositions' => array('top'),
				'fields' => array(
					
					'icon' => array(
							'type'     => 'select_icon',
							'priority' => 10,
							'label'       => esc_attr__( 'Select Icon', 'june' ),
							'default'     => 'cl-icon-apps',
							'selector' => '.cl_icon i',
							'selectClass' => ' '
								
					),

					'icon_link' => array(

							'type' => 'text',
							'priority' => 10,
							'label' => esc_attr__('Set the hyperlink', 'june'),
							'default' => '#',
							'selector' => '.cl_icon'

					),

					'icon_target' => array(

							'type' => 'inline_select',
							'priority'=> 10,
							'label' => esc_attr__('Set link loading mode', 'june'),
							'default' => '_blank',
							'selector' => '.cl_icon',
							'choices' =>array(

								'_blank' => 'New window',
								'_self' => 'Same Window',
								'_parent' => 'Parent Window',
								'_top' => 'Top Window',


						),

					),

					'size' => array(
							'type'     => 'slider',
							'label' => 'Font size',
							'default' => '15',
							'selector' => '.cl_icon i',
							'css_property' => 'font-size',
							'choices'     => array(
										'min'  => '0',
										'max'  => '100',
										'step' => '1',
										'suffix' => 'px'
									),
						    'suffix' => 'px',

							'label'       => esc_attr__( 'Icon Font Size', 'june' )
							
						
					),

					

					'color' => array(

							'type' => 'color',
							'label' => 'Set Color',
							'default' => '#222',
							'selector' => '.cl_icon i',
							'css_property' => 'color',
							'alpha' => true
								
					),

					'hover_color' => array(

							'type' => 'color',
							'label' => 'Set Hover Color',
							'default' => '#222',
							'selector' => '.cl_icon > a',
							'alpha' => false
								
					),


					'align' => array(

							'type' => 'inline_select',
							'label' => 'Icon Alignment',
							'default' => 'left',
							'selector' => '.cl_icon',
							'css_property' => 'text-align',
							'choices' => array(

								'left' => 'Left',
								'right' => 'Right',
								'center' => 'Center'
								
							)

						),


					'line_height' => array(

							'type'     => 'slider',
							'label' => 'Line Height',
							'default' => '10',
							'selector' => '.cl_icon i',
							'css_property' => 'line-height',
							'choices'     => array(
										'min'  => '0',
										'max'  => '100',
										'step' => '1',
										'suffix' => 'px'
									),
						    'suffix' => 'px',

							'label'       => esc_attr__( 'Set Line Height', 'june' )
							
						
					),


					

					'css_style' => array(

							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_icon',
							'css_property' => '',
							'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px')

						),
						
						
		
					),
		
				
			));



		/* Share Icons */
		
		cl_builder_map(array(

			'type'        => 'clelement',
			'label'       => esc_attr__( 'Share Icons', 'june' ),
			'section'     => 'cl_codeless_page_builder',
			//'priority'    => 10,
			'icon'		  => 'icon-basic-share',
			'transport'   => 'postMessage',
			'settings'    => 'cl_share',
			'is_container' => false,
			'marginPositions' => array('top'),
			'fields' => array(
		
				'add_facebook' => array(

							'type'        => 'switch',
							'label'       => esc_html__( 'Add Facebook Share Icon', 'june' ),
							'default'     => '1',
							'priority'    => 10,
							'choices'     => array(
								'1'  => esc_attr__( 'On', 'june' ),
								'0' => esc_attr__( 'Off', 'june' ),
							),
							
							'reloadTemplate' => true,
							'selector' => '.cl_share i'


					),



				


				'add_twitter' => array(

						'type'        => 'switch',
						'label'       => esc_html__( 'Add Twitter Share Icon', 'june' ),
						'default'     => '1',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'june' ),
							'0' => esc_attr__( 'Off', 'june' ),
							),
						'selector' => '.cl_share i',
						'reloadTemplate' => true



					),


				

				'add_linkedin' => array(

						'type'        => 'switch',
						'label'       => esc_html__( 'Add Linkedin Share Icon', 'june' ),
						'default'     => '1',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'june' ),
							'0' => esc_attr__( 'Off', 'june' ),
							),
						'selector' => '.cl_share i',
						'reloadTemplate' => true



					),

				



				'add_pinterest' => array(

						'type'        => 'switch',
						'label'       => esc_html__( 'Add Pinterest Share Icon', 'june' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'june' ),
							'0' => esc_attr__( 'Off', 'june' ),
							),
						'selector' => '.cl_share i',
						'reloadTemplate' => true



					),

				

			

			   'add_google_plus'=> array(

			   			'type'        => 'switch',
						'label'       => esc_html__( 'Add Google Plus Share Icon', 'june' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'june' ),
							'0' => esc_attr__( 'Off', 'june' ),
							),
						'selector' => '.cl_share i',
						'reloadTemplate' => true




			   	),


			   'add_whatsapp' => array(

						'type'        => 'switch',
						'label'       => esc_html__( 'Add Whatsapp Share Icon', 'june' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'june' ),
							'0' => esc_attr__( 'Off', 'june' ),
							),
						'selector' => '.cl_share i',
						'reloadTemplate' => true



					),



			   'target' => array(

						'type' => 'inline_select',
						'priority'=> 10,
						'label' => esc_attr__('Set link loading mode', 'june'),
						'default' => '_blank',
						'selector' => '.cl_share',
						'choices' =>array(

							'_blank' => 'New window',
							'_self' => 'Same Window',
							'_parent' => 'Parent Window',
							'_top' => 'Top Window',


					),

				),

		

				'size' => array(
						'type'     => 'slider',
						'label' => 'Font size',
						'default' => '15',
						'selector' => '.cl_share i',
						'css_property' => 'font-size',
						'choices'     => array(
									'min'  => '0',
									'max'  => '100',
									'step' => '1',
									'suffix' => 'px'
								),
					    'suffix' => 'px',

						'label'       => esc_attr__( 'Icon Font Size', 'june' )
						
					
				),

				

				'color' => array(

						'type' => 'color',
						'label' => 'Set Color',
						'default' => '#222',
						'selector' => '.cl_share > a',
						'css_property' => 'color',
						'alpha' => true
							
				),

				'hover_color' => array(

						'type' => 'color',
						'label' => 'Set Hover Color',
						'default' => '#222',
						'selector' => '.cl_share > a',
						'alpha' => false
							
				),


				'border' => array(

						'type' => 'inline_select',
						'label' => esc_attr__( 'Set the border style', 'june' ),
						'default' => 'none',
						'selector' => '.cl_share',
						'choices' => array(

								'round' => 'Rounded Style',
								'square' => 'Square Style',
								'none' => 'None'

							),
						'selectClass' => ''
						

					),

				'bcolor' => array(

						'type' => 'color',
						'label' => 'Border Color',
						'default' => '#222',
						'selector' => '.cl_share',
						'css_property' => 'border-color',
						'alpha' => true,
						'cl_required'    => array(
							array(
								'setting'  => 'border',
								'operator' => '!=',
								'value'    => 'none',
								),
							),


				),	

				'bgcolor' => array(

						'type' => 'color',
						'label' => 'Background Color',
						'default' => 'transparent',
						'selector' => '.cl_share',
						'css_property' => 'background-color',
						'alpha' => true,
						'cl_required'    => array(
							array(
								'setting'  => 'border',
								'operator' => '!=',
								'value'    => 'none',
								),
							),
							
				),

				'padding' => array(
						'type'     => 'slider',
						'label' => 'Icon Size',
						'default' => '38',
						'selector' => '.cl_share',
						'css_property' => array('width', 'height'),
						'choices'     => array(
									'min'  => '0',
									'max'  => '100',
									'step' => '1',
									'suffix' => 'px'
								),
					    'suffix' => 'px',

						'label'       => esc_attr__( 'Wrapper Size', 'june' ),
						'cl_required'    => array(
							array(
								'setting'  => 'border',
								'operator' => '!=',
								'value'    => 'none',
								),
							),

						
					
				),	

				'display' => array(

						'type' => 'inline_select',
						'label' => 'Icon Display Mode',
						'default' => 'inline-block',
						'selector' => '.cl_share',
						'css_property' => 'display',
						'choices' => array(

							'inline-block' => 'Inline',
							'block' => 'Block'
							
							
						),


				),


				'margin'=> array(

						'type' => 'slider',
						'label' => 'Set the margin between icons',
						'default' => '5',
						'selector' => '.cl_share',
						'css_property' => array('margin-left', 'margin-right'),
						'choices'     => array(
									'min'  => '0',
									'max'  => '100',
									'step' => '1',
									'suffix' => 'px'
								),
					    'suffix' => 'px',
						'label'       => esc_attr__( 'Set Space Between Icons', 'june' ),
						'cl_required'    => array(
								array(
									'setting'  => 'display',
									'operator' => '==',
									'value'    => 'inline-block',
								),
							),



				),


				'margintop'=> array(

						'type' => 'slider',
						'label' => 'Set the margin between icons',
						'default' => '5',
						'selector' => '.cl_share',
						'css_property' => array('margin-top', 'margin-bottom'),
						'choices'     => array(
									'min'  => '0',
									'max'  => '100',
									'step' => '1',
									'suffix' => 'px'
								),
					    'suffix' => 'px',
						'label'       => esc_attr__( 'Set Space Between Icons', 'june' ),
						'cl_required'    => array(
								array(
									'setting'  => 'display',
									'operator' => '==',
									'value'    => 'block',
								),
							)



				),


				'align' => array(

						'type' => 'inline_select',
						'label' => 'Icon Alignment',
						'default' => 'left',
						'selector' => '.cl_sharediv',
						'css_property' => 'text-align',
						'choices' => array(

							'left' => 'Left',
							'right' => 'Right',
							'center' => 'Center'
							
						),

						'cl_required'    => array(
								array(
									'setting'  => 'display',
									'operator' => '==',
									'value'    => 'inline-block',
								),
							)

					),


				'line_height' => array(

						'type'     => 'slider',
						'label' => 'Line Height',
						'default' => '37',
						'selector' => '.cl_share i',
						'css_property' => 'line-height',
						'choices'     => array( 
									'min'  => '0',
									'max'  => '100',
									'step' => '1',
									'suffix' => 'px'
								),
					    'suffix' => 'px',

						'label'       => esc_attr__( 'Set Line Height', 'june' )
						
					
				),



				'css_style' => array(

						'type' => 'css_tool',
						'label' => 'Tool',
						'selector' => '.cl_icon',
						'css_property' => '',
						'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px')

					),

			
			),	
		));




		/* Social Icons */
		cl_builder_map(array(

			'type'        => 'clelement',
			'label'       => esc_attr__( 'Social Icons', 'june' ),
			'section'     => 'cl_codeless_page_builder',
			'use_on_header' => true,
			//'priority'    => 10,
			'icon'		  => 'icon-basic-share',
			'transport'   => 'postMessage',
			'settings'    => 'cl_socialicon',
			'is_container' => false,
			'marginPositions' => array('top'),
			'fields' => array(
		
				'add_facebook' => array(

							'type'        => 'switch',
							'label'       => esc_html__( 'Add Facebook Icon', 'june' ),
							'default'     => '1',
							'priority'    => 10,
							'choices'     => array(
								'1'  => esc_attr__( 'On', 'june' ),
								'0' => esc_attr__( 'Off', 'june' ),
							),
							'selector' => '.cl_socialicon i',
							'reloadTemplate' => true



					),


			 	'facebook_link' => array(
						'type'     => 'text',
						'priority' => 10,
						'label'       => esc_attr__( 'Set the Facebook icon hyperlink', 'june' ),
						'default'     => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_facebook',
									'operator' => '==',
									'value'    => '1',
								),
							),
							
				),


			 	'add_instagram' => array(

						'type'        => 'switch',
						'label'       => esc_html__( 'Add Instagram Icon', 'june' ),
						'default'     => '1',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'june' ),
							'0' => esc_attr__( 'Off', 'june' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true



					),



				'instagram_link' => array(
						'type'     => 'text',
						'priority' => 10,
						'label'       => esc_attr__( 'Set the instagram icon hyperlink', 'june' ),
						'default'     => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_instagram',
									'operator' => '==',
									'value'    => '1',
								),
							),
							
				),


				'add_twitter' => array(

						'type'        => 'switch',
						'label'       => esc_html__( 'Add Twitter Icon', 'june' ),
						'default'     => '1',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'june' ),
							'0' => esc_attr__( 'Off', 'june' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true



					),


				'twitter_link' => array(
						'type'     => 'text',
						'priority' => 10,
						'label'       => esc_attr__( 'Set the twitter icon hyperlink', 'june' ),
						'default'     => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_twitter',
									'operator' => '==',
									'value'    => '1',
								),
							),
							
				),


				'add_email' => array(

						'type'        => 'switch',
						'label'       => esc_html__( 'Add Email Icon', 'june' ),
						'default'     => '1',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'june' ),
							'0' => esc_attr__( 'Off', 'june' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true



					),


				'email_link' => array(
						'type'     => 'text',
						'priority' => 10,
						'label'       => esc_attr__( 'Set the email icon hyperlink', 'june' ),
						'default'     => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_email',
									'operator' => '==',
									'value'    => '1',
								),
							),
							
				),


				'add_linkedin' => array(

						'type'        => 'switch',
						'label'       => esc_html__( 'Add Linkedin Icon', 'june' ),
						'default'     => '1',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'june' ),
							'0' => esc_attr__( 'Off', 'june' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true



					),

				'linkedin_link' => array(

						'type' => 'text',
						'priority' => 10,
						'label' => esc_attr__('Set the Linkedin hyperlink', 'june'),
						'default' => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_linkedin',
									'operator' => '==',
									'value'    => '1',
								),
							),


				),



				'add_pinterest' => array(

						'type'        => 'switch',
						'label'       => esc_html__( 'Add Pinterest Icon', 'june' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'june' ),
							'0' => esc_attr__( 'Off', 'june' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true



					),

				'pinterest_link' => array(

						'type' => 'text',
						'priority' => 10,
						'label' => esc_attr__('Set the Pinterest hyperlink', 'june'),
						'default' => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_pinterest',
									'operator' => '==',
									'value'    => '1',
								),
							),


				),

				'add_youtube' => array(

						'type'        => 'switch',
						'label'       => esc_html__( 'Add Youtube Icon', 'june' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'june' ),
							'0' => esc_attr__( 'Off', 'june' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true



					),


				'youtube_link' => array(

						'type' => 'text',
						'priority' => 10,
						'label' => esc_attr__('Set the Youtube hyperlink', 'june'),
						'default' => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_youtube',
									'operator' => '==',
									'value'    => '1',
								),
							),

				),

				'add_vimeo' => array(

						'type'        => 'switch',
						'label'       => esc_html__( 'Add Vimeo Icon', 'june' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'june' ),
							'0' => esc_attr__( 'Off', 'june' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true



					),



				'vimeo_link' => array(

						'type' => 'text',
						'priority' => 10,
						'label' => esc_attr__('Set the Viemo hyperlink', 'june'),
						'default' => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_vimeo',
									'operator' => '==',
									'value'    => '1',
								),
							),


				),


				'add_soundcloud' => array(

						'type'        => 'switch',
						'label'       => esc_html__( 'Add Soundcloud Icon', 'june' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'june' ),
							'0' => esc_attr__( 'Off', 'june' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true



					),

				'soundcloud_link' => array(

						'type' => 'text',
						'priority' => 10,
						'label' => esc_attr__('Set the Soundcloud hyperlink', 'june'),
						'default' => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_soundcloud',
									'operator' => '==',
									'value'    => '1',
								),
							),


				),

				'add_slack' => array(

						'type'        => 'switch',
						'label'       => esc_html__( 'Add Slack Icon', 'june' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'june' ),
							'0' => esc_attr__( 'Off', 'june' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true



					),

				'slack_link' => array(

						'type' => 'text',
						'priority' => 10,
						'label' => esc_attr__('Set the Slack hyperlink', 'june'),
						'default' => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_slack',
									'operator' => '==',
									'value'    => '1',
								),
							),


				),

				'add_skype' => array(

						'type'        => 'switch',
						'label'       => esc_html__( 'Add Skype Icon', 'june' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'june' ),
							'0' => esc_attr__( 'Off', 'june' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true



					),

				'skype_link' => array(

						'type' => 'text',
						'priority' => 10,
						'label' => esc_attr__('Set skype hyperlink', 'june'),
						'default' => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_skype',
									'operator' => '==',
									'value'    => '1',
								),
					
						),		
				),

			   'add_google_plus'=> array(

			   			'type'        => 'switch',
						'label'       => esc_html__( 'Add Google Plus Icon', 'june' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'june' ),
							'0' => esc_attr__( 'Off', 'june' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true

			   	),

			   'google_plus_link' => array(

						'type' => 'text',
						'priority' => 10,
						'label' => esc_attr__('Set the Google Plus hyperlink', 'june'),
						'default' => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_google_plus',
									'operator' => '==',
									'value'    => '1',
								),
					
						),

				),

			    'add_github'=> array(

			   			'type'        => 'switch',
						'label'       => esc_html__( 'Add Github Icon', 'june' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'june' ),
							'0' => esc_attr__( 'Off', 'june' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true




			   	),


			   	'github_link' => array(

						'type' => 'text',
						'priority' => 10,
						'label' => esc_attr__('Set the Github hyperlink', 'june'),
						'default' => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_github',
									'operator' => '==',
									'value'    => '1',
								),
					
						),

				),

				'add_dribbble'=> array(

			   			'type'        => 'switch',
						'label'       => esc_html__( 'Add Dribbble Icon', 'june' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'june' ),
							'0' => esc_attr__( 'Off', 'june' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true




			   	),


				'dribbble_link' => array(

						'type' => 'text',
						'priority' => 10,
						'label' => esc_attr__('Set the Dribbble hyperlink', 'june'),
						'default' => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_dibbble',
									'operator' => '==',
									'value'    => '1',
								),
					
						),


				),

				'add_behance'=> array(

			   			'type'        => 'switch',
						'label'       => esc_html__( 'Add Behance Icon', 'june' ),
						'default'     => '0',
						'priority'    => 10,
						'choices'     => array(
							'1'  => esc_attr__( 'On', 'june' ),
							'0' => esc_attr__( 'Off', 'june' ),
							),
						'selector' => '.cl_socialicon i',
						'reloadTemplate' => true




			   	),

				'behance_link' => array(

						'type' => 'text',
						'priority' => 10,
						'label' => esc_attr__('Set the Behance hyperlink', 'june'),
						'default' => '',
						'selector' => '.cl_socialicon',
						'cl_required'    => array(
								array(
									'setting'  => 'add_behance',
									'operator' => '==',
									'value'    => '1',
								),
					
						),

				),

				'target' => array(

						'type' => 'inline_select',
						'priority'=> 10,
						'label' => esc_attr__('Set link loading mode', 'june'),
						'default' => '_blank',
						'selector' => '.cl_socialicon',
						'choices' =>array(

							'_blank' => 'New window',
							'_self' => 'Same Window',
							'_parent' => 'Parent Window',
							'_top' => 'Top Window',


					),

				),

		

				'size' => array(
						'type'     => 'slider',
						'label' => 'Font size',
						'default' => '15',
						'selector' => '.cl_socialicon i',
						'css_property' => 'font-size',
						'choices'     => array(
									'min'  => '0',
									'max'  => '100',
									'step' => '1',
									'suffix' => 'px'
								),
					    'suffix' => 'px',

						'label'       => esc_attr__( 'Icon Font Size', 'june' )
						
					
				),

				

				'color' => array(

						'type' => 'color',
						'label' => 'Icon Color',
						'default' => '#222',
						'selector' => '.cl_socialicon > a',
						'css_property' => 'color',
						'alpha' => true
							
				),

				'color_hover' => array(

						'type' => 'color',
						'label' => 'Icon Color Hover',
						'default' => '',
						'alpha' => false
							
				),

				'bgcolor' => array(

						'type' => 'color',
						'label' => 'Background Color',
						'default' => 'transparent',
						'selector' => '.cl_socialicon',
						'css_property' => 'background-color',
						'alpha' => true,
						'cl_required'    => array(
							array(
								'setting'  => 'border',
								'operator' => '!=',
								'value'    => 'none',
								),
							),
							
				),

				'bgcolor_hover' => array(

						'type' => 'color',
						'label' => 'Background Color Hover',
						'default' => 'transparent',
						'alpha' => true,
						'cl_required'    => array(
							array(
								'setting'  => 'border',
								'operator' => '!=',
								'value'    => 'none',
								),
							),
							
				),


				'border' => array(

						'type' => 'inline_select',
						'label' => esc_attr__( 'Set the border style', 'june' ),
						'default' => 'none',
						'selector' => '.cl_socialicon',
						'choices' => array(

								'round' => 'Rounded Style',
								'square' => 'Square Style',
								'none' => 'None'

							),
						'selectClass' => ''
						

					),

				'bcolor' => array(

						'type' => 'color',
						'label' => 'Border Color',
						'default' => '#222',
						'selector' => '.cl_socialicon',
						'css_property' => 'border-color',
						'alpha' => true,
						'cl_required'    => array(
							array(
								'setting'  => 'border',
								'operator' => '!=',
								'value'    => 'none',
								),
							),


				),	

				'bcolor_hover' => array(

						'type' => 'color',
						'label' => 'Border Color Hover',
						'default' => '',
						'alpha' => true,
						'cl_required'    => array(
							array(
								'setting'  => 'border',
								'operator' => '!=',
								'value'    => 'none',
								),
							),


				),	

				

				'padding' => array(
						'type'     => 'slider',
						'label' => 'Icon Size',
						'default' => '38',
						'selector' => '.cl_socialicon',
						'css_property' => array('width', 'height'),
						'choices'     => array(
									'min'  => '0',
									'max'  => '100',
									'step' => '1',
									'suffix' => 'px'
								),
					    'suffix' => 'px',

						'label'       => esc_attr__( 'Icon Size', 'june' ),
						'cl_required'    => array(
							array(
								'setting'  => 'border',
								'operator' => '!=',
								'value'    => 'none',
								),
							),

						
					
				),	

				'display' => array(

						'type' => 'inline_select',
						'label' => 'Icon Display Mode',
						'default' => 'inline-block',
						'selector' => '.cl_socialicon',
						'css_property' => 'display',
						'choices' => array(

							'inline-block' => 'Inline',
							'block' => 'Block'
							
							
						),


				),


				'margin'=> array(

						'type' => 'slider',
						'label' => 'Set the margin between icons',
						'default' => '5',
						'selector' => '.cl_socialicon',
						'css_property' => array('margin-left', 'margin-right'),
						'choices'     => array(
									'min'  => '0',
									'max'  => '100',
									'step' => '1',
									'suffix' => 'px'
								),
					    'suffix' => 'px',
						'label'       => esc_attr__( 'Set Space Between Icons', 'june' ),
						'cl_required'    => array(
								array(
									'setting'  => 'display',
									'operator' => '==',
									'value'    => 'inline-block',
								),
							),



				),


				'margintop'=> array(

						'type' => 'slider',
						'label' => 'Set the margin between icons',
						'default' => '5',
						'selector' => '.cl_socialicon',
						'css_property' => array('margin-top', 'margin-bottom'),
						'choices'     => array(
									'min'  => '0',
									'max'  => '100',
									'step' => '1',
									'suffix' => 'px'
								),
					    'suffix' => 'px',
						'label'       => esc_attr__( 'Set Space Between Icons', 'june' ),
						'cl_required'    => array(
								array(
									'setting'  => 'display',
									'operator' => '==',
									'value'    => 'block',
								),
							),



				),


				'align' => array(

						'type' => 'inline_select',
						'label' => 'Icon Alignment',
						'default' => 'left',
						'selector' => '.cl_socialicondiv',
						'css_property' => 'text-align',
						'choices' => array(

							'left' => 'Left',
							'right' => 'Right',
							'center' => 'Center'
							
						),

						'cl_required'    => array(
								array(
									'setting'  => 'display',
									'operator' => '==',
									'value'    => 'inline-block',
								),
							),

					),


				'line_height' => array(

						'type'     => 'slider',
						'label' => 'Line Height',
						'default' => '37',
						'selector' => '.cl_socialicon i',
						'css_property' => 'line-height',
						'choices'     => array( 
									'min'  => '0',
									'max'  => '100',
									'step' => '1',
									'suffix' => 'px'
								),
					    'suffix' => 'px',

						'label'       => esc_attr__( 'Set Line Height', 'june' )
						
					
				),


				'device_visibility' => array(
							'type'     => 'multicheck',

							'priority' => 10,
							'label'       => esc_attr__( 'Devices Visibility', 'june' ),
							
							'default'     => '',
							'choices' => array(
								'hidden-xs' => esc_attr__( 'Hide on Phones (smaller-than-768px)', 'june' ),
								'hidden-sm' => esc_attr__('Hide on Tables (larger-then-768px)', 'june' ),
								'hidden-md' => esc_attr__('Hide on Medium Desktops (larger-then-992px) ', 'june' ),
								'hidden-lg' => esc_attr__('Hide on Large Desktops (larger-then1200px)', 'june' ),
							),
							'selector' => '.cl_socialicondiv',
							'selectClass' => ''
				),

					

				'css_style' => array(

						'type' => 'css_tool',
						'label' => 'Tool',
						'selector' => '.cl_socialicondiv',
						'css_property' => '',
						'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px')

				),

				
			)


		));

 		cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Revolution Slider', 'june' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-arrows-keyboard-right',
				'transport'   => 'postMessage',
				'settings'    => 'cl_revslider',
				'is_container' => false,
				'marginPositions' => array('top'),
				'fields' => array(
					
					'slides' => array(
						'type' => 'inline_select',
						'label' => esc_attr__('Select slide', 'june'),
						'tooltip' => 'Select one of the created slides. Or create a new slider <a href="'.admin_url('admin.php?page=revslider').'" target="_blank">here</a>',
						'default' => '',
						'choices' => codeless_get_rev_slides(),
						'reloadTemplate' => true
						),

					'css_style' => array(
						'type' => 'css_tool',
						'label' => 'Tool',
						'selector' => '.rev_slider_wrapper',
						'css_property' => '',
						'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px')
					),
				),

			
		));


		cl_builder_map(array(
				
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Layer Slider', 'june' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-arrows-keyboard-right',
				'transport'   => 'postMessage',
				'settings'    => 'cl_layerslider',
				'is_container' => false,
				'marginPositions' => array('top'),
				'fields' => array(
					
					'slides' => array(
						'type' => 'inline_select',
						'label' => esc_attr__('Select slide', 'june'),
						'tooltip' => 'Select one of the created slides. Or create a new slider <a href="'.admin_url('admin.php?page=layerslider').'" target="_blank">here</a>',
						'default' => '1',
						'choices' => codeless_get_layer_slides(),
						'reloadTemplate' => true
						),

					'css_style' => array(
						'type' => 'css_tool',
						'label' => 'Tool',
						'selector' => '.ls-container',
						'css_property' => '',
						'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px')
					),
				),

			
		));

		if( class_exists( 'TablePress' ) ){
		
			cl_builder_map(array(
					
					'type'        => 'clelement',
					'label'       => esc_attr__( 'Table', 'june' ),
					'section'     => 'cl_codeless_page_builder',
					//'priority'    => 10,
					'icon'		  => 'icon-software-layout-header-4columns',
					'transport'   => 'postMessage',
					'settings'    => 'cl_table',
					'is_container' => false,
					'marginPositions' => array('top'),
					'fields' => array(		
						'tables' => array(
							'type' => 'inline_select',
							'label' => esc_attr__('Select a table', 'june'),
							'tooltip' => 'Select one of the created tables. Or create a new table <a href="'.admin_url('admin.php?page=tablepress_add').'" target="_blank">here</a>',
							'default' => '1',
							'choices' => codeless_get_tablepress(),
							'reloadTemplate' => true
						),
					),

				
			));

		}


		if( function_exists('visualizer_launch') ){
		
			cl_builder_map(array(
					
					'type'        => 'clelement',
					'label'       => esc_attr__( 'Charts', 'june' ),
					'section'     => 'cl_codeless_page_builder',
					//'priority'    => 10,
					'icon'		  => 'icon-ecommerce-graph1',
					'transport'   => 'postMessage',
					'settings'    => 'cl_chart',
					'is_container' => false,
					'marginPositions' => array('top'),
					'fields' => array(		
						'charts' => array(
							'type' => 'inline_select',
							'label' => esc_attr__('Select a chart', 'june'),
							'tooltip' => 'Select one of the created charts. Or create a new chart <a href="'.admin_url('upload.php?page=visualizer').'" target="_blank">here</a>',
							'default' => '1',
							'choices' => codeless_get_visualizer_charts(),
							'reloadTemplate' => true
						),
						'css_style' => array( 
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_chart',
							'css_property' => '',
							'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px')
						),
					),

				
			));

		}

		/* Pricelist */
			cl_builder_map(array(
				'type'        => 'clelement',
				'label'       => esc_attr__( 'PriceList', 'june' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-basic-todo-txt',
				'transport'   => 'postMessage',
				'settings'    => 'cl_pricelist',
				'marginPositions' => array('top'),
				'is_container' => true,
				'fields' => array(


					'price' => array(
							
							'type'     => 'inline_text',
							'priority' => 10,
							'label'       => esc_attr__( 'Price', 'june' ),
							'default'     => '59',
							'selector' => '.cl_pricelist .price .integer-part',
							'only_text' => true
					),
					'price_decimal' => array(
							
							'type'     => 'inline_text',
							'priority' => 10,
							'label'       => esc_attr__( 'Price Decimal', 'june' ),
							'default'     => '99',
							'selector' => '.cl_pricelist .price .decimal-part',
							'only_text' => true
					),
					'currency' => array(
							
							'type'     => 'inline_text',
							'priority' => 10,
							'label'       => esc_attr__( 'Currency', 'june' ),
							'default'     => '$',
							'selector' => '.cl_pricelist .price .currency',
							'only_text' => true
					),
					'time' => array(
							
							'type'     => 'inline_text',
							'priority' => 10,
							'label'       => esc_attr__( 'Time', 'june' ),
							'default'     => 'monthly',
							'selector' => '.cl_pricelist .price .time',
							'only_text' => true
					),
					'title' => array(
							
							'type'     => 'inline_text',
							'priority' => 10,
							'label'       => esc_attr__( 'Row Id', 'june' ),
							'tooltip' => esc_attr__( 'This is useful when you want to add unique identifier to row.', 'june' ),
							'default'     => 'Pricelist Title',
							'selector' => '.cl_pricelist .header h4'
					),

					'btn_title' => array(
							
							'type'     => 'inline_text',
							'priority' => 10,
							'label'       => esc_attr__( 'Row Id', 'june' ),
							'tooltip' => esc_attr__( 'This is useful when you want to add unique identifier to row.', 'june' ),
							'default'     => 'Purchase Now',
							'selector' => '.cl_pricelist .footer a span'
					),

					'link' => array(
						'type'     => 'text',
						'priority' => 10,
						'label'       => esc_attr__( 'Link', 'june' ),
						'default'     => '#'
					),

					'title_color' => array(
							'type' => 'inline_select',
							'label' => 'Title Color',
							'default' => 'title_dark',
							'choices' => array(
								'title_dark' => 'Dark',
								'title_light' => 'Light'
							),
							'selector' => '.cl_pricelist',
							'selectClass' => ''
					), 

					'css_style' => array( 
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_pricelist',
							'css_property' => '',
							'default' => array('margin-top' => '15px')
						),
				)
			));


			cl_builder_map(array(
				
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Custom Code', 'june' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-arrows-expand-vertical1',
				'transport'   => 'postMessage',
				'settings'    => 'cl_custom_code',
				'is_container' => false,
				'marginPositions' => array('top'),
				'fields' => array(
					
					'code' => array(
						'type' => 'textarea',
						'label' => esc_attr__('Add Custom Code', 'june'),
						'tooltip' => 'Add Custom HTML or a Shortcode',
						'default' => '',
						'reloadTemplate' => true
					),

					'css_style' => array(
						'type' => 'css_tool',
						'label' => 'Tool',
						'selector' => '.cl_custom_code',
						'css_property' => '',
						'default' => array('margin-top' => codeless_get_mod('elements_default_margin', '20').'px')
					),
				),

			
		));


		if( function_exists( 'mc4wp_show_form' ) ){
			cl_builder_map(array(
				
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Mailchimp', 'june' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-arrows-expand-vertical1',
				'transport'   => 'postMessage',
				'settings'    => 'cl_mailchimp',
				'is_container' => false,
				'marginPositions' => array('top'),
				'fields' => array(
					'style' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Style', 'june' ),
							'default'     => 'default',
							'choices' => array(
								'default' => 'Default',
								'large_button' => 'With Large Button'
							),
							'selector' => '.cl_mailchimp',
							'selectClass' => 'style_'
					),

					'css_style' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_mailchimp',
							'css_property' => '',
							'default' => array('padding-top' => '0px', 'padding-bottom' => '0px' )
						),
				),

			
		));
		}

		cl_builder_map(array(
				
				'type'        => 'clelement',
				'label'       => esc_attr__( 'Widget Sidebar', 'june' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-arrows-expand-vertical1',
				'transport'   => 'postMessage',
				'settings'    => 'cl_widget_sidebar',
				'is_container' => false,
				'marginPositions' => array('top'),
				'fields' => array(
					'sidebar' => array(
							'type'     => 'inline_select',
							'priority' => 10,
							'label'       => esc_attr__( 'Sidebar', 'june' ),
							'default'     => 'default',
							'choices' => codeless_get_registered_sidebars(),
							'reloadTemplate' => true
					),

					'css_style' => array(
							'type' => 'css_tool',
							'label' => 'Tool',
							'selector' => '.cl_widget_sidebar',
							'css_property' => '',
							'default' => array('padding-top' => '0px', 'padding-bottom' => '0px' )
						),
				),

			
		));

		cl_builder_map(array(
				
				'type'        => 'clelement',
				'label'       => esc_attr__( 'HotSpot Infographic', 'june' ),
				'section'     => 'cl_codeless_page_builder',
				//'priority'    => 10,
				'icon'		  => 'icon-arrows-expand-vertical1',
				'transport'   => 'postMessage',
				'settings'    => 'cl_hotspot',
				'is_container' => false,
				'marginPositions' => array('top'),
				'fields' => array(
					'content' => array(
						'type'     => 'inline_text',
						'priority' => 10,
						'selector' => '.cl_hotspot .text',
						'label'       => esc_attr__( 'Content', 'june' ),
						'default'     => 'Hello Hotspot',
					),

					'link' => array(
						'type'     => 'text',
						'priority' => 10,
						'label'       => esc_attr__( 'Link', 'june' ),
						'default'     => '#',
					),

					'position_top' => array(
						'type'     => 'text',
						'priority' => 10,
						'selector' => '.cl_hotspot',
						'css_property' => 'top',
						'label'       => esc_attr__( 'Position Top', 'june' ),
						'tooltip'       => esc_attr__( 'Possible value: in px, %, or auto. Position absolute, relative to the column.', 'june' ),
						'default'     => 'auto',
					),

					'position_left' => array(
						'type'     => 'text',
						'priority' => 10,
						'selector' => '.cl_hotspot',
						'css_property' => 'left',
						'label'       => esc_attr__( 'Position Left', 'june' ),
						'tooltip'       => esc_attr__( 'Possible value: in px, %, or auto. Position absolute, relative to the column.', 'june' ),
						'default'     => 'auto',
					),

					'position_right' => array(
						'type'     => 'text',
						'priority' => 10,
						'selector' => '.cl_hotspot',
						'css_property' => 'right',
						'label'       => esc_attr__( 'Position Right', 'june' ),
						'tooltip'       => esc_attr__( 'Possible value: in px, %, or auto. Position absolute, relative to the column.', 'june' ),
						'default'     => 'auto',
					),

					'position_bottom' => array(
						'type'     => 'text',
						'priority' => 10,
						'selector' => '.cl_hotspot',
						'css_property' => 'bottom',
						'label'       => esc_attr__( 'Position Bottom', 'june' ),
						'tooltip'       => esc_attr__( 'Possible value: in px, %, or auto. Position absolute, relative to the column.', 'june' ),
						'default'     => 'auto',
					),

					'dot_color' => array(
							'type' => 'color',
							'label' => 'Dot Color',
							'default' => '#5effaa',
							'selector' => '.cl_hotspot .dot',
							
							'css_property' => 'background-color',
							'alpha' => true
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
									'selector' => '.cl_hotspot .text',
									'css_property' => 'font-family',
									'choices'     => codeless_get_google_fonts(),
									'cl_required'    => array(
										array(
											'setting'  => 'custom_typography',
											'operator' => '==',
											'value'    => true,
										),
									),
								),

							'text_font_size' => array(
			
									'type' => 'slider',
									'label' => 'Text Font Size',
									'default' => '14',
									'selector' => '.cl_hotspot .text',
									'css_property' => 'font-size',
									'choices'     => array(
										'min'  => '14',
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
									'selector' => '.cl_hotspot .text',
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
									'selector' => '.cl_hotspot .text',
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

							'text_letterspace' => array(
			
									'type' => 'slider',
									'label' => 'Letter Spacing',
									'default' => '0',
									'selector' => '.cl_hotspot .text',
									'css_property' => 'letter-spacing',
									'choices'     => array(
										'min'  => '-10',
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
									'selector' => '.cl_hotspot .text',
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
								
							
								
							
							'text_color' => array(
									'type' => 'color',
									'label' => 'Color',
									'default' => '',
									'selector' => '.cl_hotspot .text',
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
							'selector' => '.cl_hotspot'
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
							'selector' => '.cl_hotspot',
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
							'selector' => '.cl_hotspot',
							'htmldata' => 'speed',
							'cl_required'    => array(
								array(
									'setting'  => 'animation',
									'operator' => '!=',
									'value'    => 'none',
								),
							),
						),
					
				),

			
		));

?>