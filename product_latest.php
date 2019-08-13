<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Product Latest</title>
	<link rel="stylesheet" href="css/main.css">	
	<link rel="stylesheet" href="css/footer.css">
	<link rel="stylesheet" href="css/product_list.css">	
	<link rel="stylesheet" href="css/grid_product_list.css">
	<link rel="stylesheet" href="css/classification.css">
	<script src="lib/js/jquery-2.1.4.min.js"></script>


<?php

include "partials/head.html";
include "partials/navigation.html";
include "partials/lightbox.html";

	
?>

</head>
<body>

	<div class="Featured">Featured Women</div>


			<div class="sort">


				<div class="sort01 col-lg-9 col-sm-9"></div> 


					<div class="select col-lg-3 col-sm-3">
						<select id="mySelect">
									<option class="js-sort" value="1" data-sort="orderby=data_create&direction=DESC">Latest products</option>
									<option class="js-sort" value="2" data-sort="orderby=data_create&direction=ASC">Oldest products</option>
									<option class="js-sort" value="3" data-sort="orderby=price&direction=DESC">Price Highest</option>
									<option class="js-sort" value="4" data-sort="orderby=price&direction=ASC">Price Lowest</option>
									<option class="js-sort" value="5" data-sort="orderby=title&direction=ASC">Title A-Z</option>
									<option class="js-sort" value="6" data-sort="orderby=title&direction=DESC">Title Z-A</option>
	    				</select>
					</div>
			</div>

	
<div class="product">
	<?php

	include "partials/classification.html";
	
	?>
	<div class="product-list col-lg-9 col-md-9 col-sm-9"></div>
</div>
	<div class="page">
		<a class="js-sort page01" data-sort="orderby=data_create&direction=DESC&limit=12">Page 1 of 2</a>
		<a class="page01"> | </a> 
		<a class="js-sort page01" data-sort="orderby=data_create&direction=DESC&limit=12,13">Next</a>
	</div>
	<!-- <div class="livechat">
			<div class="Products_title"><div>My Products</div><div class="closewindow">X</div></div>
			<div class="Products_edit">
							<form action="add.php" method="POST">
								  <table>
								    <tr>
								      <td>Title</td>
								      <td><input type="text" name="title" style="width:100%">
								      </td>
								    </tr>
								    <tr >
								      <td>Brand</td>
								      <td><input type="text" name="brand" style="width:100%">
								      </td>
								    </tr>
								    <tr>
								      <td >Price</td>
								      <td><input type="number" name="price" style="width:100%"></a>
								      </td>
								    </tr>
								    <tr>
								     <td></td>
								      <td><input type="submit" 
						      			name="submit" value="Add a new product" style="width:100%">
								      </td>
								    </tr>
								    <tr>
								      <td></td>
								      <td ><div class="product_btn"><a href="Delete_last.php">Remove the last item</a></div>
								      </td>
								    </tr>
								   
								    <tr>
								     <td></td>
								      <td><div class="product_btn delete_icons">Delete icons ON/Off</div>
								   
								    </tr>
								    
								    </table>
						
						   </form>
   					</div>
 			</div -->

</body>

<script type="text/template" id="product-item-template">
<div class='col-sm-12 col-md-6 col-lg-4'>
	<div class='product-item js-sort' data-sort="where=id&what={{id}}">
		<div class="remove_icon">[<a href='delete.php?id={{id}}&action=delete'>&times;</a>]</div>
		<a href='product_item.php?id={{id}}'>
			<div><img src="images/{{image_main}}"></div>
			<div class="Brand">{{Brand}}</div>
			<div class="Title">{{Title}}</div>
			<div class="Price">${{Price}}</div>
		</a>

	</div>
 </div>

</script>
<?php

	include "partials/footer.html";

?>	

</html>
<!-- if you want to use moustache for background image import-->
<!-- This is the right format -->
<!-- <div class='product-item'
		style= 'background-image:
		url(images/{{image_main}});'></div> -->