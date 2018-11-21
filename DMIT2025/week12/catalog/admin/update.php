<?php $admincontrol = true; ?>
<?php include("../includes/admin-check.php"); ?>
<?php include("../includes/header.php"); ?>

<?php
	echo "<script> let previousVal;</script>";
    $newAnimId = trim($_GET['animid']);
    $newAnimId = filter_var($newAnimId, FILTER_SANITIZE_NUMBER_INT);
    if ($newAnimId != "")  {
        $newResult = mysqli_query($con, "SELECT * from $database WHERE $id = '$newAnimId'") or die(mysqli_error($con));
        while ($loadedAnim = mysqli_fetch_array($newResult)){
			// (jye_series_name, jye_alter_name, jye_series_length, jye_episode_length, jye_airing, jye_series_image, jye_series_source, jye_rating, jye_description, jye_data_source,
			// jye_genre_action, jye_genre_adventure, jye_genre_comedy, jye_genre_fantasy, jye_genre_game, jye_genre_magic, jye_genre_mystery, jye_genre_school, jye_genre_sports, jye_genre_supernatural 
			
			$seriesN = $loadedAnim['jye_series_name'];
			$alterN = $loadedAnim['jye_alter_name'];
			$seriesL = $loadedAnim['jye_series_length'];
			$episodeL = $loadedAnim['jye_episode_length'];
			$rating = $loadedAnim['jye_rating'];
			$seriesSrc = $loadedAnim['jye_series_source'];
			$dataSrc = $loadedAnim['jye_data_source'];
			$airing = $loadedAnim['jye_airing'];
			$descrip = $loadedAnim['jye_description'];
	
			$gAction = $loadedAnim['jye_genre_action'];
			$gAdven = $loadedAnim['jye_genre_adventure'];
			$gComedy = $loadedAnim['jye_genre_comedy'];
			$gFantasy = $loadedAnim['jye_genre_fantasy'];
			$gGame = $loadedAnim['jye_genre_game'];
			$gMagic = $loadedAnim['jye_genre_magic'];
			$gMystery = $loadedAnim['jye_genre_mystery'];
			$gSchool = $loadedAnim['jye_genre_school'];
			$gSports = $loadedAnim['jye_genre_sports'];
			$gSuper = $loadedAnim['jye_genre_super'];
			
			$imgfile = $loadedAnim['jye_series_image'];
			if ($imgfile != ""){
				$displayImg = $displayFolder . $imgfile;
				$imgTitle = $seriesN;
				$uploadedImgBool = true;
			}
        }
        echo "<script> previousVal = $newAnimId;</script>";
    }
	if (isset($_POST['edit'])){
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

        $animid = $_POST['animid'];
		$newfile = is_uploaded_file($_FILES['imgfile']['tmp_name']);

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
		}


        $seriesN = filter_var($seriesN, FILTER_SANITIZE_STRING);
        $alterN = filter_var($alterN, FILTER_SANITIZE_STRING);
        $rating = filter_var($rating, FILTER_SANITIZE_STRING);
        $seriesSrc = filter_var($seriesSrc, FILTER_SANITIZE_STRING);
        $descrip = filter_var($descrip, FILTER_SANITIZE_STRING);
        $dataSrc = filter_var($dataSrc, FILTER_SANITIZE_URL);
        $seriesL = filter_var($seriesL, FILTER_SANITIZE_NUMBER_INT);
        $episodeL = filter_var($episodeL, FILTER_SANITIZE_NUMBER_INT);
		$airing = filter_var($airing, FILTER_SANITIZE_NUMBER_INT);
		
		$boolValidateOK = true;
		$stringValidate = "";
		$alertString = "success";
		$uploadedImgBool = false;

        if (!isset($animid)){
			$boolValidateOK = false;
			$animValidate .= "Please select a Series to edit";
		}

		if ((strlen($seriesN) < 2 || strlen($seriesN) > 50) || $seriesN == ""){
            $boolValidateOK = false;
            $seriesNValidate .= "<p>Please enter the series name between 2 and 50 characters</p>";
		}
		if ($newfile){
			if ($mbFilesize > 5){
				$boolValidateOK = false;
				$fileValidate = "File size is too large, it cannot exceed 5MB";
			}
			if ($filetype != "image/jpeg" && $filetype != "image/png" && $filetype != "image/gif"){
				$boolValidateOK = false;
				$fileValidate = "The file type is not compatible";
			}
		}
		if ($boolValidateOK){
			if ($newfile){
				// insertUniqueFileId($imgfile);
				$original = $originalsFolder . $imgfile;
				$thumbnail = $thumbsFolder . $imgfile;
				$display = $displayFolder . $imgfile;
				$removedOld = false;
				if ($imgfile != ""){
					$removedOld = (unlink($original) && unlink($thumbnail) && unlink($display));
				}else{
					$removedOld = true;
				}
				if ($removedOld){
					if (move_uploaded_file($filetempname, $originalsFolder . $newFilename)){
						$thisFile = $originalsFolder . $newFilename;
						resizeImage($thisFile, $thumbsFolder, 150); // thumbs
						resizeImage($thisFile, $displayFolder, 600); // display
					}else{
						$alertString = "danger";
						$stringValidate = "<p>Errors: $fileError</p>";
					}
					$imgTitle = $seriesN;
					$displayImg = $displayFolder . $newFilename;
					$uploadedImgBool = true;
				}				
			}
			if (!$newFilename) $newFilename = $imgfile;

			
			// ) VALUES 
			// ('$seriesN', '$alterN', '$seriesL', '$episodeL', '$airing', '$newFilename', '$seriesSrc', '$rating', '$descrip', '$dataSrc',
			// '$gAction', '$gAdven', '$gComedy', '$gFantasy', '$gGame', '$gMagic', '$gMystery', '$gSchool', '$gSports', '$gSuper'
			// )";

            $sql = "UPDATE $database SET 
			jye_series_name = '$seriesN',
			jye_alter_name = '$alterN',
			jye_series_length = '$seriesL',
			jye_episode_length = '$episodeL',
			jye_airing = '$airing',
			jye_series_source = '$seriesSrc',
			jye_rating = '$rating',
			jye_description = '$descrip',
			jye_data_source = '$dataSrc',
			jye_genre_action = '$gAction',
			jye_genre_adventure = '$gAdven',
			jye_genre_comedy = '$gComedy',
			jye_genre_fantasy = '$gFantasy',
			jye_genre_game = '$gGame',
			jye_genre_magic = '$gMagic',
			jye_genre_mystery = '$gMystery',
			jye_genre_school = '$gSchool',
			jye_genre_sports = '$gSports',
			jye_genre_supernatural = '$gSuper',
			jye_series_image = '$newFilename'
			WHERE $id = '$animid'";

            mysqli_query($con, $sql) or die(mysqli_error($con));
			$stringValidate = "<p>Succesfully Updated \"$seriesN\" in the Catalog.</p>";
			$uploadedImgBool = true;
			
		}else{
			$alertString = "danger";
			$stringValidate = "<p>Please fill in the information below</p>";
		}
	}

