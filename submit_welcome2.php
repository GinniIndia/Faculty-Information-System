<?php
ob_start();
session_start();
//Print the success message of form submission.....
if(!empty($_SESSION['flag'])) {
    echo '<script>alert("Submission Complete!");</script>';
    unset($_SESSION['flag']);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Submission</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    <a href="welcome.php" class="btn btn-link" style="text-decoration:none"><i class="fa fa-arrow-left" aria-hidden="true"></i>Profile</a>
                    <form class="login100-form validate-form form-inline" action='r_paper_submission.php' method='post'>

                        <span class="login100-form-title p-b-49" style="font-size:25px;">
                            Research Paper Submission
                        </span>




                        <div class="wrap-input100 validate-input m-b-23" data-validate = "Year is required">
                            <span class="label-input100">Select Academic Year</span>
                            <select name="year" class="input100 form-control" style="margin-top:5px" id="year" onchange="extract_year()">
                                <option value="">Select Academic Year</option>
                                <option value="2015-2016">2015-16</option>
                                <option value="2016-2017">2016-17</option>
                                <option value="2017-2018">2017-18</option>
                                <option value="2018-2019">2018-19</option>
                                <option value="2019-2020">2019-20</option>

                            </select>
                            <span class="focus-input100" data-symbol="&#xf206;"></span>
                        </div>



                        <div class="wrap-input100 validate-input m-b-23" data-validate = "Authorname is required">
                            <span class="label-input100">Author1</span>
                            <input class="input100" type="text" name="author1" placeholder="Type Author1 " >
                            <span class="focus-input100" data-symbol="&#xf206;"></span>
                        </div>

                        <div class="wrap-input100" >
                            <span class="label-input100">Author2</span>
                            <input class="input100" type="text" name="author2" placeholder="Type Author2" >
                            <span class="focus-input100" data-symbol="&#xf206;"></span>
                        </div>

                        <div style="padding-bottom:15px;"></div>
                        <div class="wrap-input100">
                            <span class="label-input100">Author3 & Remaining</span>
                            <input class="input100" type="text" name="author3" placeholder="Type Author3" >
                            <span class="focus-input100" data-symbol="&#xf206;"></span>
                        </div>


                        <div style="padding-bottom:15px;"></div>
                        <div class="wrap-input100 validate-input m-b-23" data-validate = "Title is required">
                            <span class="label-input100">Title</span>
                            <input class="input100" type="text" name="title" placeholder="Type Paper Title">
                            <span class="focus-input100" data-symbol="&#xf206;"></span>
                        </div>

                        <div class="wrap-input100 validate-input m-b-23" data-validate = "Name Conference/Journal is required">
                            <span class="label-input100">Name Journal/Conference</span>
                            <input class="input100" type="text" name="name" placeholder="Type Name of Conference/Journal">
                            <span class="focus-input100" data-symbol="&#xf206;"></span>
                        </div>

                        <div class="wrap-input100 validate-input m-b-23" data-validate = "Pulication is required">
                            <span class="label-input100">Type of Publication</span>
                            <select name="type" class="input100 form-control" style="margin-top:5px"  id="public"  onchange="indexing()">
                                <option value="">Select Publication</option>
                                <option value="International Journal">International Journal</option>
                                <option value="National Journal">National Journal</option>
                                <option value="International Conference">International Conference</option>
                                <option value="National Conference">National Conference</option>
                                <option value="others">others</option>

                            </select>
                            <span class="focus-input100" data-symbol="&#xf206;"></span>
                        </div>

                        <div class="wrap-input100 validate-input m-b-23" data-validate = "Indexing is required" id="index">

                        </div>




                        <div class="wrap-input100 validate-input m-b-23" data-validate = "Month & Year is required" id="date">

                        </div>

                        <div class="wrap-input100">
                            <span class="label-input100">VolNo.</span>
                            <input class="input100" type="text" name="vol" placeholder="Type VolNo.">
                            <span class="focus-input100" data-symbol="&#xf206;"></span>
                        </div>

                        <div class="wrap-input100">
                            <span class="label-input100">IssueNo.</span>
                            <input class="input100" type="text" name="issue" placeholder="Type IssueNo.">
                            <span class="focus-input100" data-symbol="&#xf206;"></span>
                        </div>

                        <div class="wrap-input100 validate-input m-b-23" data-validate = "PageNo. is required">
                            <span class="label-input100">PageNo.</span>
                            <input class="input100" type="text" name="page" placeholder="Type PageNo.">
                            <span class="focus-input100" data-symbol="&#xf206;"></span>
                        </div>

                        <div class="container-login20-form-btn" align="center">
                            <input type="submit" class="btn btn-info" name='submit' value="submit" style="cursor:pointer">                      
                            <input type="reset" class="btn btn-info" value="Reset" style="cursor:pointer">
                            <input type="submit" class="btn btn-danger" name='submit' value="Submit & Add more" style="cursor:pointer">
                        </div>
                    </form>
                </div>
            </div>
        </div>


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
                                function extract_year() {
                                    var year = document.getElementById('year').value;
                                    var arr = year.split('-');
                                    $.post("month&yearphp.php",
                                            {
                                                year1: arr[0],
                                                year2: arr[1]
                                            },
                                    function (data, status) {
                                        $("#date").load("month&year.php");
                                    }
                                    );
                                }

                                function indexing() {

                                    var publication = document.getElementById('public').value;
                                    var arr = publication.split(" ");
                                    if (arr[0] == 'others' || arr[1] == 'Conference') {
                                        $("#index").load("index_conf.php");
                                    }
                                    else {
                                        $("#index").load("index_journal.php");
                                    }
                                }

        </script>


    </body>
</html>