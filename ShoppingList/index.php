<!-- ************************************************************************************* 
* Author: Craig Bell
* Assignment: WE4.0 Mobile Web Applications, Digital Skills Academy 
* Student ID: D15126839 
* Date: 2016/05/16
* Ref: ???
************************************************************************************-->

<!doctype html>

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
			<?php include ("side-panel.php"); ?>
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
					<li><a href="#apple_page">Apple</a></li>
					<li><a href="#carrots_page">Carrots</a></li>
					<li><a href="#courgette_page">Courgette</a></li>
					<li><a href="#gochujang_page">Gochujang</a></li>
					<li><a href="#jajangmyeon_page">Jajangmyeon</a></li>
					<li><a href="#japchae_page">Japchae</a></li>
					<li><a href="#kimchi_page">Kimchi</a></li>
					<li><a href="#mushrooms_page">Mushrooms</a></li>
					<li><a href="#onions_page">Onions</a></li>
					<li><a href="#samgyeopsal_page">Samgyeopsal</a></li>
					<li><a href="#samgyetang_page">Samgyetang</a></li>
					<li><a href="#sesame_oil_page">Sesame oil</a></li>
					<li><a href="#soy_sauce_page">Soy sauce</a></li>
					<li><a href="#ssam_page">Ssam</a></li>
					<li><a href="#ssamjang_page">Ssamjang</a></li>
					<li><a href="#tteok_page">Tteok</a></li>
					<li><a href="#tofu_page">Tofu</a></li>
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