<?php  //die(); ?>
<style type="text/css">
.content_right { display: block !important}

</style>
<div class="content">



    <div class="content_botbg">



        <div class="content_res">



            <div id="breadcrumb">

                <?php if ( function_exists('cp_breadcrumb') ) cp_breadcrumb(); ?>

            </div>



            <div class="content_left" style="    width: 638px !important;">





                <?php 
				
				
				
				 $args = array( 'paged'=> $paged,
				  'post_per_page'=> $admins, 
				  'post_type' => 'post',
				  'post_status' => 'publish'
				  
				   );
				
				get_template_part( 'loop' ); ?>





                <div class="clr"></div>



            </div><!-- /content_left -->





            <?php get_sidebar( 'blog' ); ?>





            <div class="clr"></div>



        </div><!-- /content_res -->



    </div><!-- /content_botbg -->



</div><!-- /content -->

