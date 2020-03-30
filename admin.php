<?php
session_start();

if (!isset($_SESSION["username"])) {
  header("Location: login.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Amber Cineplex | <?php echo $_SESSION["username"]; ?></title>
</head>
<body>
  <h1>You are <?php echo $_SESSION["username"]; ?> </h1>
  <button><a href="logout.php">Sign Out</a></button>
  
</body>
</html>



