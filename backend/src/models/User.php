<?php

namespace Src\Models;

use PDOException;

class User
{
    private $pdo;
    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    function get($id)
    {
        $queryStr = "SELECT * FROM user WHERE user_id=:id";
        $stmt = $this->pdo->prepare($queryStr);

        try {
            $stmt->execute(array(
                "id" => $id
            ));
            $user = $stmt->fetch();
            return $user;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return null;
        }
    }

    function create($user)
    {
        $firstname = $user['firstname'];
        $lastname = $user['lastname'];
        $email = $user['email'];
        $password = $user['password'];

        $queryStr = "INSERT INTO User (first_name, last_name, email, password) 
        VALUES (:firstname, :lastname, :email, :password)";

        $stmt = $this->pdo->prepare($queryStr);

        try {
            $stmt->execute(
                array(
                    "firstname" => $firstname,
                    "lastname" => $lastname,
                    "email" => $email,
                    "password" => password_hash($password, PASSWORD_DEFAULT)
                )
            );
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    function update($id, $request)
    {
        $firstname = $request['firstname'];
        $lastname = $request['lastname'];

        $queryStr = "UPDATE user 
        SET first_name=:firstname,
        last_name=:lastname
        WHERE user_id = :id";

        $stmt = $this->pdo->prepare($queryStr);
        try {
            $stmt->execute(
                array(
                    "firstname" => $firstname,
                    "lastname" => $lastname,
                    "id" => $id
                )
            );
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }
    function delete($id)
    {
        $queryStr = "DELETE FROM user WHERE user_id = :id";

        $stmt = $this->pdo->prepare($queryStr);

        try {
            $stmt->execute(
                array(
                    "id" => $id
                )
            );

            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }
}