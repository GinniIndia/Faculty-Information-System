<?php
ob_start();
session_start();
//this is used to redirect to welcome page for users who's session is not expired or who donot logout
if (!empty($_SESSION['id'])) {
    header('Location:welcome.php');
}
include 'config.php';
?>





<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Faculty Profile System</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <!--===============================================================================================-->
    </head>
    <body>

        <div class="limiter">
            <div class="container-login100" style="background-image: url('images/bg-07.jpg');" class="img-responsive">
                <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                    <form class="login100-form validate-form" method="post">

                        <span class="login100-form-title p-b-49" style="font-size:25px;">
                            Faculty Profile Information System
                        </span>
                        <p id="lerror" style="color:red;"></p>
                        <div class="wrap-input100 validate-input m-b-23" data-validate = "Username is required">
                            <span class="label-input100">Username</span>
                            <input class="input100" type="email" name="email" placeholder="Type your username">
                            <span class="focus-input100" data-symbol="&#xf206;"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <span class="label-input100">Password</span>
                            <input class="input100" type="password" name="pwd" placeholder="Type your password">
                            <span class="focus-input100" data-symbol="&#xf190;"></span>
                        </div>



                        <div class="container-login100-form-btn" style="padding-top:25px;">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn" type="submit" name="submit">
                                    Login
                                </button>
                            </div>
                        </div>

                        <div class="text-right p-t-8 p-b-31">
                            <a href="forgotpwd.php">
                                Forgot password?
                            </a>
                        </div>
                        <!--
                                                                <div class="txt1 text-center p-t-54 p-b-20">
                                                                        <span>
                                                                                Or Sign Up Using
                                                                        </span>
                                                                </div>
                        
                                                                <div class="flex-c-m">
                                                                        <a href="#" class="login100-social-item bg1">
                                                                                <i class="fa fa-facebook"></i>
                                                                        </a>
                        
                                                                        <a href="#" class="login100-social-item bg2">
                                                                                <i class="fa fa-twitter"></i>
                                                                        </a>
                        
                                                                        <a href="#" class="login100-social-item bg3">
                                                                                <i class="fa fa-google"></i>
                                                                        </a>
                                                                </div>
                        !-->
                        <div align='center' style='padding-top:20px;'>
                            <a href="login_registeration.php" class="txt2" >
                                Create Your Account
                            </a>
                            <a href='admin/' style='display:block' target='_blank'>Admin</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div id="dropDownSelect1"></div>
        <div class='row' style='display:none;'></div>
        <?php
        //Checking Validating of input login and password and written @ bottom because script tag is not working when palaced @ top
        
        
        include "function.php";
        if (isset($_POST['submit'])) {
            $email = mysqli_real_escape_string($link, $_POST['email']);
            $pwd = mysqli_real_escape_string($link, $_POST['pwd']);
            $pwd = my_simple_crypt($pwd, 'e');
            $result = mysqli_query($link, "select id from user_login where email='$email' and password='$pwd'");
            if (mysqli_affected_rows($link)) {
                $row = mysqli_fetch_array($result);
                $_SESSION['id'] = $row[0];
               
                mysqli_query($link, "update user_login set date_of_last_access=NOW() WHERE ID='$row[0]'");
                header('location:welcome.php');
            } else {

                echo '<script>document.getElementById("lerror").innerHTML="Invalid User";</script>';
            }
        }
        ?>
        <!--===============================================================================================-->
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/animsition/js/animsition.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/bootstrap/js/popper.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/daterangepicker/moment.min.js"></script>
        <script src="vendor/daterangepicker/daterangepicker.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/countdowntime/countdowntime.js"></script>
        <!--===============================================================================================-->
        <script src="js/main.js"></script>

    </body>
</html>