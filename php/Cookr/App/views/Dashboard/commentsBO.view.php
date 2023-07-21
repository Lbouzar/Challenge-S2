<div class="layout-bo comments-bo">
  <h2 class="title-bo">Gérer les commentaires</h2>
  <div class="comments-list">
    <?php foreach ($comments as $comment) :
      $this->modal("comment", $comment); ?>
      <?php if ($comment["is_valid"] == 0) : ?>
        <button class="cta-button" style="margin-left: auto;" onclick="window.location.href ='/valid-comments?id=<?= $comment['id'] ?>';">Valider</button>
      <?php endif; ?>
      <button class="cta-button delete-button" onclick="window.location.href ='/delete-comments?id=<?= $comment['id'] ?>';">Supprimer</button>
    <?php endforeach; ?>