<?php

/**
 * Load classes 
 */
spl_autoload_register(function($className) {

    $fullPath = $className . ".php";

    if (file_exists($fullPath)) {
        require_once $fullPath;
    }
});