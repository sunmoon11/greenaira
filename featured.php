<?php
/**
 * The featured slider on the home page
 *
 */
?>

<?php if ( get_option('cp_enable_featured') == 'yes' ) : ?>

<script type="text/javascript">
// <![CDATA[
    /* featured listings slider */
    jQuery(document).ready(function($) {
        $('.slider').jCarouselLite({
            btnNext: '.next',
            btnPrev: '.prev',
            visible: 3,
            hoverPause: true,
            auto: 2800,
            speed: 4200,
            easing: 'easeOutQuint' // for different types of easing, see easing.js
        });
    });
// ]]>
</script>

    <?php query_posts( array('post__in' => get_option('sticky_posts'), 'post_type' => APP_POST_TYPE, 'post_status' => 'publish', 'orderby' => 'rand') ); ?>

        <?php appthemes_before_loop('featured'); ?>

        <?php if ( have_posts() ) : ?>

        <!-- featured listings -->
        <div class="shadowblock_out">

            <div class="shadowblockdir">

                <h2 class="dotted"><?php _e( 'Paid Featured Ads', APP_TD ); ?></h2>

                <div class="sliderblockdir">

                    <div id="list">

                        <div class="prev"><img src="http://greenaira.com/wp-content/uploads/2015/08/prev.png" alt="" /></div>

                        <div class="slider">

                            <ul>

                                <?php while ( have_posts() ) : the_post(); ?>

                                    <?php appthemes_before_post('featured'); ?>
    
                                    <li style="width: 250px;">
                                        <span class="feat_left">

                      											<?php if ( get_option('cp_ad_images') == 'yes' ) cp_ad_featured_thumbnail(); ?>
											
                      											<span class="price_sm"><?php if ( get_post_meta($post->ID, 'price', true) ) cp_get_price($post->ID, 'price'); else cp_get_price($post->ID, 'cp_price'); ?></span>

                    										</span>

                                        <?php appthemes_before_post_title('featured'); ?>
        
                                        <p><a href="<?php the_permalink() ?>"><?php echo get_the_title();?><?//php if ( mb_strlen( get_the_title() ) >= get_option('cp_featured_trim') ) echo mb_substr( get_the_title(), 0, get_option('cp_featured_trim') ).'...'; else the_title(); ?></a></p>

                                        <?php appthemes_after_post_title('featured'); ?>
                    
                                    </li>

                                    <?php appthemes_after_post('featured'); ?>
        
                                <?php endwhile; ?>

                                <?php appthemes_after_endwhile('featured'); ?>

                            </ul>

                        </div>

                        <div class="next"><img src="http://greenaira.com/wp-content/uploads/2015/08/next.png" alt="" /></div>

                    </div><!-- /slider -->

                    <div class="clr"></div>

                </div><!-- /sliderblock -->

            </div><!-- /shadowblock -->

        </div><!-- /shadowblock_out -->

        <?php endif; ?>

        <?php appthemes_after_loop('featured'); ?>

        <?php wp_reset_query(); ?>

<?php endif; // end feature ad slider check ?>

				