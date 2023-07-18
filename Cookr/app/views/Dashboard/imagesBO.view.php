<div class="layout-bo images-view">
    <h2 class="title-bo">Gérer les images</h2>
    <div class="images-grid">
        <?php
        foreach ($images as $image) : ?>
            <div class="card-img">
                <div class="card-img-content">
                    <?php $nomImage = basename($image); ?>
                    <img src="<?php getenv('HTTP_HOST') ?>/public/assets/images/<?= $nomImage ?>">
                </div>
                <div class="card-img-name">
                    <?= $nomImage; ?>
                </div>
                <div class="card-img-button">
                    <button class="cta-button delete-button" onclick="window.location.href ='/delete-image?name=<?=$nomImage?>';">Supprimer</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>