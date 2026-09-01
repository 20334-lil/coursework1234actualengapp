<?php
    
    include "email.php";
?>
	
<?php
// Function definition
function function_alert($message) {
    
    // Display the alert box 
    echo "<script>alert('$message');</script>";
}


// Function call
function_alert("Are you on top of your daily tasks?");

?>
