<?php
/**
 * Portfolio Presentation Demo Template Part for showing title
 *
 * @package june
 * @subpackage Portfolio Parts
 * @since 1.0.0
 *
 */

?>
<div class="entry-wrapper-content">

	<div class="entry-content">

		<h3 class="portfolio-title custom_font <?php echo codeless_get_mod( 'portfolio_item_title_style', 'h4' ) ?>">

			<a href="<?php echo codeless_portfolio_item_permalink() ?>" target="<?php echo codeless_portfolio_item_permalink_target() ?>" title="<?php the_title() ?>"><?php the_title() ?></a>
			
		</h3>
		<a href="<?php echo codeless_portfolio_item_permalink() ?>" target="<?php echo codeless_portfolio_item_permalink_target() ?>" class="preview" title="<?php the_title() ?>"><?php esc_attr_e('Preview', 'june'); ?></a>
		
	</div><!-- entry-content -->

</div><!-- entry-wrapper-content -->