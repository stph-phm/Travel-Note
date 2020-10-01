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


    public function listArticlesPublished()
    {

        $db = $this->dbConnect();
        $reqArticle = $db->query('
            SELECT *
            FROM articles 
            WHERE is_published = 1
            ORDER BY created_at ASC
        ');
        return $articles = $reqArticle->fetchAll();
    }

    public function listArticles()
    {

        $db = $this->dbConnect();
        $reqArticle = $db->query('
            SELECT *
            FROM articles 
            ORDER BY created_at ASC
        ');
        return $articles = $reqArticle->fetchAll();
    }

    public function getArticleById($article_id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('
            SELECT *
            FROM articles 
            WHERE id = :id 
        ');

        $req->execute([
            'id' => $article_id
        ]);

        return $article = $req->fetch();
    }

    public function listArticleByContinent() {
        $db = $this->dbConnect();
        $reqArticle = $db->prepare('
            SELECT * 
            FROM articles
            GROUP BY continent 
        ');

        $reqArticle->execute([]);

        return $articleContinent = $reqArticle->fetchAll();
    }


    public function listArticlesByCountry($country) {
        $db = $this->dbConnect();
        $reqArticle = $db->prepare('
            SELECT *
            FROM articles 
            WHERE country = :country
        ');

        $reqArticle->execute([
            'country' => $country
        ]);

        return  $articleCountry = $reqArticle->fetch();
    }

    public function editArticle($article_id, $title, $content, $continent, $country, $region, $city) {
        $db = $this->dbConnect();
        $reqArticle = $db->prepare('
            UPDATE articles 
            SET title = :title, content = :content, continent = :continent, country = :country, region = :regions, city = :city, published_at =  NOW()
            WHERE id = :id
        ');

        $reqArticle->execute([
            "id"        =>$article_id, 
            "title"     =>$title, 
            "content"   =>$content, 
            "continent" =>$continent, 
            "country"   =>$country, 
            "region"    =>$region,
            "city"      =>$city
        ]);
    }

    public function publishedArticle($article_id) 
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

    public function draftArticle($article_id)
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

    public function addArticle($title, $content, $continent,$country,$regions, $city, $is_published)
    {
        $db = $this->dbConnect();
        $reqArticle = $db->prepare('
            INSERT INTO articles(title, content, continent, country, regions, city, is_published, created_at, published_at)
            VALUES(:title, :content, :continent, :country, :regions, :city, :is_published, NOW(), NOW() )
        ');

        $reqArticle->execute([
            'title'=> $title, 
            'content'=> $content, 
            'continent'=> $continent, 
            'country'=> $country, 
            'regions'=> $regions, 
            'city'=>$city, 
            'is_published'=> $is_published
        ]);
    }

    public function countArticle()
    {
        $db = $this->dbConnect();
        $reqArticle = $db->prepare('
            SELECT COUNT(id) AS nb_article FROM articles
        ');

        $reqArticle->execute();
    }

}