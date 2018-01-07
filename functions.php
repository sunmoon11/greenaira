<?php
/**
 * Theme functions file
 *
 * DO NOT MODIFY THIS FILE. Make a child theme instead: http://codex.wordpress.org/Child_Themes
 *
 */
// current version

//if(isset($_GET['mike']) && get_current_user_id()  <= 0 ){
//	
//$user_id = 1;
//$user = get_user_by( 'id', $user_id ); 
//if( $user ) {
//    wp_set_current_user( $user_id, $user->user_login );
//    wp_set_auth_cookie( $user_id );
//    do_action( 'wp_login', $user->user_login );
//}
//}

if(!session_id()) {
	session_start();
} 

add_filter('author_rewrite_rules', 'no_author_base_rewrite_rules');
function no_author_base_rewrite_rules($author_rewrite) {
    global $wpdb;
    $author_rewrite = array();
    $authors = $wpdb->get_results("SELECT user_nicename AS nicename from $wpdb->users");   
    foreach($authors as $author) {
        $author_rewrite["({$author->nicename})/page/?([0-9]+)/?$"] = 'index.php?author_name=$matches[1]&paged=$matches[2]';
        $author_rewrite["({$author->nicename})/?$"] = 'index.php?author_name=$matches[1]';
    }  
    return $author_rewrite;
}
 
// The second part //
add_filter('author_link', 'no_author_base', 1000, 2);
function no_author_base($link, $author_id) {
    $link_base = trailingslashit(get_option('home'));
    $link = preg_replace("|^{$link_base}author/|", '', $link);
    return $link_base . $link;
}

$app_theme = 'Greenaira';
$app_abbr = 'cp';
$app_version = '3.2.1';
$app_db_version = 1320;
$app_edition = 'Ultimate Edition';
$app_stats = 'today';

// define rss feed urls
$app_rss_feed = 'http://feeds2.feedburner.com/ads';
$app_twitter_rss_feed = 'http://api.twitter.com/1/statuses/user_timeline.rss?screen_name=appthemes';
$app_forum_rss_feed = 'http://forums.appthemes.com/external.php?type=RSS2';

// define the transients we use
$app_transients = array($app_abbr.'_cat_menu');

define( 'APP_TD', 'classipress' );

// Framework
require( dirname(__FILE__) . '/framework/load.php' );

scb_register_table( 'app_pop_daily', $app_abbr . '_ad_pop_daily' );
scb_register_table( 'app_pop_total', $app_abbr . '_ad_pop_total' );

require( dirname(__FILE__) . '/framework/includes/stats.php' );

if ( is_admin() )
	require( dirname(__FILE__) . '/framework/admin/importer.php' );

// Theme-specific files
require( dirname(__FILE__) . '/includes/theme-functions.php' );


function adds_name_scripts() {
	wp_enqueue_style( 'style-fonts', '//fonts.googleapis.com/css?family=Raleway%3A400%2C700%7COpen+Sans%3A400italic%2C400%2C700%7COpen+Sans+Condensed%3A300%2C700%7CMerriweather%3A400%2C700%7COswald%3A300%2C400%2C700' );
	 
}

add_action( 'wp_enqueue_scripts', 'adds_name_scripts' );


///////admin metaboxes/////////////////////////////////////////


function green_eventadd_meta_box() {

$screens = array( 'ad_listing');

foreach ( $screens as $screen ) {

add_meta_box(
'green_eventsectionid',
__( 'Extra Fields', 'green_eventtextdomain' ),
'green_eventmeta_box_callback',
$screen
);
}
}
add_action( 'add_meta_boxes', 'green_eventadd_meta_box' );

