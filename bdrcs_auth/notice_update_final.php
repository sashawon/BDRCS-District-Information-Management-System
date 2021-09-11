<?php 
  require('../database.php');
  error_reporting(0);
  session_start();
  if (!isset($_SESSION['IS_LOGIN'])) {
    header('location:login.php');
    die();
  }

  $id='';
  $title='';
  $des='';
  $date='';

  $id=$_POST['id'];
  $title=$_POST['title'];
  $des=$_POST['des'];
  $date=$_POST['date'];


  $sql = "UPDATE `notice` SET `title`=:title,`des`=:des,`date`=:date WHERE `id`=:id";

  $stmt = $con->prepare($sql);
  $data = $stmt->execute(['title'=>$title, 'des'=>$des, 'date'=>$date, 'id'=>$id]);

    if($data){
    echo "<script>alert('Record Updated')</script>";
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL= https://chuadangarcunit.org/bdrcs_auth/notice_list.php">
    <?php
    } else {
    echo "Failed to Update Record";
    }

?>