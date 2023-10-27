<?php

/* ESTE ES EL ARCHIVO PRINCIPAL, ESTE ARCHIVO REQUIERE AL CONTROLADOR Y AL MODELO DE TODOS LOS MODULOS DEL SISTEMA Y DESPUES EJECUTA EL MÉTODO
ctrPlantilla() DE LA CLASE ControladorPlantilla() LA CUAL ESTÁ EN "vistas/plantilla.php" */

require_once "controladores/agcosolutions.controlador.php";
require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/windows.controlador.php";
require_once "controladores/wiki.controlador.php";
require_once "controladores/intelisis.controlador.php";
require_once "controladores/internet.controlador.php";
require_once "controladores/office.controlador.php";
require_once "controladores/servidores.controlador.php";
require_once "controladores/editorTexto.controlador.php";
require_once "controladores/afsystem.controlador.php";
require_once "controladores/otros.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/editorTexto.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();
