<?php
/**
 * Created by PhpStorm.
 * User: nikol
 * Date: 23-Dec-17
 * Time: 1:12 AM
 */

include('../db_config/classDataHandler.php');

function getList()
{
    $_profiller = new DataHandler();

    $r = $_profiller->selectContacts();

    return $r;
}