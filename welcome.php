<?php
ob_start();
session_start();
//this is used to redirect to login for users who's session is not activate or who donot login
if (empty($_SESSION['id'])) {
    header('Location:index.php');
    exit();
}

//These are simply used to print submit value of the resaeach paper details ....Publications->submit.....
if(!empty($_SESSION['flag'])) {
    echo '<script>alert("Submission Complete");</script>';
    unset($_SESSION['flag']);
}

//These values are used in Publication->view when we select year for the view of research papers and these are destroyed here because these are requiered by the pdf fiiles ..
if(!empty($_SESSION['year1']) && !empty($_SESSION['year2'])) {
     unset($_SESSION['year1']);
      unset($_SESSION['year2']);
}
require_once 'config.php';
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
    <body  style="background-image: url('images/bg-19.jpeg');" class="img-responsive">


        <!--start Sidebar-->

        <div id="wrapper" >
            <div class="overlay"></div>

            <!-- Sidebar -->
            <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
                <ul class="nav sidebar-nav">
                    <li class="sidebar-brand">
                        <a href="#">
                            NIT KKR Portal
                        </a>
                    </li>
                    <li>
                        <a href="#">Personal Details</a>
                    </li>
                    <li>
                        <a href="#">Phds Guided</a>
                    </li>
                    <li>
                        <a href="#">Books</a>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Publications<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="dropdown-header">Dropdown heading</li>
                            <li><a href="submit_welcome.php">Submit</a></li>
                            <li><a href="view_welcome.php">View</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="#">Projects</a>
                    </li>
                    <li>
                        <a href="#">Awards</a>
                    </li>
                    <li>
                        <a href="#">Others</a>
                    </li>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>

                </ul>
            </nav>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper" >
                <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                    <span class="hamb-top" style='background:white'></span>
                    <span class="hamb-middle"style='background:white;'></span>
                    <span class="hamb-bottom" style='background:white;'></span>
                </button>

            </div>
            <!-- /#page-content-wrapper -->
        </div>

        <!-- /#wrapper -->

        <?php
        $id = $_SESSION['id'];
        $result = mysqli_query($link, "select name from user_details where id='$id'");
        $data = mysqli_fetch_array($result);
        $name = $data[0];
        ?>
        <!--end sidebar-->
        <div class="row" style="background:white;color:black"align="center">
            <h4><i class="fa fa-book" aria-hidden="true" style="padding-right:30px;"></i>Welcome <?= $name; ?><i class="fa fa-book" aria-hidden="true" style="padding-left:30px;"></i></h4>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script src="js1/bootstrap.min.js"></script>
        <script src="js1/sidebarjs.js"></script>
    </body>
</html>