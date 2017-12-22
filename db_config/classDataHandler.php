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

        return $r;
    }

    public function test()
    {

        $q = "SELECT * FROM `test`";

        $r = $this->executeQuery($q);

        $r = $r->fetchAll();

        return $r;
    }
}
