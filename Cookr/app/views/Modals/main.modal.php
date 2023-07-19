<div class="card" id="card-recipe-of-the-day">
    
    <div class="card-img">
        <img src="<?php getenv('HTTP_HOST') ?>/public/assets/images/<?= $config[0]["image"] ?>" alt="">
    </div>
    <div class="recipe-card-title">
        <h2><?= $config[0]["title"] ?></h2>
    </div>
</div>
<article class="recipe-of-the-day">
    <aside class=" justify-between flex-wrap">
        <p>
        <?= $config[0]["presentation"]?>
        </p>
    </aside>
    <button class="cta-button--full cta-button" onclick="window.location.href ='/recipe';">
        Découvrir
    </button>
</article>