<?php
    /*
    //$host = "192.168.0.44:8080";
    $host = "localhost";
    $user = "root";
    $password = "";
    $bdd = "baseetudiant";

    try{
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $DBConnection = new PDO("mysql:host=" . $host . ";dbname=" . $bdd, $user, $password, $pdo_options);
    }
    catch (Exception $e){
        die("Error : " . $e->getMessage());
    }*/

    class Api {
        private static $path = "http://localhost:3200";

        static function getPath() {
            return self::$path;
        }
    }

?>