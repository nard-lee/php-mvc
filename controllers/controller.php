<?php

$mysql = new Mysql("localhost", "root", "admin", "user_data"); 

class Controller 
{
    public static function Home()
    {
        return response::render("Home", ["user"=>"Jamie"]);
    }

    public static function Login()
    {
        global $mysql;
        $body = request::$body;
        
        $username = $body["username"];
        $cnumber  = $body["cnumber"];
        $_id = uniqid();

        try {

            $mysql->create("book_table", " '$_id', '$username', '$cnumber' ");
            response::json(["success"=> $_id]);

        } catch(Exception $err) {
            response::json(["error"=> $err->getMessage()]);
        }
    }
}