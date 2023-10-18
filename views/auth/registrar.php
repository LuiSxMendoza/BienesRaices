<main class="menu contenedor contenido-centrado">
    <div class="titulo1">
        <h1>Crear Cuenta</h1>

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
        <?php endforeach; ?>

        <form method="POST" class="formulario" action="/registrar">
            <fieldset class="form2">

                <legend>Ingresa tus Datos</legend>

                <label for="email">E-Mail</label>
                <input class="campo__field" type="mail" placeholder="Tu E-Mail" id="email" name="email">

                <label for="password">Password</label>
                <input class="campo__field" type="password" placeholder="Tu Password" id="password" name="password">

            </fieldset>

            <input type="submit" value="Crear Cuenta" class="boton">
        </form>
    </div>
</main>