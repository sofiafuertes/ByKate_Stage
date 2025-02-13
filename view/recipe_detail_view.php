<main id="individualRecipePage">
<div class="breadcrumb">
    <a  href="/ByKate_Stage/recetas">< Recetas - <?= htmlspecialchars($recipe['title'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></a>
    </div>
    <section id="oneRecipe">
        <div class="containerRecipe">
            <h1 class="titlePage"><?= htmlspecialchars($recipe['title'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></h1>
            <div class="recipeDetails">
                <p><i class="fa-regular fa-clock" style="color: #67465b;"></i> Tiempo de cocción: <?= htmlspecialchars($recipe['cooking_time'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?> min</p>
                <p><i class="fa-solid fa-list" style="color: #67465b;"></i> Categoría: <?= htmlspecialchars($recipe['category'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?> </p>
                <p><i class="fa-solid fa-signal" style="color: #67465b;"></i> Dificultad: <?= htmlspecialchars($recipe['difficulty'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></p>
            </div>
            <div class="recipePhoto">
                <img src="<?= htmlspecialchars($recipe['main_photo_path'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>"
                    alt="<?= htmlspecialchars($recipe['title'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>">
            </div>
            <div class="recipeIngredients">
                <h2>Ingredientes</h2>
                <ul>
                    <?php foreach ($recipe['ingredients'] as $ingredient): ?>
                        <li> 
                            <?= htmlspecialchars($ingredient['ingredient_name'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8')?> -
                            <?= htmlspecialchars($ingredient['quantity'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="recipeSteps">
                <h2>Pasos</h2>
                <ol>
                    <?php foreach ($recipe['steps'] as $step): ?>
                        <li><?= htmlspecialchars($step['step_description'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></li>
                    <?php endforeach; ?>
                </ol>
            </div>

            <div class="recipeTips">
                <h2>Consejos</h2>
                <ul>
                    <?php foreach ($recipe['tips'] as $tip): ?>
                        <li><?= htmlspecialchars($tip['content_tip'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></li>
                    <?php endforeach; ?>
                </ul>

            </div>
        </div>
    </section>

</main>