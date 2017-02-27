<?php
    include_once("config/db_config.php");
    include_once("lib/db_connection_helper.php");
    include_once("lib/server_side_validation.php");
    
    session_start();
    
     $PDO = DBHelper::getDBConnection(DBCONNECTION, DBUSER, DBPASS);
        $sql = "SELECT * FROM users WHERE email = :email";
        $statement = $PDO->prepare($sql);
        $statement->bindValue(':email', $_POST['email']);
        $statement->execute();
        
            $result = $statement->fetch();
                $userInfo = array (
                    "userSalutation" => $result["salutation"],
                    "userFirstName" => $result["first_name"],
                    "userLastName" => $result["last_name"],
                    "userTelephone" => $result["telephone"],
                    "userEmail" => $result["email"],
                    "userName" => $result["user_name"],
                    "userBirthDate" => $result["birth_date"],
                    "userWorkStatus" => $result["work_status"],
                    "userCompany" => $result["company"],
                    "userRole" => $result["role"]
                    );
                $_SESSION["userInfo"] = $userInfo;
        if($userInfo["userEmail"] != "" || $userInfo["userEmail"] != NULL)
        {
            header('Location: admin-view.php');
        }
        else
        {
            $_SESSION["error"] = true;
            header('Location: admin.php');
        }
?>