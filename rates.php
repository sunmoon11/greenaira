<?php
/**
 * Template Name: Rates
 * Description: Rates
 * @author: Adeel Hassan
 */
?>
<?php get_header(); ?>
<style>
/* Component styles */
 
.component {
	line-height: 1.5em;
	margin: 0 auto;
	padding: 2em 0 3em;
	width: 90%;
	max-width: 1000px;
	overflow: hidden;
}
.component .filler {
	font-family: "Blokk", Arial, sans-serif;
	color: #d3d3d3;
}

body{    font-family: Cambria, Palatino, "Palatino Linotype", "Palatino LT STD", Georgia, serif;
}

table {
	border-collapse: collapse;
	margin-bottom: 3em;
	width: 100%;
	background: #fff;
}
td, th {
	padding: 5px 5px;
	text-align: left;
	font-size: 14px;
}
td.err {
	background-color: #e992b9;
	color: #fff;
	font-size: 1em;
	text-align: center;
	line-height: 1;
}

@media (max-width:425px) {
td, th {
	font-size: 10px;
}
}
th {
	/*
	background-color: #31bc84;
	*/
	background-color: #5bbc2e;
	font-weight: bold;
	color: #fff;
	white-space: nowrap;
}
tbody th {
	/*background-color: #2ea879;*/
	background-color: #5bbc2e;
}
tbody tr:nth-child(2n-1) {
	background-color: #f5f5f5;
	transition: all .125s ease-in-out;
}
tbody tr:hover {
	background-color: rgba(129,208,177,.3);
}
/* For appearance */
.sticky-wrap {
	overflow-x: auto;
	overflow-y: hidden;
	position: relative;
	margin: 3em 0;
	width: 100%;
}
.sticky-wrap .sticky-thead, .sticky-wrap .sticky-col, .sticky-wrap .sticky-intersect {
	opacity: 0;
	position: absolute;
	top: 0;
	left: 0;
	transition: all .125s ease-in-out;
	z-index: 50;
	width: auto; /* Prevent table from stretching to full size */
}
.sticky-wrap .sticky-thead {
	box-shadow: 0 0.25em 0.1em -0.1em rgba(0,0,0,.125);
	z-index: 100;
	width: 100%; /* Force stretch */
}
.sticky-wrap .sticky-intersect {
	opacity: 1;
	z-index: 150;
}
.sticky-wrap .sticky-intersect th {
	background-color: #444;
	color: #eee;
}
.sticky-wrap td, .sticky-wrap th {
	box-sizing: border-box;
}
/* Not needed for sticky header/column functionality */
td.user-name {
	text-transform: capitalize;
}
.sticky-wrap.overflow-y {
	overflow-y: auto;
	max-height: 50vh;
}
.table-responsive {
	width: 100%;
}
table {
	font-size: 15px;
}

