<?php 
  require('../database.php');
  error_reporting(0);
  session_start();
  if (!isset($_SESSION['IS_LOGIN'])) {
    header('location:login.php');
    die();
  }

  $id='';
  $user='';
  $password='';
  $role='';
  $status='';

  $id=$_POST['id'];
  $image = $_FILES['image'];
  $status=$_POST['status'];

  $imagename = $image['name'];
  $imagepath = $image['tmp_name'];
  $imageerror = $image['error'];

  if ($imageerror==0) {
    $destfile = '../images/slider/'.$imagename;
    move_uploaded_file($imagepath, $destfile);
  }


  $sql = "UPDATE `banners` SET `image`=:imagename,`status`=:status WHERE `id`=:id";

  $stmt = $con->prepare($sql);
  $data = $stmt->execute(['imagename'=>$imagename, 'status'=>$status, 'id'=>$id]);

    if($data){
    echo "<script>alert('Record Updated')</script>";
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL= https://chuadangarcunit.org/bdrcs_auth/admin_list.php">
    <?php
    } else {
    echo "Failed to Update Record";
    }

?>