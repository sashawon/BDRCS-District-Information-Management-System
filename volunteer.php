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
		<!--datatables CSS-->
		<link rel="stylesheet" type="text/css" href="assets/datatables/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="assets/datatables/css/dataTables.bootstrap5.min.css">
	</head>
	<body>
		<!-- ======= Header Start ======= -->
		<?php  include("header.php"); ?>
		<!-- End Header -->
		<!-- ======= carousal Start ======= -->
		<section class="main-heading bg-light pb-3">
			<div class="text-center pt-5">
				<h1 class="display-4">Volunteer List</h1>
				<hr class="w-25 mx-auto">
			</div>
			<?php
				include('database.php');

				$status=1;
				// Ek page a koyta dekhabo SET kori. 
				$results_per_page = 100;
				$sql="SELECT * FROM volunteer WHERE status=:status";
				$stmt=$con->prepare($sql);
				$stmt->execute(['status'=>$status]);
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

				
				$sql="SELECT * FROM volunteer WHERE status=:status ORDER BY id ASC LIMIT ".$this_page_first_result . "," .  $results_per_page;

				$stmt=$con->prepare($sql);
				$stmt->execute(['status'=>$status]);
				$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
			?>
			<div class="container-fluid">
				<!--
				<div class="row justify-content-end align-items-center my-3">
					<div class="col-3">
						<div class="input-group input-group-sm">
							<form class="d-flex align-items-center" action="" method="POST">
							    <input class="form-control" type="text" name="search_text" id="search_text" placeholder="Search" aria-label="Search" value="<?php echo $searchKey ?>">
							    <button class="btn btn-outline-primary" type="submit">Search</button>
						    </form>
						</div>
				    </div>
				</div>
				-->
				<div class="row">
					<div class="col-md-12 pt-3">
						<table class="table table-bordered border-primary table-striped table-hover py-3">
							<thead>
								<tr>
									<th>#</th>
									<th>Photo</th>
									<th>Name</th>
									<th>Registration No.(at unit)</th>
									<th>ID Card No.</th>
									<th>Contact</th>
									<th>Email</th>
									<th>Details</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if ($number_of_results>0) {
								
								$i=1;
								$j=$i+(($page-1)*$results_per_page);
								// output data of each row
								foreach ($result as $row) {
								?>
								<tr>
									<td class="id_no">
										<?php //echo $row["id"];
										echo $j++;
										?>
										<input type="hidden" value="<?php echo $row['id']; ?>">
									</td>
									<td class="m-0 p-0" style="width: 80px; height:100px">
										<img class="img-fluid" src="<?php echo 'images/volunteer/'.$row["image"]; ?>" alt="Photo">
									</td>
									<td><?php echo $row["name"]; ?></td>
									<td><?php echo $row["reg_no"]; ?></td>
									<td><?php echo $row["id_card_no"]; ?></td>
									<td><?php echo $row["mobile"]; ?></td>
									<td><?php echo $row["email"]; ?></td>
									<td>
										<a class="btn btn-success m-1 view_data" id="<?php echo $row["id"]; ?>" data-toggle="modal" data-target="#exampleModal">Details</a>
									</td>
								</tr>
								<?php
								
								}
								} else {
								echo "0 results";
								}
								?>
							</tbody>
						</table>
					</div>
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
				      <a class="page-link text-dark" href="volunteer.php?id=<?= urlencode($row['id']) ?>&&page=<?= $page?>"><?php echo $page?></a>
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
		<!-- ======= Model Start ======= -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Details</h5>
						<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body" id="volunteer_detail">
						
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
		<script src="assets/js/jquery-3.5.1.min.js"></script>
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		<script src="assets/datatables/js/jquery.dataTables.min.js"></script>
		<script src="assets/datatables/js/dataTables.bootstrap5.min.js"></script>
		<script type="text/javascript">
			$(document).ready( function () {
			$('table').DataTable({
				searching: true,
				ordering: true,
				paging: false
			});
			} );
		</script>
		<script>
			$(document).ready(function(){
				$('.view_data').click(function(){
				//alert('hello');
				//var volunteer_id = $(this).closest('tr').find('.id_no').text();
				var volunteer_id = $(this).attr("id");
				//console.log(volunteer_id);
				$.ajax({
					type:"POST",
					url:"view_volunteer_details.php",
					data:{
					'checking_btn_view' : true,
					'volunteer_id':volunteer_id,
					},
					success:function(response){
					//console.log(response);
					$('#volunteer_detail').html(response);
					$('#exampleModal').modal({ show: false})
					$('#exampleModal').modal("show");
					}
					});
				});
			});
		</script>
	</body>
</html>