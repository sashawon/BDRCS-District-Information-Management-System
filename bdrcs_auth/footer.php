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
  <!--ckeditor-->
  <script src="assets/ckeditor/ckeditor.js"></script>

  <script>
    function checkdelete()
    {
    return confirm('Are you sure you want to DELETE this record?');
    }
  </script>