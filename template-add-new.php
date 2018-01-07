<?php

/*

Template Name: Add New Add

*/

if(!session_id()) {
	session_start();
}

// grabs the user info and puts into vars

global $current_user, $app_abbr;
include_once(TEMPLATEPATH . '/includes/forms/step-functions.php');
include_once(TEMPLATEPATH . '/includes/theme-emails.php');

$ad_length = get_option('cp_prun_period');
$ad_expire_date = date_i18n('m/d/Y H:i:s', strtotime('+' . $ad_length . ' days')); // don't localize the word 'days'
?>

<script type='text/javascript'>
	jQuery(document).ready(function(){
		jQuery('#submit_add').validate();
		//jQuery("#1").rules("add", {extension: "jpg|png",messages: { accept: 'please enter right extension' }});
		jQuery.validator.addMethod('accept', function () { return true; });
	});
</script>
<script type="text/javascript">
/*jQuery(document).ready(function (e) {
		
	jQuery(document).on("change", ".image_upload_file", function() {
		var id = this.id;
	var file_data = jQuery("#"+id).prop("files")[0];   // Getting the properties of file from file field
	var form_data = new FormData();                  // Creating object of FormData class
	form_data.append("file", file_data)              // Appending parameter named file with properties of file_field to form_data
             // Adding extra parameters to form_data
	jQuery('#loading').show();
	var img = '<img src="<?php echo get_bloginfo('template_url').'/images/loader-spinner.gif'; ?>">';
	jQuery('#loading').html(img);
		
	   jQuery.ajax({
        	url: "<?php echo get_bloginfo('template_url').'/upload.php'; ?>",
			type: "POST",
			data:  form_data,
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(response)
		    {


             if (response == 'Your file size is over limit'){

                jQuery('#loading').hide();
              
                alert('You can upload maximum 1MB image');


             } else {
            var ids = response.split('##');

			 jQuery('#loading').hide();
			 jQuery('#imgArea_'+id+' img').attr("src",ids[0]);
			 jQuery('#attachment_id_'+id).val(ids[1]);
			  }
		    },
		  	error: function() 
	    	{
	    	} 	        
	   });
})

	
});*/
</script>

<?php 

if(isset($_POST['post_title']) && $_POST['post_title'] != '') {

	//echo '<pre>'; print_r($_POST); die;
	$_SESSION["savenewmetadata"]=true;
	
	set_advert_meta_data();
	wp_schedule_single_event( time() + 10, 'event_advert_meta_data' );
	
	$my_post = array(
		  'post_title'    => esc_html($_POST['post_title']),
		  'post_content'  => esc_attr($_POST['post_content']),
		  'post_status'   => 'pending',
		  'post_author'   => get_current_user_id(),
		  'post_type'	  => APP_POST_TYPE
		);
	$post_id = wp_insert_post( $my_post );
	foreach($_POST['attachment_ids'] as $attachment_id){
		wp_update_post( array(
				'ID' => $attachment_id,
				'post_parent' => $post_id,
				'post_title' => str_replace(" ", "-", strtolower(esc_html($_POST['post_title'])))."-".$attachment_id
			)
		);
		
		/*set_post_thumbnail( $post_id, $attachment_id );*/
	}
	
	
	$cat_ids = array($_POST['category']);
	wp_set_object_terms( $post_id, $cat_ids, 'ad_cat',true);
	
	$sub_category = array($_POST['sub_category']);
	wp_set_object_terms( $post_id, $sub_category, 'ad_cat',true);
	
	$state = array($_POST['state']);
	wp_set_object_terms( $post_id, $state, 'states',true);
	
	$tags_input = array($_POST['tags_input']);
	wp_set_object_terms( $post_id, $tags_input, 'ad_tag',true);
	
	update_post_meta( $post_id, 'business_name', esc_attr($_POST['business_name']) );
	update_post_meta( $post_id, 'business_address', esc_attr($_POST['business_address']) );
	update_post_meta( $post_id, 'business_email', esc_attr($_POST['business_email']) );
	update_post_meta( $post_id, 'bb_pin', esc_attr($_POST['bb_pin']) );
	update_post_meta( $post_id, 'cp_sys_userIP', $_SERVER['REMOTE_ADDR'] );
	update_post_meta( $post_id, 'cp_sys_total_ad_cost', '0.00' );
	update_post_meta( $post_id, 'cp_sys_expire_date', $ad_expire_date );
	update_post_meta( $post_id, 'cp_sys_ad_duration', $ad_length );
	
	
	update_post_meta( $post_id, 'business_phone', esc_attr($_POST['business_phone']) );
	update_post_meta( $post_id, 'cp_city', esc_attr($_POST['cp_city']) );
	update_post_meta( $post_id, 'cp_country', esc_attr($_POST['cp_country']) ) ;
	update_post_meta( $post_id, 'cp_street', esc_attr($_POST['cp_street']) );
	update_post_meta( $post_id, 'cp_price', esc_attr($_POST['cp_price']) );
	update_post_meta( $post_id, 'website_url', esc_attr($_POST['website_url']) );
	
	cp_new_ad_email($post_id);
	cp_owner_new_ad_email($post_id);

	unset($_POST);
	//wp_redirect("http://greenairafaqs.com/");
	wp_redirect(get_permalink(9908));
	exit;
	
}
?>
<div class="content">

	<div class="content_botbg">
		<div class="content_res">
			<!-- full block -->
			<div class="shadowblock_out">
				<div class="shadowblock">
				
				<?php
				$myvals = get_post_meta(9240);

