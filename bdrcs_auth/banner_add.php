<?php 
  require('../database.php');
  error_reporting(0);
  session_start();
  if (!isset($_SESSION['IS_LOGIN'])) {
    header('location:login.php');
    die();
  }

  if (isset($_POST['submit'])) {
    $image = $_FILES['image'];
    $status=0;

    $imagename = $image['name'];
    $imagepath = $image['tmp_name'];
    $imageerror = $image['error'];

    if ($imageerror==0) {
      $destfile = '../images/slider/'.$imagename;
      move_uploaded_file($imagepath, $destfile);
    }

    $sql= "INSERT INTO `banners`(`image`, `status`) VALUES (:imagename,:status)";

    $stmt = $con->prepare($sql);
    $query = $stmt->execute(['imagename'=>$imagename, 'status'=>$status]);

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
              
              <form class="form-horizontal" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                <fieldset>
                  <h3 class="text-center pb-4"><?php echo $success; ?><?php echo $error; ?></h3>                
                  <h3 class="text-center pb-4">Add Banner</h3>                
                  <div class="row mb-3">
                    <!-- Banner Photo -->
                    <label class="col-sm-2 col-form-label" for="Banner Photo">Banner Photo</label>
                    <div class="col-sm-10">
                      <input type="file" id="image" name="image" placeholder="" class="form-control" value="<?= isset($image) ? $image:'' ?>" required>
                      <p class="help-block">Please provide banner Photo, required field</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Button -->
                    <div class="controls text-center">
                      <input type="submit" value="Add Banner" name="submit" class="btn btn-success">
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