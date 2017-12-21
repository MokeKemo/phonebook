<?php
/**
 * Created by PhpStorm.
 * User: nikol
 * Date: 21-Jul-17
 * Time: 10:53 PM
 */

include('../db/classDataHandler.php');

$res = new DataHandler();

//$q = "SELECT * FROM `test`";
//
//$result = $res->executeQuery($q);
//
//$re    = $result->fetchAll();
//
//foreach($re as $r) {
//    print_r($r);
//}

if(isset($_POST['case']) AND !empty($_POST['case'])) {
    switch ($_POST['case']) {
        case 'contactInfo':
                
            break;



    }

}

