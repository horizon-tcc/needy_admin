<?php

# DB conf

# COLOQUEM O LOGIN DE VOCÊS AQUI NOS VALORES DESSAS DUAS CONSTANTES
define('DB_USER', '');
define('DB_PASS', '');

define('DB_SGDB', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'db_needy');
define('DB_DSN', DB_SGDB.':host='.DB_HOST.';dbname='.DB_NAME);