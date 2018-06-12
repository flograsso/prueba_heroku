<?php

require_once ('includes/phpFunctions.php');
global $meli;
global $access_token;

 
sec_session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>

        <!-- CSS -->
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries
        -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]> <script
        src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script> <script
        src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link
            rel="apple-touch-icon-precomposed"
            sizes="144x144"
            href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link
            rel="apple-touch-icon-precomposed"
            sizes="114x114"
            href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link
            rel="apple-touch-icon-precomposed"
            sizes="72x72"
            href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link
            rel="apple-touch-icon-precomposed"
            href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>
        <?php if (login_check($mysqli) == true) { 
                include ("includes/example_login.php");
                ?>

        <form class="form-horizontal" action="/action_page.php">
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" placeholder="Enter email">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Password:</label>
                <div class="col-sm-10">
                    <input
                        type="password"
                        class="form-control"
                        id="pwd"
                        placeholder="Enter password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label><input type="checkbox">
                            Remember me</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </div>
        </form>
    <?php
                }
               


           
            else  
                header("Location: login.php?error=Debe iniciar sesión para acceder a esta página");
        
        
        ?>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script type="text/JavaScript" src="js/forms.js"></script>
    </body>
</html>