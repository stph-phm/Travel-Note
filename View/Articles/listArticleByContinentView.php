<?php $title = "Ajouter un Articles" ?>
<?php ob_start(); ?>
<div class="nav-header"></div>
<div class="part-article-continent">
    <h1>Liste des continents visité</h1>

    <div class="list-continent">
        <div class="show-list-continent"><!--WRAPPER-->
            <?php foreach ($listContinent as $showContinent): ?>
            <div class="card-continent"><!--card-->
                <img src="Assets\Images\3.jpg" alt="" srcset="">
                <div class="info">
                    <h1> <?= htmlspecialchars($showContinent['continent'])  ?></h1>
                    <a href="index.php?action=listCountry&amp;countries=<?= $showContinent['continent'] ?>" class="btn-continent">Les pays visités</a>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>



<?php $content = ob_get_clean(); ?>
<?php include 'View/template.php'; ?>