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

              $status=1; 
              $query = "SELECT * FROM volunteer WHERE status=:status AND `name` like '%$search%' OR `reg_no` like '%$search%' OR `id_card_no` like '%$search%' OR `mobile` like '%$search%' OR `email` like '%$search%' OR `father_name` like '%$search%' OR `mother_name` like '%$search%' OR `gender` like '%$search%' OR `nid` like '%$search%' OR `birth_certi` like '%$search%' OR `passport` like '%$search%' OR `occupation` like '%$search%' OR `education` like '%$search%' OR `dob` like '%$search%' OR `blood` like '%$search%' OR `marital_status` like '%$search%' OR `nationality` like '%$search%' OR `address` like '%$search%' OR `fb_id` like '%$search%' OR `membership_type` like '%$search%' OR `position` like '%$search%' OR `date_of_joining` like '%$search%' ORDER BY id ASC";
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
                  <a class="btn btn-primary" href="print_volunteer.php?status=1&&query=<?php echo $query; ?>" target="_blank"><i class="fa fa-print"></i> Print</a>                  
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
                    <th>Registration No.(at unit)</th>
                    <th>ID Card No.</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Father Name</th>
                    <th>Mother Name</th>
                    <th>Gender</th>
                    <th>NID No.</th>
                    <th>Birth Certificate No.</th>
                    <th>Passport No.</th>
                    <th>Occupation</th>
                    <th>Education Qualification</th>
                    <th>Date of Birth</th>
                    <th>Blood Group</th>
                    <th>Marital Status</th>
                    <th>Nationality</th>
                    <th>Address</th>
                    <th>Social network ID fb</th>
                    <th>Membership Type</th>
                    <th>Position in Vol group</th>
                    <th>Date of joining as Vol</th>
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
                      <img style="width: 100px; height:100px;" class="img-fluid" src="<?php echo '../images/volunteer/'.$row["image"]; ?>" alt="Photo">
                    </td>
                    <td><?=$row["name"]?></td>
                    <td><?=$row["reg_no"]?></td>
                    <td><?=$row["id_card_no"]?></td>
                    <td><?=$row["mobile"]?></td>
                    <td><?=$row["email"]?></td>
                    <td><?=$row["father_name"]?></td>
                    <td><?=$row["mother_name"]?></td>
                    <td><?=$row["gender"]?></td>
                    <td><?=$row["nid"]?></td>
                    <td><?=$row["birth_certi"]?></td>
                    <td><?=$row["passport"]?></td>
                    <td><?=$row["occupation"]?></td>
                    <td><?=$row["education"]?></td>
                    <td><?=$row["dob"]?></td>
                    <td><?=$row["blood"]?></td>
                    <td><?=$row["marital_status"]?></td>
                    <td><?=$row["nationality"]?></td>
                    <td><?=$row["address"]?></td>
                    <td><?=$row["fb_id"]?></td>
                    <td><?=$row["membership_type"]?></td>
                    <td><?=$row["position"]?></td>
                    <td><?=$row["date_of_joining"]?></td>
                    <td>
                      <a href="volunteer_update.php?id=<?php echo $row['id']; ?>" class="btn btn-success m-1">Update</a>
                      <a href="volunteer_delete.php?id=<?php echo $row['id']; ?>" onclick= 'return checkdelete()' class="btn btn-danger m-1">Delete</a>
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
              $status=1;      
              $query = "SELECT * FROM volunteer WHERE status=:status ORDER BY id ASC";
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
                  <a class="btn btn-primary" href="print_volunteer.php?status=1&&query=<?php echo $query; ?>" target="_blank"><i class="fa fa-print"></i> Print</a>                  
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
                    <th>Registration No.(at unit)</th>
                    <th>ID Card No.</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Father Name</th>
                    <th>Mother Name</th>
                    <th>Gender</th>
                    <th>NID No.</th>
                    <th>Birth Certificate No.</th>
                    <th>Passport No.</th>
                    <th>Occupation</th>
                    <th>Education Qualification</th>
                    <th>Date of Birth</th>
                    <th>Blood Group</th>
                    <th>Marital Status</th>
                    <th>Nationality</th>
                    <th>Address</th>
                    <th>Social network ID fb</th>
                    <th>Membership Type</th>
                    <th>Position in Vol group</th>
                    <th>Date of joining as Vol</th>
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
                      <img style="width: 100px; height:100px;" class="img-fluid" src="<?php echo '../images/volunteer/'.$row["image"]; ?>" alt="Photo">
                    </td>
                    <td><?=$row["name"]?></td>
                    <td><?=$row["reg_no"]?></td>
                    <td><?=$row["id_card_no"]?></td>
                    <td><?=$row["mobile"]?></td>
                    <td><?=$row["email"]?></td>
                    <td><?=$row["father_name"]?></td>
                    <td><?=$row["mother_name"]?></td>
                    <td><?=$row["gender"]?></td>
                    <td><?=$row["nid"]?></td>
                    <td><?=$row["birth_certi"]?></td>
                    <td><?=$row["passport"]?></td>
                    <td><?=$row["occupation"]?></td>
                    <td><?=$row["education"]?></td>
                    <td><?=$row["dob"]?></td>
                    <td><?=$row["blood"]?></td>
                    <td><?=$row["marital_status"]?></td>
                    <td><?=$row["nationality"]?></td>
                    <td><?=$row["address"]?></td>
                    <td><?=$row["fb_id"]?></td>
                    <td><?=$row["membership_type"]?></td>
                    <td><?=$row["position"]?></td>
                    <td><?=$row["date_of_joining"]?></td>
                    <td>
                      <a href="volunteer_update.php?id=<?php echo $row['id']; ?>" class="btn btn-success m-1">Update</a>
                      <a href="volunteer_delete.php?id=<?php echo $row['id']; ?>" onclick= 'return checkdelete()' class="btn btn-danger m-1">Delete</a>
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