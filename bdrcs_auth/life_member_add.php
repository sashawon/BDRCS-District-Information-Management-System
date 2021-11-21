<?php 
  require('../database.php');
  error_reporting(0);
  session_start();
  if (!isset($_SESSION['IS_LOGIN'])) {
    header('location:login.php');
    die();
  }

  if (isset($_POST['submit'])) {
    $l_id=$_POST['l_id'];
    $name=$_POST['name'];
    $f_name=$_POST['f_name'];
    $m_name=$_POST['m_name'];
    $address=$_POST['address'];
    $nid=$_POST['nid'];
    $mobile=$_POST['mobile'];
    $j_data=$_POST['j_data'];
    $s_money=$_POST['s_money'];
    $comment=$_POST['comment'];


    $sql= "INSERT INTO `life_member`(`l_id`, `name`, `fname`, `mname`, `address`, `nid`, `mobile`, `join_date`, `s_money`, `comment`) VALUES (:l_id,:name,:f_name,:m_name,:address,:nid,:mobile,:j_data,:s_money,:comment)";

    $stmt = $con->prepare($sql);
    $query = $stmt->execute(['l_id'=>$l_id, 'name'=>$name, 'f_name'=>$f_name, 'm_name'=>$m_name, 'address'=>$address, 'nid'=>$nid, 'mobile'=>$mobile, 'j_data'=>$j_data, 's_money'=>$s_money, 'comment'=>$comment]);

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
                  <h3 class="text-center pb-4">Add Life Member</h3>
                  <div class="row mb-3">
                    <!-- Life Member No -->
                    <label class="col-sm-2 col-form-label" for="l_id">Life Member No</label>
                    <div class="col-sm-10">
                      <input type="text" id="l_id" name="l_id" placeholder="" class="form-control" value="<?= isset($l_id) ? $l_id:'' ?>" required>
                      <p class="help-block">Please provide Life Number, required field</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Full Name -->
                    <label class="col-sm-2 col-form-label" for="name">Name</label>
                    <div class="col-sm-10">
                      <input type="text" id="name" name="name" placeholder="" class="form-control" value="<?= isset($name) ? $name:'' ?>" required>
                      <p class="help-block">Please provide Name, required field</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Father name -->
                    <label class="col-sm-2 col-form-label" for="f_name">Father Name</label>
                    <div class="col-sm-10">
                      <input type="text" id="f_name" name="f_name" placeholder="" class="form-control" value="<?= isset($f_name) ? $f_name:'' ?>">
                      <p class="help-block">Please provide Father name</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Mother name -->
                    <label class="col-sm-2 col-form-label" for="m_name">Mother Name</label>
                    <div class="col-sm-10">
                      <input type="text" id="m_name" name="m_name" placeholder="" class="form-control" value="<?= isset($m_name) ? $m_name:'' ?>">
                      <p class="help-block">Please provide Mother name</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Address -->
                    <label class="col-sm-2 col-form-label" for="address">Address</label>
                    <div class="col-sm-10">
                      <input type="text" id="address" name="address" placeholder="" class="form-control" value="<?= isset($address) ? $address:'' ?>" required>
                      <p class="help-block">Please provide Address, required field</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- NID No -->
                    <label class="col-sm-2 col-form-label" for="NID No">NID No</label>
                    <div class="col-sm-10">
                      <input type="text" id="nid" name="nid" placeholder="" class="form-control" value="<?= isset($nid) ? $nid:'' ?>">
                      <p class="help-block">Please provide Time NID No, required field</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- mobile -->
                    <label class="col-sm-2 col-form-label" for="mobile">Phone/Mobile Number</label>
                    <div class="col-sm-10">
                      <input type="text" id="mobile" name="mobile" placeholder="" class="form-control" value="<?= isset($mobile) ? $mobile:'' ?>">
                      <p class="help-block">Please provide Phone Number, required field</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Join Data -->
                    <label class="col-sm-2 col-form-label" for="Join Data">Join Date</label>
                    <div class="col-sm-10">
                      <input type="text" id="j_data" name="j_data" placeholder="" class="form-control" value="<?= isset($j_data) ? $j_data:'' ?>" required>
                      <p class="help-block">Please provide Time Join Data, required field</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Share Money -->
                    <label class="col-sm-2 col-form-label" for="Share Money">Share Money</label>
                    <div class="col-sm-10">
                      <input type="text" id="s_money" name="s_money" placeholder="" class="form-control" value="<?= isset($s_money) ? $s_money:'' ?>">
                      <p class="help-block">Please provide Time Share Money, required field</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Comment -->
                    <label class="col-sm-2 col-form-label" for="Comment">Comment</label>
                    <div class="col-sm-10">
                      <input type="text" id="comment" name="comment" placeholder="" class="form-control" value="<?= isset($comment) ? $comment:'' ?>">
                      <p class="help-block">Please provide Time Comment, required field</p>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <!-- Button -->
                    <div class="controls text-center">
                      <input type="submit" value="Add Life Member" name="submit" class="btn btn-success">
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