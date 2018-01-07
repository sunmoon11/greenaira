<style>
	/*  SECTIONS  */
.section {
	clear: both;
	padding: 0px;
	margin: 0px;
}
.group{
	margin-left: 15px;
}
/*  COLUMN SETUP  */
.col {
	display: block;
	float:left;
	margin: 1% 0 1% 1.6%;
}
.col:first-child { margin-left: 0; }

/*  GROUPING  */
.group:before,
.group:after { content:""; display:table; }
.group:after { clear:both;}
.group { zoom:1; /* For IE 6/7 */ }

/*  GRID OF SIX  */
.span_6_of_6 {
	width: 100%;
}

.span_5_of_6 {
  	width: 83.06%;
}

.span_4_of_6 {
  	width: 66.13%;
}

.span_3_of_6 {
  	width: 49.2%;
}

.span_2_of_6 {
  	width: 32.26%;
}

.span_1_of_6 {
  	width: 15.33%;
}

/*  GO FULL WIDTH BELOW 480 PIXELS */
@media only screen and (max-width: 480px) {
	.col {  margin: 1% 0 1% 0%; }
	.span_1_of_6, .span_2_of_6, .span_3_of_6, .span_4_of_6, .span_5_of_6, .span_6_of_6 { width: 100%; }
}
.col.span_1_of_6 a {
    font-size: 15px;
    text-decoration: none;
}

</style>
  <div class="content">

    <div class="content_botbg">

      <div class="content_res">
        <!----banners-------------->
		<div class="shadowblock_out">

            <div class="shadowblockdir" style="border: 1px solid #fff; border-radius: 6px; height: 136px; padding: 8px 4px 5px;">

                <div class="sliderblockdir" >
                     <div class="banner_two" style="width: 383px; float: left; margin-right: 5px;">
						<?php cp_banner_three_anambra(); ?>
					 </div>
                     <div class="banner_three" style="width: 380px; float: left;">
						<?php cp_banner_two_anambra(); ?>
					 </div>

                </div><!-- /sliderblock -->

            </div><!-- /shadowblock -->

        </div><!-- /shadowblock_out -->
		<!----------------------------->
		<div class="shadowblock_out">

            <div class="shadowblockdir" style="border: 1px solid #fff; border-radius: 6px; height: 136px; padding: 8px 4px 5px;">

                <div class="sliderblockdir" >
					<div class="section group">
						<div class="col span_1_of_6">
						    <ul>
								<li><a href="<?php echo site_url(); ?>/states/abia">Abia</a></li>
								<li><a href="<?php echo site_url(); ?>/states/abuja">Abuja</a></li>
								<li><a href="<?php echo site_url(); ?>/states/adamawa">Adamawa</a></li>
								<li><a href="<?php echo site_url(); ?>/states/akwa-lbom">Akwa lbom</a></li>
								<li><a href="<?php echo site_url(); ?>/states/anambra">Anambra</a></li>
								<li><a href="<?php echo site_url(); ?>/states/bauchi">Bauchi</a></li>								
							</ul>
						</div>
						<div class="col span_1_of_6">
						    <ul>
								<li><a href="<?php echo site_url(); ?>/states/bayelsa">Bayelsa</a></li>
								<li><a href="<?php echo site_url(); ?>/states/benue">Benue</a></li>
								<li><a href="<?php echo site_url(); ?>/states/borno">Borno</a></li>
								<li><a href="<?php echo site_url(); ?>/states/cross-river">Cross River</a></li>
								<li><a href="<?php echo site_url(); ?>/states/delta">Delta</a></li>
								<li><a href="<?php echo site_url(); ?>/states/ebonyi">Ebonyi</a></li>
							</ul>
						</div>
						<div class="col span_1_of_6">
						    <ul>
								<li><a href="<?php echo site_url(); ?>/states/edo">Edo</a></li>
								<li><a href="<?php echo site_url(); ?>/states/ekiti">Ekiti</a></li>
								<li><a href="<?php echo site_url(); ?>/states/gombe">Gombe</a></li>
								<li><a href="<?php echo site_url(); ?>/states/imo">Imo</a></li>
								<li><a href="<?php echo site_url(); ?>/states/jigawa">Jigawa</a></li>
								<li><a href="<?php echo site_url(); ?>/states/kaduna">Kaduna</a></li>
							</ul>
						</div>
						<div class="col span_1_of_6">
						    <ul>
								<li><a href="<?php echo site_url(); ?>/states/kano">Kano</a></li>
								<li><a href="<?php echo site_url(); ?>/states/katsini">Katsini</a></li>
								<li><a href="<?php echo site_url(); ?>/states/kebbi">Kebbi</a></li>
								<li><a href="<?php echo site_url(); ?>/states/kogi">Kogi</a></li>
								<li><a href="<?php echo site_url(); ?>/states/kwara">Kwara</a></li>
								<li><a href="<?php echo site_url(); ?>/states/lagos">Lagos</a></li>
							</ul>
						</div>
						<div class="col span_1_of_6">
						    <ul>
								<li><a href="<?php echo site_url(); ?>/states/nasarawa">Nasarawa</a></li>
								<li><a href="<?php echo site_url(); ?>/states/niger">Niger</a></li>
								<li><a href="<?php echo site_url(); ?>/states/ogun">Ogun</a></li>
								<li><a href="<?php echo site_url(); ?>/states/ondo">Ondo</a></li>
								<li><a href="<?php echo site_url(); ?>/states/osun">Osun</a></li>
								<li><a href="<?php echo site_url(); ?>/states/oyo">Oyo</a></li>
							</ul>
						</div>
						<div class="col span_1_of_6">
						    <ul>
								<li><a href="<?php echo site_url(); ?>/states/plateau">Plateau</a></li>
								<li><a href="<?php echo site_url(); ?>/states/port-harcourt">Port-Harcourt</a></li>
								<li><a href="<?php echo site_url(); ?>/states/rivers">Rivers</a></li>
								<li><a href="<?php echo site_url(); ?>/states/skoto">Skoto</a></li>
								<li><a href="<?php echo site_url(); ?>/states/taraba">Taraba</a></li>
								<li><a href="<?php echo site_url(); ?>/states/yobe">Yobe</a></li>
								<li><a href="<?php echo site_url(); ?>/states/zamfara">Zamfara</a></li>
							</ul>
						</div>
					</div>
					
                </div><!-- /sliderblock -->

            </div><!-- /shadowblock -->

        </div>

        <div id="breadcrumb">

          <?php if ( function_exists('cp_breadcrumb') ) cp_breadcrumb(); ?>

        </div>

        <!-- left block -->
        <div class="content_left">

            <?php $term = get_queried_object(); ?>

            <div class="shadowblock_out">

                <div class="shadowblock">

                  <div id="catrss"><a href="<?php echo get_term_feed_link($term->term_id, $taxonomy); ?>"><img src="<?php bloginfo('template_url'); ?>/images/rss.png" width="16" height="16" alt="<?php echo $term->name; ?> <?php _e( 'RSS Feed', APP_TD ); ?>" title="<?php echo $term->name; ?> <?php _e( 'RSS Feed', APP_TD ); ?>" /></a></div>
                  <h1 class="single dotted"><?php _e( 'Adverts Listings for', APP_TD ); ?> <?php echo $term->name; ?> (<?php echo $wp_query->found_posts; ?>)</h1>

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
