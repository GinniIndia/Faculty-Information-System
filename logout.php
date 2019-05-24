<?php
ob_start();
session_start();
//Reset OAuth access token

//Destroy entire session
session_destroy();
ob_end_flush();

//Redirect to homepage
header("Location:index.php");
?>