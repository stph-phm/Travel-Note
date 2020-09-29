<?php


namespace App\Controller;


use App\Model\ArticlesManager;
use App\Model\CommentsManager;

class Comments extends Controller
{
    public function addComment()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0 ) {
            $article_id = $this->trim_secur($_GET['id']);
            $comment = $this->trim_secur($_POST['comment']);
            $sessionId = $this->trim_secur($_SESSION['userId']);

            $articlesManager = new ArticlesManager();
            $article = $articlesManager->getArticleById($article_id);

            if (!$article){
                throw new \Exception('Aucun identifiant de billet envoyé');
            } else {
                if (!empty($comment)) {
                    $commentsManager = new CommentsManager();
                    $commentsManager->addComment($comment, $article_id, $sessionId);
                } else {
                    $errorMsg = "Veuillez remplir tous les champs !";
                }
            }
        }
    }

    public function listReportComments()
    {
        

        include 'View/Comments/listReportComments.php';
    }

    public function reportComment()
    {

    }

    public function deleteComment()
    {

    }

    public function validateReportComment()
    {

    }

    public function deleteReportCom()
    {

    }
       

}