<?php

# DB conf
define('DB_USER', 'root');
define('DB_PASS', '');

define('DB_SGDB', 'mysql');
define('DB_HOST', 'localhost');
define('DB_PORT', "3306");
define('DB_NAME', 'bdneedy');
define('DB_DSN', DB_SGDB.':host='.DB_HOST.':'.DB_PORT.';dbname='.DB_NAME);