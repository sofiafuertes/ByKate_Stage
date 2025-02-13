<main>
    <div id="automaticSlide">
    </div>

    <section class="productsSection">
        <h1>Nuestros Productos</h1>
        <div class="productsContainer">
            <div class="products">
                <?php if (empty($images)): ?>
                    <p>No hay productos registrados</p>
                <?php else: ?>
                    <?php foreach ($images as $image): ?>
                        <div style="" class="imageProduct">
                            <img src="<?= htmlspecialchars($image['photo_path']) ?>"
                                alt="<?= htmlspecialchars($image['photo_path']) ?>">
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="divButton">
            <button><a href="/ByKate_Stage/nuestrosproductos">Todos los productos</a></button>
        </div>
    </section>

    <section class="sectionAboutUs">
        <div class="sectionContainer">
            <div class="sectionContent">
                <div class="sectionTitle">
                    <h1>La historia de nuestra tienda</h1>
                </div>
                <div class="sectionText">
                    <p><?php echo $controller->displayText('/ByKate_Stage/quienessomos', 'storyShop') ?></p>
                </div>
                <div class="divButton">
                    <button><a href="/ByKate_Stage/quienessomos">Continuar leyendo</a></button>
                </div>
            </div>
            <div class="sectionImg">
                <img src="./photos/storyShop.jpg" alt="Foto de la tienda desde arriba">
            </div>
        </div>
    </section>


</main>