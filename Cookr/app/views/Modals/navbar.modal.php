<header class="justify-between align-center mt-4 ml-4 mr-4">
        <nav id="mobile-nav">
            <i id="close-icon" class="icon-close" aria-label="close"></i>
            <ul>
                <?php foreach ($config as $data): ?>
                    <li><a href="/<?= $data["link_route"] ?>" class=""><?= $data["title"] ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <button id="hamburger-menu">
            <i class="icon-burger_menu icon-medium" aria-label="menu button"></i>
        </button>
        <nav id="desktop-nav">
            <ul class="justify-between">
            <?php foreach ($config as $data): ?>
                    <li><a href="/<?= $data["link_route"] ?>" class=""><?= $data["title"] ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </header>