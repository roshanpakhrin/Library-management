<?php
include "db_connect.php";

$id = $_REQUEST["id"];
$sql = "SELECT  student.name AS studentName,  book.id AS bookId, book.name AS bookName FROM student
LEFT JOIN book_issue ON student.id = book_issue.studentId
LEFT JOIN book ON book_issue.bookId = book.id
WHERE student.id = '$id'";

$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $first_row = $result->fetch_assoc();
    $studentName = $first_row['studentName'];
    $bookId = $first_row['bookId'];
    $bookName = $first_row['bookName'];

    echo "Student Name: $studentName<br><br>";
    echo "Book ID: $bookId Book Name:$bookName<br>";

    while ($row = $result->fetch_assoc()) {
        $bookId = $row['bookId'];
        $bookName = $row['bookName'];

        echo "Book ID: $bookId Book Name:$bookName<br>";

        echo "<br>";
    }

} else {
    die("Records not found.");
}