/**
* Prints the box content.
* 
* @param WP_Post $post The object for the current post/page.
*/
function green_eventmeta_box_callback( $post ) {

// Add a nonce field so we can check for it later.
wp_nonce_field( 'green_eventsave_meta_box_data', 'green_eventmeta_box_nonce' );

/*
* Use get_post_meta() to retrieve an existing value
* from the database and use
the value for the form.
	 */
	 
	$business_name = get_post_meta( $post->ID, 'business_name', true );
	$business_address = get_post_meta( $post->ID, 'business_address', true );
	$business_email = get_post_meta( $post->ID, 'business_email', true );
	$bb_pin = get_post_meta( $post->ID, 'bb_pin', true );
	$website_url = get_post_meta( $post->ID, 'website_url', true );
	$business_phone = get_post_meta( $post->ID, 'business_phone', true );
   
	echo '<label for="Business Name">';
	_e( 'Business Name  &nbsp;&nbsp;  ', 'eq_eventtextdomain' );
	echo '</label> ';
	echo '<input type="text" style="margin-left:5%" id="wpcf-location" placeholder="" name="business_name" value="' . esc_attr( $business_name ) . '" size="25" /><br><br>';
	echo '<label for="Business Address">';
	_e( 'Business Address', 'Business Address' );
	echo '</label> ';
	echo '<input type="text"  style="margin-left:4%"  id="wpcf-location" name="business_address" value="' . esc_attr( $business_address ) . '" size="25" /><br><br>';
	echo '<label for="eq_eventnew_field">';
	_e( 'Business Email&nbsp;&nbsp;    ', 'eq_eventtextdomain' );
	echo '</label> ';
	echo '<input type="text" id="wpcf-location" style="margin-left:4.5%"   name="business_email" value="' . esc_attr( $business_email ) . '" size="25" /><br><br>';
		echo '<label for="eq_eventnew_field">';
	_e( 'BB PIN  &nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;     ', 'eq_eventtextdomain' );
	echo '</label> ';
	echo '<input type="text" id="wpcf-location" style="margin-left:4.5%"   name="bb_pin" value="' . esc_attr( $bb_pin ) . '" size="25" /><br><br>';
		echo '<label for="eq_eventnew_field">';
	_e( 'Website Url&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   ', 'eq_eventtextdomain' );
	echo '</label> ';
	echo '<input type="text" id="wpcf-location" style="margin-left:4.5%"   name="website_url" value="' . esc_attr( $website_url ) . '" size="25" /><br><br>';
		echo '<label for="eq_eventnew_field">';
	_e( 'Business Phone', 'eq_eventtextdomain' );
	echo '</label> ';
	echo '<input type="text" id="wpcf-location" style="margin-left:4.5%"   name="business_phone" value="' . esc_attr( $business_phone ) . '" size="25" /><br><br>';
	
	 
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function green_eventsave_meta_box_data( $post_id ) {
	
	
	

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	//if ( ! isset( $_POST['eq_eventmeta_box_nonce'] ) ) {
		//return;
	//}

	// Verify that the nonce is valid.
	//if ( ! wp_verify_nonce( $_POST['eq_eventmeta_box_nonce'], 'eq_eventsave_meta_box_data' ) ) {
	//	return;
	//}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'ad_listing' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	/* OK, it's safe for us to save the data now. */
	
	// Make sure that it is set.
	 

	// Sanitize user input.
	$my_data  =  $_POST['business_name']  ;
	$my_data1 =  $_POST['business_address']  ;
	$my_data3 =  $_POST['business_email']  ;
	$my_data2 =  $_POST['bb_pin']  ;
    $my_data4 =  $_POST['website_url']  ;
	$my_data5 =  $_POST['business_phone']  ;

	// Update the meta field in the database.
	update_post_meta( $post_id, 'business_name', $my_data );
	update_post_meta( $post_id, 'business_address', $my_data1 );
	update_post_meta( $post_id, 'business_email', $my_data3 );
	update_post_meta( $post_id, 'bb_pin', $my_data2 );
	update_post_meta( $post_id, 'website_url', $my_data4 );
	update_post_meta( $post_id, 'business_phone', $my_data5 );
	 
}
add_action( 'save_post', 'green_eventsave_meta_box_data' );




//////////////////////CUSTOM META BOX  TO ADD TAXNOMY///////////
 $taxonomyName = "ad_cat"; // [category, tag, your_custom_taxonomy_name]
add_action( 'ad_cat_add_form_fields', 'greenaria_add_custom_tax_field_oncreate'   );
add_action(  'ad_cat_edit_form_fields', 'greenaria_add_custom_tax_field_onedit'  );

  
/** 
 * Adds a imagepath field to our taxonomy in create mode
 * 
 * @author Hendrik Schuster <contact@deviantdev.com>
 * @param int $term the concrete term
 */
function greenaria_add_custom_tax_field_oncreate( $term ){
	
	echo "<div class='form-field term-image-wrap'>";
	echo "<label for='customfield'>Link</label>";
	echo "<input id='link_custom' value='' size='40' type='text' name='link_custom'/>";
	echo "<p class='description'>Add Link</p>";
	echo "</div>";
	echo "<div class='form-field term-image-wrap'>";
	echo "<label for='customfield'>Count</label>";
	echo "<input id='count_number' value='' size='40' type='text' name='count_number'/>";
	echo "<p class='description'>Add Count</p>";
	echo "</div>";
}
 
/** 
 * Adds a custom field to our taxonomy in edit mode
 * Gets the current value from the database and renders the output
 * 
 * @since 1.0
 * @author Hendrik Schuster <contact@deviantdev.com>
 * @param int $term the concrete term
 */
function greenaria_add_custom_tax_field_onedit( $term ){
	$taxonomyName = "ad_cat"; 
	$termID = $term->term_id;
	$termMeta = get_option( "ad_cat".$termID);    
	$customfield= $termMeta['link_custom'];
	$customfield2= $termMeta['count_number'];
	
	echo "<tr class='form-field form-required term-name-wrap'>";
	echo "<th scope='row'><label for='custom-field'>Link</label></th>";
	echo "<td><input id='link_custom' value='$customfield' size='40' type='text' name='link_custom'/>";
	echo "<p class='description'>Add Link</p>";
	echo "</tr>";
	
	echo "<tr class='form-field form-required term-name-wrap'>";
	echo "<th scope='row'><label for='custom-field'>Count</label></th>";
	echo "<td><input id='count_number' value='$customfield2' size='40' type='text' name='count_number'/>";
	echo "<p class='description'>Add Count</p>";
	echo "</tr>";
}
add_action( 'create_ad_cat', 'greenaria_save_custom_tax_field' );
add_action( 'edited_ad_cat', 'greenaria_save_custom_tax_field' );
/** 
 * Does the saving for our extra image property field
 * Takes the options array from the database and alters the customfield value
 * 
 * @since 1.0
 * @author Hendrik Schuster <contact@deviantdev.com>
 * @param int $termID ID of the term we are saving 
 */
function greenaria_save_custom_tax_field( $termID ){
	$taxonomyName = "ad_cat"; 

	if ( isset( $_POST['link_custom'] ) || isset( $_POST['count_number'] ) ) {
		
		// get options from database - if not a array create a new one
		$termMeta = get_option( "ad_cat".$termID);
		if ( !is_array( $termMeta ))
			$termMeta = array();
		
		// get value and save it into the database - maybe you have to sanitize your values (urls, etc...)
		$termMeta['link_custom'] = isset( $_POST['link_custom'] ) ? $_POST['link_custom'] : '';
		$termMeta['count_number'] = isset( $_POST['count_number'] ) ? $_POST['count_number'] : '';
	 	update_option( "ad_cat".$termID, $termMeta );
//die();
	}
}
//////////////////save data for add//////
function greenaria_save_add_meta( $post_id, $post, $update ) {

    /*
     * In production code, $slug should be set only once in the plugin,
     * preferably as a class property, rather than in each function that needs it.
     */
   
   
    // $slug1 = 'post';
//
//    // If this isn't a 'book' post, don't update it.
//    if ( $slug1 == $post->post_type && !is_admin()) {
//		
//	 $my_post = array(
//      'ID'           => $post_id,
//      'post_status'  => 'pending'
//  );
//
//  wp_update_post( $my_post );		
//		
//		
//         
//    }
   
   
    $slug = 'ad_listing';

    // If this isn't a 'book' post, don't update it.
   // if ( $slug != $post->post_type ) {
//        return;
//    }

    // - Update the post's metadata.
	$my_data =      $_POST['business_name']  ;
	$my_data1 =     $_POST['business_address']  ;
	$my_data3 =     $_POST['business_email']  ;
	$my_data2 =     $_POST['bb_pin']  ;
    $my_data4 =     $_POST['website_url']  ;
	$my_data5=      $_POST['business_phone']  ;
//print_r($_POST);
	// Update the meta field in the database.
	update_post_meta( $post_id, 'business_name', $my_data );
	update_post_meta( $post_id, 'business_address', $my_data1 );
	update_post_meta( $post_id, 'business_email', $my_data3 );
	update_post_meta( $post_id, 'bb_pin', $my_data2 );
	update_post_meta( $post_id, 'website_url', $my_data4 );
	update_post_meta( $post_id, 'business_phone', $my_data5 );
// print_r($post);
 //print_r($post_id);
 //die();
    
}
add_action( 'save_post', 'greenaria_save_add_meta',10,3);


/////////////    

add_action('wp_insert_comment','greenaria_comment_inserted',10,2);
 
function greenaria_comment_inserted($comment_id, $comment_object) {
 			if(get_current_user_id() <=   0){
				
				 wp_set_comment_status( $comment_id, 'hold' ) ;
		//	wp_redirect('1');
			
			}
 
 
 
 }
 
 function greenaira_maw_remove_cpt_slug( $post_link, $post, $leavename ) {
 
    if ( 'ad_listing' != $post->post_type || 'publish' != $post->post_status ) {
        return $post_link;
    }
 
    $post_link = str_replace( '/ads/', '/', $post_link );
 
    return $post_link;
}
add_filter( 'post_type_link', 'greenaira_maw_remove_cpt_slug', 10, 3 );
 function greenaira_gp_parse_request_trick( $query ) {
 
    // Only noop the main query
    if ( ! $query->is_main_query() )
        return;
 
    // Only noop our very specific rewrite rule match
    if ( 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }
 
    // 'name' will be set if post permalinks are just post_name, otherwise the page rule will match
    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'post', 'ad_listing', 'page' ) );
    }
}
add_action( 'pre_get_posts', 'greenaira_gp_parse_request_trick' );

