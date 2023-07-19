<?php foreach ($config as $error) : ?>
    <?php if ($error != " ") : ?>
    <span><?= $error ?></span>
    <?php endif; ?>
<?php endforeach; ?>