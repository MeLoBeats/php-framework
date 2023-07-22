<?php

namespace Src\Http;

class Request
{

    public static function getCurrentRequest()
    {
        return [
            "uri" => self::getUri(),
            "method" => self::getMethod(),
            "headers" => self::getHeaders(),
            "body" => self::getBody(),
            "query" => self::getQuery(),
            "params" => self::getParams()
        ];
    }

    public static function getUri()
    {
        return explode("?", $_SERVER["REQUEST_URI"])[0];
    }

    public static function getMethod()
    {
        return $_SERVER["REQUEST_METHOD"];
    }

    public static function getHeaders()
    {
        return getallheaders();
    }

    public static function getBody()
    {
        return json_decode(file_get_contents("php://input"), true);
    }

    public static function getQuery()
    {
        return $_GET;
    }

    public static function getParams()
    {
        return $_POST;
    }

    public static function getFiles()
    {
        return $_FILES;
    }

    public static function getCookie()
    {
        return $_COOKIE;
    }

    public static function getSession()
    {
        return $_SESSION;
    }

    public static function getServer()
    {
        return $_SERVER;
    }

    public static function getEnv()
    {
        return $_ENV;
    }


    public function __get($name)
    {
        return self::getCurrentRequest()[$name];
    }

    public function __isset($name)
    {
        return isset(self::getCurrentRequest()[$name]);
    }


    public function __toString()
    {
        return json_encode(self::getCurrentRequest());
    }
}
