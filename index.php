<?php
session_start();
ini_set("display_errors", E_ALL);

require_once 'vendor/autoload.php';

use App\Controller\Users;
use App\Controller\Articles;
use App\Controller\Comments;
use App\Controller\Error;
use App\Controller\Pages;
use App\Model\ArticlesManager;

$action = '';
if (isset($_GET['action'])) {
    $action = trim($_GET['action']);
}

try {
    switch ($action) {
        case 'article':
            $articles = new Articles();
            $articles->displayArticle();
            break;
        case 'addComment':
            $comment = new Comments();
            $comment->addComment();
            break;
        case 'listAllArticles':
            $articles = new Articles;
            $articles->listAllArticles();
            break;
        case 'signIn':
            $users = new Users();
            $users->signIn();
            break;
        case 'signUp':
            $users = new Users;
            $users->signUp();
            break;
        case 'logout':
            $users = new Users;
            $users->logoutUser();
            break;
        case 'dashboard': 
            $comments = new Comments;
            $comments->listReportComments();
            break;
        case 'articleManagement':
            $articles = new Articles;
            $articles->articleManagement();
            break;
        case 'edit':
            $articles = new Articles;
            $articles->editArticle();
            break;
        case 'publishedArticle':
            $articles = new Articles;
            $articles->publishedArticle();
            break;
        case 'draftArticle':
                $articles = new Articles;
                $articles->draftArticle();
            break;
        case 'deleteArticle':
            $articles = new Articles;
            $articles->deleteArticle();
            break;
        case 'validateReport':
            $comments = new Comments;
            $comments->validateReportComment();
            break;
        case 'deleteReportCom':
            $comments = new Comments;
            $comments->deleteReportCom();
            break;
        case 'managementUsers':
            $users = new Users;
            $users->listUsers();
            break;
        case 'displayUser':
            $users = new Users;
            $users->displayUser();
            break;
        case 'blockedUser':
            $users = new Users;
            $users->blockUser();
            break;
        case 'unblockedUser':
            $users = new Users;
            $users->unblockUser();
            break;
        case 'profil':
            $users = new Users;
            $users->profilUser();
            break;
        case 'createArticle':
            $articles = new Articles;
            $articles->addArticle();
            break;


        default:
            $articles = new Articles;
            $articles->homepage();
            break;
    }
} catch (\Exception $e) {
    $errorMsgBlock = new Error;
    $errorMsgBlock->displayErrorBlock($e);
}