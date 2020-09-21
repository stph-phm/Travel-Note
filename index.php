<?php

use App\Controller\Articles;
use App\Controller\Categories;




session_start();
ini_set("display_errors", E_ALL);

include_once 'vendor/autoload.php';

$action = '';
if(isset($_GET['action']) && !empty($_GET['action'])) {
     $action = trim($_GET['action']);
}

try {
     switch ($action) {
         case "article":
               $articles = new Articles;
               $articles->displayArticle();
          break;
         case "listArticleByContinent":
             $articles = new Articles();
             $articles->listArticleByContinent();
             break;
         case "listArticleByCountry":
             $articles = new Articles();
             $articles->listArticleByCountry();
             break;
         case 'addArticle':
             $articles = new Articles();
             $articles->addArticle();
             break;
         case "articleManagement":
             $articles = new Articles();
             $articles->articleManagement();
             break;
         case "editArticle":
             $articles = new Articles();
             $articles->editArticle();
             break;
         case "listCategories":
             $categories = new Categories();
             $categories->listCategories();
             break;
         case "addCategory":
             $categories = new Categories();
             $categories->addCategory();
             break;
         case "editCategory":
             $categories = new  Categories();
             $categories->editCategory();
             break;
         case "contact":
             $forms = new \App\Controller\Forms();
             $forms->formContact();
         case "listReportComments":
             $comments = new \App\Controller\Comments();
             $comments->listReportComments();
             break;
         case "listUser":
             $users = new \App\Controller\Users();
             $users->listUsers();
             break;
         case "register":
             $users = new \App\Controller\Users();
             $users->registerUser();
             break;
         case "profilUser":
             $users = new \App\Controller\Users();
             $users->profilUser();
             break;
         case "login":
             $users = new \App\Controller\Users();
             $users->loginUser();
             break;
          default:
               $articles = new Articles;
               $articles->homepage();
               break;
     }
} catch (\Exception $e) {
    $errorMsgBlock = new \App\Controller\Error();
    $errorMsgBlock->displayErrorBlock($e);
}