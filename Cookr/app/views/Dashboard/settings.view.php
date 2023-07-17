<div class="layout-bo settings">
  <h2 class="title-bo">Modifier les paramètres</h2>
  <?php if (isset($formErrors))
    $this->modal("errors", $formErrors); ?>
  <?php $this->modal("form", $form); ?>
</div>