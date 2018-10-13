<?php
/**
 * Blog Template Part for displaying single blog related posts
 *
 * @package june
 * @subpackage Blog Parts
 * @since 1.0.0
 *
 */
?>

<div class="entry-single-related">
	<h5 class="single-blog-extra-heading custom_font"><?php esc_html_e( 'Related Posts', 'june' ) ?></h5>
	<div class="related-wrapper"><?php codeless_single_post_related() ?></div>
</div>
