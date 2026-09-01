<?php
     include "navbar.php"; 
    include "alert_central.php";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=”stylesheet” href=”style.css”>
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">
       
    <title>Organisation</title>
</head>
<body>
    
    <form method="POST" action="to-do.php">
        <button type="interactive">Interactive To-Do List Add Item </button>
</form>
        <form method="POST" action="layout_user_interface.php">
        <button type="interactive">Layout Generator</button>
    </form>
  <form method="POST" action="to-do-veiw.php">
        <button type="interactive">Interactive To-Do List Veiw </button>
    </form>
      <form method="POST" action="alert_system.php">
        <button type="interactive"> Add a notification to remember for later </button>
    </form>
    <form method="POST" action="gantt.php">
        <button type="interactive">Gantt Chart</button>
    </form>
    <form method="POST" action="action-plan.php">
        <button type="interactive">Action Plan Add </button>
    </form>
 <form method="POST" action="backend_database_action_plan.php">
        <button type="interactive">Action Plan Veiw </button>
    </form>
</body>
</html>


    <!--  /Initially this is a basic page containing buttons linking to other pages -->
    <!--  /It uses a post method to send the data to the files that the buttons linked to -->

