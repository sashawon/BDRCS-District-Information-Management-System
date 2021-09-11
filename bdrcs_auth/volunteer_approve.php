<?php 
  require('../database.php');
  error_reporting(0);
  session_start();
  if (!isset($_SESSION['IS_LOGIN'])) {
    header('location:login.php');
    die();
  }


  if(isset($_GET['status']) && isset($_GET['id'])){
      $status=$_GET['status']; 
      //printf($status);
      $id = $_GET['id']; 

      if($status=='1'){
        $status=1;
        //status set to 1
        $sql="UPDATE volunteer SET status=:status WHERE id=:id";
        
        $stmt = $con->prepare($sql);
        $result = $stmt->execute(['status'=>$status, 'id'=>$id]);

        if ($result === TRUE) {
           ?><META HTTP-EQUIV="Refresh" CONTENT="0; URL= https://chuadangarcunit.org/bdrcs_auth/volunteer_pending_list.php"><?php 
        } else {
           ?><META HTTP-EQUIV="Refresh" CONTENT="0; URL= https://chuadangarcunit.org/bdrcs_auth/volunteer_pending_list.php"><?php
        }

      }

    }else{
    	?><META HTTP-EQUIV="Refresh" CONTENT="0; URL= https://chuadangarcunit.org/bdrcs_auth/volunteer_pending_list.php"><?php
    }


?>