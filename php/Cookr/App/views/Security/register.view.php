<?php if (isset($menu) && !empty($menu))
    $this->modal("navbar", $menu); ?>

<?php if (isset($registerpage) && !empty($registerpage)) : ?>
<main id="register">
    <section>
        <h1 class="ml-0"><?php echo $registerpage[0]["title"] ?></h1>
        <?php if (isset($formErrors))
            $this->modal("errors", $formErrors); ?>
        <?php $this->modal("form", $form); ?>
        <div class="register">
            <a href="<?php echo $registerpage[0]["link_route"] ?>"><?php echo $registerpage[0]["link_title"] ?></a>
        </div>
    </section>
</main>
<?php endif; ?>