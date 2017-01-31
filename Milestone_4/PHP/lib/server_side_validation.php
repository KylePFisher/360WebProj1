<?php
    class ServerSideValidation
    {
        static public $phoneRegex = '/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/';
        static public $emailRegex = '/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-z]+$/';
        static public $commentsRegex = '/^[A-Za-z0-9_ -]{1,250}$/';
        
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