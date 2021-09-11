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
                $sql = "select * from admin where id=:id"; 
                
                $stmt = $con->prepare($sql);
                $stmt->execute(['id'=>$id]);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                //print_r($result); die();

                if ($result)
                {
                foreach ($result as $row)
                  {
                  $id = $row['id']; 
                  $user = $row['user']; 
                  $password = $row['password']; 
                  $role = $row['role'];
                  $status = $row['status'];
                  }
                // Free result set
                //mysqli_free_result($result);
              }
              }               

              ?>
              <form class="form-horizontal" action="admin_update_final.php" method="POST">
                <fieldset>              
                  <h3 class="text-center pb-4">Update Admin Info</h3>  
                  <input type="hidden" name="id" value="<?php echo $id; ?>">              
                  <div class="row mb-3">
                    <!-- User Name -->
                    <label class="col-sm-2 col-form-label" for="User">User Name</label>
                    <div class="col-sm-10">
                      <input type="text" id="user" name="user" placeholder="" value="<?php echo $user; ?>" class="form-control" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Password -->
                    <label class="col-sm-2 col-form-label" for="password">Password</label>
                    <div class="col-sm-10">
                      <input type="text" id="password" name="password" placeholder="" value="<?php echo $password; ?>" class="form-control" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Select Role -->
                    <label class="col-sm-2 col-form-label" for="Role">Role</label>
                    <div class="col-sm-10">
                      <select name="role" class="form-control" class="input-xlarge" id="role">
                        <option value="super_admin"
                          <?php
                            if ($role=="super_admin") {
                              echo "selected";
                            }
                          ?>
                        >Super Admin</option>
                        <option value="moderator"
                          <?php
                            if ($role=="moderator") {
                              echo "selected";
                            }
                          ?>
                        >Moderator</option>
                        <option value="editor"
                          <?php
                            if ($role=="editor") {
                              echo "selected";
                            }
                          ?>
                        >Editor</option>
                      </select>
                      <p class="help-block">Select Role</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Status -->
                    <label class="col-sm-2 col-form-label" for="status">Status</label>
                    <div class="col-sm-10">
                      <select name="status" class="form-control" class="input-xlarge" id="status">
                        <option value="1"
                          <?php
                            if ($status=="1") {
                              echo "selected";
                            }
                          ?>
                        >Active</option>
                        <option value="0"
                          <?php
                            if ($status=="0") {
                              echo "selected";
                            }
                          ?>
                        >Inactive</option>
                      </select>
                      <p class="help-block">Select Status</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Button -->
                    <div class="controls text-center">
                      <input type="submit" value="Update" name="submit" class="btn btn-success">
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

