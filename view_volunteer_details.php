<?php 
include('database.php');

if(isset($_POST["checking_btn_view"])){
	$v_id = $_POST['volunteer_id'];
	//echo $return = $v_id;


	$sql="SELECT * FROM volunteer WHERE id=:v_id";
	$stmt=$con->prepare($sql);
	$stmt->execute(['v_id'=>$v_id]);
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
	$total=$stmt->rowCount();


	
	if ($total>0) {
		// output data of each row
		foreach ($result as $row) {
			echo $return ='
				<table class="table table-bordered border-primary table-striped">
					<tbody>
						<tr>
							<td>Father Name</td>
							<td>'.$row["father_name"].'</td>
						</tr>
						<tr>
							<td>Mother Name</td>
							<td>'.$row["mother_name"].'</td>
						</tr>
						<tr>
							<td>Gender</td>
							<td>'.$row["gender"].'</td>
						</tr>
						<tr>
							<td>NID No.</td>
							<td>'.$row["nid"].'</td>
						</tr>
						<tr>
							<td>Birth Certificate No.</td>
							<td>'.$row["birth_certi"].'</td>
						</tr>
						<tr>
							<td>Passport No.</td>
							<td>'.$row["passport"].'</td>
						</tr>
						<tr>
							<td>Occupation</td>
							<td>'.$row["occupation"].'</td>
						</tr>
						<tr>
							<td>Education Qualification</td>
							<td>'.$row["education"].'</td>
						</tr>
						<tr>
							<td>Date of Birth</td>
							<td>'.$row["dob"].'</td>
						</tr>
						<tr>
							<td>Blood Group</td>
							<td>'.$row["blood"].'</td>
						</tr>
						<tr>
							<td>Marital Status</td>
							<td>'.$row["marital_status"].'</td>
						</tr>
						<tr>
							<td>Nationality</td>
							<td>'.$row["nationality"].'</td>
						</tr>
						<tr>
							<td>Address</td>
							<td>'.$row["address"].'</td>
						</tr>								
						<tr>
							<td>Social network ID fb</td>
							<td>'.$row["fb_id"].'</td>
						</tr>
						<tr>
							<td>Membership Type</td>
							<td>'.$row["membership_type"].'</td>
						</tr>
						<tr>
							<td>Position in Vol group</td>
							<td>'.$row["position"].'</td>
						</tr>
						<tr>
							<td>Date of joining as Vol</td>
							<td>'.$row["date_of_joining"].'</td>
						</tr>
					</tbody>
				</table>
			';
		}
	} else {
		echo $return = "0 results";
	}

}

?> 