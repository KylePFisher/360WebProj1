<?php
    include_once("config/db_config.php");
    include_once("lib/db_connection_helper.php");
    include_once("lib/server_side_validation.php");
    
    class ServerSideValidation
    {
        //Initializing regex for every field that needs it
        static public $phoneRegex = '/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/';
        static public $emailRegex = '/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-z]+$/';
        static public $commentsRegex = '/^[A-Za-z0-9_ -]{1,250}$/';
        static public $passwordRegex = '/^[A-Za-z0-9_ -]{1,20}$/';
        static public $birthDateRegex = '/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/';
        
        //IsContactValid is a blanket method that validates each field from a Contact Us form submission
        static public function IsContactValid($userName, $email, $telephone, $comments)
        {
            //This variable will turn to false once there is an error with the submission
            $successfulSubmission = true;
            
            //Checking for empty values
            if(ServerSideValidation::contactIsEmpty($userName, $email, 
                $telephone, $comments))
            {
                $successfulSubmission = false;
            }
            
            //Checking to see if the email is in a proper format
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $successfulSubmission = false;
            }
            
            //Checking te see if the phone is in the phoneRegex format
            if(ServerSideValidation::IsWrongFormat(ServerSideValidation::$phoneRegex, $telephone))
            {
                $successfulSubmission = false;
            }
            
            //Checking to see that the comments are less than 250 characters
            if(ServerSideValidation::IsWrongFormat(ServerSideValidation::$commentsRegex, $comments))
            {
                $successfulSubmission = false;
            }
            
            return $successfulSubmission;
        }
        //End of IsContactValid
        
        //contactIsEmpty is a sub-method of contactIsValid which checks for empty values
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
        
        //Additions in Milestone 5
        //
        ///
        ////
        ///// IsRegisterValid is similar to the IsContactValid method, as it's a blanket method that checks if a registration was valid
        static public function IsRegisterValid($RegistrationvalueList, $email, $telephone, $password, $birthDate)
        {
            //Initialized to true, but will turn false whenever there is an error with the submission
            $successfulSubmission = true;
            
            //Checking to see if any of the values are empty via a class method
            if(ServerSideValidation::registerIsEmpty($RegistrationvalueList))
            {
                $successfulSubmission = false;
            }
            
            //Checking to see if the email is in a proper format
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $successfulSubmission = false;
            }
            
            //Phoneregex check
            if(ServerSideValidation::IsWrongFormat(ServerSideValidation::$phoneRegex, $telephone))
            {
                $successfulSubmission = false;
            }
            
            //Password regex check
            if(ServerSideValidation::IsWrongFormat(ServerSideValidation::$passwordRegex, $password))
            {
                $successfulSubmission = false;
            }
            
            //Date regex check
            if(ServerSideValidation::IsWrongFormat(ServerSideValidation::$birthDateRegex, $birthDate))
            {
                $successfulSubmission = false;
            }
            
            //Checking to see if the user is registering with a taken email
            if(ServerSideValidation::userAlreadyExists($email))
            {
                $successfulSubmission = false;
            }
            
            return $successfulSubmission;
        }
        //End
        
        //Checking to see if the registration form has empty values
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
        
        //Once a user submits a registration form this method is called to check
        //the database if the user has already signed up with that email.
        //If the user already exists, a true is returned.
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
        
        //This method takes two inputs: a value and a regular expression and compares the two values
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