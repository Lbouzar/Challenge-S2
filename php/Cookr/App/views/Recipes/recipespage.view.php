<div class="layout-bo">
    <?php if (empty($recipespage)) : ?>
        <button class="cta-button" onclick="window.location.href ='/create-recipespage';">Créer votre page de recettes</button>
    <?php else : ?>
        <h2 class="title-bo">Modifier la page de recettes</h2>
        <?php if (isset($formErrors))
            $this->modal("errors", $formErrors); ?>
        <?php $this->modal("form", $form); ?>
    <?php endif; ?>
</div>