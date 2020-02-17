<?php namespace Controllers;
use DAO\UserDAO as UserDAO;
use Controllers\UserController as UserController;

class HomeController {
    
    public function index() {
        require_once(VIEWS_PATH."head.php");
        require_once(VIEWS_PATH."nav-bar.php");
        require_once(VIEWS_PATH."home.php");
        require_once(VIEWS_PATH."footer.php");
    }

    public function users($message = null, $messageType = null) {
        $userController = new UserController();
        $userList = $userController->loadUsers();
        if(!$userList) {
            $userList = array();
        }
        require_once(VIEWS_PATH."head.php");
        require_once(VIEWS_PATH."nav-bar.php");
        require_once(VIEWS_PATH."users.php");
        require_once(VIEWS_PATH."footer.php");
    }

    public function search() {
        require_once(VIEWS_PATH."head.php");
        require_once(VIEWS_PATH."nav-bar.php");
        require_once(VIEWS_PATH."search.php");
        require_once(VIEWS_PATH."footer.php");
    }
}
?>