<main id="login" class="justify-between">
    <aside class="aside-graphic">
        <img src="public/assets/icons/logo-regular.svg" alt="logo cookr" class="align-self-center">
        <h1 class="align-self-center">Rejoignez le meilleur site de recettes de cuisine !</h1>
        <div class="justify-between">
            <img src="public/assets/icons/orange-dot1.svg" alt="orange-dot1">
            <img src="public/assets/icons/orange-dot1.svg" alt="orange-dot1">
        </div>
        <img src="public/assets/icons/orange-dot1.svg" alt="orange-dot1" class="align-self-center">
    </aside>
    <section>
        <h1>Connexion</h1>
        <?php $this->modal("form", $form, $formErrors); ?>
        <div class="register">
            <p>Pas de compte ?</p>
            <a href="/register">Inscrivez-vous !</a>
        </div>
    </section>
</main>