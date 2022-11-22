<?php
namespace mvc\app\lib;

class AutoLoad
{
    public static function autoload($className)
    {
        $className = str_replace('mvc\app', '', $className);
        $className = $className . '.php';
        if (file_exists(APP_PATH . $className)) {
            require_once APP_PATH . $className;
        }
    }
}
spl_autoload_register(__NAMESPACE__. '\AutoLoad::autoload');
