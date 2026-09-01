<?php

$servername = "sql204.infinityfree.com";
$username = "if0_42804755";
$password = "34rijKoYml";
$dbname = "if0_42804755_Engapp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");
?>

