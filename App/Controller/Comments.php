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
            $comment = $this->trim_secur(json_decode(file_get_contents("php://input"))->comment);
            $sessionId = $this->trim_secur($_SESSION['userId']);

            $articlesManager = new ArticlesManager();
            $article = $articlesManager->getArticleById($article_id);

            if (!$article){
                throw new \Exception('Aucun identifiant de billet envoyé');
            } else {
                if (!empty($comment)) {
                    $commentsManager = new CommentsManager();
                    $id =  $commentsManager->addComment($comment, $article_id, $sessionId);

                    $showComments = $commentsManager->getCommentById($id);
                    var_dump($id);
                    include 'View/Comments/displayCommentsView.php';
                    } else {
                    $errorMsg = "Veuillez remplir tous les champs !";
                }
            }
        }
    }

    public function listReportComments()
    {
        if (!$this->isAdmin) {
            header('Location: index.php');
        }

        $commentsManager = new CommentsManager;
        $reportedComments = $commentsManager->listReportedCom();
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
        if (!$this->isAdmin) {
            header('Location: index.php');
        }

        if(isset($_GET['id']) && $_GET['id'] > 0) {
            $comment_id = $this->trim_secur($_GET['id']);
            $commentsManager = new CommentsManager;
            $commentById = $commentsManager->getCommentById($comment_id);

            if (!$commentById) {
                throw new \Exception("Aucun identifiant de billet envoyé");
            } else {
                $commentsManager->validateComReported($comment_id);

                header('Location: index.php?action=dashboard');
            }

        }else {
            throw new \Exception("Aucun identifiant de billet envoyé");
        }
    }

    public function deleteReportCom()
    {
        if (!$this->isAdmin) {
            \header('Location: index.php');
        }

        if(isset($_GET['id']) && $_GET['id'] > 0) {
            $comment_id = $this->trim_secur($_GET['id']);
            $commentsManager = new CommentsManager;
            $commentById = $commentsManager->getCommentById($comment_id);

            if (!$commentById) {
                throw new \Exception("Aucun identifiant de billet envoyé");
            } else {
                $commentsManager->deleteComment($comment_id);

                header('Location: index.php?action=dashboard');
            }
        }else {
            throw new \Exception("Aucun identifiant de billet envoyé");
        }
    }

}