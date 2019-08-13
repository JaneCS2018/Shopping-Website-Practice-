<?php

//PROBABLY USE LOCALHOST
$db_host = "lpsql01.lunariffic.com";
$db_user = "xiang5" ;
$db_pass = "Jane19850208";
$db_database ="xiang5_AAU_PROJECT";

//mysql() DEPRECATED
$mysqli = new mysqli(
	$db_host,
	$db_user,
	$db_pass,
	$db_database
	);

if($mysql->connect_errno) die($mysqli->connect_error);

//delect this next line if we see hello

?>
