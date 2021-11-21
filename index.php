		<!-- ======= Header Start ======= -->
		<?php  include("header.php"); ?>
		<!-- End Header -->
		<!-- ======= carousal Start ======= -->
		<section class="carousel_section">
			<div class="container-flude px-2">
				<div class="row">
					<div class="col-lg-9 col-md-12 col-12 col-xxl-9 mx-auto border m-0 p-0">
						<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
							<?php
								include('database.php');
								$sql="SELECT * FROM banners WHERE status='1'";
								$stmt=$con->prepare($sql);
								$stmt->execute();
								$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
								$total=$stmt->rowCount();
							?>
							<ol class="carousel-indicators">
							<?php
								for ($i=0; $i < $total; $i++) {
									if ($i==0){
									?>
										<li data-target="#carouselExampleCaptions" data-slide-to="<?= $i ?>" class="active"></li>
									<?php
									} else {
									?>
										<li data-target="#carouselExampleCaptions" data-slide-to="<?= $i ?>"></li>
									<?php
									} 
								}
							?>
							</ol>
							<div class="carousel-inner">
							<?php
								$i = 0;
								if ($total>0) {
									foreach ($result as $row) {
										// echo "<pre>";
										// print_r($result);
										// die();
										if ($i==0) {
											?>
											<div class="carousel-item active">
												<img src="images/slider/<?=$row["image"]?>" class="d-block w-100" alt="images/slider/<?=$row["image"]?>">
												<div class="carousel-caption d-md-block">
													<h5></h5>
												</div>
											</div>
											<?php
										} else {
											?>
											<div class="carousel-item">
												<img src="images/slider/<?=$row["image"]?>" class="d-block w-100" alt="images/slider/<?=$row["image"]?>">
												<div class="carousel-caption d-md-block">
													<h5></h5>
												</div>
											</div>
											<?php
										}
										$i++;
									}
								} else {
									echo "0 results";
								}
							?>
							</div>
							<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-12 col-12 col-xxl-3 mx-auto bg-light border m-0 p-0">
						<div class="card w-100">
							<div class="card-header text-center" style="background-color: #C6C6C6;">
								Latest News
							</div>
							<div class="card-body m-0 p-0" style="overflow-y: scroll; max-height: 70vh;">
								<ul class="list-group list-group-flush">
									<?php
									include('database.php');
									$LIMIT=15;
									$sql="SELECT * FROM notice ORDER BY id DESC LIMIT $LIMIT";
									$stmt=$con->prepare($sql);
									$stmt->execute();
									$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
									$total=$stmt->rowCount();

									if ($total>0) {
									
									foreach ($result as $row) {

									?>
									<li class="list-group-item bg-light p-0" style="font-size: 14px;">
										<a class="nav-link text-dark p-1 pb-0" href='notice.php?id=<?=$row["id"]?>&&title=<?=$row["title"]?>&&des=<?=$row["des"]?>&&date=<?=$row["date"]?>'>
											<?php echo $row["title"]; ?>
										</a>
										<a class="nav-link text-dark p-1 pt-0" href='notice.php?id=<?=$row["id"]?>&&title=<?=$row["title"]?>&&des=<?=$row["des"]?>&&date=<?=$row["date"]?>'><small class="p-2"><i class="far fa-calendar-alt mr-1"></i><?php echo $row["date"]; ?></small></a>
									</li>
									<?php
								
									}
									} else {
										echo "0 results";
									}
									?>								
								</ul>
							</div>
							<div class="card-footer text-center m-0 p-0" style="background-color: #C6C6C6;">
								<a class="text-decoration-none" href="all_notice.php">Read All News!</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End carousal -->
		<!-- ======= about us Start ======= -->
		<section class="about_us bg-light pt-5" id="about_us">
			<div class="text-center">
				<h1 class="display-4">about us</h1>
				<hr class="w-25 mx-auto">
			</div>
			<div class="container">
				<div class="row py-5">
					<div class="col-lg-6 col-md-6 col-12 col-xxl-6">
						<figure>
							<img class="img-thumbnail about_img" src="images/about_us.jpg" alt="About us images">
						</figure>
					</div>
					<div class="col-lg-6 col-md-6 col-12 col-xxl-6 d-flex justify-content-center align-items-start flex-column">
						<h3>Chuadanga Unit (BDRCS)</h3>
						<p>বাংলাদেশ রেড ক্রিসেন্ট সোসাইটি সারা দেশে আর্ত মানবতার সেবাই নিয়োজিত একটি অলাভজনক প্রতিষ্ঠান। তারই একটি অংশ হিসেবে চুয়াডাঙ্গা রেড ক্রিসেন্ট ইউনিট ১৯৮০ সাল থেকে কাজ করে যাচ্ছে। ইউনিটটিতে ১১ সদস্য বিশিষ্ঠ সক্রিয় কার্য নির্বাহী কমিটি আছে। বর্তমানে ইউনিটটি দ্বারা পরিচালিত কর্মসূচির মধ্যে রয়েছে দুর্যোগে সাড়া প্রদান, এজিএম এবং রিপোর্ট প্রকাশ, যুব সেচ্ছাসেবকদের উন্নয়ন, কর্ম পরিকলাপনা, শিক্ষা প্রতিষ্ঠানে রেডক্রস ও রেড ক্রিসেন্টের মৌলিক এবং প্রাথমিক চিকিৎসা বিষয়ক প্রশিক্ষন প্রদান, শিক্ষা প্রতিষ্ঠানে যুব রেড ক্রিসেন্টের দল গঠন, "অটিস্টিক শিশুদের সাথে সদাচরন" এবং "দুর্যোগকালীন সময়ে অটিস্টিক শিশুদের নিরাপত্তা" বিষয়ক সচেতনতা মূলক পরামর্শ সভা, আরএফএল কার্যক্রম, সেচ্ছায় রক্তদান কর্মর্সচী, আজীবন সদস্য সংগ্রহ, কম্বল বিতরন কার্যক্রম উল্লেখযোগ্য। কৌশলগত পরিকল্পনায় ইউনিটটি উন্নয়ন লক্ষ্যের উদ্দেশ্য অনুযায়ী চুয়াডাঙ্গা ইঊনিটের ফলাফন ৩১.২৫%। ইউনিটে সক্রিয় যুব কমিটি এবং সেচ্ছাসেবক আছে।</p>
						<a type="button" class="btn btn-outline-info" href="about_us.php">Check more!</a>
					</div>
				</div>
			</div>
		</section>
		<!-- End about us -->
		<!-- ======= Total Member count Start ======= -->
		<section class="total_member_count pt-5" id="total_member_count">
			<div class="container">
				<div class="row pb-5">
					<?php
					include('database.php');
					$status=1;
					$sql1="SELECT * FROM volunteer WHERE status=:status";
					$stmt=$con->prepare($sql1);
					$stmt->execute(['status'=>$status]);
					$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
					$total1=$stmt->rowCount();
					?>
					<div class="col-lg-3 col-md-3 col-12 col-xxl-3 d-flex justify-content-center align-items-center flex-column">
						<div class="p-2 text-center"><img src="images/volunteer-1.png" alt="" width="120" height="120"></div>
						<div class="p-2 h2 text-center"><span class="counter"><?php echo $total1 ?></span></div>
						<div class="p-2 h2 text-center">Volunteer</div>
					</div>
					<?php
					include('database.php');
					$sql2="SELECT * FROM life_member";
					$stmt=$con->prepare($sql2);
					$stmt->execute();
					$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
					$total2=$stmt->rowCount();
					?>
					<div class="col-lg-3 col-md-3 col-12 col-xxl-3 d-flex justify-content-center align-items-center flex-column">
						<div class="p-2 text-center"><img src="images/people-reached.png" alt="" width="120" height="120"></div>
						<div class="p-2 h2 text-center"><span class="counter"><?php echo $total2 ?></span></div>
						<div class="p-2 h2 text-center">Life Member</div>
					</div>
					<?php
					include('database.php');
					$status=1;
					$sql3="SELECT * FROM blood_donor WHERE status=:status";
					$stmt=$con->prepare($sql3);
					$stmt->execute(['status'=>$status]);
					$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
					$total3=$stmt->rowCount();
					?>
					<div class="col-lg-3 col-md-3 col-12 col-xxl-3 d-flex justify-content-center align-items-center flex-column">
						<div class="p-2 text-center"><img src="images/member-1.png" alt="" width="120" height="120"></div>
						<div class="p-2 h2 text-center"><span class="counter"><?php echo $total3 ?></span></div>
						<div class="p-2 h2 text-center">Blood Donor</div>
					</div>
					<?php
					include('database.php');
					$sql4="SELECT * FROM donor_member";
					$stmt=$con->prepare($sql4);
					$stmt->execute();
					$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
					$total4=$stmt->rowCount();
					?>
					<div class="col-lg-3 col-md-3 col-12 col-xxl-3 d-flex justify-content-center align-items-center flex-column">
						<div class="p-2 text-center"><img src="images/donor-1.png" alt="" width="120" height="120"></div>
						<div class="p-2 h2 text-center"><span class="counter"><?php echo $total4 ?></span></div>
						<div class="p-2 h2 text-center">Donor Member</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Total Member count -->
		<!-- ======= activities Start ======= -->
		<section class="activities bg-light pt-5" id="activities">
			<div class="text-center">
				<h1 class="display-4">Events</h1>
				<hr class="w-25 mx-auto">
			</div>
			<div class="container services">
				<div class="row my-5">
					<?php
					include('database.php');
					$LIMIT=6;
					$sql="SELECT * FROM activities ORDER BY id DESC LIMIT $LIMIT";
					$stmt=$con->prepare($sql);
					$stmt->execute();
					$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
					$total=$stmt->rowCount();

					if ($total>0) {
					
					foreach ($result as $row) {

					?>
					<div class="col-lg-4 col-md-4 col-10 col-xxl-4 mx-auto">
						<div class="card mb-3" style="max-width: 540px;">
							<div class="row g-0">
								<a class="text-decoration-none text-dark text-center m-0 p-0" href="activities.php">
									<?php
				                        $image=$row["photo"];
				                        $image=explode("**", $image);
									?>
									<img style="width: 100%; height:220px" class='card-img-top img-fluid' alt='Responsive image' src="images/activities/<?= $image[0] ?> ">
									<?php 
									?>
									<div class="card-body">
										<p class="card-text m-0">
											<?php echo $row["title"]; ?>
										</p>
										<small class="card-text m-0">
											<?php echo $row["type"]; ?>
										</small>
									</div>
								</a>
							</div>
						</div>
					</div>
					<?php
					
					}
					} else {
					echo "0 results";
					}
					?>					
				</div>
			</div>
		</section>
		<!-- End activities -->
		<!-- ======= Gallery Start ======= -->
		<section class="gallery pt-5">
			<div class="text-center">
				<h1 class="display-4">Gallery</h1>
				<hr class="w-25 mx-auto">
			</div>
			
			<div class="container services">
				<div class="row gy-2 py-5">
				<?php 
				$LIMIT=6;
				$sql="SELECT `photo`, `category`, `file_type`, `update_time` FROM `activities` UNION ALL SELECT `photo`, `category`, `file_type`, `update_time` FROM `publication` UNION ALL SELECT `photo`, `category`, `file_type`, `update_time` FROM `report` ORDER BY update_time DESC LIMIT $LIMIT";
				$stmt=$con->prepare($sql);
				$stmt->execute();
				$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
				$total=$stmt->rowCount();

				if ($total>0) {
				
				foreach ($result as $row) {
				
	                $image=$row["photo"];
	                $image=explode("**", $image);
	                $file_type=$row["file_type"];
	                $file_type=explode("**", $file_type);
	                $category=$row['category'];

	                if ($category=='activities') {
	                	if ($file_type[0] == 'image') {
	                    	?>
		                    	<div class="col-lg-4 col-md-4 col-10 col-xxl-4 mx-auto shadow-sm">
									<a class="text-decoration-none text-dark text-center m-0 p-0" href="gallery.php">
										<figure>
											<img style="width: 100%; height:220px" class="img-fluid about_img" src="images/activities/<?= $image[0] ?> " alt="Program images">
										</figure>
									</a>
								</div>
		                    <?php
	                    } elseif ($file_type[0] == 'video') {
	                    	?>
	                    		<div class="col-lg-4 col-md-4 col-10 col-xxl-4 mx-auto shadow-sm">
									<a class="text-decoration-none text-dark text-center m-0 p-0" href="gallery.php">
										<video style="width: 100%; height:220px" controls>
											<source src="images/activities/<?= $image[0] ?> " type="video/mp4">
										</video>
									</a>
								</div>
		                    <?php
	                    } else {
	                    	?>
	                    		<div class="col-lg-4 col-md-4 col-10 col-xxl-4 mx-auto shadow-sm">
									<a class="text-decoration-none text-dark text-center m-0 p-0" href="gallery.php">
										<figure>
											<img style="width: 100%; height:200px" class='card-img-top img-fluid' alt='Program images' src="images/activities/file-format-not-supported.png">
										</figure>
									</a>
								</div>
		                      
		                    <?php
	                    } 
                    } elseif ($category=='publication') {
                    	if ($file_type[0] == 'image') {
	                    	?>
		                    	<div class="col-lg-4 col-md-4 col-10 col-xxl-4 mx-auto shadow-sm">
									<a class="text-decoration-none text-dark text-center m-0 p-0" href="gallery.php">
										<figure>
											<img style="width: 100%; height:220px" class="img-fluid about_img" src="images/publication/<?= $image[0] ?> " alt="publication images">
										</figure>
									</a>
								</div>
		                    <?php
	                    } elseif ($file_type[0] == 'video') {
	                    	?>
	                    		<div class="col-lg-4 col-md-4 col-10 col-xxl-4 mx-auto shadow-sm">
									<a class="text-decoration-none text-dark text-center m-0 p-0" href="gallery.php">
										<video style="width: 100%; height:220px" controls>
											<source src="images/publication/<?= $image[0] ?> " type="video/mp4">
										</video>
									</a>
								</div>
		                    <?php
	                    } else {
	                    	?>
	                    		<div class="col-lg-4 col-md-4 col-10 col-xxl-4 mx-auto shadow-sm">
									<a class="text-decoration-none text-dark text-center m-0 p-0" href="gallery.php">
										<figure>
											<img style="width: 100%; height:200px" class='card-img-top img-fluid' alt='publication images' src="images/publication/file-format-not-supported.png">
										</figure>
									</a>
								</div>
		                      
		                    <?php
	                    } 
                    } elseif ($category=='report') {
                    	if ($file_type[0] == 'image') {
	                    	?>
		                    	<div class="col-lg-4 col-md-4 col-10 col-xxl-4 mx-auto shadow-sm">
									<a class="text-decoration-none text-dark text-center m-0 p-0" href="gallery.php">
										<figure>
											<img style="width: 100%; height:220px" class="img-fluid about_img" src="images/report/<?= $image[0] ?> " alt="report images">
										</figure>
									</a>
								</div>
		                    <?php
	                    } elseif ($file_type[0] == 'video') {
	                    	?>
	                    		<div class="col-lg-4 col-md-4 col-10 col-xxl-4 mx-auto shadow-sm">
									<a class="text-decoration-none text-dark text-center m-0 p-0" href="gallery.php">
										<video style="width: 100%; height:220px" controls>
											<source src="images/report/<?= $image[0] ?> " type="video/mp4">
										</video>
									</a>
								</div>
		                    <?php
	                    } else {
	                    	?>
	                    		<div class="col-lg-4 col-md-4 col-10 col-xxl-4 mx-auto shadow-sm">
									<a class="text-decoration-none text-dark text-center m-0 p-0" href="gallery.php">
										<figure>
											<img style="width: 100%; height:200px" class='card-img-top img-fluid' alt='report images' src="images/report/file-format-not-supported.png">
										</figure>
									</a>
								</div>
		                      
		                    <?php
	                    } 
                    }
				}
			} else {
			echo "0 results";
			}
			?>
				</div>
			</div>
			
		</section>
		<!-- End Gallery -->
		<!-- ======= Add Member Start ======= -->
		<section class="add_member bg-light pt-5" id="total_member_count">
			<div class="container">
				<div class="row pb-5">
					<div class="col-lg-4 col-md-4 col-12 col-xxl-4 d-flex justify-content-center align-items-center flex-column">
						<div class="p-2 text-center"><img src="images/donate.png" alt="" width="120" height="120"></div>
						<div class="p-2 text-center"><a type="button" class="btn btn-outline-danger" href="donate_us.php">DONATE US</a></div>
						<div class="p-2 text-center"><p>Your thoughtful donation of any amount would prevent and reduce human sufferings and save lives of the most vulnerable and marginalized groups.</p></div>
					</div>
					<div class="col-lg-4 col-md-4 col-12 col-xxl-4 d-flex justify-content-center align-items-center flex-column">
						<div class="p-2 text-center"><img src="images/blood.png" alt="" width="120" height="120"></div>
						<div class="p-2 text-center"><a type="button" class="btn btn-outline-danger" href="be_a_blood_donor.php">Be A BLOOD</a></div>
						<div class="p-2 text-center"><p>Giving blood is a simple thing to do, but it can make a big difference in the lives of others. Make a life-saving blood donation appointment or request for Blood.</p></div>
					</div>
					<div class="col-lg-4 col-md-4 col-12 col-xxl-4 d-flex justify-content-center align-items-center flex-column">
						<div class="p-2 text-center"><img src="images/volunteer.png" alt="" width="120" height="120"></div>
						<div class="p-2 text-center"><a type="button" class="btn btn-outline-danger" href="be_a_volunteer.php">BE A VOLUNTEER</a></div>
						<div class="p-2 text-center"><p>Volunteers are  the backbone of our Movement. You can make a difference by volunteering with Bangladesh Red Crescent Society in tackling humanitarian challenges.</p></div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Add Member -->
		<!-- ======= contact us Start ======= -->
		<section class="contact_us pt-5" id="contact_us">
			<div class="text-center">
				<h1 class="display-4">contact us</h1>
				<hr class="w-25 mx-auto">
			</div>
			<div class="container">
				<div class="row py-5">
					<div class="col-lg-6 col-md-6 col-12 col-xxl-6">
						<h3>Chuadanga Unit (BDRCS)</h3>
						<div class="col-12 my-5">
							<p class="m-0">Tell: 076162296</p>
							<p class="m-0">Cell : 01712502527</p>
							<p class="m-0">Email : chuadanga@bdrcs.org</p>
						</div>
						<div class="col-12 my-5">
							<h5 class="m-0">Gour</h5>
							<p class="m-0">Chuadanga Unit Officer, BDRCS.</p>
							<p class="m-0">Contact: 01723075046</p>
							<p class="m-0">Email: chuadanga@bdrcs.org</p>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-12 col-xxl-6 d-flex justify-content-center align-items-center flex-column">
						<?php 
							$msg='';
							if (isset($_GET['error'])) {
								$msg='Please Fill in the Blanks';
								echo "<div class='alert alert-danger' role='alert'>".$msg."</div>";
							} if (isset($_GET['success'])) {
								$msg='Your Massage Has Been Sent';
								echo "<div class='alert alert-success' role='alert'>".$msg."</div>";
							}
						?>
						<form method="POST" action="contact.php">
							<div class="mb-3">
								<label for="name" class="form-label">name</label>
								<input type="name" class="form-control" id="name" name="name" aria-describedby="name" required="">
							</div>
							<div class="mb-3">
								<label for="email" class="form-label">Email address</label>
								<input type="email" class="form-control" id="email" name="email" aria-describedby="email" required="">
								<div id="email" class="form-text">We'll never share your email with anyone else.</div>
							</div>
							<div class="mb-3">
								<label for="subject" class="form-label">Subject</label>
								<input type="text" class="form-control" id="subject" name="subject" aria-describedby="subject" required="">
							</div>
							<div class="mb-3">
								<label for="massage" class="form-label">Massage</label>
								<textarea class="form-control" id="massage" name="massage" rows="3" required=""></textarea>
							</div>
							<button type="submit" name="submit_email" class="btn btn-primary">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</section>
		<!-- End contact us -->
		<!-- ======= address Start ======= -->
		<section class="address bg-light pt-5" id="about_us">
			<div class="text-center">
				<h1 class="display-4">Address</h1>
				<hr class="w-25 mx-auto">
			</div>
			<div class="container">
				<div class="row py-5">
					<div class="col-lg-6 col-md-6 col-12 col-xxl-6 d-flex flex-column">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d913.7767271961824!2d88.84608562268147!3d23.636342077513255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjPCsDM4JzExLjAiTiA4OMKwNTAnNDcuNyJF!5e0!3m2!1sbn!2sbd!4v1611602533057!5m2!1sbn!2sbd" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
					</div>
					<div class="col-lg-6 col-md-6 col-12 col-xxl-6 pt-5 text-center align-self-start">
						<h4>Chuadanga Red Crescent Unit</h4>
						<h5>Red Crescent Eye Hospital Vobon</h5>
						<h6>Sodor Hospital Road, Chuadanga </h6>
					</div>
				</div>
			</div>
		</section>
		<!-- End address -->
		<!-- ======= footer Start ======= -->
		<?php  include("footer.php"); ?>
		<!-- End footer -->
		
		<!--javascript-->
		<script>
			$('.counter').each(function () {
			    $(this).prop('Counter',0).animate({
			        Counter: $(this).text()
			    }, {
			        duration: 4000,
			        easing: 'swing',
			        step: function (now) {
			            $(this).text(Math.ceil(now));
			        }
			    });
			});
		</script>
	</body>
</html>