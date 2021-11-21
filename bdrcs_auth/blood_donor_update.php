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
                $sql = "select * from blood_donor where id=:id";

                $stmt = $con->prepare($sql);
                $stmt->execute(['id'=>$id]);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                //print_r($result); die();
                
                if ($result)
                {
                foreach ($result as $row)
                  {
                  $id = $row['id']; 
                  $name = $row['name']; 
                  $address = $row['address']; 
                  $occupation = $row['occupation'];
                  $blood = $row['blood'];
                  $gender = $row['gender'];
                  $dob = $row['dob'];
                  $mobile = $row['mobile'];
                  $email = $row['email'];
                  }
                // Free result set
                //mysqli_free_result($result);
              }
              }               

              ?>
              <form class="form-horizontal" action='blood_donor_update_final.php' method="POST" enctype="multipart/form-data">
                <fieldset> 
                  <h3 class="text-center pb-4">Update Blood Donor</h3> 
                  <input type="hidden" name="id" value="<?php echo $id; ?>">               
                  <div class="row mb-3">
                    <!-- Full Name -->
                    <label class="col-sm-2 col-form-label" for="name">Name</label>
                    <div class="col-sm-10">
                      <input type="text" id="name" name="name" placeholder="" value="<?php echo $name; ?>" class="form-control">
                      <p class="help-block">Please provide Name, required field</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Address -->
                    <label class="col-sm-2 col-form-label" for="address">Address</label>
                    <div class="col-sm-10">
                      <input type="text" id="address" name="address" placeholder="" value="<?php echo $address; ?>" class="form-control">
                      <p class="help-block">Please provide Address.</p>
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
                    <!-- Blood -->
                    <label class="col-sm-2 col-form-label" for="blood">Blood</label>
                    <div class="col-sm-10">
                      <input type="text" id="blood" name="blood" placeholder="" value="<?php echo $blood; ?>" class="form-control">
                      <p class="help-block">Please provide Blood.</p>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <!-- Gender -->
                    <label class="col-sm-2 col-form-label" for="gender">Gender</label>
                    <div class="col-sm-10">
                      <select name="gender" class="form-control" id="gender">
                        <option value="Male"
                          <?php
                            if ($gender=="Male") {
                              echo "selected";
                            }
                          ?>
                        >Male</option>
                        <option value="Female"
                          <?php
                            if ($gender=="Female") {
                              echo "selected";
                            }
                          ?>
                        >Female</option>
                        <option value="Other"
                          <?php
                            if ($gender=="Other") {
                              echo "selected";
                            }
                          ?>
                        >Other</option>
                      </select>
                      <p class="help-block">Please provide Gender.</p>
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
                    <!-- Button -->
                    <div class="controls text-center">
                      <input type="submit" value="Upadte Blood Donor" name="submit" class="btn btn-success">
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