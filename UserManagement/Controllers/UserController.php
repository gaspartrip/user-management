<?php namespace Controllers;
use Models\User as User;
use DAO\UserDAO as UserDAO;
use Controllers\HomeController as HomeController;
use \PDOException as PDOException;

class UserController{
    
    private $userDAO;
    private $homeController;

    public function __construct() {
        $this->userDAO = new UserDAO();
        $this->homeController = new HomeController();
    }

    public function add($code, $firstName, $lastName, $email) {
        $user = new User();

        $user->setCode($code);
        $user->setFirstName($firstName);
        $user->setLastName($lastName);
        $user->setEmail($email);

        try
        {
            if($this->userDAO->create($user) != 0) {
                $message = "Successful creation";
                $messageType = 1;
            }
        }
        catch(PDOException $e)
        {
            if ($e->errorInfo[1] == 1062) {
                $message = "There is already a user with that code";
            }
            else {
                $message = "There was a problem with the database";
            }
            $messageType = 0;
        }

        $this->homeController->users($message, $messageType);
    }

    public function delete($code) {
        try
        {
            if($this->userDAO->delete($code) != 0) {
                $message = "Successful deletion";
                $messageType = 1;
            }
        }
        catch(PDOException $e)
        {
            $message = "There was a problem with the database";
            $messageType = 0;
        }

        $this->homeController->users($message, $messageType);
    }

    public function loadUsers() {
        try
        {
            $users = $this->userDAO->retrieveAll();
        }
        catch(PDOException $e)
        {
            $users = null;
        }

        return $users;
    }

    /*For jQuery*/
    public function loadUser($code) {
        try
        {
            $user = $this->userDAO->retrieveOne($code);

        }
        catch(PDOException $e)
        {
            $user = null;
        }

        /*Encoding array in JSON format:*/
        if($user != null) {
            $arrayToEncode = array();
            $arrayToEncode["id"] = $user->getId();
            $arrayToEncode["code"] = $user->getCode();
            $arrayToEncode["firstName"] = $user->getFirstName();
            $arrayToEncode["lastName"] = $user->getLastName();
            $arrayToEncode["email"] = $user->getEmail();
            echo json_encode($arrayToEncode);
        }
    } 
}
?>