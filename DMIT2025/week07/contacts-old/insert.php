<?php include("includes/header.php"); ?>

<?php
    if (isset($_POST['insert'])){
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
        $boolValidateOK = true; //user has succesfully filled out the form; when we test for this further down, if its still 1, we can go ahead and do whatever this form is meant to do. Any validation rule can veto this by setting it to 0.
        $stringValidate = "";
        $alertString = "success";
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

        if ($fname != "" && $series != "" && $source != "")
        {
            // CREATE: aka. insert
            if (filter_var($source, FILTER_VALIDATE_URL)){
                $useSource = $source;
            }else{
                $useSource = "";
            }
            $sql = "INSERT INTO $database (jye_fname, jye_lname, jye_description, jye_charinfo, jye_series, jye_source) VALUES ('$fname', '$lname', '$descrip', '$charinfo', '$series', '$useSource')";
            mysqli_query($con, $sql) or die(mysqli_error($con));
            $stringValidate = "<p>Thank you for inserting \"$fname\" into the database</p>";

            
            $fname = '';
            $lname = '';
            $descrip = '';
            $charinfo = '';
            $series = '';
            $source = '';

        }else{
            $boolValidateOK = false;
            $stringValidate = "<p>Please fill in the information above</p>";
            $alertString = "warning";
        }


    } // if submit
?>

    <div class="container">
        <h1>Insert New Character</h1>
        <form name="myform" class="formstyle" method="post" action="#">
			
		<!-- you can copy/paste one of these form-groups, then change the form element and label within -->
		  <div class="form-group">
		    <label for="bname">* Business Name:</label>
		    <input type="text" class="form-control" id="bname" name="bname" value="<?php if ($bname) echo $bname ?>">
            <?php if ($bnameValidate){echo "<div class=\"alert alert-warning\">" .$bnameValidate. "</div>"; } ?>
		  </div>
		 <!-- / form-group -->

		  <div class="form-group">
		    <label for="pname">Person Name:</label>
		    <input type="text" class="form-control" id="pname" name="pname" value="<?php if ($pname) echo $pname ?>">
            <?php if ($pnameValidate){echo "<div class=\"alert alert-warning\">" .$pnameValidate. "</div>"; } ?>
          </div>

		  <div class="form-group">
		    <label for="email">* Email Address:</label>
		    <input type="email" class="form-control" id="email" name="email" value="<?php if ($email) echo $email ?>">
            <?php if ($emailValidate){echo "<div class=\"alert alert-warning\">" .$emailValidate. "</div>"; } ?>
          </div>
          
          <div class="form-group">
		    <label for="url">* Website URL:</label>
		    <input type="text" class="form-control" id="url" name="url" value="<?php if ($url) echo $url ?>">
            <?php if ($urlValidate){echo "<div class=\"alert alert-warning\">" .$urlValidate. "</div>"; } ?>
          </div>

		  <div class="form-group">
		    <label for="descrip">Description:</label>
            <textarea name="descrip" id="descrip" class="form-control"><?php if ($descrip) echo $descrip ?></textarea>
            <?php if ($descripValidate){echo "<div class=\"alert alert-warning\">" .$descripValidate. "</div>"; } ?>
          </div>

            <br>
		  <input type="submit" class="btn btn-default" name="insert" value="Insert">
            <?php if ($stringValidate){echo "<div class=\"alert alert-$alertString\">" .$stringValidate. "</div>"; } ?>
		</form>


	</div><!-- / .container -->


<?php include("includes/footer.php"); ?>