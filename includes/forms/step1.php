<?php

/**

 * This is step 1 of 3 for the ad submission form

 *

 * @package Ads

 * @subpackage New Ad

 *

 *

 */



global $current_user, $wpdb;

$change_cat_url = add_query_arg( array( 'action' => 'change' ) );

?>



<div id="step1">



	<h2 class="dotted"><?php _e( 'Submit Your Listing', APP_TD ); ?></h2>



	<img src="<?php bloginfo('template_url'); ?>/images/step1.gif" alt="" class="stepimg" />



	<?php

		do_action( 'appthemes_notices' );

		// display the custom message

		echo get_option('cp_ads_form_msg');

	?>



	<p class="dotted">&nbsp;</p>



	<?php

		// show the category dropdown when first arriving to this page.

		// Also show it if cat equals -1 which means the 'select one' option was submitted

		if ( !isset($_POST['cat']) || ($_POST['cat'] == '-1') ) {

	?>



<style type="text/css"> /* hack on new ad submission page until we fix multi-level dropdown issue with .js */

	div#catlvl0 select#cat.dropdownlist, div#childCategory select#cat.dropdownlist, form#mainform.form_step select {-webkit-appearance: none; -moz-appearance: none; appearance: none; background-position: 22px 3px; background: rgba(0, 0, 0, 0) url("http://greenaira.com/wp-content/themes/ads/images/sb-arrow.png") no-repeat scroll 97% !important; padding:6px;height: 3em; color:#666; font-size:12px; display: block;}
        @media only screen and (device-width: 768px) {
            input#getcat{
                display: block;
            }
}

@media only screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait) {
  input#getcat{
                display: block;
            }
}

@media only screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape) {
  input#getcat{
                display: block;
            }
}
noindex:-o-prefocus, input#getcat {
  display: block;
}
</style>



<script type="text/javascript">

	// <![CDATA[

		jQuery(document).ready(function($) {

			/* remove the select dropdown menus style - hack until we can fix the multi-level dropdown js issue */

			$('select').selectBox('destroy');

		});

	// ]]>

