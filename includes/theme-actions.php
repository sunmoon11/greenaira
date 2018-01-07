<?php
/**
 * Adds all action hooks for the theme
 *
 * @since 3.1
 * @uses add_action() calls to trigger the hooks.
 *
 */
 
  
/**
 * add the ad price field in the loop before the ad title 
 * @since 3.1.3
 */
function cp_ad_loop_price() {
	global $post;
	// don't add the ad price to pages and posts
	if ( is_page() )
		return;
	if ( $post->post_type == 'page' || $post->post_type == 'post' )
		return;
?>
	<div class="price-wrap">
		<span class="tag-head">&nbsp;</span><p class="post-price"><?php if ( get_post_meta( $post->ID, 'price', true ) ) cp_get_price( $post->ID, 'price' ); else cp_get_price( $post->ID, 'cp_price' ); ?></p>
	</div>

<?php
}
add_action( 'appthemes_before_post_title', 'cp_ad_loop_price' );


/**
 * add the ad meta in the loop after the ad title 
 * @since 3.1
 */
function cp_ad_loop_meta() {
	if ( is_page() || is_singular( APP_POST_TYPE ) ) return; // don't do ad-meta on pages
	global $post;
  if ( $post->post_type == 'page' ) return;
?>	
    <p class="post-meta">
        <span class="folder"><?php if ( $post->post_type == 'post' ) the_category(', '); else echo get_the_term_list( $post->ID, APP_TAX_CAT, '', ', ', '' ); ?></span> | <span class="folder"><?php if ( $post->post_type == 'post' ) the_category(', '); else echo get_the_term_list( $post->ID, APP_TAX_CAT_STATE, '', ', ', '' ); ?></span> | <span class="owner"><?php if ( get_option('cp_ad_gravatar_thumb') == 'yes' ) appthemes_get_profile_pic( get_the_author_meta('ID'), get_the_author_meta('user_email'), 16 ) ?><?php the_author_posts_link(); ?></span> | <span class="clock"><span><?php echo appthemes_date_posted($post->post_date); ?></span></span>
    </p>
<?php
}
add_action( 'appthemes_after_post_title', 'cp_ad_loop_meta' );


/**
 * add the stats after the ad listing and blog post content 
 * @since 3.1
 */
function cp_do_loop_stats() {
	if ( is_page() || is_singular( array( 'post', APP_POST_TYPE ) ) ) return; // don't do on pages
	global $post;
  if ( $post->post_type == 'page' ) return;
?>		
	<p class="stats"><?php if ( get_option('cp_ad_stats_all') == 'yes' ) appthemes_stats_counter( $post->ID ); ?></p>
<?php
}
add_action( 'appthemes_after_post_content', 'cp_do_loop_stats' );
add_action( 'appthemes_after_blog_post_content', 'cp_do_loop_stats' );


/**
 * add the ad reference ID after the ad listing content 
 * @since 3.1.3
 */
function cp_do_ad_ref_id() {
	if ( !is_singular( APP_POST_TYPE ) ) return;
	global $post;
?>		
	<div class='note'><strong><?php _e( 'Ad Reference ID:', APP_TD ); ?></strong> <?php if ( get_post_meta( $post->ID, 'cp_sys_ad_conf_id', true ) ) echo get_post_meta( $post->ID, 'cp_sys_ad_conf_id', true ); else _e( 'N/A', APP_TD ); ?></div>
    <div class="dotted"></div>
    <div class="pad5"></div>
<?php
}
add_action( 'appthemes_after_post_content', 'cp_do_ad_ref_id' );


/**
 * add the pagination after the ad listing and blog post content 
 * @since 3.1
 */
function cp_do_pagination() {
	
	if ( is_page() || is_singular( 'post' ) ) return; // don't do on pages, the home page, or single blog post
	global $post;

    if ( function_exists('appthemes_pagination') ) appthemes_pagination();

}
add_action('appthemes_after_endwhile', 'cp_do_pagination');
add_action('appthemes_after_blog_endwhile', 'cp_do_pagination');


/**
 * add the no ads found message 
 * @since 3.1
 */
function cp_ad_loop_else() {
?>		
    <div class="shadowblock_out">

		<div class="shadowblock">

			<div class="pad10"></div>

			<p><?php _e( 'Sorry, no listings were found.', APP_TD ); ?></p>

			<div class="pad50"></div>
        
		</div><!-- /shadowblock -->

	</div><!-- /shadowblock_out -->
<?php
}
add_action('appthemes_loop_else', 'cp_ad_loop_else');


