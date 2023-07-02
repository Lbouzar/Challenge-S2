<form method="<?= $config["config"]["method"] ?>" action="<?= $config["config"]["action"] ?>" enctype="<?= $config["config"]["enctype"] ?>" id="<?= $config["config"]["id"] ?>" class="<?= $config["config"]["class"] ?>">
    <?php foreach ($config["inputs"] as $name => $input) : ?>
        <?php if ($input["type"] === "textarea") : ?>
            <label for="<?= $name ?>"><?= $input["label"] ?></label>
            <textarea name="<?= $name ?>" 
            class="<?= $input["class"]?>"
            minlength="<?= $input["min"]?? ""?>"
            maxlength="<?= $input["max"]?? ""?>" 
            cols="<?= $input["cols"]?>" 
            rows="<?= $input["rows"]?>"
            <?= $input["required"] ? "required" : "" ?>>
            </textarea>
            <span class="length" id="message-length">
                <span>0</span>
                <span>/</span>
                <span>300</span>
            </span>
        <?php else : ?>
            <label for="<?= $name ?>"><?= $input["label"] ?></label>
            <input name="<?= $name ?>"  
            type="<?= $input["type"] ?>"
            class="<?= $input["class"] ?>" 
            placeholder="<?= $input["placeholder"] ?>"
            minlength="<?= $input["min"]?? ""?>"
            maxlength="<?= $input["max"]?? ""?>" 
            <?= $input["required"] ? "required" : "" ?>>
        <?php endif; ?>
    <?php endforeach; ?>
    <button type="submit" class="cta-button"><?= $config["config"]["submit"] ?></button>
</form>