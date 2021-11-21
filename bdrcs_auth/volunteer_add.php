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
    $name=$_POST['name'];
    $reg_no=$_POST['reg_no'];
    $id_card_no=$_POST['id_card_no'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $f_name=$_POST['f_name'];
    $m_name=$_POST['m_name'];
    $gender=$_POST['gender'];
    $nid=$_POST['nid'];
    $birth_certi=$_POST['birth_certi'];
    $passport=$_POST['passport'];
    $occupation=$_POST['occupation'];
    $education=$_POST['education'];
    $dob=$_POST['dob'];
    $blood=$_POST['blood'];
    $marital_status=$_POST['marital_status'];
    $nationality=$_POST['nationality'];
    $address=$_POST['address'];
    $fb_id=$_POST['fb_id'];
    $membership_type=$_POST['membership_type'];
    $position=$_POST['position'];
    $date_of_joining=$_POST['date_of_joining'];

    
    $imagename = $image['name'];
    $imagepath = $image['tmp_name'];
    $imageerror = $image['error'];

    if ($imageerror==0) {
      $destfile = '../images/volunteer/'.$imagename;
      move_uploaded_file($imagepath, $destfile);
    }
      

    $sql= "INSERT INTO `volunteer`(`image`, `name`, `reg_no`, `id_card_no`, `mobile`, `email`, `father_name`, `mother_name`, `gender`, `nid`, `birth_certi`, `passport`, `occupation`, `education`, `dob`, `blood`, `marital_status`, `nationality`, `address`, `fb_id`, `membership_type`, `position`, `date_of_joining`) VALUES (:imagename,:name,:reg_no,:id_card_no,:mobile,:email,:f_name,:m_name,:gender,:nid,:birth_certi,:passport,:occupation,:education,:dob,:blood,:marital_status,:nationality,:address,:fb_id,:membership_type,:position,:date_of_joining)";

    $stmt = $con->prepare($sql);
    $query = $stmt->execute(['imagename'=>$imagename, 'name'=>$name, 'reg_no'=>$reg_no, 'id_card_no'=>$id_card_no, 'mobile'=>$mobile, 'email'=>$email, 'f_name'=>$f_name, 'm_name'=>$m_name, 'gender'=>$gender, 'nid'=>$nid, 'birth_certi'=>$birth_certi, 'passport'=>$passport, 'occupation'=>$occupation, 'education'=>$education, 'dob'=>$dob, 'blood'=>$blood, 'marital_status'=>$marital_status, 'nationality'=>$nationality, 'address'=>$address, 'fb_id'=>$fb_id, 'membership_type'=>$membership_type, 'position'=>$position, 'date_of_joining'=>$date_of_joining]);

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
                  <h3 class="text-center pb-4">Add Volunteer</h3>
                  <div class="row mb-3">
                    <!-- Image -->
                    <label class="col-sm-2 col-form-label" for="image">Photo</label>
                    <div class="col-sm-10">
                      <input type="file" id="image" name="image" accept = image/* placeholder="" class="form-control">
                      <p class="help-block">Please provide Photo</p>
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
                    <!-- Registration No -->
                    <label class="col-sm-2 col-form-label" for="reg_no">Registration No</label>
                    <div class="col-sm-10">
                      <input type="text" id="reg_no" name="reg_no" placeholder="" class="form-control" value="<?= isset($reg_no) ? $reg_no:'' ?>">
                      <p class="help-block">Please provide registration no.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- ID Card no -->
                    <label class="col-sm-2 col-form-label" for="id_card_no">ID Card no</label>
                    <div class="col-sm-10">
                      <input type="text" id="id_card_no" name="id_card_no" placeholder="" class="form-control" value="<?= isset($id_card_no) ? $id_card_no:'' ?>">
                      <p class="help-block">Please provide ID Card no.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Mobile No -->
                    <label class="col-sm-2 col-form-label" for="mobile">Mobile No</label>
                    <div class="col-sm-10">
                      <input type="text" id="mobile" name="mobile" placeholder="" class="form-control" value="<?= isset($mobile) ? $mobile:'' ?>" required>
                      <p class="help-block">Please provide Mobile No.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Email -->
                    <label class="col-sm-2 col-form-label" for="email">Email</label>
                    <div class="col-sm-10">
                      <input type="text" id="email" name="email" placeholder="" class="form-control" value="<?= isset($email) ? $email:'' ?>">
                      <p class="help-block">Please provide Email.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Father Name -->
                    <label class="col-sm-2 col-form-label" for="f_name">Father Name</label>
                    <div class="col-sm-10">
                      <input type="text" id="f_name" name="f_name" placeholder="" class="form-control" value="<?= isset($f_name) ? $f_name:'' ?>">
                      <p class="help-block">Please provide Father Name.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Mother Name -->
                    <label class="col-sm-2 col-form-label" for="m_name">Mother Name</label>
                    <div class="col-sm-10">
                      <input type="text" id="m_name" name="m_name" placeholder="" class="form-control" value="<?= isset($m_name) ? $m_name:'' ?>">
                      <p class="help-block">Please provide Mother Name.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Gender -->
                    <label class="col-sm-2 col-form-label" for="gender">Gender</label>
                    <div class="col-sm-10">
                      <select name="gender" class="form-control" id="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                      </select>
                      <p class="help-block">Please provide Gender.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- NID No -->
                    <label class="col-sm-2 col-form-label" for="nid">NID No</label>
                    <div class="col-sm-10">
                      <input type="text" id="nid" name="nid" placeholder="" class="form-control" value="<?= isset($nid) ? $nid:'' ?>">
                      <p class="help-block">Please provide NID No.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Birth Certificate -->
                    <label class="col-sm-2 col-form-label" for="birth_certi">Birth Certificate</label>
                    <div class="col-sm-10">
                      <input type="text" id="birth_certi" name="birth_certi" placeholder="" class="form-control" value="<?= isset($birth_certi) ? $birth_certi:'' ?>">
                      <p class="help-block">Please provide Birth Certificate.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Passport No -->
                    <label class="col-sm-2 col-form-label" for="passport">Passport No</label>
                    <div class="col-sm-10">
                      <input type="text" id="passport" name="passport" placeholder="" class="form-control" value="<?= isset($passport) ? $passport:'' ?>">
                      <p class="help-block">Please provide Passport No.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Occupation -->
                    <label class="col-sm-2 col-form-label" for="occupation">Occupation</label>
                    <div class="col-sm-10">
                      <input type="text" id="occupation" name="occupation" placeholder="" class="form-control" value="<?= isset($occupation) ? $occupation:'' ?>">
                      <p class="help-block">Please provide Occupation.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Education -->
                    <label class="col-sm-2 col-form-label" for="education">Education</label>
                    <div class="col-sm-10">
                      <input type="text" id="education" name="education" placeholder="" class="form-control" value="<?= isset($education) ? $education:'' ?>">
                      <p class="help-block">Please provide Education.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Date of Birth -->
                    <label class="col-sm-2 col-form-label" for="dob">Date of Birth</label>
                    <div class="col-sm-10">
                      <input type="text" id="dob" name="dob" placeholder="Ex: 20-01-2021" class="form-control" value="<?= isset($dob) ? $dob:'' ?>">
                      <p class="help-block">Please provide Date of Birth.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Blood -->
                    <label class="col-sm-2 col-form-label" for="blood">Blood</label>
                    <div class="col-sm-10">
                      <input type="text" id="blood" name="blood" placeholder="" class="form-control" value="<?= isset($blood) ? $blood:'' ?>">
                      <p class="help-block">Please provide Blood.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Marital Status -->
                    <label class="col-sm-2 col-form-label" for="marital_status">Marital Status</label>
                    <div class="col-sm-10">
                      <input type="text" id="marital_status" name="marital_status" placeholder="" class="form-control" value="<?= isset($marital_status) ? $marital_status:'' ?>">
                      <p class="help-block">Please provide Marital Status.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Nationality -->
                    <label class="col-sm-2 col-form-label" for="nationality">Nationality</label>
                    <div class="col-sm-10">
                      <input type="text" id="nationality" name="nationality" placeholder="" class="form-control" value="<?= isset($nationality) ? $nationality:'' ?>" required>
                      <p class="help-block">Please provide Nationality.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Address -->
                    <label class="col-sm-2 col-form-label" for="address">Address</label>
                    <div class="col-sm-10">
                      <input type="text" id="address" name="address" placeholder="" class="form-control" value="<?= isset($address) ? $address:'' ?>" required>
                      <p class="help-block">Please provide Address.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Facebook ID -->
                    <label class="col-sm-2 col-form-label" for="fb_id">Facebook ID</label>
                    <div class="col-sm-10">
                      <input type="text" id="fb_id" name="fb_id" placeholder="" class="form-control" value="<?= isset($fb_id) ? $fb_id:'' ?>">
                      <p class="help-block">Please provide Facebook ID.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Membership Type -->
                    <label class="col-sm-2 col-form-label" for="membership_type">Membership Type</label>
                    <div class="col-sm-10">
                      <input type="text" id="membership_type" name="membership_type" placeholder="" class="form-control" value="<?= isset($membership_type) ? $membership_type:'' ?>">
                      <p class="help-block">Please provide Membership Type.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Position -->
                    <label class="col-sm-2 col-form-label" for="position">Position</label>
                    <div class="col-sm-10">
                      <input type="text" id="position" name="position" placeholder="" class="form-control" value="<?= isset($position) ? $position:'' ?>">
                      <p class="help-block">Please provide Position.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Date of Joining -->
                    <label class="col-sm-2 col-form-label" for="date_of_joining">Date of Joining</label>
                    <div class="col-sm-10">
                      <input type="text" id="date_of_joining" name="date_of_joining" placeholder="" class="form-control" value="<?= isset($date_of_joining) ? $date_of_joining:'' ?>" required>
                      <p class="help-block">Please provide Date of Joining.</p>
                    </div>
                  </div>                  

                  <div class="row mb-3">
                    <!-- Button -->
                    <div class="controls text-center">
                      <input type="submit" value="Add Volunteer" name="submit" class="btn btn-success">
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