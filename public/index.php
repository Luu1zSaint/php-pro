<?php
require 'bootstrap.php';
try {
    $returnRoute = getRoute();

    if(!isset($returnRoute['data'])){
        throw new Exception("Index Data Error");
    }
    if(!isset($returnRoute['data']['title'])){
        throw new Exception("Index Title Error");
    }
    if(!isset($returnRoute['view'])){
        throw new Exception("Index View Error");
    }
    if(!file_exists(VIEWS.$returnRoute['view'])){
        throw new Exception("{$returnRoute['view']} Não Encontrado!");
    }
    
    extract($returnRoute['data']);
    $returnView = $returnRoute['view'];
    
    require VIEWS.'main.php';
} catch (Exception $e) {
    var_dump($e->getMessage());
}

?>