<?php 

require '../../includes/app.php';

use App\Propiedad;
use App\Vendedor;
use Intervention\Image\ImageManagerStatic as Image; // incluye la libreria Intervention\image

estaAutenticado();

// Crear nueva instancia vacía
$propiedad = new Propiedad;

// Consulta para obtener todos los vendedores
$vendedores = Vendedor::all();

// Arreglo con mensajes de errores
$errores = Propiedad::getErrores();

// Ejecutar código despúes de que el usuario manda el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Crea una nueva instancia
    $propiedad = new Propiedad($_POST['propiedad']);

    /* SUBIDA DE ARCHIVOS */
    // Generar un nombre único
    $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

    // Setear la imagen
    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        // Realiza un resize a la imagen con intervention
        $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
        $propiedad->setImagen($nombreImagen);
    }
    
    // Validar
    $errores = $propiedad->validar();
    
    // Revisar que el arreglo de errores esté vacío
    if ( empty($errores) ) {

        // Crear la carpeta para subir imagenes
        if (!is_dir(CARPETA_IMAGENES)) {
            mkdir(CARPETA_IMAGENES);
        }

        // Guardar la imagen en el servidor
        $image->save(CARPETA_IMAGENES . $nombreImagen);

        // Guardar en la base de datos
        $resultado = $propiedad->guardar();
    }
}

// Incluir el header
incluirTemplate('header'); ?>

<main class="contenedor seccion">
    <h1>Registrar Propiedades </h1>
    <a href="/admin/index.php" class="boton-verde">Volver</a>
    
    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>    
    <?php endforeach; ?>

    <form class="formulario" method="POST" action="/admin/vendedores/crear.php" enctype="multipart/form-data">
        <?php include('../../includes/templates/formulario_propiedades.php'); ?>

        <input type="submit" value="Crear Propiedad" class="boton-verde">
    </form>
</main>

<?php incluirTemplate('footer'); ?>