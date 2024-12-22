<?php
include "db_connect.php";
include "file_utils.php";

$name = $address = $email = $phone = "";
$buttonText = "ADD";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Fetch the data for the given id
    $sql = "SELECT * FROM student WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row["name"];
        $address = $row["address"];
        $email = $row["email"];
        $phone = $row["phone"];
        $buttonText = "UPDATE";
    } else {
        die("Record not found.");
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $uploaded_image_path = upload($_FILES["file"]);

    $sql = "INSERT INTO student (id, name, address, email, phone, image_path)
VALUES ('$id', '$name', '$address', '$email', '$phone','$uploaded_image_path')
ON DUPLICATE KEY UPDATE
name = '$name',
address = '$address',
email = '$email',
phone = '$phone'";

    if (!mysqli_query($conn, $sql)) {
        die("Insert error: " . mysqli_error($conn));
    }
    header("location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $buttonText; ?> Student</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">
        <label for="name">Name</label><br>
        <input type="text" name="name" id="name" value="<?php echo $name; ?>">
        <br>
        <label for="address">Address</label><br>
        <input type="text" name="address" id="address" value="<?php echo $address; ?>">
        <br>
        <label for="email">Email</label><br>
        <input type="text" name="email" id="email" value="<?php echo $email; ?>">
        <br>
        <label for="phone">Phone</label><br>
        <input type="text" name="phone" id="phone" value="<?php echo $phone; ?>">
        <br>
        <br>
        Select file to upload:
        <input type="file" name="file" id="file">
        <br>
        <br>

        <input type="submit" value="<?php echo $buttonText; ?>">
    </form>
</body>

</html>