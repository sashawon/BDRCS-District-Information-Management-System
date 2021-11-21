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

              $query = "SELECT * FROM ec_member WHERE `name` like '%$search%' OR `designation` like '%$search%' OR `email` like '%$search%' OR `mobile` like '%$search%' OR `duration` like '%$search%' ORDER BY id ASC";
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
                  <a class="btn btn-primary" href="print_executive_committee.php?query=<?php echo $query; ?>" target="_blank"><i class="fa fa-print"></i> Print</a>                  
                </div>             
              </div>
            </div>
            <div class="col-lg-12 main-chart">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>email</th>
                    <th>Contact No.</th>
                    <th>Time Duration</th>
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
                      <input type="hidden" value="<?=$row["id"]?>">
                    </td>
                    <td>
                      <img style="width: 100px; height:120px;" class="img-fluid" src="<?php echo '../images/ec_committee/'.$row["photo"]; ?>" alt="Photo">
                    </td>
                    <td><?=$row["name"]?></td>
                    <td><?=$row["designation"]?></td>
                    <td><?=$row["email"]?></td>
                    <td><?=$row["mobile"]?></td>
                    <td><?=$row["duration"]?></td>
                    <td>
                      <a href="executive_committee_update.php?id=<?php echo $row['id']; ?>" class="btn btn-success m-1">Update</a>
                      <a href="executive_committee_delete.php?id=<?php echo $row['id']; ?>" onclick= 'return checkdelete()' class="btn btn-danger m-1">Delete</a>
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

          <?php 
            } else {
              $query = "SELECT * FROM ec_member ORDER BY id ASC";
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
                  <a class="btn btn-primary" href="print_executive_committee.php?query=<?php echo $query; ?>" target="_blank"><i class="fa fa-print"></i> Print</a>                  
                </div>             
              </div>
            </div>
            <div class="col-lg-12 main-chart">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>email</th>
                    <th>Contact No.</th>
                    <th>Time Duration</th>
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
                      <input type="hidden" value="<?=$row["id"]?>">
                    </td>
                    <td>
                      <img style="width: 100px; height:120px;" class="img-fluid" src="<?php echo '../images/ec_committee/'.$row["photo"]; ?>" alt="Photo">
                    </td>
                    <td><?=$row["name"]?></td>
                    <td><?=$row["designation"]?></td>
                    <td><?=$row["email"]?></td>
                    <td><?=$row["mobile"]?></td>
                    <td><?=$row["duration"]?></td>
                    <td>
                      <a href="executive_committee_update.php?id=<?php echo $row['id']; ?>" class="btn btn-success m-1">Update</a>
                      <a href="executive_committee_delete.php?id=<?php echo $row['id']; ?>" onclick= 'return checkdelete()' class="btn btn-danger m-1">Delete</a>
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