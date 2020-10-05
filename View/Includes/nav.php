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
               <li><a href="index.php?action=listContinent">Continent visité</a></li>
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