@media (min-width: 310px) and (max-width: 520px) {
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


.divss-1
{
  width:30%;
  margin-left: 10px;
  margin-right: 10px;
  border: 1px solid gray;
    border-radius: 7px;
    float: left;

}
.divss-2
{
  width:30%;
  margin-left: 10px;
  margin-right: 10px;
  border: 1px solid gray;
    border-radius: 7px;
  float: left;

}
.divss-3
{
  width:30%;
  margin-left: 10px;
  margin-right: 10px;
  border: 1px solid gray;
  border-radius: 7px;
  float: left;
}

.plan-container {
    width:90%;
    margin: 20px auto;
    border-radius: 5px;
    position: relative;
    top: 0;
    -webkit-transition: all 1s;
    transition: all 1s;
    font-family: Cambria, Palatino, "Palatino Linotype", "Palatino LT STD", Georgia, serif;

}

.plan-container > div {
    width: 30.9000000%;
    background: white;
    margin: 15px 10px;

}

.plan-container:hover {
  cursor: pointer;
  position: relative;
  top: -10px;
  -webkit-transition: top 1s;
  transition: top 1s;
}
.plan-container .plan-header {
  padding: 20px 10px;
  border-radius: 5px 5px 0 0;
  background-color: #5BBC2E;
  text-align: center;
}
.plan-container .plan-header .icon-box {
  margin: 0 auto;
}
.plan-container .plan-header .icon-box .icon {
  font-size: 3.125em;
  color: #fff;
}
.plan-container .plan-header h2 {
  color: #fff !important;
  font-weight: bold!important;
  margin: 0;
  padding-top: 12px;
font-size:20px;
    font-style: italic;
    font-family: Cambria, Palatino, "Palatino Linotype", "Palatino LT STD", Georgia, serif;

}

.plan-container .plan-header h1 {
     color: #fff!important;
    font-weight: bold!important;
    margin: 0;
    padding-top: 20px;
    display: inline-block;
    padding-left: 10px;
    text-shadow: 1px 1px 2px rgba(62, 62, 62, 0.55);
    font-size: 30px;
    font-family: Cambria, Palatino, "Palatino Linotype", "Palatino LT STD", Georgia, serif;

}
.plan-container .plan-header p {
      margin: 0;
    color: #505050;
    text-align: center !important;
    font-family: Cambria, Palatino, "Palatino Linotype", "Palatino LT STD", Georgia, serif;

}
.plan-container .plan-details {
  margin: 0 auto;
  padding: 10px 10px;
  text-align:center;
    font-family: Cambria, Palatino, "Palatino Linotype", "Palatino LT STD", Georgia, serif;

}
.plan-container .plan-details ul {
  padding-left: 0;
  list-style: none;
}
.plan-container .plan-details ul li{
    border-top: 1px solid #5BBC2E;
    padding: 20px 0;
    font-weight: bold;
    font-size: 16px;
    color: #777 !important;
	 
	background:none;
    font-family: Cambria, Palatino, "Palatino Linotype", "Palatino LT STD", Georgia, serif;

}
 .plan-container .plan-details ul li a { color: #777 !important;
	     font-weight: bold;
    font-size: 16px; padding:0px;
	background:none; border-radius:0px;}
	 .plan-container .plan-details ul li a:hover { background:none;}
.plan-container .plan-details ul li:last-child, .plan-container .plan-details ul li:first-child {
  border-bottom: none !important;
}
.plan-container .plan-details ul li span {
        font-weight: bolder;
    color: #212121;
    font-size: 15px;
}
.plan-container .plan-details p {
  background-color: #f4f4f4;
  margin: 2em 0;
  padding: 1.25em;
  font-size: 0.75em;
  line-height: 1.8;
  color: #777777;
    font-family: Cambria, Palatino, "Palatino Linotype", "Palatino LT STD", Georgia, serif;

}
.plan-container .plan-details a {
      background-color: #5BBC2E;
    padding: 10px 0;
    border-radius: 6px;
    color: #fff !important;
    text-align: center;
    text-decoration: none;
    width: 100%;
    border: 0;
    cursor: pointer;
    font-size: 18px;
    display: block;
    font-family: Cambria, Palatino, "Palatino Linotype", "Palatino LT STD", Georgia, serif;

}
.plan-container .plan-details a:hover {
  background-color: #F7941E;
}

.vp-form{
      font-size: 22px;
    margin-bottom: 12px;
    font-weight: bold;
    color: black;
    margin-left: 19%;
    color: #5BBC2E;
}

@media (min-width: 320px) and (max-width: 480px){
.container > header {
    padding: 20px 0px 20px 0px;
    margin: 0px 0px 10px 0px;
    position: relative;
    display: inline-block;
    text-align: center;
    width: 100%;
}


.plan-container {
    width: 90%;
    margin: 0 auto;
    margin: 0px auto;
    border-radius: 5px;
    position: relative;
    top: 0;
    -webkit-transition: all 1s;
    transition: all 1s;
}

.plan-container > div {
    width: 100%;
    background: white;
    margin: 10px 0px;
}


.form {
    background: #fff;
    width: 90%;
    padding-left: 0px;
    }
    form#customerform {
    display: block;
    padding: 0 8%;
}
.form input.buttom {
    margin-left: 0px; 
    width: 100%;
    }
    .form input[type="text"] {
    width: 100%;
}

.container > header h1 {
    font-size: 20px;
}
h3 {
    line-height: 30px;
    font-size: 16px !important;
    text-shadow: none;
    line-height: 1;
        padding: 5px;

}
.container > header h1 .pay-securely-text{
  padding: 20px 0;
      color: #5BBC2E;
    font-weight: 700;
    font-style: normal;
    font-size: 20px;
    text-shadow: 0px 1px 1px rgba(255,255,255,0.8);
}
}

