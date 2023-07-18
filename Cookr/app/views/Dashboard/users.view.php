<div class="layout-bo">
    <button class="cta-button" style="margin-left: auto;" onclick="window.location.href ='/create-user';">Créer un utilisateur</button>
    <h2 class="title-bo">Modifier un utilisateur</h2>
    <?php foreach ($users as $user) :
        $this->modal("user", $user);
    endforeach; ?>
</div>