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
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Alergias</th>
                                <th>Porciones</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <?php foreach ($products as $product): ?>
                            <tr class="oneProduct" data-name="<?= htmlspecialchars($product['product_name']) ?>">
                                <td class="nameProduct"><?= htmlspecialchars($product['product_name']) ?></td>
                                <td><?= htmlspecialchars($product['product_description']) ?></td>
                                <td><?= htmlspecialchars($product['allergies']) ?></td>
                                <td><?= htmlspecialchars($product['servings']) ?></td>
                                <td>
                                    <a href="#" class="modify-link" data-id="<?= $product['id_product'] ?>">Modificar</a>
                                    <a href="delete_product.php?id=<?= $product['id_product'] ?>">Eliminar</a>
                                </td>
                            </tr>
                            <tr class="edit-form" id="edit-form-<?= $product['id_product'] ?>" style="display: none;">
                                <td colspan="5">
                                    <form id="updateProductForm" method="POST" action="/ByKate_Stage/gestion/update">
                                        <input type="hidden" name="id_product" value="<?= $product['id_product'] ?>">
                                        <label>Nombre: <input type="text" name="product_name"
                                                value="<?= htmlspecialchars($product['product_name']) ?>"></label>
                                        <label>Descripción: <textarea
                                                name="product_description"><?= htmlspecialchars($product['product_description']) ?></textarea></label>
                                        <label>Alergias: <input type="text" name="product_allergies"
                                                value="<?= htmlspecialchars($product['allergies']) ?>"></label>
                                        <label>Porciones: <input type="text" name="product_servings"
                                                value="<?= htmlspecialchars($product['servings']) ?>"></label>

                                        <button type="submit" name="updateProduct">Aceptar</button>
                                        <button type="button" class="cancel-button"
                                            data-id="<?= $product['id_product'] ?>">Cancelar</button>

                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
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