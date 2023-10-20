<?php
spl_autoload_register(function ($class) {
    $path = ROOT . DELIMITER . str_replace('\\', DELIMITER, $class) . '.php';
    if(file_exists($path)) {
        require $path;
    }
});