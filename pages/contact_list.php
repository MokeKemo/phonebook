<?php
/**
 * Created by PhpStorm.
 * User: nikol
 * Date: 22-Dec-17
 * Time: 10:23 PM
 */
session_start();

include('../controllers/profiller.php');
include('../db_config/paths.php');

if(!isset($_SESSION['user']) && empty($_SESSION['user']))
{
    header('Location:'.BASE_PATH.'phonebook.php');
}

$contacts_list = getList($_SESSION['user']);

include('menu2.php');

?>

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