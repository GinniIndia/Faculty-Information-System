<?php
//Used to destroy data stored in session 

ob_start();
session_start();
$_SESSION['year1']=$_POST['year1'];
$_SESSION['year2']=$_POST['year2'];
?>