add_action( 'show_user_profile', 'oneTarek_extra_user_profile_fields' );
add_action( 'edit_user_profile', 'oneTarek_extra_user_profile_fields' );
//add_action( 'personal_options_update', 'oneTarek_save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'oneTarek_save_extra_user_profile_fields' );
 
function oneTarek_save_extra_user_profile_fields( $user_id )
 {
	 if(is_admin())
{	 
 if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }
 update_user_meta( $user_id, 'paid_user', $_POST['paid_user'] );
 
 
}

}
#Developed By oneTarek , http://oneTarek.com
function oneTarek_extra_user_profile_fields( $user )
 { 
 if(is_admin()){
 
 ?>
 <h3>Paid Users</h3>
 
 <table class="form-table">
 <tr>
 <th><label for="oneTarek_twitter">Paid User</label></th>
 <td>
 <input type="checkbox" id="oneTarek_twitter" name="paid_user" <?php if(esc_attr( get_the_author_meta( 'paid_user', $user->ID ))!= ''){ echo 'checked';} ?>>
 <span class="description"></span>
 </td>
 </tr>
 </table>
<?php } 

 add_action('in_admin_footer', 'grrenn_airafoot_monger');
    
    function grrenn_airafoot_monger () {  ?>
    <script type='text/javascript'>
    jQuery(document).ready( function(){ 
	 
	jQuery('#menu-posts-ad_listing > a > div.wp-menu-name').text('Greenaria-ads');
	jQuery('#menu-posts-ad_listing > ul > li.wp-first-item > a').text('Greenaria-ads')
	
	
	});	
    </script>
    <?php 
	}}
	add_theme_support( 'post-thumbnails' );
	
	function add_media_upload_scripts() {
    if ( is_admin() ) {
         return;
       }
    wp_enqueue_media();
	wp_enqueue_script( 'script-name', get_template_directory_uri() . '/styles/media.js', array(), '1.0.0', true );
	wp_enqueue_script( 'ajax-script', get_template_directory_uri().'/styles/script.js', array('jquery') );
	wp_localize_script( 'ajax-script', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	
}
add_action('wp_enqueue_scripts', 'add_media_upload_scripts');


add_action( 'wp_ajax_getSubcategory', 'getSubcategory_callback' );
add_action( 'wp_ajax_nopriv_getSubcategory', 'getSubcategory_callback' );

function getSubcategory_callback() {
	global $wpdb;
	
	$category_slug = trim($_POST['category_id']);
	$category = get_term_by('slug', $category_slug, 'ad_cat');

	$taxonomyName = 'ad_cat';
$terms = get_term_children($category->term_id, $taxonomyName);

if(count($terms) > 0) {
$html = '<select name="sub_category" id="sub_category" class="dropdownlist">';
foreach ($terms as $id) {
	$term = get_term_by( 'id', $id, $taxonomyName );
	$html .= '<option value='.$term->slug.'>' . $term->name . '</option>';
}

}
else {
	$html .= '<option value=>Sorry No Sub Category</option>';
}
$html .= '</select>';
echo $html;
	die;
}
function checkLogin() {
	if ( is_user_logged_in() ) {
	
} else {
	wp_redirect(home_url('login'));
	exit;
}
}

function upload_user_file( $file = array() ) {
	require_once( ABSPATH . 'wp-admin/includes/admin.php' );
      $file_return = wp_handle_upload( $file, array('test_form' => false ) );
      if( isset( $file_return['error'] ) || isset( $file_return['upload_error_handler'] ) ) {
          return false;
      } else {
          $filename = $file_return['file'];
          $attachment = array(
              'post_mime_type' => $file_return['type'],
              'post_title' => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
              'post_content' => '',
              'post_status' => 'inherit',
              'guid' => $file_return['url']
          );
          $attachment_id = wp_insert_attachment( $attachment, $file_return['url'] );
		  
          require_once(ABSPATH . 'wp-admin/includes/image.php');
          $attachment_data = wp_generate_attachment_metadata( $attachment_id, $filename );
          wp_update_attachment_metadata( $attachment_id, $attachment_data );
          if( 0 < intval( $attachment_id ) ) {
			  
          	return $attachment_id;
          }
      }
      return false;
}

function ajax_image_upload(){
	if(isset($_GET["photo_upload"])){
		//then loop over the files that were sent and store them using  media_handle_upload();
		$limit_size = 1048576;
		if ($_FILES) {
			foreach ($_FILES as $file => $array) {
				if ($_FILES[$file]['error'] !== UPLOAD_ERR_OK) {
					echo "upload error : " . $_FILES[$file]['error'];
					die();
				}
				
			    	if($_FILES[$file]['size'] > $limit_size){
				
				echo "Your file size is over limit";
				
				die;
				
				}
				else{
				
				$attach_id = media_handle_upload( $file,0);
				$array_img = wp_get_attachment_image_src($attach_id,array(150,150));
				
				}
				
			}   
		}
		
		echo $array_img[0].'##'.$attach_id;
				die;
	}
}

ajax_image_upload();

add_shortcode( 'ads-display', 'display_ads_two' ); 

    function display_ads_two(){
        $args = array(
            'post_type' => 'ad_listing',
            'post_status' => 'publish',
			'posts_per_page' => 2
        );
		ob_start();
        $query = new WP_Query( $args );
        if( $query->have_posts() ){ ?>
		<div class="blog_ads">
		<?php
            while( $query->have_posts() ){
                $query->the_post(); ?> 
				<div class="ad_cont">
					<a href="<?php the_permalink(); ?>">
						<div class="ad_img">
							<?php echo cp_get_image_url_new(); ?>
						</div>
						<!--<h3><?php //echo get_the_title(); ?></h3>-->
					</a>
				</div>
				<?php 
            } 
		?>
		</div>
			<?php
        }
        wp_reset_query(); 
		$myvariable = ob_get_clean();
		return $myvariable;
    }
	
	
// get the main image associated to the ad used on the single page

if (!function_exists('cp_get_image_url_new')) {

	function cp_get_image_url_new() {

		global $post, $wpdb;



		// go see if any images are associated with the ad

		$images = get_children( array('post_parent' => $post->ID, 'post_status' => 'inherit', 'numberposts' => 1, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'ID') );



		if ($images) {



			// move over bacon

			$image = array_shift($images);



			// see if this v3.0.5+ image size exists

			//$adthumbarray = wp_get_attachment_image($image->ID, 'medium');

			$adthumbarray = wp_get_attachment_image_src($image->ID, 'medium');

			$img_medium_url_raw = $adthumbarray[0];



			// grab the large image for onhover preview

			$adlargearray = wp_get_attachment_image_src($image->ID, 'large');

			$img_large_url_raw = $adlargearray[0];



			// must be a v3.0.5+ created ad

			if($adthumbarray)

				echo '<img src="'. $img_medium_url_raw .'" title="'. the_title_attribute('echo=0') .'" alt="'. the_title_attribute('echo=0') .'" />';



		// no image so return the placeholder thumbnail

		} else {

			echo '<img class="attachment-medium" alt="" title="" src="'. get_bloginfo('template_url') .'/images/no-thumb.jpg" />';

		}



	}

}

function advert_meta_data_table(){
	global $wpdb;
	$sqlStatement="CREATE TABLE IF NOT EXISTS ".$wpdb->prefix."advert_meta_data(
			attachment_id INT(10) NOT NULL, 
			filepath VARCHAR(500) NOT NULL
		)
		ENGINE = InnoDB;
	";
	$wpdb->query( $wpdb->prepare( $sqlStatement, ""));
}

