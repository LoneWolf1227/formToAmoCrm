<?php

use MVC\Route;

$router = new Route();

$router->set('', function(){
    $class = new MVC\Index();
    $class->CreateView('index');
});

$router->set('index.php', function(){
    $class = new MVC\Index();
    $class->CreateView('index');
});
