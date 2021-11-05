<?php

require 'app.php';

function incluirTemplate( string $nombre, bool $inicio = false, int $limite = 99 ) {
    include TEMPLATES_URL . "/${nombre}.php";
}