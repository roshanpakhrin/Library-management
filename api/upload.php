<?php
include "file_utils.php";

if (isset($_POST["submit"])) {
    $uploaded_file_path = upload($_FILES["file"]);
    if ($uploaded_file_path) {
        echo "The file " . $uploaded_file_path . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>

<!DOCTYPE html>
<html>

<body>
    <form method="post" enctype="multipart/form-data">
        Select file to upload:
        <input type="file" name="file" id="file">
        <input type="submit" value="Upload" name="submit">
    </form>

</body>

</html>
