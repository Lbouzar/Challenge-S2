<main>

    <?php echo $menu[0]["content"] ?>

    <section class="flex-column justify-between list-card-recette mt-7 mb-13">
        <h1 class="main-title"><?php echo $recipespage[0]["title"] ?></h1>
        <div class="grid index-card recipes-grid mt-3 justify-items-center">
            <?php foreach ($recipes as $recipe) :
                $this->modal("card", $recipe);
            endforeach ?>
        </div>
    </section>
</main>

<?php
// var_dump(explode(',', trim($recipes[0]['ingredients'], '{}')));
?>