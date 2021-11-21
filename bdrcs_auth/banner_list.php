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
          <div class="row">
            <div class="col-lg-12 main-chart">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Banner</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
      
                  $query = "SELECT * FROM banners";
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
                    <td>
                      <img style="width: 100px; height:100px;" class="img-fluid" src="<?php echo '../images/slider/'.$row["image"]; ?>" alt="Photo">
                    </td>
                    <td>
                      <?php 
                        if ($row['status']==1) {
                      ?>
                        <a href="banner_status_inactive.php?id=<?= base64_encode($row['id']) ?>" class="btn btn-info">
                          <span>Active</span>
                        </a>
                      <?php 
                        } else  {
                      ?>
                        <a href="banner_status_active.php?id=<?= base64_encode($row['id']) ?>" class="btn btn-warning">
                          <span>Inactive</span>
                        </a>
                      <?php 
                        }
                      ?>
                    </td>
                    <td>
                      <a href="banner_update.php?id=<?php echo $row['id']; ?>" class="btn btn-success m-1">Update</a>
                      <a href="banner_delete.php?id=<?php echo $row['id']; ?>" onclick= 'return checkdelete()' class="btn btn-danger m-1">Delete</a>
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
  </body>
</html>