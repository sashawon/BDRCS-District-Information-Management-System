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
    $address=$_POST['address'];
    $occupation=$_POST['occupation'];
    $blood=$_POST['blood'];
    $gender=$_POST['gender'];
    $dob=$_POST['dob'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];

    $sql= "INSERT INTO `blood_donor`(`name`, `address`, `occupation`, `blood`, `gender`, `dob`, `mobile`, `email`) VALUES (:name,:address,:occupation,:blood,:gender,:dob,:mobile,:email)";

    $stmt = $con->prepare($sql);
    $query = $stmt->execute(['name'=>$name, 'address'=>$address, 'occupation'=>$occupation, 'blood'=>$blood, 'gender'=>$gender, 'dob'=>$dob, 'mobile'=>$mobile, 'email'=>$email]);

    if ($query) {
      $success='<span class="alert alert-success">Record Added Successfully</span>';
    } else {
      $error='<span class="alert alert-danger">Sorry! Try Again</span>';
    }

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
          <div class="row">
            <div class="col-lg-12 main-chart">
              <form class="form-horizontal" action='' method="POST" enctype="multipart/form-data">
                <fieldset>
                  <h3 class="text-center pb-4"><?php echo $success; ?><?php echo $error; ?></h3> 
                  <h3 class="text-center pb-4">Add Blood Donor</h3>
                  <div class="row mb-3">
                    <!-- Full Name -->
                    <label class="col-sm-2 col-form-label" for="name">Name</label>
                    <div class="col-sm-10">
                      <input type="text" id="name" name="name" placeholder="" class="form-control" value="<?= isset($name) ? $name:'' ?>" required>
                      <p class="help-block">Please provide Name, required field</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Address -->
                    <label class="col-sm-2 col-form-label" for="address">Address</label>
                    <div class="col-sm-10">
                      <input type="text" id="address" name="address" placeholder="" class="form-control" value="<?= isset($address) ? $address:'' ?>" required>
                      <p class="help-block">Please provide Address.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Occupation -->
                    <label class="col-sm-2 col-form-label" for="occupation">Occupation</label>
                    <div class="col-sm-10">
                      <input type="text" id="occupation" name="occupation" placeholder="" class="form-control" value="<?= isset($occupation) ? $occupation:'' ?>">
                      <p class="help-block">Please provide Occupation.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Blood -->
                    <label class="col-sm-2 col-form-label" for="blood">Blood Group</label>
                    <div class="col-sm-10">
                      <input type="text" id="blood" name="blood" placeholder="Ex: O+" class="form-control" value="<?= isset($blood) ? $blood:'' ?>" required>
                      <p class="help-block">Please provide Blood.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Gender -->
                    <label class="col-sm-2 col-form-label" for="gender">Gender</label>
                    <div class="col-sm-10">
                      <select name="gender" class="form-control" id="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                      </select>
                      <p class="help-block">Please provide Gender.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Date of Birth -->
                    <label class="col-sm-2 col-form-label" for="dob">Date of Birth</label>
                    <div class="col-sm-10">
                      <input type="text" id="dob" name="dob" placeholder="" class="form-control" value="<?= isset($dob) ? $dob:'' ?>" required>
                      <p class="help-block">Please provide Date of Birth.</p>
                    </div>
                  </div>                  
                  <div class="row mb-3">
                    <!-- Mobile No -->
                    <label class="col-sm-2 col-form-label" for="mobile">Mobile No</label>
                    <div class="col-sm-10">
                      <input type="text" id="mobile" name="mobile" placeholder="" class="form-control" value="<?= isset($mobile) ? $mobile:'' ?>" required>
                      <p class="help-block">Please provide Mobile No.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Email -->
                    <label class="col-sm-2 col-form-label" for="email">Email</label>
                    <div class="col-sm-10">
                      <input type="text" id="email" name="email" placeholder="" class="form-control" value="<?= isset($email) ? $email:'' ?>">
                      <p class="help-block">Please provide Email.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Button -->
                    <div class="controls text-center">
                      <input type="submit" value="Add Blood Donor" name="submit" class="btn btn-success">
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
  </body>
</html>