</style>
<div class="content">
  <div class="content_botbg">
    <div class="content_res">
      
        <div class="plan-container">
          <div class="divss-1">
            <div class="plan-header">
              <h2>ADVERT</h2>
              <span><h1>5-N15K/month</h1></span>
            </div>
            <div class="plan-details">
              <ul>
                <li>Posting Advert</li>
                 
                 <li><a href="http://greenaira.com/what-we-offer-you/">More Details....</a></li>
              </ul>
              <a href="http://greenaira.com/ads-pay.php">Pay Now <i class="fa fa-arrow-right"></i></a>
            </div>
            </div>
            <div class="divss-2">
            <div class="plan-header">
              <h2>Business Promotion</h2>
              <span><h1>N20K/month</h1></span>
            </div>
            <div class="plan-details">
              <ul>
                <li>Driving Traffic to Your Business</li>
                 <li><a href="http://greenaira.com/promote-your-business/">More Details....</a></li>
              </ul>
              <a href="http://greenaira.com/ads-pay.php">Pay Now <i class="fa fa-arrow-right"></i></a>
            </div>
            </div>
              <div class="divss-3">
            <div class="plan-header">
              <h2>Online Shop</h2>
              <span><h1>N5K/month</h1></span>
            </div>
            <div class="plan-details">
              <ul>
                <li>Your Own Web Page</li>
                 <li><a href="http://greenaira.com/nectarjewel/">More Details....</a></li>
              </ul>
              <a href="http://greenaira.com/ads-pay.php">Pay Now <i class="fa fa-arrow-right"></i></a>
            </div>
            </div>
          </div>

          <div class="plan-container">
          <div class="divss-1">
            <div class="plan-header">
              <h2>Banner/Blog Advert</h2>
              <span> <h1>N10K/Month</h1></span>
            </div>
            <div class="plan-details">
              <ul>
                <li>Banner Display/Blog Advert</li>
                 <li><a href="http://greenaira.com/nigeria-roofing-sheets-best-prices/">More Details....</a></li>
              </ul>
              <a href="http://greenaira.com/ads-pay.php">Pay Now <i class="fa fa-arrow-right"></i></a>
            </div>
            </div>
            <div class="divss-2">
            <div class="plan-header">
              <h2>Foreign - Advertiser Listing</h2>
              <span><h1>$20</h1></span>
            </div>
            <div class="plan-details">
              <ul>
                <li>Add your listing</li>
                 <li><a href="http://greenaira.com/what-we-offer-you/">More Details....</a></li>
              </ul>
              <a href="http://greenaira.com/ads-pay.php">Pay Now <i class="fa fa-arrow-right"></i></a>
            </div>
            </div>
              <div class="divss-3">
            <div class="plan-header">
              <h2>Directory Listing</h2>
              <span><h1>N10K/3 MONTH</h1></span>
            </div>
            <div class="plan-details">
              <ul>
                <li>Add your company to Our List</li>
                <li><a href="http://greenaira.com/nigeria/business/page/3/">More Details....</a></li>
              </ul>
              <a href="http://greenaira.com/ads-pay.php">Pay Now <i class="fa fa-arrow-right"></i></a>
            </div>
            </div>
          </div>



      <!-- /content_left --> 
      
      <!-- right sidebar -->
      <div class="content_right"> 
        <!-- start tabs --> 
        <!--<div class="tabprice">

		<!--<ul class="tabnavig">
		  <li><a href="#priceblock1"></a></li>
		  <li><a href="#priceblock2"></a></li>
		  <!--<li><a href="#priceblock3"></a></li>
		</ul>--> 
        
        <!-- popular tab 1 --> 
        <!-- <div id="priceblock1">

			<div class="clr"></div>

			
		</div>--> 
        
        <!-- comments tab 2 --> 
        <!-- <div id="priceblock2">

			<div class="clr"></div>

			
		</div>--><!-- /priceblock2 --> 
        
        <!-- tag cloud tab 3 --> 
        <!-- <div id="priceblock3">

		  <div class="clr"></div>

		  <div class="pricetab">

			  
			  <div id="tagcloud">

				
			  </div>

				
			  <div class="clr"></div>

		  </div>

		</div>

	</div>--><!-- end tabs -->
        
        <?php // get_sidebar(); ?>
        <!-- /shadowblock_out --> 
        
      </div>
      <!-- /content_right -->
      
      <div class="clr"></div>
    </div>
    <!-- /content_res --> 
    
  </div>
  <!-- /content_botbg --> 
  
</div>
<?php get_footer(); ?>