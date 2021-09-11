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
          <?php
            if (isset($_POST['submit'])) {
              $search=$_POST['search'];

              $query = "SELECT * FROM life_member WHERE `l_id` like '%$search%' OR `name` like '%$search%' OR `address` like '%$search%' OR `mobile` like '%$search%' OR `join_date` like '%$search%' ORDER BY id ASC";
              $stmt=$con->prepare($query);
              $stmt->execute();
              $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
              $total=$stmt->rowCount();
          ?> 
          <div class="row">
            <div class="col-lg-12 main-chart">
              <div class="row">
                <div class="col-4">
                  <form class="d-flex" action="" method="POST">
                    <input class="form-control me-2" type="search" name="search" value="<?= isset($search) ? $search:'' ?>" placeholder="Search" aria-label="Search">&nbsp;
                    <button class="btn btn-outline-success" type="submit" name="submit">Search</button>
                  </form>
                </div>
                <div class="col-7 d-flex flex-row-reverse">
                  <a class="btn btn-primary" href="print_life_member.php?query=<?php echo $query; ?>" target="_blank"><i class="fa fa-print"></i> Print</a>                  
                </div>             
              </div>
            </div>
            <div class="col-lg-12 main-chart">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>ক্রঃ নং</th>
                    <th>আজীবন সদস্য নং</th>
                    <th>নাম</th>
                    <th>পিতার নাম</th>
                    <th>মাতার নাম</th>
                    <th>ঠিকানা</th>
                    <th>জাতীয় পরিচয় পত্র নং</th>
                    <th>মোবাইল নং</th>
                    <th>অন্তর্ভুক্তির তারিখ</th>
                    <th>শেয়ারমানি প্রদত্ত</th>
                    <th>মন্তব্য</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php                   
                    if($total>0) {
                    $i=1;
                    foreach ($result as $row) { 
                  ?>

                  <tr>
                    <td>
                      <?php echo $i++; ?> 
                    </td>
                    <td><?=$row["l_id"]?></td>
                    <td><?=$row["name"]?></td>
                    <td><?=$row["fname"]?></td>
                    <td><?=$row["mname"]?></td>
                    <td><?=$row["address"]?></td>
                    <td><?=$row["nid"]?></td>
                    <td><?=$row["mobile"]?></td>
                    <td><?=$row["join_date"]?></td>
                    <td><?=$row["s_money"]?></td>
                    <td><?=$row["comment"]?></td>
                    <td>
                      <a href="life_member_update.php?id=<?php echo $row['id']; ?>" class="btn btn-success m-1">Update</a>
                      <a href="life_member_delete.php?id=<?php echo $row['id']; ?>" onclick= 'return checkdelete()' class="btn btn-danger m-1">Delete</a>
                    </td>
                  </tr>
                  <?php
                      }
                    } else {
                      echo "No Records Found";
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /row -->
          <?php 
            } else {
              $query = "SELECT * FROM life_member ORDER BY id ASC";
              $stmt=$con->prepare($query);
              $stmt->execute();
              $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
              $total=$stmt->rowCount();
           ?>
          <div class="row">
            <div class="col-lg-12 main-chart">
              <div class="row">
                <div class="col-4">
                  <form class="d-flex" action="" method="POST">
                    <input class="form-control me-2" type="search" name="search" value="<?= isset($search) ? $search:'' ?>" placeholder="Search" aria-label="Search">&nbsp;
                    <button class="btn btn-outline-success" type="submit" name="submit">Search</button>
                  </form>
                </div>
                <div class="col-7 d-flex flex-row-reverse">
                  <a class="btn btn-primary" href="print_life_member.php?query=<?php echo $query; ?>" target="_blank"><i class="fa fa-print"></i> Print</a>                  
                </div>             
              </div>
            </div>
            <div class="col-lg-12 main-chart">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>ক্রঃ নং</th>
                    <th>আজীবন সদস্য নং</th>
                    <th>নাম</th>
                    <th>পিতার নাম</th>
                    <th>মাতার নাম</th>
                    <th>ঠিকানা</th>
                    <th>জাতীয় পরিচয় পত্র নং</th>
                    <th>মোবাইল নং</th>
                    <th>অন্তর্ভুক্তির তারিখ</th>
                    <th>শেয়ারমানি প্রদত্ত</th>
                    <th>মন্তব্য</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php                   
                    if($total>0) {
                    $i=1;
                    foreach ($result as $row) { 
                  ?>
                  
                  <tr>
                    <td>
                      <?php echo $i++; ?> 
                    </td>
                    <td><?=$row["l_id"]?></td>
                    <td><?=$row["name"]?></td>
                    <td><?=$row["fname"]?></td>
                    <td><?=$row["mname"]?></td>
                    <td><?=$row["address"]?></td>
                    <td><?=$row["nid"]?></td>
                    <td><?=$row["mobile"]?></td>
                    <td><?=$row["join_date"]?></td>
                    <td><?=$row["s_money"]?></td>
                    <td><?=$row["comment"]?></td>
                    <td>
                      <a href="life_member_update.php?id=<?php echo $row['id']; ?>" class="btn btn-success m-1">Update</a>
                      <a href="life_member_delete.php?id=<?php echo $row['id']; ?>" onclick= 'return checkdelete()' class="btn btn-danger m-1">Delete</a>
                    </td>
                  </tr>
                  <?php
                    }
                  } else {
                    echo "No Records Found";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        <?php } ?>
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