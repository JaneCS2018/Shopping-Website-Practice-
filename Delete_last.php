<?php

include_once "db_connect.php";

$query_string = "DELETE FROM `xiang5_AAU_PROJECT`.`JPW` WHERE `JPW`.`id`  ORDER BY id DESC LIMIT 1"; 
	

$result = $mysqli->query($query_string);
if($mysqli->errno) die($mysqli->error);

?>
Successfully delete the lastest item!
<div>
	<a href="product_latest.php">Back to the product list!</a>
</div>