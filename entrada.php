<?php 
    require 'includes/app.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Guía para la decoración de tu hogar</h1>

        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img loading="lazy" src="/build/img/destacada2.jpg" alt="Imagen de la Propiedad">
        </picture>
        
        <p class="información-meta">Escrito el <span>02/11/21</span> por <span>Admin</span></p>

        <div class="resumen-propiedad">
            

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit adipisci delectus deleniti nemo tempora corrupti asperiores voluptate, dolore dolores alias voluptatibus, ab vero suscipit quas pariatur sit nobis! Assumenda, impedit. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Impedit ab nesciunt consequatur, quas ad quam voluptatum sint nulla velit expedita omnis laboriosam voluptate similique animi alias illo placeat asperiores nam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore perferendis impedit sequi, consequuntur dolor eligendi reprehenderit nisi, inventore provident pariatur aliquam nemo quibusdam dolores commodi! Numquam ab dolores ipsam atque.</p>
        </div>
    </main>

<?php incluirTemplate('footer'); ?>