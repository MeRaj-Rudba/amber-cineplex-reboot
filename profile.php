<?php
session_start();

if (!isset($_SESSION["username"])) {
  header("Location: login.php");
}
$currentUsername = $_SESSION["username"];
$msg = ' ';
$change="";
$fullName = $email = $phone = $dob = $gender = '';

include 'config.php';
include 'databaseQuery.php';
$conn = OpenCon();


//Get all using
$table_name = 'user_info';
$result = getResult($conn, $table_name, $currentUsername);
$rowCount = mysqli_num_rows($result);
if ($rowCount !== 0) {
  $row = mysqli_fetch_assoc($result);
  $fullName = $row['full_name'];
  $email = $row['email'];
  $phone = $row['phone'];
  $dob = $row['dob'];
  $gender = $row['gender'];
}




if (isset($_POST['change-password'])) {

  if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $table_name = 'users';


    $rowCountOfPass = "";
    $currentPassword = $newPassword = $confirmNewPassword = $passwordDB = '';


    $resultOfPass = getResult($conn, $table_name, $currentUsername);

    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmNewPassword = $_POST['confirmNewPassword'];
    if ($resultOfPass) {
      // it return number of rows in the table. 
      $rowCountOfPass = mysqli_num_rows($resultOfPass);
    }



    if ($rowCountOfPass < 1) {
      $msg = "User does not exist!";
    } else {
      $rowOfPass = mysqli_fetch_assoc($resultOfPass);
      $passwordDB = $rowOfPass['password'];

      if (password_verify($currentPassword, $passwordDB)) {

        if ($newPassword === $confirmNewPassword) {
          # Update the password...
          $param_password = password_hash($newPassword, PASSWORD_DEFAULT);
          //return $param_password;
          $sql = "UPDATE users
            SET password = '$param_password'
            WHERE username = '$currentUsername';";

          mysqli_query($conn, $sql);

          $msg = "Password Changed Successfully! ";
        } else {
          $msg = "The New Passwords Does Not Match!";
        }
      } else {
        $msg = "Current Password Is Wrong!";
      }
    }
  }
}

//update info
if (isset($_POST['update'])) 
{ 
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName=$_POST['fullName'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];


    $sqlUpdate = "UPDATE user_info
    SET full_name = '$fullName',
        email = '$email',
        phone = '$phone',
        dob = '$dob',
        gender = '$gender'
    WHERE username = '$currentUsername';";

    mysqli_query($conn, $sqlUpdate);
    $change="Change Saved!";
  }
}





CloseCon($conn);
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
            <button class="ghost">Cancel</button>
            <button type="submit" name="change-password" class="ghost">Confirm</button>

          </div>
        </div>

      </div>


    </form>
  </div>

  <!--Change Password Ends-->
  <!-- Profile option-->

  <div class="container carousel-container ">
    <div class="container container2 title-border">
      <h1>Personal Information</h1>
    </div>
    <div class="card-deck justify-content-center w-100">
      <div class="card">

        <div class="card-body">

          <div class="card-body d-flex justify-content-between">
            <h4 class="card-title">Username : <?php echo $_SESSION["username"]; ?></h4>
            <a href="logout.php"><button class="ghost">Sign Out</button></a>
          </div>


          <form action="profile.php" method="post">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="">Full name</span>
              </div>
              <input type="text" name="fullName" value="<?php echo $fullName; ?>" class="form-control"></input>

            </div>
            <br>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="">Email</span>
              </div>
              <input type="email" name="email" value="<?php echo $email; ?>" class="form-control">

            </div>
            <br>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="">Phone</span>
              </div>
              <input type="text" name="phone" value="<?php echo $phone; ?>" class="form-control">

            </div>
            <br>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="">Date of birth</span>
              </div>
              <input type="date" name="dob" value="<?php echo $dob; ?>" min="1900-01-01" max="<?php echo date("Y-m-d"); ?>" class="form-control">

            </div>
            <br>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="">Gender</span>
              </div>
              <input type="text" name="gender" value="<?php echo $gender; ?>" class="form-control">

            </div>


        </div>
        
        <div class="card-footer">
          <h4><?php echo $change; ?></h4>
          <button type="submit" name="update" class="ghost">Save</button>
          <button id="changePasswordButton" onclick="changePassword()" class="ghost">Change Password</button>

        </div>


        </form>
      </div>

    </div>
  </div>





  <!-- Purchase History-->
  <div class="container carousel-container">
    <div class="container container2 title-border">
      <h1>Your Purchase History</h1>
    </div>
    <?php
    $conn = OpenCon();

    $resultHistory = getResult($conn, 'purchase', $currentUsername);
    $rowCountHistory = "";
    $searchName = "";

    if ($resultHistory) {
      // it return number of rows in the table. 
      $rowCountHistory = mysqli_num_rows($resultHistory);
    }


    if ($rowCountHistory < 1) {
      echo '<div class="container container2 title-border">
        <h3>No Purchase Yet!</h3>
      </div>';
    } else {
      echo
        '
      <table class="table table-hover theme-bg">
        <thead>
          <tr>
            <th scope="col">SL</th>
            <th scope="col">Movie</th>
            <th scope="col">Ticket</th>
            <th scope="col">Amount</th>
            <th scope="col">Date</th>
          </tr>
        </thead>
      ';
      $sl = 1;
      while ($row = mysqli_fetch_assoc($resultHistory)) {


        echo
          '
      
          <tbody>
            <tr>
              <th scope="row">' . $sl . '</th>
              <td>' . $row["mv_name"] . '</td>
              <td>' . $row["ticket_count"] . '</td>
              <td>' . $row["total_amount"] . '</td>
              <td>' . $row["purchase_date"] . '</td>
            </tr>
          </tbody>';

        $sl++;
      }
      echo '</table>';
    }
    CloseCon($conn);
    ?>
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