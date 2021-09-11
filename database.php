<?php

try {

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "bdrcs";
	$charset = "utf8mb4";

	$con = new PDO("mysql:host=$servername; dbname=$dbname; charset=$charset",$username,$password);

	//$dbcon->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch(PDOException $e) {
	echo 'Error: ' .$e->getMessage();
}
?>