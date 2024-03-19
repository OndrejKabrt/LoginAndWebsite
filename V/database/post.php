<?php
include_once 'DBC.php';

if(empty($_POST["text"])){
    $_SESSION["error"] = "Username or Password is empty";
    header('Location:')
    exit();
}

if(addPost($_SESSION["username"], $_POST["text"])){
    echo "You have successfully posted post!";
    header('Location: /blogy');
}else{
    $_SESSION["error"] = "Unexpected error just happened!";
    header('Location: /blogy');
}

/**
        * @param string $creator
        * @param string $text
        * @return bool
        */
function addPost(string $creator, string $text): bool
{
    $connection = DBC::getConnection();
    $statement = $connection->prepare("INSERT INTO post (creator, text) VALUES (:creater, :text)");
    $statement->bindParam(":creater", $creator);
    $statement->bindParam(":text", $text);
    return $statement->execute();
}