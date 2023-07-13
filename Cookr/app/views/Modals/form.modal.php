<form method="<?= $config["config"]["method"] ?>" action="<?= $config["config"]["action"] ?>" enctype="<?= $config["config"]["enctype"] ?>" id="<?= $config["config"]["id"] ?>" class="<?= $config["config"]["class"] ?>">
    <?php foreach ($config["inputs"] as $name => $input) : ?>
        <?php if ($input["type"] === "textarea") : ?>
            <fieldset class="flex-column">
            <label for="<?= $name ?>"><?= $input["label"] ?></label>
            <textarea name="<?= $name ?>" 
            id="<?= $input["id"]?? ""?>"
            class="<?= $input["class"]?>"
            minlength="<?= $input["min"]?? ""?>"
            maxlength="<?= $input["max"]?? ""?>" 
            cols="<?= $input["cols"]?>" 
            rows="<?= $input["rows"]?>"
            <?= $input["required"] ? "required" : "" ?>><?= $input["value"]?? ""?></textarea>
            <span class="length" id="message-length">
                <span>0</span>
                <span>/</span>
                <span>300</span>
            </span>
            </fieldset>
        <?php elseif ($input["type"] === "select") :?>
            <fieldset class="flex-column">
            <label for="<?= $name ?>"><?= $input["label"] ?></label> 
            <select name="<?= $name;?>" id="<?= $input["id"]?? ""?>">
                <?php foreach ($input["options"] as $option):?>
                    <option value="<?= $option["value"];?>">
                    <?= $option["name"];?>
                </option>
                <?php endforeach;?>
            </select>
            </fieldset>
        <?php else : ?>
            <fieldset class="flex-column">
            <label for="<?= $name ?>"><?= $input["label"] ?></label>
            <input name="<?= $name ?>"
            id="<?= $input["id"]?? ""?>"  
            type="<?= $input["type"] ?>"
            class="<?= $input["class"] ?>" 
            placeholder="<?= $input["placeholder"]?? "" ?>"
            minlength="<?= $input["min"]?? ""?>"
            maxlength="<?= $input["max"]?? ""?>" 
            value="<?= $input["value"]?? ""?>"
            accept="<?= $input["accept"]?? ""?>"
            onchange="<?= $input["onchange"]?? ""?>"
            <?= $input["required"] ? "required" : "" ?>>
            </fieldset>
        <?php endif; ?>
    <?php endforeach; ?>
    <button type="submit" class="cta-button"><?= $config["config"]["submit"] ?></button>
</form>