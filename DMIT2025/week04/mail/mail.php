<!DOCTYPE html>
<?php
if (!isset($_POST['submit'])){
    
}
?>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Mail</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <?php
        // retrieve form values; echo to test
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $msg = trim($_POST['msg']);
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $msg = filter_var($msg, FILTER_SANITIZE_STRING);
        $ip = $_SERVER['REMOTE_ADDR'];
        // echo $ip;

        if ($name == "" || $email == ""){
            echo "<p>Please fill in your information</p>";
            exit();
        }
        if ($email != ""){
            $email = filter_var($email, FILTER_SANITIZE_EMAIL); // removes unwanted characters
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo "<p>Please fill in CORRECT EMAIL format</p>";
                exit();
            }
        }
        echo "<p>Success: let's send mail.</p>";
        // Create Mail Message
        $myMail .= "Web Form Submission - [Client Name]\n";
        $myMail .= "\nName: $name \n";
        $myMail .= "Sender Email: $email\n";
        $myMail .= "Message: $msg\n";
        $myMail .= "Sent from: $ip\n";
        $myMail .= "";
        $myMail .= "";
        $myMail .= "";
        $myMail .= "";
        $myMail .= "";

        // CREATE HEADERS
        $headers = "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/plain; charset=iso-8859-1\n";
        $headers .= "X-Priority: 1\n";
        $headers .= "X-MSMail-Priority: Normal\n";
        $headers .= "X-Mailer: php\n";
        $headers .= "From:$name <$email> \r\n\r\n";
        
        $to = "jyee0012@gmail.com";
        $subject = "Web Form Submission";
        mail($to, $subject, $myMail, $headers);
        // let's send some mail

        ?>
        <script src="" async defer></script>
    </body>
</html>