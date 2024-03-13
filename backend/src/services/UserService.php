<?php

namespace Src\Services;

use Src\Models\Authentication;
use Src\Models\User;
use Src\Config\DatabaseConnector;
use Src\Utils\Checker;
use Src\Utils\Response;

class UserService
{
    private $authenticationModel;
    private $pdo;
    private $userModel;
    private $tokenService;
    function __construct()
    {
        $this->pdo = (new DatabaseConnector())->getConnection();
        $this->authenticationModel = new Authentication($this->pdo);
        $this->userModel = new User($this->pdo);
        $this->tokenService = new TokenService();
    }

    function register($user)
    {
        if (!(Checker::isFieldExist($user, ["firstname", "lastname", "email", "password", "confirm_password"]))) {
            return Response::payload(
                400,
                false,
                "firstname, lastname, email, password, confirm_password is required"
            );
        }

        $errors = $this->validate($user);

        if (count($errors) > 0) {
            return Response::payload(
                400,
                false,
                "registration unsuccessful",
                errors: $errors
            );
        }

        $creation = $this->userModel->create($user);
        return $creation ? Response::payload(
            200,
            true,
            "registration successful",
            errors: $errors
        ) : array("message" => "Contact administrator");
    }

    function getInformation($id)
    {
        $matches = $this->tokenService->isTokenMatch($id);
        if (!$matches) {
            return Response::payload(401, false, "unauthorized access");
        }

        $user = $this->userModel->get($id);

        if (!$user) {
            return Response::payload(404, false, "user not found");
        }

        unset($user['password']);
        return Response::payload(200, true, "found user", array("user" => $user));
    }

    function deleteUser($id)
    {
        $matches = $this->tokenService->isTokenMatch($id);
        if (!$matches) {
            return Response::payload(401, false, "unauthorized access");
        }

        $isDeleted = $this->userModel->delete($id);

        if (!$isDeleted) {
            return Response::payload(500, false, "Deletion Unsuccessful");
        }

        return Response::payload(200, true, "Deletion successful");
    }

    function updateUser($id, $newUserInfo)
    {
        $matches = $this->tokenService->isTokenMatch($id);
        if (!$matches) {
            return Response::payload(401, false, "unauthorized access");
        }

        if (count($newUserInfo) < 1) {
            return Response::payload(400, false, "no fields found");
        }

        $errors = $this->validate($newUserInfo);

        if (count($errors) > 0) {
            return Response::payload(400, false, "Update Unsuccessful", errors: $errors);
        }

        if (!$this->userModel->get($id)) {
            return Response::payload(404, false, "User not found");
        }

        $isUpdated = $this->userModel->update($id, $newUserInfo);
        return $isUpdated ? Response::payload(200, true, "Update successful")
            : array("message" => "Contact administrator");
    }
    function validate($user)
    {
        $errors = array();

        if (Checker::isFieldExist($user, ["firstname"])) {
            $validateFirstName = $this->validateFirstNameFormat($user["firstname"]);
            if ($validateFirstName) $errors["firstname"] = $validateFirstName;
        }
        if (Checker::isFieldExist($user, ["lastname"])) {
            $validateLastName = $this->validateLastNameFormat($user["lastname"]);
            if ($validateLastName) $errors["lastname"] = $validateLastName;
        }
        if (Checker::isFieldExist($user, ["email"])) {
            $isEmailExist = $this->EmailExist($user["email"]);
            $validateEmail = $this->validateEmailFormat($user["email"]);

            if ($isEmailExist) $errors["email"] = $isEmailExist;
            if ($validateEmail) $errors["email"] = $validateEmail;
        }
        if (Checker::isFieldExist($user, ["password"])) {
            $validatePassword = $this->validatePasswordFormat($user["password"]);
            $isConfirmPasswordMatch = $this->confirmPasswordDoesNotMatch($user["password"], $user["confirm_password"]);

            if ($validatePassword) $errors["password"] = $validatePassword;
            if ($isConfirmPasswordMatch) $errors["password1"] = $isConfirmPasswordMatch;
        }

        return $errors;
    }

    function EmailExist($email)
    {
        $email = $this->authenticationModel->get("email", $email);
        return $email == true ? "email already exist" : false;
    }

    function validateFirstNameFormat($firstname)
    {
        return preg_match('/^[a-zA-Z ]+$/', $firstname) ? null : "should contain only letters and spaces";
    }
    function validateLastNameFormat($lastname)
    {
        return preg_match('/^[a-zA-Z ]+$/', $lastname) ? null : "should contain only letters and spaces";
    }
    function validateEmailFormat($email)
    {
        return preg_match('/^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$/', $email) ? null : "please enter a valid email address";
    }
    function validatePasswordFormat($password)
    {
        $requirements = "password should be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character";
        return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password) ? null : $requirements;
    }
    function confirmPasswordDoesNotMatch($password, $password2)
    {
        return $password !== $password2 ? "password does not match" : false;
    }
}