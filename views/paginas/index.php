<main class="menu contenedor">
    <div class="nosotros">
        <h1 class="titulo1" data-cy='nosotros-sitio'>Mas Sobre Nosotros</h1>

        <?php include 'iconos.php' ?>

    </div>
</main>

<section class="seccion contenedor">
    <h1 class="titulo2">Casas y Departamentos en Venta</h1>

    <?php include 'listado.php'; ?>

    <div class="bot-extra">
        <a class="bot3" href="/anuncios">Ver Todas</a>
    </div>
</section>

<section class="seccion2">
    <div class="contenedor">
        <h1>Encuentra la casa de tus sueños</h1>

        <p>
            Llena el formulario de contacto y un asesor se pondra en contacto
            contigo a la brevedad
        </p>

        <a class="bot4" href="/contacto">Contactanos</a>
    </div>
</section>

<section class="seccion-inferior contenedor">
    <div class="blog">
        <h1>Nuestro Blog</h1>

        <article class="entrada-blog">
            <div class="grid-blog">
                <div class="img-blog">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpg">
                        <img src="build/img/blog1.jpg" alt="blog1" loading="lazy">
                    </picture>
                </div>
                <div class="texto-blog">
                    <h1>
                        <a href="/entrada">
                            <span>Terraza en el</span> techo de tu casa
                        </a>
                    </h1>
                    <p class="fecha">
                        Escrito el: <span>20/05/2021</span> por: <span>Luis</span>
                    </p>
                    <p class="consejos">
                        Consejos para construir una terraza en el techo de tu casa,
                        con los mejores materiales y ahorrando dinero
                    </p>
                </div>
            </div>

            <div class="grid-blog">
                <div class="img-blog">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpg">
                        <img src="build/img/blog2.jpg" alt="blog1" loading="lazy">
                    </picture>
                </div>
                <div class="texto-blog">
                    <h1>
                        <a href="/entrada">
                            <span>Guia para la</span> decoracion de tu hogar
                        </a>
                    </h1>
                    <p class="fecha">
                        Escrito el: <span>20/05/2021</span> por: <span>Luis</span>
                    </p>
                    <p class="consejos">
                        Maximiza el espacio en tu hogar con esta guia, aprende a
                        combinar muebles y colores para darle vida a tu espacio
                    </p>
                </div>
            </div>
        </article>
    </div>

    <div class="testimonios">
        <h1>Testimoniales</h1>

        <div class="testimonio">
            <blockquote class="relato">
                El personal se comporto de una excelente forma, muy buena
                atención y la casa que me ofrecieron cumple con todas mis
                expectativas.
            </blockquote>
            <p class="autor">
                - Luis Mendoza
            </p>
        </div>
    </div>
</section>