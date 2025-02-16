<main id="adminHomePage">

    <nav class="menuAdmin">
        <ul>
            <p class="titleMenu">GESTIÓN</p>
            <input type="radio" name="menu" id="product">
            <li>
                <label for="product" class="title">Productos</label>
                <button id="btnPhotoGallery">Galería de Fotos </button>
                <!-- <button id="btnProductList">Ver lista de productos</button>
                <button id="btnNewProduct">Agregar nuevo producto</button> -->
            </li>
            <input type="radio" name="menu" id="recipe">
            <li>
                <label for="recipe" class="title">Recetas</label>
                <button id="btnRecipeList">Ver lista de recetas</button>
                <button id="btnNewRecipe">Agregar receta</button>
            </li>
            <input type="radio" name="menu" id="passwordChange">
            <li>
                <label for="passwordChange" class="title"></i>Contraseña</label>
                <button id="btnPassword">Cambiar contraseña</button>
            </li>
            <input type="radio" name="menu" id="textChange">
            <li>
                <label for="textChange" class="title">Textos</label>
                <button id="btnText">Editar textos</button>
            </li>
        </ul>
    </nav>

    <section id="gestionImages" style="display : none">
        <div>
            <form action="/ByKate_Stage/gestion/upload_photo" id="uploadForm" method="POST" enctype="multipart/form-data">
                <label for="photo">Subir Imagen:</label>
                <input type="file" name="photo" id="photo" accept="image/*" required>

                <label for="section">Sección:</label>
                <input type="text" name="section" id="section" placeholder="Ejemplo: Menu" required>

                <button class="button" type="submit">Subir Imagen</button>
            </form>
            <div id="responseMessage"></div>
        </div>

        <div id="gestion-delete-photo">
            <div class="titlePage">
                <h2>Fotos de la Galería</h2>
            </div>

            <div class="container-photo-delete">
                <?php foreach ($images as $image): ?>
                    <div class="deleteImage">
                        <img src="<?= htmlspecialchars($image['photo_path']) ?>" alt="Imagen" width="150">

                        <a href="/ByKate_Stage/gestion/delete_photo?photo_path=<?= urlencode($image['photo_path']) ?>"
                            onclick="return confirm('¿Estás seguro de que deseas eliminar esta imagen?')">
                            Eliminar
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


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
        <p class="messageForm"><?php if (isset($addingProduct)): ?>
                <?= htmlspecialchars($addingProduct->getMessage()); ?>
            <?php endif; ?>
        </p>

    </section>

    <section id="gestionRecipes">

        <div id="addRecipeForm" style="display:none">
            <h2>Agregar nueva receta</h2>
            <form id="addRecipeForm" method="POST" enctype="multipart/form-data">

                <label for="main_photo">Foto principal:</label>
                <input type="file" name="main_photo" accept="image/*" required>

                <label for="title">Título de la receta:</label>
                <input type="text" name="title" placeholder="Título de la receta" required>

                <label for="category">Categoria:</label>
                <input type="text" name="category" placeholder="Categoria" required>

                <label for="id_difficulty">Dificultad:</label>
                <select name="id_difficulty" required>
                    <option value="">Seleccione la dificultad</option>
                    <?php foreach ($difficulties as $difficulty): ?>
                        <option value="<?= htmlspecialchars($difficulty['id_difficulty_recipe']) ?>">
                            <?= htmlspecialchars($difficulty['difficulty']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <label for="cooking_time">Tiempo de cocción:</label>
                <input type="number" name="cooking_time" placeholder="Tiempo de cocción en minutos" required>

                <!-- Ingredients -->
                <div id="ingredients">
                    <h3>Ingredientes</h3>
                    <div class="ingredient">
                        <input type="text" name="ingredient_name[]" placeholder="Nombre del ingrediente" required>
                        <input type="text" name="ingredient_quantity[]" placeholder="Cantidad" required>
                    </div>
                </div>
                <button type="button" id="addIngredientBtn">Agregar ingrediente</button>

                <!-- Steps recipe -->
                <div id="steps">
                    <h3>Pasos</h3>
                    <div class="step">
                        <textarea name="step_description[]" placeholder="Descripción del paso 1" required></textarea>
                    </div>
                </div>
                <button type="button" id="addStepBtn">Agregar paso</button>

                <!-- Tips Recipe -->
                <div id="tips">
                    <h3>Consejos</h3>
                    <div class="tip">
                        <textarea name="tips[]" placeholder="Consejo 1"></textarea>
                    </div>
                </div>
                <button type="button" id="addTipBtn">Agregar consejo</button>

                <button type="submit" name="submitRecipe">Agregar receta</button>
            </form>
        </div>


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

    <section id="gestionTextes" style="display:none">
        <h2>Editar textos de la página</h2>

        <form id="editTextForm" method="POST" action="/ByKate_Stage/gestion/updateText">
            <label>Path:
                <input type="text" name="page_path" placeholder="/ByKate_Stage/path" required>
            </label>

            <label>Sección:
                <input type="text" name="section" placeholder="storyShop, introContact3, ..." required>
            </label>

            <label>Contenido:
                <textarea name="new_content" placeholder="Nuevo contenido" required></textarea>
            </label>

            <button class="button" type="submit" name="updateText">Modificar texto</button>

        </form>

        <!--Show Message-->
        <p class="messageForm">
            <?php if (!empty($textController->getMessage())): ?>
                <?= htmlspecialchars($textController->getMessage()) ?>
            <?php endif; ?>
        </p>

        <h2>Textos de la página:</h2>

        <table>
            <thead>
                <tr>
                    <th>Path</th>
                    <th>Section</th>
                    <th>Content</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($texts as $text): ?>
                    <tr>
                        <td><?= htmlspecialchars($text['page_path']) ?></td>
                        <td><?= htmlspecialchars($text['section']) ?></td>
                        <td><?= htmlspecialchars($text['content']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>














    </section>

</main>