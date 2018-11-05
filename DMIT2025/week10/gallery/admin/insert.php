<?php $admincontrol = true; ?>
<?php include("../includes/admin-check.php"); ?>
<?php include("../includes/header.php"); ?>

<?php
	if (isset($_POST['insert'])){
		$originalsFolder = "galleryfiles/";
		$thumbsFolder = $originalsFolder . "thumbs/";
		$displayFolder = $originalsFolder . "display/";

		$filename = $_FILES['imgfile']['name'];
		$filetype = $_FILES['imgfile']['type'];
		$baseFilesize = $_FILES['imgfile']['size'];
		$kbFilesize = $filesize/1024;
		$mbFilesize = $kbFilesize/1024;
		$displayFilesize = "";

		$title = trim($_POST['title']);
		$descrip = trim($_POST['descrip']);

        $title = filter_var($title, FILTER_SANITIZE_STRING);
        $descrip = filter_var($descrip, FILTER_SANITIZE_STRING);
		$boolValidateOK = true;
		$stringValidate = "";
		$alertString = "success";
		
		if ($mbFilesize > 1){
			$displayFilesize = $mbFilesize . " MB";
		}else if ($kbFilesize > 1){
			$displayFilesize = $kbFilesize . " KB";
		}else{
			$displayFilesize = $baseFilesize . " bytes";
		}

		if ((strlen($title) < 2 || strlen($title) > 50) || $btitle == ""){
            $boolValidateOK = false;
            $titleValidate .= "<p>Please enter a title between 2 and 50 characters</p>";
		}
		// strlen($descrip) < 10 || 
		if (strlen($descrip) > 1000){
            $boolValidateOK = false;
            $descripValidate .= "<p>Please enter a description under 1000 characters</p>";
		}
		

		if ($boolValidateOK){
			
            $sql = "INSERT INTO $database 
			(jye_title, jye_description) VALUES 
			('$title', '$descrip')";

            mysqli_query($con, $sql) or die(mysqli_error($con));
			$stringValidate = "<p>Thank you for posting \"$title\" into the Blog</p>";

			$btitle = "";
			$msg = "";
			
		}else{
			$alertString = "danger";
			$stringValidate = "<p>Please fill in the information below</p>";
		}
	}

?>

<h2>Insert</h2>
<form id="myform" name="myform" class="formwidth" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
		<?php if ($stringValidate){echo "<div class=\"alert alert-$alertString\">" .$stringValidate. "</div>"; } ?>
		<div class="form-group">
			<label for="title">* Title:</label>
			<input type="text" class="form-control" id="title" name="title" value="<?php if ($title) echo $title ?>">
			<?php if ($titleValidate){echo "<div class=\"alert alert-warning\">" .$titleValidate. "</div>"; } ?>
		</div>

		<div class="form-group">
			<label for="descrip">Description:</label>
			<textarea name="descrip" id="descrip" class="form-control textarea-height"><?php if ($descrip) echo $descrip ?></textarea>
			<?php if ($descripValidate){echo "<div class=\"alert alert-warning\">" .$descripValidate. "</div>"; } ?>
		</div>
		
		<div class="form-group">
			<label for="descrip">Description:</label>
			<textarea name="descrip" id="descrip" class="form-control textarea-height"><?php if ($descrip) echo $descrip ?></textarea>
			<?php if ($descripValidate){echo "<div class=\"alert alert-warning\">" .$descripValidate. "</div>"; } ?>
		</div>
		
		<div class="form-group">
			<div class="input-group input-file" name="Fichier1">
				<input type="text" class="form-control" placeholder='Choose a file...' />			
				<span class="input-group-btn">
					<button class="btn btn-default btn-choose" type="button">Choose</button>
				</span>
			</div>
		</div>

		<div class="form-group">
			<label for="insert">&nbsp;</label>
			<input type="submit" name="insert" class="btn btn-info" value="Post">
		</div>



</form>


<?php
	include("../includes/footer.php");
?>