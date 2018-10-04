<?php include("includes/header.php"); ?>

<?php
    if (isset($_POST['submit'])){
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);
        $descrip = trim($_POST['descrip']);
        $fname = filter_var($fname, FILTER_SANITIZE_STRING);
        $lname = filter_var($lname, FILTER_SANITIZE_STRING);
        $descrip = filter_var($descrip, FILTER_SANITIZE_STRING);
        $boolValidateOK = true; //user has succesfully filled out the form; when we test for this further down, if its still 1, we can go ahead and do whatever this form is meant to do. Any validation rule can veto this by setting it to 0.
        $stringValidate = "";
        // $ip = $_SERVER['REMOTE_ADDR'];

        if ($fname != "" && $lname != "" && $descrip != "")
        {
            // CREATE: aka. insert
            mysqli_query($con, "INSERT INTO simpsons (fname, lname, description) VALUES ('$fname', '$lname', '$descrip')") or die(mysqli_error($con));
            $stringValidate = "<p>Thank you for inserting data</p>";

        }else{
            $boolValidateOK = false;
            $stringValidate = "<p>Please fill in all information</p>";
        }


    } // if submit
?>

    <div class="container">
        <h1>Insert New Character</h1>
        <form name="myform" class="formstyle" method="post" action="#">
			
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
          

		  <input type="submit" class="btn btn-default" name="submit" value="Insert">
            <?php if ($stringValidate){echo "<div class=\"alert alert-warning\">" .$stringValidate. "</div>"; } ?>
		</form>


	</div><!-- / .container -->


<?php include("includes/footer.php"); ?>