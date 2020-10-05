<div class="show-comments">
      <div class="comment-header">
            <p class="username"><?= $showComments['username'] ?> <span>dit : </span> </p>
            <p><?= date_format(date_create($showComments['comment_at']), 'd/m/Y')  ?> </p>
      </div>

      <div class="comment-content">
            <p><?= $showComments['comment']?></p>
      </div>
</div>
