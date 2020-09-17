<?php 

namespace App\Model;

class ArticlesManager extends Manager
{
     public $article_id;
     public $title;
     public $content;
     public $is_published;
     public $created_at;
     public $published_at;

     public function home()
     {
          $db = $this->dbConnect();
          $reqArticle = $db->query('
               SELECT id, title, content, created_at, published_at 
               FROM articles 
               ORDER BY created_at ASC     
          ');
          
          return $articles = $reqArticle->fetchAll();
     }
}