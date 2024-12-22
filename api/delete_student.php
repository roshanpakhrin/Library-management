<?php

include "db_connect.php";
include "file_utils.php";

$id = $_REQUEST["id"];
$sql = "SELECT *  FROM student WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    delete($row["image_path"]);
    $sql = "DELETE FROM student WHERE id = $id";
    if (!mysqli_query($conn, $sql)) {
        die("Delete error" . mysqli_error($conn));
    }
} else {
    die("Record not found.");
}

header("location: home.php");
