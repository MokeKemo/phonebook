<?php
/**
 * Created by PhpStorm.
 * User: moracan
 * Date: 1/5/2018
 * Time: 9:12 AM
 */

session_start();
session_destroy();

unset($_SESSION['user']);

include('../db_config/paths.php');

if(!isset($_SESSION['user']) && empty($_SESSION['user']))
{
    header('Location:'.BASE_PATH.'phonebook.php');
}