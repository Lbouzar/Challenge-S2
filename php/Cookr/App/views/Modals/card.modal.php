<article class="card" title="<?= $config["title"] ?? "" ?>">
    <div class="card-image">
        <img src="<?php getenv('HTTP_HOST') ?>/public/assets/images/<?= $config["image"] ?>" alt="">
    </div>
    <div class="card-title">
        <h2><?= $config["title"] ?></h2>
    </div>
    <div class="card-body">
        <p><?= $config["presentation"] ?? $config["keywords"] ?? "" ?></p>
    </div>
    <div class="card-footer">
        <span>Posté le : <?= $config["created_at"] ?></span>
    </div>
</article>