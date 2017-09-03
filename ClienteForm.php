<?php

require 'Form.php';

class ClienteForm extends Form {

    //categorias del tag <select>
    public $localidad;

    public function __construct() {
        $this->localidad = [1 => "Trelew", 2 => "Rawson", 3 => "Puerto Madryn", 4 => "Comodoro Rivadavia", 5 => "Playa Union"];
    }

    protected function procesarCampos() {
        $this->procesarNombre('nombre');
        $this->procesarApellido('apellido');
        $this->procesarFecha('fecha');
        $this->procesarLocalidad('localidad');
    }

    protected function procesarNombre($campo) {
        $nombre = $this->getValor($campo);

        //valido parametro
        if (empty($nombre)) {
            $this->setError($campo, "Faltó ingresar el Nombre");
            return; //si hay error, no seguir validando
        }

        //otra validacion
        if (strlen($nombre) < 2) {
            $this->setError($campo, "El nombre es muy corto");
        }

        //otra validacion
        if ($nombre == $this->getValor('apellido')) {
            $this->setError($campo, "El nombre no puede ser igual al apellido");
        }
    }

    protected function procesarApellido($campo) {
        $apellido = $this->getValor($campo);

        //valido parametro
        if (empty($apellido)) {
            $this->setError($campo, "Faltó ingresar el apellido de la persona");
            return; //si hay error, no seguir validando
        }

        //otra validacion
        if (strlen($apellido) < 2) {
            $this->setError($campo, "El apellido es muy corto");
        }

        //otra validacion
        if ($apellido == $this->getValor('nombre')) {
            $this->setError($campo, "El apellido no puede ser igual al nombre");
        }
    }

    protected function procesarFecha($campo) {
        //$fecha = $this->getValor($campo);
        if (empty($fecha)) {
            $this->setError($campo, "La fecha es invalida");
        }
        $fecha = explode("/", $this->getValor($campo));

        if (count($fecha) < 3) {
            $this->setError($campo, "La fecha es invalida");
        }
        
        if (!checkdate((int)$fecha[1], (int)$fecha[0], (int)$fecha[2])) {
            $this->setError($campo, "La fecha es invalida");
        }
    }

    protected function procesarLocalidad($campo) {
        $localidad = $this->getValor($campo);

        //valido parametro
        if (empty($localidad)) {
            $this->setError($campo, "Falta seleccionar la Localidad");
        }
    }

}
