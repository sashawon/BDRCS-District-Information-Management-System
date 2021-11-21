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
                $sql = "select * from ec_member where id=:id"; 
                
                $stmt = $con->prepare($sql);
                $stmt->execute(['id'=>$id]);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                //print_r($result); die();
                
                if ($result)
                {
                foreach ($result as $row)
                  {
                  $id = $row['id']; 
                  $name = $row['name']; 
                  $designation = $row['designation']; 
                  $email = $row['email'];
                  $mobile = $row['mobile'];
                  $duration = $row['duration'];
                  $image = $row['photo'];
                  }
                // Free result set
                //mysqli_free_result($result);
              }
              }               

              ?>
              <form class="form-horizontal" action='executive_committee_update_final.php' method="POST" enctype="multipart/form-data">
                <fieldset> 
                  <h3 class="text-center pb-4">Update Executive Committee</h3> 
                  <input type="hidden" name="id" value="<?php echo $id; ?>">               
                  <div class="row mb-3">
                    <!-- Full Name -->
                    <label class="col-sm-2 col-form-label" for="name">Name</label>
                    <div class="col-sm-10">
                      <input type="text" id="name" name="name" placeholder="" value="<?php echo $name; ?>" class="form-control">
                      <p class="help-block">Please provide Name</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- designation -->
                    <label class="col-sm-2 col-form-label" for="designation">Designation</label>
                    <div class="col-sm-10">
                      <input type="text" id="designation" name="designation" placeholder="" value="<?php echo $designation; ?>" class="form-control">
                      <p class="help-block">Please provide designation</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Email -->
                    <label class="col-sm-2 col-form-label" for="email">Email</label>
                    <div class="col-sm-10">
                      <input type="text" id="email" name="email" placeholder="" value="<?php echo $email; ?>" class="form-control">
                      <p class="help-block">Please provide Email</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- mobile -->
                    <label class="col-sm-2 col-form-label" for="mobile">Phone/Mobile Number</label>
                    <div class="col-sm-10">
                      <input type="text" id="mobile" name="mobile" placeholder="" value="<?php echo $mobile; ?>" class="form-control">
                      <p class="help-block">Please provide Phone Number</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Duration -->
                    <label class="col-sm-2 col-form-label" for="duration">Duration</label>
                    <div class="col-sm-10">
                      <input type="text" id="duration" name="duration" placeholder="" value="<?php echo $duration; ?>" class="form-control">
                      <p class="help-block">Please provide Time Duration</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Image -->
                    <label class="col-sm-2 col-form-label" for="image">Image</label>
                    <div class="col-sm-10">
                      <input type="file" id="image" name="image" accept = image/* placeholder="" value="<?php echo $image; ?>" class="form-control">
                      <p class="help-block">Please provide Photo</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Button -->
                    <div class="controls text-center">
                      <input type="submit" value="Upadte Executive Committee" name="submit" class="btn btn-success">
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