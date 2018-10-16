<?php
session_start();
//echo $_SESSION['squeezwatgoodbyeotterpopspicyboyfriendshawnwasabithingfeaturinghollisraychaeljayandvocaloidnottomentionomfg'];
$_SESSION['ref'] = basename($_SERVER['PHP_SELF']);
if (!isset($_SESSION['squeezwatgoodbyeotterpopspicyboyfriendshawnwasabithingfeaturinghollisraychaeljayandvocaloidnottomentionomfg'])){
    //echo "Logged in";
    header("Location:login.php");
}
?>