/**
 * Blog section actions
 *
 */

/**
 * add the post meta after the blog post title 
 * @since 3.1
 */
function cp_blog_post_meta() {
	if ( is_page() ) return; // don't do post-meta on pages
	global $post;
?>		
	<p class="meta dotted"><?php echo "Posted by: "?> <span class="user"><?php the_author_posts_link(); ?></span>  <!--<span class="folderb"><?php //the_category(', ') ?></span>--> | <span class="clock"><span><?php echo appthemes_date_posted( $post->post_date ); ?></span></span></p>
<?php
}
add_action('appthemes_after_blog_post_title', 'cp_blog_post_meta');


/**
 * add the blog post meta footer content 
 * @since 3.1.3
 */
function cp_blog_post_meta_footer() {
    if ( !is_singular( array( 'post', APP_POST_TYPE ) ) ) return;
	global $post;
?>		
	<div class="prdetails">
	    <?php if ( is_singular( 'post' ) ) { ?>
        <p class="tags"><?php if ( get_the_tags() ) echo the_tags( '', '&nbsp;', '' ); else _e( 'No Tags', APP_TD ); ?></p>
        <?php } else { ?>
        <p class="tags"><?php if ( get_the_term_list( $post->ID, APP_TAX_TAG ) ) echo get_the_term_list( $post->ID, APP_TAX_TAG, '', '&nbsp;', '' ); else _e( 'No Tags', APP_TD ); ?></p>
        <?php } ?>
        <?php if ( get_option( 'cp_ad_stats_all') == 'yes' ) { ?><p class="stats"><?php appthemes_stats_counter( $post->ID ); ?></p> <?php } ?>
        <p class="print"><?php if ( function_exists('wp_email') ) email_link(); ?>&nbsp;&nbsp;<?php if ( function_exists('wp_print') ) print_link(); ?></p>
        <?php cp_edit_ad_link(); ?>
    </div>
    
    <?php if ( function_exists('selfserv_sexy') ) selfserv_sexy(); 
}
add_action('appthemes_after_blog_post_content', 'cp_blog_post_meta_footer');
add_action('appthemes_after_post_content', 'cp_blog_post_meta_footer');


/**
 * add the no blog posts found message 
 * @since 3.1
 */
function cp_blog_loop_else() {
?>
	<div class="shadowblock_out">

		<div class="shadowblock">

			<div class="pad10"></div>

			<p><?php _e( 'Sorry, no posts could be found.', APP_TD ); ?></p>

			<div class="pad50"></div>

		</div><!-- /shadowblock -->

	</div><!-- /shadowblock_out -->
<?php
}
add_action('appthemes_blog_loop_else', 'cp_blog_loop_else');


/**
 * add the comments bubble 
 * @since 3.1.3
 */
function cp_blog_comments_bubble() {
?>		
    <div style="width: 24%; float: right"><p class="meta dotted" style="color: rgb(252, 109, 38); font-size: 15px;">Comments:</p><div class="comment-bubble" style="margin-top: -38px;"><?php comments_popup_link( '0', '1', '%' ); ?></div></div>
<?php
}
add_action( 'appthemes_before_blog_post_title', 'cp_blog_comments_bubble' );


/**
 * add the blog and ad listing single page banner ad 
 * @since 3.1.3
 */
function cp_single_ad_banner() {
	global $post;

	if ( !is_singular( array( 'post', APP_POST_TYPE ) ) )
		return;

	appthemes_advertise_content();

}
add_action( 'appthemes_after_blog_loop', 'cp_single_ad_banner' );
add_action( 'appthemes_after_loop', 'cp_single_ad_banner' );


/**
 * collect stats if are enabled, limits db queries
 * @since 3.1.8
 */
function cp_cache_stats() {
  if( get_option('cp_ad_stats_all') == 'yes' && !is_singular(array(APP_POST_TYPE, 'post')) ) {
    add_action('appthemes_before_loop', 'appthemes_collect_stats');
    //add_action('appthemes_before_search_loop', 'appthemes_collect_stats');
    add_action('appthemes_before_blog_loop', 'appthemes_collect_stats');
  }
}
add_action( 'wp', 'cp_cache_stats' );


/**
 * collect featured images if are enabled, limits db queries
 * @since 3.1.8
 */
