<?php $title = "Profil" ?>
<?php ob_start(); ?>


<div class="nav-header"></div>
<div class="part-profil">
     <h1>Bienvenue/Bonjour <?= $this->userInfo['username'] ?></h1>

     <div class="profil-user-body">
          <p> <span> Adresse mail : </span><?= $this->userInfo['email_user'] ?> </p>

          <p> <span>Date de création : </span> <?= date_format(date_create($this->userInfo['user_at']), 'd/m/Y') ?></p>

          <?php if ($this->userInfo['is_blocked'] == 0 ): ?>
          <p class="isnot-blocked ">Votre compte n'est pas bloquer</p>
          <?php else: ?>
          <p class="is-blocked">Votre compte est bloquer car : </p>
          <ul>
               <li class="is-blocked>Beaucoup de vos commentaires sont signalés</li>
          </ul>

          <p> Rassurez vous ! Dans quelque jours, l'administrateur va débloquer votre compte et vous pouvez de nouveau
               commenter ! </p>
          <?php endif; ?>
     </div>
</div>



<?php $content = ob_get_clean(); ?>
<?php include 'View/template.php'; ?>