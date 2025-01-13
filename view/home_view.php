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
            <div class="divButton">
                <button><a href="/ByKate_Stage/nuestromenu">Todos los productos</a></button>
            </div>
        </div>
    </section>


        <section class="aboutUsSection">
            <div class="aboutUsContainer">
                <div class="aboutUsRight">
                    <div class="titleTextFlex">
                        <h1>Nuestra Historia</h1>
                    </div>
                    <div class="aboutUsText">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corporis, est. Lorem ipsum dolor
                            sit
                            amet
                            consectetur adipisicing elit. Amet nulla molestiae consequatur nemo earum eligendi, odit
                            iusto
                            tempore voluptatibus ratione placeat sed, est vitae at, quasi corrupti dolor eum porro autem
                            laborum
                            ut? Temporibus quae, eos veniam illo expedita illum. Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Quam, maxime.Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                            Corporis, est. Lorem ipsum dolor sit amet
                            consectetur adipisicing elit. Amet nulla molestiae consequatur nemo earum eligendi, odit
                            iusto
                            tempore voluptatibus ratione placeat sed, est vitae at, quasi corrupti dolor eum porro autem
                            laborum
                            ut? Temporibus quae, eos veniam illo expedita illum. Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Quam, maxime.Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                            Corporis, est. Lorem ipsum dolor sit amet
                            consectetur adipisicing elit. Amet nulla molestiae consequatur nemo earum eligendi, odit
                            iusto
                            tempore voluptatibus ratione placeat sed, est vitae at, quasi corrupti dolor eum porro autem
                            laborum
                            ut? Temporibus quae, eos veniam illo expedita illum. Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Quam, maxime.</p>
                    </div>
                    <div class="divButton">
                        <button><a href="/ByKate_Stage/quienessomos">Continuar leyendo</a></button>
                    </div>
                </div>
                <div class="aboutUsImg">
                    <img src="./photos/aboutUsHome.jpg" alt="Foto de la pastelería">
                </div>
            </div>

        </section>
</main>