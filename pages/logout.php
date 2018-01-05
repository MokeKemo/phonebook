<?php
/**
 * Created by PhpStorm.
<<<<<<< HEAD
 * User: nikol
 * Date: 05-Jan-18
 * Time: 12:31 AM
=======
 * User: moracan
 * Date: 1/5/2018
 * Time: 9:12 AM
>>>>>>> 6e7d523ca18a46019093c646687be1fea9e343dd
 */

session_start();
session_destroy();

<<<<<<< HEAD
unset($_SESSION['username']);

include('../db_config/paths.php');

if(!isset($_SESSION['username']) && empty($_SESSION['username']))
=======
unset($_SESSION['user']);

include('../db_config/paths.php');

if(!isset($_SESSION['user']) && empty($_SESSION['user']))
>>>>>>> 6e7d523ca18a46019093c646687be1fea9e343dd
{
    header('Location:'.BASE_PATH.'phonebook.php');
}