<?php	
	// Linking the configuration file
	include_once 'config.php';
?>

<!DOCTYPE html>
<html>

<head>
	<title>My feedback</title>
	<link rel = "stylesheet" href = "styles/Buddhini.css"> </link>
</head>

	<!-- header -->
	<?php
		include_once 'header.php';
	?>
	
	<!--creating the table-->
	<table class = "viewTable">
			<tr>
				<th> Submitted Date </th>
				<th> Comment </th>
				<th> </th>
				<th> </th>
			</tr>
		
		<?php
			//calling the data from the database
			$sql = "select * from feedback";
			$result = $conn->query($sql);

			if($result->num_rows > 0)
			{
				//read data
				while($row = $result->fetch_assoc())
				{
					$feedback_id = $row["feedback_id"];
					$user_name = $row["user_name"];
					$user_email = $row["user_email"];
					$comment = $row["comment"];
					$submitted_date = $row["submitted_date"];
					
					//display the data
					echo "<tr>
							<td>" . $submitted_date . "</td>
							<td>" . $comment . "</td>
							<td align = 'center'> <a href = \"updateFeedback.php?updateid=$feedback_id\"> 
								<button class = 'view'> Edit </button> </a> 
							</td> 
							<td align = 'center'> <a href=\"deleteFeedback.php?deleteid=$feedback_id\">
								<button class='view' onclick=\"return confirm('Are you sure you want to delete this feedback?')\">Delete</button> </a> 
							</td>";
				}
				
				echo "</table>";
			}
			else 
			{
				echo "<script> alert ('No data found'); </script>";
			}
			echo "</table>" ;	
		?>
		
		<a href = "feedback.php"><button id = "submit"> Back </button> </a>
	
	<!--footer-->
	<?php
		include_once 'footer.php';
		
	// close the connection
	$conn->close();
	?>