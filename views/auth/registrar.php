<main class="menu contenedor contenido-centrado">
    <div class="titulo1">
        <h1>Crear Cuenta</h1>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php 
                    echo $error;
                    $page = $_SERVER['REQUEST_URI'];
                    //debuguear($_SERVER);
                    $sec = "3";
                    header("Refresh: $sec; url=$page");
                ?>
            </div>
        <?php endforeach; ?>

        <form method="POST" class="formulario" action="/registrar-lm">
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