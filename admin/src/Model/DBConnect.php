<?php

namespace App\Model;

class DBConnect
{
    protected $dsn;
    protected $username;
    protected $password;

    public function __construct()
    {
        $this->dsn = "mysql:host=localhost;dbname=demoCase;charset=utf8";
        $this->username = 'root';
        $this->password = '1234Tung@123';
    }

    public function connect()
    {
        try {
            
            return new \PDO($this->dsn, $this->username, $this->password);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

// $db = new DBConnect();
// $stmt = $db->connect()->query("SELECT * FROM products");
// $data = $stmt->fetchAll();

// echo "<pre>";
// print_r($data);
// echo "</pre>";

// foreach($data as $key => $item) {
//     echo $item['quantity'] . "<br>";
// }
