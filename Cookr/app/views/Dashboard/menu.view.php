<div class="layout-bo">
    <button class="cta-button" onclick="window.location.href ='/create-menu';">Créer votre menu</button>
    <h2>Modifier le menu</h2>
    <?php foreach ($menu as $nav) :
        $this->modal("menu", $nav); ?>
    <?php endforeach; ?>
</div>