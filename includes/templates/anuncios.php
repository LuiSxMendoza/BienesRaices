<?php 

   use App\Propiedad;

   $propiedades = Propiedad::get(3);

?>


<div class="anuncios">
    <?php foreach($propiedades as $propiedad) { ?>
        <div class="anuncio-contenido">
            <img src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="anuncio" loading="lazy">

            <h3><?php echo $propiedad->titulo; ?></h3>

            <p class="descripcion"><?php echo $propiedad->descripcion; ?></p>

            <p class="precio">$<?php echo number_format($propiedad->precio); ?></p>

            <ul class="ico-car">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono-wc">
                    <p><?php echo $propiedad->wc; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono-wc">
                    <p><?php echo $propiedad->estacionamiento; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono-wc">
                    <p><?php echo $propiedad->habitaciones; ?></p>
                </li>
            </ul>
            
            <div class="flex-end">
                <a class="bot2" href="anuncio.php?id=<?php echo $propiedad->id; ?>">Ver Propiedad</a>
            </div>
        </div>
    <?php } ?>
</div>