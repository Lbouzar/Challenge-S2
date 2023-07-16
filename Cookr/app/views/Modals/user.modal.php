<a href="/update-user?id=<?= $config["id"]; ?>">
    <div class="">
        <span><?= $config["firstname"]; ?> <?= $config["lastname"]; ?></span>
        <span><?= $config["email"]; ?></span>
        <span>Compte actif ? <?php echo ($config["status"] == 1) ? "Oui" : "Non" ?></span>
        <span>Role :
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
    </div>
</a>