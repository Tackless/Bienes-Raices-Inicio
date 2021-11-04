<?php 
    // echo '<pre>';
    // var_dump($_GET);
    // echo '</pre>';

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

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Imágen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            
            <tbody>
                <td>1</td>
                <td>Casa en la playa</td>
                <td> <img src="/imagenes/a2998fc34681f6289c6872f361a0e14f.jpg" class="imagen-tabla" alt=""></td>
                <td>$1,000,000</td>
                <td>
                    <a href="/admin/propiedades/borrar.php" class="boton-rojo-block">Eliminar</a>
                    <a href="/admin/propiedades/actualizar.php" class="boton-amarillo-block">Actualizar</a>
                </td>
            </tbody>
        </table>
    </main>

<?php incluirTemplate('footer'); ?>