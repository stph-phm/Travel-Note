<p>
      <?= $showComments['username'] ?>
      <?= date_format(date_create($showComments['comment_at']), 'd/m/Y'); ?>
 </p>

 <p><?= $showComments['comment']?></p>