<?php
/**
 * Template Name: Categories
 * Description: Categories
 * @author: Adeel Hassan
 */
?>
<?php get_header(); ?>
<style>

	/*  SECTIONS  */

.section {

	clear: both;

	padding: 0px;

	margin: 0px;

}

.group{

	margin-left: 15px;

}

/*  COLUMN SETUP  */

.col {

	display: block;

	float:left;

	margin: 1% 0 1% 1.6%;

}

.col:first-child { margin-left: 0; }



/*  GROUPING  */

.group:before,

.group:after { content:""; display:table; }

.group:after { clear:both;}

.group { zoom:1; /* For IE 6/7 */ }



/*  GRID OF SIX  */

.span_6_of_6 {

	width: 100%;

}



.span_5_of_6 {

  	width: 83.06%;

}



.span_4_of_6 {

  	width: 66.13%;

}



.span_3_of_6 {

  	width: 49.2%;

}



.span_2_of_6 {

  	width: 32.26%;

}



.span_1_of_6 {

  	width: 15.33%;

}



/*  GO FULL WIDTH BELOW 480 PIXELS */

@media only screen and (max-width: 480px) {

	.col {  margin: 1% 0 1% 0%; }

	.span_1_of_6, .span_2_of_6, .span_3_of_6, .span_4_of_6, .span_5_of_6, .span_6_of_6 { width: 100%; }

}

.col.span_1_of_6 a {

    font-size: 15px;

    text-decoration: none;

}



.content_res .shadowblockdir {

    /*background: #f7f7f7 url("imagess/block_topbg.gif") repeat-x scroll center top;*/

    border: 3px solid #e8e8e8;

    border-radius: 6px;

    height: 130px;

    padding: 8px 15px 5px;

}

#ad_tag_cloud-2 {

    display: none;

}

.paging > a {

    color: #fff;

    font-size: 16px;

    font-weight: bold;

    text-decoration: none;

    padding-left: 224px;

    padding-right: 224px;

    padding-top: 10px;

    padding-bottom: 10px;

}

.paging {

    background: #fc6d26 none repeat scroll 0 0;

    border: 1px solid #bbbbbb;

    border-radius: 6px;

    color: #fff;

    margin: 0 0 4px;

    padding: 8px;

    text-align: center;

}

@media (min-width: 320px) and (max-width: 520px){

    #ad_tag_cloud-2{

        display: none;

    }

}

</style>


<div class="content">
  <div class="content_botbg">
    <div class="content_res">
      <div class="shadowblock_out">

<h2 class="BrowseByCategories">Browse By Categories</h2>

            <div class="shadowblockdir" style="border-radius: 6px; height: auto; border: 3px solid #e8e8e8; padding: 1px 13px 21px;">



                <div class="sliderblockdir" >

					<div class="section group">
                    
                  <?php   $ad_cats = get_categories('orderby=name&order=asc&hierarchical=1&show_count=1&use_desc_for_title=0&hide_empty=0&depth=1
 &parent=0&number=&title_li=&taxonomy='.APP_TAX_CAT);

//sprint_r($ad_cats);

 
 $new_ads_cats = array_chunk($ad_cats, 7) ;
 
   foreach($new_ads_cats as $ad_cat){ ?>
                   
                    

						<div class="col span_1_of_6">

						    <ul>
                            <?php  foreach($ad_cat as $c ){
								
					 $variable = get_option( "ad_cat".$c->term_id);
 
if($variable == ''){
	
	$link = get_site_url().'/category/'. $c->slug ;
	$count = $c->count ;
	}
	else {
		$variable = maybe_unserialize($variable);


		$link = $variable['link_custom'];
		if($link == ''){
			
			$link = get_site_url().'/category/'. $c->slug ;
			}	
			
			
			
			$count = $variable['count_number'];
		if($count == ''){
			
			$count = $c->count ;
			}		
		
		//print_r($link);
		
		}
								
$faclass  = NULL;

if($c->slug == 'motors'){
	
	$faclass  = '<i class="fa fa-automobile fa-lg"  style="color:#ff7800;"></i>';
	}
	
	if($c->slug == 'household-items'){
	
	$faclass  = '<i class="fa   fa-home fa-lg" style="color:#fc3781;"></i> ';
	}
	if($c->slug == 'sports'){
	
	$faclass  = '<i class="fa  fa-soccer-ball-o fa-lg"  style="color: #f2b520;"></i> ';
	}
	if($c->slug == 'travel'){
	
	$faclass  = '<i class="fa    fa-plane fa-lg" style="color: #86277f;;"></i> ';
	}								
		
		if($c->slug == 'musician-nigeria-art-entertainment'){
	
	$faclass  = '<i class="fa   fa fa-music fa-lg" style="color: red "></i> ';
	}								
		
		if($c->slug == 'building-materials'){
	
	$faclass  = '<i class="fa     fa fa-building fa-lg" style="color: #41d1ee  ;"></i> ';
	}
		if($c->slug == 'mobile-phoneshandsets'){
	
	$faclass  = '<i class="fa     fa-mobile-phone fa-lg" style="color: #ff7800  ;"></i> ';
	}	
		if($c->slug == 'home-electronics-appliances-nigeria'){
	
	$faclass  = '<i class="fa     fa-home fa-lg" style="color: #41d1ee  ;"></i> ';
	}	
	if($c->slug == 'hotels-in-lagos-abuja-nigeria'){
	
	$faclass  = '<i class="fa     fa-hotel fa-lg" style="color: #ff7800  ;"></i> ';
	}	
	if($c->slug == 'medical'){
	
	$faclass  = '<i class="fa     fa-medkit fa-lg" style="color: #41d1ee  ;"></i> ';
	}	
	if($c->slug == 'games-in-nigeria'){
	
	$faclass  = '<i class="fa     fa-gamepad fa-lg" style="color: #ff7800  ;"></i> ';
	}	
	
									
						 
						 		
								//if($c->parent  == '0'){
								  ?>

								<li style="padding-top: 3px;"><?php echo $faclass  ?> <a class="" href="<?php echo $link ?>">
<?php echo $c->name ?></a><span style="color:#53b426">(<?php echo $count ?>)</span></li>
 
						<?php }		//}?>
							</ul>

						</div>

					<?php }	 ?>
 

					</div>

					

                </div><!-- /sliderblock -->



            </div><!-- /shadowblock -->



        </div>
       
      <!-- /content_left --> 
      
      <!-- right sidebar -->
       
      <!-- /content_right -->
      
      <div class="clr"></div>
    </div>
    <!-- /content_res --> 
    
  </div>
  <!-- /content_botbg --> 
  
</div>
<?php get_footer(); ?>
