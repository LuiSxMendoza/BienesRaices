<main class="contenedor contacto">
    <div class="contacto-titulo">
        <h1>Contacto</h1>

        <?php if($mensaje) { ?>
            <p class='alerta exito'> <?php echo $mensaje ?></p>;
        <?php } ?>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpg">
            <img src="build/img/destacada3.jpg" alt="img-contacto" loading="lazy">
        </picture>
    </div>
    <div class="contacto-formulario">
        <h2>
            Llena el formulario de Contacto
        </h2>
        <form class="formulario" action="/public/contacto" method="POST">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="nombre">Nombre</label>
                <input class="campo__field" type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]" required>
                
                <label for="">Mensaje</label>
                <textarea id="mensaje" name="contacto[mensaje]" required></textarea>

            </fieldset>

            <fieldset>
                <legend>Informacion sobre la Propiedad</legend>

                <label for="opciones">¿Vende o Compra?</label>

                <select id="opciones" name="contacto[tipo]" required>
                    <option value="" selected disabled>-- Seleccione --</option>
                    <option value="Vende">Vende</option>
                    <option value="Compra">Compra</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input class="campo__field" type="number" placeholder="Tu Precio o Presupuesto" id="presupuesto" name="contacto[presupuesto]" required>
            </fieldset>

            <fieldset>
                <legend>Contacto</legend>
                <p>
                    Como desea ser contactado:
                </p>
                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input class="campo__field" type="radio" id="contactar-telefono" value="telefono" name="contacto[contacto]" required>

                    <label for="contactar-email">EMail</label>
                    <input class="campo__field" type="radio" id="contactar-email" value="email" name="contacto[contacto]" required>
                </div>

                <div id="contacto"></div>
            </fieldset>

            <div class="flex-bot">
                <input type="submit" value="Enviar" class="button-form">
            </div>

        </form>
    </div>
</main>