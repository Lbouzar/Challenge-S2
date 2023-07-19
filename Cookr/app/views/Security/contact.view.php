<?php if (isset($menu) && !empty($menu))
    $this->modal("navbar", $menu); ?>

<?php if (isset($contactpage) && !empty($contactpage)) : ?>
<main id="contact">
    <h1><?php echo $contactpage[0]["title"] ?></h1>
    <p><?php echo $contactpage[0]["content"] ?></p>
    <div class="user-info">
        <?php if (isset($formErrors))
            $this->modal("errors", $formErrors); ?>
        <?php $this->modal("form", $form); ?>
    </div>
</main>
<?php endif; ?>