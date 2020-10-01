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
          <header class="template">
               <nav class="nav-visitor">
                    <div class="logo">
                         <a href="index.php">Travel Note</a>
                    </div>
                    <label for="btn" class="icon">
                         <span class="fas fa-bars"></span>
                    </label>
                    <input type="checkbox" id="btn">
                    <ul>
                         <li><a href="index.php">Home</a></li>
                         <li><a href="#">Continent visité</a></li>
                         <li><a href="#">Contact</a></li>
                         <li>
                              <?php if ($this->isLogin) { ?>
                              <label for="btn-1" class="show">Users + </label>
                              <?php } ?>

                              <a href="index.php?action=signIn">
                                   <div class="i fas fa-user"></div>
                              </a>
                              <input type="checkbox" id="btn-1">
                              <ul>
                              <?php if ($this->isLogin): ?>
                                   <li><a href="index.php?action=profil">Profile</a></li>
                              <?php endif;?>

                              <?php if($this->isAdmin): ?>
                                   <li><a href="index.php?action=dashboard">Dashboard</a></li>
                              <?php endif; ?>

                              <?php if ($this->isLogin): ?>
                                   <li><a href="index.php?action=logout"><i class="fas fa-user-alt-slash"></i></a></li>
                              <?php endif; ?>
                              </ul>
                         </li>
                    </ul>
               </nav>
          </header>
          <?= $content ?>

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