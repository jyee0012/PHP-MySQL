<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Calculator Form</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- These must be in place to use Bootstrap ! -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <?php
        // retrieve (and test) the form values
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $op = $_POST['op'];
        //echo "$num1 $op $num2.";
        switch($op){
            case "+":
            $result = $num1 + $num2;
            break;
            case "-":
            $result = $num1 - $num2;
            break;
            case "*":
            $result = $num1 * $num2;
            break;
            case "/":
            $result = $num1 / $num2;
            break;
        }
        ?>
        <h1>Calculator</h1>
		<form name="myform" class="form-inline" method="post" action="#">
        <div class="form-group">
            <input type="text" class="form-control" name="num1" id="num1" value="<?php echo $num1?>">
            <select name="op" id="op">
                <?php
                if($op){
                    echo "<option>$op</option>";
                }
                // use selected attribute in one of the existing options **better**
                ?>
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="/">/</option>
                <option value="*">*</option>
            </select>
            <input type="text" class="form-control" name="num2" id="num2" value="<?php echo $num2?>">
		    <input type="submit" class="btn btn-default">
		  </div>
        </form>
        <?php
        if ($result) {
            echo "<h2>Your answer:</h2>";
            echo "<p>";
            echo "$result";
            echo "</p>";
        }
        ?>
        <script src="" async defer></script>
    </body>
</html>