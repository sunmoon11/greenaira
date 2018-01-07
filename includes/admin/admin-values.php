<?php
/**
 *
 * Here is where all the admin field data is stored
 * All the data is stored in arrays and then looped though
 * @version 3.0
 *
 * Array param definitions are as follows:
 * name    = field name
 * desc    = field description
 * tip     = question mark tooltip text
 * id      = database column name or the WP meta field name
 * css     = any on-the-fly styles you want to add to that field
 * type    = type of html field
 * req     = if the field is required or not (1=required)
 * min     = minimum number of characters allowed before saving data
 * std     = default value. not being used
 * js      = allows you to pass in javascript for onchange type events
 * vis     = if field should be visible or not. used for dropdown values field
 * visid   = this is the row css id that must correspond with the dropdown value that controls this field
 * options = array of drop-down option value/name combo
 * altclass = adds a new css class to the input field (since v3.1)
 *
 *
 */



$options_settings = array (

    array( 'type' => 'tab', 'tabname' => __( 'General', APP_TD ), 'id' => '0' ),
				  
	    array(	'name' => __( 'Site Configuration', APP_TD ),
                    'type' => 'title',
                    'id' => ''),
			   
		array(  'name' => __( 'Home Page Layout', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Select the layout you prefer for your home page. The directory style is a more traditional classified ads layout. The standard style is more like a blog layout.', APP_TD ),
                        'id' => $app_abbr.'_home_layout',
                        'css' => 'min-width:230px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'standard'  => __( 'Standard Style', APP_TD ),
                                             'directory' => __( 'Directory Style', APP_TD ) )),

                array(  'name' => __( 'Color Scheme', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Select the color scheme you would like your classified ads site to use.', APP_TD ),
                        'id' => $app_abbr.'_stylesheet',
                        'css' => 'min-width:230px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array( 'aqua.css'          => __( 'Aqua Theme', APP_TD ),
                                            'blue.css'          => __( 'Blue Theme', APP_TD ),
                                            'green.css'         => __( 'Green Theme', APP_TD ),
                                            'red.css'           => __( 'Red Theme', APP_TD ),
                                            'teal.css'          => __( 'Teal Theme', APP_TD ),
                                            'aqua-black.css'    => __( 'Aqua Theme - Black Header', APP_TD ),
                                            'blue-black.css'    => __( 'Blue Theme - Black Header', APP_TD ),                                   
                                            'green-black.css'   => __( 'Green Theme - Black Header', APP_TD ),
                                            'red-black.css'     => __( 'Red Theme - Black Header', APP_TD ),
                                            'teal-black.css'    => __( 'Teal Theme - Black Header', APP_TD ) )),

                // deprecated since 3.0.5
                // array(  'name' => __( 'Blog Category ID', APP_TD ),
// 						'desc' => __( 'This field has been deprecated since v3.0.5. Used for reference in upgrading only.', APP_TD ),
//                         //'desc' => sprintf( __( "Visit the <a href='%s'>category page</a> and mouse over the 'Blog' category to get the tag_ID value.", APP_TD ), 'edit-tags.php?taxonomy=category' ),
//                         'tip' => __( 'This field must contain the blog category ID otherwise the blog and any blog sidebar widgets will not work correctly. This value should not be changed unless you know what you are doing.', APP_TD ),
//                         'id' => $app_abbr.'_blog_cat',
//                         'css' => 'width:75px;',
//                         'vis' => '',
//                         'req' => '',
//                         'min' => '',
//                         'type' => 'text',
//                         'std' => ''),

				
				array(  'name' => __( 'Enable Coupons', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Turns on the coupon module so your ad forms include a coupon code field. You still need to create and setup coupons before coupons will work. You also must have &quot;Charge for Listing Ads&quot; option enabled.', APP_TD ),
                        'id' => $app_abbr.'_enable_coupons',
                        'css' => 'min-width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),
                                                                     
				array(  
						'name' => __( 'User Set Password', APP_TD ),
						'desc' 		=> '',
						'tip' 		=> __( 'Turning this off will send the user a password instead of letting them set it on the new user registration page.', APP_TD ),
						'id' 		=> $app_abbr.'_allow_registration_password',
						'css' 		=> 'min-width:100px;',
						'std' 		=> 'yes',
						'vis' 		=> '',
						'req' 		=> '',
						'js' 		=> '',
						'min' 		=> '',
						'type' 		=> 'select',
						'options' => array(  
							'yes' => __( 'Yes', APP_TD ),
							'no'  => __( 'No', APP_TD )
						)
					),                                            

				array(  'name' => __( 'Enable Logo', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'If you do not have a logo to use, select no and this will display the title and description of your web site instead.', APP_TD ),
                        'id' => $app_abbr.'_use_logo',
                        'css' => 'min-width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Web Site Logo', APP_TD ),
                        'desc' => __( 'Upload a logo or paste an image URL directly.', APP_TD ),
                        'tip' => __( 'Paste the URL of your web site logo image here. It will replace the default header logo.(i.e. http://www.yoursite.com/logo.jpg)', APP_TD ),
                        'id' => $app_abbr.'_logo',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Feedburner URL', APP_TD ),
                        'desc' => sprintf( '%s' . __( "Sign up for a free <a target='_new' href='%s'>Feedburner account</a>.", APP_TD ), '<div class="feedburnerico"></div>', 'http://feedburner.google.com' ),
                        'tip' => __( 'Paste your Feedburner address here. It will automatically redirect your default RSS feed to Feedburner. You must have a Google Feedburner account setup first.', APP_TD ),
                        'id' => $app_abbr.'_feedburner_url',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),

                 array(  'name' => __( 'Twitter Username', APP_TD ),
                        'desc' => sprintf( '%s' . __( "Sign up for a free <a target='_new' href='%s'>Twitter account</a>.", APP_TD ), '<div class="twitterico"></div>', 'http://twitter.com' ),
                        'tip' => __( 'Paste your Twitter username here. It will automatically redirect people who click on your Twitter link to your Twitter page. You must have a Twitter account setup first.', APP_TD ),
                        'id' => $app_abbr.'_twitter_username',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
/*
                array(  'name' => __( 'Facebook URL', APP_TD ),
                        'desc' => sprintf( '%s' . __( "Sign up for a free <a target='_new' href='%s'>Facebook account</a>.", APP_TD ), '<div class="facebookico"></div>', 'http://www.facebook.com' ),
                        'tip' => __( 'Paste your Facebook URL here. It will automatically redirect people who click on your Facebook link to your Facebook page. You must have a Facebook account setup first.', APP_TD ),
                        'id' => $app_abbr.'_facebook_url',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
*/

                array(  'name' => __( 'Tracking Code', APP_TD ),
                        'desc' => sprintf( '%s' . __( "Sign up for a free <a target='_new' href='%s'>Google Analytics account</a>.", APP_TD ), '<div class="googleico"></div>', 'http://www.google.com/analytics/' ),
                        'tip' => __( 'Paste your analytics tracking code here. Google Analytics is free and the most popular but you can use other providers as well.', APP_TD ),
                        'id' => $app_abbr.'_google_analytics',
                        'css' => 'width:500px;height:150px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

    
    array(	'name' => __( 'Google Maps Settings', APP_TD ),
                'type' => 'title',
                'id' => ''),
                
                
                array(  'name' 		=> __( 'Google Maps Language', APP_TD ),
                        'desc' 		=> sprintf( __( "Find the list of supported language codes <a target='_new' href='%s'>here</a>.", APP_TD ), 'http://spreadsheets.google.com/pub?key=p9pdwsai2hDMsLkXsoM05KQ&gid=1' ),
                        'tip' 		=> __( 'The Google Maps API uses the browsers language setting when displaying textual info on the map. In most cases, this is preferable and you should not need to override this setting. However, if you wish to change the Maps API to ignore the browsers language setting and force it to display info in a particular language, enter your two character region code here (i.e. Japanese is ja).', APP_TD ),
                        'id' 		=> $app_abbr.'_gmaps_lang',
                        'css' 		=> 'width:50px;',
                        'vis' 		=> '',
                        'req' 		=> '',
                        'min' 		=> '',
                        'type' 		=> 'text',
                        'std' 		=> ''
                    ),
                
                    array( 'name' 	=> __( 'Google Maps Region', APP_TD ),
                        'desc' 		=> sprintf( __( "Find your two-letter ISO 3166-1 region code <a target='_new' href='%s'>here</a>.", APP_TD ), 'http://en.wikipedia.org/wiki/ISO_3166-1' ),
                        'tip' 		=> __( "Enter your country's two-letter region code here to properly display map locations. (i.e. Someone enters the location &quot;Toledo&quot;, it's based off the default region (US) and will display &quot;Toledo, Ohio&quot;. With the region code set to &quot;ES&quot; (Spain), the results will show &quot;Toledo, Spain.&quot;)", APP_TD ),
                        'id' 		=> $app_abbr.'_gmaps_region',
                        'css' 		=> 'width:50px;',
                        'vis' 		=> '',
                        'req' 		=> '',
                        'min' 		=> '',
                        'type' 		=> 'text',
                        'std' 		=> ''
                    ),
                


				array(	'name' => __( 'Search Settings', APP_TD ),
								'type' => 'title',
								'id' => ''),

								array(  'name' => __( 'Exclude Pages', APP_TD ),
												'desc' => '',
												'tip' => __( 'Set this option to yes if you do not want your pages to show up in your website search results.', APP_TD ),
												'id' => $app_abbr.'_search_ex_pages',
												'css' => 'min-width:100px;',
												'std' => '',
												'vis' => '',
												'req' => '',
												'js' => '',
												'min' => '',
												'type' => 'select',
												'options' => array( 'yes' => __( 'Yes', APP_TD ),
																						'no'  => __( 'No', APP_TD ) )),

								array(  'name' => __( 'Exclude Blog Posts', APP_TD ),
												'desc' => '',
												'tip' => __( 'Set this option to yes if you do not want your blog posts to show up in your website search results.', APP_TD ),
												'id' => $app_abbr.'_search_ex_blog',
												'css' => 'min-width:100px;',
												'std' => '',
												'vis' => '',
												'req' => '',
												'js' => '',
												'min' => '',
												'type' => 'select',
												'options' => array( 'yes' => __( 'Yes', APP_TD ),
																						'no'  => __( 'No', APP_TD ) )),

								array(  'name' => __( 'Search Custom Fields', APP_TD ),
												'desc' => __( 'This option may slow down search engine on your website due to complex database queries.', APP_TD ),
												'tip' => __( 'Set this option to yes if you want to search a phrase in all custom fields.', APP_TD ),
												'id' => $app_abbr.'_search_custom_fields',
												'css' => 'min-width:100px;',
												'std' => '',
												'vis' => '',
												'req' => '',
												'js' => '',
												'min' => '',
												'type' => 'select',
												'options' => array( 'yes' => __( 'Yes', APP_TD ),
																						'no'  => __( 'No', APP_TD ) )),

								array(  'name' => __( 'Search Field Width', APP_TD ),
												'desc' => '',
												'tip' => __( 'Sometimes the search bar text field is too long and gets pushed down becuase of the categories drop-down. This option allows you to manually adjust it. Note: value must be numeric followed by either px or % (i.e. 600px or 50%). The default is 450px.', APP_TD ),
												'id' => $app_abbr.'_search_field_width',
												'css' => 'width:100px;',
												'type' => 'text',
												'req' => '',
												'min' => '',
												'std' => '',
												'vis' => '',
												'visid' => ''),

								array(  'name' => __( 'Distance Unit', APP_TD ),
												'desc' => '',
												'tip' => __( 'Defines the radius unit for search.', APP_TD ),
												'id' => $app_abbr.'_distance_unit',
												'css' => 'width:100px;',
												'std' => '',
												'vis' => '',
												'req' => '',
												'js' => '',
												'min' => '',
												'type' => 'select',
												'options' => array( 'mi' => __( 'Miles', APP_TD ),
																						'km'  => __( 'Kilometers', APP_TD ) )),


				array(	'name' => __( 'Search Drop-down Options', APP_TD ),
								'type' => 'title',
								'id' => ''),

								array(  'name' => __( 'Category Depth', APP_TD ),
												'desc' => '',
												'tip' => __( "This sets the depth of categories shown in the category drop-down. Use 'Show All' unless you have a lot of sub-categories and do not want them all listed.", APP_TD ),
												'id' => $app_abbr.'_search_depth',
												'css' => 'min-width:100px;',
												'vis' => '',
												'req' => '',
												'min' => '',
												'type' => 'select',
												'options' => array( '0' => __( 'Show All', APP_TD ),
																						'1'  => '1',
																						'2'  => '2',
																						'3'  => '3',
																						'4'  => '4',
																						'5'  => '5',
																						'6'  => '6',
																						'7'  => '7',
																						'8'  => '8',
																						'9'  => '9',
																						'10' => '10')),

								array(  'name' => __( 'Category Hierarchy', APP_TD ),
												'desc' => '',
												'tip' => __( 'This will indent sub-categories within the category drop-down vs showing them all flat.', APP_TD ),
												'id' => $app_abbr.'_cat_hierarchy',
												'css' => 'width:100px;',
												'vis' => '',
												'req' => '',
												'min' => '',
												'type' => 'select',
												'options' => array( '1' => __( 'Yes', APP_TD ),
																						'0'  => __( 'No', APP_TD ) )),

								array(  'name' => __( 'Show Ad Count', APP_TD ),
												'desc' => '',
												'tip' => __( 'This will show an ad total next to each category name in the category drop-down.', APP_TD ),
												'id' => $app_abbr.'_cat_count',
												'css' => 'width:100px;',
												'vis' => '',
												'req' => '',
												'min' => '',
												'type' => 'select',
												'options' => array( '1' => __( 'Yes', APP_TD ),
																						'0'  => __( 'No', APP_TD ) )),

								array(  'name' => __( 'Hide Empty Categories', APP_TD ),
												'desc' => '',
												'tip' => __( 'This will hide any empty categories within the category drop-down.', APP_TD ),
												'id' => $app_abbr.'_cat_hide_empty',
												'css' => 'width:100px;',
												'vis' => '',
												'req' => '',
												'min' => '',
												'type' => 'select',
												'options' => array( '1' => __( 'Yes', APP_TD ),
																						'0'  => __( 'No', APP_TD ) )),
											 

				array(	'name' => __( 'Categories Menu Item Options', APP_TD ),
								'type' => 'title',
								'id' => ''),

								array(  'name' => __( 'Show Category Count', APP_TD ),
												'desc' => __( 'Check this box to display category count.', APP_TD ),
												'tip' => __( 'This will show an ad total next to category name.', APP_TD ),
												'id' => $app_abbr.'_cat_menu_count',
												'css' => '',
												'std' => '',
												'vis' => '',
												'req' => '',
												'js' => '',
												'min' => '',
												'type' => 'checkbox'),

								array(  'name' => __( 'Hide Empty Sub-Categories', APP_TD ),
												'desc' => __( 'Check this box to hide empty sub-categories.', APP_TD ),
												'tip' => __( 'This will hide empty sub-categories under parent category.', APP_TD ),
												'id' => $app_abbr.'_cat_menu_hide_empty',
												'css' => '',
												'std' => '',
												'vis' => '',
												'req' => '',
												'js' => '',
												'min' => '',
												'type' => 'checkbox'),

								array(  'name' => __( 'Category Depth', APP_TD ),
												'desc' => '',
												'tip' => __( 'This sets the depth limit of parent category.', APP_TD ),
												'id' => $app_abbr.'_cat_menu_depth',
												'css' => 'min-width:100px;',
												'std' => '',
												'vis' => '',
												'req' => '',
												'js' => '',
												'min' => '',
												'type' => 'select',
												'options' => array( '999'  => __( 'Show All', APP_TD ),
																						'0'  => '0',
																						'1'  => '1',
																						'2'  => '2',
																						'3'  => '3',
																						'4'  => '4',
																						'5'  => '5',
																						'6'  => '6',
																						'7'  => '7',
																						'8'  => '8',
																						'9'  => '9',
																						'10' => '10')),

								array(  'name' => __( 'Number of Sub-Categories', APP_TD ),
												'desc' => '',
												'tip' => __( 'This sets the number of sub-categories shown under each category item.', APP_TD ),
												'id' => $app_abbr.'_cat_menu_sub_num',
												'css' => 'min-width:100px;',
												'std' => '',
												'vis' => '',
												'req' => '',
												'js' => '',
												'min' => '',
												'type' => 'select',
												'options' => array( '999'  => __( 'Show All', APP_TD ),
																						'0'  => '0',
																						'1'  => '1',
																						'2'  => '2',
																						'3'  => '3',
																						'4'  => '4',
																						'5'  => '5',
																						'6'  => '6',
																						'7'  => '7',
																						'8'  => '8',
																						'9'  => '9',
																						'10' => '10')),

				array(	'name' => __( 'Categories Page Options', APP_TD ),
								'type' => 'title',
								'id' => ''),

								array(  'name' => __( 'Show Category Count', APP_TD ),
												'desc' => __( 'Check this box to display category count.', APP_TD ),
												'tip' => __( 'This will show an ad total next to category name.', APP_TD ),
												'id' => $app_abbr.'_cat_dir_count',
												'css' => '',
												'std' => '',
												'vis' => '',
												'req' => '',
												'js' => '',
												'min' => '',
												'type' => 'checkbox'),

								array(  'name' => __( 'Hide Empty Sub-Categories', APP_TD ),
												'desc' => __( 'Check this box to hide empty sub-categories.', APP_TD ),
												'tip' => __( 'This will hide empty sub-categories under parent category.', APP_TD ),
												'id' => $app_abbr.'_cat_dir_hide_empty',
												'css' => '',
												'std' => '',
												'vis' => '',
												'req' => '',
												'js' => '',
												'min' => '',
												'type' => 'checkbox'),

								array(  'name' => __( 'Category Depth', APP_TD ),
												'desc' => '',
												'tip' => __( 'This sets the depth limit of parent category.', APP_TD ),
												'id' => $app_abbr.'_cat_dir_depth',
												'css' => 'min-width:100px;',
												'std' => '',
												'vis' => '',
												'req' => '',
												'js' => '',
												'min' => '',
												'type' => 'select',
												'options' => array( '999'  => __( 'Show All', APP_TD ),
																						'0'  => '0',
																						'1'  => '1',
																						'2'  => '2',
																						'3'  => '3',
																						'4'  => '4',
																						'5'  => '5',
																						'6'  => '6',
																						'7'  => '7',
																						'8'  => '8',
																						'9'  => '9',
																						'10' => '10')),

								array(  'name' => __( 'Number of Sub-Categories', APP_TD ),
												'desc' => '',
												'tip' => __( 'This sets the number of sub-categories shown under each category item.', APP_TD ),
												'id' => $app_abbr.'_cat_dir_sub_num',
												'css' => 'min-width:100px;',
												'std' => '',
												'vis' => '',
												'req' => '',
												'js' => '',
												'min' => '',
												'type' => 'select',
												'options' => array( '999'  => __( 'Show All', APP_TD ),
																						'0'  => '0',
																						'1'  => '1',
																						'2'  => '2',
																						'3'  => '3',
																						'4'  => '4',
																						'5'  => '5',
																						'6'  => '6',
																						'7'  => '7',
																						'8'  => '8',
																						'9'  => '9',
																						'10' => '10')),

								array(  'name' => __( 'Number of Columns', APP_TD ),
												'desc' => '',
												'tip' => __( 'This sets the number of columns shown on the directory-style home page layout.', APP_TD ),
												'id' => $app_abbr.'_cat_dir_cols',
												'css' => 'min-width:100px;',
												'std' => '',
												'vis' => '',
												'req' => '',
												'js' => '',
												'min' => '',
												'type' => 'select',
												'options' => array( '2'  => '2',
																						'3'  => '3')),


        array(	'name' => __( 'Classified Ads Messages', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Home Page Message', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'This welcome message will appear in the sidebar of your home page. (HTML is allowed)', APP_TD ),
                        'id' => $app_abbr.'_ads_welcome_msg',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'New Ad Message', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'This message will appear at the top of the classified ads listing page. (HTML is allowed)', APP_TD ),
                        'id' => $app_abbr.'_ads_form_msg',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Membership Purchase Message', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'This message will appear at the top of the classified ads listing page. (HTML is allowed)', APP_TD ),
                        'id' => $app_abbr.'_membership_form_msg',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

               array(  'name' => __( 'Terms of Use', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'This message will appear on the last step of your classified ad listing page. This is usually your legal disclaimer or rules for posting new ads on your site. (HTML is allowed)', APP_TD ),
                        'id' => $app_abbr.'_ads_tou_msg',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),


        array( 'type' => 'tabend', 'id' => '0' ),

    

        array( 'type' => 'tab', 'tabname' => __( 'Listings', APP_TD ), 'id' => '1' ),

    
            array(	'name' => __( 'Classified Ads Configuration', APP_TD ),
                'type' => 'title',
                'id' => ''),

		array(  'name' => __( 'Allow Ad Editing', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Allows the ad owner to edit and republish their existing ads from their dashboard.', APP_TD ),
                        'id' => $app_abbr.'_ad_edit',
                        'css' => 'min-width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),
											 
		array(  'name' => __( 'Allow Parent Category Posting', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Allows ad poster to post to top-level categories. If set to &quot;When Empty&quot;, it allows posting to top-level categories only if they have no child categories.', APP_TD ),
                        'id' => $app_abbr.'_ad_parent_posting',
                        'css' => 'min-width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
											 'whenEmpty' => __( 'When Empty', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Inquiry Form Requires Login', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Require visitors to be logged in before they can fill out the ad inquiry form. In most cases you should keep this set to no to encourage visitors to ask questions without having to create an account.', APP_TD ),
                        'id' => $app_abbr.'_ad_inquiry_form',
                        'css' => 'min-width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Allow HTML', APP_TD ),
                        'desc' => sprintf( __( "The WordPress <a href='%s'>auto-embeds</a> option must be unchecked to completely disable HTML (YouTube, Flickr, etc).", APP_TD ), 'options-media.php' ),
                        'tip' => __( 'Turns on the TinyMCE editor on text area fields and allows the ad owner to use html markup. Other fields do not allow html by default.', APP_TD ),
                        'id' => $app_abbr.'_allow_html',
                        'css' => 'min-width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Allow Ad Relisting', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'This will allow ad owners to pay and relist their expired ads under the original terms (price and duration). They will receive an ad expiration email with a link to their dashboard to relist. This option is not applicable for free or legacy ads (before CP v3.0).', APP_TD ),
                        'id' => $app_abbr.'_allow_relist',
                        'css' => 'min-width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

				array(  'name' => __( 'Show Ad Views Counter', APP_TD ),
                        'desc' => '',
                        'tip' => __( "This will show a 'total views' and 'today's views' at the bottom of each ad listing and blog post.", APP_TD ),
                        'id' => $app_abbr.'_ad_stats_all',
                        'css' => 'min-width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

				array(  'name' => __( 'Show Gravatar Thumbnail', APP_TD ),
                        'desc' => __( 'Note: Enabling this may slow down your site.', APP_TD ),
                        'tip' => __( "This will show a picture of the author next to their name on each ad listing block. A placeholder image will be used if they don't have one.", APP_TD ),
                        'id' => $app_abbr.'_ad_gravatar_thumb',
                        'css' => 'min-width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),
// disabling since 3.1 ticket #550
// doesn't seem to be working anymore
// 				array(  'name' => __( 'Enable Gravatar Hovercards', APP_TD ),
//                         'desc' => '',
//                         'tip' => __( 'This turns on the Gravatar Hovercards feature so when you hover over an author or commenters Gravatar, it pops open a window with their details.', APP_TD ),
//                         'id' => $app_abbr.'_use_hovercards',
//                         'css' => 'min-width:100px;',
//                         'std' => '',
//                         'vis' => '',
//                         'req' => '',
//                         'js' => '',
//                         'min' => '',
//                         'type' => 'select',
//                         'options' => array(  'yes' => __( 'Yes', APP_TD ),
//                                              'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'New Ad Status', APP_TD ),
                        'desc' => __( "Note: If you have the 'Charge for Listing Ads' option set to 'Yes', then each ad will automatically be set to Pending Review until payment is made (regardless of this options value.).", APP_TD ),
                        'tip' => __( '<i>Pending Review</i> - You have to manually approve and publish each ad. <br /><i>Published</i> - Ad goes live immediately without any approvals unless it has not been paid for.', APP_TD ),
                        'id' => $app_abbr.'_post_status',
                        'css' => 'min-width:150px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'pending'  => __( 'Pending Review', APP_TD ),
                                             'publish'  => __( 'Published', APP_TD ) )),

                array(  'name' => __( 'Prune Ads', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Automatically removes all listings from your site as they expire and changes the post status to draft. The frequency is based on the Cron Job Schedule set below and after each ad listing is past the expiration date. If no is selected, the ad will remain live on your site but will be marked as expired.', APP_TD ),
                        'id' => $app_abbr.'_post_prune',
                        'css' => 'min-width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

		array(  'name' => __( 'Cron Job Schedule', APP_TD ),
                        'desc' => __( 'Note: This feature only works if you have the Prune Ads option above set to yes.', APP_TD ),
                        'tip' => __( 'Frequency you would like ClassiPress to check for and take offline any expired ads. Twice daily is recommended. Hourly may cause performance issues if you have a lot of ads.', APP_TD ),
                        'id' => $app_abbr.'_ad_expired_check_recurrance',
                        'css' => 'min-width:100px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'select',
                        'std' => '',
			'options' => array(  'none'         => __( 'None', APP_TD ),
                                             'hourly'       => __( 'Hourly', APP_TD ),
                                             'twicedaily'   => __( 'Twice Daily', APP_TD ),
                                             'daily'        => __( 'Daily', APP_TD ) )),

                array(  'name' => __( 'Ad Listing Period', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Number of days each ad will be listed on your site. This option is overridden by ad packs if you are charging for ads and using the Fixed Price Per Ad option. ', APP_TD ),
                        'id' => $app_abbr.'_prun_period',
                        'css' => 'width:75px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),

                array(  'name' => __( 'Form Validation Language', APP_TD ),
                        'desc' => 'Leave this value blank if your site is in English.',
                        'tip' => __( 'This option allows you to set the language your ad submission form error messages are displayed in. Enter your two-letter country code (i.e. for German enter de). Not all languages have been translated but you can always add your own. To see the available languages, look in your /classipress/includes/js/validate/localization folder.', APP_TD ),
                        'id' => $app_abbr.'_form_val_lang',
                        'css' => 'width:75px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),

        array(	'name' => __( 'Ad Images Options', APP_TD ),
                'type' => 'title',
                'id' => ''),

		array(  'name' => __( 'Allow Ad Images', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Allows the ad owner to upload and use images on their ad. Note: This will disable display of most ad images across the entire site but some images may still display.', APP_TD ),
                        'id' => $app_abbr.'_ad_images',
                        'css' => 'min-width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

		array(  'name' => __( 'Show Preview Image', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Displays a larger image when you mouse over the smaller thumbnail image. This is on your home page, category, search results, etc. ', APP_TD ),
                        'id' => $app_abbr.'_ad_image_preview',
                        'css' => 'min-width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Max Images Per Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'The number of images the ad owner can upload with each of their ads.', APP_TD ),
                        'id' => $app_abbr.'_num_images',
                        'css' => 'min-width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array( '1' => '1',
                                            '2' => '2',
                                            '3' => '3',
                                            '4' => '4',
                                            '5' => '5',
                                            '6' => '6',
                                            '7' => '7',
                                            '8' => '8')),

                array(  'name' => __( 'Max Size Per Image', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'The maximum image size (per image) the ad owner can upload with each of their ads.', APP_TD ),
                        'id' => $app_abbr.'_max_image_size',
                        'css' => 'min-width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array( '100'  => '100KB',
                                            '250'  => '250KB',
                                            '500'  => '500KB',
                                            '1024' => '1MB',
                                            '2048' => '2MB',
                                            '5120' => '5MB',
                                            '7168' => '7MB',
                                            '10240' => '10MB')),



        array( 'type' => 'tabend', 'id' => '1' ),


	array( 'type' => 'tab', 'tabname' => __( 'Security', APP_TD ), 'id' => '2' ),

        array(	'name' => __( 'Security Settings', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Back Office Access', APP_TD ),
                        'desc' => sprintf( __( "View the WordPress <a target='_new' href='%s'>Roles and Capabilities</a> for more information.", APP_TD ), 'http://codex.wordpress.org/Roles_and_Capabilities' ),
                        'tip' => __( 'Allows you to restrict access to the WordPress Back Office (wp-admin) by specific role. Keeping this set to admins only is recommended. Select Disable if you have problems with this feature.  (This feature does not work with WPMU at this time).', APP_TD ),
                        'id' => $app_abbr.'_admin_security',
                        'css' => 'min-width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'manage_options' => __( 'Admins Only', APP_TD ),
                                             'edit_others_posts' => __( 'Admins, Editors', APP_TD ),
                                             'publish_posts' => __( 'Admins, Editors, Authors', APP_TD ),
                                             'edit_posts' => __( 'Admins, Editors, Authors, Contributors', APP_TD ),
                                             'read' => __( 'All Access', APP_TD ),
                                             'disable' => __( 'Disable', APP_TD ) )),

    array(	'name' => __( 'reCaptcha Settings', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable reCaptcha', APP_TD ),
                        'desc' => sprintf( __( "reCaptcha is a free anti-spam service provided by Google. Learn more about <a target='_new' href='%s'>reCaptcha</a>.", APP_TD ), 'http://code.google.com/apis/recaptcha/' ),
                        'tip' => __( 'Set this option to yes to enable the reCaptcha service that will protect your site against spam registrations. It will show a verification box on your registration page that requires a human to read and enter the words.', APP_TD ),
                        'id' => $app_abbr.'_captcha_enable',
                        'css' => 'width:100px;',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'std' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'reCaptcha Public Key', APP_TD ),
                        'desc' => sprintf( '%s' . __( "Sign up for a free <a target='_new' href='%s'>Google reCaptcha</a> account.", APP_TD ), '<div class="captchaico"></div>', 'https://www.google.com/recaptcha/admin/create' ),
                        'tip' => __( 'Enter your public key here to enable an anti-spam service on your new user registration page (requires a free Google reCaptcha account). Leave it blank if you do not wish to use this anti-spam feature.', APP_TD ),
                        'id' => $app_abbr.'_captcha_public_key',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),

                array(  'name' => __( 'reCaptcha Private Key', APP_TD ),
                        'desc' => sprintf( '%s' . __( "Sign up for a free <a target='_new' href='%s'>Google reCaptcha</a> account.", APP_TD ), '<div class="captchaico"></div>', 'https://www.google.com/recaptcha/admin/create' ),
                        'tip' => __( 'Enter your private key here to enable an anti-spam service on your new user registration page (requires a free Google reCaptcha account). Leave it blank if you do not wish to use this anti-spam feature.', APP_TD ),
                        'id' => $app_abbr.'_captcha_private_key',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),

                array(  'name' => __( 'Choose Theme', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Select the color scheme you wish to use for reCaptcha.', APP_TD ),
                        'id' => $app_abbr.'_captcha_theme',
                        'css' => 'width:100px;',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'std' => '',
                        'type' => 'select',
                        'options' => array(  'red' => __( 'Red', APP_TD ),
                                             'white' => __( 'White', APP_TD ),
                                             'blackglass' => __( 'Black', APP_TD ),
                                             'clean'  => __( 'Clean', APP_TD ) )),

    array( 'type' => 'tabend', 'id' => '2' ),


    array( 'type' => 'tab', 'tabname' => __( 'Advertising', APP_TD ), 'id' => '3' ),
    
    array(	'name' => __( 'Header Ad (468x60)', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_adcode_468x60_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_adcode_468x60',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_adcode_468x60_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_adcode_468x60_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),

        array(	'name' => __( 'Single Ad (336x280)', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 336x280 ads displayed on single ad, category, or search result pages.', APP_TD ),
                        'id' => $app_abbr.'_adcode_336x280_enable',
                        'css' => 'width:100px;',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'std' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by your advertising provider.', APP_TD ),
                        'id' => $app_abbr.'_adcode_336x280',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_adcode_336x280_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_adcode_336x280_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),

        array( 'type' => 'tabend', 'id' => '3' ),
        
    //==========================================================================================//
    array( 'type' => 'tab', 'tabname' => __( 'Category-Advertising', APP_TD ), 'id' => '30' ),
    
    array(	'name' => __( 'Cat Banner One(320x125)', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_adcode_468x60_cat_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_adcode_468x60_cat',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),
                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_adcode_468x60_cat_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_adcode_468x60_cat_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),

     array(	'name' => __( 'Cat Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_cat_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_cat',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),
               array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_cat_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_cat_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
        array(	'name' => __( 'Cat Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_cat_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_cat',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),
               array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_cat_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_cat_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
    
        array( 'type' => 'tabend', 'id' => '30' ),
        
    //==========================================================================================//
    array( 'type' => 'tab', 'tabname' => __( 'Abia', APP_TD ), 'id' => '4' ),
    
    array(	'name' => __( 'Header Ad (468x60)', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_adcode_468x60_abia_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_adcode_468x60_abia',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_adcode_468x60_abia_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_adcode_468x60_abia_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_abia_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_abia',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_abia_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_abia_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_abia_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_abia',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_abia_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_abia_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
        array(	'name' => __( 'Single Ad (336x280)', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 336x280 ads displayed on single ad, category, or search result pages.', APP_TD ),
                        'id' => $app_abbr.'_adcode_336x280_abia_enable',
                        'css' => 'width:100px;',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'std' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by your advertising provider.', APP_TD ),
                        'id' => $app_abbr.'_adcode_336x280_abia',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_adcode_336x280_abia_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_adcode_336x280_abia_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),

        array( 'type' => 'tabend', 'id' => '4' ),
        
        //===================================================================================================//

    array( 'type' => 'tab', 'tabname' => __( 'Anambra', APP_TD ), 'id' => '7' ),
    
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_anambra_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_anambra',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_anambra_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_anambra_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Anambra Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_anambra_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_anambra',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_anambra_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_anambra_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),

        array( 'type' => 'tabend', 'id' => '7' ),
        
        //===================================================================================================//
    
    array( 'type' => 'tab', 'tabname' => __( 'Akwa lbom', APP_TD ), 'id' => '8' ),
                
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_akwalbom_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_akwalbom',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_akwalbom_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_akwalbom_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_akwalbom_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_akwalbom',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_akwalbom_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_akwalbom_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),

               array( 'type' => 'tabend', 'id' => '8' ),
        
        //===================================================================================================//
        
        array( 'type' => 'tab', 'tabname' => __( 'Adamawa', APP_TD ), 'id' => '9' ),
    
             array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_adamawa_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_adamawa',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_adamawa_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_adamawa_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_adamawa_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_adamawa',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_adamawa_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_adamawa_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),

        array( 'type' => 'tabend', 'id' => '9' ),
        
        //===================================================================================================//
        
        array( 'type' => 'tab', 'tabname' => __( 'Bauchi', APP_TD ), 'id' => '10' ),
                
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_bauchi_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_bauchi',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_bauchi_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_bauchi_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_bauchi_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_bauchi',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_bauchi_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_bauchi_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),

        array( 'type' => 'tabend', 'id' => '10' ),
        
        //===================================================================================================//
        
        array( 'type' => 'tab', 'tabname' => __( 'Bayelsa', APP_TD ), 'id' => '11' ),
                        
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_bayelsa_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_bayelsa',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_bayelsa_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_bayelsa_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_bayelsa_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_bayelsa',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_bayelsa_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_bayelsa_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),

        array( 'type' => 'tabend', 'id' => '11' ),
        
        //===================================================================================================//
        
        array( 'type' => 'tab', 'tabname' => __( 'Benue', APP_TD ), 'id' => '12' ),
                
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_benue_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_benue',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_benue_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_benue_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_benue_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_benue',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_benue_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_benue_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),

        array( 'type' => 'tabend', 'id' => '12' ),
        
        //===================================================================================================//
        
        array( 'type' => 'tab', 'tabname' => __( 'Borno', APP_TD ), 'id' => '13' ),
                
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_borno_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_borno',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_borno_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_borno_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_borno_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_borno',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_borno_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_borno_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),

        array( 'type' => 'tabend', 'id' => '13' ),
        
        //===================================================================================================//
        
        array( 'type' => 'tab', 'tabname' => __( 'Cross River', APP_TD ), 'id' => '14' ),
                     
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_crossriver_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_crossriver',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_crossriver_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_crossriver_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_crossriver_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_crossriver',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_crossriver_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_crossriver_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),

        array( 'type' => 'tabend', 'id' => '14' ),
        
        //===================================================================================================//
        
        array( 'type' => 'tab', 'tabname' => __( 'Delta', APP_TD ), 'id' => '15' ),
                        
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_delta_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_delta',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_delta_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_delta_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_delta_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_delta',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_delta_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_delta_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),

        array( 'type' => 'tabend', 'id' => '15' ),
        
        //===================================================================================================//
        
        array( 'type' => 'tab', 'tabname' => __( 'Ebonyi', APP_TD ), 'id' => '16' ),
                
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_ebonyi_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_ebonyi',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_ebonyi_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_ebonyi_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_ebonyi_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_ebonyi_three',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_ebonyi_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_ebonyi_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
        array( 'type' => 'tabend', 'id' => '16' ),
        
      
        
        array( 'type' => 'tab', 'tabname' => __( 'Edo', APP_TD ), 'id' => '18' ),
    
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_edo_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_edo',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_edo_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_edo_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_edo_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_edo',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_edo_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_edo_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),

        array( 'type' => 'tabend', 'id' => '18' ),
        
        //===================================================================================================//
        
        array( 'type' => 'tab', 'tabname' => __( 'Ekiti', APP_TD ), 'id' => '19' ),
                
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_ekiti_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_ekiti',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_ekiti_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_ekiti_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_ekiti_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_ekiti',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_ekiti_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_ekiti_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),

        array( 'type' => 'tabend', 'id' => '19' ),
        
        //===================================================================================================//
        
        array( 'type' => 'tab', 'tabname' => __( 'Gombe', APP_TD ), 'id' => '20' ),
    
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_gombe_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_gombe',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_gombe_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_gombe_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_gombe_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_gombe',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_gombe_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_gombe_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),

        array( 'type' => 'tabend', 'id' => '20' ),
        
        //===================================================================================================//
        
        array( 'type' => 'tab', 'tabname' => __( 'Imo', APP_TD ), 'id' => '21' ),
                
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_imo_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_imo',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_imo_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_imo_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_imo_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_imo',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_imo_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_imo_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
        array( 'type' => 'tabend', 'id' => '21' ),
        
        //===================================================================================================//
        
        array( 'type' => 'tab', 'tabname' => __( 'Jigawa', APP_TD ), 'id' => '22' ),
    
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_jigawa_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_jigawa',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_jigawa_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_jigawa_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_jigawa_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_jigawa',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_jigawa_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_jigawa_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
        array( 'type' => 'tabend', 'id' => '22' ),
        
        //===================================================================================================//
        
        array( 'type' => 'tab', 'tabname' => __( 'Kaduna', APP_TD ), 'id' => '23' ),
    
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_kaduna_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_kaduna',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_kaduna_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_kaduna_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_kaduna_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_kaduna',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_kaduna_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_kaduna_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
        array( 'type' => 'tabend', 'id' => '23' ),
        
        //===================================================================================================//
        
        array( 'type' => 'tab', 'tabname' => __( 'Kano', APP_TD ), 'id' => '24' ),
                
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_kano_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_kano',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_kano_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_kano_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_kano_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_kano',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_kano_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_kano_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),

        array( 'type' => 'tabend', 'id' => '24' ),
        
        //===================================================================================================//
        
        array( 'type' => 'tab', 'tabname' => __( 'Katsina', APP_TD ), 'id' => '25' ),
    
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_katsina_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_katsina',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_katsina_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_katsina_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_katsina_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_katsina',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_katsina_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_katsina_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),

        array( 'type' => 'tabend', 'id' => '25' ),
        
        //===================================================================================================//
        
        array( 'type' => 'tab', 'tabname' => __( 'Kebbi', APP_TD ), 'id' => '26' ),
    
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_kebbi_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_kebbi',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_kebbi_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_kebbi_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_kebbi_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_kebbi',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_kebbi_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_kebbi_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),

        array( 'type' => 'tabend', 'id' => '26' ),
        
        //===================================================================================================//
        
        array( 'type' => 'tab', 'tabname' => __( 'Kogi', APP_TD ), 'id' => '27' ),
    
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_kogi_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_kogi',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_kogi_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_kogi_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_kogi_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_kogi',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_kogi_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_kogi_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),

        array( 'type' => 'tabend', 'id' => '27' ),
        
        //===================================================================================================//
        
        array( 'type' => 'tab', 'tabname' => __( 'Kwara', APP_TD ), 'id' => '28' ),
                
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_kwara_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_kwara',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_kwara_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_kwara_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_kwara_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_kwara',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_kwara_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_kwara_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),

        array( 'type' => 'tabend', 'id' => '28' ),
        
        //===================================================================================================//
        
        array( 'type' => 'tab', 'tabname' => __( 'Lagos', APP_TD ), 'id' => '29' ),
    
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_lagos_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_lagos',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_lagos_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_lagos_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_lagos_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_lagos',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_lagos_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_lagos_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
        array( 'type' => 'tabend', 'id' => '29' ),
        
        //===================================================================================================//
        
        array( 'type' => 'tab', 'tabname' => __( 'Nasarawa', APP_TD ), 'id' => '30' ),
    
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_nasarawa_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_nasarawa',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_nasarawa_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_nasarawa_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_nasarawa_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_nasarawa',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_nasarawa_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_nasarawa_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
        array( 'type' => 'tabend', 'id' => '30' ),
        
        //===================================================================================================//
        
        array( 'type' => 'tab', 'tabname' => __( 'Niger', APP_TD ), 'id' => '31' ),
                
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_niger_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_niger',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_niger_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_niger_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_niger_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_niger',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_niger_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_niger_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),

        array( 'type' => 'tabend', 'id' => '31' ),
        
        //===================================================================================================//
        
        array( 'type' => 'tab', 'tabname' => __( 'Ogun', APP_TD ), 'id' => '32' ),
                
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_ogun_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_ogun',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_ogun_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_ogun_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_ogun_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_ogun',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_ogun_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_ogun_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
        array( 'type' => 'tabend', 'id' => '32' ),
        
        //===================================================================================================//
        
        array( 'type' => 'tab', 'tabname' => __( 'Ondo', APP_TD ), 'id' => '33' ),
                
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_ondo_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_ondo',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_ondo_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_ondo_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_ondo_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_ondo',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_ondo_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_ondo_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),

        array( 'type' => 'tabend', 'id' => '33' ),
        
        //===================================================================================================//
        
        array( 'type' => 'tab', 'tabname' => __( 'Osun', APP_TD ), 'id' => '34' ),
                
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_osun_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_osun',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_osun_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_osun_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_osun_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_osun',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_osun_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_osun_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),

        array( 'type' => 'tabend', 'id' => '34' ),
        
        //===================================================================================================//
        
        array( 'type' => 'tab', 'tabname' => __( 'Oyo', APP_TD ), 'id' => '35' ),
                
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_oyo_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_oyo',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_oyo_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_oyo_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_oyo_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_oyo',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_oyo_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_oyo_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),

        array( 'type' => 'tabend', 'id' => '35' ),
        
        //===================================================================================================//
        
        array( 'type' => 'tab', 'tabname' => __( 'Plateau', APP_TD ), 'id' => '36' ),
                
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_plateau_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_plateau',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_plateau_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_plateau_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_plateau_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_plateau',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_plateau_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_plateau_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
        array( 'type' => 'tabend', 'id' => '36' ),
        
        //===================================================================================================//
        
        array( 'type' => 'tab', 'tabname' => __( 'Rivers', APP_TD ), 'id' => '37' ),
    
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_rivers_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_rivers',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_rivers_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_rivers_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_rivers_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_rivers',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_rivers_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_rivers_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
        array( 'type' => 'tabend', 'id' => '37' ),
        
        //===================================================================================================//
        
        array( 'type' => 'tab', 'tabname' => __( 'Sokoto', APP_TD ), 'id' => '38' ),
                
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_sokoto_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_sokoto',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_sokoto_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_sokoto_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_sokoto_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_sokoto',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_sokoto_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_sokoto_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),

        array( 'type' => 'tabend', 'id' => '38' ),
        
        //===================================================================================================//
        
        array( 'type' => 'tab', 'tabname' => __( 'Taraba', APP_TD ), 'id' => '39' ),
    
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_taraba_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_taraba',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_taraba_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_taraba_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_taraba_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_taraba',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_taraba_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_taraba_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),

        array( 'type' => 'tabend', 'id' => '39' ),
        
        //===================================================================================================//
        
        array( 'type' => 'tab', 'tabname' => __( 'Yobe', APP_TD ), 'id' => '40' ),
                
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_yobe_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_yobe',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_yobe_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_yobe_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_yobe_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_yobe',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_yobe_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_yobe_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
        array( 'type' => 'tabend', 'id' => '40' ),
        
        //===================================================================================================//
        
        array( 'type' => 'tab', 'tabname' => __( 'Zamfara', APP_TD ), 'id' => '41' ),
                
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_zamfara_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_zamfara',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_zamfara_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_zamfara_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_zamfara_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_zamfara',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_zamfara_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_zamfara_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),

        array( 'type' => 'tabend', 'id' => '41' ),
        
        //===================================================================================================//
        
        //===================================================================================================//
        
        array( 'type' => 'tab', 'tabname' => __( 'Port Harcourt', APP_TD ), 'id' => '42' ),
                
                 array(	'name' => __( 'Banner Two', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_portharcourt_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_portharcourt',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_portharcourt_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_two_portharcourt_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),
                
                 array(	'name' => __( 'Banner Three', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Ad', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to no if you do not wish to have a 468x60 ad banner displayed.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_portharcourt_enable',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Code', APP_TD ),
                        'desc' => sprintf( __( "Paste your ad code here. Supports many popular providers such as <a target='_new' href='%s'>Google AdSense</a> and <a target='_new' href='%s'>BuySellAds</a>.", APP_TD ), 'http://www.google.com/adsense/', 'http://www.buysellads.com/' ),
                        'tip' => __( 'You may use html and/or javascript code provided by Google AdSense.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_portharcourt',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

                array(  'name' => __( 'Ad Image URL', APP_TD ),
                        'desc' => __( 'Upload your ad creative or paste the ad creative URL directly.', APP_TD ),
                        'tip' => __( 'If you would rather use an image ad instead of code provided by your advertiser, use this field instead.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_portharcourt_url',
                        'css' => 'min-width:398px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'upload',
                        'std' => ''),

                array(  'name' => __( 'Ad Destination', APP_TD ),
                        'desc' => __( 'Paste the destination URL of your custom ad creative here (i.e. http://www.yoursite.com/landing-page.html).', APP_TD ),
                        'tip' => __( 'When a visitor clicks on your ad image, this is the destination they will be sent to.', APP_TD ),
                        'id' => $app_abbr.'_banner_three_portharcourt_dest',
                        'css' => 'min-width:500px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'text',
                        'std' => ''),

        array( 'type' => 'tabend', 'id' => '42' ),
        
        //===================================================================================================//

	array( 'type' => 'tab', 'tabname' => __( 'Advanced', APP_TD ), 'id' => '5' ),

  
        array(	'name' => __( 'Advanced Options', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Run Ads Expired Check Now', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Set this option to yes in order to manually run the function that checks all ads expiration and prunes any ads that are expired. This event will run only one time and then set itself back to no.', APP_TD ),
                        'id' => $app_abbr.'_tools_run_expiredcheck',
                        'css' => 'width:100px;',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'std' => '',
                        'type' => 'select',
                        'options' => array(  'no' => __( 'No', APP_TD ),
                                             'yes'  => __( 'Yes', APP_TD ) )),

                array(  'name' => __( 'Disable Core Stylesheets', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'If you are interested in creating a child theme or just want to completely disable the core ClassiPress styles, change this option to yes. (Note: this option is for advanced users. Do not change unless you know what you are doing.)', APP_TD ),
                        'id' => $app_abbr.'_disable_stylesheet',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'no'   => __( 'No', APP_TD ),
                                             'yes'  => __( 'Yes', APP_TD ) )),

				array(  'name' => __( 'Enable Debug Mode', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'This will print out the $wp_query->query_vars array at the top of your website. This should only be used for debugging.', APP_TD ),
                        'id' => $app_abbr.'_debug_mode',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'no'   => __( 'No', APP_TD ),
                                             'yes'  => __( 'Yes', APP_TD ) )),

				array(  'name' => __( 'Use Google CDN jQuery', APP_TD ),
                        'desc' => '',
                        'tip' => __( "This will use Google's hosted jQuery files which are served from their global content delivery network. This will help your site load faster and save bandwidth.", APP_TD ),
                        'id' => $app_abbr.'_google_jquery',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'no'   => __( 'No', APP_TD ),
                                             'yes'  => __( 'Yes', APP_TD ) )),

								array(  'name' => __( 'Disable WordPress Login Page', APP_TD ),
												'desc' => '',
												'tip' => __( 'If someone tries to access <code>wp-login.php</code> directly, they will be redirected to ClassiPress themed login pages. If you want to use any "maintenance mode" plugins, you should enable the default WordPress login page.', APP_TD ),
												'id' => $app_abbr.'_disable_wp_login',
												'css' => 'width:100px;',
												'std' => '',
												'vis' => '',
												'req' => '',
												'js' => '',
												'min' => '',
												'type' => 'select',
												'options' => array( 'no'  => __( 'No', APP_TD ),
																						'yes' => __( 'Yes', APP_TD ) )),

				array(  'name' => __( 'Disable WordPress Version Meta Tag', APP_TD ),
                        'desc' => '',
                        'tip' => __( "This will remove the WordPress generator meta tag in the source code of your site <code>< meta name='generator' content='WordPress 3.1' ></code>. It's an added security measure which prevents anyone from seeing what version of WordPress you are using. It also helps to deter hackers from taking advantage of vulnerabilities sometimes present in WordPress. (Yes is recommended)", APP_TD ),
                        'id' => $app_abbr.'_remove_wp_generator',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'no'   => __( 'No', APP_TD ),
                                             'yes'  => __( 'Yes', APP_TD ) )),
											 
				array(  'name' => __( 'Disable WordPress User Toolbar', APP_TD ),
                        'desc' => '',
                        'tip' => __( "This will remove the WordPress user toolbar at the top of your web site which is displayed for all logged in users. This feature was added in WordPress 3.1.", APP_TD ),
                        'id' => $app_abbr.'_remove_admin_bar',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'no'   => __( 'No', APP_TD ),
                                             'yes'  => __( 'Yes', APP_TD ) )),											 

				array(  'name' => __( 'Cache Expires', APP_TD ),
                        'desc' => __( 'This number is in seconds so one day equals 86400 seconds (60 seconds * 60 minutes * 24 hours). Do not enter any commas.', APP_TD ),
                        'tip' => __( 'To speed up page loading on your site, ClassiPress uses a caching mechanism on certain features (i.e. category drop-down, home page). The cache automatically gets flushed whenever a category has been added/modified, however this value sets the frequency your cache is regularly emptied. We recommend keeping this at the default (every hour = 3600 seconds).', APP_TD ),
                        'id' => $app_abbr.'_cache_expires',
                        'css' => 'width:100px;',
                        'type' => 'text',
                        'req' => '',
                        'min' => '',
                        'std' => '',
                        'vis' => '',
                        'visid' => ''),


                array(  'name' => __( 'Admin Table Width', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Sometimes the admin option pages are set too narrow or too wide. This option allows you to override it. Note: value must be numeric followed by either px or % (i.e. 700px or 100%). The default is 850px.', APP_TD ),
                        'id' => $app_abbr.'_table_width',
                        'css' => 'width:100px;',
                        'type' => 'text',
                        'req' => '',
                        'min' => '',
                        'std' => '',
                        'vis' => '',
                        'visid' => ''),

				array(  'name' => __( 'Ad Box Right Side', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Sometimes the main ad listings box is too narrow or it wraps due to legacy ad sizes. This option allows you to change it manually.', APP_TD ),
                        'id' => $app_abbr.'_ad_right_class',
                        'css' => 'width:150px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'full'   => __( 'Normal Full Width', APP_TD ),
                                             ''  => __( 'Legacy Ads Width', APP_TD ) )),



    array( 'name' => __( 'Custom Post Type & Taxonomy URLs', APP_TD ),
                'type' => 'title',
                'id' => ''),

        array(  'name' => __( 'Ad Listing Base URL', APP_TD ),
                        'desc'=> sprintf( __( "IMPORTANT: You must <a target='_blank' href='%s'>re-save your permalinks</a> for this change to take effect.", APP_TD ), 'options-permalink.php' ),
                        'tip' => __( 'This controls the base name of your ad listing urls. The default is ads and will look like this: http://www.yoursite.com/ads/ad-title-here/. Do not include any slashes. This should only be alpha and/or numeric values. You should not change this value once you have launched your site otherwise you risk breaking urls of other sites pointing to yours, etc.', APP_TD ),
                        'id' => $app_abbr.'_post_type_permalink',
                        'css' => 'width:250px;',
                        'type' => 'text',
                        'req' => '',
                        'min' => '',
                        'std' => '',
                        'vis' => '',
                        'visid' => ''),

        array(  'name' => __( 'Ad Category Base URL', APP_TD ),
                        'desc'=> sprintf( __( "IMPORTANT: You must <a target='_blank' href='%s'>re-save your permalinks</a> for this change to take effect.", APP_TD ), 'options-permalink.php' ),
                        'tip' => __( 'This controls the base name of your ad category urls. The default is ad-category and will look like this: http://www.yoursite.com/ad-category/category-name/. Do not include any slashes. This should only be alpha and/or numeric values. You should not change this value once you have launched your site otherwise you risk breaking urls of other sites pointing to yours, etc.', APP_TD ),
                        'id' => $app_abbr.'_ad_cat_tax_permalink',
                        'css' => 'width:250px;',
                        'type' => 'text',
                        'req' => '',
                        'min' => '',
                        'std' => '',
                        'vis' => '',
                        'visid' => ''),

        array(  'name' => __( 'Ad Tag Base URL', APP_TD ),
                        'desc'=> sprintf( __( "IMPORTANT: You must <a target='_blank' href='%s'>re-save your permalinks</a> for this change to take effect.", APP_TD ), 'options-permalink.php' ),
                        'tip' => __( 'This controls the base name of your ad tag urls. The default is ad-tag and will look like this: http://www.yoursite.com/ad-tag/tag-name/. Do not include any slashes. This should only be alpha and/or numeric values. You should not change this value once you have launched your site otherwise you risk breaking urls of other sites pointing to yours, etc.', APP_TD ),
                        'id' => $app_abbr.'_ad_tag_tax_permalink',
                        'css' => 'width:250px;',
                        'type' => 'text',
                        'req' => '',
                        'min' => '',
                        'std' => '',
                        'vis' => '',
                        'visid' => ''),

//        array(  'name' => __( 'Author Path', APP_TD ),
//                        'desc'=> sprintf( __( "IMPORTANT: You must <a target='_blank' href='%s'>re-save your permalinks</a> for this change to take effect. Unlike the other path changes, this one may affect your site performance.", APP_TD ), 'options-permalink.php' ),
//                        'tip' => __( 'This controls the base name of your customers author page urls. The default is author and will look like this: http://www.yoursite.com/author/author-name/. Do not include any slashes. This should only be alpha and/or numeric values. You should not change this value once you have launched your site otherwise you risk breaking urls of other sites pointing to yours, etc.', APP_TD ),
//                        'id' => $app_abbr.'_author_url',
//                        'css' => 'width:250px;',
//                        'type' => 'text',
//                        'req' => '',
//                        'min' => '',
//                        'std' => '',
//                        'vis' => '',
//                        'visid' => ''),


               

        array( 'name' => __( 'Cuf&oacute;n Font Replacement', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Enable Cuf&oacute;n', APP_TD ),

                        'desc' => sprintf( __( "Turns on the Cuf&oacute;n replacement text feature on your site. Learn more about <a target='_new' href='%s'>Cuf&oacute;n</a> here.", APP_TD ), 'http://github.com/sorccu/cufon/wiki' ),
                        'tip' => __( 'Set this option to no if you are having conflicts or problems with certain text displaying on your site', APP_TD ),
                        'id' => $app_abbr.'_cufon_enable',
                        'css' => 'width:100px;',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'std' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Cuf&oacute;n Replacement Code', APP_TD ),
                        'desc' => __( "Say you want to replace all <code>&lt;h1 class='dotted'&gt;</code> elements on your site with Cuf&oacute;n. You would enter, <code>Cufon.replace('h1.dotted', { fontFamily: 'Liberation Serif', textShadow:'0 1px 0 #FFFFFF' });</code> The Cuf&oacute;n system will automatically style all elements for you. <br />Note: You must have the font installed before it will work. To install a new font you must first generate it and then place the .js font file in your ClassiPress /includes/fonts/ theme directory.", APP_TD ),
                        'tip' => __( 'Cuf&oacute;n allows you to easily replace text with stylish fonts that appear to be images. It is fast and and does not require Flash.', APP_TD ),
                        'id' => $app_abbr.'_cufon_code',
                        'css' => 'width:500px;height:200px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),


        array( 'type' => 'tabend', 'id' => '5' ),


        
);



$options_emails = array (

 	array( 'type' => 'tab', 'tabname' => __( 'General', APP_TD ), 'id' => '0' ),
	   
			   
           array('name' => __( 'Email Notifications', APP_TD ),
		'desc' => sprintf( __( "Emails will be sent to: %s (<a href='%s'>change</a>)", APP_TD ), get_option('admin_email'), 'options-general.php' ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'New Ad Email', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Send me an email once a new ad has been submitted.', APP_TD ),
                        'id' => $app_abbr.'_new_ad_email',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Prune Ads Email', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Send me an email every time the system prunes expired ads.', APP_TD ),
                        'id' => $app_abbr.'_prune_ads_email',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'no'   => __( 'No', APP_TD ),
                                             'yes'  => __( 'Yes', APP_TD ) )),

                array(  'name' => __( 'Ad Approved Email', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Send the ad owner an email once their ad has been approved either by you manually or after payment has been made (post status changes from pending to published).', APP_TD ),
                        'id' => $app_abbr.'_new_ad_email_owner',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Ad Expired Email', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Send the ad owner an email once their ad has expired (post status changes from published to draft).', APP_TD ),
                        'id' => $app_abbr.'_expired_ad_email_owner',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),
											 
                array(  'name' => __( 'Admin New User Email', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Sends the default WordPress new user notification email to the site admin. It is recommended to keep this turned on so you are alerted whenever a new user registers on your site.', APP_TD ),
                        'id' => $app_abbr.'_nu_admin_email',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),	

                array(  'name' => __( 'Membership Activated Email', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Send the user an email once their membership has been activated.', APP_TD ),
                        'id' => $app_abbr.'_membership_activated_email_owner',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Send Membership Subscription Reminder Emails', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Enabling this option will automatically send emails prior to a customers membership pack subscription end date.', APP_TD ),
                        'id' => $app_abbr.'_membership_ending_reminder_email',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),		
											 
/*  lagacy as of v3.1
                array(  'name' => __( 'Use Custom Email Header', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'This option automatically replaces the generic WordPress &quot;From Name&quot; and &quot;Email Address&quot; with your own blog name and admin email. This affects the new registration and forgot password emails. It is recommended to keep this set to Yes unless you are having problems with a plugin that performs a similar function. ', APP_TD ),
                        'id' => $app_abbr.'_custom_email_header',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )), 
*/


//                array(  'name' => __( 'Email Notification', APP_TD ),
//                        'desc' => sprintf( __( "Emails will be sent to: %s. (<a target='_new' href='%s'>Change email address</a>)", APP_TD ), get_option('admin_email'), 'options-general.php' ),
//                        'tip' => __( 'Send an email when payment has been made. You may also receive an email from your payment gateway depending on how you have it configured.', APP_TD ),
//                        'id' => $app_abbr.'_payment_email',
//                        'css' => 'width:100px;',
//                        'vis' => '',
//                        'std' => '',
//                        'js' => '',
//                        'type' => 'select',
//                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
//                                             'no'  => __( 'No', APP_TD ) )),
			   

    array( 'type' => 'tabend', 'id' => '0' ),


	array( 'type' => 'tab', 'tabname' => __( 'New User Email', APP_TD ), 'id' => '1' ),

        array(	'name' => __( 'New User Registration Email', APP_TD ),
			'type' => 'title',
			'id' => ''),
			
                array(  'name' => __( 'Enable Custom Email', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Sends a custom new user notification email to your customers by using the fields you complete below. If this is set to &quot;No&quot;, the default WordPress new user notification email will be sent. This is useful for debugging if your custom emails are not being sent.', APP_TD ),
                        'id' => $app_abbr.'_nu_custom_email',
                        'css' => 'width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),	
			
                array(  'name' => __( 'From Name', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'This is what your customers will see as the &quot;from&quot; when they receive the new user registration email. Use plain text only', APP_TD ),
                        'id' => $app_abbr.'_nu_from_name',
                        'css' => 'width:250px;',
                        'vis' => '',
                        'type' => 'text',
                        'req' => '',
                        'min' => '',
                        'std' => ''),	
						
                array(  'name' => __( 'From Email', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'This is what your customers will see as the &quot;from&quot; email address (also the reply to) when they receive the new user registration email. Use only a valid and existing email address with no html or variables.', APP_TD ),
                        'id' => $app_abbr.'_nu_from_email',
                        'css' => 'width:250px;',
                        'vis' => '',
                        'type' => 'text',
                        'req' => '',
                        'min' => '',
                        'std' => ''),		

                array(  'name' => __( 'Email Subject', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'This is the subject line your customers will see when they receive the new user registration email. Use text and variables only.', APP_TD ),
                        'id' => $app_abbr.'_nu_email_subject',
                        'css' => 'width:400px;',
                        'vis' => '',
                        'type' => 'text',
                        'req' => '',
                        'min' => '',
                        'std' => ''),
						
                array(  'name' => __( 'Allow HTML in Body', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'This option allows you to use html markup in the email body below. It is recommended to keep it set to &quot;No&quot; to avoid problems with delivery. If you turn it on, make sure to test it and make sure the formatting looks ok and gets delivered properly.', APP_TD ),
                        'id' => $app_abbr.'_nu_email_type',
                        'css' => 'width:100px;',
                        'vis' => '',
                        'req' => '',
                        'std' => '',
                        'js' => '',
                        'type' => 'select',
                        'options' => array(  'text/HTML'   => __( 'Yes', APP_TD ),
                                             'text/plain'  => __( 'No', APP_TD ) )),		
						
                array(  'name' => __( 'Email Body', APP_TD ),
                        'desc' => __( 'You may use the following variables within the email body and/or subject line.<br/><br/><strong>%username%</strong> - prints out the username<br/><strong>%useremail%</strong> - prints out the users email address<br/><strong>%password%</strong> - prints out the users text password<br/><strong>%siteurl%</strong> - prints out your website url<br/><strong>%blogname%</strong> - prints out your site name<br/><strong>%loginurl%</strong> - prints out your sites login url<br/><br/>Each variable MUST have the percentage signs wrapped around it with no spaces.<br/>Always test your new email after making any changes (register) to make sure it is working and formatted correctly. If you do not receive an email, chances are something is wrong with your email body.', APP_TD ),
                        'tip' => __( 'Enter the text you would like your customers to see in the new user registration email. Make sure to always at least include the %username% and %password% variables otherwise they might forget later.', APP_TD ),
                        'id' => $app_abbr.'_nu_email_body',
                        'css' => 'width:550px;height:250px;',
                        'vis' => '',
                        'req' => '',
                        'min' => '',
                        'type' => 'textarea',
                        'std' => ''),

					
		array( 'type' => 'tabend', 'id' => '1' ),
			   
											 
);											 



$options_pricing = array (

	array( 'type' => 'tab', 'tabname' => __( 'General', APP_TD ), 'id' => '0' ),
				  
	array(	'name' => __( 'Pricing Configuration', APP_TD ),
                'type' => 'title',
                'id' => ''),
			   
		array(  'name' => __( 'Charge for Listing Ads', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'This option activates the payment system so you can start charging for ad listings on your site.', APP_TD ),
                        'id' => $app_abbr.'_charge_ads',
                        'css' => 'width:100px;',
                        'vis' => '',
                        'req' => '',
                        'std' => '',
                        'js' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Show Featured Ads Slider', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'This option turns on the home page featured ads slider. Usually you charge extra for this space but it is not required. To manually make an ad appear here, check the &quot;stick this post to the front page&quot; box on the WordPress edit post page under &quot;Visibility&quot;.', APP_TD ),
                        'id' => $app_abbr.'_enable_featured',
                        'css' => 'min-width:100px;',
                        'std' => '',
                        'vis' => '',
                        'req' => '',
                        'js' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array(  'yes' => __( 'Yes', APP_TD ),
                                             'no'  => __( 'No', APP_TD ) )),

                array(  'name' => __( 'Featured Ads Title Length', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'This number controls the length of your featured ad titles to this many characters (i.e. if you changed this value to 5, &quot;My Title&quot; would turn into &quot;My Ti...&quot;. Spaces are included in the count.)', APP_TD ),
                        'id' => $app_abbr.'_featured_trim',
                        'css' => 'width:50px;',
                        'vis' => '',
                        'type' => 'text',
                        'req' => '',
                        'min' => '',
                        'std' => ''),


								array(  'name' => __( 'Featured Ad Price', APP_TD ),
												'desc' => __( 'Only enter numeric values or decimal points. Do not include a currency symbol or commas.', APP_TD ),
												'tip' => __( 'This is the additional amount you will charge visitors to post a featured ad on your site. A featured ad appears at the top of the category. Leave this blank if you do not want to offer featured ads.', APP_TD ),
												'id' => $app_abbr.'_sys_feat_price',
												'css' => 'width:50px;',
												'vis' => '',
												'type' => 'text',
												'req' => '',
												'min' => '',
												'std' => ''),
                                
                                array(  'name' => __( 'Service Ad Price', APP_TD ),
												'desc' => __( 'Service Ads price', APP_TD ),
												'tip' => __( 'This is the price need to pay for Service ads listing.', APP_TD ),
												'id' => $app_abbr.'_sys_service_price',
												'css' => 'width:50px;',
												'vis' => '',
												'type' => 'text',
												'req' => '',
												'min' => '',
												'std' => ''),

								array(  'name' => __( 'Clean Price Field', APP_TD ),
												'desc' => __( 'This option should be enabled in order to store valid price values.', APP_TD ),
												'tip' => __( 'This will remove any letters and special characters from the price field leaving only numbers and periods. Leave this set to no if you prefer to allow visitors to enter text such as TBD, OBO or other contextual phrases.', APP_TD ),
												'id' => $app_abbr.'_clean_price_field',
												'css' => 'width:100px;',
												'std' => '',
												'vis' => '',
												'req' => '',
												'min' => '',
												'type' => 'select',
												'options' => array( 'yes' => __( 'Yes', APP_TD ),
																						'no'  => __( 'No', APP_TD ) )),

								array(  'name' => __( 'Display Zero for Empty Prices', APP_TD ),
												'desc' => '',
												'tip' => __( 'This will force any ad without a price to display a currency of zero for the price.', APP_TD ),
												'id' => $app_abbr.'_force_zeroprice',
												'css' => 'width:100px;',
												'std' => '',
												'vis' => '',
												'req' => '',
												'min' => '',
												'type' => 'select',
												'options' => array( 'no'  => __( 'No', APP_TD ),
																						'yes' => __( 'Yes', APP_TD ) )),

								array(  'name' => __( 'Price Thousands Separator', APP_TD ),
												'desc' => '',
												'tip' => __( 'This is the thousands separator for prices displayed on your site. You can change this value to your local currency formatting. Default is comma.', APP_TD ),
												'id' => $app_abbr.'_thousands_separator',
												'css' => 'width:50px;',
												'vis' => '',
												'type' => 'text',
												'req' => '',
												'min' => '',
												'std' => ''),

								array(  'name' => __( 'Price Decimal Separator', APP_TD ),
												'desc' => '',
												'tip' => __( 'This is the decimal separator for prices displayed on your site. You can change this value to your local currency formatting. Default is dot.', APP_TD ),
												'id' => $app_abbr.'_decimal_separator',
												'css' => 'width:50px;',
												'vis' => '',
												'type' => 'text',
												'req' => '',
												'min' => '',
												'std' => ''),

								array(  'name' => __( 'Hide Decimals for Prices', APP_TD ),
												'desc' => '',
												'tip' => __( 'This will hide decimals for prices displayed on your site. Enable this option if your currency does not use decimals (i.e. Yen).', APP_TD ),
												'id' => $app_abbr.'_hide_decimals',
												'css' => 'width:100px;',
												'std' => '',
												'vis' => '',
												'req' => '',
												'min' => '',
												'type' => 'select',
												'options' => array( 'no'  => __( 'No', APP_TD ),
																						'yes' => __( 'Yes', APP_TD ) )),

               array(  'name' => __( 'Currency Symbol', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Enter the currency symbol you want to appear next to prices on your classified ads (i.e. $, &euro;, &pound;, &yen;)', APP_TD ),
                        'id' => $app_abbr.'_curr_symbol',
                        'css' => 'width:50px;',
                        'vis' => '',
                        'type' => 'text',
                        'req' => '',
                        'min' => '',
                        'std' => ''),

               array(  'name' => __( 'Symbol Position', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Some currencies place the symbol on the right side vs the left. Select how you would like your currency symbol to be displayed.', APP_TD ),
                        'id' => $app_abbr.'_curr_symbol_pos',
                        'css' => 'min-width:200px;',
                        'vis' => '',
                        'js' => '',
                        'std' => '',
                        'req' => '',
                        'type' => 'select',
                        'options' => array(  'left'         => __( 'Left of Currency (₦100)', APP_TD ),
                                             'left_space'   => __( 'Left of Currency with Space (₦ 100)', APP_TD ),
                                             'right'        => __( 'Right of Currency (100₦)', APP_TD ),
                                             'right_space'  => __( 'Right of Currency with Space (100 ₦)', APP_TD ) )),

                array(  'name' => __( 'Collect Payments in', APP_TD ),
                        'desc' => sprintf( __( "Only Naira currecy supported in Voguepay.", APP_TD ), 'https://www.paypal.com/cgi-bin/webscr?cmd=p/sell/mc/mc_intro-outside' ),
                        'tip' => __( 'This is the currency you want to collect payments in. It applies mainly to PayPal payments since other payment gateways accept more currencies. If your currency is not listed then PayPal currently does not support it.', APP_TD ),
                        'id' => $app_abbr.'_curr_pay_type',
                        'css' => 'min-width:200px;',
                        'vis' => '',
                        'js' => 'onchange="set_'.$app_abbr.'_curr_pay_type_symbol(this.value)"',
                        'std' => '',
                        'req' => '',
                        'type' => 'select',
                        'options' => array( 'NGN' => __( 'Naira (&#8358;)', APP_TD ),
                                            'USD' => __( 'US Dollars (&#36;)', APP_TD ),
                                            'EUR' => __( 'Euros (&euro;)', APP_TD ),
                                            'GBP' => __( 'Pounds Sterling (&pound;)', APP_TD ),
                                            'AUD' => __( 'Australian Dollars (&#36;)', APP_TD ),
                                            'BRL' => __( 'Brazilian Real (&#36;)', APP_TD ),
                                            'CAD' => __( 'Canadian Dollars (&#36;)', APP_TD ),
                                            'CZK' => __( 'Czech Koruna (K&#269;)', APP_TD ),
                                            'DKK' => __( 'Danish Krone (kr)', APP_TD ),
                                            'HKD' => __( 'Hong Kong Dollar (&#36;)', APP_TD ),
                                            'HUF' => __( 'Hungarian Forint (Ft)', APP_TD ),
                                            'ILS' => __( 'Israeli Shekel (&#8362;)', APP_TD ),
                                            'JPY' => __( 'Japanese Yen (&yen;)', APP_TD ),
                                            'MYR' => __( 'Malaysian Ringgits (RM)', APP_TD ),
                                            'MXN' => __( 'Mexican Peso (&#36;)', APP_TD ),
                                            'NZD' => __( 'New Zealand Dollar (&#36;)', APP_TD ),
                                            'NOK' => __( 'Norwegian Krone (kr)', APP_TD ),
                                            'PHP' => __( 'Philippine Pesos (P)', APP_TD ),
                                            'PLN' => __( 'Polish Zloty (z&#322;)', APP_TD ),
                                            'SGD' => __( 'Singapore Dollar (&#36;)', APP_TD ),
                                            'SEK' => __( 'Swedish Krona (kr)', APP_TD ),
                                            'CHF' => __( 'Swiss Franc (Fr)', APP_TD ),
                                            'TWD' => __( 'Taiwan New Dollar (&#36;)', APP_TD ),
                                            'THB' => __( 'Thai Baht (&#3647;)', APP_TD ),
                                            'YTL' => __( 'Turkish Lira (&#8356;)', APP_TD ),
                                        )),

               array(  'name' => __( 'Collect Payments Currency Symbol', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Change this value to customize the currency symbol as you want it to appear when refering to customer payment gateway payments.', APP_TD ),
                        'id' => $app_abbr.'_curr_pay_type_symbol',
                        'css' => 'width:50px;',
                        'vis' => '',
                        'type' => 'text',
                        'req' => '',
                        'min' => '',
                        'std' => ''),

    array( 'type' => 'tabend', 'id' => '0' ),

    array( 'type' => 'tab', 'tabname' => __( 'Pricing Model', APP_TD ), 'id' => '1' ),


        array(	'name' => __( 'Pricing Options', APP_TD ),
                'type' => 'title',
                'id' => ''),

                array(  'name' => __( 'Price Model', APP_TD ),
                        'desc' => sprintf( __( "If you select the 'Fixed Price Per Ad' option, you must have at least one active <a href='%s'>ad pack</a> setup.", APP_TD ), 'admin.php?page=packages' ),
                        'tip' => __( 'This option defines the pricing model for selling ads on your site. If you want to provide free and paid ads then select the &quot;Price Per Category&quot; option.', APP_TD ),
                        'id' => $app_abbr.'_price_scheme',
                        'css' => 'min-width:150px;',
                        'vis' => '',
                        'js' => '',
                        'std' => '',
                        'req' => '',
                        'js' => '',
                        'type' => 'select',
                        'options' => array(  'single'       => __( 'Fixed Price Per Ad', APP_TD ),
                                             'category'     => __( 'Price Per Category', APP_TD ),
                                             'percentage'   => __( '% of Sellers Ad Price', APP_TD ),
											 'featured'     => __( 'Only Charge for Featured Ads', APP_TD ) )),

                array(  'name' => __( '% of Sellers Ad Price', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'If you selected the &quot;% of Sellers Ad Price&quot; price model, enter your percentage here. Numbers only. No percentage symbol or commas', APP_TD ),
                        'id' => $app_abbr.'_percent_per_ad',
                        'css' => 'width:50px;',
                        'type' => 'text',
                        'req' => '',
                        'min' => '',
                        'std' => '',
                        'vis' => '',
                        'visid' => 'percentage'),

                array(  'name' => __( 'Price Per Category', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'If you selected the &quot;Price Per Category&quot; price model, enter a price for each category here. To make a specific category free, just enter a zero (0). Do not enter currency symbols or commas. You can use decimal points (i.e. 10.50, 5.95)', APP_TD ),
                        'id' => $app_abbr.'_price_per_cat', // needed for js show/hide to work
                        'css' => '',
                        'type' => 'price_per_cat',
                        'req' => '',
                        'min' => '',
                        'std' => '',
                        'vis' => '',
                        'visid' => 'category'),

    array( 'type' => 'tabend', 'id' => '1' ),

		array( 'type' => 'tab', 'tabname' => __( 'Membership', APP_TD ), 'id' => '2' ),


					array(	'name' => __( 'Membership Options', APP_TD ),
									'type' => 'title',
									'id' => ''),

								array(  'name' => __( 'Enable Membership Packs', APP_TD ),
												'desc' => sprintf( __( 'Manage your membership packages from the <a href="%1$s">Ad Packs</a> option page.', APP_TD ), 'admin.php?page=packages' ),
												'tip' => __( 'This option activates Membership Packs and their respective discounts. Disabling this does not disable the membership system, but simply stops the discounts from activating during the posting process.', APP_TD ),
												'id' => $app_abbr.'_enable_membership_packs',
												'css' => 'width:100px;',
												'vis' => '',
												'std' => '',
												'req' => '',
												'js' => '',
												'type' => 'select',
												'options' => array( 'yes' => __( 'Yes', APP_TD ),
																						'no'  => __( 'No', APP_TD ) )),

								array(  'name' => __( 'Days of Reminder Messages', APP_TD ),
												'desc' => __( 'Affects both emails and website notifications.', APP_TD ),
												'tip' => __( 'Number of days you would like to send renewal reminders before their subscription expires. Numeric values only.', APP_TD ),
												'id' => $app_abbr.'_membership_ending_reminder_days',
												'css' => 'width:100px;',
												'req' => '',
												'min' => '',
												'vis' => '',
												'std' => '7',
												'js' => '',
												'type' => 'text'),

								array(  'name' => __( 'Are Membership Packs Required to Purchase Ads?', APP_TD ),
												'desc' => '',
												'tip' => __( 'Choose how you would like the membership system to work. <br /><strong>Not Required</strong> - a membership is not required in order to list an ad. <br /><strong>Required for All</strong> - a user can only list an ad if they have an active membership. <br /><strong>Required by Category</strong> - limits users with memberships to list ads in certain categories (must be set below).', APP_TD ),
												'id' => $app_abbr.'_required_membership_type',
												'css' => '',
												'req' => '',
												'min' => '',
												'vis' => '',
												'std' => '',
												'js' => '',
												'type' => 'select',
												'options' => array( '' => __( 'Not Required', APP_TD ),
																						'all' => __( 'Required for All', APP_TD ),
																						'category'  => __( 'Required by Category', APP_TD ) )),


								array(  'name' => __( 'Membership by Category', APP_TD ),
												'desc' => '',
												'tip' => __( 'If you selected &quot;Required by Category&quot; above, then you need to check categories here. Any categories checked will only allow ad listings from users with an active membership.', APP_TD ),
												'id' => $app_abbr.'_required_per_cat',  // needed for js show/hide to work
												'css' => '',
												'type' => 'required_per_cat',
												'req' => '',
												'min' => '',
												'std' => '',
												'vis' => '',
												'visid' => 'category'),

		array( 'type' => 'tabend', 'id' => '2' ),

);


$options_new_form = array (

    array( 'type' => 'notab'),

	array(	'name' => __( 'New Form', APP_TD ),
                'type' => 'title'),

		array(  'name' => __( 'Form Name', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Create a form name that best describes what category or categories this form will be used for. (i.e. Auto Form, Clothes Form, General Form, etc). It will not be visible on your site.', APP_TD ),
                        'id' => 'form_label',
                        'css' => 'min-width:400px;',
                        'type' => 'text',
                        'vis' => '',
                        'req' => '1',
                        'min' => '5',
                        'std' => ''),

                array(  'name' => __( 'Form Description', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Enter a description of your new form layout. It will not be visible on your site.', APP_TD ),
                        'id' => 'form_desc',
                        'css' => 'width:400px;height:100px;',
                        'type' => 'textarea',
                        'vis' => '',
                        'req' => '1',
                        'min' => '5',
                        'std' => ''),

                array(  'name' => __( 'Available Categories', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Select the categories you want this form to be displayed for. Categories not listed are being used on a different form layout. You can only have one category assigned to each form layout. Any unselected categories will use the default ad form.', APP_TD ),
                        'id' => 'post_category[]',
                        'css' => '',
                        'type' => 'cat_checklist',
                        'vis' => '',
                        'req' => '1',
                        'std' => ''),

                array(  'name' => __( 'Status', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'If you do not want this new form live on your site yet, select inactive.', APP_TD ),
                        'id' => 'form_status',
                        'css' => 'min-width:100px;',
                        'std' => '',
                        'js' => '',
                        'vis' => '',
                        'req' => '1',
                        'type' => 'select',
                        'options' => array( 'active'   => __( 'Active', APP_TD ),
                                            'inactive' => __( 'Inactive', APP_TD ) )),

    array( 'type' => 'notabend'),

);


$options_new_field = array (

    array( 'type' => 'notab'),

	array(	'name' => __( 'Field Information', APP_TD ),
                'type' => 'title'),

		array(  'name' => __( 'Field Name', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Create a field name that best describes what this field will be used for. (i.e. Color, Size, etc). It will be visible on your site.', APP_TD ),
                        'id' => 'field_label',
                        'css' => 'min-width:400px;',
                        'type' => 'text',
                        'req' => '1',
                        'vis' => '',
                        'min' => '2',
                        'std' => ''),

                array(  'name' => __( 'Meta Name', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'This field is used by WordPress so you cannot modify it. Doing so could cause problems displaying the field on your ads.', APP_TD ),
                        'id' => 'field_name',
                        'css' => 'min-width:400px;',
                        'type' => 'text',
                        'req' => '1',
                        'vis' => '',
                        'min' => '5',
                        'std' => '',
                        'dis' => '1'),

                array(  'name' => __( 'Field Description', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Enter a description of your new form layout. It will not be visible on your site.', APP_TD ),
                        'id' => 'field_desc',
                        'css' => 'width:400px;height:100px;',
                        'type' => 'textarea',
                        'req' => '1',
                        'vis' => '',
                        'min' => '5',
                        'std' => ''),
				
                array(  'name' => __( 'Field Tooltip', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'This will create a ? tooltip icon next to this field on the submit ad page.', APP_TD ),
                        'id' => 'field_tooltip',
                        'css' => 'width:400px;height:100px;',
                        'type' => 'textarea',
                        'req' => '0',
                        'vis' => '',
                        'min' => '5',
                        'std' => ''),
				
               array(   'name' => __( 'Field Type', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'This is the type of field you want to create.', APP_TD ),
                        'id' => 'field_type',
                        'css' => 'min-width:100px;',
                        'std' => '',
                        'js' => 'onchange="show(this)"',
                        'req' => '1',
                        'vis' => '',
                        'min' => '',
                        'type' => 'select',
                        'options' => array( 'text box'  => __( 'text box', APP_TD ),
                                            'drop-down' => __( 'drop-down', APP_TD ),
                                            'text area' => __( 'text area', APP_TD ),
                                            'radio'     => __( 'radio buttons', APP_TD ),
                                            'checkbox'  => __( 'checkboxes', APP_TD ),
                                          ),
                   ),
				   
				   array(  'name' => __( 'Minimum Length', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Defines the minimum number of characters required for this field. Enter a number like 2 or leave it empty to make the field optional.', APP_TD ),
                        'id' => 'field_min_length',
                        'css' => 'min-width:400px;',
                        'type' => 'text',
                        'req' => '0',
                        'vis' => '0',
                        'min' => '',
                        'std' => ''),

                array(  'name' => __( 'Field Values', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Enter a comma separated list of values you want to appear in this drop-down box. (i.e. XXL,XL,L,M,S,XS). Do not separate values with the return key.', APP_TD ),
                        'id' => 'field_values',
                        'css' => 'width:400px;height:200px;',
                        'type' => 'textarea',
                        'req' => '',
                        'min' => '1',
                        'std' => '',
                        'vis' => '0',
                    ),

//               array(  'name' => __( 'Add to Search Widget', APP_TD ),
//                        'desc' => '',
//                        'tip' => __( 'Checking this will include this field on the search box on your website. It is perfect for things like regional search. (Note: It should only be used for text or drop-down fields.)', APP_TD ),
//                        'id' => 'field_search',
//                        'css' => '',
//                        'type' => 'checkbox',
//                        'req' => '1',
//                        'min' => '5',
//                        'std' => '',
//                   ),

    array( 'type' => 'notabend'),

);

$options_new_ad_pack = array (


    array( 'type' => 'notab'),

	array(	'name' => __( 'Ad Pack Details', APP_TD ),
                'type' => 'title',
                'desc' => '',
             ),

		array(  'name' => __( 'Name', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Create a name that best describes this ad package. (i.e. 30 days for only $5) This will be visible on your new ad listing submission page.', APP_TD ),
                        'id' => 'pack_name',
                        'css' => 'min-width:400px;',
                        'type' => 'text',
                        'vis' => '',
                        'req' => '1',
                        'min' => '5',
                        'std' => ''),

               array(  'name' => __( 'Description', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Enter a description of your new ad package. It will not be visible on your site.', APP_TD ),
                        'id' => 'pack_desc',
                        'css' => 'width:400px;height:100px;',
                        'type' => 'textarea',
                        'req' => '1',
                        'min' => '5',
                        'std' => ''),

                array(  'name' => __( 'Price Per Listing', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Enter a numeric value for this package (do not enter a currency symbol or commas). For ad packs, this will be the price to post an ad.', APP_TD ),
                        'id' => 'pack_price',
                        'css' => 'width:75px;',
                        'type' => 'text',
                        'vis' => '',
                        'req' => '1',
                        'min' => '1',
                        'std' => ''),

                array(  'name' => __( 'Ad Duration', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Enter a numeric value to specify the number of days for this ad package (i.e. 30, 60, 90, 120).', APP_TD ),
                        'id' => 'pack_duration',
                        'css' => 'width:75px;',
                        'type' => 'text',
                        'vis' => '',
                        'req' => '1',
                        'min' => '1',
                        'std' => ''),

                array(  'name' => __( 'Package Status', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'If you do not want this ad package live on your site, select inactive.', APP_TD ),
                        'id' => 'pack_status',
                        'css' => 'min-width:100px;',
                        'std' => '',
                        'js' => '',
                        'req' => '1',
                        'type' => 'select',
                        'options' => array( 'active'   => __( 'Active', APP_TD ),
											'inactive' => __( 'Inactive', APP_TD ) )),

     array( 'type' => 'notabend'),


);


$options_new_membership_pack = array (


    array( 'type' => 'notab'),

	array(	'name' => __( 'Membership Pack Details', APP_TD ),
                'type' => 'title',
                'desc' => '',
             ),

		array(  'name' => __( 'Name', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Create a name that best describes this membership package. (i.e. 30 days unlimited posting for only $25) This will be visible on your ad listing submission page.', APP_TD ),
                        'id' => 'pack_name',
                        'css' => 'min-width:400px;',
                        'type' => 'text',
                        'vis' => '',
                        'req' => '1',
                        'min' => '5',
                        'std' => ''),

               array(  'name' => __( 'Description', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Enter a description of your new membership package. It will not be visible on your site.', APP_TD ),
                        'id' => 'pack_desc',
                        'css' => 'width:400px;height:100px;',
                        'type' => 'textarea',
                        'req' => '1',
                        'min' => '5',
                        'std' => ''),
                        
                array(  'name' => __( 'Package Type', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Select which package type to change how the pack affects the price of the ad during the posting process.', APP_TD ),
                        'id' => 'pack_type',
                        'css' => 'min-width:100px;',
                        'std' => '',
                        'js' => '',
                        'req' => '1',
                        'type' => 'select',
                        'options' => array( 'static'     => __( 'Static Price', APP_TD ),
											'discount'   => __( 'Discounted Price', APP_TD ),
											'percentage' => __( '% Discounted Price', APP_TD ), )),     
											
                array(  'name' => __( 'Membership Price', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'The price this membership will cost your customer to purchase. Enter a numeric value (do not enter a currency symbol or commas).', APP_TD ),
                        'id' => 'pack_membership_price',
                        'css' => 'width:75px;',
                        'type' => 'text',
                        'vis' => '',
                        'req' => '1',
                        'min' => '1',
                        'std' => '1.00'),
        
                array(  'name' => __( 'Membership Duration', APP_TD ),
                        'desc' => __( 'Enter a numeric value for the number of days', APP_TD ),
                        'tip' => __( 'The length of time in days this membership lasts. Enter a numeric value (i.e. 30, 60, 90, 120).', APP_TD ),
                        'id' => 'pack_duration',
                        'css' => 'width:75px;',
                        'type' => 'text',
                        'vis' => '',
                        'req' => '1',
                        'min' => '1',
                        'std' => ''),

                array(  'name' => __( 'Price Modifier <br /> (How a membership <br /> affects the price of an ad)', APP_TD ),
                        'desc' => __( 'Enter #.## for currency (i.e. 2.25 for $2.25), ### for percentage (i.e. 50 for 50%).', APP_TD ),
                        'tip' => __( 'Enter a numeric value (do not enter a currency symbol or commas). This will modify the checkout price based on the selected package type.', APP_TD ),
                        'id' => 'pack_price',
                        'css' => 'width:75px;',
                        'type' => 'text',
                        'vis' => '',
                        'req' => '1',
                        'min' => '1',
                        'std' => ''),

				
                array(  'name' => __( 'Satisfies Membership Requirement', APP_TD ),
                        'desc' => sprintf( __( "If the &quot;<a href='%s'>Are Membership Packs Required to Purchase Ads</a>&quot; option under the Membership tab is set to yes, you should select yes.", APP_TD ), 'admin.php?page=pricing' ),
                        'tip' => __( 'Selecting no means that this membership does not allow the customer to post to categories requiring membership. You would select no if you wanted to separate memberships that are required to post versus memberships that simply affect the final price.', APP_TD ),
                        'id' => 'pack_satisfies_required',
                        'css' => 'min-width:100px;',
                        'std' => '',
                        'js' => '',
                        'req' => '',
                        'type' => 'select',
                        'options' => array( 'required_'   => __( 'Yes', APP_TD ),
											         ''   => __( 'No', APP_TD ), )),


                array(  'name' => __( 'Package Status', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Allows you to temporarily turn off this package instead of deleting it. Please note that existing active memberships will still be able to list ads at their discounted price unless memberships are turned off globally from the Pricing => Membership tab.', APP_TD ),
                        'id' => 'pack_status',
                        'css' => 'min-width:100px;',
                        'std' => '',
                        'js' => '',
                        'req' => '1',
                        'type' => 'select',
                        'options' => array( 'active_membership'   => __( 'Active', APP_TD ),
                                            'inactive_membership' => __( 'Inactive', APP_TD ), )),

     array( 'type' => 'notabend'),


);



$options_new_coupon = array (


	array( 'type' => 'notab' ),

	array(	'name' => __( 'Coupon Details', APP_TD ),
                'type' => 'title',
                'desc' => ''
             ),

		array(  'name' => __( 'Code', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Create a coupon code that you wish to use. This will be the actual coupon that you pass out to your customers.', APP_TD ),
                        'id' => 'coupon_code',
                        'css' => 'min-width:400px;',
                        'type' => 'text',
                        'vis' => '',
                        'req' => '1',
                        'min' => '3',
                        'std' => ''),

               array(  'name' => __( 'Description', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Enter a description of your new coupon. It will not be visible on your site.', APP_TD ),
                        'id' => 'coupon_desc',
                        'css' => 'width:400px;height:100px;',
                        'type' => 'textarea',
                        'req' => '1',
                        'min' => '5',
                        'std' => ''),

                array(  'name' => __( 'Discount', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Enter a numeric value for this coupon (do not enter a currency symbol or commas).', APP_TD ),
                        'id' => 'coupon_discount',
                        'css' => 'width:75px;',
                        'type' => 'text',
                        'vis' => '',
                        'req' => '1',
                        'min' => '1',
                        'std' => ''),

                array(  'name' => __( 'Type of Discount', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Either a fixed price or percentage discount.', APP_TD ),
                        'id' => 'coupon_discount_type',
                        'css' => 'min-width:100px;',
                        'std' => '',
                        'js' => '',
                        'req' => '1',
                        'type' => 'select',
                        'options' => array( '%'   => '%',
                                            get_option($app_abbr.'_curr_pay_type_symbol') => get_option($app_abbr.'_curr_pay_type_symbol'))),
											
                array(  'name' => __( 'Max Usage', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Enter a numeric value for the times you wish this coupon to be usable. Enter 0 for unlimited usage.', APP_TD ),
                        'id' => 'coupon_max_use_count',
                        'css' => 'width:75px;',
                        'type' => 'text',
                        'vis' => '',
                        'req' => '1',
                        'min' => '1',
                        'std' => ''),	

                array(  'name' => __( 'Start Date', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Enter the start date for this coupon to begin working.', APP_TD ),
                        'id' => 'coupon_start_date',
                        'css' => 'width:150px;',
                        'type' => 'text',
                        'vis' => '',
                        'req' => '1',
                        'min' => '1',
                        'std' => '',
                        'altclass' => 'datepicker'),

                array(  'name' => __( 'Expire Date', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'Enter the expiration date for this coupon to stop working.', APP_TD ),
                        'id' => 'coupon_expire_date',
                        'css' => 'width:150px;',
                        'type' => 'text',
                        'vis' => '',
                        'req' => '1',
                        'min' => '1',
                        'std' => '',
                        'altclass' => 'datepicker'),

                array(  'name' => __( 'Coupon Status', APP_TD ),
                        'desc' => '',
                        'tip' => __( 'If you do not want this coupon available for use, select inactive.', APP_TD ),
                        'id' => 'coupon_status',
                        'css' => 'min-width:100px;',
                        'std' => '',
                        'js' => '',
                        'req' => '1',
                        'type' => 'select',
                        'options' => array( 'active'   => __( 'Active', APP_TD ),
                                            'inactive' => __( 'Inactive', APP_TD ) )),

    array( 'type' => 'notabend'),

);


// pull in the payment gateway options
// this is included separately so it's easy to drop in new payment
// plugins and add-ons without having to touch the core code
if ( file_exists(TEMPLATEPATH . '/includes/gateways/admin-gateway-values.php') )
    include_once (TEMPLATEPATH . '/includes/gateways/admin-gateway-values.php');

?>