<div class="edit-recipe">
    <div class="img-container">
        <img src="public/assets/images/article_picture.png" alt="">
    </div>
    <div class="recipe-dscp">
        <span><?= $config["title"] ?></span>
        <p>
            <?= $config["presentation"]?? "" ?>
        </p>
    </div>
    <div class="recipe-infos">
        <span>Par : <span>John Doe</span></span>
        <span>Le : <span><?= $config["created_at"] ?></span></span>
    </div>
</div>