<?php 
  require('../database.php');
  error_reporting(0);
  session_start();
  if (!isset($_SESSION['IS_LOGIN'])) {
    header('location:login.php');
    die();
  }

  $id='';
  $name='';
  $mobile='';
  $email='';
  $donate_amount='';
  $donate_date='';

  $id=$_POST['id'];
  $name=$_POST['name'];
  $mobile=$_POST['mobile'];
  $email=$_POST['email'];
  $donate_amount=$_POST['aod'];
  $donate_date=$_POST['dod'];


  $sql = "UPDATE `donor_member` SET `name`=:name,`mobile`=:mobile,`email`=:email,`donate_amount`=:donate_amount,`donate_date`=:donate_date WHERE `id`=:id;";

  $stmt = $con->prepare($sql);
  $data = $stmt->execute(['name'=>$name, 'mobile'=>$mobile, 'email'=>$email, 'donate_amount'=>$donate_amount, 'donate_date'=>$donate_date, 'id'=>$id]);

    if($data){
    echo "<script>alert('Record Updated')</script>";
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL= https://chuadangarcunit.org/bdrcs_auth/donor_member_list.php">
    <?php
    } else {
    echo "Failed to Update Record";
    }

?>