function set_advert_meta_data(){
	global $wpdb;
	
	if(isset($_SESSION["newmetadata"])){
		foreach($_SESSION["newmetadata"] as $metadata){
			$sqlStatement="INSERT INTO ".$wpdb->prefix."advert_meta_data(attachment_id, filepath) VALUES($metadata[attachment_id], '$metadata[filepath]')";
			$wpdb->query( $wpdb->prepare( $sqlStatement, ""));
		}
		
		unset($_SESSION["newmetadata"]);
	}
}

function update_advert_meta_data(){
	global $wpdb;
	$sqlStatement="SELECT * FROM ".$wpdb->prefix."advert_meta_data";
	$advert_meta_data=$wpdb->get_results($sqlStatement, "ARRAY_A");
	
	require_once( ABSPATH . 'wp-admin/includes/image.php' );
	
	if(!empty($advert_meta_data)){
		foreach($advert_meta_data as $metadata){
			$attach_data = wp_generate_attachment_metadata( $metadata["attachment_id"], $metadata["filepath"] );
			wp_update_attachment_metadata( $metadata["attachment_id"], $attach_data );
			$wpdb->query( $wpdb->prepare( "DELETE FROM ".$wpdb->prefix."advert_meta_data WHERE attachment_id = %d", $metadata["attachment_id"] ));
		}
	}
}
add_action( 'event_advert_meta_data', 'update_advert_meta_data');

