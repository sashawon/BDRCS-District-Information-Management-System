<?php 
  require('../database.php');
  error_reporting(0);
  session_start();
  if (!isset($_SESSION['IS_LOGIN'])) {
    header('location:login.php');
    die();
  }

  $id='';
  $image='';
  $name='';
  $reg_no='';
  $id_card_no='';
  $mobile='';
  $email='';
  $father_name='';
  $mother_name='';
  $gender='';
  $nid='';
  $birth_certi='';
  $passport='';
  $occupation='';
  $education='';
  $dob='';
  $blood='';
  $marital_status='';
  $nationality='';
  $address='';
  $fb_id='';
  $membership_type='';
  $position='';
  $date_of_joining='';

  $id=$_POST['id'];
  $image=$_FILES['image'];
  $name=$_POST['name'];
  $reg_no=$_POST['reg_no'];
  $id_card_no=$_POST['id_card_no'];
  $mobile=$_POST['mobile'];
  $email=$_POST['email'];
  $father_name=$_POST['f_name'];
  $mother_name=$_POST['m_name'];
  $gender=$_POST['gender'];
  $nid=$_POST['nid'];
  $birth_certi=$_POST['birth_certi'];
  $passport=$_POST['passport'];
  $occupation=$_POST['occupation'];
  $education=$_POST['education'];
  $dob=$_POST['dob'];
  $blood=$_POST['blood'];
  $marital_status=$_POST['marital_status'];
  $nationality=$_POST['nationality'];
  $address=$_POST['address'];
  $fb_id=$_POST['fb_id'];
  $membership_type=$_POST['membership_type'];
  $position=$_POST['position'];
  $date_of_joining=$_POST['date_of_joining'];

  $imagename = $image['name'];
  $imagepath = $image['tmp_name'];
  $imageerror = $image['error'];

  if ($imageerror!=0) {
    $query="SELECT `image` FROM `volunteer` WHERE `id`=:id";
    $stmt=$con->prepare($query);
    $stmt->execute(['id'=>$id]);
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    $imagename=$row['image'];
  } else if ($imageerror==0) {
    $destfile = '../images/volunteer/'.$imagename;
    move_uploaded_file($imagepath, $destfile);
  }


  $sql = "UPDATE `volunteer` SET `image`=:imagename,`name`=:name,`reg_no`=:reg_no,`id_card_no`=:id_card_no,`mobile`=:mobile,`email`=:email,`mother_name`=:mother_name,`father_name`=:father_name,`gender`=:gender,`nid`=:nid,`birth_certi`=:birth_certi,`passport`=:passport,`occupation`=:occupation,`education`=:education,`dob`=:dob,`blood`=:blood,`marital_status`=:marital_status,`nationality`=:nationality,`address`=:address,`fb_id`=:fb_id,`membership_type`=:membership_type,`position`=:position,`date_of_joining`=:date_of_joining WHERE `id`=:id";

  $stmt = $con->prepare($sql);
  $data = $stmt->execute(['imagename'=>$imagename, 'name'=>$name, 'reg_no'=>$reg_no, 'id_card_no'=>$id_card_no, 'mobile'=>$mobile, 'email'=>$email, 'mother_name'=>$mother_name, 'father_name'=>$father_name, 'gender'=>$gender, 'nid'=>$nid, 'birth_certi'=>$birth_certi, 'passport'=>$passport, 'occupation'=>$occupation, 'education'=>$education, 'dob'=>$dob, 'blood'=>$blood, 'marital_status'=>$marital_status, 'nationality'=>$nationality, 'address'=>$address, 'fb_id'=>$fb_id, 'membership_type'=>$membership_type, 'position'=>$position, 'date_of_joining'=>$date_of_joining, 'id'=>$id]);

    if($data){
    echo "<script>alert('Record Updated')</script>";
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL= https://chuadangarcunit.org/bdrcs_auth/volunteer_list.php">
    <?php
    } else {
    echo "Failed to Update Record";
    }

?>