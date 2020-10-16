<?php $title = htmlspecialchars($article['title'])?>
<?php ob_start(); ?>
<article>
     <div class="part-article">
          <div class="article-header">
               <div class="img">
                    <div class="article-title">
                         <h2>
                              <?= htmlspecialchars($article['title']) ?>
                         </h2>
                         <p class="article-subTitle">
                              <span><i class="fas fa-calendar-alt"> &nbsp; </i>
                                   <?= date_format(date_create($article['published_at']), 'd/m/Y') ?> |
                                   &nbsp;</span>
                              <span><?= htmlspecialchars($article['city']) ?> - <?= htmlspecialchars($article['country']) ?>  </span>
                         </p>
                    </div>
               </div>

               <div class="article-content">
                    <p> <?= nl2br($article['content']) ?> </p>
               </div>
          </div>
     </div>
          <!-- -----------------------COMMENTS----------------------- -->
     <?php if ($this->isLogin) {
          if ($userById['is_blocked'] == 0) { ?>
     <div class="form-comment">
               <div class="form-group">
                    <label for="comment">Commentaire</label>
                    <textarea id="comment" class="form-control" rows="3" name="comment"></textarea>
               </div>
               <button id="sendComment" class="btn btn-primary mb-4" data-id="<?= $article['id']?>" > Commentez </button>

     </div>
     <?php } else { ?>
     <p>Votre compte est bloquer par l'administrateur (trop de vos commentaires sont signaler) </p>
     
     <?php } ?>

     <?php } else { ?>
     <div class="msg-display-article">
          <h2> <a href="index.php?action=signIn">Pour commenter veuillez vous connectez</a></h2>
     </div>
     <?php } ?>


     <div class="part-comments">
          <h3>Réponse</h3>

          <div class="comments" id="listComments">
               <?php foreach ($listComments as $showComments): ?>
               <?php include 'View/Comments/displayCommentsView.php' ?>
               <?php endforeach; ?>
          </div>
     </div>
</article>

<?php $content = ob_get_clean(); ?>
<?php include 'View/template.php'; ?>