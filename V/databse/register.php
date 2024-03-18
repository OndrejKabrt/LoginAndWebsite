<?php
require_once "./DBC.php";

        if (empty($_POST["username"]) || empty($_POST["password"]))
        {
            $_SESSION["error"] = "Username or Password is empty";
            header('Location: RegisterForm.php');
            exit();
        }
        

        if(insertUser($_POST["name"], $_POST["password"])){
            echo "You have successfully registeded!";
            $_SESSION["user"];
        } else {
            $_SESSION["error"] = "Unexpected error just happened!";
            header('Location: /register');
        }


        /**
        * @param string $username
        * @param string $password
        * @return bool
        */
function insertUser(string $username, string $password): bool
{
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $connection = DBC::getConnection();
    $statement = $connection->prepare("INSERT INTO user (username, password) VALUES (:username, :password)");
    $statement->bindParam(":username", $username);
    $statement->bindParam(":password", $hashedPassword);
    return $statement->execute();
}