<?php

// This MVC is trash 
// Just to make it easier to track the proccess 

// MVC parts import

include "./modules/Response.php";
include "./modules/Request.php";
include "./modules/database.php";

session_start();

class Router 
{
    // get index where second forward slash to prepare
    public static function getStrPos($str, $look, $pos) 
    {
        $parts = explode($look, $str, $pos + 1);
        array_pop($parts);
        $position = strlen(implode($look, $parts));
        return $position;
    }

    // check uri after second forward slash
    public static function check_uri() 
    {
        $uri = $_SERVER["REQUEST_URI"];
        $uripos = self::getStrPos($uri, "/", 2);
        return substr($uri, $uripos);
    } 

    public static function get($dir, $callback, $middileware = NULL) // get requests
    {
        
        request::getCookies();
        request::getSessions();

        // override directories when routing 
        // htdocs: /folder/index.php -> htdocs: index.php
        // localhost:port/folder/index.php -> localhost:port/index.php

        $uri = self::check_uri($_SERVER["REQUEST_URI"]);
        
        if ($uri == $dir)
        {
            if ($middileware != NULL)
            {
                if($middileware() == false){
                    return;
                }
            }

            $handleView = $callback(); // invoke to get page to view and passed in data
            extract($handleView[1]);  // extract data passed in

            require_once "./views/".$handleView[0].".php"; // display page
        }
    }

    public static function post($dir, $callback) // handle post request ( forms data )
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            request::handleRequest(); $callback(); // get body data / param data
        }
    }

}



