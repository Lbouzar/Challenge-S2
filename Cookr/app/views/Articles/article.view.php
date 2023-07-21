<?php if (isset($menu) && !empty($menu))
  $this->modal("navbar", $menu); ?>

<main class='article-view'>
  <h1 class="main-title"><?php echo $article[0]["title"]; ?></h1>
  <section>
    <div class="first-section">
      <span class="publication-date">Publié le : <span><?=$article[0]["created_at"]?></span></span>
      <span class="keywords-title">Mots-clés :</span>
      <div class="keyword-content">
        <?php
          $keywords = explode(" / ", $article[0]["keywords"]);
          foreach ($keywords as $keyword) {
            $keywords = trim($keyword);
            $span = "<span>- $keyword</span>";
            echo $span;
          }
        ?>
      </div>
    </div>
    <div class="second-section">
      <img src="public/assets/images/<?= $article[0]["image"] ?>" alt="thumbnail">
      <?php echo $article[0]["content"] ?>
    </div>
  </section>
</main>