function cp_cache_featured_images() {
  if( get_option('cp_ad_images') == 'yes' && !is_singular(array(APP_POST_TYPE, 'post')) ) {
    add_action('appthemes_before_loop', 'cp_collect_featured_images');
    add_action('appthemes_before_featured_loop', 'cp_collect_featured_images');
    //add_action('appthemes_before_search_loop', 'cp_collect_featured_images');
    add_action('appthemes_before_blog_loop', 'cp_collect_featured_images');
  }
}
add_action( 'wp', 'cp_cache_featured_images' );


/**
 * ignore sticky posts in main wp query, saves memory
 * @since 3.1.8
 */
function cp_ignore_sticky_on_homepage( $query ) {
  if( $query->is_main_query() && $query->is_home() )
    $query->set( 'ignore_sticky_posts', '1' );
}
if ( version_compare($wp_version, '3.3', '>=') )
  add_action( 'pre_get_posts', 'cp_ignore_sticky_on_homepage' );


/**
 * modify Social Connect redirect to url
 * @since 3.1.9
 */
function cp_social_connect_redirect_to( $redirect_to ) {
	if ( preg_match('#/wp-(admin|login)?(.*?)$#i', $redirect_to) )
		$redirect_to = home_url();

	if ( current_theme_supports( 'app-login' ) ) {
		if ( APP_Login::get_url('redirect') == $redirect_to || appthemes_get_registration_url('redirect') == $redirect_to )
			$redirect_to = home_url();
	}

	return $redirect_to;
}
add_filter( 'social_connect_redirect_to', 'cp_social_connect_redirect_to', 10, 1 );


/**
 * query ads on author page in main wp query, fixes pagination
 * @since 3.2
 */
function cp_query_ads_on_author_page( $query ) {
  if ( $query->is_main_query() && $query->is_author() )
    $query->set( 'post_type', array( 'post', APP_POST_TYPE ) );
}
if ( version_compare($wp_version, '3.3', '>=') && !is_admin() )
  add_action( 'pre_get_posts', 'cp_query_ads_on_author_page' );


/**
 * process Social Connect request if App Login enabled
 * @since 3.2
 */
function cp_social_connect_login() {
	if ( isset($_REQUEST['action']) && $_REQUEST['action'] == 'social_connect' ) {
		if ( current_theme_supports( 'app-login' ) && function_exists('sc_social_connect_process_login') )
			sc_social_connect_process_login( false );
	}
}
add_action( 'init', 'cp_social_connect_login' );


/**
 * adds reCaptcha support
 * @since 3.2
 */
function cp_recaptcha_support() {
	global $app_abbr;
	if ( get_option($app_abbr.'_captcha_enable') == 'yes' ) {
		add_theme_support( 'app-recaptcha', array(
			'file' => TEMPLATEPATH . '/includes/lib/recaptchalib.php',
			'theme' => get_option($app_abbr.'_captcha_theme'),
			'public_key' => get_option($app_abbr.'_captcha_public_key'),
			'private_key' => get_option($app_abbr.'_captcha_private_key'),
		) );
	}
}
add_action( 'appthemes_init', 'cp_recaptcha_support' );
add_action( 'register_form', 'appthemes_recaptcha' );


/**
 * controls password fields visibility
 * @since 3.2
 */
function cp_password_fields_support( $bool ) {
	global $app_abbr;
	if ( get_option($app_abbr.'_allow_registration_password') == 'yes' || is_admin() )
		return true;
	else
		return false;
}
add_filter( 'show_password_fields', 'cp_password_fields_support', 10, 1 );


/**
 * replaces default registration email
 * @since 3.2
 */
function cp_custom_registration_email() {
	remove_action( 'appthemes_after_registration', 'wp_new_user_notification', 10, 2 );
//	add_action( 'appthemes_after_registration', 'app_new_user_notification', 10, 2 );
}
add_action( 'after_setup_theme', 'cp_custom_registration_email', 1000 );


/**
 * redirects logged in users to homepage
 * @since 3.2
 */
function cp_redirect_to_home_page() {
	if ( !isset($_REQUEST['redirect_to']) ) {
		wp_redirect( home_url() );
		exit();
	}
}
add_action( 'wp_login', 'cp_redirect_to_home_page' );
add_action( 'app_login', 'cp_redirect_to_home_page' );


/**
 * 336 x 280 ad box on single page
 * @since 3.3
 */
