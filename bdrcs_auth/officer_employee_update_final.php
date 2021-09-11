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
  $designation='';
  $email='';
  $mobile='';
  $duration='';
  $image='';

  $id=$_POST['id'];
  $name=$_POST['name'];
  $designation=$_POST['designation'];
  $email=$_POST['email'];
  $mobile=$_POST['mobile'];
  $duration=$_POST['duration'];
  $image=$_FILES['image'];

  $imagename = $image['name'];
  $imagepath = $image['tmp_name'];
  $imageerror = $image['error'];

  if ($imageerror!=0) {
    $query="SELECT `photo` FROM `employee` WHERE `id`=:id";
    $stmt=$con->prepare($query);
    $stmt->execute(['id'=>$id]);
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    $imagename=$row['photo'];
  } else if ($imageerror==0) {
    $destfile = '../images/office_employee/'.$imagename;
    move_uploaded_file($imagepath, $destfile);
  }


  $sql = "UPDATE `employee` SET `name`=:name,`designation`=:designation,`email`=:email,`mobile`=:mobile,`duration`=:duration,`photo`=:imagename WHERE `id`=:id";

  $stmt = $con->prepare($sql);
  $data = $stmt->execute(['name'=>$name, 'designation'=>$designation, 'email'=>$email, 'mobile'=>$mobile, 'duration'=>$duration, 'imagename'=>$imagename, 'id'=>$id]);

    if($data){
    echo "<script>alert('Record Updated')</script>";
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL= https://chuadangarcunit.org/bdrcs_auth/officer_employee_list.php">
    <?php
    } else {
    echo "Failed to Update Record";
    }

?>