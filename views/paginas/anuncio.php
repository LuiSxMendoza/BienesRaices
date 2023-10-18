<main class="menu contenedor contenido-centrado">
    <div class="titulo1"><h1><?php echo $propiedad->titulo; ?></h1></div>

    <div class="anuncio-contenido">
        <img class="img-pri" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="anuncio" loading="lazy">

        <p class="precio">$<?php echo number_format($propiedad->precio); ?></p>
        <ul class="ico-car">
            <li>
                <img loading="lazy" src="build/img/icono_wc.svg" alt="icono-wc">
                <p><?php echo $propiedad->wc; ?></p>
            </li>
            <li>
                <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono-wc">
                <p><?php echo $propiedad->estacionamiento; ?></p>
            </li>
            <li>
                <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono-wc">
                <p><?php echo $propiedad->habitaciones; ?></p>
            </li>
        </ul>

        <p class="descripcion"><?php echo $propiedad->descripcion; ?></p>
    </div>
</main>

<div class="contenedor contenido-centrado">
    <a href="javascript:history.back()" class="boton">Volver Atrás</a>
</div>