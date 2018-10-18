<?php
session_start();
//echo $_SESSION['squeezwatgoodbyeotterpopspicyboyfriendshawnwasabithingfeaturinghollisraychaeljayandvocaloidnottomentionomfg'];
$thisRef = basename($_SERVER['PHP_SELF']);
$loggedin = true;
if (isset($_GET['contactid'])){
    $newContactId = trim($_GET['contactid']);
    $newContactId = filter_var($newContactId, FILTER_SANITIZE_NUMBER_INT);
    $newRef = "?contactid=$newContactId";
    $thisRef .= $newRef;
}
$_SESSION['ref'] = $thisRef;
if (!isset($_SESSION['squeezwatgoodbyeotterpopspicyboyfriendshawnwasabithingfeaturinghollisraychaeljayandvocaloidnottomentionomfg'])){
    //echo "Logged in";
    $loggedin = false;
    if ($admincontrol) {
        header("Location:login.php");
    }
}
?>