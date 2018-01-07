<?php
/*
Template Name: Blog Template
*/
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

<div class="content">

    <div class="content_botbg">

        <div class="content_res">

            <div id="breadcrumb">
                <?php if ( function_exists('cp_breadcrumb') ) cp_breadcrumb(); ?>
            </div>
			<div id="blog-left-sidebar">
			
						<?php if(wp_is_mobile()) { ?>
			
			
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
</div>			
			
		<?php } ?>
			
				<?php dynamic_sidebar('blogleft'); ?>
			</div>            
			<div class="content_left">

                <?php
				 $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				 
				 
 $args = array( 'posts_per_page' => 9,
 				'paged'=> $paged,
 				's'=>$_GET['search'],
				'post_type' => 'post',
				'post_status' => 'publish'
			 	  
				   );
				  
				query_posts( $args ); 
				
				?>

<?php 
 
	get_template_part( 'loop' ); 
//}
?>

                <div class="clr"></div>
             
            </div><!-- /content_left -->

            <?php get_sidebar( 'blog' ); ?>

            <div class="clr"></div>

        </div><!-- /content_res -->

    </div><!-- /content_botbg -->

</div><!-- /content -->
