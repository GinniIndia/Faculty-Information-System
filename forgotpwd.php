<?php
include 'config.php';
//Build a connection to  database
?>





<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Password Reset System</title>
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
                    <a class='btn btn-link' href='index.php' style='text-decoration:none;cursor:pointer;'><i class="fa fa-arrow-left" aria-hidden="true"></i>Login</a>
                    <form class="login100-form validate-form" method="post">
                         
                        <span class="login100-form-title p-b-49" style="font-size:25px;">
                            Reset Password
                        </span>
                        <p id="error" style="color:red;"></p>
                        <div class="wrap-input100 validate-input m-b-23" data-validate = "Username is required">
                            <span class="label-input100">Username</span>
                            <input class="input100" type="email" name="email" placeholder="Type your username">
                            <span class="focus-input100" data-symbol="&#xf206;"></span>
                        </div>
                       
                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <span class="label-input100">New_Password</span>
                            <input class="input100" type="password" name="npwd" id='npwd' placeholder="Type your password" pattern='.{6,}' title='Atleast 6-digit'>
                            <span class="focus-input100" data-symbol="&#xf190;"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <span class="label-input100">Confirm_Password</span>
                            <input class="input100" type="password" name="cnpwd" id='cnpwd' pattern='.{6,}' title='Atleast 6-digit' placeholder="Type your Confirm-password" onchange="validate()">
                            <span class="focus-input100" data-symbol="&#xf190;"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Keyword is required">
                            <span class="label-input100">Keyword</span>
                            <input class="input100" type="password" name="kwd" placeholder="Type your Keyword">
                            <span class="focus-input100" data-symbol="&#xf190;"></span>
                        </div>



                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn" type="submit" name="submit">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>


        <div id="dropDownSelect1"></div>
        <?php
        //Checking Validating of input login and password and written @ bottom because script tag is not working when palaced @ top
        //Script for Reseting and valaditing with database the entred data
        include 'function.php';
        if (isset($_POST['submit'])) {
            $email = mysqli_real_escape_string($link, $_POST['email']);
            $npwd = mysqli_real_escape_string($link, $_POST['npwd']);
            $cnpwd = mysqli_real_escape_string($link, $_POST['cnpwd']);
            $kwd = mysqli_real_escape_string($link, $_POST['kwd']);
            $npwd = my_simple_crypt( $npwd, 'e' );
            $kwd = my_simple_crypt($kwd,'e');
            
          
            
            $result = mysqli_query($link, "select id from user_login where email='$email' and kwd='$kwd'");

            if (mysqli_affected_rows($link)) {

                $result = mysqli_query($link, "update user_login set password='$npwd', date_c_pwd=NOW() where email='$email'");
                if (mysqli_affected_rows($link)) {
                    echo '<script>document.getElementById("error").innerHTML="Updated Sucessfully";</script>';
                }
            }
            else {
                echo '<script>document.getElementById("error").innerHTML="Wrong Email Address or Keyword";</script>';
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

        <script>
                                //Validate whether entred password and confirm-pwd are same or not...
                                function validate() {
                                    document.getElementById('error').innerHTML = '';
                                    var npwd = document.getElementById('npwd').value;
                                    var cnpwd = document.getElementById('cnpwd').value;
                                    if (npwd != cnpwd) {
                                        document.getElementById('error').innerHTML = 'Mismatch Password';
                                        document.getElementById('npwd').value = "";
                                        document.getElementById('cnpwd').value = "";
                                    }
                                }


        </script>


    </body>
</html>