<?php 
  require('../database.php');
  error_reporting(0);
  session_start();
  if (!isset($_SESSION['IS_LOGIN'])) {
    header('location:login.php');
    die();
  }
?>

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

              $status = 1;
              $query = "SELECT * FROM blood_donor WHERE status=:status AND `name` like '%$search%' OR `address` like '%$search%' OR `occupation` like '%$search%' OR `blood` like '%$search%' OR `gender` like '%$search%' OR `dob` like '%$search%' OR `mobile` like '%$search%' OR `email` like '%$search%' ORDER BY id ASC";
              $stmt=$con->prepare($query);
              $stmt->execute(['status'=>$status]);
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
                  <a class="btn btn-primary" href="print_blood_donor.php?status=1&&query=<?php echo $query; ?>" target="_blank"><i class="fa fa-print"></i> Print</a>                  
                </div>             
              </div>
            </div>
            <div class="col-lg-12 main-chart">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Occupation</th>
                    <th>Blood Group</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Contact</th>
                    <th>Email</th>
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
                      <input type="hidden" value="<?=$row["id"]?>"> 
                    </td>
                    <td><?=$row["name"]?></td>
                    <td><?=$row["address"]?></td>
                    <td><?=$row["occupation"]?></td>
                    <td><?=$row["blood"]?></td>
                    <td><?=$row["gender"]?></td>
                    <td><?=$row["dob"]?></td>
                    <td><?=$row["mobile"]?></td>
                    <td><?=$row["email"]?></td>

                    <td>
                      <a href="blood_donor_update.php?id=<?php echo $row['id']; ?>" class="btn btn-success m-1">Update</a>
                      <a href="blood_donor_delete.php?id=<?php echo $row['id']; ?>" onclick= 'return checkdelete()' class="btn btn-danger m-1">Delete</a>
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
              $status = 1;
              $query = "SELECT * FROM blood_donor WHERE status=:status ORDER BY id ASC";
              $stmt=$con->prepare($query);
              $stmt->execute(['status'=>$status]);
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
                  <a class="btn btn-primary" href="print_blood_donor.php?status=1&&query=<?php echo $query; ?>" target="_blank"><i class="fa fa-print"></i> Print</a>                  
                </div>             
              </div>
            </div>
            <div class="col-lg-12 main-chart">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Occupation</th>
                    <th>Blood Group</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Contact</th>
                    <th>Email</th>
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
                      <input type="hidden" value="<?=$row["id"]?>"> 
                    </td>
                    <td><?=$row["name"]?></td>
                    <td><?=$row["address"]?></td>
                    <td><?=$row["occupation"]?></td>
                    <td><?=$row["blood"]?></td>
                    <td><?=$row["gender"]?></td>
                    <td><?=$row["dob"]?></td>
                    <td><?=$row["mobile"]?></td>
                    <td><?=$row["email"]?></td>

                    <td>
                      <a href="blood_donor_update.php?id=<?php echo $row['id']; ?>" class="btn btn-success m-1">Update</a>
                      <a href="blood_donor_delete.php?id=<?php echo $row['id']; ?>" onclick= 'return checkdelete()' class="btn btn-danger m-1">Delete</a>
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
          <?php } ?>
        </section>
      </section>
      <!--main content end-->
      <!--footer start-->
      <?php include('footer.php'); ?>
      <!--footer end-->
  </body>
</html>