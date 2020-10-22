<?php


namespace App\Controller;


use App\Model\ArticlesManager;
use App\Model\CommentsManager;
use App\Session\FlashSession;

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

        if (isset($_GET['page']) && $_GET['page'] > 0) {
            $currentPage = intval($_GET['page']);
            
        } else {
            $currentPage = 1;
        }
            $commentsManager = new CommentsManager();
            $resultComments = $commentsManager->totalComments();
            $nbArticles = intval($resultComments['totalComments']);
            $perPages = 5;
            $pages = ceil($nbArticles / $perPages);
            $firstPage = ($currentPage * $perPages) - $perPages;

        $commentsManager = new CommentsManager;
        $reportedComments = $commentsManager->listReportedCom($firstPage, $perPages);
        include 'View/Comments/listReportComments.php';
    }

    public function reportComment()
    {
        if (isset($_GET['id']) && $_GET['id'] >0 ) {
            $comment_id = $this->trim_secur($_GET['id']);
            $commentsManager = new CommentsManager;
            $commentById = $commentsManager->getCommentById($comment_id);

            if(!$commentById) {
                throw new \Exception("Aucun identifiant de billet envoyé");
            } else {
                $commentReported = $commentsManager->reportComment($comment_id);

                header('Location: index.php?action=article&id='.$commentById['article_id']);
            }
        } else {
            throw new \Exception("Aucun identifiant de billet envoyé");
        }
    }

    public function deleteComment()
    {
        if (!$this->isAdmin) {
            \header('Location: index.php');
        }

        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $comment_id = $this->trim_secur($_GET['id']);
            $commenstManager = new CommentsManager();
            $commentById = $commenstManager->getCommentById($comment_id);

            if (!$commentById) {
                throw new \Exception('Aucun identifiant de billet envoyé');
            }
            else {
                $commenstManager->deleteComment($comment_id);
                $flashSession = new FlashSession();
                $flashSession->addFlash('info', 'Commentaire est supprimé !');
                \header('Location: index.php?action=article&id='.$commentById['article_id']);
            }
        }
        else {
            throw new \Exception("Aucun identifiant de billet envoyé");
        }
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

                $flashSession = new FlashSession;
                $flashSession->addFlash('success', "Le commentaire est validé, il n'est plus signalé");

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
                $flashSession = new FlashSession;
                $flashSession->addFlash('warning', "Le commentaire est supprimer");

                header('Location: index.php?action=dashboard');
            }
        }else {
            throw new \Exception("Aucun identifiant de billet envoyé");
        }
    }

}