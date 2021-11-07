<?php

function conectarBD() : mysqli {
    $db = new mysqli('localhost', 'root', 'root', 'bienes_raices');

    if (!$db) {
        echo 'Error - No se pude conectar';
        exit;
    }

    return $db;
}