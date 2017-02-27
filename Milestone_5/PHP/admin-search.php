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
        
            $result = $statement->fetchAll();
            foreach($result as $row)
            {
                $userInfo = array (
                    "userSalutation" => $row["salutation"],
                    "userFirstName" => $row["first_name"],
                    "userLastName" => $row["last_name"],
                    "userTelephone" => $row["telephone"],
                    "userEmail" => $row["email"],
                    "userName" => $row["user_name"],
                    "userBirthDate" => $row["birth_date"],
                    "userWorkStatus" => $row["work_status"],
                    "userCompany" => $row["company"],
                    "userRole" => $row["role"]
                    );
                $_SESSION["userInfo"] = $userInfo;
            }
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