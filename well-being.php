<html>
         
          <?php
        include "navbar.php";
		session_start();
        echo $_SESSION['email'];
        $access = $_SESSION['access'];

		if ($access == 'admin' || $access == 'user') {
            
        }
	
        ?>

<head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

    <form method="POST" action="clicking_game.php"> 

        <br>
        <br>

    <button type="interactive"> Clicking Game</button>
    </form>
     <form method="POST" action="quotes.php">

    <button type="interactive">Quotes</button>
    </form>
      /Initially this is a basic page containing buttons linking to other pages
  /It uses a post method to send the data to the files that the buttons linked to 

    </html>
    
