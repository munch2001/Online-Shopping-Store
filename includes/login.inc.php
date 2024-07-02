<?php
session_start();

if (isset($_POST["login_submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    require_once 'config.php';

    $sql = "SELECT * FROM user WHERE (userName = ? OR email = ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../login.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        $pwdCheck = password_verify($password, $row["password"]);
        if ($pwdCheck === false) {
            header("Location: ../login.php?error=wrongpassword");
            echo '<script>alert("Wrong Password!")</script>';
            exit();
        } elseif ($pwdCheck === true) {
            $_SESSION["userId"] = $row["userId"];
            $_SESSION["username"] = $row["userName"];
            header("Location: ../profile.php?message=welcome");

            exit();
        }
    } else {
        header("Location: ../login.php?error=nouser");
        echo '<script>alert("Wrong Username or Email!")</script>';
        exit();
    }
} else {
    header("Location: ../login.php");
    exit();
}
?>
