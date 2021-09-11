<?php 
	
	require('../database.php');
	error_reporting(0);
	session_start();
	if (!isset($_SESSION['IS_LOGIN'])) {
	header('location:login.php');
	die();
	}


	$id=base64_decode($_GET['id']);
	$status=1;
	
	$sql = "UPDATE admin SET status=:status WHERE id=:id";
	
	$stmt = $con->prepare($sql);
	$query = $stmt->execute(['status'=>$status, 'id'=>$id]);
	
	header('location:admin_list.php');
 ?>