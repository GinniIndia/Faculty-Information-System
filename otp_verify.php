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
        <title>OTP Verification</title>
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
                            OTP Verification
                        </span>

                        <p id="error" style="color:red;" align="center"></p>
                        
                        <p id="email_error" style="color:red;"></p>
                        <div class="wrap-input100 validate-input m-b-23" data-validate = "Email is required">
                            <span class="label-input100">E-mail</span>
                            <input class="input100" type="email" name="email" placeholder="Type your Email" id='email' onchange="validate_email()">
                            <span class="focus-input100" data-symbol="&#xf206;"></span>
                        </div>
                        
                        <p id="otp_error" style="color:red;"></p>
                        <div class="wrap-input100 validate-input m-b-23" data-validate = "OTP is required">
                            <span class="label-input100">OTP</span>
                            <input class="input100" type="text" name="otp" placeholder="Enter Your OTP" id='otp' onchange="validate_otp()">
                            <span class="focus-input100" data-symbol="&#xf206;"></span>

                        </div>
                        <input type="text" value="<?= $_SESSION['random']; ?>">


                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn" type='submit' name="submit">
                                    Submit
                                </button>
                            </div>
                        </div>



                    </form>
                </div>
            </div>
        </div>


        <div id="dropDownSelect1"></div>


        <?php
        //This is written at bottom because of <script> tag donot work if placed above form as done experimently ,reason i donot know
        if (isset($_POST['submit'])) {
            $otp = mysqli_real_escape_string($link, $_POST['otp']);
            $email = mysqli_real_escape_string($link, $_POST['email']);
            if ($otp != $_SESSION['random'] || $email != $_SESSION['email']) {
                echo '<script>document.getElementById("error").innerHTML="Invalid OTP or Email";</script>';
            }
            /*
              else if ($otp != $_SESSION['random']) {
              echo '<script>document.getElementById("error").innerHTML="Invalid OTP";</script>';
              echo '<script>document.getElementById("email").value=' . '<?= $email;?>' . ';</script>';
              } else if ($email != $_SESSION['email']) {
              echo '<script>document.getElementById("error").innerHTML="Invalid Email";</script>';
              echo '<script>document.getElementById("otp").value="<?= $otp;?>";</script>';

              } */ else {
                header('location:otp_pwd.php');
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
                            function validate_email() {
                                    document.getElementById('error').innerHTML = "";
                                    document.getElementById('email_error').innerHTML = "";
                                    var email = document.getElementById('email').value;
                                    var org_email = "<?= $_SESSION['email']; ?>";
                                    
                                    if (email != org_email) {
                                        document.getElementById('email').value = "";
                                        document.getElementById('email_error').innerHTML = "Invalid Email";
                                    }
                                }

                                function validate_otp() {
                                    document.getElementById('otp_error').innerHTML = "";
                                    var otp = document.getElementById('otp').value;
                                    var org_otp = "<?= $_SESSION['random']; ?>";
                                    if (otp != org_otp) {
                                        document.getElementById('otp').value = "";
                                        document.getElementById('otp_error').innerHTML = "Invalid OTP";
                                    }
                                }

        </script>


    </body>
</html>