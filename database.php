<?php


class Database {
	
    private static $dsn = 'mysql:host=localhost;dbname=portfolio';
    //private static $dsn = 'mysql:host=localhost;dbname=chorusintheforest';
    private static $username = 'root';
    private static $password = 'root';
   //reference to db connection
    private static $db;

    
    private function __construct() {}

    public static function getDB () {
    	
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
                //echo 'connected';
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo $error_message;
                exit();
            }
        }
        return self::$db;
    }
}
?>