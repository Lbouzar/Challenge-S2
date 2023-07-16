<div class="layout-bo">
    <button class="cta-button" onclick="window.location.href ='/create-user';">Créer un utilisateur</button>
    <h2>Modifier un utilisateur</h2>
    <?php foreach ($users as $user) :
        $this->modal("user", $user);
    endforeach; ?>
</div>