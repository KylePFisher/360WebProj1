<?php
    
    include_once("config/db_config.php");
    include_once("lib/db_connection_helper.php");
    include_once("lib/server_side_validation.php");
    
    session_start();
    
    $_SESSION['salutation'] = $_POST['salutation'];
    $_SESSION['firstName'] = $_POST['firstName'];
    $_SESSION['lastName'] = $_POST['lastName'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['userName'] = $_POST['userName'];
    $_SESSION['telephone'] = $_POST['telephone'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['birthDate'] = $_POST['birthDate'];
    $_SESSION['workStatus'] = $_POST['workStatus'];
    $_SESSION['company'] = $_POST['company'];
    $_SESSION['role'] = $_POST['role'];
    
     $RegistrationvalueList = array (
            "firstName" => $_POST['firstName'],
            "lastName" => $_POST['lastName'],
            "email" => $_POST['email'],
            "userName" => $_POST['userName'],
            "telephone" => $_POST['telephone'],
            "password" => $_POST['password'],
            "birthDate" => $_POST['birthDate'],
            "workStatus" => $_POST['workStatus'],
            "company" => $_POST['company'],
            "role" => $_POST['role'] );
    
    if (ServerSideValidation::IsRegisterValid($RegistrationvalueList, $_POST['email'], $_POST['telephone'], $_POST['password'], $_POST['birthDate']))
    {
        echo "Successful Submission";
        $PDO = DBHelper::getDBConnection(DBCONNECTION, DBUSER, DBPASS);
        $sql = "INSERT INTO users (email, salutation, first_name, last_name, telephone,
                user_name, password, birth_date, work_status, company, role) 
                VALUES (:email, :salutation, :first_name, :last_name, :telephone,
                :user_name, :password, :birth_date, :work_status, :company, :role)";
        $statement = $PDO->prepare($sql);
        $statement->bindValue(':email', $_POST['email']);
        $statement->bindValue(':salutation', $_POST['salutation']);
        $statement->bindValue(':first_name', $_POST['firstName']);
        $statement->bindValue(':last_name', $_POST['lastName']);
        $statement->bindValue(':telephone', $_POST['telephone']);
        $statement->bindValue(':user_name', $_POST['userName']);
        $statement->bindValue(':password', $_POST['password']);
        $statement->bindParam (":birth_date", $_POST['birthDate']);
        $statement->bindValue(':work_status', $_POST['workStatus']);
        $statement->bindValue(':company', $_POST['company']);
        $statement->bindValue(':role', $_POST['role']);
        
        if($statement->execute())
        {
            $_SESSION["registrationSQLSuccessful"] = true;
        }
        else
        {
            $_SESSION["registrationSQLSuccessful"] = false;
        }
        header('Location: register-view.php');
    }
    else
    {
        echo "Failed Submission";
        $errorList = array (
            "emptyVals" => false,
            "email" => false,
            "telephone" => false,
            "password" => false,
            "birthDate" => false,
            "currentUser" => false);
        $errorList["emptyVals"] = ServerSideValidation::registerIsEmpty($RegistrationvalueList);
        $errorList["email"] = ServerSideValidation::IsWrongFormat(ServerSideValidation::$emailRegex, $_POST["email"]);
        $errorList["telephone"] = ServerSideValidation::IsWrongFormat(ServerSideValidation::$phoneRegex, $_POST["telephone"]);
        $errorList["password"] = ServerSideValidation::IsWrongFormat(ServerSideValidation::$passwordRegex, $_POST["password"]);
        $errorList["birthDate"] = ServerSideValidation::IsWrongFormat(ServerSideValidation::$birthDateRegex, $_POST["birthDate"]);
        $errorList["currentUser"] = ServerSideValidation::userAlreadyExists($_POST["email"]);
        $_SESSION["errorList"] = $errorList;
        header('Location: register.php');
    }
?>