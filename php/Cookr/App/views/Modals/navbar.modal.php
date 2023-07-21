<header class="justify-between align-center mt-4 ml-8 mr-8">
    <nav id="mobile-nav">
        <i id="close-icon" class="icon-close" aria-label="close"></i>
        <ul>
            <?php foreach ($config as $data) : ?>
                <li><a href="<?= $data["link_route"] ?>" class=""><?= $data["title"] ?></a></li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <button id="hamburger-menu">
        <i class="icon-burger_menu icon-medium" aria-label="menu button"></i>
    </button>
    <nav id="desktop-nav">
        <ul class="justify-between">
            <a href="/" id="logo-link">
                <img class="icon--logo" src="<?php getenv('HTTP_HOST') ?>/public/assets/icons/logo-regular.svg" alt="logo cookr">
            </a>
            <?php foreach ($config as $data) : ?>
                <li><a href="<?= $data["link_route"] ?>" class=""><?= $data["title"] ?></a></li>
            <?php endforeach; ?>
        </ul>
    </nav>
</header>