<?php
require_once '../../config.php';

ob_start();
session_start();
$user_id = $_SESSION["email"];
$data = $_SESSION["data"];

// Check if the POST data is set
if (isset($_POST["text"], $_POST["sender"], $_POST["group_name"])) {
    // Assign POST data to variables
    $txt = $_POST["text"];
    $sender = $_POST["sender"];
    $group_name = $_POST["group_name"];

    $gid=$data["$group_name"];

    // Generate unique txt_id
    $txt_id = rand(1, 999) . "txt_id" . rand(1, 9999);

    // Prepare and execute SQL query
    $query_insert = "INSERT INTO `text` (`txt_id`, `text`, `email`, `receiver`,`group_id`, `time`) VALUES ('$txt_id', '$txt', '$sender', '$group_name', '$gid', current_timestamp())";
    $query_run = mysqli_query($Connector, $query_insert);
} else {
    // Send error response if POST data is not set
    echo "Error: POST data not set";
}
