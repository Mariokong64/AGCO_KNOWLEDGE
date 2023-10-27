<!-- ESTE ES LA PLANTILLA. EN ESTE HTML AGREGAMOS TODOS LOS PLUGINS Y EXTENSIONES QUE UTILIZAMOS, COMO EL BOOTSTRAP 4, ASÍ MISMO, AGREGAMOS EL ENCABEZADO
     EL MENÚ LATERAL Y DEPENDIENDO DE QUE OPCIÓN SE SELECCIONE SE INCLUYE EN LA VENTANA DEL CENTRO EL CONTENIDO DE ESA OPCIÓN. AL FINAL SE INCLUYE EL JAVASCRIPT -->
<?php

session_start();

?>

<!DOCTYPE html>

<html>

<header>

    <title>Base del conocimiento</title>

</header>

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Base del conocimiento</title>

    <!-- Tell the browser to be responsive to screen width -->

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Icono que se muestra en la pestaña del navegador -->

    <link rel="icon" href="vistas/img/agcoicon.png">

    <!-- CSS -->

    <link rel="stylesheet" href="vistas/CSS/CeEseEse.css">

    <!-- Bootstrap -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">



    <!-- SweetAlert 2 -->
    <script src="extensiones/plugins/sweetalert2/sweetalert2.all.js"></script>

    <!-- Datatables -->
    <!-- CSS de las Datatables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <!-- JavaScript de las Datatables -->
    <script defer src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <!-- CKEditor Ecosystems (Classic editor) 
    <script defer src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- jsPDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <!-- html2pdf -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>


</head>


<!-- =======================================================
                   CUERPO DEL DOCUMENTO
======================================================== -->


<body>

    <!-- Site wrapper -->

    <?php

    if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {

        echo '<div class="wrapper">';

        /* =======================================================
                         MENU SUPERIOR (Navigation bar)
    ======================================================== */

        include "navbar.php";

        /* =======================================================
                           CONTENIDO
    ======================================================== */

        if (isset($_GET["ruta"])) {

            if (

                $_GET["ruta"] == "agcosolutions" ||
                $_GET["ruta"] == "documentacion" ||
                $_GET["ruta"] == "inicio" ||
                $_GET["ruta"] == "intelisis" ||
                $_GET["ruta"] == "internet" ||
                $_GET["ruta"] == "afsystem" ||
                $_GET["ruta"] == "office" ||
                $_GET["ruta"] == "otros" ||
                $_GET["ruta"] == "usuarios" ||
                $_GET["ruta"] == "servidores" ||
                $_GET["ruta"] == "windows" ||
                $_GET["ruta"] == "wiki" ||
                $_GET["ruta"] == "salir"

            ) {

                include "vistas/" . $_GET["ruta"] . ".php";
            } else {

                include "vistas/404.php";
            }
        } else {

            include "vistas/inicio.php";
        }

        echo '</div>';
    } else {

        include "vistas/login.php";
    }

    ?>

    </div>

    <!-- Scripts míos -->

    <script defer src="JS/JavaScriptGeneral.js"></script>
    <script defer src="JS/usuarios.js"></script>
    <script defer src="JS/subidordeimagenes.js"></script>
    <script type="module" defer src="JS/generacionPDF.js"></script>
    <script src="extensiones/ckeditor/build/ckeditor.js"></script>
    <script defer src="JS/documentacion.js"></script>

</body>

</html>