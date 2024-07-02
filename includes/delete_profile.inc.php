<?php
session_start();

if (isset($_SESSION["userId"]) && isset($_SESSION["username"])) {
    require_once 'config.php';

    $userId = $_SESSION["userId"];
    $sql = "DELETE FROM user WHERE userId = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../profile.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $userId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // Destroy the session and redirect to the login page
    session_unset();
    session_destroy();
    header("Location: ../home.php?message=accountdeleted");
    exit();
} else {
    header("Location: ../profile.php");
    exit();
}
?>
