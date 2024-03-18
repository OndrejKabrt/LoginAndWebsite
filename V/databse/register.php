<?php
require_once "./DBC.php";

        if (empty($_POST["username"]) || empty($_POST["password"]))
        {
            header('Location: RegisterForm.php');
            exit();
        }
        
        $username = $_POST["username"];
        $password = $_POST["password"];

        $HashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if($connection = DBC::getConnection()->query("INSERT INTO uzivatel (id, jmeno, heslo) VALUES ( '$username', '$HashedPassword');")){
        }else{
            die("Connection faild");
        }

        $_SESSION["username"] = $username;
	    $_SESSION["password"] = $password;

        DBC::closeConnection();
        header("Location: index.php");