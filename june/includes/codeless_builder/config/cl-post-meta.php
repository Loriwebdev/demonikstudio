<?php



Cl_Post_Meta::map(array(
   
   'post_type' => 'page',
   'feature' => 'page_options_title',
   'meta_key' => 'page_options_title',
   'control_type' => 'grouptitle',
   'label' => esc_attr__( 'Page Options', 'june' ),
   'priority' => 1,
   'inline_control' => true,
   'id' => 'page_options_title',
   'transport' => 'auto', 
   'default' => 'default',
   
));


// ---------- Page Layout -------------
Cl_Post_Meta::map(array(
   
   'post_type' => array('page', 'post', 'portfolio', 'career'),
   'feature' => 'page_layout',
   'priority' => 2,
   'meta_key' => 'page_layout',
   'control_type' => 'kirki-select',
   'label' => esc_attr__( 'Page Layout', 'june' ),
   'choices'     => array(
      'default'  => esc_attr__( 'Default', 'june' ),
      'fullwidth' => esc_attr__( 'Fullwidth', 'june' ),
      'left_sidebar' => esc_attr__( 'Left Sidebar', 'june' ),
      'right_sidebar' => esc_attr__( 'Right Sidebar', 'june' ),
      'dual' => esc_attr__( 'Dual', 'june' ),
   ),
   'group_in' => 'general',
   'inline_control' => true,
   'id' => 'page_layout',
   'transport' => 'auto', 
   'default' => 'default'
   
));

$sidebars = codeless_get_registered_sidebars(true);

Cl_Post_Meta::map(array(
   
   'post_type' => array('page'),
   'feature' => 'page_custom_sidebar',
   'priority' => 2,
   'meta_key' => 'page_custom_sidebar',
   'control_type' => 'kirki-select',
   'label' => esc_attr__( 'Page Custom Sidebar', 'june' ),
   'choices'     => $sidebars,
   'tooltip' => 'This will overwrite all other options on sidebars.',
   'group_in' => 'general',
   'inline_control' => true,
   'id' => 'page_custom_sidebar',
   'transport' => 'auto', 
   'default' => 'default'
   
));


Cl_Post_Meta::map(array(
   
   'post_type' => array('page'),
   'feature' => 'sidebar_column_width',
   'priority' => 2,
   'meta_key' => 'sidebar_column_width',
   'control_type' => 'kirki-select',
   'label' => esc_attr__( 'Sidebar Width', 'june' ),
   'choices'     => array(
      '3' => '1/4',
      '4' => '1/3'
   ),
   'tooltip' => 'Specify a different width size for sidebar on this page.',
   'group_in' => 'general',
   'inline_control' => true,
   'id' => 'sidebar_column_width',
   'transport' => 'auto', 
   'default' => '3'
   
));


// ---------- Page Fullwidth Content -------------
Cl_Post_Meta::map(array(
   
   'post_type' => 'page',
   'priority' => 2,
   'feature' => 'layout_modern',
   'meta_key' => 'layout_modern',
   'control_type' => 'kirki-select',
   'label' => esc_attr__( 'Page Layout Modern', 'june' ),
   'tooltip' => 'Works only with layouts with sidebar. Adds a modern sidebar layout. Split the layout in two parts like in the example. Change color of sidebar part on Global Styling.',
   'choices'     => array(
      'default'  => esc_attr__( 'Default', 'june' ),
      '0' => esc_attr__( 'No', 'june' ),
      '1' => esc_attr__( 'Yes', 'june' )
   ),
   'group_in' => 'general',
   'inline_control' => true,
   'id' => 'layout_modern',
   'transport' => 'postMessage', 
   'default' => 'default'
   
));

// ---------- Page Fullwidth Content -------------
Cl_Post_Meta::map(array(
   
   'post_type' => 'page',
   'priority' => 2,
   'feature' => 'page_fullwidth_content',
   'meta_key' => 'page_fullwidth_content',
   'control_type' => 'kirki-select',
   'label' => esc_attr__( 'Page Fullwidth Content', 'june' ),
   'tooltip' => esc_attr__( 'Remove container from page and show page content from left of the screen to the right', 'june' ),
   'choices'     => array(
      1  => esc_attr__( 'On', 'june' ),
      0 => esc_attr__( 'Off', 'june' ),
   ),
   'group_in' => 'general',
   'inline_control' => true,
   'id' => 'page_fullwidth_content',
   'transport' => 'postMessage', 
   'default' => 0
   
));


