<?php
session_start();
//echo $_SESSION['squeezwatgoodbyeotterpopspicyboyfriendshawnwasabithingfeaturinghollisraychaeljayandvocaloidnottomentionomfg'];
$thisRef = basename($_SERVER['PHP_SELF']);
if (strpos($_SERVER['PHP_SELF'], 'admin') !== false){
    $thisRef = "admin/" . $thisRef;
}
$loggedin = true;
if (isset($_GET['blogid'])){
    $newBlogId = trim($_GET['blogid']);
    $newBlogId = filter_var($newBlogId, FILTER_SANITIZE_NUMBER_INT);
    $newRef = "?blogid=$newBlogId";
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
// echo = basename(__DIR__); // includes
// echo __DIR__ . "<br>";  // /home/jyee12/public_html/dmit2025/week07/contacts/includes
// echo dirname($_SERVER['PHP_SELF']); // /dmit2025/week07/contacts/admin
?>