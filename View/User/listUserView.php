<?php $title = "Gestion des utilisateur" ?>
<?php ob_start(); ?>

<div class="part-manage-user">
     <h1>Gestion des utilisteurs</h1>
     <table class="table">
          <thead class="thead-dark">
               <tr>
                    <th>Pseudo</th>
                    <th>Date de création </th>
                    <th>Action</th>
               </tr>
          </thead>
          <tbody>
               <?php foreach($listUsers as $user): ?>

               <tr>
                    <td><?= htmlspecialchars( $user['username']) ?></td>
                    <td><?= date_format(date_create($user['user_at']), 'd/m/Y') ?></td>
                    <td class="t-user">
                         <a href="index.php?action=displayUser&amp;id=<?= $user['id'] ?>" class="user-eye btn btn-secondary"><i class="fas fa-eye"></i>
                              Voir  le profil</a>

                         <?php if($user['is_blocked'] == 0): ?>
                         <a href="index.php?action=blockedUser&amp;id=<?= $user['id'] ?>" class="user-lock btn btn-secondary">
                         <i class="fas fa-user-lock"></i>Bloquer l'utilisteur</a>
                         <?php else: ?>

                         <a href="index.php?action=unblockedUser&amp;id=<?= $user['id'] ?>" class="user-check btn btn-secondary"><i
                                   class="fas fa-user-check"></i>Débloquer l'utilisateur</a>
                         <?php endif; ?>
                    </td>
               </tr>
               <?php endforeach; ?>
          </tbody>
     </table>
</div>


<?php $content = ob_get_clean(); ?>
<?php include 'View/gabarit.php'; ?>