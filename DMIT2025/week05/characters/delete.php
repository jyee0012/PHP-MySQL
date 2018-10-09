<?php include("includes/header.php"); ?>

<?php
    $newCharid = trim($_GET['charid']);
    $newCharid = filter_var($newCharid, FILTER_SANITIZE_NUMBER_INT);
    if ($newCharid != "")  {
        mysqli_query($con, "DELETE from $database WHERE fcid = '$newCharid'") or die(mysqli_error($con));
        header("Location:update.php");
    }
?>
<?php include("includes/footer.php"); ?>