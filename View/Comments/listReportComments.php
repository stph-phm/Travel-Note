<?php $title = "Ajouter un Articles" ?>
<?php ob_start(); ?>
<div class="part-dashboard">
     <div class="dashboard-header">
          <div class="">
               <h1>Les commentaires signalés</h1>
          </div>
     </div>
     <div class="dashboard-body">
          <table>
               <thead>
                    <th>#</th>
                    <th>Pseudo</th>
                    <th>Contenue du commentaire </th>
                    <th width="300">Action</th>
               </thead>
               <tbody>
                    <?php foreach ($reportedComments as $commetsReport): ?>
                    <tr>
                         <td><?= $i++ ?></td>
                         <td><?= htmlspecialchars($commetsReport['pseudo']) ?></td>
                         <td><?= nl2br(htmlspecialchars($commetsReport['comment'])) ?></td>
                         <td>
                              <a href="index.php?action=validateReport&amp;id=<?= $commetsReport['id'] ?>">Valider <i class="fas fa-check"></i></a>

                              <a href="index.php?action=deleteCommentReport&amp;id=<?= $commetsReport['id'] ?> ">Supprimer <i class="fas fa-times"></i></a>
                         </td>

                    </tr>
                    <?php endforeach; ?>
               </tbody>
          </table>
     </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include 'View/gabarit.php'; ?>
