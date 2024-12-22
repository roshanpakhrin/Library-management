<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
</head>

<body>
    <h3>Student List</h3>
    <a href="add_student.php">ADD Student</a>
    <br>
    <br>
    <?php
require 'db_connect.php';

$students_result = $conn->query("SELECT * FROM student");

if ($students_result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Photo</th><th>Name</th><th>Address</th><th>Email</th><th>Phone</th><th>Actions</th></tr>";
    while ($row = $students_result->fetch_assoc()) {
        $id = $row["id"];
        $img = $row["image_path"];
        echo "<tr><td><img height='50'  src='$img'></td><td>" . $row["name"] . "</td><td>" . $row["address"] . "</td><td>" . $row["email"] . "</td><td>" . $row["phone"] . "</td><td>" . "<a href='add_student.php?id=$id'>Edit</a>  <a href='delete_student.php?id=$id'>Delete</a> <a href='student_details.php?id=$id'>Visit</a>" . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

?>

    <h3>Book List</h3>
    <a href="add_book.php">ADD Book</a>
    <br>
    <br>
    <?php
require 'db_connect.php';

$books_result = $conn->query("SELECT * FROM book");

if ($books_result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Name</th><th>SBN</th><th>Price</th><th>Quantity</th><th>Author</th><th>Publication</th><th>Date</th><th>Actions</th></tr>";
    while ($row = $books_result->fetch_assoc()) {
        $id = $row["id"];
        echo "<tr><td>" . $row["name"] . "</td><td>" . $row["sbn"] . "</td><td>" . $row["price"] . "</td><td>" . $row["quantity"] . "</td><td>" . $row["author"] . "</td><td>" . $row["publication"] . "</td><td>" . $row["date"] . "</td><td>" . "<a href='add_book.php?id=$id'>Edit</a>  <a href='delete_book.php?id=$id'>Delete</a>" . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

?>

    <h3>Book Issue List</h3>
    <a href="book_issue.php">Issue Book</a>
    <br>
    <br>
    <?php
require 'db_connect.php';

$books_result = $conn->query("SELECT * FROM book_issue");

if ($books_result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Student</th><th>Book</th><th>Issued At</th><th>Actions</th></tr>";
    while ($row = $books_result->fetch_assoc()) {
        $id = $row["id"];
        echo "<tr><td>" . $row["studentId"] . "</td><td>" . $row["bookId"] . "</td><td>" . $row["issuedAt"] . "</td><td>" . "<a href='book_issue.php?id=$id'>Edit</a>  <a href='delete_book_issue.php?id=$id'>Delete</a>" . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

?>
</body>

</html>