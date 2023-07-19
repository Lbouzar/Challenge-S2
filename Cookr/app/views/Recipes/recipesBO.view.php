<div class="layout-bo recipes-bo">
  <button class="cta-button" onclick="window.location.href ='/create-recipe';">Créer une recette</button>
  <h2>Toutes les recettes</h2>
  <div class="list-edit-recipes">
    <?php foreach ($recipes as $recipe) : ?>
      <a href="/recipe-bo?slug=<?= $recipe["slug"] ?>&id=<?= $recipe["id"] ?>">
        <?php $this->modal("cardBO", $recipe); ?>
      </a>
    <?php endforeach ?>
  </div>
</div>