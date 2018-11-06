<?php
include("mysql_connect.php");// here we include the connection script; since this file(header.php) is included at the top of every page we make, the connection will then also be included. Also, config options like BASE_URL are also available to us.
include("functions.php");

$pageTitle = "Gallery - " . makePageTitle();

$loginText = "login";
if ($loggedin){
  $loginText = "logout";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   

    <title><?php echo $pageTitle; ?></title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Emoticon Script -->
    <script type="text/javascript">
    function emoticon(text) {
      var txtarea = document.querySelector('#myMsg');
      text = ' ' + text + ' ';
      if (txtarea.createRange && txtarea.caretPos) {
        var caretPos = txtarea.caretPos;
        caretPos.text = caretPos.text.charAt(caretPos.text.length - 1) == ' ' ? text + ' ' : text;
        txtarea.focus();
      } else {
        txtarea.value  += text;
        txtarea.focus();
      }
    }
    </script>

    <!-- Your Custom styles for this project -->
    <style>
      .emoticon{
        max-width: 28px;
        max-height: 28px;
        margin-bottom: 0.7rem;
      }
    </style>
    <!--  Note how we can use BASE_URL constant to resolve all links no matter where the file resides. -->
    <link href="<?php echo BASE_URL ?>css/styles.css" rel="stylesheet"> 
    <link rel="stylesheet" href="css/style.css" type="text/css">
  </head>

  <body>

    <div class="container">

      <?php include("navbar.php"); ?>

