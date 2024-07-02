<?php
if(isset($_POST["reg_submit"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $uname = $_POST["uname"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];
    $add_no = $_POST["add_no"];
    $add_street = $_POST["add_street"];
    $city = $_POST["city"];
    $district = $_POST["district"];
    $pcode = $_POST["pcode"];
    $country = $_POST["country"];

    require_once 'config.php';
    require_once 'functions.inc.php';

    
    $invalidUid = invalidUid($uname);
    $invalidEmail = invalidEmail($email);
    $pwdMatch = pwdMatch($pwd, $pwdrepeat);
    $uidExists = uidExists($conn, $uname, $email);

    if($invalidUid !== false){
        header("Location:../register.php?error=invalidusername");
        exit();
    }
    if($invalidEmail !== false){
        header("Location:../register.php?error=invalidemail");
        exit();
    }
    if($uidExists !== false){
        header("Location:../register.php?error=usernametaken");
        exit();
    }
    if($pwdMatch !== false){
        header("Location:../register.php?error=passworddontmatch");
        exit();
    }
    

    createUser($conn, $fname, $lname, $dob, $email, $phone, $uname, $pwd, $add_no, $add_street, $city, $district, $pcode, $country);

}
else{
    header('../register.php');
}
