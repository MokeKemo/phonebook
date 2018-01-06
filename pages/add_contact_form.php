<?php
/**
 * Created by PhpStorm.
 * User: moracan
 * Date: 12/18/2017
 * Time: 4:05 PM
 */

session_start();

include('../db_config/paths.php');

if(!isset($_SESSION['user']) && empty($_SESSION['user']))
{
    header('Location:'.BASE_PATH.'phonebook.php');
}

include('menu.php');

?>




<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <!-- Website Font style -->

    <!--link rel="stylesheet" href="style.css"-->
    <link rel="stylesheet" href="../css/add_contact.css">
    <!-- Google Fonts -->
    <script type="text/javascript" src="../js/phonebook.js"></script>



    </head>
<body>
<div id="alertBox">

</div>
<div id="insertAlert"><div id="alertText" class="alert alert-success hidden"> <center><strong>Success!</strong> You inserted contact into your phonebook.</center> </div></div>
<div id="insertAlert2" class="alert alert-danger hidden">
    <center><strong>Wrong input!</strong> You inserted incorrect info.</center>
</div>

<div class="container">
    <div class="row main">
        <div class="main-login main-center">
            <h5>You can add new contacts here.</h5>
            <form class="" method="post" action="#">

                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Contact Name</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="name" id="name"  placeholder="Enter contact Name"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="username" class="cols-sm-2 control-label">Last Name</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="lastname" id="lastname"  placeholder="Enter Contacts Last Name"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="cols-sm-2 control-label">Contact Email</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="email" id="email"  placeholder="Enter Contact Email (optional)"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="cols-sm-2 control-label">Phone Number</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone fa-lg" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="phone" id="phone"  placeholder="Enter Contact Phone"/>
                        </div>
                    </div>
                </div>

                <!--div class="form-group">
                    <label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/>
                        </div>
                    </div>
                </div-->

                <div class="form-group ">
                    <button type="button" id="button" onclick="getContactInfo();" class="btn btn-primary btn-lg btn-block login-button">Add Contact</button>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

</body>