foreach($myvals as $key=>$val)
{
    //echo $key . ' : ' . $val[0] . '<br/>';
}

	?>
				<?php
				$order_id  = uniqid(rand(10,1000), false);
				?>
				<div id="step1">
					<h2 class="dotted"><?php _e( 'Submit Your Listing', APP_TD ); ?></h2>
					<?php do_action( 'appthemes_notices' );
							// display the custom message
							echo get_option('cp_ads_form_msg');
					?>
					<p class="dotted">&nbsp;</p>
					<form id="submit_add" id="submit_add" method="post" class="form_step" enctype="multipart/form-data">
					<ol>
						
						<li>
							<div class="labelwrapper"><label><?php _e( 'Type of Advert:', APP_TD ); ?></label></div>
								<div id="ad-categories" style="display:block; margin-left:170px;">
									<div id="catlvl0">
										<select name="advert" class="dropdownlist required">
											<option value="">Select...</option>
											<option value="Service">Advertise</option>
											<option value="Product">Sell</option>
										</select>
									</div>
							</div>
							<div class="clr"></div>
						</li>
						<!--
<?php

?>
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

				<?php //cp_cost_per_listing(); ?>
				<?php echo "Free"; ?>

				<div class="clr"></div>

			</li>-->
			<li>

				<div class="labelwrapper"><label><?php _e( 'Select a State:', APP_TD ); ?><span class="colour">*</span></label></div>

				<div id="ad-categories" style="display:block; margin-left:170px;">
 
					<select name='state' id='state' class="dropdownlist required">

						<option value=""><?php echo esc_attr(__('Select a State')); ?></option>

						<?php

							$statecategories =
							 get_categories('taxonomy=states');

							foreach ($statecategories as $statecategory) {

							$stateoption = '<option value="'.$statecategory->category_nicename.'">';

							$stateoption .= $statecategory->name;

							$stateoption .= '</option>';

							echo $stateoption;

							}

						?>

						</select>

				

						<div style="clear:both;"></div>

				</div>

			</li>
			<li>

				<div class="labelwrapper"><label><?php _e( 'Select a Category:', APP_TD ); ?></label></div>

				<div id="ad-categories" style="display:block; margin-left:170px;">						

					<div id="catlvl0">

						<?php
					$args_cat = array('orderby' => 'title','order' => 'ASC','hide_empty' => true);
	$category = get_terms(APP_TAX_CAT, $args_cat);
	?>
					<select name='category' id='category' class="dropdownlist required" onchange="getSubcategory(this.value);">

						<option value=""><?php echo esc_attr(__('Select a Category')); ?></option>
						<?php foreach($category as $cat) {
							$parent = $cat->parent;
							if($parent == 0) {
							?>
						<option value="<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></option>
							
						<?php
							}
						}
						?>
						</select>

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
			
			
			<li>
				<div class="labelwrapper"><label><?php _e( 'Select a Sub Category:', APP_TD ); ?><!--<span class="colour">*</span>--></label></div>
				<div id="ad-categories" style="display:block; margin-left:170px;">
				<div id="ad_subcategories">
					<select name='sub_category' id='sub_category' class="dropdownlist">
						<option value=""><?php echo esc_attr(__('Select a Sub Category')); ?></option>
					</select>
				</div>
					
				</div>
				<div class="clr"></div>
			</li>

			
			
			<li id="list_post_title">

				<div class="labelwrapper">

					
					<label>Title: <span class="colour">*</span></label>

					
					
				</div>

				<input type="text" minlength="2" class="text required" id="post_title" name="post_title"><div class="clr"></div>


			</li>

			

			
			



	
            
			<li id="list_cp_price">

				<div class="labelwrapper">
					<label>Price: <span class="colour"></span></label>
				</div>

				<input type="text" minlength="2" class="text" id="cp_price" name="cp_price"><div class="clr"></div>


			</li>

			

			
			



	
            
			<li id="list_cp_street">

				<div class="labelwrapper">

					
					<label>Street: </label>

					
					
				</div>

				<input type="text" minlength="2" class="text" id="cp_street" name="cp_street"><div class="clr"></div>


			</li>

			

			
			



	
            
			<li id="list_cp_city">

				<div class="labelwrapper">

					
					<label>City: </label>

					
					
				</div>

				<input type="text" minlength="2" class="text" id="cp_city" name="cp_city"><div class="clr"></div>


			</li>

			<li id="list_cp_country">

				<div class="labelwrapper">

					
					<label>Country: <span class="colour">*</span></label>

					
					
				</div>

				<select name="cp_country" id="cp_country">
					<option value="Choose a Country">Choose a Country</option>
					<option value="Nigeria">Nigeria</option>
					<option value="USA">USA</option>
					<option value="Canada">Canada</option>
					<option value="Kenya">Kenya</option>
					<option value="India">India</option>
					<option value="South Africa">South Africa</option>
					<option value="UK">UK</option>
	
				</select>


			</li>

            
			<li id="list_tags_input">

				<div class="labelwrapper">

					
					<label>Ads Tags: </label>

					
					
				</div>

				<input type="text" minlength="2" class="text" id="tags_input" name="tags_input"><div class="clr"></div>


			</li>

			

			
			



	
            
			<li id="list_post_content">

				<div class="labelwrapper">

					
					<label>Description / Service: <span class="colour">*</span></label>

					
				</div>

				<div class="clr"></div><textarea minlength="2" class="required" cols="40" rows="8" id="post_content" name="post_content"></textarea><div class="clr"></div>




					


			</li>
			
			<li>
			
			<div class="labelwrapper" style="margin-bottom: 5px;">
					<label>Images: <span class="colour"></span></label>
			</div>
			<div class="clr"></div>
			<span class="imgids"></span>
			<div  action="<?php echo get_template_directory_uri(); ?>/upload-images.php" class="dropzone" id="my-awesome-dropzone" style="float:none; width:100%; padding:10px 5px; position:inherit;"></div>
			<div class="clr"></div>
			<div class="clr"></div>
			<div class="clr"></div>
				</li>                  
