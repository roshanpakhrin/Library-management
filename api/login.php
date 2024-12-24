<?php
include "db_connect.php";

$email = $_POST["email"];
$pwd = $_POST["password"];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
if (password_verify($pwd, $user["password_hash"])) {
    session_start();
    $_SESSION["userId"] = $user["id"];
    header("location: /Library Management");
} else {
    echo "Wrong Password";
}


exit();