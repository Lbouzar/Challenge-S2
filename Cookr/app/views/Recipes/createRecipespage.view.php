<div class="layout-bo">
    <h2 class="title-bo">Créer une page de recettes</h2>
    <?php if (isset($formErrors))
        $this->modal("errors", $formErrors); ?>
    <?php $this->modal("form", $form); ?>
</div>