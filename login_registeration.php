
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Faculty Registration</title>
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
                    <form class="login100-form validate-form" method="post" action="login_registerationphp.php">
                        <a class='btn btn-link' href='index.php' style='text-decoration:none;cursor:pointer;'><i class="fa fa-arrow-left" aria-hidden="true"></i>Login</a>
                        <span class="login100-form-title p-b-49" style="font-size:25px;">
                            Faculty Registration Form
                        </span>
                        <p id="error" style="color:red"></p>
                        <div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
                            <span class="label-input100">Name</span>
                            <input class="input100" type="text" name="name" id="name" placeholder="Type your username" onchange="validate()">
                            <p id="errorname" style="color:red;" value=""></p>
                            <span class="focus-input100" data-symbol="&#xf206;"></span>
                        </div>



                        <div class="wrap-input100 validate-input m-b-23" data-validate = "Department name is reauired">
                            <span class="label-input100">Department</span>
                            <select name="department" class="input100 form-control" style="margin-top:5px" id="department">
                                <option value="">Select Department</option>
                                <option value="Computer Engineering">Computer Engineering</option>
                                <option value="Electronics and Communications">Electronics and Communication</option>
                                <option value="Electrical Engineering">Electrical Engineering</option>
                                <option value="Mechanical Engineering">Mechanical Engineering</option>
                                <option value="Civil Engineering">Civil Engineering</option>
                                <option value="Production and Industrial Engineering">Production and Industrial Engineering</option>
                            </select>
                            <span class="focus-input100" data-symbol="&#xf206;"></span>
                        </div>



                        <div class="wrap-input100 validate-input m-b-23" data-validate = "Designation is reauired">
                            <span class="label-input100">Designation</span>
                            <select name="designation" class="input100 form-control" style="margin-top:5px" id="designation">
                                <option value="">Select Designation</option>
                                <option value="Professor">Professor</option>
                                <option value="Associate Professor">Associate Professor</option>
                                <option value="Assistant Professor">Assistant Professor</option>
                                <option value="Others">others</option>
                            </select>
                            <span class="focus-input100" data-symbol="&#xf206;"></span>
                        </div>

                        <div class="wrap-input100 validate-input m-b-23" data-validate = "Email is reauired">
                            <span class="label-input100">E-mail</span>
                            <input class="input100" type="email" name="email" placeholder="Type your Email" id="email" onchange="emailverify()">
                            <span class="focus-input100" data-symbol="&#xf206;"></span>
                        </div>
                        <p id="eemail" style="color:red;"></p>

                        <div class="wrap-input100 validate-input m-b-23" data-validate = "Keyword is required">
                            <span class="label-input100">Keyword(Helps in Forgot Pwd)</span>
                            <input class="input100" type="password" name="kwd" placeholder="Type your Keyword(Min 6 Char)" id="kwd" pattern='.{6,}' title='Atleast 6-digit' >
                            <span class="focus-input100" data-symbol="&#xf206;"></span>
                        </div>


                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn" type="submit">
                                    Send OTP on Email
                                </button>
                            </div>
                        </div>



                    </form>
                </div>
            </div>
        </div>


        <div id="dropDownSelect1"></div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!--===============================================================================================-->

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


        <!--Validation of Form-->
        <script>

                                //Validatioin of Nmae to avoid Dr.mr,mrs etc and truncate these automatically

                                function validate() {
                                    var str = document.getElementById("name").value;
                                    var txt = str.replace(/([dD][Rr][. ]|[Mm][rsSR][sS]*[ .])/, "");
                                    document.getElementById("name").value = txt;
                                }
                                //Validation of email whether it is new or already registred if found registred previously then it will truncate input string in the email input tag

                                function emailverify() {
                                    document.getElementById('eemail').innerHTML = '';
                                    var email = document.getElementById('email').value;
                                    $.post("emailverifyphp.php",
                                            {
                                                email: email

                                            },
                                    function (data, status) {
                                        if (data == 1) {

                                            var str = document.getElementById("email").value;
                                            var txt = str.replace(/[aA-zZ0-9@.]/g, "");
                                            document.getElementById("email").value = txt;
                                            document.getElementById('eemail').innerHTML = 'Email Already Registred!Try New';
                                        }

                                    });
                                }

        </script>
    </body>
</html>