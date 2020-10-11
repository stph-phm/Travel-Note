<?php 
namespace App\Controller;

use App\Model\ArticlesManager;
use App\Model\CommentsManager;
use App\Model\UsersManager;
use App\Session\FlashSession;

class Articles extends Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function  homepage()
    {
        if (isset($_GET['page']) && $_GET['page'] > 0) {
            $currentPage = intval(trim($_GET['page']));
        } else {
            $currentPage = 1;
        }

        $articlesManager = new ArticlesManager;
        $resultArticle = $articlesManager->totalArticle();
        $nbArticles = intval($resultArticle['totalArticle']);

        $perPage = 1;
        $pages = ceil($nbArticles / $perPage);
        $fistPage = ($currentPage * $perPage) - $perPage;
        $articles = $articlesManager->listArticlesPublished($fistPage, $perPage);

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
                
                $usersManager = new UsersManager;
                $userById = $usersManager->getUserById($this->userInfo['id']);
                
            }
        }
        include 'View/Articles/displayArticleView.php';
    }

    public function listAllArticles() {
        if (isset($_GET['page']) && $_GET['page'] > 0) {
            $currentPage = intval(trim($_GET['page']));
        } else {
            $currentPage = 1;
        }

        $articlesManager = new ArticlesManager;
        $resultArticle = $articlesManager->totalArticle();
        $nbArticles = intval($resultArticle['totalArticle']);
        $perPage = 5;
        $pages = ceil($nbArticles / $perPage);
        $fistPage = ($currentPage * $perPage) - $perPage;

        $articles = $articlesManager->listArticlesPublished($fistPage, $perPage);

        include 'View/Articles/listsArticlesView.php';
    }



    public function addArticle()
    {
        if (!$this->isAdmin) {
            \header('Location: index.php');
        }

        $article_title = "";
        $content = "";
        $continent = "";
        $country = "";
        $regions = "";
        $city ="";

        if (isset($_POST['submit'])) {
            $article_title = $this->str_secur($_POST['title']);
            $content = $this->str_secur($_POST['content']);
            $continent = $this->str_secur($_POST['continent']);
            $country = $this->str_secur($_POST['country']);
            $regions = $this->str_secur($_POST['regions']);
            $city =$this->str_secur($_POST['city']);

            if (!empty($article_title) && !empty($content)  && !empty($continent)
                && !empty($country)  && !empty($regions)  && !empty($city) ) {

               $articlesManager = new ArticlesManager();
               $articlesManager->addArticle($article_title, $content,$continent, $country, $regions, $city);

               $flashSession = new FlashSession();
               $flashSession->addFlash('success',"Votre article est ajouté");
               header('Location: index.php?action=articleManagement');
            } else {
                $errorMsg = "Veuillez remplir tous les champs !";
            }
        }
        
        include 'View/Articles/createArticleView.php';
    }

    public function articleManagement()
    {
        if(!$this->isAdmin) {
            \header('Location: index.php');
        } 

    if (isset($_GET['page']) && $_GET['page'] > 0) {
        $currentPage = intval(trim($_GET['page']));
    } else {
        $currentPage = 1;
    }

        $articlesManager = new ArticlesManager;
        $resultArticle = $articlesManager->totalArticle();
        $nbArticles = intval($resultArticle['totalArticle']);
        $perPage = 5;
        $pages = ceil($nbArticles / $perPage);
        $firstPage = ($currentPage * $perPage) - $perPage;

        $articles = $articlesManager->listArticles($firstPage, $perPage);

        include 'View/Articles/articleManagementView.php';
    }

    public function editArticle()
    {
        if(!$this->isAdmin) {
            \header('Location: index.php');
        }

        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $article_id = $this->trim_secur($_GET['id']);

            $articlesManager = new ArticlesManager;
            $article = $articlesManager->getArticleById($article_id);

            if (!$article) {
                throw new \Exception('Aucun identifiant de billet envoyé');
            } else {
                $article_title = $article['title'];
                $content = $article['content'];
                $continent = $article['continent'];
                $country = $article['country'];
                $region = $article['region'];
                $city = $article['city'];

                if (isset($_POST['submit'])) {
                    $article_title = $this->str_secur($_POST['title']);
                    $content = $this->trim_secur($this->nl2br_secur($_POST['content']));
                    $continent = $this->str_secur($_POST['continent']);
                    $country= $this->str_secur($_POST['country']);
                    $region= $this->str_secur($_POST['region']);
                    $city= $this->str_secur($_POST['city']);

                    if (!empty($article_title)  && !empty($content)) {
                        $articlesManager = new ArticlesManager;
                        $articlesManager->editArticle($article_id, $article_title, $content, $continent, $country,
                        $region, $city);

                        $flashSession = new FlashSession();
                        $flashSession->addFlash('info', 'Votre article est bien modifier');

                        header('Location: index.php?action=articleManagement');
                    } else {
                        $errorMsg = 'Erreur Veuillez réessayer !';
                    }
                }
            }
        } else {
            throw new \Exception('Aucun identifiant de billet envoyé');
        }
        include 'View/Articles/editArticleView.php';
    }

    public function deleteArticle()
    {
        if (!$this->isAdmin) {
            header('Location: index.php');
        }

        if (isset($_GET['id']) && $_GET['id'] > 0 ) {
            $article_id = $this->trim_secur($_GET['id']);

            $articlesManager = new ArticlesManager;
            $articleById = $articlesManager->getArticleById($article_id);

            if (!$articleById) {
                throw new \Exception("Aucun identifiant de billet envoyé");
            } else {
                $articlesManager->deleteArticle($article_id);
                $flashSession = new FlashSession();
                $flashSession->addFlash('warning', "L'article est bien supprimer");

                header('Location: index.php?action=articleManagement');
            }
        } else {
            throw new \Exception("Aucun identifiant de billet envoyé");
        }
    }

    public function publishedArticle()
    {
        if (!$this->isAdmin) {
            header('Location: index.php');
        }

        if(isset($_GET['id']) && $_GET['id'] > 0 ) {
            $article_id = $this->trim_secur($_GET['id']);
            $articlesManager = new ArticlesManager;
            $articleById = $articlesManager->getArticleById($article_id);

            if (!$articleById) {
                throw new \Exception("Aucun identifiant de billet envoyé");
            } else {
                $articlesManager->publishedArticle($article_id
                );

                $flashSession = new FlashSession();
                $flashSession->addFlash('info', "Votre article est bien publié");

                header('Location: index.php?action=articleManagement');
            }

        } else {
            throw new \Exception("Aucun identifiant de billet envoyé");
        }
    }

    public function draftArticle()
    {
        if (!$this->isAdmin) {
            header('Location: index.php');
        } 

        if(isset($_GET['id']) && $_GET['id'] > 0 ) {
            $article_id = $this->trim_secur($_GET['id']);
            $articlesManager = new ArticlesManager;
            $articleById = $articlesManager->getArticleById($article_id);

            if (!$articleById) {
                throw new \Exception("Aucun identifiant de billet envoyé");
            } else {
                $articlesManager->draftArticle($article_id
                );
                $flashSession = new FlashSession;
                $flashSession->addFlash("info", "Votre article n'est pas publier il est brouillon");

                header('Location: index.php?action=articleManagement');
            }

        } else {
            throw new \Exception("Aucun identifiant de billet envoyé");
        }
    }

}