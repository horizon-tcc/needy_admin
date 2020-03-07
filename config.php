<?php

# DB conf

# COLOQUEM O LOGIN DE VOCÊS AQUI NOS VALORES DESSAS DUAS CONSTANTES
define('DB_USER', 'root');
define('DB_PASS', '');

define('DB_SGDB', 'mysql');
define('DB_HOST', 'localhost');
define('DB_DOOR', "3306");
define('DB_NAME', 'bdneedy');
define('DB_DSN', DB_SGDB.':host='.DB_HOST.':'.DB_DOOR.';dbname='.DB_NAME);