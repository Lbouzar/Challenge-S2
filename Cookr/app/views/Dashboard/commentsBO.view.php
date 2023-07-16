<div class="layout-bo comments-bo">
  <h2 class="title-bo">Gérer les commentaires</h2>
  <div class="comments-list">
    <?php foreach ($comments as $comment) :
      $this->modal("comment", $comment); ?>
    <button class="cta-button delete-account delete-button" onclick="window.location.href ='/delete-comments?id=<?=$comment['id']?>';">Supprimer</button>
    <?php endforeach; ?>