<?php
/**
 * Header Login Box
 *
 *
 * @package june
 * @subpackage Templates
 * @since 1.0.0
 *
 */
?>

<div class="login-box woocommerce">
	<h6><?php esc_html_e( 'Already got an account?', 'june' ); ?></h6>

	<form class="woocommerce-form woocommerce-form-login login" method="post">

			<div class="login_div">
								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" placeholder="<?php esc_html_e( 'Username or email address', 'june' ); ?>" name="username" id="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( $_POST['username'] ) : ''; ?>" />
				</p>
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<input class="woocommerce-Input woocommerce-Input--text input-text" placeholder="<?php esc_html_e( 'Password', 'june' ); ?>" type="password" name="password" id="password" />
				</p>

				<p class="other">
					
					<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" style="font-size:16px; color:#73bbb1; line-height:20px;"><?php esc_html_e( 'Lost your password?', 'june' ); ?></a>

					<label style="font-size:16px; float:right;" class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
						<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'june' ); ?></span>
					</label>
					

				</p>

				<?php do_action( 'woocommerce_login_form' ); ?>

				<p class="form-row">
					<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
					<input type="submit" class="woocommerce-Button button cl-btn btn-style-square btn-hover-darker" name="login" value="<?php esc_attr_e( 'Login', 'june' ); ?>" />
					
					<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="button cl-btn btn-style-square btn-hover-darker register_link"><?php _e('Create Account', 'june') ?></a>
				</p>


			</div>

			<?php do_action( 'woocommerce_login_form_end' ); ?>

	</form>
</div>