<div class="layout-bo recipes-bo">
  <h2 class="title-bo">Modifier la recette</h2>
  <?php if (isset($formErrors))
    $this->modal("errors", $formErrors); ?>
  <?php $this->modal("form", $form); ?>
  <button class="cta-button delete-account delete-button" onclick="window.location.href ='/delete-recipe?id=<?=$_GET['id']?>';">Supprimer</button>
</div>