<?php
session_start();
include 'config.php';
include 'databaseQuery.php';


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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="profile.css">
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-default fixed-top theme-bg">
      <div class="container">
        <a class="navbar-brand" href="index.php">Amber Cineplex</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="index.php#schedule">Schedule</a>
            <a class="nav-item nav-link" href="index.php#">Pricing</a>
            <a class="nav-item nav-link" href="booking.php">Booking</a>
            <a class="nav-item nav-link" href="index.php#upcoming">Upcoming</a>
            <a class="nav-item nav-link" href="index.php#">Contact Us</a>
            <?php
            if (!isset($_SESSION["username"])) {
              echo '<a class="nav-item nav-link" href="login.php">Sign In</a>';
            } else {


              echo '
                <div class="media">
                    <img class="mr-3 placeholder-image"  src="images/placeholder.jpg" alt="Generic placeholder image">
                    <div class="media-body">';
              if ($_SESSION["username"] === 'Admin') {
                # code...
                echo '<a class="nav-item nav-link" href="admin.php">Welcome ' . $_SESSION["username"] . '</a>';
              } else {
                # code...
                echo '<a class="nav-item nav-link" href="profile.php">Welcome ' . $_SESSION["username"] . '</a>';
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

    <!--Change Password-->

    <div style="display: none;" id="change-panel" class="change-password-panel container carousel-container ">
      <div class="container container2 title-border">
        <h1>Change Your Password</h1>
      </div>
      <form action="profile.php" method="post">
        <div class="card-deck justify-content-center w-100">
          <div class="card">

            <div class="card-body">
              <br>
              <br>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="">Current Password</span>
                </div>
                <input name="currentPassword" type="password" class="form-control">

              </div>
              <br>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="">New Password</span>
                </div>
                <input name="newPassword" type="password" class="form-control">

              </div>
              <br>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="">Confirm Password</span>
                </div>
                <input name="confirmNewPassword" type="password" class="form-control">

              </div>
              <br>
            </div>
            <div class="card-footer">
              <h4><?php echo $msg; ?></h4>
              <a href="logout.php"><button class="ghost">Cancel</button></a>
              <a href="logout.php"><button type="submit" name="change-password" class="ghost">Confirm</button></a>

            </div>
          </div>

        </div>


      </form>
    </div>


    <!-- Start of admin-->

    <div class="container carousel-container ">
      <div class="container container2 title-border">
        <h1>Admin Panel</h1>
      </div>
      <div class="card-deck justify-content-center w-100">
        <div class="card">
          <div class="card-body">
            <div class="card-body d-flex justify-content-between">
              <h4 class="card-title">Welcome to your panel</h4>
              <a href="logout.php"><button class="ghost">Sign Out</button></a>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- Movie Panel-->

    <div class="container carousel-container ">
      <div class="container container2 title-border">
        <h2>Movies</h2>
      </div>
      <!-- Now Showing-->
      <div class="container container2 title-border">
        <h4>Now Showing Movies</h4>
      </div>

      <div class="card-deck justify-content-center w-100">
        <div class="card">
          <div class="card-body">
            <div class="card-body d-flex justify-content-between">
            <?php
                $conn = OpenCon();
                $result=getResultAll($conn,'now_showing');
                if ($result) {
                  // it return number of rows in the table. 
                  $rowCount = mysqli_num_rows($result);
                }
                if ($rowCount < 1) {
                  echo '<div class="container container2 title-border">
                    <h4>No Movies Showing Now!</h4>
                  </div>';
                } else {
                  echo
                    '
                  <table class="table table-hover theme-bg">
                    <thead>
                      <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Movie Name</th>
                      </tr>
                    </thead>
                  ';
                  $sl = 1;
                  while ($row = mysqli_fetch_assoc($result)) {


                    echo
                      '
                  
                      <tbody>
                        <tr>
                          <th scope="row">' . $sl . '</th>
                          <td>' . $row["mv_name"] . '</td>
                          
                        </tr>
                      </tbody>';
            
                    $sl++;
                  }
                   echo '</table>';
                }
                 CloseCon($conn);
                ?>
            </div>
          </div>
        </div>

      </div>
      <!-- Now Showing-->

      <br>
      <div class="container container2 title-border">
        <h4>Upcoming Movies</h4>
      </div>

      <div class="card-deck justify-content-center w-100">
        <div class="card">
          <div class="card-body">
            <div class="card-body d-flex justify-content-between">
            <?php
                $conn = OpenCon();
                $result=getResultAll($conn,'upcoming');
                if ($result) {
                  // it return number of rows in the table. 
                  $rowCount = mysqli_num_rows($result);
                }
                if ($rowCount < 1) {
                  echo '<div class="container container2 title-border">
                    <h4>No movies coming up next!</h4>
                  </div>';
                } else {
                  echo
                    '
                  <table class="table table-hover theme-bg">
                    <thead>
                      <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Movie Name</th>
                      </tr>
                    </thead>
                  ';
                  $sl = 1;
                  while ($row = mysqli_fetch_assoc($result)) {


                    echo
                      '
                  
                      <tbody>
                        <tr>
                          <th scope="row">' . $sl . '</th>
                          <td>' . $row["mv_name"] . '</td>
                          
                        </tr>
                      </tbody>';
            
                    $sl++;
                  }
                   echo '</table>';
                }
                 CloseCon($conn);
                ?>
            </div>
          </div>
        </div>

      </div>










    </div>





    <footer>
      <small>©2020. Amber Cineplex | Dhaka, Bangladesh</small>
    </footer>


    <script>
      function changePassword() {
        document.getElementById("change-panel").style.display = "block";
        document.getElementById("changePasswordButton").style.display = "none";
      }
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>

</html>