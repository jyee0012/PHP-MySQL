<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>01 - Upload</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <!-- The attribute enctype="multipart/form-data" MUST be in the form tag, or else uploads will not work! -->
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <input type="file" name="myfile">
            <br>
            <input type="submit" name="mysubmit">
        </form>

        <?php
        // The $_FILES array: An array of info about the uploaded file.

        // echo "<pre>"; // the preformat tag; preserves white space; allows arrays to look pretty as we view what's in them

        // $_FILES['form-element-name'];
        // print_r($_FILES['myfile']);
        // echo "</pre>";

        if (isset($_POST['mysubmit'])){
            echo "Upload: " . $_FILES['myfile']['name'] . "<br>";
            echo "Type: " . $_FILES['myfile']['type'] . "<br>";
            echo "Size: " . ($_FILES['myfile']['size']/1024) . " KB <br>";
            // echo "Temp Name: " . $_FILES['myfile']['tmp_name'] . "<br>";
        
            // The uploaded file is not yet aceessible to us. We must move it from the /tmp/ dir to somewhere we can access it, and then we have to give it a name (and file ext).
            // move_uploaded_file();
            echo "<br>";
            if (move_uploaded_file($_FILES['myfile']['tmp_name'], "uploadedfiles/" . $_FILES['myfile']['name'])){
                echo "<h3>Upload Successful</h3>";
            }else{
                echo "Errors: " . $_FILES['myfile']['error'] . "<br>";
            }
        }
        
        
        ?>
        <script src="" async defer></script>
    </body>
</html>