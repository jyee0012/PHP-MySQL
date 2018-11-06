<?php $admincontrol = true; ?>
<?php include("../includes/admin-check.php"); ?>
<?php include("../includes/header.php"); ?>

<?php
	if (isset($_POST['insert'])){
		$originalsFolder = "../galleryfiles/";
		$thumbsFolder = $originalsFolder . "thumbs/";
		$displayFolder = $originalsFolder . "display/";

		$filename = $_FILES['imgfile']['name'];
		$filetempname = $_FILES['imgfile']['tmp_name'];
		$filetype = $_FILES['imgfile']['type'];
		$baseFilesize = $_FILES['imgfile']['size'];
		$fileError = $_FILES['imgfile']['error'];
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

		if ((strlen($title) < 2 || strlen($title) > 50) || $title == ""){
            $boolValidateOK = false;
            $titleValidate .= "<p>Please enter a title between 2 and 50 characters</p>";
		}
		// strlen($descrip) < 10 || 
		if (strlen($descrip) > 1000){
            $boolValidateOK = false;
            $descripValidate .= "<p>Please enter a description under 1000 characters</p>";
		}
		
		if ($mbFilesize > 5){
            $boolValidateOK = false;
			$fileValidate = "File size is too large, it cannot exceed 5MB";
		}
		// && $filetype != "image/png" && $filetype != "image/gif"
		 if ($filetype != "image/jpeg"){
            $boolValidateOK = false;
			$fileValidate = "The file type is not a jpeg/jpg/jpe";
		 }

		if ($boolValidateOK){
			if (move_uploaded_file($filetempname, $originalsFolder . $filename)){
				$thisFile = $originalsFolder . $filename;
				resizeImage($thisFile, $thumbsFolder, 150); // thumbs
				resizeImage($thisFile, $displayFolder, 600); // display
			
				$sql = "INSERT INTO $database 
				(jye_title, jye_description, jye_filename) VALUES 
				('$title', '$descrip', '$filename')";

				mysqli_query($con, $sql) or die(mysqli_error($con));
				
				$stringValidate = "<p>\"$title\" Successfully Uploaded.</p>";
				$imgTitle = $title;
				$displayImg = $displayFolder . $filename;
				$displayImgBool = true;

				$title = "";
				$descrip = "";
			}else{
				$alertString = "danger";
				$stringValidate = "<p>Errors: $fileError</p>";
			}
		}else{
			$alertString = "danger";
			$stringValidate = "<p>Please fill in the information below</p>";
		}
	}

?>
<div class="row">
	<h2>Upload</h2>
	<div class="col-md-5">
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
					<label for="imgfile">Image File:</label>
					<input class="" type="file" name="imgfile">
						
					<?php if ($fileValidate){echo "<div class=\"alert alert-warning\">" .$fileValidate. "</div>"; } ?>
				</div>

				<div class="form-group">
					<label for="insert">&nbsp;</label>
					<input type="submit" name="insert" class="btn btn-info" value="Upload">
				</div>



		</form>
	</div>
	
	<div class="col-md-7">
		<?php if ($imgTitle && $displayImg && $displayImgBool){echo "<img class=\"uploadedimg\" src=\"$displayImg\" alt=\"$imgTitle\" title=\"$filename\">"; } ?>
	</div>
</div>

<?php
	include("../includes/footer.php");
?>