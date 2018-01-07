<style>
@media (min-width: 310px) and (max-width: 520px) {
#ad_tag_cloud-2 {
	display: none;
}
}
</style>
<?php //$term = get_queried_object(); ?>
<div class="content">
  <?php 
	 // print_r(get_page_by_title( $term->name, $output, 'adzones' ));
	 $term = get_queried_object();
	 global $wpdb;
	 
	 $query1 = $wpdb->get_row("select ID from $wpdb->posts WHERE post_type = 'adzones' AND post_title like 
	 '%".$term->name."1%'");
	 $query2 = $wpdb->get_row("select ID from $wpdb->posts WHERE post_type = 'adzones' AND post_title like 
	 '%".$term->name."2%'");
	 $query3 = $wpdb->get_row("select ID from $wpdb->posts WHERE post_type = 'adzones' AND post_title like 
	 '%".$term->name."3%'");
	 ;
	// echo ("select ID from  $wpdb->posts WHERE post_type = 'adzones' AND post_title like %".$term->name."%");
	 
	
	
	  
	  ?>
  <div class="content_botbg">
    <div class="content_res"> 
      
      <!----banners-------------->
      <?php /*?><div class="shadowblock_out">
        <div class="shadowblockdir" style="border-radius: 6px; height: 128px; border: 3px solid rgb(218, 218, 218); padding: 8px 11px 5px;">
          <div class="sliderblockdir" >
            <div class="banner_three" style="width: 330px; float: left; margin-right: 5px;">
              <?php
						if($query2->ID != ''){   
						 echo do_shortcode("[pro_ad_display_adzone id=".$query1->ID."]");
						 }else{
						echo do_shortcode("[pro_ad_display_adzone id=1092]");
						 }
						  ?>
            </div>
            <div class="banner_three" style="width: 330px; float: left; margin-right: 5px;">
              <?php 
						if($query2->ID != ''){   
						
						echo do_shortcode("[pro_ad_display_adzone id=1093]"); 
						
						
						}else{
						cp_banner_two_cat(); ?>
              <?php } ?>
            </div>
            <div class="banner_three" style="width: 330px; float: left; margin-right: 1px;">
              <?php 
						if($query3->ID != ''){ ?>
              <?php echo do_shortcode("[pro_ad_display_adzone id=".$query3->ID."]"); ?>
              <?php 
						}else{
					echo do_shortcode("[pro_ad_display_adzone id=1094]");?>
              <?php } ?>
            </div>
          </div>
          <!-- /sliderblock --> 
          
        </div>
        <!-- /shadowblock --> 
        
      </div><?php */?>
      <!-- /shadowblock_out --> 
      <!----------------------------->
      <div id="breadcrumb">
        <?php if ( function_exists('cp_breadcrumb') ) cp_breadcrumb(); ?>
      </div>
      
      <!-- left block -->
      <div class="content_left"> 
        <!--<div class="shadowblock_out">
          <div class="shadowblock">
            <div id="catrss"><a href="<?php echo get_term_feed_link($term->term_id, $taxonomy); ?>"><img src="<?php bloginfo('template_url'); ?>/images/rss.png" width="16" height="16" alt="<?php echo $term->name; ?> <?php _e( 'RSS Feed', APP_TD ); ?>" title="<?php echo $term->name; ?> <?php _e( 'RSS Feed', APP_TD ); ?>" /></a></div>
            <h1 class="single dotted">
              <?php _e( 'Listings for', APP_TD ); ?>
              <?php echo $term->name; ?> (<?php echo $wp_query->found_posts; ?>)</h1>
            <p><?php echo $term->description; ?></p>
          </div>
          <!-- /shadowblock --> 
        
      </div>
      <!-- /shadowblock_out -->
      <style type="text/css">
        .calculator { display:block;padding: 10px 7px;
    margin-bottom: 7px;
    border: 1px solid #BBB;
    color: #4F4F4F;
    font-size: 14px;
    color: #666;
    width: 33%;
    -khtml-border-radius: 6px;
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
    border-radius: 6px;
}
.area::-webkit-input-placeholder {
  color: #489cdf;
}
.roof::-webkit-input-placeholder {
  color: #489cdf;
}
.allowance { color:#8A0808}
.roof { 
color:green !important;
color:#489cdf !important
}
.total { color:#8A0886 !important}
.area-head { font-size:16px;}
.area, h1.area{
color:#489cdf !important;
}
h1.single{
	color:#489cdf !important;
	margin-top:5px;
	margin-bottom:5px;
}
        </style>
      <h1  class="single dotted" style="color:#489cdf" >Calculate the Total Number of Roofing Sheet Required  When Building Your House by Entering The Area of the Building and Area of one roofing sheet</h1>
      <div class="shadowblock_out">
        <form action="http://greenaira.com/" method="get" id="searchform" class="form_search">
          <div class="shadowblock" style="overflow:hidden">
            <div class="dotted" style="overflow:hidden">
              <h1 style="float:left; color:#489cdf; margin-top:5px" class="single area area-head">Enter Area of Your Building in Meter Square  or Caclculate it Below</h1>
              <input  style="float:left; margin-left:2%;width:14%" name="s"   onkeyup="CalculateRoof()" type="number" placeholder="" id="area" class="area calculator ui-autocomplete-input" autocomplete="off">
            </div>
            <div class="searchfield" style="margin-top:5px">
			<h1 style="float:left; margin-top:5px; width:100%;" class="single  area-head">OR</h1>
              <input name="s" onKeyUp="CalculateRoof()" type="number" placeholder="Enter Width" id="wcc"  class="area calculator ui-autocomplete-input"  autocomplete="off">
              <input name="s" onKeyUp="CalculateRoof()"  type="number"  placeholder="Enter Length" id="lcc" class="area calculator ui-autocomplete-input"  autocomplete="off">
            </div>
            <div style="display:block; clear:both">
              <h1 class="searchfield-two area-head area" style="float:left; color:#489cdf; margin-top:5px"> Area of building in Meter Square  = <span class="total-area">0</span> </h1>
            </div>
          </div>
          <br>
          <div class="shadowblock" style="overflow:hidden">
            <h1 class="single dotted allowance area-head area" style="color:#489cdf" >ADD 2% extra &nbsp;&nbsp; <input type="checkbox" id="optional_allowence" name="optional_allowence"> REMOVE 2% extra </h1>
            <div class="searchfield"> </div>
            <h1 class="searchfield-two allowance area-head area" style="float:left; color:#489cdf; margin-top:5px"> Total Calculated Allowance  = <span class="total-allowence allowance">0</span> </h1>
<!--            <br>
      <div>   Make Allowence Optional <input type="checkbox" id="checkboxall"></div>
-->          </div>
          <br>
          <div class="shadowblock" style="overflow:hidden">
            <div class="dotted" style="overflow:hidden">
              <h1 style="float:left; color:#489cdf" class="single area area-head">Enter Area of One Sheet in Meter Square <br>
                Or Calculate it by Entering Width and Height of One Sheet Below</h1>
              <input style="float:left; margin-left:2%; width:14%;margin-top:5px" name="s" onkeyup="CalculateRoof()" type="number" placeholder="" id="roof" class="roof calculator ui-autocomplete-input" autocomplete="off">
            </div>
            <div class="searchfield" style="margin-top:10px">
			<h1 style="float:left; margin-top:5px; width:100%; color:#489cdf;" class="single  area-head">OR</h1>
              <input name="s" onKeyUp="CalculateRoof()" type="number" placeholder="Enter Width of One Sheet" id="wsc"  class="roof calculator ui-autocomplete-input"  autocomplete="off">
              <input name="s" onKeyUp="CalculateRoof()"  type="number"  placeholder="Enter Length of One Sheet" id="lsc" class="roof calculator ui-autocomplete-input"  autocomplete="off">
              <!-- <div class="searchfield-two roof area-head" style="float:left; margin-top:5px"> Area of One Sheet in Square Meter  = <span class="total-sroof roof"></span> </div>--> 
              
            </div>
            <br>
            <div style="display:block; clear:both">
              <h1 style="float:left; color:#489cdf;" class="ssearchfield-two  area-head area"> Area of One Sheet in Square Meter  = <span class="total-sroof roof">0</span></h1>
            </div>
            <!-- </div>--> 
          </div>
          <br>
          <div class="shadowblock" style="overflow:hidden"> 
            <!--  <h1 class="single dotted">Roofing sheets</h1>--> 
            <!--<div class="searchfield-two single total area-head" style="float:left;font-weight:bold">-->
            <h1 style="float:left; font-weight:bold; color:#489cdf;" class="searchfield-two  total  single  area-head area"> Total Numbers of Roofing Sheets Required = <span class="total-sheets">0</span></h1>
          </div>
          
          <!--<div class="searchfield-two" style="float:left">
              
           Total Calculated Area<span class="total-area"></span>
              </div>-->
        </form>
      </div>
      <?php //get_template_part( 'loop', 'ad_listing' ); ?>
    </div>
    <!-- /content_left --> 
<script type="text/javascript">
function CalculateRoof(){
	rarea = null;
	area = null;
	allowence = null;
	
	w = jQuery('#wcc').val();
	l = jQuery('#lcc').val();
	
	if(  w != '' && l != ''){
		area = l*w;
		if(jQuery('#optional_allowence:checked').length > 0){
			allowence = 0;	
		}
		else{
			allowence = area*20/100;
		}
		
		total_allow = +allowence + +area;
		
		jQuery('.total-area').text(area);
		jQuery('.total-allowence').text(total_allow);
	}
	
	roffing_length = jQuery('#lsc').val();
	roffing_width = jQuery('#wsc').val();
	
	if( roffing_length != '' && roffing_width != ''){ 
		rarea = roffing_length* roffing_width;
		jQuery('.total-sroof').text(rarea);
	}
	
	user_area = jQuery('#area').val();
	user_roof = jQuery('#roof').val();
	if(user_area != ''){
		area =  user_area;
	}
	
	if(user_roof != ''){
		rarea =  user_roof;
	}
	
	if(allowence == null){
		if(jQuery('#optional_allowence:checked').length > 0){
			allowence = 0;
		}else{
			allowence = area*20/100; 
		}
		
		total_allow = +allowence + +area;
		
		jQuery('.total-area').text(area);
		jQuery('.total-sroof').text(rarea);
		jQuery('.total-allowence').text(total_allow);
	}
	
	if(  rarea != '' && area != ''){ 
		total_area = total_allow/rarea;
		total_area = total_area.toFixed(3);
		if(rarea<=0){
			total_area=0;
		}
		jQuery('.total-sheets').text(total_area);
	}
		
}

jQuery('#optional_allowence').click(function(e) {
	CalculateRoof();
});

</script>
    <?php get_sidebar(); ?>
    <div class="clr"></div>
  </div>
  <!-- /content_res --> 
  
</div>
<!-- /content_botbg -->

</div>
<!-- /content --> 