// ---------- Page BG Color -------------
Cl_Post_Meta::map(array(
   
   'post_type' => array('page', 'portfolio', 'career'),
   'priority' => 3,
   'feature' => 'page_bg_color',
   'meta_key' => 'page_bg_color',
   'control_type' => 'kirki-color',
   'tooltip' => esc_attr__( 'Actual Page Content Background Color', 'june' ),
   'label' => esc_attr__( 'Page Content BG Color', 'june' ),
   'choices'     => array(
      'on'  => esc_attr__( 'On', 'june' ),
      'off' => esc_attr__( 'Off', 'june' ),
   ),
   'group_in' => 'general',
   'inline_control' => true,
   'id' => 'page_bg_color',
   'transport' => 'postMessage'
   
));





// ---------- One Page -------------
Cl_Post_Meta::map(array(
   
   'post_type' => 'page',
   'feature' => 'one_page',
   'priority' => 3,
   'meta_key' => 'one_page',
   'control_type' => 'kirki-select',
   'label' => 'Page as One Page',
   'tooltip' => esc_attr( 'Make this page acts as a one page. Please add a custom id for each section and connect it with a menu item.', 'june' ),
   'choices'     => array(
      1  => esc_attr__( 'On', 'june' ),
      0 => esc_attr__( 'Off', 'june' ),
   ),
   'group_in' => 'general',
   'inline_control' => true,
   'id' => 'one_page',
   'transport' => 'auto', 
   'default' => 0
   
));




Cl_Post_Meta::map(array(
   
   'post_type' => array('page', 'post', 'portfolio', 'career'),
   'feature' => 'header_color',
   'priority' => 4,
   'meta_key' => 'header_color',
   'control_type' => 'kirki-select',
   'label' => 'Header Color',
   'choices'     => array(
      'default'  => esc_attr__( 'Default', 'june' ),
      'dark' => esc_attr__( 'Dark', 'june' ),
      'light' => esc_attr__( 'Light', 'june' ),
   ),
   'group_in' => 'general',
   'tooltip' => esc_attr__( 'General Header Color for this page. If you use Codeless Slider and Header Transparent (on top of page), for each slide, you can select custom header color on: slide Row -> Design -> Text Color', 'june' ) ,
   'inline_control' => true,
   'id' => 'header_color',
   'transport' => 'postMessage', 
   'default' => 'default'
   
));

// ---------- Transparent Header -------------
Cl_Post_Meta::map(array(
   
   'post_type' => array('page', 'post', 'portfolio', 'career'),
   'feature' => 'transparent_header',
   'priority' => 4,
   'meta_key' => 'transparent_header',
   'control_type' => 'kirki-select',
   'label' => esc_attr__( 'Header Over Content (Transparent)', 'june' ),
   'tooltip' => esc_attr__( 'Show Header above (over) of page content, you can make it transparent or add a small opacity', 'june' ),
   'choices'     => array(
      'default'  => esc_attr__( 'Default', 'june' ),
      'transparent' => esc_attr__( 'Transparent Header', 'june' ),
      'no_transparent' => esc_attr__( 'No Transparent', 'june' ),
   ),
   'group_in' => 'general',
   'inline_control' => true,
   'id' => 'transparent_header',
   'transport' => 'postMessage', 
   'default' => 'default'
   
));

Cl_Post_Meta::map(array(
   
   'post_type' => 'page',
   'feature' => 'page_background_image',
   'priority' => 4,
   'meta_key' => 'page_background_image',
   'control_type' => 'kirki-select',
   'label' => 'Use Featured Image as Page BG Image',
   'choices'     => array(
      'no'  => esc_attr__( 'No', 'june' ),
      'yes' => esc_attr__( 'Yes', 'june' )
   ),
   'group_in' => 'general',
   'inline_control' => true,
   'id' => 'page_background_image',
   'transport' => 'postMessage', 
   'default' => 'yes'
   
));

