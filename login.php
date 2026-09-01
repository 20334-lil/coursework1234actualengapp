<?php
require_once 'db_connect.php';

// this connects the database to the PHP using a PHP function. The code for the connection is in another file called db_connect.php

$message = "";
$toastClass = "";

// The $ sign represents variables 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $password = $_POST['password'];
       

    $stmt = $conn->prepare("SELECT password,access_level,company FROM userdata WHERE email = ?");   
    // this is an sql query to return the data from a database table containing email addresses, passwords and access levels of accounts
    $stmt->bind_param("s", $email);
    // This line uses a bind method to attach the email variable to the variable $stmt
    $stmt->execute();
    $stmt->store_result();
    
    //$stmt is stored so it can be used further.

    if ($stmt->num_rows > 0) {

        $stmt->bind_result($db_password,$access,$company);
        $stmt->fetch();

        if (password_verify($password, $db_password)) {
            
            // This is a pre-built PHP function that verifies the inputted password against the database password 

            session_start();
            // Sessions preserve data so this means that email and access levels are stored so can be used later across all pages 
            
            $_SESSION['email'] = $email;
            $_SESSION['access'] = $access;
            $_SESSION['company']=$company;
            
            

            header("Location: home.php");
            exit();

        } else {
            
            // These messages are displaying messages relevant to the passwords entered into the system

            $message = "Incorrect password";
            $toastClass = "bg-danger";
        }

    } else {

        $message = "Email not found";
        $toastClass = "bg-warning";
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<! -- This is the html behind the page--> 
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <! -- Linking style sheets for visual appeal --> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/295/295128.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Login Page</title>
</head>

<body class="bg-light">

    <div class="container p-5 d-flex flex-column align-items-center">

        <?php if ($message): ?>
            <div class="toast align-items-center text-white <?php echo $toastClass; ?> border-0"
                 role="alert" aria-live="assertive" aria-atomic="true">
                <! -- Embedded php used for the toast classes--> 
                <div class="d-flex">
                    <div class="toast-body">
                        <?php echo $message; ?>
                    </div>
                    <button type="button"
                            class="btn-close btn-close-white me-2 m-auto"
                            data-bs-dismiss="toast"
                            aria-label="Close"></button>
                </div>
            </div>
        <?php endif; ?>

        <form method="post"
              class="form-control mt-5 p-4"
              style="height:auto; width:380px; box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px,
              rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;">

            <div class="row">
                <i class="fa fa-user-circle-o fa-3x mt-1 mb-2"
                   style="text-align:center;color:green;"></i>

                <h5 class="text-center p-4" style="font-weight:700;">
                    Login Into Your Account
                </h5>
            </div>

            <div class="mb-3">
                <label for="email">
                    <i class="fa fa-envelope"></i> Email
                </label>

                <input type="email"
                       name="email"
                       id="email"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <label for="password">
                    <i class="fa fa-lock"></i> Password
                </label>

                <input type="password"
                       name="password"
                       id="password"
                       class="form-control"
                       required>
            </div>

            <div class="mb-3">
                <button type="submit"
                        class="btn btn-success w-100"
                        style="font-weight:600;">
                    Login
                </button>
            </div>

            <div class="mb-2 mt-4">
                <p class="text-center" style="font-weight:600;color:navy;">
                    <a href="register.php" style="text-decoration:none;">
                        Create Account
                    </a>
                    OR
                    <a href="resetpassword.php" style="text-decoration:none;">
                        Forgot Password
                    </a>
                </p>
            </div>

        </form>

    </div>

    <script>
        
        // This is Javascript and this calls the toast classes to display the messages for a set number of time
        var toastElList = [].slice.call(document.querySelectorAll('.toast'));

        var toastList = toastElList.map(function(toastEl) {
            return new bootstrap.Toast(toastEl, {
                delay: 3000
            });
        });

        toastList.forEach(function(toast) {
            toast.show();
        });
    </script>

</body>
</html>

