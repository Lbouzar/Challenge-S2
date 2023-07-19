<?php if (isset($menu) && !empty($menu))
    $this->modal("navbar", $menu); ?>

<?php if (isset($loginpage) && !empty($loginpage)) : ?>
<main id="login" class="justify-between">
    <section>
        <h1 class="ml-0"><?php echo $loginpage[0]["title"] ?></h1>
        <?php if (isset($formErrors))
            $this->modal("errors", $formErrors); ?>
        <?php $this->modal("form", $form); ?>
        <div class="register">
            <a href="<?php echo $loginpage[0]["link_route"] ?>"><?php echo $loginpage[0]["link_title"] ?></a>
        </div>
    </section>
</main>
<?php endif; ?>