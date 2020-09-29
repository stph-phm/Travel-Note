<?php $title = "Inscription" ?>
<?php ob_start(); ?>

<div class="part-register">
    <div class="nav-header"></div>
    <div class="signUp">
        <h1>Inscription</h1>
        <a href="index.php?action=signIn">Déjà un compte ? S'inscrire ici </a>

        <div class="form-register">
            <form action="" method="POST">
                <div class="form">
                    <label for="username">Votre identifiant : </label>
                    <input type="text" name="username" id="username" value="<?= $username ?>">


                    <label for="email">Votre e-mail : </label>
                    <input type="email" name="email" id="email" value="<?= $email ?>">

                    <label for="pswd">Votre mot de passe : </label>
                    <input type="password" name="pswd" id="pswd" value="<?= $pswd ?>">

                    <label for="pswd2">Confirmez votre mot de passe : </label>
                    <input type="password" name="pswd2" id="pswd2" value="<?= $pswd2 ?>">
                    <br>
                </div>
                <button type="submit" name="submit"> S'inscrire</button>
            </form>

        </div>
        <?php include 'View/Page/errorMsg.php'; ?>
    </div>

</div>
<?php $content = ob_get_clean(); ?>
<?php include 'View/template.php'; ?>