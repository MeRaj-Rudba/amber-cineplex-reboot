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
$currentUser=$_SESSION['username'];
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
        
        $price= $rowOfCheck['price'];
        $amount=$price*$quantity;

        $sqlTicketCheck = "SELECT * FROM schedule WHERE theatre = '$theatreName'
        AND date ='$showDate'
        AND $time >'$quantity'
        ";
        $result = mysqli_query($conn, $sqlTicketCheck);
        if ($result) {
            
            $rowCount = mysqli_num_rows($result);
        }
        if ($rowCount > 0) {
            
            // $ticketAvailability = "True";
            // $rowOfSchedule = mysqli_fetch_assoc($result);
            // $previousSeat= $rowOfSchedule[$time];
            // $newSeat=$previousSeat-$quantity;
            // $today= date("Y-m-d");
            // $sqlToPurchase="INSERT INTO purchase (username, mv_name, ticket_count, total_amount, purchase_date)
            // VALUES ('$currentUser','$movieName','$quantity','$amount','$today');";
            // $sqlToSchedule="UPDATE schedule
            // SET $time = '$newSeat' WHERE theatre = '$theatreName'
            // AND date = '$showDate';";

            // mysqli_query($conn, $sqlToSchedule);
            // mysqli_query($conn, $sqlToPurchase);






            $_SESSION['show_time_to_search'] = $time;
            $_SESSION['movieName'] = $movieName;
            $_SESSION['theatreName'] = $theatreName;
            $_SESSION['showDate'] = $showDate;
            $_SESSION['showTime'] = $showTime;
            $_SESSION['quantity'] = $quantity;
            $_SESSION['price'] = $price;
            $_SESSION['amount'] = $amount;
            header("Location: payment.php");
            



        } else {
            header("Location: housefull.php");
        }
        
    }
}




CloseCon($conn);
?>