<li style="display:none">           

<?php
	do_action('profile_personal_options', $current_user);
	do_action('show_user_profile', $current_user);
?>
</li>                
            <li id="list_business_name">
				<div class="labelwrapper">
										<label>Business name:</label>
														</div>
				<input type="text" minlength="2" class="text " value="" id="business_name" name="business_name"><div class="clr"></div>
			</li>
                           <li id="list_cp_city">
				<div class="labelwrapper">
										<label>Business address:</label>
														</div>
				<input type="text" minlength="2" class="text " value="" id="business_address" name="business_address"><div class="clr"></div>
			</li>
                           <li id="list_cp_city">
				<div class="labelwrapper">
										<label>Business email:</label>
														</div>
				<input type="email" minlength="2" class="text " value="" id="business_email" name="business_email"><div class="clr"></div>
			</li>
                           <li id="list_cp_city">
				<div class="labelwrapper">
										<label>Business phone:</label>
														</div>
				<input type="text" minlength="2" class="text " value="" id="business_phone" name="business_phone"><div class="clr"></div>
			</li>
                           <li id="list_cp_city">
				<div class="labelwrapper">
										<label>BB PIN field:</label>
														</div>
				<input type="text" minlength="2" class="text " value=" " id="bb_pin" name="bb_pin"><div class="clr"></div>
			</li>
                           <li id="list_cp_city">
				<div class="labelwrapper">
										<label>Website Url:</label>
														</div>
				<input type="text" minlength="2" class="text " value="" id="website_url" name="website_url" class="url"><div class="clr"></div>
			</li>              

