<main>
    <section class="gestionProducts">
        <h1>Productos</h1>
        <a href="#"><button>Ver lista de productos</button></a>
        <button>Agregar producto</button>
        <div id="productsList"></div>
        <div id="addProductForm" style="displat:none">
            <h2>Agregar nuevo producto</h2>
            <form id="productForm" method="POST">
                <input type="text" name="product_name" placeholder="Nombre del producto" required>
                <input type="text" name="product_description" placeholder="Descripción del producto" required>
                <input type="text" name="product_allergies" placeholder="Alergias">
                <input type="text" name="product_servings" placeholder="Porciones">
                <!-- <input type="file" name="main_photo" accept="image/*" required> -->
                <!-- <input type="file" name="extra_image1" accept="image/*">
                <input type="file" name="extra_image2" accept="image/*">
                <input type="file" name="extra_image3" accept="image/*"> -->
                <input type="submit" name="submitProduct" value="Agregar producto">
            </form>
            <p><?php echo $addingProduct->getMessage() ?></p>
            <?php var_dump($addingProduct->getMessage().'hello'); ?>
        </div>
    </section>

    <section class="gestionRecipes">
        <h1>Recetas</h1>
        <a href=""><button>Ver lista de recetas</button></a>
        <a href=""><button>Agregar receta</button></a>
    </section>
</main>