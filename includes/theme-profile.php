<?php

/**
 * Add more profile fields to the user
 *
 * Easy to add new fields to the user profile by just
 * creating your new section below and adding a new
 * update_user_meta line
 *
 * @since 3.0.0
 * @uses show_user_profile & edit_user_profile WordPress functions
 *
 * @param int $user User Object
 * @return bool True on successful update, false on failure.
 *
 */
function cp_user_contact_methods( $methods ) {
	return array(
		'twitter_id' => __( 'Twitter', APP_TD ),
		'facebook_id' => __( 'Facebook', APP_TD ),
		'paypal_email' => __( 'PayPal Email', APP_TD ),
		'tel_no' => __( 'Telephone No', APP_TD ),
	);
}
add_action( 'user_contactmethods', 'cp_user_contact_methods' );


function cp_profile_fields_description( $field ) {
	$description = array(
		'twitter_id' => __( 'Enter your Twitter username without the URL.', APP_TD ),
		'facebook_id' => sprintf( __( "Enter your Facebook username without the URL. <br />Don't have one yet? <a target='_blank' href='%s'>Get a custom URL.</a>", APP_TD ), 'http://www.facebook.com/username/' ),
		'paypal_email' => __( 'Used for purchasing ads via PayPal (if enabled).', APP_TD ),
		'tel_no' => __( 'Used for displaying on ads page', APP_TD ),
	);
	return isset($description[$field]) ? '<br /><span class="description">' . $description[$field] . '</span>' : '';
}


global $appthemes_extended_profile_fields;

$appthemes_extended_profile_fields = array(
	'active_membership_pack' => array(
		'title'=> __( 'Active Membership Pack:', APP_TD ),
		'protected' => 'yes',
		'type' => 'active_membership_pack',
		'description' =>  __( 'Custom Membership Pack active for the user. Can only be changed by admins.', APP_TD ),
		'admin_description' => __( 'Enter Pack ID to activate membership for user.', APP_TD )
	),
	'membership_expires' => array(
		'title'=> __( 'Membership Pack Expires Date:', APP_TD ),
		'protected' => 'yes',
		'type' => 'date',
		'description' =>  __( 'Date for unlimited/dealer posting (if enabled). Can only be changed by admins.', APP_TD ),
		'admin_description' => __( 'Enter date in format <code>Y-m-d H:i:s</code> Example date: <code>2012-01-26 13:25:00</code>', APP_TD )
	)
);

$appthemes_extended_profile_fields = apply_filters('appthemes_extended_profile_fields', $appthemes_extended_profile_fields);
		
$thefields=array();

// display the additional user profile fields
if (!function_exists('cp_profile_fields')) {
	function cp_profile_fields($user) {
	
		global $appthemes_extended_profile_fields, $thefields;
		
?>
		<h3><?php _e( 'Extended Profile', APP_TD ); ?></h3>
		<table class="form-table">

		<?php
			foreach ( $appthemes_extended_profile_fields as $field_id => $field_values ) :

				if ( isset($field_values['protected']) && $field_values['protected'] == 'yes' && !is_admin() )
					$protected = 'disabled="disabled"';
				else
					$protected = '';

				//TODO - use this value for display purposes while protecting stored value
				//prepare, modify, or filter the field value based on the field ID
				switch ($field_id):
					case 'active_membership_pack':
						$the_display_value = get_pack( get_the_author_meta( $field_id, $user->ID ), '', 'pack_name' );
					break;
					default:
						$the_display_value = false;
					break;
				endswitch;

				$the_value = get_the_author_meta( $field_id, $user->ID );

				//begin writing the row and heading
			?>
					<tr id="<?php echo $field_id; ?>_row">
						<th><label for="<?php echo $field_id; ?>"><?php echo esc_html( $field_values['title'] ); ?></label></th>
							<td>
			<?php
				//print the appropriate profile field based on the type of field
				switch ($field_values['type']):

					case 'date':
			?>
								<input type="text" name="<?php echo $field_id; ?>" id="<?php echo $field_id; ?>" value="<?php echo esc_attr( $the_value ); ?>" class="regular-text" size="35" <?php if(!empty($protected)) echo 'style="display: none;"'; ?> /><br />
								<span class="description" <?php if(!empty($protected)) echo 'style="display: none;"'; ?> ><?php echo $field_values['admin_description']; ?><br /></span>
								<input type="text" name="<?php echo $field_id; ?>_display" id="<?php echo $field_id; ?>" value="<?php echo esc_attr( appthemes_display_date($the_value) ); ?>" class="regular-text" size="35" disabled="disabled" /><br />
								<span class="description"><?php echo $field_values['description']; ?></span>
				<?php
					break;
					
				?>
								<input type="text" name="<?php echo $field_id; ?>" id="<?php echo $field_id; ?>" value="<?php echo esc_attr( $the_value ); ?>" class="regular-text" size="35" <?php if(!empty($protected)) echo 'style="display: none;"'; ?> /><br />
								<span class="description" <?php if(!empty($protected)) echo 'style="display: none;"'; ?> ><?php echo $field_values['admin_description']; ?><br /></span>
								<input type="text" name="<?php echo $field_id; ?>_display" id="<?php echo $field_id; ?>" value="<?php echo esc_attr( $the_display_value ); ?>" class="regular-text" size="35" disabled="disabled" /><br />
								<span class="description"><?php echo $field_values['description']; ?></span>
				<?php
						
					break;

					default:
				?>
								<input type="text" name="<?php echo $field_id; ?>" id="<?php echo $field_id; ?>" value="<?php echo esc_attr( $the_value ); ?>" class="regular-text" size="35" <?php echo $protected; ?> /><br />
								<span class="description"><?php echo $field_values['description']; ?></span>
				<?php
						
					break;

					//close the row
				?>
							</td>
						</tr>
			<?php
				endswitch;
				
				
			endforeach;
			?>

		</table>

<?php
	}
}
add_action('show_user_profile', 'cp_profile_fields', 0);
add_action('edit_user_profile', 'cp_profile_fields');


// save the user profile fields
if (!function_exists('cp_profile_fields_save')) {
	function cp_profile_fields_save($user_id) {
		global $appthemes_extended_profile_fields;

		if ( !current_user_can('edit_user', $user_id) ) return false;

		/* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
		foreach ($appthemes_extended_profile_fields as $field_id => $field_values) :

			switch ( $field_values['protected'] ) :
				case 'yes':
					//make sure the user is an admin or has the ability to edits all user accounts
					if ( current_user_can('edit_users') ) update_user_meta( $user_id, $field_id, sanitize_text_field( $_POST[$field_id] ) );
				break;
				default:
					update_user_meta( $user_id, $field_id, sanitize_text_field( $_POST[$field_id] ) );
				break;
			endswitch;

		endforeach;

	}
}
add_action('personal_options_update', 'cp_profile_fields_save');
add_action('edit_user_profile_update', 'cp_profile_fields_save');
?>
