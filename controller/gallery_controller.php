<?php

class Gallery_controller{




    
    public function displayImages($limit = null){
        $galleryManager = new GalleryManager();

        $images = $galleryManager->getAllImages();

        if($limit !== null){
            $images = array_slice($images, 0, $limit);
        }

        return $images;
    }

        public function uploadImage() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['photo'])) {
                $photo = $_FILES['photo'];
                $section = $_POST['section'];
    
                // Verificar que el archivo se subió sin errores
                if ($photo['error'] === UPLOAD_ERR_OK) {
                    $uploadDir = './photos/products/';
                    $fileName = basename($photo['name']);
                    $filePath = $uploadDir . $fileName;
    
                    // Mover el archivo subido a la carpeta de uploads
                    if (move_uploaded_file($photo['tmp_name'], $filePath)) {
                        $galleryManager = new GalleryManager();
                        $galleryManager->saveImage($filePath, $section);
                        
                        echo "Imagen subida y guardada en la base de datos correctamente.";
                        header('Location: /ByKate_Stage/gestion');
                        exit;
                        
                    } else {
                        echo "Error al mover la imagen al directorio de uploads.";
                    }
                } else {
                    echo "Error al subir la imagen.";
                }
            }
        }
    
    

}