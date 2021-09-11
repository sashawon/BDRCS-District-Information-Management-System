<?php

if (isset($_POST['submit_email'])) {

	$name=$_POST['name'];
	$email=$_POST['email'];
	$subject=$_POST['subject'];
	$massage=$_POST['massage'];

	if (empty($name)||empty($email)||empty($subject)||empty($massage)) {
		header('location:index.php?error');
	} else {
		$to='chuadanga@bdrcs.org';

		if (mail($to, $subject, $massage, $email)) {
			header('location:index.php?success');
		}
	}
} else {
	header('location:index.php');
}

?>