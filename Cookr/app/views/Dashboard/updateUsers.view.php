<div class="layout-bo recipes-bo">
  <h2>Modifier l'utilisateur</h2>
  <?php if (isset($formErrors))
    $this->modal("errors", $formErrors); ?>
  <?php $this->modal("form", $form); ?>
  <h3>Modifier le mot de passe</h3>
  <?php if (isset($updateFormErrors))
    $this->modal("errors", $updateFormErrors); ?>
  <?php $this->modal("form", $updateForm); ?>
  <button class="cta-button delete-account" onclick="window.location.href ='/delete-user?id=<?=$_GET['id']?>';">Supprimer</button>
</div>