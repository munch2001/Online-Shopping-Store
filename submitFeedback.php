<?php
	// Linking the configuration file
	include_once 'config.php';
		
	// sending data through the form
	$name = $_POST["user_name"];
	$email = $_POST["user_email"];
	$comment = $_POST["comment"];		
	$submitted_date = date('Y-m-d H:i:s');

	//inserting values
	$sql= "INSERT INTO feedback(feedback_id,user_name,user_email,comment,submitted_date)
		  VALUES('','$name','$email','$comment','$submitted_date')";
	
	// check inserted data
	if($conn->query($sql)){
		// redirect to viewFeedback page
		header ('location:viewFeedback.php');
	}
	else{
		echo "<script> alert ('Error'); </script>";
	}
	
	// close the connection
	$conn->close() ;
?>