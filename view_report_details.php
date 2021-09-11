<?php 
include('database.php');

if(isset($_POST["checking_btn_view"])){
	$r_id = $_POST['report_id'];
	//echo $return = $a_id;


	$sql="SELECT * FROM report WHERE id=:r_id";
	$stmt=$con->prepare($sql);
	$stmt->execute(['r_id'=>$r_id]);
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
	$total=$stmt->rowCount();

	?> 
	<div class="container">
		<div class="row">
			<div class="col-12">
	<?php 

	
	if ($total>0) {
		// output data of each row
		foreach ($result as $row) {
			$image=$row["photo"];
			$image=explode("**", $image);
			$file_type=$row["file_type"];
            $file_type=explode("**", $file_type);

            if ($file_type[0] == 'image') {
            	?>
                  <figure>
                  	<img style="width: 100%; height:200px" class='img-fluid' alt='report images' src="images/report/<?= $image[0] ?> ">
                  </figure>
                <?php
            } elseif ($file_type[0] == 'video') {
            	?>
                  <video width="100%" height="200px" controls>
                  	<source src="images/report/<?= $image[0] ?>" type="video/mp4">
                  </video>
                <?php
            } else {
            	?>
                  <figure>
                  	<img style="width: 100%; height:200px" class='img-fluid' alt='report images' src="images/report/file-format-not-supported.png">
                  </figure>
                <?php
            } 
			?>
			</div>
			<div class="col-12">
				<h4><?= $row["title"]?></h4>
				<h6><?= $row["date"]?></h6>
				<hr>
				<p><?= $row["des"]?></p>
			</div>
			<?php 
		}
	?>
		</div>
	</div>
	<?php
	} else {
		echo $return = "0 results";
	}

}

?> 