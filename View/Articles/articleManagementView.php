<?php $title = "Gestion des articles " ?>
<?php ob_start(); ?>
<h1 class="article-management">Gestion des articles </h1>
<div class="table">
     <table>
          <thead>
               <tr>
                    <th class="" width=110>titre du chapitre </th>
                    <th class=""> Contenue de l'article </th>
                    <th class="" width=110>Date de publication</th>
                    <th>Publier ? </th>
                    <th class="" width=350> Action </th>
               </tr>
          </thead>
          <tbody>
               <?php foreach ($articles as $listArticle) : ?>
               <tr class="t-content">
                    <td class="t-body"><?= $listArticle['title'] ?></td>
                    <td class="t-justify"><?= nl2br(substr($listArticle['content'], 0, 350)) ?> </td>
                    <td class="t-body"><?= date_format(date_create($listArticle['created_at']), 'd/m/Y') ?></td>
                    <td class="t-body">
                         <?php if ($listArticle['is_published'] == 0): ?>
                              <p>V</p>
                         <?php else: ?>
                              <p>X</p>
                         <?php endif; ?>
                    </td>
                    <td class="t-action">
                         <?php if ($listArticle['is_published'] == 0): ?>
                         <a href="index.php?action=publishedArticle&amp;id=<?= $listArticle['id'] ?>">Publier
                              l'article</a>
                         <?php else: ?>
                         <a href="index.php?action=draftArticle&amp;id=<?= $listArticle['id'] ?>">Brouillon</a>
                         <?php endif; ?>


                         <a href="index.php?action=edit&amp;id= <?=$listArticle['id'] ?>" class="pencil"><i
                                   class="fas fa-pencil-alt"></i></span> Modifier </i></a>

                         <a href="index.php?action=deleteArticle&amp;id=<?= $listArticle['id'] ?>"
                              class="times"><span><i class="fas fa-times"></i> Supprimer</a>
                    </td>
               </tr>
               <?php endforeach; ?>
          </tbody>

     </table>
</div>
<?php $content = ob_get_clean(); ?>
<?php include 'View/gabarit.php'; ?>