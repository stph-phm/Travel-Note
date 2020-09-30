<?php $title = "Fiche d'utilisateur" ?>
<?php ob_start(); ?>

<h1>Fiche d'utilisateur de <?= $userById['username'] ?></h1>

<div class="body">

     <div class="creation">
          <h4>Date de création : </h4>
          <p><?= date_format(date_create($userById['user_at']), 'd/m/Y') ?></p>
     </div>

     <div class="mail-">
          <h4>Adresse mail :</h4>
          <p><?= $userById['email_user'] ?></p>
     </div>

     <div class="blocked-or-not">
          <h4>L'utilisateur est bloquer ? </h4>

          <?php if ($userById['is_blocked'] == 0): ?>
          <p class="not">L'utilisteur n'est pas bloquer</p>
          <?php else: ?>
          <p class="blocked">L'utilisateur est bien bloquer</p>
          <?php endif; ?>
     </div>

</div>

<?php $content = ob_get_clean(); ?>
<?php include 'View/gabarit.php'; ?>