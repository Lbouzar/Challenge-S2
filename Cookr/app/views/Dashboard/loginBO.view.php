<div class="layout-bo">
    <?php if (empty($loginpage)) : ?>
        <button class="cta-button" onclick="window.location.href ='/create-loginpage';">Créer votre page de connexion</button>
    <?php else : ?>
        <h2>Modifier la page de connexion</h2>
        <?php if (isset($formErrors))
            $this->modal("errors", $formErrors); ?>
        <?php $this->modal("form", $form); ?>
    <?php endif; ?>
</div>