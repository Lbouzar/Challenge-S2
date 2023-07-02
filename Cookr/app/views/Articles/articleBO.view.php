<script>
  function uploadImg(input, img) {
    const [file] = input.files
    if (file) {
      img.src = URL.createObjectURL(file)
    }
  }
</script>
<script>
  tinymce.init({
    selector: '#myTextarea',
    height: 300,
    file: { title: 'File', items: 'newdocument restoredraft | preview | export print | deleteallconversations' },
    edit: { title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall | searchreplace' },
    view: { title: 'View', items: 'code | visualaid visualchars visualblocks | spellchecker | preview fullscreen | showcomments' },
    insert: { title: 'Insert', items: 'image link media addcomment pageembed template codesample inserttable | charmap emoticons hr | pagebreak nonbreaking anchor tableofcontents | insertdatetime' },
    format: { title: 'Format', items: 'bold italic underline strikethrough superscript subscript codeformat | styles blocks fontfamily fontsize align lineheight | forecolor backcolor | language | removeformat' },
    tools: { title: 'Tools', items: 'spellchecker spellcheckerlanguage | a11ycheck code wordcount' },
    table: { title: 'Table', items: 'inserttable | cell row column | advtablesort | tableprops deletetable' },
    help: { title: 'Help', items: 'help' },
    plugins: 'image',
    toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | image',
  });
</script>

<div class="layout-bo articles-bo">
  <h2>Modifier l'article</h2>
  <form action="">
    <div class="flex justify-between">
      <div class="first-col">
        <fieldset class="flex-column">
          <label for="title">Titre</label>
          <input type="text" id="title" name="title" placeholder="Le titre de l'article" class="input-regular">
        </fieldset>
        <fieldset class="flex-column">
          <label for="keywords">Mots-clés</label>
          <input type="text" id="keywords" name="keywords" placeholder="Séparer les mots clés par des /" class="input-regular">
        </fieldset>
      </div>
      <div class="second-col">
        <fieldset class="flex-column thumbnail">
          <label for="thumbnail">Miniature</label>
          <input type="file" id="thumbnail" name="thumbnail" accept="image/*" onchange="uploadImg(this, imgThumbnail)">
          <img id="imgThumbnail" src="#" alt="img" />
        </fieldset>
      </div>
    </div>
    <div>
      <fieldset class="flex-column">
        <label for="title">Contenu</label>
        <textarea name="myTextarea" id="myTextarea" cols="30" rows="10"></textarea>
      </fieldset>
    </div>
    <div class="manage-buttons">
      <button type="button" class="cta-button delete-button">Supprimer</button>
      <button type="submit" class="cta-button">Sauvegarder</button>
    </div>
  </form>
</div>