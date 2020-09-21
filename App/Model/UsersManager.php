<?php
namespace App\Model;

class UsersManager extends Manager
{
    public function listUsers()
    {
        $db =  $this->dbConnect();
        $resUser = $db->query('
            SELECT *
            FROM users 
        ');
        return $listUsers = $resUser->fetchAll();
    }

    public function getUserByUsername($username)
    {
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

    public function getUserByEmail($email)
    {
        $db = $this->dbConnect();
        $reqUsername = $db->prepare('
            SELECT * 
            FROM  users
            WHERE email_user = :email_user
        ');

        $reqUsername->execute([
            'email_user' => $email
        ]);

        return $userByUsername = $reqUsername->fetch();
    }

    public function addUSer($username, $email, $first_name, $last_name, $password_user)
    {
        $db = $this->dbConnect();
        $reqUSer = $db->prepare('
        INSERT INTO users(username, email, first_name, laste_name, password_user, user_at, is_report) 
        VALUES (:username, :email, :first_name, :laste_name, :password_user, NOW(), 0)
        ');

        return  $reqUSer->execute([
            'username'          => $username,
            'email_user'        => $email,
            'first_name'        => $first_name,
            'last_name'         => $last_name,
            'password_user'     => $password_user
        ]);
    }

    public function reportUser($user_id)
    {
        $db = $this->dbConnect();
        $reqUSer = $db->prepare('
            UPDATE users
            SET is_report = 1
            WHERE id = :id
        ');

        return  $reqUSer->execute([
            'id' => $user_id
        ]);
    }

    public function validateUser($user_id)
    {
        $db = $this->dbConnect();
        $reqUSer = $db->prepare('
            UPDATE users
            SET is_report = 0
            WHERE id = :id
        ');

        return  $reqUSer->execute([
            'id' => $user_id
        ]);
    }

    public function deleteUser($user_id)
    {
        $db = $this->dbConnect();
        $reqUSer = $db->prepare('
            DELETE FROM users
            WHERE id = :id
        ');

        return  $reqUSer->execute([
            'id' => $user_id
        ]);
    }

}