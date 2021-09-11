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
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>UserName</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
      
                  $query = "SELECT * FROM admin";
                  $stmt=$con->prepare($query);
                  $stmt->execute();
                  $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
                  $total=$stmt->rowCount();
                  
                  if($total>0)
                  {
                  $i=1;
                  foreach ($result as $row)
                  { ?>
                  <tr>
                    <td>
                      <?php echo $i++; ?> 
                    </td>
                    <td><?=$row["user"]?></td>
                    <td><?=$row["password"]?></td>
                    <td><?=$row["role"]?></td>
                    <td>
                      <?php 
                        if ($row['status']==1) {
                      ?>
                        <a href="admin_status_inactive.php?id=<?= base64_encode($row['id']) ?>" class="btn btn-info">
                          <span>Active</span>
                        </a>
                      <?php 
                        } else  {
                      ?>
                        <a href="admin_status_active.php?id=<?= base64_encode($row['id']) ?>" class="btn btn-warning">
                          <span>Inactive</span>
                        </a>
                      <?php 
                        }
                      ?>
                    </td>
                    <td>
                      <a href="admin_update.php?id=<?php echo $row['id']; ?>" class="btn btn-success m-1">Update</a>
                      <a href="admin_delete.php?id=<?php echo $row['id']; ?>" onclick= 'return checkdelete()' class="btn btn-danger m-1">Delete</a>
                    </td>
                  </tr>
                  <?php
                  }
                  }
                  else
                  {
                  echo "No Records Found";
                  }
                  ?>
                </tbody>
              </table>
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

    <script>
    function checkdelete()
    {
    return confirm('Are you sure you want to DELETE this record?');
    }
    </script>
  </body>
</html>