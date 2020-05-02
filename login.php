<?php

    include 'config.php';
    
    session_start();
    $reqUsername = $reqPassword = "";
    $registrationUsernameInDB=$registrationUsername=$registrationPassword=$registrationConfirmPassword="";

    $error ="";

    if (isset($_POST['sign-in'])) 
    {
        $conn = OpenCon();
        if($_SERVER["REQUEST_METHOD"] == "POST"){
	
            if(!empty($_POST['username'])){
                $reqUsername = mysqli_real_escape_string($conn, $_POST['username']);
            }
            if(!empty($_POST['password'])){
                $reqPassword = mysqli_real_escape_string($conn, $_POST['password']);
            }
        
            $sqlUserCheck = "SELECT username, password, type FROM users WHERE username = '$reqUsername'";
            $result = mysqli_query($conn, $sqlUserCheck);
            $rowCount = "";
            
            if ($result) 
            { 
                // it return number of rows in the table. 
                $rowCount = mysqli_num_rows($result); 
            } 
    
    
        
            if($rowCount < 1){
                $error = "User does not exist!";
            }
            else{
                while($row = mysqli_fetch_assoc($result)){
                    $reqPasswordInDB = $row['password'];
        
                    if(password_verify($reqPassword, $reqPasswordInDB)){
                        

                        if($row['type']==='admin'){
                            $_SESSION['username'] = $reqUsername;
                            header("Location: admin.php");
                        }
                        else{
                            $_SESSION['username'] = $reqUsername;
                            header("Location: index.php");
                        }

                        
                    }
                    else{
                        $error = "Wrong Password!";
                    }
                }
            }
        }
        CloseCon($conn);
    }
//signup operations
    elseif (isset($_POST['sign-up'])) 
    {
        $conn = OpenCon();
        
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(!empty($_POST['new-username'])){
            $registrationUsername = mysqli_real_escape_string($conn, $_POST['new-username']);
            }
            if(!empty($_POST['new-password'])){
            $registrationPassword = mysqli_real_escape_string($conn, $_POST['new-password']);
            }
            if(!empty($_POST['new-confirm-password'])){
            $registrationConfirmPassword = mysqli_real_escape_string($conn, $_POST['new-confirm-password']);
            }
            

            $sqlUserCheck = "SELECT username FROM users WHERE username = '$registrationUsername'";
            $result = mysqli_query($conn, $sqlUserCheck);

            while($row = mysqli_fetch_assoc($result)){
            $registrationUsernameInDB = $row['username'];
            }

            if($registrationPassword !== $registrationConfirmPassword){
                $error = "Incorrect Password!";
            }
            if($registrationUsernameInDB == $registrationUsername){
                $error = "UserName already exists!";
            }

            else{
            $param_password = password_hash($registrationPassword, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, password,type)
                    VALUES ('$registrationUsername','$param_password','customer');";
            $today =date("Y-m-d"); 
            $sqlInfo = "INSERT INTO user_info (username,full_name,email,phone,dob,gender)
                    VALUES ('$registrationUsername','$registrationUsername','','','$today','');";        
            mysqli_query($conn, $sql);
            mysqli_query($conn, $sqlInfo);
            $error="Signed Up Successfully";
            }
        }
        CloseCon($conn);
    }


    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">
    
    <title>Amber Cineplex | Log In</title>
</head>
<body >
        
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="login.php" method="post">
                <h1>Create Account</h1>
                
                <span>create an account with username and password</span>
                <input name="new-username" type="text" value="<?php echo $registrationUsername;?>" placeholder="Username" required />
                <input name="new-password" type="password" placeholder="Password" required/>
                <input name="new-confirm-password" type="password" placeholder="Confirm Password" required />
                <button name="sign-up" type="submit">Sign Up</button>
                <h4><?php echo $error; ?></h4>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="login.php" method="post">
                <h1>Sign in</h1>
                
                <span>using your account</span>
                <input type="text" name="username"  value="<?php echo $reqUsername;?>" placeholder="Username" required />
                <input type="password" name="password" placeholder="Password" required />
                <a href="#">Forgot your password?</a>
                <button name="sign-in" type="submit">Sign In</button>
                <h4><?php echo $error; ?></h4>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button  class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
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