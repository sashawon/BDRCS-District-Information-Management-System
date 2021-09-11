<?php 
  require('../database.php');
  error_reporting(0);
  session_start();
  if (!isset($_SESSION['IS_LOGIN'])) {
    header('location:login.php');
    die();
  }
?>
      <aside>
        <div id="sidebar" class="nav-collapse ">
          <!-- sidebar menu start-->
          <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered"><a href="#"><img src="images/avatar.png" class="rounded-circle" width="80"></a></p>
            <h5 class="centered">
              <?php echo $_SESSION['USER']; ?>
            </h5>
            <li class="mt">
              <a class="active" href="index.php">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
              </a>
            </li>
            <?php if ($_SESSION['ROLE']=='super_admin') { ?>
            <li class="sub-menu">
              <a href="javascript:;">
                <i class="fas fa-users-cog mr-1"></i>
                <span>Admin</span>
              </a>
              <ul class="sub">
                <li><a href="admin_add.php">Add New</a></li>
                <li><a href="admin_list.php">Total List</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a href="javascript:;">
                <i class="far fa-clone"></i>
                <span>Banner</span>
              </a>
              <ul class="sub">
                <li><a href="banner_add.php">Add Banner</a></li>
                <li><a href="banner_list.php">Total Banner</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a href="javascript:;">
                <i class="far fa-address-card"></i>
                <span>About Us</span>
              </a>
              <ul class="sub">
                <li><a href="about_us.php">Edit About</a></li>
              </ul>
            </li>
            <?php } ?>
            <?php if ($_SESSION['ROLE']=='super_admin' || $_SESSION['ROLE']=='moderator') { ?>
            <li class="sub-menu">
              <a href="javascript:;">
                <i class="fas fa-user-tie mr-1"></i>
                <span>Officer-Employee</span>
              </a>
              <ul class="sub">
                <li><a href="officer_employee_add.php">Add New</a></li>
                <li><a href="officer_employee_list.php">Total List</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a href="javascript:;">
                <i class="fas fa-users mr-1"></i>
                <span>Executive Committee</span>
              </a>
              <ul class="sub">
                <li><a href="executive_committee_add.php">Add New</a></li>
                <li><a href="executive_committee_list.php">Total List</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a href="javascript:;">
                <i class="fas fa-universal-access mr-1"></i>
                <span>Life Members</span>
              </a>
              <ul class="sub">
                <li><a href="life_member_add.php">Add New</a></li>
                <li><a href="life_member_list.php">Total List</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a href="javascript:;">
                <i class="fas fa-hands-helping mr-1"></i>
                <span>Volunteers</span>
              </a>
              <ul class="sub">
                <li><a href="volunteer_add.php">Add New</a></li>
                <li><a href="volunteer_list.php">Total List</a></li>
                <li><a href="volunteer_pending_list.php">Pending List</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a href="javascript:;">
                <i class="fas fa-tint mr-1"></i>
                <span>Blood Donor</span>
              </a>
              <ul class="sub">
                <li><a href="blood_donor_add.php">Add New</a></li>
                <li><a href="blood_donor_list.php">Total List</a></li>
                <li><a href="blood_donor_pending_list.php">pending List</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a href="javascript:;">
                <i class="fas fa-hand-holding-water mr-1"></i>
                <span>Donor Members</span>
              </a>
              <ul class="sub">
                <li><a href="donor_member_add.php">Add New</a></li>
                <li><a href="donor_member_list.php">Total List</a></li>
              </ul>
            </li>
            <?php } ?>
            <?php if ($_SESSION['ROLE']=='super_admin' || $_SESSION['ROLE']=='moderator' || $_SESSION['ROLE']=='editor') { ?>
            <li class="sub-menu">
              <a href="javascript:;">
                <i class="far fa-comment-dots mr-1"></i>
                <span>Notice</span>
              </a>
              <ul class="sub">
                <li><a href="notice_add.php">Add New</a></li>
                <li><a href="notice_list.php">Total List</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a href="javascript:;">
                <i class="fas fa-trophy mr-1"></i>
                <span>Our Events</span>
              </a>
              <ul class="sub">
                <li><a href="activities_add.php">Add New</a></li>
                <li><a href="activities_list.php">Total List</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a href="javascript:;">
                <i class="fas fa-book mr-1"></i>
                <span>Our Publication</span>
              </a>
              <ul class="sub">
                <li><a href="publication_add.php">Add New</a></li>
                <li><a href="publication_list.php">Total List</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a href="javascript:;">
                <i class="far fa-file mr-1"></i>
                <span>Our Reports</span>
              </a>
              <ul class="sub">
                <li><a href="report_add.php">Add New</a></li>
                <li><a href="report_list.php">Total List</a></li>
              </ul>
            </li>
            <?php } ?>
          </ul>
          <!-- sidebar menu end-->
        </div>
      </aside>