function cp_adbox_336x280() {
	global $app_abbr;

	if ( get_option($app_abbr.'_adcode_336x280_enable') == 'yes' ) {
	?>
		<div class="shadowblock_out">
			<div class="shadowblock">
				<h2 class="dotted"><?php _e( 'Sponsored Links', APP_TD ); ?></h2>
	<?php
				if ( get_option($app_abbr.'_adcode_336x280') != '' ) {
					echo stripslashes( get_option($app_abbr.'_adcode_336x280') );
				} else {
					if ( get_option($app_abbr.'_adcode_336x280_url') ) {
						$img = html( 'img', array( 'src' => get_option($app_abbr.'_adcode_336x280_url'), 'border' => '0', 'alt' => '' ) );
						echo html( 'a', array( 'href' => get_option($app_abbr.'_adcode_336x280_dest'), 'target' => '_blank' ), $img );
					}
				}
	?>
			</div><!-- /shadowblock -->
		</div><!-- /shadowblock_out -->
<?php
	}
}
add_action( 'appthemes_advertise_content', 'cp_adbox_336x280' );


/**
 * 468 x 60 ad box in header
 * @since 3.3
 */
function cp_adbox_468x60() {
	global $app_abbr;

	if ( get_option($app_abbr.'_adcode_468x60_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_adcode_468x60') != '' ) {
			echo stripslashes( get_option($app_abbr.'_adcode_468x60') );
		} else {
			if ( ! get_option($app_abbr.'_adcode_468x60_url') || ! get_option($app_abbr.'_adcode_468x60_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/4689x60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.greenaira.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_adcode_468x60_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_adcode_468x60_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_header', 'cp_adbox_468x60' );

function cp_adbox_468x60_cat() {
	global $app_abbr;

	if ( get_option($app_abbr.'_adcode_468x60_cat_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_adcode_468x60_cat') != '' ) {
			echo stripslashes( get_option($app_abbr.'_adcode_468x60_cat') );
		} else {
			if ( ! get_option($app_abbr.'_adcode_468x60_cat_url') || ! get_option($app_abbr.'_adcode_468x60_cat_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/4689x60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.greenaira.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_adcode_468x60_cat_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_adcode_468x60_cat_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_header_cat', 'cp_adbox_468x60_cat' );

function cp_banner_two() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_url') || ! get_option($app_abbr.'_banner_two_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two', 'cp_banner_two' );

function cp_banner_two_cat() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_cat_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_cat') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_cat') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_cat_url') || ! get_option($app_abbr.'_banner_two_cat_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_cat_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_cat_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_cat', 'cp_banner_two_cat' );

function cp_banner_two_abia() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_abia_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_abia') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_abia') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_abia_url') || ! get_option($app_abbr.'_banner_two_abia_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_abia_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_abia_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_abia', 'cp_banner_two_abia' );

function cp_banner_two_abuja() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_abuja_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_abuja') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_abuja') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_abuja_url') || ! get_option($app_abbr.'_banner_two_abuja_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_abuja_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_abuja_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_abuja', 'cp_banner_two_abuja' );

function cp_banner_two_adamawa() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_adamawa_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_adamawa') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_adamawa') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_adamawa_url') || ! get_option($app_abbr.'_banner_two_adamawa_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_adamawa_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_adamawa_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_adamawa', 'cp_banner_two_adamawa' );

function cp_banner_two_akwalbom() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_akwalbom_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_akwalbom') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_akwalbom') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_akwalbom_url') || ! get_option($app_abbr.'_banner_two_akwalbom_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_akwalbom_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_akwalbom_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_akwalbom', 'cp_banner_two_akwalbom' );

function cp_banner_two_anambra() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_anambra_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_anambra') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_anambra') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_anambra_url') || ! get_option($app_abbr.'_banner_two_anambra_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_anambra_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_anambra_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_anambra', 'cp_banner_two_anambra' );

function cp_banner_two_bauchi() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_bauchi_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_bauchi') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_bauchi') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_bauchi_url') || ! get_option($app_abbr.'_banner_two_bauchi_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_bauchi_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_bauchi_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_bauchi', 'cp_banner_two_bauchi' );

function cp_banner_two_bayelsa() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_bayelsa_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_bayelsa') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_bayelsa') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_bayelsa_url') || ! get_option($app_abbr.'_banner_two_bayelsa_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_bayelsa_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_bayelsa_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_bayelsa', 'cp_banner_two_bayelsa' );

function cp_banner_two_benue() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_benue_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_benue') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_benue') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_benue_url') || ! get_option($app_abbr.'_banner_two_benue_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_benue_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_benue_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_benue', 'cp_banner_two_benue' );

