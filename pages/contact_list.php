<?php
/**
 * Created by PhpStorm.
 * User: nikol
 * Date: 22-Dec-17
 * Time: 10:23 PM
 */
session_start();
error_reporting(0);
include('../controllers/profiller.php');

if(!isset($_SESSION['username']) && empty($_SESSION['username']))
{
    header('Location:'.BASE_PATH.'phonebook.php');
}

$contacts_list = getList();

?>

<head>

    <title>Phonebook</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="../css/add_contact.css">

    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
    <script type="text/javascript" src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <script type="text/javascript" src="../js/phonebook.js"></script>

    <style>

        .navbar-brand { position: relative; z-index: 2; }

        .navbar-nav.navbar-right .btn { position: relative; z-index: 2; padding: 4px 20px; margin: 10px auto; }

        .navbar .navbar-collapse { position: relative; }
        .navbar .navbar-collapse .navbar-right > li:last-child { padding-left: 22px; }

        .navbar .nav-collapse { position: absolute; z-index: 1; top: 0; left: 0; right: 0; bottom: 0; margin: 0; padding-right: 120px; padding-left: 80px; width: 100%; }
        .navbar.navbar-default .nav-collapse { background-color: #f8f8f8; }
        .navbar.navbar-inverse .nav-collapse { background-color: #222; }
        .navbar .nav-collapse .navbar-form { border-width: 0; box-shadow: none; }
        .nav-collapse>li { float: right; }

        .btn.btn-circle { border-radius: 50px; }
        .btn.btn-outline { background-color: transparent; }

        @media screen and (max-width: 767px) {
            .navbar .navbar-collapse .navbar-right > li:last-child { padding-left: 15px; padding-right: 15px; }

            .navbar .nav-collapse { margin: 7.5px auto; padding: 0; }
            .navbar .nav-collapse .navbar-form { margin: 0; }
            .nav-collapse>li { float: none; }
        }


    </style>

    </head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-3">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">PHONEBOOK</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-3">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="add_contact_form.php">Add Contact</a></li>
                <li><a href="contact_list.php">Contacts List</a></li>
                <li><a href="#">Connector</a></li>
                <li>
                    <form class="navbar-form navbar-right" role="search"> <div class="form-group"> <input id="searchText" onkeyup="searchContacts(this.value);" type="text" class="form-control" placeholder="Search" /> </div> </form>
                    <!--a class="btn btn-default btn-outline btn-circle" aria-expanded="false" aria-controls="nav-collapse3">Search</a-->
                </li>

            </ul>
            <div class="collapse nav navbar-nav nav-collapse" id="nav-collapse3">
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search" />
                    </div>
                    <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-search" aria-hidden="false"></span></button>
                </form>
            </div>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
</nav><!-- /.navbar -->



<div class="container">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">All contacts</a></li>
        <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
        <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
        <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
    </ul>

    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <h3>All contacts</h3>

            <table class="table table-hover table-inverse">
                <thead>
                <tr>
                    <th>N</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <?php
                $num = 1;
                foreach($contacts_list as $contact)
                {
                    echo'
    <tbody id="tableBodyId" class="tableBody">
    <tr id="trow'.$num.'">
        <th scope="row">'.$num.'</th>
        <td id="name'.$num.'">'.$contact["name"].'</td>
        <td id="lastname'.$num.'">'.$contact["lastname"].'</td>
        <td>'.$contact["email"].'</td>
        <td id="phone-'.$num.'">'.$contact["phone"].'</td>
        <td><button onclick="deleteContact('.$num.');" type="button" class="btn btn-danger">D</button></td>
    </tr>

    </tbody>'; $num++;
                }
                ?>
            </table>

             </div>
        <div id="menu1" class="tab-pane fade in">
            <h3>Menu 1</h3>

        </div>
        <div id="menu2" class="tab-pane fade in">
            <h3>Menu 2</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
        </div>
        <div id="menu3" class="tab-pane fade in">
            <h3>Menu 3</h3>
            <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
        </div>
    </div>
</div>

</body>