<?php

use App\Propiedad;

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
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    // Arreglo con mensajes de errores
    $errores = [];

    // Ejecutar código despúes de que el usuario manda el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Asignar los atributos
        $args = $_POST['propiedad'];

        // Sincroniza los atributos del formulario 
        $propiedad->sincronizar($args);
        debuguear($propiedad);

        // Asignar files hacia una variable
        $imagen = $_FILES['imagen'];

        if (!$titulo) {
            $errores[] = "Debes añadir un titulo";
        }

        if (!$precio) {
            $errores[] = "El precio es obligatorio";
        }
        
        if ( strlen($descripcion) < 30 ) {
            $errores[] = "La descripcion es obligatoria y debe tener al menos 30 caracteres";
        }

        if ( !$habitaciones) {
            $errores[] = "El número de habitaciones es obligatorio";
        }

        if (!$wc) {
            $errores[] = "El número de baños es obligatorio";
        }

        if (!$estacionamiento) {
            $errores[] = "El número de estacionamientos es obligatorio";
        }

        if (!$vendedorId) {
            $errores[] = "Elije un vendedor";
        }

        // Validar por tamaño (100 Kb máximo)
        $medida = 1000 * 1000;

        if ($imagen['size'] > $medida) {
            $errores[] = 'La imagén es muy grande';
        }

        // Revisar que el arreglo de errores esté vacío
        if ( empty($errores) ) {


            /* SUBIDA DE ARCHIVOS */

            // Crear carpeta
            $carpetaImagenes = '../../imagenes/';

            if (!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }

            $nombreImagen = '';

            echo '<pre>';
            var_dump($imagen['name']);
            var_dump($propiedad['imagen']);
            echo '</pre>';

            // exit;

            
            if ($imagen['name']) {

                // Eliminar imágen previa (Si es que hay)
                unlink($carpetaImagenes . $propiedad['imagen']);

                // Generar un nombre único
                $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
                
                // Subir la imagen
                move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);

            } else {
                echo 'Error';
                $nombreImagen = $propiedad['imagen'];
            }

            // Insertar en la base de datos
            $query = "UPDATE propiedades SET titulo = '${titulo}', precio = '${precio}', imagen = '${nombreImagen}', descripcion = '${descripcion}', habitaciones = ${habitaciones}, wc = ${wc}, estacionamiento = ${estacionamiento}, vendedorId = ${vendedorId} WHERE id = ${id}";

            $resultado = mysqli_query($db, $query);
            if ($resultado) {
                // Redireccionar al usuario
                header('Location: /admin?resultado=2');
            } else {
                echo 'Error - Resultado';
            }
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