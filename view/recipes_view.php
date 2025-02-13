<main id="recipesPage">
    <section class="pageContainer">
        <h1 class="titlePage">RECETAS</h1>
        <form class="searchField">
            <div class="containerSearch">
                <input class="inputSearch inputSearchRecipe" type="text" name="search" placeholder="Buscar...">
                <i class="fa-solid fa-magnifying-glass iconSearch" style="color: #67465b;"></i>
            </div>
        </form>
        <section class="containerCards">
            <div class="cards">
                <?php if (!empty($recipes)): ?>
                    <?php foreach ($recipes as $recipe): ?>
                        <div id="recipeCard" style="" class="oneCard recipe"
                            data-name="<?= htmlspecialchars($recipe['title'] ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>"
                            data-category="<?= htmlspecialchars($recipe['category'] ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>"
                            data-level="<?= htmlspecialchars($recipe['difficulty'] ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>">
                            <a
                                href="/ByKate_Stage/receta?id=<?= htmlspecialchars($recipe['id_recipe'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>">
                                <img src="<?= htmlspecialchars($recipe['main_photo_path'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>"
                                    alt="<?= htmlspecialchars($recipe['title'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>">
                                <h3><?= htmlspecialchars($recipe['title'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></h3>
                                <p><i class="fa-regular fa-clock" style="color: #67465b;"></i>
                                    <?= htmlspecialchars($recipe['cooking_time'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?> min
                                </p>
                                <p><i class="fa-solid fa-list" style="color: #67465b;"></i>
                                    <?= htmlspecialchars($recipe['category'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></p>
                                <p><i class="fa-solid fa-signal" style="color: #67465b;"></i>
                                    <?= htmlspecialchars($recipe['difficulty'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></p>

                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No hay recetas disponibles.</p>
                <?php endif; ?>
            </div>
        </section>
    </section>
</main>