<?php global $current_user; ?>

<!-- right sidebar -->

<div class="content_right">
  <?php if (is_user_logged_in() ) { //only logged in user can see this ?>
  <h3 style="background: rgb(218, 218, 218) none repeat scroll 0% 0%; margin: auto; text-align: center; padding: 12px; border-radius: 7px; border: 2px solid; margin-bottom: 5px;"><a href="http://greenaira.com/my-posts/?task=new">Add Post</a></h3>
  <?php } ?>
  <div class="shadowblock_out widget_text" id="text-7e">
    <div class="shadowblock">
      <div class="textwidget">
        <div class="searchblock">
          <form action="" method="get" id="searchform" class="form_search">
            <div class="searchfield">
              <input style="width:52%" name="search" type="text" id="seach-blog" value="<?php echo  $_GET['search'] ?>"  tabindex="1" class=""  placeholder="What are you looking for?">
            </div>
             <button type="submit" class="obtn btn_orange" style="font-weight: bold;">&nbsp;Search</button>
          </form>
        </div>
      </div>
    </div>
    <!-- /shadowblock --></div>
  
  <!-- start tabs --> 
  
  <!--<div class="tabprice">



		<!--<ul class="tabnavig">

		  <li><a href="#priceblock1"><?php //_e( 'Popular', APP_TD ); ?></a></li>

		  <li><a href="#priceblock2"><?php //_e( 'Comments', APP_TD ); ?></a></li>

		  <!--<li><a href="#priceblock3"><?php //_e( 'Tags', APP_TD ); ?></a></li>

		</ul>--> 
  
  <!-- popular tab 1 --> 
  
  <!-- <div id="priceblock1">



			<div class="clr"></div>



			<?php //include_once(TEMPLATEPATH . '/includes/sidebar-popular.php'); ?>



		</div>--> 
  
  <!-- comments tab 2 --> 
  
  <!-- <div id="priceblock2">



			<div class="clr"></div>



			<?php //include_once(TEMPLATEPATH . '/includes/sidebar-comments.php'); ?>



		</div>--><!-- /priceblock2 --> 
  
  <!-- tag cloud tab 3 --> 
  
  <!-- <div id="priceblock3">



		  <div class="clr"></div>



		  <div class="pricetab">



			  <?php //if ( function_exists('wp_tag_cloud') ) : ?>



			  <div id="tagcloud">



				<?php //wp_tag_cloud('smallest=9&largest=16'); ?>



			  </div>



				<?php //endif; ?>



			  <div class="clr"></div>



		  </div>



		</div>



	</div>--><!-- end tabs -->
  
  <?php appthemes_before_sidebar_widgets(); ?>
  <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar_blog') ) : else : ?>
  
  <!-- no dynamic sidebar so don't do anything -->
  
  <?php endif; ?>
  <?php appthemes_after_sidebar_widgets(); ?>
</div>
<!-- /content_right --> 