?>
<div class="row">
	<h2>Update</h2>
	<div class="col-md-5">
		<form id="myform" name="myform" class="formwidth" method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" enctype="multipart/form-data">
				<?php if ($stringValidate){echo "<div class=\"alert alert-$alertString\">" .$stringValidate. "</div>"; } ?>
				
				
				<div class="form-group">
					<label for="animid">Series:</label>
					<select name="animid" id="animid" class="form-control select-img">
						<option value="" selected disabled hidden>Please Select a Series</option>
						<?php
							$result = mysqli_query($con, "SELECT * from $database") or die(mysqli_error($con));
							while ($row = mysqli_fetch_array($result)){
								$displayName = $row['jye_series_name']; 
								$animid = $row[$id];
								echo "<option value=\"$animid\""; 
								if (isset($newAnimId) && $newAnimId == $animid) echo "selected"; //=\"selected\"
								echo ">$displayName</option>";
							}
						?>           
					</select>
					<?php if ($animValidate){echo "<div class=\"alert alert-warning\">" .$animValidate. "</div>"; } ?>
				</div>
				
				
				<?php include("../includes/main-form.php"); ?>
				
				
				<div class="form-group">
					<label for="edit">&nbsp;</label>
					<input type="submit" name="edit" class="btn btn-info" value="Update">
					<a href="delete.php?imgid=<?php echo $newImgId; ?>" class="btn btn-info deletebtn">Delete <i class="fas fa-trash-alt"></i></a>
				</div>



		</form>
	</div>
	
	<div class="col-md-7">
		<?php
		// echo "$uploadedImgBool and $imgTitle and $displayImg";
		if ($uploadedImgBool){
			if ($imgTitle && $displayImg){
				echo "<a class=\"\" href=\"../single.php?anim=$newAnimId\">";
				echo "<img class=\"uploadedimg\" src=\"$displayImg\" alt=\"$imgTitle\" title=\"$newFilename\"> <br>"; 
				echo "</a>";
				if ($newfile){
					echo "<br><br> <p>File Name: $newFilename</p>";
					echo "<p>File Type: $filetype</p>";
					echo "<p>File Size: $displayFilesize</p>";
				}
			}
		}

		?>
	</div>
</div>

<script>
        document.querySelector('.deletebtn').addEventListener('click', (evt) => {
            <?php if ($newAnimId != "") echo "let alertbool = confirm(\"Are you sure you wish to delete $seriesN?\");"; ?>
            if (!alertbool) evt.preventDefault();
        });
        document.querySelector('.select-img').addEventListener('click', (evt) => {
            let options = document.querySelector('.select-img');
            // console.log(options.value);
            if (options.value != "" && Number(options.value) != previousVal) {
                window.location.href = "update.php?animid=" + options.value;
            }
        });
</script>

<?php
	include("../includes/footer.php");
?>