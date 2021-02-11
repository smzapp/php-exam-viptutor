<?php

function view($file, $html = '')
{
    $_GLOBALS['html'] = $html;
    require_once "views/{$file}.php";
}