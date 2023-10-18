<main class="menu contenedor">
        <div class="titulo1">
            <h1>Registrar Vendedor(a)</h1>

            <a class="boton" href="/admin">Volver</a>

            <?php foreach ( $errores as $error ): ?>
                <div class="alerta error">
                    <?php echo $error; ?>
                </div>
            <?php endforeach; ?>

            <form class="formulario" method="POST" enctype="multipart/form-data" action="/public/vendedores/crear">
                
                <?php include 'formulario.php' ?>
                <input type="submit" class="boton" value="Registrar Vendedor(a)">

            </form>

        </div>
</main>
