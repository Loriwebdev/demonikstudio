<div class="cl-default-page-header">

	<h2 class="page-title"><?php echo get_the_title( codeless_get_post_id() ) ?></h2>
	<div class="breadcrumbss">
        <ul class="page_parents">

            <li class="home"><a href="<?php echo esc_url(home_url()) ?>"><?php echo esc_html__('Home', 'june') ?></a></li>

            <?php

            $page_parents = codeless_page_parents();
            $output = '';

            for($i = count($page_parents) - 1; $i >= 0; $i-- ){           
                $output .= '<li><a href="'.esc_url(get_permalink($page_parents[$i])).'">'.esc_html(get_the_title($page_parents[$i])).'</a></li>';
            }
           
            if(!is_front_page())  
                $output .= '<li class="active"><a href="'.esc_url(get_permalink()).'">'.esc_attr(get_the_title(codeless_get_post_id())).'</a></li>';

            echo codeless_complex_esc( $output );

            ?>
        
        </ul>
	</div>
</div>