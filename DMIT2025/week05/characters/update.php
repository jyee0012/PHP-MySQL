<?php include("includes/header.php"); ?>

<?php
    echo "<script> let previousVal;</script>";
    $newCharid = trim($_GET['charid']);
    $newCharid = filter_var($newCharid, FILTER_SANITIZE_NUMBER_INT);
    if ($newCharid != "")  {
        $newResult = mysqli_query($con, "SELECT * from simpsons WHERE sid = '$newCharid'") or die(mysqli_error($con));
        while ($fillChar = mysqli_fetch_array($newResult)){
        
        $fname = $fillChar['fname'];
        $lname = $fillChar['lname'];
        $descrip = $fillChar['description'];
        }
        echo "<script> previousVal = $newCharid;</script>";
    }
    if (isset($_POST['update'])){
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);
        $descrip = trim($_POST['descrip']);
        $fname = filter_var($fname, FILTER_SANITIZE_STRING);
        $lname = filter_var($lname, FILTER_SANITIZE_STRING);
        $descrip = filter_var($descrip, FILTER_SANITIZE_STRING);
        $charid = $_POST['charid'];
        $boolValidateOK = true; //user has succesfully filled out the form; when we test for this further down, if its still 1, we can go ahead and do whatever this form is meant to do. Any validation rule can veto this by setting it to 0.
        $stringValidate = "";
        // $ip = $_SERVER['REMOTE_ADDR'];

        if ($fname != "" && $lname != "" && $descrip != "" && $charid != "")
        {
            // CREATE: aka. insert
            //echo "$fname, $lname, $descrip";
            mysqli_query($con, "UPDATE simpsons SET fname = '$fname', lname = '$lname', description = '$descrip' WHERE sid = '$charid'") or die(mysqli_error($con));
            $stringValidate = "<p>Thank you for updating data</p>";

        }else{
            $boolValidateOK = false;
            $stringValidate = "<p>Please select a character to edit</p>";
        }


    } // if update
?>

    <div class="container">
        <h1>Edit Character</h1>
        <form name="myform" class="formstyle" method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']);?>">
			
        <div class="form-group">
		    <label for="charid">Choose Character:</label>
            <select name="charid" id="charid" class="form-control select-char">
                <option value="" selected disabled hidden >Please Select a Character</option>
                <?php
                    $result = mysqli_query($con, "SELECT * from simpsons") or die(mysqli_error($con));
                    while ($row = mysqli_fetch_array($result)){
                        $displayName = $row['fname'] . " " . $row['lname']; 
                        $charid = $row['sid'];
                        echo "<option value=\"$charid\" "; 
                        if (isset($newCharid) && $newCharid == $charid) echo "selected=\"selected\"";
                        echo ">$displayName</option>";
                    }
                ?>           
            </select>
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
          

		  <input type="submit" class="btn btn-default" name="update" value="Update">
		  <a href="delete.php?charid=<?php echo $charid; ?>" class="btn btn-default deletebtn">Delete</a>
            <?php if ($stringValidate){echo "<div class=\"alert alert-warning\">" .$stringValidate. "</div>"; } ?>
		</form>


	</div><!-- / .container -->
    <script>
        document.querySelector('.deletebtn').addEventListener('click', (evt) => {
            <?php echo "let alertbool = alert(\"Are you sure you wish to delete $fname $lname?\")"; ?>
            if (!alertbool) evt.preventDefault();
        });
        document.querySelector('.select-char').addEventListener('click', (evt) => {
            let options = document.querySelector('.select-char');
            if (options.value != "" && options.value != previousVal) {
                window.location.href = "edit.php?charid=" + options.value;
            }
        });
    </script>

<?php include("includes/footer.php"); ?>