<!-- ************************************************************************************* 
* Author: Craig Bell
* Assignment: WE4.0 Server-side Web Development, Digital Skills Academy 
* Student ID: D15126839 
* Date: 2016/07/31
* Ref: ???
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
        <table>
         <tr>
            <td><strong>Food ID</strong></td>
            <td><strong>Item ID</strong></td>
            <td><strong>ITEM HEADER</strong></td>
            <td><strong>ITEM DESCIPTION</strong></td>
            <td><strong>ITEM FOOTER</strong></td>
        </tr>
        <?php foreach ($items as $item){ ?>
        
        <tr>
            <td><?php echo json_encode($items);?></td>
            <td><?php echo json_encode($item->item_ID);?></td>
            <td><?php echo json_encode($item->item_HEADER);?></td>
            <td><?php echo json_encode($item->item_DESCRIPTION);?></td>
            <td><?php echo json_encode($item->item_FOOTER);?></td>

        </tr>
        <?php } ?>
        </table>
		
		<!-- Required jQuery Mobile JS and jQuery -->
		<script src="js/jquery-1.12.3.min.js"></script> 
		<script src="js/jquery.mobile-1.4.5.min.js"></script>
		<!-- Personal Javascript file-->
		<script src="js/craigs.js"></script>
	</body>
</html>