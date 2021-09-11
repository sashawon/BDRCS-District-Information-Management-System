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
  $address='';
  $occupation='';
  $blood='';
  $gender='';
  $dob='';
  $mobile='';
  $email='';

  $id=$_POST['id'];
  $name=$_POST['name'];
  $address=$_POST['address'];
  $occupation=$_POST['occupation'];
  $blood=$_POST['blood'];
  $gender=$_POST['gender'];
  $dob=$_POST['dob'];
  $mobile=$_POST['mobile'];
  $email=$_POST['email'];


  $sql = "UPDATE `blood_donor` SET `name`=:name,`address`=:address,`occupation`=:occupation,`blood`=:blood,`gender`=:gender,`dob`=:dob,`mobile`=:mobile,`email`=:email WHERE `id`=:id";

  $stmt = $con->prepare($sql);
  $data = $stmt->execute(['name'=>$name, 'address'=>$address, 'occupation'=>$occupation, 'blood'=>$blood, 'gender'=>$gender, 'dob'=>$dob, 'mobile'=>$mobile, 'email'=>$email, 'id'=>$id]);

    if($data){
    echo "<script>alert('Record Updated')</script>";
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL= https://chuadangarcunit.org/bdrcs_auth/blood_donor_list.php">
    <?php
    } else {
    echo "Failed to Update Record";
    }

?>