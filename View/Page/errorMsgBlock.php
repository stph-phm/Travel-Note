<?php $title = "Erreur 404" ?>

<?php ob_start(); ?>
<div class="msgError">

<div class="nav-header"></div>
<div class="alert alert-danger">
    <p class="text-center">Erreur 404 : <?= $errorMsgBlock  ?></p>
</div>
</div>



<?php $content = ob_get_clean(); ?>
<?php include 'view/template.php'; ?>