		<!-- ======= Header Start ======= -->
		<?php  include("header.php"); ?>
		<!-- End Header -->
		<!-- ======= body Start ======= -->
		<section class="main-body bg-light pb-3">
			<div class="text-center pt-5">
				<h1 class="display-4">All Publication</h1>
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
							$sql="SELECT * FROM publication";
							$stmt=$con->prepare($sql);
							$stmt->execute();
							$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
							$number_of_results=$stmt->rowCount();

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


							$sql="SELECT * FROM publication ORDER BY id DESC LIMIT ".$this_page_first_result . "," .  $results_per_page;
							$stmt=$con->prepare($sql);
							$stmt->execute();
							$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
							$number_of_results=$stmt->rowCount();

							if ($number_of_results>0) {
							
							// output data of each row
							foreach ($result as $row) {
							?>
							<div class="col-lg-3 col-md-3 col-12 col-xxl-3 mx-auto">
								<div class="card mb-3 view_data" id="<?php echo $row["id"]; ?>" data-toggle="modal" data-target="#exampleModal" style="max-width: 540px;">
									<div class="row g-0">
										<?php
					                        $image=$row["photo"];
					                        $image=explode("**", $image);
					                        $file_type=$row["file_type"];
					                        $file_type=explode("**", $file_type);

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
					                    ?>
										<div class="card-body">											
											<h6><?php echo $row["title"]; ?></h6>
										</div>
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
				      <a class="page-link text-dark" href="publication.php?id=<?= urlencode($row['id']) ?>&&page=<?= $page?>"><?php echo $page?></a>
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
		<!-- End body -->
		<!-- ======= Model Start ======= -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Details</h5>
						<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body" id="activity_details">
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<!-- End Model -->
		<!-- ======= footer Start ======= -->
		<?php  include("footer.php"); ?>
		<!-- End footer -->
		
		<!--javascript-->
		<script>  
			 $(document).ready(function(){  
			      $('.view_data').click(function(){
			        //alert('hello');
			           var publication_id = $(this).attr("id"); 
			           //console.log(publication_id); 
			           $.ajax({  
			                type:"POST",  
			                url:"view_publication_details.php",  
			                data:{
			                	'checking_btn_view' : true,
			                	'publication_id':publication_id,
			                },  
			                success:function(response){  
			                	//console.log(response);
			                     $('#activity_details').html(response);  
			                     $('#exampleModal').modal({ show: false})
			                     $('#exampleModal').modal("show"); 
			                }  
			           });  
			      });  
			 });  
		 </script>
	</body>
</html>