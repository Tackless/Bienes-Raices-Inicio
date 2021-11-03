<?php

function conectarBD() : mysqli {
    $db = mysqli_connect('localhost', 'root', 'root', 'bienes_raices');

    if (!$db) {
        echo 'Error - No se pude conectar';
        exit;
    }

    return $db;
}