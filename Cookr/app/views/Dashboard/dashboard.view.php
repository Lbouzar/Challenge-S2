<div class="layout-bo dashboard">
  <h1>Dashboard</h1>
  <h2>Les dernières recettes</h2>
  <div class="grid index-card recipes-grid mt-6 justify-items-between recipes-list">
    <article class="card">
      <div class="card-image">
        <img src="<?php getenv('HTTP_HOST') ?>/public/assets/images/mochi.png" alt="mochi">
      </div>
      <div class="recipe-card-title">
        <h2>Mochi vert</h2>
        <div class="flex">
          <i class="icon-star icon-medium icon-orange" aria-label="étoile"></i>
          <i class="icon-star icon-medium icon-orange" aria-label="étoile"></i>
          <i class="icon-star icon-medium icon-orange" aria-label="étoile"></i>
          <i class="icon-star icon-medium icon-orange" aria-label="étoile"></i>
          <i class="icon-star icon-medium icon-orange" aria-label="étoile"></i>
        </div>
      </div>
    </article>
    <article class="card">
      <div class="card-image">
        <img src="<?php getenv('HTTP_HOST') ?>/public/assets/images/image_1.png" alt="riz avocat">
      </div>
      <div class="recipe-card-title">
        <h2>Riz avocat</h2>
        <div class="flex">
          <i class="icon-star icon-medium icon-orange" aria-label="étoile"></i>
          <i class="icon-star icon-medium icon-orange" aria-label="étoile"></i>
          <i class="icon-star icon-medium icon-orange" aria-label="étoile"></i>
          <i class="icon-star icon-medium icon-orange" aria-label="étoile"></i>
          <i class="icon-star icon-medium icon-orange" aria-label="étoile"></i>
        </div>
      </div>
    </article>
    <article class="card">
      <div class="card-image">
        <img src="<?php getenv('HTTP_HOST') ?>/public/assets/images/cookies.png" alt="cookies">
      </div>
      <div class="recipe-card-title">
        <h2>Cookies</h2>
        <div class="flex">
          <i class="icon-star icon-medium icon-orange" aria-label="étoile"></i>
          <i class="icon-star icon-medium icon-orange" aria-label="étoile"></i>
          <i class="icon-star icon-medium icon-orange" aria-label="étoile"></i>
          <i class="icon-star icon-medium icon-orange" aria-label="étoile"></i>
          <i class="icon-star icon-medium icon-orange" aria-label="étoile"></i>
        </div>
      </div>
    </article>
  </div>
  <button class="cta-button">Gérer les recettes</button>
  <h2>Les derniers articles</h2>
  <div class="grid index-card articles-grid align-self-center">
    <a href="/article.html" id="link-card">
      <article class="card">
        <div class="card-image">
          <img src="<?php getenv('HTTP_HOST') ?>/public/assets/images/gateau_citron.png" alt="image d'article gateau citron">
        </div>
        <div class="card-title">
          <h2>LES CONSEILS DE CYRIL LIGNAC</h2>
        </div>
        <div class="card-body">
          <p>Patisserie, citron, conseils</p>
        </div>
        <div class="card-footer">
          <p>06.02.23</p>
        </div>
      </article>
    </a>
    <article class="card">
      <div class="card-image">
        <img src="<?php getenv('HTTP_HOST') ?>/public/assets/images/article_picture.png" alt="image d'article">
      </div>
      <div class="card-title">
        <h2>A WONDERFUL ARTICLE TITLE</h2>
      </div>
      <div class="card-body">
        <p>Catégorie 1, Catégorie 2, Catégorie 3</p>
      </div>
      <div class="card-footer">
        <p>06.02.23</p>
      </div>
    </article>
    <article class="card">
      <div class="card-image">
        <img src="<?php getenv('HTTP_HOST') ?>/public/assets/images/article_picture.png" alt="image d'article">
      </div>
      <div class="card-title">
        <h2>A WONDERFUL ARTICLE TITLE</h2>
      </div>
      <div class="card-body">
        <p>Catégorie 1, Catégorie 2, Catégorie 3</p>
      </div>
      <div class="card-footer">
        <p>06.02.23</p>
      </div>
    </article>
  </div>
  <button class="cta-button">Gérer les articles</button>
  <h2>Les derniers commentaires</h2>
  <div class="comments-list">
    <div class="comment">
      <div>
        <span>User 1</span>
        <span>27/06/23 12:07</span>
      </div>
      <p>Lorem ipsum dolor sit amet ipsum dolor sit ametipsum dolor sit amet ipsum dolor sit amet v fgf qgsf Lorem ipsum dolor sit amet ipsum dolor sit ametipsum dolor sit amet ipsum dolor sit amet v fgf qgsf gLorem ipsum dolor sit amet ipsum dolor sit ametipsum dolor sit amet ipsum dolor sit amet v fgf qgsf g</p>
      <span class="where-posted">Posté sur :&nbsp;<span>Salade d'été végan</span></span>
    </div>
    <div class="comment">
      <div>
        <span>User 2</span>
        <span>27/06/23 12:07</span>
      </div>
      <p>Lorem ipsum dolor sit amet ipsum dolor sit ametipsum dolor sit amet ipsum dolor sit amet v fgf qgsf Lorem ipsum dolor sit amet ipsum dolor sit ametipsum dolor sit amet ipsum dolor sit amet v fgf qgsf gLorem ipsum dolor sit amet ipsum dolor sit ametipsum dolor sit amet ipsum dolor sit amet v fgf qgsf g</p>
      <span class="where-posted">Posté sur :&nbsp;<span>Salade d'été végan</span></span>
    </div>
    <div class="comment">
      <div>
        <span>User 3</span>
        <span>27/06/23 12:07</span>
      </div>
      <p>Lorem ipsum dolor sit amet ipsum dolor sit ametipsum dolor sit amet ipsum dolor sit amet v fgf qgsf Lorem ipsum dolor sit amet ipsum dolor sit ametipsum dolor sit amet ipsum dolor sit amet v fgf qgsf gLorem ipsum dolor sit amet ipsum dolor sit ametipsum dolor sit amet ipsum dolor sit amet v fgf qgsf g</p>
      <span class="where-posted">Posté sur :&nbsp;<span>Salade d'été végan</span></span>
    </div>
  </div>
  <button class="cta-button">Gérer les commentaires</button>
</div>