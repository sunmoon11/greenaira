<?php
global $current_user; 

$display_user_name = cp_get_user_name();
$logout_url = cp_logout_url();
?>

<!-- right sidebar -->
<div class="content_right">

	<div class="shadowblock_out">

		<div class="shadowblock">

			<h2 class="dotted"><?php _e( 'User Options', APP_TD ); ?></h2>

			<div class="recordfromblog">

			<?php if ( has_nav_menu('theme_dashboard') ) : wp_nav_menu( array( 'theme_location' => 'theme_dashboard', 'container' => false ) ); else : ?>

				<ul>
					<li><a href="<?php echo CP_DASHBOARD_URL; ?>"><?php _e( 'My Dashboard', APP_TD ); ?></a></li>
					<li><a href="<?php echo CP_PROFILE_URL; ?>"><?php _e( 'Edit Profile', APP_TD ); ?></a></li>
					<?php if ( current_user_can('edit_others_posts') ) { ?><li><a href="<?php echo admin_url(); ?>"><?php _e( 'WordPress Admin', APP_TD ); ?></a></li><?php } ?>
					<li><a href="<?php echo $logout_url; ?>"><?php _e( 'Log Out', APP_TD ); ?></a></li>
				</ul>

			<?php endif; ?>

			</div><!-- /recordfromblog -->

		</div><!-- /shadowblock -->

	</div><!-- /shadowblock_out -->



	<div class="shadowblock_out">

		<div class="shadowblock">

			<h2 class="dotted"><?php _e( 'Account Information', APP_TD ); ?></h2>

			<div class="avatar"><?php appthemes_get_profile_pic($current_user->ID, $current_user->user_email, 60); ?></div>

				<ul class="user-info">
					<li><h3 class="single"><a href="<?php echo get_author_posts_url($current_user->ID); ?>"><?php echo $display_user_name; ?></a></h3></li>
					<li><strong><?php _e( 'Member Since:', APP_TD ); ?></strong> <?php echo appthemes_get_reg_date($current_user->user_registered); ?></li>
					<li><strong><?php _e( 'Last Login:', APP_TD ); ?></strong> <?php echo appthemes_get_last_login($current_user->ID); ?></li>
				</ul>

				<?php $membership = get_pack($current_user->active_membership_pack); ?>
				<?php if ( get_option('cp_enable_membership_packs') == 'yes' ) : ?>
				<ul class="membership-pack">
					<?php if ( $membership ) : ?>
					<li><strong><?php _e( 'Membership Pack:', APP_TD ); ?></strong> <?php echo stripslashes($membership->pack_name); ?></li>
					<li><strong><?php _e( 'Membership Expires:', APP_TD ); ?></strong> <?php echo date_i18n( get_option('date_format').' '.get_option('time_format'), strtotime($current_user->membership_expires), get_option('gmt_offset') ); ?></li>
					<li><a href="<?php echo CP_MEMBERSHIP_PURCHASE_URL; ?>"><?php _e( 'Renew or Extend Your Membership Pack', APP_TD ); ?></a></li>
					<?php else : ?>
					<li><a href="<?php echo CP_MEMBERSHIP_PURCHASE_URL; ?>"><?php _e( 'Purchase a Membership Pack', APP_TD ); ?></a></li>
					<?php endif; //end if $membership exists ?>
				</ul>
				<?php endif; //end if cp_enable_membership_packs ?>

				<ul class="user-details">
					<li><div class="emailico"></div><a href="mailto:<?php echo $current_user->user_email; ?>"><?php echo $current_user->user_email; ?></a></li>
					<?php if ( !empty($current_user->twitter_id) ) { ?><li><div class="twitterico"></div><a href="http://twitter.com/<?php echo esc_attr( $current_user->twitter_id ); ?>" target="_blank"><?php _e( 'Twitter', APP_TD ); ?></a></li><?php } ?>
					<?php if ( !empty($current_user->facebook_id) ) { ?><li><div class="facebookico"></div><a href="http://facebook.com/<?php echo esc_attr( $current_user->facebook_id ); ?>" target="_blank"><?php _e( 'Facebook', APP_TD ); ?></a></li><?php } ?>
					<?php if ( !empty($current_user->user_url) ) { ?><li><div class="globeico"></div><a href="<?php echo esc_attr( $current_user->user_url ); ?>" target="_blank"><?php echo esc_html( $current_user->user_url ); ?></a></li><?php } ?>
				</ul>

				<?php cp_author_info( 'sidebar-user' ); ?>

		</div><!-- /shadowblock -->

	</div><!-- /shadowblock_out -->



	<div class="shadowblock_out">

		<div class="shadowblock">

			<h2 class="dotted"><?php _e( 'Account Statistics', APP_TD ); ?></h2>

			<ul class="user-stats">

<?php
// calculate the total count of live ads for current user
$rows = $wpdb->get_results( $wpdb->prepare( "
	SELECT post_status, COUNT(ID) as count
	FROM $wpdb->posts
	WHERE post_author = %d
	AND post_type = '".APP_POST_TYPE."'
	GROUP BY post_status", $current_user->ID
) );

$stats = array();
foreach ( $rows as $row )
	$stats[ $row->post_status ] = $row->count;

$post_count_live = isset($stats['publish']) ? $stats['publish'] : 0;
$post_count_pending = isset($stats['pending']) ? $stats['pending'] : 0;
$post_count_offline = isset($stats['draft']) ? $stats['draft'] : 0;
$post_count_total = $post_count_live + $post_count_pending + $post_count_offline;
?>

				<li><?php _e( 'Live Listings:', APP_TD ); ?> <strong><?php echo $post_count_live; ?></strong></li>
				<li><?php _e( 'Pending Listings:', APP_TD ); ?> <strong><?php echo $post_count_pending; ?></strong></li>
				<li><?php _e( 'Offline Listings:', APP_TD ); ?> <strong><?php echo $post_count_offline; ?></strong></li>
				<li><?php _e( 'Total Listings:', APP_TD ); ?> <strong><?php echo $post_count_total; ?></strong></li>

			</ul>

		</div><!-- /shadowblock -->

	</div><!-- /shadowblock_out -->


	<?php appthemes_before_sidebar_widgets(); ?>

	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar_user') ) : else : ?>

	<!-- no dynamic sidebar so don't do anything -->

	<?php endif; ?>

	<?php appthemes_after_sidebar_widgets(); ?>

</div><!-- /content_right -->
