<?php

extract($element['params']); 



$id = 'cl_socialicon_header_' . uniqid();

$custom_css = '#'.$id.' .cl_socialicon:hover{';

	if( ! empty( $bgcolor_hover ) ):
		$custom_css .= 'background-color:'.wp_kses_post($bgcolor_hover).' !important;';
	endif;

	if( ! empty( $bcolor_hover ) ):
		$custom_css .= 'border-color: '.wp_kses_post($bcolor_hover).' !important;';
	endif; 

$custom_css .= '}';

$custom_css .= '#'.$id.' .cl_socialicon:hover a{';

	if( ! empty( $color_hover ) ):
		$custom_css .= 'color: '.$color_hover.' !important;';
	endif;

$custom_css .= '}';

$this->addCustomCss($custom_css);

?>

<div id="<?php echo esc_attr($id) ?>" class="cl_socialicondiv <?php echo esc_attr( $this->generateClasses('.cl_socialicondiv') ) ?>" <?php $this->generateStyle( '.cl_socialicondiv', true ); ?>>

	<?php $social_list = array(
		'facebook',
		'instagram',
		'twitter',
		'email',
		'linkedin',
		'pinterest',
		'youtube',
		'vimeo',
		'soundcloud',
		'slack',
		'skype',
		'google_plus',
		'github',
		'dribbble',
		'behance'
	); ?>

	<?php foreach( $social_list as $social ): ?>

		<?php if( ${"add_$social"} ){ ?>
			<div class="cl_socialicon cl-element <?php echo esc_attr( $this->generateClasses('.cl_socialicon') ) ?>" <?php $this->generateStyle( '.cl_socialicon', true );?>>
				<?php $social_link_ = $social . "_link"; if( $social == 'youtube' ) $social = 'youtube-play'; ?>
				<a href="<?php echo esc_url(${$social_link_}) ?>" target="<?php echo esc_attr($target) ?>" <?php $this->generateStyle('.cl_socialicon > a', true);?>>
					<i class="cl-icon-<?php echo esc_attr( $social ) ?>" <?php $this->generateStyle('.cl_socialicon i', true); ?> ></i>
				</a>
			</div> 
		<?php } ?>

	<?php endforeach; ?>

</div>