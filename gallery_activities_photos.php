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
		<!--JQuery fancybox-->
		<link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">
		<!--font awesome-->
		<link rel="stylesheet" href="assets/fontawesome/css/all.css">
		<!--fonts-->
		<link rel="stylesheet" href="assets/fonts/fonts.css">
	</head>
	<body>
		<!-- ======= Header Start ======= -->
		<?php  include("header.php"); ?>
		<!-- End Header -->

		<!-- ======= Gallery Start ======= -->
		<section class="gallery bg-light pt-5">
			<div class="text-center">
				<h1 class="display-4">Gallery</h1>
				<hr class="w-25 mx-auto">
			</div>
			<?php
			include('database.php');
			$category = $_GET['category']; 
			$update_time = $_GET['update_time']; 
			if ($category=='activities') {
				$sql="SELECT `photo`,`file_type` FROM `activities` WHERE category=:category AND update_time=:update_time";
				$stmt=$con->prepare($sql);
				$stmt->execute(['category'=>$category,'update_time'=>$update_time]);
				$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
				$number_of_results=$stmt->rowCount();

				if ($number_of_results>0) {

				// output data of each row
				foreach ($result as $row) {
				?>
				<div class="container-flude">
					<div class="row gy-3 p-5 gallerys">
						<?php
		                    $image=$row["photo"];
		                    $image=explode("**", $image);
		                    $file_type=$row["file_type"];
		                    $file_type=explode("**", $file_type);

		                    $count=count($image)-1;
		                    for ($j=0; $j <$count; ++$j) { 

		                    	if ($file_type[$j] == 'image') {
		                        	?>
		                        		<div class="col-lg-3 col-md-4 col-12 col-xl-3 col-xxl-3 mx-auto shadow-sm">
											<a href="images/activities/<?= $image[$j] ?>" data-fancybox="gallery" data-caption="photo">
												<img class="img-fluid about_img" src="images/activities/<?= $image[$j] ?> " alt="Program images">	
											</a>
										</div>
				                    <?php
		                        } elseif ($file_type[$j] == 'video') {
		                        	?>
		                        		<div class="col-lg-3 col-md-4 col-12 col-xl-3 col-xxl-3 mx-auto shadow-sm">
											<a href="images/activities/<?= $image[$j] ?>" data-fancybox="gallery" data-caption="photo">
												<video width="100%" height="100%" controls>
							                    	<source src="images/activities/<?= $image[$j] ?>">
							                    </video>	
											</a>
										</div>
				                    <?php
		                        } else {
		                        	?>
				                      <div class="col-lg-3 col-md-4 col-12 col-xl-3 col-xxl-3 mx-auto shadow-sm">
											<a href="images/activities/<?= $image[$j] ?>" data-fancybox="gallery" data-caption="photo">
												<img class="img-fluid about_img" src="images/activities/file-format-not-supported.png" alt="Program images">	
											</a>
										</div>
				                    <?php
		                        } 
			                } 
	                    ?>
					</div>
				</div>
				<?php
						
				}
				} else {
				echo "0 results";
				}
			} elseif ($category=='publication') {
				$sql="SELECT `photo`,`file_type` FROM `publication` WHERE category=:category AND update_time=:update_time";
				$stmt=$con->prepare($sql);
				$stmt->execute(['category'=>$category,'update_time'=>$update_time]);
				$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
				$number_of_results=$stmt->rowCount();

				if ($number_of_results>0) {

				// output data of each row
				foreach ($result as $row) {
				?>
				<div class="container-flude">
					<div class="row gy-3 p-5 gallerys">
						<?php
		                    $image=$row["photo"];
		                    $image=explode("**", $image);
		                    $file_type=$row["file_type"];
		                    $file_type=explode("**", $file_type);

		                    $count=count($image)-1;
		                    for ($j=0; $j <$count; ++$j) { 

		                    	if ($file_type[$j] == 'image') {
		                        	?>
		                        		<div class="col-lg-3 col-md-4 col-12 col-xl-3 col-xxl-3 mx-auto shadow-sm">
											<a href="images/publication/<?= $image[$j] ?>" data-fancybox="gallery" data-caption="photo">
												<img class="img-fluid about_img" src="images/publication/<?= $image[$j] ?> " alt="Program images">	
											</a>
										</div>
				                    <?php
		                        } elseif ($file_type[$j] == 'video') {
		                        	?>
		                        		<div class="col-lg-3 col-md-4 col-12 col-xl-3 col-xxl-3 mx-auto shadow-sm">
											<a href="images/publication/<?= $image[$j] ?>" data-fancybox="gallery" data-caption="photo">
												<video width="100%" height="100%" controls>
							                    	<source src="images/publication/<?= $image[$j] ?>">
							                    </video>	
											</a>
										</div>
				                    <?php
		                        } else {
		                        	?>
				                      <div class="col-lg-3 col-md-4 col-12 col-xl-3 col-xxl-3 mx-auto shadow-sm">
											<a href="images/publication/<?= $image[$j] ?>" data-fancybox="gallery" data-caption="photo">
												<img class="img-fluid about_img" src="images/publication/file-format-not-supported.png" alt="Program images">	
											</a>
										</div>
				                    <?php
		                        } 
			                } 
	                    ?>
					</div>
				</div>
				<?php
						
				}
				} else {
				echo "0 results";
				}
			} elseif ($category=='report') {
				$sql="SELECT `photo`,`file_type` FROM `report` WHERE category=:category AND update_time=:update_time";
				$stmt=$con->prepare($sql);
				$stmt->execute(['category'=>$category,'update_time'=>$update_time]);
				$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
				$number_of_results=$stmt->rowCount();

				if ($number_of_results>0) {

				// output data of each row
				foreach ($result as $row) {
				?>
				<div class="container-flude">
					<div class="row gy-3 p-5 gallerys">
						<?php
		                    $image=$row["photo"];
		                    $image=explode("**", $image);
		                    $file_type=$row["file_type"];
		                    $file_type=explode("**", $file_type);

		                    $count=count($image)-1;
		                    for ($j=0; $j <$count; ++$j) { 

		                    	if ($file_type[$j] == 'image') {
		                        	?>
		                        		<div class="col-lg-3 col-md-4 col-12 col-xl-3 col-xxl-3 mx-auto shadow-sm">
											<a href="images/report/<?= $image[$j] ?>" data-fancybox="gallery" data-caption="photo">
												<img class="img-fluid about_img" src="images/report/<?= $image[$j] ?> " alt="Program images">	
											</a>
										</div>
				                    <?php
		                        } elseif ($file_type[$j] == 'video') {
		                        	?>
		                        		<div class="col-lg-3 col-md-4 col-12 col-xl-3 col-xxl-3 mx-auto shadow-sm">
											<a href="images/report/<?= $image[$j] ?>" data-fancybox="gallery" data-caption="photo">
												<video width="100%" height="100%" controls>
							                    	<source src="images/report/<?= $image[$j] ?>">
							                    </video>	
											</a>
										</div>
				                    <?php
		                        } else {
		                        	?>
				                      <div class="col-lg-3 col-md-4 col-12 col-xl-3 col-xxl-3 mx-auto shadow-sm">
											<a href="images/report/<?= $image[$j] ?>" data-fancybox="gallery" data-caption="photo">
												<img class="img-fluid about_img" src="images/report/file-format-not-supported.png" alt="Program images">	
											</a>
										</div>
				                    <?php
		                        } 
			                } 
	                    ?>
					</div>
				</div>
				<?php
						
				}
				} else {
				echo "0 results";
				}
			}
			
			
			?>
		</section>
		<!-- End Gallery -->

		<!-- ======= footer Start ======= -->
		<?php  include("footer.php"); ?>
		<!-- End footer -->
		
		<!--javascript--> 
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		<script src="assets/js/jquery-3.5.1.min.js"></script>
		<script src="assets/js/jquery.fancybox.min.js"></script>
		<script src="assets/js/smooth-scroll.polyfills.min.js"></script>

		<script>
			$("[data-fancybox]").fancybox();
		</script>

		<script>
			var scroll = new SmoothScroll('a[href*="#"]');
		</script>
	</body>
</html>