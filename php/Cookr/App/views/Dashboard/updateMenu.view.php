<div class="layout-bo recipes-bo">
  <h2>Modifier le menu</h2>
  <?php if (isset($formErrors))
    $this->modal("errors", $formErrors); ?>
  <?php $this->modal("form", $form); ?>
  <button class="cta-button delete-account" onclick="window.location.href ='/delete-menu?id=<?=$_GET['id']?>';">Supprimer</button>
</div>