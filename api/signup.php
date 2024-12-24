<?php
include "db_connect.php";
include "file_utils.php";

$name = $_POST["name"];
$email = $_POST["email"];
$pwd_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (name, email,password_hash)
VALUES ('$name', '$email','$pwd_hash')";

if (!mysqli_query($conn, $sql)) {
    die("Insert error: " . mysqli_error($conn));
}


header("location: /Library Management");
exit();
