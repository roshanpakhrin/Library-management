<?php
include "db_connect.php";

$name = $sbn = $price = $quantity = $author = $publication = $date = "";
$buttonText = "ADD";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Fetch the data for the given id
    $sql = "SELECT * FROM book WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row["name"];
        $sbn = $row["sbn"];
        $price = $row["price"];
        $quantity = $row["quantity"];
        $author = $row["author"];
        $publication = $row["publication"];
        $date = date('Y-m-d', strtotime($row["date"]));

        $buttonText = "UPDATE";
    } else {
        die("Record not found.");
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $sbn = $_POST["sbn"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    $author = $_POST["author"];
    $publication = $_POST["publication"];
    $date = $_POST["date"];

    $sql = "INSERT INTO book (id, name, sbn, price, quantity,author,publication,date)
VALUES ('$id', '$name', '$sbn', '$price', '$quantity','$author','$publication','$date')
ON DUPLICATE KEY UPDATE
name = '$name',
sbn = '$sbn',
price = '$price',
quantity = '$quantity',
author = '$author',
publication = '$publication',
date = '$date'";

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
    <title><?php echo $buttonText; ?> Book</title>
</head>

<body>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">
        <label for="name">Name</label><br>
        <input type="text" name="name" id="name" value="<?php echo $name; ?>">
        <br>
        <label for="sbn">SBN</label><br>
        <input type="text" name="sbn" id="sbn" value="<?php echo $sbn; ?>">
        <br>
        <label for="price">Price</label><br>
        <input type="number" name="price" id="price" value="<?php echo $price; ?>">
        <br>
        <label for="quantity">Quantity</label><br>
        <input type="number" name="quantity" id="quantity" value="<?php echo $quantity; ?>">
        <br>
        <label for="author">Author</label><br>
        <input type="text" name="author" id="author" value="<?php echo $author; ?>">
        <br>
        <label for="publication">Publication</label><br>
        <input type="text" name="publication" id="publication" value="<?php echo $publication; ?>">
        <br>
        <label for="date">Date</label><br>
        <input type="date" name="date" id="date" value="<?php echo $date; ?>">
        <br>
        <br>

        <input type="submit" value="<?php echo $buttonText; ?>">
    </form>
</body>

</html>