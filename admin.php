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
      $sql = "INSERT INTO theatre (theatre_name, show_1,show_2,show_3,capacity)
                    VALUES ('$theatreName','$time1','$time2','$time3','$capacity');";
      mysqli_query($conn, $sql);
      $msg = "Theatre Added Successfully!";
    }
  }
} elseif (isset($_POST['add-schedule'])) {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mvName = $_POST['movie-name'];
    $theatreName = $_POST['inTheatre'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $capacity = "";

    $sqlTheaterCheck = "SELECT * FROM theatre WHERE movie = '$mvName'";
    $sqlScheduleCheck1 = "SELECT * FROM schedule WHERE date = '$startDate' AND theatre = '$theatreName'";
    $sqlScheduleCheck2 = "SELECT * FROM schedule WHERE date = '$endDate' AND theatre = '$theatreName'";


    $result = mysqli_query($conn, $sqlTheaterCheck);
    $resultSchedule1 = mysqli_query($conn, $sqlScheduleCheck1);
    $resultSchedule2 = mysqli_query($conn, $sqlScheduleCheck2);
    if ($result) {
      // it return number of rows in the table. 
      $rowCount = mysqli_num_rows($result);
    }
    if ($resultSchedule1) {
      // it return number of rows in the table. 
      $rowCountOfSchedule1 = mysqli_num_rows($resultSchedule1);
    }
    if ($resultSchedule2) {
      // it return number of rows in the table. 
      $rowCountOfSchedule2 = mysqli_num_rows($resultSchedule2);
    }



    if ($rowCount > 1 && $rowCountOfSchedule1 > 1 && $rowCountOfSchedule2 > 1) {
      $msg = "Movie Schedule Already Exist!";
    } else {
      $sqlCapacityCheck = "SELECT * FROM theatre WHERE theatre_name = '$theatreName'";
      $resultOfQuery = mysqli_query($conn, $sqlCapacityCheck);
      $rowOfQuery = mysqli_fetch_assoc($resultOfQuery);
      $capacity = $rowOfQuery['capacity'];
      $sql = "UPDATE theatre
      SET movie='$mvName'
      WHERE theatre_name='$theatreName';";
      mysqli_query($conn, $sql);

      date_default_timezone_set('UTC');

      // Start date
      $date = $startDate;
      // End date
      $end_date = $endDate;

      while (strtotime($date) <= strtotime($end_date)) {

        $sqlSchedule = "INSERT INTO schedule (date, theatre, max_capacity, show_1, show_2, show_3)
        VALUES ('$date','$theatreName','$capacity','$capacity','$capacity','$capacity');";
        mysqli_query($conn, $sqlSchedule);

        $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
      }



      $msg = "Movie added to schedule successfully!";
    }
  }
} elseif (isset($_POST['add-movie'])) {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mvName = $_POST['new-movie-name'];
    $director = $_POST['director'];
    $genre = $_POST['genre'];
    $releaseDate = $_POST['releaseDate'];
    $runtime = $_POST['runtime'];
    $cast = $_POST['cast'];
    $poster = $_POST['poster'];
    $status = $_POST['status'];
    $banner = $_POST['banner'];



    $sqlScheduleCheck = "SELECT * FROM movies WHERE mv_name = '$mvName'";
    $result = mysqli_query($conn, $sqlScheduleCheck);
    if ($result) {
      // it return number of rows in the table. 
      $rowCount = mysqli_num_rows($result);
    }
    if ($rowCount > 1) {
      $msg = "Movie Already Exist!";
    } else {
      $sql = "INSERT INTO movies (mv_name, director, genre, release_date, runtime, cast, poster, status,banner)
                    VALUES ('$mvName','$director','$genre','$releaseDate','$runtime','$cast','$poster','$status','$banner');";
      mysqli_query($conn, $sql);
      $msg = "Movie added to successfully!";
    }
  }
} elseif (isset($_POST['changeStatusBtn'])) {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $movieName = $_POST['movieNameToChangeStatus'];
    $status = $_POST['changedStatus'];



    $sqlUpdate = "UPDATE movies
    SET status = '$status'
        
    WHERE mv_name = '$movieName';";

    if (mysqli_query($conn, $sqlUpdate)) {
      $msg = "Status Changed Successfully!";
    } else {
      $msg = mysqli_error($conn);
    }
  }
} elseif (isset($_POST['post-notice'])) {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $postTitle = $_POST['post-title'];
    $postText = $_POST['post-text'];
    $postDate =  date("Y-m-d");;
    $postBy = $_SESSION["username"];



    $sqlAddPost = "INSERT INTO notice (post_by, date, title, post_details)
        VALUES ('$postBy','$postDate','$postTitle','$postText');";

    if (mysqli_query($conn, $sqlAddPost)) {
      $msg = "Post Successful!";
    } else {
      $msg = mysqli_error($conn);
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
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
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

  <!--Change Password-->


  <!-- Start of admin-->

  <div class="container carousel-container ">
    <div class="container container2 title-border">
      <h1>Admin Panel</h1>
    </div>
    <div class="card-deck justify-content-center w-100">
      <div class="card ">
        <div class="card-body">
          <div class="card-body d-flex justify-content-between">
            <h4 class="card-title">Welcome to your panel</h4>
            <a href="logout.php"><button class="">Sign Out</button></a>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!--Msg Panel-->

  <div class="container container2 title-border">
    <h1 class="notification"><?php echo $msg; ?> </h1>
  </div>
  <div class="container carousel-container ">
    <div class="container container2 title-border">
      <h1>Theaters</h1>
    </div>
    <div class="card-deck justify-content-center w-100">
      <div class="card">

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
          <button id="addTheatreButton" onclick="addTheaterPanel()" class="">Add Theatre</button>

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

          <button class="">Cancel</button></a>
          <button type="submit" name="add-theatre" class="">Confirm</button>

        </div>
      </div>

    </div>


  </form>
</div>
  <!-- Add Theatre hidden-->

















  <!-- Movie Panel-->

  <div class="container carousel-container ">
    <div class="container container2 title-border">
      <h2>Movies</h2>
    </div>
    <div class="card-deck justify-content-center w-100">
      <div class="card">
        <div class="card-body">
          <div class="card-body d-flex justify-content-between">
            <?php
            $conn = OpenCon();
            $result = getResultAll($conn, 'movies');
            if ($result) {
              // it return number of rows in the table. 
              $rowCount = mysqli_num_rows($result);
            }
            if ($rowCount < 1) {
              echo '<div class="container container2 title-border">
                    <h4>No Movies in Database!</h4>
                  </div>';
            } else {
              echo
                '
                  <table class="table table-hover theme-bg">
                    <thead>
                      <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Movie Name</th>
                        <th scope="col">Status</th>
                        
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
                          <td>' . $row["status"] . '</td>
                          
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

  <div class=" container carousel-container ">
    <div class="card-deck justify-content-center w-100">
      <div class="card">
        <br>
        <div class="card-body d-flex justify-content-around">
          <button onclick="showPost()" id="addPost" class="">Add Post</button>
          <button onclick="showSchedule()" id="addScheduleButton" class="">Add Schedule</button>
          <button onclick="showAddMovie()" id="addMovieButton" class="">Add Movie</button>
          <button onclick="showStatus()" id="addStatus" class="">Change Status</button>

        </div>
        <br>
      </div>

    </div>
  </div>

  
  

  <!--Post Start-->
  <div style="display: none;" id="show-post" class=" container carousel-container ">
    <div class="container container2 title-border">
      <h1>Post Something</h1>
    </div>

    <form action="admin.php" method="post">
      <div class="card-deck justify-content-center w-100">
        <div class="card">

          <div class="card-body">
            <br>
            <br>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="">Post Title</span>
              </div>
              <input name="post-title" type="text" class="form-control">

            </div>
            <br>
            <br>
            <div class="form-group">
              <label for="post-text">Write Something</label>
              <textarea name="post-text" id="post-text" class="form-control" rows="30"></textarea>

            </div>
          </div>
          <div class="card-footer">

            <button class="">Cancel</button></a>
            <button type="submit" name="post-notice" class="">Post</button>

          </div>

        </div>


    </form>
  </div>

  <!--Post ENd-->

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
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Status</label>
              </div>
              <select name="status" class="custom-select" id="inputGroupSelect01">
                          
                          <option value="Now Showing">Now Showing</option>
                          <option value="Coming Soon">Coming Soon</option>
                          <option value="Expired">Expired</option>
                        </select>
            </div>
            <br>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="">Banner</span>
              </div>
              <input name="banner" type="text" class="form-control">

            </div>
            <br>
          </div>
          <div class="card-footer">

            <button class="">Cancel</button></a>
            <button type="submit" onclick="showAddMovie();" name="add-movie" class="">Confirm</button>

          </div>
        </div>

      </div>


    </form>
  </div>
  <!-- Add Movie hidden-->

  <!-- Add to status hidden-->
  <div style="display: none;" id="show-status" class=" container carousel-container ">
    <div class="container container2 title-border">
      <h1>Change status of a movie</h1>
    </div>

    <form action="admin.php" method="post">
      <div class="card-deck justify-content-center w-100">
        <div class="card">

          <div class="card-body">
            <br>
            <br>
            <?php
            $conn = OpenCon();
            $sqlMovieCheck = "SELECT * FROM movies";
            $result = mysqli_query($conn, $sqlMovieCheck);
            $rowCount = mysqli_num_rows($result);

            if ($rowCount < 1) {
              echo '<p>No movies yet!</p>';
            } else {
              echo '<div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Movies</label>
                      </div>
                            ';

              echo '<select name="movieNameToChangeStatus" class="custom-select" id="inputGroupSelect01">';
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row["mv_name"] . '">' . $row["mv_name"] . '</option>';
              }




              echo ' </select>
                        <div style="width: 10px"></div>
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="inputGroupSelect01">Status</label>
                        </div>
                        <select name="changedStatus" class="custom-select" id="inputGroupSelect01">
                          
                          <option value="Now Showing">Now Showing</option>
                          <option value="Coming Soon">Coming Soon</option>
                          <option value="Expired">Expired</option>
                        </select>
                      </div>';
            }

            CloseCon($conn);
            ?>






          </div>
          <div class="card-footer">

            <button class="">Cancel</button></a>
            <button type="submit" name="changeStatusBtn" class="">Confirm</button>

          </div>

        </div>


    </form>
  </div>

  <!-- Status hidden-->
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
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="">Start Date</span>
              </div>
              <input name="startDate" type="date" class="form-control" min="<?php echo date("Y-m-d"); ?>" value="<?php echo date("Y-m-d"); ?>">

            </div>
            <br>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="">End Date</span>
              </div>
              <input name="endDate" type="date" class="form-control" min="<?php echo date("Y-m-d"); ?>" value="<?php echo date("Y-m-d"); ?>">

            </div>
            <br>
          </div>
          <div class="card-footer">

            <button class="">Cancel</button></a>
            <button type="submit" onclick="showAddSchedule();" name="add-schedule" class="">Confirm</button>

          </div>
        </div>

      </div>


    </form>
  </div>

  <!-- Add to schedule hidden-->








  
  


 









  <footer>
    <small>©2020. Amber Cineplex | Dhaka, Bangladesh</small>
  </footer>








  <script src="admin.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>