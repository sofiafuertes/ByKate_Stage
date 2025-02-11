<main class="recipesPage">
    <h1 class="titlePage">RECETAS</h1>
    <section class="containerCards">
        <div class="cards">
            <?php if (!empty($recipes)): ?>
                <?php foreach ($recipes as $recipe): ?>
                    <div id="recipeCard" style="" class="oneCard" data-name="<?= htmlspecialchars($recipe['title']) ?>">
                        <a href="/ByKate_Stage/receta?id=<?= htmlspecialchars($recipe['id_recipe']) ?>">
                            <img src="<?= htmlspecialchars($recipe['main_photo_path']) ?>"
                                alt="<?= htmlspecialchars($recipe['title']) ?>">
                            <h3><?= htmlspecialchars($recipe['title']) ?></h3>
                            <p><i class="fa-regular fa-clock" style="color: #67465b;"></i> <?= htmlspecialchars($recipe['cooking_time']) ?> min</p>
                            <p><i class="fa-solid fa-list" style="color: #67465b;"></i> <?= htmlspecialchars($recipe['category']) ?></p>

                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay recetas disponibles.</p>
            <?php endif; ?>
        </div>
    </section>
</main>