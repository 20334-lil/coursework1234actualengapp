
<?php
   include "db_connect.php";
 session_start();
     $email = $_SESSION['email'];
        $access = $_SESSION['access'];

if ($access == 'admin' || $access == 'user') {

            $email = $_SESSION['email'];
    
    $query = "SELECT * FROM Gantt WHERE email='$email'";
    
$result=mysqli_query($conn,$query);
$userData = [];

while ($row = mysqli_fetch_assoc($result)) {
    $userData[] = [
        "id" => "Task " . $row["id"],
        "name" => $row["name"],
        "start" => $row["start"],
        "end" => $row["end"],
        "progress" => (int)$row["progress"],
        "important" => (int)$row["important"]==1,
        "email" => $row["email"]
    ];
}
}
    ?>
    
<script>
let tasks = <?php echo json_encode($userData); ?>;

console.log(tasks);
</script>


?>


    
https://www.experts-exchange.com/questions/26676903/Passing-PHP-Array-Variable-from-MySQL-to-a-Javascript-Variable.html