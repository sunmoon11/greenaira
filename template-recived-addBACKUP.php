<?php

/*

Template Name: Recived Add

*/


// grabs the user info and puts into vars

global $current_user, $app_abbr;
error_reporting(0);
checkLogin();

?>
<div class="content">
	<div class="content_botbg">
		<div class="content_res">
			<!-- full block -->
			<div class="shadowblock_out">
				<div class="shadowblock">
					<div class="shadowblock">
					<h2 class="dotted"><?php _e( get_the_title(), APP_TD ); ?></h2>
						<div class="thankyou">


    
            <h3>Thank you! Your ad listing has been submitted for review.</h3>
            <p style="margin-top:10px;color: #53b426 !important;"><b>You can check the status by viewing your dashboard.</b></p>
           <p style=" color: #53b426 !important;"><b>1 advert = N2K.....  &nbsp;&nbsp; <a href="<?php echo get_site_url() ?>/rates"> View full advert rates</a></b></p>  
                          <p><a target="_blank" href="<?php echo get_site_url() ?>/ads-pay.php"><b>Goto payment page</b></a></p>

        

    </div>
					</div>
				</div><!-- /shadowblock_out -->
		<div class="clr"></div>
		</div><!-- /content_res -->
	</div><!-- /content_botbg -->
</div><!-- /content -->