<main>
    <div class="containerText">
        <h1 class="titlePage">NUESTRO MENÚ</h1>
        <p class="textProduct">En esta página encontrarás los pasteles, tartas y diferentes productos que puedes pedir
            por encargo.
            Si quieres algún pastel personalizado o hacer un pedido especial para un evento, no dudes en contactarnos
            (vía teléfono, email o rellenando el formulario de contacto)</p>
        <p class="textProduct">Para ver el menú que encontrarás en nuestra tienda, click <a
                href="https://drive.google.com/file/d/1RjpJ7kokre2Qq0veHm6EvYbCwXEs0hc-/view?usp=sharing"
                target="_blank"> acá</a></p>
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
                    <div class="product" data-name="<?= htmlspecialchars($product['product_name']) ?>">
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