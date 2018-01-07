<?php
// Template Name: Register

// set a redirect for after logging in
if ( isset( $_REQUEST['redirect_to'] ) )
	$redirect = $_REQUEST['redirect_to'];

if (!isset($redirect))
	$redirect = home_url();

$show_password_fields = apply_filters('show_password_fields', true);
?>
<style>
#pass1-text { display:none}
.notice.error.email-success
{
	background:hsl(101, 61%, 46%) none repeat scroll 0 0;
	border:1px solid white;
}
.email-success .errors > li
{
	color:white;
	font-size:16px;
}
</style> 
<div class="content">

	<div class="content_botbg">

		<div class="content_res">

			<!-- full block -->
			<div class="shadowblock_out">

				<div class="shadowblock">
					<?php if(isset($_GET['action']) && $_GET['action']=='email_acti' ) { ?>
					<div class="notice error email-success">
		<span><ul class="errors"><li><strong>SUCCESS</strong>: Thanks for the signing up. We have sent you an activation email. Please click on the activation link to activate your account.</li></ul></span>
	</div>
					
					<?php  } ?>
					<h2 class="dotted"><span class="colour"><?php _e( 'Register', APP_TD ); ?></span></h2>

					<?php do_action( 'appthemes_notices' ); ?>

					<p><?php _e( 'Complete the fields below to create your free account. Your login details will be emailed to you for confirmation so make sure to use a valid email address. Once registration is complete, you will be able to submit your ads.', APP_TD ); ?></p>

					<div class="left-box">

						<?php if ( get_option('users_can_register') ) : ?>

							<form action="<?php echo appthemes_get_registration_url(); ?>" method="post" class="loginform" name="registerform" id="registerform">

								<p>
									<label for="user_login"><?php _e( 'Username:', APP_TD ); ?><span class="colour">*</span></label>
									<input tabindex="1" type="text" class="text required" name="user_login" id="user_login" value="<?php if (isset($_POST['user_login'])) echo esc_attr(stripslashes($_POST['user_login'])); ?>" />
								</p>

								<p>
									<label for="user_email"><?php _e( 'Email:', APP_TD ); ?><span class="colour">*</span></label>
									<input tabindex="2" type="text" class="text required email" name="user_email" id="user_email" value="<?php if (isset($_POST['user_email'])) echo esc_attr(stripslashes($_POST['user_email'])); ?>" />
								</p>

								<?php if ( $show_password_fields ) : ?>
									<p>
										<label for="pass1"><?php _e( 'Password:', APP_TD ); ?><span class="colour">*</span></label>
										<input tabindex="3" type="password" class="text required" name="pass1" id="pass1" value="" autocomplete="off" />
									</p>

									<p>
										<label for="pass2"><?php _e( 'Password Again:', APP_TD ); ?><span class="colour">*</span></label>
										<input tabindex="4" type="password" class="text required" name="pass2" id=" " value="" autocomplete="off" />
									</p>

									<!--<div class="strength-meter">
										<div id="pass-strength-result" class="hide-if-no-js"><?php _e( 'Strength indicator', APP_TD ); ?></div>
										<span class="description indicator-hint"><?php _e( 'Hint: The password should be at least seven characters long. To make it stronger, use upper and lower case letters, numbers and symbols like ! " ? $ % ^ &amp; ).', APP_TD ); ?></span>
									</div>-->
								<?php endif; ?>

								<?php do_action('register_form'); ?>

								<div id="checksave">

									<p class="submit">
										<input tabindex="6" class="btn_orange" type="submit" name="register" id="register" value="<?php _e( 'Create Account', APP_TD ); ?>" />
									</p>

								</div>

								<input type="hidden" name="redirect_to" value="<?php echo esc_attr($redirect); ?>" />

								<!-- autofocus the field -->
								<script type="text/javascript">try{document.getElementById('user_login').focus();}catch(e){}</script>

							</form>

						<?php else : ?>

							<p><?php _e( '** User registration is currently disabled. Please contact the site administrator. **', APP_TD ); ?></p>

						<?php endif; ?>

					</div>

					<div class="right-box">

					</div><!-- /right-box -->

					<div class="clr"></div>

				</div><!-- /shadowblock -->

			</div><!-- /shadowblock_out -->

		</div><!-- /content_res -->

	</div><!-- /content_botbg -->

</div><!-- /content -->
