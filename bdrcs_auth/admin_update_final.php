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
  $user=$_POST['user'];
  $password=$_POST['password'];
  $role=$_POST['role'];
  $status=$_POST['status'];


  $sql = "UPDATE `admin` SET `user`=:user,`password`=:password,`role`=:role,`status`=:status WHERE `id`=:id";

  $stmt = $con->prepare($sql);
  $data = $stmt->execute(['user'=>$user, 'password'=>$password, 'role'=>$role, 'status'=>$status, 'id'=>$id]);

    if($data){
    echo "<script>alert('Record Updated')</script>";
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL= https://chuadangarcunit.org/bdrcs_auth/admin_list.php">
    <?php
    } else {
    echo "Failed to Update Record";
    }

?>