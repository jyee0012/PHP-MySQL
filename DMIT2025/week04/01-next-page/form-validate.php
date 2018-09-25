<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Form Validate</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <?php
            // on your own...retrieve form values and echo to test
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $phone = trim($_POST['phone']);
            $msg = trim($_POST['msg']);
            $error = "<h1>Success</h1> <p>If we see this, user has passed validation</p>";
            $msg = filter_var($msg , FILTER_SANITIZE_STRING);
            // this will exit the script; will not execute anything below very dangerous to use if you forget about it.
            // exit(); 
            if ($name == "" || $email == "" || $phone == ""){
                echo "<p>Please fill in your information</p>";
                exit();
            }
            if (strlen($name) < 2){
                echo "<p>Please enter an actual name</p>";
            }
            if ($email != ""){
                $email = filter_var($email, FILTER_SANITIZE_EMAIL); // removes unwanted characters
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    echo "<p>Please fill in CORRECT EMAIL format</p>";
                    exit();
                }
            }
            // Phone: this is only an academic exercise; many international phone numbers will not follow the same formats. Many devs will not attempt to validate phone numbers.
            $phoneNotVal = phoneVal($phone);
            if ($phoneNotVal){
                echo $phoneNotVal;
                exit();
            }
            function phoneVal($phone){
                $phone = str_replace(" ","", $phone);
                $phone = str_replace("-","", $phone);
                $phone = str_replace(".","", $phone);
                $phone = str_replace("(","", $phone);
                $phone = str_replace(")","", $phone);
                if (!is_numeric($phone)){
                    return "<p>That is not a number</p>";
                }
                if (strlen($phone) != 10){
                    return "<p>That is not a 10 digit phone number</p>";
                }
                // echo $phone;
            }
            // message
            // on your own, limit chars max and min; strlen($message)
            if (strlen($msg > 2000)){
                echo "<p>Please enter a shorter message.</p>";
                exit();
            }
            // echo "$name, $email, $phone, $msg";
            echo $error;
        ?>        
        <script src="" async defer></script>
    </body>
</html>