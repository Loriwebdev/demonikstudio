<?php 

class CodelessService extends WP_Widget{



    function __construct(){

        $options = array('classname' => 'widget_service', 'description' => '', 'customize_selective_refresh' => true );

		parent::__construct( 'widget_service', THEMENAME.' Widget Service', $options );

    }


 
    function widget($atts, $instance){

        extract($atts, EXTR_SKIP);

		echo wp_kses_post( $before_widget );

        $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);

        $service_title = empty($instance['service_title']) ? '' : $instance['service_title'];
        $service_desc = empty($instance['service_desc']) ? '' : $instance['service_desc'];
        $service_icon = empty($instance['service_icon']) ? '' : $instance['service_icon'];
        $service_icon_color = empty($instance['service_icon_color']) ? '' : $instance['service_icon_color'];
        
        $service_link = empty($instance['service_link']) ? '' : $instance['service_link'];

        if ( !empty( $title ) ) { 

		      echo wp_kses_post( $before_title . $title . $after_title ); 

        }

        ?>

        <style type="text/css">
            #<?php echo codeless_complex_esc( $atts['widget_id'] ) ?> svg path{
                fill: <?php echo codeless_complex_esc( $service_icon_color ) ?>;
            }
        </style>

        <div class="cl-service-wrapper">

            <div class="icon">
                <?php echo codeless_builder_f_get_contents( get_template_directory_uri() . '/img/'. $service_icon . '.svg' ); ?>
            </div>

            <div class="content">
                    
                    <a href="<?php echo esc_url( $service_link ) ?>"><?php echo codeless_complex_esc( $service_title ) ?></a>
                    <p><?php echo codeless_complex_esc( $service_desc ) ?></p>

            </div>

        </div>

      
        <?php

        echo wp_kses_post( $after_widget );

    }

    



    function update($new_instance, $old_instance){

        $instance = array();

        $instance['title'] = $new_instance['title'];

        $instance['service_title'] = $new_instance['service_title'];
        $instance['service_desc'] = $new_instance['service_desc'];
        $instance['service_icon'] = $new_instance['service_icon'];
        $instance['service_icon_color'] = $new_instance['service_icon_color'];
        $instance['service_link'] = $new_instance['service_link'];
        

        return $instance;

    }



    function form($instance){

        $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'service_title' => '', 'service_desc' => '', 'service_icon' => '') );

        $title = isset($instance['title']) ? $instance['title']: "";

        $service_title = isset($instance['service_title']) ? $instance['service_title']: "";
        $service_desc = isset($instance['service_desc']) ? $instance['service_desc']: "";
        $service_icon = isset($instance['service_icon']) ? $instance['service_icon']: "";
        $service_icon_color = isset($instance['service_icon_color']) ? $instance['service_icon_color']: "";
        $service_link = isset($instance['service_link']) ? $instance['service_link']: "";

        ?>

        <p>

    		<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>">Widget Title: 

    		<input id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label>

        </p>

        

        <p>

            <label for="<?php echo esc_attr( $this->get_field_id('service_title') ); ?>">Service Title: 

            <input id="<?php echo esc_attr( $this->get_field_id('service_title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('service_title') ); ?>" type="text" value="<?php echo esc_attr($service_title); ?>" /></label>

        </p>

        <p>

            <label for="<?php echo esc_attr( $this->get_field_id('service_desc') ); ?>">Service Description: 

            <input id="<?php echo esc_attr( $this->get_field_id('service_desc') ); ?>" name="<?php echo esc_attr( $this->get_field_name('service_desc') ); ?>" type="text" value="<?php echo esc_attr($service_desc); ?>" /></label>

        </p>

        <p>

            <label for="<?php echo esc_attr( $this->get_field_id('service_link') ); ?>">Service Link: 

            <input id="<?php echo esc_attr( $this->get_field_id('service_link') ); ?>" name="<?php echo esc_attr( $this->get_field_name('service_link') ); ?>" type="text" value="<?php echo esc_attr($service_link); ?>" /></label>

        </p>

        <p>

            <label for="<?php echo esc_attr( $this->get_field_id('service_icon') ); ?>">Service Icon: 

            <select id="<?php echo esc_attr( $this->get_field_id('service_icon') ); ?>" name="<?php echo esc_attr( $this->get_field_name('service_icon') ); ?>">
                    
                    <option <?php if( $service_icon == 'gift' ) echo 'selected="selected"'; ?> value="gift">Gift</option>
                    <option <?php if( $service_icon == 'headphones' ) echo 'selected="selected"'; ?> value="headphones">Headphones</option>
                    <option <?php if( $service_icon == 'world' ) echo 'selected="selected"'; ?> value="world">World</option>

            </select>

        </p>


        <p>

            <label for="<?php echo esc_attr( $this->get_field_id('service_icon_color') ); ?>">Service Icon Color: 

            <input id="<?php echo esc_attr( $this->get_field_id('service_icon_color') ); ?>" name="<?php echo esc_attr( $this->get_field_name('service_icon_color') ); ?>" type="text" value="<?php echo esc_attr($service_icon_color); ?>" /></label>

        </p>

        

        

        <?php

    }

}