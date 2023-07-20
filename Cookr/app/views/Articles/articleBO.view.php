<script>
  tinymce.init({
    selector: '#myTextareaUpdate',
    height: 300,
  });
</script>


<div class="layout-bo articles-bo">
  <h2 class="title-bo">Modifier l'article</h2>
  <?php if (isset($formErrors))
    $this->modal("errors", $formErrors); ?>
  <?php $this->modal("form", $form); ?>
  <?php if (!empty($history)) : ?>
    <h2 class="title-bo">Restaurer une ancienne version</h2>
    <?php if (isset($formErrors))
      $this->modal("errors", $formErrors); ?>
    <?php $this->modal("form", $form); ?>
  <?php endif; ?>
  <button class="cta-button delete-account delete-button" onclick="window.location.href ='/delete-article?id=<?= $_GET['id'] ?>';">Supprimer</button>
</div>