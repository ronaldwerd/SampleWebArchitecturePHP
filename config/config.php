<?php

define('DSN', 'mysql:host=localhost;dbname=sample_php'); // PHP PDO DSN
define('DB_USER', 'root');
define('DB_PASS', 'password');

define('APP_ROOT', 'C:/work/SampleWebArchitecturePHP'); // Path to application

date_default_timezone_set('America/Toronto');
error_reporting(E_ALL ^ E_NOTICE);