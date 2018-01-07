<?php

//code to redirect ad-category to category////
$actual_link_true = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 
if (strpos($actual_link_true, 'ad-category') !== false) {
 
	$new_actual_link_true = str_replace('ad-category','category',$actual_link_true);
	 
 	wp_redirect($new_actual_link_true);
}
if(!session_id()) {

	session_start();

}

?><style>







    .wp_social_share_cat_wrapper {







    background: #f4f4f4 none repeat scroll 0 0;







    border: 1px solid #ebebeb;







    display: none !important;







    float: right;







    margin-top: 0;







    padding: 5px 3px;







    text-align: center;







    width: 55px;







}







.fp_multi.selectBox-selected > a {



    background: green none repeat scroll 0 0;



    color: #fff !important;



    font-weight: bold;



}



/*.counter {



	



	 border-radius: 50%;



    width: 30px;



    height: 30px;



    padding: 5px;



	color:#FFF !important;







    background:#5bbc2e;;



    border: 2px solid #666;



    color: #666;



    text-align: center;







    font-size: 13px;



	}*/



/*	.mid-but { font-size:12px !important;



	width:32% !important



	}



	.last-link {



   



    font-size: 15px;



}



@media (max-width:575px){



		.last-link {



			font-size:11px;



		}



	}



@media (max-width:520px){



		.header_top {



			height:60px;



		}



	}*/



.



</style>

<script src="<?php echo get_template_directory_uri(); ?>/js/dropzone.js"></script>

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">

<link href="<?php echo get_template_directory_uri(); ?>/styles/dropzone.css" rel="stylesheet">
<!--<link href="<?php //echo get_template_directory_uri(); ?>/styles/ticker.css" rel="stylesheet">-->

<script>

var filepath="";

var attachment_id=0;

Dropzone.options.myAwesomeDropzone = {

  paramName: "files", // The name that will be used to transfer the file

  maxFilesize: 1, // MB

  init: function() {

    this.on("success", function(file, responseText) {

		// Handle the responseText here. For example, add the text to the preview element:

		filepath=responseText;

		sendUrl(responseText);

    });

	this.on("removedfile", function(file) { 

	

	});

  },

  addRemoveLinks: "dictRemoveFile",

  maxFiles:3,

  accept: function(file, done) {

	done();

  }

};



jQuery("document").ready(function(){

	uploadTo();
	
});



function sendUrl(imgurl){

	var url_dest="<?php echo get_template_directory_uri(); ?>/upload.php";

	jQuery.ajax({

	data:{imgurl: imgurl},

	type: 'post',

	dataType: 'text',

	url: url_dest,

	error: function(){

		},

	success: function(results){

			//alert(results);

			attachment_id=results;

			jQuery("span.imgids").append('<input type="hidden" name="attachment_ids[]" id="attachment_id_'+results+'" value="'+results+'">');

			jQuery("a.dz-remove:last").attr("onclick", "removeImages(this);");

			jQuery("a.dz-remove:last").attr("id", results);

			attachmentMeta(attachment_id, filepath);

		}

	});

}



function attachmentMeta(attachment_id, filepath){

	var url_dest="<?php echo get_template_directory_uri(); ?>/upload-set-new-metadata.php";

	jQuery.ajax({

	data:{set_post_thumbnail: "", attachment_id: attachment_id, filepath: filepath},

	type: 'post',

	dataType: 'text',

	url: url_dest,

	error: function(){

		},

	success: function(results){

			//alert(results);

		}

	});

}



function saveAttachmentMeta(){

	var url_dest="<?php echo get_template_directory_uri(); ?>/upload-save-metadata.php";

	jQuery.ajax({

	data:{save_metadata: ""},

	type: 'post',

	dataType: 'text',

	url: url_dest,

	error: function(){

		},

	success: function(results){

			//alert(results);

		}

	});

}



function removeImages(element){

	var imgInputId=jQuery(element).attr("id");

	jQuery("#attachment_id_"+imgInputId).remove();

}



function uploadTo(){

	var url_dest="<?php echo get_template_directory_uri(); ?>/upload-images.php";

<?php 

$wp_upload_dir = wp_upload_dir();
$_SESSION["target_path"]=$wp_upload_dir["path"];

/*

	[path] => /home1/jkcglos1/public_html/greenairafaq.com/wp-content/uploads/2016/02

    [url] => http://greenairafaqs.com/wp-content/uploads/2016/02

    [subdir] => /2016/02

    [basedir] => /home1/jkcglos1/public_html/greenairafaqs.com/wp-content/uploads

    [baseurl] => http://greenairafaqs.com/wp-content/uploads

    [error] => 

*/

?>

	var uploadtofolder='<?php echo $wp_upload_dir["path"]; ?>';

	jQuery.ajax({

	data:{uploadtofolder: uploadtofolder},

	type: 'post',

	dataType: 'text',

	url: url_dest,

	error: function(){

		},

	success: function(results){

		}

	});

}

