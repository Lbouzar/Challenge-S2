<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="public/assets/icons/logo-small.svg">
    <link rel="stylesheet" href="public/assets/css/main.css">
    <!-- <script src="<?php // js_url('main') 
                        ?>"></script> -->
    <title>Cookr</title>
</head>

<body>

    <header class="justify-between align-center mt-4 ml-4 mr-4">
        <nav id="mobile-nav">
            <i id="close-icon" class="icon-close" aria-label="close"></i>
            <ul>
                <li><a href="/" class="">Accueil</a></li>
                <li><a href="/recipes" class="">Recettes</a></li>
                <li><a href="/articles" class="">Articles</a></li>
                <li><a href="/contact" class="">Contact</a></li>
            </ul>
        </nav>
        <button id="hamburger-menu">
            <i class="icon-burger_menu icon-medium" aria-label="menu button"></i>
        </button>
        <nav id="desktop-nav">
            <ul class="justify-between">
                <li><a href="/">Accueil</a></li>
                <li><a href="/recipes">Recettes</a></li>
                <li><a href="/articles">Articles</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
        </nav>
        <a href="/" id="logo-link">
            <img class="icon--logo" src="public/assets/icons/logo-regular.svg" alt="logo cookr">
        </a>
        <a href="/register" id="logo-user">
            <i class="icon-user icon-medium" aria-label="user button"></i>
        </a>
    </header>
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
                <h3><a href="#">Contactez-nous</a></h3>
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
            <p class="copyright">&copy; Cookr - <?= date("Y");?></p>
        </section>
    </footer>
</body>

</html>