Cl_Post_Meta::map(array(
   
   'post_type' => 'page',
   'feature' => 'page_show_footer',
   'priority' => 4,
   'meta_key' => 'page_show_footer',
   'control_type' => 'kirki-select',
   'label' => 'Show Footer on this page',
   'choices'     => array(
      'yes' => esc_attr__( 'Yes', 'june' ),
      'no'  => esc_attr__( 'No', 'june' ),
   ),
   'group_in' => 'general',
   'inline_control' => true,
   'id' => 'page_show_footer',
   'transport' => 'postMessage', 
   'default' => 'yes'
   
));

Cl_Post_Meta::map(array(
   
   'post_type' => 'page',
   'feature' => 'page_inner_content_padding_top',
   'meta_key' => 'page_inner_content_padding_top',
   'control_type' => 'kirki-slider',
 
   'label' => esc_attr__( 'Inner Content Padding Top', 'june' ),
   'tooltip' => 'Leave empty to use the default Theme Option value on Customizer -> Layout. Value without PX, for ex: write "30"',
   'priority' => 4,
   'group_in' => 'general',
   'id' => 'page_inner_content_padding_top',
   'transport' => 'postMessage', 
   'default' => '',
   
));

Cl_Post_Meta::map(array(
   
   'post_type' => 'page',
   'feature' => 'page_inner_content_padding_bottom',
   'meta_key' => 'page_inner_content_padding_bottom',
   'control_type' => 'kirki-slider',

   'label' => esc_attr__( 'Inner Content Padding Bottom', 'june' ),
   'tooltip' => 'Leave empty to use the default Theme Option value on Customizer -> Layout. Value without PX, for ex: write "30"',
   'priority' => 4,
   'group_in' => 'general',
   'id' => 'page_inner_content_padding_bottom',
   'transport' => 'postMessage', 
   'default' => '',
   
));


// --------- Header Color --------------------



// --------------------- Other Page dividers --------------------------------
Cl_Post_Meta::map(array(
   
   'post_type' => 'page',
   'feature' => 'other_page_options_divider',
   'meta_key' => 'other_page_options_divider',
   'control_type' => 'groupdivider',
   'label' => '',
   'priority' => 8,
   'inline_control' => true,
   'id' => 'other_page_options_divider',
   'transport' => 'auto', 
   'default' => 'default'
   
));

Cl_Post_Meta::map(array(
   'priority' => 9,
   'post_type' => 'page',
   'feature' => 'other_page_options_title',
   'meta_key' => 'other_page_options_title',
   'control_type' => 'grouptitle',
   'label' => esc_attr__( 'WP Default', 'june' ),
   'inline_control' => true,
   'id' => 'other_page_options_title',
   'transport' => 'auto', 
   'default' => 'default'
   
));



// Post


Cl_Post_Meta::map(array(
   
   'post_type' => 'post',
   'feature' => 'post_masonry_layout',
   'meta_key' => 'post_masonry_layout',
   'control_type' => 'kirki-select',
   'label' => esc_attr__( 'Masonry Layout', 'june' ),
   'tooltip' => esc_attr__( 'Used only with a blog masonry layout.', 'june' ),
   'choices'     => array(
      'default'  => esc_attr__( 'Default', 'june' ),
      'wide' => esc_attr__( 'Wide', 'june' )
   ),
   'group_in' => 'post_data',
   'inline_control' => true,
   'id' => 'post_masonry_layout',
   'transport' => 'auto', 
   'default' => 'default',
   /*'cl_required'    => array(
         'setting'  => 'blog_style',
         'operator' => '==',
         'value'    => 'masonry',
   ),*/
   
));

Cl_Post_Meta::map(array(
   
   'post_type' => 'post',
   'feature' => 'post_style',
   'meta_key' => 'post_style',
   'control_type' => 'kirki-select',
   'label' => esc_attr__( 'Post Style', 'june' ),
   'choices'     => array(
      'classic'  => esc_attr__( 'Classic', 'june' ),
      'fullwidth'  => esc_attr__( 'Modern', 'june' )
   ),
   'group_in' => 'post_data',
   'inline_control' => true,
   'id' => 'post_style',
   'transport' => 'refresh', 
   'default' => 'default',
   'priority' => 1,
));


// Single Portfolio


