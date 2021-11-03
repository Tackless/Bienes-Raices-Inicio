<?php include 'includes/templates/header.php'; ?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en venta frente al bosque</h1>

        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img loading="lazy" src="/build/img/destacada.jpg" alt="Imagen de la Propiedad">
        </picture>

        <div class="resumen-propiedad">
            <p class="precio">$3,000,000</p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img loading="lazy" class="iconos" src="/build/img/icono_wc.svg" alt="Icono wc">
                    <p>3</p>
                </li>
                <li>
                    <img loading="lazy" class="iconos" src="/build/img/icono_estacionamiento.svg" alt="icono_estacionamiento">
                    <p>3</p>
                </li>
                <li>
                    <img loading="lazy" class="iconos" src="/build/img/icono_dormitorio.svg" alt="icono_dormitorio">
                    <p>3</p>
                </li> 
            </ul> 

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit adipisci delectus deleniti nemo tempora corrupti asperiores voluptate, dolore dolores alias voluptatibus, ab vero suscipit quas pariatur sit nobis! Assumenda, impedit. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Impedit ab nesciunt consequatur, quas ad quam voluptatum sint nulla velit expedita omnis laboriosam voluptate similique animi alias illo placeat asperiores nam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore perferendis impedit sequi, consequuntur dolor eligendi reprehenderit nisi, inventore provident pariatur aliquam nemo quibusdam dolores commodi! Numquam ab dolores ipsam atque.</p>
        </div>
    </main>

<?php include 'includes/templates/footer.php'; ?>