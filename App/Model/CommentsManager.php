<?php

namespace App\Model;


class CommentsManager extends Manager
{

    /**
     * @param $article_id
     * @return array
     */
    public function listComments($article_id)
    {
        $db = $this->dbConnect();
        $reqComment = $db->prepare('
            SELECT comments.*, users.username
            FROM comments
            INNER JOIN users
            ON comments.user_id = users.id
            WHERE article_id = :article_id
            ORDER BY comment_at DESC
        ');

        $reqComment->execute([
            'article_id' => $article_id
        ]);

        return $listComments = $reqComment->fetchAll();
    }

    /**
     * @param $comment_id
     * @return mixed
     */
    public function getCommentById ($comment_id)
    {
        $db = $this->dbConnect();
        $reqComment = $db->prepare('
            SELECT comments.*, users.username
            FROM comments 
            INNER JOIN users
            ON comments.user_id = users.id
            WHERE comments.id = :id
        ');
        $reqComment ->execute([
            'id' => $comment_id
        ]);
        return $commentById = $reqComment->fetch();
    }


    /**
     * @param $comment
     * @param $article_id
     * @param $user_id
     * @return string
     */
    public function addComment($comment, $article_id, $user_id)
    {
        $db = $this->dbConnect();
        $reqComment = $db->prepare('
            INSERT INTO comments(comment, comment_at, article_id, user_id) 
            VALUES (:comment, NOW(), :article_id, :user_id)
        ');

        $reqComment->execute([
            'comment' => $comment,
            'article_id' => $article_id,
            'user_id' => $user_id
        ]);

        return $db->lastInsertId("comments");


    }

    /**
     * @return string
     */
    public function getLastId() 
    {
        $db = $this->dbConnect();
        return $db->lastInsertId("comments");
    }


    /**
     * @param $comment_id
     * @param $comment
     */
    public function editComment($comment_id, $comment )
    {
        $db = $this->dbConnect();
        $reqComment = $db->prepare('
            UPDATE comments
            SET comment = :comment
            WHERE id = :id
        ');

        $reqComment->execute([
            "id" => $comment_id,
            "comment" => $comment
        ]);
    }

    /**
     * @param $firstPage
     * @param $perPage
     * @return array
     */
    public function listReportedCom($firstPage, $perPage)
    {
        $db = $this->dbConnect();
        $reqComment = $db->prepare("
            SELECT comments.*, users.username, articles.title 
            FROM comments 
            INNER JOIN users 
            ON comments.user_id = users.id 
            INNER JOIN articles 
            ON comments.article_id = articles.id 
            WHERE is_reported = 1 
            LIMIT $firstPage, $perPage
        ");

        $reqComment->execute();

        return $reportedComments = $reqComment->fetchAll();
    }


    /**
     * @param $comment_id
     */
    public function reportComment($comment_id)
    {

        $db = $this->dbConnect();
        $reqComment = $db->prepare('
            UPDATE comments 
            SET is_reported = 1 
            WHERE id = :id');

        $reqComment->execute([
            'id' => $comment_id
        ]);
    }

    /**
     * @param $comment_id
     */
    public function validateComReported($comment_id)
    {
        $db = $this->dbConnect();
        $reqComment = $db->prepare(
            'UPDATE comments 
            SET is_reported = 0 
            WHERE id = :id');

        $reqComment->execute([
            'id' => $comment_id
        ]);
    }

    /**
     * @param $comment_id
     */
    public function deleteComment($comment_id)
    {
        $db = $this->dbConnect();
        $reqComment = $db->prepare(
            'DELETE FROM comments 
            WHERE id = :id');

        $reqComment->execute([
            'id' => $comment_id
        ]);
    }

    /**
     * @return mixed
     */
    public function totalComments()
    {
        $db = $this->dbConnect();
        $reqComment = $db->prepare('
            SELECT COUNT(*) AS totalComments FROM comments
        ');

        $reqComment->execute();

        return $resultComments = $reqComment->fetch();
    }
    
}