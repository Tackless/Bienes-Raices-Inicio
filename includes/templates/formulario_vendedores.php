<fieldset>
    <legend>Información General</legend>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="vendedor[nombre]" value="<?php echo sanitizar( $vendedor->nombre ); ?>" placeholder="Nombre Vendedor(a)">
    
    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="vendedor[apellido]" value="<?php echo sanitizar( $vendedor->apellido ); ?>" placeholder="Apellido Vendedor(a)">
</fieldset>

<fieldset>
    <legend>Información Extra</legend>

    <label for="telefono">Teléfono:</label>
    <input type="number" id="telefono" name="vendedor[telefono]" value="<?php echo sanitizar( $vendedor->telefono ); ?>" placeholder="Teléfono de Vendedor(a)">

</fieldset>