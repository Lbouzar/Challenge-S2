<?php foreach ($config as $error) : ?>
    <?php if ($error != " ") : ?>
    <span class="error"><?= $error ?></span>
    <?php endif; ?>
<?php endforeach; ?>