<?php
require_once "./DBC.php";

        if (empty($_POST["username"]) || empty($_POST["password"])){
            $_SESSION["error"] = "Username or Password is empty";
            header('Location: LoginForm.php');
            exit();
        }
        
        $username = $_POST["username"];
        $password = $_POST["password"];

/**
 * @param string $username
 * @param string $password
 * @return void
 */

function Overeni(string $username, string $password):void{
    $connection = DBC::getConnection();
    $statement = $connection->prepare("SELECT id, username, password FROM User WHERE username = :username LIMIT 1");
    $statement->execute([":username" => $username]);

    $result = $statement->fetch(PDO::FETCH_ASSOC);
    if ($result && password_verify($password, $result["password"])) {
        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_name"] = $result["username"];
        header("Location: /");
    } else {
        $_SESSION["error"] = "Invalid login";
        header("Location: /login");
    }

}


        /*
        if($result = $connection->query($ps)) {
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    if ($row["jmeno"] == $username && $row["heslo"] == $password){
                      $_SESSION["username"] = $username;
                      DBC::closeConnection();

                        header("Location: welcome.php");

                    }
                }
            }
        }else{
            die("Connection faild");
        }
       
        DBC::closeConnection();
*/
        

