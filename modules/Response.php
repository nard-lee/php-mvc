<?php

class response
{
    public static function json($data)
    {
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            echo json_encode($data);
        }
    }

    public static function render($page, $data=[])
    {
        return [ $page, $data ];
    }

    public static function redirect($dir)
    {
        header("Location:".$dir);   
    }

    public static function cookie($cname, $cvalue, $due)
    {
        setcookie($cname, $cvalue, $due);
    }

    public static function session($cname, $svalue)
    {
        $_SESSION[$cname] = $svalue;
    }

}