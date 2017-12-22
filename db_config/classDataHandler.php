<?php
/**
 * Created by PhpStorm.
 * User: nikol
 * Date: 14-Jul-17
 * Time: 3:22 PM
 */

class DataHandler {

    private $db;

    private $servername;
    private $username;
    private $password;
    private $database;

    public function __construct()
        {
            $this->servername = "localhost";
            $this->username   = "root";
            $this->password   = "";
            $this->database   = "phonebook";
            $this->db = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);;
        }

    public function executeQuery($q)
    {
        $r = $this->db->query($q, $mode = PDO::FETCH_ASSOC);

        if($r) var_dump('ima');
        else var_dump('nema');

        //$r = $r->fetchAll();
        //return $r;
    }

    public function test()
    {

        $q = "SELECT * FROM `test`";

        $r = $this->executeQuery($q);

        //$r = $r->fetchAll(); var_dump($r);

        //return $r;
    }

    public function insertContact($name, $lastname, $email, $phone)
    {
        $q = "INSER INTO `contacts`(`name`, `lastname`, `email`, `phone`) VALUES('$name','$lastname','$email','$phone')";

        $r = $this->executeQuery($q);
//
//        $r = $r->fetchAll();
//
//        if($r) return 1;
//
//        else return 0;
    }
}