Cl_Post_Meta::map(array(
   
   'post_type' => 'portfolio',
   'feature' => 'portfolio_item_format',
   'meta_key' => 'portfolio_item_format',
   'control_type' => 'kirki-select',
   'label' => esc_attr__( 'Portfolio Item Format', 'june' ),
   'priority' => 1,
   'choices'     => array(
      'thumbnail'  => esc_attr__( 'Thumbnail', 'june' ),
      'slider' => esc_attr__( 'Slider', 'june' ),
      'Video' => esc_attr__( 'Video', 'june' ),
   ),
   'group_in' => 'portfolio_data',
   'inline_control' => true,
   'id' => 'portfolio_item_format',
   'transport' => 'auto', 
   'default' => 'thumbnail',
   
));

Cl_Post_Meta::map(array(
   
   'post_type' => 'portfolio',
   'feature' => 'portfolio_masonry_layout',
   'meta_key' => 'portfolio_masonry_layout',
   'control_type' => 'kirki-select',
   'label' => esc_attr__( 'Masonry Layout', 'june' ),
   'priority' => 1,
   'choices'     => array(
      'default'  => esc_attr__( 'Default', 'june' ),
      'large' => esc_attr__( 'Large', 'june' ),
      'wide'  => esc_attr__( 'Wide', 'june' ),
      'long' => esc_attr__( 'Long', 'june' ),
   ),
   'group_in' => 'portfolio_data',
   'inline_control' => true,
   'id' => 'portfolio_masonry_layout',
   'transport' => 'auto', 
   'default' => 'default',
   
));


Cl_Post_Meta::map(array(
   
   'post_type' => 'portfolio',
   'feature' => 'portfolio_custom_link',
   'meta_key' => 'portfolio_custom_link',
   'control_type' => 'text',
   'dynamic' => true,
   'label' => esc_attr__( 'Custom Link', 'june' ),
   'priority' => 1,
   'group_in' => 'portfolio_data',
   'id' => 'portfolio_custom_link',
   'transport' => 'postMessage', 
   'default' => '',
   
));


Cl_Post_Meta::map(array(
   
   'post_type' => 'portfolio',
   'feature' => 'portfolio_furniture_subtitle',
   'meta_key' => 'portfolio_furniture_subtitle',
   'control_type' => 'text',
   'dynamic' => true,
   'label' => esc_attr__( 'Furniture Style Subtitle', 'june' ),
   'priority' => 1,
   'group_in' => 'portfolio_data',
   'id' => 'portfolio_furniture_subtitle',
   'transport' => 'postMessage', 
   'default' => '',
   
));



// Single Staff


Cl_Post_Meta::map(array(
   
   'post_type' => 'staff',
   'feature' => 'staff_position',
   'meta_key' => 'staff_position',
   'control_type' => 'text',
   'dynamic' => true,
   'label' => esc_attr__( 'Staff Position', 'june' ) ,
   'priority' => 1,
   'group_in' => 'staff_data',
   'id' => 'staff_position',
   'transport' => 'postMessage', 
   'default' => 'Developer',
   
));





$socials = codeless_get_team_social_list();
if( ! empty($socials) ):

   foreach($socials as $social):

      Cl_Post_Meta::map(array(
         
         'post_type' => 'staff',
         'feature' => $social['id'].'_link',
         'meta_key' => $social['id'].'_link',
         'control_type' => 'text',
         'label' => ucfirst($social['id']),
         'priority' => 1,
         'group_in' => 'staff_social',
         'dynamic' => true,
         'id' => $social['id'].'_link',
         'transport' => 'auto', 
         'default' => '',
         
      ));

   endforeach;

endif;



/* Product */

Cl_Post_Meta::map(array(
   
   'post_type' => 'product',
   'feature' => 'product_style',
   'meta_key' => 'product_style',
   'control_type' => 'kirki-select',
   'label' => esc_attr__( 'Product Single Style', 'june' ),
   'priority' => 1,
   'choices'     => array(
      'none' => esc_attr__( 'Global Default (from Theme Options)', 'june' ),
      'default'  => esc_attr__( 'Default', 'june' ),
      'wide' => esc_attr__( 'Wide & Vertical Thumbs', 'june' ),
      'fixed_recommanded' => esc_attr__( 'Fixed recommanded products', 'june' ),
      'center' => esc_attr__( 'All Centered', 'june' ),
      'wide_horizontal' => esc_attr__( 'Wide & Horizontal Thumbs', 'june' ),
      'long_gallery' => esc_attr__( 'Long Gallery Images', 'june' ),
      'wide_full_image' => esc_attr__( 'Wide Full Image', 'june' ),
      'boxed' => esc_attr__( 'Boxed Content', 'june' ),
   ),
   'group_in' => 'product_data',
   'inline_control' => true,
   'id' => 'product_style',
   'transport' => 'auto', 
   'default' => 'none',
   
));