<script>
document.getElementById("business_name").value=document.getElementById("cimy_uef_1").value;
document.getElementById("business_address").value=document.getElementById("cimy_uef_2").value;
document.getElementById("business_email").value=document.getElementById("cimy_uef_3").value;
document.getElementById("business_phone").value=document.getElementById("cimy_uef_4").value;
document.getElementById("bb_pin").value=document.getElementById("cimy_uef_5").value;
document.getElementById("website_url").value=document.getElementById("cimy_uef_6").value;
</script>				
					</ol>
					<p class="btn1">
						<input type="submit" value="Submit" class="btn_orange" id="submt" name="submt" style="width: 28%;">
					</p>
					</form>
				</div><!-- end step 1 -->
				

				</div>
			</div><!-- /shadowblock_out -->
		<div class="clr"></div>
		</div><!-- /content_res -->
	</div><!-- /content_botbg -->
</div><!-- /content -->



<style type="text/css">
.image_div { width:150px; border:1px solid; height:100px; float:left; margin-left:10px; }
.image_div img { width:100%; height:100px;}
.featuredImage { text-align:center;}
.upload_image_button {
    margin: 35px;
}

/*27-1-16*/
.image_div{  border: 1px solid #cccccc; border-radius: 5px; background: rgba(0, 0, 0, 0.1) none repeat scroll 0 0; margin-top:5px;  margin-left: 15px; position:relative; } 

.upload_image_button {
    background: #53b426 none repeat scroll 0 0;
    border: 0 none;
    box-shadow: 0 3px 0 #53b426;
    color: #ffffff;
    cursor: pointer;
    margin: 35px;
    padding: 3px 12px 4px;
}
.upload_image_button:hover{ background:#53b426;}

#image_div_1 {
    margin-left: 0;
}
.remove {
    background: #000000 none repeat scroll 0 0;
    border-radius: 50%;
    color: #ffffff !important;
    font-weight: bold;
    height: 20px;
    line-height: 21px;
    position: absolute;
    right: -3px;
    text-decoration: none;
    top: -3px;
    width: 20px;
}
.remove:hover{ opacity:0.8;}
@media screen and (max-width:550px) {
	.image_div{display: block;
    float: none;
    margin: 10px auto !important;}
}



#frame1, #frame0 {
	background-color: #F7F7F7;
	margin: 30px auto auto;
	padding: 10px;
	width: 750px;
	border:1px solid #EEE;
}
#fade {
	background: none repeat scroll 0 0 #D3DCE3;
	display: none;
	height: 100%;
	left: 0;
	opacity: 0.4;
	position: fixed;
	top: 0;
	width: 100%;
	z-index: 99;
}
#centerBox {
	background-color: #FFFFFF;
	border: 5px solid #FFFFFF;
	border-radius: 2px 2px 2px 2px;
	box-shadow: 0 1px 3px rgba(34, 25, 25, 0.4);
	display: none;
	max-height: 480px;
	overflow: auto;
	visibility: hidden;
	width: 710px;
	z-index: 100;
}
.box1 {
	background: none repeat scroll 0 0 #F3F7FD;
	border: 1px solid #D3E1F9;
	font-size: 12px;
	margin-top: 5px;
	padding: 4px;
}
.button1 {
	background-color: #FFFFFF;
	background-image: -moz-linear-gradient(center bottom, #EDEDED 30%, #FFFFFF 83%);
	border-color: #999999;
	border-radius: 2px 2px 2px 2px;
	border-style: solid;
	border-width: 1px;
	box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
	color: #333333;
	cursor: pointer;
	display: inline-block;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: 700;
	height: 25px;
	line-height: 24px;
	margin-right: 2px;
	min-width: 40px;
	padding: 0 16px;
	text-align: center;
	text-decoration: none;
	-webkit-user-select: none;  /* Chrome all / Safari all */
	-moz-user-select: none;     /* Firefox all */
	-ms-user-select: none;      /* IE 10+ */
}
.button1:hover {
	text-decoration: underline;
}
.button1:active, .a:active {
	position: relative;
	top: 1px;
}


#imgContainer {
	width: 100%;
	text-align: center;
	position: relative;
}
.imgArea {
	display: inline-block;
	margin: 0 auto;
	width: 150px;
	height: 150px;
	position: relative;
	background-color: #eee;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
}
.imgArea img {
	outline: medium none;
	vertical-align: middle;
	width: 100%;
	height:150px;
}
#imgChange {
	background: url("<?php echo get_bloginfo('template_url'); ?>/images/overlay.png") repeat scroll 0 0 rgba(0, 0, 0, 0);
	bottom: 0;
	color: #FFFFFF;
	display: block;
	height: 30px;
	left: 0;
	line-height: 32px;
	position: absolute;
	text-align: center;
	width: 100%;
}
#imgChange input[type="file"] {
	bottom: 0;
	cursor: pointer;
	height: 100%;
	left: 0;
	margin: 0;
	opacity: 0;
	padding: 0;
	position: absolute;
	width: 100%;
	z-index: 0;
}
#imgChange{height:100%}
#imgChange span {
    display: block;
    padding-top: 40%;
}
/* Progressbar */
.progressBar {
	background: none repeat scroll 0 0 #E0E0E0;
	left: 0;
	padding: 3px 0;
	position: absolute;
	top: 50%;
	width: 100%;
	display: none;
}
.progressBar .bar {
	background-color: #FF6C67;
	width: 0%;
	height: 14px;
}
.progressBar .percent {
	display: inline-block;
	left: 0;
	position: absolute;
	text-align: center;
	top: 2px;
	width: 100%;
}
.form_step label.invalid { display:none !important; }
</style>

<script type="text/javascript">
function getSubcategory(category_id) {
	
		var img = '<img src="<?php echo get_bloginfo('template_url').'/images/loader-spinner.gif'; ?>">';
		jQuery('#ad_subcategories').html(img);
		jQuery.ajax({
		url : ajax_object.ajax_url,
		type : 'post',
		data : {
			action : 'getSubcategory',
			category_id : category_id
		},
		success : function( response ) {
		
			jQuery('#ad_subcategories').html(response);
		}
	});
	
}
</script>