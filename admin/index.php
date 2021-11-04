<?php 
    // echo '<pre>';
    // var_dump($_GET);
    // echo '</pre>';

    // Importar la conexión
    require '../includes/config/database.php';
    $db = conectarBD();

    // Escribir el query
    $query = "SELECT * FROM propiedades";

    // Consultar la base de datos
    $resultadoConsulta = mysqli_query($db, $query);

    // Muestra mensaje condicional
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
            
            <tbody> <!-- Mostrar los resultados de la Base de Datos -->
                <?php while ($propiedad = mysqli_fetch_assoc($resultadoConsulta)): ?>
                    
                    <tr>
                        <td> <?php echo $propiedad['id']; ?> </td>
                        <td> <?php echo $propiedad['titulo']; ?> </td>
                        <td> <img src="/imagenes/<?php echo $propiedad['imagen']; ?>" class="imagen-tabla" alt=""></td>
                        <td> $ <?php echo $propiedad['precio']; ?> </td>
                        <td>
                            <a href="/admin/propiedades/borrar.php" class="boton-rojo-block">Eliminar</a>
                            <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">Actualizar</a>
                        </td>
                    </tr>

                <?php endwhile; ?>
            </tbody>
        </table>
    </main>

<?php 

    // Cerrar la conexdión
    mysqli_close($db);


    incluirTemplate('footer'); 
?>