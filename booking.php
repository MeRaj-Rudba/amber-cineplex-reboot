<?php
session_start();
include 'config.php';
include 'databaseQuery.php';
 $conn = OpenCon();
 $currentMovie=$_SESSION["movieName"];
 $sqlCheck = "SELECT * FROM theatre WHERE movie ='$currentMovie'";
 $result = mysqli_query($conn, $sqlCheck);
 $rowCount = "";
 $status = "";
 $rowOfCheck="";

 if ($result) {
   // it return number of rows in the table. 
   $rowCount = mysqli_num_rows($result);
 }
 if ($rowCount < 1) {
  $status = "No Show Found";
} else {
  $rowOfCheck=mysqli_fetch_assoc($result);


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
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="profile.css">
  <title>Amber Cineplex | Booking </title>
</head>

<body>
  <!--Navbar-Starts-->

  <nav class="navbar navbar-expand-lg navbar-light bg-light  theme-bg">
  <div class="container">
            <a class="navbar-brand" href="index.php">Amber Cineplex</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link " href="index.php">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="index.php#schedule">Schedule</a>
                    
                    <a class="nav-item nav-link" href="notice.php">Notice</a>
                    <a class="nav-item nav-link" href="index.php#upcoming">Upcoming</a>
                    <a class="nav-item nav-link" href="contactUs.php">About Us</a>
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
  <!--NavBar-Ends-->
  <!--Booking Area Start-->



  <div class="booking row justify-content-around ">
    <div class="container3 col-lg-4 col-md-4 col-sm-12">
      <?php
      $conn = OpenCon();

      
      $rowCount = "";
      $searchName = "";

          $searchName = $_SESSION["movieName"];
          $sqlUserCheckMovie = "SELECT mv_name, director, genre, release_date, runtime, cast, poster FROM movies WHERE mv_name = '$searchName'";
          $resultMovie = mysqli_query($conn, $sqlUserCheckMovie);
          if ($resultMovie) {
            // it return number of rows in the table. 
            $count = mysqli_num_rows($resultMovie);
          }
          if ($count !== 0) {
            $movieRow = mysqli_fetch_assoc($resultMovie);
            echo '
                  
                  <div  class="card booking-card box-shadow-card ">
                  <img src="' . $movieRow['poster'] . '" class="card-img-top" alt="...">
                    <div id="movie_card" class="card-body">
                      <h3 class="card-title">' . $movieRow['mv_name'] . '</h3>
                      <p class="card-text"><b>Director : </b>' . $movieRow['director'] . '</p>
                      <p class="card-text"><b>Genre : </b> ' . $movieRow['genre'] . '</p>
                      <p class="card-text"><b>Release Date : </b>' . $movieRow['release_date'] . '</p>
                      <p class="card-text"><b>Runtime : </b>' . $movieRow['runtime'] . '</p>
                      <p class="card-text"><b>Cast : </b>' . $movieRow['cast'] . '</p>
                    </div>
                    
                    
                  </div>
                  
                  ';
          }
        
      
      CloseCon($conn);
      ?>

    </div>











    <div class="container3 col-lg-6 col-md-6 col-sm-12">
      <div class="card booking-card box-shadow-card" id="selection-one">
        <div class="card-body">

          <h1>Fill the Form to Book Your Ticket</h1>
          <form  action="purchase.php" method="post" class="form-group">
            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Movie</label>
            <input name="movieName" class="form-control" value=" <?php echo $_SESSION["movieName"]; ?>" type="text" disabled required>


            </input>

            

            <br>
            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Date</label>
            <input type="date" name="showDate" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d"); ?>" class="form-control" required>
            <br>
            
            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Theater</label>
            <input name="theatreName" class="form-control" value="<?php echo $rowOfCheck['theatre_name'];?>" type="text" disabled>

            <br>
            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Price</label>
            <input name="price" class="form-control" value="<?php echo $rowOfCheck['price'].' BDT Per Ticket';?>" type="text" disabled required>

            <br>

            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Time</label>
            <select name="showTime" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" required>
              
              <option value="<?php echo $rowOfCheck['show_1'];?>"><?php echo $rowOfCheck['show_1'];?></option>
              <option value="<?php echo $rowOfCheck['show_2'];?>"><?php echo $rowOfCheck['show_2'];?></option>
              <option value="<?php echo $rowOfCheck['show_3'];?>"><?php echo $rowOfCheck['show_3'];?></option>
            </select>

            

            <br>
            <br>

            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Quantity</label>
            <input name="quantity" class="form-control" value="1" min="0" max="10" type="number" required >

            <br>
            <br>


            <button name="purchase" type="submit" class="">Confirm</button>
          </form>
        </div>
      </div>
    </div>
  </div>




























  <!--Booking Area Ends-->





















  <!--JavaScript-->
  <script src="movieSelection.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>