<?php
    session_start();
    if (isset($_GET["movieName"])) {
        $movieName=$_GET["movieName"];
        $_SESSION['movieName'] = $movieName;
        header("Location: booking.php");
    
    }



?>