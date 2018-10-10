<?php include("includes/header.php"); ?>
         

<div class="container">
        <h1>Search</h1>
        <form name="myform" class="formstyle" method="post" action="<?php echo "search.php";?>">
		  <div class="form-group col-md-3">
		    <!-- <label for="searchterm">Search:</label> -->
		    <input type="text" class="form-control searchsubmit-text" id="searchterm" name="searchterm" value="<?php if ($fname) echo $fname ?>">
		    <input type="submit" class="btn btn-default searchsubmit" name="searchsubmit" value="Search " + <i class="fas fa-search-icon"></i>>
            <?php if ($searchValidate){echo "<div class=\"alert alert-warning\">" .$searchValidate. "</div>"; } ?>
		  </div>
		</form>
        <script>
            document.querySelector(".searchsubmit").addEventListener('submit' (evt) => {
                if (trim(document.querySelector(".searchsubmit-text").innerHTML) == "") {
                    evt.preventDefault();
                    alert("Please enter something to search.");
                }
            });
        </script>
<?php
    if (isset($_POST['searchsubmit'])){
        $searchterm = trim($_POST['searchterm']);
        $searchterm = filter_var($searchterm, FILTER_SANITIZE_STRING);
        $boolValidateOK = true; //user has succesfully filled out the form; when we test for this further down, if its still 1, we can go ahead and do whatever this form is meant to do. Any validation rule can veto this by setting it to 0.
        $stringValidate = "";
        // $ip = $_SERVER['REMOTE_ADDR'];

        if ($searchterm != ""){
            $sql = "SELECT * from $database WHERE   jye_fname like '%$searchterm%' OR 
                                                    jye_lname like '%$searchterm%' OR 
                                                    jye_description like '%$searchterm%' OR
                                                    jye_charinfo like '%$searchterm%' OR
                                                    jye_series like '%$searchterm%'                                                    
                                                    ";
            $result = mysqli_query($con, $sql) or die(mysqli_error($con));
            while ($row = mysqli_fetch_array($result)){
                echoChar($row);
            }
        }
        // else{
        //     $boolValidateOK = false;
        //     $stringValidate = "<p>Please search something</p>";
        // }


    } // if search
?>  

	</div><!-- / .container -->
<?php include("includes/footer.php"); ?>