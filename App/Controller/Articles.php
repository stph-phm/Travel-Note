<?php 
namespace App\Controller;

use App\Model\ArticlesManager;
use App\Model\CommentsManager;
use App\Model\UsersManager;

class Articles extends Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function homepage()
    {
        $articlesManager = new ArticlesManager;
        $articles = $articlesManager->listArticlesPublished();

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

    public function listContinent()
    {
        $articlesManager = new ArticlesManager;
        $listContinent = $articlesManager->listArticleByContinent();

        include 'View/Articles/listArticleByContinentView.php';


    }

    public function listArticleByCountry()
    {
        if (isset($_GET['countries']) && !empty($_GET['countries'])) {
            $articleByContinent = $this->trim_secur($_GET['countries']);

            $articlesManager = new ArticlesManager();
            $article = $articlesManager->listArticlesByCountry($articleByContinent);
            if ($article) {
                throw new \Exception('Aucun identifiant de billet envoyé');
            } 
        }    
        include 'View/Articles/listArticleByCountryView.php';
    }

    public function publishArticle() {
        
        if (!$this->isAdmin) {
            \header('Location: index.php');
        }

        
        $article_title = "";
        $content = "";
        $continent = "";
        $country = "";
        $regions = "";
        $city ="";
        $isCheck = "";

        if (isset($_POST['submit'])) {
            $article_title = $this->str_secur($_POST['title']);
            $content = $this->str_secur($_POST['content']);
            $continent = $this->str_secur($_POST['continent']);
            $country = $this->str_secur($_POST['country']);
            $regions = $this->str_secur($_POST['regions']);
            $city =$this->str_secur($_POST['city']);
            $isCheck = $_POST['published'];

            if (!empty($article_title && !empty($content) && !empty($continent)&& !empty($country) && !empty($regions) && !empty($city) )) {

                if ($isCheck == 1) {
                    $isCheck = 1;
                    $articlesManager = new ArticlesManager();
                    $articlesManager->addArticle($article_title, $content, $continent, $country, $regions, $city,$isCheck);
                    header('Location: index.php?action=articleManagement');
                } 
                
            } else {
                $errorMsg = "Veuillez remplir tous les champs !";
            }
        }
        include 'View/Articles/createArticleView.php';
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
            $published = $_POST['published'];

            if (!empty($article_title && !empty($content) && !empty($continent)&& !empty($country) && !empty($regions) && !empty($city) )) {

                if ($published == true) {
                    $published = 1;
                    $articlesManager = new ArticlesManager();
                    $articlesManager->addArticle($article_title, $content, $continent, $country, $regions, $city,$published);
                    header('Location: index.php?action=articleManagement');
                } else {
                    $published = 0;
                    $articlesManager = new ArticlesManager();
                    $articlesManager->addArticle($article_title, $content, $continent, $country, $regions, $city,$published);
                    header('Location: index.php?action=articleManagement');
                } 
                
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


            $articlesManager = new ArticlesManager;
            $articles = $articlesManager->listArticles();

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
                        $articlesManager->editArticle($article_id, $article_title, $content, $continent, $country, $region, $city);

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
                header('Location: index.php?action=articleManagement');
            }

        } else {
            throw new \Exception("Aucun identifiant de billet envoyé");
        }
    }




}