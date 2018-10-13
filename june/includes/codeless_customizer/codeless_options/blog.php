<?php

Kirki::add_section( 'cl_blog', array(
	    'priority'    => 10,
	    'type' => '',
	    'title'       => esc_html__( 'Blog', 'june' ),
	    'tooltip' => esc_html__( 'All Blog Styles and options', 'june' ),
	) );


		Kirki::add_field( 'cl_june', array(
			'settings' => 'blog_style',
			'label'    => esc_html__( 'Blog Style', 'june' ),
			'tooltip' => esc_html__( 'Select one of the blog styles that you want to use as a default template', 'june' ),
			'section'  => 'cl_blog',
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
		) );
		
		Kirki::add_field( 'cl_june', array(
			'settings' => 'blog_grid_layout',
			'label'    => esc_html__( 'Grid Layout', 'june' ),
			
			'section'  => 'cl_blog',
			'type'     => 'select',
			'priority' => 10,
			'default'  => '4',
			'choices' => array(
				'2'	=> '2 Columns',
				'3'	=> '3 Columns',
				'4'	=> '4 Columns',
				'5'	=> '5 Columns',
			),
			'transport' => 'postMessage',
			'required'    => array(
				array(
					'setting'  => 'blog_style', 
					'operator' => 'in',
					'value'    => array('grid', 'masonry'),
				),
								
			),
		) );
		
		Kirki::add_field( 'cl_june', array(
		    'type' => 'slider',
		    'settings' => 'blog_grid_transition_duration',
			'label' => 'Grid Transition Duration',
			'default' => '0.4',
			'choices'     => array(
			'min'  => '0.0',
			'max'  => '5',
			'step' => '0.1',
							),
			'inline_control' => true,
			'section'  => 'cl_blog',
			'required'    => array(
				array(
					'setting'  => 'blog_style',
					'operator' => 'in',
					'value'    => array('grid', 'masonry')
				),
								
			),
    	));

		Kirki::add_field( 'cl_june', array(
		    'type' => 'select',
		    'settings' => 'blog_button_style',
			'label' => 'Blog Button Style',
			'tooltip' => 'Change from default to another style if you want to use another button style on blog',
			'default'     => 'simple_square',
			'choices' => array(
				'simple_square' => 'Simple Square',
				'square_small_rounded' => 'Square Small Rounded',
				'simple_text' => 'Simple Text',
				'rounded' => 'Rounded'
			),
			'inline_control' => true,
			'section'  => 'cl_blog',
			'transport' => 'postMessage'
    	));

		
		Kirki::add_field( 'cl_june', array(
			'settings' => 'blog_animation',
			'label'    => esc_html__( 'Animation Type', 'june' ),
			
			'section'  => 'cl_blog',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'none',
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
			'settings' => 'blog_layout',
			'label'    => esc_html__( 'Blog Page Layout', 'june' ),
			'tooltip' => esc_html__( 'Overwrite the default all pages layout option, set a custom layout for blog', 'june' ),
			'section'  => 'cl_blog',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'right_sidebar',
			'choices'     => array(
			    'none'  => esc_attr__( 'Use Default', 'june' ),
				'fullwidth'  => esc_attr__( 'Fullwidth', 'june' ),
				'left_sidebar'  => esc_attr__( 'Left Sidebar', 'june' ),
				'right_sidebar'  => esc_attr__( 'Right Sidebar', 'june' ),
				'dual_sidebar'  => esc_attr__( 'Dual Sidebar', 'june' )
			),
		) );

		

		Kirki::add_field( 'cl_june', array(
		    'type' => 'slider',
		    'settings' => 'blog_width',
			'label' => esc_html__( 'Set the exact blog width', 'june' ),
			'tooltip' => esc_html__( 'Set a custom width in percentage for your blog', 'june' ),
			'default' => 100,
			'choices'     => array(
				'min'  => '20',
				'max'  => '100',
				'step' => '1',
			),
			'inline_control' => true,
			'section'  => 'cl_blog',
			'output' => array(
				array(
					'element' => '.blog-entries.blog_page',
					'units' => '%',
					'property' => 'width',
					'media_query' => '@media (min-width: 992px)'
				)
			),

			'transport' => 'auto'

    	));

    	Kirki::add_field( 'cl_june', array(
		    'type' => 'select',
		    'settings' => 'blog_align',
			'label' => esc_html__( 'Set Blog Align', 'june' ),
			'tooltip' => esc_html__( 'Blog align', 'june' ),
			'default' => 'left',
			'choices'     => array(
				
				'left'  => esc_attr__('left', 'june' ),
				'center' => esc_attr__('center', 'june' ),
				'right' => esc_attr__('right', 'june' ),
			),
			'inline_control' => true,
			'section'  => 'cl_blog',
			'selector' => '.blog-entries',
			'selectClass' => '',

			'transport' => 'postMessage'

    	));

    	Kirki::add_field( 'cl_june', array(
			'settings' => 'blog_archive_layout',
			'label'    => esc_html__( 'Blog Archives Layout', 'june' ),
			'tooltip' => esc_html__( 'Archives & Categories Layout', 'june' ),
			'section'  => 'cl_blog',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'fullwidth',
			'choices'     => array(
			    'none'  => esc_attr__( 'Use Default', 'june' ),
				'fullwidth'  => esc_attr__( 'Fullwidth', 'june' ),
				'left_sidebar'  => esc_attr__( 'Left Sidebar', 'june' ),
				'right_sidebar'  => esc_attr__( 'Right Sidebar', 'june' ),
				'dual_sidebar'  => esc_attr__( 'Dual Sidebar', 'june' )
			),
		) );
		
		Kirki::add_field( 'cl_june', array(
			'settings' => 'blog_post_layout',
			'label'    => esc_html__( 'Blog Posts Layout', 'june' ),
			'tooltip' => esc_html__( 'Change the layout of blog posts, you can add custom sidebar for posts also.', 'june' ),
			'section'  => 'cl_blog',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'right_sidebar',
			'choices'     => array(
				'fullwidth'  => esc_attr__( 'Fullwidth', 'june' ),
				'left_sidebar'  => esc_attr__( 'Left Sidebar', 'june' ),
				'right_sidebar'  => esc_attr__( 'Right Sidebar', 'june' )
			),
		) );

		Kirki::add_field( 'cl_june', array(
			'settings' => 'blog_post_style',
			'label'    => esc_html__( 'Blog Posts Style', 'june' ),
			'tooltip' => esc_html__( 'Change the style of blog posts, you can add custom style for each post.', 'june' ),
			'section'  => 'cl_blog',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'modern',
			'choices'     => array(
				'classic'  => esc_attr__( 'Classic', 'june' ),
				'modern'  => esc_attr__( 'Modern', 'june' ),
				'custom'  => esc_attr__( 'Custom ( Build with Page Builder )', 'june' )
			),
		) );
		
		Kirki::add_field( 'cl_june', array(
			'settings' => 'blog_excerpt',
			'label'    => esc_html__( 'Enable auto excerpt', 'june' ),
			'tooltip' => esc_html__( 'If enabled you will see only a small part of content. If disabled all post will show', 'june' ),
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'june' ),
				0 => esc_attr__( 'Off', 'june' ),
			),
			

		) );
		
		Kirki::add_field( 'cl_june', array(
			'type'        => 'number',
			'settings'    => 'blog_excerpt_length',
			'label'       => esc_attr__( 'Excerpt Length', 'june' ),
			'section'     => 'cl_blog',
			'into_group' => true,
			'default'     => '62',
			'priority'    => 10,
			
		));
		
		Kirki::add_field( 'cl_june', array(
			'settings' => 'blog_share_buttons',
			'label'    => esc_html__( 'Blog Share Buttons', 'june' ),
			'tooltip' => esc_html__( 'Select Social share buttons that you want to use on blog page', 'june' ),
			'section'  => 'cl_blog',
			'type'     => 'select',
			'multiple' => 6,
			'priority' => 10,
			'default'  => array('twitter', 'facebook', 'pinterest', 'google'),
			'choices'     => array(
				'twitter'  => esc_attr__( 'Twitter', 'june' ),
				'facebook'  => esc_attr__( 'facebook', 'june' ),
				'google'  => esc_attr__( 'Google', 'june' ),
				'whatsapp'  => esc_attr__( 'Whatsapp', 'june' ),
				'linkedin'  => esc_attr__( 'LinkedIn', 'june' ),
				'pinterest'  => esc_attr__( 'Pinterest', 'june' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'blog_share_buttons' => array(
		            'selector'            => '.entry-tool-share',
		            'render_callback'     => 'codeless_get_entry_tool_share'
		        ),
		    ),
		) );
		
		
		Kirki::add_field( 'cl_june', array(
			'settings' => 'blog_overlay',
			'label'    => esc_html__( 'Blog Overlay Style', 'june' ),
			'tooltip' => esc_html__( 'Select the style of overlay of blog image on hover', 'june' ),
			'section'  => 'cl_blog',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'color',
			'choices'     => array(
				'none'  => esc_attr__( 'None', 'june' ),
				'color'  => esc_attr__( 'Color Overlay', 'june' ),
				'zoom_color'  => esc_attr__( 'Zoom and Color', 'june' ),
				'grayscale'  => esc_attr__( 'Grayscale', 'june' ),
			),
			'transport' => 'refresh'
		) );
		
		Kirki::add_field( 'cl_june', array(
			'settings' => 'blog_entry_overlay_icon',
			'label'    => esc_html__( 'Overlay Icon', 'june' ),
			
			'section'  => 'cl_blog',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'arrow-right',
			'choices'     => array(
				'plus2'  => esc_attr__( 'Plus', 'june' ),
				'arrow-right'  => esc_attr__( 'Arrow Right', 'june' ),
				'expand2'  => esc_attr__( 'Expand', 'june' ),
				'image2'  => esc_attr__( 'Image', 'june' ),
				'lightbox' => esc_attr__( 'Lightbox', 'june' ),
			),
			'transport' => 'postMessage'
		) );
		
		Kirki::add_field( 'cl_june', array(
			'settings' => 'blog_image_link',
			'label'    => esc_html__( 'Entry Image Link', 'june' ),
			'tooltip' => esc_html__( 'Disable if you dont want that image linked with post', 'june' ),
			'section'  => 'cl_blog',
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
			'settings' => 'blog_filters',
			'label'    => esc_html__( 'Blog Page Filterable', 'june' ),
			
			'section'  => 'cl_blog',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'disabled',
			'choices'     => array(
				'disabled'  => esc_attr__( 'Disabled', 'june' ),
				'small'  => esc_attr__( 'Small Square', 'june' ),
				'fullwidth'  => esc_attr__( 'Fullwidth', 'june' )
			),
			'transport' => 'postMessage'
		) );

		Kirki::add_field( 'cl_june', array(
			'settings' => 'blog_filters_color',
			'label'    => esc_html__( 'Filter BG', 'june' ),
			
			'section'  => 'cl_blog',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'dark',
			'choices' => array(
				'dark'	=> 'Dark',
				'light'	=> 'Light'
			),
			'transport' => 'postMessage',
			'required'    => array(
				array(
					'setting'  => 'blog_filters',
					'operator' => '==',
					'value'    => 'fullwidth'
				),
								
			),
		) );

		Kirki::add_field( 'cl_june', array(
			'settings' => 'blog_lazyload',
			'label'    => esc_html__( 'Blog Lazyload', 'june' ),
			
			'section'  => 'cl_blog',
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
		    		
		   'settings' => 'blog_divider_1',
		   'label'    => '',
		   'section'  => 'cl_blog',
		   'type'     => 'groupdivider',
		   'into_group' => true,
		    			
		) );
		    	
		Kirki::add_field( 'cl_june', array(
		    		
		   'settings' => 'blog_post_meta',
		   'label'    => esc_html__( 'Post Entry Meta', 'june' ),
		   'section'  => 'cl_blog',
		   'type'     => 'grouptitle',
		   'into_group' => true,
		
		) );
		
		
		Kirki::add_field( 'cl_june', array(
			'settings' => 'blog_entry_meta_author',
			'label'    => esc_html__( 'Show Author Meta', 'june' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'june' ),
				0 => esc_attr__( 'Off', 'june' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'blog_entry_meta_author' => array(
		            'selector'            => '.entry-meta',
		            'render_callback'     => function(){
		            	get_template_part( 'template-parts/blog/parts/entry', 'meta' );
		            }
		        ),
		    ),
			
		) );
		
		
		Kirki::add_field( 'cl_june', array(
			'settings' => 'blog_entry_meta_categories',
			'label'    => esc_html__( 'Show Categories Meta', 'june' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'june' ),
				0 => esc_attr__( 'Off', 'june' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'blog_entry_meta_categories' => array(
		            'selector'            => '.entry-meta',
		            'render_callback'     => function(){
		            	get_template_part( 'template-parts/blog/parts/entry', 'meta' );
		            }
		        ),
		    ),
		) );
		
		Kirki::add_field( 'cl_june', array(
			'settings' => 'blog_entry_meta_date',
			'label'    => esc_html__( 'Show Date Meta', 'june' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'june' ),
				0 => esc_attr__( 'Off', 'june' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'blog_entry_meta_date' => array(
		            'selector'            => '.entry-meta',
		            'render_callback'     => function(){
		            	get_template_part( 'template-parts/blog/parts/entry', 'meta' );
		            }
		        ),
		    ),
		) );


		Kirki::add_field( 'cl_june', array(
			'settings' => 'blog_entry_meta_comments',
			'label'    => esc_html__( 'Show Comments Meta', 'june' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'june' ),
				0 => esc_attr__( 'Off', 'june' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'blog_entry_meta_date' => array(
		            'selector'            => '.entry-meta',
		            'render_callback'     => function(){
		            	get_template_part( 'template-parts/blog/parts/entry', 'meta' );
		            }
		        ),
		    ),
		) );

		
		
		Kirki::add_field( 'cl_june', array(
		    		
		   'settings' => 'blog_divider_2',
		   'label'    => '',
		   'section'  => 'cl_blog',
		   'type'     => 'groupdivider',
		   'into_group' => true,
		    			
		) );
		    	
		Kirki::add_field( 'cl_june', array(
		    		
		   'settings' => 'blog_post_tools',
		   'label'    => esc_html__( 'Post Entry Tools', 'june' ),
		   'section'  => 'cl_blog',
		   'type'     => 'grouptitle',
		   'into_group' => true,
		
		) );
		
		
		Kirki::add_field( 'cl_june', array(
			'settings' => 'blog_entry_tools_likes',
			'label'    => esc_html__( 'Show Post Likes', 'june' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'june' ),
				0 => esc_attr__( 'Off', 'june' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'blog_entry_tools_likes' => array(
		            'selector'            => '.entry-tools',
		            'container_inclusive' => true,
		            'render_callback'     => function(){
		            	get_template_part( 'template-parts/blog/parts/entry', 'tools' );
		            }
		        ),
		    ),
		) );

		Kirki::add_field( 'cl_june', array(
			'settings' => 'blog_entry_tools_share_counts',
			'label'    => esc_html__( 'Show Share Counts', 'june' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'june' ),
				0 => esc_attr__( 'Off', 'june' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'blog_entry_tools_share_counts' => array(
		            'selector'            => '.entry-tools',
		            'container_inclusive' => true,
		            'render_callback'     => function(){
		            	get_template_part( 'template-parts/blog/parts/entry', 'tools' );
		            }
		        ),
		    ),
		) );

		Kirki::add_field( 'cl_june', array(
			'settings' => 'blog_entry_tools_share',
			'label'    => esc_html__( 'Show Share Buttons', 'june' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'june' ),
				0 => esc_attr__( 'Off', 'june' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'blog_entry_tools_share' => array(
		            'selector'            => '.entry-tools',
		            'container_inclusive' => true,
		            'render_callback'     => function(){
		            	get_template_part( 'template-parts/blog/parts/entry', 'tools' );
		            }
		        ),
		    ),
		) );
		
		
		Kirki::add_field( 'cl_june', array(
			'settings' => 'blog_entry_tools_comments_count',
			'label'    => esc_html__( 'Show Comments Count', 'june' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 0,
			'choices'     => array(
				1  => esc_attr__( 'On', 'june' ),
				0 => esc_attr__( 'Off', 'june' ),
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'blog_entry_tools_comments_count' => array(
		            'selector'            => '.entry-tools',
		            'container_inclusive' => true,
		            'render_callback'     => function(){
		            	get_template_part( 'template-parts/blog/parts/entry', 'tools' );
		            }
		        ),
		    ),
		) );
		
		
		
		
		Kirki::add_field( 'cl_june', array(
		    		
		   'settings' => 'blog_divider_4',
		   'label'    => '',
		   'section'  => 'cl_blog',
		   'type'     => 'groupdivider',
		   'into_group' => true,
		    			
		) );
		    	
		Kirki::add_field( 'cl_june', array(
		    		
		   'settings' => 'blog_pagination',
		   'label'    => esc_html__( 'Pagination', 'june' ),
		   'section'  => 'cl_blog',
		   'type'     => 'grouptitle',
		   'into_group' => true,
		
		) );
		
		Kirki::add_field( 'cl_june', array(
			'settings' => 'blog_pagination_style',
			'label'    => esc_html__( 'Pagination Style', 'june' ),
			
			'section'  => 'cl_blog',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'numbers',
			'choices'     => array(
				'numbers'  => esc_attr__( 'With Page Numbers', 'june' ),
				'next_prev'  => esc_attr__( 'Next/Prev', 'june' ),
				'load_more'  => esc_attr__( 'Load More Button', 'june' ),
				'infinite_scroll'  => esc_attr__( 'Infinite Scroll', 'june' ),
				
			),
			'transport' => 'postMessage',
			'partial_refresh' => array(
		        'blog_pagination_style' => array(
		            'selector'            => '.cl-blog-pagination',
		            'container_inclusive' => true,
		            'render_callback'     => function(){
		            	codeless_blog_pagination();
		            }
		        ),
		    ),
		) );
		
		Kirki::add_field( 'cl_june', array(
			'settings' => 'blog_pagination_align',
			'label'    => esc_html__( 'Pagination Align', 'june' ),
			
			'section'  => 'cl_blog',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'center',
			'transport' => 'postMessage',
			'choices'     => array(
				'left'  => esc_attr__( 'Left', 'june' ),
				'center'  => esc_attr__( 'Center', 'june' ),
				'right'  => esc_attr__( 'Right', 'june' ),
				
			),
		) );
		
		
		
		
		
		Kirki::add_field( 'cl_june', array(
		    		
		   'settings' => 'blog_divider_3',
		   'label'    => '',
		   'section'  => 'cl_blog',
		   'type'     => 'groupdivider',
		   'into_group' => true,
		    			
		) );
		    	
		Kirki::add_field( 'cl_june', array(
		    		
		   'settings' => 'blog_post_slider',
		   'label'    => esc_html__( 'Post Slider', 'june' ),
		   'section'  => 'cl_blog',
		   'type'     => 'grouptitle',
		   'into_group' => true,
		
		) );
		
		Kirki::add_field( 'cl_june', array(
			'settings' => 'blog_slider_pagination',
			'label'    => esc_html__( 'Enable Slider Pagination', 'june' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'june' ),
				0 => esc_attr__( 'Off', 'june' ),
			),
		) );
		
		Kirki::add_field( 'cl_june', array(
			'settings' => 'blog_slider_nav',
			'label'    => esc_html__( 'Enable Slider Prev/Next', 'june' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'june' ),
				0 => esc_attr__( 'Off', 'june' ),
			),
		) );
		
		Kirki::add_field( 'cl_june', array(
			'settings' => 'blog_slider_loop',
			'label'    => esc_html__( 'Enable Slider Loop', 'june' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'june' ),
				0 => esc_attr__( 'Off', 'june' ),
			),
		) );
		
		Kirki::add_field( 'cl_june', array(
			'settings' => 'blog_slider_lazyload',
			'label'    => esc_html__( 'Enable Slider Lazy Load', 'june' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'june' ),
				0 => esc_attr__( 'Off', 'june' ),
			),
		) );
		

		
		Kirki::add_field( 'cl_june', array(
			'settings' => 'blog_slider_effect',
			'label'    => esc_html__( 'Blog Slider Direction', 'june' ),
			
			'section'  => 'cl_blog',
			'type'     => 'select',
			'priority' => 10,
			'default'  => 'scroll',
			'choices'     => array(
				'scroll'  => esc_attr__( 'Scroll', 'june' ),
				'fade'  => esc_attr__( 'Fade', 'june' ),
				'cube'  => esc_attr__( 'Cube', 'june' ),
				'coverflow'  => esc_attr__( 'Coverflow', 'june' ),
				'flip'  => esc_attr__( 'Flip', 'june' ),
			),
		) );
		
		
		Kirki::add_field( 'cl_june', array(
		    'type' => 'slider',
		    'settings' => 'blog_slider_speed',
			'label' => esc_html__( 'Blog Slider Speed', 'june' ),
			'tooltip' => esc_html__( 'Leave 0 to remove autoplay', 'june' ),
			'default' => 0,
			'choices'     => array(
				'min'  => '0',
				'max'  => '5000',
				'step' => '100',
			),
			'inline_control' => true,
			'section'  => 'cl_blog',
			
    	));
		
		
		Kirki::add_field( 'cl_june', array(
		    		
		   'settings' => 'blog_divider_10',
		   'label'    => '',
		   'section'  => 'cl_blog',
		   'type'     => 'groupdivider',
		   'into_group' => true,
		    			
		) );
		    	
		Kirki::add_field( 'cl_june', array(
		    		
		   'settings' => 'blog_single_blog_title',
		   'label'    => esc_html__( 'Single Blog', 'june' ),
		   'section'  => 'cl_blog',
		   'type'     => 'grouptitle',
		   'into_group' => true,
		
		) );
		
		
		
		Kirki::add_field( 'cl_june', array(
			'settings' => 'single_blog_author_box',
			'label'    => esc_html__( 'Single Blog Author Info', 'june' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'june' ),
				0 => esc_attr__( 'Off', 'june' ),
			),
		) );

		Kirki::add_field( 'cl_june', array(
			'settings' => 'single_blog_related',
			'label'    => esc_html__( 'Single Blog Related Posts', 'june' ),
			
			'section'  => 'cl_blog',
			'type'     => 'switch',
			'priority' => 10,
			'default'  => 1,
			'choices'     => array(
				1  => esc_attr__( 'On', 'june' ),
				0 => esc_attr__( 'Off', 'june' ),
			),
		) );	

?>