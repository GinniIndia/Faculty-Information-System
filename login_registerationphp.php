<?php
ob_start();
session_start();
//Storing globally info of first step of form to store in DB later

require_once 'config.php';
$_SESSION['name']=mysqli_real_escape_string($link,$_POST['name']);
$_SESSION['dep']=mysqli_real_escape_string($link,$_POST['department']);
$_SESSION['des']=mysqli_real_escape_string($link,$_POST['designation']);
$_SESSION['email']=mysqli_real_escape_string($link,$_POST['email']);
$_SESSION['kwd']=mysqli_real_escape_string($link,$_POST['kwd']);
$_SESSION['random']=rand(100000,999999);
$mail=$_SESSION['email'];
$ran=$_SESSION['random'];
mail($mail,"OTP for Registration @ Faculty Profile Information System",'Your one time OTP is:' . $ran);
header('location:otp_verify.php');
?>