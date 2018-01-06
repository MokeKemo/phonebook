<?php
/**
 * Created by PhpStorm.
 * User: nikol
 * Date: 05-Jan-18
 * Time: 12:31 AM
 */

session_start();
session_destroy();


include('../db_config/paths.php');

unset($_SESSION['user']);

if(!isset($_SESSION['user']) && empty($_SESSION['user']))
{
    header('Location:'.BASE_PATH.'phonebook.php');
}