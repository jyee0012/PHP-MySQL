<?php include("includes/admin-check.php"); ?>
<?php include("includes/header.php"); ?>
<?php
	// for testing
	// echo $_SERVER['PHP_SELF']; 	// /dmit2025/week07/contacts/index.php
	// echo dirname(__FILE__); 		// /home/jyee12/public_html/dmit2025/week07/
	// echo dirname(__FILE__); 		// /home/jyee12/public_html/dmit2025/week07/contacts
	// echo basename(__DIR__); 		// contacts
	// echo BASE_URL; 				// http://jyee12.dmitstudent.ca/dmit2025/week07/contacts/
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
		<h1>Blog Posts</h1>
		<?php
			$sql = "SELECT * from $database ORDER BY jye_timedate DESC";
			$result = mysqli_query($con, $sql) or die(mysqli_error($con));
		?>
			<div class\"contacts\">
			<?php while ($row = mysqli_fetch_array($result)): ?>
				
				<!-- this is for quick and dirty layout; best to not use the well for your labs -->
				<div class="well clearfix"> 
					<h3><?php echo $row['jye_title']; ?></h3>
					<p><?php echo nl2br(addEmoticons($row['jye_message']));?></p>
					<?php $timedate = strtotime($row['jye_timedate']); ?>
					<a class="pull-right"<?php echo "href=\"admin/edit.php?blogid=$bid\""; ?>><i>Edit</i></a>
					<p class="pull-right"><i><?php echo date("F j, Y, g:i a", $timedate); ?></i></p>
				</div>

			<?php endwhile; ?>
	</div>
	<?php
		function replaceEmoticons($txt, $input, $src) {
			$thisEmoticon = "<img src=\"emoticons/$src\">";
			$txt = str_replace("$input", $thisEmoticon, $txt);
		}
		function addEmoticons($txt){
			replaceEmoticons($txt, "", "");
			return $txt;
		}
	?>
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
</div>

<script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

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