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


    /**
     * @param $firstPage
     * @param $perPage
     * @return array
     * ASC
     */
    public function listArticlesPublished($firstPage, $perPage)
    {

        $db = $this->dbConnect();
        $reqArticle = $db->prepare(" 
            SELECT * 
            FROM articles 
            WHERE is_published = 1 
            ORDER BY created_at DESC 
            LIMIT $firstPage, $perPage
        ");

        $reqArticle->execute();
        return $articles = $reqArticle->fetchAll();
    }

    public function getLastArticle() {
        $db = $this->dbConnect();
        $reqArticle = $db->query('
            SELECT * 
            FROM articles
            ORDER BY created_at DESC 
            LIMIT 0, 1
        ');

        return $lastArticle = $reqArticle->fetchAll();
    }

    /**
     * @param $firstPage
     * @param $perPage
     * @return array
     */
    public function listArticles($firstPage, $perPage)
    {
        $db = $this->dbConnect();
        $reqArticle = $db->prepare("
            SELECT *
            FROM articles 
            ORDER BY created_at DESC 
            LIMIT $firstPage, $perPage
        ");
        $reqArticle->execute();
        return $articles = $reqArticle->fetchAll();
    }

    /**
     * @param $article_id
     * @return mixed
     */
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


    /**
     * @param $article_id
     * @param $title
     * @param $content
     * @param $continent
     * @param $country
     * @param $region
     * @param $city
     */
    public function editArticle($article_id, $title, $content, $continent, $country, $region, $city) {
        $db = $this->dbConnect();
        $reqArticle = $db->prepare('
            UPDATE articles 
            SET title = :title, content = :content, continent = :continent, country = :country, 
            region = :region, city = :city, published_at =  NOW()
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

    /**
     * @param $article_id
     */
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

    /**
     * @param $article_id
     */
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

    /**
     * @param $article_id
     */
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

    /**
     * @param $title
     * @param $content
     * @param $continent
     * @param $country
     * @param $region
     * @param $city
     */
    public function addArticle($title, $content, $continent,$country,$region, $city)
    {
        $db = $this->dbConnect();
        $reqArticle = $db->prepare("
            INSERT INTO articles(title, content, continent, country, region, city, created_at, published_at)
            VALUES(:title,:content, :continent, :country, :region, :city, NOW(), NOW()) 
        ");

        $reqArticle->execute([
            'title'=> $title,
            'content'=> $content,
            'continent'=> $continent,
            'country'=> $country,
            'region'=> $region,
            'city'=> $city
        ]);
    }

    /***
     * @return mixed
     */
    public function totalArticle()
    {
        $db = $this->dbConnect();
        $reqArticle = $db->prepare('
            SELECT COUNT(*) AS totalArticle FROM articles
        ');

        $reqArticle->execute();

        return $resultArticle = $reqArticle->fetch();
    }

}