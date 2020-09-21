<?php $title = "Connexion" ?>
<?php ob_start(); ?>

<div class="part-login">
    <h1>Connexion</h1>

    <div class="form-login">
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

    <a href="index.php?action=register"> Pas de compte ? Inscrivez vous</a>

</div>

<?php $content = ob_get_clean(); ?>
<?php include 'View/template.php'; ?>