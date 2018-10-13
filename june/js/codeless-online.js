(function($) {
	"use strict"; 

	$(document).ready(function(){

		$('.cl-panel .cl-panel-button.settings').click( function(){

			var $panel = $( this ).parents( '.cl-panel' ).first();
			if( $panel.hasClass( 'open_settings' ) ){
				$panel.removeClass( 'open_settings' );
				setTimeout(function(){
					$panel.find('.cl-panel-container').css('display', 'none');
				}, 600);
				
			}else{
				$panel.addClass( 'open_settings' );
				$panel.find('.cl-panel-container').css('display', 'block');
			}

		});


		$('.cl-panel-container .with_image li').hover( function(e){
			e.preventDefault();

            var img = $(this).find('a').data('img');
            console.log(img);
            $('.cl-panel-container .image_wrapper img').attr('src', img);
            $('.cl-panel-container .image_wrapper').addClass('show-image');
        }, function(){
            $('.cl-panel-container .image_wrapper').removeClass('show-image');

        });

	});

})(jQuery);