<main class="menu contenedor">
        <div class="titulo1">
            <h1>Administrador de Bienes Raices</h1>

            <!--  Funcion msj de exito  -->
            <?php 
                $titulo = 'Admin';
                if($resultado) {
                    $mensaje = mostrarAlertas(intval($resultado));
                if($mensaje) { ?>
                    <p class="alerta exito"><?php echo sn($mensaje) ?></p>
                <?php } ?> 

            <?php } ?>

            <h2>Propiedades</h2>

            <a class="boton" href="/propiedades/crear">Nueva Propiedad</a>

            <table class="propiedades">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Titulo</th>
                        <th>Imagen</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody> <!-- Mostrar los resultados -->            
                    <?php foreach( $propiedades as $propiedad ): ?>
                    <tr>
                        <td><?php echo $propiedad->id; ?></td>
                        <td><?php echo $propiedad->titulo; ?></td>
                        <td> <img src="/imagenes/<?php echo $propiedad->imagen; ?>" class="img-tabla"></td>
                        <td>$ <?php echo number_format($propiedad->precio); ?></td>
                        <td>
                            <form method="POST" class="w-100" action="/propiedades/eliminar">
                                <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                                <input type="hidden" name="tipo" value="propiedad">
                                <input type="submit" class="boton-rojo" value="Eliminar">
                            </form>
                            <a href="/propiedades/actualizar?id=<?php echo $propiedad->id; ?>" 
                               class="boton-naranja">Actualizar
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h2>Vendedores(as)</h2>

            <a class="boton" href="/vendedores/crear">Nuevo Vendedor(a)</a>

            <table class="propiedades">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Telefono</th>
                        <th>E-mail</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody> <!-- Mostrar los resultados -->            
                    <?php foreach( $vendedores as $vendedor ): ?>
                    <tr>
                        <td><?php echo $vendedor->id; ?></td>
                        <td><?php echo $vendedor->nombre; ?></td>
                        <td><?php echo $vendedor->apellido; ?></td>
                        <td><?php echo $vendedor->telefono; ?></td>
                        <td><?php echo $vendedor->email; ?></td>
                        <td>
                            <form method="POST" class="w-100" action="/vendedores/eliminar">
                                <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                                <input type="hidden" name="tipo" value="vendedor">
                                <input type="submit" class="boton-rojo" value="Eliminar">
                            </form>
                            <a href="/vendedores/actualizar?id=<?php echo $vendedor->id; ?>" 
                               class="boton-naranja">Actualizar
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
</main>
