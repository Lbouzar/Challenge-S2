<a href="/update-menu?id=<?= $config["id"]; ?>">
<div class="">
    <span>Titre : <?= $config["title"]; ?></span>
    <span>Route : <?= $config["link_route"]; ?></span>
    <span>Lien actif ? <?php echo ($config["is_active"] == 1) ? "Oui" : "Non" ?></span>
</div>
</a>