<?php
    // Linking the configuration file
    include_once 'config.php';

    if(isset($_GET['updateid'])) 
    {
        $itemID = $_GET['updateid'];

        if (isset($_POST['submit']))
        {
            // Sending data
            $name = $_POST['name'];
            $OldPrice = $_POST['OldPrice'];
            $NewPrice = $_POST['NewPrice'];

            // Check if a new image is uploaded
            if ($_FILES["image"]["error"] === 0) {
                $fileName = $_FILES["image"]["name"];
                $fileSize = $_FILES["image"]["size"];
                $tmpName = $_FILES["image"]["tmp_name"];

                $validImageExtensions = ['jpg', 'jpeg', 'png'];
                $imageExtension = explode('.', $fileName);
                $imageExtension = strtolower(end($imageExtension));

                if (!in_array($imageExtension, $validImageExtensions)) {
                    echo "<script> alert ('Invalid Image Extension');</script>";
                } else if ($fileSize > 1000000) {
                    echo "<script> alert ('Image size is too large');</script>";
                } else {
                    $newImageName = uniqid() . '.' . $imageExtension;
                    $targetDirectory = 'uploadimage/';
                    $targetFile = $targetDirectory . $newImageName;

                    move_uploaded_file($tmpName, $targetFile);

                    // Update the item record in the database with the new information
                    $sql = "UPDATE item_discount SET name=?, OldPrice=?, NewPrice=?, image=? WHERE itemID=?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("sssss", $name, $OldPrice, $NewPrice, $newImageName, $itemID);
                    $stmt->execute();

                    if ($stmt->affected_rows > 0) {
                        echo "<script>alert('Successfully Updated');
                              window.location.href = 'admintable.php';
                              </script>";
                    } else {
                        echo "<script>alert('Failed to update');
                              </script>";
                    }

                    $stmt->close();
                }
            } else {
                // If no new image is uploaded, update the item record without changing the image
                $sql = "UPDATE item_discount SET name=?, OldPrice=?, NewPrice=? WHERE itemID=?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssss", $name, $OldPrice, $NewPrice, $itemID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    echo "<script>alert('Successfully Updated');
                          window.location.href = 'admintable.php';
                          </script>";
                } else {
                    echo "<script>alert('Failed to update');
                          </script>";
                }

                $stmt->close();
            }
        }

        // Retrieve the item details for pre-filling the form
        $stmt = $conn->prepare("SELECT * FROM item_discount WHERE itemID = ?");
        $stmt->bind_param("s", $itemID);
        $stmt->execute();
        $result = $stmt->get_result();
        $item = $result->fetch_assoc();
        $stmt->close();
    }
    
    // Close the connection
    $conn->close();
?>

<html>
<head>
    <title>Update items</title>
    <link rel="stylesheet" href="styles/stylessales.css">
</head>
<body>
    <h1 align="center">Update Sales Items</h1>
    <div class="container_sales">
        <form method="post" enctype="multipart/form-data" action="">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter the item name" name="name" value="<?php echo isset($item['name']) ? $item['name'] : ''; ?>">
            </div>
            <div class="form-group">
                <label>Old price</label>
                <input type="number" class="form-control" placeholder="Enter the old price" name="OldPrice" autocomplete="off" value="<?php echo isset($item['OldPrice']) ? $item['OldPrice'] : ''; ?>">
            </div>
            <div class="form-group">
                <label>New Price</label>
                <input type="number" class="form-control" placeholder="Enter the new price" name="NewPrice" autocomplete="off" value="<?php echo isset($item['NewPrice']) ? $item['NewPrice'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="image">Item image</label><br>
                <input type="file" class="form-control" id="image" name="image" accept=".jpg, .jpeg, .png"><br><br><!-- File input field for the item image -->
            </div>
            <button type="submit" name="submit">Update Item</button><!-- Submit button to update the item -->
        </form>
    </div>
</body>
</html>
