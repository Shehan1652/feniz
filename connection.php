<?php

class Database{

    public static $connection;

    public static function setupConnection(){

        if (!isset(Database::$connection)) {
           Database::$connection = new mysqli("127.0.0.1","root","Shehan@2002","feniz","3306");
        }
    }

    public static function iud($q){

        Database::setupConnection();
        Database::$connection->query($q);

    }

    public static function search($q){

        Database::setupConnection();
        $resultset  = Database::$connection->query($q);
        return $resultset;

    }

}
?>
