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
            'titulo' => 'Iniciar Sesion',
            'ext' => $ext,
            'errores' => $errores           
        ]);

    }
    
    public static function logout() {
       
        session_start();

        $_SESSION = [];

        header('Location: /');

    }

    public static function registrar(Router $router) {
        $usuarios = new Admin;

        //? Alertas vacias
        $errores = [];
        $ext = true;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuarios->sincronizar($_POST);
            $errores = $usuarios->validar();
            //debuguear($usuario);

            if(empty($errores)) {
                //? Verificar si el usuario existe
                $resultado = $usuarios->existeUsuario();

                if($resultado->num_rows) {
                } else {
                    //? Hashear password
                    $usuarios->hashPassword();

                    //? Almacenar en la base de datos
                    $resultado = $usuarios->guardar();

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
            'usuario' => $usuarios
        ]);
    }

}