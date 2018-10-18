<?php $admincontrol = true; ?>
<?php include("../includes/admin-check.php"); ?>

<?php
session_unset();
session_destroy();
header("Location:../index.php");
exit();
?>