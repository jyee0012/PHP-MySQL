<?php include("includes/header.php"); ?>

<?php
    echo "<script> let previousVal;</script>";
    $newCharid = trim($_GET['charid']);
    $newCharid = filter_var($newCharid, FILTER_SANITIZE_NUMBER_INT);
    if ($newCharid != "")  {
        mysqli_query($con, "DELETE from simpsons WHERE sid = '$newCharid'") or die(mysqli_error($con));
        header("Location:edit.php");
    }
?>
<?php include("includes/footer.php"); ?>