<div class="layout-bo">
    <button class="cta-button" style="margin-left: auto;" onclick="window.location.href ='/create-menu';">Créer votre menu</button>
    <h2 class="title-bo mb-4">Modifier le menu</h2>
    <?php foreach ($menu as $nav) :
        $this->modal("menu", $nav);
    endforeach; ?>
</div>