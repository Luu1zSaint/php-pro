<?php
require 'bootstrap.php';
try {
    echo getRoute();
} catch (Exception $e) {
    var_dump($e->getMessage());
}

?>