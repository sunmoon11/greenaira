<?php
/**
 * Main loop for displaying blog posts
 *
 */
 //echo 's';
?>
<style>
	@media (min-width: 310px) and (max-width: 520px){
		.header_menu {
    background: #5bbc2e none repeat scroll 0 0;
    border-top: 2px solid #5bbc2e;
    height: 75px;
    padding-top: 9px;
}
	}

.entry-content {
height: 173px !important;
overflow: hidden !important;
}
.post img {
    background-color: #ffffff;
    border: 1px solid #cccccc;
    border-radius: 3px;
    box-shadow: 1px 1px 5px #b7b7b7;
    height: 52%;
    margin-top: 34px;
    padding: 5px;
    width: 24%;
}
.rw-ui-container { display:none !important}
</style>
<?php appthemes_before_blog_loop(); 
$i = 0;
 ?>

<?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post();
	if(($i<=8)  || $paged >1){
	
	 ?>
    
        <?php    appthemes_before_blog_post(); ?>

        <div <?php post_class('shadowblock_out'); ?> id="post-<?php the_ID(); ?>">

            <div class="shadowblock" style="display:block !important">
                
                <div class="entry-content">
                    <?php  if ( has_post_thumbnail() ) the_post_thumbnail('blog-thumbnail'); ?>
                    <h1 class="single blog"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
         <?php the_content( '<p>' . __( 'Continue reading &raquo;', APP_TD ) . '</p>' ); ?>
         
                    
                </div>    
                
                <?php appthemes_after_blog_post_content(); ?>
                <?php appthemes_before_blog_post_title(); ?>

                <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>" style="text-decoration: none; font-size: 18px; color: #FB6D48 !important;">Read More...</a>                
                <?php appthemes_after_blog_post_title(); ?> 
                
                <?php // hack needed for "<!-- more -->" to work with templates
                    global $more;
                    $more = 0;
                ?>
                <div class="date"><span>Posted on: <?php the_time('Y') ?></span> <?php the_time(__ ('F j', 'vigilance')) ?></div>
                
                <?php appthemes_before_blog_post_content(); ?>
                
            </div><!-- #shadowblock -->

        </div><!-- #shadowblock_out -->
        
        <?php appthemes_after_blog_post(); ?>

    <?php  } $i++;endwhile; ?>
    
        <?php appthemes_after_blog_endwhile(); ?>

<?php else: ?>
    
    <?php appthemes_blog_loop_else(); ?>

<?php endif; ?>

<?php appthemes_after_blog_loop(); ?>
