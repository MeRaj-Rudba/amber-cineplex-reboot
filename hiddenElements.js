
function changePasswordPanel() {

  console.log('Change Password is clicked');
  document.getElementById("changePasswordContainer").innerHTML = `
  <div  id='change-panel' class='container carousel-container '>
    <div class='container container2 title-border'>
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
            <button class="">Cancel</button>
            <button type="submit" name="change-password" class="">Confirm</button>

          </div>
        </div>

      </div>


    </form>
  </div>

  `;
}
function addTheaterPanelShow() {
  document.getElementById("addTheaterPanel").innerHTML = `
  <div  id="change-panel" class="change-password-panel container carousel-container ">
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
  `;

}
function showPostPanel() {
  document.getElementById('hiddenElementsCarrier').innerHTML = `
  <div  id="show-post" class=" container carousel-container ">
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
`;
}
function showSchedule() {
  document.getElementById('hiddenElementsCarrier').innerHTML = `<div  id="add-schedule" class=" container carousel-container ">
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
`;

}
function showAddMovie() {
  document.getElementById('hiddenElementsCarrier').innerHTML = `
  <div  id="add-movie" class=" container carousel-container ">
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
              <select class="custom-select" id="inputGroupSelect01">
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
  </div>`;

}
function showStatus() {
  document.getElementById('hiddenElementsCarrier').innerHTML = `
  <div  id="show-status" class=" container carousel-container ">
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
  </div>`;

}