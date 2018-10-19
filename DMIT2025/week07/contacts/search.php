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
                $sql = "SELECT * from $database WHERE   jye_bname like '%$searchterm%' OR 
                                                        jye_pname like '%$searchterm%' OR 
                                                        jye_email like '%$searchterm%' OR 
                                                        jye_url like '%$searchterm%' OR 
                                                        jye_phone like '%$searchterm%' OR 
                                                        jye_address like '%$searchterm%' OR 
                                                        jye_city like '%$searchterm%' OR 
                                                        jye_province like '%$searchterm%' OR 
                                                        jye_description like '%$searchterm%'                                         
                                                        ";
                $result = mysqli_query($con, $sql) or die(mysqli_error($con));
                while ($row = mysqli_fetch_array($result)){
                    $contactid = $row['cid'];
                    $business = $row['jye_bname'];
                    echo "<p>$business <a href=\"companyprofile.php?contactid=$contactid\">View Profile</a></p> ";
                }
            }
        } // if search
        ?>  
	</div>
</div>
<?php include ("includes/footer.php"); ?>