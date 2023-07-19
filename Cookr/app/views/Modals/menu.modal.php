<a href="/update-menu?id=<?= $config["id"]; ?>">
<div class="menu-link">
    <span>Titre : <span><?= $config["title"]; ?></span></span>
    <span>Route : <span><?= $config["link_route"]; ?></span></span>
    <span>Lien actif ? <span><?php echo ($config["is_active"] == 1) ? "Oui" : "Non" ?></span></span>
</div>
</a>