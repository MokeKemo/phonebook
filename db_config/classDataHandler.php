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

    public function executeQueryInsert($q)
    {
        $r = $this->db->query($q, $mode = PDO::FETCH_ASSOC);

        if($r) return 1;

        else return 0;
    }

    public function executeQuerySelect($q)
    {
        $r = $this->db->query($q, $mode = PDO::FETCH_ASSOC);

        $r = $r->fetchAll();

        return $r;
    }

    public function insertContact($name, $lastname, $email, $phone)
    {
        $q = "INSERT INTO `contacts`(`name`, `lastname`, `email`, `phone`) VALUES('$name','$lastname','$email','$phone')";

        $r = $this->executeQueryInsert($q);

        if($r) return 1;

        else return 0;
    }

    public function selectContact()
    {
        $q = "SELECT * FROM `contacts`";

        $r = $this->executeQuerySelect($q);

        return $r;
    }



}











