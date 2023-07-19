<script>
  function uploadImg(input, img) {
    const [file] = input.files
    if (file) {
      img.src = URL.createObjectURL(file)
    }
  }
</script>

<div class="layout-bo recipes-bo">
    <h2>Créer une recette</h2>
    <?php if (isset($formErrors))
        $this->modal("errors", $formErrors); ?>
    <?php $this->modal("form", $form); ?>
</div>