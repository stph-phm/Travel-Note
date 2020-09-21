<?php 
namespace App\Controller;

use App\Model\ArticlesManager;
use App\Model\CommentsManager;


class Articles extends Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function homepage()
     {
          $articlesManager = new ArticlesManager;
          $articles = $articlesManager->listsArticles();

          include 'View/Articles/homepageView.php';
     }

     public function displayArticle()
     {
          if (isset($_GET['id']) && $_GET['id'] > 0) {
               $article_id = $this->trim_secur($_GET['id']);

               $articlesManager = new ArticlesManager();
               $article = $articlesManager->getArticleById($article_id);

               if (!$article) {
                   throw new \Exception('Aucun identifiant de billet envoyé');
               } else {
                   $commentManager = new CommentsManager();
                   $listComments = $commentManager->listComments($article_id);
               }
          }
          include 'View/Articles/displayArticleView.php';
     }

     public function listArticleByContinent()
     {
         include 'View/Articles/listArticleByContinentView.php';
     }

    public function listArticleByCountry()
    {
        include 'View/Articles/listArticleByCountryView.php';
    }

     public function addArticle()
     {
         include 'View/Articles/addArticleView.php';
     }

     public function articleManagement()
     {
         include 'View/Articles/articleManagementView.php';
     }

     public function editArticle()
     {
         include 'View/Articles/editArticleView.php';
     }

     public function deleteArticle()
     {

     }


}