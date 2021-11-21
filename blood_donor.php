		<!-- ======= Header Start ======= -->
		<?php  include("header.php"); ?>
		<!-- End Header -->
		<!-- ======= carousal Start ======= -->
		<section class="main-heading bg-light pb-3">
			<div class="text-center pt-5">
				<h1 class="display-4">Blood Donor List</h1>
				<hr class="w-25 mx-auto">
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12" style="margin-top:20px;">
						<table class="table table-bordered border-primary table-striped table-hover py-3" id="example">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Address</th>
									<th>Occupation</th>
									<th>Blood Group</th>
									<th>Gender</th>
									<th>Date of Birth</th>
									<th>Contact</th>
									<th>Email</th>
								</tr>
							</thead>
							<tbody>
								<?php
								include('database.php');
								$status=1;
								$sql="SELECT * FROM blood_donor WHERE status=:status ORDER BY id ASC";
								$stmt=$con->prepare($sql);
								$stmt->execute(['status'=>$status]);
								$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
								$total=$stmt->rowCount();

								if ($total>0) {
								$i=1;
								// output data of each row
				
								foreach ($result as $row) {
								?>
								<tr>
									<td>
										<?php //echo $row["id"];
										echo $i++;
										?>
										<input type="hidden" value="<?php echo $row['id']; ?>">
									</td>
									<td><?php echo $row["name"]; ?></td>
									<td><?php echo $row["address"]; ?></td>
									<td><?php echo $row["occupation"]; ?></td>
									<td><?php echo $row["blood"]; ?></td>
									<td><?php echo $row["gender"]; ?></td>
									<td><?php echo $row["dob"]; ?></td>
									<td><?php echo $row["mobile"]; ?></td>
									<td><?php echo $row["email"]; ?></td>
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
		<script type="text/javascript">
			$(document).ready(function() {
			    $('#example').DataTable();
			} );
			/*$(document).ready( function () {
			$('table').DataTable({
				searching: true,
				ordering: true,
				paging: true
			});
			} );*/
		</script>
	</body>
</html>