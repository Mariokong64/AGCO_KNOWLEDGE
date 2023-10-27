<?php

// Ruta donde se guardarán las imágenes
$uploadFolder = 'C:/xampp/htdocs/AGCO_KNOWLEDGE_SYSTEM/uploads/images/';

// Obtenemos el archivo enviado
if (isset($_FILES['upload'])) {

    $file = $_FILES['upload'];
    $uniqueFileName = $_POST['uniqueName'];

    // Verificamos si hay algún error en la subida
    if ($file['error'] !== UPLOAD_ERR_OK) {
        die('Error al subir la imagen.');
    }

    // Generamos un nombre de archivo único
    $fileName = $file['name'];

   
    if (move_uploaded_file($file['tmp_name'], $uploadFolder . $uniqueFileName)) {
 
        echo json_encode(['success' => true, 'fileName' => $uniqueFileName]);
    } else {
      
        echo json_encode(['error' => 'Error al guardar la imagen.']);
    }
} else {
   
    echo json_encode(['error' => 'No se recibió ninguna imagen.']);
}


