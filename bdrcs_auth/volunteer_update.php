<?php 
  require('../database.php');
  error_reporting(0);
  session_start();
  if (!isset($_SESSION['IS_LOGIN'])) {
    header('location:login.php');
    die();
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
              <?php
              // getting info and storing in variables 
              if(isset($_GET['id'])){
                $id = $_GET['id']; 
                $sql = "select * from volunteer where id=:id"; 
                
                $stmt = $con->prepare($sql);
                $stmt->execute(['id'=>$id]);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                //print_r($result); die(); 
                
                if ($result)
                {
                foreach ($result as $row)
                  {
                  $id = $row['id']; 
                  $image = $row['image']; 
                  $name = $row['name']; 
                  $reg_no = $row['reg_no'];
                  $id_card_no = $row['id_card_no'];
                  $mobile = $row['mobile'];
                  $email = $row['email'];
                  $father_name = $row['father_name'];
                  $mother_name = $row['mother_name'];
                  $gender = $row['gender'];
                  $nid = $row['nid'];
                  $birth_certi = $row['birth_certi'];
                  $passport = $row['passport'];
                  $occupation = $row['occupation'];
                  $education = $row['education'];
                  $dob = $row['dob'];
                  $blood = $row['blood'];
                  $marital_status = $row['marital_status'];
                  $nationality = $row['nationality'];
                  $address = $row['address'];
                  $fb_id = $row['fb_id'];
                  $membership_type = $row['membership_type'];
                  $position = $row['position'];
                  $date_of_joining = $row['date_of_joining'];
                  }
                // Free result set
                //mysqli_free_result($result);
              }
              }               

              ?>
              <form class="form-horizontal" action='volunteer_update_final.php' method="POST" enctype="multipart/form-data">
                <fieldset> 
                  <h3 class="text-center pb-4">Update Volunteer</h3> 
                  <input type="hidden" name="id" value="<?php echo $id; ?>">               
                  <div class="row mb-3">
                    <!-- Image -->
                    <label class="col-sm-2 col-form-label" for="image">Photo</label>
                    <div class="col-sm-10">
                      <input type="file" id="image" name="image" accept = image/* placeholder="" value="<?php echo $image; ?>" class="form-control">
                      <p class="help-block">Please provide Photo</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Full Name -->
                    <label class="col-sm-2 col-form-label" for="name">Name</label>
                    <div class="col-sm-10">
                      <input type="text" id="name" name="name" placeholder="" value="<?php echo $name; ?>" class="form-control" required>
                      <p class="help-block">Please provide Name, required field</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Registration No -->
                    <label class="col-sm-2 col-form-label" for="reg_no">Registration No</label>
                    <div class="col-sm-10">
                      <input type="text" id="reg_no" name="reg_no" placeholder="" value="<?php echo $reg_no; ?>" class="form-control">
                      <p class="help-block">Please provide registration no.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- ID Card no -->
                    <label class="col-sm-2 col-form-label" for="id_card_no">ID Card no</label>
                    <div class="col-sm-10">
                      <input type="text" id="id_card_no" name="id_card_no" placeholder="" value="<?php echo $id_card_no; ?>" class="form-control">
                      <p class="help-block">Please provide ID Card no.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Mobile No -->
                    <label class="col-sm-2 col-form-label" for="mobile">Mobile No</label>
                    <div class="col-sm-10">
                      <input type="text" id="mobile" name="mobile" placeholder="" value="<?php echo $mobile; ?>" class="form-control" required>
                      <p class="help-block">Please provide Mobile No.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Email -->
                    <label class="col-sm-2 col-form-label" for="email">Email</label>
                    <div class="col-sm-10">
                      <input type="text" id="email" name="email" placeholder="" value="<?php echo $email; ?>" class="form-control">
                      <p class="help-block">Please provide Email.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Father Name -->
                    <label class="col-sm-2 col-form-label" for="f_name">Father Name</label>
                    <div class="col-sm-10">
                      <input type="text" id="f_name" name="f_name" placeholder="" value="<?php echo $father_name; ?>" class="form-control">
                      <p class="help-block">Please provide Father Name.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Mother Name -->
                    <label class="col-sm-2 col-form-label" for="m_name">Mother Name</label>
                    <div class="col-sm-10">
                      <input type="text" id="m_name" name="m_name" placeholder="" value="<?php echo $mother_name; ?>" class="form-control">
                      <p class="help-block">Please provide Mother Name.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Gender -->
                    <label class="col-sm-2 col-form-label" for="gender">Gender</label>
                    <div class="col-sm-10">
                      <input type="text" id="gender" name="gender" placeholder="" value="<?php echo $gender; ?>" class="form-control">
                      <p class="help-block">Please provide Gender.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- NID No -->
                    <label class="col-sm-2 col-form-label" for="nid">NID No</label>
                    <div class="col-sm-10">
                      <input type="text" id="nid" name="nid" placeholder="" value="<?php echo $nid; ?>" class="form-control">
                      <p class="help-block">Please provide NID No.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Birth Certificate -->
                    <label class="col-sm-2 col-form-label" for="birth_certi">Birth Certificate</label>
                    <div class="col-sm-10">
                      <input type="text" id="birth_certi" name="birth_certi" placeholder="" value="<?php echo $birth_certi; ?>" class="form-control">
                      <p class="help-block">Please provide Birth Certificate.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Passport No -->
                    <label class="col-sm-2 col-form-label" for="passport">Passport No</label>
                    <div class="col-sm-10">
                      <input type="text" id="passport" name="passport" placeholder="" value="<?php echo $passport; ?>" class="form-control">
                      <p class="help-block">Please provide Passport No.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Occupation -->
                    <label class="col-sm-2 col-form-label" for="occupation">Occupation</label>
                    <div class="col-sm-10">
                      <input type="text" id="occupation" name="occupation" placeholder="" value="<?php echo $occupation; ?>" class="form-control">
                      <p class="help-block">Please provide Occupation.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Education -->
                    <label class="col-sm-2 col-form-label" for="education">Education</label>
                    <div class="col-sm-10">
                      <input type="text" id="education" name="education" placeholder="" value="<?php echo $education; ?>" class="form-control">
                      <p class="help-block">Please provide Education.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Date of Birth -->
                    <label class="col-sm-2 col-form-label" for="dob">Date of Birth</label>
                    <div class="col-sm-10">
                      <input type="text" id="dob" name="dob" placeholder="" value="<?php echo $dob; ?>" class="form-control">
                      <p class="help-block">Please provide Date of Birth.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Blood -->
                    <label class="col-sm-2 col-form-label" for="blood">Blood</label>
                    <div class="col-sm-10">
                      <input type="text" id="blood" name="blood" placeholder="" value="<?php echo $blood; ?>" class="form-control">
                      <p class="help-block">Please provide Blood.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Marital Status -->
                    <label class="col-sm-2 col-form-label" for="marital_status">Marital Status</label>
                    <div class="col-sm-10">
                      <input type="text" id="marital_status" name="marital_status" placeholder="" value="<?php echo $marital_status; ?>" class="form-control">
                      <p class="help-block">Please provide Marital Status.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Nationality -->
                    <label class="col-sm-2 col-form-label" for="nationality">Nationality</label>
                    <div class="col-sm-10">
                      <input type="text" id="nationality" name="nationality" placeholder="" value="<?php echo $nationality; ?>" class="form-control" required>
                      <p class="help-block">Please provide Nationality.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Address -->
                    <label class="col-sm-2 col-form-label" for="address">Address</label>
                    <div class="col-sm-10">
                      <input type="text" id="address" name="address" placeholder="" value="<?php echo $address; ?>" class="form-control" required>
                      <p class="help-block">Please provide Address.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Facebook ID -->
                    <label class="col-sm-2 col-form-label" for="fb_id">Facebook ID</label>
                    <div class="col-sm-10">
                      <input type="text" id="fb_id" name="fb_id" placeholder="" value="<?php echo $fb_id; ?>" class="form-control">
                      <p class="help-block">Please provide Facebook ID.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Membership Type -->
                    <label class="col-sm-2 col-form-label" for="membership_type">Membership Type</label>
                    <div class="col-sm-10">
                      <input type="text" id="membership_type" name="membership_type" placeholder="" value="<?php echo $membership_type; ?>" class="form-control">
                      <p class="help-block">Please provide Membership Type.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Position -->
                    <label class="col-sm-2 col-form-label" for="position">Position</label>
                    <div class="col-sm-10">
                      <input type="text" id="position" name="position" placeholder="" value="<?php echo $position; ?>" class="form-control">
                      <p class="help-block">Please provide Position.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Date of Joining -->
                    <label class="col-sm-2 col-form-label" for="date_of_joining">Date of Joining</label>
                    <div class="col-sm-10">
                      <input type="text" id="date_of_joining" name="date_of_joining" placeholder="" value="<?php echo $date_of_joining; ?>" class="form-control" required>
                      <p class="help-block">Please provide Date of Joining.</p>
                    </div>
                  </div>
                  

                  <div class="row mb-3">
                    <!-- Button -->
                    <div class="controls text-center">
                      <input type="submit" value="Upadte Volunteer" name="submit" class="btn btn-success">
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