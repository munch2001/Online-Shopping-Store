<?php
	// Linking the configuration file
	include_once 'config.php';

	$feedback_id = $_GET['deleteid'];

	$sql = "DELETE FROM feedback
			WHERE feedback_id = $feedback_id";

	// check inserted data
	if($conn->query($sql)){
		echo "<script> alert ('Deleted successfully')</script>";
		header ('location:viewFeedback.php');
	}
	else{
		echo "<script> alert ('Error')</script>";
	}
	
	// close the connection
	$conn->close();
?>

