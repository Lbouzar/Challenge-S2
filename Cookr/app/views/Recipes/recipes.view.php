<main>
    <section id="slogan-logo" class="mt-10">
        <img src="public/assets/icons/logo-regular.svg" alt="logo cookr">
        <h1>L’incroyable slogan de Cookr</h1>
    </section>

    <!-- search bar -->
    <div class="justify-center mt-8 mb-7 ml-3 mr-3">
        <input class="input-search" type="text" placeholder="Chercher: tarte aux fraises, crêpes etc...">
        <button class="cta-button-search">
            <i class="icon-search icon-medium icon-white"></i>
        </button>
    </div>

    <section class="flex-column justify-between list-card-recette mt-7 mb-13">
        <h1 class="main-title">Toutes nos recettes</h1>
        <?php foreach($mainRecipe as $main):?>
            <h3 class="sub-title">Découvrez notre recette du jour</h3>
            <div class="container-recipe-of-the-day">
                
            </div>
        <?php endforeach; ?>
        <h3 class="sub-title">Nos autres recettes</h3>
        <?php foreach($recipes as $recipe): ?>

        <?php endforeach; ?>
    </section>
</main>

<?php 
// var_dump(explode(',', trim($recipes[0]['ingredients'], '{}')));
?>