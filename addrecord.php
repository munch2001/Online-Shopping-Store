<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $itemID = $_POST['itemID'];
    $name = $_POST['name'];
    $OldPrice = $_POST['OldPrice'];
    $NewPrice = $_POST['NewPrice'];
    //image upload
	if($_FILES["image"]["error"] === 4)
	{
		echo "<script>alert('Image does not exist');</script>";
	}
	else
	{
		$fileName = $_FILES["image"]["name"];
		$fileSize = $_FILES["image"]["size"];
		$tmpName = $_FILES["image"]["tmp_name"];
		
		$validImageExtension = ['jpg', 'jpeg', 'png'];
		$imageExtension = explode('.', $fileName);
		$imageExtension = strtolower(end($imageExtension));
		
		if(!in_array($imageExtension, $validImageExtension))
		{
			echo "<script>alert('Invalid Image Extension');</script>";
		}
		else if($fileSize > 1000000)
		{
			echo "<script>alert('Image size is too large');</script>";
		}
		else
		{
			$newImageName = uniqid();
			$newImageName .= '.' . $imageExtension;
			
			move_uploaded_file($tmpName, 'uploadimage/' . $newImageName);
			$sql = "INSERT INTO item_discount (itemID, name, OldPrice, NewPrice, image)
			VALUES ('$itemID', '$name', '$OldPrice', '$NewPrice', '$newImageName')";
			mysqli_query($conn, $sql);
			
			echo "<script>alert('Item has been added');
				  window.location.href = 'admintable.php';
				  </script>";
			
		}
		
	}

}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles/stylessales.css">
    <title>Add items</title>
</head>
<body>
    <h1 align="center">Sales Items</h1>
    <div class="container_sales">
        <form method="post" enctype="multipart/form-data" action="">
            <div class="form-group">
                <label>Item ID</label>
                <input type="text" class="form-control" placeholder="Enter the item ID" name="itemID" autocomplete="on">
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter the item name" name="name" autocomplete="on">
            </div>
            <div class="form-group">
                <label>Old price</label>
                <input type="number" class="form-control" placeholder="Enter the old price" name="OldPrice" autocomplete="off">
            </div>
            <div class="form-group">
                <label>New Price</label>
                <input type="number" class="form-control" placeholder="Enter the new price" name="NewPrice" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="image">Item image</label><br>
                <input type="file" class="form-control" id="image" name="image" accept=".jpg, .jpeg, .png"><br><br>
            </div>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
    <br>
    <div class="container">
        <?php
        // Display uploaded image if available
        if (isset($_FILES['image']['name'])) {
            $targetDirectory = "uploadimage/";
            $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);

            echo '<img src="' . $targetFile . '" alt="Uploaded Image">';
        }
        ?>
    </div>
</body>
</html>
