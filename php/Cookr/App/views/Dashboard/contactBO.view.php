<div class="layout-bo contact-bo">
  <?php if (empty($contactpage)) : ?>
    <button class="cta-button" onclick="window.location.href ='/create-contactpage';">Créer votre page de contact</button>

  <?php else : ?>
    <h2 class="title-bo">Modifier la page de contact</h2>
    <?php if (isset($formErrors))
      $this->modal("errors", $formErrors); ?>
    <?php $this->modal("form", $form); ?>
  <?php endif; ?>
</div>