<div class="layout-bo articles-bo">
  <button class="cta-button" onclick="window.location.href ='/create-article';">Créer un article</button>
  <h2>Tous les articles</h2>
  <div class="list-edit-articles">
    <?php foreach ($articles as $article) : ?>
      <a href="/article-bo?slug=<?= $article["slug"] ?>&id=<?= $article["id"] ?>">
        <?php $this->modal("cardBO", $article); ?>
      </a>
    <?php endforeach ?>
  </div>
</div>