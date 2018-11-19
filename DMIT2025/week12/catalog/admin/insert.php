<?php $admincontrol = true; ?>
<?php include("../includes/admin-check.php"); ?>
<?php include("../includes/header.php"); ?>

<?php
	if (isset($_POST['insert'])){
		$seriesN = trim($_POST['seriesname']);
		$alterN = trim($_POST['altername']);
		$seriesL = trim($_POST['serieslength']);
		$episodeL = trim($_POST['episodelength']);
		$rating = trim($_POST['rating']);
		$seriesSrc = trim($_POST['seriessrc']);
		$dataSrc = trim($_POST['datasrc']);
		$airing = trim($_POST['airing']);
		$descrip = trim($_POST['descrip']);

		$gAction = trim($_POST['genre_']);
		$gAdven = trim($_POST['genre_']);
		$gComedy = trim($_POST['genre_']);
		$gAction = trim($_POST['genre_']);
		$gAction = trim($_POST['genre_']);
		$gAction = trim($_POST['genre_']);
		$gAction = trim($_POST['genre_']);
		$gAction = trim($_POST['genre_']);
		$gAction = trim($_POST['genre_']);
		$gAction = trim($_POST['genre_']);
		$gAction = trim($_POST['genre_']);

		$newfile = is_uploaded_file($_FILES['imgfile']['tmp_name']);

        $seriesN = filter_var($seriesN, FILTER_SANITIZE_STRING);
        $alterN = filter_var($alterN, FILTER_SANITIZE_STRING);
        $rating = filter_var($rating, FILTER_SANITIZE_STRING);
        $seriesSrc = filter_var($seriesSrc, FILTER_SANITIZE_STRING);
        $descrip = filter_var($descrip, FILTER_SANITIZE_STRING);
        $dataSrc = filter_var($dataSrc, FILTER_SANITIZE_URL);
        $seriesL = filter_var($seriesL, FILTER_SANITIZE_NUMBER_INT);
        $episodeL = filter_var($episodeL, FILTER_SANITIZE_NUMBER_INT);
        $airing = filter_var($airing, FILTER_SANITIZE_NUMBER_INT);
		
        $airing = filter_var($airing, FILTER_SANITIZE_NUMBER_INT);
        $airing = filter_var($airing, FILTER_SANITIZE_NUMBER_INT);
        $airing = filter_var($airing, FILTER_SANITIZE_NUMBER_INT);
        $airing = filter_var($airing, FILTER_SANITIZE_NUMBER_INT);
        $airing = filter_var($airing, FILTER_SANITIZE_NUMBER_INT);
        $airing = filter_var($airing, FILTER_SANITIZE_NUMBER_INT);
        $airing = filter_var($airing, FILTER_SANITIZE_NUMBER_INT);
        $airing = filter_var($airing, FILTER_SANITIZE_NUMBER_INT);
        $airing = filter_var($airing, FILTER_SANITIZE_NUMBER_INT);
        $airing = filter_var($airing, FILTER_SANITIZE_NUMBER_INT);
        $airing = filter_var($airing, FILTER_SANITIZE_NUMBER_INT);		

		$boolValidateOK = true;
		$stringValidate = "";
		$alertString = "success";
		$newFilename = "";
		
		if ($newfile){	
			$filename = $_FILES['imgfile']['name'];
			$filetempname = $_FILES['imgfile']['tmp_name'];
			$filetype = $_FILES['imgfile']['type'];
			$baseFilesize = floatval($_FILES['imgfile']['size']);
			$fileError = $_FILES['imgfile']['error'];
			$kbFilesize = $baseFilesize/1024;
			$mbFilesize = $kbFilesize/1024;
			$displayFilesize = "";
			$newFilename = insertUniqueFileId($filename);
			
			if ($mbFilesize > 1){
				$displayFilesize = round($mbFilesize,3) . " MB";
			}else if ($kbFilesize > 1){
				$displayFilesize = round($kbFilesize,3) . " KB";
			}else{
				$displayFilesize = $baseFilesize . " bytes";
			}
		
			if ($mbFilesize > 5){
				$boolValidateOK = false;
				$fileValidate = "File size is too large, it cannot exceed 5MB";
			}
			if ($filetype != "image/jpeg" && $filetype != "image/png" && $filetype != "image/gif"){
				$boolValidateOK = false;
				$fileValidate = "The file type is not compatible";
			}
		}

		if ((strlen($seriesN) < 2 || strlen($seriesN) > 50) || $seriesN == ""){
            $boolValidateOK = false;
            $seriesNValidate .= "<p>Please enter the series name between 2 and 50 characters</p>";
		}

		if ($boolValidateOK){

			if ($newfile){
				insertUniqueFileId($imgfile);
				$original = $originalsFolder . $imgfile;
				$thumbnail = $thumbsFolder . $imgfile;
				$display = $displayFolder . $imgfile;
				if (move_uploaded_file($filetempname, $originalsFolder . $filename)){
					$thisFile = $originalsFolder . $filename;
					resizeImage($thisFile, $thumbsFolder, 150); // thumbs
					resizeImage($thisFile, $displayFolder, 600); // display
				}else{
					$alertString = "danger";
					$stringValidate = "<p>Errors: $fileError</p>";
				}
			}

			$sql = "INSERT INTO $database 
			(jye_series_name, jye_alter_name, jye_series_length, jye_episode_length, jye_airing, jye_series_image, jye_series_source, jye_rating, jye_description, jye_data_source) VALUES 
			('$seriesN', '$alterN', '$seriesL', '$episodeL', '$airing', '$newFilename', '$seriesSrc', '$rating', '$descrip', '$dataSrc')";

			mysqli_query($con, $sql) or die(mysqli_error($con));
			
			$stringValidate = "<p>\"$seriesN\" Successfully Uploaded.</p>";
			$imgTitle = $seriesN;
			$displayImg = $displayFolder . $newFilename;
			$uploadedImgBool = true;

			$seriesN = "";
			$alterN = "";
			$seriesL = "";
			$episodeL = "";
			$airing = "";
			$seriesSrc = "";
			$rating = "";
			$dataSrc = "";
			$descrip = "";
			
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
						<option value="g" <?php if ($rating == "g") echo "selected";?>>G - General Audiences</option>
						<option value="pg" <?php if ($rating == "pg") echo "selected";?>>PG - Parental Guidance Suggested</option>
						<option value="pg-13" <?php if ($rating == "pg-13") echo "selected";?>>PG-13 - Parents Strongly Cautioned</option>
						<option value="r" <?php if ($rating == "r") echo "selected";?>>R - Restricted</option>
						<option value="nc-17" <?php if ($rating == "nc-17") echo "selected";?>>NC-17 - Adults Only</option>
					</select>
					<?php if ($ratingValidate){echo "<div class=\"alert alert-warning\">" .$ratingValidate. "</div>"; } ?>
				</div>
				<div class="form-group">
					<label for="seriessrc">Series Source:</label>
					<!-- <input type="text" class="form-control" id="seriessrc" name="seriessrc" value="<?php //if ($seriesSrc) echo $seriesSrc ?>"> -->
					<select name="seriessrc" id="seriessrc" class="form-control select-src">
						<option value="" selected disabled hidden>Please Select a Series Source</option>
						<option value="ln" <?php if ($seriesSrc == "ln") echo "selected";?>>Light Novel</option>
						<option value="manga" <?php if ($seriesSrc == "manga") echo "selected";?>>Manga</option>
						<option value="vn" <?php if ($seriesSrc == "vn") echo "selected";?>>Visual Novel</option>
						<option value="game" <?php if ($seriesSrc == "game") echo "selected";?>>Video Game</option>
						<option value="original" <?php if ($seriesSrc == "original") echo "selected";?>>Original</option>
						<option value="other" <?php if ($seriesSrc == "other") echo "selected";?>>Other</option>
					</select>
					<?php if ($seriesSrcValidate){echo "<div class=\"alert alert-warning\">" .$seriesSrcValidate. "</div>"; } ?>
				</div>
				<div class="form-group">
					<label for="datasrc">Data Source:</label>
					<input type="text" class="form-control" id="datasrc" name="datasrc" placeholder="Source of info" value="<?php if ($dataSrc) echo $dataSrc ?>">
					<?php if ($dataSrcValidate){echo "<div class=\"alert alert-warning\">" .$dataSrcValidate. "</div>"; } ?>
				</div>

				<div class="form-check">
					<input type="checkbox" class="form-check=input" id="airing" name="airing" value="1" <?php if ($airing) echo "checked"; ?>>
					<label for="airing" class="form-check-label">Currently Airing</label>
					<?php if ($airingValidate){echo "<div class=\"alert alert-warning\">" .$airingValidate. "</div>"; } ?>
				</div>


				<div class="form-group">
					<label for="descrip">Description:</label>
					<textarea name="descrip" id="descrip" class="form-control textarea-height" placeholder="Synopsis"><?php if ($descrip) echo $descrip ?></textarea>
					<?php if ($descripValidate){echo "<div class=\"alert alert-warning\">" .$descripValidate. "</div>"; } ?>
				</div>
				<div class="form-check">
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" name="genre_action" id="genre_action" value="1" <?php if ($gAction) echo "checked"; ?>>
						<label class="form-check-label" for="genre_action">Action</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" name="genre_adventure" id="genre_adventure" value="1" <?php if ($gAdven) echo "checked"; ?>>
						<label class="form-check-label" for="genre_adventure">Adventure</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" name="genre_comedy" id="genre_comedy" value="1" <?php if ($gComedy) echo "checked"; ?>>
						<label class="form-check-label" for="genre_comedy">Comedy</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" name="genre_fantasy" id="genre_fantasy" value="1" <?php if ($gFantasy) echo "checked"; ?>>
						<label class="form-check-label" for="genre_fantasy">Fantasy</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" name="genre_game" id="genre_game" value="1" <?php if ($gGame) echo "checked"; ?>>
						<label class="form-check-label" for="genre_game">Game</label>
					</div>
				</div>
				<div class="form-check">
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" name="genre_magic" id="genre_magic" value="1" <?php if ($gMagic) echo "checked"; ?>>
						<label class="form-check-label" for="genre_magic">Magic</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" name="genre_mystery" id="genre_mystery" value="1" <?php if ($gMystery) echo "checked"; ?>>
						<label class="form-check-label" for="genre_mystery">Mystery</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" name="genre_school" id="genre_school" value="1" <?php if ($gSchool) echo "checked"; ?>>
						<label class="form-check-label" for="genre_school">School</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" name="genre_sport" id="genre_sport" value="1" <?php if ($gSports) echo "checked"; ?>>
						<label class="form-check-label" for="genre_sport">Sports</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="checkbox" name="genre_super" id="genre_super" value="1" <?php if ($gSuper) echo "checked"; ?>>
						<label class="form-check-label" for="genre_super">Supernatural</label>
					</div>
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