</script>



	<form name="mainform" id="mainform" class="form_step" action="" method="post">



		<ol>

			<li style="margin-bottom: 28px;">

				<div class="labelwrapper"><label><?php _e( 'Type of Advert:', APP_TD ); ?></label></div>

				<div id="ad-categories" style="display:block; margin-left:170px;">

					<div id="catlvl0">

						<select name="advert" class="dropdownlist" required>

							<option value="">Select...</option>

							<option value="Service">Advertise</option>

							<option value="Product">Sell</option>

                                                      <!--  <option value="Request">Advertising a Request</option>-->

						</select>

					</div>

				</div>

			</li>

			<?php if ( get_option('cp_charge_ads') == 'yes' ) {?>

            <li>

				<div class="labelwrapper"><label><?php _e( 'Cost Per Service Listing:', APP_TD ); ?></label></div>

				<?php cp_display_price(get_option('cp_sys_service_price')); ?>

				<div class="clr"></div>

			</li>

			<?php } ?>

			<?php if ( get_option('cp_charge_ads') == 'no' ) {?>

            <li>

				<div class="labelwrapper"><label><?php _e( 'Cost Per Service Listing:', APP_TD ); ?></label></div>

				<?php echo "Free"; ?>

				<div class="clr"></div>

			</li>

			<?php } ?>

			<li>

				<div class="labelwrapper"><label><?php _e( 'Cost Per Product Listing:', APP_TD ); ?></label></div>

				<?php cp_cost_per_listing(); ?>

				<div class="clr"></div>

			</li>

			

			<li>

				<div class="labelwrapper"><label><?php _e( 'Select a State:', APP_TD ); ?><span class="colour">*</span></label></div>

				<div id="ad-categories" style="display:block; margin-left:170px;">

					<select name='state' id='state' class="dropdownlist" required>

						<option value=""><?php echo esc_attr(__('Select a State')); ?></option>

						<?php
					

							$statecategories = get_categories('taxonomy='.APP_TAX_CAT_STATE.'&orderby=name&name=categorySearch&hide_empty=0&hierarchical=1');

							foreach ($statecategories as $statecategory) {

							$stateoption = '<option value="'.$statecategory->category_nicename.'">';

							$stateoption .= $statecategory->name;

							$stateoption .= '</option>';

							echo $stateoption;

							}

						?>

						</select>

					<!--<div id="catlvl0">-->

						<?php

 								//wp_dropdown_categories('show_option_none=' . __( 'Select the state', APP_TD ) . '&class=statelist&orderby=name&order=ASC&hide_empty=0&hierarchical=1&taxonomy='.APP_TAX_CAT_STATE.'&depth=1');

							

						?>

						<!--<div style="clear:both;"></div>

					</div>-->

						<div style="clear:both;"></div>

				</div>

			</li>

			<?php

				$category = ( isset($_GET['renew']) ) ? true : false;

				if ( $category ) {

					$terms = wp_get_post_terms( $_GET['renew'], APP_TAX_CAT);

					$category = ( !empty($terms) ) ? $terms[0] : false;

				}



				if ( !isset($_GET['renew']) || !$category || ( isset($_GET['action']) && $_GET['action'] == 'change' ) ) {

			?>

            

			<li>

				<div class="labelwrapper"><label><?php _e( 'Select a Category:', APP_TD ); ?></label></div>

				<div id="ad-categories" style="display:block; margin-left:170px;">						

					<div id="catlvl0">

						<?php



							if ( get_option('cp_price_scheme') == 'category' && get_option('cp_charge_ads') == 'yes' && get_option('cp_ad_parent_posting') != 'no' ) {

								cp_dropdown_categories_prices('show_option_none=' . __( 'Select', APP_TD ) . '&class=dropdownlist&orderby=name&order=ASC&hide_empty=0&hierarchical=1&taxonomy='.APP_TAX_CAT.'&depth=1');

							} else {

 								wp_dropdown_categories('show_option_none=' . __( 'Select', APP_TD ) . '&class=dropdownlist&orderby=name&order=ASC&hide_empty=0&hierarchical=1&taxonomy='.APP_TAX_CAT.'&depth=1');

							}



						?>

						<div style="clear:both;"></div>

					</div>

				</div>

				<div id="ad-categories-footer" class="button-container">

                                    <input style="width: 28%;" type="submit" name="getcat" id="getcat" class="btn_orange" value="<?php _e( 'Go &rsaquo;&rsaquo;', APP_TD ); ?>" />

					<div id="chosenCategory"><input id="cat" name="cat" type="input" value="-1" /></div>

					<!--<div id="chosenAdvert"><input id="ad" name="ad" type="input" value="-1" /></div>-->

					<div style="clear:both;"></div>

				</div>

				<div style="clear:both;"></div>

			</li>



			<?php

				} else {

					if ( get_option('cp_price_scheme') == 'category' && get_option('cp_charge_ads') == 'yes' ) {

						$cat_fee = get_option('cp_cat_price_'.$category->term_id);

						$cat_fee = ' - ' . cp_display_price($cat_fee, '', false);

					} else {

						$cat_fee = '';

					}

			?>



			<li>

				<div class="labelwrapper"><label><?php _e( 'Category:', APP_TD ); ?></label></div>

				<strong><?php echo $category->name; ?></strong><?php echo $cat_fee; ?>&nbsp;&nbsp;<small><a href="<?php echo $change_cat_url; ?>"><?php _e( '(change)', APP_TD ); ?></a></small>

				<div class="clr pad5"></div>

				<div class="button-container">

					<input id="cat" name="cat" type="hidden" value="<?php echo $category->term_id; ?>" />

					<input id="state" name="state" type="hidden" value="<?php echo $stateoption->term_id; ?>" />

					<input id="ad" name="ad" type="hidden" value="<?php echo $advertype; ?>" />

					<input type="submit"  style="width: 28%;" name="getcat" class="btn_orange" value="<?php _e( 'Go &rsaquo;&rsaquo;', APP_TD ); ?>" />

				</div>

			</li>



			<?php } ?>



		</ol>



	</form>





	<?php } else {

		// show the form based on the category selected

		// get the cat nice name and put it into a variable

		$adCategory = get_term_by( 'id', $_POST['cat'], APP_TAX_CAT);

		$stateCategory =$_POST['state'];

		$_POST['catname'] = $adCategory->name;

		$_POST['state'] = $stateCategory;

		$adverType = $_POST['advert'];

		$_POST['advert'] = $adverType;

	?>

    

	<form name="mainform" id="mainform" class="form_step" action="" method="post" enctype="multipart/form-data">



		<ol>



			<li>

				<div class="labelwrapper"><label><?php _e( 'Category:', APP_TD ); ?></label></div>

				<strong><?php echo $_POST['catname']; ?></strong>&nbsp;&nbsp;<small><a href="<?php echo $change_cat_url; ?>"><?php _e( '(change)', APP_TD ); ?></a></small>

			</li>

			<li>

				<div class="labelwrapper"><label><?php _e( 'State:', APP_TD ); ?></label></div>

				<strong><?php echo $_POST['state']; ?></strong>

			</li>

			<li>

				<div class="labelwrapper"><label><?php _e( 'Advert Type:', APP_TD ); ?></label></div>

				<strong><?php echo $_POST['advert']; ?></strong>

			</li>

			

			<?php

				$renew_id = ( isset($_GET['renew']) ) ? $_GET['renew'] : false;

				$renew = ( $renew_id ) ? get_post($renew_id) : false;

				echo cp_show_form($_POST['cat'], $renew);

			?>
            <ul class="ul-metadata">

                                        
                             <?php $admin_added_array = array();
							 
							 
				$admin_added_array = array('business_name','business_address','business_email','bb_pin','website_url','business_phone');			 
							 
	      $data_to_show_admin = FALSE;
		  
		  foreach($admin_added_array as $admin_added_arr){
			  if(get_post_meta(get_the_ID(),$admin_added_arr,true) != ''){
			  $data_to_show_admin = TRUE;
		
				  }
			  
			  
			  }
		  $value = cimy_uef_sanitize_content(get_cimyFieldValue(get_current_user_id(),  BUSINESSNAME ));
 
	  		 
							  ?>       
                          <li id="list_business_name">
				<div class="labelwrapper">
										<label>Business name:</label>
														</div>
				<input name="business_name" id="business_name" value="<?php echo cimy_uef_sanitize_content(get_cimyFieldValue(get_current_user_id(),  BUSINESSNAME ));; ?>" type="text" class="text" minlength="2"><div class="clr"></div>
			</li>
                           <li id="list_cp_city">
				<div class="labelwrapper">
										<label>Business address:</label>
														</div>
				<input name="business_address" id="business_address" value="<?php echo cimy_uef_sanitize_content(get_cimyFieldValue(get_current_user_id(),  BUSINESSADDRESS ));; ?>" type="text" class="text" minlength="2"><div class="clr"></div>
			</li>
                           <li id="list_cp_city">
				<div class="labelwrapper">
										<label>Business email:</label>
														</div>
				<input name="business_email" id="business_email" value="<?php echo cimy_uef_sanitize_content(get_cimyFieldValue(get_current_user_id(),  BUSINESSEMAIL ));; ?>" type="text" class="text" minlength="2"><div class="clr"></div>
			</li>
                           <li id="list_cp_city">
				<div class="labelwrapper">
										<label>Business phone:</label>
														</div>
				<input name="business_phone" id="business_phone" value="<?php echo cimy_uef_sanitize_content(get_cimyFieldValue(get_current_user_id(),  BUSINESSPHONE ));; ?>" type="text" class="text" minlength="2"><div class="clr"></div>
			</li>
                           <li id="list_cp_city">
				<div class="labelwrapper">
										<label>BB PIN field:</label>
														</div>
				<input name="bb_pin" id="bb_pin" value=" <?php echo cimy_uef_sanitize_content(get_cimyFieldValue(get_current_user_id(),  BBPIN ));; ?>" type="text" class="text" minlength="2"><div class="clr"></div>
			</li>
                           <li id="list_cp_city">
				<div class="labelwrapper">
										<label>Website Url:</label>
														</div>
				<input name="website_url" id="website_url" value="<?php echo cimy_uef_sanitize_content(get_cimyFieldValue(get_current_user_id(),  WEBSITEURL ));; ?>" type="text" class="text" minlength="2"><div class="clr"></div>
			</li>
            
             
     
                                    </ul>
                                   

			

			<p class="btn1">

				<input  style="width: 28%;" type="submit" name="step1" id="step1" class="btn_orange" value="<?php _e( 'Continue &rsaquo;&rsaquo;', APP_TD ); ?>" />

			</p>



		</ol>



		<input type="hidden" id="cat" name="cat" value="<?php echo $_POST['cat']; ?>" />

		<input type="hidden" id="catname" name="catname" value="<?php echo $_POST['catname']; ?>" />

		<input type="hidden" id="state" name="state" value="<?php echo $_POST['state']; ?>" />

		<input type="hidden" id="advertype" name="advertype" value="<?php echo $_POST['advert'];?>" />

		<input type="hidden" id="fid" name="fid" value="<?php if ( isset($_POST['fid']) ) echo $_POST['fid']; ?>" />

		<input type="hidden" id="oid" name="oid" value="<?php echo $order_id; ?>" />



	</form>



	<?php } ?>

    

</div>

