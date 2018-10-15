<?php include("includes/header.php"); ?>
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
    </style>
    <div class="container">
    <h1>Fictional Characters</h1>
<?php
    $result = mysqli_query($con, "SELECT * from $database") or die(mysqli_error($con));
    
    while ($row = mysqli_fetch_array($result)){
        //  echo $row['sid'] . "<br>";
        // echoChar($row)
        echoChar($row);
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
<?php include("includes/footer.php"); ?>