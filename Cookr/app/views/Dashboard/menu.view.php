<div class="layout-bo">
    <?php if(empty($menu)) :?>
        <button class="cta-button" onclick="window.location.href ='/create-menu';">Créer votre menu</button>
    <?php else : ?>
    <h2>Modifier le menu</h2>
    <?php if (isset($formErrors))
        $this->modal("errors", $formErrors); ?>
    <?php $this->modal("form", $form); ?>
    <?php endif; ?>
</div>