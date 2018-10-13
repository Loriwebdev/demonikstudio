<?php
/*vc_remove_element("vc_row_inner");
vc_remove_element("vc_column_inner");*/
vc_remove_element("vc_row");
vc_remove_element("vc_column");
vc_remove_element("vc_column_text");


// Create multi dropdown param type

if( function_exists( 'vc_add_short_param' ) ){
	vc_add_short_param( 'dropdown_multi', 'dropdown_multi_settings_field' );
	function dropdown_multi_settings_field( $param, $value ) {
	   $param_line = '';

	   $param_line .= '<select multiple name="'. esc_attr( $param['param_name'] ).'" class="wpb_vc_param_value wpb-input wpb-select '. esc_attr( $param['param_name'] ).' '. esc_attr($param['type']).'">';
	   foreach ( $param['value'] as $text_val => $val ) {
	       if ( is_numeric($text_val) && (is_string($val) || is_numeric($val)) ) {
	                    $text_val = $val;
	                }
	              
	                $selected = '';

	                if(!is_array($value)) {
	                    $param_value_arr = explode(',',$value);
	                } else {
	                    $param_value_arr = $value;
	                }

	                if ($value!=='' && in_array($val, $param_value_arr)) {
	                    $selected = ' selected="selected"';
	                }
	                $param_line .= '<option class="'.$val.'" value="'.$val.'"'.$selected.'>'.$text_val.'</option>';
	            }
	   $param_line .= '</select>';

	   return  $param_line;
	}
}


vc_map( array (
	'base' => 'cl_row',
  	'name' => __( 'Row', 'june' ),
	'is_container' => true,
	'icon' => 'icon-wpb-row',
	'show_settings_on_create' => false,
	'category' => __( 'Content', 'june' ),
	'class' => 'vc_main-sortable-element',
	'description' => __( 'Place content elements inside the row', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_row' ),
	'js_view' => 'VcRowView'
));


vc_map( array (
	'base' => 'cl_column',
	'name' => __( 'Column', 'june' ),
	'icon' => 'icon-wpb-row',
	'is_container' => true,
	'content_element' => false,
	'description' => __( 'Place content elements inside the column', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_column', array(
			'type' => 'dropdown',
			'heading' => __( 'Width', 'june' ),
			'param_name' => 'width',
			'value' => array(
				__( '1 column - 1/12', 'june' ) => '1/12',
				__( '2 columns - 1/6', 'june' ) => '1/6',
				__( '3 columns - 1/4', 'june' ) => '1/4',
				__( '4 columns - 1/3', 'june' ) => '1/3',
				__( '5 columns - 5/12', 'june' ) => '5/12',
				__( '6 columns - 1/2', 'june' ) => '1/2',
				__( '7 columns - 7/12', 'june' ) => '7/12',
				__( '8 columns - 2/3', 'june' ) => '2/3',
				__( '9 columns - 3/4', 'june' ) => '3/4',
				__( '10 columns - 5/6', 'june' ) => '5/6',
				__( '11 columns - 11/12', 'june' ) => '11/12',
				__( '12 columns - 1/1', 'june' ) => '1/1',
			),
			'group' => __( 'General', 'june' ),
			'description' => __( 'Select column width.', 'june' ),
			'std' => '1/1',
		) ),
	'js_view' => 'VcColumnView',
));


vc_map( array(
	'base' => 'cl_row_inner',
	'name' => __( 'Inner Row', 'june' ),
	//Inner Row
	'content_element' => false,
	'is_container' => true,
	'icon' => 'icon-wpb-row',
	'weight' => 1000,
	'show_settings_on_create' => false,
	'description' => __( 'Place content elements inside the inner row', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_row_inner' ),
	'js_view' => 'VcRowView',
));


vc_map( array(
	'base' => 'cl_column_inner',
	'name' => __( 'Inner Column', 'june' ),
	'icon' => 'icon-wpb-row',
	'class' => '',
	'wrapper_class' => '',
	'controls' => 'full',
	'allowed_container_element' => false,
	'content_element' => false,
	'is_container' => true,
	'description' => __( 'Place content elements inside the inner column', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_column_inner', array(
			'type' => 'dropdown',
			'heading' => __( 'Width', 'june' ),
			'param_name' => 'width',
			'value' => array(
				__( '1 column - 1/12', 'june' ) => '1/12',
				__( '2 columns - 1/6', 'june' ) => '1/6',
				__( '3 columns - 1/4', 'june' ) => '1/4',
				__( '4 columns - 1/3', 'june' ) => '1/3',
				__( '5 columns - 5/12', 'june' ) => '5/12',
				__( '6 columns - 1/2', 'june' ) => '1/2',
				__( '7 columns - 7/12', 'june' ) => '7/12',
				__( '8 columns - 2/3', 'june' ) => '2/3',
				__( '9 columns - 3/4', 'june' ) => '3/4',
				__( '10 columns - 5/6', 'june' ) => '5/6',
				__( '11 columns - 11/12', 'june' ) => '11/12',
				__( '12 columns - 1/1', 'june' ) => '1/1',
			),
			'group' => __( 'General', 'june' ),
			'description' => __( 'Select column width.', 'june' ),
			'std' => '1/1',
		) ),
));

