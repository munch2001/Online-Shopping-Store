<!DOCTYPE html>
<html lang="en-US">

<head>
	<title>Feedback</title>
	<link rel="stylesheet" href="styles/stylesNew.css"></link>
	<link rel = "stylesheet" href = "styles/Buddhini.css"> </link>
	<link rel = "stylesheet" href = "styles/contactUsStyles.css"> </link>	
</head>

	<!-- header -->
	<?php
		include_once 'header.php';
	?>
		
	<div class = "col" id = "c1">
		<ul class = "feed">
			<li id = "list1"><a href="#">
				<br><img src = "images/feedback.png"> <br> <br>
				Let us know what you think <br>
				We'd love to hear your thoughts <br> <br>
			</a></li>
			<li id = "list1"><a href="userConcernsForm.php">
				<br><img src = "images/concern.png"> <br> <br>
				Share your concerns <br>
				We are always here to help you <br> <br>
			</a></li>
		</ul>
	</div>
	
	<!--view feedback button-->
	<div class = "col" id = "c2">
		
		<!--feedback form-->
		<div id = "form">
			
			<div align = "right">
					<a href = "viewFeedback.php"> 
					<input type = "submit"
							   id = "submit"
							   value = "View my feedbacks">  
					</a>
			</div>
		
			<form method = "POST" action = "submitFeedback.php">
				<h1 align = "center">Give your Feedback</h1>
								
					<label> Name </label> <br>
					<input type="text" 
						   name = "user_name"
						   class = "text"
						   required>
					<br><br>
					
					<label> Email Address </label> <br>
					<input type="text" 
						   name = "user_email"
						   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"
						   class = "text"
						   required>
					<br><br>
					
					<label> Enter your opinion </label> <br>
					<textarea cols="30" 
							  rows="10"
							  name = "comment"
							  required>
					</textarea>
					<br><br>
					
					<center>
					<input type = "submit"
						   id = "submit"
						   value = "Submit">
					</center>
			</form>
		</div>
	</div>
	
	<!--footer-->
	<?php
		include_once 'footer.php';
	?>