<?php echo $menu[0]["content"] ?>
<main>
  <h1><?php echo $profilpage[0]["firsttitle"] ?></h1>
  <div class="profile-container">
    <div class="first-section">
      <span class="name"><?= $userInfos ?></span>
      <div class="separator"></div>
      <button class="log-out" onclick="window.location.href ='/logout';">
        <span>Se déconnecter</span>
        <svg width="25" height="25" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="m9 19.5 7-7-7-7" stroke="#FC6E3C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </button>
    </div>
    <div class="second-section">
      <h1 class="sub-title"><?php echo $profilpage[0]["secondtitle"] ?></h1>
      <?php if (isset($updateUserErrors))
        $this->modal("errors", $updateUserErrors); ?>
      <?php $this->modal("form", $formUpdateUser); ?>
    </div>
    <div>
      <h1 class="sub-title"><?php echo $profilpage[0]["lasttitle"] ?></h1>
      <?php if (isset($updatePasswordErrors))
        $this->modal("errors", $updatePasswordErrors); ?>
      <?php $this->modal("form", $formUpdatePassword); ?>
    </div>
  </div>
  <button class="cta-button delete-account" onclick="window.location.href ='/delete-profil?id=<?=$id?>';">Supprimer</button>
</main>