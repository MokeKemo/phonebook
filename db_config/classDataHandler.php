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
            $this->db = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
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

    public function login($user, $pass)
    {
        $pass   = md5($pass);

        $q      = "SELECT `user`, `password` FROM `users` WHERE `user`='$user' AND `password`='$pass'";

        $r      = $this->executeQuerySelect($q);

        if($r) return 1;

        else return 0;
    }

    public function insertContact($name, $lastname, $email, $phone, $user)
    {
        $q = "INSERT INTO `contacts`(`name`, `lastname`, `email`, `phone`, `user`)
                    VALUES('$name','$lastname','$email','$phone', '$user')";

        $r = $this->executeQueryInsert($q);

        if($r) return 1;

        else return 0;
    }

    public function selectContacts($user)
    {
        $q = "SELECT * FROM `contacts` WHERE `user` = '$user' ORDER BY `name` ASC";

        $r = $this->executeQuerySelect($q);

        return $r;
    }

    public function searchContacts($param, $user)
    {
        $q = "SELECT * FROM `contacts` WHERE `name` LIKE '$param%' AND `user`='$user' ORDER BY `name` ASC";

        $r = $this->executeQuerySelect($q);

        return $r;
    }

    public function deleteContact($name, $lastname, $phone)
    {
        $q = "DELETE FROM `contacts` WHERE `name`='$name' AND `lastname`='$lastname' AND `phone`='$phone'";

        $r = $this->executeQueryInsert($q);

        return $r;
    }
}











