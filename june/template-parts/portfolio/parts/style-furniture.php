<?php
/**
 * Portfolio Furniture Template Part for showing title
 *
 * @package june
 * @subpackage Portfolio Parts
 * @since 1.0.0
 *
 */

?>
<div class="entry-wrapper-content">

	<div class="entry-content">
		<h4 class="subtitle animate_on_visible bottom-t-top" data-delay="200"><?php echo codeless_get_meta('portfolio_furniture_subtitle', '', get_the_ID() ) ?></h4>
		<h3 class="portfolio-title custom_font <?php echo codeless_get_mod( 'portfolio_item_title_style', 'h4' ) ?>  animate_on_visible bottom-t-top" data-delay="300">

			<?php the_title() ?>
			
		</h3>
		
	</div><!-- entry-content -->

</div><!-- entry-wrapper-content -->