vc_map( array(
	'base' => 'cl_text',
	'name' => __( 'Text', 'june' ),
	'icon' => 'icon-wpb-layer-shape-text',
	'wrapper_class' => 'clearfix',
	'category' => __( 'Content', 'june' ),
	'description' => __( 'A block of text with WYSIWYG editor', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_text' ),
));

class WPBakeryShortCode_CL_Text extends WPBakeryShortCode { }

vc_map( array(
	'base' => 'cl_custom_heading',
	'name' => __( 'Custom Heading', 'june' ),
	'icon' => 'icon-wpb-ui-custom_heading',
	'wrapper_class' => 'clearfix',
	'category' => __( 'Content', 'june' ),
	'show_settings_on_create' => true,
	'description' => __( 'Text with Google fonts', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_custom_heading' ),
));

class WPBakeryShortCode_CL_Custom_Heading extends WPBakeryShortCode { }

vc_map( array(
	'base' => 'cl_service',
	'name' => __( 'Service', 'june' ),
	'icon' => 'icon-wpb-vc_icon',
	'wrapper_class' => 'clearfix',
	'category' => __( 'Content', 'june' ),
	'show_settings_on_create' => true,
	'description' => __( 'Build a service Element', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_service' ),
));

class WPBakeryShortCode_CL_Service extends WPBakeryShortCode { }



vc_map( array (
	'base' => 'cl_slider',
  	'name' => __( 'Slider - can be edited only on customizer', 'june' ),
	'is_container' => true,
	'icon' => 'icon-wpb-row',
	'show_settings_on_create' => false,
	'category' => __( 'Content', 'june' ),
	'class' => 'vc_main-sortable-element',
	'description' => __( 'Can be edited only on Customizer', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_slider' ),
));

class WPBakeryShortCode_CL_Slider extends WPBakeryShortCode { }

vc_map( array (
	'base' => 'cl_media',
  	'name' => __( 'Media', 'june' ),
	'icon' => 'icon-wpb-single-image',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'june' ),
	'description' => __( 'Simple image with CSS animation', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_media' ),
));

class WPBakeryShortCode_CL_Media extends WPBakeryShortCode { }


vc_map( array (
	'base' => 'cl_page_header',
  	'name' => __( 'Page Header', 'june' ),
	'is_container' => true,
	'icon' => 'icon-wpb-row',
	'show_settings_on_create' => false,
	'category' => __( 'Content', 'june' ),
	'class' => 'vc_main-sortable-element',
	'description' => __( 'Can be edited only on Customizer', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_page_header' ),
));

class WPBakeryShortCode_CL_Page_Header extends WPBakeryShortCode { }


vc_map( array (
	'base' => 'cl_button',
  	'name' => __( 'Button', 'june' ),
	'icon' => 'icon-wpb-ui-button',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'june' ),
	'description' => __( 'Add a button', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_button' ),
));

class WPBakeryShortCode_CL_Button extends WPBakeryShortCode { }


vc_map( array (
	'base' => 'cl_divider',
  	'name' => __( 'Divider', 'june' ),
	'icon' => 'icon-wpb-ui-separator',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'june' ),
	'description' => __( 'Add a divider element between elements', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_divider' ),
));

class WPBakeryShortCode_CL_Divider extends WPBakeryShortCode { }


vc_map( array (
	'base' => 'cl_gallery',
  	'name' => __( 'Gallery', 'june' ),
	'icon' => 'icon-wpb-images-stack',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'june' ),
	'description' => __( 'Add a gallery of images', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_gallery' ),
));

class WPBakeryShortCode_CL_Gallery extends WPBakeryShortCode { }

vc_map( array (
	'base' => 'cl_clients',
  	'name' => __( 'Clients', 'june' ),
	'icon' => 'icon-wpb-images-stack',
	'show_settings_on_create' => true,
	'category' => __( 'Clients', 'june' ),
	'description' => __( 'Add clients carousel', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_clients' ),
));

class WPBakeryShortCode_CL_Clients extends WPBakeryShortCode { }

vc_map( array (
	'base' => 'cl_empty_space',
  	'name' => __( 'Empty Space', 'june' ),
	'icon' => 'icon-wpb-ui-empty_space',
	'show_settings_on_create' => true,
	'category' => __( 'Empty Space', 'june' ),
	'description' => __( 'Empty Space between elements', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_empty_space' ),
));

class WPBakeryShortCode_CL_Empty_Space extends WPBakeryShortCode { }


vc_map( array (
	'base' => 'cl_counter',
  	'name' => __( 'Counter', 'june' ),
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'june' ),
	'description' => __( 'Counter element', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_counter' ),
));

class WPBakeryShortCode_CL_Counter extends WPBakeryShortCode { }


vc_map( array (
	'base' => 'cl_countdown',
  	'name' => __( 'Countdown', 'june' ),
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_countdown' ),
));

class WPBakeryShortCode_CL_Countdown extends WPBakeryShortCode { }


vc_map( array (
	'base' => 'cl_progress_bar',
  	'name' => __( 'Progress Bar', 'june' ),
	'icon' => 'icon-wpb-graph',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_progress_bar' ),
));

class WPBakeryShortCode_CL_Progress_Bar extends WPBakeryShortCode { }


vc_map( array (
	'base' => 'cl_map',
  	'name' => __( 'Google Map', 'june' ),
	'icon' => 'icon-wpb-map-pin',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_map' ),
));

class WPBakeryShortCode_CL_Map extends WPBakeryShortCode { }


vc_map( array (
	'base' => 'cl_contact_form7',
  	'name' => __( 'Contact Form 7', 'june' ),
	'icon' => 'icon-wpb-contactform7',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_contact_form7' ),
));

class WPBakeryShortCode_CL_Contact_Form7 extends WPBakeryShortCode { }


vc_map( array (
	'base' => 'cl_icon',
  	'name' => __( 'Icon', 'june' ),
	'icon' => 'icon-wpb-vc_icon',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_icon' ),
));

class WPBakeryShortCode_CL_Icon extends WPBakeryShortCode { }


vc_map( array (
	'base' => 'cl_share',
  	'name' => __( 'Share Buttons', 'june' ),
	'icon' => 'icon-wpb-balloon-facebook-left',
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_share' ),
));

class WPBakeryShortCode_CL_Share extends WPBakeryShortCode { }


vc_map( array (
	'base' => 'cl_socialicon',
  	'name' => __( 'Social Icons', 'june' ),
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_socialicon' ),
));

class WPBakeryShortCode_CL_Socialicon extends WPBakeryShortCode { }


vc_map( array (
	'base' => 'cl_revslider',
  	'name' => __( 'Revolution Slider', 'june' ),
  	'icon' => 'icon-wpb-revslider',
  	
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_revslider' ),
));

class WPBakeryShortCode_CL_Revslider extends WPBakeryShortCode { }



vc_map( array (
	'base' => 'cl_layerslider',
  	'name' => __( 'Layer Slider', 'june' ),
  	'icon' => 'icon-wpb-layerslider',
  	
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_layerslider' ),
));

class WPBakeryShortCode_CL_Layerslider extends WPBakeryShortCode { }



vc_map( array (
	'base' => 'cl_custom_code',
  	'name' => __( 'Custom Code', 'june' ),
  	'icon' => 'icon-wpb-raw-html',
  	
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_custom_code' ),
));

class WPBakeryShortCode_CL_Custom_Code extends WPBakeryShortCode { }



if( function_exists( 'mc4wp_show_form' ) ){

	vc_map( array (
		'base' => 'cl_mailchimp',
	  	'name' => __( 'Mailchimp', 'june' ),
		'show_settings_on_create' => true,
		'category' => __( 'Content', 'june' ),
		'params' => codeless_generate_backend_params( 'cl_mailchimp' ),
	));

	class WPBakeryShortCode_CL_Mailchimp extends WPBakeryShortCode { }

}


vc_map( array (
	'base' => 'cl_widget_sidebar',
  	'name' => __( 'Widget Sidebar', 'june' ),
  	'icon' => 'icon-wpb-wp',
  	
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_widget_sidebar' ),
));

class WPBakeryShortCode_CL_Widget_Sidebar extends WPBakeryShortCode { }



vc_map( array (
	'base' => 'cl_hotspot',
  	'name' => __( 'Hotspot Point', 'june' ),
  	
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_hotspot' ),
));

class WPBakeryShortCode_CL_Hotspot extends WPBakeryShortCode { }


vc_map( array (
	'base' => 'cl_multiscroll',
  	'name' => __( 'Multiscroll Slider', 'june' ),
  	
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_multiscroll' ),
));

class WPBakeryShortCode_CL_Multiscroll extends WPBakeryShortCode { }


vc_map( array (
	'base' => 'cl_testimonial',
  	'name' => __( 'Testimonial', 'june' ),
  	
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_testimonial' ),
));

class WPBakeryShortCode_CL_Testimonial extends WPBakeryShortCode { }



vc_map( array (
	'base' => 'cl_blog',
  	'name' => __( 'Blog', 'june' ),
 
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_blog' ),
));

class WPBakeryShortCode_CL_Blog extends WPBakeryShortCode { }



vc_map( array (
	'base' => 'cl_team',
  	'name' => __( 'Team', 'june' ),
 
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_team' ),
));

class WPBakeryShortCode_CL_Team extends WPBakeryShortCode { }


vc_map( array (
	'base' => 'cl_portfolio',
  	'name' => __( 'Portfolio', 'june' ),
 
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_portfolio' ),
));

class WPBakeryShortCode_CL_Portfolio extends WPBakeryShortCode { }


vc_map( array (
	'base' => 'cl_portfolio_nav',
  	'name' => __( 'Portfolio Nav', 'june' ),
 
	'show_settings_on_create' => true,
	'category' => __( 'Content', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_portfolio_nav' ),
));

class WPBakeryShortCode_CL_Portfolio_Nav extends WPBakeryShortCode { }


vc_map( array (
	'base' => 'cl_toggles',
  	'name' => __( 'Toggles', 'june' ),
 	'is_container' => true,
	'show_settings_on_create' => true,
	'as_parent' => array(
		'only' => 'cl_toggle',
	),
	'js_view' => 'VcColumnView',
	'category' => __( 'Content', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_toggles' ),
));

class WPBakeryShortCode_CL_Toggles extends WPBakeryShortCodesContainer { }


vc_map( array (
	'base' => 'cl_toggle',
  	'name' => __( 'Toggle', 'june' ),
	'is_container' => true,
	'category' => __( 'Content', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_toggle' ),
	'as_child' => array(
		'only' => 'cl_toggles',
	),

));

class WPBakeryShortCode_CL_Toggle extends WPBakeryShortCodesContainer { }



vc_map( array (
	'base' => 'cl_tabs',
  	'name' => __( 'Tabs', 'june' ),
 	'is_container' => true,
	'show_settings_on_create' => true,
	'as_parent' => array(
		'only' => 'cl_tab',
	),
	'js_view' => 'VcColumnView',
	'category' => __( 'Content', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_tabs' ),
));

class WPBakeryShortCode_CL_Tabs extends WPBakeryShortCodesContainer { }


vc_map( array (
	'base' => 'cl_tab',
  	'name' => __( 'Tab', 'june' ),
	'is_container' => true,
	'category' => __( 'Content', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_tab' ),
	'as_child' => array(
		'only' => 'cl_tabs',
	),
));

class WPBakeryShortCode_CL_Tab extends WPBakeryShortCodesContainer { }



vc_map( array (
	'base' => 'cl_pricelist',
  	'name' => __( 'Price List', 'june' ),
 	'is_container' => true,
	'show_settings_on_create' => true,
	'as_parent' => array(
		'only' => 'cl_list_item',
	),
	'js_view' => 'VcColumnView',
	'category' => __( 'Content', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_pricelist' ),
));

class WPBakeryShortCode_CL_Pricelist extends WPBakeryShortCodesContainer { }



vc_map( array (
	'base' => 'cl_list',
  	'name' => __( 'List', 'june' ),
 	'is_container' => true,
	'show_settings_on_create' => true,
	'as_parent' => array(
		'only' => array( 'cl_list_item', 'cl_table_row'),
	),
	'js_view' => 'VcColumnView',
	'category' => __( 'Content', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_list' ),
));

class WPBakeryShortCode_CL_List extends WPBakeryShortCodesContainer { }


vc_map( array (
	'base' => 'cl_list_item',
  	'name' => __( 'List Item', 'june' ),
	'is_container' => false,
	'category' => __( 'List Elements', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_list_item' ),
	'as_child' => array(
		'only' => 'cl_list',
	),
));

class WPBakeryShortCode_CL_List_Item extends WPBakeryShortCode { }


vc_map( array (
	'base' => 'cl_table_row',
  	'name' => __( 'Table Row', 'june' ),
	'is_container' => false,
	'category' => __( 'List Elements', 'june' ),
	'params' => codeless_generate_backend_params( 'cl_table_row' ),
	'as_child' => array(
		'only' => 'cl_list',
	),
));

class WPBakeryShortCode_CL_Table_Row extends WPBakeryShortCode { }





if( class_exists('woocommerce') ){


	vc_map( array (
		'base' => 'cl_woocommerce',
	  	'name' => __( 'Shop', 'june' ),
	 	'icon' => 'icon-wpb-woocommerce',
		'show_settings_on_create' => true,
		'category' => __( 'Content', 'june' ),
		'params' => codeless_generate_backend_params( 'cl_woocommerce' ),
	));

	class WPBakeryShortCode_CL_Woocommerce extends WPBakeryShortCode { }



	vc_map( array (
		'base' => 'cl_shop_tabbed',
	  	'name' => __( 'Shop Tabbed', 'june' ),
	 	'icon' => 'icon-wpb-woocommerce',
		'show_settings_on_create' => true,
		'category' => __( 'Content', 'june' ),
		'params' => codeless_generate_backend_params( 'cl_shop_tabbed' ),
	));

	class WPBakeryShortCode_CL_Shop_Tabbed extends WPBakeryShortCode { }

	vc_map( array (
		'base' => 'cl_shop_trending',
	  	'name' => __( 'Shop Trending', 'june' ),

	 	'icon' => 'icon-wpb-woocommerce',
		'show_settings_on_create' => true,
		'category' => __( 'Content', 'june' ),
		'params' => codeless_generate_backend_params( 'cl_shop_trending' ),
	));

	class WPBakeryShortCode_CL_Shop_Trending extends WPBakeryShortCode { }

}



/**
 * WPBakery WPBakery Page Builder row
 *
 * @package WPBakeryPageBuilder
 *
 */
class WPBakeryShortCode_CL_Row extends WPBakeryShortCode {
	protected $predefined_atts = array(
		'el_class' => '',
	);

	public $nonDraggableClass = 'vc-non-draggable-row';

	/**
	 * @param $settings
	 */
	public function __construct( $settings ) {
		parent::__construct( $settings );
		$this->shortcodeScripts();
	}

	protected function shortcodeScripts() {
		wp_register_script( 'vc_jquery_skrollr_js', vc_asset_url( 'lib/bower/skrollr/dist/skrollr.min.js' ), array( 'jquery' ), WPB_VC_VERSION, true );
		wp_register_script( 'vc_youtube_iframe_api_js', '//www.youtube.com/iframe_api', array(), WPB_VC_VERSION, true );
	}

	protected function content( $atts, $content = null ) {
		$prefix = '';

		return $prefix . $this->loadTemplate( $atts, $content );
	}

	/**
	 * This returs block controls
	 */
	public function getLayoutsControl() {
		global $vc_row_layouts;
		$controls_layout = '<span class="vc_row_layouts vc_control">';
		foreach ( $vc_row_layouts as $layout ) {
			$controls_layout .= '<a class="vc_control-set-column set_columns" data-cells="' . $layout['cells'] . '" data-cells-mask="' . $layout['mask'] . '" title="' . $layout['title'] . '"><i class="vc-composer-icon vc-c-icon-' . $layout['icon_class'] . '"></i></a> ';
		}
		$controls_layout .= '<br/><a class="vc_control-set-column set_columns custom_columns" data-cells="custom" data-cells-mask="custom" title="' . __( 'Custom layout', 'june' ) . '">' . __( 'Custom', 'june' ) . '</a> ';
		$controls_layout .= '</span>';

		return $controls_layout;
	}

	public function getColumnControls( $controls, $extended_css = '' ) {
		$output = '<div class="vc_controls vc_controls-row controls_row vc_clearfix">';
		$controls_end = '</div>';
		//Create columns
		$controls_layout = $this->getLayoutsControl();

		$controls_move = ' <a class="vc_control column_move vc_column-move" href="#" title="' . __( 'Drag row to reorder', 'june' ) . '" data-vc-control="move"><i class="vc-composer-icon vc-c-icon-dragndrop"></i></a>';
		$moveAccess = vc_user_access()->part( 'dragndrop' )->checkStateAny( true, null )->get();
		if ( ! $moveAccess ) {
			$controls_move = '';
		}
		$controls_add = ' <a class="vc_control column_add vc_column-add" href="#" title="' . __( 'Add column', 'june' ) . '" data-vc-control="add"><i class="vc-composer-icon vc-c-icon-add"></i></a>';
		$controls_delete = '<a class="vc_control column_delete vc_column-delete" href="#" title="' . __( 'Delete this row', 'june' ) . '" data-vc-control="delete"><i class="vc-composer-icon vc-c-icon-delete_empty"></i></a>';
		$controls_edit = ' <a class="vc_control column_edit vc_column-edit" href="#" title="' . __( 'Edit this row', 'june' ) . '" data-vc-control="edit"><i class="vc-composer-icon vc-c-icon-mode_edit"></i></a>';
		$controls_clone = ' <a class="vc_control column_clone vc_column-clone" href="#" title="' . __( 'Clone this row', 'june' ) . '" data-vc-control="clone"><i class="vc-composer-icon vc-c-icon-content_copy"></i></a>';
		$controls_toggle = ' <a class="vc_control column_toggle vc_column-toggle" href="#" title="' . __( 'Toggle row', 'june' ) . '" data-vc-control="toggle"><i class="vc-composer-icon vc-c-icon-arrow_drop_down"></i></a>';
		$editAccess = vc_user_access_check_shortcode_edit( $this->shortcode );
		$allAccess = vc_user_access_check_shortcode_all( $this->shortcode );

		if ( is_array( $controls ) && ! empty( $controls ) ) {
			foreach ( $controls as $control ) {
				$control_var = 'controls_' . $control;
				if ( ( $editAccess && 'edit' == $control ) || $allAccess ) {
					if ( isset( ${$control_var} ) ) {
						$output .= ${$control_var};
					}
				}
			}
			$output .= $controls_end;
		} elseif ( is_string( $controls ) ) {
			$control_var = 'controls_' . $controls;
			if ( ( $editAccess && 'edit' === $controls ) || $allAccess ) {
				if ( isset( ${$control_var} ) ) {
					$output .= ${$control_var} . $controls_end;
				}
			}
		} else {
			$row_edit_clone_delete = '<span class="vc_row_edit_clone_delete">';
			if ( $allAccess ) {
				$row_edit_clone_delete .= $controls_delete . $controls_clone . $controls_edit;
			} elseif ( $editAccess ) {
				$row_edit_clone_delete .= $controls_edit;
			}
			$row_edit_clone_delete .= $controls_toggle;
			$row_edit_clone_delete .= '</span>';

			if ( $allAccess ) {
				$output .= $controls_move . $controls_layout . $controls_add . $row_edit_clone_delete . $controls_end;
			} elseif ( $editAccess ) {
				$output .= $row_edit_clone_delete . $controls_end;
			} else {
				$output .= $row_edit_clone_delete . $controls_end;
			}
		}

		return $output;
	}

	public function contentAdmin( $atts, $content = null ) {
		$width = $el_class = '';
		$atts = shortcode_atts( $this->predefined_atts, $atts );

		$output = '';

		$column_controls = $this->getColumnControls( $this->settings( 'controls' ) );

		for ( $i = 0; $i < count( $width ); $i ++ ) {
			$output .= '<div data-element_type="' . $this->settings['base'] . '" class="' . $this->cssAdminClass() . '">';
			$output .= str_replace( '%column_size%', 1, $column_controls );
			$output .= '<div class="wpb_element_wrapper">';
			$output .= '<div class="vc_row vc_row-fluid wpb_row_container vc_container_for_children">';
			if ( '' === $content && ! empty( $this->settings['default_content_in_template'] ) ) {
				$output .= do_shortcode( shortcode_unautop( $this->settings['default_content_in_template'] ) );
			} else {
				$output .= do_shortcode( shortcode_unautop( $content ) );

			}
			$output .= '</div>';
			if ( isset( $this->settings['params'] ) ) {
				$inner = '';
				foreach ( $this->settings['params'] as $param ) {
					if ( ! isset( $param['param_name'] ) ) {
						continue;
					}
					$param_value = isset( $atts[ $param['param_name'] ] ) ? $atts[ $param['param_name'] ] : '';
					if ( is_array( $param_value ) ) {
						// Get first element from the array
						reset( $param_value );
						$first_key = key( $param_value );
						$param_value = $param_value[ $first_key ];
					}
					$inner .= $this->singleParamHtmlHolder( $param, $param_value );
				}
				$output .= $inner;
			}
			$output .= '</div>';
			$output .= '</div>';
		}

		return $output;
	}

	public function cssAdminClass() {
		$sortable = ( vc_user_access_check_shortcode_all( $this->shortcode ) ? ' wpb_sortable' : ' ' . $this->nonDraggableClass );
		$base_ = 'vc_row';
		if( $this->settings['base'] == 'cl_row_inner' )
			$base_ = 'vc_row_inner';

		return 'wpb_' . $base_ . $sortable . '' . ( ! empty( $this->settings['class'] ) ? ' ' . $this->settings['class'] : '' );
	}

	/**
	 * @deprecated - due to it is not used anywhere? 4.5
	 * @typo Bock - Block
	 * @return string
	 */
	public function customAdminBockParams() {
		// _deprecated_function( 'WPBakeryShortCode_VC_Row::customAdminBockParams', '4.5 (will be removed in 4.10)' );

		return '';
	}

	/**
	 * @deprecated 4.5
	 *
	 * @param string $bg_image
	 * @param string $bg_color
	 * @param string $bg_image_repeat
	 * @param string $font_color
	 * @param string $padding
	 * @param string $margin_bottom
	 *
	 * @return string
	 */
	public function buildStyle( $bg_image = '', $bg_color = '', $bg_image_repeat = '', $font_color = '', $padding = '', $margin_bottom = '' ) {
		// _deprecated_function( 'WPBakeryShortCode_VC_Row::buildStyle', '4.5 (will be removed in 4.10)' );

		$has_image = false;
		$style = '';
		if ( (int) $bg_image > 0 && false !== ( $image_url = wp_get_attachment_url( $bg_image ) ) ) {
			$has_image = true;
			$style .= 'background-image: url(' . $image_url . ');';
		}
		if ( ! empty( $bg_color ) ) {
			$style .= vc_get_css_color( 'background-color', $bg_color );
		}
		if ( ! empty( $bg_image_repeat ) && $has_image ) {
			if ( 'cover' === $bg_image_repeat ) {
				$style .= 'background-repeat:no-repeat;background-size: cover;';
			} elseif ( 'contain' === $bg_image_repeat ) {
				$style .= 'background-repeat:no-repeat;background-size: contain;';
			} elseif ( 'no-repeat' === $bg_image_repeat ) {
				$style .= 'background-repeat: no-repeat;';
			}
		}
		if ( ! empty( $font_color ) ) {
			$style .= vc_get_css_color( 'color', $font_color );
		}
		if ( '' !== $padding ) {
			$style .= 'padding: ' . ( preg_match( '/(px|em|\%|pt|cm)$/', $padding ) ? $padding : $padding . 'px' ) . ';';
		}
		if ( '' !== $margin_bottom ) {
			$style .= 'margin-bottom: ' . ( preg_match( '/(px|em|\%|pt|cm)$/', $margin_bottom ) ? $margin_bottom : $margin_bottom . 'px' ) . ';';
		}

		return empty( $style ) ? '' : ' style="' . esc_attr( $style ) . '"';
	}
}



/**
 * WPBakery WPBakery Page Builder shortcodes
 *
 * @package WPBakeryPageBuilder
 *
 */
class WPBakeryShortCode_CL_Column extends WPBakeryShortCode {
	/**
	 * @var array
	 */
	protected $predefined_atts = array(
		'font_color' => '',
		'el_class' => '',
		'el_position' => '',
		'width' => '1/1',
	);

	public $nonDraggableClass = 'vc-non-draggable-column';

	/**
	 * @param $settings
	 */
	public function __construct( $settings ) {
		parent::__construct( $settings );
		$this->shortcodeScripts();
	}

	protected function shortcodeScripts() {
		wp_register_script( 'vc_jquery_skrollr_js', vc_asset_url( 'lib/bower/skrollr/dist/skrollr.min.js' ), array( 'jquery' ), WPB_VC_VERSION, true );
		wp_register_script( 'vc_youtube_iframe_api_js', '//www.youtube.com/iframe_api', array(), WPB_VC_VERSION, true );
	}

	/**
	 * @param $controls
	 * @param string $extended_css
	 *
	 * @return string
	 */
	public function getColumnControls( $controls, $extended_css = '' ) {
		$output = '<div class="vc_controls vc_control-column vc_controls-visible' . ( ! empty( $extended_css ) ? " {$extended_css}" : '' ) . '">';
		$controls_end = '</div>';

		if ( ' bottom-controls' === $extended_css ) {
			$control_title = __( 'Append to this column', 'june' );
		} else {
			$control_title = __( 'Prepend to this column', 'june' );
		}
		if ( vc_user_access()->part( 'shortcodes' )->checkStateAny( true, 'custom', null )->get() ) {
			$controls_add = '<a class="vc_control column_add vc_column-add" data-vc-control="add" href="#" title="' . $control_title . '"><i class="vc-composer-icon vc-c-icon-add"></i></a>';
		} else {
			$controls_add = '';
		}
		$controls_edit = '<a class="vc_control column_edit vc_column-edit"  data-vc-control="edit" href="#" title="' . __( 'Edit this column', 'june' ) . '"><i class="vc-composer-icon vc-c-icon-mode_edit"></i></a>';
		$controls_delete = '<a class="vc_control column_delete vc_column-delete" data-vc-control="delete"  href="#" title="' . __( 'Delete this column', 'june' ) . '"><i class="vc-composer-icon vc-c-icon-delete_empty"></i></a>';
		$editAccess = vc_user_access_check_shortcode_edit( $this->shortcode );
		$allAccess = vc_user_access_check_shortcode_all( $this->shortcode );
		if ( is_array( $controls ) && ! empty( $controls ) ) {
			foreach ( $controls as $control ) {
				if ( 'add' === $control || ( $editAccess && 'edit' === $control ) || $allAccess ) {
					$method_name = vc_camel_case( 'output-editor-control-' . $control );
					if ( method_exists( $this, $method_name ) ) {
						$output .= $this->$method_name();
					} else {
						$control_var = 'controls_' . $control;
						if ( isset( ${$control_var} ) ) {
							$output .= ${$control_var};
						}
					}
				}
			}

			return $output . $controls_end;
		} elseif ( is_string( $controls ) && 'full' === $controls ) {
			if ( $allAccess ) {
				return $output . $controls_add . $controls_edit . $controls_delete . $controls_end;
			} elseif ( $editAccess ) {
				return $output . $controls_add . $controls_edit . $controls_end;
			}

			return $output . $controls_add . $controls_end;
		} elseif ( is_string( $controls ) ) {
			$control_var = 'controls_' . $controls;
			if ( 'add' === $controls || ( $editAccess && 'edit' == $controls || $allAccess ) && isset( ${$control_var} ) ) {
				return $output . ${$control_var} . $controls_end;
			}

			return $output . $controls_end;
		}
		if ( $allAccess ) {
			return $output . $controls_add . $controls_edit . $controls_delete . $controls_end;
		} elseif ( $editAccess ) {
			return $output . $controls_add . $controls_edit . $controls_end;
		}

		return $output . $controls_add . $controls_end;
	}

	/**
	 * @param $param
	 * @param $value
	 *
	 * @return string
	 */
	public function singleParamHtmlHolder( $param, $value ) {
		$output = '';
		// Compatibility fixes.
		$old_names = array(
			'yellow_message',
			'blue_message',
			'green_message',
			'button_green',
			'button_grey',
			'button_yellow',
			'button_blue',
			'button_red',
			'button_orange',
		);
		$new_names = array(
			'alert-block',
			'alert-info',
			'alert-success',
			'btn-success',
			'btn',
			'btn-info',
			'btn-primary',
			'btn-danger',
			'btn-warning',
		);
		$value = str_ireplace( $old_names, $new_names, $value );
		$param_name = isset( $param['param_name'] ) ? $param['param_name'] : '';
		$type = isset( $param['type'] ) ? $param['type'] : '';
		$class = isset( $param['class'] ) ? $param['class'] : '';

		if ( isset( $param['holder'] ) && 'hidden' !== $param['holder'] ) {
			$output .= '<' . $param['holder'] . ' class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '">' . $value . '</' . $param['holder'] . '>';
		}

		return $output;
	}

	/**
	 * @param $atts
	 * @param null $content
	 *
	 * @return string
	 */
	public function contentAdmin( $atts, $content = null ) {
		$width = $el_class = '';
		extract( shortcode_atts( $this->predefined_atts, $atts ) );
		$output = '';

		$column_controls = $this->getColumnControls( $this->settings( 'controls' ) );
		$column_controls_bottom = $this->getColumnControls( 'add', 'bottom-controls' );

		if ( ' column_14' === $width || ' 1/4' === $width ) {
			$width = array( 'vc_col-sm-3' );
		} elseif ( ' column_14===$width-14-14-14' ) {
			$width = array(
				'vc_col-sm-3',
				'vc_col-sm-3',
				'vc_col-sm-3',
				'vc_col-sm-3',
			);
		} elseif ( ' column_13' === $width || ' 1/3' === $width ) {
			$width = array( 'vc_col-sm-4' );
		} elseif ( ' column_13===$width-23' ) {
			$width = array(
				'vc_col-sm-4',
				'vc_col-sm-8',
			);
		} elseif ( ' column_13===$width-13-13' ) {
			$width = array(
				'vc_col-sm-4',
				'vc_col-sm-4',
				'vc_col-sm-4',
			);
		} elseif ( ' column_12' === $width || ' 1/2' === $width ) {
			$width = array( 'vc_col-sm-6' );
		} elseif ( ' column_12===$width-12' ) {
			$width = array(
				'vc_col-sm-6',
				'vc_col-sm-6',
			);
		} elseif ( ' column_23' === $width || ' 2/3' === $width ) {
			$width = array( 'vc_col-sm-8' );
		} elseif ( ' column_34' === $width || ' 3/4' === $width ) {
			$width = array( 'vc_col-sm-9' );
		} elseif ( ' column_16' === $width || ' 1/6' === $width ) {
			$width = array( 'vc_col-sm-2' );
		} elseif ( ' column_56' === $width || ' 5/6' === $width ) {
			$width = array( 'vc_col-sm-10' );
		} else {
			$width = array( '' );
		}
		for ( $i = 0; $i < count( $width ); $i ++ ) {
			$output .= '<div ' . $this->mainHtmlBlockParams( $width, $i ) . '>';
			$output .= str_replace( '%column_size%', wpb_translateColumnWidthToFractional( $width[ $i ] ), $column_controls );
			$output .= '<div class="wpb_element_wrapper">';
			$output .= '<div ' . $this->containerHtmlBlockParams( $width, $i ) . '>';
			$output .= do_shortcode( shortcode_unautop( $content ) );
			$output .= '</div>';
			if ( isset( $this->settings['params'] ) ) {
				$inner = '';
				foreach ( $this->settings['params'] as $param ) {
					$param_value = isset( ${$param['param_name']} ) ? ${$param['param_name']} : '';
					if ( is_array( $param_value ) ) {
						// Get first element from the array
						reset( $param_value );
						$first_key = key( $param_value );
						$param_value = $param_value[ $first_key ];
					}
					$inner .= $this->singleParamHtmlHolder( $param, $param_value );
				}
				$output .= $inner;
			}
			$output .= '</div>';
			$output .= str_replace( '%column_size%', wpb_translateColumnWidthToFractional( $width[ $i ] ), $column_controls_bottom );
			$output .= '</div>';
		}

		return $output;
	}

	/**
	 * @return string
	 */
	public function customAdminBlockParams() {
		return '';
	}

	/**
	 * @param $width
	 * @param $i
	 *
	 * @return string
	 */
	public function mainHtmlBlockParams( $width, $i ) {
		$sortable = ( vc_user_access_check_shortcode_all( $this->shortcode ) ? 'wpb_sortable' : $this->nonDraggableClass );
		$base_ = 'vc_column';
		if( $this->settings['base'] == 'cl_column_inner' )
			$base_ = 'vc_column_inner';
		return 'data-element_type="' . $this->settings['base'] . '" data-vc-column-width="' . wpb_vc_get_column_width_indent( $width[ $i ] ) . '" class="wpb_' . $base_ . ' ' . $sortable . '' . ( ! empty( $this->settings['class'] ) ? ' ' . $this->settings['class'] : '' ) . ' ' . $this->templateWidth() . ' wpb_content_holder"' . $this->customAdminBlockParams();
	}

	/**
	 * @param $width
	 * @param $i
	 *
	 * @return string
	 */
	public function containerHtmlBlockParams( $width, $i ) {
		return 'class="wpb_column_container vc_container_for_children"';
	}

	/**
	 * @param string $content
	 *
	 * @return string
	 */
	public function template( $content = '' ) {
		return $this->contentAdmin( $this->atts );
	}

	/**
	 * @return string
	 */
	protected function templateWidth() {
		return '<%= window.vc_convert_column_size(params.width) %>';
	}

	/**
	 * @param string $font_color
	 *
	 * @return string
	 */
	public function buildStyle( $font_color = '' ) {
		$style = '';
		if ( ! empty( $font_color ) ) {
			$style .= vc_get_css_color( 'color', $font_color );
		}

		return empty( $style ) ? $style : ' style="' . esc_attr( $style ) . '"';
	}


	public function generateCSSBox( $value ){
			$value =  str_replace("'", '"', str_replace('_-_json', '', $value) );
			$style = '';

			if( !is_array($value) )
				$value = json_decode($value, true);
							
			$default = $field['default'];
			if( !is_array( $default ) )
				$default = array();
			
			$value = array_merge( $default, $value );

			foreach($value as $prop => $val){
				$style .= $prop.': '.$val.' !important;';
			}
			
						
			return $style;
		}
}




class WPBakeryShortCode_CL_Row_Inner extends WPBakeryShortCode_CL_Row {
	public function template( $content = '' ) {
		return $this->contentAdmin( $this->atts );
	}
}

class WPBakeryShortCode_CL_Column_Inner extends WPBakeryShortCode_CL_Column {

}


function codeless_generate_backend_params( $tag, $add = false ){
	if( !class_exists( 'Cl_Builder_Mapper' ) )
		return array();


	$shortcode = Cl_Builder_Mapper::getShortCode( $tag );
	$new_params = array();

	if( $add !== false ){
		$new_params[] = $add;
	}


	if( is_array( $shortcode['fields'] ) ){
		foreach( $shortcode['fields'] as $field_id => $field_attr ){

			if( $field_attr['type'] == 'show_tabs' ||
				$field_attr['type'] == 'tab_start' ||
				$field_attr['type'] == 'group_start' ||
				$field_attr['type'] == 'group_end' ||
				$field_attr['type'] == 'tab_end' ||
				$field_id == 'width' && $tag == 'cl_column' ||
				$field_id == 'width' && $tag == 'cl_column_inner' )
				continue;

			$type_map = array(
				'select' => 'dropdown',
				'switch' => 'dropdown',
				'css_tool' => 'css_tool',
				'inline_select' => 'dropdown',
				'color' => 'colorpicker',
				'image' => 'attach_image',
				'css_tool' => 'css_editor',
				'image_gallery' => 'attach_images',
				'sortable' => 'sortable',
				'select_icon' => 'iconpicker',
				'multicheck' => 'dropdown_multi'
			);

			$new_param = array(
				'heading' => $field_attr['label'],
				'type' => (isset( $type_map[ $field_attr['type'] ] ) ? $type_map[ $field_attr['type'] ] : 'textfield'),
				'description' => (isset( $field_attr['tooltip'] ) ? $field_attr['tooltip'] : ''),
				'param_name' => $field_id
			);

			if( $field_id == 'content' && $field_attr['type'] == 'inline_text' )
				$new_param['type'] = 'textarea_html';

			if( isset( $field_attr['group_vc'] ) )
				$new_param['group'] = $field_attr['group_vc'];

			if( isset( $field_attr['selector'] ) )
				$new_param['selector'] = $field_attr['selector'];
			if( isset( $field_attr['selectClass'] ) )
				$new_param['selectClass'] = $field_attr['selectClass'];
			if( isset( $field_attr['htmldata'] ) )
				$new_param['htmldata'] = $field_attr['htmldata'];
			if( isset( $field_attr['addClass'] ) )
				$new_param['addClass'] = $field_attr['addClass'];
			if( isset( $field_attr['css_property'] ) )
				$new_param['css_property'] = $field_attr['css_property'];
			if( isset( $field_attr['suffix'] ) )
				$new_param['suffix'] = $field_attr['suffix'];
			if( isset( $field_attr['media_query'] ) )
				$new_param['media_query'] = $field_attr['media_query'];


			if( isset( $field_attr['cl_required'] ) && $field_attr['cl_required'][0]['operator'] == '==' ){
				$new_param['dependency'] = array(
					'element' => $field_attr['cl_required'][0]['setting'],
					'value' => array( (string) $field_attr['cl_required'][0]['value'] )
				);
			}

			if( isset( $field_attr['replace_type_vc'] ) && !empty( $field_attr['replace_type_vc'] ) )
				$new_param['type'] = $field_attr['replace_type_vc'];


			if( $field_attr['type'] == 'select' || $field_attr['type'] == 'inline_select' || $field_attr['type'] == 'multicheck' ){

				if( isset( $field_attr['choices'] ) ){

					$new_param['value'] = array_flip( $field_attr['choices'] );
					if( $field_attr['type'] == 'multicheck' )
						$new_param['value'] = array( 'None' => 'none_' ) + $new_param['value'];
						
						


				}
			}

			if( $field_attr['type'] == 'switch' ){
				$new_param['value'] = ($field_attr['default']) ? array('On' => 1, 'Off' => 0) : array('Off' => 0, 'On' => 1) ;
			}

			if( $field_attr['type'] == 'select' || $field_attr['type'] == 'inline_select' || $field_attr['type'] == 'multicheck' ){
				$new_param['std'] = $field_attr['default'];

				if( $new_param['type'] == 'dropdown_multi' )
					unset( $new_param['std'] );
			}

			if( $new_param['type'] == 'textfield' && isset( $field_attr['default'] ) )
				$new_param['value'] = $field_attr['default'];

			if( $new_param['type'] == 'css_editor' ){
				$new_param['value'] = $field_attr['default'];
				$new_param['std'] = $field_attr['default'];
			}
			

			if( $field_attr['type'] == 'select_icon' ){
				$new_param['settings'] = array(
					'type' => 'codeless_icons'
				);
			}



			$new_params[] = $new_param;

		}
	}
	return $new_params;
}


?>