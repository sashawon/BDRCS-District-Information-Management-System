<?php 
include('database.php');
error_reporting (0);

$id='';

if(isset($_GET['id'])){
	$id=$_GET['id'];

	$query = "SELECT * FROM notice WHERE id=:id"; 
	$stmt=$con->prepare($query);
	$stmt->execute(['id'=>$id]);
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>

		<!-- ======= Header Start ======= -->
		<?php  include("header.php"); ?>
		<!-- End Header -->

		<!-- ======= Notice Start ======= -->
		<section class="notice bg-light pt-5"  id="notice">
			<div class="text-center">
				<h1 class="display-4">Notice</h1>
				<hr class="w-25 mx-auto">
			</div>
			<?php 
				foreach ($result as $row) {
			?>
			<div class="container">
				<div class="row pb-5">
					<div class="col-lg-12 col-md-12 col-12 col-xxl-12 align-items-start flex-column">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-12 col-xxl-12 text-center">
								<h3 class="py-2"><?php echo $row['title'] ?></h3>
							</div>
							<div class="col-lg-12 col-md-12 col-12 col-xxl-12 text-center pb-3">
								<h6><i class="far fa-calendar-alt mr-1"></i><?php echo $row['date'] ?></h6>
							</div>
							<div class="col-lg-12 col-md-12 col-12 col-xxl-12 text-center">
								<p><?php echo $row['des'] ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
		</section>
		<!-- End Notice -->
<?php } ?>
		<!-- ======= footer Start ======= -->
		<?php  include("footer.php"); ?>
		<!-- End footer -->
	</body>
</html>