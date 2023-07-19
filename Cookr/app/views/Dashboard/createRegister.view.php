<div class="layout-bo">
    <h2>Créer une page d'inscription</h2>
    <?php if (isset($formErrors))
        $this->modal("errors", $formErrors); ?>
    <?php $this->modal("form", $form); ?>
</div>