<?php print_r($errors ?? null); ?>

<form method="<?= $config["config"]["method"] ?>" action="<?= $config["config"]["action"] ?>" enctype="<?= $config["config"]["enctype"] ?>" id="<?= $config["config"]["id"] ?>" class="<?= $config["config"]["class"] ?>">
    <?php foreach ($config["inputs"] as $name => $input) : ?>
        <input type="<?= $input["type"] ?>" name="<?= $name ?>" class="<?= $input["class"] ?>" placeholder="<?= $input["placeholder"] ?>" <?= $input["required"] ? "required" : "" ?>>
        <?php if ($input["type"] == "textarea") : ?>
            <textarea name="" id="" cols="30" rows="10"></textarea>
        <?php endif; ?>
    <?php endforeach; ?>
    <button type="submit" class="cta-button"><?= $config["config"]["submit"] ?></button>
</form>