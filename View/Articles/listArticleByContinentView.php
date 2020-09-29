<?php $title = "Ajouter un Articles" ?>
<?php ob_start(); ?>

<div class="article-continent">
    <div>
        <div class="nav-header"></div>

        <div class="part-continent">
            <?php foreach($continentAmerique as $articleAmerique): ?>
            <div class="continent">
                <div class="img-content"></div>
                <p> <a href="index.php?action=country&<?= $articleAmerique['id'] ?>"><?= $articleAmerique['continent'] ?></a></p>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php include 'View/template.php'; ?>