<!-- ************************************************************************************* 
*   Author: Craig Bell
*   Assignment: WE4.0 Server-side Web Development, Digital Skills Academy 
*   Student ID: D15126839 
*   Date: 2016/07/31
*   Ref: 
*   Comments: The footer.php, header.php and content.php are what make up the page for 
*   the foor item.
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
        <?php include (ROOT_DIR."side-panel.php"); ?>
        <div data-role="page" class="shopping_item" id="<?php foreach ($items as $item){echo json_encode($item->item_ID);}?>">
            

            <!--The CONTENT.PHP file will also be included-->
