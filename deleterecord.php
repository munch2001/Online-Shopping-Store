<?php
include 'config.php';

if (isset($_GET['deleteid'])) {
    $itemID = $_GET['deleteid'];

    // Perform the deletion query
    $deleteQuery = "DELETE FROM item_discount WHERE itemID = '$itemID'";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        // Deletion successful
        echo "Item deleted successfully.";
        // Redirect to the admintable.php page
        header("Location: admintable.php");
        exit;
    } else {
        // Deletion failed
        echo "Error deleting item: " . mysqli_error($conn);
    }
}
?>
