<?php
session_start();
ini_set("display_errors", E_ALL);

require_once 'vendor/autoload.php';

use App\Controller\Users;
use App\Controller\Articles;
use App\Controller\Comments;
use App\Controller\Error;
use App\Controller\Pages;

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
        case 'articleContinent':

            $articles->listArticleByContinent();
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
            $showDashboard = new Pages;
            $showDashboard->showDashboard();
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

        default:
            $articles = new Articles;
            $articles->homepage();
            break;
            
    }
} catch (\Exception $e) {
    $errorMsgBlock = new Error;
    $errorMsgBlock->displayErrorBlock($e);
}