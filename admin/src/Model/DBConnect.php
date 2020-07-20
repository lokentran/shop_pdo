<?php
namespace App\Model;

use PDO;

class DBConnect {
    protected $dsn;

    protected $username;

    protected $password;

    public function __construct()
    {
        $this->dsn = 'mysql:host=localhost;dbname=codegym_shop;charset=utf8';
        $this->username = 'root';
        $this->password = '1234Tung@123';
    }

    function connect() {
        try {
            return new PDO($this->dsn, $this->username, $this->password);                   
        } catch (Exception $e) {
            echo  $e->getMessage;
        }
    }

}
