<?php
namespace app\controllers;

class User {
    public function create($params) {
        echo 'create';
        var_dump($params);
        die();
    }
    public function show($params) {
        echo 'show';
        var_dump($params);
        die();
    }
}
?>