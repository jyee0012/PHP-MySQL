<?php $admincontrol = true; ?>
<?php include("../includes/admin-check.php"); ?>
<?php include("../includes/header.php"); ?>

<?php
	echo "<script> let previousVal;</script>";
    $newImgId = trim($_GET['imgid']);
    $newImgId = filter_var($newImgId, FILTER_SANITIZE_NUMBER_INT);
    if ($newImgId != "")  {
        $newResult = mysqli_query($con, "SELECT * from $database WHERE $id = '$newImgId'") or die(mysqli_error($con));
        while ($fillContact = mysqli_fetch_array($newResult)){
			
			$title = $fillContact['jye_title'];
			$msg = $fillContact['jye_message'];
        }
        echo "<script> previousVal = $newImgId;</script>";
    }
	if (isset($_POST['edit'])){
		$title = trim($_POST['title']);
		$msg = trim($_POST['msg']);
        $imgid = $_POST['imgid'];

        $title = filter_var($title, FILTER_SANITIZE_STRING);
        $msg = filter_var($msg, FILTER_SANITIZE_STRING);
		$boolValidateOK = true;
		$stringValidate = "";
		$alertString = "success";
		
        if (!isset($blogid)){
			$boolValidateOK = false;
			$blogValidate .= "Please Select a Blog Post";
		}
		if ((strlen($title) < 2 || strlen($title) > 50) || $title == ""){
            $boolValidateOK = false;
            $titleValidate .= "<p>Please enter a title between 2 and 50 characters</p>";
		}
		// strlen($msg) < 10 ||
		if (strlen($msg) > 1000){
            $boolValidateOK = false;
            $msgValidate .= "<p>Please enter a message between 10 and 1000 characters</p>";
		}
		

		if ($boolValidateOK){
			
            $sql = "UPDATE $database SET 
			jye_title = '$btitle',
			jye_message = '$msg'
			WHERE $id = '$blogid'";

            mysqli_query($con, $sql) or die(mysqli_error($con));
			$stringValidate = "<p>Thank you for updating the \"$btitle\" Post in the Blog database</p>";

			// $btitle = "";
			// $msg = "";
			
		}else{
			$alertString = "danger";
			$stringValidate = "<p>Please fill in the information below</p>";
		}
	}

?>

<h2>Modify</h2>
<form id="myform" name="myform" class="formwidth" method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
        
        <?php if ($stringValidate){echo "<div class=\"alert alert-$alertString\">" .$stringValidate. "</div>"; } ?>
        
        <div class="form-group">
		    <label for="imgid">Images:</label>
            <select name="imgid" id="imgid" class="form-control select-img">
                <option value="" selected disabled hidden>Please Select an Image</option>
                <?php
                    $result = mysqli_query($con, "SELECT * from $database") or die(mysqli_error($con));
                    while ($row = mysqli_fetch_array($result)){
                        $displayName = $row['jye_title']; 
                        $imgid = $row['bid'];
                        echo "<option value=\"$imgid\""; 
                        if (isset($newImgId) && $newImgId == $imgid) echo "selected=\"selected\"";
                        echo ">$displayName</option>";
                    }
                ?>           
            </select>
			<?php if ($blogValidate){echo "<div class=\"alert alert-warning\">" .$blogValidate. "</div>"; } ?>
        </div>
		
		<div class="form-group">
			<label for="title">* Title:</label>
			<input type="text" class="form-control" id="title" name="title" value="<?php if ($title) echo $title ?>">
			<?php if ($titleValidate){echo "<div class=\"alert alert-warning\">" .$titleValidate. "</div>"; } ?>
		</div>

		<div class="form-group">
			<label for="msg">Message:</label>
			<textarea name="msg" id="myMsg" class="form-control textarea-height"><?php if ($msg) echo $msg ?></textarea>
			<?php if ($msgValidate){echo "<div class=\"alert alert-warning\">" .$msgValidate. "</div>"; } ?>
		</div>
				
		<!-- Emoticon Editor -->
		<div class="form-group">
            <?php massEmoticonPlacer(); ?>
			<!-- <a href="javascript:emoticon(':)')"><img src="../emoticons/icon_smile.gif"></a> -->
		</div>
		<!-- <div class="form-group">
			<label for="date">Date:</label>
			<input type="date" name="date" class="form-control">
		</div> -->
		
		<div class="form-group">
			<!-- <label for="insert">&nbsp;</label> -->
			<input type="submit" name="edit" class="btn btn-info" value="Update">
		    <a href="delete.php?imgid=<?php echo $newImgId; ?>" class="btn btn-info deletebtn">Delete <i class="fas fa-trash-alt"></i></a>
		</div>



</form>

<script>
        document.querySelector('.deletebtn').addEventListener('click', (evt) => {
            <?php if ($newImgId != "") echo "let alertbool = confirm(\"Are you sure you wish to delete $title?\");"; ?>
            if (!alertbool) evt.preventDefault();
        });
        document.querySelector('.select-img').addEventListener('click', (evt) => {
            let options = document.querySelector('.select-img');
            // console.log(options.value);
            if (options.value != "" && Number(options.value) != previousVal) {
                window.location.href = "edit.php?imgid=" + options.value;
            }
        });
</script>

<?php
	include("../includes/footer.php");
?>