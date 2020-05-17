<?php
    session_start();
    if (isset($_GET["movieName"])) {
        $movieName=$_GET["movieName"];
        $_SESSION['movieName'] = $movieName;
        header("Location: booking.php");
    
    }

    elseif (isset($_GET["noticeToDelete"])) {
        $noticeTitleToDelete=$_GET["noticeToDelete"];
        $_SESSION['noticeToDelete'] = $noticeTitleToDelete;
        header("Location: deleteNotice.php");
    
    }



?>