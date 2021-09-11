<?php 
  require('../database.php');
  error_reporting(0);
  session_start();
  if (!isset($_SESSION['IS_LOGIN'])) {
    header('location:login.php');
    die();
  }

  $id='';
  $l_id='';
  $name='';
  $fname='';
  $mname='';
  $address='';
  $nid='';
  $mobile='';
  $join_date='';
  $s_money='';
  $comment='';

  $id=$_POST['id'];
  $l_id=$_POST['l_id'];
  $name=$_POST['name'];
  $fname=$_POST['f_name'];
  $mname=$_POST['m_name'];
  $address=$_POST['address'];
  $nid=$_POST['nid'];
  $mobile=$_POST['mobile'];
  $join_date=$_POST['j_data'];
  $s_money=$_POST['s_money'];
  $comment=$_POST['comment'];


  $sql = "UPDATE `life_member` SET `l_id`=:l_id,`name`=:name,`fname`=:fname,`mname`=:mname,`address`=:address,`nid`=:nid,`mobile`=:mobile,`join_date`=:join_date,`s_money`=:s_money,`comment`=:comment WHERE `id`=:id";

  $stmt = $con->prepare($sql);
  $data = $stmt->execute(['l_id'=>$l_id, 'name'=>$name, 'fname'=>$fname, 'mname'=>$mname, 'address'=>$address, 'nid'=>$nid, 'mobile'=>$mobile, 'join_date'=>$join_date, 's_money'=>$s_money, 'comment'=>$comment, 'id'=>$id]);

    if($data){
    echo "<script>alert('Record Updated')</script>";
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL= https://chuadangarcunit.org/bdrcs_auth/life_member_list.php">
    <?php
    } else {
    echo "Failed to Update Record";
    }

?>