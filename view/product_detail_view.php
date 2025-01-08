<main>
    <div class="breadcrumb">
    <a  href="/ByKate_Stage/nuestromenu">< menú/<?= htmlspecialchars($product['product_name']) ?></a>
    </div>
    <section>
        <div class="containerDetailProduct">
            <h1 class="productDetailTitle"><?= htmlspecialchars($product['product_name']) ?></h1>
            <div class="productContentDetail">
                <div class="productTextDetail">
                    <h2>Descripción</h2>
                    <p class="productDescription"><?= htmlspecialchars($product['product_description']) ?></p>
                    <h2>Alérgenos</h2>
                    <p class="productAllergies">Contiene o puede contener:
                        <?= htmlspecialchars($product['allergies']) ?>
                    </p>
                    <h2>Porciones</h2>
                    <p class="productServings">Se puede pedir de <?= htmlspecialchars($product['servings']) ?> porciones</p>
                </div>
                <img class="productImageDetail" src="<?= htmlspecialchars($product['photo_principal_path']) ?>"
                    alt="<?= htmlspecialchars($product['product_name']) ?>">
            </div>
        </div>
    </section>
    <!-- If there are extra photos -->
    <section class="containerExtraPhotosProduct">
        <h1>Fotos Extra</h1>
        <div class="extraPhotosProduct">
            <?php if (!empty($product['photo1_path'])): ?>
                <img src="<?= htmlspecialchars($product['photo1_path']) ?>" alt="Foto adicional 1">
            <?php endif; ?>
            <?php if (!empty($product['photo2_path'])): ?>
                <img src="<?= htmlspecialchars($product['photo2_path']) ?>" alt="Foto adicional 2">
            <?php endif; ?>
            <?php if (!empty($product['photo3_path'])): ?>
                <img src="<?= htmlspecialchars($product['photo3_path']) ?>" alt="Foto adicional 3">
            <?php endif; ?>
            <?php if (empty($product['photo1_path']) && empty($product['photo2_path']) && empty($product['photo3_path'])): ?>
                <p>No hay fotos</p>
            <?php endif; ?>

        </div>
    </section>

        <p class="contactMessage">
        Si deseas un pastel personalizado o realizar un pedido especial, no dudes en contactarnos a través de nuestro <a href="/ByKate_Stage/contacto">formulario de contacto</a>.</p>
</main>