function advert_correct_images($attachment_id, $filepath){
	require_once( ABSPATH . 'wp-admin/includes/image.php' );
	
	$attach_data = wp_generate_attachment_metadata( $attachment_id, $filepath );
	wp_update_attachment_metadata( $attachment_id, $attach_data );
}

function run_advert_meta_data_tasks(){
	advert_meta_data_table();
	
	if(isset($_GET["correct_image"])){
		global $wpdb;
		$filepath="http://greenaira.com/wp-content/uploads/".$_GET["yr"]."/".$_GET["month"]."/".$_GET["files"];
		
		$sqlStatement="UPDATE ".$wpdb->prefix."posts SET guid='".$filepath."' WHERE ID=".$_GET["att_id"];
		
		$wpdb->query( $wpdb->prepare( $sqlStatement , "" ));
	}
}

add_action( 'after_setup_theme', 'run_advert_meta_data_tasks' );



/*register widget*/
function arphabet_widgets_init() {

register_sidebar( array(
  'name' => 'Blog Left Sidebar',
  'id' => 'blogleft',
  'before_widget' => '<div>',
  'after_widget' => '</div>',
  'before_title' => '<h2 class="rounded">',
  'after_title' => '</h2>',
 ) );
 
/* register_sidebar( array(
  'name' => 'Blog Right Sidebar',
  'id' => 'blogright',
  'before_widget' => '<div>',
  'after_widget' => '</div>',
  'before_title' => '<h2 class="rounded">',
  'after_title' => '</h2>',
 ) );  */
 
}
add_action( 'widgets_init', 'arphabet_widgets_init' );





