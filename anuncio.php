<?php 
require 'includes/app.php';
use App\Propiedad;

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('location: /');
}

$propiedad = Propiedad::find($id);

incluirTemplate('header'); ?>

<main class="contenedor seccion contenido-centrado">
    <h1><?php echo $propiedad->titulo;  ?></h1>

    <img loading="lazy" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="Imagen de la Propiedad">

    <div class="resumen-propiedad">
        <p class="precio">$<?php echo number_format($propiedad->precio); ?></p>
        <ul class="iconos-caracteristicas">
            <li>
                <img loading="lazy" class="iconos" src="/build/img/icono_wc.svg" alt="Icono wc">
                <p><?php echo $propiedad->wc; ?></p>
            </li>
            <li>
                <img loading="lazy" class="iconos" src="/build/img/icono_estacionamiento.svg" alt="icono_estacionamiento">
                <p><?php echo $propiedad->estacionamiento; ?></p>
            </li>
            <li>
                <img loading="lazy" class="iconos" src="/build/img/icono_dormitorio.svg" alt="icono_dormitorio">
                <p><?php echo $propiedad->habitaciones; ?></p>
            </li> 
        </ul> 

        <p><?php echo $propiedad->descripcion; ?></p>
    </div>
</main>

<?php incluirTemplate('footer'); ?>