<?php

namespace app\core;

use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\FileViewFinder;
use Illuminate\View\Factory;
use Illuminate\Filesystem\Filesystem;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Compilers\BladeCompiler;

class Context
{

    public $params;

    public function __construct()
    {
        $this->params = [];
    }

    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? false;
        $position = strpos($path, '?');
        if (!$position) {
            return $path;
        }
        return substr($path, 0, $position);
    }

    public function setParam($name, $value)
    {
        $this->params[$name] = $value;
    }

    public function json($data)
    {
        echo json_encode($data);
    }

    public function set_session($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function set_cookie($cookieName, $cookieValue, $arr)
    {
        setcookie($cookieName, $cookieValue, $arr);
    }

    public function cookie($value)
    {
        if (isset($_COOKIE[$value])) {
            return $_COOKIE[$value];
        }
        return false;
    }

    public function session($value)
    {
        if (isset($_SESSION[$value])) {
            return $_SESSION[$value];
        }
        return false;
    }

    public function redirect($loc)
    {
        header("location: /.$loc");
    }
    public function params($data)
    {
        return strtolower($_GET[$data]);
    }

    public function getMethod()
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }

    public function input($name = [])
    {
        if (!empty($name)) {
            $inputs = [];
            if (is_array($name)) {
                foreach ($name as $nm) {
                    $inputs[$nm] = $this->sanitizeInput($_POST[$nm]);
                }
                return $inputs;
            }
            return $this->sanitizeInput($_POST[$name]);
        } else {
            $inputs = [];
            foreach ($_POST as $key => $value) {
                $inputs[$key] = $this->sanitizeInput($value);
            }
            return $inputs;
        }
    }

    private function sanitizeInput($value)
    {
        return filter_var($value, FILTER_SANITIZE_STRING);
    }
    public function blade($view, $data = [])
    {
        $viewPaths = [__DIR__ . '/../views'];
        $cachePath = __DIR__ . '/../cache';

        $resolver = new EngineResolver();
        $resolver->register('blade', function () use ($cachePath) {
            return new CompilerEngine(new BladeCompiler(new Filesystem(), $cachePath));
        });

        $finder = new FileViewFinder(new Filesystem(), $viewPaths);
        $viewFactory = new Factory($resolver, $finder, new \Illuminate\Events\Dispatcher());

        $html = $viewFactory->make($view, $data)->render();

        echo $html;
    }

    public function makeID()
    {
        $randomDigits = str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
        $currentYear = date('Y');
        $uniqueID = $currentYear . $randomDigits;
        return $uniqueID;
    }
}
