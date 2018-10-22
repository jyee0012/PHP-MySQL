<?php include("includes/admin-check.php"); ?>
<?php include("includes/header.php"); ?>

<div class="row">
	<div class="col-md-12">
        <h1>Search</h1>
        <?php
        if (isset($_POST['searchsubmit'])){
            $searchterm = trim($_POST['searchterm']);
            $searchterm = filter_var($searchterm, FILTER_SANITIZE_STRING);
            $boolValidateOK = true; //user has succesfully filled out the form; when we test for this further down, if its still 1, we can go ahead and do whatever this form is meant to do. Any validation rule can veto this by setting it to 0.
            $stringValidate = "";
            if ($searchterm != ""){
                $sql = "SELECT * FROM $database WHERE MATCH 
                (jye_title,jye_message) 
                AGAINST ('$searchterm' IN BOOLEAN MODE)";

                $result = mysqli_query($con, $sql) or die(mysqli_error($con));
                if(mysqli_num_rows($result) > 0){
                    while ($row = mysqli_fetch_array($result)){
                        $blogid = $row['bid'];
                        $title = $row['jye_title'];
                        $msg = $row['jye_message'];
                        echo "<p>$business <a href=\"companyprofile.php?contactid=$contactid\">View Profile</a></p> ";
                    }
                }else{
                    echo "<b>No results</b>";
                }
            }
        } // if search
        ?>  
	</div>
</div>
<?php include ("includes/footer.php"); ?>