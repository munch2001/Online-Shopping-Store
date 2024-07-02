<?php
include 'config.php'


$id = $_GET['updateid'];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $desc = $_POST['desc'];

    // Check if a new image is uploaded
    if ($_FILES["img"]["error"] === 0) {
        $fileName = $_FILES["img"]["name"];
        $fileSize = $_FILES["img"]["size"];
        $tmpName = $_FILES["img"]["tmp_name"];

        $validImageExtensions = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));

        if (!in_array($imageExtension, $validImageExtensions)) {
            echo "<script> alert ('Invalid Image Extension');</script>";
        } else if ($fileSize > 1000000) {
            echo "<script> alert ('Image size is too large');</script>";
        } else {
            $newImageName = uniqid() . '.' . $imageExtension;
            $targetDirectory = 'upload/';
            $targetFile = $targetDirectory . $newImageName;

            move_uploaded_file($tmpName, $targetFile);

            // Update the item record in the database with the new information
            $sql = "UPDATE item SET Item_name='$name', Category='$category', Price='$price', Quantity='$quantity',
                    Description='$desc', Image='$newImageName' WHERE Item_id ='$id'";
            mysqli_query($conn, $sql);

            echo "<script>alert('Successfully Updated');
                  document.location.href = 'Manage items.php';
                  </script>";
        }
    }
	else {
        // If no new image is uploaded, update the item record without changing the image
        $sql = "UPDATE item SET Item_name='$name', Category='$category', Price='$price', Quantity='$quantity',
                Description='$desc' WHERE Item_id ='$id'";
        mysqli_query($conn, $sql);

        echo "<script>alert('Successfully Updated');
              document.location.href = 'Manage items.php';
              </script>";
    }
}

// Retrieve the item details for pre-filling the form
$result = mysqli_query($conn, "SELECT * FROM item WHERE Item_id = '$id'");
$item = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles/add.css">
    <title>Update Item</title>
</head>
<body>
    <div class="container">
        <form method="post" enctype="multipart/form-data" action="update1.php?updateid=<?php echo $id; ?>">
            
            <div class="form">
                <label for="name">Item name</label><br>
                <input type="text" class="form-cntrl" id="name" placeholder="Enter Item name" name="name" value="<?php echo $item['Item_name']; ?>" required>
            </div>
            <div class="form">
                <label for="category">Item category</label><br>
                <select name="category" id="category">
                    <option value="select" <?php if ($item['Category'] === 'select') echo 'selected'; ?>>Select a category</option>
                    <option value="Women" <?php if ($item['Category'] === 'Women') echo 'selected'; ?>>Women</option>
                    <option value="Men" <?php if ($item['Category'] === 'Men') echo 'selected'; ?>>Men</option>
                    <option value="Unisex" <?php if ($item['Category'] === 'Unisex') echo 'selected'; ?>>Unisex</option>
                    <option value="Kids" <?php if ($item['Category'] === 'Kids') echo 'selected'; ?>>Kids</option>
					 <option value="Accessories" <?php if ($item['Category'] === 'Accessories') echo 'selected'; ?>>Accessories</option>
                </select>
            </div>
            <div class="form">
                <label for="price">Price</label><br>
                <input type="number" class="form" step="0.01" id="price" placeholder="Enter Item price" name="price" min="0" value="<?php echo $item['Price']; ?>" required>
            </div>
            <div class="form">
                <label for="quantity">Quantity</label><br>
                <input type="number" class="form-cntrl" step="1" id="quantity" placeholder="Enter quantity" name="quantity" min="1" value="<?php echo $item['Quantity']; ?>" required>
            </div>
            <div class="form">
                <label for="desc">Item description</label><br>
                <textarea type="text" class="form-cntrl" id="desc" placeholder="Enter Item description" name="desc" required><?php echo $item['Description']; ?></textarea>
            </div>
            <div class="form">
                <label for="img">Item image</label><br>
                <input type="file" id="img" name="img" accept=".jpg, .jpeg, .png"><br><br>
            </div>

            <button type="submit" class="btn" name="submit">Update</button>
        </form>
    </div>

 

</body>
</html>
