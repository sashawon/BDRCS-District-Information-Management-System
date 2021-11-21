		<!-- ======= Header Start ======= -->
		<?php  include("header.php"); ?>
		<!-- End Header -->
		<!-- ======= Gallery Start ======= -->
		<section class="gallery bg-light pt-5">
			<div class="text-center">
				<h1 class="display-4">Gallery</h1>
				<hr class="w-25 mx-auto">
			</div>
			<div class="container">
				<div class="row py-5">
					<div class="col-lg-12 col-md-12 col-12 col-xxl-12 align-items-start flex-column">
						<div class="row">
							<?php
							include('database.php');

							// Ek page a koyta dekhabo SET kori. 
							$results_per_page = 100;
							$sql="SELECT `id`, `photo`, `title`, `category`, `file_type`, `update_time` FROM `activities` UNION ALL SELECT `id`, `photo`, `title`, `category`, `file_type`, `update_time` FROM `publication` UNION ALL SELECT `id`, `photo`, `title`, `category`, `file_type`, `update_time` FROM `report`";
							$stmt=$con->prepare($sql);
							$stmt->execute();
							$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
							$number_of_results=$stmt->rowCount();
							//print_r($number_of_results); die();

							// Page count frontend er formula
							$number_of_pages = ceil($number_of_results/$results_per_page);
							//echo $countcharacter; 

							// ?page='x' eitar check 
							if (!isset($_GET['page'])) {
							$page = 1;
							} else {
							$page = $_GET['page'];
							}
							// 1 page a koyta show korbo seitar formula 
							$this_page_first_result = ($page-1)*$results_per_page;


							$sql="SELECT `id`, `photo`, `title`, `category`, `file_type`, `update_time` FROM `activities` UNION ALL SELECT `id`, `photo`, `title`, `category`, `file_type`, `update_time` FROM `publication` UNION ALL SELECT `id`, `photo`, `title`, `category`, `file_type`, `update_time` FROM `report` ORDER BY update_time DESC LIMIT ".$this_page_first_result . "," .  $results_per_page;
							$stmt=$con->prepare($sql);
							$stmt->execute();
							$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
							$number_of_results=$stmt->rowCount();

							if ($number_of_results>0) {

							// output data of each row
							foreach ($result as $row) {

							?>
							<div class="col-lg-3 col-md-3 col-12 col-xxl-3 mx-auto">
								<a class="text-decoration-none text-dark" href="gallery_activities_photos.php?update_time=<?php echo $row['update_time']; ?> && category=<?php echo $row['category']; ?>">
									<div class="card mb-3" style="max-width: 540px;">
										<div class="row g-0">
											<?php
						                        $image=$row["photo"];
						                        $image=explode("**", $image);
						                        $file_type=$row["file_type"];
						                        $file_type=explode("**", $file_type);
						                        $category=$row['category'];

						                        if ($category=='activities') {
						                        	if ($file_type[0] == 'image') {
							                        	?>
									                      <img style="width: 100%; height:200px" class='card-img-top img-fluid' alt='Prpgram_Image' src="images/activities/<?= $image[0] ?> ">
									                    <?php
							                        } elseif ($file_type[0] == 'video') {
							                        	?>
									                      <video width="100%" height="200px" controls>
									                      	<source src="images/activities/<?= $image[0] ?>" type="video/mp4">
									                      </video>
									                    <?php
							                        } else {
							                        	?>
									                      <img style="width: 100%; height:200px" class='card-img-top img-fluid' alt='Prpgram_Image' src="images/activities/file-format-not-supported.png">
									                    <?php
							                        } 
						                        } elseif ($category=='publication') {
						                        	if ($file_type[0] == 'image') {
							                        	?>
									                      <img style="width: 100%; height:200px" class='card-img-top img-fluid' alt='Prpgram_Image' src="images/publication/<?= $image[0] ?> ">
									                    <?php
							                        } elseif ($file_type[0] == 'video') {
							                        	?>
									                      <video width="100%" height="200px" controls>
									                      	<source src="images/publication/<?= $image[0] ?>" type="video/mp4">
									                      </video>
									                    <?php
							                        } else {
							                        	?>
									                      <img style="width: 100%; height:200px" class='card-img-top img-fluid' alt='Prpgram_Image' src="images/publication/file-format-not-supported.png">
									                    <?php
							                        } 
						                        } elseif ($category=='report') {
						                        	if ($file_type[0] == 'image') {
							                        	?>
									                      <img style="width: 100%; height:200px" class='card-img-top img-fluid' alt='Prpgram_Image' src="images/report/<?= $image[0] ?> ">
									                    <?php
							                        } elseif ($file_type[0] == 'video') {
							                        	?>
									                      <video width="100%" height="200px" controls>
									                      	<source src="images/report/<?= $image[0] ?>" type="video/mp4">
									                      </video>
									                    <?php
							                        } else {
							                        	?>
									                      <img style="width: 100%; height:200px" class='card-img-top img-fluid' alt='Prpgram_Image' src="images/report/file-format-not-supported.png">
									                    <?php
							                        } 
						                        }
						                        
											?>
											<div class="card-body">
												<small class="text-primary"><i><?php echo $row["category"]; ?></i></small>
												<hr class="pt-0 mt-0">
												<h6><?php echo $row["title"]; ?></h6>
											</div>
										</div>
									</div>
								</a>
							</div>
							<?php
							
							}
							} else {
							echo "0 results";
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<!-- PAGINATION -->
			<div class="p-0 my-3">
				<div class="container">
				  <div class="row">
				    <div class="col-md-12 d-flex flex-row-reverse">
				      <ul class="pagination text-center m-0">
				      
				      <?php 
				      // display the links to the pages
				      for ($page=1;$page<=$number_of_pages;$page++) {
				      ?>

				      <li class="page-item">
				      <a class="page-link text-dark" href="gallery.php?id=<?= urlencode($row['id']) ?>&&page=<?= $page?>"><?php echo $page?></a>
				      </li>
				      
				      <?php   
				      }
				      ?> 
				      </ul>
				    </div>
				  </div>
				</div>
			</div>
		</section>
		<!-- End Gallery -->
		<!-- ======= footer Start ======= -->
		<?php  include("footer.php"); ?>
		<!-- End footer -->
	</body>
</html>