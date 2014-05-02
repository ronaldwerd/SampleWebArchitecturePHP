<?php

require_once 'lib/smarty/smarty.class.php';
require_once 'controllers/controller.php';

/*
 * Instead of including all files as we create them, the most common class files in obvious locations
 * can be found with __autoload.
 */

function __autoload($className) {

    $className = strtolower($className);

    if (file_exists(APP_ROOT.'/libs/'.$className.'.php')) {
        require_once APP_ROOT.'/libs/'.$className.'.php';
        return true;
    }

    if (file_exists(APP_ROOT.'/models/'.$className.'.php')) {
        require_once APP_ROOT.'/models/'.$className.'.php';
        return true;
    }

    if (file_exists(APP_ROOT.'/helpers/'.$className . '.php')) {
        require_once APP_ROOT.'/helpers/'.$className . '.php';
        return true;
    }

    return false;
}

spl_autoload_register('__autoload');