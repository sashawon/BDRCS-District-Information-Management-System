<?php 
  require('database.php');
  error_reporting(0);
  
  if (isset($_POST['submit'])) {
    $image = $_FILES['image'];
    $name=$_POST['name'];
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
    $date_of_joining=$_POST['date_of_joining'];
    $status=0;
    
    $imagename = $image['name'];
    $imagepath = $image['tmp_name'];
    $imageerror = $image['error'];

    if ($imageerror==0) {
      $destfile = 'images/volunteer/'.$imagename;
      move_uploaded_file($imagepath, $destfile);
    }
      

    $sql= "INSERT INTO `volunteer`(`image`, `name`, `mobile`, `email`, `father_name`, `mother_name`, `gender`, `nid`, `birth_certi`, `passport`, `occupation`, `education`, `dob`, `blood`, `marital_status`, `nationality`, `address`, `fb_id`, `date_of_joining`, `status`) VALUES (:imagename,:name,:mobile,:email,:f_name,:m_name,:gender,:nid,:birth_certi,:passport,:occupation,:education,:dob,:blood,:marital_status,:nationality,:address,:fb_id,:date_of_joining,:status)";

    $stmt = $con->prepare($sql);
    $query = $stmt->execute(['imagename'=>$imagename, 'name'=>$name, 'mobile'=>$mobile, 'email'=>$email, 'f_name'=>$f_name, 'm_name'=>$m_name, 'gender'=>$gender, 'nid'=>$nid, 'birth_certi'=>$birth_certi, 'passport'=>$passport, 'occupation'=>$occupation, 'education'=>$education, 'dob'=>$dob, 'blood'=>$blood, 'marital_status'=>$marital_status, 'nationality'=>$nationality, 'address'=>$address, 'fb_id'=>$fb_id, 'date_of_joining'=>$date_of_joining, 'status'=>$status]);

    if ($query) {
      $success='<alert class="alert alert-success">Record Added Successfully</alert>';
    } else {
      $error='<alert class="alert alert-danger">Sorry! Try Again</alert>';
    }

  }
?>

		<!-- ======= Header Start ======= -->
		<?php  include("header.php"); ?>
		<!-- End Header -->
		<!-- ======= body Start ======= -->
		<section class="main-body bg-light pb-3">
			<div class="text-center pt-5">
				<h1 class="display-4">Be A Volunteer</h1>
				<hr class="w-25 mx-auto">
				<h3 class="text-center pb-4"><?php echo $success; ?><?php echo $error; ?></h3>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-12 py-2">
						<form  class="form-horizontal" action='' method="POST" enctype="multipart/form-data">
							<div class="row mb-3">
                <!-- Image -->
                <label class="col-sm-2 col-form-label" for="image">Photo</label>
                <div class="col-sm-10">
                	<input type="file" id="image" name="image" accept = image/* placeholder="" class="form-control" required>
                	<p class="help-block">Please provide Photo, required field</p>
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
								<!-- Mobile No -->
								<label class="col-sm-2 col-form-label" for="mobile">Mobile No</label>
								<div class="col-sm-10">
									<input type="number" id="mobile" name="mobile" placeholder="" class="form-control" value="<?= isset($mobile) ? $mobile:'' ?>" required>
									<p class="help-block">Please provide Mobile No.</p>
								</div>
							</div>
							<div class="row mb-3">
								<!-- Email -->
								<label class="col-sm-2 col-form-label" for="email">Email</label>
								<div class="col-sm-10">
									<input type="email" id="email" name="email" placeholder="" class="form-control" value="<?= isset($email) ? $email:'' ?>">
									<p class="help-block">Please provide Email.</p>
								</div>
							</div>
							<div class="row mb-3">
								<!-- Father Name -->
								<label class="col-sm-2 col-form-label" for="f_name">Father Name</label>
								<div class="col-sm-10">
									<input type="text" id="f_name" name="f_name" placeholder="" class="form-control" value="<?= isset($f_name) ? $f_name:'' ?>" required>
									<p class="help-block">Please provide Father Name.</p>
								</div>
							</div>
							<div class="row mb-3">
								<!-- Mother Name -->
								<label class="col-sm-2 col-form-label" for="m_name">Mother Name</label>
								<div class="col-sm-10">
									<input type="text" id="m_name" name="m_name" placeholder="" class="form-control" value="<?= isset($m_name) ? $m_name:'' ?>" required>
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
									<input type="text" id="occupation" name="occupation" placeholder="" class="form-control" value="<?= isset($occupation) ? $occupation:'' ?>" required>
									<p class="help-block">Please provide Occupation.</p>
								</div>
							</div>
							<div class="row mb-3">
								<!-- Education -->
								<label class="col-sm-2 col-form-label" for="education">Education</label>
								<div class="col-sm-10">
									<input type="text" id="education" name="education" placeholder="" class="form-control" value="<?= isset($education) ? $education:'' ?>" required>
									<p class="help-block">Please provide Education.</p>
								</div>
							</div>
							<div class="row mb-3">
								<!-- Date of Birth -->
								<label class="col-sm-2 col-form-label" for="dob">Date of Birth</label>
								<div class="col-sm-10">
									<input type="text" id="dob" name="dob" placeholder="Ex: 20-01-2021" class="form-control" value="<?= isset($dob) ? $dob:'' ?>" required>
									<p class="help-block">Please provide Date of Birth.</p>
								</div>
							</div>
							<div class="row mb-3">
								<!-- Blood -->
								<label class="col-sm-2 col-form-label" for="blood">Blood Group</label>
								<div class="col-sm-10">
									<input type="text" id="blood" name="blood" placeholder="Ex: O+" class="form-control" value="<?= isset($blood) ? $blood:'' ?>" required>
									<p class="help-block">Please provide Blood.</p>
								</div>
							</div>
							<div class="row mb-3">
								<!-- Marital Status -->
								<label class="col-sm-2 col-form-label" for="marital_status">Marital Status</label>
								<div class="col-sm-10">
									<input type="text" id="marital_status" name="marital_status" placeholder="" class="form-control" value="<?= isset($marital_status) ? $marital_status:'' ?>" required>
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
								<label class="col-sm-2 col-form-label" for="fb_id">Facebook ID Link</label>
								<div class="col-sm-10">
									<input type="text" id="fb_id" name="fb_id" placeholder="" class="form-control" value="<?= isset($fb_id) ? $fb_id:'' ?>">
									<p class="help-block">Please provide Facebook ID.</p>
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
									<input type="submit" value="Be a Volunteer" name="submit" class="btn btn-success">
								</div>
							</div>
							</form>
					</div>
				</div>
			</div>
		</section>
		<!-- End body -->
		<!-- ======= footer Start ======= -->
		<?php  include("footer.php"); ?>
		<!-- End footer -->
	</body>
</html>