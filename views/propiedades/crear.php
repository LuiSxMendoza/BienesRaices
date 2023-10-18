<main class="menu contenedor">
        <div class="titulo1">
            <h1>Crear</h1>

            <a class="boton" href="/admin">Volver</a>

            <?php foreach ( $errores as $error ): ?>
                <div class="alerta error">
                    <?php echo $error; ?>
                </div>
            <?php endforeach; ?>

            <form class="formulario" method="POST" enctype="multipart/form-data">
                
                <?php include __DIR__ . '/formulario.php'; ?>
                <input type="submit" class="boton" value="Crear Propiedad">

            </form>
        </div>
</main>
