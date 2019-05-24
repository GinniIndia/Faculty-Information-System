<?php
ob_start();
session_start();
//Reset OAuth access token
//Used to destroy data stored in session 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Faculty Registration</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css1/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css1/bootstrap.css">

        <!--===============================================================================================-->


    </head>
    <body  style="background-image: url('images/bg-16.jpeg');" class="img-responsive">
        <div class="fluid-container" >
            <div class='row' align='center' style='padding-top:280px;color:gray;'>
                <h4 '>Hey,<?= $_SESSION['name'];?></h4>
                <h4>Registred Successfully,Enjoy this Portal</h4>
                <a href='index.php' class='btn btn-info' style='text-decoration:none;cursor:pointer;'>Login</a>
            

        </div>

        


<?php
//Destroy entire session
session_destroy();
ob_end_flush();
?>

    </body>
</html>