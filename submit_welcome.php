<?php
ob_start();
session_start();
if (empty($_SESSION['id'])) {
    header('location:welcome.php');
}
//Print the success message of form submission.....
if (!empty($_SESSION['flag'])) {
    echo '<script>alert("Submission Complete!");</script>';
    unset($_SESSION['flag']);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css1/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css1/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css1/style.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel='stylesheet' href="css1/sidebarcss.css" rel="stylesheet" type='text/css' >


    </head>
    <!------ Include the above in your HEAD tag ---------->

    <body>
        <div class="fluid-container">

            <div class="row" style="background:black;color:white;"> <h3 align='center'>Research Paper Submission</h3></div>


            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <a href="welcome.php" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-arrow-left" aria-hidden="true"></i>Profile</a>
                    <form method="post" action='r_paper_submission.php' class="">
                        <div class='col-md-12' style='padding-top:20px;'>

                            <div class='col-md-2 form-group validate-input' data-validate = "Year is required" >
                                <span class="">Select Academic Year</span>
                                <select name="year" class="form-control"  id="year" onchange="extract_year()" required>
                                    <option value="">Select Academic Year</option>
                                    <option value="2015-2016">2015-16</option>
                                    <option value="2016-2017">2016-17</option>
                                    <option value="2017-2018">2017-18</option>
                                    <option value="2018-2019">2018-19</option>
                                    <option value="2019-2020">2019-20</option>

                                </select>
                            </div>


                            <div class="col-md-2 form-group validate-input" data-validate = "Authorname is required">
                                <span>Author1</span>
                                <input class="form-control" type="text" name="author1" placeholder="Type Author1" required>

                            </div>
                            <div class="col-md-2 form-group">
                                <span class="">Author2</span>
                                <input class="form-control" type="text" name="author2" placeholder="Type Author2" required>
                            </div>

                            <div class="col-md-3 form-group">
                                <span class="">Author3 & Remaining</span>
                                <input class="form-control" type="text" name="author3" placeholder="Type Author3" required>
                            </div>

                            <div class="form-group col-md-3 validate-input" data-validate = "Name Conference/Journal is required" >
                                <span>Name Journal/Conference</span>
                                <input class="form-control" type="text" name="name" placeholder="Type Name of Conference/Journal" required>

                            </div>
                        </div>
                        <div class='col-md-12' style='padding-top:20px;'>
                            <div class="col-md-3 form-group validate-input" data-validate = "Title is required" >
                                <span class="">Title of the Paper</span>
                                <input class="form-control" type="text" name="title" id='title'  placeholder="Type Paper Title" onchange='title_verify()' required>
                                <p id='error_title' style='color:red;'></p>
                            </div>


                            <div class="form-group col-md-2 validate-input" data-validate = "Pulication is required">
                                <span class="">Type of Publication</span>
                                <select name="type" class=" form-control"   id="public"  onchange="indexing()" required>
                                    <option value="">Select Publication</option>
                                    <option value="International Journal">International Journal</option>
                                    <option value="National Journal">National Journal</option>
                                    <option value="International Conference">International Conference</option>
                                    <option value="National Conference">National Conference</option>
                                    <option value="others">others</option>

                                </select>

                            </div>
                            <div class="col-md-2 form-group validate-input" data-validate = "Indexing is required" id="index">
                                <span class="label-input100">Type of Indexing</span>
                                <select name="index" class="input100 form-control"  required>
                                    <option value="">Select Indexing</option>
                                </select>
                            </div>
                            <div class="col-md-2 validate-input form-group" data-validate = "Month & Year is required" id="date">
                                <span class="label-input100">Select Year&Month</span>
                                <select name="index" class="input100 form-control"  required>
                                    <option value="">Select Year&Month</option>
                                </select>
                            </div>










                            <div class="form-group col-md-1">
                                <span class="">Vol.</span>
                                <input class="form-control" type="text" name="vol" placeholder="Type VolNo.">

                            </div>

                            <div class="form-group col-md-1">
                                <span class="">Issue.</span>
                                <input class="form-control" type="text" name="issue" placeholder="Type IssueNo.">

                            </div>

                            <div class="col-md-1 validate-input form-group" data-validate = "PageNo. is required">
                                <span>PageNo.</span>
                                <input class="form-control" type="text" name="page" placeholder="Type PageNo." required>

                            </div>
                        </div>
                        <div class="col-md-12" align="center" style='padding-top:30px;'>
                            <input type="submit" class="btn btn-info" name='submit' value="submit" style="cursor:pointer">                      
                            <input type="reset" class="btn btn-info" value="Reset" style="cursor:pointer">
                            <input type="submit" class="btn btn-danger" name='submit' value="Submit & Add more" style="cursor:pointer">
                        </div>

                    </form>



                </div>
            </div>
        </div>
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
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
                                    function title_verify() {
                                         document.getElementById('error_title').innerHTML = "";
                                        var title = document.getElementById('title').value;
                                        $.post("title_verify.php",
                                                {
                                                    title: title
                                                },
                                        function (data, status) {
                                            if (data == "1") {
                                                document.getElementById('title').value = "";
                                                document.getElementById('error_title').innerHTML = "Already Submitted Paper";
                                            }
                                        }
                                        );
                                    }

        </script>

    </body>
</html>