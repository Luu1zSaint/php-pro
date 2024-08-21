<?php
function routers() {
    return require 'uriRouters.php';
}
function existsRoute($uri, $routes) {
    if (array_key_exists($uri, $routes)) {
        return 'achou';
    }
    return 'n achou';
}
function getRoute() {
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $routes = routers();

    $existsRoute =  existsRoute($uri, $routes);

    return $existsRoute;
}
?>