<?php 
  require('../database.php');
  error_reporting(0);
  session_start();
  if (!isset($_SESSION['IS_LOGIN'])) {
    header('location:login.php');
    die();
  }
?>
      <header class="header black-bg">
        <div class="sidebar-toggle-box">
          <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="index.php" class="logo">
          <img src="images/logo.png" alt="" width="35" height="35" class="d-inline-block align-top"> <b>BDRCS</b>
        </a>
        <!--<a href="index.html" class="logo"><b>DASH<span>IO</span></b></a>-->
        <!--logo end-->
        <div class="top-menu">
          <ul class="nav justify-content-end top-menu pt-3">
            <li><a class="btn btn-info text-white" href="logout.php">Logout</a></li>
          </ul>
        </div>
      </header>