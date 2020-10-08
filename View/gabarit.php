<!DOCTYPE html>
<html lang="fr">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">

     <!-- stylesheet -->

     <link rel="stylesheet" href="Assets/CSS/dashboardAdmin.css">
     <link rel="stylesheet" href="Assets/CSS/errorBlock.css">
     <link rel="stylesheet" href="Assets/CSS/msgError.css">
     <link rel="stylesheet" href="Assets/CSS/contentAdmin.css">

     <!-- Bootstrap -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

     <!-- fontawasome -->
     <script src="https://kit.fontawesome.com/effe484f35.js" crossorigin="anonymous"></script>

     <!-- google font -->
     <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">

     <!-- TINIMCE -->
     <script src="https://cdn.tiny.cloud/1/zxws6oho4y58ubsdfptbp4gb3420xahucxayj6amm3ptdqxt/tinymce/5/tinymce.min.js"
          referrerpolicy="origin"></script>


     <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
     <title>Travel Note </title>
</head>

<body>
     <input type="checkbox" id="check">

     <header class="header-admin">
          <div class="left_area">

               <h3><a href="index.php">Travel Note</a> </h3>
          </div>
          <label for="check">
               <i class="fas fa-bars" id="sidebar_btn"></i>
          </label>
          <div class="home">
               <a href="index.php"><i class="fas fa-desktop"></i>&nbsp; <span>Page d'accueil</span></a>
          </div>
          <div class="right_area">
               <a href="index.php?action=logout" class="logout-btn"><i class="fas fa-user-alt-slash"></i></a>
          </div>
     </header>

     <div class="sidebar">
          <center>
               <div class="profile_img"></div>
               <h4>Stephanie</h4>
          </center>
          <a href="index.php?action=createArticle"><i class="fas fa-plus"></i>&nbsp; <span>Ajouter un article</span>
          </a>
          <a href="index.php?action=articleManagement"><i class="fas fa-tasks"></i>&nbsp; <span>Gestions des articles
               </span></a>
          <a href="index.php?action=dashboard"><i class="fas fa-comment-alt"></i>&nbsp; <span>Gestion des commentaires
                    signalés</span></a>
          <a href="index.php?action=managementUsers"><i class="fas fa-users-cog"></i>&nbsp; <span> Gestion des
                    utilisateurs</span></a>
     </div>

     <div class="content-sidebar">
          <?= $content ?>
     </div>


     <!-- Jquery -->
     <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

     <!-- bootstrap js -->
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

     <!-- javascript -->
     <script src="Assets/JS/app.js"></script>
     <script src="Assets/JS/form.js"></script>
     <script src="Assets/JS/comment.js"></script>
     <script src="Assets/JS/menu.js"></script>
     <script src="Assets/JS/slider.js"></script>
     <script src="Assets/JS/main.js"></script>
</body>

</html>