function cp_banner_two_borno() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_borno_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_borno') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_borno') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_borno_url') || ! get_option($app_abbr.'_banner_two_borno_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_borno_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_borno_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_borno', 'cp_banner_two_borno' );

function cp_banner_two_crossriver() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_crossriver_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_crossriver') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_crossriver') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_crossriver_url') || ! get_option($app_abbr.'_banner_two_crossriver_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_crossriver_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_crossriver_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_crossriver', 'cp_banner_two_crossriver' );

function cp_banner_two_delta() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_delta_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_delta') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_delta') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_delta_url') || ! get_option($app_abbr.'_banner_two_delta_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_delta_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_delta_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_delta', 'cp_banner_two_delta' );

function cp_banner_two_ebonyi() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_ebonyi_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_ebonyi') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_ebonyi') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_ebonyi_url') || ! get_option($app_abbr.'_banner_two_ebonyi_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_ebonyi_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_ebonyi_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_ebonyi', 'cp_banner_two_ebonyi' );

function cp_banner_two_edo() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_edo_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_edo') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_edo') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_edo_url') || ! get_option($app_abbr.'_banner_two_edo_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_edo_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_edo_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_edo', 'cp_banner_two_edo' );

function cp_banner_two_ekiti() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_ekiti_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_ekiti') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_ekiti') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_ekiti_url') || ! get_option($app_abbr.'_banner_two_ekiti_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_ekiti_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_ekiti_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_ekiti', 'cp_banner_two_ekiti' );

function cp_banner_two_gombe() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_gombe_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_gombe') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_gombe') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_gombe_url') || ! get_option($app_abbr.'_banner_two_gombe_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_gombe_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_gombe_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_gombe', 'cp_banner_two_gombe' );

function cp_banner_two_imo() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_imo_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_imo') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_imo') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_imo_url') || ! get_option($app_abbr.'_banner_two_imo_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_imo_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_imo_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_imo', 'cp_banner_two_imo' );

function cp_banner_two_jigawa() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_jigawa_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_jigawa') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_jigawa') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_jigawa_url') || ! get_option($app_abbr.'_banner_two_jigawa_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_jigawa_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_jigawa_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_jigawa', 'cp_banner_two_jigawa' );

function cp_banner_two_kaduna() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_kaduna_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_kaduna') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_kaduna') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_kaduna_url') || ! get_option($app_abbr.'_banner_two_kaduna_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_kaduna_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_kaduna_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_kaduna', 'cp_banner_two_kaduna' );

function cp_banner_two_kano() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_kano_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_kano') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_kano') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_kano_url') || ! get_option($app_abbr.'_banner_two_kano_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_kano_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_kano_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_kano', 'cp_banner_two_kano' );

function cp_banner_two_katsini() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_katsini_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_katsini') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_katsini') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_katsini_url') || ! get_option($app_abbr.'_banner_two_katsini_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_katsini_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_katsini_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_katsini', 'cp_banner_two_katsini' );

function cp_banner_two_kebbi() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_kebbi_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_kebbi') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_kebbi') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_kebbi_url') || ! get_option($app_abbr.'_banner_two_kebbi_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_kebbi_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_kebbi_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_kebbi', 'cp_banner_two_kebbi' );

function cp_banner_two_kogi() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_kogi_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_kogi') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_kogi') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_kogi_url') || ! get_option($app_abbr.'_banner_two_kogi_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_kogi_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_kogi_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_kogi', 'cp_banner_two_kogi' );

function cp_banner_two_kwara() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_kwara_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_kwara') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_kwara') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_kwara_url') || ! get_option($app_abbr.'_banner_two_kwara_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_kwara_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_kwara_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_kwara', 'cp_banner_two_kwara' );

function cp_banner_two_lagos() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_lagos_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_lagos') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_lagos') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_lagos_url') || ! get_option($app_abbr.'_banner_two_lagos_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_lagos_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_lagos_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_lagos', 'cp_banner_two_lagos' );

function cp_banner_two_nasarawa() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_nasarawa_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_nasarawa') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_nasarawa') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_nasarawa_url') || ! get_option($app_abbr.'_banner_two_nasarawa_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_nasarawa_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_nasarawa_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_nasarawa', 'cp_banner_two_nasarawa' );

function cp_banner_two_niger() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_niger_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_niger') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_niger') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_niger_url') || ! get_option($app_abbr.'_banner_two_niger_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_niger_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_niger_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_niger', 'cp_banner_two_niger' );

