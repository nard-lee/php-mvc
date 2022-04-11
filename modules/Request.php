<?php

class request
{
    
    public static $body;
    public static $params;
    public static $cookies;
    public static $sessions;

    public static function handleRequest()
    {
        self::$cookies = [];
        self::$body = $_POST;
        self::$sessions = [];
    }

    public static function getCookies()
    {
        foreach($_COOKIE as $key => $val)
        {
            self::$cookies[$key] = $val;
        }
    }

    public static function getSessions()
    {
        foreach($_SESSION as $key => $val)
        {
            self::$sessions[$key] = $val;
        }       
    }

    public static function getParams()
    {
        
    }
}