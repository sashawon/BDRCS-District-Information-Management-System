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
                $sql = "select * from notice where id=:id"; 
                
                $stmt = $con->prepare($sql);
                $stmt->execute(['id'=>$id]);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                //print_r($result); die();
                
                if ($result)
                {
                foreach ($result as $row)
                  {
                  $id = $row['id']; 
                  $title = $row['title']; 
                  $des = $row['des']; 
                  $date = $row['date']; 
                  }
                // Free result set
                //mysqli_free_result($result);
              }
              }               

              ?>
              <form class="form-horizontal" action='notice_update_final.php' method="POST" enctype="multipart/form-data">
                <fieldset>
                  <h3 class="text-center pb-4">Update Notice</h3> 
                  <input type="hidden" name="id" value="<?php echo $id; ?>">               
                  <div class="row mb-3">
                    <!-- Title -->
                    <label class="col-sm-2 col-form-label" for="title">Notice Title</label>
                    <div class="col-sm-10">
                      <input type="text" id="title" name="title" placeholder="" value="<?php echo $title; ?>" class="form-control">
                      <p class="help-block">Please provide Notice Title</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Date -->
                    <label class="col-sm-2 col-form-label" for="Date">Date</label>
                    <div class="col-sm-10">
                      <input type="text" id="date" name="date" placeholder="" value="<?php echo $date; ?>" class="form-control">
                      <p class="help-block">Please provide Notice Date</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Description -->
                    <label class="col-sm-2 col-form-label" for="des">Notice Description</label>
                    <div class="col-sm-10">
                      <textarea id="des" name="des" rows="30" class="form-control"><?php echo $des; ?></textarea>
                      <p class="help-block">Please provide Notice Description</p>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <!-- Button -->
                    <div class="controls text-center">
                      <input type="submit" value="Upadte Notice" name="submit" class="btn btn-success">
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