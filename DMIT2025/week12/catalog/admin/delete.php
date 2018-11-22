<?php $admincontrol = true; ?>
<?php include("../includes/admin-check.php"); ?>
<?php include("../includes/functions.php"); ?>
<?php include("../includes/mysql_connect.php"); ?>

<?php
    $newAnimId = trim($_GET['animid']);
    $newAnimId = filter_var($newAnimId, FILTER_SANITIZE_NUMBER_INT);
    $canDelete = false;
    if ($newAnimId != "")  {
        echo  "SELECT * from $database WHERE $id = $newAnimId";
        $result = mysqli_query($con, "SELECT * from $database WHERE $id = '$newAnimId'") or die(mysqli_error($con));
        while ($row = mysqli_fetch_array($result)){
            $filename = $row['jye_series_image'];
        }
        $canDelete = check_old_images($filename);
        if ($canDelete) {
            mysqli_query($con, "DELETE from $database WHERE $id = '$newAnimId'") or die(mysqli_error($con));
            header("Location:update.php");
        }
    }
?>