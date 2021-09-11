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
                $sql = "select * from activities where id=:id"; 

                $stmt = $con->prepare($sql);
                $stmt->execute(['id'=>$id]);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                //print_r($result); die();
                
                if ($result)
                {
                foreach ($result as $row)
                  {
                  $id = $row['id']; 
                  $photo = $row['photo'];
                  $title = $row['title']; 
                  $type = $row['type'];
                  $des = $row['des'];
                  $date = $row['date'];
                  $file_type = $row['file_type'];
                  }
                // Free result set
                //mysqli_free_result($result);
              }
              }               

              ?>
              <form class="form-horizontal" action='activities_update_final.php' method="POST" enctype="multipart/form-data">
                <fieldset> 
                  <h3 class="text-center pb-4">Update Activity</h3> 
                  <input type="hidden" name="id" value="<?php echo $id; ?>">               
                  <div class="row mb-3">
                    <!-- Activity Title -->
                    <label class="col-sm-2 col-form-label" for="title">Title</label>
                    <div class="col-sm-10">
                      <input type="text" id="title" name="title" placeholder="" value="<?php echo $title; ?>" class="form-control">
                      <p class="help-block">Please provide Title</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Program Date -->
                    <label class="col-sm-2 col-form-label" for="date">Program Date</label>
                    <div class="col-sm-10">
                      <input type="text" id="date" name="date" placeholder="20-01-2021" value="<?php echo $date; ?>" class="form-control">
                      <p class="help-block">Please provide Program Date</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Program type -->
                    <label class="col-sm-2 col-form-label" for="type">Program type</label>
                    <div class="col-sm-10">
                      <select name="type" class="form-control" id="type">
                        <option value="Regular Event"
                          <?php
                            if ($type=="Regular Event") {
                              echo "selected";
                            }
                          ?>
                        >Regular Event</option>
                        <option value="Emergency Event"
                          <?php
                            if ($type=="Emergency Event") {
                              echo "selected";
                            }
                          ?>
                        >Emergency Event</option>
                        <option value="Other Event"
                          <?php
                            if ($type=="Other Event") {
                              echo "selected";
                            }
                          ?>
                        >Other Event</option>
                      </select>
                      <p class="help-block">Please provide Program type</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Description -->
                    <label class="col-sm-2 col-form-label" for="des">Description</label>
                    <div class="col-sm-10">
                      <textarea id="des" name="des" placeholder="" class="form-control" rows="20" ><?php echo $des; ?></textarea>
                      <p class="help-block">Please provide Description</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Photos -->
                    <label class="col-sm-2 col-form-label" for="photo">Photos</label>
                    <div class="col-sm-10">
                      <input type="file" id="image" name="image[]" accept = video/*,image/* placeholder="" value="<?php echo $photo; ?>" class="form-control" multiple>
                      <p class="help-block">Please provide Image</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Button -->
                    <div class="controls text-center">
                      <input type="submit" value="Upadte Activity" name="submit" class="btn btn-success">
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