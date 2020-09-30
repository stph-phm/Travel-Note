<?php

namespace App\Model;


class CommentsManager extends Manager
{
    public function listComments($article_id)
    {
        $db = $this->dbConnect();
        $reqComment = $db->prepare('
            SELECT *
            FROM comments
            WHERE article_id = :article_id
            ORDER BY comment_at DESC
        ');

        $reqComment->execute([
            'article_id' => $article_id
        ]);

        return $listComments = $reqComment->fetchAll();
    }

    public function getCommentById ($comment_id)
    {
        $db = $this->dbConnect();
        $reqComment = $db->prepare('
            SELECT * 
            FROM comments 
            WHERE id = :id
        ');
        $reqComment ->execute([
            'id' => $comment_id
        ]);
        return $commentById = $reqComment->fetch();
    }

    public function addComment($comment, $article_id, $user_id)
    {
        $db = $this->dbConnect();
        $reqComment = $db->prepare('
            INSERT INTO comments(comment, comment_at, article_id, user_id) 
            VALUES (:comment, NOW(), :article_id, ;user_id)
        ');

        return $reqComment->execute([
            'comment' => $comment,
            'article_id' => $article_id,
            'user_id' => $user_id
        ]);
    }

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

    public function listReportedCom()
    {
        $db = $this->dbConnect();
        $reqComment = $db->query('
            SELECT comments.*, users.username, articles.title 
            FROM comments 
            INNER JOIN users 
            ON comments.user_id = users.id 
            INNER JOIN articles 
            ON comments.article_id = articles.id 
            WHERE is_reported = 1
        ');

        return $reportedComments = $reqComment->fetchAll();
    }

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
}