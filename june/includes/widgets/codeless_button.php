<?php 

class CodelessButton extends WP_Widget{



    function __construct(){

        $options = array('classname' => 'widget_button', 'description' => '', 'customize_selective_refresh' => true );

		parent::__construct( 'widget_button', THEMENAME.' Widget Button', $options );

    }


 
    function widget($atts, $instance){

        extract($atts, EXTR_SKIP);

		echo wp_kses_post( $before_widget );

        $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);

        $button_text = empty($instance['button_text']) ? '' : $instance['button_text'];
        $link = empty($instance['link']) ? '#' : $instance['link'];

        ?>

        <a href="<?php echo esc_url( $link ) ?>" class="<?php echo codeless_button_classes(array('cl-btn', 'btn-hover-shadow', 'btn-style-square'), true) ?>"><?php echo esc_attr( $button_text ) ?></a>

      
        <?php

        echo wp_kses_post( $after_widget );

    }

    



    function update($new_instance, $old_instance){

        $instance = array();

        $instance['title'] = $new_instance['title'];

        $instance['button_text'] = $new_instance['button_text'];
        $instance['link'] = $new_instance['link'];

        return $instance;

    }



    function form($instance){

        $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'button_text' => '', 'link' => '') );

        $title = isset($instance['title']) ? $instance['title']: "";

        $button_text = isset($instance['button_text']) ? $instance['button_text']: "";
        $link = isset($instance['link']) ? $instance['link']: "";
     
        ?>

        <p>

    		<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>">Widget Title: 

    		<input id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label>

        </p>

        

        <p>

            <label for="<?php echo esc_attr( $this->get_field_id('button_text') ); ?>">Button Text: 

            <input id="<?php echo esc_attr( $this->get_field_id('button_text') ); ?>" name="<?php echo esc_attr( $this->get_field_name('button_text') ); ?>" type="text" value="<?php echo esc_attr($button_text); ?>" /></label>

        </p>

        <p>

            <label for="<?php echo esc_attr( $this->get_field_id('link') ); ?>">Link: 

            <input id="<?php echo esc_attr( $this->get_field_id('link') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link') ); ?>" type="text" value="<?php echo esc_attr($link); ?>" /></label>

        </p>


        <?php

    }

}