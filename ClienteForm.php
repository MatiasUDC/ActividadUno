<?php

require 'Form.php';

class ClienteForm extends Form {

    //categorias del tag <select>
    public $localidad;
    protected $errores = [];
    protected $valores = [];

    public function __construct() {
        $this->localidad = [1 => "Trelew", 2 => "Rawson", 3 => "Puerto Madryn", 4 => "Comodoro Rivadavia", 5 => "Playa Union"];
    }

    public function tieneValor($campo) {
        return !empty($this->valores[$campo]);
    }

    public function getValor($campo) {
        return $this->tieneValor($campo) ? $this->valores[$campo] : null;
    }

    public function tieneErrores() {
        return !empty($this->errores);
    }

    public function tieneError($campo) {
        return !empty($this->errores[$campo]);
    }

    public function getError($campo) {
        return $this->tieneError($campo) ? $this->errores[$campo] : null;
    }

    public function setError($campo, $mensaje) {
        $this->errores[$campo] = $mensaje;
    }

    public function procesar($arreglo_datos) {
        $this->rellenarCon($arreglo_datos);
        $this->validar();

        return empty($this->errores);
    }

    public function getChecked($campo) {
        return $this->getValor($campo) ? "checked" : "";
    }

    public function getSelected($campo, $valor_ref) {
        return $this->getValor($campo) == $valor_ref ? "selected" : "";
    }

    protected function rellenarCon($arreglo_datos) {
        foreach ($arreglo_datos as $k => $v) {
            $this->valores[$k] = $v;
        }
    }

    protected function validar() {
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
        $fecha = explode("/", $this->getValor($campo));
        if (empty($fecha)) {
            $this->setError($campo, "La fecha es invalida");
        }
        if (count($fecha) < 3) {
            $this->setError($campo, "La fecha es invalida");
        }
        if (count($fecha) > 3) {
            $this->setError($campo, "La fecha es invalida");
        }
        if (!checkdate((int) $fecha[1], (int) $fecha[0], (int) $fecha[2])) {
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
