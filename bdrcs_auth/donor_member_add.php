<?php 
  require('../database.php');
  error_reporting(0);
  session_start();
  if (!isset($_SESSION['IS_LOGIN'])) {
    header('location:login.php');
    die();
  }

  if (isset($_POST['submit'])) {
    $name=$_POST['name'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $aod=$_POST['aod'];
    $dod=$_POST['dod'];
          

    $sql= "INSERT INTO `donor_member`(`name`, `mobile`, `email`, `donate_amount`, `donate_date`) VALUES (:name,:mobile,:email,:aod,:dod)";

    $stmt = $con->prepare($sql);
    $query = $stmt->execute(['name'=>$name, 'mobile'=>$mobile, 'email'=>$email, 'aod'=>$aod, 'dod'=>$dod]);

    if ($query) {
      $success='<span class="alert alert-success">Record Added Successfully</span>';
    } else {
      $error='<span class="alert alert-danger">Sorry! Try Again</span>';
    }

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
              <form class="form-horizontal" action='' method="POST" enctype="multipart/form-data">
                <fieldset>
                  <h3 class="text-center pb-4"><?php echo $success; ?><?php echo $error; ?></h3> 
                  <h3 class="text-center pb-4">Add Donor Member</h3>                
                  <div class="row mb-3">
                    <!-- Full Name -->
                    <label class="col-sm-2 col-form-label" for="name">Name/Organization</label>
                    <div class="col-sm-10">
                      <input type="text" id="name" name="name" placeholder="" class="form-control" value="<?= isset($name) ? $name:'' ?>">
                      <p class="help-block">Please provide Name</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- mobile -->
                    <label class="col-sm-2 col-form-label" for="mobile">Phone/Mobile Number</label>
                    <div class="col-sm-10">
                      <input type="text" id="mobile" name="mobile" placeholder="" class="form-control" value="<?= isset($mobile) ? $mobile:'' ?>">
                      <p class="help-block">Please provide Phone Number</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Email -->
                    <label class="col-sm-2 col-form-label" for="email">Email</label>
                    <div class="col-sm-10">
                      <input type="text" id="email" name="email" placeholder="" class="form-control" value="<?= isset($email) ? $email:'' ?>">
                      <p class="help-block">Please provide Email</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Amonut of Donation -->
                    <label class="col-sm-2 col-form-label" for="aod">Amonut of Donation</label>
                    <div class="col-sm-10">
                      <input type="text" id="aod" name="aod" placeholder="" class="form-control" value="<?= isset($aod) ? $aod:'' ?>">
                      <p class="help-block">Please provide Time Amonut of Donation</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Data of Donation -->
                    <label class="col-sm-2 col-form-label" for="Data of Donation">Data of Donation</label>
                    <div class="col-sm-10">
                      <input type="text" id="dod" name="dod" placeholder="" class="form-control" value="<?= isset($dod) ? $dod:'' ?>">
                      <p class="help-block">Please provide Time Data of Donation</p>
                    </div>
                  </div>
                  
                  <div class="row mb-3">
                    <!-- Button -->
                    <div class="controls text-center">
                      <input type="submit" value="Add Donor Member" name="submit" class="btn btn-success">
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