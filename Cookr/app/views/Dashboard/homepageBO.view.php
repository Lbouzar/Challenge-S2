<script>
  function uploadImg(input, img) {
    const [file] = input.files
    if (file) {
      img.src = URL.createObjectURL(file)
    }
  }
</script>

<div class="layout-bo homepage-bo">
  <h2>Modifier la page d'accueil</h2>
  <form action="">
    <div class="">
      <fieldset class="flex-column">
        <label for="slogan">Slogan</label>
        <input type="text" id="slogan" name="slogan" placeholder="Slogan du site" class="input-regular">
      </fieldset>
      <fieldset class="flex-column img-logo">
        <label for="imgLogo">Logo</label>
        <input type="file" id="imgLogo" name="imgLogo" accept="image/*" onchange="uploadImg(this, imgPreviewLogo)">
        <img id="imgPreviewLogo" src="#" alt="img" />
      </fieldset>
    </div>
  </form>
</div>