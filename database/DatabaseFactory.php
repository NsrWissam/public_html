<?php
include_once 'Database.php';

class DatabaseFactory {

    //singleton
    private static $connection;

    public static function getDatabase(){
        if(self::$connection==null){
            $host = "localhost";
            $user="18WDA065";
            $pass="21384769";
            $db="18WDA065";
            self::$connection = new Database($host, $user, $pass, $db);
        }
        return self::$connection;
    }
}

?>