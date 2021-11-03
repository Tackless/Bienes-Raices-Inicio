<?php 
    require '../includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>

        <a href="/admin/propiedades/crear.php" class="boton-verde">Nueva Propiedad</a>
        <a href="/admin/propiedades/actualizar.php" class="boton-verde">Actualizar Propiedad</a>
        <a href="/admin/propiedades/borrar.php" class="boton-verde">Borrar Propiedad</a>
    </main>

<?php incluirTemplate('footer'); ?>