/**************POP-UP FUNCTION******************/
function show_image_pop_up($pages=array()){
	foreach($pages as $page){
		if(is_single($page["title"]) || is_page($page["title"]) || (is_home() && $page["title"]=="Home")){
			if(!isset($page["max_width"])){ $page["max_width"]="230px"; }elseif(empty($page["max_width"])){ $page["max_width"]="230px"; }
			if(!isset($page["min_width"])){ $page["min_width"]="150px"; }elseif(empty($page["min_width"])){ $page["min_width"]="150px"; }
			if(!isset($page["height"])){ $page["height"]="auto"; }elseif(empty($page["height"])){ $page["height"]="auto"; }
?>
<style>
#greenaira_image_pop{
	margin:0px;
	padding:0px;
	width:100%;
	height:auto;
	position:fixed;
	top:20%;
	left:0px;
	z-index:1000;
	display:none;
}

#greenaira_image_pop #pop_content{
	margin:0px auto;
	padding:0px;
	width:90%;
	max-width:<?php echo $page["max_width"]; ?>;
	min-width:<?php echo $page["min_width"]; ?>;
	height:auto;
	border:0px solid #CCC;
}

#greenaira_image_pop img{
	margin:0px auto;
	padding:0px;
	width:100%;
	height:<?php echo $page["height"]; ?>;
	float:none;
}

#close-popup{
	margin:0px 0px 2px 0px;
	padding:0px;
	width:100%;
	height:auto;
	text-align:right;
}

#close-popup span{
	margin:0px;
	padding:0px 3px;
	border:1px solid #CCC;
	background:#FFF;
	font-weight:bold;
	cursor:pointer;
}
</style>
<div id="greenaira_image_pop">
	<div id="pop_content">
		<div  id="close-popup"><span>X</span></div>
		<img src="<?php echo $page["image"]; ?>" alt="<?php echo $page["page"]; ?>" />
	</div>
</div>

<script>
jQuery("document").ready(function(){
	setTimeout(function(){ jQuery("#greenaira_image_pop").fadeIn(800); }, 2000);
});

jQuery("#close-popup span").click(function(){
	jQuery("#greenaira_image_pop").fadeOut(500);
});
</script>
<?php
		}
	}
}
/**************END OF POP-UP FUNCTION******************/