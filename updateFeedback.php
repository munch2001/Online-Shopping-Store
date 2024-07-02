<?php
	
	// Linking the configuration file
	include_once 'config.php';
	
	//get the feedback id from databse which need to be updated
	$feedback_id=$_GET['updateid'];
	
	//calling the data from the database
	$sql = "SELECT * 
			FROM feedback 
			WHERE feedback_id = $feedback_id";
	
	//assigning data from the database to variables
	$row = mysqli_fetch_assoc($conn->query($sql));
		$user_name = $row['user_name'];
		$user_email = $row['user_email'];
		$comment = $row['comment'];
		
	if (isset($_POST['submit']))
	{
		// sending data through the update form
		$user_name = $_POST["user_name"];
		$user_email = $_POST["user_email"];
		$comment = $_POST["comment"];		
		$submitted_date = date('Y-m-d H:i:s');
		
		//updating database		
		$sql = "UPDATE feedback 
				SET user_name='$user_name', user_email='$user_email', comment='$comment', submitted_date='$submitted_date' 
				WHERE feedback_id=$feedback_id";
		
		// check updated data
		if($conn->query($sql))
		{
			//redirect to viweFeedback page
			header ("Location: viewFeedback.php");
		}
		else
		{
			echo "<script> alert ('Error'); </script>";
		}
	}	
		
	// close the connection
	$conn->close() ;
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
	<title>Edit my feedback</title>
	<link rel="stylesheet" href="styles/stylesNew.css"></link>
	<link rel = "stylesheet" href = "styles/Buddhini.css"> </link>
	<link rel = "stylesheet" href = "styles/contactUsStyles.css"> </link>
	
</head>

	<!-- header -->
	<?php
		include_once 'header.php';
	?>
		
	<!--update feedback form-->	
	<div id = "form"  >
		<form method = "POST">
			<h1 align = "center">Update your Feedback</h1>
			
				<input type = "hidden"
					   name = "feedback_id"
					   value = "<?php echo $feedback_id ; ?>" >
			
				<label> Name </label> <br>
				<input type="text" 
					   name = "user_name"
					   class = "text"
					   value = "<?php echo $user_name ; ?>">
				<br><br>
				
				<label> Email Address </label> <br>
				<input type="text" 
					   name = "user_email"
					   class = "text"
					   value = "<?php echo $user_email ; ?>">
				<br><br>
				
				<label> Enter your opinion </label> <br>
				<textarea cols="30" 
						  rows="10"
						  name = "comment"
						  id = "comment">
				</textarea>
				<script> document.getElementById("comment").value = "<?php echo $comment ; ?>" </script>
				<br><br>
								
				<center>
				<button id = "submit" type = "submit" name = "submit"> Update </button>
				<a href = "viewFeedback.html"> <button id = "submit" type = "submit" name = "submit"> Cancel </button>  </a>
				
				</center>
		</form>
	</div>
		
	<!--footer-->
	<?php
		include_once 'footer.php';
		
		// close the connection
		$conn->close() ;
	?>