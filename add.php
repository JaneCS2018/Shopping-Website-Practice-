<?php

// Include Libraries
include_once "db_connect.php";



if (isset($_POST['submit'])) {
$title = $_POST['title'];
$brand = $_POST['brand'];
$price = $_POST['price'];
  if($_POST['title']==""||$_POST['brand']=="" ||$_POST['price']=="") die("You didn't fill out the form right.");

$query_string = "INSERT INTO `JPW` (
		`id`,
		`data_create`,
		`data_modify`,
		`Product_num`,
		`Title`, 
		`Category`,  
		`Sub_Category`,  
		`Brand`,  
		`Size`,   
		`Color`,    
  		`Color_info`,  
  		`Color_square01`,  
  		`Color_square02`,  
  		`Price`,    
  		`Price_Category`,  
  		`Description`,  
  		`image_main`,   
  		`image_others`, 
  		`image_others_title`, 
  		`image_others_price`,  
  		`image_id` ,  
  		`Big_image`,  
  		`Big_image_extra`, 
  		`thumbnails_01`,   
  		`thumbnails_02`,   
  		`Material` 
  		) VALUES (
  		null,
		NOW(),
		NOW(),
		 5,
		'$title',
		'Jewelry',
		'Necklace',
		'$brand',
		'0.00',
		'#253f8a',
		'Darkblue',
		'#253f8a',
		 '',
		'$price',
		'500-600',
		'Earrings Closure: Leverback. Shape of Stones: Pear 8mmX5.7mm. Stones Information:Feature of Stones: 100% Natural Sapphire. Metal: 14k Solid blue Gold. Product Information:Earrings Length: 1.0 inches',	
		'Earring_01.png',
		'Earring_03.png,Earring_04.png,Earring_05.png',
		'Crystal Eyes Drop Earrings,Silver Blue Marquise Earrings,Dark Royal Blue Jewellery',
		 '599,700,300',
		 '3,4,5',
		 'Earring_01_a.png',
		 '',
		 '',
		 '',
		 'Blue Diamond'
		 )";

$result = $mysqli->query($query_string);
if($mysqli->errno) die($mysqli->error);

}
?>
Successfully add a new item!
<div>
	<a href="product_latest.php">Back to the product list!</a>
</div>

