<?php

include_once "db_connect.php";




?><!DOCTYPE html>
<!-- https://www.youtube.com/watch?v=PBLuP2JZcEg Search Bar Tutorial Reference -->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>	</title>
	
	<link rel="stylesheet" href="css/main.css">	
	<link rel="stylesheet" href="css/product_list.css">	
	<link rel="stylesheet" href="css/footer.css">

	<link rel="stylesheet" href="css/grid.css">
	<link rel="stylesheet" href="css/grid_product_list.css">
    
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


				<div class="sort01 col-lg-9 col-md-9 col-sm-9">Showing 12 products</div> 


			</div>
<div class="product">



<?php 
  	if(empty($_POST['name'])){
  		echo "Please enter your keywords";


	 }else if(isset($_POST['name'])){
     	$name = $_POST['name'];
     	$name = preg_replace("#[^0-9a-zA-Z]#i","",$name);

     	//$query_string = "SELECT * FROM JPW WHERE Title LIKE '%' . $name .  '%' OR Brand LIKE '%' . $name .  '%' ";
     	//Not sure why this one is not working
     	$query_string = "SELECT * FROM JPW WHERE Title LIKE '%$name%'";
     	$result = $mysqli->query($query_string);
     	$row = $result->fetch_object();

     	
     	if($row == 0){
     		echo "There's no results";
     	}else{
                
		     	while($row = $result->fetch_object()){

				$images = explode(",", $row->image_main);
				
				echo "
				<div class='col-sm-4 col-md-6 col-lg-4'>
					<div class='product-item'
					style='background-image:
					url('images/$row->image_main');background-repeat:no-repeat;'>
						<a href='product_item.php?id=$row->id'>
						"
						;

				foreach($images as $image) {
			 	if($image!="") echo "<div><img src='images/$image'></div>
					<div class='Title'>$row->Title</div>
					<div class='Price01'>$$row->Price</div>
			 		";
				 }	


				echo "
						</a>
					</div>
				</div>
				";
			
			  	}
			  

     	}


     }
 
	 
?>

</div>
<?php

	include "partials/footer.html";

	?>	
</body>
</html>
	 