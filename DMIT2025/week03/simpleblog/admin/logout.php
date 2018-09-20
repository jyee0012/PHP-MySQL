<?php
session_start();
if (!isset($_SESSION['squeezwatgoodbyeotterpopspicyboyfriendshawnwasabithingfeaturinghollisraychaeljayandvocaloidnottomentionomfg'])){
    //echo "Logged in";
    header("Location:login.php");
}
session_unset();
session_destroy();
header("Location:login.php");
exit();
?>