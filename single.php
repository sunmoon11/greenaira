<div class="content">
<style>
.attachment-blog-thumbnail{   
width : 99% !important
  } 
</style>
    <div class="content_botbg">
          <div class="content_res">
              <div id="breadcrumb">
                  <?php //if ( function_exists('cp_breadcrumb') ) cp_breadcrumb(); ?>
              </div>
			<div id="blog-left-sidebar">
				<?php dynamic_sidebar('blogleft'); ?>
			</div>                <div class="content_left">
   <?php echo do_shortcode('[yoast-breadcrumb]'); //instant_breadcrumb();?>
                    <?php appthemes_before_blog_loop(); ?>
                    <?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
						    <?php appthemes_before_blog_post(); ?>
							<?php appthemes_stats_update( $post->ID ); //records the page hit ?>
							<div class="shadowblock_out">
								<div class="shadowblock">
									<div class="post">
                                        <?php appthemes_before_blog_post_title(); ?>
										<h1 class="single blog"><?php the_title(); ?></h1>
										<?php appthemes_after_blog_post_title(); ?>
										<?php appthemes_before_blog_post_content(); ?>
										<?php if ( has_post_thumbnail() ) the_post_thumbnail( 'blog-thumbnail' ); ?>
										<?php the_content(); ?>
										<?php appthemes_after_blog_post_content(); ?>
									</div><!-- .post -->
								</div><!-- .shadowblock -->
							</div><!-- .shadowblock_out -->
							<?php appthemes_after_blog_post(); ?>
						<?php endwhile; ?>
						    <?php appthemes_after_blog_endwhile(); ?>
					<?php else: ?>
					    <?php appthemes_blog_loop_else(); ?>
					<?php endif; ?>
                        <div class="clr"></div>
                        <?php appthemes_after_blog_loop(); ?>
                        <div class="clr"></div>
                        <?php comments_template(); ?>
                </div><!-- .content_left -->
                <?php get_sidebar( 'blog' ); ?>
            <div class="clr"></div>
        </div><!-- .content_res -->
    </div><!-- .content_botbg -->
</div><!-- .content -->