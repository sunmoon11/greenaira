<?php
//die();

 // if($_GET['reportpost'] == $post->ID) { app_report_post($post->ID); $reported = true;} ?>

<script type='text/javascript'>
// <![CDATA[
/* setup the form validation */
jQuery(document).ready(function ($) {
    $('#mainform').validate({
        errorClass: 'invalid'
    });
});
// ]]>
</script><style type="text/css">

ul.ul-metadata li {  padding: 0 0 10px !important; }
</style>
 <?php 
 $post_terms= wp_get_post_terms( get_the_ID(), 'ad_cat', array("fields" => "names"));
 //print_r( $post_terms );
	 // die();
	// $term = get_queried_object();
	// echo $post_terms[0];;
	 global $wpdb;
	 
	 $query1 = $wpdb->get_row("select ID from $wpdb->posts WHERE post_type = 'adzones' AND post_title like 
	 '%".$post_terms[0]."1%'");
	 $query2 = $wpdb->get_row("select ID from $wpdb->posts WHERE post_type = 'adzones' AND post_title like 
	 '%".$post_terms[0]."2%'");
	 $query3 = $wpdb->get_row("select ID from $wpdb->posts WHERE post_type = 'adzones' AND post_title like 
	 '%".$post_terms[0]."3%'");
	 ;
	  
	  ?>



<div class="content">

    <div class="content_botbg">

        <div class="content_res">
            <!----banners-------------->
		<?php /*?><div class="shadowblock_out">

            <div class="shadowblockdir" style="border-radius: 6px; height: 128px; border: 3px solid rgb(218, 218, 218); padding: 8px 11px 5px;">

                <div class="sliderblockdir" >
                     <div class="banner_three" style="width: 330px; float: left; margin-right: 5px;">
                     
						<?php
						if($query2->ID != ''){   
						 echo do_shortcode("[pro_ad_display_adzone id=".$query1->ID."]");
						 }else{
						echo do_shortcode("[pro_ad_display_adzone id=1092]");
						 }
						  ?>
					 </div>
                     <div class="banner_three" style="width: 330px; float: left; margin-right: 5px;">
                     
						<?php 
						if($query2->ID != ''){   
						
						 echo do_shortcode("[pro_ad_display_adzone id=".$query2->ID."]");
						
						
						}else{
						echo do_shortcode("[pro_ad_display_adzone id=1093]");  ?>
                       <?php } ?>
                       
                       
                       
					 </div>
                    <div class="banner_three" style="width: 330px; float: left; margin-right: 1px;">
						<?php 
						if($query3->ID != ''){ ?>
						<?php echo do_shortcode("[pro_ad_display_adzone id=".$query3->ID."]"); ?>
						
						<?php 
						}else{
					echo do_shortcode("[pro_ad_display_adzone id=1094]");?>
                       <?php } ?>
					 </div>

                </div><!-- /sliderblock -->

            </div><!-- /shadowblock -->

        </div><?php */?><!-- /shadowblock_out -->
	<!----------------------------->

            <div id="breadcrumb">

                <?php if ( function_exists('cp_breadcrumb') ) cp_breadcrumb(); ?>

            </div>

            <!-- <div style="width: 105px; height:16px; text-align: right; float: left; font-size:11px; margin-top:-10px; padding:0 10px 5px 5px;"> -->
                <?php // if($reported) : ?>
                    <!-- <span id="reportedPost"><?php _e( 'Post Was Reported', APP_TD ); ?></span> -->
                <?php // else : ?>
                    <!--	<a id="reportPost" href="?reportpost=<?php echo $post->ID; ?>"><?php _e( 'Report This Post', APP_TD ); ?></a> -->
                <?php // endif; ?>
			<!-- </div> -->

            <div class="clr"></div>

            <div class="content_left">

	            <?php appthemes_before_loop(); ?>

		        <?php if ( have_posts() ) : ?>

			        <?php while ( have_posts() ) : the_post(); ?>

			            <?php appthemes_before_post(); ?>

				        <?php appthemes_stats_update( $post->ID ); //records the page hit ?>

				        <div class="shadowblock_out <?php if ( is_sticky() ) echo 'featured'; ?>">

					        <div class="shadowblock">

                                <?php appthemes_before_post_title(); ?>

							    <h1 class="single-listing"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>

							    <div class="clr"></div>

							    <?php appthemes_after_post_title(); ?>

							    <div class="pad5 dotted"></div>

                                <div class="bigright" <?php if(get_option($GLOBALS['app_abbr'].'_ad_images') == 'no') echo 'style="float:none;"'; ?>>

                                    <ul class="ul-metadata">

                                        <?php
                                        // grab the category id for the functions below
                                        $cat_id = appthemes_get_custom_taxonomy( $post->ID, APP_TAX_CAT, 'term_id' );

                                        // check to see if ad is legacy or not
                                        if ( get_post_meta( $post->ID, 'expires', true ) ) {  ?>

                                            <!--<li><span><?php //_e( 'Location:', APP_TD ); ?></span> <?php //echo get_post_meta( $post->ID, 'location', true ); ?></li>-->
                                            <!--<li><span><?php //_e( 'Phone:', APP_TD ); ?></span> <?php //echo get_post_meta( $post->ID, 'phone', true ); ?></li>-->
                                            <?php if ( get_post_meta( $post->ID, 'cp_adURL', true ) ) ?>
                                                <li><span><?php _e( 'URL:', APP_TD ); ?></span> <?php echo appthemes_make_clickable( get_post_meta( $post->ID, 'cp_adURL', true ) ); ?></li>

                                            <li><span><?php _e( 'Listed:', APP_TD ); ?></span> <?php the_time( get_option( 'date_format' ) . ' ' . get_option( 'time_format' ) ) ?></li>
                                            <li><span><?php _e( 'Expires:', APP_TD ); ?></span> <?php echo cp_timeleft( strtotime( get_post_meta( $post->ID, 'expires', true ) ) ); ?></li>

                                        <?php
                                        } else {

                                            if ( get_post_meta($post->ID, 'cp_ad_sold', true) == 'yes' ) : ?>
                                            <li id="cp_sold"><span><?php _e( 'This item has been sold', APP_TD ); ?></span></li>
                                            <?php endif; ?>
                                            <?php
                                            // 3.0+ display the custom fields instead (but not text areas)
                                            //cp_get_ad_details( $post->ID, $cat_id );
                                        ?>

                                            <li id="cp_listed"><span><?php _e( 'Listed:', APP_TD ); ?></span> <?php the_time( get_option( 'date_format' ) . ' ' . get_option( 'time_format' ) ) ?></li>

                                            <?php if ( get_post_meta($post->ID, 'cp_sys_expire_date', true) ) ?>
                                                <li id="cp_expires"><span><?php _e( 'Expires:', APP_TD ); ?></span> <?php echo cp_timeleft( strtotime( get_post_meta( $post->ID, 'cp_sys_expire_date', true) ) ); ?></li>


                                        <?php
                                        } // end legacy check
                                        ?>
                             <?php $admin_added_array = array();
							 
							 
				$admin_added_array = array('business_name','business_address','business_email','bb_pin','website_url','business_phone');			 
							 
	      $data_to_show_admin = FALSE;
		  
		  foreach($admin_added_array as $admin_added_arr){
			  if(get_post_meta(get_the_ID(),$admin_added_arr,true) != ''){
				  
				  $data_to_show_admin = TRUE;
				  }
			  
			  
			  }
		  
		  
	 
	 				 
							 
							  ?>       
                          <?php   if(!$data_to_show_admin){ ?>    
                                        
										<li id="cp_expires"><span><?php _e( 'Business name:', APP_TD ); ?></span> <?php echo get_post_meta( $post->ID, 'cp_business_name', true ); ?></li>
												<li id="cp_expires"><span><?php _e( 'Business address:', APP_TD ); ?></span> <?php echo get_post_meta( $post->ID, 'cp_business_address', true ); ?></li>
												<li id="cp_expires"><span><?php _e( 'Business email:', APP_TD ); ?></span> <?php echo get_post_meta( $post->ID, 'cp_business_email', true ); ?></li>
												<li id="cp_expires"><span><?php _e( 'Business phone:', APP_TD ); ?></span> <?php echo get_post_meta( $post->ID, 'cp_business_phone', true ); ?></li>
												<li id="cp_expires"><span><?php _e( 'BB PIN field:', APP_TD ); ?></span> <?php echo get_post_meta( $post->ID, 'cp_bb_pin', true ); ?></li>
												<li id="cp_expires"><span><?php _e( 'Website Url:', APP_TD ); ?></span> <?php echo get_post_meta( $post->ID, 'cp_website_url', true ); ?></li>
    <?php } else  {?>
    <li id="cp_expires"><span><?php _e( 'Business name:', APP_TD ); ?></span> <?php echo get_post_meta( $post->ID, 'business_name', true ); ?></li>
												<li id="cp_expires"><span><?php _e( 'Business address:', APP_TD ); ?></span> <?php echo get_post_meta( $post->ID, 'business_address', true ); ?></li>
												<li id="cp_expires"><span><?php _e( 'Business email:', APP_TD ); ?></span> <?php echo get_post_meta( $post->ID, 'business_email', true ); ?></li>
												<li id="cp_expires"><span><?php _e( 'Business phone:', APP_TD ); ?></span> <?php echo get_post_meta( $post->ID, 'business_phone', true ); ?></li>
												<li id="cp_expires"><span><?php _e( 'BB PIN field:', APP_TD ); ?></span> <?php echo get_post_meta( $post->ID, 'bb_pin', true ); ?></li>
												<li id="cp_expires"><span><?php _e( 'Website Url:', APP_TD ); ?></span> <?php echo get_post_meta( $post->ID, 'website_url', true ); ?></li>
    
    
    
    <?php } ?>
    
    
    
    
    
    
                                    </ul>

                                </div><!-- /bigright -->


                                <?php if ( get_option( 'cp_ad_images' ) == 'yes' ) : ?>

                                    <div class="bigleft">

                                        <div id="main-pic">

                                            <?php cp_get_image_url(); ?>

                                            <div class="clr"></div>

                                        </div>

                                        <div id="thumbs-pic">

                                            <?php cp_get_image_url_single( $post->ID, 'thumbnail', $post->post_title, -1 ); ?>
<!--<h3 style="text-align:center; margin-top:0px !important" class="description-area"><?php _e( 'Description/Service', APP_TD ); ?></h3>-->
                                            <div class="clr"></div>

                                        </div>

                                    </div><!-- /bigleft -->

                                <?php endif; ?>

				                <div class="clr"></div>

				                <?php appthemes_before_post_content(); ?>

                                <div class="single-main">
<h3 class="description-area">Description/Service</h3>
                                    <?php
                                    // 3.0+ display text areas in content area before content.
                                    cp_get_ad_details( $post->ID, $cat_id, 'content' );
                                    ?>

                                    

                                    <?php the_content(); ?>

                                </div>

                                <?php appthemes_after_post_content(); ?>

                            </div><!-- /shadowblock -->

                        </div><!-- /shadowblock_out -->

                        <?php appthemes_after_post(); ?>

			        <?php endwhile; ?>

			            <?php appthemes_after_endwhile(); ?>

			        <?php else: ?>

			            <?php appthemes_loop_else(); ?>

                    <?php endif; ?>

                    <div class="clr"></div>

                    <?php appthemes_after_loop(); ?>

                    <?php wp_reset_query(); ?>

                    <div class="clr"></div>

                    <?php comments_template( '/comments-ad_listing.php' ); ?>

            </div><!-- /content_left -->

            <?php get_sidebar( 'ad' ); ?>

            <div class="clr"></div>

        </div><!-- /content_res -->

    </div><!-- /content_botbg -->

</div><!-- /content -->
