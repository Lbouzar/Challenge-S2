<main>
    <?php
        function findMainRecipe($recipes) {
            foreach ($recipes as $recipe) {
                if ($recipe['is_main'] == 1) {
                    return $recipe;
                }
            }
            return null;
        }
        $mainRecipe = findMainRecipe($recipes);
    ?>
    <?php if (isset($menu) && !empty($menu))
        $this->modal("navbar", $menu); ?>

    <?php if (isset($recipespage) && !empty($recipespage)) : ?>
        <section class="recipes-view-first-section">
            <h2 class="main-title sections-title"><?php echo $recipespage[0]["main_recipe_title"] ?></h2>
            <div class="main-recipe-wrapper">
                <a href="/recipe?slug=<?= $mainRecipe["slug"] ?>&id=<?= $mainRecipe["id"] ?>">
                    <?php $this->modal("card", $mainRecipe); ?>
                </a>
                <div class="main-recipe-infos">
                    <p><?= $mainRecipe["presentation"] ?></p>
                    <button class="cta-button" onclick="window.location.href ='/recipe?slug=<?= $mainRecipe['slug'] ?>&id=<?= $mainRecipe['id'] ?>';">Découvrir</button>
                </div>
            </div>
        </section>
        <section class="flex-column justify-between list-card-recette mb-13 recipes-view-second-section">
            <h2 class="main-title sections-title"><?php echo $recipespage[0]["title"] ?></h2>
            <div class="grid index-card recipes-grid mt-3 justify-items-center mt-8">
                <?php foreach ($recipes as $recipe) : ?>
                    <a href="/recipe?slug=<?= $recipe["slug"] ?>&id=<?= $recipe["id"] ?>">
                        <?php $this->modal("card", $recipe); ?>
                    </a>
                <?php endforeach ?>
            </div>
        </section>
</main>
<?php endif; ?>