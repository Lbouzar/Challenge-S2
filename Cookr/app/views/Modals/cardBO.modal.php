<div class="edit-recipe">
    <div class="img-container">
        <img src="public/assets/images/<?= $config["image"] ?>" alt="">
    </div>
    <div class="recipe-dscp">
        <span><?= $config["title"] ?></span>
        <p>
            <?= $config["presentation"]?? "" ?>
        </p>
    </div>
    <div class="recipe-infos">
        <span>Le : <span><?= $config["created_at"] ?></span></span>
    </div>
</div>