<?php include("includes/admin-check.php"); ?>
<?php include("includes/header.php"); ?>
<?php
	//////////// pagination
	$getcount = mysqli_query ($con,"SELECT COUNT(*) FROM $database");
	$postnum = mysqli_result($getcount,0);// this needs a fix for MySQLi upgrade; see custom function below
	$limit = 20;
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

	$pgNum = trim($_GET['pg']);
    $pgNum = filter_var($pgNum, FILTER_SANITIZE_NUMBER_INT);


?>
<style>
	#myBtn {
		display: none; /* Hidden by default */
		position: fixed; /* Fixed/sticky position */
		bottom: 2rem; /* Place the button at the bottom of the page */
		right: 3rem; /* Place the button 30px from the right */
		z-index: 99; /* Make sure it does not overlap */
		border: none; /* Remove borders */
		outline: none; /* Remove outline */
		background-color: red; /* Set a background color */
		color: white; /* Text color */
		cursor: pointer; /* Add a mouse pointer on hover */
		padding: 1rem 2rem; /* Some padding */
		border-radius: 1rem; /* Rounded corners */
		font-size: 2rem; /* Increase font size */
	}

	#myBtn:hover {
		background-color: #555; /* Add a dark-grey background on hover */
	}
	.contacts{
		margin-left: 2rem;
	}
</style>
<div class="row">
	<div class="col-md-12">
		<h1>Anime Wallpaper - Gallery <?php if ($pgNum) echo "Page $pgNum";?></h1>
		<?php
			$sql = "SELECT * from $database ORDER BY $id DESC $limstring";
			$result = mysqli_query($con, $sql) or die(mysqli_error($con));
		?>
			<div class="gallery">
			<?php while ($row = mysqli_fetch_array($result)): ?>
				<?php
					$displayTitle = $row['jye_title'];
					$displayDescrip = $row['jye_description'];
					$displayImg = $row['jye_filename'];
					$imgid = $row[$id];
				?>
				<!-- this is for quick and dirty layout; best to not use the well for your labs -->
				<a href="single.php?img=<?php echo $imgid; ?>">
					<div class="image">
						<div class="thumbs"> 
								<img class="center" src="galleryfiles/thumbs/<?php echo $displayImg; ?>" alt="<?php echo $displayTitle; ?>" title="<?php echo $displayImg; ?>">
						</div>
						<div class="imgtitle">
							<h4><?php echo $displayTitle; ?></h4>
						</div>
					</div>
				</a>
				
			<?php endwhile; ?>
			</div>

			<!-- Good place for pagination links here -->
			<?php			
					///////////////// pagination links: perhaps put these BELOW where your results are echo'd out.
					if($postnum > $limit){
						echo "<ul class=\"pagination gallerypg\">";	
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
    <!-- <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button> -->
</div>

<script>
        // When the user scrolls down 20px from the top of the document, show the button
        // window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("myBtn").style.display = "block";
            } else {
                document.getElementById("myBtn").style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    </script>
<?php include ("includes/footer.php"); ?>