<?php
    require_once("core.php");
    class DBConnect {

        private static $scientiaDB;

        public static function scientiaDB() {            
            if (!isset(static::$scientiaDB)) {
                try {
                    static::$scientiaDB = new PDO(DBINFO_SQLSRV, USER_SQLSRV, PWD_SQLSRV, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                } catch (PDOException $e) {
                    $msg = "location : scientiaDB"."  DB : ".DBINFO_SQLSRV;
                    echo ("Location: ../ErrorPage/ErreurConnexion.php?msg=" . $e->getMessage() . $msg);
    
                    die;
                }
            }
    
            return static::$scientiaDB;
        }

        public static function connection() {
            static::scientiaDB();
        }
    }

?>