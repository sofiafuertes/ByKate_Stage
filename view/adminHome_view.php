<main id="adminHomePage">
    <section class="gestionProducts">
        <h1 class="titlePage">Productos</h1>
        <div class="divButton">
            <button id="btnProductList">Ver lista de productos</button>
            <button id="btnNewProduct">Agregar nuevo producto</button>
        </div>
        <div id="productsList" style="display:none">
            <h2>Lista de productos</h2>
            <div class="productsAdmin">
                <?php if (empty($products)): ?>
                    <p>No hay productos registrados</p>
                <?php else: ?>
                    <?php foreach ($products as $product): ?>
                        <div class="oneProduct" data-name="<?= htmlspecialchars($product['product_name']) ?>">
                            <img src="<?= htmlspecialchars($product['photo_principal_path']) ?>"
                                alt="<?= htmlspecialchars($product['product_name']) ?>">
                            <div class="product-info">
                                <h3><?= htmlspecialchars($product['product_name']) ?></h3>
                                <p><?= htmlspecialchars($product['product_description']) ?></p>
                                <p>Alérgenos: <?= htmlspecialchars($product['allergies']) ?></p>
                                <p>Porciones: <?= htmlspecialchars($product['servings']) ?></p>
                            </div>
                            <!-- <button id="btnDeleteProduct">Eliminar</button>
                                <button id="btnHideProduct">Ocultar</button> -->
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <div id="addProductForm" style='display:none'>
            <h2>Agregar nuevo producto</h2>
            <form id="productForm" method="POST" enctype="multipart/form-data">
                <input type="text" name="product_name" placeholder="Nombre del producto" required>
                <input type="text" name="product_description" placeholder="Descripción del producto" required>
                <input type="text" name="product_allergies" placeholder="Alergias">
                <input type="text" name="product_servings" placeholder="Porciones">
                <input type="hidden" name="MAX_SIZE_FILE" value="5000000">
                <label for="main_photo">Foto principal:</label>
                <input type="file" name="main_photo" accept="image/*" required>
                <!-- <label for="extra_image1">Foto extra 1:</label>
                <input type="file" name="extra_image1" accept="image/*">
                <label for="extra_image2">Foto extra 2:</label>
                <input type="file" name="extra_image2" accept="image/*">
                <label for="extra_image3">Foto extra 3:</label>
                <input type="file" name="extra_image3" accept="image/*"> -->
                <input class="button" type="submit" name="submitProduct" value="Agregar producto">
            </form>
            <p><?php echo $addingProduct->getMessage() ?? ''; ?></p>
        </div>

    </section>

    <section class="gestionRecipes">
        <h1 class="titlePage">Recetas</h1>
        <div class="divButton">
            <button>Ver lista de recetas</button>
            <button>Agregar receta</button>
        </div>
    </section>
</main>