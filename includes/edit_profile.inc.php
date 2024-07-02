<?php
session_start();

if (isset($_SESSION["userId"]) && isset($_SESSION["username"])) {
    require_once 'config.php';

    if (isset($_POST["update_submit"])) {
        // Get updated profile details from the form
        $userId = $_SESSION["userId"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $dob = $_POST["dob"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $uname = $_POST["uname"];
        $add_no = $_POST["add_no"];
        $add_street = $_POST["add_street"];
        $city = $_POST["city"];
        $district = $_POST["district"];
        $pcode = $_POST["pcode"];
        $country = $_POST["country"];

        // File upload handling
    if (isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['profile_photo']['tmp_name'];
        $fileName = $_FILES['profile_photo']['name'];
        $fileSize = $_FILES['profile_photo']['size'];
        $fileType = $_FILES['profile_photo']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        

        // Define the directory where the uploaded file will be stored
        $uploadDir = "../uploads/";

        // Check if the upload directory exists, if not, create it
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Create the file path
        $destFilePath = $uploadDir . $fileName;

        // Move the uploaded file to the destination path
        if (move_uploaded_file($fileTmpPath, $destFilePath)) {
            // Update the profile photo in the database
            $sql = "UPDATE user SET image = ? WHERE userId = ?;";
            $stmt = mysqli_stmt_init($conn);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "ss", $fileName, $userId);
                mysqli_stmt_execute($stmt);
                // Success message
                echo "Profile photo uploaded successfully!";
            } else {
                // Error message
                echo "Database error: " . mysqli_error($conn);
            }
        } else {
            // Error message
            echo "Failed to move the uploaded file.";
        }
    }
    

        $sql = "UPDATE user SET firstName=?, lastName=?, dob=?, email=?, phoneNo=?, userName=?, addressNo=?, street=?, city=?, district=?, postalCode=?, country=? WHERE userId=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: edit_profile.inc.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "sssssssssssss", $fname, $lname, $dob, $email, $phone, $uname, $add_no, $add_street, $city, $district, $pcode, $country, $userId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        // Redirect to the profile page after updating
        header("Location: ../profile.php?message=profileupdated");
        exit();
    }
}
else {
    header("Location: ../login.php");
    exit();
}
?>

