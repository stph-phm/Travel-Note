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
     </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php include 'View/gabarit.php'; ?>