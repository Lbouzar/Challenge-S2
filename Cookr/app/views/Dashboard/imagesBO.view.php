<div class="layout-bo">
    <?php
    foreach ($images as $image) : ?>
        <div class="card">
            <div class="card-image">
                <?php $nomImage = basename($image); ?>
                <img src="<?php getenv('HTTP_HOST') ?>/public/assets/images/<?= $nomImage ?>">
            </div>
            <div class="card-body">
                <?= $nomImage; ?>
            </div>
            <div class="card-footer justify-center">
                <button class="cta-button" onclick="window.location.href ='/delete-image?name=<?=$nomImage?>';">Supprimer</button>
            </div>
        </div>
    <?php endforeach; ?>
</div>