<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- stylesheet -->
    <link rel="stylesheet" href="Assets/CSS/style.css">
    <link rel="stylesheet" href="Assets/CSS/menu.css">
    <link rel="stylesheet" href="Assets/CSS/footer.css">
    <link rel="stylesheet" href="Assets/CSS/errorBlock.css">


    <!-- bootsrap  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- fontawasome -->
    <script src="https://kit.fontawesome.com/effe484f35.js" crossorigin="anonymous"></script>

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <title>Travel Note </title>
</head>

<body>
    <div class="wrapper">
        <?php include 'Includes/nav.php'; ?>

        <main>
            <?php include 'View/Page/flashMsg.php'; ?>

            <?= $content ?>

            <?php include 'View/Page/errorMsg.php'; ?>

        </main>


        <?php include 'Includes/footer.php' ?>
    </div>


    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!-- bootstrap js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>

    <!-- javascript -->

    <script src="Assets/JS/ValidateEmail.js"></script>
    <script src="Assets/JS/linkDelete.js"></script>
    <script src="Assets/JS/comment.js"></script>
    <script src="Assets/JS/menu.js"></script>
    <script src="Assets/JS/slider.js"></script>
    <script src="Assets/JS/main.js"></script>
</body>

</html>