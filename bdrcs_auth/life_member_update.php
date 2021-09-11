<?php 
  require('../database.php');
  error_reporting(0);
  session_start();
  if (!isset($_SESSION['IS_LOGIN'])) {
    header('location:login.php');
    die();
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Titel-->
    <title>Admin Panel | Bangladesh Red Crescent Society</title>
    <link rel="icon" type="image/png" sizes="32x32" href="images/logo.png">
    <!--bootstrap-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!--Custom CSS-->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/nav-style.css" rel="stylesheet">
    <link href="assets/css/nav-style-responsive.css" rel="stylesheet">
    <!--font awesome-->
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <!--fonts-->
    <link rel="stylesheet" href="assets/fonts/fonts.css">
  </head>
  <body>
    <section id="container">
      <!--header start-->
      <?php include('header.php'); ?>
      <!--header end-->
      <!--sidebar start-->
      <?php include('aside.php'); ?>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">
          <div class="row">
            <div class="col-lg-12 main-chart">
              <?php
              // getting info and storing in variables 
              if(isset($_GET['id'])){
                $id = $_GET['id']; 
                $sql = "select * from life_member where id=:id"; 
                
                $stmt = $con->prepare($sql);
                $stmt->execute(['id'=>$id]);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                //print_r($result); die();
                
                if ($result)
                {
                foreach ($result as $row)
                  {
                  $id = $row['id']; 
                  $l_id = $row['l_id']; 
                  $name = $row['name']; 
                  $fname = $row['fname'];
                  $mname = $row['mname'];
                  $address = $row['address'];
                  $nid = $row['nid'];
                  $mobile = $row['mobile'];
                  $join_date = $row['join_date'];
                  $s_money = $row['s_money'];
                  $comment = $row['comment'];
                  }
                // Free result set
                //mysqli_free_result($result);
              }
              }               

              ?>
              <form class="form-horizontal" action='life_member_update_final.php' method="POST" enctype="multipart/form-data"> 
                <fieldset>
                  <h3 class="text-center pb-4">Update Life Member</h3>
                  <input type="hidden" name="id" value="<?php echo $id; ?>"> 
                  <div class="row mb-3">
                    <!-- Life Member No -->
                    <label class="col-sm-2 col-form-label" for="l_id">Life Member No</label>
                    <div class="col-sm-10">
                      <input type="text" id="l_id" name="l_id" placeholder="" value="<?php echo $l_id; ?>" class="form-control" required>
                      <p class="help-block">Please provide Life Number, required field</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Full Name -->
                    <label class="col-sm-2 col-form-label" for="name">Name</label>
                    <div class="col-sm-10">
                      <input type="text" id="name" name="name" placeholder="" value="<?php echo $name; ?>" class="form-control" required>
                      <p class="help-block">Please provide Name, required field</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Father name -->
                    <label class="col-sm-2 col-form-label" for="f_name">Father Name</label>
                    <div class="col-sm-10">
                      <input type="text" id="f_name" name="f_name" placeholder="" value="<?php echo $fname; ?>" class="form-control">
                      <p class="help-block">Please provide Father name</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Mother name -->
                    <label class="col-sm-2 col-form-label" for="m_name">Mother Name</label>
                    <div class="col-sm-10">
                      <input type="text" id="m_name" name="m_name" placeholder="" value="<?php echo $mname; ?>" class="form-control">
                      <p class="help-block">Please provide Mother name</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Address -->
                    <label class="col-sm-2 col-form-label" for="address">Address</label>
                    <div class="col-sm-10">
                      <input type="text" id="address" name="address" placeholder="" value="<?php echo $address; ?>" class="form-control" required>
                      <p class="help-block">Please provide Address, required field</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- NID No -->
                    <label class="col-sm-2 col-form-label" for="NID No">NID No</label>
                    <div class="col-sm-10">
                      <input type="text" id="nid" name="nid" placeholder="" value="<?php echo $nid; ?>" class="form-control">
                      <p class="help-block">Please provide Time NID No, required field</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- mobile -->
                    <label class="col-sm-2 col-form-label" for="mobile">Phone/Mobile Number</label>
                    <div class="col-sm-10">
                      <input type="text" id="mobile" name="mobile" placeholder="" value="<?php echo $mobile; ?>" class="form-control">
                      <p class="help-block">Please provide Phone Number, required field</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Join Data -->
                    <label class="col-sm-2 col-form-label" for="Join Data">Join Data</label>
                    <div class="col-sm-10">
                      <input type="text" id="j_data" name="j_data" placeholder="" value="<?php echo $join_date; ?>" class="form-control" required>
                      <p class="help-block">Please provide Time Join Data, required field</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Share Money -->
                    <label class="col-sm-2 col-form-label" for="Share Money">Share Money</label>
                    <div class="col-sm-10">
                      <input type="text" id="s_money" name="s_money" placeholder="" value="<?php echo $s_money; ?>" class="form-control" required>
                      <p class="help-block">Please provide Time Share Money, required field</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Comment -->
                    <label class="col-sm-2 col-form-label" for="Comment">Comment</label>
                    <div class="col-sm-10">
                      <input type="text" id="comment" name="comment" placeholder="" value="<?php echo $comment; ?>" class="form-control">
                      <p class="help-block">Please provide Time Comment, required field</p>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <!-- Button -->
                    <div class="controls text-center">
                      <input type="submit" value="Update Life Member" name="submit" class="btn btn-success">
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
          <!-- /row -->
        </section>
      </section>
      <!--main content end-->
      <!--footer start-->
      <?php include('footer.php'); ?>
      <!--footer end-->
    </section>
    <!-- javascript -->
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js"></script>
    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
  </body>
</html>