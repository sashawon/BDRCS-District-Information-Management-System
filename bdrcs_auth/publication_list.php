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

              $query = "SELECT * FROM publication WHERE `title` like '%$search%' OR `des` like '%$search%' OR `date` like '%$search%' ORDER BY id ASC";
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
                  <a class="btn btn-primary" href="print_publication.php?query=<?php echo $query; ?>" target="_blank"><i class="fa fa-print"></i> Print</a>                  
                </div>             
              </div>
            </div>
            <div class="col-lg-12 main-chart">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Photos</th>
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
                    <td><?=$row["title"]?></td>
                    <td><?=$row["date"]?></td>
                    <td><?=$row["des"]?></td>
                    <td>
                      <?php
                        $result=$row["photo"];
                        $result=explode("**", $result);
                        $file_type=$row["file_type"];
                        $file_type=explode("**", $file_type);
                        $count=count($result)-1;
                        for ($j=0; $j <$count; ++$j) { 
                          if ($file_type[$j] == 'image') {
                            ?>
                              <img style='width: 100px;' class='img-thumbnail' alt='Responsive image' src="../images/publication/<?= $result[$j] ?> ">
                            <?php
                          } elseif ($file_type[$j] == 'video') {
                            ?>
                              <video width="100px" controls>
                                <source src="../images/publication/<?= $result[$j] ?>" type="video/mp4">
                              </video>
                            <?php
                          } else {
                            ?>
                              <img style="width: 100px" class='card-img-top img-fluid' alt='Prpgram_Image' src="../images/publication/file-format-not-supported.png">
                            <?php
                          }
                      } 
                      ?>
                    </td>
                    <td>
                      <a href="publication_update.php?id=<?php echo $row['id']; ?>" class="btn btn-success m-1">Update</a>
                      <a href="publication_delete.php?id=<?php echo $row['id']; ?>" onclick= 'return checkdelete()' class="btn btn-danger m-1">Delete</a>
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
              $query = "SELECT * FROM publication ORDER BY id ASC";
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
                  <a class="btn btn-primary" href="print_publication.php?query=<?php echo $query; ?>" target="_blank"><i class="fa fa-print"></i> Print</a>                  
                </div>             
              </div>
            </div>
            <div class="col-lg-12 main-chart">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Photos</th>
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
                    <td><?=$row["title"]?></td>
                    <td><?=$row["date"]?></td>
                    <td><?=$row["des"]?></td>
                    <td>
                      <?php
                        $result=$row["photo"];
                        $result=explode("**", $result);
                        $file_type=$row["file_type"];
                        $file_type=explode("**", $file_type);
                        $count=count($result)-1;
                        for ($j=0; $j <$count; ++$j) { 
                          if ($file_type[$j] == 'image') {
                            ?>
                              <img style='width: 100px;' class='img-thumbnail' alt='Responsive image' src="../images/publication/<?= $result[$j] ?> ">
                            <?php
                          } elseif ($file_type[$j] == 'video') {
                            ?>
                              <video width="100px" controls>
                                <source src="../images/publication/<?= $result[$j] ?>" type="video/mp4">
                              </video>
                            <?php
                          } else {
                            ?>
                              <img style="width: 100px" class='card-img-top img-fluid' alt='Prpgram_Image' src="../images/publication/file-format-not-supported.png">
                            <?php
                          }
                      } 
                      ?>
                    </td>
                    <td>
                      <a href="publication_update.php?id=<?php echo $row['id']; ?>" class="btn btn-success m-1">Update</a>
                      <a href="publication_delete.php?id=<?php echo $row['id']; ?>" onclick= 'return checkdelete()' class="btn btn-danger m-1">Delete</a>
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