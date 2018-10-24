<?php include("includes/admin-check.php"); ?>
<?php include("includes/header.php"); ?>
<?php
	
?>
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


                //////////// pagination
                $getcount = mysqli_query ($con,"SELECT COUNT(*) FROM $database 
                WHERE MATCH 
                (jye_title,jye_message) 
                AGAINST ('$searchterm' IN BOOLEAN MODE)");
                $postnum = mysqli_result($getcount,0);// this needs a fix for MySQLi upgrade; see custom function below
                $limit = 5;
                if($postnum > $limit){
                    $tagend = round($postnum % $limit,0);
                    $splits = round(($postnum - $tagend)/$limit,0);

                    if($tagend == 0){
                        $num_pages = $splits;
                    }else{
                        $num_pages = $splits + 1;
                    }

                    if(isset($_GET['pg'])){
                        $pg = $_GET['pg'];
                    }else{
                        $pg = 1;
                    }
                    $startpos = ($pg*$limit)-$limit;
                    $limstring = "LIMIT $startpos,$limit";
                }else{
                    $limstring = "LIMIT 0,$limit";
                }



                $result = mysqli_query($con, $sql) or die(mysqli_error($con));
                if(mysqli_num_rows($result) > 0){
                    while ($row = mysqli_fetch_array($result)){
                        $displayTitle = $row['jye_title'];
                        $displayTxt = nl2br(addEmoticons(makeClickableLinks($row['jye_message'])));
                        $timedate = strtotime($row['jye_timedate']);
                        $displayDate = date("F j, Y, g:i a", $timedate);
                        $bid = $row['bid'];
                        echo "<div class=\"blogpost well clearfix\">"; 
                        echo "<h3>$displayTitle</h3>";
                        echo "<p>$displayTxt</p>";
                        echo "<p class=\"pull-right\"><i>$displayDate</i></p>";
                        echo "<a style=\"margin-right: 1rem;\" class=\"pull-right\" href=\"admin/edit.php?blogid=$bid\"><i>Edit</i></a>";
                        echo "</div>";
                    }
                }else{
                    echo "<b>No results</b>";
                }
            }
        } // if search
        ?>  
        <?php			
            ///////////////// pagination links: perhaps put these BELOW where your results are echo'd out.
            if($postnum > $limit){
                echo "<ul class=\"pagination\">";	
                // echo "<strong>Pages:</strong> &nbsp;&nbsp;&nbsp;";
                $n = $pg + 1;
                $p = $pg - 1;
                $thisroot = $_SERVER['PHP_SELF'];
                if($pg > 1){
                    echo "<li class=\"page-item\">";
                    echo "<a class=\"page-link\" href=\"$thisroot?pg=$p\"><< prev</a>"; //&nbsp;&nbsp;
                    echo "</li>";
                }
                for($i=1; $i<=$num_pages; $i++){
                    echo "<li class=\"page-item\">";
                    if($i!= $pg){
                        echo "<a class=\"page-link\" href=\"$thisroot?pg=$i\">$i</a>"; //&nbsp;&nbsp;
                    }else{
                        echo "<a class=\"page-link\">$i</a>"; //&nbsp;&nbsp;
                    }
                    echo "</li>";
                }
                if($pg < $num_pages){
                    echo "<li class=\"page-item\">";
                    echo "<a class=\"page-link\" href=\"$thisroot?pg=$n\">next >></a>";
                    echo "</li>";
                }
                // echo "&nbsp;&nbsp;";

                echo "</ul>";
            }
            ////////////// end pagination
		?>
	</div>

</div>
<?php include ("includes/footer.php"); ?>