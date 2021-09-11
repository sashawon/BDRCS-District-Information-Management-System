<?php 
  require('../database.php');
  error_reporting(0);
  session_start();
  if (!isset($_SESSION['IS_LOGIN'])) {
    header('location:login.php');
    die();
  }
?>
      <footer class="site-footer">
        <div class="text-center">
          <p>Supported by: <img src="images/swiss-logo.png" width="160" height="50" alt=""></p>
          <p> &copy; Copyright <?php  echo date('Y'); ?> <strong>BDRCS</strong>. All rights reserved.</p>
          <a href="#" class="go-top">
            <i class="fa fa-angle-up"></i>
          </a>
        </div>
      </footer>