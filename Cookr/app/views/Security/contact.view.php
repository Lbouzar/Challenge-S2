<?php echo $menu[0]["content"] ?>
<main id="contact">
    <h1><?php echo $contactpage[0]["title"]?></h1>
    <p><?php echo $contactpage[0]["content"]?></p>
    <div class="user-info">
        <?php if (isset($formErrors))
            $this->modal("errors", $formErrors); ?>
        <?php $this->modal("form", $form); ?>
    </div>
</main>