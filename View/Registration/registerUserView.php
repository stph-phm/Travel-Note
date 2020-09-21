<?php $title = "Inscription" ?>
<?php ob_start(); ?>

<div class="part-register">
    <h1>Inscription</h1>
    <div class="form-register">
        <form action="" method="POST">
            <div class="form">
                <label for="username">Votre identifiant : </label>
                <input type="text" class="form-control mb-2" name="username" id="username" value="<?= $username ?>">

                <label for="nom">Votre Nom : </label>
                <input type="text" name="first_name" id="first_name" value="<?= $first_name ?>">

                <label for="prénom">Votre prénom : </label>
                <input type="text"  name="last_name" id="last_name" value="<?= $last_name ?>">

                <label for="email">Votre e-mail : </label>
                <input type="email"  name="email" id="email" value="<?= $email ?>">

                <label for="pswd">Votre mot de passe : </label>
                <input type="password"  name="pswd" id="pswd" value="<?= $pswd ?>">

                <label for="pswd2">Confirmez votre mot de passe : </label>
                <input type="password" class="form-control  mb-2" name="pswd2" id="pswd2" value="<?= $pswd2 ?>"> <br>
            </div>
            <button type="submit"  name="register"> S'inscrire</button>
        </form>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include 'View/template.php'; ?>