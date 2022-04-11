<?php

include "./modules/Router.php";
include "./controllers/controller.php";
include "./middleware/middleware.php";

$mysql = new Mysql("localhost", "root", "admin", "user_data"); 

function handleErrors($body)
{
    if (strlen($body["cnumber"]) < 8)
    {
        throw new Exception("Must be greater than 1");
    }
}


Router::get("/",  function(){ 

    global $mysql;

    //$curr_user = $mysql->findById("book_table", request::$cookies["isUser"]);

    echo var_dump($_SESSION);

    return response::render("Home", ["user"=> $_SESSION["isUser"]]); 
    
}, ['Middleware', "Authorized"]);


Router::get("/contact", function(){ 
    return response::render("Contact"); 
});

Router::post("/login", function(){
    global $mysql;

    $body = request::$body;

    $username = $body["username"];
    $cnumber  = $body["cnumber"];
    $_id = uniqid();

    try {

        $handle = handleErrors($body);

        $mysql->create("book_table", " '$_id', '$username', '$cnumber' ");
        //setcookie("isUser", $_id, time() + (86400 * 30));
        //response::session("isUser", $_id);
        //$_SESSION["isUser"] = $_id;
        //response::json(["success"=> $_id]);

    } catch(Exception $err) {
        response::json(["error"=> $err->getMessage()]);
    }
});

