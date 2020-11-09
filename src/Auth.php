<?php
namespace App;

use App\DAO\UserDAO;
use App\Model\User;

class Auth {

    public function __construct()
    {
        if(session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public function getUser(): User
    {
        $dao = new UserDAO();
        return $dao->findById((int) $_SESSION['auth']);
    }

    public function isLogged(): bool
    {
        return !empty($_SESSION) && !empty($_SESSION['auth']);
    }

}