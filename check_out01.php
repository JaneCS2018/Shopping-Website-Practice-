<?php
session_start();
include_once "db_connect.php";
$query_string ="SELECT * FROM JPW "; 
$result = $mysqli->query($query_string);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>	</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/common.css">
	<link rel="stylesheet" href="css/grid.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/product_list.css">

	<link rel="stylesheet" href="css/grid_product_list.css">
<style>	
.ordernumber_box{
display: flex;
}
.ordernumber{
position: fixed;
top:5vh;
right: 1vh;
padding-left: 4vh;
color: white;
z-index: 10;
}
</style>
</head>
<body>
	
</body>
</html>
<?php
require 'item.php';
if(isset($_POST['submit'])){
	 $query_string = "SELECT * FROM JPW WHERE id=".$_GET['id'];
     $result = $mysqli->query($query_string);
     $row = $result->fetch_object();
     $num = $_POST['num'];
     $item = new Item();
     $item->id = $row->id;
     $item->name = $row->Title;
     $item->price = $row->Price;
     $item->quantity = 1;
     //Check product is existing in cart
     $index = -1;
     $cart = unserialize(serialize($_SESSION['cart']));
     for($i=0; $i<count($cart); $i++)
     	if($cart[$i]->id==$_GET['id'])
     	{
     		$index = $i;
     		break;
     	}

     if($index==-1)
     	$_SESSION['cart'][] = $item;
     else{
     	$cart[$index]->quantity++;
     	$_SESSION['cart'] = $cart;
     }
}
//Delete product in cart
if(isset($_GET['index'])) {
	$cart = unserialize(serialize($_SESSION['cart']));
	unset($cart[$_GET['index']]);
	$cart = array_values($cart);
	$_SESSION['cart'] = $cart;

}
?>
<a href="product_latest.php" class="a">Women </a> > <a href="" class="b"><?php echo $row->Title?></a>
<div class="col-lg-12 col-md-12 col-sm-6 orderinfo">
		<table cellpadding="2" cellspacing="2" border="1">	
		<tr >
			<th>Option</th>	
			<th>Id</th>
			<th>Name</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Sub Total</th>	
		</tr>
		<?php
		  $cart = unserialize(serialize($_SESSION['cart']));
		  $s = 0;
		  $index = 0;
		  $order = 0;
		  for($i=0; $i<count($cart); $i++){
		      $s +=	$cart[$i]->price * $cart[$i]->quantity;
		      $order +=$cart[$i]->quantity;
			  ?>
			<tr>
			  <td><a href="check_out01.php?index=<?php echo $index; ?>">Delete</a></td>
			  <td><?php echo $cart[$i]->id; ?></td>
		  	  <td><?php echo $cart[$i]->name; ?></td>
		  	  <td>$<?php echo $cart[$i]->price; ?></td>	
			  <td><?php echo $cart[$i]->quantity; ?></td>
			  <td>$<?php echo $cart[$i]->price * $cart[$i]->quantity; ?></td>	
			</tr>
		<?php 

   				$index++;
			} 
		?>
		
		<tr>
			<td colspan="5" align="right">Your Total:</td>
			<td align="right">$<?php echo $s; ?></td>

		</tr>
		
		</table>
</div>
 <div class="ordernumber_box">
			<div class="col-lg-11 col-md-11 col-sm-11"></div>
			<div class="ordernumber col-lg-1 col-md-1 col-sm-1"><?php echo $order; ?></div>
	</div>        
<br>	


