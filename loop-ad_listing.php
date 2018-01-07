<?php
/**
 * Main loop for displaying ads
 *
 */
?>

<?php appthemes_before_loop(); ?>

<?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>
    
        <?php appthemes_before_post(); ?>
    
        <div class="post-block-out <?php if ( is_sticky() ) echo 'featured'; ?>">
        
            <div class="post-block">
        
                <div class="post-left">
        
                    <?php if ( get_option('cp_ad_images') == 'yes' ) cp_ad_loop_thumbnail(); ?>
                
                </div>
        
                <div class="<?php if ( get_option('cp_ad_images') == 'yes' ) echo 'post-right'; else echo 'post-right-no-img'; ?> <?php echo get_option('cp_ad_right_class'); ?>">
                
                    <?php appthemes_before_post_title(); ?>
        
                    <h3><a href="<?php the_permalink(); ?>"><?php if ( mb_strlen( get_the_title() ) >= 35 ) echo mb_substr( get_the_title(), 0, 35 ).'...'; else the_title(); ?></a></h3>
                    
                    <div class="clr"></div>
                    
                    <?php appthemes_after_post_title(); ?>
                    <style type="text/css">
                    ul.compnay-det li {
						/* color: #53b426 !important;*/
 
						 font-size:13px;  						 list-style:none; 
						 padding-top:5px;
						}
						ul.compnay-det li span  {
							 color: #53b426 !important;
						 font-size:14px !important;  }
						 ul.compnay-det {
							 padding-top: 8px
							 }
						.post-meta2{
							color: #AFAFAF;
    font-size: 11px;
    margin: 0;
    padding: 4px 0;
    text-shadow: 0 1px 0 #FFFFFF;
    border-bottom: 1px dotted #BDBDBD;
							}	 
							.post-meta { display:none;}
                    </style>
                    <p class="post-meta2"></p>
                    <div class="clr"></div>
                    <ul  class="compnay-det">
                      <?php $admin_added_array = array();
							 
							 
				$admin_added_array = array('business_name','business_address','business_email','bb_pin','website_url','business_phone');			 
							 
	      $data_to_show_admin = FALSE;
		  
		  foreach($admin_added_array as $admin_added_arr){
			  if(get_post_meta(get_the_ID(),$admin_added_arr,true) != ''){
				  
				  $data_to_show_admin = TRUE;
				  }
			  
			  
			  }
		      if(!$data_to_show_admin){ ?>    
                                        
										<li id="cp_expires"><span><?php _e( 'Business name:', APP_TD ); ?></span> <?php echo get_post_meta( $post->ID, 'cp_business_name', true ); ?></li>
												<li id="cp_expires"><span><?php _e( 'Category:', APP_TD ); ?></span> 
							<?php 
							$cats = wp_get_post_terms( get_the_ID(), 'ad_cat', $args );
							foreach($cats as $cat ){
								
								$cat_str = $cat->name.',';
								
								}
								
							$cat_str = rtrim( $cat_str,',');	
							echo $cat_str;
							
							//print_r($cats);
							//echo get_post_meta( $post->ID, 'cp_business_address', true ); ?></li>
                                                
												<li id="cp_expires"><span><?php _e( 'Location:', APP_TD ); ?></span><?php echo get_post_meta( $post->ID, 'cp_city', true ); 
												 ?>
                          
						  <?php 
						  
						  $stats = wp_get_post_terms( get_the_ID(), 'states', $args );
							foreach($stats as $stat ){
								
								$stat_str = $stat->name.',';
								
								}
								
							$stat_str = rtrim( $stat_str,',');	
							if($stat_str != ''){ echo ',';}
							echo $stat_str;
						  
						//  echo get_post_meta( $post->ID, 'cp_state', true ); ?>
                          
                          
                          
                          </li>
												<li id="cp_expires"><span><?php _e( 'Posted Date:', APP_TD ); ?></span> <?php echo get_the_date(); ?></li>
												 
												<!--<li id="cp_expires"><span><?php _e( 'Website Url:', APP_TD ); ?></span> <?php echo get_post_meta( $post->ID, 'cp_website_url', true ); ?></li>-->
    <?php } 
	
	
	else  {?>
    <li id="cp_expires"><span><?php _e( 'Business name:', APP_TD ); ?></span> <?php echo get_post_meta( $post->ID, 'business_name', true ); ?></li> 
												<li id="cp_expires"><span><?php _e( 'Category:', APP_TD ); ?></span>
                                                 <?php $cats = wp_get_post_terms( get_the_ID(), 'ad_cat', $args );
							foreach($cats as $cat ){
								
								$cat_str = $cat->name.',';
								
								}
								
							$cat_str = rtrim( $cat_str,',');	
							echo $cat_str; ?></li>
												<li id="cp_expires"><span><?php _e( 'Location:', APP_TD ); ?></span> <?php echo get_post_meta( $post->ID, 'cp_city', true ); ?>
												
					<?php $stats = wp_get_post_terms( get_the_ID(), 'states', $args );
							foreach($stats as $stat ){
								
								$stat_str = $stat->name.',';
								
								}
								
							$stat_str = rtrim( $stat_str,',');	
							if($stat_str != ''){ echo ',';}
							echo $stat_str;
						  
						 ?></li>
												<li id="cp_expires"><span><?php _e( 'Posted Date:', APP_TD ); ?></span> <?php echo get_the_date();?></li>
												<!--<li id="cp_expires"><span><?php _e( 'Website Url:', APP_TD ); ?></span> <?php echo get_post_meta( $post->ID, 'website_url', true ); ?></li>-->
    
    
    
    <?php } ?>
    
         </ul>
                     <div class="clr"></div>
                    
                    <?php appthemes_before_post_content(); ?>
        
                    <p class="post-desc" style="font-size:12px"><?php echo cp_get_content_preview( 75 ); ?></p>
                    
                    <?php appthemes_after_post_content(); ?>
                    
                    <div class="clr"></div>
        
                </div>
        
                <div class="clr"></div>
        
            </div><!-- /post-block -->
          
        </div><!-- /post-block-out -->   
        
        <?php appthemes_after_post(); ?>
        
    <?php endwhile; ?>
    
    <?php appthemes_after_endwhile(); ?>

<?php else: ?>

    <?php appthemes_loop_else(); ?>

<?php endif; ?>

<?php appthemes_after_loop(); ?>

<?php wp_reset_query(); ?>
