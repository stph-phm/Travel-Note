<?php

use App\Controller\Articles;




session_start();
ini_set("display_errors", E_ALL);

include_once 'vendor/autoload.php';

$action = '';
if(isset($_GET['action'])) {
     $action = trim($_GET['action']);
}

try {
     switch ($action) {
          case "homepage" :
          $articles = new Articles;
          $articles->homepage();
          break;
          
          
          default:
               $articles = new Articles;
               $articles->homepage();
               break;
     }
} catch (\Exception $e) {
     die('Erreur : '.$e->getMessage());
}