<?php


namespace MVC;


class View
{
    public function render($viewName, $title = '', $vars = []){
        extract($vars);
        $path = __DIR__ . '/Views/' . $viewName . '.php';
        if (file_exists($path)){
            ob_start();
            require $path;
            $content = ob_get_clean();
            require __DIR__ . '/Views/layout.php';
        }
    }
}