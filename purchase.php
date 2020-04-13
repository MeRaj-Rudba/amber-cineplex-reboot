<?php
session_start();
include 'config.php';
include 'databaseQuery.php';
$conn = OpenCon();
$movieName = $_SESSION["movieName"];
$sqlCheck = "SELECT * FROM theatre WHERE movie ='$movieName'";
$result = mysqli_query($conn, $sqlCheck);
$rowCount = "";
$status = "";
$rowOfCheck = "";

$showDate = "";

$price = "";
$showTime =  "";
$quantity =  "";
$username = "";
$ticketAvailability = "";
$time = "";
if ($result) {

    $rowCount = mysqli_num_rows($result);
}
if ($rowCount < 1) {
    $status = "No Show Found";
} else {
    $rowOfCheck = mysqli_fetch_assoc($result);
}
$theatreName = $rowOfCheck['theatre_name'];
$time1 = $rowOfCheck['show_1'];
$time2 = $rowOfCheck['show_2'];
$time3 = $rowOfCheck['show_3'];


if (isset($_POST['purchase'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //$movieName = $_POST['movieName'];
        $showDate = $_POST['showDate'];
        // $theatreName = $_POST['theatreName'];
        $price = "";
        $showTime = $_POST['showTime'];
        $quantity = $_POST['quantity'];
        $username = "";
        $ticketAvailability = "";
        $time = "";


        
        if ($time1 ===  $showTime) {
            $time = 'show_1';
        } elseif ($time2 ===  $showTime) {
            $time = 'show_2';
        } elseif ($time3 ===  $showTime) {
            $time = 'show_3';
        }
        

        $sqlTicketCheck = "SELECT * FROM schedule WHERE theatre = '$theatreName'
        AND date ='$showDate'
        AND $time >'$quantity'
        ";
        $result = mysqli_query($conn, $sqlTicketCheck);
        if ($result) {
            // it return number of rows in the table. 
            $rowCount = mysqli_num_rows($result);
        }
        if ($rowCount > 0) {
            //$msg = "Hall already exists with the same name!";
            $ticketAvailability = "True";
            $rowOfSchedule = mysqli_fetch_assoc($result);
            
            $_SESSION['movieName'] = $movieName;
            $_SESSION['theatreName'] = $theatreName;
            $_SESSION['showDate'] = $showDate;
            $_SESSION['showTime'] = $showTime;
            $_SESSION['quantity'] = $quantity;
            header("Location: ticket.php");
            



        } else {
            $ticketAvailability = "False";
        }
        
    }
}




CloseCon($conn);
?>
