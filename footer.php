<div class="footer"> <script type="text/javascript">	var $ = jQuery.noConflict();</script>		
<script type="text/javascript">
jQuery(document).ready(function(e){jQuery('.btn-topsearch').show();    size_li = jQuery("ul.from-blog li").size();    x=3;    jQuery('ul.from-blog li:lt('+x+')').show();    jQuery('#loadMore').click(function () {        x= (x+5 <= size_li) ? x+5 : size_li;        jQuery('ul.from-blog li:lt('+x+')').show();    });    jQuery('#showLess').click(function () {
        x=(x-5<0) ? 3 : x-5;
        jQuery('ul.from-blog li').not(':lt('+x+')').hide();
    });
});
</script>
  <div class="footer_menu">
    <div class="footer_menu_res">
      <?php wp_nav_menu( array( 'theme_location' => 'secondary', 'container' => false, 'menu_id' => 'footer-nav-menu', 'depth' => 1, 'fallback_cb' => false ) ); ?>
      <?php echo do_shortcode('[wp_social_icons]') ?>   
	  <div class="clr"></div>
    </div>
    <!-- /footer_menu_res --> 
    
  </div>
  <!-- /footer_menu -->
  
  <div class="footer_main">
    <div class="footer_main_res">
      <div class="dotted">
        <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar_footer') ) : else : ?>
        <!-- no dynamic sidebar so don't do anything -->
        <?php endif; ?>
        <div class="clr"></div>
      </div>
      <!-- /dotted -->
      
      <div style="width: 100%">
        <div class="footer-left">
          <h3 style="color: #fff;">&copy; <?php echo date_i18n('Y'); ?> <?php echo "Greenaira.com"?>
            <?php //bloginfo('name'); ?>
            .
            <?php _e( 'All Rights Reserved.', APP_TD ); ?>
          </h3>
          <br/>
          <h3 style="color: #fff;">Trading under 3i System Ventures.</h3>
          <br>
          <h3 style="color: #fff;">Reg No : BN2315812</h3>
          <?php if ( get_option('cp_twitter_username') ) : ?>
          <a href="http://twitter.com/<?php echo get_option('cp_twitter_username'); ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/images/twitter_bot.gif" width="42" height="50" alt="Twitter" class="twit" /></a>
          <?php endif; ?>
        </div>
        <div class="footer-right">
          <div class="right">
            <p> <img src="http://greenaira.com/wp-content/themes/greenaira/vogue.png"> <a target="_blank" href="#" title="Greenaira Ads Software">
              <?php //_e( 'Ads Website', APP_TD ); ?>
              </a></p>
          </div>
        </div>
      </div>
      <div class="clr"></div>
      
      <!-- ClickDesk Live Chat Service for websites --> 
      
      <!-- ClickDesk Live Chat Service for websites --> 
      
      <script type='text/javascript'>



//var _glc =_glc || []; _glc.push('all_ag9zfmNsaWNrZGVza2NoYXRyDwsSBXVzZXJzGIz1pMQMDA');



//var glcpath = (('https:' == document.location.protocol) ? 'https://my.clickdesk.com/clickdesk-ui/browser/' : 



//'http://my.clickdesk.com/clickdesk-ui/browser/');



//var glcp = (('https:' == document.location.protocol) ? 'https://' : 'http://');



//var glcspt = document.createElement('script'); glcspt.type = 'text/javascript'; 



//glcspt.async = true; glcspt.src = glcpath + 'livechat-new.js';



//var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(glcspt, s);



//var __lc = {};



//__lc.license = 6548751;



//(function() {



//  var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;



//  lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';



//  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);



//})();



</script> 
      
      <!-- End of ClickDesk --> 
      
      <!-- Start Alexa Certify Javascript --> 
      
      <script type="text/javascript">



jQuery(document).ready(function(e) {

    

	jQuery('.moxie-shim').css('height','135px');

	

});



	// Make ColorBox responsive

	jQuery.colorbox.settings.maxWidth  = '95%';

	jQuery.colorbox.settings.maxHeight = '95%';



	// ColorBox resize function

	var resizeTimer;

	function resizeColorBox()

	{

		if (resizeTimer) clearTimeout(resizeTimer);

		resizeTimer = setTimeout(function() {

				if (jQuery('#cboxOverlay').is(':visible')) {

						jQuery.colorbox.load(true);

				}

		}, 300);

	}



	// Resize ColorBox when resizing window or changing mobile device orientation

	jQuery(window).resize(resizeColorBox);

	window.addEventListener("orientationchange", resizeColorBox, false);





//_atrk_opts = { atrk_acct:"auBUl1a8FRh2Y8", domain:"greenaira.com",dynamic: true};



//(function() { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); })();



</script>
      <noscript>
      <img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=auBUl1a8FRh2Y8" style="display:none" height="1" width="1" alt="" />
      </noscript>
      
      <!--Start of Zopim Live Chat Script--> 
      
      <!--Start of Zopim Live Chat Script--> 
      
      <script type="text/javascript">

window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=

d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.

_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");

$.src="//v2.zopim.com/?37cBQB2XfCY4iMQAEfxxwkxs03tedSRY";z.t=+new Date;$.

type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");

</script> 
 
      <!--End of Zopim Live Chat Script--> 

 
      
      <!--End of Zopim Live Chat Script--> 
      
      <!-- End Alexa Certify Javascript --> 
      
      <!-- End of ClickDesk --> 
      
    </div>
    <!-- /footer_main_res --> 
    
  </div>
  <!-- /footer_main --> 
  
</div>
<!-- /footer -->
<?php /* ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/ticker.js"></script>
<script>
jQuery(function(){
	jQuery( "#livePrice" ).load( "<?php echo get_template_directory_uri(); ?>/ticker.html", function() {
	jQuery('#ticker .quote a').each(function(){
		//var x=this.href;
		this.href='javascript:;';
	});
});
  //alert( "Load was performed." );
});
</script>
<?php */ ?>
<script>
jQuery(function(){
	jQuery( "#livePrice" ).load( "<?php echo get_template_directory_uri(); ?>/ticker.html", function() {
	  //alert( "Load was performed." );
	});  
});

</script>

<?php
 show_image_pop_up(array(
	array(
		"title"=>"read-all-predictions-for-2016-by-nigerian-pastors-and-prophets",
		"image"=>"http://greenaira.com/wp-content/uploads/2016/07/nigeria-advertise-items.jpg",
		"max_width"=>"550px",
		"min_width"=>"150px",
		"height"=>"auto"
 
	)
 ));
?>
<?php
 show_image_pop_up(array(
	array(
		"title"=>"list-of-importer-and-exporters-in-nigeria",
		"image"=>"http://greenaira.com/wp-content/uploads/2016/07/nigeria-advertise-items.jpg",
		"max_width"=>"550px",
		"min_width"=>"150px",
		"height"=>"auto"
 
	)
 ));
?>



