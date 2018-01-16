
<?php

session_start();

include('db_config/paths.php');

if(isset($_SESSION['user']) && !empty($_SESSION['user']))
{
    header('Location:'.PAGES_PATH.'add_contact_form.php');
}

?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>


    <link rel="stylesheet" href="<?=CSS_PATH.'add_contact.css'?>">

    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
    <script type="text/javascript" src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <script type="text/javascript" src="js/login.js"></script>


    <style>
    body {
    padding-top: 40px;
    padding-bottom: 40px;
    background-color: #eee;
    }

    .form-signin {
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
    }
    .form-signin .form-signin-heading,
    .form-signin .checkbox {
    margin-bottom: 10px;
    }
    .form-signin .checkbox {
    font-weight: 400;
    }
    .form-signin .form-control {
    position: relative;
    box-sizing: border-box;
    height: auto;
    padding: 10px;
    font-size: 16px;
    }
    .form-signin .form-control:focus {
    z-index: 2;
    }
    .form-signin input[type="email"] {
    margin-bottom: -1px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
    }
    .form-signin input[type="password"] {
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    }

</style>

</head>

<body>

<div class="container">

    <form class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button id="btn-act" class="btn btn-lg btn-primary btn-block" type="button" onclick="login();">Sign in</button>
    </form>

</div> <!-- /container -->

</body>

<script>

    //listeners on fields for login when enter is pressed

    $("#inputEmail").keyup(function(event) {              //listener for password field
        if (event.keyCode === 13) {
            $("#btn-act").click();
        }
    });

    $("#inputPassword").keyup(function(event) {         //listener for username field
        if (event.keyCode === 13) {
            $("#btn-act").click();
        }
    });

</script>>



