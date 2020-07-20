<?php

namespace App\Model;
use App\Model\User;

class UserManager {
    protected $database;

    public function __construct()
    {   
        $db = new DBConnect();
        $this->database = $db->connect();
    }

    public function getAllUser() {
        $sql = "SELECT * FROM users";
        $stmt = $this->database->query($sql);
        $data = $stmt->fetchAll();
        $arr = [];
        foreach ($data as $key => $item) {
            $user = new User($item['userName'], $item['pass']);
            $user->setId($item['userId']);
            array_push($arr,$user);
        }
        return $arr;
    }

    public function addUser($user) {
        $sql = "INSERT INTO users (userName,pass) VALUES (:userName, :pass)";
        $stmt = $this->database->prepare($sql);
        $stmt = bindParam(':userName', $user->getUserName());
        $stmt = bindParam(':pass', $user->getPassword());
        $sql->execute();
    }

}