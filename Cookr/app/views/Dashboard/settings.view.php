<!-- <script>
  window.addEventListener('load', function() {
    let font = document.getElementById('font').value;
    document.getElementById('font').addEventListener('change', function() {
      font = this.value;
      updateDynamicFont(font);
    });
    function updateDynamicFont(font) {
      const styleElement = document.createElement('style');
      const css = `body, button { font-family: ${font}, sans-serif !important; }`;
      styleElement.textContent = css;
      const headElement = document.head || document.getElementsByTagName('head')[0];
      headElement.appendChild(styleElement);
    }
    updateDynamicFont(font);
  })
</script> -->

<div class="layout-bo settings">
  <h2 class="title-bo">Modifier les paramètres</h2>
  <?php if (isset($formErrors))
    $this->modal("errors", $formErrors); ?>
  <?php $this->modal("form", $form); ?>
</div>