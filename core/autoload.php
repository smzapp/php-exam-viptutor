<?php

require_once 'common.php';

// prepare the request & process the arguments
$database = 'nba2019';
include('include/utils.php');
require_once('vendor/autoload.php');

/**
 * Load classes 
 */
spl_autoload_register(function($className) {

    $fullPath = $className . ".php";

    if (file_exists($fullPath)) {
        require_once $fullPath;
    }
});