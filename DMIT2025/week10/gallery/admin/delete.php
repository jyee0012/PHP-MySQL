<?php $admincontrol = true; ?>
<?php include("../includes/admin-check.php"); ?>
<?php include("../includes/mysql_connect.php"); ?>

<?php
    $newImgId = trim($_GET['imgid']);
    $newImgId = filter_var($newImgId, FILTER_SANITIZE_NUMBER_INT);
    if ($newImgId != "")  {
        echo  "SELECT * from $database WHERE $id = $newImgId";
        $result = mysqli_query($con, "SELECT * from $database WHERE $id = '$newImgId'") or die(mysqli_error($con));
        while ($row = mysqli_fetch_array($result)){
            $filename = $row['jye_filename'];
            $original = $originalsFolder . $filename;
            $thumbnail = $thumbsFolder . $filename;
            $display = $displayFolder . $filename;
        }
        if (unlink($original) &&
            unlink($thumbnail) &&
            unlink($display)) {
            mysqli_query($con, "DELETE from $database WHERE $id = '$newImgId'") or die(mysqli_error($con));
            header("Location:modify.php");
        }
    }
?>