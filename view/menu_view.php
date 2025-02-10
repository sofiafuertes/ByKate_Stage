<main>
    <div class="containerText">
        <h1 class="titlePage">NUESTRO MENÚ</h1>
        <p class="textPage"><?php echo $controller->displayText('/ByKate_Stage/nuestromenu', 'introMenu') ?> (click <a href="/ByKate_Stage/contacto"> aquí</a>).</p>
        <p class="textPage">Para ver el menú que encontrarás en nuestra tienda, click <a
                href="https://drive.google.com/file/d/1RjpJ7kokre2Qq0veHm6EvYbCwXEs0hc-/view?usp=sharing"
                target="_blank"> aquí</a></p>
        <form class="searchField">
            <div class="containerSearch">
                <input class="inputSearch" type="text" name="search" placeholder="Buscar...">
                <i class="fa-solid fa-magnifying-glass iconSearch" style="color: #67465b;"></i>
            </div>
        </form>
    </div>

    <!-- <?php
    echo '<pre>';
    var_dump($products);
    echo '</pre>';
    ?> -->

    <section class="containerProducts">
        <div class="products">
            <?php if (empty($products)): ?>
                <p>No hay productos registrados</p>
            <?php else: ?>
                <?php foreach ($products as $product): ?>
                    <div id="productCard" style="" class="product" data-name="<?= htmlspecialchars($product['product_name']) ?>">
                    <a href="/ByKate_Stage/producto/<?= htmlspecialchars($product['id_product']) ?>">
                        <img src="<?= htmlspecialchars($product['photo_principal_path']) ?>"
                            alt="<?= htmlspecialchars($product['product_name']) ?>">
                        <h3><?= htmlspecialchars($product['product_name']) ?></h3>
                        <p><?= htmlspecialchars($product['product_description']) ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>
</main>