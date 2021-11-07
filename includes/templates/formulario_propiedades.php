<fieldset>
    <legend>Información General</legend>

    <label for="titulo">Título:</label>
    <input type="text" id="titulo" name="propiedad[titulo]" value="<?php echo sanitizar( $propiedad->titulo ); ?>" placeholder="Titulo Propiedad">
    
    <label for="precio">Precio:</label>
    <input type="number" id="precio" name="propiedad[precio]" value="<?php echo sanitizar( $propiedad->precio ); ?>" placeholder="Precio Propiedad" min="0">
    
    <label for="imagen">Imágen:</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]">

    <?php if ($propiedad->imagen) : ?>
        <img src="/imagenes/<?php echo $propiedad->imagen ?>" class="imagen-small" alt="Imagen propiedad">
    <?php endif; ?>

    <label for="descripcion">Descripción</label>
    <textarea id="descripción" name="propiedad[descripcion]" cols="30" rows="10"><?php echo sanitizar( $propiedad->descripcion ); ?></textarea>

</fieldset>

<fieldset>
    <legend>Información Propiedad</legend>

    <label for="habitaciones">Habitaciones:</label>
    <input type="number" id="habitaciones" name="propiedad[habitaciones]" value="<?php echo sanitizar( $propiedad->habitaciones ); ?>" placeholder="Ej: 3" min="1" max="9">
    
    <label for="wc">Baños:</label>
    <input type="number" id="wc" name="propiedad[wc]" value="<?php echo sanitizar( $propiedad->wc ); ?>" placeholder="Ej: 3" min="1" max="9">
    
    <label for="estacionamiento">Estacionamiento:</label>
    <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" value="<?php echo sanitizar( $propiedad->estacionamiento ); ?>" placeholder="Ej: 3" min="1" max="9">
</fieldset>

<fieldset>
    <legend>Vendedor</legend>
</fieldset>
