<?php
function loadController($existsRoute, $params) {
    list($controller, $method) = explode('@', array_values($existsRoute)[0]);

    $controllerPathName = CONTROLLER_PATH.$controller;
    if(!class_exists($controllerPathName)) {
        throw new Exception("Controller \"$controller\" não encontrado!");
    }

    $controllerInstatiate = new $controllerPathName;
    if(!method_exists($controllerInstatiate, $method)){
        throw new Exception("Método \"$method\" não encontrado!");
    }

    $controllerInstatiate->$method($params);
}
?>