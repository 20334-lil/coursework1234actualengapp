<?php
if(isset($_POST["subject"]) && isset($_POST["comment"])) {
include("db_connect.php");

$subject = mysqli_real_escape_string($conn, $_POST["subject"]);
$comment = mysqli_real_escape_string($conn, $_POST["comment"]);
$comment_status = 0; // Default status as integer

$query = "INSERT INTO comments(comment_subject, comment_text, comment_status) VALUES ('$subject', '$comment', '$comment_status')";

if (mysqli_query($conn, $query)) {
echo "New comment added successfully.";
} else {
echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
}
?>
