<?php

extract($element['params']);

?>

<div class="widgetized <?php echo esc_attr( $this->generateClasses('.widgetized') ) ?>" <?php $this->generateStyle('.widgetized', true ) ?> >

<?php  dynamic_sidebar( $widget_sidebar ); ?>

</div>