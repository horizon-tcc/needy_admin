<?php

    require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR ."global.php";
    include_once __DIR__ . DIRECTORY_SEPARATOR . ".." .  DIRECTORY_SEPARATOR . "config.php";
    

    class DB 
    {
        public static function getConn() {
            try {

                $conn = new PDO(DB_DSN, DB_USER, DB_PASS);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conn->exec('SET CHARACTER SET utf8');
                return  $conn;
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

?>

