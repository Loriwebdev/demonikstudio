<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

$output = '';

$atts = cl_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
                   
// Element ID
$element_id = uniqid();


// Vars of portfolio
$links = cl_atts_to_array($links);

?>

<div id="cl_links_cloud_<?php echo esc_attr( $element_id ) ?>" class="cl-element cl_links_cloud <?php echo esc_attr( $this->generateClasses('.cl_links_cloud') ) ?> cl-element" <?php $this->generateStyle('.cl_links_cloud', '', true) ?>>

    <?php if( is_array( $links ) && ! empty( $links ) ): ?>

        <div class="links-cloud">
            <?php foreach( $links as $link ): ?>

                <a href="<?php echo get_permalink( $link ); ?>" <?php $this->generateStyle('.cl_links_cloud a', '', true) ?>>
                    <?php echo get_the_title( $link ); ?>
                    <?php if( $show_category ): ?>
                        <?php 
                            if( get_post_type($link) != 'portfolio' ){
                                $cats = get_the_category( $link );
                                $cat_name = '';
                                foreach($cats as $cd){
                                    $cat_name .= $cd->cat_name;
                                    break;
                                }
                            }else{
                                $terms = get_the_terms( $link, 'portfolio_entries', '', ', ', '' );
                                foreach( $terms as $term ){
                                    $cat_name .= $term->name;
                                    break;
                                }
                            }

                            
                        ?>
                        <span class="category"><?php echo codeless_complex_esc($cat_name) ?></span>
                    <?php endif; ?>        
                </a>
            <?php endforeach; ?>
        </div>

    <?php endif; ?>

    <?php $this->addCustomCss( '#cl_links_cloud_'.$element_id . ' a:before{ color: '.esc_attr( $slash_color ).' !important }' ) ?>

</div><!-- .cl_links_cloud -->