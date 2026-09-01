<?php
include "db_connect.php";
 session_start();
     $email = $_SESSION['email'];
        $access = $_SESSION['access'];

if ($access == 'admin' || $access == 'user') {



// Collect and sanitize form data
$name = mysqli_real_escape_string($conn, $_POST["task-name"]);
$start = mysqli_real_escape_string($conn, $_POST["start-date"]);
$end = mysqli_real_escape_string($conn, $_POST["end-date"]);
$progress = mysqli_real_escape_string($conn, $_POST["progress"]);
$important = mysqli_real_escape_string($conn, $_POST["is-important"]);
$id = mysqli_real_escape_string($conn, $_POST["id-number"]);
     $email = $_SESSION['email'];


    
    
   
    
// Insert data into database
$sql = "INSERT INTO Gantt (start,end,name,id,progress,important,email) 
        VALUES ('$start','$end','$name','$id','$progress','$important','$email')";
if ($conn->query($sql) === TRUE) {

      header("Location: home.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
}
?>

https://www.geeksforgeeks.org/php/how-to-insert-form-data-into-database-using-php/
https://www.geeksforgeeks.org/php/how-to-fetch-data-from-the-database-in-php/