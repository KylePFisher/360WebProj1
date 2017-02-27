<?php
    include_once("config/db_config.php");
    include_once("lib/db_connection_helper.php");
    include_once("lib/server_side_validation.php");
    
    class ServerSideValidation
    {
        //Public regex
        static public $phoneRegex = '/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/';
        static public $emailRegex = '/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-z]+$/';
        static public $commentsRegex = '/^[A-Za-z0-9_ -]{1,250}$/';
        static public $passwordRegex = '/^[A-Za-z0-9_ -]{1,20}$/';
        static public $birthDateRegex = '/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/';
        
        //IsContactValid Begin
        static public function IsContactValid($userName, $email, $telephone, $comments)
        {
            $successfulSubmission = true;
            
            if(ServerSideValidation::contactIsEmpty($userName, $email, 
                $telephone, $comments))
            {
                $successfulSubmission = false;
            }
            
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $successfulSubmission = false;
            }
            
            if(ServerSideValidation::IsWrongFormat(ServerSideValidation::$phoneRegex, $telephone))
            {
                $successfulSubmission = false;
            }
            
            if(ServerSideValidation::IsWrongFormat(ServerSideValidation::$commentsRegex, $comments))
            {
                $successfulSubmission = false;
            }
            
            return $successfulSubmission;
        }
        //IsContactValidEnd
        
        //ContactIsEmpty Begin
        static public function contactIsEmpty($username, $email, $telephone, $comments)
        {
            if($username == "" || $email == "" ||
                $telephone == "" || $comments == "")
            {
                return true;
            }
            
            if($username == NULL || $email == NULL ||
                $telephone == NULL || $comments == NULL)
            {
                return true;
            }
            
            return false;
        }
        //ContactIsEmpty End
        
        //Milestone 5
        //
        ///
        ////
        /////
        static public function IsRegisterValid($RegistrationvalueList, $email, $telephone, $password, $birthDate)
        {
            $successfulSubmission = true;
            
            if(ServerSideValidation::registerIsEmpty($RegistrationvalueList))
            {
                $successfulSubmission = false;
            }
            
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $successfulSubmission = false;
            }
            
            if(ServerSideValidation::IsWrongFormat(ServerSideValidation::$phoneRegex, $telephone))
            {
                $successfulSubmission = false;
            }
            
            if(ServerSideValidation::IsWrongFormat(ServerSideValidation::$passwordRegex, $password))
            {
                $successfulSubmission = false;
            }
            
            if(ServerSideValidation::IsWrongFormat(ServerSideValidation::$birthDateRegex, $birthDate))
            {
                $successfulSubmission = false;
            }
            
            if(ServerSideValidation::userAlreadyExists($email))
            {
                $successfulSubmission = false;
            }
            
            return $successfulSubmission;
        }
        //End
        
        //Begin of register
        static public function registerIsEmpty($RegistrationvalueList)
        {
            foreach($RegistrationvalueList as $value)
            {
                if($value == "")
                {
                    return true;
                }
                
                if($value == NULL)
                {
                    return true;
                }
            }
            return false;
        }
        
        static public function userAlreadyExists($id)
        {
            $PDO = DBHelper::getDBConnection(DBCONNECTION, DBUSER, DBPASS);
            $sql = "SELECT COUNT(*) FROM users WHERE email = :email";
            $statement = $PDO->prepare($sql);
            $statement->bindValue(':email', $id);
            $statement->execute();
        
            $result = $statement->fetch();

            if($result["COUNT(*)"] > 0)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        
        //////////////////
        //////////////////
        //////////////////
        static public function IsWrongFormat($regex, $field)
        {
            if(preg_match($regex, $field))
            {
                return false;
            }
            else
            {
                return true;
            }
        }
    }
?>