<?php
    class DBHelper 
    {
        public static function getDBConnection($connection_string, $db_user, $db_pass)
        {
            try
            {
                $pdo = new PDO($connection_string, $db_user, $db_pass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
            }
            catch (PDOException $e)
            {
                die( $e->getMessage() );
            }
        }
    }
?>