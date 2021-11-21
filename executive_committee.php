		<!-- ======= Header Start ======= -->
		<?php  include("header.php"); ?>
		<!-- End Header -->
		<!-- ======= carousal Start ======= -->
		<section class="main-heading bg-light pb-3">
			<div class="text-center pt-5">
				<h1 class="display-4">Executive Committee List</h1>
				<hr class="w-25 mx-auto">
			</div>
			<div class="container">
				<div class="row py-3">
					<?php
					include('database.php');

					// Ek page a koyta dekhabo SET kori. 
					$results_per_page = 100;
					$sql="SELECT * FROM ec_member";
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


					$sql="SELECT * FROM ec_member ORDER BY id ASC LIMIT ".$this_page_first_result . "," .  $results_per_page;
					$stmt=$con->prepare($sql);
					$stmt->execute();
					$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
					$number_of_results=$stmt->rowCount();

					if ($number_of_results>0) {
					$i=1;
					$j=$i+(($page-1)*$results_per_page);
					// output data of each row
	
					foreach ($result as $row) {
						
					?>
					<div class="col-md-4 mt-5 text-center">
						<img style="width: 100px; height:120px; border-radius: 20%;" class="img-fluid" src="<?php echo 'images/ec_committee/'.$row["photo"]; ?>" alt="Photo">
						<p class="mt-3 mb-0 p-0"><b> <?php echo $row["name"]; ?></b></p>
						<p class="mb-0 p-0"> <?php echo $row["designation"]; ?></p>
						<p class="mb-0 p-0"> <?php echo $row["mobile"]; ?></p>
						<p class="mb-0 p-0"> <?php echo $row["email"]; ?></p>
						<p class="mb-0 p-0"> <?php echo $row["duration"]; ?></p>
					</div>
					<?php
								
					}
					} else {
					echo "0 results";
					}
					?>
				</div>
			</div>
			<!-- PAGINATION -->
			<div class="py-3 m-0">
				<div class="container">
				  <div class="row">
				    <div class="col-md-12 d-flex flex-row-reverse">
				      <ul class="pagination text-center m-0">
				      
				      <?php 
				      // display the links to the pages
				      for ($page=1;$page<=$number_of_pages;$page++) {
				      ?>

				      <li class="page-item">
				      <a class="page-link text-dark" href="officer_employee.php?id=<?= urlencode($row['id']) ?>&&page=<?= $page?>"><?php echo $page?></a>
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
		<!-- End carousal -->

		<!-- ======= footer Start ======= -->
		<?php  include("footer.php"); ?>
		<!-- End footer -->
		
		<!--javascript-->
		<script type="text/javascript">
			$(document).ready( function () {
			$('table').DataTable({
				searching: true,
				ordering: true,
				paging: true
			});
			} );
		</script>
	</body>
</html>