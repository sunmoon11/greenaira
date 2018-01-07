<?php
/**
 * Author profile page
 *
 */

//This sets the $curauth variable

//$author = get_user_by( 'slug', get_query_var( 'author_name' ) );
//echo $author->ID;



$curauth = get_queried_object();
if(esc_attr( get_the_author_meta( 'paid_user', $curauth->ID ))  ==  ''){
	
	wp_redirect(get_site_url()); 



}
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
?>
<style>
.author_page .post-block { height:290px; width: 214px!important;float: left!important;margin-right: 11px!important;margin-bottom: 20px;min-height: 230px!important;}
.author_page .shadowblock {display: none;}
.author_page .paging {background: transparent!important;border: 0px!important;}
.author_page .post-block .post-right {float: right;max-width: 100%!important;min-width: 100%!important;}
.author_page .content_left {width: 100%!important;}
.author_page .post-block .post-left {float: none!important;text-align: center!important;}
.author_page .post-right.full ul.compnay-det, p { display: none;}
.author_page .post-price {display: block;}
.author_page .paging .pages {width: 100%!important;float: right;}
.author_page .price-wrap {margin-bottom: 9px!important;}
.author_page ul.author-info {display: none;}
.author_page .post-left > a > img {width: 215px  !important; height:215px !important}
.author_page .tabnavig li a {display: none!important;}
.author_page .tabnavig li a.selected {display: block!important;}
@media only screen and (max-width:768px){
.author_page .post-block-out {border: 0px!important;}
}
@media (max-width: 520px) and (min-width: 310px){
.author_page .post-block-out { margin-left: 15%;}
    }
	.wp-caption {display:none}
	
</style>	
<div class="content author_page">

	<div class="content_botbg ">

		<div class="content_res">

			<div id="breadcrumb">
				<?php if ( function_exists('cp_breadcrumb') ) cp_breadcrumb(); ?>
			</div>

			<!-- left block -->
			<div class="content_left">

				<div class="shadowblock_out">

					<div class="shadowblock">

						<h1 class="single dotted"><?php printf( __( 'About %s', APP_TD ), $curauth->display_name ); ?></h1>

						<div class="post">

							<div id="user-photo"><?php appthemes_get_profile_pic($curauth->ID, $curauth->user_email, 96); ?></div>

							<div class="author-main">

								<ul class="author-info">
									<li><strong><?php _e( 'Member Since:', APP_TD ); ?></strong> <?php echo date_i18n(get_option('date_format'), strtotime($curauth->user_registered)); ?></li>
									<?php if ( !empty($curauth->user_url) ) { ?><li><strong><?php _e( 'Website:', APP_TD ); ?></strong> <a href="<?php echo esc_url($curauth->user_url); ?>"><?php echo strip_tags( $curauth->user_url ); ?></a></li><?php } ?>
									<?php if ( !empty($curauth->twitter_id) ) { ?><li><div class="twitterico"></div><a href="http://twitter.com/<?php echo urlencode($curauth->twitter_id); ?>" target="_blank"><?php _e( 'Twitter', APP_TD ); ?></a></li><?php } ?>
									<?php if ( !empty($curauth->facebook_id) ) { ?><li><div class="facebookico"></div><a href="http://facebook.com/<?php echo urlencode($curauth->facebook_id); ?>" target="_blank"><?php _e( 'Facebook', APP_TD ); ?></a></li><?php } ?>
								</ul>

								<?php cp_author_info( 'page' ); ?>

							</div>

							<h3 class="dotted"  ><?php _e( 'Description', APP_TD ); ?></h3>
							<p><?php echo appthemes_nl2br( $curauth->user_description ); ?></p>

						</div><!--/post-->

					</div><!-- /shadowblock -->

				</div><!-- /shadowblock_out -->


				<div class="tabcontrol">

					<ul class="tabnavig">
                    <?php
					
		$ad_tab=			query_posts( array( 'post_type' => APP_POST_TYPE, 'author' => $curauth->ID, 'paged' => $paged ) );
				if(!empty($ad_tab)  ){	
					 ?>
                    
						<li><a href="#block1" style="display:block !important"><span class="big"><?php _e( 'Ads', APP_TD ); ?></span></a></li>
                       <?php } ?>
                      
                       <?php
					   $post_tab =  query_posts( array( 'post_type' => 'post', 'post_status'=>'any', 
						 'author' =>$curauth->ID, 'paged' => $paged ) );
					      if(!empty($post_tab)){  ?>
                       
						<li><a href="#block2"  style="display:block !important"><span class="big"><?php _e( 'Posts', APP_TD ); ?></span></a></li>
                      <?php }  ?>
					</ul>

					<!-- tab 1 -->
					<div id="block1">

						<div class="clr"></div>

						<div class="undertab"><span class="big"><?php _e( 'Ads', APP_TD ); ?> / <strong><span class="colour"><?php _e( 'Latest items listed', APP_TD ); ?></span></strong></span></div>

						<?php query_posts( array( 'post_type' => APP_POST_TYPE, 'author' => $curauth->ID, 'paged' => $paged ) ); ?>

						<?php get_template_part( 'loop', 'ad_listing' ); ?>

					</div><!-- /block1 -->


					<!-- tab 2 -->
					<div id="block2">

						<div class="clr"></div>

						<div class="undertab"><span class="big"><?php _e( 'Posts', APP_TD ); ?> / <strong><span class="colour"><?php _e( 'Recent blog posts', APP_TD ); ?></span></strong></span></div>

						<?php  
						 query_posts( array( 'post_type' => 'post', 'post_status'=>'any', 
						 'author' =>$curauth->ID, 'paged' => $paged ) );
						 
						
						 ?>

						<?php get_template_part( 'loop' ); ?>

					</div><!-- /block2 -->


				</div><!-- /tabcontrol -->

			</div><!-- /content_left -->

			<?php get_sidebar( 'author' ); ?>

			<div class="clr"></div>

		</div><!-- /content_res -->

	</div><!-- /content_botbg -->

</div><!-- /content -->