</script>

<!--End of Zopim Live Chat Script-->



<?php





 ?>



<div class="header">







<div id="livePrice"></div>







		<div class="header_top">















				<div class="header_top_res">















                                              <div class="top-head">







            <div class="head-tel"><b>Call Us&nbsp;<span style="color:#FFF">08160381540&nbsp;</span></b>







<span><img src="http://greenaira.com/wp-content/themes/greenaira/images/flag_of_Nigeria1-1.png"  width="16" height="16" title="Nigeria Flag"></span>



<span><img src="http://greenaira.com/wp-content/themes/greenaira/images/world-icon1.png" width="16" height="16"  title="Global"></span>



</div>







                                               <a href="<?php echo get_the_permalink(85); ?>"> <div class="mid-but"><b>BOOST SALES in 1 week ask us. info@greenaira.com</b> </div> </a>







						<div class="last-link">







                                 		<?php echo cp_login_head(); ?>















								<!--<a href="<?php //echo appthemes_get_feed_url(); ?>" target="_blank"><img src="<?php //bloginfo('template_url'); ?>/images/icon_rss.gif" width="16" height="16" alt="rss" class="srvicon" /></a>-->















								<?php if ( get_option('cp_twitter_username') ) : ?>







										&nbsp;|&nbsp;<a href="http://twitter.com/<?php echo get_option('cp_twitter_username'); ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/icon_twitter.gif" width="16" height="16" alt="tw" class="srvicon" /></a>







								<?php endif; ?>







                                                </div>&nbsp;







						</div>















				</div><!-- /header_top_res -->















		</div><!-- /header_top -->























		<div class="header_main">















				<div class="header_main_bg">















						<div class="header_main_res">















								<div id="logo">















										<?php if ( get_option('cp_use_logo') != 'no' ) { ?>















												<?php if ( get_option('cp_logo') ) { ?>







														<a href="<?php echo home_url(); ?>"><img src="<?php echo get_option('cp_logo'); ?>" alt="<?php bloginfo('name'); ?>" class="header-logo" /></a>







												<?php } else { ?>







														<a href="<?php echo home_url(); ?>"><div class="cp_logo"></div></a>







												<?php } ?>















										<?php } else { ?>















												<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>







												<div class="description"><?php bloginfo('description'); ?></div>















										<?php } ?>















								</div><!-- /logo -->















								<div class="adblock">







									<?php appthemes_advertise_header(); ?>







								</div><!-- /adblock -->















								<div class="clr"></div>















						</div><!-- /header_main_res -->















				</div><!-- /header_main_bg -->















		</div><!-- /header_main -->























		<div class="header_menu">















				<div class="header_menu_res">















           <!--<a href="<?php echo CP_ADD_NEW_URL; ?>" class="obtn btn_orange" style="font-weight: bold;"><i class="fa fa-plus"></i><?php _e( '&nbsp;Submit an Ad', APP_TD ); ?></a>-->





				<div class="header_menu_res_btns">

		    <a href="<?php if(is_user_logged_in()){ echo get_permalink(6); }else{ echo "http://greenaira.com/login/"; } ?>" class="obtn btn_orange" style="font-weight: bold;"><i class="fa fa-plus"></i><?php _e( '&nbsp;Submit an Ad', APP_TD ); ?></a>



		    <a href="http://greenaira.com/ads/" class="obtn btn_orange just-mobile-link" style="font-weight: bold;"><i class="fa fa-link"></i> View Ads</a>





</div>







                <?php wp_nav_menu( array('theme_location' => 'primary', 'fallback_cb' => false, 'container' => false) ); ?>







                <?php //echo do_shortcode('[srMenu theme_location=primary]');?>







                <div class="clr"></div>















    







				</div><!-- /header_menu_res -->















		</div><!-- /header_menu -->







<!-- ClickDesk Live Chat Service for websites -->



<script type='text/javascript'>



var glc =_glc || []; glc.push('all_ag9zfmNsaWNrZGVza2NoYXRyDwsSBXVzZXJzGIz1pMQMDA');



var glcpath = (('https:' == document.location.protocol) ? 'https://my.clickdesk.com/clickdesk-ui/browser/' : 



'http://my.clickdesk.com/clickdesk-ui/browser/');



var glcp = (('https:' == document.location.protocol) ? 'https://' : 'http://');



var glcspt = document.createElement('script'); glcspt.type = 'text/javascript'; 



glcspt.async = true; glcspt.src = glcpath + 'livechat-new.js';



var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(glcspt, s);



</script>



<!-- End of ClickDesk -->







</div><!-- /header -->







<?php











$useragent=$_SERVER['HTTP_USER_AGENT'];







if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)) && is_home() ){ ?>



	<style type="text/css">



    



    .widget_cp_recent_posts,#text-3{   display:none   }



    



    </style>



	



	<?php }







 ?>