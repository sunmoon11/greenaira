<?php
/*
Template Name: Search Page
*/	
?>
  <div class="content">

    <div class="content_botbg">

      <div class="content_res">

      <div id="breadcrumb">

          <?php if ( function_exists('cp_breadcrumb') ) cp_breadcrumb(); ?>

        </div><!-- /breadcrumb -->

        <!-- left block -->

        <div class="content_left">

			<?php if ( have_posts() ) : ?>

				<div class="shadowblock_out">

					<div class="shadowblock">

						<h1 class="single dotted">

						

							<h1 class="page-title"><?php printf( __( 'Search Results forM: %s', 'greenaira' ), get_search_query() ); ?></h1>
						

                        </h1>
					</div><!-- /shadowblock -->
				<?php
			// Start the loop.
			while ( have_posts() ) : the_post(); ?>

				</div><!-- /shadowblock_out -->
                <?php get_template_part( 'content', 'search' ); ?>



			<?php endwhile; ?>





				<div class="shadowblock_out">

					<div class="shadowblock">

						<h1 class="single dotted"><?php printf( __( "Search for '%s' returned %s results", APP_TD ), trim( strip_tags( esc_attr( get_search_query() ) ) ), $wp_query->found_posts ); ?></h1>

						<p><?php _e( 'Sorry, no listings were found.', APP_TD ); ?></p>

						<p class="suggest"><?php // appthemes_search_suggest(); // deprecated by Yahoo ?></p>



					</div><!-- /shadowblock -->



				</div><!-- /shadowblock_out -->





			<?php endif; ?>





            <div class="pad5"></div>



            <div class="clr"></div>



						<?php appthemes_advertise_content(); ?>



            <div class="clr"></div>





        </div><!-- /content_left -->





        <?php get_sidebar(); ?>



        <div class="clr"></div>







      </div><!-- /content_res -->



    </div><!-- /content_botbg -->



  </div><!-- /content -->