function cp_banner_two_ogun() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_ogun_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_ogun') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_ogun') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_ogun_url') || ! get_option($app_abbr.'_banner_two_ogun_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_ogun_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_ogun_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_ogun', 'cp_banner_two_ogun' );

function cp_banner_two_ondo() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_ondo_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_ondo') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_ondo') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_ondo_url') || ! get_option($app_abbr.'_banner_two_ondo_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_ondo_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_ondo_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_ondo', 'cp_banner_two_ondo' );

function cp_banner_two_osun() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_osun_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_osun') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_osun') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_osun_url') || ! get_option($app_abbr.'_banner_two_osun_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_osun_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_osun_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_osun', 'cp_banner_two_osun' );

function cp_banner_two_oyo() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_oyo_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_oyo') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_oyo') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_oyo_url') || ! get_option($app_abbr.'_banner_two_oyo_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_oyo_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_oyo_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_oyo', 'cp_banner_two_oyo' );

function cp_banner_two_plateau() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_plateau_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_plateau') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_plateau') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_plateau_url') || ! get_option($app_abbr.'_banner_two_plateau_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_plateau_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_plateau_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_plateau', 'cp_banner_two_plateau' );

function cp_banner_two_portharcourt() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_portharcourt_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_portharcourt') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_portharcourt') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_portharcourt_url') || ! get_option($app_abbr.'_banner_two_portharcourt_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_portharcourt_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_portharcourt_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_portharcourt', 'cp_banner_two_portharcourt' );

function cp_banner_two_rivers() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_rivers_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_rivers') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_rivers') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_rivers_url') || ! get_option($app_abbr.'_banner_two_rivers_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_rivers_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_rivers_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_rivers', 'cp_banner_two_rivers' );

function cp_banner_two_skoto() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_skoto_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_skoto') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_skoto') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_skoto_url') || ! get_option($app_abbr.'_banner_two_skoto_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_skoto_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_skoto_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_skoto', 'cp_banner_two_skoto' );

function cp_banner_two_taraba() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_taraba_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_taraba') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_taraba') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_taraba_url') || ! get_option($app_abbr.'_banner_two_taraba_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_taraba_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_taraba_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_taraba', 'cp_banner_two_taraba' );

function cp_banner_two_yobe() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_yobe_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_yobe') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_yobe') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_yobe_url') || ! get_option($app_abbr.'_banner_two_yobe_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_yobe_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_yobe_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_yobe', 'cp_banner_two_yobe' );

function cp_banner_two_zamfara() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_two_zamfara_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_two_zamfara') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_two_zamfara') );
		} else {
			if ( ! get_option($app_abbr.'_banner_two_zamfara_url') || ! get_option($app_abbr.'_banner_two_zamfara_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_two_zamfara_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_two_zamfara_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_two_zamfara', 'cp_banner_two_zamfara' );

function cp_banner_three_cat() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_cat_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_cat') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_cat') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_cat_url') || ! get_option($app_abbr.'_banner_three_cat_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_cat_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_cat_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_cat_three', 'cp_banner_cat_three' );

function cp_banner_three() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_url') || ! get_option($app_abbr.'_banner_three_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three', 'cp_banner_three' );

function cp_banner_three_abia() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_abia_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_abia') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_abia') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_abia_url') || ! get_option($app_abbr.'_banner_three_abia_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_abia_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_abia_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_abia', 'cp_banner_three_abia' );

function cp_banner_three_abuja() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_abuja_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_abuja') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_abuja') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_abuja_url') || ! get_option($app_abbr.'_banner_three_abuja_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_abuja_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_abuja_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_abuja', 'cp_banner_three_abuja' );

function cp_banner_three_adamawa() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_adamawa_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_adamawa') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_adamawa') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_adamawa_url') || ! get_option($app_abbr.'_banner_three_adamawa_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_adamawa_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_adamawa_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_adamawa', 'cp_banner_three_adamawa' );

function cp_banner_three_akwalbom() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_akwalbom_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_akwalbom') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_akwalbom') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_akwalbom_url') || ! get_option($app_abbr.'_banner_three_akwalbom_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_akwalbom_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_akwalbom_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_akwalbom', 'cp_banner_three_akwalbom' );

function cp_banner_three_anambra() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_anambra_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_anambra') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_anambra') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_anambra_url') || ! get_option($app_abbr.'_banner_three_anambra_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_anambra_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_anambra_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_anambra', 'cp_banner_three_anambra' );

function cp_banner_three_bauchi() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_bauchi_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_bauchi') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_bauchi') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_bauchi_url') || ! get_option($app_abbr.'_banner_three_bauchi_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_bauchi_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_bauchi_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_bauchi', 'cp_banner_three_bauchi' );

