		<!-- ======= Header Start ======= -->
		<?php  include("header.php"); ?>
		<!-- End Header -->

		<!-- ======= Notice Start ======= -->
		<section class="activities bg-light pt-5"  id="activities">
			<div class="text-center">
				<h1 class="display-4">All Notice Board</h1>
				<hr class="w-25 mx-auto">
			</div>
			<div class="container">
				<div class="row pb-5">
					<div class="col-lg-12 col-md-12 col-12 col-xxl-12 align-items-start flex-column">
						<div class="row">
							<?php
							include('database.php');
							$sql="SELECT * FROM notice ORDER BY id DESC";
							$stmt=$con->prepare($sql);
							$stmt->execute();
							$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
							$total=$stmt->rowCount();

							if ($total>0) {

							$i=1;
							// output data of each row
							
							foreach ($result as $row) {
							
							?>
							<div class="col-lg-12 col-md-12 col-12 col-xxl-12">
								<a class="nav-link text-dark p-0 m-0" href='notice.php?id=<?=$row["id"]?>'>
									<h6 class="pt-3">
										<?php echo $row["title"]; ?>
									</h6>
									<small class="pb-5"><i class="far fa-calendar-alt mr-1"></i><?php echo $row["date"]; ?></small>
								</a>
								<hr class="m-0 p-0">
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
		</section>
		<!-- End Notice -->

		<!-- ======= footer Start ======= -->
		<?php  include("footer.php"); ?>
		<!-- End footer -->
	</body>
</html>