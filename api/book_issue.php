<?php
include "db_connect.php";

$tudentId = $bookId = $issuedAt = "";
$bookId = $studentId = null;

$buttonText = "ISSUE";

$students_result = mysqli_query($conn, "SELECT * FROM student");
$books_result = mysqli_query($conn, "SELECT * FROM book");

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Fetch the data for the given id
    $sql = "SELECT * FROM book_issue WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $studentId = $row["studentId"];
        $bookId = $row["bookId"];
        $issuedAt = date('Y-m-d', strtotime($row["issuedAt"]));
        $buttonText = "UPDATE";
    } else {
        die("Record not found.");
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $studentId = $_POST["studentId"];
    $bookId = $_POST["bookId"];
    $issuedAt = $_POST["issuedAt"];

    $sql = "INSERT INTO book_issue (id, studentId, bookId, issuedAt)
VALUES ('$id', '$studentId', '$bookId', '$issuedAt')
ON DUPLICATE KEY UPDATE
studentId = '$studentId',
bookId = '$bookId',
issuedAt = '$issuedAt'";

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
    <title>Book Issue</title>
</head>

<body>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">

        <label for="studentId">Student</label><br>
        <select name="studentId">
            <?php while ($student = $students_result->fetch_assoc()): ?>
            <option value="<?php echo $student["id"]; ?>"
                <?php echo ($studentId == $student["id"]) ? 'selected' : ''; ?>>
                <?php echo $student["name"]; ?>
            </option>
            <?php endwhile;?>
        </select>
        <br>

        <label for="bookId">Book</label><br>
        <select name="bookId">
            <?php while ($book = $books_result->fetch_assoc()): ?>
            <option value="<?php echo $book["id"]; ?>" <?php echo ($bookId == $book["id"]) ? 'selected' : ''; ?>>
                <?php echo $book["name"]; ?>
            </option>
            <?php endwhile;?>
        </select>


        <br>

        <label for="issuedAt">Issued At</label><br>

        <input type="date" name="issuedAt" id="issuedAt" value="<?php echo $issuedAt; ?>">
        <br>
        <br>

        <input type="submit" value="<?php echo $buttonText; ?>">
    </form>
</body>

</html>