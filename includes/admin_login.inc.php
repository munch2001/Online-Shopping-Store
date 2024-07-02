<?php
session_start();

if (isset($_POST["login_submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    require_once 'config.php';

    $sql = "SELECT * FROM administrator WHERE (adminName = ? OR email = ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../admin_login.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        if ($password === $row["password"]) { // Compare passwords without encryption
            $_SESSION["userId"] = $row["adminId"];
            $_SESSION["username"] = $row["adminName"];
            header("Location: ../Admin page.php?message=welcome");
            exit();
        } else {
            header("Location: ../admin_login.php?error=wrongpassword");
            echo '<script>alert("Wrong Password!")</script>';
            exit();
        }
    } else {
        header("Location: ../admin_login.php?error=nouser");
        echo '<script>alert("Wrong Username or Email!")</script>';
        exit();
    }
} else {
    header("Location: ../admin_login.php");
    exit();
}
?>
