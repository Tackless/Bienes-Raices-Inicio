<?php

require '../../includes/app.php';
use App\Vendedor;
estaAutenticado();

// Validar que sea un ID Válido
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('location: /admin');
}
// Obtener el arreglo de la base de datos
$vendedor = Vendedor::find($id);

// Arreglo con mensajes de errores
$errores = Vendedor::getErrores();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Asignar los valores
    $args = $_POST['vendedor'];

    // Sincronizar objeto en memoria con lo que el usuario escribió
    $vendedor->sincronizar($args);

    // Validación
    $errores = $vendedor->validar();

    if (empty($errores)) {
        $vendedor->guardar();
    }
}

incluirTemplate('header'); ?>

<main class="contenedor seccion">
    <h1>Actualizar Registro Vendedor</h1>
    <a href="/admin/index.php" class="boton-verde">Volver</a>
    
    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>    
    <?php endforeach; ?>

    <form class="formulario" method="POST">
        <?php include('../../includes/templates/formulario_vendedores.php'); ?>

        <input type="submit" value="Guardar Cambios" class="boton-verde">
    </form>
</main>

<?php incluirTemplate('footer'); ?>