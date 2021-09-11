<?php 
  require('../database.php');
  error_reporting(0);
  session_start();
  if (!isset($_SESSION['IS_LOGIN'])) {
    header('location:login.php');
    die();
  }

  if (isset($_POST['submit'])) {
    $title=$_POST['title'];
    $date=$_POST['date'];
    $des=$_POST['des'];
    $category='publication';
    
    $file='';
    $file_tmp='';
    $location="../images/publication/";
    $data='';

    foreach ($_FILES['image']['name'] as $key => $value) {
      $file=$_FILES['image']['name'][$key];
      $upload_type=$_FILES['image']['type'][$key];
      $file_tmp=$_FILES['image']['tmp_name'][$key];
      move_uploaded_file($file_tmp, $location.$file);
      $data .=$file."**";
      $upload_type = explode("/", $upload_type);
      $file_type .=$upload_type[0]."**";
    }

    $sql= "INSERT INTO `publication`(`photo`, `title`, `des`, `date`, `category`, `file_type`) VALUES (:data,:title,:des,:date,:category,:file_type)";

    $stmt = $con->prepare($sql);
    $query = $stmt->execute(['data'=>$data, 'title'=>$title, 'des'=>$des, 'date'=>$date, 'category'=>$category, 'file_type'=>$file_type]);

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
                  <h3 class="text-center pb-4">Add Publication</h3>                
                  <div class="row mb-3">
                    <!-- Title -->
                    <label class="col-sm-2 col-form-label" for="title">Title</label>
                    <div class="col-sm-10">
                      <input type="text" id="title" name="title" placeholder="" class="form-control" value="<?= isset($title) ? $title:'' ?>" required>
                      <p class="help-block">Please provide Title, required field</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Publication Date -->
                    <label class="col-sm-2 col-form-label" for="date">Publication Date</label>
                    <div class="col-sm-10">
                      <input type="text" id="date" name="date" placeholder="Ex: 20-01-2021" class="form-control" value="<?= isset($date) ? $date:'' ?>">
                      <p class="help-block">Please provide Publication Date</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Description -->
                    <label class="col-sm-2 col-form-label" for="des">Description</label>
                    <div class="col-sm-10">
                      <textarea id="des" name="des" placeholder="" class="form-control" rows="20" value="<?= isset($des) ? $des:'' ?>" required></textarea>
                      <p class="help-block">Please provide Description, required field</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Photos -->
                    <label class="col-sm-2 col-form-label" for="photo">Photos</label>
                    <div class="col-sm-10">
                      <input type="file" id="image" name="image[]" accept = video/*,image/* placeholder="" class="form-control" multiple required>
                      <p class="help-block">Please provide One Image, required field</p>
                    </div>
                  </div>
                  
                  <div class="row mb-3">
                    <!-- Button -->
                    <div class="controls text-center">
                      <input type="submit" name="submit" value="Add Publication" class="btn btn-success">
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