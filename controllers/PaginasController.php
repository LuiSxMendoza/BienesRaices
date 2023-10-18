<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController {

    public static function index( Router $router ) {
        
        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('paginas/index', [
            'titulo' => 'App Web',
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);

    }

    public static function nosotros( Router $router) {

        $ext = true;

        $router->render('paginas/nosotros', [
            'titulo' => 'Nosotros',
            'ext' => $ext           
        ]);

    }

    public static function anuncios(Router $router) {
        
        $ext = true;
        $propiedades = Propiedad::all();

        $router->render('paginas/anuncios', [
            'titulo' => 'Anuncios',
            'ext' => $ext,
            'propiedades' => $propiedades
        ]);

    }

    public static function anuncio(Router $router) {

        $id = validarORedireccionar('/propiedades');
        
        $ext = true;
        $propiedad = Propiedad::find($id);

        $router->render('paginas/anuncio', [
            'titulo' => 'Anuncio',
            'ext' => $ext,
            'propiedad' => $propiedad
        ]);

    }

    public static function blog(Router $router) {
        
        $ext = true;

        $router->render('paginas/blog', [
            'titulo' => 'Blog',
            'ext' => $ext           
        ]);

    }

    public static function entrada(Router $router) {
        
        $ext = true;

        $router->render('paginas/entrada', [
            'titulo' => 'Entrada',
            'ext' => $ext           
        ]);

    }

    public static function contacto(Router $router) {
        
        $ext = true;
        $mensaje = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $respuestas = $_POST['contacto'];

            //? Crear una nueva instancia de PHPMailer
            $mail = new PHPMailer();

            //? Configurando SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '82d65c5cad2eaf';
            $mail->Password = 'e9da9cdf5c125c';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            //? Configurar contenido del mail
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $mail->Subject = 'Tienes un nuevo correo';

            //? Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            //? Definir el conenido
            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . '</p>';
    

            //? Enviar de forma condicional algunos campos de email o telefono
            if($respuestas['contacto'] === 'telefono') {
                $contenido .= '<p>Eligio ser contactado por telefono</p>';
                $contenido .= '<p>telefono: ' . $respuestas['telefono'] . '</p>';
                $contenido .= '<p>Fecha de contacto: ' . $respuestas['fecha'] . '</p>';
                $contenido .= '<p>Hora: ' . $respuestas['hora'] . '</p>';

            } else {
                $contenido .= '<p>Eligio ser contactado por email</p>';
                $contenido .= '<p>email: ' . $respuestas['email'] . '</p>';
            }
            
            $contenido .= '<p>mensaje: ' . $respuestas['mensaje'] . '</p>';
            $contenido .= '<p>¿Vende o Compra?: ' . $respuestas['tipo'] . '</p>';
            $contenido .= '<p>Tu Precio o Presupuesto: $' . $respuestas['presupuesto'] . '</p>';
            $contenido .= '<p> Como desea ser contactado: ' . $respuestas['contacto'] . '</p>';
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'Texto alternativo sin HTML';

            //? Enviar email
            if($mail->send()) {
                $mensaje = "Correo enviado correctamente";
            } else {
                $mensaje = "El correo no se pudo enviar";
            }
            
        }

        $router->render('paginas/contacto', [
            'titulo' => 'Contacto',
            'ext' => $ext,
            'mensaje' => $mensaje           
        ]);

    }

}