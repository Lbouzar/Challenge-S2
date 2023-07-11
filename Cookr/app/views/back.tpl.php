<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="<?php getenv('HTTP_HOST') ?>/public/assets/icons/logo-small.svg">
    <link rel="stylesheet" href="<?php getenv('HTTP_HOST') ?>/public/assets/css/main.css">
    <script src="/app/vendor/tinymce/tinymce/tinymce.min.js"></script>
    <!-- <script src="<?php // js_url('main') 
                        ?>"></script> -->
    <title>Cookr - Dashboard</title>
</head>

<body>
  <header class="headerBO">
    <a href="/" id="logo-link">
      <img class="icon--logo" src="<?php getenv('HTTP_HOST') ?>/public/assets/icons/logo-regular.svg" alt="logo cookr">
    </a>
  </header>
  <div class="flex">
    <nav class="sidebarBO">
      <div>
        <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 13h6c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v8c0 .55.45 1 1 1Zm0 8h6c.55 0 1-.45 1-1v-4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v4c0 .55.45 1 1 1Zm10 0h6c.55 0 1-.45 1-1v-8c0-.55-.45-1-1-1h-6c-.55 0-1 .45-1 1v8c0 .55.45 1 1 1ZM13 4v4c0 .55.45 1 1 1h6c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1h-6c-.55 0-1 .45-1 1Z" fill="#FC6E3C"/></svg>
        <span>Dashboard</span>
      </div>
      <div>
        <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.998 19.327v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87l-8.36-7.53c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87h1.7v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1Z" fill="#FC6E3C"/></svg>
        <span>Page d'accueil</span>
      </div>
      <div>
        <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 1.75c-1.77 0-3.33 1.17-3.83 2.87-.53-.24-1.09-.37-1.67-.37a4 4 0 0 0-4 4 4.01 4.01 0 0 0 3 3.87v7.13h13v-7.13c1.76-.46 3-2.05 3-3.87a4 4 0 0 0-4-4c-.58 0-1.14.13-1.67.37-.5-1.7-2.06-2.87-3.83-2.87Zm-.5 9h1v7h-1v-7Zm-3 2h1v5h-1v-5Zm6 0h1v5h-1v-5Zm-9 7.5v1a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-1h-13Z" fill="#FC6E3C"/></svg>
        <span>Recettes</span>
      </div>
      <div>
        <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 17h7v-2H7v2Zm0-4h10v-2H7v2Zm0-4h10V7H7v2ZM5 21c-.55 0-1.021-.196-1.413-.588A1.922 1.922 0 0 1 3 19V5c0-.55.196-1.021.588-1.413A1.922 1.922 0 0 1 5 3h14c.55 0 1.021.196 1.413.588.392.392.588.863.587 1.412v14c0 .55-.196 1.021-.588 1.413A1.922 1.922 0 0 1 19 21H5Z" fill="#FC6E3C"/></svg>
        <span>Articles</span>
      </div>
      <div>
        <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 14h12v-2H6v2Zm0-3h12V9H6v2Zm0-3h12V6H6v2ZM4 18c-.55 0-1.021-.196-1.413-.588A1.922 1.922 0 0 1 2 16V4c0-.55.196-1.021.588-1.413A1.922 1.922 0 0 1 4 2h16c.55 0 1.021.196 1.413.588.392.392.588.863.587 1.412v18l-4-4H4Z" fill="#FC6E3C"/></svg>
        <span>Commentaires</span>
      </div>
      <div>
        <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 17c0-2 4-3.1 6-3.1s6 1.1 6 3.1v1H6m9-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM3 5v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2Z" fill="#FC6E3C"/></svg>
        <span>Contact</span>
      </div>
      <div>
        <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="m9.25 22-.4-3.2a3.809 3.809 0 0 1-.613-.3 8.017 8.017 0 0 1-.562-.375L4.7 19.375l-2.75-4.75 2.575-1.95a2.39 2.39 0 0 1-.025-.338v-.674c0-.109.008-.221.025-.338L1.95 9.375l2.75-4.75 2.975 1.25c.183-.133.375-.258.575-.375.2-.117.4-.217.6-.3l.4-3.2h5.5l.4 3.2c.217.083.421.183.613.3.192.117.38.242.562.375l2.975-1.25 2.75 4.75-2.575 1.95a2.4 2.4 0 0 1 .025.338v.674c0 .109-.017.221-.05.338l2.575 1.95-2.75 4.75-2.95-1.25a6.842 6.842 0 0 1-.575.375c-.2.117-.4.217-.6.3l-.4 3.2h-5.5Zm2.8-6.5c.967 0 1.792-.342 2.475-1.025A3.372 3.372 0 0 0 15.55 12c0-.967-.342-1.792-1.025-2.475A3.373 3.373 0 0 0 12.05 8.5c-.983 0-1.813.342-2.488 1.025A3.389 3.389 0 0 0 8.55 12c0 .967.337 1.792 1.012 2.475S11.066 15.5 12.05 15.5Z" fill="#FC6E3C"/></svg>
        <span>Paramètres</span>
      </div>
    </nav>
    <?php include $this->view; ?>
  </div>
</body>
</html>