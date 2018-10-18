<?php $admincontrol = true; ?>
<?php include("../includes/admin-check.php"); ?>
<?php include("../includes/header.php"); ?>

<?php
    $newContactId = trim($_GET['contactid']);
    $newContactId = filter_var($newContactId, FILTER_SANITIZE_NUMBER_INT);
    if ($newContactId != "")  {
        mysqli_query($con, "DELETE from $database WHERE cid = '$newContactId'") or die(mysqli_error($con));
        header("Location:update.php");
    }
?>
<?php include("../includes/footer.php"); ?>