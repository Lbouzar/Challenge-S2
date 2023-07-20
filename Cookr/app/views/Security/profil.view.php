<?php if (isset($menu) && !empty($menu))
  $this->modal("navbar", $menu); ?>

<?php if (isset($profilpage) && !empty($profilpage)) : ?>
  <main>
    <h1 class="main-title profile-title"><?php echo $profilpage[0]["firsttitle"] ?></h1>
    <div class="profile-container">
      <div class="first-section">
        <div class="user-wrapper">
          <svg width="21" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M10.5 12a6 6 0 1 0 0-12 6 6 0 1 0 0 12Zm4.2 1.5h-.783a8.169 8.169 0 0 1-6.834 0H6.3A6.302 6.302 0 0 0 0 19.8v1.95A2.25 2.25 0 0 0 2.25 24h16.5A2.25 2.25 0 0 0 21 21.75V19.8c0-3.478-2.822-6.3-6.3-6.3Z" fill="#FFF" />
          </svg>
        </div>
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
        <h1 class="sub-title ml-0"><?php echo $profilpage[0]["secondtitle"] ?></h1>
        <?php if (isset($updateUserErrors))
          $this->modal("errors", $updateUserErrors); ?>
        <?php $this->modal("form", $formUpdateUser); ?>
      </div>
      <div class="third-section">
        <h1 class="sub-title ml-0"><?php echo $profilpage[0]["lasttitle"] ?></h1>
        <?php if (isset($updatePasswordErrors))
          $this->modal("errors", $updatePasswordErrors); ?>
        <?php $this->modal("form", $formUpdatePassword); ?>
      </div>
    </div>
    <button class="cta-button delete-account delete-button" onclick="window.location.href ='/delete-profil?id=<?= $id ?>';">Supprimer</button>
  </main>
<?php endif; ?>