<?php
function connect() {
    return new PDO('mysql:host=localhost;dbname=lr_clientes;charset=utf8', 'root', '',[
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);
}
?>