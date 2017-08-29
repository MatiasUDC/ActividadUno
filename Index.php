<?php
$ciudades = ["Recoleta", "Ciudadela", "Fuerte Apache"];
$personaje = $_GET["personaje"];
$vive = $_GET["vive"];

if (!isset($GET)) {
    $resultado;
    if ($personaje == null || !is_string($personaje)) {
        $error["personaje"] = "Debe ingresar una cadena valida";
    } else {
        $resultado["personaje"] = strtoupper($personaje);
    }
    if ($vive == null) {
        $error["vive"] = "Debe ingresar un estado valido";
    } else {
        $resultado["vive"] = $vive;
    }
}
require './Index_vista.php';