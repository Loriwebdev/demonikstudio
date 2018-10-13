<?php
/**
 * Create the System Status Panel
 *
 * @package june WordPress Theme
 * @subpackage Framework
 * @version 1.0.0 
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


if ( ! class_exists( 'CodelessSystemStatus' ) ) {

	class CodelessSystemStatus {
	    
	    public function __construct() {
			
			if( class_exists( 'Cl_Builder_Manager' ) )
				add_action( 'admin_menu', array( 'CodelessSystemStatus', 'cL_add_menu_page' ), 0 );
			
		}
		
		public static function cL_add_menu_page(){
		  
			add_theme_page(
				esc_html__( 'System Status', 'june' ),
				esc_html__( 'System Status', 'june' ),
				'administrator',
				'codeless-panel-system-status',
				array( 'CodelessSystemStatus', 'createPage' )
			);
		}

		public static function createPage(){
			include_once (get_template_directory(). '/includes/codeless_theme_panel/views/theme_status.php');
		}
	    
	}
	
	if( is_admin() )
   		new CodelessSystemStatus();
    
}