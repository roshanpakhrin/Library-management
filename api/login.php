<?php
include "db_connect.php";

$email = $_POST["email"];
$pwd =$_POST["password"];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
if(password_verify($pwd, $user["password_hash"])){
    // TODO set session/cookie to handle logged in user
    header("location: /");
}else{
    echo "Wrong Password";
}

exit();