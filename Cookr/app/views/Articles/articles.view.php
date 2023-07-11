<main>
    <?php $this->modal("searchBar", null); ?>
    <section class="flex-column justify-between">
        <h1 class="main-title">Tous nos articles</h1>
        <div class="grid articles-grid display-card">
            <?php foreach ($articles as $article) :
                $this->modal("card", $article);
            endforeach ?>
        </div>
    </section>
</main>