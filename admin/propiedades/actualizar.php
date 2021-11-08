<?php

use App\Propiedad;
use App\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

require '../../includes/app.php';
estaAutenticado();

// Validar que sea un ID válido
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /admin'); // Lleva a la página principal
}

// Consulta para obtener los valores de propiedades
$propiedad = Propiedad::find($id);

// Consulta para obtener los vendedores
$vendedores = Vendedor::all();

// Arreglo con mensajes de errores
$errores = Propiedad::getErrores();

// Ejecutar código despúes de que el usuario manda el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Asignar los atributos
    $args = $_POST['propiedad'];

    // Sincroniza los atributos del formulario 
    $propiedad->sincronizar($args);
    
    // Validación
    $errores = $propiedad->validar();

    /* SUBIDA DE ARCHIVOS */
    // Generar un nombre único
    $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
    
    // Setear la imagen
    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        // Realiza un resize a la imagen con intervention
        $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
        $propiedad->setImagen($nombreImagen);
    }

    // Revisar que el arreglo de errores esté vacío
    if ( empty($errores) ) {
        if ($_FILES['propiedad']['tmp_name']['imagen']) {
            // Almacenar la imagen
            $image->save(CARPETA_IMAGENES . $nombreImagen);
        }

        $resultado = $propiedad->guardar();
    }
}

// Incluir el header
incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Actualizar Propiedad</h1>
    <a href="/admin/index.php" class="boton-verde">Volver</a>

    
    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>    
    <?php endforeach; ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include('../../includes/templates/formulario_propiedades.php'); ?>

        <input type="submit" value="Actualizar Propiedad" class="boton-verde">
    </form>
    
</main>

<?php incluirTemplate('footer'); ?>