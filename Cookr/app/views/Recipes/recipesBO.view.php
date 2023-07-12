<!-- <script>
  function uploadImg(input, img) {
    const [file] = input.files
    if (file) {
      img.src = URL.createObjectURL(file)
    }
  }
</script> -->

<div class="layout-bo recipes-bo">
  <button class="cta-button" onclick="window.location.href ='/create-recipe';">Créer une recette</button>
  <h2>Toutes les recettes</h2>
  <div class="list-edit-recipes">
    <?php foreach ($recipes as $recipe) : ?>
      <a href="/recipe-bo?slug=<?= $recipe["slug"] ?>&id=<?= $recipe["id"] ?>">
        <?php $this->modal("cardBO", $recipe); ?>
      </a>
    <?php endforeach ?>
  </div>
  <!-- <div class="flex justify-between img-previews">
      <fieldset class="flex-column">
        <label for="img1">Image 1</label>
        <input type="file" id="img1" name="img1" accept="image/*" onchange="uploadImg(this, imgPreview1)">
        <img id="imgPreview1" src="#" alt="img" />
      </fieldset>
      <fieldset class="flex-column">
        <label for="img2">Image 2</label>
        <input type="file" id="img2" name="img2" accept="image/*" onchange="uploadImg(this, imgPreview2)">
        <img id="imgPreview2" src="#" alt="img" />
      </fieldset>
      <fieldset class="flex-column">
        <label for="img3">Image 3</label>
        <input type="file" id="img3" name="img3" accept="image/*" onchange="uploadImg(this, imgPreview3)">
        <img id="imgPreview3" src="#" alt="img" />
      </fieldset>
    </div> -->
</div>