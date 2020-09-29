<?php $title = "Connexion" ?>
<?php ob_start(); ?>

<div class="part-register">
    <div class="nav-header"></div>

    <div class="signUp">
        <h1>Connexion</h1>
        <a href="index.php?action=signUp"> Pas de compte ? Inscrivez vous</a>

        <div class="form-register">
            <form action="" method="POST">
                <div class="form">
                    <label for="email">Votre adresse e-mail : </label>
                    <input type="email" class="form-control" name="email" id="email" value="<?= $email ?>"> <br>
                    <label for="pswd">Votre mot de passe : </label>
                    <input type="password" class="form-control" name="pswd" id="pswd" value="<?= $pswd ?>"> <br>
                </div>
                <button type="submit" name="connect">Se connecter</button>
            </form>
        </div>
        <?php include 'View/Page/errorMsg.php'; ?>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php include 'View/template.php'; ?>