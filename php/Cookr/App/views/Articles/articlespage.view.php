<div class="layout-bo">
    <?php if (empty($articlespage)) : ?>
        <button class="cta-button" onclick="window.location.href ='/create-articlespage';">Créer votre page d'articles</button>
    <?php else : ?>
        <h2 class="title-bo">Modifier la page d'articles</h2>
        <?php if (isset($formErrors))
            $this->modal("errors", $formErrors); ?>
        <?php $this->modal("form", $form); ?>
    <?php endif; ?>
</div>