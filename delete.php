<?php

include_once "db_connect.php";



if($_GET['action']=="delete") {

 $query_string = "DELETE FROM JPW WHERE id=".$_GET['id'];
//$query_string = "SELECT * FROM JPW WHERE id=".$_GET['id'];

$result = $mysqli->query($query_string);
if($mysqli->errno) die($mysqli->error);
}

?>
Successfully delete the current item!
<div>
	<a href="product_latest.php">Back to the product list!</a>
</div>