<?php $title = "Ajouter un Articles" ?>
<?php ob_start(); ?>
<div class="part-dashboard">
     <div class="dashboard-header">
          <h1>Les commentaires signalés</h1>
     </div>

     <div class="dashboard-body">
          <table class="table table-striped">
               <thead class="thead-dark">
                    <tr>
                         <th>Titre de l'article </th>
                         <th>Pseudo</th>
                         <th>Contenue du commentaire </th>
                         <th>Date de commentaire</th>
                         <th>Action</th>
                    </tr>

               </thead>
               <tbody>
                    <?php foreach ($reportedComments as $commentReport): ?>
                    <tr>
                         <td class="t-content"><?= $commentReport['title'] ?></td>
                         <td class="t-content"><?= htmlspecialchars($commentReport['username']) ?></td>
                         <td class="t-content"><?= nl2br(htmlspecialchars($commentReport['comment'])) ?></td>

                         <td class="t-content"><?= date_format(date_create($commentReport['comment_at']), 'd/m/Y') ?></td>
                         <td class="t-report-comment">
                              <a href="index.php?action=validateReport&amp;id=<?= $commentReport['id'] ?>" class="check-comment btn btn-secondary">Valider <i
                                        class="fas fa-check"></i></a>

                              <a href="index.php?action=deleteCommentReport&amp;id=<?= $commentReport['id'] ?> " class="times-comment btn btn-secondary linkDelete">Supprimer
                                   <i class="fas fa-times"></i></a>
                         </td>
                    </tr>
                    <?php endforeach; ?>
               </tbody>
          </table>
          
     </div>
     <div class="pagination">
          <nav>
               <ul class="pagination">
                    
                    <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                         <a href="index.php?action=dashboard&page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                    </li>
                    <?php for($page = 1; $page <= $pages; $page++): ?>
                    
                    <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                         <a href="index.php?action=dashboard&page=<?= $page ?>" class="page-link"><?= $page ?></a>
                    </li>
                    <?php endfor ?>
                    
                    <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                         <a href="index.php?action=dashboard&page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                    </li>
               </ul>
          </nav>
     </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include 'View/gabarit.php'; ?>