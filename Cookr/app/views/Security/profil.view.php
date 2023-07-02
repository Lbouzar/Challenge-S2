<script>
  function uploadImg(input, img) {
    const [file] = input.files
    if (file) {
      img.src = URL.createObjectURL(file)
    }
  }
</script>

<main>
  <h1>Mon profil</h1>
  <form class="profile-container">
    <div class="first-section">
      <div class="img-container">
        <input type="file" id="userImg" name="userImg" accept="image/*" onchange="uploadImg(this, imgUser)">
        <img id="imgUser" src="#" alt="" />
        <div class="icon-photo">
          <svg width="15" height="15" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M2.682 4.453A2.333 2.333 0 0 0 .349 6.787v5.833a2.333 2.333 0 0 0 2.333 2.334h9.333a2.333 2.333 0 0 0 2.334-2.334V6.787a2.333 2.333 0 0 0-2.334-2.334H2.682Zm4.667 8.75a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm0-1.179a2.32 2.32 0 1 1 0-4.641 2.32 2.32 0 0 1 0 4.641Z" fill="#FC6E3C"/><mask id="a" fill="#fff"><rect x="8.515" y="2.703" width="4.667" height="2.917" rx=".583"/></mask><rect x="8.515" y="2.703" width="4.667" height="2.917" rx=".583" stroke="#FC6E3C" stroke-width="1.75" mask="url(#a)"/><path fill="#FC6E3C" d="M10.266 5.037h1.75v1.75h-1.75z"/></svg>
        </div>
      </div>
      <span class="name">John Doe</span>
      <span class="user-type">Utilisateur</span>
      <div class="separator"></div>
      <div class="log-out">
        <span>Se déconnecter</span>
        <svg width="25" height="25" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="m9 19.5 7-7-7-7" stroke="#FC6E3C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </div>
    </div>
    <div class="second-section">
      <button type="submit" class="cta-button save">Sauvegarder</button>
      <div class="grid-infos-user">
        <fieldset class="flex-column">
          <label for="lastname">Nom</label>
          <input type="text" id="lastname" name="lastname" class="input-regular">
        </fieldset>
        <fieldset class="flex-column">
          <label for="firstname">Prénom</label>
          <input type="text" id="firstname" name="firstname" class="input-regular">
        </fieldset>
        <fieldset class="flex-column">
          <label for="pseudo">Pseudo</label>
          <input type="text" id="pseudo" name="pseudo" class="input-regular">
        </fieldset>
        <fieldset class="flex-column">
          <label for="password">Mot de passe</label>
          <input type="password" id="password" name="password" class="input-regular">
        </fieldset>
        <fieldset class="flex-column">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" class="input-regular">
        </fieldset>
        <fieldset class="flex-column">
          <label for="phone">Numéro de téléphone</label>
          <input type="tel" id="phone" name="phone" class="input-regular">
        </fieldset>
      </div>
    </div>
  </form>
  <button class="cta-button delete-account">Supprimer</button>
</main>