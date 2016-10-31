<!-- ************************************************************************************* 
*   Author: Craig Bell
*   Assignment: WE4.0 Server-side Web Development, Digital Skills Academy 
*   Student ID: D15126839 
*   Date: 2016/07/31
*   Ref: 
*   Comments: The footer.php, header.php and content.php are what make up the page for 
*   the foor item.
************************************************************************************-->

<!--The HEADER.PHP file will also be included-->
<div data-role="content">
    <p>
    <!--<?php foreach ($items as $item){echo json_encode($item->item_DESCRIPTION);}?>-->
        <!-- JSON_UNESCAPED_UNICODE for UTF characters and PRETTY_PRINT to add whitespace -->
        <?php echo json_encode($items, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);?>
    </p><a href="http://localhost/myapi#food_list">Back To Shopping List</a>
</div>
<!--The FOOTER.PHP file will also be included-->