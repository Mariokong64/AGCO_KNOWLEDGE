<?php

require_once "../controladores/windows.controlador.php";
require_once "../controladores/wiki.controlador.php";
require_once "../controladores/otros.controlador.php";
require_once "../controladores/intelisis.controlador.php";
require_once "../controladores/internet.controlador.php";
require_once "../controladores/servidores.controlador.php";
require_once "../controladores/office.controlador.php";
require_once "../controladores/afsystem.controlador.php";
require_once "../controladores/agcosolutions.controlador.php";
require_once "../modelos/editorTexto.modelo.php";

class AjaxEditorTexto
{

    /* =============================================================
            FUNCIÓNES PARA MOSTRAR CONTENIDO EN EL EDITOR DE TEXTO
    ===============================================================*/

    public $idTema;

    //TEMAS DE WINDOWS
    public function ajaxMostrarContenidoWindows()
    {

        $item = "id_contenido";
        $valor = $this->idTema;

        $respuesta = ControladorWindows::ctrMostrarContenido($item, $valor);

        echo json_encode($respuesta);
    }

    //TEMAS DE INTELISIS
    public function ajaxMostrarContenidoIntelisis()
    {

        $item = "id_contenido";
        $valor = $this->idTema;

        $respuesta = ControladorIntelisis::ctrMostrarContenido($item, $valor);

        echo json_encode($respuesta);
    }

    //TEMAS DE AGCO SOLUTIONS
    public function ajaxMostrarContenidoAGCOsolutions()
    {

        $item = "id_contenido";
        $valor = $this->idTema;

        $respuesta = ControladorAGCOsolutions::ctrMostrarContenido($item, $valor);

        echo json_encode($respuesta);
    }

    //TEMAS DE INTERNET
    public function ajaxMostrarContenidoInternet()
    {

        $item = "id_contenido";
        $valor = $this->idTema;

        $respuesta = ControladorInternet::ctrMostrarContenido($item, $valor);

        echo json_encode($respuesta);
    }

    //TEMAS DE SERVIDORES
    public function ajaxMostrarContenidoServidores()
    {

        $item = "id_contenido";
        $valor = $this->idTema;

        $respuesta = ControladorServidores::ctrMostrarContenido($item, $valor);

        echo json_encode($respuesta);
    }

    //TEMAS DE OFFICE
    public function ajaxMostrarContenidoOffice()
    {

        $item = "id_contenido";
        $valor = $this->idTema;

        $respuesta = ControladorOffice::ctrMostrarContenido($item, $valor);

        echo json_encode($respuesta);
    }

    //TEMAS DE AF SYSTEM
    public function ajaxMostrarContenidoAFsystem()
    {

        $item = "id_contenido";
        $valor = $this->idTema;

        $respuesta = ControladorAFsystem::ctrMostrarContenido($item, $valor);

        echo json_encode($respuesta);
    }

    //TEMAS DE WIKI
    public function ajaxMostrarContenidoWiki()
    {

        $item = "id_contenido";
        $valor = $this->idTema;

        $respuesta = ControladorWiki::ctrMostrarContenido($item, $valor);

        echo json_encode($respuesta);
    }

    //TEMAS DE OTROS
    public function ajaxMostrarContenidoOtros()
    {

        $item = "id_contenido";
        $valor = $this->idTema;

        $respuesta = ControladorOtros::ctrMostrarContenido($item, $valor);

        echo json_encode($respuesta);
    }
}

/* ===========================================
           OBJETOS DEL EDITOR DE TEXTO
============================================*/

/* ==========================================
     MOSTRAR TEXTO EN EL EDITOR DE TEXTO 
============================================*/

//FUNCION PARA MOSTRAR EL CONTENIDO DE LOS TEMAS DE WINDOWS
if (isset($_POST["idTemaWindows"])) {

    $texto = new AjaxEditorTexto();
    $texto->idTema = $_POST["idTemaWindows"];
    $texto->ajaxMostrarContenidoWindows();
}

//FUNCION PARA MOSTRAR EL CONTENIDO DE LOS TEMAS DE INTELISIS
if (isset($_POST["idTemaIntelisis"])) {

    $texto = new AjaxEditorTexto();
    $texto->idTema = $_POST["idTemaIntelisis"];
    $texto->ajaxMostrarContenidoIntelisis();
}

//FUNCION PARA MOSTRAR EL CONTENIDO DE LOS TEMAS DE AGCO SOLUTIONS
if (isset($_POST["idTemasolutions"])) {

    $texto = new AjaxEditorTexto();
    $texto->idTema = $_POST["idTemasolutions"];
    $texto->ajaxMostrarContenidoAGCOsolutions();
}

//FUNCION PARA MOSTRAR EL CONTENIDO DE LOS TEMAS DE INTERNET
if (isset($_POST["idTemaInternet"])) {

    $texto = new AjaxEditorTexto();
    $texto->idTema = $_POST["idTemaInternet"];
    $texto->ajaxMostrarContenidoInternet();
}

//FUNCION PARA MOSTRAR EL CONTENIDO DE LOS TEMAS DE SERVIDORES
if (isset($_POST["idTemaServidores"])) {

    $texto = new AjaxEditorTexto();
    $texto->idTema = $_POST["idTemaServidores"];
    $texto->ajaxMostrarContenidoServidores();
}

//FUNCION PARA MOSTRAR EL CONTENIDO DE LOS TEMAS DE OFFICE
if (isset($_POST["idTemaOffice"])) {

    $texto = new AjaxEditorTexto();
    $texto->idTema = $_POST["idTemaOffice"];
    $texto->ajaxMostrarContenidoOffice();
}

//FUNCION PARA MOSTRAR EL CONTENIDO DE LOS TEMAS DE AGCO AF SYSTEM
if (isset($_POST["idTemaAFsystem"])) {

    $texto = new AjaxEditorTexto();
    $texto->idTema = $_POST["idTemaAFsystem"];
    $texto->ajaxMostrarContenidoAFsystem();
}

//FUNCION PARA MOSTRAR EL CONTENIDO DE LOS TEMAS DE WIKI
if (isset($_POST["idTemaWiki"])) {

    $texto = new AjaxEditorTexto();
    $texto->idTema = $_POST["idTemaWiki"];
    $texto->ajaxMostrarContenidoWiki();
}

//FUNCION PARA MOSTRAR EL CONTENIDO DE LOS TEMAS DE OTROS
if (isset($_POST["idTemaOtros"])) {

    $texto = new AjaxEditorTexto();
    $texto->idTema = $_POST["idTemaOtros"];
    $texto->ajaxMostrarContenidoOtros();
}
