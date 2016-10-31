/************************************************************************************* 
* Author: Craig Bell
* Assignment: WE4.0 Mobile Web Applications, Digital Skills Academy 
* Student ID: D15126839 
* Date: 2016/05/16
* Ref: http://www.sitepoint.com/ajaxjquery-getjson-simple-example/
************************************************************************************/

$(document).ready(function(){
	$.getJSON( "js/shoppingList.json", function(data) {
		// alert(JSON.stringify(data));
		$.each(data.item, function(){
			/*Text from the array within the json file now set up as a variable*/
			var ID = this['ID'];
			var HEADER = this['HEADER'];
			var DESCRIPTION = this['DESCRIPTION'];
			var FOOTER = this['FOOTER'];

		
			/*Adds the elements from the array to the code*/
			var code = '<div data-role="page" class="shopping_item" id="' + ID + '"><div data-role="header"><h1>' + HEADER + '</h1><a href="#mypanel" data-icon="info"><span class="ui-icon ui-icon-bars ui-icon-shadow">&nbsp;</span>Info</a></div><div data-role="content"><p>' + DESCRIPTION + '</p><a href="#food_list">Back To Shopping List</a></div><div data-role="footer"><h1>' + FOOTER +'</h1></div></div>'
			
			/*Shows the array items coming through*/
			// alert(ID);
			
			/*Appends the code to the div called Show-data*/
			/*Originally had the #show-data as a div but amended the Body to have this id instead*/
			$('#show-data').append( code );

			/*Includes the side-panel php file to the shopping item page*/
			$.ajax({
				url: 'side-panel.php'
			}).done(function(data) {
				$('.shopping_item').append(data);
			});
		});
	});	
});






