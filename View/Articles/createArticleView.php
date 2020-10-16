<?php $title = "Ajouter un Articles" ?>
<?php ob_start(); ?>
<h1>Ajout d'un nouvel article</h1>

<div class="part-addArticle">
     <div class="form">
          
          <form action="" method="POST">
               <div class="title">
                    <label for="title"><span>Titre de l'article</span> <input type="text" name="title"
                              id="title"></label>
               </div>
               <div class="where">
                    <div class="continent">
                         <label for="continent"> <span>Continent</span> <input type="text" name="continent"
                                   id="continent"></label>
                    </div>


                    <div class="country">
                         <label for="country"><span> Pays</span> <input type="text" name="country" id="country"></label>

                    </div>

                    <div class="regions">
                         <label for="regions"> <span>Regions</span> <input type="text" name="regions"
                                   id="regions"></label>

                    </div>

                    <div class="city">
                         <label for="city"><span>Ville</span> <input type="text" name="city" id="city"></label>
                    </div>
               </div>
               <div class="content">
                    <textarea name="content" id="default" cols="30" rows="15"></textarea>
               </div>
               <button type="submit" class="submit" name="submit">Ajouter un article </button>
          </form>
     </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php include 'View/gabarit.php'; ?>
















