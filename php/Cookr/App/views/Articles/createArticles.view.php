<script>
  tinymce.init({
    selector: '#myTextarea',
    height: 300,
  });
</script>

<div class="layout-bo recipes-bo">
    <h2 class="title-bo">Créer un article</h2>
    <?php if (isset($formErrors))
        $this->modal("errors", $formErrors); ?>
    <?php $this->modal("form", $form); ?>
</div>

<script>
  window.addEventListener('load', function() {
    tinymce.activeEditor.on('change', function() {
      const inputContent = tinymce.activeEditor.getContent({ format: 'raw' });
      document.getElementById('myTextarea').value = inputContent;
    });
  })
</script>