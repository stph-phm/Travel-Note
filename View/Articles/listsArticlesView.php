<?php $title = "Tous les articles" ?>
<?php ob_start(); ?>
<div class="part-all-articles">
     <div class="nav-header"></div>
     <h1>Tous les articles </h1>

     <article class="list-articles"><!--CONTAINER-->
          <div class="list">
               <?php foreach ($articles as $listArticles){ ?>
               <div class="image">
                    <img src="Assets/Images/6.jpg" alt="image card article">
                    <div class="details">
                         <h3> <span><?= htmlspecialchars($listArticles['title']) ?></span></h3>

                         <div class="more">
                              <a href="index.php?action=article&amp;id=<?= $listArticles['id'] ?>" class="read-more">Lire <span>la suite</span></a>
                         </div>
                    </div>
               </div>
               <?php } ?>
          </div>
     </article>
     <div class="pagination">
          <nav>
               <ul class="pagination">
                    <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                         <a href="index.php?action=listAllArticles&page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                    </li>
                    <?php for($page = 1; $page <= $pages; $page++): ?>

                    <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                         <a href="index.php?action=listAllArticles&page=<?= $page ?>" class="page-link"><?= $page ?></a>
                    </li>
                    <?php endfor ?>
                    
                    <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                         <a href="index.php?action=listAllArticles&page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                    </li>
               </ul>
          </nav>
     </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php include 'View/template.php'; ?>