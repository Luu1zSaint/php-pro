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
    if(!empty($existsRoute)) {
        $keysRouteArray = array_keys($existsRoute)[0];
        return array_diff(
            $uri,
            explode('/', ltrim($keysRouteArray, '/'))
        );
    }
    return [];
}

function formatIndexParams($uri, $params) {
    $indexParams = [];
    foreach($params as $key => $value) {
        $indexParams[$uri[$key - 1]] = $value;
    }
    return $indexParams;
}

function getRoute() {
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $routes = routers();
    $existsRoute =  existsRoute($uri, $routes);
    $formatParams = [];
    if (empty($existsRoute)){
        $existsRoute = regexRoute($uri, $routes);
        $uri = explode('/', ltrim($uri, '/'));  
        $routeParams = routeParams($uri, $existsRoute);
        $formatParams = formatIndexParams($uri, $routeParams);
    }

    if(!empty($existsRoute)) {
        return loadController($existsRoute, $formatParams);
    }

    throw new Exception('Algo deu errado');
}
?>