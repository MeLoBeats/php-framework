<?php

function getUri($case_sensitive = false)
{
    $uri = explode("?", $_SERVER["REQUEST_URI"])[0];
    $uri = explode("/", $uri);
    array_shift($uri);
    $uri = implode("/", $uri);
    return $uri;
}

function dd()
{
    echo "<pre>";
    foreach (func_get_args() as $arg) {
        var_dump($arg);
    }
    echo "</pre>";
    die();
}

function dump()
{
    echo "<pre>";
    foreach (func_get_args() as $arg) {
        var_dump($arg);
    }
    echo "</pre>";
}

function get_env($key, $default = null)
{
    $path = dirname(__DIR__, 2) . "\\.env";
    $env = parse_ini_file($path);
    if (!isset($env[$key])) {
        return $default;
    }
    return $env[$key];
}
