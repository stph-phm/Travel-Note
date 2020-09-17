<?php 
namespace App\Controller;

use App\Model\ArticlesManager;






class Articles {

     public function homepage()
     {
          $articlesManager = new ArticlesManager;
          $articles = $articlesManager->home();

          include 'View/homepageView.php';
     }
}