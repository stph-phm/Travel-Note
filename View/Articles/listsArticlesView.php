<?php $title = "Tous les articles" ?>
<?php ob_start(); ?>
<div class="part-all-articles">
     <div class="nav-header"></div>
     <h1>Tous les articles </h1>

     <div class="list-articles">
          <!--CONTAINER-->
          <div class="list">
               <?php foreach ($articles as $listArticles): ?>
               <div class="image">
                    <img src="Assets\Images\6.jpg" alt="">
                    <div class="details">
                         <h2> <span><?= htmlspecialchars($listArticles['title']) ?></span></h2>
                         <p><?=  nl2br(mb_substr($listArticles['content'], 0, 100)) ?></p>
                         <div class="more">
                              <a href="index.php?action=article&amp;id=<?= $listArticles['id'] ?>"
                                   class="read-more">Lire <span>la suite</span></a>
                              <div class="icon-links">
                                   <a href="index.php?action=article&amp;id=<?= $listArticles['id'] ?>"><i
                                             class="fas fa-eye"></i></a>
                              </div>
                         </div>
                    </div>
               </div>
               <?php endforeach; ?>
          </div>
     </div>
     <div class="pagination">
          <nav>
               <ul class="pagination">
                    <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                    <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                         <a href="index.php?action=listAllArticles&page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                    </li>
                    <?php for($page = 1; $page <= $pages; $page++): ?>
                    <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                    <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                         <a href="index.php?action=listAllArticles&page=<?= $page ?>" class="page-link"><?= $page ?></a>
                    </li>
                    <?php endfor ?>
                    <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                    <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                         <a href="index.php?action=listAllArticles&page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                    </li>
               </ul>
          </nav>
     </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php include 'View/template.php'; ?>