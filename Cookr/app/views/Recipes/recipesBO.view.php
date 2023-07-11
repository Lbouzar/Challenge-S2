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
  <form action="">
    <div class="flex justify-between">
      <div class="lg-col">
        <fieldset class="flex-column">
          <label for="title">Titre</label>
          <input type="text" id="title" name="title" placeholder="Le titre de la recette" class="input-regular">
        </fieldset>
        <fieldset class="flex-column">
          <label for="presentation">Présentation</label>
          <textarea name="presentation" id="presentation" cols="30" rows="7" class="text-area" placeholder="Présentation de la recette"></textarea>
        </fieldset>
        <fieldset class="flex-column">
          <label for="ingredients">Ingrédients</label>
          <textarea name="ingredients" id="ingredients" cols="30" rows="7" class="text-area" placeholder="Ingrédients de la recette"></textarea>
        </fieldset>
        <fieldset class="flex-column">
          <label for="description">Description</label>
          <textarea name="description" id="description" cols="30" rows="7" class="text-area" placeholder="Description de la recette"></textarea>
        </fieldset>
      </div>
      <div class="md-col">
        <fieldset class="flex-column">
          <label for="preparation-time">Temps de préparation</label>
          <input type="number" id="preparation-time" name="preparation-time" placeholder="Temps en minutes" class="input-regular">
        </fieldset>
        <fieldset class="flex-column">
          <label for="cooking-time">Temps de cuisson</label>
          <input type="number" id="cooking-time" name="cooking-time" placeholder="Temps en minutes" class="input-regular">
        </fieldset>
        <fieldset class="flex-column">
          <label for="price">Prix</label>
          <input type="number" id="price" name="price" placeholder="Prix en euros" class="input-regular">
        </fieldset>
      </div>
    </div>
    <div class="flex justify-between img-previews">
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
    </div>
    <button type="submit" class="cta-button">Sauvegarder</button>
  </form>
  <h2>Modifier une recette</h2>
  <div class="list-edit-recipes">
    <a href="/back-office/recipes">
      <div class="edit-recipe">
        <div class="img-container">
          <img src="<?php getenv('HTTP_HOST') ?>/public/assets/images/article_picture.png" alt="">
        </div>
        <div class="recipe-dscp">
          <span>Titre de la recette</span>
          <p>Présentation de la recette Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora blanditiis ducimus consequuntur sunt modi, numquam fugiat ullam laboriosam ipsa nam voluptatum soluta sint cupiditate iusto dicta sed corporis nisi. Dignissimos.</p>
        </div>
        <div class="recipe-infos">
          <span>Par : <span>John Doe</span></span>
          <span>Le : <span>28/06/23</span></span>
        </div>
      </div>
    </a>
    <a href="/back-office/recipes">
      <div class="edit-recipe">
        <div class="img-container">
          <img src="<?php getenv('HTTP_HOST') ?>/public/assets/images/article_picture.png" alt="">
        </div>
        <div class="recipe-dscp">
          <span>Titre de la recette</span>
          <p>Présentation de la recette Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora blanditiis ducimus consequuntur sunt modi, numquam fugiat ullam laboriosam ipsa nam voluptatum soluta sint cupiditate iusto dicta sed corporis nisi. Dignissimos.</p>
        </div>
        <div class="recipe-infos">
          <span>Par : <span>John Doe</span></span>
          <span>Le : <span>28/06/23</span></span>
        </div>
      </div>
    </a>
    <a href="/back-office/recipes">
      <div class="edit-recipe">
        <div class="img-container">
          <img src="<?php getenv('HTTP_HOST') ?>/public/assets/images/article_picture.png" alt="">
        </div>
        <div class="recipe-dscp">
          <span>Titre de la recette</span>
          <p>Présentation de la recette Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora blanditiis ducimus consequuntur sunt modi, numquam fugiat ullam laboriosam ipsa nam voluptatum soluta sint cupiditate iusto dicta sed corporis nisi. Dignissimos.</p>
        </div>
        <div class="recipe-infos">
          <span>Par : <span>John Doe</span></span>
          <span>Le : <span>28/06/23</span></span>
        </div>
      </div>
    </a>
  </div>
</div>