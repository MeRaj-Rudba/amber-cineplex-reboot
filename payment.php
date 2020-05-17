<?php
session_start();
include 'config.php';
include 'databaseQuery.php';
$conn = OpenCon();

if (isset($_POST['confirmPayment'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $time = $_SESSION['show_time_to_search'];
        $movieName = $_SESSION['movieName'];
        $theatreName = $_SESSION['theatreName'];
        $showDate = $_SESSION['showDate'];
        $showTime = $_SESSION['showTime'];
        $quantity = $_SESSION['quantity'];
        $price = $_SESSION['price'];
        $amount = $_SESSION['amount'];

        $sqlTicketCheck = "SELECT * FROM schedule WHERE theatre = '$theatreName'
        AND date ='$showDate'
        AND $time >'$quantity'
        ";
        $result = mysqli_query($conn, $sqlTicketCheck);
        if ($result) {

            $rowCount = mysqli_num_rows($result);
        }
        if ($rowCount > 0) {
            $ticketAvailability = "True";
            $rowOfSchedule = mysqli_fetch_assoc($result);
            $previousSeat = $rowOfSchedule[$time];
            $newSeat = $previousSeat - $quantity;
            $today = date("Y-m-d");
            $currentUser=$_SESSION['username'];
            $sqlToPurchase = "INSERT INTO purchase (username, mv_name, ticket_count, total_amount, purchase_date)
                VALUES ('$currentUser','$movieName','$quantity','$amount','$today');";
            $sqlToSchedule = "UPDATE schedule
                SET $time = '$newSeat' WHERE theatre = '$theatreName'
                AND date = '$showDate';";

            mysqli_query($conn, $sqlToSchedule);
            mysqli_query($conn, $sqlToPurchase);
            header("Location: ticket.php");
        }
    }
} elseif (isset($_POST['cancelPayment'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $_SESSION['movieName'] = "";
        $_SESSION['theatreName'] = "";
        $_SESSION['showDate'] = "";
        $_SESSION['showTime'] = "";
        $_SESSION['quantity'] = "";
        $_SESSION['price'] = "";
        $_SESSION['amount'] = "";
        header("Location: index.php");
    }
}




CloseCon($conn);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/0aae940090.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="profile.css">
    <title>Amber Cineplex | Payment </title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light  theme-bg">
        <div class="container">
            <a class="navbar-brand" href="index.php">Amber Cineplex</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>


                    <a class="nav-item nav-link" href="notice.php">Notice</a>

                    <a class="nav-item nav-link" href="contactUs.php">About Us</a>
                    <?php
                    if (!isset($_SESSION["username"])) {
                        echo '<a class="nav-item nav-link" href="login.php">Sign In</a>';
                    } else {


                        echo '
                <div class="media">
                    
                    <div class="media-body">';
                        if ($_SESSION["username"] === 'Admin') {
                            # code...
                            echo '<a class="nav-item nav-link" href="admin.php"><i class="fas fa-user-secret"></i> ' . $_SESSION["username"] . '</a>';
                        } else {
                            # code...
                            echo '<a class="nav-item nav-link" href="profile.php"><i class="fas fa-user"></i> ' . $_SESSION["username"] . '</a>';
                        }


                        echo '</div>
                </div>
                
                ';
                    }


                    ?>

                </div>
            </div>
        </div>

    </nav>


    <div class="container mt-4 fun-image d-flex justify-content-center">
        <img   src="images/illustrator2.png" alt="">
    </div>


    <div class="container carousel-container">
        <div class="card">
            <form action="payment.php" method="post" class="form-group">
                <div class="card-body">
                    <h1>Your Amount:<?php echo $_SESSION['amount'] . ' BDT'; ?></h1>

                </div>

                <div class="card-footer">
                    <button type="submit" name="cancelPayment" class=""><i class="fas fa-times"></i> Decline</button></a>
                    <button type="submit" name="confirmPayment" class=""><i class="fas fa-check"></i> Accept</button>
                </div>
            </form>
        </div>
    </div>
    <footer>
        <small>©2020. Amber Cineplex | Dhaka, Bangladesh</small>
    </footer>
    <!--javaScripts-->
    <script src="movieSelection.js"></script>
    <script src="index.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>