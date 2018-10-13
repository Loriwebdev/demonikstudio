<?php

extract($element['params']);



global $cl_from_element;

$menu_id_ = 'cl_menu_' . uniqid();

if( $hamburger ):
	$cl_from_element['cl_menu_hamburger'] = $hamburger;
	$cl_from_element['cl_menu_hamburger_style'] = $hamburger_style;
	$cl_from_element['cl_menu_hamburger_overlay_text'] = $hamburger_overlay_text;
	$cl_from_element['cl_menu_hamburger_half_overlay_width'] = $hamburger_half_overlay_width;
endif;

if( isset($item_animation) ):
	$cl_from_element['cl_menu_item_animation'] = $item_animation;
	$cl_from_element['cl_menu_item_animation_speed'] = $animation_speed;
	$cl_from_element['cl_menu_item_animation_delay'] = $animation_delay;
endif;

if( isset($custom_color) && (int) $custom_color ){

	$custom_css = '.cl-header-menu:not(.cl-mobile-menu) #'.$menu_id_.' > ul > li > a{ color:'.esc_attr( $text_color ).' }';
	$this->addCustomCss($custom_css);
}

?>
<?php if( ! (int) $hamburger ): ?>

	<?php $nav_classes = '';

		if( method_exists($this, 'generateClasses') )
			$nav_classes = $this->generateClasses('.cl-primary-navigation');
	?>

	<div id="navigation" class="cl-primary-navigation cl-header-menu <?php echo esc_attr( $nav_classes ) ?>">

	        <nav id="<?php echo esc_attr( $menu_id_ ) ?>">
	            <?php 
	            	if( (isset($menu_id) && $menu_id == 'default') || !isset( $menu_id ) )
	                	$args = array("theme_location" => 'main', "container" => true, "fallback_cb" => 'codeless_default_menu');
	                else{
	                	$args = array( "menu" => (int) $menu_id, "container" => true, "fallback_cb" => 'codeless_default_menu'  );
	                }
	                wp_nav_menu($args);  
	            ?> 
	        </nav>
	</div>
	
	<?php if( isset($use_for_responsive) && (int) $use_for_responsive && isset($responsive_menu) && (int) $responsive_menu && ( isset($responsive_menu_id) && !empty( $responsive_menu_id ) || ( (isset($menu_id) && $menu_id == 'default') || !isset( $menu_id ) ) ) ): ?>

		<div id="navigation" class="cl-custom-responsive-navigation cl-header-menu">

		        <nav id="responsive_<?php echo esc_attr( $menu_id_ ) ?>">
		            <?php 
		           		if( !isset( $responsive_menu_id ) )
		           			$responsive_menu_id = false;
		           		
		            	if( isset( $responsive_menu_id ) && $responsive_menu_id == 'default' )
		                	$args = array("theme_location" => "main", "container" => true, "fallback_cb" => 'codeless_default_menu');
		                else{
		                	$args = array( "menu" => (int) $responsive_menu_id, "container" => true, "fallback_cb" => 'codeless_default_menu'  );
		                }
		                wp_nav_menu($args);  
		            ?> 
		        </nav>
		</div>

	<?php endif; ?>


	<?php  if( isset($use_for_responsive) && (int) $use_for_responsive && (int) $open_menu_button ): ?>

		<div class="cl-mobile-menu-button cl-color-<?php echo esc_attr( codeless_get_mod('header_mobile_menu_hamburger_color', 'dark') ) ?>">
	        <span></span>
	        <span></span>
	        <span></span>
	    </div> 

	<?php endif; ?>


<?php endif; ?>

<?php if( (int) $hamburger ): ?>

	<div class="cl-hamburger-menu style-<?php echo esc_attr($hamburger_style) ?> active-color-<?php echo esc_attr($hamburger_overlay_text) ?>">
		<span></span>
		<span></span>
		<span></span>
	</div>

	<?php

		$class = '';

		if( $vertical_menu ){
			$class = "vertical-menu";
		}
		
	?>

	<?php if( $hamburger_style == 'overlay' ): ?>

		<div class="cl-fullscreen-overlay-menu cl-overlay-menu <?php echo esc_attr($hamburger_overlay_text) ?>" style="<?php echo 'background-color: ' . esc_attr($hamburger_overlay_bg) ?>;">
			<div class="wrapper">
				<div class="inner-wrapper">
					<div id="navigation" class="<?php echo esc_attr( $class ); ?>">
					        <nav class="cl-dropdown-inline">
					            <?php 
					                $args = array("theme_location" => "main", "container" => true, "fallback_cb" => 'codeless_default_menu');
					                wp_nav_menu($args);  
					            ?> 
					        </nav>
					</div>
				</div><!-- .inner-wrapper -->
			</div><!-- .wrapper -->
		</div><!-- .cl-fullscreen-overlay-menu -->

	<?php endif; ?>


	<?php if( $hamburger_style == 'half_overlay' ): ?>

		<div class="cl-half-overlay-menu  cl-overlay-menu <?php echo esc_attr($hamburger_overlay_text) ?>" style="<?php echo 'background-color: ' . esc_attr($hamburger_overlay_bg) ?>; width: <?php echo esc_attr( $hamburger_half_overlay_width ) ?>%;">
			<div class="wrapper">
				<div class="inner-wrapper">
					<div id="navigation" class="vertical-menu">
					        <nav class="cl-dropdown-inline">
					            <?php 
					                $args = array("theme_location" => "main", "container" => true, "fallback_cb" => 'codeless_default_menu');
					                wp_nav_menu($args);  
					            ?> 
					        </nav>
					</div>
				</div><!-- .inner-wrapper -->
			</div><!-- .wrapper -->
		</div><!-- .cl-half-overlay-menu -->

		
	<?php endif; ?>

<?php endif; ?>
