<?php 
  require('../database.php');
  error_reporting(0);
  session_start();
  if (!isset($_SESSION['IS_LOGIN'])) {
    header('location:login.php');
    die();
  }

  $id='';
  $photo='';
  $title='';
  $des='';
  $date='';

  $id=$_POST['id'];
  $photo=$_POST['photo'];
  $title=$_POST['title'];
  $des=$_POST['des'];
  $date=$_POST['date'];

  $file='';
  $file_tmp='';
  $location="../images/publication/";
  $data='';

  $error= $_FILES['image']['error'];
  
    if ($error[0]!=0) {
      $query="SELECT `photo`,`file_type` FROM `publication` WHERE `id`=:id";
      $stmt=$con->prepare($query);
      $stmt->execute(['id'=>$id]);
      $row=$stmt->fetch(PDO::FETCH_ASSOC);
      $data=$row['photo'];
      $file_type=$row['file_type'];
    } else {
      foreach ($_FILES['image']['name'] as $key => $value) {
        $file=$_FILES['image']['name'][$key];
        $upload_type=$_FILES['image']['type'][$key];
        $file_tmp=$_FILES['image']['tmp_name'][$key];
        move_uploaded_file($file_tmp, $location.$file);
        $data .=$file."**";
        $upload_type = explode("/", $upload_type);
        $file_type .=$upload_type[0]."**";
      }
    }


  $sql = "UPDATE `publication` SET `photo`=:data,`title`=:title,`des`=:des,`date`=:date,`file_type`=:file_type WHERE `id`=:id";

  $stmt = $con->prepare($sql);
  $data = $stmt->execute(['data'=>$data, 'title'=>$title, 'des'=>$des, 'date'=>$date, 'file_type'=>$file_type, 'id'=>$id]);

    if($data){
    echo "<script>alert('Record Updated')</script>";
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL= https://chuadangarcunit.org/bdrcs_auth/publication_list.php">
    <?php
    } else {
    echo "Failed to Update Record";
    }

?>