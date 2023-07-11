<div class="layout-bo dashboard">
  <h1>Dashboard</h1>
  <h2>Les dernières recettes</h2>
  <div class="grid index-card recipes-grid mt-6 justify-items-between recipes-list">
    <?php foreach ($recipes as $recipe) :
      $this->modal("card", $recipe);
    endforeach ?>
  </div>
  <button class="cta-button" onclick="window.location.href ='/recipes-bo';">Gérer les recettes</button>
  <h2>Les derniers articles</h2>
  <div class="grid index-card articles-grid align-self-center">
    <?php foreach ($articles as $article) :
      $this->modal("card", $article);
    endforeach ?>
  </div>
  <button class="cta-button" onclick="window.location.href ='/articles-bo';">Gérer les articles</button>
  <h2>Les derniers commentaires</h2>
  <div class="comments-list">
    <?php foreach ($comments as $comment) :
      $this->modal("comment", $comment);
    endforeach ?>
  </div>
  <button class="cta-button" onclick="window.location.href ='/comments-bo';">Gérer les commentaires</button>
</div>