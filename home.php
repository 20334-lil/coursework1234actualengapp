<!DOCTYPE html>
<html lang="en">
<head>
    <?php
            
            include "navbar.php";
  
		session_start();
        echo $_SESSION['email'];
        $access = $_SESSION['access'];
 $company = $_SESSION['company'];
		if ($access == 'admin' || $access == 'user') {

include "alert-box.php";
            ?>

    <meta name="google-site-verification" content="oq6ys_zZ2JZ5XDcoFx4WULGtGWnnKRxxVVD2vTYzsME" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="/style.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
          
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">
    
</head>
<body>

    <ul> 
         <li><a href="well-being.php">Well-being</a></li>
        <li><a href="engineering-functionality.php">Engineering Functionality Page</a></li>
         <li><a href="organisation.php">Organisation Page</a></li>
         
    </ul>

</body>
</html>

<?php } else {
            header("login.php");
            exit();
        }
?>

