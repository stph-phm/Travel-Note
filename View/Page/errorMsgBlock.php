<?php $title = "Erreur 404" ?>

<?php ob_start(); ?>
<main>
    <div class="nav-section"></div>
    <div class="alert">
        <p class="text-center">Erreur 404 : <?= $errorMsgBlock  ?></p>
    </div>
</main>

<?php $content = ob_get_clean(); ?>
<?php include 'view/template.php'; ?>