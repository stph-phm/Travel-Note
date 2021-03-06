<?php
namespace App\Model;

use App\Model\Manager;

class UsersManager extends Manager
{
    public $user_id;
    public $username;
    public $is_admin; 
    public $email_user;
    public $password_user;



    /**
     * @param $username
     * @param $email_user
     * @param $password_user
     * @return bool
     */
    public function addUser($username,$email_user, $password_user)
    {
        $db = $this->dbConnect();
        $reqUSer = $db->prepare('
            INSERT INTO users (username, email_user, password_user, user_at)
            VALUE (:username, :email_user, :password_user, NOW())
        ');

        return  $reqUSer->execute([
            'username'          => $username,
            'email_user'        => $email_user,
            'password_user'     => $password_user
        ]);
    }

    /**
     * @param $username
     * @return mixed
     */
    public function getUserByUsername($username) {
        $db = $this->dbConnect();
        $reqUsername = $db->prepare('
            SELECT * 
            FROM  users
            WHERE username = :username
        ');

        $reqUsername->execute([
            'username' => $username
        ]);

        return $userByUsername = $reqUsername->fetch();
    }

    /**
     * @param $email_user
     * @return mixed
     */
    public function getUserByEmail($email_user)
    {
        $db = $this->dbConnect();
        $reqMail = $db->prepare('
            SELECT *
            FROM users 
            WHERE email_user = :email_user
        ');
        $reqMail->execute([
            'email_user' => $email_user
        ]);

        return $userByEmail = $reqMail->fetch();
    }

    /**
     * @param $user_id
     * @return mixed
     */
    public function getUserById($user_id)
    {
        $db = $this->dbConnect();
        $reqUSer = $db->prepare('
            SELECT *
            FROM users 
            WHERE id = :id 
        ');
        $reqUSer->execute([
            'id'=> $user_id
        ]);
        return $userById = $reqUSer->fetch();
    }

    public function listUsers($firstPage, $perPage)
    {
        $db = $this->dbConnect();
        $reqUser = $db->query("
            SELECT *
            FROM users 
            ORDER BY user_at ASC
            LIMIT $firstPage , $perPage
            ");
        $reqUser->execute();
        return  $listUser = $reqUser->fetchAll();
    }

    public function blockUser($user_id)
    {
        $db = $this->dbConnect();
        $reqUser = $db->prepare('
            UPDATE users
            SET is_blocked = 1
            WHERE id = :id
        ');

        $reqUser->execute([
            'id' => $user_id
        ]);
    }

    public function unblockUser($user_id)
    {
        $db = $this->dbConnect();
        $reqUser = $db->prepare('
            UPDATE users
            SET is_blocked = 0
            WHERE id = :id
        ');

        $reqUser->execute([
            'id' => $user_id
        ]);
    }

    public function totalUsers()
    {
        $db = $this->dbConnect();
        $reqUser = $db->prepare('
            SELECT COUNT(*) AS totalUsers 
            FROM users
        ');
        $reqUser->execute();
        return $resultUsers = $reqUser->fetch();
    }
}