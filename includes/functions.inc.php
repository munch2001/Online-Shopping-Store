<?php
function invalidUid($uname) {
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $uname)){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}

function invalidEmail($email) {
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}

function pwdMatch($pwd, $pwdrepeat) {
    $result;
    if($pwd !== $pwdrepeat){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}

function uidExists($conn, $uname, $email) {
    $sql = "SELECT * FROM user WHERE userName = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location:../register.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $uname, $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        return false;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $fname, $lname, $dob, $email, $phone, $uname, $pwd, $add_no, $add_street, $city, $district, $pcode, $country){
    $sql = "INSERT INTO user (firstName, lastName, dob, email, phoneNo, userName, password, addressNo, street, city, district, postalCode, country) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location:../register.php?error=stmtfailed");
        exit();
    }
    $hashPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sssssssssssss", $fname, $lname, $dob, $email, $phone, $uname, $hashPwd, $add_no, $add_street, $city, $district, $pcode, $country);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:../login.php?error=none");
    exit();
}
