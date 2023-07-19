<main>
<?php if (isset($menu) && !empty($menu))
    $this->modal("navbar", $menu); ?>

    <?php if (isset($articlespage) && !empty($articlespage)) : ?>
    <section class="flex-column justify-between">
        <h1 class="main-title"><?php echo $articlespage[0]["title"] ?></h1>
        <div class="grid articles-grid display-card">
            <?php foreach ($articles as $article) :
                $this->modal("card", $article);
            endforeach ?>
        </div>
    </section>
</main>
<?php endif; ?>