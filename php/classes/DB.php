<?php
class DB {

    private static $host = "localhost";
    private static $database = "keepthemsafe";
    private static $username = "keepthemsafe";
    private static $password = "BNeUWnefFGDyyzRA";
 
    
    public static function getConnection() {
        $dsn = 'mysql:host=' . DB::$host . ';dbname=' . DB::$database;

        $connection = new PDO($dsn, DB::$username, DB::$password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $connection;
    }

}