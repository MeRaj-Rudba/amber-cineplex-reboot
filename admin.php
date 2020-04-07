<?php
session_start();
include 'config.php';
include 'databaseQuery.php';
$conn = OpenCon();

if (!isset($_SESSION["username"])) {
  header("Location: login.php");
}
$msg = "";
if (isset($_POST['add-theatre'])) {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $theatreName = $_POST['theatre-name'];
    $time1 = $_POST['time1'];
    $time2 = $_POST['time2'];
    $time3 = $_POST['time3'];
    $capacity = $_POST['capacity'];


    $sqlUserCheck = "SELECT * FROM theatre WHERE theatre_name = '$theatreName'";
    $result = mysqli_query($conn, $sqlUserCheck);
    if ($result) {
      // it return number of rows in the table. 
      $rowCount = mysqli_num_rows($result);
    }
    if ($rowCountOfPass > 1) {
      $msg = "Hall already exists with the same name!";
    } else {
      $sql = "INSERT INTO theatre (theatre_name, show1,show2,show3,capacity)
                    VALUES ('$theatreName','$time1','$time2','$time3','$capacity');";
      mysqli_query($conn, $sql);
      $msg = "Theatre Added Successfully!";
    }
  }
} elseif (isset($_POST['add-schedule'])) {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mvName = $_POST['movie-name'];
    $theatreName = $_POST['inTheatre'];
    $sqlScheduleCheck = "SELECT * FROM theatre WHERE movie = '$mvName'";
    $result = mysqli_query($conn, $sqlScheduleCheck);
    if ($result) {
      // it return number of rows in the table. 
      $rowCount = mysqli_num_rows($result);
    }
    if ($rowCountOfPass > 1) {
      $msg = "Movie Schedule Already Exist!";
    } else {
      $sql = "UPDATE theatre
      SET movie='$mvName'
      WHERE theatre_name='$theatreName';";
      mysqli_query($conn, $sql);
      $msg = "Movie added to schedule successfully!";
    }
  }
} elseif (isset($_POST['add-movie '])) {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mvName = $_POST['new-movie-name'];
    $director = $_POST['director'];
    $genre = $_POST['genre'];
    $releaseDate = $_POST['releaseDate'];
    $runtime = $_POST['runtime'];
    $cast = $_POST['cast'];
    $poster = $_POST['poster'];



    $sqlScheduleCheck = "SELECT * FROM movies WHERE mv_name = '$mvName'";
    $result = mysqli_query($conn, $sqlScheduleCheck);
    if ($result) {
      // it return number of rows in the table. 
      $rowCount = mysqli_num_rows($result);
    }
    if ($rowCountOfPass > 1) {
      $msg = "Movie Already Exist!";
    } else {
      $sql = "INSERT INTO movies (mv_name, director, genre, release_date, runtime, cast, poster)
                    VALUES ('$mvName','$director','$genre','$releaseDate','$runtime','$cast','$poster');";
      mysqli_query($conn, $sql);
      $msg = "Movie added to successfully!";
    }
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
  <!--Msg Panel-->

  <div class="container container2 title-border">
    <h1 style="color:black;"><?php echo $msg; ?> </h1>
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
            $result = getResultAll($conn, 'now_showing');
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
            $result = getResultAll($conn, 'upcoming');
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
    <br>
    <br>
    <div class="card-deck justify-content-center w-100">
      <div class="card">
        <div class="card-footer">

          <button onclick="showSchedule();" name="addSchedule" class="ghost">Add Schedule</button></a>
          <button onclick="showAddMovie();" name="addMovie" class="ghost">Add Movie</button></a>


        </div>
      </div>

    </div>




    <!-- Add to schedule hidden-->
    <div style="display: none;" id="add-schedule" class=" container carousel-container ">
      <div class="container container2 title-border">
        <h1>Add Movie to Schedule</h1>
      </div>
      <form action="admin.php" method="post">
        <div class="card-deck justify-content-center w-100">
          <div class="card">

            <div class="card-body">
              <br>
              <br>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="">Movie Name</span>
                </div>
                <input name="movie-name" type="text" class="form-control">

              </div>
              <br>

              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="">Theatre</span>
                </div>
                <input name="inTheatre" type="text" class="form-control">

              </div>
              <br>
            </div>
            <div class="card-footer">

              <button class="ghost">Cancel</button></a>
              <button type="submit" onclick="showAddSchedule();" name="add-schedule" class="ghost">Confirm</button>

            </div>
          </div>

        </div>


      </form>
    </div>

    <!-- Add to schedule hidden-->


    <!-- Add Movie hidden-->
    <div style="display: none;" id="add-movie" class=" container carousel-container ">
      <div class="container container2 title-border">
        <h1>Add New Movie</h1>
      </div>
      <form action="admin.php" method="post">
        <div class="card-deck justify-content-center w-100">
          <div class="card">

            <div class="card-body">
              <br>
              <br>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="">Movie Name</span>
                </div>
                <input name="new-movie-name" type="text" class="form-control">

              </div>
              <br>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="">Director</span>
                </div>
                <input name="director" type="text" class="form-control">

              </div>
              <br>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="">Genre</span>
                </div>
                <input name="genre" type="text" class="form-control">

              </div>
              <br>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="">Release Date</span>
                </div>
                <input name="releaseDate" type="text" class="form-control">

              </div>
              <br>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="">Runtime</span>
                </div>
                <input name="runtime" type="text" class="form-control">

              </div>
              <br>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="">Cast</span>
                </div>
                <input name="cast" type="text" class="form-control">

              </div>
              <br>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="">Poster</span>
                </div>
                <input name="poster" type="text" class="form-control">

              </div>
              <br>
            </div>
            <div class="card-footer">

              <button class="ghost">Cancel</button></a>
              <button type="submit" onclick="showAddMovie();" name="add-movie" class="ghost">Confirm</button>

            </div>
          </div>

        </div>


      </form>
    </div>
    <!-- Add Movie hidden-->














    <!-- Start of Hall-->

    <div class="container carousel-container ">
      <div class="container container2 title-border">
        <h1>Theaters</h1>
      </div>
      <div class="card-deck justify-content-center w-100">
        <div class="card">
          <div class="card-body">
            <div class="card-body d-flex justify-content-between">
              <?php
              $conn = OpenCon();
              $result = getResultAll($conn, 'theatre');
              if ($result) {
                // it return number of rows in the table. 
                $rowCount = mysqli_num_rows($result);
              }
              if ($rowCount < 1) {
                echo '<div class="container container2 title-border">
                    <h4>No Theatres Yet!</h4>
                  </div>';
              } else {
                echo
                  '
                  <table class="table table-hover theme-bg">
                    <thead>
                      <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Theatre Name</th>
                        <th scope="col">Capacity</th>
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
                          <td>' . $row["theatre_name"] . '</td>
                          <td>' . $row["capacity"] . '</td>
                          
                        </tr>
                      </tbody>';

                  $sl++;
                }
                echo '</table>';
              }
              CloseCon($conn);
              ?>
            </div>
            <div class="card-footer">
              <button id="addTheatreButton" onclick="addTheatre()" class="ghost">Add Theatre</button>

            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- End of Hall-->


    <!-- Add Theatre hidden-->
    <div style="display: none;" id="change-panel" class="change-password-panel container carousel-container ">
      <div class="container container2 title-border">
        <h1>Add Theatre</h1>
      </div>
      <form action="admin.php" method="post">
        <div class="card-deck justify-content-center w-100">
          <div class="card">

            <div class="card-body">
              <br>
              <br>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="">Theatre Name</span>
                </div>
                <input name="theatre-name" type="text" class="form-control">

              </div>
              <br>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="">Time of 1st show</span>
                </div>
                <input name="time1" type="text" class="form-control">

              </div>
              <br>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="">Time of 2nd show</span>
                </div>
                <input name="time2" type="text" class="form-control">

              </div>
              <br>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="">Time of 3rd show</span>
                </div>
                <input name="time3" type="text" class="form-control">

              </div>
              <br>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="">Capacity</span>
                </div>
                <input name="capacity" type="number" class="form-control">

              </div>
              <br>
            </div>
            <div class="card-footer">

              <button class="ghost">Cancel</button></a>
              <button type="submit" onclick="showAddTheatre();" name="add-theatre" class="ghost">Confirm</button>

            </div>
          </div>

        </div>


      </form>
    </div>
    <!-- Add Theatre hidden-->








  </div>





  <footer>
    <small>©2020. Amber Cineplex | Dhaka, Bangladesh</small>
  </footer>


  <script src="admin.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>