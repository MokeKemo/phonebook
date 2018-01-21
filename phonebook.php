
<?php

session_start();

include('db_config/paths.php');

if(isset($_SESSION['user']) && !empty($_SESSION['user']))
{
    header('Location:'.PAGES_PATH.'add_contact_form.php');
}

include('headers/index.header.php');

?>

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



