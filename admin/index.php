<?php 
    echo '<pre>';
    var_dump($_GET);
    echo '</pre>';

    $resultado = $_GET['resultado'] ?? null;

    require '../includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>

        <?php if ($resultado === '1' ): ?>
            <p class="alerta exito">Anuncio creado correctamente.</p>
        <?php endif; ?>

        <a href="/admin/propiedades/crear.php" class="boton-verde">Nueva Propiedad</a>
        <a href="/admin/propiedades/actualizar.php" class="boton-verde">Actualizar Propiedad</a>
        <a href="/admin/propiedades/borrar.php" class="boton-verde">Borrar Propiedad</a>
    </main>

<?php incluirTemplate('footer'); ?>