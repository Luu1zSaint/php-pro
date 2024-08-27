<?php
require 'bootstrap.php';
try {
    $returnRoute = getRoute();
    extract($returnRoute['data']);
    
    if(!isset($returnRoute['view'])){
        throw new Exception("Index View Error");
    }
    if(!file_exists(VIEWS.$returnRoute['view'])){
        throw new Exception("{$returnRoute['view']} Não Encontrado!");
    }
    $returnView = $returnRoute['view'];
    
    require VIEWS.'main.php';
} catch (Exception $e) {
    var_dump($e->getMessage());
}

?>