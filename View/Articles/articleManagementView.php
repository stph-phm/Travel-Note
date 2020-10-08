<?php $title = "Gestion des articles " ?>
<?php ob_start(); ?>
<div class="part-management">
     <h1 class="article-management">Gestion des articles </h1>
     <div class="table">
          <table>
               <thead class="thead-dark">
                    <tr>
                         <th>titre du chapitre </th>
                         <th> Contenue de l'article </th>
                         <th>Date de publication</th>
                         <th>Publier ? </th>
                         <th width=450> Action </th>
                    </tr>
               </thead>
               <tbody>
                    <?php foreach ($articles as $listArticle) : ?>
                    <tr>
                         <td><a href="index.php?action=article&amp;id=<?= $listArticle['id'] ?>" class="t-content-article"><?= htmlspecialchars($listArticle['title'])  ?> </a></td>

                         <td class="td-content-article"><a
                                   href="index.php?action=article&amp;id=<?= $listArticle['id'] ?>" class="t-content-article"><?= nl2br(substr($listArticle['content'], 0, 350)) ?>
                              </a>
                         </td>

                         <td><?= date_format(date_create($listArticle['created_at']), 'd/m/Y') ?></td>

                         <td>
                              <?php if ($listArticle['is_published'] == 1): ?>
                              <i class="fas fa-check t-published-ok"></i>
                              <?php else: ?>
                              <i class="fas fa-times t-published-no"></i>
                              <?php endif; ?>
                         </td>

                         <td class="t-action">
                              <?php if ($listArticle['is_published'] == 0 ): ?>
                              <a href="index.php?action=publishedArticle&amp;id=<?= $listArticle['id'] ?>"
                                   class="publish btn btn-secondary"> <i class="fas fa-check"></i> Publier
                                   l'article</a>
                              <?php else: ?>

                              <a href="index.php?action=draftArticle&amp;id=<?= $listArticle['id'] ?>"
                                   class="feather btn btn-secondary"><i class="fas fa-feather-alt"></i> Brouillon</a>
                              <?php endif; ?>

                              <a href="index.php?action=edit&amp;id= <?=$listArticle['id'] ?>" class="pencil btn btn-secondary"><i
                                        class="fas fa-pencil-alt"></i> Modifier </i></a>

                              <a href="index.php?action=deleteArticle&amp;id=<?= $listArticle['id'] ?>"
                                   class="times btn btn-secondary"><i class="fas fa-times"></i> Supprimer</a>
                         </td>
                    </tr>
                    <?php endforeach; ?>
               </tbody>

          </table>
          <div class="pagination">
          <nav>
               <ul class="pagination">
                    <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                    <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                         <a href="index.php?action=articleManagement&page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                    </li>
                    <?php for($page = 1; $page <= $pages; $page++): ?>
                    <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                    <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                         <a href="index.php?action=articleManagement&page=<?= $page ?>" class="page-link"><?= $page ?></a>
                    </li>
                    <?php endfor ?>
                    <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                    <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                         <a href="index.php?action=articleManagement&page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                    </li>
               </ul>
          </nav>
     </div>
     </div>
          
</div>

<?php $content = ob_get_clean(); ?>
<?php include 'View/gabarit.php'; ?>