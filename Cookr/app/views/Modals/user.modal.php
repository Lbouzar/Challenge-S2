<a href="/update-user?id=<?= $config["id"]; ?>">
    <div class="user-card">
        <div class="infos">
            <span class="name"><?= $config["firstname"]; ?> <?= $config["lastname"]; ?></span>
            <span class="email"><?= $config["email"]; ?></span>
        </div>
        <div class="infos">
            <span class="active-account"><?php echo ($config["status"] == 1) ? "Compte actif" : "Compte non-actif" ?></span>
            <span class="role">Role :
                <span>
                    <?php switch ($config["role"]) {
                        case getenv("Admin"):
                            echo "Administrateur";
                            break;
                        case getenv("Moderateur"):
                            echo "Modérateur";
                            break;
                        case getenv("Editeur"):
                            echo "Editeur";
                            break;
                        case getenv("Utilisateur"):
                            echo "Utilisateur";
                            break;
                    } ?>
                </span>
            </span>
        </div>
    </div>
</a>