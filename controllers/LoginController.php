<?php

namespace Controllers;

use MVC\Router;
use Model\Admin;

class LoginController {

    public static function login(Router $router) {
        
        $errores = [];
        $ext = true;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $auth = new Admin($_POST);

            $errores = $auth->validar();

            if(empty($errores)) {
                //? Verificar si el usuario existe
                $resultado = $auth->existeUsuario();

                if(!$resultado) {
                    //? Msj error
                    $errores = Admin::getErrores();

                } else {
                    //? Veriicar si la contraseña es correcta
                    $autenticado = $auth->comprobarPassword($auth->password);

                    if($autenticado) {
                        //? Autenticar usuario
                        $auth->autenticar();
                    } else {
                        //? Msj error
                        $errores = Admin::getErrores();
                    }
                }

            }
        }

        $router->render('auth/login', [
            'titulo' => 'Login',
            'ext' => $ext,
            'errores' => $errores           
        ]);

    }
    
    public static function logout() {
       
        session_start();

        $_SESSION = [];

        header('Location: /index.php');

    }

    public static function registrar(Router $router) {

        //? Alertas vacias
        $errores = [];
        $ext = true;

        $usuario = new Admin();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $errores = $usuario->validar();

            if (empty($errores)) {
                $resultado = $usuario->existeUsuario();

                if ($resultado->num_rows) {
                } else {
                    //? Hashear password
                    $usuario->hashPassword();

                    //? Almacenar en la base de datos
                    $resultado = $usuario->guardar();

                    if($resultado) {
                        header('Location: /admin');
                    }
                }
            }
        }

        //! Mostrar alertas
        $errores = Admin::getErrores();

        $router->render('auth/registrar', [
            'titulo' => 'Registrar Usuario',
            'errores' => $errores,
            'ext' => $ext,
            'usuario' => $usuario
        ]);
    }

}