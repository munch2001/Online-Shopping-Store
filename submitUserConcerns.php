<?php
	// Linking the configuration file
	include_once 'config.php';
	
	// sending data
	$Name = $_POST["name"];
	$Email = $_POST["email"];
	$Subject = $_POST["subject"];
	$Message = $_POST["message"];
	$submitted_date = date('Y-m-d H:i:s');
	
	$sql= "INSERT INTO userconcern(ID,user_name,user_email,subject,message,submitted_date)
		  VALUES('','$Name','$Email','$Subject','$Message','$submitted_date')";
	
	// check inserted data
	if($conn->query($sql)){
		// echo "<script> alert ('Inserted successfully')</script>";
		header ('location:userConcernsForm.php');
	}
	else{
		echo "<script> alert ('Error')</script>";
	}
	
	// close the connection
	$conn->close() ;
?>
