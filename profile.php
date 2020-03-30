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
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="profile.css">
</head>
<body>
  <h1>You are <?php echo $_SESSION["username"]; ?> </h1>
  <a href="logout.php"><button>Sign Out</button></a>
  
</body>
</html>



