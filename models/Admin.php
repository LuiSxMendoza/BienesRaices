<?php

namespace Model;

class Admin extends ActiveRecord {

    //? Base de datos
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'email', 'password'];

    public $id;
    public $email;
    public $password;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function validar()
    {
        if (!$this->email) {
            self::$errores[] = "El email es obligatorio";
        }
        if (!$this->password) {
            self::$errores[] = "La contraseña es obligatoria";
        }
        if(strlen($this->password) < 6) {
            self::$errores[] = "El password debe contener al menos
            6 caracteres";
        }
        if(!preg_match('^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})^', $this->email)) {
            self::$errores[] = "Ingresa un email valido";
        }

        return self::$errores;
    }

    public function existeUsuario() {

        //? Revisar si un usuario existe
        $query = "SELECT * FROM " . self::$tabla . 
        " WHERE email = '" . $this->email . "' LIMIT 1";

        $resultado = self::$db->query($query);

        if($resultado->num_rows) {
            self::$errores[] = 'El usuario ya esta registrado';
            return;
        } 

        return $resultado;
    }

    //! Hash password
    public function hashPassword() {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function comprobarPassword($password) {

        $autenticado = password_verify($password, $this->password);

        if(!$autenticado) {
            self::$errores[] = 'El password es incorrecto';
        }

        return true;

    }

    public function autenticar() {

        session_start();

        //? Llenar el arreglo de la sesion
        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;

        header('location: /admin');

    }

}