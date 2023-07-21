<main>
<?php if (isset($menu) && !empty($menu))
    $this->modal("navbar", $menu); ?>

    <?php if (isset($articlespage) && !empty($articlespage)) : ?>
    <section class="flex-column justify-between mb-13 articles-view">
        <h1 class="main-title"><?php echo $articlespage[0]["title"] ?></h1>
        <div class="grid articles-grid display-card">
            <?php foreach ($articles as $article) : ?>
                <a href="/article?slug=<?= $article["slug"] ?>&id=<?= $article["id"] ?>"> 
                    <?php $this->modal("card", $article); ?>
                </a>
            <?php endforeach ?>
        </div>
    </section>
</main>
<?php endif; ?>