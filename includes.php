<?php

require_once 'lib/smarty/smarty.class.php';

/*
 * Instead of including all files as we create them, the most common class files in obvious locations
 * can be found with __autoload.
 */

function __autoload($className) {

    if (file_exists('libs'.$className.'.php')) {
        require_once 'libs'.$className.'.php';
        return true;
    }

    if (file_exists('models'.$className.'.php')) {
        require_once 'models'.$className.'.php';
        return true;
    }

    if (file_exists('helpers'.$className . '.php')) {
        require_once 'helpers'.$className . '.php';
        return true;
    }

    return false;
}