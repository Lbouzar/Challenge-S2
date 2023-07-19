<div class="layout-bo">
    <?php if (empty($profilpage)) : ?>
        <button class="cta-button" onclick="window.location.href ='/create-profilpage';">Créer votre page de profil</button>
    <?php else : ?>
        <h2>Modifier la page de profil</h2>
        <?php if (isset($formErrors))
            $this->modal("errors", $formErrors); ?>
        <?php $this->modal("form", $form); ?>
    <?php endif; ?>
</div>