<?php

namespace App\Model;


class CommentsManager extends Manager
{
     public function listComments($article_id)
     {
          $db = $this->dbConnect();
          $reqComment = $db->prepare('
               SELECT comments.*, user.username 
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
         $comments = $db->prepare('
            INSERT INTO comments(comment,is_reported,comment_at , article_id, user_id) 
            VALUES (:comment, 0, NOW(), :article_id, :user_id)');

         return $comments->execute([
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
            SET comment :title
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
            SELECT comments.id, users.username as pseudo, comment, reported, comment_at, article_id, user_id 
            FROM comments 
            INNER JOIN users 
            ON comments.user_id = users.id 
            WHERE reported = 1');

        return  $reportedComments = $reqComment->fetchAll();
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
            SET reported = 0 
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