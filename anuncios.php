<?php 
    require 'includes/app.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h2>Casas y Departamentos en venta</h2>
    
        <?php incluirTemplate('anuncios');?>

    </main>

<?php incluirTemplate('footer'); ?>