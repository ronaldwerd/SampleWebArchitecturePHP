<?php

error_reporting(E_ALL ^ E_NOTICE);

require_once 'config/config.php';
require_once 'includes.php';
require_once 'core/app.php';
require_once 'core/routes.php';

session_start();

AppMain::run();