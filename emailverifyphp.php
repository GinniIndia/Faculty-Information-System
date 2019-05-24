<?php
//Script which is called in login_registeration.php page to check on real time from database whether mail is new or already registred...
require_once 'config.php';
$mail=mysqli_real_escape_string($link,$_POST['email']);
$result=  mysqli_query($link,"Select email from user_login where email='$mail'");
$email=  mysqli_fetch_array($result);
$email=$email[0];
if($email){
    echo '1';
}
else {
    echo '0';
}
?>