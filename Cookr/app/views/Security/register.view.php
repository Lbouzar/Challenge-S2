<?php echo $menu[0]["content"] ?>
<main id="register" class="justify-center">
    <section>
        <h1><?php echo $registerpage[0]["title"] ?></h1>
        <?php if (isset($formErrors))
            $this->modal("errors", $formErrors); ?>
        <?php $this->modal("form", $form); ?>
        <div class="register">
            <a href="<?php echo $registerpage[0]["link_route"] ?>"><?php echo $registerpage[0]["link_title"] ?></a>
        </div>
    </section>
</main>