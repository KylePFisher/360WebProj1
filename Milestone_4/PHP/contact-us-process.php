<?php
    
    include_once("config/db_config.php");
    include_once("lib/db_connection_helper.php");
    include_once("lib/server_side_validation.php");
    
    session_start();
    
    $_SESSION['userName'] = $_POST['userName'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['telephone'] = $_POST['telephone'];
    $_SESSION['comments'] = $_POST['comments'];
    
    if (ServerSideValidation::IsContactValid($_POST['userName'], $_POST['email'],
        $_POST['telephone'], $_POST['comments']))
    {
        $PDO = DBHelper::getDBConnection(DBCONNECTION, DBUSER, DBPASS);
        $sql = "INSERT INTO feedback (user_name, email, telephone, comment) 
                VALUES (:username, :email, :telephone, :comments)";
        $statement = $PDO->prepare($sql);
        $statement->bindValue(':username', $_POST['userName']);
        $statement->bindValue(':email', $_POST['email']);
        $statement->bindValue(':telephone', $_POST['telephone']);
        $statement->bindValue(':comments', $_POST['comments']);
        
        if($statement->execute())
        {
            $_SESSION["contactUsSQLSuccessful"] = true;
        }
        else
        {
            $_SESSION["contactUsSQLSuccessful"] = false;
        }
        header('Location: contact-us-view.php');
    }
    else
    {
        $errorList = array (
            "emptyVals" => false,
            "email" => false,
            "telephone" => false,
            "comments" => false);
        $errorList["emptyVals"] = ServerSideValidation::contactIsEmpty($_POST["userName"], $_POST["email"], $_POST["telephone"], $_POST["comments"]);
        $errorList["email"] = ServerSideValidation::IsWrongFormat(ServerSideValidation::$emailRegex, $_POST["email"]);
        $errorList["telephone"] = ServerSideValidation::IsWrongFormat(ServerSideValidation::$phoneRegex, $_POST["telephone"]);
        $errorList["comments"] = ServerSideValidation::IsWrongFormat(ServerSideValidation::$commentsRegex, $_POST["comments"]);
        $_SESSION["errorList"] = $errorList;
        header('Location: contact us.php');
    }
?>