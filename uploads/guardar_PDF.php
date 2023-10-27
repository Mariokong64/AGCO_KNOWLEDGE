<?php

$targetfolder = "PDFs/";

//identificador único
$numeroAleatorio = str_pad(rand(1,9999), 4, '0', STR_PAD_LEFT);

// Nombre original del archivo
$archivoNombre = $_FILES['file']['name'];
$archivoNombre = $numeroAleatorio . $archivoNombre;

// Ruta completa del archivo
$rutaCompleta = $targetfolder . $archivoNombre;

// Obtiene la extensión del archivo
$extension = pathinfo($archivoNombre, PATHINFO_EXTENSION);

// Verifica si es un archivo PDF
if (strtolower($extension) === 'pdf') {

    if (move_uploaded_file($_FILES['file']['tmp_name'], $rutaCompleta)) {

        echo "El archivo " . $archivoNombre . " se subió correctamente";

        // i want to print the variable $rutaCompleta in the console
        echo "<script>console.log('Debug Objects: " . $rutaCompleta . "' );</script>";
        
    } else {
        echo "Problem uploading PDF file";
    }
} else {
    echo "File is not a PDF";
}

?>
