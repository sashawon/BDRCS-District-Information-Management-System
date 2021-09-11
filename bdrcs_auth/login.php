<?php 
  require('../database.php');
  $error='';
  session_start();

  if (isset($_POST['submit'])) {
    $user=$_POST['user'];
    $password=$_POST['password'];
    $status=1;

    $sql= "SELECT * FROM `admin` WHERE `user`=:user AND `password`=:password AND `status`=:status";

    $stmt=$con->prepare($sql);
    $stmt->execute(['user'=>$user, 'password'=>$password, 'status'=>$status]);
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    $count=$stmt->rowCount();

    if ($count>0) {
      $_SESSION['USER']= $user;
      $_SESSION['ROLE']= $row['role'];
      $_SESSION['IS_LOGIN']= 'yes';

      if ($row['role']=='super_admin') {
        header('location:index.php');
        die();
      } else if ($row['role']=='moderator') {
        header('location:index.php');
        die();
      } else if ($row['role']=='editor') {
        header('location:index.php');
        die();
      }
    } else {
      $error='Please enter correct details';
    }

  }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Titel-->
    <title>Admin Panel | Bangladesh Red Crescent Society</title>
    <link rel="icon" type="image/png" sizes="32x32" href="images/logo.png">
    <!--bootstrap-->
    <link  rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--Custom CSS-->
    <link  rel="stylesheet" href="assets/css/signin.css">
    <!--font awesome-->
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <!--fonts-->
    <link rel="stylesheet" href="assets/fonts/fonts.css">
    <!-- Bootstrap core CSS -->
    <style>
    .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
    }
    @media (min-width: 768px) {
    .bd-placeholder-img-lg {
    font-size: 3.5rem;
    }
    }
    </style>
  </head>
  <body class="text-center">    
    <main class="form-signin">
      <img class="mb-3" src="images/logo.png" alt="" width="100" height="100">
      <div class="card">
        <div class="card-header"><h1 class="h3 my-2 fw-normal">Please sign in</h1></div>
        <div class="card-body">
          <div style="color: red;"><?php echo $error ?></div>
          <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
            <label for="inputUser" class="visually-hidden">User Name</label>
            <input type="text" id="inputUser" class="form-control my-3" name="user" placeholder="User Name" required>
            <label for="inputPassword" class="visually-hidden">Password</label>
            <input type="password" id="inputPassword" class="form-control my-3" name="password" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block my-3" type="submit" name="submit">Sign in</button>
          </form>
        </div>
        <div class="card-footer">
          <p> &copy;Copyright <?php  echo date('Y'); ?> <strong>BDRCS</strong>. <br>All rights reserved.</p>
        </div>
      </div>
    </main>
  </body>
</html>