<?php

include "db_connect.php";

$where = isset($_GET['where'])?
	"WHERE ".$_GET['where']." = '".$_GET['what']."'":
	"";
	
$wherein = isset($_GET['wherein'])?
	"WHERE ".$_GET['wherein']." in ('".preg_replace("/,/","','", $_GET['what'])."'')":
	"";
if(isset($_GET['whereor'])) {
	$whereor = "WHERE";
	$whatset = explode(",",$_GET['what']);
	foreach($whatset as $what) {
		if($whereor!="WHERE") {
			$whereor .= " OR";
		}
		$whereor .= " FIND_IN_SET('$what',`{$_GET['whereor']}`)";
	}
}

$limit = isset($_GET['limit'])?
	"LIMIT ".$_GET['limit']:
	"";
$orderby = isset($_GET['orderby'])?
	"ORDER BY ".$_GET['orderby']." ".
		(isset($_GET['direction'])?
		$_GET['direction']:
		"ASC"):
	"";

$query = "SELECT * FROM JPW $where $wherein $whereor $orderby $limit";
// ?where=id&what=1
// die($query);
$result = $mysqli->query($query);
if($mysqli->errno) die($mysqli->error);

$data = array();
while($row = $result->fetch_object()) {
	$data[] = $row;
}

// print_r($data);
echo json_encode($data);