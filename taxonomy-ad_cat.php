 <style>
 @media (min-width: 310px) and (max-width: 520px){
    #ad_tag_cloud-2 {
    display: none;
}
}
</style>
  <?php //$term = get_queried_object(); ?>
  <div class="content">
    
      <?php 
	 // print_r(get_page_by_title( $term->name, $output, 'adzones' ));
	 $term = get_queried_object();
	 global $wpdb;
	 
	 $query1 = $wpdb->get_row("select ID from $wpdb->posts WHERE post_type = 'adzones' AND post_title like 
	 '%".$term->name."1%'");
	 $query2 = $wpdb->get_row("select ID from $wpdb->posts WHERE post_type = 'adzones' AND post_title like 
	 '%".$term->name."2%'");
	 $query3 = $wpdb->get_row("select ID from $wpdb->posts WHERE post_type = 'adzones' AND post_title like 
	 '%".$term->name."3%'");
	 ;
	// echo ("select ID from  $wpdb->posts WHERE post_type = 'adzones' AND post_title like %".$term->name."%");
	 
	
	
	  
	  ?>
      
      
    <div class="content_botbg">

      <div class="content_res">
      
        <!----banners-------------->
		<div class="shadowblock_out">

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
						
						echo do_shortcode("[pro_ad_display_adzone id=1093]"); 
						
						
						}else{
						cp_banner_two_cat(); ?>
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

        </div><!-- /shadowblock_out -->
	<!----------------------------->
        <div id="breadcrumb">

          <?php if ( function_exists('cp_breadcrumb') ) cp_breadcrumb(); ?>

        </div>

        <!-- left block -->
        <div class="content_left">

          

            <div class="shadowblock_out">

                <div class="shadowblock">

                  <div id="catrss"><a href="<?php echo get_term_feed_link($term->term_id, $taxonomy); ?>"><img src="<?php bloginfo('template_url'); ?>/images/rss.png" width="16" height="16" alt="<?php echo $term->name; ?> <?php _e( 'RSS Feed', APP_TD ); ?>" title="<?php echo $term->name; ?> <?php _e( 'RSS Feed', APP_TD ); ?>" /></a></div>
                  <h1 class="single dotted"><?php _e( 'Listings for', APP_TD ); ?> <?php echo $term->name; ?> (<?php echo $wp_query->found_posts; ?>)</h1>

				  <p><?php echo $term->description; ?></p>

                </div><!-- /shadowblock -->

            </div><!-- /shadowblock_out -->


                <?php get_template_part( 'loop', 'ad_listing' ); ?>


	</div><!-- /content_left -->


        <?php get_sidebar(); ?>


        <div class="clr"></div>

      </div><!-- /content_res -->

    </div><!-- /content_botbg -->

  </div><!-- /content -->
