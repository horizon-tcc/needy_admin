<?php

# DB conf
define('DB_USER', 'tux');
define('DB_PASS', '@MySQL2001');

define('DB_SGDB', 'mysql');
define('DB_HOST', 'localhost');
define('DB_PORT', "3306");
define('DB_NAME', 'db_needy');
define('DB_DSN', DB_SGDB.':host='.DB_HOST.':'.DB_PORT.';dbname='.DB_NAME);