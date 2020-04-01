<?php
session_start();

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
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="login.php" method="post">
                <h1>Create Account</h1>

                <span>create an account with username and password</span>
                <input name="new-username" type="text" placeholder="Username" required />
                <input name="new-password" type="password" placeholder="Password" required />
                <input name="new-confirm-password" type="password" placeholder="Confirm Password" required />
                <button name="sign-up" type="submit">Edit Profile</button>

            </form>
        </div>
        <div class="form-container sign-in-container justify-content-left">
            <form action="login.php" method="post">
                <h4 class="card-title">Username : <?php echo $_SESSION["username"]; ?></h4>
                <h5 class="card-text-2">Full name : Nowshin Sabrin</h5>
                <h5 class="card-text-2">Email : nowshin@gmail.com</h5>
                <h5 class="card-text-2">Phone : 01303495445</h5>
                <h5 class="card-text-2">Date of Birth : 1997-12-24</h5>
                <h5 class="card-text-2">Gender : Female</h5>
                <button name="sign-in" type="submit">Sign Out</button>

            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Hey there!</h1>
                    <p>Want to see your personal information?</p>
                    <button class="ghost" id="signIn">Profile Info</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hey there!</h1>
                    <p>Want to edit your profile?</p>
                    <button class="ghost" id="signUp">Edit Profile</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <small>©2020. Amber Cineplex | Dhaka, Bangladesh</small>
    </footer>



    <script src="login.js"></script>
</body>

</html>