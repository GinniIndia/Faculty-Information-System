<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Faculty Registeration</title>
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
                    <form class="login100-form validate-form" >

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
                            <input class="input100" type="text" name="designation" placeholder="Type your Designation" id="designation">
                            <span class="focus-input100" data-symbol="&#xf206;"></span>
                        </div>

                        <div class="wrap-input100 validate-input m-b-23" data-validate = "Email is reauired">
                            <span class="label-input100">E-mail</span>
                            <input class="input100" type="email" name="email" placeholder="Type your Email" id="email">
                            <span class="focus-input100" data-symbol="&#xf206;"></span>
                        </div>





                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn"  onclick="submision()">
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
                                    function validate() {
                                        document.getElementById('errorname').innerHTML = '';
                                        var name = document.getElementById('name').value;
                                        var patt1 = /([dD][Rr][. ]|[Mm][rs][s]*[ .])/g;
                                        var result = name.match(patt1);
                                        if (result)
                                        {
                                            document.getElementById('errorname').innerHTML = "Dr.,Mr.,Mrs.,Ms. are not allowed";
                                        }

                                    }


                                    function submision() {
                                       alert('inside submision');
                                        document.getElementById('error').innerHTML = "";
                                        var error = document.getElementById('errorname').value;
                                        var flag = 0;
                                            if(error=="Dr.,Mr.,Mrs.,Ms. are not allowed")
                                                flag=1;
                                            
                                            
        
                                            var name = document.getElementById('name').value;
                                            var dep = document.getElementById('department').value;
                                            var des = document.getElementById('designation').value;
                                            var email = document.getElementById('email').value;
                                            if (name == "" || dep == "" || des == "" || email == "") {
                                                document.getElementById('error').innerHTML = "All the Fields are required*";
                                                flag = 1;
                                            }
                                      
                                      alert(flag);
                                        if (flag == 0) {
                                           alert('inside');
                                            $.post("login_registerationphp.php",
                                                    {
                                                        name: name,
                                                        department: dep,
                                                        designation: des,
                                                        email: email
                                                    },
                                            function (data, status) {
                                               
                                               window.location='otp_verify.php';
                                            });
                                            
                                           
                                        }
                                    }

        </script>
    </body>
</html>