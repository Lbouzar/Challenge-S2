<div class="edit-recipe edit-article">
    <div class="img-container">
        <img src="public/assets/images/<?= $config["image"] ?>" alt="">
    </div>
    <div class="recipe-dscp article-dscp">
        <span><?= $config["title"] ?></span>
        <p>
            <?= $config["presentation"]?? "" ?>
            <?= $config["keywords"]?? "" ?>
        </p>
    </div>
    <div class="recipe-infos article-infos">
        <span>Le : <span><?= $config["created_at"] ?></span></span>
    </div>
</div>