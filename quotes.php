<?php
    
    include 'db_connect.php';

$sql="SELECT quote FROM Quote ORDER BY RAND() LIMIT 1";
$result= $conn->query($sql);
if ($result && $result-> num_rows >0){
    
    echo "<table border='1'>";
    echo "<tr><th>Quote</th></tr>";
    while ($row=$result-> fetch_assoc()) {
        
        echo "<tr>";
        echo "<td>".$row["quote"]."</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "0 results";
}
 $conn->close();

?>