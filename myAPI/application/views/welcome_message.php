<!-- ************************************************************************************* 
*   Author: Craig Bell
*   Assignment: WE4.0 Server-side Web Development, Digital Skills Academy 
*   Student ID: D15126839 
*   Date: 2016/07/31
*   Ref: https://arjunphp.com/links-anchor-codeigniter/#sthash.OmjTFUYl.dpuf
*   Comments: This page was originally created for the Mobile jQuery assignment.
*   Added new href to work with MVC (CodeIgniter) framework.
************************************************************************************-->


<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- My customized Theme Roller -->
		<link rel="stylesheet" href="css/themes/craigbell.min.css" />
		<link rel="stylesheet" href="css/themes/jquery.mobile.icons.min.css" />
		<!-- Required jQuery Mobile CSS -->
		<link rel="stylesheet" href="css/jquery.mobile.structure-1.4.5.min.css" />
		<!--Personal CSS-->
		<link rel="stylesheet" href="css/main.css" /> 
		<title>List App</title>
	</head>
	<body id="show-data">
		<!-- Shopping List -->
		<div data-role="page" id="food_list">
			<!-- ********The Panel/Off canvas Menu*********
			*****ref:http://demos.jquerymobile.com/1.3.0-rc.1/docs/panels/
			******************************************-->
			<!--Removed CONSTANT and used Document Root instead-->
			<?php include ($_SERVER['DOCUMENT_ROOT']."/myAPI/side-panel.php"); ?>
			<!-- My header for the Shopping List-->
			<div data-role="header" id="my-header">
				<h1>Shopping List <img src="css/themes/images/icons-png/shop-black.png" alt="shopping bag image for Shopping List application" /></h1>
				
				<!-- Information Side Panel Menu -->
				<a href="#mypanel" data-icon="info">
					<span class="ui-icon ui-icon-bars ui-icon-shadow">&nbsp;</span>Info
				</a>
			</div>
			<!-- The Shopping List-->
			<div data-role="content">
				<form class="ui-filterable">
					<input id="filterBasic-input" data-type="search" placeholder="Find shopping item..." data-lastval="">
				</form>
				<ul data-role="listview" data-filter="true" data-autodividers="true"data-filter-placeholder="Find shopping item..." data-input="#filterBasic-input" data-inset="true" class="ui-listview ui-listview-inset ui-corner-all ui-shadow" id="the_shopping_list">
                    <!--******************************************************************************
                    *   site_url() : Returns your site URL, as specified in your config file. 
                    *   The index.php file (or whatever you have set as your site index_page in your 
                    *   config file) will be added to the URL, as will any URI segments you pass 
                    *   to the function, and the url_suffix as set in your config file.
                    * *****************************************************************************-->
                    <li><a href="<?php echo site_url('Item/get_Selected_item/apple_page'); ?>">Apple</a></li>
                    <li><a href="<?php echo site_url('Item/get_Selected_item/carrots_page'); ?>">Carrots</a></li>
                    <li><a href="<?php echo site_url('Item/get_Selected_item/courgette_page'); ?>">Courgette</a></li>
                    <li><a href="<?php echo site_url('Item/get_Selected_item/gochujang_page'); ?>">Gochujang</a></li>
                    <li><a href="<?php echo site_url('Item/get_Selected_item/jajangmyeon_page'); ?>">Jajangmyeon</a></li>
                    <li><a href="<?php echo site_url('Item/get_Selected_item/japchae_page'); ?>">Japchae</a></li>
                    <li><a href="<?php echo site_url('Item/get_Selected_item/kimchi_page'); ?>">Kimchi</a></li>
                    <li><a href="<?php echo site_url('Item/get_Selected_item/mushrooms_page'); ?>">Mushrooms</a></li>
                    <li><a href="<?php echo site_url('Item/get_Selected_item/onions_page'); ?>">Onions</a></li>
                    <li><a href="<?php echo site_url('Item/get_Selected_item/samgyeopsal_page'); ?>">Samgyeopsal</a></li>
                    <li><a href="<?php echo site_url('Item/get_Selected_item/samgyetang_page'); ?>">Samgyetang</a></li>
                    <li><a href="<?php echo site_url('Item/get_Selected_item/sesame_oil_page'); ?>">Sesame oil</a></li>
                    <li><a href="<?php echo site_url('Item/get_Selected_item/soy_sauce_page'); ?>">Soy sauce</a></li>
                    <li><a href="<?php echo site_url('Item/get_Selected_item/ssam_page'); ?>">Ssam</a></li>
                    <li><a href="<?php echo site_url('Item/get_Selected_item/ssamjang_page'); ?>">Ssamjang</a></li>
                    <li><a href="<?php echo site_url('Item/get_Selected_item/tteok_page'); ?>">Tteok</a></li>
                    <li><a href="<?php echo site_url('Item/get_Selected_item/tofu_page'); ?>">Tofu</a></li>
				</ul>
			</div>
			
			<!-- Might have links to website for App or even links to local stores that are shown in a list from Google Search API-->
			<div data-role="footer">
				<h1>Footer of Shopping List</h1>
			</div>
		</div>
		<!-- / Shopping List -->
		
		<!-- Required jQuery Mobile JS and jQuery -->
		<script src="js/jquery-1.12.3.min.js"></script> 
		<script src="js/jquery.mobile-1.4.5.min.js"></script>
		<!-- Personal Javascript file-->
		<script src="js/craigs.js"></script>
	</body>
</html>