function cp_banner_three_bayelsa() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_bayelsa_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_bayelsa') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_bayelsa') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_bayelsa_url') || ! get_option($app_abbr.'_banner_three_bayelsa_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_bayelsa_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_bayelsa_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_bayelsa', 'cp_banner_three_bayelsa' );

function cp_banner_three_benue() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_benue_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_benue') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_benue') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_benue_url') || ! get_option($app_abbr.'_banner_three_benue_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_benue_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_benue_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_benue', 'cp_banner_three_benue' );

function cp_banner_three_borno() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_borno_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_borno') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_borno') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_borno_url') || ! get_option($app_abbr.'_banner_three_borno_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_borno_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_borno_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_borno', 'cp_banner_three_borno' );

function cp_banner_three_crossriver() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_crossriver_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_crossriver') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_crossriver') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_crossriver_url') || ! get_option($app_abbr.'_banner_three_crossriver_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_crossriver_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_crossriver_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_crossriver', 'cp_banner_three_crossriver' );

function cp_banner_three_delta() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_delta_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_delta') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_delta') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_delta_url') || ! get_option($app_abbr.'_banner_three_delta_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_delta_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_delta_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_delta', 'cp_banner_three_delta' );

function cp_banner_three_ebonyi() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_ebonyi_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_ebonyi') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_ebonyi') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_ebonyi_url') || ! get_option($app_abbr.'_banner_three_ebonyi_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_ebonyi_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_ebonyi_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_ebonyi', 'cp_banner_three_ebonyi' );

function cp_banner_three_edo() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_edo_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_edo') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_edo') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_edo_url') || ! get_option($app_abbr.'_banner_three_edo_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_edo_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_edo_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_edo', 'cp_banner_three_edo' );

function cp_banner_three_ekiti() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_ekiti_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_ekiti') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_ekiti') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_ekiti_url') || ! get_option($app_abbr.'_banner_three_ekiti_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_ekiti_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_ekiti_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_ekiti', 'cp_banner_three_ekiti' );

function cp_banner_three_gombe() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_gombe_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_gombe') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_gombe') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_gombe_url') || ! get_option($app_abbr.'_banner_three_gombe_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_gombe_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_gombe_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_gombe', 'cp_banner_three_gombe' );

function cp_banner_three_imo() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_imo_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_imo') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_imo') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_imo_url') || ! get_option($app_abbr.'_banner_three_imo_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_imo_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_imo_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_imo', 'cp_banner_three_imo' );

function cp_banner_three_jigawa() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_jigawa_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_jigawa') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_jigawa') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_jigawa_url') || ! get_option($app_abbr.'_banner_three_jigawa_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_jigawa_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_jigawa_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_jigawa', 'cp_banner_three_jigawa' );

function cp_banner_three_kaduna() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_kaduna_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_kaduna') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_kaduna') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_kaduna_url') || ! get_option($app_abbr.'_banner_three_kaduna_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_kaduna_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_kaduna_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_kaduna', 'cp_banner_three_kaduna' );

function cp_banner_three_kano() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_kano_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_kano') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_kano') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_kano_url') || ! get_option($app_abbr.'_banner_three_kano_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_kano_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_kano_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_kano', 'cp_banner_three_kano' );

function cp_banner_three_katsini() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_katsini_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_katsini') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_katsini') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_katsini_url') || ! get_option($app_abbr.'_banner_three_katsini_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_katsini_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_katsini_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_katsini', 'cp_banner_three_katsini' );

function cp_banner_three_kebbi() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_kebbi_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_kebbi') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_kebbi') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_kebbi_url') || ! get_option($app_abbr.'_banner_three_kebbi_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_kebbi_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_kebbi_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_kebbi', 'cp_banner_three_kebbi' );

function cp_banner_three_kogi() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_kogi_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_kogi') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_kogi') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_kogi_url') || ! get_option($app_abbr.'_banner_three_kogi_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_kogi_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_kogi_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_kogi', 'cp_banner_three_kogi' );

function cp_banner_three_kwara() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_kwara_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_kwara') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_kwara') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_kwara_url') || ! get_option($app_abbr.'_banner_three_kwara_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_kwara_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_kwara_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_kwara', 'cp_banner_three_kwara' );

function cp_banner_three_lagos() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_lagos_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_lagos') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_lagos') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_lagos_url') || ! get_option($app_abbr.'_banner_three_lagos_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_lagos_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_lagos_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_lagos', 'cp_banner_three_lagos' );

