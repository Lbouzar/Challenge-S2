<main>
    <?php $this->modal("searchBar", null); ?>

    <section class="flex-column justify-between list-card-recette mt-7 mb-13">
        <h1 class="main-title">Toutes nos recettes</h1>
        <h3 class="sub-title">Découvrez notre recette du jour</h3>
        <div class="container-recipe-of-the-day">
            <?php $this->modal("main", $mainRecipe); ?>
        </div>
        <h3 class="sub-title">Nos autres recettes</h3>
        <div class="grid index-card recipes-grid mt-0 justify-items-center">
            <?php foreach ($recipes as $recipe) :
                $this->modal("card", $recipe);
            endforeach ?>
        </div>
    </section>
</main>

<?php
// var_dump(explode(',', trim($recipes[0]['ingredients'], '{}')));
?>