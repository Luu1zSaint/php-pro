<?php
function routers() {
    return require 'uriRouters.php';
}

function existsRoute($uri, $routes) {
    if (array_key_exists($uri, $routes)) {
        return [$uri => $routes[$uri]];
    }
    return [];
}

function regexRoute($uri, $routes) {
    return array_filter(
        // array_keys($routes) func para pegar somente as keys do array
        $routes, 
        function($value) use($uri){
            $regex = str_replace('/', '\/', ltrim($value, '/'));
            return preg_match("/^$regex$/", ltrim($uri, '/'));
        },
        ARRAY_FILTER_USE_KEY // Flag opcional dizendo que é para pegar semente as keys
    );
}

function routeParams($uri, $existsRoute) {
        $keysRouteArray = array_keys($existsRoute)[0];
        return array_diff(
            explode('/', ltrim($uri, '/')),
            explode('/', ltrim($keysRouteArray, '/'))
        );
        return [];
}

function getRoute() {
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $routes = routers();
    $existsRoute =  existsRoute($uri, $routes);
    
    if (empty($existsRoute)){
        $existsRoute = regexRoute($uri, $routes);

        if(!empty($existsRoute)) {
            $routeParams = routeParams($uri, $existsRoute);
            var_dump($routeParams);
            die();
        }
    }
}
?>