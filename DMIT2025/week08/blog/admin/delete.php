<?php $admincontrol = true; ?>
<?php include("../includes/admin-check.php"); ?>
<?php include("../includes/mysql_connect.php"); ?>

<?php
    $newBlogId = trim($_GET['blogid']);
    $newBlogId = filter_var($newBlogId, FILTER_SANITIZE_NUMBER_INT);
    if ($newBlogId != "")  {
        mysqli_query($con, "DELETE from $database WHERE $id = '$newBlogId'") or die(mysqli_error($con));
        header("Location:edit.php");
    }
?>