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

     public function listsArticles()
     {
          $db = $this->dbConnect();
          $reqArticle = $db->query('
               SELECT id, title, content, created_at, published_at 
               FROM articles 
               ORDER BY created_at ASC     
          ');
          
          return $articles = $reqArticle->fetchAll();
     }

     public function getArticleById($article_id)
     {
          $db = $this->dbConnect();
          $reqArticle = $db->prepare('
               SELECT *
               FROM articles 
               WHERE id = :id
          ');

          $reqArticle->execute([
               'id' => $article_id
          ]);

          return $article = $reqArticle->fetch();
     }

     public function getLastArticle()
     {
         $db = $this->dbConnect();
         $reqArticle = $db->query('
            SELECT *
            FROM articles 
            ORDER BY published_at DESC LIMIT 0, 5');
         return  $lastArticlr = $reqArticle->fetchAll();
     }

     public function listArticleByContinent($continent)
     {
         $db = $this->dbConnect();
         $reqArticle = $db->prepare('
            SELECT articles.* 
            FROM articles
            INNER JOIN  contries ON articles.country_id = countries.id
            WHERE continent = :continent
         ');

         $reqArticle->execute([
             'continent' => $continent
         ]);

         return $articleContinent = $reqArticle->fetch();
     }

    public function listArticleByCountry($country)
    {
        $db = $this->dbConnect();
        $reqArticle = $db->prepare('
            SELECT articles.* 
            FROM articles
            INNER JOIN  contries ON articles.country_id = countries.id
            WHERE country = :country
         ');

        $reqArticle->execute([
            'country' => $country
        ]);

        return $articleCountry = $reqArticle->fetch();
    }

    public function listArticleByCity($city)
    {
        $db = $this->dbConnect();
        $reqArticle = $db->prepare('
            SELECT articles.* 
            FROM articles
            INNER JOIN  contries ON articles.country_id = countries.id
            WHERE city = :city
         ');

        $reqArticle->execute([
            'city' => $city
        ]);

        return $articleContinent = $reqArticle->fetch();
    }

     public function addArticle($title, $content,$is_published, $category_id)
     {
         $db = $this->dbConnect();
         $reqArticle = $db->prepare('
            INSERT INTO articles (title,content, is_published, create_at, category_id ) 
                VALUES(:title, :content,:is_published, NOW(), :category_id');

         $reqArticle->execute([
             'title' => $title,
             'content' => $content,
             'content' => $is_published,
             'category_id' => $category_id
         ]);
     }

     public function setDraftArticle ($article_id)
     {
         $db = $this->dbConnect();
         $reqArticle = $db->prepare('
            UPDATE articles 
            SET is_published = 0
            WHERE id = :id');

         $reqArticle->execute([
             'id' => $article_id
         ]);
     }

    public function setArticleOnline ($article_id)
    {
        $db = $this->dbConnect();
        $reqArticle = $db->prepare('
            UPDATE articles 
            SET is_published = 1 
            WHERE id = :id');

        $reqArticle->execute([
            'id' => $article_id
        ]);
    }

    public function editArticle($article_id, $title, $content, $category_id)
    {
        $db = $this->dbConnect();
        $reqArticle = $db->prepare(
            'UPDATE articles 
            SET title = :title, content = :content, category_id = :category_id
            WHERE id = :id ');

        $reqArticle->execute([
            "id" => $article_id,
            "title" => $title,
            "content" => $content,
            'category_id' => $category_id
        ]);
    }

    public function deleteArticle($article_id)
    {
        $db = $this->dbConnect();
        $reqArticle = $db->prepare('
            DELETE FROM articles
            WHERE id = :id');
        $reqArticle->execute([
            'id' => $article_id
        ]);
    }






}