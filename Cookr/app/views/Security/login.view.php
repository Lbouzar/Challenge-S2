<?php echo $menu[0]["content"] ?>
<main id="login" class="justify-between">
    <section>
        <h1><?php echo $loginpage[0]["title"] ?></h1>
        <?php if (isset($formErrors))
            $this->modal("errors", $formErrors); ?>
        <?php $this->modal("form", $form); ?>
        <div class="register">
            <a href="<?php echo $loginpage[0]["link_route"] ?>"><?php echo $loginpage[0]["link_title"] ?></a>
        </div>
    </section>
</main>