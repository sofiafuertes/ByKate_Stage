<main id="adminHomePage">
    
        <nav class="menuAdmin">
            <ul>
                <p class="titleMenu">GESTIÓN</p>
                <input type="radio" name="menu" id="product">
                <li>
                    <label for="product" class="title">Productos</label>
                    <button id="btnProductList">Ver lista de productos</button>
                    <button id="btnNewProduct">Agregar nuevo producto</button>
                </li>
                <input type="radio" name="menu" id="recipe">
                <li>
                    <label for="recipe" class="title">Recetas</label>
                    <button>Ver lista de recetas</button>
                    <button>Agregar receta</button>
                </li>
                <input type="radio" name="menu" id="passwordChange">
                <li>
                    <label for="passwordChange" class="title"></i>Contraseña</label>
                    <button id="btnPassword">Cambiar contraseña</button>
                </li>
            </ul>
        </nav>
    


    <section class="gestionProducts">
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
                                    <a href="/ByKate_Stage/gestion/delete?id=<?= $product['id_product'] ?>">Eliminar</a>
                                </td>
                            </tr>
                            <tr class="edit-form" id="edit-form-<?= $product['id_product'] ?>" style="display: none;">
                                <td colspan="5">
                                    <form id="updateProductForm_<?= $product['id_product'] ?>" method="POST"
                                        action="/ByKate_Stage/gestion/update">
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

                <label for="extra_image1">Foto extra 1:</label>
                <input type="file" name="extra_image1" accept="image/*">

                <label for="extra_image2">Foto extra 2:</label>
                <input type="file" name="extra_image2" accept="image/*">

                <label for="extra_image3">Foto extra 3:</label>
                <input type="file" name="extra_image3" accept="image/*">

                <input class="button" type="submit" name="submitProduct" value="Agregar producto">
            </form>
        </div>
        <p class="messageForm"><?php echo htmlspecialchars($addingProduct->getMessage()); ?></p>

    </section>

    <section class="gestionRecipes">
    </section>

    <section id="changePwd" style="display:none">
        <h1 class="titlePage">Cambiar contraseña</h1>
        <form id="changePwdForm" method="POST" action="/ByKate_Stage/gestion">
            <input type="password" name="old_password" placeholder="Contraseña actual" required>
            <input type="password" name="new_password" placeholder="Nueva contraseña" required>
            <input type="password" name="new_password_confirm" placeholder="Confirmar nueva contraseña" required>
            <p class="messagePwd"><?php echo isset($loginController) ? $loginController->getMessage() : ''; ?></p>
            <button class="button" type="submit" name="changePasswordSubmit">Cambiar contraseña</button>
        </form>
    </section>

<section class="gestionTextes">
<h2>Editar Textos de la Página</h2>

    <form id="editTextForm" method="POST" action="">
        <label>Página:
        <input type="text" name="page_path" placeholder="/ByKate_Stage/nombre_de_la_pagina" required>
        </label>

        <label>Sección:
            <input type="text" name="section" placeholder="Ejemplo: header, footer, about" required>
        </label>

        <label>Contenido:
            <textarea name="new_content" placeholder="Ingrese el nuevo contenido aquí..." required></textarea>
        </label>

        <button type="submit" name="updateText">Actualizar Texto</button>
    </form>

    <!--Show Message-->
    <p class="messageForm">
        <?php if (!empty($controller->getMessage())): ?>
            <?= htmlspecialchars($controller->getMessage()) ?>
        <?php endif; ?>
    </p>
</section>

</main>