<?php 

namespace Controllers;

use MVC\Router;
use Model\vendedores;

class VendedoresController {

    public static function crear(Router $router) {

        estaAutenticado();

        $ext = true;
        $errores = vendedores::getErrores();
        $vendedor = new vendedores;

        //? Ejecutar codigo despues de enviar formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //! Crea una nueva instancia
            $vendedor = new vendedores($_POST['vendedor']);

            //! Validar para poder escribir en el servidor
            $errores = $vendedor->validar();

            if (empty($errores)) {

                //? Guarda en la DB
                $vendedor->guardar();

            }

        }

        $router->render('vendedores/crear', [
            'titulo' => 'Registrar Vendedor',
            'errores' => $errores,
            'vendedor' => $vendedor,
            'ext' => $ext
        ]);

    }

    public static function actualizar(Router $router) {

        estaAutenticado();

        $id = validarORedireccionar('/admin');

        $ext = true;
        $vendedor = vendedores::find($id);
        $errores = vendedores::getErrores();

         //? Ejecutar codigo despues de enviar formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
            //? Asignar los atributos
            $args = $_POST['vendedor'];
            $vendedor->sincronizar($args);

            //? Validacion
            $errores = $vendedor->validar();

            //? Revisar que el array de errores este vacio
            if(empty($errores)) {
                
                //! Insertar en la base de datos
                $vendedor->guardar();

            }
        }

        $router->render('vendedores/actualizar', [
            'titulo' => 'Actualizar Vendedor',
            'vendedor' => $vendedor,
            'errores' => $errores,
            'ext' => $ext
        ]);

    }

    public static function eliminar() {

        estaAutenticado();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //? Validar id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if($id) {
    
                $tipo = $_POST['tipo'];
                if (validarContenido($tipo)) {
                    //? Obtener los datos de la propiedad
                    $vendedor = vendedores::find($id);
                    $vendedor->eliminar();
                }
    
            }
        }
    }
}