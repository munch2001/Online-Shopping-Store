<?php

include 'config.php'

if(isset($_GET['deleteid'])){
	$id=$_GET['deleteid'];
	
	$sql="delete from item
	WHERE Item_id='$id'";
	$result=mysqli_query($conn,$sql);
	if($result){
		// echo "Deleted successfully";
		
		header("location:Manage items.php");
	}
	else{
		die(mysqli_error($conn));
	}
}

?>