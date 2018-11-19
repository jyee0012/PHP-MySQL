<?php $admincontrol = true; ?>
<?php include("../includes/admin-check.php"); ?>
<?php include("../includes/header.php"); ?>

<?php
	if (isset($_POST['insert'])){
		$filename = $_FILES['imgfile']['name'];
		$filetempname = $_FILES['imgfile']['tmp_name'];
		$filetype = $_FILES['imgfile']['type'];
		$baseFilesize = floatval($_FILES['imgfile']['size']);
		$fileError = $_FILES['imgfile']['error'];
		$kbFilesize = $baseFilesize/1024;
		$mbFilesize = $kbFilesize/1024;
		$displayFilesize = "";
		$newFilename = insertUniqueFileId($filename);

		$seriesN = trim($_POST['seriesN']);
		$alterN = trim($_POST['alterN']);
		$seriesL = trim($_POST['seriesL']);
		$episodeL = trim($_POST['episodeL']);
		$rating = trim($_POST['rating']);
		$seriesSrc = trim($_POST['seriesSrc']);
		$dataSrc = trim($_POST['dataSrc']);
		$seriesN = trim($_POST['seriesN']);
		$seriesN = trim($_POST['seriesN']);
		$descrip = trim($_POST['descrip']);

        $seriesN = filter_var($seriesN, FILTER_SANITIZE_STRING);
        $descrip = filter_var($descrip, FILTER_SANITIZE_STRING);
		$boolValidateOK = true;
		$stringValidate = "";
		$alertString = "success";
		
		if ($mbFilesize > 1){
			$displayFilesize = round($mbFilesize,3) . " MB";
		}else if ($kbFilesize > 1){
			$displayFilesize = round($kbFilesize,3) . " KB";
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
		 if ($filetype != "image/jpeg" && $filetype != "image/png" && $filetype != "image/gif"){
            $boolValidateOK = false;
			$fileValidate = "The file type is not compatible";
		 }

		if ($boolValidateOK){
			if (move_uploaded_file($filetempname, $originalsFolder . $newFilename)){
				$thisFile = $originalsFolder . $newFilename;
				resizeImage($thisFile, $thumbsFolder, 150); // thumbs
				resizeImage($thisFile, $displayFolder, 600); // display
			
				$sql = "INSERT INTO $database 
				(jye_series_name, jye_alter_name, jye_series_length, jye_episode_length, jye_airing, jye_series_image, jye_series_source, jye_rating, jye_description, jye_data_source) VALUES 
				('$title', '$descrip', '$newFilename')";

				mysqli_query($con, $sql) or die(mysqli_error($con));
				
				$stringValidate = "<p>\"$seriesN\" Successfully Uploaded.</p>";
				$imgTitle = $title;
				$displayImg = $displayFolder . $newFilename;
				$uploadedImgBool = true;

				$seriesN = "";
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
	<h2>Insert</h2>
	<div class="col-md-5">
		<form id="myform" name="myform" class="formwidth" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
				<?php if ($stringValidate){echo "<div class=\"alert alert-$alertString\">" .$stringValidate. "</div>"; } ?>
				<div class="form-group">
					<label for="seriesname">* Series Name:</label>
					<input type="text" class="form-control" id="seriesname" name="seriesname" value="<?php if ($seriesN) echo $seriesN ?>">
					<?php if ($seriesNValidate){echo "<div class=\"alert alert-warning\">" .$seriesNValidate. "</div>"; } ?>
				</div>
				<div class="form-group">
					<label for="altername">Alternate Name:</label>
					<input type="text" class="form-control" id="altername" name="altername" value="<?php if ($alterN) echo $alterN ?>">
					<?php if ($alterNValidate){echo "<div class=\"alert alert-warning\">" .$alterNValidate. "</div>"; } ?>
				</div>
				<div class="form-group">
					<label for="serieslength">Series Length:</label>
					<input type="text" class="form-control" id="serieslength" name="serieslength" value="<?php if ($seriesL) echo $seriesL ?>">
					<?php if ($seriesLValidate){echo "<div class=\"alert alert-warning\">" .$seriesLValidate. "</div>"; } ?>
				</div>
				<div class="form-group">
					<label for="episodelength">Episode Length:</label>
					<input type="text" class="form-control" id="episodelength" name="episodelength" placeholder="Number of minutes per episode" value="<?php if ($episodeL) echo $episodeL ?>">
					<?php if ($episodeLValidate){echo "<div class=\"alert alert-warning\">" .$episodeLValidate. "</div>"; } ?>
				</div>
				<div class="form-group">
					<label for="rating">Rating:</label>
					<!-- <input type="text" class="form-control" id="rating" name="rating" value="<?php //if ($rating) echo $rating ?>"> -->
					<select name="rating" id="rating" class="form-control select-rate">
						<option value="" selected disabled hidden>Please Select a Rating</option>
						<option value="g">G - General Audiences</option>
						<option value="pg">PG - Parental Guidance Suggested</option>
						<option value="pg-13">PG-13 - Parents Strongly Cautioned</option>
						<option value="r">R - Restricted</option>
						<option value="nc-17">NC-17 - Adults Only</option>
					</select>
					<?php if ($ratingValidate){echo "<div class=\"alert alert-warning\">" .$ratingValidate. "</div>"; } ?>
				</div>
				<div class="form-group">
					<label for="seriessrc">Series Source:</label>
					<!-- <input type="text" class="form-control" id="seriessrc" name="seriessrc" value="<?php //if ($seriesSrc) echo $seriesSrc ?>"> -->
					<select name="seriessrc" id="seriessrc" class="form-control select-src">
						<option value="" selected disabled hidden>Please Select a Series Source</option>
						<option value="ln">Light Novel</option>
						<option value="manga">Manga</option>
						<option value="vn">Visual Novel</option>
						<option value="game">Video Game</option>
						<option value="original">Original</option>
						<option value="other">Other</option>
					</select>
					<?php if ($seriesSrcValidate){echo "<div class=\"alert alert-warning\">" .$seriesSrcValidate. "</div>"; } ?>
				</div>
				<div class="form-group">
					<label for="datasrc">Data Source:</label>
					<input type="text" class="form-control" id="datasrc" name="datasrc" placeholder="Source of info" value="<?php if ($dataSrc) echo $dataSrc ?>">
					<?php if ($dataSrcValidate){echo "<div class=\"alert alert-warning\">" .$dataSrcValidate. "</div>"; } ?>
				</div>


				<div class="form-group">
					<label for="descrip">Description:</label>
					<textarea name="descrip" id="descrip" class="form-control textarea-height" placeholder="Synopsis"><?php if ($descrip) echo $descrip ?></textarea>
					<?php if ($descripValidate){echo "<div class=\"alert alert-warning\">" .$descripValidate. "</div>"; } ?>
				</div>
				
				<div class="form-group">
					<label for="imgfile">Thumbnail Image:</label>
					<input class="" type="file" name="imgfile">
						
					<?php if ($fileValidate){echo "<div class=\"alert alert-warning\">" .$fileValidate. "</div>"; } ?>
				</div>

				<div class="form-group">
					<label for="insert">&nbsp;</label>
					<input type="submit" name="insert" class="btn btn-info" value="Insert">
				</div>



		</form>
	</div>
	
	<div class="col-md-7">
		<?php 
		if ($uploadedImgBool){
			if ($imgTitle && $displayImg){
				// echo "<a class=\"\" href=\"../single.php?img=\">";
				echo "<img class=\"uploadedimg\" src=\"$displayImg\" alt=\"$imgTitle\" title=\"$filename\"> <br>"; 
				// echo "</a>";
			}
			echo "<br><br> <p>File Name: $filename</p>";
			echo "<p>File Type: $filetype</p>";
			echo "<p>File Size: $displayFilesize</p>";
		}
		
		
		
		?>

	</div>
</div>

<?php
	include("../includes/footer.php");
?>