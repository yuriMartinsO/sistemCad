<?php
    spl_autoload_register(function ($class_name) {
        if(file_exists(__DIR__ . '/../CONTROLLER/' . $class_name . '.class.php')) {
            require_once __DIR__ . '/../CONTROLLER/' . $class_name . '.class.php';
        } elseif(file_exists(__DIR__ . '/../MODEL/' . $class_name . '.class.php') ) {
            require_once __DIR__ . '/../MODEL/' . $class_name . '.class.php';
        } elseif(file_exists(__DIR__ . '/../DAO/' . $class_name . '.class.php') ) {
            require_once __DIR__ . '/../DAO/' . $class_name . '.class.php';
        }
    });
?>