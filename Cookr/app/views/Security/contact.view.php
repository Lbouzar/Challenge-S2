<main id="contact">
    <h1>Contactez le service client</h1>
    <p>Pour toutes questions, remplissez le formulaire ci-dessous. Le délais de réponse est de 48h.</p>
    <div class="user-info">
        <?php if (isset($formErrors))
            $this->modal("errors", $formErrors); ?>
        <?php $this->modal("form", $form); ?>
    </div>
</main>