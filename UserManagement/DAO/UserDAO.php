<?php namespace DAO;
use Models\User as User;
use DAO\Connection as Connection;
use \PDOException as PDOException;

class UserDAO {

    private $connection;

    public function create(User $user) {
        $value = 0;

        try
        {
            $query = "INSERT INTO users (code, firstname, lastname, email) VALUES (:code, :firstname, :lastname, :email)";
            $parameters["code"] = $user->getCode();
            $parameters["firstname"] = $user->getFirstName();
            $parameters["lastname"] = $user->getLastName();
            $parameters["email"] = $user->getEmail();

            $this->connection = Connection::getInstance();

            $value = $this->connection->executeNonQuery($query, $parameters);
        }
        catch (PDOException $e)
        {
            throw $e;
        }
        return $value;
    }

    public function retrieveAll() {
        $userList = array();

        try
        {
            $query = "SELECT * FROM users";

            $this->connection = Connection::getInstance();

            $resultSet = $this->connection->execute($query);

            if(!empty($resultSet)) {
                foreach ($resultSet as $row) {
                    $user = $this->read($row);
                    array_push($userList, $user);
                }
            }
        }
        catch (PDOException $e)
        {
            throw $e;
        }
        return $userList;
    }

    public function retrieveOne($code) {
        $user = null;
        try
        {
            $parameters['code'] = $code;

            $query = "SELECT * FROM users WHERE code=:code";

            $this->connection = Connection::getInstance();

            $resultSet = $this->connection->execute($query, $parameters);
            if(!empty($resultSet)) {
                $user = $this->read($resultSet[0]);
            }
        }
        catch (PDOException $e)
        {
            throw $e;
        }
        return $user;
    }

    public function delete($code) {
        $query = "DELETE from users WHERE code=:code";
        $parameters['code'] = $code;

        $value = 0;

        try
        {
            $this->connection = Connection::getInstance();
            $value = $this->connection->executeNonQuery($query, $parameters);
        }
        catch(PDOException $e)
        {
            throw $e;
        }
        return $value;
    }

    public function read($resultSet) {
        $user = new User();
        $user->setId($resultSet["id"]);
        $user->setCode($resultSet["code"]);
        $user->setFirstName($resultSet["firstname"]);
        $user->setLastName($resultSet["lastname"]);
        $user->setEmail($resultSet["email"]);

        return $user;
    }
}
?>