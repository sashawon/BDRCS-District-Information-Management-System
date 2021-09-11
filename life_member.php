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
		<section class="main-heading pb-3">
			<div class="text-center pt-5">
				<h1 class="display-4">Life Member List</h1>
				<hr class="w-25 mx-auto">
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 pt-3">
						<table class="table table-bordered border-primary table-striped table-hover py-3" id="example">
							<thead>
								<tr>
									<th>ক্রঃ নং</th>
									<th>আজীবন সদস্য নং</th>
									<th>নাম</th>
									<th>পিতার নাম</th>
									<th>মাতার নাম</th>
									<th>ঠিকানা</th>
									<th>জাতীয় পরিচয় পত্র নং</th>
									<th>মোবাইল নং</th>
									<th>অন্তর্ভুক্তির তারিখ</th>
									<th>শেয়ারমানি প্রদত্ত</th>
									<th>মন্তব্য</th>
								</tr>
							</thead>
							<tbody>
								<?php
								include('database.php');
																
								$sql="SELECT * FROM life_member ORDER BY id ASC";
								$stmt=$con->prepare($sql);
								$stmt->execute();
								$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
								$number_of_results=$stmt->rowCount();

								if ($number_of_results>0) {
								$i=1;
								// output data of each row
				
								foreach ($result as $row) {
								?>
								<tr>
									<td class="id_no">
										<?php //echo $row["id"];
										echo $i++;
										?>
										<input type="hidden" value="<?php echo $row['id']; ?>">
									</td>
									<td><?php echo $row["l_id"]; ?></td>
									<td><?php echo $row["name"]; ?></td>
									<td><?php echo $row["fname"]; ?></td>
									<td><?php echo $row["mname"]; ?></td>
									<td><?php echo $row["address"]; ?></td>
									<td><?php echo $row["nid"]; ?></td>
									<td><?php echo $row["mobile"]; ?></td>
									<td><?php echo $row["join_date"]; ?></td>
									<td><?php echo $row["s_money"]; ?></td>
									<td><?php echo $row["comment"]; ?></td>
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
		</section>
		<!-- End carousal -->
		<!-- ======= footer Start ======= -->
		<?php  include("footer.php"); ?>
		<!-- End footer -->
		
		<!--javascript-->
		<script src="assets/js/jquery-3.5.1.min.js"></script>
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		<script src="assets/datatables/js/jquery.dataTables.min.js"></script>
		<script src="assets/datatables/js/dataTables.bootstrap5.min.js"></script>


		<script type="text/javascript">
			$(document).ready(function() {
			    $('#example').DataTable();
			} );
			/*$(document).ready( function () {
			$('#example').DataTable({
				searching: true,
				ordering: true,
				paging: true
			});
			} );*/
		</script>
	</body>
</html>