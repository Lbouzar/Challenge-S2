<div class="layout-bo">
    <?php if (empty($registerpage)) : ?>
        <button class="cta-button" onclick="window.location.href ='/create-registerpage';">Créer votre page d'inscription</button>
    <?php else : ?>
        <h2 class="title-bo">Modifier la page d'inscription</h2>
        <?php if (isset($formErrors))
            $this->modal("errors", $formErrors); ?>
        <?php $this->modal("form", $form); ?>
    <?php endif; ?>
</div>