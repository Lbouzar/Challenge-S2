<main>
    <?php $this->modal("searchBar", null); ?>

    <!-- Articles sections -->
    <section class="flex-column justify-between list-card-article mt-7">
        <h1 class="main-title">Nos derniers articles</h1>
        <div class="grid index-card articles-grid align-self-center">
            <?php foreach ($articles as $article) :
                $this->modal("card", $article);
            endforeach ?>
            <button class="more-article cta-button--full cta-button" onclick="window.location.href ='/articles';">
                Voir plus d'articles
            </button>
        </div>
    </section>

    <!-- Recettes sections -->
    <section class="flex-column justify-between list-card-recette mt-7 mb-13">
        <h1 class="main-title">Nos dernières recettes</h1>
        <h3 class="sub-title">Découvrez notre recette du jour</h3>
        <div class="container-recipe-of-the-day">
            <?php $this->modal("main", $mainRecipe); ?>
        </div>
        <h3 class="sub-title">Toutes nos recettes</h3>
        <div class="grid index-card recipes-grid mt-0 justify-items-center">
            <?php foreach ($recipes as $recipe) :
                $this->modal("card", $recipe);
            endforeach ?>
        </div>
        <button class="more-article cta-button--full cta-button" onclick="window.location.href ='/recipes';">
            Voir plus de recettes
        </button>
    </section>
</main>