<?php $title = "Modifier le chapitre :" ;  ?>
<?php ob_start(); ?>

<h1>Modifier un chapitre </h1>
<div class="form">
     <form action="index.php?action=edit&amp;id= <?= $article['id'] ?>" method="post">
          <div class="form-header">
               <label for="title">Titre du chapitre</label>
               <input type="text" id="title" name="title" value="<?= $article['title'] ?>">
          </div>
          <div class="form-country">
               <div>
                    <label for="continent">Continent</label>
                    <input type="text" name="continent" id="continent" value="<?= $article['continent'] ?>">
               </div>

               <div>
                    <label for="country">Pays</label>
                    <input type="text" name="country" id="country" value="<?= $article['country'] ?>">
               </div>

               <div>
                    <label for="region">Region</label>
                    <input type="text" name="region" id="region" value="<?= $article['region'] ?>">
               </div>

               <div>
                    <label for="city">Ville</label>
                    <input type="text" name="city" id="city" value="<?= $article['city'] ?>">
               </div>
          </div>

          <div class="form-content ">
               <label for="content">Contenu du chapitre </label>

               <textarea name="content" id="default" class="form-control"
                    rows="15"><?= $article['content'] ?> </textarea>
          </div>
          <button class="btn" type="submit" name="submit">Modifier</button>
     </form>
</div>

<?php $content = ob_get_clean(); ?>
<?php include 'View/gabarit.php'; ?>