Cl_Post_Meta::map(array(
   
   'post_type' => 'product',
   'priority' => 3,
   'feature' => 'summary_bg_color',
   'meta_key' => 'summary_bg_color',
   'control_type' => 'kirki-color',
   'tooltip' => esc_attr__( '', 'june' ),
   'label' => esc_attr__( 'Slider & Summary BG Color', 'june' ),
   'choices'     => array( 
      'on'  => esc_attr__( 'On', 'june' ),
      'off' => esc_attr__( 'Off', 'june' ),
   ),
   'group_in' => 'product_data',
   'inline_control' => true,
   'id' => 'summary_bg_color',
   'transport' => 'postMessage'
   
));

Cl_Post_Meta::map(array(
   
   'post_type' => 'product',
   'feature' => 'product_builder_content',
   'meta_key' => 'product_builder_content',
   'control_type' => 'kirki-select',
   'label' => esc_attr__( 'Product Builder Content', 'june' ),
   'priority' => 1,
   'choices'  =>   codeless_get_pages(),
   'group_in' => 'product_data',
   'inline_control' => true,
   'id' => 'product_builder_content',
   'transport' => 'auto', 
   'default' => 'none',
   
));



Cl_Post_Meta::map(array(
   
   'post_type' => 'product',
   'feature' => 'with_two_img',
   'meta_key' => 'with_two_img',
   'control_type' => 'kirki-select',
   'label' => esc_attr__( 'Show another image on hover', 'june' ),
   'priority' => 1,
   'choices'     => array(
      0  => esc_attr__( 'Off', 'june' ),
      1 => esc_attr__( 'On', 'june' )
   ),
   'group_in' => 'product_data',
   'inline_control' => true,
   'id' => 'with_two_img',
   'transport' => 'auto', 
   'default' => 0,
   
));

Cl_Post_Meta::map(array(
   
   'post_type' => 'product',
   'feature' => 'masonry_layout',
   'meta_key' => 'masonry_layout',
   'control_type' => 'kirki-select',
   'label' => esc_attr__( 'Masonry Layout (used only on masonry style)', 'june' ),
   'priority' => 1,
   'choices'     => array(
      'small'  => esc_attr__( 'Small', 'june' ),
      'horizontal_large' => esc_attr__( 'Horizontal Large', 'june' ),
      'vertical_large' => esc_attr__( 'Vertical Large', 'june' )
   ),
   'group_in' => 'product_data',
   'inline_control' => true,
   'id' => 'masonry_layout',
   'transport' => 'auto', 
   'default' => 0,
   
));


Cl_Post_Meta::map(array(
   
   'post_type' => 'product',
   'feature' => 'product_gifts',
   'meta_key' => 'product_gifts',
   'control_type' => 'textarea',
   'label' => esc_attr__( 'Product Gifts', 'june' ),
   'priority' => 1,
   'group_in' => 'product_data',
   'inline_control' => true,
   'id' => 'product_gifts',
   'transport' => 'auto', 
   'default' => '',
   
));


Cl_Post_Meta::map(array(
   
   'post_type' => 'multiscroll',
   'feature' => 'multiscroll_layout',
   'priority' => 2,
   'meta_key' => 'multiscroll_layout',
   'control_type' => 'kirki-select',
   'label' => esc_attr__( 'Layout', 'june' ),
   'choices'     => array(
      'left_right'  => esc_attr__( 'Left - Right (image right)', 'june' ),
      'right_left' => esc_attr__( 'Right - Left (image left)', 'june' ),
   ),
   'group_in' => 'multiscroll_section',
   'inline_control' => true,
   'id' => 'multiscroll_layout',
   'transport' => 'auto', 
   'default' => 'left_right'
   
));

?>