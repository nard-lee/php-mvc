<?php

namespace app\core;

class Middleware
{
    public function User($ctx)
    {
        if (!$ctx->session('role') || !$ctx->cookie('c_user')) {
            session_unset();
            session_destroy();

            $ctx->set_cookie('c_user', "", time() - 3600, "/");
            $ctx->redirect('/form');
        }
    }
    
    public function Log($ctx){
        if ($ctx->session('role') || $ctx->cookie('c_user')) {
            $ctx->redirect('/');
        }
    }
}
