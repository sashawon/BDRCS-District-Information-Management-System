<?php 
  require('../database.php');
  //error_reporting(0);
  session_start();
  if (!isset($_SESSION['IS_LOGIN'])) {
    header('location:login.php');
    die();
  }
  // getting info and storing in variables 
  if(isset($_GET['id'])){
  $id = $_GET['id']; 
  $sql = "DELETE FROM `activities` WHERE `id`=:id"; 
  //printf($sql); 

  $stmt = $con->prepare($sql);
  $data = $stmt->execute(['id'=>$id]);

  if($data){
    echo "<script>alert('Record Deleted form Database')</script>";
    ?><META HTTP-EQUIV="Refresh" CONTENT="0; URL= https://chuadangarcunit.org/bdrcs_auth/activities_list.php"><?php
  } else {
    echo "<script>alert('Failed to Delete Record form Database')</script>";
  } 

  }
?>