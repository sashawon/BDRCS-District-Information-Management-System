<?php 
  require('../database.php');
  error_reporting(0);
  session_start();
  if (!isset($_SESSION['IS_LOGIN'])) {
    header('location:login.php');
    die();
  }

  if (isset($_POST['submit'])) {
    $user=$_POST['user'];
    $password=$_POST['password'];
    $role=$_POST['role'];
    $status=$_POST['status'];

    $sql= "INSERT INTO `admin`(`user`, `password`, `role`, `status`) VALUES (:user,:password,:role,:status)";

    $stmt = $con->prepare($sql);
    $query = $stmt->execute(['user'=>$user, 'password'=>$password, 'role'=>$role, 'status'=>$status]);

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
              
              <form class="form-horizontal" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                <fieldset>
                  <h3 class="text-center pb-4"><?php echo $success; ?><?php echo $error; ?></h3>                
                  <h3 class="text-center pb-4">Add Admin</h3>                
                  <div class="row mb-3">
                    <!-- User Name -->
                    <label class="col-sm-2 col-form-label" for="User">User Name</label>
                    <div class="col-sm-10">
                      <input type="text" id="user" name="user" placeholder="" class="form-control" value="<?= isset($user) ? $user:'' ?>" required>
                      <p class="help-block">Please provide User Name, required field</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Password -->
                    <label class="col-sm-2 col-form-label" for="password">Password</label>
                    <div class="col-sm-10">
                      <input type="password" id="password" name="password" placeholder="" class="form-control" value="<?= isset($password) ? $password:'' ?>" required>
                      <p class="help-block">Please provide Password, required field</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Select Role -->
                    <label class="col-sm-2 col-form-label" for="Role">Role</label>
                    <div class="col-sm-10">
                      <select name="role" class="form-control" id="role">
                        <option value="super_admin">Super Admin</option>
                        <option value="moderator">Moderator</option>
                        <option value="editor">Editor</option>
                      </select>
                      <p class="help-block">Select Role</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Status -->
                    <label class="col-sm-2 col-form-label" for="status">Status</label>
                    <div class="col-sm-10">
                      <select name="status" class="form-control" class="input-xlarge" id="status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                      </select>
                      <p class="help-block">Select Status</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Button -->
                    <div class="controls text-center">
                      <input type="submit" value="Add Admin" name="submit" class="btn btn-success">
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