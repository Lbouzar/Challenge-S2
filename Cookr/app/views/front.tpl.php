<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="/public/assets/icons/logo-small.svg">
    <link rel="stylesheet" href="/public/assets/css/main.css">
    <meta name="description" content="Venez découvrir les meilleurs recettes et articles culinaires de la part de Cookr !">
    <title>Cookr</title>
</head>

<body>
    <?php include $this->view; ?>
    <footer>
        <!-- top footer -->
        <section>
            <nav>
                <article class="flex-column">
                    <div class="justify-between">
                        <h3 class="first-title">À propos</h3>
                        <button id="footer-button" class="align-self-start ml-1 hidden">
                            <i class="icon-arrow_button icon-orange icon-medium" aria-label="footer button"></i>
                        </button>
                    </div>
                    <ul id="footer-menu" class="footer-menu collapse">
                        <li>
                            <a href="#">Groupe Cookr</a>
                        </li>
                        <li>
                            <a href="#">Nous rejoindre !</a>
                        </li>
                        <li>
                            <a href="#">FAQ</a>
                        </li>
                    </ul>
                </article>
                <h3><a href="/contact">Contactez-nous</a></h3>
                <article class="flex-column">
                    <h3>Newsletter</h3>
                    <div class="newsletter-input justify-start">
                        <input type="text" placeholder="Votre email" class="input-regular--small">
                        <button class="cta-button cta-button--small">
                            S'inscrire
                        </button>
                    </div>
                </article>
            </nav>
        </section>
        <!-- bottom footer -->
        <section class="bottom-footer mt-12">
            <div class="socials ">
                <a href="#">
                    <i class="icon-facebook icon-medium"></i>
                </a>
                <a href="#">
                    <i class="icon-instagram icon-medium"></i>
                </a>
                <a href="#">
                    <i class="icon-twitter icon-medium"></i>
                </a>
                <a href="#">
                    <i class="icon-youtube icon-medium"></i>
                </a>
            </div>
            <div class="conditions">
                <a href="#">Termes et conditions</a>
                <a href="#">Confidentialité</a>
            </div>
            <p class="copyright">&copy; Cookr - 2023</p>
        </section>
    </footer>
</body>

</html>