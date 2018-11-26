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

		$gAction = trim($_POST['genre_action']);
		$gAdven = trim($_POST['genre_adventure']);
		$gComedy = trim($_POST['genre_comedy']);
		$gFantasy = trim($_POST['genre_fantasy']);
		$gGame = trim($_POST['genre_game']);
		$gMagic = trim($_POST['genre_magic']);
		$gMystery = trim($_POST['genre_mystery']);
		$gSchool = trim($_POST['genre_school']);
		$gSports = trim($_POST['genre_sports']);
		$gSuper = trim($_POST['genre_super']);

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
		
        // $gAction = filter_var($gAction, FILTER_SANITIZE_NUMBER_INT);
        // $gAdven = filter_var($gAdven, FILTER_SANITIZE_NUMBER_INT);
        // $gComedy = filter_var($gComedy, FILTER_SANITIZE_NUMBER_INT);
        // $gFantasy = filter_var($gFantasy, FILTER_SANITIZE_NUMBER_INT);
        // $gGame = filter_var($gGame, FILTER_SANITIZE_NUMBER_INT);
        // $gMagic = filter_var($gMagic, FILTER_SANITIZE_NUMBER_INT);
        // $gMystery = filter_var($gMystery, FILTER_SANITIZE_NUMBER_INT);
        // $gSchool = filter_var($gSchool, FILTER_SANITIZE_NUMBER_INT);
        // $gSports = filter_var($gSports, FILTER_SANITIZE_NUMBER_INT);
        // $gSuper = filter_var($gSuper, FILTER_SANITIZE_NUMBER_INT);

		$boolValidateOK = true;
		$stringValidate = "";
		$alertString = "success";
		$newFilename = '';

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
		if (strlen($descrip) < 10 || $descrip == ""){
            $boolValidateOK = false;
            $descripValidate .= "<p>Please enter description/synopsis of at least 10 characters</p>";
		}

		if ($boolValidateOK){

			if ($newfile){
				$thisFile = $originalsFolder . $newFilename;
				if (move_uploaded_file($filetempname, $thisFile)){
					resizeImage($thisFile, $thumbsFolder, 150); // thumbs
					resizeImage($thisFile, $displayFolder, 600); // display
				}else{
					$alertString = "danger";
					$stringValidate = "<p>Errors: $fileError</p>";
				}
			}

			$sql = "INSERT INTO $database 
			(jye_series_name, jye_alter_name, jye_series_length, jye_episode_length, jye_airing, jye_series_image, jye_series_source, jye_rating, jye_description, jye_data_source,
			jye_genre_action, jye_genre_adventure, jye_genre_comedy, jye_genre_fantasy, jye_genre_game, jye_genre_magic, jye_genre_mystery, jye_genre_school, jye_genre_sports, jye_genre_supernatural 
			) VALUES 
			('$seriesN', '$alterN', '$seriesL', '$episodeL', '$airing', '$newFilename', '$seriesSrc', '$rating', '$descrip', '$dataSrc',
			'$gAction', '$gAdven', '$gComedy', '$gFantasy', '$gGame', '$gMagic', '$gMystery', '$gSchool', '$gSports', '$gSuper'
			)";
			//echo $sql; 
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
				
				<?php include("../includes/main-form.php"); ?>
				
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