<?php $admincontrol = true; ?>
<?php include("../includes/admin-check.php"); ?>
<?php include("../includes/mysql_connect.php"); ?>

<?php
    $newImgId = trim($_GET['imgid']);
    $newImgId = filter_var($newImgId, FILTER_SANITIZE_NUMBER_INT);
    if ($newImgId != "")  {
        mysqli_query($con, "DELETE from $database WHERE $id = '$newImgId'") or die(mysqli_error($con));
        header("Location:edit.php");
    }
?>