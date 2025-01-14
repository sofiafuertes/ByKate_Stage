<main>
    <div id="automaticSlide">
    </div>

    <section class="productsSection">
        <h1>Nuestros Productos</h1>
        <div class="productsContainer">
            <div class="products">
                <?php if (empty($products)): ?>
                    <p>No hay productos registrados</p>
                <?php else: ?>
                    <?php foreach ($products as $product): ?>
                        <div id="productCard" style="" class="productHome"
                            data-name="<?= htmlspecialchars($product['product_name']) ?>">
                            <a href="/ByKate_Stage/producto/<?= htmlspecialchars($product['id_product']) ?>">
                                <img class="imgProduct" src="<?= htmlspecialchars($product['photo_principal_path']) ?>"
                                    alt="<?= htmlspecialchars($product['product_name']) ?>">
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
            <div class="divButton">
                <button><a href="/ByKate_Stage/nuestromenu">Todos los productos</a></button>
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