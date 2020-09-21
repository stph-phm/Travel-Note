<?php $title = "" ?>
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
                              <span>category</span>
                         </p>
                    </div>
               </div>

               <div class="article-content">
                    <p> <?= nl2br($article['content']) ?> </p>
               </div>
          </div>
     </div>
     <div class="part-comments">
          <h3>Réponse (Nbre de commentaire)</h3>

          <div class="comments">
               <?php foreach ($listComments as $comments): ?>
               <p>
                    <?= $comments['username'] ?>
                    <?= date_format(date_create($comments['comment_at']), 'd/m/Y'); ?>
               </p>

               <p><?= $comments['comment']?></p>
               <?php endforeach; ?>

          </div>
     </div>
</article> <?php $content = ob_get_clean(); ?> <?php include 'View/template.php'; ?>