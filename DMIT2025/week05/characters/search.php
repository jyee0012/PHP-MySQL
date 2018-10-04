<?php include("includes/header.php"); ?>
         

<div class="container">
        <h1>Search</h1>
        <form name="myform" class="formstyle" method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']);?>">
			
        
        
		<!-- you can copy/paste one of these form-groups, then change the form element and label within -->
		  <div class="form-group">
		    <label for="searchterm">Search:</label>
		    <input type="text" class="form-control" id="searchterm" name="searchterm" value="<?php if ($fname) echo $fname ?>">
		    <input type="submit" class="btn btn-default" name="searchsubmit" value="Search">
            <?php if ($stringValidate){echo "<div class=\"alert alert-warning\">" .$stringValidate. "</div>"; } ?>
		  </div>
		</form>

<?php
    if (isset($_POST['searchsubmit'])){
        $searchterm = trim($_POST['searchterm']);
        $searchterm = filter_var($searchterm, FILTER_SANITIZE_STRING);
        $boolValidateOK = true; //user has succesfully filled out the form; when we test for this further down, if its still 1, we can go ahead and do whatever this form is meant to do. Any validation rule can veto this by setting it to 0.
        $stringValidate = "";
        // $ip = $_SERVER['REMOTE_ADDR'];

        if ($searchterm != "")
        {
            $sql = "SELECT * from simpsons WHERE fname like '%$searchterm%' OR lname like '%$searchterm%' OR description like '%$searchterm%'";
            $result = mysqli_query($con, $sql) or die(mysqli_error($con));
            while ($row = mysqli_fetch_array($result)){
                echo "<hr>";
                //  echo $row['sid'] . "<br>";
                $fname = $row['fname']; 
                $lname = $row['lname'];
                $descrip = nl2br($row['description']);
                echo "<h3>$fname $lname</h3>";
                echo "<br><p>$descrip</p>";
            }
        }else{
            $boolValidateOK = false;
            $stringValidate = "<p>Please search something</p>";
        }


    } // if search
?>  

	</div><!-- / .container -->
<?php include("includes/footer.php"); ?>