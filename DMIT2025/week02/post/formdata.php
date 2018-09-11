<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Form Data</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <h1>Form Data</h1>
        <h2>Here lies the data you have submitted into my grasp!</h2>
        <?php
        // my pref is to set PHP vars to these values, then use those vars where ever I need them
        //  this is the value of the name attribute for that one form element
        $user = $_POST['user'];
        $email = $_POST['emailaddress'];
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $country = $_POST['country'];        
        $sex = $_POST['sex'];
        $comment = $_POST['comments'];
        $terms = $_POST['terms'];

        if($address2 == ""){
            $address = "[$address1] in [$city], [$state] of [$country]"; 
        }else{
            $address = "[$address1], or [$address2] in [$city], [$state] of [$country]";
        }

        if ($terms){
            $agreed = "agreeing";
        }else{
            $agreed = "not agreeing";
        }

        echo "<p>";
        echo "Hello [$user], I have noted that you live at $address.";
        echo "</p>";
        echo "<p>";
        echo "I may also contact you at [$email] about you [$agreed] the terms and conditions.";
        echo "</p>";
        ?>

        <script src="" async defer></script>
    </body>
</html>