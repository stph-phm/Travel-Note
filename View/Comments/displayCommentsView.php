<?php if ($showComments['is_reported'] == 0): ?>
<div class="show-comments">
      <div class="comment-header">
            <p class="username"><?= $showComments['username'] ?> <span>dit : </span> </p>
            <div>
                  <p><?= date_format(date_create($showComments['comment_at']), 'd/m/Y')  ?> </p>
                  <a href="index.php?action=reportComment&amp;id=<?= $showComments['id'] ?>" class="linkDelete"><i class="fas fa-flag"></i></a>
            </div>

      </div>

      <div class="comment-content">
            <p><?= $showComments['comment']?></p>
      </div>
</div>

<?php else: ?>
<div class="show-comments report-comment">
      <p>Le commentaire est signalé</p>
      <a href="index.php?action=deleteComm&amp;id=<?= $showComments['id'] ?>"><i class="fas fa-minus-circle" class="delete-link"></i></a>
</div>
<?php endif; ?>