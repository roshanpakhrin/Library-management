<?php
function upload($file, $target_dir = "uploads/")
{
    if (!is_dir($target_dir)) {
        mkdir($target_dir);
    }

    $target_file = $target_dir . basename($file["name"]);
    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        return htmlspecialchars($target_dir . "/" . basename($file["name"]));
    } else {
        return null;
    }

}

function delete($file)
{
    unlink($file);
}
