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
     <link rel="stylesheet" href="Assets/CSS/msgError.css">


     <!-- fontawasome -->
     <script src="https://kit.fontawesome.com/effe484f35.js" crossorigin="anonymous"></script>

     <!-- google font -->
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dosis">

     <!-- bootsrap -->
     <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

     <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
     <title>Travel Note </title>
</head>

<body>
     <div class="wrapper">
          <?php include 'Includes/nav.php'; ?>

          <main>
               <?= $content ?>
               
          </main>


          <?php include 'Includes/footer.php' ?>
     </div>


     <!-- Jquery -->
     <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

     <!-- bootstrap js -->
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

     <!-- javascript -->
     <script src="Assets/JS/comment.js"></script>
     <script src="Assets/JS/menu.js"></script>
     <script src="Assets/JS/slider.js"></script>
     <script src="Assets/JS/main.js"></script>
</body>

</html>