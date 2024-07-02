<?php	
	// Linking the configuration file
	include_once 'config.php';
?>

<!DOCTYPE html>
<html>

<head>
	<title>View user concerns</title>
	<link rel = "stylesheet" href = "styles/Buddhini.css"> </link>
</head>

	<!-- header -->
	<?php
		include_once 'header.php';
	?>
	
	<table>
			<tr>
				<th> ID </th>
				<th> User Name </th>
				<th> Email </th>
				<th> Subject </th>
				<th> Messages </th>
				<th> Subbmitted date </th>
			</tr>
		
		<?php
			$sql = "select * from userconcern";
			$result = $conn->query($sql);
					
			if($result->num_rows > 0)
			{
				//read data
				while($row = $result->fetch_assoc())
				{	
					//Read and utilize the row data
						echo "<tr>
								<td>" . $row["ID"] . "</td>
								<td>" . $row["user_name"] . "</td>
								<td>" . $row["user_email"] . "</td>
								<td>" . $row["subject"] . "</td>
								<td>" . $row["message"] . "</td>
								<td>" . $row["submitted_date"]. "</td>
							</tr>";	
				}
				echo "</table>";
			}
			else 
			{
				echo "No data found.";
			}
			echo "</table>" ;	
		?>
		
	<!--footer-->
	<?php
		include_once 'footer.php';	
		// close the connection
		$conn->close();
	?>