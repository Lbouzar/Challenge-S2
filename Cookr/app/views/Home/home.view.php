<main>

    <?php if (isset($menu) && !empty($menu))
        $this->modal("navbar", $menu); ?>

    <?php if (isset($homepage) && !empty($homepage)) : ?>
        <section id="slogan-logo" class="mt-10">
            <?php if (!empty($homepage[0]["logo"])) : ?>
                <img src="public/assets/images/<?= $homepage[0]["logo"] ?>" alt="logo">
            <?php endif; ?>
            <h1><?= $homepage[0]["slogan"] ?></h1>
        </section>

        <!-- Articles sections -->
        <section class="flex-column justify-between list-card-article mt-7">

        <h1 class="main-title"><?php echo $homepage[0]["firsttitle"] ?></h1>
        <div class="grid index-card articles-grid">
            <?php foreach ($articles as $article) : ?>
                <a href="">
                    <?php $this->modal("card", $article); ?>
                </a>
            <?php endforeach ?>
        </div>
    </section>

    <!-- Recettes sections -->
    <section class="flex-column justify-between list-card-recette mt-7 mb-13">
        <h1 class="main-title"><?php echo $homepage[0]["secondtitle"] ?></h1>
        <div class="grid index-card recipes-grid mt-7 justify-items-center">
            <?php foreach ($recipes as $recipe) : ?>
                <a href="">
                    <?php $this->modal("card", $recipe); ?>
                </a>
            <?php endforeach ?>
        </div>
    </section>
</main>
<?php endif; ?>