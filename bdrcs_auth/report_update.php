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
              <?php
              // getting info and storing in variables 
              if(isset($_GET['id'])){
                $id = $_GET['id']; 
                $sql = "select * from report where id=:id"; 
                
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
                  $des = $row['des'];
                  $date = $row['date'];
                  $file_type = $row['file_type'];
                  }
                // Free result set
                //mysqli_free_result($result);
              }
              }               

              ?>
              <form class="form-horizontal" action='report_update_final.php' method="POST" enctype="multipart/form-data">
                <fieldset> 
                  <h3 class="text-center pb-4">Update Report</h3> 
                  <input type="hidden" name="id" value="<?php echo $id; ?>">               
                  <div class="row mb-3">
                    <!-- Report Title -->
                    <label class="col-sm-2 col-form-label" for="title">Title</label>
                    <div class="col-sm-10">
                      <input type="text" id="title" name="title" placeholder="" value="<?php echo $title; ?>" class="form-control">
                      <p class="help-block">Please provide Title</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Report Date -->
                    <label class="col-sm-2 col-form-label" for="date">Report Date</label>
                    <div class="col-sm-10">
                      <input type="text" id="date" name="date" placeholder="20-01-2021" value="<?php echo $date; ?>" class="form-control">
                      <p class="help-block">Please provide Report Date</p>
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
                      <p class="help-block">Please provide one Image</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Button -->
                    <div class="controls text-center">
                      <input type="submit" value="Upadte Report" name="submit" class="btn btn-success">
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
  </body>
</html>