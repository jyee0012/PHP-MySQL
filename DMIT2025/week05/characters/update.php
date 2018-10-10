<?php include("includes/header.php"); ?>

<?php
    echo "<script> let previousVal;</script>";
    $newCharid = trim($_GET['charid']);
    $newCharid = filter_var($newCharid, FILTER_SANITIZE_NUMBER_INT);
    if ($newCharid != "")  {
        $newResult = mysqli_query($con, "SELECT * from $database WHERE fcid = '$newCharid'") or die(mysqli_error($con));
        while ($fillChar = mysqli_fetch_array($newResult)){
        
        $fname = $fillChar['jye_fname'];
        $lname = $fillChar['jye_lname'];
        $descrip = $fillChar['jye_description'];
        $charinfo = $fillChar['jye_charinfo'];
        $series = $fillChar['jye_series'];
        $source = $fillChar['jye_source'];
        }
        echo "<script> previousVal = $newCharid;</script>";
    }
    if (isset($_POST['update'])){
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);
        $descrip = trim($_POST['descrip']);
        $charinfo = trim($_POST['charinfo']);
        $series = trim($_POST['series']);
        $source = trim($_POST['source']);

        $fname = filter_var($fname, FILTER_SANITIZE_STRING);
        $lname = filter_var($lname, FILTER_SANITIZE_STRING);
        $descrip = filter_var($descrip, FILTER_SANITIZE_STRING);
        $charinfo = filter_var($charinfo, FILTER_SANITIZE_STRING);
        $series = filter_var($series, FILTER_SANITIZE_STRING);
        $source = filter_var($source, FILTER_SANITIZE_STRING);
        $charid = $_POST['charid'];
        $boolValidateOK = true; //user has succesfully filled out the form; when we test for this further down, if its still 1, we can go ahead and do whatever this form is meant to do. Any validation rule can veto this by setting it to 0.
        $stringValidate = "";
        // $ip = $_SERVER['REMOTE_ADDR'];

        if (strlen($fname) < 2 || strlen($fname) > 50){
            $boolValidateOK = false;
            $fnameValidate .= "<p>Please enter a first name that is between 2 and 50 characters</p>";
        }
        
        if (strlen($series) < 1 || strlen($series) > 100){
            $boolValidateOK = false;
            $seriesValidate .= "<p>Please enter the series this character is from</p>";
        }
        if (strlen($source) < 6 || strlen($source) > 100){
            $boolValidateOK = false;
            $sourceValidate .= "<p>Please enter the url of where you found this character, it's wiki or your source of info</p>";
        }

        if ($charid == ""){
            $charidValidate = "<p>Please select a character to update</p>";
        }

        if ($fname != "" && $series != "" && $source != "")
        {
            // CREATE: aka. insert
            //echo "$fname, $lname, $descrip";
            if (filter_var($source, FILTER_VALIDATE_URL) ){
                $useSource = $source;
            }else{
                $useSource = "";
            }

            $sql = "UPDATE $database SET jye_fname = '$fname', jye_lname = '$lname', jye_description = '$descrip', jye_charinfo = '$charinfo', jye_series = '$series', jye_source = '$useSource' WHERE fcid = '$charid'";
            mysqli_query($con, $sql) or die(mysqli_error($con));
            $stringValidate = "<p>Thank you for updating data</p>";

        }else{
            $boolValidateOK = false;
            $stringValidate = "<p>Please fill in information stated above</p>";
        }


    } // if update
?>

    <div class="container">
        <h1>Update Character</h1>
        <form name="myform" class="formstyle" method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']);?>">
			
        <div class="form-group">
		    <label for="charid">Choose Character:</label>
            <select name="charid" id="charid" class="form-control select-char">
                <option value="" selected disabled hidden >Please Select a Character</option>
                <?php
                    $result = mysqli_query($con, "SELECT * from $database") or die(mysqli_error($con));
                    while ($row = mysqli_fetch_array($result)){
                        $displayName = $row['jye_fname'] . " " . $row['jye_lname']; 
                        $charid = $row['fcid'];
                        echo "<option value=\"$charid\" "; 
                        if (isset($newCharid) && $newCharid == $charid) echo "selected=\"selected\"";
                        echo ">$displayName</option>";
                    }
                ?>           
            </select>
            <?php if ($charidValidate){echo "<div class=\"alert alert-warning\">" .$charidValidate. "</div>"; } ?>
		  </div>
        
		<!-- you can copy/paste one of these form-groups, then change the form element and label within -->
		  <div class="form-group">
		    <label for="fname">First Name:</label>
		    <input type="text" class="form-control" id="fname" name="fname" value="<?php if ($fname) echo $fname ?>">
            <?php if ($fnameValidate){echo "<div class=\"alert alert-warning\">" .$fnameValidate. "</div>"; } ?>
		  </div>
		 <!-- / form-group -->

		  <div class="form-group">
		    <label for="lname">Last Name:</label>
		    <input type="text" class="form-control" id="lname" name="lname" value="<?php if ($lname) echo $lname ?>">
            <?php if ($lnameValidate){echo "<div class=\"alert alert-warning\">" .$lnameValidate. "</div>"; } ?>
          </div>
          
		  <div class="form-group">
		    <label for="descrip">Description:</label>
            <textarea name="descrip" id="descrip" class="form-control"><?php if ($descrip) echo $descrip ?></textarea>
            <?php if ($descripValidate){echo "<div class=\"alert alert-warning\">" .$descripValidate. "</div>"; } ?>
          </div>

          <div class="form-group">
		    <label for="charinfo">Character Info:</label>
            <textarea name="charinfo" id="charinfo" class="form-control"><?php if ($charinfo) echo $charinfo ?></textarea>
            <?php if ($charinfoValidate){echo "<div class=\"alert alert-warning\">" .$charinfoValidate. "</div>"; } ?>
          </div>
        
          <div class="form-group">
		    <label for="series">Series:</label>
		    <input type="text" class="form-control" id="series" name="series" value="<?php if ($series) echo $series ?>">
            <?php if ($seriesValidate){echo "<div class=\"alert alert-warning\">" .$seriesValidate. "</div>"; } ?>
          </div>

          <div class="form-group">
		    <label for="source">Source:</label>
		    <input type="text" class="form-control" id="source" name="source" value="<?php if ($source) echo $source ?>" placeholder="<?php if ($sourcePlaceholder) echo $sourcePlaceholder; ?>">
            <?php if ($sourceValidate){echo "<div class=\"alert alert-warning\">" .$sourceValidate. "</div>"; } ?>
          </div>
            <br>
		  <input type="submit" class="btn btn-default" name="update" value="Update">
		  <a href="delete.php?charid=<?php echo $charid; ?>" class="btn btn-default deletebtn"><i class="fas fa-trash-alt"></i> Delete</a>
            <?php if ($stringValidate){echo "<div class=\"alert alert-warning\">" .$stringValidate. "</div>"; } ?>
		</form>


	</div><!-- / .container -->
    <script>
        document.querySelector('.deletebtn').addEventListener('click', (evt) => {
            <?php if ($newCharid != "") echo "let alertbool = confirm(\"Are you sure you wish to delete $fname $lname?\");"; ?>
            if (!alertbool) evt.preventDefault();
        });
        document.querySelector('.select-char').addEventListener('click', (evt) => {
            let options = document.querySelector('.select-char');
            // console.log(options.value);
            if (options.value != "" && Number(options.value) != previousVal) {
                window.location.href = "update.php?charid=" + options.value;
            }
        });
    </script>

<?php include("includes/footer.php"); ?>