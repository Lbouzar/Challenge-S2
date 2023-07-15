<main>
    <?php echo $menu[0]["content"] ?>

    <section class="flex-column justify-between">
        <h1 class="main-title"><?php echo $articlespage[0]["title"] ?></h1>
        <div class="grid articles-grid display-card">
            <?php foreach ($articles as $article) :
                $this->modal("card", $article);
            endforeach ?>
        </div>
    </section>
</main>