<?php
/**
 * Created by PhpStorm.
 * User: nikol
 * Date: 05-Jan-18
 * Time: 12:31 AM
 */

session_start();
session_destroy();

unset($_SESSION['username']);

include('../db_config/paths.php');

if(!isset($_SESSION['username']) && empty($_SESSION['username']))
{
    header('Location:'.BASE_PATH.'phonebook.php');
}