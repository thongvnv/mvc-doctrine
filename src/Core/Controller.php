<?php
namespace MVC\Core;

use MVC\Models\TaskRepository;

class Controller
{
    var $vars = [];
    var $layout = "default";

    function set($d)
    {
        $this->vars = array_merge($this->vars, $d);
    }

    function render($filename)
    {
        extract($this->vars);
        ob_start();
        require(ROOT . "Views/" . ucfirst(str_replace('Controller', '', (new \ReflectionClass($this))->getShortName())) . '/' . $filename . '.php');
        $content_for_layout = ob_get_clean();

        if ($this->layout == false)
        {
            $content_for_layout;
        }
        else
        {
            require(ROOT . "Views/Layouts/" . $this->layout . '.php');
        }
    }
}