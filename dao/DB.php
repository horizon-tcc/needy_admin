<?php

    namespace dao;
    require_once '../vendor/autoload.php';

    class DB 
    {
        public static function getConn() {
            try {
                $Conn = new PDO(DB_DSN, DB_USER, DB_PASS);
                $Conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $Conn->exec('SET CHARACTER SET utf8'); 
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }