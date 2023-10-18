<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\vendedores;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController {

    public static function index(Router $router) {

        $ext = true;
        $propiedades = Propiedad::all();
        $vendedor = vendedores::all();

        //? Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado,
            'vendedores' => $vendedor,
            'ext' => $ext
        ]);    
    }

    public static function crear(Router $router) {

        $ext = true;
        $propiedad = new Propiedad;
        $vendedor = vendedores::all();
        $errores = Propiedad::getErrores();

        //? Ejecutar codigo despues de enviar formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //! Crea una nueva instancia
            $propiedad = new Propiedad($_POST['propiedad']);

            //! Subida de archivos
            //? Generar nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            //! Setear la imagen
            //? Realiza un resize a la imagen con intervention
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImagen($nombreImagen);
            }

            //! Validar para poder escribir en el servidor
            $errores = $propiedad->validar();
    
            if (empty($errores)) {

                //? Crear la carpeta para subir imagenes
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                //? Guarda imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);

                //? Guarda en la DB
                $propiedad->guardar();

            }

        }

            $router->render('propiedades/crear', [
                'propiedad' => $propiedad,
                'vendedores' => $vendedor,
                'errores' => $errores,
                'ext' => $ext
            ]);

    }

    public static function actualizar(Router $router) {

        $id = validarORedireccionar('/admin');

        $ext = true;
        $propiedad = Propiedad::find($id);
        $errores = Propiedad::getErrores();
        $vendedor = vendedores::all();

        //? Ejecutar codigo despues de enviar formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //? Asignar los atributos
            $args = $_POST['propiedad'];
            $propiedad->sincronizar($args);

            //? Validacion
            $errores = $propiedad->validar();

            //! Subida de archivos
            //? Generar nombre unico
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

            //? Realiza un resize a la imagen con intervention
            if($_FILES['propiedad']['tmp_name']['imagen']) {

                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen);

            }

            //? Revisar que el array de errores este vacio
            if(empty($errores)) {

                if ($_FILES['propiedad']['tmp_name']['imagen']) {
                    //! Almacenar imagen
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
                
                //! Insertar en la base de datos
                $propiedad->guardar();

            }
        }

        $router->render('propiedades/actualizar', [
            'errores' => $errores,
            'propiedad' => $propiedad, 
            'vendedores' => $vendedor,
            'ext' => $ext
        ]);

    }

    public static function eliminar() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //? Validar id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if($id) {
    
                $tipo = $_POST['tipo'];
                if (validarContenido($tipo)) {
                    //? Obtener los datos de la propiedad
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }
    
            }
        }
    }

}