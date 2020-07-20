<?php

namespace App\Controller;
use App\Model\UserManager;
use App\Model\User;

class UserController {
    protected $userController;

    public function __construct()
    {
        $this->userController = new userManager();
    }

    public function getAllUser() {
        $users = $this->userController->getAlluser();
        include('src/View/user/list.php');
    }

    public function addUser() {
        include('src/View/user/add.php');
        if(isset($_POST['sbm'])) {
            $name = $_POST['userName'];
            $pass = $_POST['password'];

            $user = new User($name, $pass);
            $this->userController->addUser($user);
            header('location:index.php');
        }
    }
}