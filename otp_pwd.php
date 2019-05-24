<?php
ob_start();
session_start();
//Checking Session is to avoid direct access of this page without going through registration form first
require_once 'config.php';
if (empty($_SESSION['email'])) {
    header('location:login_registeration.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Password Set</title>
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
                    <form class="login100-form validate-form" method='post'>

                        <span class="login100-form-title p-b-49" style="font-size:25px;">
                            Password Set
                        </span>

                        <p align="center"><b>Hey,<?= $_SESSION['email']; ?></b></p>
                        <div class="wrap-input100 validate-input m-b-23" data-validate = "Pwd is required">
                            <span class="label-input100">Password</span>
                            <input class="input100" type="password" name="pwd" placeholder="Enter Your Pwd" id="pwd"  pattern='.{6,}' title='Atleast 6-digit'>
                            <span class="focus-input100" data-symbol="&#xf206;"></span>
                        </div>

                        <div class="wrap-input100 validate-input m-b-23" data-validate = "Confirm-Pwd is required">
                            <span class="label-input100">Confirm-Password</span>
                            <input class="input100" type="password" name="pwdd" placeholder="Enter Your Confirm-Pwd" id="pwdd" onchange="validate()"  pattern='.{6,}' title='Atleast 6-digit'>
                            <span class="focus-input100" data-symbol="&#xf206;"></span>
                        </div>

                        <p id="error" style="color:red;"></p>

                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn" type='submit' name="submit">
                                    Registration
                                </button>
                            </div>
                        </div>



                    </form>
                </div>
            </div>
        </div>
        <?php
        //Checking whether password and confirm-password are equal or not backend validation
        //written @ bottom because script echo is not woriking when placed @ top
        if(isset($_POST['submit'])) {
        $pwd=  mysqli_real_escape_string($link,$_POST['pwd']);
        $cpwd=mysqli_real_escape_string($link,$_POST['pwdd']);
        if($pwd!=$cpwd) {
        echo '<script>document.getElementById("error").innerHTML = "Mismatch Password";</script>';
        
        }
        else 
        {
        $_SESSION['pwd']=$pwd;

        header('location:pwdphp.php');
        exit();
        }
        }

        ?>

        <div id="dropDownSelect1"></div>

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
        
        <script>
            
            //checking whether password and confirm-password are equal or not frontend validation
            
            
            function validate() {
                document.getElementById('error').innerHTML = "";
                var pwd = document.getElementById('pwd').value;
                var cpwd = document.getElementById('pwdd').value;
                if (pwd != cpwd) {
                    document.getElementById('error').innerHTML = "Mismatch Password";
                    document.getElementById('pwd').value="";
                    document.getElementById('pwdd').value="";
                }
            }
        </script>
    </body>
</html>