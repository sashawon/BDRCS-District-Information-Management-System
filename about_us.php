<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!--Titel-->
		<title>BDRCS | Bangladesh Red Crescent Society</title>
		<link rel="icon" type="image/png" sizes="32x32" href="images/logo.png">
		<!--Custom CSS-->
		<link rel="stylesheet" href="assets/css/style.css">
		<!--bootstrap-->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<!--font awesome-->
		<link rel="stylesheet" href="assets/fontawesome/css/all.css">
		<!--fonts-->
		<link rel="stylesheet" href="assets/fonts/fonts.css">
	</head>
	<body>
		<!-- ======= Header Start ======= -->
		<?php  include("header.php"); ?>
		<!-- End Header -->

		<!-- ======= Vision & Mission Start ======= -->
		<section class="vision_mission bg-light pt-5" id="vision_mission">
			<div class="text-center">
				<h1 class="display-4">Vision & Mission</h1>
				<hr class="w-25 mx-auto">
			</div>
			<div class="container">
				<div class="row pb-5">
					<div class="col-lg-12 col-md-12 col-12 col-xxl-12 d-flex justify-content-center align-items-start flex-column">
						<p class="h4">Vision</p>
						<p>To become a leading humanitarian organization by mobilizing the power of humanity.</p>
					</div>
					<div class="col-lg-12 col-md-12 col-12 col-xxl-12 d-flex justify-content-center align-items-start flex-column">
						<p class="h4">Mission</p>
						<p>The Bangladesh Red Crescent Society, a volunteer based humanitarian organization, endeavors to prevent and reduce human sufferings and save lives of the most vulnerable and marginalized groups by providing effective and efficient services through mobilizing resources in emergencies and normal time.</p>
					</div>
				</div>
			</div>
		</section>
		<!-- End Vision & Mission -->

		<!-- ======= about Chuadanga Unit Start ======= -->
		<section class="chuadanga_unit pt-5" id="chuadanga_unit">
			<div class="text-center">
				<h1 class="display-4">Chuadanga Unit</h1>
				<hr class="w-25 mx-auto">
			</div>
			<div class="container">
				<div class="row pb-5">
					<div class="col-lg-12 col-md-12 col-12 col-xxl-12 d-flex justify-content-center align-items-start flex-column text-justify">
						<?php 
						require('database.php');
						$id=1;
                        $sql= "SELECT `des` FROM `about_us` WHERE id=:id";
                        $stmt=$con->prepare($sql);
						$stmt->execute(['id'=>$id]);
						$result=$stmt->fetchAll(PDO::FETCH_ASSOC);

						// output data of each row
						foreach ($result as $row) 
                        echo $row["des"];
                        ?>
					</div>
				</div>
			</div>
		</section>
		<!-- End about Chuadanga Unit -->

		<!-- ======= footer Start ======= -->
		<?php  include("footer.php"); ?>
		<!-- End footer -->
		
		<!--javascript-->
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		<script src="assets/js/smooth-scroll.polyfills.min.js"></script>
		<script>
			var scroll = new SmoothScroll('a[href*="#"]');
		</script>
	</body>
</html>