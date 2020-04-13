<?php
session_start();
include 'config.php';
include 'databaseQuery.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="purchase.css">
    <title>Amber Cineplex | Purchase </title>
</head>

<body>
    <div class="container carousel-container ">
        <div class="ticket  row">
            <div class="card ticket-card  col-8">
                <div class="ticket-head">
                    <h1>Amber Cineplex</h1>
                </div>
                <div class="ticket-body">
                    <table class="ticket-table">

                        <tr>
                            <td>
                                <h3><b>Movie:<b> <?php echo $_SESSION['movieName']; ?></h3>
                                
                            </td>
                        </tr>
                        
                        <br>
                        <tr>
                            <td>
                                <p><b>Date : </b> <?php echo $_SESSION['showDate']; ?></p>
                            </td>
                            <td>
                                <p><b>Time : </b> <?php echo $_SESSION['showTime']; ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p><b>Theatre : </b> <?php echo $_SESSION['theatreName'] ?></p>
                            </td>
                            <td>
                                <p><b>Quantity : </b> <?php echo $_SESSION['quantity']; ?></p>
                            </td>
                        </tr>
                        
                    </table>

                </div>
                <div class="ticket-footer">
                    <p class="caution"><b>Please Make sure to bring this ticket with you</b></p>
                </div>

            </div>
            <div class=" card ticket-card col-3">
                <div class="ticket-head">
                    <h1>Logo</h1>
                </div>
                <div class="ticket-body">
                    <p><b>Movie : </b> <?php echo $_SESSION['movieName']; ?></p>
                    <p><b>Theatre : </b> <?php echo $_SESSION['theatreName']; ?></p>
                    <p><b>Date : </b> <?php echo $_SESSION['showDate']; ?></p>
                    <p><b>Time : </b> <?php echo $_SESSION['showTime']; ?></p>
                    <p><b>Quantity : </b> <?php echo $_SESSION['quantity']; ?></p>
                </div>
            </div>
        </div>

    </div>


</body>

</html>