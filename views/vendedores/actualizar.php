<main class="menu contenedor">
        <div class="titulo1">
            <h1>Actualizar Vendedor(a)</h1>

            <a class="boton" href="/admin">Volver</a>

            <?php foreach ( $errores as $error ): ?>
                <div class="alerta error">
                    <?php echo $error; ?>
                </div>
            <?php endforeach; ?>

            <form class="formulario" method="POST" >
               
                <?php include 'formulario.php' ?>
                <input type="submit" class="boton" value="Actualizar Vendedor">

            </form>

        </div>
</main>