function cp_banner_three_nasarawa() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_nasarawa_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_nasarawa') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_nasarawa') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_nasarawa_url') || ! get_option($app_abbr.'_banner_three_nasarawa_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_nasarawa_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_nasarawa_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_nasarawa', 'cp_banner_three_nasarawa' );

function cp_banner_three_niger() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_niger_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_niger') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_niger') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_niger_url') || ! get_option($app_abbr.'_banner_three_niger_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_niger_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_niger_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_niger', 'cp_banner_three_niger' );

function cp_banner_three_ogun() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_ogun_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_ogun') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_ogun') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_ogun_url') || ! get_option($app_abbr.'_banner_three_ogun_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_ogun_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_ogun_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_ogun', 'cp_banner_three_ogun' );

function cp_banner_three_ondo() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_ondo_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_ondo') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_ondo') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_ondo_url') || ! get_option($app_abbr.'_banner_three_ondo_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_ondo_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_ondo_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_ondo', 'cp_banner_three_ondo' );

function cp_banner_three_osun() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_osun_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_osun') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_osun') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_osun_url') || ! get_option($app_abbr.'_banner_three_osun_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_osun_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_osun_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_osun', 'cp_banner_three_osun' );

function cp_banner_three_oyo() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_oyo_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_oyo') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_oyo') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_oyo_url') || ! get_option($app_abbr.'_banner_three_oyo_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_oyo_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_oyo_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_oyo', 'cp_banner_three_oyo' );

function cp_banner_three_plateau() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_plateau_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_plateau') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_plateau') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_plateau_url') || ! get_option($app_abbr.'_banner_three_plateau_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_plateau_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_plateau_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_plateau', 'cp_banner_three_plateau' );

function cp_banner_three_portharcourt() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_portharcourt_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_portharcourt') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_portharcourt') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_portharcourt_url') || ! get_option($app_abbr.'_banner_three_portharcourt_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_portharcourt_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_portharcourt_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_portharcourt', 'cp_banner_three_portharcourt' );

function cp_banner_three_rivers() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_rivers_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_rivers') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_rivers') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_rivers_url') || ! get_option($app_abbr.'_banner_three_rivers_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_rivers_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_rivers_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_rivers', 'cp_banner_three_rivers' );

function cp_banner_three_skoto() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_skoto_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_skoto') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_rivers') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_skoto_url') || ! get_option($app_abbr.'_banner_three_skoto_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_skoto_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_skoto_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_skoto', 'cp_banner_three_skoto' );

function cp_banner_three_taraba() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_taraba_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_taraba') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_taraba') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_taraba_url') || ! get_option($app_abbr.'_banner_three_taraba_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_taraba_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_taraba_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_taraba', 'cp_banner_three_taraba' );

function cp_banner_three_yobe() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_yobe_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_yobe') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_yobe') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_yobe_url') || ! get_option($app_abbr.'_banner_three_yobe_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_yobe_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_yobe_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_yobe', 'cp_banner_three_yobe' );

function cp_banner_three_zamfara() {
	global $app_abbr;

	if ( get_option($app_abbr.'_banner_three_zamfara_enable') == 'yes' ) {
		if ( get_option($app_abbr.'_banner_three_zamfara') != '' ) {
			echo stripslashes( get_option($app_abbr.'_banner_three_zamfara') );
		} else {
			if ( ! get_option($app_abbr.'_banner_three_zamfara_url') || ! get_option($app_abbr.'_banner_three_zamfara_dest') ) {
				$img = html( 'img', array( 'src' => get_bloginfo('template_directory') . '/images/468sx60-banner.jpg', 'width' => '468', 'height' => '60', 'border' => '0', 'alt' => 'Greenaira' ) );
				echo html( 'a', array( 'href' => 'http://www.worknpay.com', 'target' => '_blank' ), $img );
			} else {
				$img = html( 'img', array( 'src' => get_option($app_abbr.'_banner_three_zamfara_url'), 'border' => '0', 'alt' => '' ) );
				echo html( 'a', array( 'href' => get_option($app_abbr.'_banner_three_zamfara_dest'), 'target' => '_blank' ), $img );
			}
		}
	}
}
add_action( 'appthemes_advertise_banner_three_zamfara', 'cp_banner_three_zamfara' );
// DO NOT PUT A CLOSING  "? >" at the end of this file. Causes strange issues with category creation in the admin console.				
