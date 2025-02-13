<main>
    <div class="containerText">
        <h1 class="titlePage">NUESTROS PRODUCTOS</h1>
        <p class="textPage"><?php echo $textController->displayText('/ByKate_Stage/nuestrosproductos', 'productos') ?>
            (click <a href="/ByKate_Stage/contacto"> aquí</a>).</p>
        <p class="textPage">Para ver el menú que encontrarás en nuestra tienda, click <a
                href="https://drive.google.com/file/d/1RjpJ7kokre2Qq0veHm6EvYbCwXEs0hc-/view?usp=sharing"
                target="_blank"> aquí</a></p>
        <p class="textPage">Para ver el menú para pasteles por encargo, click <a href="#" target="_blank"> aquí</a></p>
    </div>
    <div class="gallery-container">
        <?php
        if (!empty($images)) {
            foreach ($images as $image) {
                echo '<div class="gallery-item">';
                echo '<img src="' . htmlspecialchars($image['photo_path']) . '" alt="Imagen de la galería">';
                echo '</div>';
            }
        } else {
            echo "<p>No hay imágenes disponibles.</p>";
        }
        ?>
    </div>
</main>