<?php include("../includes/admin-check.php"); ?>

<?php
$baseurl = BASE_URL;
session_unset();
session_destroy();
header("Location:../index.php");
exit();
?>