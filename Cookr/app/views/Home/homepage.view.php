<div class="layout-bo homepage-bo">
  <?php if (empty($homepage)) : ?>
    <button class="cta-button" onclick="window.location.href ='/create-homepage';">Créer votre page d'accueil</button>
  <?php else : ?>
    <h2 class="title-bo">Modifier la page d'accueil</h2>
    <?php if (isset($formErrors))
        $this->modal("errors", $formErrors); ?>
    <?php $this->modal("form", $form); ?>
    <?php endif; ?>