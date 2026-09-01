  <?php
        include "navbar.php";
		session_start();
        echo $_SESSION['email'];
        $access = $_SESSION['access'];

		if ($access == 'admin' || $access == 'user') {
	
        ?>
    <html>
        <head>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">
        </head>
        <body>
            
     <form method="POST" action="helicopter-list.-view.php">

    <button type="interactive">Helicopter List Veiw</button>
    </form>
     <form method="POST" action="engineer-list.php">

    <button type="interactive">Engineer List </button>
    </form>
     <form method="POST" action="engineer-qualifications.php">

    <button type="interactive">Engineer Qualifications </button>
    </form>
     <form method="POST" action="log.php">
	<?php
         if($access == 'admin') { ?>
    		<button type="interactive">Access to Log </button>
         
     <?php  } ?>
        
    </form>
          
     <form method="POST" action="heli-list-insert.php">
    <button type="interactive">Helicopter List Insert</button>
    </form>
        
    <?php } else {
              header("Location: home.php");
            exit();

        } ?>
